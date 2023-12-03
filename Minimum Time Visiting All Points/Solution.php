<?php

class Solution
{

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    public static function minTimeToVisitAllPoints(array $points): int
    {
        $time = 0;
        for ($i = 0; $i < count($points) - 1; $i++) {
            [$x1, $y1] = $points[$i];
            [$x2, $y2] = $points[$i + 1];

            $horizontalTime = abs($x1 - $x2);
            $verticalTime = abs($y1 - $y2);
            $time  += max([$verticalTime, $horizontalTime]);
        }

        return $time;
    }
}

echo  Solution::minTimeToVisitAllPoints([[1,1],[3,4],[-1,0]]);