<?php

function getPrimeNumbers($n) {
  $numbers = [];

  $i = 2;

  while(count($numbers) < $n) {
    if(primeCheck($i)) {
      $numbers[] = $i;
    }
    
    $i++;
  }

  return $numbers[array_key_last($numbers)];
}

/**
 * Вспомогательная функция, которая определяет простое число или нет
 */
function primeCheck($number){

  if ($number == 1) return false;
    

  for ($i = 2; $i <= sqrt($number); $i++){

    if ($number % $i == 0) return false;
  }

  return true;
}

var_dump(getPrimeNumbers(1001));