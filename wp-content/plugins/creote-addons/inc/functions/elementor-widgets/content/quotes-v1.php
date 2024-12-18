<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_quotes_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-quotes-v1';
       }
       public function get_title()
       {
           return __('Quotes V1 ', 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['102'];
       }
       protected function register_controls(){
           $this->start_controls_section('quotes_settings',
           [ 
               'label' => __('Quotes Settings', 'creote-addons')
           ]
           );
           $this->add_control(
               'quotes_style',
               [
                   'label' => __('Quotes style', 'creote-addons'),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
                       'style_one' => __('Style one ', 'creote-addons'),
                       'style_two' => __('Style Two ', 'creote-addons'),
                   ],
                   'default' => 'style_one',
               ]
           );
           $this->add_control(
               'icon_type',
               [
                   'label' => __('Icon Font  / Icon Image ', 'creote-addons'),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
                       'icon_fonts_enable' => __( 'Icon Font Type', 'creote-addons' ),
                       'icon_image_enable' => __( 'Icon Image Type', 'creote-addons' ),
                    ],
                   'default' => __('icon_fonts_enable' , 'creote-addons'),
               ]
           );
           $this->add_control(
               'icon_image',
               [
                   'label' => __('Icon Image', 'creote-addons'),
                   'type' => Controls_Manager::MEDIA,
                   'default' => [
                       'url' => CREOTE_ADDONS_URL . 'inc/core-widgets/images/fun-fact-1.svg',
                     ],
                    'condition' => [
                       'icon_type' => 'icon_image_enable',
                    ]
               ]
           );
           $this->add_control(
               'icon_fonts',
               [
                   'label' => __('Icon', 'creote-addons'),
                   'type' => Controls_Manager::ICON,
                   'options' => get_creote_icon(),
                   'default' => __('icon-play' , 'creote-addons'),
                    'condition' => [
                       'icon_type' => 'icon_fonts_enable',
                    ]
               ]
           );
           $this->add_control(
               'authour_image',
               [
                   'label' => __('Authour Image', 'creote-addons'),
                   'type' => Controls_Manager::MEDIA,
                   'default' => [
                       'url' => \Elementor\Utils::get_placeholder_image_src(),
                   ],
                   'condition' => [
                       'quotes_style' => 'style_two',
                   ],
               ]
           );
           $this->add_control(
               'description',
               [
                   'label' => __('Quotes', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('The key for us, number one, has always been  hiring very smart people.', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
               ]
           );
           $this->add_control(
               'authour_name',
               [
                   'label' => __('Authour Name', 'creote-addons'),
                   'type' => Controls_Manager::TEXT,
                   'default' => __('Lamont Shaun', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
               ]
           );
           $this->add_control(
               'authour_designation',
               [
                   'label' => __('Authour Designation', 'creote-addons'),
                   'type' => Controls_Manager::TEXT,
                   'default' => __('Ceo & Founder', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
                   'condition' => [
                       'quotes_style' => 'style_two',
                   ],
               ]
           );
           $this->add_control(
               'trans',
               [
               'type' => Controls_Manager::DIVIDER,
               ]
           );
           $this->add_control(
               'transitions_enable',
              [
                 'label' => __('Transitions Enable', 'creote-addons'),
                  'type' => Controls_Manager::SWITCHER,
                  'label_on' => __('Yes', 'creote-addons'),
                  'label_off' => __('No', 'creote-addons'),
                  'return_value' => 'yes',
                  'default' => 'no',
              ]
           );
             $this->add_responsive_control(
               'transitions',
               [
                 'label' => __( 'Transitions', 'creote-addons' ),
                 'type' => Controls_Manager::SELECT,
                 'options' => [
                   '100' => __('100ms', 'creote-addons'),
                   '200' => __('200ms', 'creote-addons'),
                   '300' => __('300ms', 'creote-addons'),
                   '400' => __('400ms', 'creote-addons'),
                   '500' => __('500ms', 'creote-addons'),
                   '600' => __('600ms', 'creote-addons'),
                   '700' => __('700ms', 'creote-addons'),
                   '800' => __('800ms', 'creote-addons'),
                   '900' => __('900ms', 'creote-addons'),
                   '1000' => __('1000ms', 'creote-addons'),
                   ],
                  'default' => '100',
                  'condition' => [
                   'transitions_enable' => 'yes',
                 ],
               ]
             );
           $this->end_controls_section();
           $this->start_controls_section('quotes_css',
           [ 
               'label' => __('Quotes Css', 'creote-addons'),
               'tab' =>Controls_Manager::TAB_STYLE,
           ]
           );
        $this->add_control(
            'qbr_color',
            [
                'label' => __('Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quotes_box.style_one  ' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'quotes_style' => 'style_one',
                ],
            ]
        );
        $this->add_control(
            'qbg_color',
            [
                'label' => __('Background Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quotes_box.style_two .top_content  ' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .quotes_box.style_two .top_content::before  ' => 'border-right-color: {{VALUE}}; opacity: 0.8;',
                ],
                'condition' => [
                    'quotes_style' => 'style_two',
                ],
            ]
        );
        $this->add_control(
          'iconcolor',
           [
              'label' => __('Icon Color', 'creote-addons'),
              'type' => Controls_Manager::COLOR,
              'selectors' => [
                  '{{WRAPPER}} .quotes_box.style_one .icon span , {{WRAPPER}} .quotes_box.style_two .top_content .description_bx .icon span ' => 'color: {{VALUE}}; opacity:1;', 
              ],
           ]
         );
         $this->add_control(
          't_color',
           [
              'label' => __('Title Color', 'creote-addons'),
              'type' => Controls_Manager::COLOR,
              'selectors' => [
                  '{{WRAPPER}} .quotes_box.style_one .content h6 , {{WRAPPER}} .quotes_box.style_two .content h3 ' => 'color: {{VALUE}};',
              ],
           ]
         );
         $this->add_control(
            'd_color',
             [
                'label' => __('Description Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quotes_box.style_two .top_content .description_bx p  ' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'quotes_style' => 'style_two',
                ],
             ]
           );
        $this->add_control(
         'a_color',
          [
             'label' => __('Authour Color', 'creote-addons'),
             'type' => Controls_Manager::COLOR,
             'selectors' => [
                 '{{WRAPPER}} .quotes_box.style_one .content h3  ' => 'color: {{VALUE}};',
             ],
          ]
        );
        $this->add_control(
        'dg_color',
        [
           'label' => __('Designation Color', 'creote-addons'),
           'type' => Controls_Manager::COLOR,
           'selectors' => [
               '{{WRAPPER}} .quotes_box.style_two .content h6   ' => 'color: {{VALUE}};',
           ],
           'condition' => [
            'quotes_style' => 'style_two',
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
<?php if($settings['quotes_style'] == 'style_two'): ?><div class="quotes_box style_two" <?php if($settings['transitions_enable'] == 'yes'): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" data-aos-offset="0" <?php endif;?>> <div class="top_content"> <?php if(!empty($settings['authour_image'])): ?> <div class="auth_img"> <img src="<?php echo esc_url($settings['authour_image']['url']); ?>" class="auth_img" alt="<?php esc_attr_e('authour png', 'creote-addons'); ?>" /> </div> <?php endif; ?> <div class="description_bx"> <?php if(!empty($settings['description'])): ?> <p><?php echo wp_kses($settings['description'] , $allowed_tags); ?></p> <?php endif; ?> <?php if($settings['icon_type'] == 'icon_image_enable'): ?> <div class="icon"> <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" class="svg_image" alt="<?php esc_attr_e('icon png', 'creote-addons'); ?>" /> </div> <?php elseif($settings['icon_type'] == 'icon_fonts_enable'): ?> <div class="icon"> <span class="<?php echo esc_html($settings['icon_fonts']); ?>"></span> </div> <?php endif; ?> </div> </div> <div class="content"> <?php if(!empty($settings['authour_name'])): ?> <h3><?php echo wp_kses($settings['authour_name'] , $allowed_tags); ?></h3> <?php endif; ?> <?php if(!empty($settings['authour_designation'])): ?> <h6><?php echo wp_kses($settings['authour_designation'] , $allowed_tags); ?></h6> <?php endif; ?> </div></div><?php else: ?> <div class="quotes_box style_one" <?php if($settings['transitions_enable'] == 'yes'): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" data-aos-offset="0" <?php endif;?>> <?php if($settings['icon_type'] == 'icon_image_enable'): $icon_image = isset($settings['icon_image']['alt']) ? $settings['icon_image']['alt'] : ''; if(!empty($icon_image)) { $icon_image = $icon_image; }else{ $icon_image = 'image'; } ?> <div class="icon"> <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" class="svg_image" alt="<?php echo esc_attr($icon_image); ?>" /> </div> <?php elseif($settings['icon_type'] == 'icon_fonts_enable'): ?> <div class="icon"> <span class="<?php echo esc_html($settings['icon_fonts']); ?>"></span> </div> <?php endif; ?> <div class="content"> <?php if(!empty($settings['description'])): ?> <h6><?php echo wp_kses($settings['description'] , $allowed_tags); ?></h6> <?php endif; ?> <?php if(!empty($settings['authour_name'])): ?> <h3><?php echo wp_kses($settings['authour_name'] , $allowed_tags); ?></h3> <?php endif; ?> </div></div><?php endif; ?>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_quotes_v1());