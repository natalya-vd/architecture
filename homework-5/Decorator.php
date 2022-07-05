<?php
interface IComponent {
  public function operation(): string;
}

class Component implements IComponent {
  public function operation(): string
  {
    return '';
  }
}

class Decorator implements IComponent {
  protected $component;

  public function __construct(IComponent $component) {
    $this->component = $component;
  }

  public function operation(): string
  {
    return $this->component->operation();
  }
}

class SMS extends Decorator {
  public function operation(): string
  {
    return $this->component->operation() . 'Логика отправки по SMS';
  }
}

class Email extends Decorator {
  public function operation(): string
  {
    return $this->component->operation() . 'Логика отправки по Email';
  }
}

class ChromeNotification extends Decorator {
  public function operation(): string
  {
    return $this->component->operation() . 'Логика отправки Chrome Notification';
  }
}

$notNotification = new Component();

$smsNotification = new SMS(new Component);
$smsAndEmailNotification = new Email(new SMS(new Component));