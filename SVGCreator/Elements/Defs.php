<?php

namespace SVGCreator\Elements;

class Defs extends \SVGCreator\Element {

	const TYPE = 'defs';

	static protected $mandatoryFields = array();

	protected function validateElementValues() {
		return true;
	}
}