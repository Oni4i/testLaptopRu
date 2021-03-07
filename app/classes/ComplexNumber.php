<?php

namespace App\classes;

class ComplexNumber
{
    protected $numbers;

    public function __construct($complexNumber)
    {
        $this->numbers = $this->process($complexNumber);
    }

    public static function createFromNumbers($iNumber, $number)
    {
        $str = '';

        if ((float)$number > 0) {
            $str = $iNumber . '+' . (float)$number;
        } else {
            $str = $iNumber . (float)$number;
        }

        return new ComplexNumber($str);
    }


    public function __toString()
    {
        $str = '';

        if ((float)$this->numbers[1] > 0) {
            $str = $this->numbers[0] . '+' . (float)$this->numbers[1];
        } else {
            $str = $this->numbers[0] . (float)$this->numbers[1];
        }

        return $str;
    }

    protected function process($complexNumber)
    {
        $complexNumber = str_replace(' ', '', $complexNumber);

        $firstNumber = $this->getPartWithI($complexNumber);
        $startIndex = strpos($complexNumber, $firstNumber);
        if ($startIndex === 0) {
            $secondNumber = substr($complexNumber, strlen($firstNumber));
        } else {
            $secondNumber = substr($complexNumber, 0, $startIndex);
        }

        return [$firstNumber, $secondNumber];
    }

    protected function getPartWithI($complexNumber)
    {
        $number = '';
        for ($i = 0; $i < strlen($complexNumber); $i++) {
            $char = $complexNumber[$i];

            if ($char === 'i') {

                for ($j = $i-1; $j >= 0; $j--) {
                    $char2 = $complexNumber[$j];

                    if (intval($char2) || $char2 == '0' || $char2 == '.' || $char2 == ',' ) {
                        $last = $j;
                    } else if (in_array($char2, ['+', '-'])) {
                        $last -= 1;
                        break;
                    }
                }

                $number = substr($complexNumber, $last, $i - $last + 1);
                break;
            }
        }

        return $number;
    }

    public function get()
    {
        return $this->numbers;
    }
}