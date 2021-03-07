<?php

include_once "vendor\autoload.php";

use App\classes\ComplexNumber;
use App\classes\ComplexArray;
use App\classes\ComplexAction;

$number = new ComplexNumber('-0.1i +  2');
$number2 = new ComplexNumber('2+3i');

$complexArray = new ComplexArray();
$complexArray->add($number);
$complexArray->add($number2);

echo ComplexAction::sum($complexArray) . '<br>';
echo ComplexAction::minus($complexArray) . '<br>';
echo ComplexAction::multiply($complexArray) . '<br>';
echo ComplexAction::division($complexArray) . '<br>';
