<?php

/**
 * Description of TaskTest
 *
 * @author Andrew
 */
class TaskTest extends PHPUnit_Framework_TestCase {

    private $task;

    public function setUp() 
    {
        $this->task = new Task();
    }

    public function testSetValid() 
    {
        $task = $this->task->setTask("Do stuff");
        $size = $this->task->setSize(1);
        $priority = $this->task->setPriority(1);
        $group = $this->task->setGroup(2);
        
        $this->assertEquals("Do stuff", $task);
        $this->assertEquals(1, $size);
        $this->assertEquals(1, $priority);
        $this->assertEquals(2, $group);
    }
    
    public function testSetInvalid()
    {
        $task = $this->task->setTask(20);
        $size = $this->task->setSize(-100);
        $priority = $this->task->setPriority(100);
        $group = $this->task->setGroup(200);
        
        $this->assertNotEquals(20, $task);
        $this->assertNotEquals(-100, $size);
        $this->assertNotEquals(100, $priority);
        $this->assertNotEquals(200, $group);
    }
}
