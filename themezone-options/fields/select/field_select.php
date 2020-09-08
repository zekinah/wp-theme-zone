<?php
class Themezone_Options_select extends Themezone{

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

		// class -----------------------------------------------------
		if( isset( $this->field['class']) ){
			$class = $this->field['class'];
		} else {
			$class = '';
		}

		// name -----------------------------------------------------
		if( $meta == 'new' ){

			// builder
			$name = 'data-name="'. $this->field['id'] .'"';

		} elseif( $meta ){

			// page mata & builder existing items
			$name = 'name="'. $this->field['id'] .'"';

		} else {

			// theme options
			$name = 'name="'. $this->prefix .'['. $this->field['id'] .']"';

		}

		// wpml -----------------------------------------------------

		if( isset( $this->field['wpml'] ) && ! empty( $this->field['wpml'] ) ){
			if( $this->value && function_exists( 'icl_object_id' ) ){

				$term = get_term_by( 'slug', $this->value, $this->field['wpml']);
				$term = apply_filters( 'wpml_object_id', $term->term_id, $this->field['wpml'], true );
				$this->value = get_term_by( 'term_id', $term, $this->field['wpml'] )->slug;

			}
		}

		// echo -----------------------------------------------------
		echo '<select '. $name .' class="'. $class .'" rows="6" >';
			if( is_array( $this->field['options'] ) ){
				foreach( $this->field['options'] as $k => $v ){
					echo '<option value="'. $k .'" '. selected( $this->value, $k, false ) .'>'. $v .'</option>';
				}
			}
		echo '</select>';

		if( isset( $this->field['desc'] ) ){
			echo '<span class="description '. $class .'">'. $this->field['desc'] .'</span>';
		}

	}

}
