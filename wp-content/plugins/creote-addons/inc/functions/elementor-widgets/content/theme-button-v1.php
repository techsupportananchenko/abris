<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_theme_btn_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-themebtns-v1';
       }
       public function get_title()
       {
           return __('Theme Buttons' , 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['102'];
       }
       protected function register_controls()
       {
           $this->start_controls_section(
               'theme_btn_content',
               [
                   'label' => __('theme Button Content', 'creote-addons')
               ]
           );
           $this->add_control(
               'theme_btn_styles',
               [
                   'label' => __('theme Button Styles', 'creote-addons'),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
                       'style_one' => __( 'Style One', 'creote-addons' ),
                       'style_two' => __( 'Style Two', 'creote-addons' ),
                       'style_three' => __( 'Style Three', 'creote-addons' ),
                       'style_four' => __( 'Style Four', 'creote-addons' ),
                       'style_five' => __( 'Style Five', 'creote-addons' ),
   				],
                   'default' => __('style_one' , 'creote-addons'),
               ]
           );
           $this->add_responsive_control(
             'dark_white',
             [
               'label' => __( 'Button Color Type', 'creote-addons' ),
               'type' => Controls_Manager::SELECT,
               'options' => [
                 'color_one' => __('Color One', 'creote-addons'), 
                 'color_two' => __('Color Two', 'creote-addons'),
                 ],
                'default' => 'color_one',
             ]
           );
           $this->add_responsive_control(
             'btn_alignments',
             [
                 'label' => __('Button alignments', 'creote-addons'),
                 'type' => Controls_Manager::CHOOSE,
                 'options' => [
                   'left' => [
                     'title' => __( 'Text Left', 'creote-addons' ),
                     'icon' => 'fa fa-align-left',
                   ],
                   'center' => [
                     'title' => __( 'Text Center', 'creote-addons' ),
                     'icon' => 'fa fa-align-center',
                   ],
                   'right' => [
                     'title' => __( 'Text Right', 'creote-addons' ),
                     'icon' => 'fa fa-align-right',
                   ],
                 ],
                 'default' => 'left',
                 'toggle' => true,
                 'selectors' => [
                   '{{WRAPPER}} .theme_btn_all  ' => 'text-align: {{VALUE}}!important;',
                 ],
             ]
         );
           $this->add_control(
   			'button_text',
   			[
   				'label'       => esc_html__( 'Button Text', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                'default' =>  esc_html__( 'Contact us' , 'creote-addons'),
   		    ]);
           $this->add_control(
               'button_link',
           [
               'label' => __('Theme Link', 'creote-addons'),
               'type' => Controls_Manager::URL,
               'placeholder' => __('https://your-link.com', 'creote-addons'),
               'show_external' => true,
               'default' => [
                   'url' => '#',
                   'is_external' => true,
                   'nofollow' => true,
               ],
            ]
           );  
        $this->end_controls_section();
       $this->start_controls_section('theme_btn_css',
       [ 
           'label' => __('Theme Button Css', 'creote-addons'),
           'tab' =>Controls_Manager::TAB_STYLE,
       ]
       );
       $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
          'name' => 'btn_typo',
          'label' => __('Subtitle Typography ', 'creote-addons'),
          'selector' => '{{WRAPPER}} .theme_btn_all a ',
        ]
      );
       $this->add_control(
         'button_color',
          [
             'label' => __('Button Text Color', 'creote-addons'),
             'type' => Controls_Manager::COLOR,
             'selectors' => [
                 '{{WRAPPER}}  .theme_btn_all a ' => 'color: {{VALUE}}!important;',
             ],
          ]
       );
       $this->add_control(
         'background_color',
          [
             'label' => __('Button Background Color', 'creote-addons'),
             'type' => Controls_Manager::COLOR,
             'selectors' => [
                 '{{WRAPPER}}  .theme_btn_all a ' => 'background: {{VALUE}}!important;',
             ],
          ]
       );
       $this->add_control(
         'border_color',
          [
             'label' => __('Button Border Color', 'creote-addons'),
             'type' => Controls_Manager::COLOR,
             'selectors' => [
                 '{{WRAPPER}}  .theme_btn_all a ' => 'border-color: {{VALUE}}!important;',
             ],
          ]
       );
       $this->add_responsive_control(
        'heightbtn',
            [
                'label' => __('Button Height', 'creote-addons'),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 1000,
                'step'    => 1,
                'selectors' => [
                    '{{WRAPPER}}  .theme_btn_all a ' => 'height: {{VALUE}}px!important; min-height: {{VALUE}}px!important; min-width:unset!important;',
                ],
            ]
        );
       $this->add_responsive_control(
   			'border_radius',
   			[
   				'label' => __( 'Border Radius', 'creote-addons' ),
   				'type' => Controls_Manager::DIMENSIONS,
   				'size_units' => ['px'],
   				'selectors' => [
   					'{{WRAPPER}} .theme_btn_all a   ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
   				],
   			]
       );
       $this->add_responsive_control(
        'padding',
        [
            'label' => __( 'Border Radius', 'creote-addons' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px'],
            'selectors' => [
                '{{WRAPPER}} .theme_btn_all a   ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
            ],
        ]
        );
       $this->add_control(
         'button_color_hover',
          [
             'label' => __('Button Hover Text Color', 'creote-addons'),
             'type' => Controls_Manager::COLOR,
             'selectors' => [
                 '{{WRAPPER}}  .theme_btn_all a:hover ' => 'color: {{VALUE}}!important;',
             ],
          ]
       );
       $this->add_control(
         'background_color_hover',
          [
             'label' => __('Button Hover Background Color', 'creote-addons'),
             'type' => Controls_Manager::COLOR,
             'selectors' => [
                 '{{WRAPPER}}  .theme_btn_all a:hover ' => 'background: {{VALUE}}!important;',
             ],
          ]
       );
       $this->add_control(
         'border_color_hover',
          [
             'label' => __('Button Hover Border Color', 'creote-addons'),
             'type' => Controls_Manager::COLOR,
             'selectors' => [
                 '{{WRAPPER}}  .theme_btn_all a:hover ' => 'border-color: {{VALUE}}!important;',
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
<?php $target = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
   $nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
<div class="theme_btn_all <?php echo esc_attr($settings['dark_white']); ?>"> <?php if($settings['theme_btn_styles'] == 'style_two'):?> <a href="<?php echo esc_url($settings['button_link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn two"> <?php echo esc_html($settings['button_text']);?> </a> <?php elseif($settings['theme_btn_styles'] == 'style_three'):?> <a href="<?php echo esc_url($settings['button_link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn three"> <?php echo esc_html($settings['button_text']);?> </a> <?php elseif($settings['theme_btn_styles'] == 'style_four'):?> <a href="<?php echo esc_url($settings['button_link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn four"> <?php echo esc_html($settings['button_text']);?> <i class="icon-right-arrow"></i> </a> <?php elseif($settings['theme_btn_styles'] == 'style_five'):?> <a href="<?php echo esc_url($settings['button_link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn five"> <?php echo esc_html($settings['button_text']);?> <i class="icon-right-arrow"></i> </a> <?php else: ?> <a href="<?php echo esc_url($settings['button_link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn one"> <?php echo esc_html($settings['button_text']);?> </a> <?php endif; ?></div>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_theme_btn_v1());