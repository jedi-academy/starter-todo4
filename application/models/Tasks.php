<?php
/**
 * Created by PhpStorm.
 * User: Eric Lin
 * Date: 2017-10-12
 * Time: 12:50 PM
 */

class Tasks extends CSV_Model {

    public function __construct()
    {
        parent::__construct(APPPATH . '../data/tasks.csv', 'id');
    }
}