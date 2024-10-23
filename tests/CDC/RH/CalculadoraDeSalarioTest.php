<?php

namespace Tests\CDC\RH;

use App\CDC\Loja\RH\CalculadoraDeSalario;
use App\CDC\Loja\RH\Cargos;
use App\CDC\Loja\RH\Funcionario;
use PHPUnit\Framework\TestCase;

class CalculadoraDeSalarioTest extends TestCase
{
    public function test_CalculoSalarioDesenvolvedorAbaixoDoLimite(): void
    {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor = new Funcionario(
            "José",
            1500.0,
            Cargos::DESENVOLVEDOR
        );

        $salario = $calculadora->calculaSalario($desenvolvedor);

        $this->assertEquals($desenvolvedor->salario * 0.9, $salario);
    }

    public function test_CalculoSalarioDesenvolvedorAcimaDoLimite(): void
    {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor = new Funcionario(
            "José",
            4000.0,
            Cargos::DESENVOLVEDOR
        );

        $salario = $calculadora->calculaSalario($desenvolvedor);

        $this->assertEquals($desenvolvedor->salario * 0.80, $salario);
    }

    public function test_CalculoSalarioParaDBAsComSalarioAbaixoDoLimite(): void
    {
        $calculadora = new CalculadoraDeSalario();
        $dba = new Funcionario(
            "Elowyin",
            500.0,
            Cargos::DBA
        );

        $salario = $calculadora->calculaSalario($dba);

        $this->assertEquals(425.0, $salario);
    }
}