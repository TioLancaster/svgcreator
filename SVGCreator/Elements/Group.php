<?php

namespace SVGCreator\Elements;

class Group extends \SVGCreator\Element {

	public function __construct($attributes = array()) {
		parent::__construct('g', $attributes);
	}
}