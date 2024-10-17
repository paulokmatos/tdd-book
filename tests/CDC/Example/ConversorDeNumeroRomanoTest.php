<?php

namespace Tests\CDC\Example;

use App\CDC\Exemplos\ConversorDeNumeroRomano;
use PHPUnit\Framework\TestCase;

class ConversorDeNumeroRomanoTest extends TestCase
{
    public function test_DeveEntenderOSimboloI(): void
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("I");
        $this->assertEquals(1, $numero);
    }

    public function test_DeveEntenderOSimboloV(): void
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("V");
        $this->assertEquals(5, $numero);
    }

    public function test_DeveEntenderOSimboloII(): void
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("II");
        $this->assertEquals(2, $numero);
    }

    public function test_DeveEntenderOSimboloXXII(): void
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("XXII");
        $this->assertEquals(22, $numero);
    }

    public function test_DeveEntenderOSimboloIX(): void
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("IX");
        $this->assertEquals(9, $numero);
    }

    public function test_DeveEntenderOSimboloXXIV(): void
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("XXIV");
        $this->assertEquals(24, $numero);
    }

    public function test_DeveEntenderOSimboloXXXVI(): void
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("XXXVI");
        $this->assertEquals(36, $numero);
    }
}