<?php
/**
 * Implements magic setter methods for each property of the Tasks model 
 */
class Task extends Entity {

	/**
	 * Evaluates and sets the Task property
	 */
	public function __setTask($value) 
	{
		if(!ctype_alnum(str_replace(' ', '', $value)))
		{
			throw new Exception("Task contains invalid characters", 1);
		}
		if(strlen($value) > 64)
		{
			throw new Exception("Task exceeds max length", 1);
		}
		$this -> task = $value;
	}

	/**
	 * Evaluates and sets the Priority property
	 */
	public function __setPriority($value) 
	{
		if(!is_int($value))
		{
			throw new Exception("Priority must be an integer", 1);
		}
		if($value < 1 || $value > 4)
		{
			throw new Exception("Priority must be between 1 and 4", 1);
		}
		$this -> task = $value;
	}

	/**
	 * Evaluates and sets the Size property
	 */
	public function __setSize($value) 
	{
		if(!is_int($value))
		{
			throw new Exception("Size must be an integer", 1);
		}
		if($value < 1 || $value > 4)
		{
			throw new Exception("Size must be between 1 and 4", 1);
		}
		$this -> task = $value;
	}

	/**
	 * Evaluates and sets the Group property
	 */
	public function __setGroup() 
	{
		if(!is_int($value))
		{
			throw new Exception("Group must be an integer", 1);
		}
		if($value < 1 || $value > 5)
		{
			throw new Exception("Group must be between 1 and 5", 1);
		}
		$this -> task = $value;
	}
} 