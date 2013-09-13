<?php

namespace SVGCreator\Elements;

class Line extends \SVGCreator\Element {

	public function __construct($attributes = array()) {
		parent::__construct('line', $attributes);
	}
}