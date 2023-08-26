<?php

class IntToRome
{
    const ROME = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1
    ];

    /**
     * @param Integer $num
     * @return String
     */
    function letterCombinations(int $num): string
    {
        $rome = '';

        if ($num <= 0 || $num >= 4000) {
            return 'Введи другое число';
        }
        foreach (self::ROME as $romeNum) {
            while ($num >= $romeNum) {
                $rome .= array_search($romeNum, self::ROME);
                $num -= $romeNum;
            }
        }
        return $rome;
    }
}