
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
            $updates = $this->zone_option_support_changes();
            require THEME_ZONE_URI . '/templates/support.php';
        }

        public function zone_option_support_changes() {
            $updates = array();

            $updates = array(
                array(
                    'title' => 'Initial Released',
                    'version' => '1.0.0',
                    'type' => 'system-update',
                    'details' => array(
                        'desc' => '',
                        'sect' => array(
                            array(
                                'func_name' => 'Global',
                                'funtions' => array(
                                    'General // Layout',
                                    'Copyrights // content',
                                    'Hooks // Can Add custom SEO scripts'
                                )
                            ),
                            array(
                                'func_name' => 'Social',
                                'funtions' => array(
                                    'General // Social Media links'
                                )
                            ),
                            array(
                                'func_name' => 'Colors',
                                'funtions' => array(
                                    'General // Background Color of header, body, footer'
                                )
                            ),
                            array(
                                'func_name' => 'Addons',
                                'funtions' => array(
                                    'General // Options to use embeded third party libraries'
                                )
                            ),
                            array(
                                'func_name' => 'Custom CSS & JS',
                                'funtions' => array(
                                    'CSS // Section to add custom CSS',
                                    'JS // Section to add custom JS'
                                )
                            ),
                        )
                    )
                ),
            );

            return $updates;
        }

    
    }

    // Execute Themezone_Support
    $themezone_support = new Themezone_Support();
}
    