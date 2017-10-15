<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{
        /**
         * Constructs an instance of the Welcome class.
         * 
         * Initializes $this->data['remaining_tasks']
         *  to the appropriate number of tasks.
         */
        function __construct()
        {
            parent::__construct();
            
            $tasks = $this->tasks->all();   // get all the tasks

            // count how many are not done
            $count = 0;
            foreach($tasks as $task) {
                    if ($task->status != 2) $count++;
            }
            // and save that as a view parameter
            $this->data['remaining_tasks'] = $count;
        }
         /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/
	 * 	- or -
	 * 		http://example.com/welcome/index
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            $this->data['pagebody'] = 'homepage';
            $this->render(); 
	}
        
        public function display_tasks()
        {
            $tasks = $this->tasks->all();   // get all the tasks
            
            // process the array in reverse, until we have five
            $count = 0;
            foreach(array_reverse($tasks) as $task) {
                $display_tasks[] = (array) $task;
                $count++;
                if ($count >= 5) break;
            }
            $this->data['display_tasks'] = $display_tasks;
        }

}
