<?php

namespace App\CDC\Loja\RH;

class CalculadoraDeSalario
{
    public function calculaSalario(Funcionario $funcionario): float
    {
        if($funcionario->cargo === Cargos::DESENVOLVEDOR) {
            if($funcionario->salario > 3000) {
                return $funcionario->salario * 0.8;
            }

            return $funcionario->salario * 0.9;
        }

        return  $funcionario->salario * 0.85;
    }
}