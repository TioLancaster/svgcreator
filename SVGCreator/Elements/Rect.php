<?php

namespace SVGCreator\Elements;

class Rect extends \SVGCreator\Element {

	public function __construct($attributes = array()) {
		parent::__construct('rect', $attributes);
	}
}