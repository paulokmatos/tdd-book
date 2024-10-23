<?php

namespace App\CDC\Loja\FluxoDeCaixa;

class GeradorDeNotaFiscal
{
    public function __construct(
        private NFDao $nfDao
    )
    {
    }

    public function gerarNotaFiscal(Pedido $pedido): ?NotaFiscal
    {
        $nf = new NotaFiscal(
            $pedido->cliente,
            $pedido->valorTotal * 0.94,
            new \DateTime()
        );

        if($this->nfDao->persiste()) {
            return $nf;
        }

        return null;
    }
}