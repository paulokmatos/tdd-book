<?php

namespace App\CDC\Loja\FluxoDeCaixa;

use DateTime;

readonly class NotaFiscal
{
    public function __construct(
        public string $cliente,
        public float $valor,
        public DateTime $data
    ) {
    }
}