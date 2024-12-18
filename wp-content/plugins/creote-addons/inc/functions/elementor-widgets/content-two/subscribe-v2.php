<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_subscribe_v2 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-subscribe-v2';
       }
       public function get_title()
       {
           return __('Newsletter V2' , 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['103'];
       }
       protected function register_controls()
       {
            $this->start_controls_section(
               'subscribe_content',
               [
                   'label' => __('Subscribe  Content', 'creote-addons')
               ]
           );
           $this->add_control(
               'subscribe_shortcode',
               [
               	'label'       => esc_html__( 'Shortcode', 'creote-addons' ),
   				   'type'        => Controls_Manager::TEXTAREA,
                  'default' =>  esc_html__( '' , 'creote-addons'),
                  'placeholder'  =>  esc_html__( '[mc4wp_form id="1174"]' , 'creote-addons'),
               ]
           );
            $this->add_control(
                'input_margin',
                [
                    'label' => esc_html__( 'Input  Margin', 'creote-addons' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .newsteller_simple input[type="email"]  ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
                    ],
                ]
            );
            $this->add_control(
                'input_padding',
                [
                    'label' => esc_html__( 'Input padding', 'creote-addons' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .newsteller_simple input[type="email"]  ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
                    ],
                ]
            );
            $this->add_control(
                'input_border_radius',
                [
                    'label' => esc_html__( 'Input Border Radius', 'creote-addons' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .newsteller_simple input[type="email"] ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
                    ],
                ]
            );
            $this->add_control(
                'input_border',
                [
                    'label' => esc_html__( 'Input Border Width', 'creote-addons' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .newsteller_simple input[type="email"]  ' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
                    ],
                ]
            );
            $this->add_control(
                'input_border_stylesss',
                [
                'label' => __('Input Border Styles', 'creote-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                  '' => __( 'Select', 'creote-addons' ),
                    'solid' => __( 'Solid', 'creote-addons' ),
                    'dotted' => __( 'Dotted', 'creote-addons' ),
                    'dashed' => __( 'Dashed', 'creote-addons' ),
                    'double' => __( 'Double', 'creote-addons' ),
                    'none' => __( 'None', 'creote-addons' ),
                ],
                'default' => __('' , 'creote-addons'),
                'selectors' => [
                    '{{WRAPPER}} .newsteller_simple input[type="email"]  ' => 'border-style: {{VALUE}}!important;',
                ],
                ]
            );
            $this->add_control(
                'input_border_color',
                 [
                    'label' => __('Input Border Color', 'creote-addons'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .newsteller_simple input[type="email"] ' => 'border-color: {{VALUE}}!important;',
                    ],
                 ]
            );
            $this->add_control(
                'input_color',
                 [
                    'label' => __('Input   Color', 'creote-addons'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .newsteller_simple input[type="email"] , {{WRAPPER}} .newsteller_simple input[type="email"]::placeholder ' => 'color: {{VALUE}}!important;',
                    ],
                 ]
            );
            $this->add_control(
                'input_bg',
                 [
                    'label' => __('Input Bg  Color', 'creote-addons'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .newsteller_simple input[type="email"] ' => 'background-color: {{VALUE}}!important;',
                    ],
                 ]
            );
            $this->add_control(
                'input_height',
                [
                    'label' => esc_html__( 'Input   Height', 'creote-addons' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 1000,
                    'step' => 1,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .newsteller_simple input[type="email"] ' => 'height: {{VALUE}}px!important;',
                    ],
                ]
            );
            $this->add_control(
                'colo',
                    [
                    'type' => Controls_Manager::DIVIDER, 
                    ]
            );
            $this->add_responsive_control(
                'button_position',
                [
                  'label' => __('Button Position', 'creote-addons'),
                  'type' => Controls_Manager::SELECT,
                  'options' => [
                    'absolute' => __( 'Position Absolute', 'creote-addons' ),
                    'relative' => __( 'Position Relative', 'creote-addons' ),
                  ],
                  'default' => __('relative' , 'creote-addons'),
                  'selectors' => [
                    '{{WRAPPER}}  .newsteller_simple input[type="submit"]  ' => 'position: {{VALUE}}; z-index:999; width:100%; left:0;',
                 ],
                ]
            );
        $this->add_control(
            'icon_moving_position',
            [
              'label'   => esc_html__( 'Button Moving Position', 'creote-addons' ),
              'type'    => Controls_Manager::SELECT,
              'default' => 'top_right',
              'options' => array(
                'top_left' => esc_html__( 'Top Left', 'creote-addons' ),
                'top_right' => esc_html__( 'Top Right', 'creote-addons' ),
              ),
              'condition' => [
                'button_position' => 'absolute',
              ],
            ]
          );
          $this->add_control(
            'top_right_top',
            [
                'label' => esc_html__( 'Button Move Top', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => -1000,
                'max' => 1000,
                'step' => 1,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .newsteller_simple input[type="submit"] ' => 'top: {{VALUE}}px!important;',
                ],
                'condition' => [
                  'icon_moving_position' => 'top_right',
                  'button_position' => 'absolute',
                ],
            ]
          );
          $this->add_control(
            'top_right_right',
            [
                'label' => esc_html__( 'Button Move Right', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => -1000,
                'max' => 1000,
                'step' => 1,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .newsteller_simple input[type="submit"] ' => 'right: {{VALUE}}px!important; left:unset!important;',
                ],
                'condition' => [
                  'icon_moving_position' => 'top_right',
                  'button_position' => 'absolute',
                ],
            ]
          );
          $this->add_control(
            'top_left_top',
            [
                'label' => esc_html__( 'Button Move Top', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => -1000,
                'max' => 1000,
                'step' => 1,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .newsteller_simple input[type="submit"] ' => 'top: {{VALUE}}px!important;',
                ],
                'condition' => [
                  'icon_moving_position' => 'top_left',
                  'button_position' => 'absolute',
                ],
            ]
          );
          $this->add_control(
            'top_left_left',
            [
                'label' => esc_html__( 'Button Move Left', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => -1000,
                'max' => 1000,
                'step' => 1,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .newsteller_simple input[type="submit"] ' => 'left: {{VALUE}}px!important; right:unset!important;',
                ],
                'condition' => [
                  'icon_moving_position' => 'top_left',
                  'button_position' => 'absolute',
                ],
            ]
          );
            $this->add_responsive_control(
                'buton_alignmentss',
                [
                    'label' => __('Button alignments', 'creote-addons'),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                      '0 0 auto 0' => [
                        'title' => __( 'Text Left', 'creote-addons' ),
                        'icon' => 'fa fa-align-left',
                      ],
                      '0 auto' => [
                        'title' => __( 'Text Center', 'creote-addons' ),
                        'icon' => 'fa fa-align-center',
                      ],
                      '0 auto 0 0' => [
                        'title' => __( 'Text Right', 'creote-addons' ),
                        'icon' => 'fa fa-align-right',
                      ],
                    ],
                    'default' => '0 auto',
                    'toggle' => true,
                    'selectors' => [
                      '{{WRAPPER}} .newsteller_simple input[type="submit"] ' => 'margin: {{VALUE}}!important; display:block!important;',
                    ],
                    'condition' => [ 
                        'button_position' => 'relative',
                      ],
                ]
            );
            $this->add_control(
                'button_height',
                [
                    'label' => esc_html__( 'Button  Height', 'creote-addons' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 1000,
                    'step' => 1,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .newsteller_simple input[type="submit"] ' => 'height: {{VALUE}}px!important; line-height: {{VALUE}}px!important; min-height: {{VALUE}}px!important;',
                    ],
                ]
            );
            $this->add_control(
                'button_width',
                [
                    'label' => esc_html__( 'Button  Width', 'creote-addons' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 1000,
                    'step' => 1,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .newsteller_simple input[type="submit"] ' => 'width: {{VALUE}}px!important; min-width: {{VALUE}}px!important;',
                    ],
                ]
            );
            $this->add_control(
                'button_border_radius',
                [
                    'label' => esc_html__( 'Button Border Radius', 'creote-addons' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .newsteller_simple input[type="submit"] ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
                    ],
                ]
            );
            $this->add_control(
                'button_border',
                [
                    'label' => esc_html__( 'Button Border Width', 'creote-addons' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .newsteller_simple input[type="submit"]  ' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
                    ],
                ]
            );
            $this->add_control(
                'button_border_stylesss',
                [
                'label' => __('Button Border Styles', 'creote-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                  '' => __( 'Select', 'creote-addons' ),
                    'solid' => __( 'Solid', 'creote-addons' ),
                    'dotted' => __( 'Dotted', 'creote-addons' ),
                    'dashed' => __( 'Dashed', 'creote-addons' ),
                    'double' => __( 'Double', 'creote-addons' ),
                    'none' => __( 'None', 'creote-addons' ),
                ],
                'default' => __('' , 'creote-addons'),
                'selectors' => [
                    '{{WRAPPER}} .newsteller_simple input[type="submit"]  ' => 'border-style: {{VALUE}}!important;',
                ],
                ]
            );
            $this->add_control(
                'button_border_color',
                 [
                    'label' => __('Button Border Color', 'creote-addons'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .newsteller_simple input[type="submit"] ' => 'border-color: {{VALUE}}!important;',
                    ],
                 ]
            );
            $this->add_control(
                'button_color',
                 [
                    'label' => __('Button   Color', 'creote-addons'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .newsteller_simple input[type="submit"] ' => 'color: {{VALUE}}!important;',
                    ],
                 ]
            );
            $this->add_control(
                'button_bg',
                 [
                    'label' => __('Button Bg  Color', 'creote-addons'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .newsteller_simple input[type="submit"] ' => 'background-color: {{VALUE}}!important;',
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
<div class="newsteller_simple"> <div class="input_group"> <?php echo do_shortcode( $settings['subscribe_shortcode'] );?> </div></div>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_subscribe_v2());