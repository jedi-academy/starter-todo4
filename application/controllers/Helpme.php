<?php
/**
 * Created by PhpStorm.
 * User: kunlaya
 * Date: 2018-02-14
 * Time: 2:19 PM
 */
class Helpme extends Application
{

    public function index()
    {
        $this->data['pagetitle'] = 'Help Wanted!';
        $stuff = file_get_contents('../data/jobs.md');
        $this->data['content'] = $this->parsedown->parse($stuff);
        $this->render();
    }

}