<?php

namespace SVGCreator\Elements;

class Group extends \SVGCreator\Element {

	const TYPE = 'g';

	static protected $mandatoryFields = array(
    									
    								);

	protected function validateElementValues() {
		return true;
	}
}