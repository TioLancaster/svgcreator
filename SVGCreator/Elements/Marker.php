<?php

/**
 * Marker Class
 *
 * @package    SVGCreator
 * @subpackage Elements
 * @author     Sérgio Diniz
 * @version    1.0
 */

namespace SVGCreator\Elements;

class Marker extends \SVGCreator\Element {

	const TYPE = 'marker';

	static protected $mandatoryFields = array();

	protected function validateElementValues() {
		return true;
	}
}