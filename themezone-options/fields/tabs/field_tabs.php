<?php
class Themezone_Options_tabs extends Themezone{

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

		// enqueue js fix
		if( $meta ){
			$this->enqueue();
		}

		// name -----------------------------------------------------
		$name	= ( ! $meta ) ? ( $this->prefix .'['. $this->field['id'] .']' ) : $this->field['id'];

		if( $meta == 'new' ){

			// builder new
			$field_prefix = 'data-';

		} else {

			// builder exist & theme options
			$field_prefix = '';

		}

		// echo -----------------------------------------------------
		$count 	= ( $this->value ) ? count( $this->value ) : 0;

		echo '<input type="hidden" '. $field_prefix .'name="'. $name .'[count][]" class="zn-tabs-count" value="'. $count .'" />';

		echo '<a href="javascript:void(0);" class="btn-blue zn-add-tab" rel-name="'. $name .'">'. __( 'Add tab', 'zn-opts' ) .'</a>';
		echo '<br style="clear:both;" />';

		echo '<ul class="tabs-ul">';

			if( isset( $this->value ) && is_array( $this->value ) ){
				foreach( $this->value as $k => $value ){
					echo '<li>';

						echo '<label>'. __( 'Title', 'zn-opts' ) .'</label>';
						echo '<input type="text" name="'. $name .'[title][]" value="'. htmlspecialchars( stripslashes( $value['title'] ) ) .'" />';

						echo '<label>'. __( 'Content', 'zn-opts' ) .'</label>';
						echo '<textarea name="'. $name .'[content][]" value="" >'. esc_attr( $value['content'] ) .'</textarea>';

						echo '<a href="" class="zn-btn-close zn-remove-tab"><em>delete</em></a>';

					echo '</li>';
				}
			}

			// default tab to clone
			echo '<li class="tabs-default">';

				echo '<label>'. __( 'Title', 'zn-opts' ) .'</label>';
				echo '<input type="text" name="" value="" />';

				echo '<label>'. __( 'Content', 'zn-opts' ) .'</label>';
				echo '<textarea name="" value=""></textarea>';

				echo '<a href="" class="zn-btn-close zn-remove-tab"><em>delete</em></a>';

			echo '</li>';

		echo '</ul>';

		if( isset( $this->field['desc'] ) ){
			echo ' <span class="description tabs-desc">'. $this->field['desc'] .'</span>';
		}
	}

	/**
	 * Enqueue
	*/
	function enqueue(){
		wp_enqueue_script( 'zn-opts-field-tabs-js', THEME_URI .'fields/tabs/field_tabs.js', array( 'jquery' ), THEME_VERSION, true );
	}

}
