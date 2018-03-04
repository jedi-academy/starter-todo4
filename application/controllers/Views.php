<?php

/**
 * Views controller
 */
class Views extends Application
{

    public function index()
    {
        $this->data['pagetitle'] = 'Ordered TODO List';
        $tasks = $this->tasks->all();   // get all the tasks
        $this->data['content'] = 'Ok'; // so we don't need pagebody
        $this->data['leftside'] = $this->makePrioritizedPanel($tasks);
        $this->data['rightside'] = $this->makeCategorizedPanel($tasks);

        $this->render('template_secondary');
    }

    /**
     * Grabs all of the unfinished tasks, order
     * them by high to low priority and returns them
     * @param $tasks to tasks list
     */
    function makePrioritizedPanel($tasks) {

         // extract the undone tasks
        foreach ($tasks as $task)
        {
            if ($task->status != 2)
                $undone[] = $task;
        }
        usort($undone, array("Views","orderByPriority"));
        // substitute the priority name
        foreach ($undone as $task)
            $task->priority = $this->app->priority($task->priority);

        // convert the array of task objects into an array of associative objects
        foreach ($undone as $task)
            $converted[] = (array) $task;

        // and then pass them on
        $parms = ['display_tasks' => $converted];
        $role = $this->session->userdata('userrole');
        $parms['completer'] = ($role == ROLE_OWNER) ? '/views/complete' : '#';
        return $this->parser->parse('by_priority', $parms, true);
    }

    // return -1, 0, or 1 of $a's priority is higher, equal to, or lower than $b's
    function orderByPriority($a, $b)
    {
        if ($a->priority > $b->priority)
            return -1;
        elseif ($a->priority < $b->priority)
            return 1;
        else
            return 0;
    }

    /**
     * Uses models/Tasks.php getCategorizedTasks method to get a list of
     * Tasks ordered by category
     */
    function makeCategorizedPanel($tasks)
    {
        $parms = ['display_tasks' => $this->tasks->getCategorizedTasks()];
        $role = $this->session->userdata('userrole');
        $parms['completer'] = ($role == ROLE_OWNER) ? '/views/complete' : '#';
        return $this->parser->parse('by_category', $parms, true);
    }

    // complete flagged items
    function complete() {
            // loop over the post fields, looking for flagged tasks
            foreach($this->input->post() as $key=>$value) {
                    if (substr($key,0,4) == 'task') {
                            // find the associated task
                            // MORE COMING HERE
                    }
            }
            $this->index();
    }

}
