<?php
/**
 * Created by PhpStorm.
 * User: JKO
 * Date: 2017-10-12
 * Time: 12:58 PM
 */

/*
 * Constructor for the tasks.csv
 */
class Tasks extends CSV_Model {

    public function __construct()
    {
        parent::__construct(APPPATH . '../data/tasks.csv', 'id');
    }
}