<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Views extends Application
{

    //private $priority;

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
            $this->data['pagetitle'] = 'Ordered TODO List';

            // Get all the tasks
            $tasks = $this->tasks->all();

            // We don't need pagebody
            $this->data['content'] = 'Ok';
            $this->data['leftside'] = $this->makePrioritizedPanel($tasks);
            $this->data['rightside'] = $this->makeCategorizedPanel();
            
            $this->render('template_secondary'); 
	}

        /**
         * Returns the Prioritized Panel 
         * 
         * @param type $tasks array
         * @return prioritized tasks in a panel
         */
        public function makePrioritizedPanel($tasks)
        {
            // extract the undone tasks
            foreach ($tasks as $task) {
                if ($task->status != 2) {
                    $undone[] = $task;
                }
            }
            
            // Order them by priority
            usort($undone, "orderByPriority");
            
            // Substitute the priority name
            foreach ($undone as $task) {
                $task->priority = $this->app->priority($task->priority);
            }

            // Convert the array of task objects into an array of associative objects       
            foreach ($undone as $task) {
                $converted[] = (array) $task;
            }

            // And then pass them on
            $parms = ['display_tasks' => $converted];
            
            $role = $this->session->userdata('userrole');
            $parms['completer'] = ($role == ROLE_OWNER) ? '/views/complete' : '#';
            return $this->parser->parse('by_priority', $parms, true);
        }
        
        /**
         * Returns the Categorized Panel
         * 
         * @return categorized tasks in a panel
         */
        public function makeCategorizedPanel() 
        {
            $parms = ['display_tasks' => $this->tasks->getCategorizedTasks()];
            $role = $this->session->userdata('userrole');
            $parms['completer'] = ($role == ROLE_OWNER) ? '/views/complete' : '#';
            return $this->parser->parse('by_category', $parms, true);
        }
        
        // complete flagged items
        function complete() {
            //prevent from hacking into this without an appropriate role
            $role = $this->session->userdata('userrole');
            if ($role != ROLE_OWNER) redirect('/views');
            // loop over the post fields, looking for flagged tasks
            foreach($this->input->post() as $key=>$value) {
                    if (substr($key,0,4) == 'task') {
                            // find the associated task
                            // THIS is the "more coming" mentioned above
                            $taskid = substr($key,4);
                            $task = $this->tasks->get($taskid);
                            $task->status = 2; // complete
                            $this->tasks->update($task);
                    }
            }
            $this->index();
        }
}

// Return -1, 0, or 1 of $a's priority is higher, equal to, or lower than $b's
function orderByPriority($a, $b)
{
    if ($a->priority > $b->priority) {
        return -1;
    } elseif ($a->priority < $b->priority) {
        return 1;
    } else {
        return 0;
    }
}