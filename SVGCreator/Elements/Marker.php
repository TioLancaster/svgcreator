<?php

namespace SVGCreator\Elements;

class Marker extends \SVGCreator\Element {

	public function __construct($attributes = array()) {
		parent::__construct('marker', $attributes);
	}
}