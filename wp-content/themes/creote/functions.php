<?php
/*
 *=================================
 * Creote Functions and Definitions
 * @package Creote WordPress Theme
 *==================================
*/
// ============================== theme file get ============================
require_once get_template_directory() . '/includes/Mobile_Detect.php';
// Mobile Detect callback
function isMobile() {
    if ( ! class_exists( 'Mobile_Detect' ) ) {
        return false;
    }
    $detect = new Mobile_Detect;
    $mobile = false;
    if( $detect->isMobile() || $detect->isTablet() ){
        $mobile = true;
    }
    return $mobile;
}
if (!function_exists('is_plugin_active')) {
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
  }
require_once ('includes/theme-file.php');
if(class_exists('Creote_Addons')):
add_action( 'vc_before_init', 'creote_vc_remove_css' );
function creote_vc_remove_css() {
    vc_remove_param('vc_row', 'css');
}
endif;
// ============================== theme update ============================
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;
if(class_exists('Creote_update')): 
$myUpdateChecker = PucFactory::buildUpdateChecker(
    'https://themepanthers.com/updatedplugin/creote/theme.json',
     __FILE__, //Full path to the main plugin file or functions.php.
    'creote-theme-update'
 );
 
endif;
// ============================== theme update ============================
add_action('init', 'creote_disable_elementor_onboarding_redirect');
function creote_disable_elementor_onboarding_redirect() {
    delete_transient( 'elementor_activation_redirect' );
}
// ============================== Elementor Register Location ============================
function creote_register_elementor_locations( $elementor_theme_manager ) {
    $elementor_theme_manager->register_all_core_location();
	$elementor_theme_manager->register_location(
		'footer',
		[
			'hook' => 'creote_elementor_footer',
			'remove_hooks' => [ 'creote_print_elementor_footer' ],
		]
	);
    $elementor_theme_manager->register_location(
		'header',
		[
			'hook' => 'creote_elementor_header',
			'remove_hooks' => [ 'creote_print_elementor_header' ],
		]
	);
	 
}
add_action( 'elementor/theme/register_locations', 'creote_register_elementor_locations' );

// Theme footer
function creote_print_elementor_footer() {
	get_template_part( 'templates-parts/footer' );  
}
add_action( 'creote_elementor_footer', 'creote_print_elementor_footer' );
// Theme header
function creote_print_elementor_header() {
    ?>
	    <?php get_template_part( 'templates-parts/header' ); ?>
    <?php
}
add_action( 'creote_elementor_header', 'creote_print_elementor_header' );
// ============================== Elementor Register Location ============================

 