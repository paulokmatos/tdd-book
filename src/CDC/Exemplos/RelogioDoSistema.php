<?php

namespace App\CDC\Exemplos;

use App\CDC\Exemplos\IRelogio;
use DateTime;

class RelogioDoSistema implements IRelogio
{

    public function hoje()
    {
        return DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
    }
}