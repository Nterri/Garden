<?php

function filter(array $array)
{
    for ($i = 0; $i < count($array) - 1; $i++) {
        for ($j = $i + 1; $j < count($array); $j++) {
            $left = strtotime($array[$i][6]);
            $right = strtotime($array[$j][6]);
            if ($left < $right) {
                $middle = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $middle;
            }
        }
    }
    return $array;
}