
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

        private $options;

        /**
         * Initialize the class and set its properties.
         *
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

            $this->enqueue_styles();
            $this->enqueue_scripts();
        }

        public function run() {
            add_action('admin_menu', array(&$this, 'theme_zone_option'));
        }

        /**
         * Register the stylesheets for the admin area.
         *
         */
        public function enqueue_styles(){
            wp_enqueue_style( 'jquery-ui-core' );
            wp_register_style( 'themezone-option-css', THEME_URI. '/themezone-options/assets/css/themezoneoption.css', array(), $this->version );
            wp_enqueue_style( 'themezone-option-css' );
        }

        /**
         * Register the JavaScript for the admin area.
         *
         */
        public function enqueue_scripts(){
            wp_enqueue_script( 'themezone-option-js', THEME_URI. '/themezone-options/assets/js/themezoneoption.js', array('jquery'), $this->version );
        }

        /**
         * Dashboard Page
         */
        public function theme_zone_option() {
            $title = array(
                'themezone'	=> 'Theme Zone',
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
                array( $this, 'zone_option_page' ),
                $icon,
                3
            );
    
            add_submenu_page(
                'themezone',
                $title['dashboard'],
                $title['dashboard'],
                'edit_theme_options',
                'themezone',
                array( $this, 'zone_option_page' )
            );
        }

        /**
         * Theme Options Page
         */
        public function zone_option_page() {
            $list_menu = $this->options->zone_option_menu();
            $list_section = $this->options->zone_option_section();

            require THEME_ZONE_URI . '/templates/dashboard.php';
        }

    }
}
    