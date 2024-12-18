<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_theme_btn_v1_new extends Widget_Base
{
    public function get_name()
    {
        return 'creote-theme-btn-v2';
    }
    public function get_title()
    {
        return __('Theme Button', 'creote-addons');
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
        $this->start_controls_section('themebtn_content',
        [ 
            'label' => __('Theme Button Content', 'creote-addons')
        ]
        );
        $this->add_control(
            'button_types',
            [
                'label' => __('Button  Type', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'type_one' => __( 'Button Type One', 'creote-addons' ),
                    'r_type_one' => __( 'Button Type Two', 'creote-addons' ),
				],
                'default' => 'type_one',
            ]
        );
        $this->add_control(
            'button_text',
            [
                'label' => __('button  Text', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
           );
           $this->add_control(
            'button_icon',
            [
                'label' => __('Icon', 'creote-addons'),
                'type' => Controls_Manager::SELECT2,
                'options' => get_creote_icon(),
                'default' => __('' , 'creote-addons'),
            ]
        );
           $this->add_control(
            'button_link',
        [ 
            'label' => __('Button Link', 'creote-addons'),
            'type' => Controls_Manager::URL,
            'placeholder' => __('https://your-link.com', 'creote-addons'),
            'show_external' => true,
            'default' => [
                'url' => '#',
                'is_external' => true,
                'nofollow' => true,
            ],
        ]);
        $this->end_controls_section();
        $this->start_controls_section('button_css',
        [ 
            'label' => __('Button Css ', 'creote-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [
                'button_types' => ['type_one'],
            ]
        ]
        );
        $this->add_responsive_control(
            'button_align_ment',
            [
                'label' => __('Heading Alignment', 'creote-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'text_left' => [
                        'title' => __('Text Left', 'creote-addons'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'text_center' => [
                        'title' => __('Text Center', 'creote-addons'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'text_right' => [
                        'title' => __('Text Right', 'creote-addons'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'text_left',
                'toggle' => true,
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'themebtn_typo',
				'selector' => '{{WRAPPER}} .theme_btn ',
			]
		);
        $this->add_control(
			'button_border-radius',
			[
				'label' => esc_html__( 'Border Radius', 'creote-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .theme_btn ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
          $this->add_control(
            'theme_btn_text_color',
             [
                'label' => __('Button Text Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .theme_btn' => 'color: {{VALUE}}!important',
				],
             ]
          );
          $this->add_control(
            'theme_btn_bg_color',
             [
                'label' => __('Button Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .theme_btn' => 'background-color: {{VALUE}}!important; background-image:none;',
				],
             ]
          );
          $this->add_control(
            'theme_btn_border_color',
             [
                'label' => __('Button Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .theme_btn' => 'border-color: {{VALUE}}!important; background-image:none;',
				],
             ]
          );
          $this->add_control(
            'hover_theme_btn_text_color',
             [
                'label' => __('Hover Button Text Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .theme_btn:hover' => 'color: {{VALUE}}!important',
				],
             ]
          );
          $this->add_control(
            'hover_theme_btn_bg_color',
             [
                'label' => __('Hover Button Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .theme_btn:hover' => 'background-color: {{VALUE}}!important; background-image:none;',
				],
             ]
          );    
           $this->add_control(
            'hover_theme_btn_border_color',
             [
                'label' => __('Hover Button Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .theme_btn:hover' => 'border-color: {{VALUE}}!important; background-image:none;',
				],
             ]
          );
        $this->end_controls_section();
        $this->start_controls_section('type_three_css',
        [ 
            'label' => __('Read More Css ', 'creote-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [
                'button_types' => 'r_type_one',
            ]
        ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'readmore_typo',
				'selector' => '{{WRAPPER}} .read_more ',
			]
		);
        $this->add_control(
            'readmore_text_css',
             [
                'label' => __('Read More Text Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .read_more' => 'color: {{VALUE}}!important',
				],
             ]
          );
        $this->add_control(
            'readmore_icon_css',
             [
                'label' => __('Read More Icon Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .read_more span' => 'color: {{VALUE}}!important',
				],
             ]
        );
        $this->add_control(
            'readmore_bg_css',
             [
                'label' => __('Read More Background Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .read_more::after ' => 'background: {{VALUE}}!important',
				],
             ]
        );
        $this->add_control(
            'hover_readmore_text_css',
             [
                'label' => __('Hover Read More Text Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .read_more:hover' => 'color: {{VALUE}}!important',
				],
             ]
          );
          $this->add_control(
            'hover_readmore_icon_css',
             [
                'label' => __('Hover Read More Icon Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .read_more:hover span' => 'color: {{VALUE}}!important',
				],
             ]
        );
        $this->add_control(
            'hover_readmore_bg_css',
             [
                'label' => __('Hover Read More Background Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .read_more:hover::after ' => 'background: {{VALUE}}!important',
				],
             ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $button_target = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
        $button_nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : ''; 
        ?> 
   <div class="theme_btn_all_new <?php echo $settings['button_align_ment']; ?>"> <?php if($settings['button_types'] == 'r_type_one'): ?> <a href="<?php echo esc_url($settings['button_link'] ['url']); ?>" class="read_more <?php echo $settings['button_types']; ?>" <?php echo esc_attr($button_target); ?> <?php echo esc_attr($button_nofollow); ?>><?php echo esc_html($settings['button_text']); ?> <?php if($settings['button_icon']) : ?> <span class="<?php echo $settings['button_icon']; ?>"></span> <?php endif; ?> </a> <?php else: ?> <a href="<?php echo esc_url($settings['button_link'] ['url']); ?>" class="theme_btn <?php echo $settings['button_types']; ?>" <?php echo esc_attr($button_target); ?> <?php echo esc_attr($button_nofollow); ?>> <?php echo esc_html($settings['button_text']); ?> <?php if($settings['button_icon']) : ?> <span class="<?php echo $settings['button_icon']; ?>"></span> <?php endif; ?> </a> <?php endif; ?> </div>
        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_theme_btn_v1_new());
