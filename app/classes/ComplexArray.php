<?php

namespace App\classes;

use App\classes\ComplexNumber;
use Iterator;

class ComplexArray implements Iterator
{
    public $numbers = [];

    public function add(ComplexNumber $number)
    {
        $this->numbers[] = $number;
    }

    public function remove($index)
    {
        if (key_exists($index, $this->numbers)) {
            unset($this->numbers[$index]);
        }
    }

    public function get($index)
    {
        if (key_exists($index, $this->numbers)) {
            return $this->numbers[$index];
        }

        return null;
    }

    public function length()
    {
        return count($this->numbers);
    }

    public function rewind()
    {
        reset($this->numbers);
    }

    public function current()
    {
        $var = current($this->numbers);
        return $var;
    }

    public function key()
    {
        $var = key($this->numbers);
        return $var;
    }

    public function next()
    {
        $var = next($this->numbers);
        return $var;
    }

    public function valid()
    {
        $key = key($this->numbers);
        $var = ($key !== NULL && $key !== FALSE);
        return $var;
    }
}