<?php

class Date
{
    private int $day;
    private int $month;
    private int $year;

    function __construct(int $createDay, int $createMonth, int $createYear)
    {
        $tempVariable = strval($createDay) . '.' . strval($createMonth) . '.' . strval($createYear);
        if (!date_create($tempVariable)) {
            throw new Exception("Incorrect Day or Month or Year");
        }
        $this->day = $createDay; // assignment(присвоение)
        $this->month = $createMonth;
        $this->year = $createYear;
    }

    function getDateOfWeek(): string
    {
        return date('l', strtotime($this->format()));
    }

    function diffDay(Date $secondDate): string
    {
        $firstTime = date_create($this->format());
        $secondTime = date_create($secondDate->format());
        $difference = $firstTime->diff($secondTime);
        return $difference->format('%a');   // %а this is a translation to the days format
    }

    function minusDay(int $createDay): string
    {
        return date('j.n.Y', strtotime("-" . $createDay . " days", strtotime($this->format())));
    }

    function format(string $specifiedFormat = 'ru'): string  //-'ru' default value
    {
        switch ($specifiedFormat) {
            case 'ru':
                return "{$this->day}.{$this->month}.{$this->year}";
            case 'en':
                return "{$this->year}-{$this->month}-{$this->day}";
            default:
                return 'Non-existing format';
        }
    }
}
