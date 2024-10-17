<?php

namespace App\CDC\Loja\Carrinho;

use App\CDC\Loja\Produto\Produto;
use App\Helpers\Collection;

class CarrinhoDeCompras
{

    /** @var Collection<Produto> */
    public Collection $produtos;

    public function __construct()
    {
        $this->produtos = new Collection([]);
    }

    public function adiciona(Produto $produto): self
    {
        $this->produtos->append($produto);
        return $this;
    }

    public function getMaiorValor(): float|int
    {
        if($this->produtos->count() === 0){
            return 0;
        }

        $maiorValor = $this->produtos[0]->valorUnitario;

        foreach ($this->produtos as $produto) {
            if($produto->valorUnitario > $maiorValor){
                $maiorValor = $produto->valorUnitario;
            }
        }

        return $maiorValor;
    }
}