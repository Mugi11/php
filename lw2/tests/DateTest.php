<?php

require_once ('src/Date.php');

use PHPUnit\Framework\TestCase;

class DateTest extends TestCase
{
    private Date $date;

    public function setUp(): void
    {
        $this->date = new Date(1, 2, 2001);
    } 

    public function testGetDateOfWeek(): void
    {
        $this->assertEquals($this->date->getDateOfWeek(), "Thursday");
    }

    public function testDiffDate(): void
    {
        $secondDate = new Date(1, 4, 2001);
        $this->assertEquals($this->date->diffDay($secondDate), 59);
    }
    
    public function testMinusDay(): void
    {
        $this->assertEquals($this->date->minusDay(445), "14.11.1999");
    }

    public function testFormatRu(): void
    {
        $this->assertEquals($this->date->format('ru'), "1.2.2001");  
    }

    public function testFormatEn(): void
    {
        $this->assertEquals($this->date->format('en'), "2001-2-1");
    }

    public function testUnknownFormat(): void
    {
        $this->assertEquals($this->date->format('rtn'), "Non-existing format");
    }

    public function testIsInvalidInputDay(): void
    {
        $this->expectExceptionMessage("Incorrect Day or Month or Year");
        $incorrectDate = new Date(-445, 12, 2002);   
    }

    public function testIsInvalidInputMonth(): void
    {
        $this->expectExceptionMessage("Incorrect Day or Month or Year");
        $incorrectDate = new Date(4, -845, 2002);   
    }

    public function testIsInvalidInputYeaR(): void
    {
        $this->expectExceptionMessage("Incorrect Day or Month or Year");
        $incorrectDate = new Date(4, 5, 0);   
    }
}