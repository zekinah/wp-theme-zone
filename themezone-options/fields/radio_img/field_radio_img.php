<?php
class Themezone_Options_radio_img extends Themezone{

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
		echo '<fieldset '. $class .'>';

			foreach( $this->field['options'] as $k => $v ){

				echo '<div class="zn-radio-item">';

					$selected = ( checked( $this->value, $k, false ) != '') ? ' zn-radio-img-selected' : '';

					echo '<label class="zn-radio-img'. $selected .'" for="'. $this->field['id'] .'_'. $k .'">';
						echo '<input type="radio" id="'. $this->field['id'] .'_'. $k .'" '. $name . ' value="'. $k .'" '. checked( $this->value, $k, false ) .'/>';
						echo '<img src="'. $v['img'] .'" alt="'. $v['title'] .'" />';
					echo '</label>';

					echo '<span class="description">'. $v['title'] .'</span>';

				echo '</div>';

			}

			if( isset( $this->field['desc'] ) ){
				echo '<br style="clear:both;"/>';
				echo '<span class="description">'. $this->field['desc'] .'</span>';
			}

		echo '</fieldset>';

	}

	/**
	 * Enqueue
	 */
	function enqueue(){
		wp_enqueue_script( 'zn-opts-field-radio_img-js', THEME_URI. '/themezone-options/fields/radio_img/field_radio_img.js', array( 'jquery' ), THEME_VERSION, true );
	}

}
