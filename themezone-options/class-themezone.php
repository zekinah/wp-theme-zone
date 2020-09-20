
<?php
/**
 * themezone administrator - fields and args
 *
 * @package themezone
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Themezone' ) ){

    class Themezone
    {

        private $version;

        private $theme_name;

        private $options;

        private $menu;

        private $sections;

        /**
         * Initialize the class and set its properties.
         */
        public function __construct(Themezone_Options $options){
            if ( defined( 'THEME_VERSION' ) ) {
                $this->version = THEME_VERSION;
            } else {
                $this->version = '1.0.0';
            }

            if ( defined( 'THEME_NAME' ) ) {
                $this->theme_name = THEME_NAME;
            } else {
                $this->theme_name = 'WP Theme Zone';
            }

            $this->options = $options;
            $this->menu = $this->options->zone_option_menu();
            $this->sections = $this->options->zone_option_section();

        }

        public function run() {
            // register wordpress menu
            add_action('admin_menu', array(&$this, 'theme_zone_option'));
            // register theme setting
            add_action( 'admin_init', array( &$this, 'register_theme_zone_setting' ) );
            // Loads Administrator CSS and JS
            add_action( 'admin_enqueue_scripts', array(&$this, 'enqueue_styles') );
            add_action( 'admin_enqueue_scripts', array(&$this, 'enqueue_scripts') );
        }

        /**
         * Register the stylesheets for the admin area.
         */
        public function enqueue_styles(){
            wp_enqueue_style( 'jquery-ui-core' );
            wp_enqueue_style( 'themezone-option-css', THEME_URI. '/themezone-options/assets/css/themezoneoption.css', array(), $this->version );
        }

        /**
         * Register the JavaScript for the admin area.
         */
        public function enqueue_scripts(){

            wp_enqueue_script( 'themezone-option-js', THEME_URI. '/themezone-options/assets/js/themezoneoption.js', array('jquery'), $this->version );
        
            //Enqueue all of the js of fields
            foreach($this->sections as $z => $section){
				if(isset($section['fields'])){
					foreach($section['fields'] as $fieldk => $field){
						if(isset($field['type'])){
                            // Class Name
							$field_class = 'ThemeZone_Options_'.$field['type'];
							require_once( THEME_ZONE_URI .'fields/'. $field['type'] .'/field_'. $field['type'] .'.php' );
							if(class_exists($field_class) && method_exists($field_class, 'enqueue')){
                                $enqueue = new $field_class( '','','themezone' );
                                $enqueue->enqueue();
							}
						}
					}
				}
			}
        }

        /**
         * Dashboard Page
         */
        public function theme_zone_option() {
            $title = array(
                'themezone'	=> $this->theme_name,
                'dashboard'	=> __( 'Dashboard', 'themezone' ),
                'options'	=> __( 'ThemeZone Options', 'themezone' ),	// TMP
            );
    
            // icon@32x32
            // $icon = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAAflBMVEUAAAD////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////vroaSAAAAKXRSTlMAgEC/H3/mt1Eq39SqknheJBcK+OvZnHNsWFRGOzPzzMjFr6KXjGRiElnvKT8AAADYSURBVDjL3Y1ZcsIwEER7ZMnxhjEGkrBl3/r+F8wISzZUqcw/76e7pt5U404oZGKfEniJuSWskoIMZUE6zAgF+YAUTXXw8VdzfdS0xpgO6DvTR2McaH3WVMqWyvsRE/s48Eql4Zn1AZFVzZcTPLpA5cmW3+TzKHzpKXYv/GqW5AKBHfmBUQhrvWYc2HJTXgotPGQWTo9hbRTMtbAkG8wIdsu8O5c37hKCH/iJr5IQdOATM8KJrMTjnCMdrIh6YlGICrKEcMIL+VBycADFhhO5RTa0LJQKd8E/2aMhsbBd6SYAAAAASUVORK5CYII=';
            // icon@16x16
            $icon = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElNRQfkCQYWJwyiou8VAAABEElEQVQoz6WQPyiEAQDFf9/33Z+6c4bjMjBIUkfJcAwyGaWMbmKxMYjJIoNRWWy3WERZrpiYDDIoNptbMFA3kC7XcT/DSWH0pvfqV6/34L8KjJEk+Erv1DH4AcSYpUgEQJNHNrjjFzDGEIfUSVPknvc/Ha66bVIsWnHG0Lxjdplz2G4jwbTtYt4rt4ybteyDR55447VzhoCYsuS5vWLcYQ+sue6IZY/NIOK8Fads+ciSZ2bFTS/NhcAQyxxwSkQnCSDklhegSUQQkmGFKjs06GefcT6QJrYWQIxFptmlAPQxSAej9AAFnhigjcnAPSaoEQAhr6yxQAG45IIlIp4Ds6S+r25QJUsCqPNGe6vkv/oECdl+rdW98l8AAAAldEVYdGRhdGU6Y3JlYXRlADIwMjAtMDktMDZUMjI6Mzk6MTItMDQ6MDBnhcsbAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDIwLTA5LTA2VDIyOjM5OjEyLTA0OjAwFthzpwAAAABJRU5ErkJggg==';
    
            add_menu_page(
                $title['themezone'],
                $title['themezone'],
                'edit_theme_options',
                'themezone',
                array( $this, 'theme_zone_option_page' ),
                $icon,
                3
            );
    
            add_submenu_page(
                'themezone',
                $title['dashboard'],
                $title['dashboard'],
                'edit_theme_options',
                'themezone',
                array( $this, 'theme_zone_option_page' )
            );
        }

        /**
         * Dashboard HTMl
         */
        public function theme_zone_option_page() {
            require THEME_ZONE_URI . '/templates/dashboard.php';
        }

        /**
		 * Register Option for use
		*/
		public function register_theme_zone_setting(){

            register_setting('themezone_group', 'themezone');

			foreach($this->sections as $z => $section){

				add_settings_section($z.'_section', $section['title'], array(&$this, 'theme_zone_section_desc'), $z.'_section_group');

				if(isset($section['fields'])){

					foreach($section['fields'] as $fieldk => $field){

						if(isset($field['title'])){
							$th = (isset($field['sub_desc']))?$field['title'].'<span class="description">'.$field['sub_desc'].'</span>':$field['title'];
						}else{
							$th = '';
						}

						add_settings_field($fieldk.'_field', $th, array(&$this,'theme_zone_input_field'), $z.'_section_group', $z.'_section', $field); // checkbox

					}

				}

            }

        }
        
        /**
		 *  Description output +
		 */
		public function theme_zone_section_desc( $section ){
			$id = str_replace( '_section', '', $section['id'] );
			if( isset( $this->sections[$id]['desc'] ) ){
				echo '<div class="zn-opts-section-desc">'. $this->sections[$id]['desc'] .'</div>';
			}
		}

		/**
		 * Field output +
		 */
		public function theme_zone_input_field( $field ){
			if( isset( $field['type'] ) ){
                // Class Name
                $field_class = 'ThemeZone_Options_' .$field['type'];
				if( class_exists( $field_class ) ){
                    require_once( THEME_ZONE_URI .'fields/'. $field['type'] .'/field_'. $field['type'] .'.php' );
                    $settings_value = get_option('themezone');
                    //Get the value
                    $value = '';
                    $value = (array_key_exists($field['id'],$settings_value) ? $settings_value[$field['id']] : '');
					$render = new $field_class( $field, $value, 'themezone' );
					$render->render();
				}

			}
		}


    }
}
    