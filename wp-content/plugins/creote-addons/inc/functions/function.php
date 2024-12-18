<?php
namespace Elementor;
function creote_elementor_category_init_headers(){
    Plugin::instance()->elements_manager->add_category(
        '100',
        [
            'title'  => 'Creote Headers',
            'icon' => 'font',
			'panel' => 'close'
        ],
        1
    );
}
add_action('elementor/init','Elementor\creote_elementor_category_init_headers');
function creote_elementor_category_init_sliders(){
    Plugin::instance()->elements_manager->add_category(
        '101',
        [
            'title'  => 'Creote Sliders',
            'icon' => 'font'
        ],
        1
    );
}
add_action('elementor/init','Elementor\creote_elementor_category_init_sliders');
function creote_elementor_category_init_content(){
    Plugin::instance()->elements_manager->add_category(
        '102',
        [
            'title'  => 'Creote Content',
            'icon' => 'font'
        ],
        1
    );
}
add_action('elementor/init','Elementor\creote_elementor_category_init_content');
function creote_elementor_category_init_content_two(){
    Plugin::instance()->elements_manager->add_category(
        '103',
        [
            'title'  => 'Creote Content Two',
            'icon' => 'font'
        ],
        1
    );
}
add_action('elementor/init','Elementor\creote_elementor_category_init_content_two');
function creote_elementor_category_init_content_three(){
    Plugin::instance()->elements_manager->add_category(
        '104',
        [
            'title'  => 'Creote Content Three',
            'icon' => 'font'
        ],
        1
    );
}
add_action('elementor/init','Elementor\creote_elementor_category_init_content_three');
function creote_elementor_category_init_footer(){
    Plugin::instance()->elements_manager->add_category(
        '105',
        [
            'title'  => 'Creote Footer',
            'icon' => 'font'
        ],
        1
    );
}
add_action('elementor/init','Elementor\creote_elementor_category_init_footer');
function creote_elementor_category_init_bgs(){
    Plugin::instance()->elements_manager->add_category(
        '107',
        [
            'title'  => 'Creote Shapes And Backgrounds',
            'icon' => 'font'
        ],
        1
    );
}
add_action('elementor/init','Elementor\creote_elementor_category_init_bgs');
     /*-----to-get-nav-menu---------*/
	 if (!function_exists('creote_navmenu')) {
	function creote_navmenu() {
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
function get_creote_icon()
{ 
	// scrape list of icons from fontawesome css
	$pattern = '/\.((?:\w+(?:-)?)+):before\s*{\s*content/';
	$subject = file_get_contents(get_template_directory() . '/assets/css/font-awesome.min.css');
	preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);
	$icons = array();
	//fontawesome
	foreach($matches as $match)
	{
		$icons[] = array('value' => 'fa fas fab far '.$match[1], 'label' => $match[1]);
	}
    $patterntwo = '/\.(icon-(?:\w+(?:-)?)+):before\s*{\s*content/';
        $subjectwo = file_get_contents(get_template_directory() . '/assets/css/icomoon.css');
        preg_match_all($patterntwo, $subjectwo, $matchestwo, PREG_SET_ORDER);
	foreach($matchestwo as $match)
	{
		$icons[] = array('value' => ' '.$match[1], 'label' => $match[1]);
	}
	$icons = array_column($icons, 'label', 'value');
	//print_r($icons); exit('hellow');
	return $icons;
}
	//get project categories
function get_project_categories() {
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
					if (isset($term->slug) && isset($term->name)) {
						$options[$term->slug] = $term->name;
					}
				}
			}
		}
	}
	return $options;
}
	//get post categories
	function get_blog_categories() {
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
	//get product categories
	function get_product_categories() {
		$options = array();
		$taxonomy = 'product_cat';
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
	//get service categories
	function get_service_categories() {
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
if (!class_exists("creoteheader")) {
	class creoteheader {
	  function __construct() {
		add_shortcode('creote-header', [$this, 'creote_render_header']);
	  }
	  public function creote_render_header($atts, $content = '') {
		if (defined('ICL_SITEPRESS_VERSION')) {
			$post_id = apply_filters('wpml_object_id', $atts['id'], 'header', true);
		} elseif (function_exists('pll_get_post')) {
			// Check if Polylang is active
			$post_id = pll_get_post($atts['id'], pll_current_language());
		} else {
			// No translation plugins are active, use the provided ID
			$post_id = $atts['id'];
		}  
		$query_args = array(
			'p'         => $post_id,
			'post_type' => 'header',
		); 
		$post_query = new \WP_Query($query_args); 
		if ($post_query->have_posts()) {
			while ($post_query->have_posts()) {
				$post_query->the_post();
				// Check if Elementor plugin is active
				if ( class_exists( 'Elementor\Plugin' ) ) {
					// Elementor is active, proceed with using it
					$headerelementor = \Elementor\Plugin::instance();
					$header_elementor = $headerelementor->frontend->get_builder_content( $post_id  , true );
					if ( $header_elementor ) {
						echo do_shortcode( $header_elementor );
					} else {
						echo do_shortcode( get_the_content( null, false, $post_id ) );
					}
				} else {
					// Elementor is not active, handle the case accordingly
					echo do_shortcode( get_the_content( null, false, $post_id ) );
				}
				wp_reset_postdata(); 
				return; // Stop processing after outputting the content
			}
		} else {
			// Handle case when no posts match the criteria
			echo '<p>' . esc_html__('Sorry, no posts matched your criteria.', 'creote-addons') . '</p>';
		} 
	  } 
	}
	new creoteheader;
  }
  if (!class_exists("creotemegamenu")) {
	class creotemegamenu {
	  function __construct() {
		add_shortcode('creote-mega-menu', [$this, 'creote_render_megamenu']);
	  }
	  public function creote_render_megamenu($atts, $content = '') {
		$query_args = array(
			'p' => $atts['id'],
			'post_type' => 'mega_menu',
		);
		$post_query = new \WP_Query($query_args); ?>
		<?php if ($post_query->have_posts()) : ?>
			<!-- the loop -->
			<?php while ($post_query->have_posts()) : $post_query->the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
			<!-- end of the loop -->
			<?php wp_reset_postdata(); ?>
		<?php else : ?>
			<p><?php esc_html__('Sorry, no posts matched your criteria.', 'creote-addon'); ?></p>
		<?php endif;
	  }
	}
	new creotemegamenu;
  }
  if (!class_exists("creotefooter")) {
	class creotefooter {
	  function __construct() {
		add_shortcode('creote-footer', [$this, 'creote_render_footer']);
	  }
	  public function creote_render_footer($atts, $content = '') {
	   // Check if WPML is active
	   if (defined('ICL_SITEPRESS_VERSION')) {
			$post_id = apply_filters('wpml_object_id', $atts['id'], 'footer', true);
		} elseif (function_exists('pll_get_post')) {
			// Check if Polylang is active
			$post_id = pll_get_post($atts['id'], pll_current_language());
		} else {
			// No translation plugins are active, use the provided ID
			$post_id = $atts['id'];
		}   
		$query_args = array(
			'p'         => $post_id,
			'post_type' => 'footer',
		); 
		$post_query = new \WP_Query($query_args); 
		if ($post_query->have_posts()) {
			while ($post_query->have_posts()) {
				$post_query->the_post(); 
				// Check if Elementor plugin is active
				if ( class_exists( 'Elementor\Plugin' ) ) {
					// Elementor is active, proceed with using it
					$footerelementor = \Elementor\Plugin::instance();
					$footer_elementor = $footerelementor->frontend->get_builder_content( $post_id  , true );
					if ( $footer_elementor ) {
						echo do_shortcode( $footer_elementor );
					} else {
						echo do_shortcode( get_the_content( null, false, $post_id ) );
					}
				} else {
					// Elementor is not active, handle the case accordingly
					echo do_shortcode( get_the_content( null, false, $post_id ) );
				}
				wp_reset_postdata(); 
				return; // Stop processing after outputting the content
			}
		} else {
			// Handle case when no posts match the criteria
			echo '<p>' . esc_html__('Sorry, no posts matched your criteria.', 'creote-addons') . '</p>';
		}
	  }
	}
	new creotefooter;
  }
  if (!function_exists('creote_contact_form_7_query')) {
	function creote_contact_form_7_query($post_type)
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
  