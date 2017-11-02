<?php
class Task extends Entity {
    protected   $id,
                $task,
                $priority,
                $size,
                $group,
                $deadline,
                $status,
                $flag;

    //id,task,priority,size,group,deadline,status,flag
    public function __construct(){

    }

    public function setId($value) {
        if($value < 0) {
            throw new Exception("Garbage, no negative Id's allowed");
        }
        $this->id = $value;
    }

    public function setTask($value) {
        if(!ctype_alpha(str_replace(' ', '', $value))) {
            throw new Exception("Garbage, only spaces and alphanumeric characters allowed");
        }
        if(strlen($value) >= 64) {
            throw new Exception("Garbage, only 64 characters max!");
        }
        $this->task = $value;
    }

    public function setPriority($value) {
        if(!is_numeric($value)) {
            throw new Exception("Garbage, only integers allowed!");
        }
        if($value >= 4) {
            throw new Exception("Garbage, only a priority of less than 4 allowed");
        }
        $this->priority = $value;
    }

    public function setSize($value) {
        if(!is_numeric($value)) {
            throw new Exception("Garbage, only integers allowed!");
        }
        if($value >= 4) {
            throw new Exception("Garbage, only a size of less than 4 allowed");
        }
        $this->size = $value;
    }

    public function setGroup($value) {
        if(!is_numeric($value)) {
            throw new Exception("Garbage, only integers allowed!");
        }
        if($value >= 5) {
            throw new Exception("Garbage, only a group of less than 5 allowed");
        }
        $this->group = $value;
    }

    public function setDeadline($value) {
        $this->deadline = $value;
    }

    public function setStatus($value) {
        $this->status = $value;
    }

    public function setFlag($value) {
        $this->flag = $value;
    }
}