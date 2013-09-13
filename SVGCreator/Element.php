<?php

namespace SVGCreator;

abstract class Element {
	protected $type;
	protected $attributes;
	protected $elementString = '';

	protected $childElements;

	private $allowedTags = array();

	private $defs = array();

	public function __construct($type = '', $attributes = array()) {
		if ( $type == '' ) {
			throw new \Exception("No element type inserted.", 1);
		}

		/**
		 * Set allowed tags
		 */
		$this->allowedTags = array(
									'circle',
									'line',
									'rect',
									'g',
									'svg',
									'path',
									'defs',
									'marker'
								  );

		if ( !in_array($type, $this->allowedTags) ) {
			throw new \Exception("That tag is not implemented yet", 1);
			
		}

		$this->type = $type;
		$this->attributes = $attributes;

		$this->childElements = array();
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
	protected function addDef(\SVGCreator\Element $def) {
		$this->defs[] = $def;
		return $def;
	}

	/**
	 * Set's an attribute for the current element
	 * @param  mixed 	 $attrKey		The name of the attribute
	 * @param  string    $attrValue		The value of the attribute
	 * @return \SVGCreator\Element
	 */
	public function attr($attrKey, $attrValue) {
		if ( !is_array($this->attributes) ) {
			$this->attributes = array();
		}
		$this->attributes[$attrKey] = $attrValue;
		return $this;
	}

	/**
	 * Appends an element to the current element
	 * @param  \SVGCreator\Element 	$element 	The element to append to this element
	 * @return \SVGCreator\Element 				The element append
	 */
	public function append(\SVGCreator\Element $element) {
		$this->childElements[] = $element;
		return $element;
	}

	/**
	 * Returns the element string
	 * @return string  				Returns the element string
	 */
	public function getString() {
		// Start writing the tag
		$elementStringData = '';
		$elementStringData = '<'.$this->type;
		foreach ( $this->attributes as $key => $data ) {
			$elementStringData .= ' ' . $key.'="'.$data.'"';
		}

		// If it has child elements we have to write them!
		if ( count($this->childElements) > 0 ) {
			// No self closing tag since we have child elements
			$elementStringData .= '>';
			foreach ( $this->childElements as $childElement ) {
				// Iterate trough each element and write it's child element
				$elementStringData .= $childElement->getString();
				// Let's get the definitions array from the child element and propagate them to the top!
				$this->defs = array_merge($this->defs, $childElement->getDefs());
			}
			// Close the svg tag
			$elementStringData .= '</'.$this->type.'>';
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