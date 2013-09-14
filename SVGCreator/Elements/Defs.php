<?php

/**
 * Defs Class
 *
 * @package    SVGCreator
 * @subpackage Elements
 * @author     Sérgio Diniz
 * @version    1.0
 */

namespace SVGCreator\Elements;

class Defs extends \SVGCreator\Element {

	const TYPE = 'defs';

	static protected $mandatoryFields = array();

	protected function validateElementValues() {
		return true;
	}
}