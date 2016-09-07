<?php

	/**
	 * Group Class
	 *
	 * @package    SVGCreator
	 * @subpackage Elements
	 * @author     Sérgio Diniz
	 * @version    1.0
	 */

	namespace SVGCreator\Elements;

	class Group extends \SVGCreator\Element {

		const TYPE = \SVGCreator\Element::GROUP;

		/**
         * Holds the mandatory fields for this element
         * 
         * @var array
         */
		static protected $mandatoryFields = array(
	    									
	    								);
		/**
         * Specific implementation for validation of element values
         *
         * @throws \SVGCreator\SVGException
         * @return void
         */
		protected function validateElementValues() {
		}
	}