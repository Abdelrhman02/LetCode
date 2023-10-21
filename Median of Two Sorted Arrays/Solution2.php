<?php

class Solution2
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
        $size1 = count($array1);
        $size2 = count($array2);

        if ($array1[$size1 - 1] < $array2[0]) {
            return [...$array1, ...$array2];
        }

        if ($array1[0] > $array2[$size2 - 1]) {
            return [...$array2, ...$array1];
        }

        return $this->binarySearchInsert($array1, $array2, 0, intval($size1 / 2));
    }

    private function binarySearchInsert(array $array1, array $array2): array|int
    {
        if (empty($array1)) {
            return $array2;
        }

        if (empty($array2)) {
            return $array1;
        }

        if ($array1[0] < $array2[0]) {
            $result = [$array1[0]];
            $result = array_merge($result, $this->binarySearchInsert(array_slice($array1, 1), $array2));
        } else {
            $result = [$array2[0]];
            $result = array_merge($result, $this->binarySearchInsert($array1, array_slice($array2, 1)));
        }

        return $result;
    }

}


$solution = new Solution2();
echo $solution->findMedianSortedArrays([1, 2, 3, 8, 10, 12, 14, 15, 16], [9, 11, 12]);



