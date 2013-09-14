<?php

namespace SVGCreator;

class SVGCreator {
	
	private $element;

	const RECT = 'rect';
	const CIRCLE = 'circle';
	const SVG = 'svg';

	public function __construct($width, $height) {
		$this->element = $this->factoryElement(\SVGCreator\SVGCreator::SVG);
		$this->element->attr('width', $width);
		$this->element->attr('height', $height);
	}

	/**
	 * Appends a new element to the main element
	 * @param  mixed 	 			$element   An element of type \SVGCreator\Element or an string with the type of the element to add
	 * @return \SVGCreator\Element  		   The element just added
	 */
	public function append($element) {
		if ( true === $element instanceof \SVGCreator\Element ) {
			$this->element->append($element);
			return $element;
		} else {
			$element = $this->factoryElement($element);
			$this->element->append($element);
			return $element;
		}
	}

	/**
	 * Factory for building the several elements available
	 * @param  string  			 $type 			The type of element to build
	 * @return \SVGCreator\Element
	 */
	private function factoryElement($type) {
		switch ( $type ) {
			case \SVGCreator\SVGCreator::RECT:
				return new \SVGCreator\Elements\Rect();
				break;
			case \SVGCreator\SVGCreator::CIRCLE:
				return new \SVGCreator\Elements\Circle();
				break;
			case \SVGCreator\SVGCreator::SVG:
				return new \SVGCreator\Elements\Svg();
				break;
			default:
				throw new \Exception("The tag ".$type." is not implemented yet", 1);
		}
	}

	/**
	 * Returns the string of the element
	 * @return string
	 */
	public function getString() {
		return $this->element->getString();
	}

	/**
	 * Writes the element to a file
	 * @return string
	 */
	public function saveAs($filename) {
		return $this->element->saveElementAsFile($filename);
	}

}