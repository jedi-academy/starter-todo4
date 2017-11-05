<?php


if (! class_exists('PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

class TaskListTest extends PHPUnit_Framework_TestCase {
    private $CI;
    private $task;

    public function setUp() {
        //Load CI instance normally
        $this -> CI = &get_instance();
        $this -> task = new Task;
    }

    public function testCollection() {
        $complete = 0;
        $incomplete = 0;

        foreach($this -> task -> all() as $test) {
            if(strcmp($test -> status, "2") === 0) {
                $complete ++;
            } else {
                $incomplete ++;
            }
        }

        $this -> assertGreaterThan($complete, $incomplete);
    }
}