<?php

namespace App\CDC\Loja\RH;

class CalculadoraDeSalario
{
    public function calculaSalario(Funcionario $funcionario): float
    {
        return $funcionario->cargo->getRegraCalculoSalario()->calcula($funcionario);
    }
}