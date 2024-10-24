<?php

namespace App\CDC\Loja\FluxoDeCaixa;

class SAP implements AcaoAposGerarNota
{
    public function executar(NotaFiscal $notaFiscal): bool
    {
        return false;
    }
}