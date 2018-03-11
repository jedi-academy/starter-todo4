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

        function testValidId() {
            $expected = 123;
            $this->item->id = $expected;
            $this->assertEquals($expected, $this->item->id);
        }
}
