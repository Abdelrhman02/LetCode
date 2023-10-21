<?php

class Solution

{

    /**
     * @param int[] $cost
     * @return int
     */
    public function minCostClimbingStairs(array $cost): int
    {
        $n = count($cost);

        $dp = array_fill(0, $n, 0);

        $dp[0] = $cost[0];
        $dp[1] = $cost[1];

        for ($i = 2; $i < $n; $i++) {

            $dp[$i] = $cost[$i] + min($dp[$i - 1], $dp[$i - 2]);
        }

        return min($dp[$n - 1], $dp[$n - 2]);
    }
}

$solution = new Solution();
echo $solution->minCostClimbingStairs([10, 4, 12, 44, 12]);