<?php

namespace App\CDC\Loja\RH;

enum Cargos: int
{
    case DESENVOLVEDOR = 1;
    case DBA = 2;
    case TESTADOR = 3;

    public function getRegraCalculoSalario(): IRegraDeCalculoSalario
    {
        return match ($this) {
            self::DESENVOLVEDOR => new DezOuVintePorCento(),
            self::DBA, self::TESTADOR => new QuinzeOuVinteECincoPorCento(),
        };
    }
}
