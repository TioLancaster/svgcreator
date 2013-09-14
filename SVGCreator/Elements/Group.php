<?php

/**
 * Group Class
 *
 * @package    SVGCreator
 * @subpackage Elements
 * @author     Sérgio Diniz
 * @version    1.0
 */

namespace SVGCreator\Elements;

class Group extends \SVGCreator\Element {

	const TYPE = \SVGCreator\Element::GROUP;

	static protected $mandatoryFields = array(
    									
    								);

	protected function validateElementValues() {
		return true;
	}
}