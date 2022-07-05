<?php

function maxDivisor($n) {
  $divisors = [];

  $i = 2;

  while($i**2 <= $n) {
    while($n % $i == 0) {
      $n = $n / $i;

      $divisors[] = $i;
    }
    
    $i++;
  }

  if($n > 1) {
    $divisors[] = $n;
  }

  return $divisors[array_key_last($divisors)];
}

var_dump(maxDivisor(600851475143));

// Cамый большой делитель числа 600851475143, являющийся простым числом равен 6857