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
        $this->task = new $this->CI->task;
        //var_dump($this->task);
    }
    public function testSetId()
    {
        $this->task->Id = -1;
        $this->assertEquals(false, $this->task->id, "Can't set negative numbers");

        $this->task->Id = 2;
        $this->assertEquals(true, $this->task->id, "Can set positive numbers");
    }
    public function testSetTask()
    {
        $this->task->Task = "fVMxxWcfgdhfgpWXbpCqryrJGSkhpMdfbfbtqQudjdfbdnOPjbfasdfsdfaydfbfJqhUkUWyNuUEK";
        var_dump($this->task);
        $this->assertEquals(false,
            $this->task->task,
            "Can't set 69 characters, or over 63 characters");

        $this->task->Task = "blah blah blah";
        var_dump($this->task);
        $this->assertEquals(true,
            $this->task->task,
            "Can set spaces in the description");
    }
    public function testSetPriority()
    {
        $this->task->Priority = "Making sure its a number";
        $this->assertEquals(false, $this->task->priority, "Must be numeric");
        $this->task->Priority = 5;
        $this->assertEquals(false, $this->task->priority, "Must be numeric and >=4");
        $this->task->Priority = 3;
        $this->assertEquals(true, $this->task->priority, "Must be numeric and >=4");
    }
    public function testSetSize()
    {
        $this->task->Size = "Making sure its a number";
        $this->assertEquals(false, $this->task->size, "Must be numeric");
        $this->task->Size = 5;
        $this->assertEquals(false, $this->task->size, "Must be numeric and >=4");
        $this->task->Size = 3;
        $this->assertEquals(true, $this->task->size, "Must be numeric and >=4");
    }
    public function testSetGroup()
    {
        $this->task->Group = "Making sure its a number";
        $this->assertEquals(false, $this->task->group, "Must be numeric");
        $this->task->Group = 6;
        $this->assertEquals(false, $this->task->group,"Must be numeric and >=5");
        $this->task->Group = 4;
        $this->assertEquals(true, $this->task->group, "\"Must be numeric and >=5");
    }
}