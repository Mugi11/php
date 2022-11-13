<?php

require_once('src/Calculator.php');

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{

    private Calculator $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    public function testSum(): void
    {
        $this->assertEquals($this->calculator->sum(8.45)->getResult(), 8.45);
    }

    public function testMinus(): void
    {
        $this->assertEquals($this->calculator->minus(4.45)->getResult(), -4.45);
    }

    public function testProduct(): void
    {
        $calculator = new Calculator();
        $this->assertEquals($calculator->sum(23)->product(67)->getResult(), 1541);
    }

    public function testDivisionZero(): void
    {
        $this->expectExceptionMessage("Сannot be divided by zero");
        $this->calculator->division(0)->getResult();
    }

    public function testDivision(): void
    {
        $calculator = new Calculator();
        $this->assertEquals($calculator->sum(445)->division(5)->getResult(), 89);
    }
}