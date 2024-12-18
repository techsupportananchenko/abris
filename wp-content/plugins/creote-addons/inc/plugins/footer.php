<?php
/*
Post type : Footer;
version: 1.0;
Authour : Steeltheme;
*/
add_action('init','Footer_custom_post_type');
function Footer_custom_post_type() {
	register_post_type( 'footer',
	array(
	'labels' => array(
		'name' => esc_html_x('Footers', 'Post Type General Name', 'creote-addons') ,
		'singular_name' => esc_html_x('Footers', 'Post Type General Name', 'creote-addons') , 
		'add_new' =>  esc_html__('Add New', 'creote-addons'),
		'add_new_item' =>   esc_html__('Add New Footer', 'creote-addons'),
		'edit' => esc_html__('Edit', 'creote-addons'),
		'edit_item' =>   esc_html__('Edit Footer', 'creote-addons'),
		'new_item' =>   esc_html__('New Footer', 'creote-addons'),
		'view' =>  esc_html__('View', 'creote-addons'),
		'view_item' =>    esc_html__('View Footer', 'creote-addons'),
		'search_items' =>   esc_html__('Search Footer', 'creote-addons'),
		'not_found' =>   esc_html__('No Footer found', 'creote-addons'),
		'not_found_in_trash' =>  esc_html__('No Footer found in Trash', 'creote-addons'),
		'parent' =>  esc_html__('Parent Footer', 'creote-addons')
	),
	'public' => true,
	'show_in_rest' => true,
	'menu_position' => 15,
	'supports' =>
	array( 'title', 
	'thumbnail' , 'editor' , 'page-attributes' ),
	'taxonomies' => array( '' ),
	'show_in_menu'        => 'creote',
	'show_in_nav_menus'   => false,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-tagcloud',
	'has_archive' => false,
	'capability_type'    => 'post',
	'hierarchical'          => true,
	)
	);
}
add_action( 'init' , 'Footer_custom_taxonomies' );
function Footer_custom_taxonomies() {
	//add new taxonomy hierarchical
	$labels = array(
		'name' =>   esc_html__('Footer Categories', 'creote-addons'),
		'singular_name' =>  esc_html__('Category', 'creote-addons'),
		'search_items' =>  esc_html__('Search Category', 'creote-addons'),
		'all_items' =>  esc_html__('All Category', 'creote-addons'),
		'parent_item' =>  esc_html__('Parent Category', 'creote-addons'),
		'parent_item_colon' =>   esc_html__('Parent Category:', 'creote-addons'),
		'edit_item' =>   esc_html__('Edit Category', 'creote-addons'),
		'update_item' =>   esc_html__('Update Category', 'creote-addons'),
		'add_new_item' =>  esc_html__('Add New Footer Category', 'creote-addons'),
		'new_item_name' =>   esc_html__('New Category Name', 'creote-addons'),
		'menu_name' => esc_html__('Categories', 'creote-addons')
	);
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'public'             => true,
		'publicly_queryable' => true,
		'show_in_rest' => true,
		'rewrite' => array( 'slug' => 'footer_category' )
	);
	register_taxonomy('footer_category', array('footer'), $args);
	//add new taxonomy NOT hierarchical
}
