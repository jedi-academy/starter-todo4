<?php
/**
 * Created by PhpStorm.
 * User: kunlayakobunnoi
 * Date: 2018-03-03
 * Time: 11:01 PM
 */

class Roles extends Application
{

    public function actor($role = ROLE_GUEST)
    {
        $this->session->set_userdata('userrole',$role);
        redirect($_SERVER['HTTP_REFERER']); // back where we came from
    }

}