<?php
/*
 * Tasks model for the tasks.csv in data folder
 */
class Tasks extends CSV_Model {

    /*
     * Constructor for tasks.csv model
     */
    public function __construct()
    {
        parent::__construct(APPPATH . '../data/tasks.csv', 'id');
    }

}