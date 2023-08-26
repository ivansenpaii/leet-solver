<?php

class LetterCombinationsPhoneNumber
{
    const BUTTONS = [
        2 => ['a', 'b', 'c'],
        3 => ['d', 'e', 'f'],
        4 => ['g', 'h', 'i'],
        5 => ['j', 'k', 'l'],
        6 => ['m', 'n', 'o'],
        7 => ['p', 'q', 'r', 's'],
        8 => ['t', 'u', 'v',],
        9 => ['w', 'x', 'y', 'z']
    ];

    /**
     * @param String $digits
     * @return String[]
     */
    function letterCombinations(string $digits): array
    {
        $combinations = [];
        if (strlen($digits) <= 0 || strlen($digits) >= 5) {
            return [];
        }

        $this->getCombinations($digits, $i = 0, $comb = '', $combinations);
        return $combinations;
    }

    function getCombinations(string $digits, int $i, string $comb, array &$combinations)
    {
        if (strlen($digits) === $i) {
            return $combinations[] = $comb;
        }

        $digit = $digits[$i];
        $letters = self::BUTTONS[$digit];

        foreach ($letters as $letter) {
            $this->getCombinations($digits, $i+1, $comb . $letter, $combinations);
        }
    }
}

$phoneNumber = new LetterCombinationsPhoneNumber();
$result = $phoneNumber->letterCombinations('23');
print_r($result);