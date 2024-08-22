<?php

class Test2
{
    function is_power($number, $base): bool
    {
        if ($number === 1)
        {
            return true;
        }
        if ($base <= 1)
        {
            return $base === $number; // If base is 1 or less, only 1^n can be equal to the number
        }
        $power = $base;
        while ($power <= $number)
        {
            if ($power === $number)
            {
                return true;
            }
            $power *= $base;
        }

        return false;
    }

    function format_number($str)
    {
        return preg_replace('/[^0-9.,]/', '', $str);
    }

    function sum_digits($number):int
    {
        $numberString = strval(abs($number));
        $sum = 0;
        for ($i = 0; $i < strlen($numberString); $i++)
        {
            $sum += intval($numberString[$i]);
        }
        return $sum;
    }
}

$t2 = new Test2();
//echo $t2->is_power(8, 2);
//echo $t2->format_number('"$4,000.15A');
echo $t2->sum_digits(1234);
