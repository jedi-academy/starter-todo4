<?php

class Task extends Entity {
  public $id;
  public $task;
  public $priority;
  public $size;
  public $group;
  public $deadline;
  public $status;
  public $flag;

  // insist that an ID be present
  public function setId($value) {
    if (empty($value))
    throw new InvalidArgumentException('An Id must have a value');
    if (strlen($value) > 10)
    throw new Exception('An ID cannot be longer than 10 characters');
    $this->id = $value;
  }

  // insist that a task be present and no longer than 30 characters
  public function setTask($task) {
    if (empty($task))
    throw new Exception('A Task name cannot be empty');
    if (strlen($value) > 30)
    throw new Exception('A Task name cannot be longer than 30 characters');
    $this->task = $value;
  }

  // insist that priority is between 1 and 3
  public function setPriority($value) {
    $allowed = ['1', '2', '3'];
    if (!in_array($value, $allowed))
    throw new Exception('Must be a value from 1 to 3');
    $this->priority = $value;
  }

  // insist that size is between 1 and 3
  public function setSize($value) {
    $allowed = ['1', '2', '3'];
    if (!in_array($value, $allowed))
    throw new Exception('Must be a value from 1 to 3');
    $this->size = $value;
  }

  // insist that groups is between 1 and 4
  public function setGroup($value) {
    $allowed = ['1', '2', '3', '4'];
    if (!in_array($value, $allowed))
    throw new Exception('Must be a value from 1 to 3');
    $this->group = $value;
  }

  // insist that a a deadline is at least 8 digits
  public function setDeadline($value) {
    if (strlen($value) > 8)
    throw new Exception('An date deadline cannot be longer than 8 digit');
    if( !isNumeric($value))
    throw new Exception('An date deadline must be numeric');
    $this->deadline = $value;
  }

  // insist that status is either 1 or 2
  public function setStatus($value) {
    $allowed = ['1', '2'];
    if (!in_array($value, $allowed))
    throw new Exception('Must be a value from 1 to 3');
    $this->priority = $value;
  }

  // insist that flag must be set to 1 or not
  public function setFlag($value) {
    if (strlen($value) != 1)
    throw new Exception('Flag value must be 1');
    $this->flag = $value;
  }

}
