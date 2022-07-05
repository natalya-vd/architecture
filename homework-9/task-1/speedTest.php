<?php

// Сделала замер массива из 50000 элементов, т.к. на 1000000 было слишком долго...
// Сортировка пузырьком: 113.47301602364
// Шейкерная сортировка: 243.90918779373
// Сортировка пирамидальная SPL: 0.063414812088013
// Сортировка быстрая: 0.17235898971558
// Сортировка из PHP: 0.015971899032593

include 'quickSort.php';
include 'bubble.php';
include 'randArray.php';
include 'shakerSort.php';
include 'heapSplSort.php';

function getArr(): array
{
	return _randArray(50000);
}

$arr = getArr();
$lastIndex = count($arr) - 1;

$start = microtime(true);
bubbleSort($arr);
echo "Сортировка пузырьком: ".( microtime(true) - $start).PHP_EOL;

$arr = getArr();
$start = microtime(true);
shakerSort($arr);
echo "Шейкерная сортировка: ".( microtime(true) - $start).PHP_EOL;

$arr = getArr();
$start = microtime(true);
heapSplSort($arr);
echo "Сортировка пирамидальная SPL: ".( microtime(true) - $start).PHP_EOL;

$arr = getArr();
$start = microtime(true);
quickSort($arr);
echo "Сортировка быстрая: ".( microtime(true) - $start).PHP_EOL;

$arr = getArr();
$start = microtime(true);
sort($arr);
echo "Сортировка из PHP: ".( microtime(true) - $start).PHP_EOL;