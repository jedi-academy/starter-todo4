<?php
/**
 * Created by PhpStorm.
 * User: benjamin
 * Date: 2017-11-02
 * Time: 10:00 AM
 */
if (! class_exists('PHPUnit_Framework_TestCase'))
{
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}
class CITestTaskList extends PHPUnit_Framework_TestCase {

    private $CI;

    public function setUp() {
        // Load CI instance normally
        $this->CI = &get_instance();
    }
    public function testUncompleted() {
        $data = (new Tasks())->all();
        $total = count($data);
        $undone = 0;
        foreach ($data as $task)
        {
            if ($task->status != 2)
                $undone++;
        }
        $this->assertGreaterThan($total-$undone, $undone);
    }
}