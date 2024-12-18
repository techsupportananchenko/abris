<?php
/*
==========================================
Meta Box Css File
==========================================
*/

require_once ('WP_Bootstrap_Navwalker.php');

function creote_cat_meta_postbox_css(){
	wp_enqueue_style('meta-box-css', get_template_directory_uri().'/assets/css/metabox.css' );    
  }
add_action('admin_enqueue_scripts', 'creote_cat_meta_postbox_css');
/*
==========================================
Theme Support
==========================================
*/
function creote_setup(){
if(!isset($content_width))
$content_width = 840;
/*---------- Make theme available for translation-----------*/
load_theme_textdomain('creote', get_template_directory() . '/lang');
/*----------Add Theme Support-----------*/
add_theme_support('post-thumbnails');
add_theme_support('html5', array(
    'search-form'
));
add_theme_support('title-tag');
add_theme_support('post_format', ['aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat']);
add_theme_support('automatic-feed-links');
/*----------woocommerce Theme Support-----------*/ 
add_theme_support( 'woocommerce');
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
/*----------editor-style-----------*/
add_editor_style('assets/css/editor-style.css');
/*----------register_nav_menus-----------*/
register_nav_menus(array(
     'primary' => esc_html__('Primary Menu (For Sticky Header And Mobile Header)', 'creote') ,
));
}
add_action('after_setup_theme', 'creote_setup');

/*
==========================================
Register widgetized area and update sidebar with default widgets.
==========================================
*/
function creote_register_sidebar(){
    $sidebars = array(
        'sidebar-blog' => esc_html__('Blog Sidebar', 'creote') ,
        'page-sidebar' => esc_html__('Page Sidebar', 'creote') ,
        'shop-sidebar' => esc_html__('Shop Sidebar', 'creote') ,
        'service-sidebar' => esc_html__('Service Sidebar', 'creote') ,
    );
    // Register sidebars
    foreach ($sidebars as $id => $name)
    {
        register_sidebar(
        array(
            'name' => $name,
            'id' => $id,
            'description' => esc_html__('Add widgets here in order to display on pages', 'creote') ,
            'before_widget' => '<div class="widgets_grid_box"><div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div> </div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));
    }
}

add_action('widgets_init', 'creote_register_sidebar');
 

/*
==========================================
 Required Files
==========================================
*/
require_once get_template_directory() . "/includes/admin/dashboard/pluigns/class-tgm-plugin-activation.php";
require_once get_template_directory() . "/includes/admin/dashboard/pluigns/list-plugins.php";
require_once get_template_directory() . '/includes/admin/dashboard/class-dashboard.php';
/*------includes > Options---------------*/
if(class_exists('RW_Meta_Box')){
    require_once get_template_directory() . '/includes/options/metabox.php';
}
/*----includes > custom-menu-option--------*/
require_once get_template_directory() . '/includes/custom-menu-option.php';
/*------ includes > common---------------*/
require_once get_template_directory() . '/includes/common/functions/header-source.php';
require_once get_template_directory() . '/includes/common/functions/layout.php';
require_once get_template_directory() . '/includes/common/functions/classes.php';
require_once get_template_directory() . '/includes/common/functions/meta.php';
require_once get_template_directory() . '/includes/common/lib/breadcrumbs.php';
/*------ templateparts > header---------------*/
require_once get_template_directory() . '/template-parts/headers/header-content.php';
require_once get_template_directory() . '/template-parts/headers/sticky-header.php';
require_once get_template_directory() . '/template-parts/headers/mobile-menu.php';
/*------ templateparts > pageheader---------------*/
require_once get_template_directory() . '/template-parts/page-header/default-page-header.php';
/*------ Redux---------------*/
if(class_exists('Redux')){
    require_once get_template_directory() . '/template-parts/page-header/page-header.php';
    require_once get_template_directory() . '/template-parts/page-header/blog-pageheader.php';
    require_once get_template_directory() . '/includes/options/theme-option.php';
    require_once get_template_directory() . '/includes/options/typography-css.php';
    require_once get_template_directory() . '/includes/options/config.php';
}
/*------includes > functions---------------*/
require_once get_template_directory() . '/includes/lib/functions/comments.php';
//require_once get_template_directory() . '/includes/lib/functions/authour-and-tags.php';
require_once get_template_directory() . '/includes/lib/functions/nav.php';
/*------includes > libs---------------*/
require_once get_template_directory() . '/template-parts/related-posts.php';
require_once get_template_directory() . '/includes/custom/color-switcher.php';
require_once get_template_directory() . '/includes/custom/side-menu-btn.php';
require_once get_template_directory() . '/includes/custom/side-menu.php';
require_once get_template_directory() . '/includes/demo-content/demo-content.php';
 
// woocommerce
if(class_exists('woocommerce')){
    require_once get_template_directory() . '/includes/lib/woocom/action.php';
    require_once get_template_directory() . '/includes/lib/woocom/min-cart.php';
    require_once get_template_directory() . '/includes/quick-view-template.php';
 
}
function ifnotactivated() {
    $isActivated = get_option('purchase_code') ? true : false; 
    if (!$isActivated) {
        return false;
    } 
    return true;
}  
// wpbakery
/*add_action( 'vc_before_init', 'creote_vc_remove_css' );
function creote_vc_remove_css() {
    vc_remove_param('vc_row', 'css');
}*/ 

$isActivated = get_option("purchase_code") ? true : false;

function sanitize_checkbox($input) {
    return ($input == true) ? true : false;
}

function sanitize_textarea($input) {
    return sanitize_text_field($input);
}

function sanitize_custom_image($input) {
    // Sanitize the image URL using esc_url or any custom logic you need
    return esc_url($input);
}

if (!$isActivated) {
    function custom_theme_customize_register($wp_customize) {
        // Add a section
        $wp_customize->add_section('custom_theme_section', array(
            'title' => 'Staging Site',
            'priority' => 30,
        ));
    
        // Add the checkbox control
        $wp_customize->add_setting('enable_custom_feature', array(
            'default' => false,
            'sanitize_callback' => 'sanitize_checkbox',
        ));
    
        $wp_customize->add_control('enable_custom_feature', array(
            'label' => 'Staging Site Enable / Disable',
            'section' => 'custom_theme_section',
            'type' => 'checkbox',
        ));
    
        // Add image control with sanitize_callback
        $wp_customize->add_setting('custom_image_setting', array(
            'sanitize_callback' => 'sanitize_custom_image', // Add your custom image sanitization function
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize,
            'custom_image_setting',
            array(
                'label' => 'Maintenance Background Image',
                'section' => 'custom_theme_section',
                'settings' => 'custom_image_setting',
            )
        ));
    
        // Add text controls with sanitization
        $wp_customize->add_setting('custom_text_setting_two', array(
            'sanitize_callback' => 'sanitize_textarea',
        ));
        $wp_customize->add_control('custom_text_setting_two', array(
            'label' => 'Title',
            'section' => 'custom_theme_section',
            'type' => 'textarea',
        ));
    
        $wp_customize->add_setting('custom_text_setting', array(
            'sanitize_callback' => 'sanitize_textarea',
        ));
        $wp_customize->add_control('custom_text_setting', array(
            'label' => 'Content',
            'section' => 'custom_theme_section',
            'type' => 'textarea',
        ));
    
        // Other controls...
    }
    add_action('customize_register', 'custom_theme_customize_register');
}
