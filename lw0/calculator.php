<?php

function calculator($str): string
{
    if ((!isCorrect($str)) ) {
        return "error";
    }
    $defCharacters = array("+", "*", "-", "/");
    $defDigits = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
    $str1 = str_replace($defCharacters, " ", $str);
    $digits_array = explode(" ", $str1);
    $str1 = str_replace($defDigits, " ", $str);
    $str1 = trim(str_replace("  ", " ", $str1));
    $str1 = trim(str_replace("  ", " ", $str1));
    $str1 = trim(str_replace("  ", " ", $str1));
    $str1 = trim(str_replace("  ", " ", $str1));
    $str1 = str_replace(" ", ".", $str1);
    $characters_array = explode(".", $str1);
    $amountDigits = count($digits_array);

    if ($amountDigits > 5) {
        return "Characters > 5";
    }
    $answer = intval($digits_array[0]);
    for ($i = 0; $i < $amountDigits - 1; $i++) {
        switch ($characters_array[$i]) {
            case "+":
                $answer = $answer + intval($digits_array[$i + 1]);
                break;

            case "-":
                $answer = $answer - intval($digits_array[$i + 1]);
                break;

            case "*":
                $answer = $answer * intval($digits_array[$i + 1]);
                break;

            case "/":
                $answer = $answer / intval($digits_array[$i + 1]);
                break;

            default:
                throw new Exception('Incorrect character');
                break;
        }
    }
    return $answer;
}

function isCorrect($str): bool
{
    return !(strlen(preg_replace('/[^a-za-яё]/ui', '', $str)) > 0);
}


print("Input: {$argv[1]}" . "\n\n");
print(calculator($argv[1]));
