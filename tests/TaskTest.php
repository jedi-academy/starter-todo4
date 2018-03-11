<?php

use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{

  private $CI;

        function setUp()
        {
                $this->CI = &get_instance();
                $this->CI->load->model('task');
                $this->item = new Task();
        }

        // Check if task name is longer than 30 characters
        function testSetTask()
        {
            $expected = 'A Task name cannot be longer than 30 characters';
            $this->task->setId(1);
            $this->task->setTask($expected);
            $this->assertEquals($expected, $this->task->task);
        }

}
