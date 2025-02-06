<?php
/**
 * Theme functions and definitions.
 * This child theme .
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

/*
 * If your child theme has more than one .css file (eg. ie.css, style.css, main.css) then
 * you will have to make sure to maintain all of the parent theme dependencies.
 *
 * Make sure you're using the correct handle for loading the parent theme's styles.
 * Failure to use the proper tag will result in a CSS file needlessly being loaded twice.
 * This will usually not affect the site appearance, but it's inefficient and extends your page's loading time.
 *
 * @link https://codex.wordpress.org/Child_Themes
 */
require_once 'inc/elementor-custom.php';
function creote_child_enqueue_styles() {
	wp_enqueue_style( 'creote-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'creote-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'creote-style' ),
		wp_get_theme()->get( 'Version' )
	);
	wp_enqueue_style( 'child-style', get_template_directory_uri() . '/style.css', array( 'essentials-style' ), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'essentials-child-style', get_stylesheet_uri() );
    wp_enqueue_script(
        'creote-child-script',
        get_stylesheet_directory_uri() . '/assets/js/index.js',
        array( 'jquery' ),
        wp_get_theme()->get( 'Version' ),
        true
    );
}

add_action( 'wp_enqueue_scripts', 'creote_child_enqueue_styles' );

// Сonnecting element widgets in the theme
function remove_creote_plugin_widgets_init() {
	remove_action( 'elementor/widgets/register', 'creote_core_register_elementor_widgets', 10 );
}
add_action( 'init', 'remove_creote_plugin_widgets_init', 20 );


function my_creote_core_register_elementor_widgets() {
	// header
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/header/header-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/header/header-v2.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/header/header-v3.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/header/header-v4.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/header/header-v5.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/header/header-v8.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/header/header-v10.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/header/header-v6.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/header/header-v7.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/header/header-v9.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/header-two/Header_v11.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/header-two/Header_v13.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/header-two/Header_v12.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/header/logo.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/header/menu.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/header/floating-menu.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/header/contact-list.php';
	// footer
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/footer/about-company-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/footer/foo-get-in-touch-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/footer/foo-navigation-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/footer/foo-recent-news.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/footer/foo-widget-title-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/footer/foo-newsteller-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/footer/foo-copy-right-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/footer/foo-contact-form-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/footer/foo-contact-list-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/footer-two/footer-contact-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/footer/foo-gallery-v1.php';
	// slider
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/slider/slider-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/slider/slider-v2.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/slider/slider-v3.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/slider/slider-v4.php';
	// Single Banner
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/slider/single-banner-v1.php';
	// content
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/theme-button-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/title-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/video-btn.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/description-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/quotes-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/process-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/extra-content-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/service-box-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/service-post-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/service-post-carousel-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/position-image-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/expertise-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/team-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/team-intro.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/testimonial-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/testimonial-v2.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/project-carousel-v1.php';
	require_once get_stylesheet_directory() . '/inc/functions/elementor-widgets/content/blog-post-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/image-box-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/simple-image-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/fun-facts-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/fun-facts-v2.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/call-to-action-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/icon-box-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/content-box-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/faqs-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/progress-bar-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/project-filter-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/time-line-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/tab-v1.php';
	// require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/multi-tab-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/client-logo-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/subscribe-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/price-plan-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/price-plan-tab-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/countdown-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/project-information-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/social-media-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/contact-box-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/contact-form-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/link-box-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/image-carousel-box-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/image-grid-box-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/list-items-v1.php';
	// content two
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content-two/subscribe-v2.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content-two/text-editor-v1.php';
	// contetn three
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content-three/image-box-v2.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content-three/image-box-v3.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content-three/contact-box-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content-three/contact-form-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content-three/faqs-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content-three/fun-facts-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content-three/heading-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content-three/icon-box-carousel-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content-three/icon-box-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content-three/information-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content-three/list-items-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content-three/news-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content-three/price-plan-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content-three/process-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content-three/project-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content-three/project-v2.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content-three/service-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content-three/tab-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content-three/testimonial-v1.php';
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content-three/timeline-carousel-v1.php';
	if ( class_exists( 'WP_Job_Manager_Post_Types' ) ) :
		require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content-two/job-post.php';
	endif;
	// product shop woocommerce
	if ( class_exists( 'woocommerce' ) ) :
		require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/content/product-v1.php';
	endif;
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/shop/offer-v1.php';
	// shapes
	require_once CREOTE_ADDONS_DIR . '/inc/functions/elementor-widgets/shapes/shape-v1.php';
}

// Тепер «підсаджуємо» вашу функцію замість оригінальної.
add_action( 'elementor/widgets/register', 'my_creote_core_register_elementor_widgets', 10 );
