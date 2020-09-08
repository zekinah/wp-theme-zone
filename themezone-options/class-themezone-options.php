
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
                // Social
                'social' => array(
                    'title' 	=> __('Social', 'zn-opts'),
                    'sections' 	=> array( 'social' ),
                ),
                // Addons, Plugins
                'addons-plugins' => array(
                    'title' 	=> __('Addons', 'zn-opts'),
                    'sections' 	=> array( 'addons' ),
                ),
                // Custom CSS, JS
                'custom' => array(
                    'title' 	=> __('Custom CSS & JS', 'zn-opts'),
                    'sections' 	=> array( 'css', 'js' ),
                ),
            );

            return $menu;
        }

        public function zone_option_section() {
            //Sections
            $sections = array();
            // Social
            $sections['social'] = array(
                'title' 	=> __( 'General', 'zn-opts' ),
                'fields' 	=> array(
                    array(
                        'id' 		=> 'social-facebook',
                        'type' 		=> 'text',
                        'title' 	=> __('Facebook', 'zn-opts'),
                        'desc' 		=> __('Link to the profile page', 'zn-opts'),
                    ),
                    array(
                        'id' 		=> 'social-googleplus',
                        'type' 		=> 'text',
                        'title' 	=> __('Google +', 'zn-opts'),
                        'desc' 		=> __('Link to the profile page', 'zn-opts'),
                    ),
                    array(
                        'id' 		=> 'social-twitter',
                        'type' 		=> 'text',
                        'title' 	=> __('Twitter', 'zn-opts'),
                        'desc' 		=> __('Link to the profile page', 'zn-opts'),
                    ),
                    array(
                        'id' 		=> 'social-instagram',
                        'type' 		=> 'text',
                        'title' 	=> __('Instagram', 'zn-opts'),
                        'desc' 		=> __('Link to the profile page', 'zn-opts'),
                    ),
                    array(
                        'id' 		=> 'social-youtube',
                        'type' 		=> 'text',
                        'title' 	=> __('YouTube', 'zn-opts'),
                        'desc' 		=> __('Link to the profile page', 'zn-opts'),
                    ),
                    array(
                        'id' 		=> 'social-vimeo',
                        'type' 		=> 'text',
                        'title' 	=> __('Vimeo', 'zn-opts'),
                        'desc' 		=> __('Link to the profile page', 'zn-opts'),
                    ),
                    array(
                        'id' 		=> 'social-linkedin',
                        'type' 		=> 'text',
                        'title' 	=> __('LinkedIn', 'zn-opts'),
                        'desc' 		=> __('Link to the profile page', 'zn-opts'),
                    ),
                    array(
                        'id' 		=> 'social-pinterest',
                        'type'		=> 'text',
                        'title' 	=> __('Pinterest', 'zn-opts'),
                        'desc' 		=> __('Link to the profile page', 'zn-opts'),
                    ),
                    array(
                        'id' 		=> 'social-custom-link',
                        'type' 		=> 'text',
                        'title' 	=> __('Custom | Link', 'zn-opts'),
                        'desc' 		=> __('To show Custom Social Icon select Icon and enter Link to the profile page', 'zn-opts'),
                    ),


                ),
            );

            // Addons 
            $sections['addons'] = array(
                'title'		=> __('General', 'mfn-opts'),
                'fields'	=> array(
                    array(
                        'id' 		=> 'fontawesome-options',
                        'type' 		=> 'switch',
                        'title' 	=> __( 'Font Awesome v4.4.0', 'mfn-opts' ),
                        'desc' 		=> __('More info: <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">Read Documentation</a><br />', 'mfn-opts'),
                        'options' 	=> array( '0' => 'Off', '1' => 'On' ),
                        'std' 		=> '0'
                    ),
                    array(
                        'id' 		=> 'scrollreveal-options',
                        'type' 		=> 'switch',
                        'title' 	=> __( 'Scroll Reveal', 'mfn-opts' ),
                        'desc' 		=> __('More info: <a target="_blank" href="https://github.com/jlmakes/scrollreveal.js">Read Documentation</a><br />', 'mfn-opts'),
                        'options' 	=> array( '0' => 'Off', '1' => 'On' ),
                        'std' 		=> '0'
                    ),
                    array(
                        'id' 		=> 'jsparallax-options',
                        'type' 		=> 'switch',
                        'title' 	=> __( 'JS Parallax Scrolling', 'mfn-opts' ),
                        'desc' 		=> __('More info: <a target="_blank" href="https://pixelcog.github.io/parallax.js/">Read Documentation</a><br />', 'mfn-opts'),
                        'options' 	=> array( '0' => 'Off', '1' => 'On' ),
                        'std' 		=> '0'
                    ),
                    array(
                        'id' 		=> 'darkmode-options',
                        'type' 		=> 'switch',
                        'title' 	=> __( 'Dark Mode Widget', 'mfn-opts' ),
                        'desc' 		=> __('More info: <a target="_blank" href="https://darkmodejs.learn.uno/">Read Documentation</a><br />', 'mfn-opts'),
                        'options' 	=> array( '0' => 'Off', '1' => 'On' ),
                        'std' 		=> '0'
                    ),
                    array(
                        'id' 		=> 'retina-js',
                        'type' 		=> 'select',
                        'title' 	=> __('Retina.js', 'mfn-opts'),
                        'desc' 		=> __('More info: <a target="_blank" href="http://imulus.github.io/retinajs/">Read Documentation</a><br />Retina.js disables responsive images in WP 4.4+<br />', 'mfn-opts'),
                        'options' 	=> array(
                            '' 	=> __('Default: only Retina Logo', 'mfn-opts'),
                            '1' => __('Enable Retina.js | please prepare @2x images', 'mfn-opts'),
                        ),
                        'std' 		=> '0'
                    ),

                ),
            );


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
    