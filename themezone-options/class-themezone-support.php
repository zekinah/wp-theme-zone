
<?php
/**
 * themezone administrator - fields and args
 *
 * @package themezone
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Themezone_Support' ) ){

    class Themezone_Support
    {
        /**
         * Initialize the class and set its properties.
         *
         */
        public function __construct(){
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

            add_action('admin_menu', array(&$this, 'init'), 11);
        }

        /**
         * Dashboard Page
         */
        public function init() {
            $title = array(
                'themezone'	=> 'Theme Zone',
                'support'	=> __( 'Support', 'themezone' ),
                'options'	=> __( 'ThemeZone Options', 'themezone' ),	// TMP
            );

            add_submenu_page(
                'themezone',
                $title['support'],
                $title['support'],
                'edit_theme_options',
                'themezone-support',
                array(&$this, 'zone_option_support')
            );
        }

        public function zone_option_support() {
            require THEME_ZONE_URI . '/templates/support.php';
        }

    
    }

    // Execute Themezone_Support
    $themezone_support = new Themezone_Support();
}
    