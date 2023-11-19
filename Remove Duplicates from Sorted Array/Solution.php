<?php
function removeDuplicates(&$nums) {
    $numbers = [$nums[0]];
    for($i = 1 ; $i < count($nums); $i++){

        if ($nums === '_'){
            break;
        }

        if($nums[$i] === $nums[$i - 1]){
            continue;
        }

        $numbers[] = $nums[$i];
    }

    $nums = $numbers;
}
$nums = [0,0,1,2,2];
removeDuplicates($nums);

var_dump($nums);