<?php

include "./task-1/randArray.php";

function LinearSearch ($myArray, $num) {
  $count = count($myArray);
  $n = 0;

  for ($i=0; $i < $count; $i++) {
    $n++;

    if ($myArray[$i] == $num) {
      echo "Количество итераций линейного поиска: $n" . PHP_EOL;
      return $i;
    } elseif ($myArray[$i] > $num) {
      echo "Ничего не найдено. Количество итераций линейного поиска: $n" . PHP_EOL;
      return null;
    };
  }
  echo "Поиск достиг конца массива. Ничего не найдено. Количество итераций линейного поиска: $n" . PHP_EOL;
  return null;
}

function binarySearch ($myArray, $num) {
  $left = 0;
  $right = count($myArray) - 1;
  $n = 0;

  while ($left <= $right) {
    $n++;
    $middle = floor(($right + $left)/2);

    if ($myArray[$middle] == $num) {
      echo "Количество итераций быстрого поиска: $n" . PHP_EOL;
      return $middle;
    }
    elseif ($myArray[$middle] > $num) {
      $right = $middle - 1;
    }
    elseif ($myArray[$middle] < $num) {
      $left = $middle + 1;
    }
  }

  echo "Ничего не найдено. Количество итераций быстрого поиска: $n" . PHP_EOL;
  return null;
}

function InterpolationSearch($myArray, $num) {
  $start = 0;
  $last = count($myArray) - 1;
  $n = 0;

  while (($start <= $last) && ($num >= $myArray[$start])
  && ($num <= $myArray[$last])) {
    $n++;

    $pos = floor($start + (
    (($last - $start) / ($myArray[$last] - $myArray[$start]))
    * ($num - $myArray[$start])
    ));

    if ($myArray[$pos] == $num) {
      echo "Количество итераций интерполяционного поиска: $n" . PHP_EOL;
      return $pos;
    }

    if ($myArray[$pos] < $num) {
      $start = $pos + 1;
    }
    else {
      $last = $pos - 1;
    }
  }

  echo "Ничего не найдено. Количество итераций интерполяционного поиска: $n" . PHP_EOL;
  return null;
}

$arr = _randArray(2000);
sort($arr);
LinearSearch($arr, 200);

binarySearch($arr, 200);

InterpolationSearch($arr, 200);