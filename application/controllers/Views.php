<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Views extends Application
{
    public function index()
    {
        $this->data['pagetitle'] = 'Ordered TODO List';
        $tasks = $this->tasks->all();
        $this->data['content'] = "Ok";
        $this->data['leftside'] = $this->makePrioritizedPanel($tasks);
        $this->data['rightside'] = $this->makeCategorizedPanel($tasks);

        $this->render('template_secondary');
    }

    function makePrioritizedPanel($tasks)
    {
        foreach ($tasks as $task)
        {
            if ($task->status != 2)
                $undone[] = $task;
        }

        usort($undone, "orderByPriority");

        foreach ($undone as $task)
        {
            $task->priority = $this->app->priority($task->priority);
            $converted[] = (array) $task;
        }

        $params = ['display_tasks' => $converted];
        return $this->parser->parse('by_priority', $params, true);
    }

    function makeCategorizedPanel($tasks)
    {
        $params = ['display_tasks' => $this->tasks->getCategorizedTasks()];
        return $this->parser->parse('by_category', $params, true);
    }
}

function orderByPriority($a, $b)
{
    return $b->priority - $a->priority;
}
