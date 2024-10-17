<?php

namespace App\CDC\Loja\RH;

class Funcionario
{
    public function __construct(
        public string $nome,
        public float $salario,
        public Cargos $cargo,
    )
    {
    }
}