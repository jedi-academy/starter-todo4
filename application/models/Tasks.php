<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends CSV_Model {            

    // Constructor
    public function __construct()
    {
            parent::__construct(DATAPATH . 'tasks.csv', 'id');
           
    }
    
    // retrieve all of the quotes
    public function all()
    {
            return $this->_data;
    }

    public function count()
    {
        return count($this->_data);
    }
}
