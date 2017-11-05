<?php

if (! class_exists('PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

class TaskTest extends PHPUnit_Framework_TestCase
{
    private $CI;
    private $task;
    public function setUp()
    {
        // Load CI instance normally
        $this->CI = &get_instance();
    }

    public function testInvalidPriority(){
        $myPriority = -1;
        $this->task->Priority = $myPriority;
        $this->assertEquals($this->task->getPriority(), $myPriority);
    }

    public function testInvalidTaskLength(){
        $myLength = "bob bob bob bob bob bob bob bob bob bob bob bob bob bob bob bob bob bob bob bob";
        $this->task->Task = $myLength;
        $this->assertEquals($this->task->getTask(), $myLength);
    }

    public function testValidPriority(){
        $myPriority = 3;
        $this->task->Priority = $myPriority;
        $this->assertEquals($this->task->getPriority(), $myPriority);
    }

}