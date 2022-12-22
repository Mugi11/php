<?php

require_once('src/Shape/Rectangle.php');

use PHPUnit\Framework\TestCase;

class RectangleTest extends TestCase
{

    private Rectangle $rectangle;

    public function testGetPerimetr(): void
    {
        $this->rectangle = new Rectangle(4.45, 8.45);
        $this->assertEqualsWithDelta($this->rectangle->getPerimeter(), 25.8, 0.1);
    }

    public function testGetArea(): void
    {
        $this->rectangle = new Rectangle(4.45, 8.45);
        $this->assertEqualsWithDelta($this->rectangle->getArea(), 37.6, 0.1);
    }

    public function testInvalidSide1(): void
    {
        $this->expectExceptionMessage("Incorrect values");
        $incorrectRectangle = new rectangle(0, 1);
    }

    public function testInvalidSide2(): void
    {
        $this->expectExceptionMessage("Incorrect values");
        $incorrectRectangle = new rectangle(1, 0);
    }

    public function testInvalidSide1Otr(): void
    {
        $this->expectExceptionMessage("Incorrect values");
        $incorrectRectangle = new rectangle(-1, 1);
    }

    public function testInvalidSide2Otr(): void
    {
        $this->expectExceptionMessage("Incorrect values");
        $incorrectRectangle = new rectangle(1, -1);
    }
}
