
<?php
/**
 * themezone administrator - fields and args
 *
 * @package themezone
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Themezone_Options' ) ){

    class Themezone_Options
    {
        /**
         * Initialize the class and set its properties.
         */
        public function __construct(){
        }

        public function zone_option_menu() {
            // Navigation elements
            $menu = array(
                'custom' => array(
                    'title' 	=> __('Custom CSS & JS', 'zn-opts'),
                    'sections' 	=> array( 'css', 'js' ),
                ),
            );

            return $menu;
        }

        public function zone_option_section() {
            $sections = array();

            // CSS 
            $sections['css'] = array(
                'title' => __('CSS', 'zn-opts'),
                'fields' => array(
                    array(
                        'id' 		=> 'custom-css',
                        'type' 		=> 'textarea',
                        'title' 	=> __('Custom CSS', 'zn-opts'),
                        'sub_desc' 	=> __('Paste your custom CSS code here', 'zn-opts'),
                        'class' 	=> 'custom-css',
                    ),
                ),
            );

            // JS 
            $sections['js'] = array(
                'title' => __('JS', 'zn-opts'),
                'fields' => array(
                    array(
                        'id' 		=> 'custom-js',
                        'type' 		=> 'textarea',
                        'title' 	=> __('Custom JS', 'zn-opts'),
                        'sub_desc' 	=> __('Paste your custom JS code here', 'zn-opts'),
                        'desc' 		=> __('To use jQuery code wrap it into <strong>jQuery(function($){ ... });</strong>', 'zn-opts'),
                    ),
                ),
            );

            return $sections;
        }
    
    }
}
    