<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_list_items_v1_new extends Widget_Base
{
    public function get_name()
    {
        return 'creote-list-items-v2';
    }
    public function get_title()
    {
        return __('List Items V2' , 'creote-addons');
    }
    public function get_icon()
    {
        return 'icon-c';
    }
    public function get_categories()
    {
        return ['104'];
    }
    protected function register_controls(){ 
        $this->start_controls_section('list_cotnent_v1',
        [ 
            'label' => __('List cotnent', 'creote-addons')
        ]
        );
        $this->add_control(
            'display_inline',
            [
                'label' => __('Display Inline Enable', 'creote-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'icon_fonts',
            [
                'label' => __('Icon', 'creote-addons'),
                'type' => Controls_Manager::ICON,
                'options' => get_creote_icon(),
                'default' => 'fa fa-correct',
            ]
        );
        $repeater->add_control(
            'list_cotnent',
            [
                'label' => __('List Items', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
        );
        $repeater->add_control(
			'website_link',
			[
				'label' => esc_html__( 'Link', 'creote-addons' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'creote-addons' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
			]
		);
        $this->add_control(
            'listiems_content_v1_repeater',
            [
                'label' => __('Icon Box Content', 'creote-addons'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                    'icon_fonts' =>  'flaticon-correct',
                    'list_cotnent' =>  __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'creote-addons'),
                    ],
                    [
                    'icon_fonts' =>  'flaticon-correct',
                    'list_cotnent' =>  __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'creote-addons'),
                    ],
                    [
                     'icon_fonts' =>  'flaticon-correct',
                     'list_cotnent' =>  __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'creote-addons'),
                    ],
                    [
                    'icon_fonts' =>  'flaticon-correct',
                     'list_cotnent' =>  __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'creote-addons'),
                    ],
                ],
                'title_field' => '{{{ list_cotnent }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section('list_css',
        [ 
            'label' => __('List Items Css ', 'creote-addons'),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
        );
        $this->add_control(
            'icon_color',
             [
                'label' => __(' Icon Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .list_items_new_box .icon' => 'color: {{VALUE}}!important',
                ],
             ]
          );
          $this->add_control(
            'icon_font_size',
             [
                'label' => __(' Icon Font Size', 'creote-addons'),
                'type' => Controls_Manager::NUMBER,
                 'selectors' => [
					'{{WRAPPER}} .list_items_new_box .icon' => 'font-size: {{VALUE}}px!important',
                ],
             ]
          );
          $this->add_control(
            'icon_line_height',
             [
                'label' => __(' Icon Line Height', 'creote-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => '25px',
                'placeholder' => __('25px', 'creote-addons'),
                 'selectors' => [
					'{{WRAPPER}} .list_items_new_box .icon' => 'line-height: {{VALUE}}px!important',
                ],
             ]
          );
          $this->add_control(
            'hrfive',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
           );
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'List Typo', 'creote-addons' ),
				'name' => 'list_typo',
				'selector' => '{{WRAPPER}} .list_items_new_box li a',
			]
		);
          $this->add_control(
            'list_item_font_color',
             [
                'label' => __(' List Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .list_items_new_box li a' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
			'list_item_padding',
			[
				'label' => esc_html__( 'Padding', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .list_items_new_box li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
          $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
        ?> 
        <ul class="list_items_new_box type_one <?php if($settings['display_inline'] == 'yes'): ?> display_inline <?php endif; ?>"> <?php foreach($settings['listiems_content_v1_repeater'] as $listitemsblock): $website_link_target = $listitemsblock['website_link']['is_external'] ? ' target="_blank"' : ''; $website_link_nofollow = $listitemsblock['website_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <li> <a href="<?php echo esc_url($listitemsblock['website_link'] ['url']); ?>" <?php echo esc_attr($website_link_target); ?> <?php echo esc_attr($website_link_nofollow); ?>> <span class="<?php echo esc_html($listitemsblock['icon_fonts']); ?> icon"></span> <?php echo wp_kses($listitemsblock['list_cotnent'] , $allowed_tags); ?> </a> </li> <?php endforeach; ?></ul>
<?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_list_items_v1_new());