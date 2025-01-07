<?php

class Elementor_Hero_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'stl_hero';
    }

    public function get_title()
    {
        return esc_html__('Our Products', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-product-description';
    }

    public function get_style_depends()
    {
        return ['stl-hero'];
    }

    public function get_script_depends()
    {
        return ['stl-hero'];
    }

    public function get_categories()
    {
        return ['custom'];
    }

    protected function register_controls()
    {
        // Content Tab Start

        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Content', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Type your sub title here', 'textdomain'),
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__('Sub Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Type your description here', 'textdomain'),
            ]
        );

        $this->add_control(
            'background_image',
            [
                'label' => esc_html__('Background Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'bg_image',
            [
                'label' => esc_html__('Background Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'product_title',
            [
                'label' => esc_html__('Product Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Product Title', 'textdomain'),
            ]
        );

        $repeater->add_control(
            'product_description',
            [
                'label' => esc_html__('Product Description', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Product Description', 'textdomain'),
            ]
        );

        $repeater->add_control(
            'product_icon',
            [
                'label' => esc_html__('Product Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'product_link',
            [
                'label' => esc_html__('More Details Link', 'textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'textdomain'),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'products',
            [
                'label' => esc_html__('Products', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [],
                'title_field' => '{{{ product_title }}}',
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if (empty($settings['title']) || empty($settings['sub_title'])) {
            return;
        }
        if (empty($settings['products']) || !is_array($settings['products'])) {
            return;
        }

        ob_start();

        get_template_part('elementor-widgets/product/view', '', $settings);

        echo ob_get_clean();
    }

    protected function content_template()
    {
    }
}
