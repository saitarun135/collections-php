<?php

$left = [1=>true, 5=>true, 7=>true];
$right = [6=>true, 7=>true, 8=>true, 9=>true];

$union = $left + $right;
$intersection = array_intersect_assoc($left, $right);

var_dump($left, $right, $union, $intersection);
?>