<?php

class Calculator
{
    private float $answer = 0;

    function division(float $enteredNumber): Calculator
    {
        if ($enteredNumber == 0) {
            throw new Exception('Сannot be divided by zero');
        } else
            $this->answer /= $enteredNumber;
        return $this;
    }

    function product(float $enteredNumber): Calculator
    {
        $this->answer *= $enteredNumber;
        return $this;
    }

    function minus(float $enteredNumber): Calculator
    {
        $this->answer -= $enteredNumber;
        return $this;
    }

    function sum(float $enteredNumber): Calculator
    {
        $this->answer += $enteredNumber;
        return $this;
    }

    function getResult(): float
    {
        $tempAnswer = $this->answer;
        $this->answer = 0;
        return $tempAnswer;
    }
}

$calculator = new Calculator();

echo $calculator->sum(1)->sum(2)->product(3)->division(3)->getResult(); // 3
echo $calculator->sum(3)->sum(3)->minus(3)->division(3)->getResult(); // 1
echo $calculator->sum(1.4)->sum(2.6)->product(4)->getResult(); // 16
echo $calculator->sum(1)->sum(2)->product(3)->division(0)->getResult(); // Exception (Исключение)