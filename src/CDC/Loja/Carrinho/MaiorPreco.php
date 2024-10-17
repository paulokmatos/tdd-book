<?php

namespace App\CDC\Loja\Carrinho;

class MaiorPreco
{
    public function encontra(CarrinhoDeCompras $carrinho): int|float
    {

        $produtos = $carrinho->produtos;

        if($produtos->count() === 0){
            return 0;
        }



        return $maiorValor;
    }
}