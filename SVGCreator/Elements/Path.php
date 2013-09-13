<?php

namespace SVGCreator\Elements;

class Path extends \SVGCreator\Element {

	public function __construct($attributes = array()) {
		parent::__construct('path', $attributes);
	}
}