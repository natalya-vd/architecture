<?php

interface ISubject {
  public function addObserver(IObserver $observer);
  public function removeObserver(IObserver $observer);
  public function notifyObserver($job);
}

interface IObserver {
  public function update($job);
}

class JobExchange implements ISubject {
  private $observers;
  private $jobsList;

  public function __construct()
  {
    $this->observers = [];
    $this->jobsList = [];
  }

  public function addObserver(IObserver $observer){
    $this->observers[] = $observer;
  }

  public function removeObserver(IObserver $observer){
    unset($this->observers[array_search($observer, $this->observers)]);
  }

  public function notifyObserver($job) {
    foreach ($this->observers as $observer) {
      $observer->update($job);
    }
  }

  public function addJob($job) {
    $this->jobsList[] = $job;
    $this->notifyObserver($job);
  }
}

class User implements IObserver {
  private $name;
  private $email;
  private $workExperience;
  private $jobExchange;

  public function __construct(ISubject $jobExchange)
  {
    $this->jobExchange = $jobExchange;
    $jobExchange->addObserver($this);
  }

  public function update($job)
  {
    $this->sendMessage($job);
  }

  private function sendMessage($job) {
    echo 'Отправили на почиту ' . $this->email . 'данные о вакансии: ' . $job;
  }
}
