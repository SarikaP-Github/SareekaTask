<?php

namespace Bfg\Task;

trait CustomTrait 
{
    private function isSequential(int $number): bool // this will check number is in sequence or not
    {
        $digits = str_split((string) $number);
        for ($i = 0; $i < count($digits)-1; $i++) {
            if ( ($digits[$i] + 1) != ($digits[$i+1]) ) {
                return false;
            }
        }
        return true;
    }

    private function isRepeating(int $number): bool  // this will check the repeated number 2233
    {
        $digits = str_split((string) $number);
        return count($digits) != count(array_unique($digits));
    }

    private function isPalindrome(int $number): bool // this will check reverse number is equal or not
    {
        $digits = str_split((string) $number);
        return $digits == array_reverse($digits);
    }
}