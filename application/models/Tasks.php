<?php

/**
* Task Model
*/

class Tasks extends XML_Model{

  private $CI; // use this to reference the CI instance
  public function __construct() {
      parent::__construct(APPPATH . '../data/tasks.xml', 'id');
      $this->CI = &get_instance(); // retrieve the CI instance
  }

  /**
  * Gets all of the tasks, orders them by category,
  * and returns the sorts list of tasks
  */
  function getCategorizedTasks()
  {
    // extract the undone tasks
    foreach ($this->all() as $task)
    {
      if ($task->status != 2)
      $undone[] = $task;
    }

    // substitute the category name, for sorting
    foreach ($undone as $task)
    $task->group = $this->CI->app->group($task->group); // use CI to get at the app model

    // order them by category
    usort($undone, array("Tasks","orderByCategory"));

    // convert the array of task objects into an array of associative objects
    foreach ($undone as $task)
    $converted[] = (array) $task;

    return $converted;
  }

  // return -1, 0, or 1 of $a's category name is earlier, equal to, or later than $b's
  function orderByCategory($a, $b)
  {
    if ($a->group < $b->group)
    return -1;
    elseif ($a->group > $b->group)
    return 1;
    else
    return 0;
  }

  // provide form validation rules
  public function rules()
  {
    $config = array(
      ['field' => 'task', 'label' => 'TODO task', 'rules' => 'alpha_numeric_spaces|max_length[64]'],
      ['field' => 'priority', 'label' => 'Priority', 'rules' => 'integer|less_than[4]'],
      ['field' => 'size', 'label' => 'Task size', 'rules' => 'integer|less_than[4]'],
      ['field' => 'group', 'label' => 'Task group', 'rules' => 'integer|less_than[5]'],
    );
    return $config;
  }

  // Get completed tasks number.
  function getCompletedTask()
  {
    $completed = 0;
    foreach ($this->all() as $task)
    {
      if ($task->status == 2)
      {
        $completed++;
      }
    }

    return $completed;
  }
  // Get uncompleted tasks number.
  function getUncompletedTask()
  {
    $uncompleted = 0;
    foreach ($this->all() as $task)
    {
      if ($task->status != 2)
      {
        $uncompleted++;
      }
    }

    return $uncompleted;
  }

}
