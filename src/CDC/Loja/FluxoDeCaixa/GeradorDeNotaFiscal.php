<?php

namespace App\CDC\Loja\FluxoDeCaixa;

use App\CDC\Exemplos\IRelogio;

class GeradorDeNotaFiscal
{
    /** @param AcaoAposGerarNota[] $acoes */
    public function __construct(
        private array $acoes,
        private IRelogio $relogio
    )
    {
    }

    public function gerarNotaFiscal(Pedido $pedido): ?NotaFiscal
    {
        $nf = new NotaFiscal(
            $pedido->cliente,
            $pedido->valorTotal * 0.94,
            $this->relogio->hoje()
        );

        foreach ($this->acoes as $acao) {
            $acao->executar($nf);
        }

        return $nf;
    }
}