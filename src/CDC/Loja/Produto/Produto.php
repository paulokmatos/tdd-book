<?php

namespace App\CDC\Loja\Produto;

class Produto
{
    public function __construct(
        public string $nome,
        public int $valorUnitario,
        public int $quantidade,
    ) {
    }

    public function getValorTotal(): float|int
    {
        return $this->valorUnitario * $this->quantidade;
    }
}