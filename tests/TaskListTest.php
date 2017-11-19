<?php
if (! class_exists('PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}
class TaskListTest extends PHPUnit_Framework_TestCase
{
    private $CI;
    private $tasks;
    public function setUp()
    {
        $this -> CI = &get_instance();
        $this->tasks = new Tasks;
    }
    function testUncompletedTasks()
    {
        $completed = 0;
        $uncompleted = 0;
        foreach ($this->tasks->all() as $task) {
            if (strcmp($task->status, "2") === 0) {
                $completed += 1;
            } else {
                $uncompleted += 1;
            }
        }
        $this->assertLessThan($uncompleted, $completed);
    }
}