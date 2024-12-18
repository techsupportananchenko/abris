<?php
/*
Post type : Mega Menu;
version: 1.0;
Authour : Steeltheme;
*/
add_action('init','mega_menu_custom_post_type');
function mega_menu_custom_post_type() {
	register_post_type( 'mega_menu',
	array(
	'labels' => array(
	'name' => esc_html_x('Mega Menus ', 'Post Type General Name', 'creote-addons') ,
	'singular_name' => esc_html_x('Mega Menu', 'Post Type General Name', 'creote-addons') , 
	'add_new' =>  esc_html__('Add New', 'creote-addons'),
	'add_new_item' =>   esc_html__('Add New Mega Menu', 'creote-addons'),
	'edit' => esc_html__('Edit', 'creote-addons'),
	'edit_item' =>   esc_html__('Edit Mega Menu', 'creote-addons'),
	'new_item' =>   esc_html__('New Mega Menu', 'creote-addons'),
	'view' =>  esc_html__('View', 'creote-addons'),
	'view_item' =>    esc_html__('View Mega Menu', 'creote-addons'),
	'search_items' =>   esc_html__('Search Mega Menu', 'creote-addons'),
	'not_found' =>   esc_html__('No Mega Menu found', 'creote-addons'),
	'not_found_in_trash' =>  esc_html__('No Mega Menu found in Trash', 'creote-addons'),
	'parent' =>  esc_html__('Parent Mega Menu', 'creote-addons')
	),
	'public' => true,
	'show_in_rest' => true,
	'menu_position' => 15,
	'supports' =>
	array( 'title', 
	'thumbnail' , 'editor' , 'page-attributes'),
	'taxonomies' => array( '' ),
	'show_in_menu'        => 'creote',
	'show_in_nav_menus'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-schedule',
	'has_archive' => false,
    'hierarchical'          => true,
    'capability_type'    => 'post',
	)
	);
}
