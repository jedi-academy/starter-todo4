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

        function testBadIdThrowExcept() {
            $this->expectException('InvalidArgumentException');
            $this->item->id = null;
        }

        function testIdTooLongThrowExcept() {
            $expected = 12345678910;
            $this->expectException('Exception');
            $this->item->id = $expected;
        }

        function testValidTask() {
            $expected = 'This is a valid task';
            $this->item->task = $expected;
            $this->assertEquals($expected, $this->item->task);
        }

        function testBadTaskThrowExcept() {
            $this->expectException('Exception');
            $this->item->task = null;
        }

        function testTaskTooLongThrowExcept() {
            $expected = 'This task name will be too long!!! This task name will be too long!!! This task name will be too long!!!';
            $this->expectException('Exception');
            $this->item->task = $expected;
            //$this->assertEquals($expected, $this->item->task);
        }

        function testValidPriority()
        {
            $expected = 1;
            $this->item->priority = $expected;
            $this->assertEquals($expected, $this->item->priority);
            $expected = 2;
            $this->item->priority = $expected;
            $this->assertEquals($expected, $this->item->priority);
            $expected = 3;
            $this->item->priority = $expected;
            $this->assertEquals($expected, $this->item->priority);
        }

        function testPriorityTooSmall()
        {
            $this->expectException('Exception');
            $this->item->priority = 0;
        }

        function testPriorityTooBig()
        {
            $this->expectException('Exception');
            $this->item->priority = 4;
        }

        function testValidSize()
        {
            $expected = 1;
            $this->item->size = $expected;
            $this->assertEquals($expected, $this->item->size);
            $expected = 2;
            $this->item->size = $expected;
            $this->assertEquals($expected, $this->item->size);
            $expected = 3;
            $this->item->size = $expected;
            $this->assertEquals($expected, $this->item->size);
        }

        function testSizeTooSmall()
        {
            $this->expectException('Exception');
            $this->item->size = 0;
        }

        function testSizeTooBig()
        {
            $this->expectException('Exception');
            $this->item->size = 4;
        }

        function testValidGroup()
        {
            $expected = 1;
            $this->item->group = $expected;
            $this->assertEquals($expected, $this->item->group);
            $expected = 2;
            $this->item->group = $expected;
            $this->assertEquals($expected, $this->item->group);
            $expected = 3;
            $this->item->group = $expected;
            $this->assertEquals($expected, $this->item->group);
            $expected = 4;
            $this->item->group = $expected;
            $this->assertEquals($expected, $this->item->group);
        }

        function testGroupTooSmall()
        {
            $this->expectException('Exception');
            $this->item->group = 0;
        }

        function testGroupTooBig()
        {
            $this->expectException('Exception');
            $this->item->group = 5;
        }

        function testValidDeadline() {
            $expected = 20180101;
            $this->item->deadline = $expected;
            $this->assertEquals($expected, $this->item->deadline);
        }

        function testDeadlineTooLongThrowExcept() {
            $this->expectException('Exception');
            $this->item->deadline = 2018010101;
        }

        function testDeadlineHasCharThrowExcept() {
            $expected = "Jan 1 2017";
            $this->expectException('Exception');
            $this->item->deadline = $expected;
        }

        function testValidStatus()
        {
            $expected = 1;
            $this->item->status = $expected;
            $this->assertEquals($expected, $this->item->status);
            $expected = 2;
            $this->item->status = $expected;
            $this->assertEquals($expected, $this->item->status);
        }

        function testStatusTooSmall()
        {
            $this->expectException('Exception');
            $this->item->status = 0;
        }

        function testStatusTooBig()
        {
            $this->expectException('Exception');
            $this->item->status = 3;
        }

        function testValidFlag()
        {
            $expected = 1;
            $this->item->flag = $expected;
            $this->assertEquals($expected, $this->item->flag);
        }

        function testInvalidFlag()
        {
            $this->expectException('Exception');
            $this->item->flag = 30;
        }
}
