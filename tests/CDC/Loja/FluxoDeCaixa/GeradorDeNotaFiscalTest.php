<?php

namespace Tests\CDC\Loja\FluxoDeCaixa;

use App\CDC\Loja\FluxoDeCaixa\GeradorDeNotaFiscal;
use App\CDC\Loja\FluxoDeCaixa\NFDao;
use App\CDC\Loja\FluxoDeCaixa\Pedido;
use PHPUnit\Framework\TestCase;

class GeradorDeNotaFiscalTest extends TestCase
{
    public function test_DeveGerarNotaFiscalComValorDeImpostosDescontados(): void
    {
        $gerador = new GeradorDeNotaFiscal(new NFDao());
        $pedido = new Pedido("André", 1000, 1);

        $nf = $gerador->gerarNotaFiscal($pedido);

        $this->assertEquals(999.94, $nf->valor);
        $this->assertEquals("André", $nf->cliente);
    }

    public function test_DevePersistirNotaFiscalGerada(): void
    {
        $dao = \Mockery::mock(NFDao::class);
        $dao->expects("persiste")->andReturn(true);

        $gerador = new GeradorDeNotaFiscal($dao);
        $pedido = new Pedido("André", 1000, 1);
        $nf = $gerador->gerarNotaFiscal($pedido);

        $this->assertTrue($dao->persiste());
        $this->assertNotNull($nf);
    }
}
