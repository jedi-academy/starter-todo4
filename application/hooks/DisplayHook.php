<?php
/**
 * Created by PhpStorm.
 * User: brynbeaudry
 * Date: 2017-11-03
 * Time: 2:09 PM
 */

class DisplayHook
{
    public function captureOutput()
    {
        $this->CI =& get_instance();
        $output = $this->CI->output->get_output();

        if (ENVIRONMENT != 'testing') {
            echo $output;
        }
    }
}