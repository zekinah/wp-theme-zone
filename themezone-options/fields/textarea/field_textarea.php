<?php
class Themezone_Options_textarea extends Themezone {

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
			$class = false;
		}

		$param = $class_field = isset( $this->field['param'] ) ? $this->field['param'] : '';

		// title
		if( strpos( $this->field['id'] , 'content' ) ){
			$class_field .= ' zn-item-excerpt';
		}

		// name -----------------------------------------------------
		if( $meta == 'new' ){

			// builder new
			$name = 'data-name="'. $this->field['id'] .'"';

		} elseif( $meta ){

			// page mata & builder existing items
			$name = 'name="'. $this->field['id'] .'"';

		} else {

			// theme options
			$name = 'name="'. $this->prefix .'['. $this->field['id'] .']"';

		}

		// echo -----------------------------------------------------
		echo '<div class="textarea-wrapper '. $class .'">';

			echo '<textarea '. $name .' class="'. $class_field .'" rows="8">' .esc_attr( $this->value ). '</textarea>';

			if( isset( $this->field['desc'] ) ){
				echo '<span class="description '. $class .'">'. $this->field['desc'] .'</span>';
			}

			if( $param == 'editor' ){
				echo '<div class="zn-message info small" style="display:none;">'. __( 'If you have experienced editor scroll issues please <b>uncheck</b> <i>Full-height editor and distraction-free functionality</i> in Screen Options in the right top corner of page and <b>click Publish/Update button</b>', 'zn-opts' ) .'</div>';
			}

		echo '</div>';
	}
}
