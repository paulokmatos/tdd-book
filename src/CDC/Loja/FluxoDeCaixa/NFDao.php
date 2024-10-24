<?php

namespace App\CDC\Loja\FluxoDeCaixa;

class NFDao implements AcaoAposGerarNota
{
    public function executar(NotaFiscal $notaFiscal): bool
    {
        return false;
    }
}