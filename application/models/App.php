<?php

/**
 * Domain-specific lookup tables
 */
class App extends CI_Model
{

    public function flag($which = null) {
        return isset($which) ?
            (isset($this->flags[$which]) ? $this->flags[$which] : '') :
            $this->flags;
    }

    public function group($which = null) {
        return isset($which) ?
            (isset($this->groups[$which]) ? $this->groups[$which] : 'Unknown') :
            $this->groups;
    }

    public function priority($which = null) {
        return isset($which) ?
            (isset($this->priorities[$which]) ? $this->priorities[$which] : 'Unknown') :
            $this->priorities;
    }

    public function size($which = null) {
        return isset($which) ?
            (isset($this->sizes[$which]) ? $this->sizes[$which] : 'Unknown') :
            $this->sizes;
    }

    public function status($which = null) {
        return isset($which) ?
            (isset($this->statuses[$which]) ? $this->statuses[$which] : '') :
            $this->statuses;
    }

	public function __construct()
	{
		parent::__construct();
	}


}
