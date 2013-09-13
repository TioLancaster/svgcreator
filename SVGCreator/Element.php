<?php

namespace SVGCreator;

abstract class Element {
	protected $type;
	protected $attributes;
	protected $elementString = '';

	protected $childElements;

	private $allowedTags = array();

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
		$this->elementString = '<'.$this->type;
		foreach ( $this->attributes as $key => $data ) {
			$this->elementString .= ' ' . $key.'="'.$data.'"';
		}
		if ( count($this->childElements) > 0 ) {
			$this->elementString .= '>';
			foreach ( $this->childElements as $childElement ) {
				$this->elementString .= $childElement->getString();
			}
			$this->elementString .= '</'.$this->type.'>';
		} else {
			$this->elementString .= '/>';
		}

		return $this->elementString;
	}

	/**
	 * Saves the element as a file
	 * @param  string 	$fileName 	The filename with path to save
	 * @return string 				Returns the filename or false on failure
	 */
	protected function saveElementAsFile($fileName) {
		$this->getString();
		if ( false === file_put_contents($file, $this->elementString) ) {
			return false;
		} else {
			return $fileName;
		}
	}
}