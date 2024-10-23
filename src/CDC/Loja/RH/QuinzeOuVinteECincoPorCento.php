<?php

namespace App\CDC\Loja\RH;

class QuinzeOuVinteECincoPorCento implements IRegraDeCalculoSalario
{

    public function calcula(Funcionario $funcionario): float
    {
        if ($funcionario->salario > 2500) {
            return $funcionario->salario * 0.75;
        }

        return $funcionario->salario * 0.85;
    }
}