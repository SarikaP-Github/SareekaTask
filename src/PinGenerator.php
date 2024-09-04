<?php

namespace Bfg\Task;

class PinGenerator
{
    
    public function generate(int $totalNumberOfPin = 4, int $length = 4): array
    {
        $pins = [];
        
        while (count($pins) < $totalNumberOfPin) {
            $min = pow(10, $length);
            $max = pow(10, $length+1) - 1;
            
            $pin = rand($min, $max);
            
            // Check for sequential numbers
            if ($this->isSequential($pin)) {
                continue;
            }
            
            // Check for repeating numbers
            if ($this->isRepeating($pin)) {
                continue;
            }
            
            // Check for palindromes
            if ($this->isPalindrome($pin)) {
                continue;
            }
            
            // Check uniqueness
            if (in_array($pin, $pins)) {
                continue;
            }
            
            $pins[] = $pin;
        }
        return $pins;
        
    }

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
