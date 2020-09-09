<?php
class Themezone_Options_switch extends Themezone{

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

		// class ----------------------------------------------------
		if( isset( $this->field['class']) ){
			$class = $this->field['class'];
		} else {
			$class = 'regular-text';
		}

		// name -----------------------------------------------------
		if( $meta ){

			// page mata & builder existing items
			$name = 'name="'. $this->field['id'] .'"';

		} else {

			// theme options
			$name = 'name="'. $this->prefix .'['. $this->field['id'] .']"';

		}

		// echo -----------------------------------------------------
		echo '<div class="zn-switch-field">';

			// fix for value "off = 0"
			if( ! $this->value ){
				$this->value = 0;
			}

			// fix for WordPress 3.6 meta options
			if( strpos( $this->field['id'] ,'[]' ) === false ){
				echo '<input type="hidden" '. $name .' value="0" />';
			}

			echo '<input type="checkbox" data-toggle="switch" id="'. $this->field['id'] .'" '. $name .' '. $class .' value="1" '. checked( $this->value, 1, false ) .' />';

			if( isset( $this->field['desc'] ) ){
				echo '<span class="description btn-desc">'. $this->field['desc'] .'</span>';
			}

		echo '</div>';
	}

	/**
	 * Enqueue
	 */
	function enqueue(){
		wp_enqueue_script( 'zn-opts-field-switch-js', THEME_URI .'fields/switch/field_switch.js', array('jquery'), THEME_VERSION, true );
	}

}
