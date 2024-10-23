<?php

namespace App\CDC\Loja\RH;

class DezOuVintePorCento implements IRegraDeCalculoSalario
{
    public function calcula(Funcionario $funcionario): float
    {
        if ($funcionario->salario < 3000) {
            return $funcionario->salario * 0.9;
        }

        return $funcionario->salario * 0.8;
    }
}