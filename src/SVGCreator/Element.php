<?php

/**
 * Main Element Class
 *
 * @package    SVGCreator
 * @subpackage my-subpackage
 * @author     Sérgio Diniz
 * @version    1.0
 */

namespace SVGCreator;

abstract class Element {

	const CIRCLE = 'circle';
	const DEFS = 'defs';
	const GROUP = 'g';
	const LINE = 'line';
	const MARKER = 'marker';
	const PATH = 'path';
	const RECT = 'rect';
	const SVG = 'svg';

	/**
	 * The array that holds all attributes
	 * @var array
	 */
	protected $attributes;

	/**
	 * The string that has all the element as a string
	 * @var string
	 */
	protected $elementString;

	/**
	 * Array with the child elements
	 * @var \SVGCreator\Element[]
	 */
	protected $childElements;

	/**
	 * Definitons array
	 * @var array
	 */
	private $defs;

	public function __construct($attributes = array()) {

		// Setup the private variables
		$this->attributes = $attributes;
		$this->elementString = '';
		$this->childElements = array();
		$this->defs = array();
	}

	/**
	 * Returns the defs array for this element
	 * @return array
	 */
	protected function getDefs() {
		return $this->defs;
	}

	/**
	 * Set's the definition array
	 * @param array 
	 * @return \SVGCreator\Element
	 */
	protected function setDefs($defs = array()) {
		$this->defs = $defs;
		return $this;
	}

	/**
	 * Adds an def element to the element
	 * @param \SVGCreator\Element $def
	 * @return \SVGCreator\Element
	 */
	public function addDef(\SVGCreator\Element $def) {
		$this->defs[] = $def;
		return $def;
	}

	abstract protected function validateElementValues();

	private function validateElement() {
		$this->validateMandatoryAttribs();
		$this->validateElementValues();
	}

	protected function validateMandatoryAttribs() {
		// Iterate over all fields
    	foreach ( static::$mandatoryFields as $field ) {
    		// If the field does not exist then exit with exception
    		if ( !array_key_exists($field, $this->attributes) ) {
    			throw new \SVGCreator\SVGException("The field ".$field." does not exist for ".static::TYPE.".", 1);
    		}
    	}
	}

	/**
	 * Set's an attribute for the current element
	 * @param  mixed 	 $attrKey		The name of the attribute
	 * @param  string    $attrValue		The value of the attribute
	 * @return mixed 					Could be an \SVGCreator\Element or could be the value of the attribute, 
	 * this means that the second parameter wasn't passed
	 */
	public function attr($attrKey, $attrValue = null) {
		if ( $attrValue != null ) {
			if ( !is_array($this->attributes) ) {
				$this->attributes = array();
			}
			$this->attributes[$attrKey] = $attrValue;
			return $this;
		} else {
			if ( array_key_exists($attrKey, $this->attributes) ) {
				return $this->attributes[$attrKey];
			} else {
				return null;
			}
		}
		
	}

	/**
	 * Factory for building the several elements available
	 * @param  string  			 $type 			The type of element to build
	 * @return \SVGCreator\Element
	 */
	private function factoryElement($type) {
		switch ( $type ) {
			case \SVGCreator\Element::CIRCLE:
				return new \SVGCreator\Elements\Circle();
				break;
			case \SVGCreator\Element::DEFS:
				return new \SVGCreator\Elements\Defs();
				break;
			case \SVGCreator\Element::GROUP:
				return new \SVGCreator\Elements\Group();
				break;
			case \SVGCreator\Element::LINE:
				return new \SVGCreator\Elements\Line();
				break;
			case \SVGCreator\Element::MARKER:
				return new \SVGCreator\Elements\Marker();
				break;
			case \SVGCreator\Element::PATH:
				return new \SVGCreator\Elements\Path();
				break;
			case \SVGCreator\Element::RECT:
				return new \SVGCreator\Elements\Rect();
				break;
			case \SVGCreator\Element::SVG:
				return new \SVGCreator\Elements\Svg();
				break;
			default:
				throw new \SVGCreator\SVGException("The tag ".$type." is not implemented yet", 1);
				break;
		}
	}

	/**
	 * Appends an element to the current element
	 * @param  mixed            	$element 	The element to append to this element could be an object \SVGCreator\Element or a string of the type to create
	 * @return \SVGCreator\Element 				The element append
	 */
	public function append($element) {
		if ( true === $element instanceof \SVGCreator\Element ) {
			$this->childElements[] = $element;
			return $element;
		} else {
			$elementCreated = $this->factoryElement($element);
			$this->childElements[] = $elementCreated;
			return $elementCreated;
		}
	}

	/**
	 * Returns the element string
	 * @return string  				Returns the element string
	 */
	public function getString() {
		// Validate the element first of all!
		$this->validateElement();

		// Start writing the tag
		$elementStringData = '';
		$elementStringData = '<' . static::TYPE;
		foreach ( $this->attributes as $key => $data ) {
			$elementStringData .= ' ' . $key.'="'.$data.'"';
		}

		// If it has child elements we have to write them!
		if ( count($this->childElements) > 0 ) {
			// No self closing tag since we have child elements
			$elementStringData .= '>';

			// See if there are definitions to put if the type is svg this is run here
			// because the definition area should be the first to appear!
			if  ( static::TYPE == 'svg' ) {
				foreach ( $this->childElements as $childElement ) {
					// Let's get the definitions array from the child element and propagate them to the top!
					$this->defs = array_merge($this->defs, $childElement->getDefs());
				}

				// If there are definitions to add then add them
				if ( count($this->defs) > 0 ) {
					// Create the defs area
					$defArea = new \SVGCreator\Elements\Defs();
					foreach ( $this->defs as $def ) {
						// Append all elements to def area
						$defArea->append($def);
					}
					// Get the defarea xml
					$elementStringData .= $defArea->getString();
				}
			}

			// Iterate trough each element and write it's child element
			foreach ( $this->childElements as $childElement ) {
				$elementStringData .= $childElement->getString();
			}

			// Close the tag
			$elementStringData .= '</' . static::TYPE . '>';
		} else {
			// Self closing tag, since there are no child elements!
			$elementStringData .= '/>';
		}

		$this->elementString = $elementStringData;

		return $this->elementString;
	}

	/**
	 * Saves the element as a file
	 * @param  string 	$fileName 	The filename with path to save
	 * @return string 				Returns the filename or false on failure
	 */
	public function saveElementAsFile($fileName) {
		// Get the element string
		$this->getString();
		if ( false === file_put_contents($fileName, $this->elementString) ) {
			return false;
		} else {
			return $fileName;
		}
	}
}