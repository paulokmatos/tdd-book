<?php

namespace App\CDC\Exemplos;

class ConversorDeNumeroRomano
{
    protected array $tabela = [
        "I" => 1,
        "V" => 5,
        "X" => 10,
        "L" => 50,
        "C" => 100,
        "D" => 500,
        "M" => 1000,
    ];

    public function converte(string $numero): int
    {
        $acumulador = 0;
        $totalDeAlgorismos = strlen($numero);
        $ultimoVizinhoDaDireita = 0;

        for ($i = $totalDeAlgorismos - 1; $i >= 0; $i--) {
            $atual = 0;
            $numeroCorrente = $numero[$i];
            if (array_key_exists($numeroCorrente, $this->tabela)) {
                $atual = $this->tabela[$numeroCorrente];
            }

            $multiplicador = 1;
            if ($atual < $ultimoVizinhoDaDireita) {
                $multiplicador = -1;
            }

            $acumulador += ($atual * $multiplicador);
            $ultimoVizinhoDaDireita = $atual;
        }

        return $acumulador;
    }
}