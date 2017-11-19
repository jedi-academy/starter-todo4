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

		// remember the other constructor fields
		$this->_keyfield = $keyfield;
		$this->_entity = $entity;
		$this->_fields = array();
		

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
        if(file_exists($this->_origin)) {
            $data = simplexml_load_file($this->_origin);
            foreach ($data->children() as $item)
            {
                // build object from a row
                $record = new stdClass();
                foreach($item->attributes() as $key => $value) {
                    $record->{$key} = (string) $value;
                }
                $record->task = (string) $item[0];
                $key = $record->{$this->_keyfield};
                $this->_data[$key] = $record;
            }
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
        if(file_exists($this->_origin))
        {
            $xml = new DOMDocument( "1.0");
            $xml->preserveWhiteSpace = false;
            $xml->formatOutput       = true;
            $xml_data = $xml->createElement(get_class($this));

            foreach($this->_data as $key => $record)
            {
                $xml_item  = $xml->createElement("task", htmlspecialchars($record->task));
                foreach($record as $field => $value)
                {
                    if($field != "task") {
                        $xml_item->setAttribute($field, $value);
                    }
                }
                $xml_item->setAttribute("deadline", null);
                $xml_item->setAttribute("flag", null);
                $xml_data->appendChild($xml_item);
            }
            $xml->appendChild($xml_data);
            $xml->save($this->_origin);
        }
		// --------------------
	}

}
