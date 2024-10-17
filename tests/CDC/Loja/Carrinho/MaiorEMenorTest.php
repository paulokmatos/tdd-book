<?php

namespace Tests\CDC\Loja\Carrinho;

use App\CDC\Loja\Carrinho\CarrinhoDeCompras;
use App\CDC\Loja\Carrinho\MaiorEMenor;
use App\CDC\Loja\Produto\Produto;
use PHPUnit\Framework\TestCase;

class MaiorEMenorTest extends TestCase
{
    public function test_ObterMaiorValorEMenorValor(): void
    {
        $carrinho = new CarrinhoDeCompras();

        $carrinho->adiciona(
            new Produto("Liquidificador", 100, 1)
        );

        $carrinho->adiciona(
            new Produto("Geladeira", 4500, 1)
        );

        $carrinho->adiciona(
            new Produto("Jogo de Pratos", 70, 1)
        );

        $maiorEMenor = new MaiorEMenor();
        $maiorEMenor->encontra($carrinho);
        $this->assertEquals("Geladeira", $maiorEMenor->getMaior()->nome);
        $this->assertEquals("Jogo de Pratos", $maiorEMenor->getMenor()->nome);
    }

    public function test_ApenasUmProduto(): void
    {
        $carrinho = new CarrinhoDeCompras();
        $carrinho->adiciona(new Produto("Geladeira", 450, 1));

        $maiorEMenor = new MaiorEMenor();
        $maiorEMenor->encontra($carrinho);

        $this->assertEquals("Geladeira", $maiorEMenor->getMaior()->nome);
        $this->assertEquals("Geladeira", $maiorEMenor->getMenor()->nome);
    }
}