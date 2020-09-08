
<?php
/**
 * themezone administrator - fields and args
 *
 * @package themezone
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Themezone_Tgmpa' ) ){

    class Themezone_Tgmpa
    {

        public $plugins = array();

        /**
         * Initialize the class and set its properties.
         */
        public function __construct(){

            $this->plugins = $this->get_plugins_list();

            include_once 'libs/class-tgm-plugin-activation.php';

            // TGMPA registraton and configuration
			add_action( 'tgmpa_register', array( $this, 'tgmpa_register' ) );
        }

        public function tgmpa_register() {

            /**
             * Array of configuration settings. Amend each line as needed.
             * If you want the default strings to be available under your own theme domain,
             * leave the strings uncommented.
             * Some of the strings are added into a sprintf, so see the comments at the
             * end of each line for what each argument will be.
             */
            $config = array(
                'id'           	=> 'themezone-tgmpa',        			// Unique ID for hashing notices for multiple instances of TGMPA.
				'menu'         	=> 'themezone-plugins', 				// Menu slug.
				'parent_slug'  	=> 'themezone',					// Parent menu slug.
				'capability'   	=> 'edit_theme_options',    	// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
				'has_notices'  	=> true,                    	// Show admin notices or not.
				'dismissable'  	=> true,                    	// If false, a user cannot dismiss the nag message.
				'is_automatic'	=> false,                   	// Automatically activate plugins after installation or not.
				'message' 		=> '<div class="zn-tgm-message">'. __( 'If you are not sure about server\'s settings and limits, please activate <u>necessary plugins ONLY</u>', 'tgmpa' ) .'</div>',	// Message to output right before the plugins table
				'strings'      	=> array(
					'page_title'                      	=> __( 'Install Plugins', 'tgmpa' ),
					'menu_title'                     	=> __( 'Install Plugins', 'tgmpa' ),
					'installing'                      	=> __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
					'oops'                            	=> __( 'Something went wrong with the plugin API.', 'tgmpa' ),
					'notice_can_install_required'     	=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'tgmpa' ),
					'notice_can_install_recommended'  	=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'tgmpa' ),
					'notice_cannot_install'           	=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'tgmpa' ),
					'notice_can_activate_required'    	=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'tgmpa' ),
					'notice_can_activate_recommended' 	=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'tgmpa' ),
					'notice_cannot_activate'          	=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'tgmpa' ),
					'notice_ask_to_update'            	=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'tgmpa' ),
					'notice_cannot_update'            	=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'tgmpa' ),
					'install_link'                    	=> _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'tgmpa' ),
					'activate_link'                   	=> _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'tgmpa' ),
					'return'                          	=> __( 'Return to Required Plugins Installer', 'tgmpa' ),
					'plugin_activated'                	=> __( 'Plugin activated successfully.', 'tgmpa' ),
					'complete'                        	=> __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
					'nag_type'                        	=> 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
                )
            );

            tgmpa( $this->plugins, $config );
        }

        public function get_plugins_list(){
			/**
             * Array of plugin arrays. Required keys are name and slug.
             * If the source is NOT from the .org repo, then source is also required.
             */
            $plugin_list = array(

                // This is an example of how to include a plugin bundled with a theme.
                array(
                    'name'      => 'Contact Form 7', //repo name
                    'slug'      => 'contact-form-7', //url
                    'required'  => true,
                    'force_activation' => true,
                    'force_deactivation' => false
                ),
                array(
                    'name'               => 'Contact Form DB', // The plugin name.
                    'slug'               => 'contact-form-7-to-database-extension', 
                    'required'           => true,
                    'force_activation' => false,
                    'force_deactivation' => false
                ),
                array(
                    'name'      => 'Advanced Custom Fields', //repo name
                    'slug'      => 'advanced-custom-fields', //url
                    'required'  => false,
                    'force_activation' => false,
                    'force_deactivation' => false
                ),
                array(
                    'name'      => 'Max Mega Menu', //repo name
                    'slug'      => 'megamenu', //url
                    'required'  => true,
                    'force_activation' => true,
                    'force_deactivation' => false
                ),
                array(
                    'name'      => 'Google Analyticator', //repo name
                    'slug'      => 'google-analyticator', //url
                    'required'  => true,
                    'force_activation' => true,
                    'force_deactivation' => false
                ),
                array(
                    'name'      => 'Yoast SEO', //repo name
                    'slug'      => 'wordpress-seo', //url
                    'required'  => true,
                    'force_activation' => true,
                    'force_deactivation' => false
                ),
                array(
                    'name'      => 'Autoptimize', //repo name
                    'slug'      => 'autoptimize', //url
                    'required'  => false,
                    'force_activation' => false,
                    'force_deactivation' => false
                ),
                array(
                    'name'      => 'Async JavaScript', //repo name
                    'slug'      => 'async-javascript', //url
                    'required'  => false,
                    'force_activation' => false,
                    'force_deactivation' => false
                ),
                array(
                    'name'      => 'W3 Total Cache', //repo name
                    'slug'      => 'w3-total-cache', //url
                    'required'  => false,
                    'force_activation' => false,
                    'force_deactivation' => false
                ),
                array(
                    'name'      => 'WooCommerce', //repo name
                    'slug'      => 'woocommerce', //url
                    'required'  => false,
                    'force_activation' => false,
                    'force_deactivation' => false
                ),
                array(
                    'name'      => 'BuddyPress', //repo name
                    'slug'      => 'buddypress', //url
                    'required'  => false,
                    'force_activation' => false,
                    'force_deactivation' => false
                ),
                array(
                    'name'      => 'Zone Ratings', //repo name
                    'slug'      => 'zone-ratings', //url
                    'source'    => '/zekinah/Zone-Ratings/archive/master.zip',
                    'external_url' => 'https://github.com/zekinah/zone-ratings',
                    'version'	=> '1.9.0',
                    'required'  => false,
                    'force_activation' => false,
                    'force_deactivation' => false
                ),
                array(
                    'name'      => 'Zone Cookie', //repo name
                    'slug'      => 'zone-cookie', //url
                    'source'    => '/zekinah/Zone-Cookie/archive/master.zip',
                    'external_url' => 'https://wordpress.org/plugins/zone-cookie/',
                    'version'	=> '1.0.3',
                    'required'  => false,
                    'force_activation' => false,
                    'force_deactivation' => false
                ),
                array(
                    'name'      => 'Zone IO Tab', //repo name
                    'slug'      => 'zone-io-tab', //url
                    'source'    => '/zekinah/zone-io-tab/archive/master.zip',
                    'external_url' => 'https://github.com/zekinah/zone-io-tab',
                    'version'	=> '1.0.0',
                    'required'  => false,
                    'force_activation' => false,
                    'force_deactivation' => false
                ),
                array(
                    'name'      => 'Zone IO Slider', //repo name
                    'slug'      => 'zone-io-slider', //url
                    'source'    => '/zekinah/zone-io-slider2/archive/master.zip',
                    'external_url' => 'https://github.com/zekinah/zone-io-slider2',
                    'version'	=> '1.0.0',
                    'required'  => false,
                    'force_activation' => false,
                    'force_deactivation' => false
                ),
                array(
                    'name'      => 'Zone Redirect', //repo name
                    'slug'      => 'zone-redirect', //url
                    'source'    => '/zekinah/Zone-Redirect/archive/master.zip',
                    'external_url' => 'https://wordpress.org/plugins/zone-redirect/',
                    'version'	=> '1.0.4',
                    'required'  => false,
                    'force_activation' => false,
                    'force_deactivation' => false
                )
            );

            return $plugin_list;
        }
    }

    // Execute Themezone_Tgmpa
    $themezone_tgmpa = new Themezone_Tgmpa();

}
    