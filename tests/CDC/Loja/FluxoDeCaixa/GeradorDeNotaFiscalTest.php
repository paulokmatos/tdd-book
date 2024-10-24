<?php

namespace Tests\CDC\Loja\FluxoDeCaixa;

use App\CDC\Exemplos\IRelogio;
use App\CDC\Loja\FluxoDeCaixa\GeradorDeNotaFiscal;
use App\CDC\Loja\FluxoDeCaixa\NFDao;
use App\CDC\Loja\FluxoDeCaixa\NotaFiscal;
use App\CDC\Loja\FluxoDeCaixa\Pedido;
use App\CDC\Loja\FluxoDeCaixa\SAP;
use Mockery;
use PHPUnit\Framework\TestCase;

class GeradorDeNotaFiscalTest extends TestCase
{
    public function test_DeveGerarNotaFiscalComValorDeImpostosDescontados(): void
    {
        $relogio = Mockery::mock(IRelogio::class);
        $relogio->expects('hoje')->andReturn(new \DateTime());
        $gerador = new GeradorDeNotaFiscal([], $relogio);
        $pedido = new Pedido("André", 1000, 1);
        $nf = $gerador->gerarNotaFiscal($pedido);

        $this->assertEquals(940, $nf->valor);
        $this->assertEquals("André", $nf->cliente);
    }

    public function test_DevePersistirNotaFiscalGerada(): void
    {
        $dao = Mockery::mock(NFDao::class);
        $relogio = Mockery::mock(IRelogio::class);
        $relogio->expects('hoje')->andReturn(new \DateTime());
        $dao->expects("executar")->andReturn(true);
        $gerador = new GeradorDeNotaFiscal([$dao], $relogio);
        $pedido = new Pedido("André", 1000, 1);
        $nf = $gerador->gerarNotaFiscal($pedido);

        $this->assertTrue($dao->executar($nf));
        $this->assertEquals(1000 * 0.94, $nf->valor);
        $this->assertNotNull($nf);
    }

    public function test_DeveEnviarNotaFiscalGeradaParaSAP(): void
    {
        $dao = Mockery::mock(NFDao::class);
        $sap = Mockery::mock(SAP::class);
        $relogio = Mockery::mock(IRelogio::class);
        $dao->expects('executar')->andReturns(true);
        $sap->expects('executar')->andReturns(true);
        $relogio->expects('hoje')->andReturn(new \DateTime());
        $gerador = new GeradorDeNotaFiscal([$dao, $sap], $relogio);

        $pedido = new Pedido('André', 1000, 1);
        $nf = $gerador->gerarNotaFiscal($pedido);

        $this->assertTrue($sap->executar($nf));
        $this->assertEquals(1000 * 0.94, $nf->valor);
    }

    public function test_DeveInvocarAcoesPosteriores(): void
    {
        $dao = Mockery::mock(NFDao::class);
        $sap = Mockery::mock(SAP::class);
        $relogio = Mockery::mock(IRelogio::class);
        $dao->expects('executar')->andReturns(true);
        $sap->expects('executar')->andReturns(true);
        $relogio->expects('hoje')->andReturn(new \DateTime());

        $pedido = new Pedido('André', 1000, 1);
        $gerador = new GeradorDeNotaFiscal([$dao, $sap], $relogio);

        $nf = $gerador->gerarNotaFiscal($pedido);
        $this->assertTrue($sap->executar($nf));
        $this->assertTrue($dao->executar($nf));
        $this->assertNotNull($nf);
        $this->assertInstanceOf(NotaFiscal::class, $nf);
    }
}
