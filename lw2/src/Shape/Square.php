<?php

require_once("Shape.php");

class Square extends Shape
{
    private float $side = 0;

    function __construct(float $inputSide)
    {
        if ($inputSide <= 0) {
            throw new Exception("Incorrect values");
        }
        $this->side = $inputSide;
    }

    public function getPerimeter(): float
    {
        return $this->side * 4;
    }
    public function getArea(): float
    {
        return $this->side * $this->side;
    }
}
