<?php

require_once('src/Shape/Parallelogram.php');

use PHPUnit\Framework\TestCase;

class ParallelogramTest extends TestCase
{

    private Parallelogram $parallelogram;

    protected function setUp(): void
    {
        $this->parallelogram = new Parallelogram(4.45, 8.45, 60);
    }

    public function testGetPerimetr(): void
    {
        $this->assertEqualsWithDelta($this->parallelogram->getPerimeter(), 25.8, 0.1);
    }

    public function testGetArea(): void
    {
        $this->assertEqualsWithDelta($this->parallelogram->getArea(), 32.6, 0.1);
    }
    
    public function testIs180AlphaAngle(): void
    {
        $this->expectExceptionMessage("Incorrect values");
        $incorrectParallelogram = new Parallelogram(1, 1, 180);
    }

    public function testIsZeroAlphaAngle(): void
    {
        $this->expectExceptionMessage("Incorrect values");
        $incorrectParallelogram = new Parallelogram(1, 1, 0);
    }

    public function testIsInvalidLength(): void
    {
        $this->expectExceptionMessage("Incorrect values");
        $incorrectParallelogram = new Parallelogram(1, 0, 1);
    }

    public function testIsInvalidWidth(): void
    {
        $this->expectExceptionMessage("Incorrect values");
        $incorrectParallelogram = new Parallelogram(0, 1, 1);
    }
}
