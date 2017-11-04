<?php
	require_once APPPATH . 'models/Entity.php';

	class Task extends Entity {
		public $task;
		public $priority;
		public $size;
		public $group;

		public setTask($value) {
			if (preg_match('/[^a-zA-Z0-9]/', $value) || strlen($value) =< 64)
				$this->task = $value;
		}
		
		public setPriority($value) {
			if (preg_match('/[^0-9]/', $value) || strlen($value) < 4)
				$this->priority = $value;
		}

		public setSize($value) {
			if (preg_match('/[^0-9]/', $value) || strlen($value) < 4)
				$this->size = $value;
		}

		public setGroup($value) {
			if (preg_match('/[^0-9]/', $value) || strlen($value) < 5)
				$this->group = $value;
		}

	}