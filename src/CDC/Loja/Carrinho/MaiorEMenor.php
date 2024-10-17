<?php

namespace App\CDC\Loja\Carrinho;

use App\CDC\Loja\Produto\Produto;

class MaiorEMenor
{
    private Produto $menor;
    private Produto $maior;

    public function encontra(CarrinhoDeCompras $carrinho): void
    {
        foreach ($carrinho->produtos as $produto) {

            if (empty($this->menor) || $produto->valorUnitario < $this->menor->valorUnitario) {
                $this->menor = $produto;
            }
            if (empty($this->maior) || $produto->valorUnitario > $this->maior->valorUnitario) {
                $this->maior = $produto;
            }
        }
    }

    public function getMenor(): Produto
    {
        return $this->menor;
    }

    public function getMaior(): Produto
    {
        return $this->maior;
    }
}
