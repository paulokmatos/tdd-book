<?php

namespace Tests\CDC\Loja\Builder;

use App\CDC\Loja\Carrinho\CarrinhoDeCompras;
use App\CDC\Loja\Produto\Produto;

class CarrinhoDeComprasBuilder
{
    public CarrinhoDeCompras $carrinho;

    public function __construct()
    {
        $this->carrinho = new CarrinhoDeCompras();
    }

    public function comItems(): self
    {
        $valores = func_get_args();
        foreach ($valores as $valor) {
            $this->carrinho->adiciona(
                new Produto("Item", $valor, 1)
            );
        }

        return $this;
    }

    public function cria(): CarrinhoDeCompras
    {
        return $this->carrinho;
    }
}