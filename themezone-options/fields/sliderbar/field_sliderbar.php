<?php
class Themezone_Options_sliderbar extends Themezone{

	/**
	 * Constructor
	 */
	function __construct( $field = array(), $value ='', $prefix = false ){

		$this->field = $field;
		$this->value = $value;

		// theme options 'opt_name'
		$this->prefix = $prefix;

	}

	/**
	 * Render
	 */
	function render(){

		// theme options
		$name = 'name="'. $this->prefix .'['. $this->field['id'] .']"';

 		// parameters
		if( isset( $this->field['param'] ) ){
			$param = $this->field['param'];
		} else {
			$param = false;
		}

		$min 	= isset( $param['min'] ) ? $param['min'] : 1;
		$max 	= isset( $param['max'] ) ? $param['max'] : 100;


		// echo -----------------------------------------------------
		echo '<div class="zn-slider-field clearfix">';

			echo '<div id="'. $this->field['id'] .'_sliderbar" class="sliderbar" rel="'. $this->field['id'] .'" data-min="'. $min .'" data-max="'. $max .'"></div>';

			echo '<input type="number" class="sliderbar_input" min="'. $min .'" max="'. $max .'" id="'. $this->field['id'] .'" '. $name .' value="'. esc_attr( $this->value ) .'"/>';

			echo '<div class="range">'. $min .' - '. $max .'</div>';

			if( isset( $this->field['desc'] ) ){
				echo '<span class="description">'. $this->field['desc'] .'</span>';
			}

		echo '</div>';

	}

	/**
	 * Enqueue
	 */
	function enqueue(){
		wp_enqueue_style( 'zn-opts-jquery-ui-css' );
		wp_enqueue_script( 'zn-opts-field-sliderbar-js', THEME_ZONE_URI.'fields/sliderbar/field_sliderbar.js', array('jquery', 'jquery-ui-core', 'jquery-ui-slider' ), THEME_VERSION, true );
	}
}
