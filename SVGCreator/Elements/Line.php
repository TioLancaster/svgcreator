<?php

namespace SVGCreator\Elements;

class Line extends \SVGCreator\Element {

	const TYPE = 'line';

	static protected $mandatoryFields = array(
    									'x1',
    									'y1',
    									'x2',
    									'y2'
    								);

	protected function validateElementValues() {
		// Iterate over all fields
    	foreach ( self::$mandatoryFields as $field ) {
    		// If the field does not exist then exit with exception
    		if ( array_key_exists($field, $this->attributes) ) {
    			$value = (int) $this->attributes[$field];
    			if ( $value < 0 ) {
    				throw new \Exception("The ".$field." value is lesser than 0, in element ".self::TYPE, 1);
    			}
    		}
    	}
	}
}