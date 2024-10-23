<?php

namespace App\CDC\Loja\FluxoDeCaixa;

class Pedido
{

    public function __construct(
        public $cliente, public $valorTotal, public $quantidadeItens
    )
    {

    }

}