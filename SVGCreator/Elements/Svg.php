<?php

namespace SVGCreator\Elements;

class Svg extends \SVGCreator\Element {

	public function __construct($attributes = array()) {
		parent::__construct('svg', $attributes);
	}
}