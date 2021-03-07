<?php

namespace App\classes;

use App\classes\ComplexArray;

class ComplexAction
{
    public static function sum(ComplexArray $numbers)
    {
        $result = [0, 0];

        foreach ($numbers as $number) {
            $values = $number->get();

            $result[0] += (float)substr($values[0], 0, strlen($values[0]) - 1);
            $result[1] += (float)$values[1];
        }

        $result[0] = (string)$result[0] . 'i';
        $result[1] = (string)$result[1];

        return ComplexNumber::createFromNumbers($result[0], $result[1]);
    }

    public static function minus(ComplexArray $numbers)
    {
        $result = [0, 0];

        foreach ($numbers as $number) {
            $values = $number->get();

            $result[0] -= (float)substr($values[0], 0, strlen($values[0]) - 1);
            $result[1] -= (float)$values[1];
        }

        $result[0] = (string)$result[0] . 'i';
        $result[1] = (string)$result[1];

        return ComplexNumber::createFromNumbers($result[0], $result[1]);
    }

    public static function multiply(ComplexArray $numbers)
    {
        $result = $numbers->get(0)->get();

        for ($i = 1; $i < $numbers->length(); $i++) {
            $values = $numbers->get($i)->get();
            $tmp[1] = (string)(((float)$result[1]) * ((float)$values[1])
                    - ((float)substr($result[0], 0, strlen($result[0]) - 1))
                    * ((float)substr($values[0], 0, strlen($values[0]) - 1)));

            $tmp[0] = (string)(((float)$result[1]) * ((float)substr($values[0], 0, strlen($values[0]) - 1))
                    + ((float)$values[1]) * ((float)substr($result[0], 0, strlen($result[0]) - 1)))
                    . 'i';
            $result = $tmp;
        }

        return ComplexNumber::createFromNumbers($result[0], $result[1]);
    }

    public static function division(ComplexArray $numbers)
    {
        $result = $numbers->get(0)->get();

        for ($i = 1; $i < $numbers->length(); $i++) {
            $values = $numbers->get($i)->get();
            $tmp[1] = (string)((((float)$result[1]) * ((float)$values[1])
                    + ((float)substr($result[0], 0, strlen($result[0]) - 1))
                    * ((float)substr($values[0], 0, strlen($values[0]) - 1)))
                    / (pow(((float)$result[1]), 2) + pow((float)substr($result[0], 0, strlen($result[0]) - 1), 2)));

            $tmp[0] = (string) ((((float)$result[1]) * ((float)substr($values[0], 0, strlen($values[0]) - 1))
                    - ((float)$values[1]) * ((float)substr($result[0], 0, strlen($result[0]) - 1)))
                    / (pow(((float)$result[1]), 2) + pow((float)substr($result[0], 0, strlen($result[0]) - 1), 2)))
                    . 'i';

            $result = $tmp;
        }

        return ComplexNumber::createFromNumbers($result[0], $result[1]);
    }
}