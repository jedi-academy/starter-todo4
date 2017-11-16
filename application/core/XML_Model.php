<?php

/**
 * CSV-persisted collection.
 * 
 * @author		JLP
 * @copyright           Copyright (c) 2010-2017, James L. Parry
 * ------------------------------------------------------------------------
 */
class XML_Model extends Memory_Model
{
//---------------------------------------------------------------------------
//  Housekeeping methods
//---------------------------------------------------------------------------
		protected $xml = null;
		protected $id = str();
		protected $priority = str();
		protected $task = str();
		protected $size = str();
		protected $group = str();
		protected $deadline = str();
		protected $status = str();
		protected $flag = str();
	/**
	 * Constructor.
	 * @param string $origin Filename of the XML file
	 * @param string $keyfield  Name of the primary key field
	 * @param string $entity	Entity name meaningful to the persistence
	 */
	function __construct($origin = null, $keyfield = 'id', $entity = null)
	{
		parent::__construct();

		// guess at persistent name if not specified
		if ($origin == null)
			$this->_origin = get_class($this);
		else
			$this->_origin = $origin;

		$this->xml = simplexml_load_file($this->_origin);

		// remember the other constructor fields
		$this->_keyfield = $keyfield;
		$this->_entity = $entity;
		

		// start with an empty collection
		$this->_data = array(); // an array of objects
		// and populate the collection
		$this->load();
	}

	/**
	 * Load the collection state appropriately, depending on persistence choice.
	 * OVER-RIDE THIS METHOD in persistence choice implementations
	 */
	protected function load()
	{
		//---------------------
		foreach ($this->xml->task as $task => $desc) {
			// build object from a row
			$record = new stdClass();
			foreach ($task->atttibutes() as $key => $value) {
				$record->$$key = $value;
			}
				$record->$task = $desc;
			$task= $record;
			array_push($this->_data, $record);
		}
					
		// --------------------
		// rebuild the keys table
		$this->reindex();
	}

	/**
	 * Store the collection state appropriately, depending on persistence choice.
	 * OVER-RIDE THIS METHOD in persistence choice implementations
	 */
	protected function store()
	{
		// rebuild the keys table
		$this->reindex();
		//---------------------
		if (($handle = fopen($this->_origin, "w")) !== FALSE)
		{
			fputcsv($handle, $this->_fields);
			foreach ($this->_data as $key => $record)
				fputcsv($handle, array_values((array) $record));
			fclose($handle);
		}
		// --------------------
	}

}
