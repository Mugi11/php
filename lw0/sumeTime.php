<?php

function sumTime($firstTime, $secondTime): string
{

    if ((!checkCorrectTime($firstTime)) || (!checkCorrectTime($secondTime))) {
        return "error";
    }
    $firstArray = explode(':', $firstTime);

    $secondArray = explode(':', $secondTime);
    $tempSecs = intval($firstArray[2]) + intval($secondArray[2]);
    $tempMins = intval($firstArray[1]) + intval($secondArray[1]);
    $tempHours = intval($firstArray[0]) + intval($secondArray[0]);
    if ($tempSecs >= 60) {
        $tempMins += intval($tempSecs / 60);
        $tempSecs = $tempSecs % 60;
    }
    if ($tempMins >= 60) {
        $tempHours += intval($tempMins / 60);
        $tempMins = $tempMins % 60;
    }
    if ($tempHours >= 24) {
        $tempHours = $tempHours % 24;
    }
    return ('Результат: ' . $tempHours . ':' . $tempMins . ':' . $tempSecs);
}

function checkCorrectTime($inputString): bool
{
    $patternString = "1234567890:";
    for ($i = 0; $i < strlen($inputString); $i++) {

        if (strpos($patternString, $inputString[$i]) === false) {
            return false;
        }
    }
    return true;
}

print(sumTime($argv[1], $argv[2]));
