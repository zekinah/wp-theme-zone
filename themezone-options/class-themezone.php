
<?php
/**
 * themezone administrator - fields and args
 *
 * @package themezone
 */
if ( ! class_exists( 'Themezone' ) ){

    class Themezone
    {
        public function __construct(){
            if ( defined( 'THEME_ZONE_VERSION' ) ) {
                $this->version = THEME_ZONE_VERSION;
            } else {
                $this->version = '1.0.0';
            }
            $this->theme_name = 'theme-zone';
        }

        public function run() {
            add_action('admin_menu', array(&$this, 'theme_zone_option'));
        }

        public function theme_zone_option() {
            $title = array(
                'themezone'	=> 'ThemeZone',
                'dashboard'	=> __( 'Dashboard', 'themezone' ),
                'installplugin'	=> __( 'Install Plugins', 'themezone' ),
                'support'	=> __( 'Support', 'themezone' ),
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
        
            add_submenu_page(
                'themezone',
                $title['installplugin'],
                $title['installplugin'],
                'edit_theme_options',
                'themezone-plugin',
                array(&$this, 'zone_option_plugin')
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

        public function zone_option_page() {
            require THEME_ZONE_URI . '/templates/dashboard.php';
        }

        public function zone_option_plugin() {

        }

        public function zone_option_support() {

        }

    
    }
}
    