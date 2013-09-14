<?php

namespace SVGCreator\Elements;

class Path extends \SVGCreator\Element {

	const TYPE = 'path';

	static protected $mandatoryFields = array();

	protected function validateElementValues() {
		return true;
	}
}