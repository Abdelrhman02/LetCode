# Min Cost Climbing Stairs

This is a PHP implementation of the "Min Cost Climbing Stairs" problem using dynamic programming.

## Problem Description

You are given an array `cost` where `cost[i]` is the cost of climbing the `i-th` step of a staircase. You can start from either the first step or the second step.

You want to find the minimum cost to reach the top of the floor, and you can either climb one or two steps at a time.

## Solution

This code defines a PHP class `Solution` with a method `minCostClimbingStairs` that takes an array of costs as input and returns the minimum cost to climb the stairs using dynamic programming.

## Usage

To use this code, follow these steps:

1. Create an instance of the `Solution` class:

   ```php
   $solution = new Solution();

This code will output 28, which is the minimum cost to climb the stairs with the given cost array.

Complexity
The time complexity of this solution is O(n), where n is the length of the cost array, and the space complexity is O(n) to store the dynamic programming arra