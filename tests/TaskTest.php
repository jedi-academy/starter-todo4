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
        $this -> CI = &get_instance();
        $this -> task = new Task;
    }

    public function testSetTask(){
        $this -> task -> task = "Finish Lab 7";
        $this -> assertEquals("Finish Lab 7", $this -> task -> task);

        $this -> task -> task = "bob bob bob bob bob bob bob bob bob bob bob bob bob bob bob bob bob bob bob bob";
        $this -> assertEquals("bob bob bob bob bob bob bob bob bob bob bob bob bob bob bob bob bob bob bob bob", $this -> task -> task);
    }

    public function testSetPriority(){
        $this -> task -> priority = "a string which is false";
        $this->assertEquals(false, $this -> task -> priority);

        $this -> task -> priority = 500;
        $this->assertEquals(false, $this -> task -> priority);

        $this -> task -> priority = 2;
        $this->assertEquals(true, $this -> task -> priority);
    }

    public function testSetSize() {
        $this -> task -> size = "a string which is false";
        $this->assertEquals(false, $this -> task -> size);

        $this -> task -> size = 500;
        $this->assertEquals(false, $this -> task -> size);

        $this -> task -> size = 2;
        $this->assertEquals(true, $this -> task -> size);
    }

    public function testSetGroup() {
        $this -> task -> group = "a string which is false";
        $this->assertEquals(false, $this -> task -> group);

        $this -> task -> group = 500;
        $this->assertEquals(false, $this -> task -> group);

        $this -> task -> group = 2;
        $this->assertEquals(true, $this -> task -> group);
    }
}