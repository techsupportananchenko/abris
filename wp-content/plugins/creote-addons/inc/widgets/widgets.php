<?php
/**
 * Load and register widgets
 *
 * @package Creote Addons
 */
require_once CREOTE_ADDONS_DIR  . '/inc/widgets/creote-about-authour.php';
require_once CREOTE_ADDONS_DIR  . '/inc/widgets/creote-recent-posts.php';
require_once CREOTE_ADDONS_DIR  . '/inc/widgets/creote-brochure.php';
require_once CREOTE_ADDONS_DIR  . '/inc/widgets/creote-contact.php';
require_once CREOTE_ADDONS_DIR  . '/inc/widgets/creote-service-list.php';
if ( ! function_exists( 'creote_register_widgets' ) ) {
	/**
	 * Register widgets
	 *
	 * @since  1.0
	 *
	 * @return void
	 */
	/**
 * Register widget function
 */
function creote_register_widgets() {
	register_widget( 'creote_about_authour' );
	register_widget( 'creote_Recent_Posts' );
	register_widget( 'creote_brouchure' );
	register_widget( 'creote_contact' );
	register_widget( 'creote_service_list' );
}
add_action( 'widgets_init', 'creote_register_widgets', 10 );
}
