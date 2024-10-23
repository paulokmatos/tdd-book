<?php

namespace App\CDC\Loja\RH;

interface IRegraDeCalculoSalario
{
    public function calcula(Funcionario $funcionario): float;
}