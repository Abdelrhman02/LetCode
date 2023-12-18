<?php

class Solution
{

    /**
     * @param String $num
     * @return string
     */
    public static function largestGoodInteger(string $num)
    {
        $lastChar = $num[0];
        $limit = 1;
        $biggestSubNum = [];
        for ($i = 1; $i < strlen($num); $i++) {
            $char = $num[$i];

            if ($limit >= 3) {
                $biggestSubNum[] = intval($num[$i - 1]);
                $limit = 0;
            }

            if ($char !== $lastChar) {
                $limit = 1;
                $lastChar = $char;
                continue;
            }

            $limit++;
        }
        if ($limit >= 3) {
            $biggestSubNum[] = intval($lastChar);
        }

        return $biggestSubNum !== [] ? str_repeat(max($biggestSubNum), 3) : '';
    }

}


var_dump(Solution::largestGoodInteger("3200014888"));