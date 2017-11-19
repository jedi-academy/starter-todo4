<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Helpme extends Application
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/
	 * 	- or -
	 * 		http://example.com/welcome/index
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->data['pagetitle'] = 'Help Wanted!';
        $stuff = file_get_contents('../data/jobs.md');
        $this->data['content'] = $this->parsedown->parse($stuff);
        $this->render();
    }

    public function substituteMarkDown($filepath, $parameters){
        $stuff = file_get_contents($filepath);
        $htmlstuff = $this->parsedown->parse($stuff);
        $this->data['content'] = $this->parser->parseString($htmlstuff,$parameters,true);
        $this->render('template-secondary');
    }

    public function markdownToHTML($filepath, $parameters){
        $stuff = file_get_contents($filepath);
        $mdstuff = $this->parser->parseString($stuff,$parameters,true);
        $this->data['content'] = $this->parsedown->parse($mdstuff);
        $this->render('template-secondary');
    }

}
