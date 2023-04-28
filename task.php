<?php

$arr = [4, 2, 3, 1, 6, 1, 3, 4, 1, 2, 3, 4, 6, 4];
$tempArr = $arr;
$priorityArr = [];
sort($tempArr);

$length = count($arr);
$count = $length ? 1 : 0;
$total = 0;

for ($i = 0; $i < $length; $i++) {

    if ($i != 0 && $tempArr[$i] !== $tempArr[$i - 1]) {
        $count++;
    }
    $priorityArr[$tempArr[$i]] = $count;

    $total += $count;
}

echo "Total gift need: " . $total . "<br>";

for ($i = 0; $i < $length; $i++) {
    echo $i . "->" . $arr[$i] . " receive " .  $priorityArr[$arr[$i]] . " gifts.<br>";
}