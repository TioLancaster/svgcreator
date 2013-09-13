<?php

namespace SVGCreator\Elements;

class Circle extends \SVGCreator\Element {

	public function __construct($attributes = array()) {
		parent::__construct('circle', $attributes);
	}
}