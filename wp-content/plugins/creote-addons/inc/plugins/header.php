<?php
/*
Post type : Header;
version: 1.0;
Authour : Steeltheme;
*/
add_action('init','header_custom_post_type');
function header_custom_post_type() {
	register_post_type( 'header',
	array(
	'labels' => array(
	'name' => esc_html_x('Headers', 'Post Type General Name', 'creote-addons') ,
	'singular_name' => esc_html_x('Headers', 'Post Type General Name', 'creote-addons') , 
	'add_new' =>  esc_html__('Add New', 'creote-addons'),
	'add_new_item' =>   esc_html__('Add New Header', 'creote-addons'),
	'edit' => esc_html__('Edit', 'creote-addons'),
	'edit_item' =>   esc_html__('Edit Header', 'creote-addons'),
	'new_item' =>   esc_html__('New Header', 'creote-addons'),
	'view' =>  esc_html__('View', 'creote-addons'),
	'view_item' =>    esc_html__('View Header', 'creote-addons'),
	'search_items' =>   esc_html__('Search Header', 'creote-addons'),
	'not_found' =>   esc_html__('No Header found', 'creote-addons'),
	'not_found_in_trash' =>  esc_html__('No Header found in Trash', 'creote-addons'),
	'parent' =>  esc_html__('Parent Header', 'creote-addons')
	),
	'public' => true,
	'show_in_rest' => true,
	'menu_position' => 15,
	'rewrite'               => array('slug' => 'header'),
	'supports' =>
	array( 'title', 
	'thumbnail' , 'editor', 'page-attributes' ),
	'taxonomies' => array( '' ),
	'show_in_menu'        => 'creote',
	'show_in_nav_menus'   => false,
	'menu_position'       => 4,
	'menu_icon'           => 'dashicons-heading',
	'has_archive' => false,
	'capability_type'    => 'post',
	'hierarchical'          => true,
	)
	);
}
add_action( 'init' , 'header_custom_taxonomies' );
function header_custom_taxonomies() {
	//add new taxonomy hierarchical
	$labels = array(
		'name' =>   esc_html__('Header Categories', 'creote-addons'),
		'singular_name' =>  esc_html__('Category', 'creote-addons'),
		'search_items' =>  esc_html__('Search Category', 'creote-addons'),
		'all_items' =>  esc_html__('All Category', 'creote-addons'),
		'parent_item' =>  esc_html__('Parent Category', 'creote-addons'),
		'parent_item_colon' =>   esc_html__('Parent Category:', 'creote-addons'),
		'edit_item' =>   esc_html__('Edit Category', 'creote-addons'),
		'update_item' =>   esc_html__('Update Category', 'creote-addons'),
		'add_new_item' =>  esc_html__('Add New Header Category', 'creote-addons'),
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
		'rewrite' => array( 'slug' => 'header_category' )
	);
	register_taxonomy('header_category', array('header'), $args);
	//add new taxonomy NOT hierarchical
}
