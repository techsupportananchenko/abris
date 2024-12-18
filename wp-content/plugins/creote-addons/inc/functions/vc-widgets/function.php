<?php
if (!function_exists('vc_creote_navmenu')) {
	function vc_creote_navmenu() {
		$options = array();
		$nvmenus = wp_get_nav_menus();
			if (!empty($nvmenus)) {
				foreach ($nvmenus as $navigationmenu) {
					if (isset($navigationmenu)) {
						$options[''] = 'Select';
						if (isset($navigationmenu->slug) && isset($navigationmenu->name)) {
							$options[$navigationmenu->slug] = $navigationmenu->name;
						}
					}
				}
			}
		return $options;
	}
}
if (!function_exists('vc_get_creote_icons')) {
function vc_get_creote_icons()
{ 
	// scrape list of icons from fontawesome css
	$vcpattern = '/\.(fa-(?:\w+(?:-)?)+):before\s*{\s*content/';
	$vcsubject = file_get_contents(get_template_directory() . '/assets/css/font-awesome.min.css');
	preg_match_all($vcpattern, $vcsubject, $vcmatches, PREG_SET_ORDER);
	$vcicons = array();
	//fontawesome
	foreach($vcmatches as $vcmatche)
	{
		$vcicons[] = array('value' => 'fa '.$vcmatche[1], 'label' => 'fa '.$vcmatche[1]);
	}
    $vcpatterntwo = '/\.(icon-(?:\w+(?:-)?)+):before\s*{\s*content/';
        $vcsubjectwo = file_get_contents(get_template_directory() . '/assets/css/icomoon.css');
        preg_match_all($vcpatterntwo, $vcsubjectwo, $vcmatchestwo, PREG_SET_ORDER);
	foreach($vcmatchestwo as $vcmatch)
	{
		$vcicons[] = array('value' => 'icon '.$vcmatch[1], 'label' => 'icon '.$vcmatch[1]);
	}
	$vcicons = array_column($vcicons, 'label', 'value');
	//print_r($icons); exit('hellow');
	return $vcicons;
}
}
	//get post categories
	function vc_get_blog_categories() {
		$options = array();
		$taxonomy = 'category';
		if (!empty($taxonomy)) {
			$terms = get_terms(
					array(
						'parent' => 0,
						'taxonomy' => $taxonomy,
						'hide_empty' => false,
					)
			);
			if (!empty($terms)) {
				foreach ($terms as $term) {
					if (isset($term)) {
						$options[''] = 'Select';
						if (isset($term->slug) && isset($term->name)) {
							$options[$term->slug] = $term->name;
						}
					}
				}
			}
		}
		return $options;
	}
		//get project categories
function vc_get_project_categories() {
	$options = array();
	$taxonomy = 'project_category';
	if (!empty($taxonomy)) {
		$terms = get_terms(
				array(
					'parent' => 0,
					'taxonomy' => $taxonomy,
					'hide_empty' => false,
				)
		);
		if (!empty($terms)) {
			foreach ($terms as $term) {
				if (isset($term)) {
					$options[''] = 'Select';
					if (isset($term->slug) && isset($term->slug)) {
						$options[$term->slug] = $term->slug;
					}
				}
			}
		}
	}
	return $options;
}
		//get service categories
function vc_get_service_categories() {
	$options = array();
	$taxonomy = 'service_category';
	if (!empty($taxonomy)) {
		$terms = get_terms(
				array(
					'parent' => 0,
					'taxonomy' => $taxonomy,
					'hide_empty' => false,
				)
		);
		if (!empty($terms)) {
			foreach ($terms as $term) {
				if (isset($term)) {
					$options[''] = 'Select';
					if (isset($term->slug) && isset($term->name)) {
						$options[$term->slug] = $term->name;
					}
				}
			}
		}
	}
	return $options;
}
if (!function_exists('vc_creote_contact_form_7_query')) {
	function vc_creote_contact_form_7_query($post_type)
	{
		$post_list = get_posts(array(
			'post_type' => $post_type,
			'showposts' => -1,
		));
		$posts = array();
		if (!empty($post_list) && !is_wp_error($post_list)) {
			foreach ($post_list as $post) {
				$options[$post->ID] = $post->post_title;
			}
			return $options;
		}
}
}