
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
                // Global
                'global' => array(
                    'title' 	=> __('Global', 'zn-opts'),
                    'sections' 	=> array( 'general','copyrights','hooks' ),
                ),
                // Social
                'social' => array(
                    'title' 	=> __('Social', 'zn-opts'),
                    'sections' 	=> array( 'social' ),
                ),
                // Addons, Plugins
                'colors' => array(
                    'title' 	=> __('Colors', 'zn-opts'),
                    'sections' 	=> array( 'colors' ),
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

            // General 
            $sections['general'] = array(
                'title'		=> __('General', 'zn-opts'),
                'fields' 	=> array(
                    // Adding Info
                    array(
                        'id' 		=> 'general-info-layout',
                        'type' 		=> 'info',
                        'title' 	=> '',
                        'desc' 		=> __('Layout', 'zn-opts'),
                        'class' 	=> 'zn-info',
                    ),

                    array(
                        'id' 		=> 'navigation-option',
                        'type' 		=> 'select',
                        'title' 	=> __('Navigation Template', 'zn-opts'),
                        'options' 	=> array(
                            'right' 		=> __( 'Right', 'zn-opts' ),
                            'center' 		=> __( 'Center', 'zn-opts' ),
                            'left' 		=> __( 'Left', 'zn-opts' ),
                        ),
                    ),

                    array(
                        'id' 		=> 'scroll-to-top-options',
                        'type' 		=> 'switch',
                        'title' 	=> __( 'Scroll to Top', 'zn-opts' ),
                        'options' 	=> array( '0' => 'Off', '1' => 'On' ),
                        'std' 		=> '0'
                    ),
                    // Adding Info
                    array(
                        'id' 		=> 'icon-info-layout',
                        'type' 		=> 'info',
                        'title' 	=> '',
                        'desc' 		=> __('Icon', 'zn-opts'),
                        'class' 	=> 'zn-info',
                    ),

                    array(
                        'id'		=> 'favicon-img',
                        'type'		=> 'upload',
                        'title'		=> __('Favicon', 'zn-opts'),
                        'desc'		=> __('<b>.ico</b> 32x32 pixels', 'zn-opts')
                    ),

                ),
            );

            // Copyrights 
            $sections['copyrights'] = array(
                'title' 	=> __('Copyrights', 'zn-opts'),
                'fields'	=> array(

                    array(
                        'id' 		=> 'copyright',
                        'type' 		=> 'textarea',
                        'title' 	=> __('Copyright', 'zn-opts'),
                        'sub_desc'	=> __('copyright', 'zn-opts'),
                    ),

                    array(
                        'id' 		=> 'copyright-developer',
                        'type' 		=> 'textarea',
                        'title' 	=> __('Developer', 'zn-opts'),
                        'sub_desc'	=> __('developer', 'zn-opts'),
                    ),

                ),
            );

            // Hooks 
            $sections['hooks'] = array(
                'title' 	=> __('Hooks', 'zn-opts'),
                'fields'	=> array(

                    array(
                        'id' 		=> 'hook-top',
                        'type' 		=> 'textarea',
                        'title' 	=> __('Top', 'zn-opts'),
                        'sub_desc'	=> __('zn_hook_top', 'zn-opts'),
                        'desc' 		=> __('Executes <b>after</b> the opening <b>&lt;body&gt;</b> tag', 'zn-opts'),
                    ),

                    array(
                        'id' 		=> 'hook-content-before',
                        'type' 		=> 'textarea',
                        'title' 	=> __('Content before', 'zn-opts'),
                        'sub_desc'	=> __('zn_hook_content_before', 'zn-opts'),
                        'desc' 		=> __('Executes <b>before</b> the opening <b>&lt;#Content&gt;</b> tag', 'zn-opts'),
                    ),

                    array(
                        'id' 		=> 'hook-content-after',
                        'type' 		=> 'textarea',
                        'title' 	=> __('Content after', 'zn-opts'),
                        'sub_desc'	=> __('zn_hook_content_after', 'zn-opts'),
                        'desc' 		=> __('Executes <b>after</b> the closing <b>&lt;/#Content&gt;</b> tag', 'zn-opts'),
                    ),

                    array(
                        'id' 		=> 'hook-bottom',
                        'type' 		=> 'textarea',
                        'title' 	=> __('Bottom', 'zn-opts'),
                        'sub_desc'	=> __('zn_hook_bottom', 'zn-opts'),
                        'desc' 		=> __('Executes <b>before</b> the closing <b>&lt;/body&gt;</b> tag', 'zn-opts'),
                    ),

                ),
            );
        
            // Social
            $sections['social'] = array(
                'title' 	=> __( 'General', 'zn-opts' ),
                'fields' 	=> array(
                    // Adding Info
                    array(
                        'id' 		=> 'contact-info-layout',
                        'type' 		=> 'info',
                        'title' 	=> '',
                        'desc' 		=> __('Contact', 'zn-opts'),
                        'class' 	=> 'zn-info',
                    ),
                    array(
                        'id' 		=> 'contact-number',
                        'type' 		=> 'text',
                        'title' 	=> __('Contact Number', 'zn-opts'),
                        'sub_desc'	=> __('zn_contact_number', 'zn-opts')
                    ),
                    // Adding Info
                    array(
                        'id' 		=> 'social-info-layout',
                        'type' 		=> 'info',
                        'title' 	=> '',
                        'desc' 		=> __('Social<span>zn_social_media_all</span>', 'zn-opts'),
                        'class' 	=> 'zn-info',
                    ),
                    array(
                        'id' 		=> 'social-facebook',
                        'type' 		=> 'text',
                        'title' 	=> __('Facebook', 'zn-opts'),
                        'sub_desc'	=> __('zn_social_media_facebook', 'zn-opts'),
                        'desc' 		=> __('Link to the profile page', 'zn-opts'),
                    ),
                    array(
                        'id' 		=> 'social-googleplus',
                        'type' 		=> 'text',
                        'title' 	=> __('Google +', 'zn-opts'),
                        'sub_desc'	=> __('zn_social_media_gmail', 'zn-opts'),
                        'desc' 		=> __('Link to the profile page', 'zn-opts'),
                    ),
                    array(
                        'id' 		=> 'social-twitter',
                        'type' 		=> 'text',
                        'title' 	=> __('Twitter', 'zn-opts'),
                        'sub_desc'	=> __('zn_social_media_twitter', 'zn-opts'),
                        'desc' 		=> __('Link to the profile page', 'zn-opts'),
                    ),
                    array(
                        'id' 		=> 'social-instagram',
                        'type' 		=> 'text',
                        'title' 	=> __('Instagram', 'zn-opts'),
                        'sub_desc'	=> __('zn_social_media_instagram', 'zn-opts'),
                        'desc' 		=> __('Link to the profile page', 'zn-opts'),
                    ),
                    array(
                        'id' 		=> 'social-youtube',
                        'type' 		=> 'text',
                        'title' 	=> __('YouTube', 'zn-opts'),
                        'sub_desc'	=> __('zn_social_media_youtube', 'zn-opts'),
                        'desc' 		=> __('Link to the profile page', 'zn-opts'),
                    ),
                    array(
                        'id' 		=> 'social-vimeo',
                        'type' 		=> 'text',
                        'title' 	=> __('Vimeo', 'zn-opts'),
                        'sub_desc'	=> __('zn_social_media_vimeo', 'zn-opts'),
                        'desc' 		=> __('Link to the profile page', 'zn-opts'),
                    ),
                    array(
                        'id' 		=> 'social-linkedin',
                        'type' 		=> 'text',
                        'title' 	=> __('LinkedIn', 'zn-opts'),
                        'sub_desc'	=> __('zn_social_media_linkedin', 'zn-opts'),
                        'desc' 		=> __('Link to the profile page', 'zn-opts'),
                    ),
                    array(
                        'id' 		=> 'social-pinterest',
                        'type'		=> 'text',
                        'title' 	=> __('Pinterest', 'zn-opts'),
                        'sub_desc'	=> __('zn_social_media_pinterest', 'zn-opts'),
                        'desc' 		=> __('Link to the profile page', 'zn-opts'),
                    ),
                    array(
                        'id' 		=> 'social-custom-link',
                        'type' 		=> 'text',
                        'title' 	=> __('Custom | Link', 'zn-opts'),
                        'sub_desc'	=> __('zn_social_media_custom', 'zn-opts'),
                        'desc' 		=> __('To show Custom Social Icon select Icon and enter Link to the profile page', 'zn-opts'),
                    ),


                ),
            );

            // Colors 
            $sections['colors'] = array(
                'title' 	=> __('General', 'zn-opts'),
                'fields'	=> array(

                    array(
                        'id' 		=> 'background-header',
                        'type' 		=> 'color',
                        'title' 	=> __('Header Background Color', 'zn-opts'),
                        'std' 		=> '#1e73be',
                    ),

                    array(
                        'id' 		=> 'background-page',
                        'type' 		=> 'color',
                        'title' 	=> __('Page Background Color', 'zn-opts'),
                        'std' 		=> '#FFFFFF',
                    ),

                    array(
                        'id' 		=> 'background-color',
                        'type' 		=> 'color',
                        'title' 	=> __('Footer Background Color', 'zn-opts'),
                        'std' 		=> '#8E8A89',
                    ),

                ),
            );

            // Addons 
            $sections['addons'] = array(
                'title'		=> __('General', 'zn-opts'),
                'fields'	=> array(
                    array(
                        'id' 		=> 'fontawesome-options',
                        'type' 		=> 'switch',
                        'title' 	=> __( 'Font Awesome v4.4.0', 'zn-opts' ),
                        'desc' 		=> __('More info: <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">Read Documentation</a><br />', 'zn-opts'),
                        'options' 	=> array( '0' => 'Off', '1' => 'On' ),
                        'std' 		=> '0'
                    ),
                    array(
                        'id' 		=> 'scrollreveal-options',
                        'type' 		=> 'switch',
                        'title' 	=> __( 'Scroll Reveal', 'zn-opts' ),
                        'desc' 		=> __('More info: <a target="_blank" href="https://github.com/jlmakes/scrollreveal.js">Read Documentation</a><br />', 'zn-opts'),
                        'options' 	=> array( '0' => 'Off', '1' => 'On' ),
                        'std' 		=> '0'
                    ),
                    array(
                        'id' 		=> 'jsparallax-options',
                        'type' 		=> 'switch',
                        'title' 	=> __( 'JS Parallax Scrolling', 'zn-opts' ),
                        'desc' 		=> __('More info: <a target="_blank" href="https://pixelcog.github.io/parallax.js/">Read Documentation</a><br />', 'zn-opts'),
                        'options' 	=> array( '0' => 'Off', '1' => 'On' ),
                        'std' 		=> '0'
                    ),
                    array(
                        'id' 		=> 'darkmode-options',
                        'type' 		=> 'switch',
                        'title' 	=> __( 'Dark Mode Widget', 'zn-opts' ),
                        'desc' 		=> __('More info: <a target="_blank" href="https://darkmodejs.learn.uno/">Read Documentation</a><br />', 'zn-opts'),
                        'options' 	=> array( '0' => 'Off', '1' => 'On' ),
                        'std' 		=> '0'
                    ),
                    array(
                        'id' 		=> 'retina-js',
                        'type' 		=> 'select',
                        'title' 	=> __('Retina.js', 'zn-opts'),
                        'desc' 		=> __('More info: <a target="_blank" href="http://imulus.github.io/retinajs/">Read Documentation</a><br />Retina.js disables responsive images in WP 4.4+<br />', 'zn-opts'),
                        'options' 	=> array(
                            '' 	=> __('Default: only Retina Logo', 'zn-opts'),
                            '1' => __('Enable Retina.js | please prepare @2x images', 'zn-opts'),
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
    