<?php

namespace App\CDC\Loja\FluxoDeCaixa;

interface AcaoAposGerarNota
{
    public function executar(NotaFiscal $notaFiscal);
}