<?php

abstract class Command {
  protected $app;
  protected $editor; 
  protected $backup;

  public function __construct(Application $app, Editor $editor) {
    $this->app = $app;
    $this->editor = $editor;
  }

  public function saveBackup() {
    $this->backup = $this->editor->getText();
  }

  public function undo() {
    $this->editor->setText($this->backup);
  }

    abstract function execute();
}

// Конкретные команды.
class CopyCommand extends Command {
  public function execute() {
    $this->app->clipboard = $this->editor->getSelection();
    return false;
  }
}

class CutCommand extends Command {
  public function execute() {
    $this->saveBackup();
    $this->app->clipboard = $this->editor->getSelection();
    $this->editor->deleteSelection();
    return true;
  }
}

class PasteCommand extends Command {
  public function execute() {
    $this->saveBackup();
    $this->editor->replaceSelection($this->app->clipboard);
    return true;
  }
}

class UndoCommand extends Command {
  public function execute() {
    $this->app->undo();
    return false;
  }
}

class CommandHistory {
  private $history;

  public function push(Command $command) {
    $this->history[] = $command;
}

  public function pop():Command {
    return array_pop($this->history);
  }
}

class Editor {
  private $text;

  public function getSelection() {
    // Вернуть выбранный текст.
  }
  public function deleteSelection() {
    // Удалить выбранный текст.
  }

  public function replaceSelection($text) {
    // Вставить текст из буфера обмена в текущей позиции.
  }

  public function getText() {
    return $this->text;
  }

  public function setText($text) {
    $this->text = $text;
  }
}

class Application {
  protected $clipboard;
  protected $editors;
  protected $activeEditor;
  protected $history;

  public function createUI() {
    //Привязываем конкретные команды к классам с UI интерфейсом
  }

  public function executeCommand($command) {
    if ($command->execute()) {
      $this->history->push($command);
    }
  }

  public function undo() {
    $command = $this->history->pop();
    if ($command != null) {
      $command->undo();
    }
  }
}
