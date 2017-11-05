<?php
/**
 * Created by PhpStorm.
 * User: brynbeaudry
 * Date: 2017-11-02
 * Time: 2:03 PM
 */
if (! class_exists('PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

class TaskTest extends PHPUnit_Framework_TestCase
{
    /**
     * @bbeau
     *
     * command to run test from project root folder:
     *
     * /usr/local/bin/php ./vendor/bin/phpunit
     *
     * check your php is correctly configured by this command
     * ls /usr/local/bin | grep php
     *
     * use one of the results listed or get linux
     *
     * confirm with php -v, in the bin dir
     *
     * Thats all you need.
     * The original test was not very helpful, and would obviously pass with anything if you're using a magic method
     *
     * @bbeau
     *
     */

    /**
     * run with phpunit --bootstrap src/Task.php tests/TaskTest
     */

    private $task;
    private $CI;

    public function setUp()
    {
        // Load CI instance normally
        $this->CI   = &get_instance();
        $this->task = new Task;
    }
    public function testSetId()
    {
        $this->task->Id = -1;
        $this->assertEquals(false, $this->task->Id);

        $this->task->Id = 2;
        $this->assertEquals(true, $this->task->id);
    }
    public function testSetTask()
    {
        $this->task->Task = "fV2MxxW36p7WX0bpCqr6yrJGSkhpMO1tqQudj6nOPjbfasdfsdfay7fJqhU9kUWyNuUEK";
        $this->assertEquals(false, $this->task->Task);

        $this->task->Task = "Blah blah blah";
        $this->assertEquals("Blah blah blah", $this->task->Task);
    }
    public function testSetPriority()
    {
        $this->task->Priority = "Making sure its a number";
        $this->assertEquals(false, $this->task->priority);
        $this->task->Priority = 5;
        $this->assertEquals(false, $this->task->priority);
        $this->task->Priority = 3;
        $this->assertEquals(true, $this->task->priority);
    }
    public function testSetSize()
    {
        $this->task->Size = "Making sure its a number";
        $this->assertEquals(false, $this->task->size);
        $this->task->Size = 5;
        $this->assertEquals(false, $this->task->size);
        $this->task->Size = 3;
        $this->assertEquals(true, $this->task->size);
    }
    public function testSetGroup()
    {
        $this->task->Group = "Making sure its a number";
        $this->assertEquals(false, $this->task->group);
        $this->task->Group = 6;
        $this->assertEquals(false, $this->task->group);
        $this->task->Group = 4;
        $this->assertEquals(true, $this->task->group);
    }
}