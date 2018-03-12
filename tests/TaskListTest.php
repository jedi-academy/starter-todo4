<?php

use PHPUnit\Framework\TestCase;

class TaskListTest extends TestCase
{
  private $CI;

  function setUp()
  {
    $this->CI = &get_instance();
    $this->CI->load->model('tasks');
    $this->tasks = new Tasks();
  }

  // Test if collection has more uncompleted tasks than completed ones
  public function testListSize()
  {
    $completed = $this->tasks->getCompletedTask();
    $uncompleted = $this->tasks->getUncompletedTask();
    $this->assertLessThan($uncompleted, $completed);
  }

}
