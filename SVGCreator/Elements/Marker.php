<?php

namespace SVGCreator\Elements;

class Marker extends \SVGCreator\Element {

	const TYPE = 'marker';

	static protected $mandatoryFields = array();

	protected function validateElementValues() {
		return true;
	}
}