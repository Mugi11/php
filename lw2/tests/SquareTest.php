<?php

require_once('src/Shape/Square.php');

use PHPUnit\Framework\TestCase;

class SquareTest extends TestCase
{

    private Square $square;

    public function testGetPerimetr(): void
    {
        $this->square = new Square(4.45);
        $this->assertEqualsWithDelta($this->square->getPerimeter(), 17.8, 0.1);
    }

    public function testGetArea(): void
    {
        $this->square = new Square(4.45);
        $this->assertEqualsWithDelta($this->square->getArea(), 19.8, 0.1);
    }

    public function testInvalidInput(): void
    {
        $this->expectExceptionMessage("Incorrect values");
        $incorrectSquare = new Square(0);
    }

    public function testInvalidInputOtr(): void
    {
        $this->expectExceptionMessage("Incorrect values");
        $incorrectSquare = new Square(-1);
    }
}
