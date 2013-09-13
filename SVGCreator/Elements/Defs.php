<?php

namespace SVGCreator\Elements;

class Defs extends \SVGCreator\Element {

	public function __construct($attributes = array()) {
		parent::__construct('defs', $attributes);
	}
}