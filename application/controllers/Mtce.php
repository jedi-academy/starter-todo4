<?php
/**
 * Maintenance controller displays pages under the /mtce target link.
 * Displays all tasks with statuses using view fragments.
 */
class Mtce extends Application {
        /**
         * Displays the Maintenance landing page.
         * Uses the itemlist.php and oneitem.php view fragements to display all tasks.
         */
        public function index()
        {
                $this->data['pagetitle'] = 'TODO List Maintenance';
                $tasks = $this->tasks->all(); // get all the tasks

                // substitute the status name
                foreach ($tasks as $task)
                        if (!empty($task->status))
                                $task->status = $this->app->status($task->status);

                // build the task presentation output
                $result = '';   // start with an empty array        
                foreach ($tasks as $task)
                        $result .= $this->parser->parse('oneitem',(array)$task,true);

                // and then pass them on
                $this->data['display_tasks'] = $result;
                $this->data['pagebody'] = 'itemlist';
                $this->render();
        }

}