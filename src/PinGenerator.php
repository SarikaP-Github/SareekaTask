<?php

namespace Bfg\Task;

class PinGenerator
{
    Use CustomTrait;

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

    
}
