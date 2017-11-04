<?php
/**
 * Created by PhpStorm.
 * User: brynbeaudry
 * Date: 2017-11-02
 * Time: 2:03 PM
 */

class TaskTest extends PHPUnit\Framework\TestCase
{
    private $CI;
    private $task;
    public function setUp()
    {
        // Load CI instance normally
        $this->CI =& get_instance();

        $this->CI->load('task');

        var_dump($this->CI->task);

    }
    public function testTaskSetMethods()
    {
        $task = $this->task;
        //exactly 64 chars desc
        $this->assertEquals(true, $this->CI->input->task->setTask('fV2MxxW36p7WX0bpCqr6yrJGSkhpMO1tqQudj6nOPjbfay7fJqhU9kUWyNuUEK6x'), "able to set 64 chacters?");
        /*
        //exactly 63
        $this->assertEquals(true, $this->task='uyVCPdX6AU1kTo4EWyfup0ElEm8kqaKdh0vhDzskRFkjf5kdsDpwp0D8buYQvZ7',"able to set 63 chars?");
        //spaces are escaped
        $this->assertEquals(true, $this->task='fV2MxxW36p7WX0bpCqr6yrJGSkhpMO1tqQudj6nOPjbfay7fJqhU9kUWyNuUEK6     ', "is whitespace sanitized?");
        $this->assertEquals(true, $this->task='abc',"can set non numeric?");
        $this->assertEquals(true, $this->task='123',"can set numeric?");
        $this->assertEquals(true, $this->task=3,'can set 3?');
        $this->assertEquals(true, $this->task=4, 'can set 4?');
        $this->assertEquals(true, $this->task=-1,'can set negative?');
        */

    }
}