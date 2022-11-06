<?php

require_once("Shape.php");
class Parallelogram extends Shape
{
    private float $width = 0;
    private float $length = 0;
    private float $alphaAngle = 0;

    function __construct(float $inputWidth, float $inputLength, float $inputAlphaAngle)
    {
        $this->width = $inputWidth;
        $this->length = $inputLength;
        $this->alphaAngle = $inputAlphaAngle;
        if (!$this->isValidValues()) {
            throw new Exception("Incorrect values");
        }
    }

    public function getPerimeter(): float
    {
        return ($this->width + $this->length) * 2;
    }

    public function getArea(): float
    {
        return ($this->width * $this->length *
            sin(deg2rad($this->alphaAngle)));
    }

    private function isValidValues(): bool
    {
        if (
            $this->width <= 0 || $this->length <= 0 ||
            $this->alphaAngle <= 0 || $this->alphaAngle >= 180
        ) {
            return false;
        }
        return true;
    }
}
