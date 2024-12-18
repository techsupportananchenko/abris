<?php
/*
Post type : Projects;
version: 1.0;
Authour : Steeltheme;
*/
add_action('init','project_custom_post_type');
function project_custom_post_type() {
	register_post_type( 'project',
	array(
	'labels' => array(
	'name' => esc_html_x('Projects', 'Post Type General Name', 'creote-addons') ,
	'singular_name' => esc_html_x('Project', 'Post Type General Name', 'creote-addons') , 
	'add_new' =>  esc_html__('Add New', 'creote-addons'),
	'add_new_item' =>   esc_html__('Add New Project', 'creote-addons'),
	'edit' => esc_html__('Edit', 'creote-addons'),
	'edit_item' =>   esc_html__('Edit Project', 'creote-addons'),
	'new_item' =>   esc_html__('New Project', 'creote-addons'),
	'view' =>  esc_html__('View', 'creote-addons'),
	'view_item' =>    esc_html__('View Project', 'creote-addons'),
	'search_items' =>   esc_html__('Search Project', 'creote-addons'),
	'not_found' =>   esc_html__('No Project found', 'creote-addons'),
	'not_found_in_trash' =>  esc_html__('No Project found in Trash', 'creote-addons'),
	'parent' =>  esc_html__('Parent Project', 'creote-addons')
	),
	'public' => true,
	'show_in_rest' => true,
	'menu_position' => 15,
	'supports' =>
	array( 'title', 'editor', 'comments',
	'thumbnail', 'excerpt'  ),
	'taxonomies' => array( '' ),
	'show_in_menu'        => true,
	'show_in_nav_menus'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-pinterest',
	'has_archive' => false,
	'capability_type'    => 'post',
	)
	);
}
add_action( 'init' , 'project_custom_taxonomies' );
function project_custom_taxonomies() {
	//add new taxonomy hierarchical
	$labels = array(
		'name' =>   esc_html__('Project Categories', 'creote-addons'),
		'singular_name' =>  esc_html__('Category', 'creote-addons'),
		'search_items' =>  esc_html__('Search Category', 'creote-addons'),
		'all_items' =>  esc_html__('All Category', 'creote-addons'),
		'parent_item' =>  esc_html__('Parent Category', 'creote-addons'),
		'parent_item_colon' =>   esc_html__('Parent Category:', 'creote-addons'),
		'edit_item' =>   esc_html__('Edit Category', 'creote-addons'),
		'update_item' =>   esc_html__('Update Category', 'creote-addons'),
		'add_new_item' =>  esc_html__('Add New Project Category', 'creote-addons'),
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
		'rewrite' => array( 'slug' => 'project_category' )
	);
	register_taxonomy('project_category', array('project'), $args);
	//add new taxonomy NOT hierarchical
}
add_filter( 'template_include', 'include_project_template_function', 1 );
function include_project_template_function( $template_path ) {
	if ( get_post_type() == 'project' ) {
		if ( is_single() ) {
			// checks if the file exists in the theme first,
			// otherwise serve the file from the plugin
			if ( $theme_file = locate_template(array('single-project.php'))){
				$template_path = $theme_file;
			} 
		}
	}
	return $template_path;
}
