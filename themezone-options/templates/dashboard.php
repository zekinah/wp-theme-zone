<?php
/**
 * Provide a admin area view for the theme
 *
 * @package    themezone
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<div id="zn-dashboard" class="wrap">

    <?php include_once THEME_ZONE_URI . '/templates/partials/header.php'; ?>

    <div class="dashboard-tab register">
        <div id="zn-wrapper">
            <form method="post" action="options.php" enctype="multipart/form-data" id="zn-form-wrapper">
                <div id="zn-aside">
                    <div class="zn-logo"></div>
                    <ul class="zn-menu">
                        <?php
                        foreach($list_menu as $z => $menu_item) {
                            echo '<li class="zn-menu-li zn-menu-li-'. $z .'">';
                            echo '<a href="javascript:void(0);" class="zn-menu-a"><span class="icon"></span>'. $menu_item['title']. '</a>';
                            if( is_array( $menu_item['sections'] ) ) {
                                echo '<ul class="zn-submenu">';
                                foreach( $menu_item['sections'] as $sub_item ){
                                    echo '<li id="'.$sub_item.'-zn-submenu-li" class="zn-submenu-li">';
                                    echo '<a href="javascript:void(0);" class="zn-submenu-a" data-rel="'.$sub_item.'"><span>'. $list_menu[$sub_item]['title'] .'</span></a>';
                                    echo '</li>';
                                }
                                echo '</ul>';
                            }
                            echo '</li>';
                        }
                        ?>
                    </ul>

                    <div class="zn-theme-version">'<?= __('Theme Version', 'zn-opts') .' <span>'. THEME_VERSION .'</span>'; ?></div>
                </div>

                <div id="zn-main">

                    <div class="zn-header">
                        <input type="submit" name="submit" value="<?=__('Save Changes', 'zn-opts'); ?>" class="zn-popup-save" />
                    </div>
                    <div class="zn-sections">
                    <?php
                        foreach($list_sections as $z => $section) {
                            echo '<div id="'.$z.'-zn-section'.'" class="zn-section">';
                                do_settings_sections($z.'_section_group');
                                echo '<div class="zn-sections-footer">';
                                echo '<input type="submit" name="submit" value="'.__('Save Changes', 'zn-opts').'" class="zn-popup-save" tabindex="-1"/>';
                                echo '</div>';
                            echo '</div>';
                        }
                    ?>
                    </div>
                </div>

                <div class="clear">&nbsp;</div>
            </form>
        </div>
	</div>
</div>