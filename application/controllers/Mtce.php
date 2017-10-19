<?php
/**
 * Maintenance controller displays pages under the /mtce target link.
 * Displays all tasks with statuses using view fragments.
 */
class Mtce extends Application {
        /**
         * Displays the Maintenance landing page.
         * Uses the itemlist.php view fragement to display all tasks.
         */
        public function index()
        {
                $this->data['pagetitle'] = 'TODO List Maintenance';
                $tasks = $this->tasks->all(); // get all the tasks

                // substitute the status name
                foreach ($tasks as $task)
                        if (!empty($task->status))
                                $task->status = $this->app->status($task->status);

                // convert the array of task objects into an array of associative objects       
                foreach ($tasks as $task)
                        $converted[] = (array) $task;

                // and then pass them on
                $this->data['display_tasks'] = $converted;
                $this->data['pagebody'] = 'itemlist';
                $this->render();
        }

}