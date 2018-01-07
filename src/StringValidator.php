<?php namespace Saiks;


class StringValidator
{
    public static function validateString(String $inputString) : bool {

        if(empty($inputString)) {
            throw new \InvalidArgumentException('Empty argument');
        }

        $re = '/[^() \n\r\t]/';
        $matches = preg_match_all($re, $inputString, $matches, PREG_SET_ORDER, 0);
        if(!empty($matches)) {
            throw new \InvalidArgumentException('The argument contains invalid characters');
        }

        $counter = 0;
        $inputCharsArray = str_split($inputString);
        foreach ($inputCharsArray as $char) {
            if($char === '(') {
                $counter++;
            } elseif ($char === ')') {
                $counter--;
            }
        }

        return $counter === 0;
    }
}