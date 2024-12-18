<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_single_banner_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-single-banner-v1';
       }
       public function get_title()
       {
           return __('Single Banner V1', 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['101'];
       }
       protected function register_controls(){
         $this->start_controls_section('banner_content',
         [ 
             'label' => __('Banner Content', 'creote-addons')
         ]
         );
        $this->add_control(
            'layout',
            [
              'label' => __( 'Layout', 'creote-addons' ),
              'type' => \Elementor\Controls_Manager::SELECT,
              'default' => 'container' ,
              'options' => [
                'auto-container'  => __( 'Full Width', 'creote-addons' ),
                'container'  => __( 'Container', 'creote-addons' ),
              ],
            ]
        );
        $this->add_control(
            'small_heading',
            [
                'label' => __('Small Heading', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Our Vision to Grow Better', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
           );
           $this->add_control(
             'heading',
             [
                'label' => __('Heading', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Inspired <br>  Performance', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),    
             ]
           );
           $this->add_control(
           'description',
           [
             'label' => __('Description Text', 'creote-addons'),
             'type' => Controls_Manager::TEXTAREA,
             'default' => __('Duty obligations of business it will frequently occur that pleasures
              have to be repudiated and annoyances accepted.', 'creote-addons'),
             'placeholder' => __('Type your text here', 'creote-addons'),
           ]
           );
           $this->add_control(
            'button_enable',
            [
              'label' => __( 'Button Enable', 'creote-addons' ),
              'type' => \Elementor\Controls_Manager::SWITCHER,
              'label_on' => __( 'Show', 'creote-addons' ),
              'label_off' => __( 'Hide', 'creote-addons' ),
              'return_value' => 'yes',
              'default' => 'no',
            ]
          );
        $this->add_control(
        'button',
        [
           'label' => __('Btn Label', 'creote-addons'),
           'type' => Controls_Manager::TEXT,
           'default' => __('Contact Us', 'creote-addons'),
           'placeholder' => __('Btn Label Here', 'creote-addons'),
           'condition' => [
            'button_enable' => 'yes'
          ],
        ]);
       $this->add_control(
           'button_link',
       [
           'label' => __('Btn Link One', 'creote-addons'),
           'type' => Controls_Manager::URL,
           'placeholder' => __('https://your-link.com', 'creote-addons'),
           'show_external' => true,
           'default' => [
               'url' => '#',
               'is_external' => true,
               'nofollow' => true,
           ],
           'condition' => [
            'button_enable' => 'yes'
          ],
       ]);
       $this->add_control(
        'video_enable',
        [
          'label' => __( 'Video Enable', 'creote-addons' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => __( 'Show', 'creote-addons' ),
          'label_off' => __( 'Hide', 'creote-addons' ),
          'return_value' => 'yes',
          'default' => 'no',
        ]
      );
      $this->add_control(
        'video_link',
        [
           'label' => __('Video Url', 'creote-addons'),
           'type' => Controls_Manager::TEXT,
           'default' => __('#', 'creote-addons'),
           'condition' => [
            'video_enable' => 'yes'
          ],
        ]);
          $this->add_control(
           'slider_image',
           [
             'label' => __( 'Image', 'creote-addons' ),
             'type' => Controls_Manager::MEDIA,
             'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
             ],
           ] 
          );
         $this->add_responsive_control(
            'content_padding',
            [
              'label' => __( 'Content Padding', 'creote-addons' ),
              'type' => Controls_Manager::TEXT,
              'placeholder' => __('0px 0px 0px 0px' , 'creote-addons'),
              'selectors' => [
                '{{WRAPPER}} .single_banner.style_one .slider_content ' => 'padding: {{VALUE}}!important;',
              ],
            ]
          );
          $this->add_responsive_control(
            'image_width',
             [
              'label' => esc_html__( 'Image Width ', 'creote-addons' ),
              'type' => \Elementor\Controls_Manager::NUMBER,
              'min' => 0,
              'max' => 100,
              'step' => 1,
              'default' => '',
              'selectors' => [
                '{{WRAPPER}}  .single_banner.style_one .slider_image img ' => 'width: {{VALUE}}%!important;'
              ], 
             ]
          );
         $this->add_responsive_control(
           'image_margins',
           [
             'label' => __( 'Image Margin', 'creote-addons' ),
             'type' => Controls_Manager::TEXT,
             'placeholder' => __('0px 0px 0px 0px' , 'creote-addons'),
             'selectors' => [
              '{{WRAPPER}} .single_banner.style_one .slider_image ' => 'margin: {{VALUE}}!important;',
            ],
           ]
         );
         $this->end_controls_section();
        $this->start_controls_section('banner_v1_ccss',
        [ 
            'label' => __('Custom Css', 'creote-addons') ,
            'tab' =>Controls_Manager::TAB_STYLE,
        ]);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_banner',
				'label' => esc_html__( 'Banner Background', 'creote-addons' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .single_banner',
			]
		 );
        $this->add_responsive_control(
            'slider_radius',
            [
              'label' => __( 'Banner Radius', 'creote-addons' ),
              'type' => Controls_Manager::DIMENSIONS,
              'size_units' => ['px'],
              'selectors' => [
                '{{WRAPPER}} .single_banner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
              ],
            ]
        );
        $this->add_control(
          'small_heading_bg_color',
           [
              'label' => __('Small Heading Bg Color', 'creote-addons'),
              'type' => Controls_Manager::COLOR,
              'selectors' => [
                '{{WRAPPER}} .single_banner h6 ' => 'background: {{VALUE}}!important;',
              ],
           ]
        );
           $this->add_control(
             'heading_color',
              [
                 'label' => __('Heading Color', 'creote-addons'),
                 'type' => Controls_Manager::COLOR,
                 'selectors' => [
                   '{{WRAPPER}} .single_banner h1  ' => 'color: {{VALUE}}!important;',
                 ],
              ]
           );
           $this->add_control(
             'description_color',
               [
                 'label' => __('Description Color', 'creote-addons'),
                 'type' => Controls_Manager::COLOR,
                 'selectors' => [
                   '{{WRAPPER}} .single_banner p ' => 'color: {{VALUE}}!important;',
                 ],  
                ]
             );
             $this->add_control(
                'button_color',
                 [
                    'label' => __('Button Color', 'creote-addons'),
                    'type' => Controls_Manager::COLOR,
                     'selectors' => [
                        '{{WRAPPER}}  a.theme-btn  ' => 'color: {{VALUE}}!important;',
                      ],
                 ]
              );
                $this->add_control(
                  'button_bg_color',
                   [
                      'label' => __('Button Background Color', 'creote-addons'),
                      'type' => Controls_Manager::COLOR,
                      'selectors' => [
                          '{{WRAPPER}}  a.theme-btn ' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
                      ], 
                   ]
                );
                $this->add_control(
                  'hover_button_color',
                   [
                      'label' => __('Button Hover Color', 'creote-addons'),
                      'type' => Controls_Manager::COLOR,
                       'selectors' => [
                          '{{WRAPPER}} a.theme-btn:hover  ' => 'color: {{VALUE}}!important;',
                        ],
                   ]
                );
                  $this->add_control(
                    'hover_button_bg_color',
                     [
                        'label' => __('Button Hover Background Color', 'creote-addons'),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} a.theme-btn:hover ' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
                        ], 
                     ]
                  );
                  $this->add_control(
                    'video_button_color',
                     [
                        'label' => __('Video Button Color', 'creote-addons'),
                        'type' => Controls_Manager::COLOR,
                         'selectors' => [
                            '{{WRAPPER}} .single_banner.style_one .d_inline_block li .video_box a i  ' => 'color: {{VALUE}}!important;',
                          ],
                     ]
                  );
                  $this->add_control(
                    'video_button_bg_color',
                     [
                        'label' => __('Video Button Color', 'creote-addons'),
                        'type' => Controls_Manager::COLOR,
                         'selectors' => [
                            '{{WRAPPER}} .single_banner.style_one .d_inline_block li .video_box a  ' => 'color: {{VALUE}}!important;',
                          ],
                     ]
                  );
             $this->add_control(
               'border_radius',
               [
                 'label' => __( 'Button Border Radius', 'creote-addons' ),
                 'type' => Controls_Manager::DIMENSIONS,
                 'size_units' => ['px'],
                 'selectors' => [
                   '{{WRAPPER}} .theme-btn ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
                 ],
               ]
             );
        $this->end_controls_section();
       }
protected function render(){
    $settings = $this->get_settings_for_display();
    $allowed_tags = wp_kses_allowed_html('post');
?>
 <section class="single_banner style_one"> <div class="<?php echo esc_attr($settings['layout']); ?>"> <div class="row d-flex align-items-center"> <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12"> <div class="slider_content"> <?php if(!empty($settings['small_heading'])): ?> <h6 class="animated"> <?php echo wp_kses($settings['small_heading'] , $allowed_tags); ?> </h6> <?php endif; ?> <?php if(!empty($settings['heading'])): ?> <h1 class="animated"> <?php echo wp_kses($settings['heading'] , $allowed_tags); ?> </h1> <?php endif; ?> <?php if(!empty($settings['description'])): ?> <p class="description animated"> <?php echo wp_kses($settings['description'] , $allowed_tags); ?> </p> <?php endif; ?> <?php if($settings['button_enable'] == 'yes' || $settings['video_enable'] == 'yes'): ?> <ul class="d_inline_block"> <?php if($settings['button_enable'] == 'yes') :?> <?php if(!empty($settings['button'])) :?> <?php $target = $settings['button_link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <li> <a href="<?php echo esc_url($settings['button_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn one animated"> <?php echo esc_html($settings['button']); ?> </a> </li> <?php endif; ?> <?php endif; ?> <?php if($settings['video_enable'] == 'yes') :?> <?php if(!empty($settings['video_link'])): ?> <li class="vd_bx"> <div class="video_box"> <a href="<?php echo esc_attr($settings['video_link']); ?>" class="lightbox-image"><i class="icon-play"></i></a> </div> </li> <?php endif; ?> <?php endif; ?> </ul> <?php endif; ?> </div> </div> <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 image_column"> <?php if(!empty($settings['slider_image']['url'])): $image = isset($settings['slider_image']['alt']) ? $settings['slider_image']['alt'] : ''; if(!empty($image)) { $image = $image; }else{ $image = 'image'; } ?> <div class="slider_image"> <img src="<?php echo esc_url($settings['slider_image']['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image); ?>" /> </div> <?php endif; ?> </div> </div> </div> </section>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_single_banner_v1());