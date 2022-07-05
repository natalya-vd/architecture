<?php

//Реализовать удаление элемента массива по его значению. Обратите внимание на возможные дубликаты!
function removeElement($array, $value) {
  return array_diff($array, [$value]);
}

$arr = [1, 54, 8, 12, 54, 6, 9, 9];

var_dump(removeElement($arr, 54));