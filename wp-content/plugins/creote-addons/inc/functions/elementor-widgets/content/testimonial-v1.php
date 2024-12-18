<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_testimonials_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-testimonial-v1';
       }
       public function get_title()
       {
           return __('Testimonial V1' , 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['102'];
       }
       protected function register_controls() {
           $this->start_controls_section(
               'textimonial_box_content',
               [
                   'label' => __('Testimonial Content', 'creote-addons')
               ]
           );
           $this->add_control(
               'testimonial_styles',
               [
                 'label' => __('Testimonial Styles', 'creote-addons'),
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
                 'label' => __( 'Color Type', 'creote-addons' ),
                 'type' => Controls_Manager::SELECT,
                 'options' => [
                   'dark_color' => __('Dark Color', 'creote-addons'), 
                   'light_color' => __('Light Color', 'creote-addons'),
                   ],
                  'default' => 'dark_color',
               ]
             );
           $this->end_controls_section();
           $this->start_controls_section(
               'testimonial_repeater',
               [
                   'label' => __('Testimonial Content', 'creote-addons')
               ]
           );
           $repeater = new Repeater();
           $repeater->add_control(
               'image_enable',
              [
                 'label' => __('Image Enable', 'creote-addons'),
                  'type' => Controls_Manager::SWITCHER,
                  'label_on' => __('Yes', 'creote-addons'),
                  'label_off' => __('No', 'creote-addons'),
                  'return_value' => 'yes',
                  'default' => 'yes',
              ]
           );
           $repeater->add_control(
               'image',
               [
                   'label' => __('Image', 'creote-addons'),
                   'type' => Controls_Manager::MEDIA,
                   'default' => [
                       'url' => \Elementor\Utils::get_placeholder_image_src(),
                   ],
                   'condition' => [
                       'image_enable' => 'yes',
                   ],
               ]
           );
        $repeater->add_control(
   		'name',
   		[
   		'label'       => esc_html__( 'Name', 'creote-addons' ),
   		'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'Jacob Leonardo' , 'creote-addons'),
       ]);
       $repeater->add_control(
   		'designation',
   		[
   		'label'       => esc_html__( 'Designation', 'creote-addons' ),
   		'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'Senior Manager of Excel Solution' , 'creote-addons'),
       ]);
       $repeater->add_control(
   		'comment',
   		[
   		'label'       => esc_html__( 'Comment', 'creote-addons' ),
   		'type'        => Controls_Manager::TEXTAREA,
           'default' =>  esc_html__( 'While running an early stage startup everything feels
           hard, that’s why it’s been so nice to have our accounting
           feel easy. We recommed Qetus.' , 'creote-addons'),
       ]);
       $repeater->add_control(
           'rating_one',
           [
               'label' => __( 'Rating', 'creote-addons' ),
               'type' => Controls_Manager::SELECT,
               'default' =>  esc_html__( 'two' , 'creote-addons'),
               'options' => [
                   'one' => __('1', 'creote-addons'),
                   'two' => __('2', 'creote-addons'),
                   'three' => __('3', 'creote-addons'),
                   'four' => __('4', 'creote-addons'),
                   'five' => __('5', 'creote-addons'),
               ],
           ]
       );
       $this->add_control(
           'testimonial_repeater_c',
           [
               'label' => __('Testimonial Repeater', 'creote-addons'),
               'type' => Controls_Manager::REPEATER,
               'fields' => $repeater->get_controls(),
               'default' => [
                   [
                   'name' => __('Jacob Leonardo', 'creote-addons'),
                   'designation' =>  __('Senior Manager of Excel Solution', 'creote-addons'),
                   'comment' =>  __('While running an early stage startup everything feels
                   hard, that’s why it’s been so nice to have our accounting
                   feel easy. We recommed Qetus.', 'creote-addons'),
                   ],
                   [
                   'name' => __('Jacob Leonardo', 'creote-addons'),
                   'designation' =>  __('Senior Manager of Excel Solution', 'creote-addons'),
                   'comment' =>  __('While running an early stage startup everything feels
                   hard, that’s why it’s been so nice to have our accounting
                   feel easy. We recommed Qetus.', 'creote-addons'),
                   ],
                   [
                   'name' => __('Jacob Leonardo', 'creote-addons'),
                   'designation' =>  __('Senior Manager of Excel Solution', 'creote-addons'),
                   'comment' =>  __('While running an early stage startup everything feels
                   hard, that’s why it’s been so nice to have our accounting
                   feel easy. We recommed Qetus.', 'creote-addons'),
                   ]
               ],
               'title_field' => '{{{ name }}}',
           ]
         );
         $this->add_control(
            'quotes_enable',
           [
              'label' => __('Quotes Enable', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'yes',
               'condition' => [
                'testimonial_styles' => 'style_one',
               ],
            ]
        );
        $this->add_control(
         'quotes_enable_move',
         [
           'label' => __('Quote Moving Styles', 'creote-addons'),
           'type' => Controls_Manager::SELECT,
           'options' => [
             'move_one' => __( 'Move Top Left', 'creote-addons' ),
             'move_two' => __( 'Move Top Right (Only For Rtl)', 'creote-addons' ),
             ],
           'default' => __('move_one' , 'creote-addons'),
           'condition' => [
            'quotes_enable' => 'yes',
            'testimonial_styles' => 'style_one',
            ],
         ]
      );
        $this->add_control(
            'quotes_move_top',
           [
              'label' => __('Quotes Move Top', 'creote-addons'),
               'type' => Controls_Manager::TEXT,
               'default' => '0',
               'selectors' => [
                '{{WRAPPER}} .testimonial_sec.style_one .icon_quotes  ' => 'top: {{VALUE}};',
              ],
              'condition' => [
                'quotes_enable_move' => ['move_one' , 'move_two'],
                'testimonial_styles' => 'style_one',
            ],
           ]
        );
        $this->add_control(
            'quotes_move_left',
           [
              'label' => __('Quotes Move Left', 'creote-addons'),
               'type' => Controls_Manager::TEXT,
               'default' => '-150px',
               'selectors' => [
                '{{WRAPPER}} .testimonial_sec.style_one .icon_quotes  ' => 'left: {{VALUE}};',
              ],
              'condition' => [
                'quotes_enable_move' => 'move_one',
                'testimonial_styles' => 'style_one',
            ],
           ]
        );
        $this->add_control(
         'quotes_move_right',
        [
           'label' => __('Quotes Move Right', 'creote-addons'),
            'type' => Controls_Manager::TEXT,
            'default' => '-150px',
            'selectors' => [
             '{{WRAPPER}} .testimonial_sec.style_one .icon_quotes  ' => 'Right: {{VALUE}}!important; left:unset!imprortant;',
           ],
           'condition' => [
             'quotes_enable_move' => 'move_two',
             'testimonial_styles' => 'style_one',
         ],
        ]
     );
           $this->end_controls_section();
           $this->start_controls_section('st_css',
           [ 
               'label' => __('Style', 'creote-addons'),
               'tab' =>Controls_Manager::TAB_STYLE,
           ]);
           $this->add_control(
            'bgcolor',
               [
                   'label' => __('Bg Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}}  .testimonial_sec .testimonial_box  ' => 'background:{{VALUE}};', 
                   ],
                   'condition' => [ 
                     'testimonial_styles' => ['style_two' , 'style_three' , 'style_five'],
                  ],
               ]
            );
            $this->add_control(
               'hbgcolor',
                  [
                      'label' => __('Hover Bg Color', 'creote-addons'),
                      'type' => Controls_Manager::COLOR,
                      'selectors' => [
                          '{{WRAPPER}}  .testimonial_sec.style_five .testimonial_box:hover ' => 'background:{{VALUE}};', 
                      ],
                      'condition' => [ 
                        'testimonial_styles' => ['style_five'],
                     ],
                  ]
               );
            $this->add_control(
               'brcolor',
                  [
                      'label' => __('Border Color', 'creote-addons'),
                      'type' => Controls_Manager::COLOR,
                      'selectors' => [
                          '{{WRAPPER}}  .testimonial_sec.style_two .testimonial_box::before ' => 'border-color:{{VALUE}};', 
                      ],
                      'condition' => [ 
                        'testimonial_styles' => ['style_two'],
                     ],
                  ]
            );
           $this->add_control(
            'quotes_c',
               [
                   'label' => __('Quotes Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .testimonial_sec.style_one .icon_quotes i , {{WRAPPER}} .testimonial_sec .testimonial_box  .icon-quote , {{WRAPPER}} .testimonial_sec.style_five .testimonial_box .icon_quotes   ' => 'color:{{VALUE}};', 
                   ],
                   'condition' => [ 
                     'testimonial_styles' => ['style_one' , 'style_two' , 'style_three' , 'style_five'],
                  ],
               ]
            );
           $this->add_control(
            'quotes_bg',
               [
                   'label' => __('Quotes Bg Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .testimonial_sec.style_one .icon_quotes , {{WRAPPER}} .testimonial_sec .testimonial_box  .icon-quote  ' => 'background:{{VALUE}};', 
                   ],
                   'condition' => [ 
                     'testimonial_styles' => ['style_one' , 'style_two' , 'style_three'],
                  ],
               ]
            );
            $this->add_control(
               'quotes_br',
                  [
                      'label' => __('Quotes Border Color', 'creote-addons'),
                      'type' => Controls_Manager::COLOR,
                      'selectors' => [
                          '{{WRAPPER}} .testimonial_sec.style_one .icon_quotes:before ' => 'border-color:{{VALUE}};', 
                      ],
                      'condition' => [ 
                        'testimonial_styles' => ['style_one'],
                     ],
                  ]
            );
            $this->add_control(
               'rtcolor',
                  [
                      'label' => __('Rating Color', 'creote-addons'),
                      'type' => Controls_Manager::COLOR,
                      'selectors' => [
                          '{{WRAPPER}} .testimonial_sec .testimonial_box .rating ul span ' => 'color:{{VALUE}};', 
                          '{{WRAPPER}} .testimonial_sec .testimonial_box .rating ul span.empty ' => 'color:{{VALUE}}; opacity:0.4;', 
                      ], 
                  ]
            );
            $this->add_control(
               'rtbrcolor',
                  [
                     'label' => __('Rating Border Color', 'creote-addons'),
                     'type' => Controls_Manager::COLOR,
                     'selectors' => [
                          '{{WRAPPER}} .testimonial_sec .testimonial_box .rating ul ' => 'border-color:{{VALUE}};',  
                     ],
                     'condition' => [ 
                        'testimonial_styles' => ['style_one' , 'style_two'],
                     ],
                  ]
            );
            $this->add_control(
               'rtbgcolor',
               [
                  'label' => __('Rating Border Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                  'selectors' => [
                     '{{WRAPPER}} .testimonial_sec .testimonial_box .rating ul ' => 'background:{{VALUE}};',  
                  ],
                  'condition' => [ 
                     'testimonial_styles' => ['style_one' , 'style_two'],
                  ],
               ]
            );
            $this->add_control(
               'ncolor',
                  [
                      'label' => __('Name Color', 'creote-addons'),
                      'type' => Controls_Manager::COLOR,
                      'selectors' => [
                          '{{WRAPPER}} .testimonial_sec.style_one .testimonial_box .authour_details .details h2 ,
                          {{WRAPPER}}  .testimonial_sec.style_two .auth_details h2 , {{WRAPPER}} .testimonial_sec.style_three .testimonial_box .title ,
                          {{WRAPPER}} .testimonial_sec.style_four .testimonial_box .client_bx .left_s h2 ,
                          {{WRAPPER}} .testimonial_sec.style_five .testimonial_box .content_box .authour h2 ' => 'color:{{VALUE}};',  
                      ],
                  ]
            );
            $this->add_control(
               'nbrcolor',
                  [
                      'label' => __('Border Color', 'creote-addons'),
                      'type' => Controls_Manager::COLOR,
                      'selectors' => [
                          '{{WRAPPER}} .testimonial_sec.style_three .testimonial_box .title:before ' => 'background:{{VALUE}};',  
                      ],
                      'condition' => [ 
                        'testimonial_styles' => ['style_three'],
                     ],
                  ]
            );
            $this->add_control(
               'ddcolor',
                  [
                      'label' => __('Designation Color', 'creote-addons'),
                      'type' => Controls_Manager::COLOR,
                      'selectors' => [
                          '{{WRAPPER}} .testimonial_sec.style_one .testimonial_box .authour_details .details span ,
                          {{WRAPPER}}  .testimonial_sec.style_two .auth_details span , {{WRAPPER}} .testimonial_sec.style_three .testimonial_box p.from ,
                          {{WRAPPER}} .testimonial_sec.style_four .testimonial_box .client_bx .left_s h6 ,
                          {{WRAPPER}} .testimonial_sec.style_five .testimonial_box .content_box .authour p ' => 'color:{{VALUE}};',  
                      ],
                  ]
            );
            $this->add_control(
               'ddccolor',
                  [
                      'label' => __('Comment Color', 'creote-addons'),
                      'type' => Controls_Manager::COLOR,
                      'selectors' => [
                          '{{WRAPPER}} .testimonial_sec .testimonial_box .comment , {{WRAPPER}} .testimonial_sec .testimonial_box .description  ' => 'color:{{VALUE}};',  
                      ],
                  ]
            );
            $this->add_control(
               'hconcolor',
                  [
                      'label' => __('Hover Content Color', 'creote-addons'),
                      'type' => Controls_Manager::COLOR,
                      'selectors' => [
                          '{{WRAPPER}} .testimonial_sec.style_five .testimonial_box:hover .content_box .rating ul li span ,
                           {{WRAPPER}} .testimonial_sec.style_five .testimonial_box:hover .content_box .description ,
                           {{WRAPPER}} .testimonial_sec.style_five .testimonial_box:hover .content_box .authour h2 ,
                           {{WRAPPER}} .testimonial_sec.style_five .testimonial_box:hover .content_box .authour p ,
                           {{WRAPPER}} .testimonial_sec.style_five .testimonial_box:hover .icon_quotes ' => 'color:{{VALUE}};',  
                      ],
                      'condition' => [ 
                        'testimonial_styles' => ['style_five'],
                     ],
                  ]
            );
            $this->add_control(
               'tbbgcolor',
                  [
                      'label' => __('Tab Bg Color', 'creote-addons'),
                      'type' => Controls_Manager::COLOR,
                      'selectors' => [
                          '{{WRAPPER}} .testimonial_sec.style_two .auth_details ' => 'background:{{VALUE}};',  
                      ],
                      'condition' => [ 
                        'testimonial_styles' => ['style_two'],
                     ],
                  ]
            );
            $this->add_control(
               'tbbgacolor',
                  [
                      'label' => __('Tab Active Bg Color', 'creote-addons'),
                      'type' => Controls_Manager::COLOR,
                      'selectors' => [
                          '{{WRAPPER}} .testimonial_sec.style_two .single_swiper_tab .swiper-wrapper .swiper-slide.swiper-slide-thumb-active .auth_details ' => 'background:{{VALUE}};',  
                      ],
                      'condition' => [ 
                        'testimonial_styles' => ['style_two'],
                     ],
                  ]
            );
            $this->add_control(
               'tbbgncolor',
                  [
                      'label' => __('Tab Active Name Color', 'creote-addons'),
                      'type' => Controls_Manager::COLOR,
                      'selectors' => [
                          '{{WRAPPER}} .testimonial_sec.style_two .single_swiper_tab .swiper-wrapper .swiper-slide.swiper-slide-thumb-active .auth_details h2 ' => 'color:{{VALUE}};',  
                      ],
                      'condition' => [ 
                        'testimonial_styles' => ['style_two'],
                     ],
                  ]
            );
            $this->add_control(
               'tbdgcolor',
                  [
                      'label' => __('Tab Active Designation Color', 'creote-addons'),
                      'type' => Controls_Manager::COLOR,
                      'selectors' => [
                          '{{WRAPPER}} .testimonial_sec.style_two .single_swiper_tab .swiper-wrapper .swiper-slide.swiper-slide-thumb-active .auth_details span ' => 'color:{{VALUE}};',  
                      ],
                      'condition' => [ 
                        'testimonial_styles' => ['style_two'],
                     ],
                  ]
            );
             $this->end_controls_section();
             $this->start_controls_section('owlnav_css',
             [ 
                 'label' => __('Owl Nav Style', 'creote-addons'),
                 'tab' =>Controls_Manager::TAB_STYLE,
             ]);
             $this->add_control(
               'owncolor',
                  [
                      'label' => __('Arrow Color', 'creote-addons'),
                      'type' => Controls_Manager::COLOR,
                      'selectors' => [
                          '{{WRAPPER}} .testimonial_sec.style_one .arrows .next-single-one::before , {{WRAPPER}} .testimonial_sec.style_one .arrows .prev-single-one::before ,
                          {{WRAPPER}} .swiper-button-prev::before , {{WRAPPER}} .swiper-button-next::before , {{WRAPPER}} .prev-single-one::before , {{WRAPPER}} .next-single-one::before , {{WRAPPER}} .prev-single-one_three::before , {{WRAPPER}} .next-single-one_three::before ' => 'color:{{VALUE}};',  
                      ],
                  ]
            );
            $this->add_control(
               'ownucolor',
                  [
                      'label' => __('Number Color', 'creote-addons'),
                      'type' => Controls_Manager::COLOR,
                      'selectors' => [
                          '{{WRAPPER}} .testimonial_sec.style_one .num_pagination .swiper-pagination-fraction  ' => 'color:{{VALUE}};',  
                      ],
                      'condition' => [ 
                        'testimonial_styles' => 'style_one',
                     ],
                  ]
            );
            $this->add_control(
               'ownbgcolor',
                  [
                      'label' => __('Arrow Bg Color', 'creote-addons'),
                      'type' => Controls_Manager::COLOR,
                      'selectors' => [
                          '{{WRAPPER}} .swiper-button-prev::before , {{WRAPPER}} .swiper-button-next::before , {{WRAPPER}} .prev-single-one::before , {{WRAPPER}} .next-single-one::before , {{WRAPPER}} .prev-single-one_three::before , {{WRAPPER}} .next-single-one_three::before ' => 'background:{{VALUE}};',  
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
<div class="testimonial_sec <?php echo esc_attr($settings['dark_white']); ?> <?php echo esc_attr($settings['testimonial_styles']); ?>"> <?php if($settings['testimonial_styles'] == 'style_two'): ?> <div class="swiper-container single_swiper"> <div class="swiper-wrapper"> <?php foreach($settings['testimonial_repeater_c'] as $testimonial_repeater_c):?> <div class="swiper-slide"> <div class="testimonial_box"> <?php if($testimonial_repeater_c['image_enable'] == 'yes'): $image = isset($testimonial_repeater_c['image']['alt']) ? $testimonial_repeater_c['image']['alt'] : ''; if(!empty($image)) { $image = $image; }else{ $image = 'image'; } ?> <div class="authour_image"> <i class="icon-quote"></i> <img src="<?php echo esc_url($testimonial_repeater_c['image']['url']); ?>" alt="<?php echo esc_attr($image); ?>" /> </div> <?php endif; ?> <div class="comment"> <?php echo wp_kses($testimonial_repeater_c['comment'] , $allowed_tags); ?> </div> <div class="rating"> <ul> <?php if($testimonial_repeater_c['rating_one'] == 'one'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'two'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'three'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'four'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'five'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li> <?php else: ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li> <?php endif; ?> </ul> </div> </div> </div> <?php endforeach;?> </div> <div class="swiper-button-next"></div> <div class="swiper-button-prev"></div> </div> <div class="swiper-container single_swiper_tab"> <div class="swiper-wrapper"> <?php foreach($settings['testimonial_repeater_c'] as $testimonial_repeater_c):?> <div class="swiper-slide"> <div class="auth_details"> <h2><?php echo esc_attr($testimonial_repeater_c['name']); ?></h2> <span><?php echo esc_attr($testimonial_repeater_c['designation']); ?></span> </div> </div> <?php endforeach;?> </div> </div> <?php elseif($settings['testimonial_styles'] == 'style_three'): ?> <div class="swiper-container swiper__center_three_test"> <div class="swiper-wrapper"> <?php foreach($settings['testimonial_repeater_c'] as $testimonial_repeater_c):?> <div class="swiper-slide"> <div class="testimonial_box"> <i class="icon-quote"></i> <?php if(!empty($testimonial_repeater_c['comment'])): ?> <p class="description"> <?php echo wp_kses($testimonial_repeater_c['comment'] , $allowed_tags); ?> </p> <?php endif; ?> <?php if(!empty($testimonial_repeater_c['name'])): ?> <h3 class="title"><?php echo esc_attr($testimonial_repeater_c['name']); ?></h3> <?php endif; ?> <?php if(!empty($testimonial_repeater_c['designation'])): ?> <p class="from"><?php echo esc_attr($testimonial_repeater_c['designation']); ?></p> <?php endif; ?> <?php if($testimonial_repeater_c['image_enable'] == 'yes'): $image = isset($testimonial_repeater_c['image']['alt']) ? $testimonial_repeater_c['image']['alt'] : ''; if(!empty($image)) { $image = $image; }else{ $image = 'image'; } ?> <div class="pic"> <img src="<?php echo esc_url($testimonial_repeater_c['image']['url']); ?>" alt="<?php echo esc_attr($image); ?>" /> </div> <?php endif; ?> <div class="rating"> <ul> <?php if($testimonial_repeater_c['rating_one'] == 'one'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'two'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'three'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'four'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'five'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li> <?php else: ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li> <?php endif; ?> </ul> </div> </div> </div> <?php endforeach;?> </div> </div> <div class="arrows"> <div class="prev-single-one_three"></div> <div class="next-single-one_three"></div> </div> <?php elseif($settings['testimonial_styles'] == 'style_four'): ?> <div class="swiper-container swiper__center_three_test"> <div class="swiper-wrapper"> <?php foreach($settings['testimonial_repeater_c'] as $testimonial_repeater_c):?> <div class="swiper-slide"> <div class="testimonial_box"> <div class="box_inner not_ovelay"> <div class="rating"> <ul> <?php if($testimonial_repeater_c['rating_one'] == 'one'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'two'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'three'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'four'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'five'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li> <?php else: ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li> <?php endif; ?> </ul> </div> <?php if(!empty($testimonial_repeater_c['comment'])): ?> <p class="description"> <?php echo wp_kses($testimonial_repeater_c['comment'] , $allowed_tags); ?> </p> <?php endif; ?> <div class="client_bx"> <?php if($testimonial_repeater_c['image_enable'] == 'yes'): $image = isset($testimonial_repeater_c['image']['alt']) ? $testimonial_repeater_c['image']['alt'] : ''; if(!empty($image)) { $image = $image; }else{ $image = 'image'; }?> <div class="image_box"> <img src="<?php echo esc_url($testimonial_repeater_c['image']['url']); ?>" alt="<?php echo esc_attr($image); ?>" /> </div> <?php endif; ?> <div class="left_s"> <?php if(!empty($testimonial_repeater_c['name'])): ?> <h2 class="title"><?php echo esc_attr($testimonial_repeater_c['name']); ?></h2> <?php endif; ?> <?php if(!empty($testimonial_repeater_c['designation'])): ?> <h6 class="from"><?php echo esc_attr($testimonial_repeater_c['designation']); ?></h6> <?php endif; ?> </div> </div> </div> </div> </div> <?php endforeach;?> </div> </div> <?php elseif($settings['testimonial_styles'] == 'style_five'): ?> <div class="swiper-container swiper__center_two_test"> <div class="swiper-wrapper"> <?php foreach($settings['testimonial_repeater_c'] as $testimonial_repeater_c):?> <div class="swiper-slide"> <div class="testimonial_box"> <div class="icon_quotes"> <i class="icon-quote"></i> </div> <div class="lower_box "> <?php if($testimonial_repeater_c['image_enable'] == 'yes'): $image = isset($testimonial_repeater_c['image']['alt']) ? $testimonial_repeater_c['image']['alt'] : ''; if(!empty($image)) { $image = $image; }else{ $image = 'image'; } ?> <div class="image_box"> <img src="<?php echo esc_url($testimonial_repeater_c['image']['url']); ?>" alt="<?php echo esc_attr($image); ?>" /> </div> <?php endif; ?> <div class="content_box "> <div class="rating"> <ul> <?php if($testimonial_repeater_c['rating_one'] == 'one'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'two'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'three'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'four'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'five'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li> <?php else: ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li> <?php endif; ?> </ul> </div> <?php if(!empty($testimonial_repeater_c['comment'])): ?> <p class="description"> <?php echo wp_kses($testimonial_repeater_c['comment'] , $allowed_tags); ?> </p> <?php endif; ?> <div class="authour"> <?php if(!empty($testimonial_repeater_c['name'])): ?> <h2 class="title"><?php echo esc_attr($testimonial_repeater_c['name']); ?></h2> <?php endif; ?> <?php if(!empty($testimonial_repeater_c['designation'])): ?> <p><?php echo esc_attr($testimonial_repeater_c['designation']); ?></p> <?php endif; ?> </div> </div> </div> </div> </div> <?php endforeach;?> </div> </div> <?php else: ?> <?php if($settings['quotes_enable'] == 'yes'): ?> <div class="icon_quotes"> <i class="icon-quote"></i> </div> <?php endif; ?> <div class="swiper-container swiper_single"> <div class="swiper-wrapper"> <?php foreach($settings['testimonial_repeater_c'] as $testimonial_repeater_c):?> <div class="swiper-slide"> <div class="testimonial_box"> <div class="rating"> <ul> <?php if($testimonial_repeater_c['rating_one'] == 'one'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'two'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'three'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'four'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'five'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li> <?php else: ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li> <?php endif; ?> </ul> </div> <div class="authour_details <?php if($testimonial_repeater_c['image_enable'] == 'yes'): ?> image_yes <?php endif; ?>"> <?php if($testimonial_repeater_c['image_enable'] == 'yes'): $image = isset($testimonial_repeater_c['image']['alt']) ? $testimonial_repeater_c['image']['alt'] : ''; if(!empty($image)) { $image = $image; }else{ $image = 'image'; }?> <div class="image"> <img src="<?php echo esc_url($testimonial_repeater_c['image']['url']); ?>" alt="<?php echo esc_attr($image); ?>" /> </div> <?php endif; ?> <div class="details"> <h2><?php echo esc_attr($testimonial_repeater_c['name']); ?></h2> <span><?php echo esc_attr($testimonial_repeater_c['designation']); ?></span> </div> </div> <div class="comment"> <?php echo wp_kses($testimonial_repeater_c['comment'] , $allowed_tags); ?> </div> </div> </div> <?php endforeach;?> </div> <div class="arrows"> <div class="prev-single-one"></div> <div class="next-single-one"></div> </div> <div class="num_pagination"> <div class="number-pagination"></div> </div> </div> <?php endif; ?></div>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_testimonials_v1());