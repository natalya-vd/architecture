<?php

//Функции из библиотеки
class SquareAreaLib
{
  public function getSquareArea(int $diagonal)
  {
    $area = ($diagonal**2)/2;
    return $area;
  }
}
class CircleAreaLib
{
  public function getCircleArea(int $diagonal)
  {
    $area = (M_PI * $diagonal**2)/4;
    return $area;
  }
}

//Интерфейсы нашего приложения
interface ISquare
{
  function squareArea(int $sideSquare);
}

interface ICircle
{
  function circleArea(int $circumference);
}

class AdapterSquare implements ISquare {
  protected $adaptee;

  public function __construct(SquareAreaLib $adaptee)
  {
    $this->adaptee = $adaptee;
  }

  public function squareArea($sideSquare) {
    $diagonal = $sideSquare*sqrt(2);

    return $this->adaptee->getSquareArea($diagonal);
  }
}

class AdapterCircle implements ICircle {
  protected $adaptee;

  public function __construct(CircleAreaLib $adaptee)
  {
    $this->adaptee = $adaptee;
  }

  public function circleArea($circumference) {
    $diagonal = $circumference*M_PI;

    return $this->adaptee->getCircleArea($diagonal);
  }
}