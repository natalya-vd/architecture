<?php

interface IStrategy {
  public function requestPayment();
  public function responsePayment();
}

class paymentQiwi implements IStrategy {
  public function requestPayment() {
    echo 'Отправка запроса оплаты в платежную систем Qiwi';
  }
  public function responsePayment() {
    echo 'Ответ от платежной системы Qiwi';
  }
}

class paymentYandex implements IStrategy {
  public function requestPayment() {
    echo 'Отправка запроса оплаты в платежную систем Yandex';
  }
  public function responsePayment() {
    echo 'Ответ от платежной системы Yandex';
  }
}

class paymentWebMoney implements IStrategy {
  public function requestPayment() {
    echo 'Отправка запроса оплаты в платежную систему WebMoney';
  }
  public function responsePayment() {
    echo 'Ответ от платежной системы WebMoney';
  }
}

class Payment {
  private $strategy;

  public function __construct(IStrategy $strategy) {
    $this->strategy = $strategy;
  }

  public function setStrategy(IStrategy $strategy) {
    $this->strategy = $strategy;
  }

  public function paymentProcessing(){
    echo 'Какая-то логика до оплаты';
    $this->strategy->requestPayment();
    $this->strategy->responsePayment();
    echo 'Какая-то логика после получения ответ аплатежной системы';
  }
}