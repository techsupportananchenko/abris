<?php

add_action('elementor/elements/categories_registered', function ($elements_manager) {

    $elements_manager->add_category(
        'custom',
        [
            'title' => esc_html__('Custom', 'website'),
            'icon' => 'eicon-posts-masonry',
        ]
    );
});

add_action('elementor/widgets/register', function ($widgets_manager) {

    require_once(get_stylesheet_directory() . '/elementor-widgets/product/main.php');

    $widgets_manager->register(new \Elementor_Hero_Widget());

});



add_action('wp_enqueue_scripts', function () {

    wp_register_style('stl-hero', get_stylesheet_directory_uri() . '/elementor-widgets/product/style.css', [], '1.0.0');
    wp_register_script('stl-hero', get_stylesheet_directory_uri() . '/elementor-widgets/product/main.js', [], '1.0.0', true);

});
