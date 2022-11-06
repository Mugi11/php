<?php

require_once("Shape.php");
class Rectangle extends Shape
{
    private float $side1;
    private float $side2;

    function __construct(float $inputSide1, float $inputSide2)
    {
        $this->side1 = $inputSide1;
        $this->side2 = $inputSide2;
        if (!$this->isValidValues()) {
            throw new Exception("Incorrect values");
        }
    }

    public function getPerimeter(): float
    {
        return ($this->side1 + $this->side2) * 2;
    }

    public function getArea(): float
    {
        return $this->side1 * $this->side2;
    }

    private function isValidValues(): bool
    {
        if ($this->side1 <= 0 || $this->side2 <= 0) {
            return false;
        }
        return true;
    }
}
