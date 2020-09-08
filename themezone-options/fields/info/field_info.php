<?php
class Themezone_Options_info extends Themezone{

	/**
	 * Constructor
	 */
	function __construct( $field = array(), $value = '', $prefix = false ){

		$this->field = $field;
		$this->value = $value;

		// theme options 'opt_name'
		$this->prefix = $prefix;

	}

	/**
	 * Render
	 */
	function render( $meta = false ){
		if( isset( $this->field['desc'] ) ){
			echo '<p class="zn-field-info">'. $this->field['desc'] .'</p>';
		}
	}

}
