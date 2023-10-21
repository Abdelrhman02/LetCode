<?php

class Solution
{
    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays(array $nums1, array $nums2): float|int
    {
        if (!$nums1 && !$nums2) {
            return 0;
        }

        if (!$nums1) {
            return $this->getTheMedianOfSingleArray($nums2);
        }

        if (!$nums2) {
            return $this->getTheMedianOfSingleArray($nums1);
        }

        return $this->getTheMedianOfTheCombinedArray($nums1, $nums2);
    }

    private function getTheMedianOfSingleArray(array $nums): float|int
    {
        $arraySize = count($nums);

        return match ($arraySize % 2) {
            0 => ($nums[($arraySize / 2)] + $nums[$arraySize / 2 - 1]) / 2,
            1 => $nums[($arraySize - 1) / 2]
        };
    }

    private function getTheMedianOfTheCombinedArray(array $nums1, array $nums2): int|float
    {
        $nums = $this->mergeArray($nums1, $nums2, count($nums1), count($nums2));
        return $this->getTheMedianOfSingleArray($nums);
    }

    private function mergeArray(array $array1, array $array2): int|array
    {
        if (empty($array1)) {
            return $array2;
        }

        if (empty($array2)) {
            return $array1;
        }

        $result = [];

        if ($array1[0] < $array2[0]) {
            $result[] = array_shift($array1);
        } else {
            $result[] = array_shift($array2);
        }

        return array_merge($result, $this->mergeArray($array1, $array2));
    }
}

$solution = new Solution();
echo $solution->findMedianSortedArrays([1, 2, 3, 9], [10, 11, 12]);

