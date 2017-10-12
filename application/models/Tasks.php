<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends CSV_Model {

        /**
         * Ctor
         */
        public function __construct()
        {
                parent::__construct(APPPATH . DATAPATH, 'id');
        }
}
?>
