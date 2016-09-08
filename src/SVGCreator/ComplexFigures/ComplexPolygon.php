<?php

namespace SVGCreator\ComplexFigures;

class ComplexPolygon {

	private $element;

	/**
	 * The constructor of the complex poligon
	 * 
	 * @param integer 	 $centerX       	The x coordinate of the center of the polygon in pixels
	 * @param integer 	 $centerY       	The y coordinate of the center of the polygon in pixels
	 * @param integer 	 $radius        	The radius of the polygon in pixels
	 * @param integer 	 $numberOfSides 	The number of sides the polygon has
	 * @param array  	 $attributes    	The attributes to add to the element
	 * 
	 */
	public function __construct($centerX, $centerY, $radius, $numberOfSides, $attributes = array()) {


	    // Create the polygon element
		$this->element = new \SVGCreator\Elements\Polygon();

		$this->element->setAttributes($attributes);

		$pointsData = '';

		for ( $i = 0; $i < $numberOfSides; $i++ ) {
			// Calculate every point of the polygon based on:
			// http://stackoverflow.com/questions/3436453/calculate-coordinates-of-a-regular-polygons-vertices
			// We subtract 90º or PI/2 because we want that one of the points always stays pointed up
			$x = $centerX + ($radius * cos((2 * M_PI * $i / $numberOfSides ) - ( M_PI / 2 )));
			$y = $centerY + ($radius * sin((2 * M_PI * $i / $numberOfSides ) - ( M_PI / 2 )));
			$pointsData .= " ". $x . "," . $y;
		}
		
		$this->element->attr('points', $pointsData);
	}

	/**
	 * Returns the element
	 * @return \SVGCreator\Elements\Line
	 */
	public function getElement() {
		return $this->element;
	}
}