<?php

class Calculator
{
    private float $answer = 0;

    function division(float $enteredNumber): Calculator
    {
        if ($enteredNumber == 0) {
            throw new Exception("Сannot be divided by zero");
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