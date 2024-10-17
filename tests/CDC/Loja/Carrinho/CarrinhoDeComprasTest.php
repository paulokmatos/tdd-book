<?php

namespace Tests\CDC\Loja\Carrinho;

use App\CDC\Loja\Carrinho\CarrinhoDeCompras;
use App\CDC\Loja\Produto\Produto;
use PHPUnit\Framework\TestCase;

class CarrinhoDeComprasTest extends TestCase
{
    private CarrinhoDeCompras $carrinho;

    protected function setUp(): void
    {
        $this->carrinho = new CarrinhoDeCompras();
        parent::setUp();
    }

    public function test_DeveRetornarZeroSeCarrinhoEstiverVazio(): void
    {
        $maiorValor = $this->carrinho->getMaiorValor();
        $this->assertEquals(0, $maiorValor);
    }

    public function test_DeveRetornarValorDoItemSeCarrinhoTiver1UnicoItem(): void
    {
        $this->carrinho->adiciona(
            new Produto("Ferro de passar", 200.0, 1)
        );
        $maiorValor = $this->carrinho->getMaiorValor();

        $this->assertEquals(200.0, $maiorValor);
    }

    public function test_DeveRetornarMaiorValorSeCarrinhoTemVariosItems(): void
    {
        $this->carrinho->adiciona(
            new Produto("Ferro de passar", 200.0, 1)
        );
        $this->carrinho->adiciona(
            new Produto("Computador", 950.0, 1)
        );
        $this->carrinho->adiciona(
            new Produto("Sofá", 300.0, 1)
        );
        $maiorValor = $this->carrinho->getMaiorValor();

        $this->assertEquals(950.0, $maiorValor);
    }
}