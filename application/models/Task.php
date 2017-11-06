<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Task
 *
 * @author Andrew
 */
class Task extends Entity {
   private $task, $priority, $size, $group;
   
   public function setTask($value)
   {
       if (is_string($value))
           $this->task = $value;
       return $this->task;
   }
   
   public function setPriority($value)
   {
       if (is_int($value) && $value <= 3 && $value > 0)
           $this->priority = $value;
       return $this->priority;
   }
   
   public function setSize($value)
   {
       if (is_int($value) && $value <= 3 && $value > 0)
           $this->size = $value;
       return $this->size;
   }
   
   public function setGroup($value)
   {
       if (is_int($value) && $value <= 4 && $value > 0)
           $this->group = $value;
       return $this->group;
   }
}
