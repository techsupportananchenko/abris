<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_foo_subscribe_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-foo-subscribe-v1';
       }
       public function get_title()
       {
           return __('Footer Subscribe v1' , 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['105'];
       }
       protected function register_controls() {
   		$this->start_controls_section(
   			'get_subscribe_footer',
   			[
   				'label' => esc_html__( 'Newsteller Content', 'creote-addons' ),
   			]
           );
               $this->add_responsive_control(
                   'dark_white',
                   [
                     'label' => __( 'Service Color Type', 'creote-addons' ),
                     'type' => Controls_Manager::SELECT,
                     'options' => [
                       'dark_color' => __('Dark Color', 'creote-addons'), 
                       'light_color' => __('Light Color', 'creote-addons'),
                       ],
                      'default' => 'light_color',
                   ]
                 );
           $this->add_control(
               'subscribe_short_description',
               [
                   'label' => __('Subscribe Shor Description', 'creote-addons'),
                   'type' => Controls_Manager::TEXT,
                   'default' => __('Subscribe Us & Recive Our Offers and Updates i Your Inbox Directly.', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
               ]
           ); 
           $this->add_control(
               'subscribe_short_code',
               [
                   'label' => __('Shortcode Content', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'placeholder' => __('[mc4wp_form id="1939"]', 'creote-addons'),
               ]
           ); 
           $this->add_control(
               'notes',
               [
                   'label' => __('Notes', 'creote-addons'),
                   'type' => Controls_Manager::TEXT,
                   'default' => __('* We do not share your email id', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
               ]
           ); 
           $this->add_responsive_control(
               'media_enable',
               [
                 'label' => __( 'Media Enable', 'creote-addons' ),
                 'type' => \Elementor\Controls_Manager::SWITCHER,
                 'label_on' => __( 'Show', 'creote-addons' ),
                 'label_off' => __( 'Hide', 'creote-addons' ),
                 'return_value' => 'yes',
                 'default' => 'no',
               ]
           );
           $repeater = new Repeater();
           $repeater->add_control(
               'media_icon',
           [
               'label' => esc_html__('Media Icon', 'creote-addons'),
               'type' => Controls_Manager::TEXT,
               'default' => __('fab fa-facebook' , 'creote-addons'),
           ]);
           $repeater->add_control(
               'tool_tip',
           [
               'label' => esc_html__('Tooltip', 'creote-addons'),
               'type' => Controls_Manager::TEXT,
               'default' => __('Facebook' , 'creote-addons'),
           ]);
           $repeater->add_control(
               'media_link',
           [
               'label' => esc_html__('Media Link', 'creote-addons'),
               'type' => Controls_Manager::TEXT,
               'default' => __('#' , 'creote-addons'),
           ]);
         $this->add_control(
           'media_repeater',
           [
               'label' => __('Media Repeater', 'creote-addons'),
               'type' => Controls_Manager::REPEATER,
               'fields' => $repeater->get_controls(),
               'default' => [
                   [
                       'media_icon' =>  __('fab fa-facebook','creote-addons'),
                       'tool_tip' =>  __('facebook','creote-addons'),
                   ],
                   [
                       'media_icon' =>  __('fab fa-twitter','creote-addons'),
                       'tool_tip' =>  __('twitter','creote-addons'),
                   ],
                   [
                       'media_icon' =>  __('fab fa-skype','creote-addons'),
                       'tool_tip' =>  __('skype','creote-addons'),
                   ],
                   [
                       'media_icon' =>  __('fab fa-instagram','creote-addons'),
                       'tool_tip' =>  __('instagram','creote-addons'),
                   ]
               ],
               'title_field' => '{{{ media_icon }}}',
               'condition' => [
                   'media_enable' => 'yes'
               ],
           ]);
         $this->end_controls_section();
         $this->start_controls_section('css_changing',
         [ 
             'label' => __('Style', 'creote-addons'),
             'tab' =>Controls_Manager::TAB_STYLE,
         ]);
         $this->add_control(
           'color_one',
           [
               'label' => __( 'Description Color', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .foo_subscribe.style_one p ' => 'color: {{VALUE}}',
               ],
           ]
       );
       $this->add_control(
           'color_two',
           [
               'label' => __( 'Notice Content Color', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .foo_subscribe.style_one p ' => 'color: {{VALUE}}',
               ],
           ]
       );
       $this->add_control(
        'ncolor_two',
        [
            'label' => __( 'Form Placeholder Color', 'creote-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .foo_subscribe.style_one .shortcodes input::placeholder , {{WRAPPER}} .foo_subscribe.style_one .shortcodes input ' => 'color: {{VALUE}}',
            ],
        ]
        );
        $this->add_control(
            'bncolor_two',
            [
                'label' => __( 'Form Bg Color', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .foo_subscribe.style_one .shortcodes input ' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'bncolorbr_two',
            [
                'label' => __( 'Form Border Color', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .foo_subscribe.style_one .shortcodes input ' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'bbr_two',
            [
                'label' => __( 'Form Btn Color', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .foo_subscribe.style_one .shortcodes input[type=submit] ' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'bbrbg_two',
            [
                'label' => __( 'Form Btn Color', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .foo_subscribe.style_one .shortcodes input[type=submit] ' => 'border-color: {{VALUE}}; background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'mcolor_one',
            [
                'label' => __( 'Color  One', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social_media_v_one ul li a ' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'mcolor_two',
            [
                'label' => __( 'Color  Two', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social_media_v_one ul li a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
       $this->end_controls_section();
   	}
       protected function render() {
   		$settings = $this->get_settings_for_display();
           $allowed_tags = wp_kses_allowed_html('post');
   		?>
<div class="footer_widgets foo_subscribe <?php echo esc_attr($settings['dark_white']); ?> style_one"> <div class="item_subscribe with_text"> <?php if(!empty($settings['subscribe_short_description'])) : ?> <p><?php echo wp_kses($settings['subscribe_short_description'] , $allowed_tags); ?></p> <?php endif; ?> <?php if(!empty($settings['subscribe_short_code'])) : ?> <div class="shortcodes"> <?php echo do_shortcode( $settings['subscribe_short_code'] );?> </div> <?php endif; ?> <?php if(!empty($settings['notes'])) : ?> <p><?php echo wp_kses($settings['notes'] , $allowed_tags); ?></p> <?php endif; ?> </div> <?php if($settings['media_enable'] == 'yes'): ?> <div class="social_media_v_one"> <ul> <?php foreach($settings['media_repeater'] as $media): ?> <li> <a href="<?php echo esc_url($media['media_link']); ?>"> <span class="<?php echo esc_attr($media['media_icon']); ?>"></span> </a> <small><?php echo esc_attr($media['tool_tip']); ?></small> </li> <?php endforeach; ?> </ul> </div> <?php endif; ?></div>
<?php 
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_foo_subscribe_v1());