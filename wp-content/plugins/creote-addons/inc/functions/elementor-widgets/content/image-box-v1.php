<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_image_box_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-image-box-v1';
       }
       public function get_title()
       {
           return __('Image Box v1' , 'creote-addons');
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
   			'image_box_content_v1',
   			[
   				'label' => esc_html__( 'Image Content', 'creote-addons' ),
   			]
           );
           $this->add_control(
   			'image_box_styles',
   			[
   				'label'   => esc_html__( 'Image Box Style', 'creote-addons' ),
   				'type'    => Controls_Manager::SELECT,
   				'default' => 'style_one',
   				'options' => array(
   					'style_one' => esc_html__( 'Style One', 'creote-addons' ),
   					'style_two' => esc_html__( 'Style Two', 'creote-addons' ),
   					'style_three' => esc_html__( 'Style Three', 'creote-addons' ),
                       'style_four' => esc_html__( 'Style Four', 'creote-addons' ),
                       'style_five' => esc_html__( 'Style Five', 'creote-addons' ),
                       'style_six' => esc_html__( 'Style Six', 'creote-addons' ),
                       'style_seven' => esc_html__( 'Style Seven', 'creote-addons' ),
   				),
   			]
           );
           $this->add_control(
   			'image_one',
   			[
   				'label' => __( 'Image One', 'creote-addons' ),
   				'type' => Controls_Manager::MEDIA,
   				'default' => [
   					'url' => \Elementor\Utils::get_placeholder_image_src(),
   				],
                   'condition' => [
   					'image_box_styles' => 'style_one',
   				 ],
   			]
           );
           $this->add_control(
   			'image_two',
   			[
   				'label' => __( 'Image Two', 'creote-addons' ),
   				'type' => Controls_Manager::MEDIA,
   				'default' => [
   					'url' => \Elementor\Utils::get_placeholder_image_src(),
   				],
                   'condition' => [
   					'image_box_styles' => 'style_one',
   				 ],
   			]
   		); 
           $this->add_control(
   			'image_two_one',
   			[
   				'label' => __( 'Image One', 'creote-addons' ),
   				'type' => Controls_Manager::MEDIA,
   				'default' => [
   					'url' => \Elementor\Utils::get_placeholder_image_src(),
   				],
                   'condition' => [
   					'image_box_styles' => 'style_two',
   				 ],
   			]
           );
           $this->add_control(
   			'image_two_two',
   			[
   				'label' => __( 'Image Two', 'creote-addons' ),
   				'type' => Controls_Manager::MEDIA,
   				'default' => [
   					'url' => \Elementor\Utils::get_placeholder_image_src(),
   				],
                   'condition' => [
   					'image_box_styles' => 'style_two',
   				 ],
   			]
   		);
           $this->add_control(
   			'image_three',
   			[
   				'label' => __( 'Image', 'creote-addons' ),
   				'type' => Controls_Manager::MEDIA,
   				'default' => [
   					'url' => \Elementor\Utils::get_placeholder_image_src(),
   				],
                   'condition' => [
   					'image_box_styles' => 'style_three',
   				 ],
   			]
   		);
           $this->add_control(
               'height',
               [
               'label'       => esc_html__( 'Image Height', 'creote-addons' ),
               'type'        => Controls_Manager::TEXT,
               'default' =>  esc_html__( 'auto' , 'creote-addons'),
               'selectors' => [
                   '{{WRAPPER}} .image_boxes.style_three img , {{WRAPPER}} .image_boxes.style_three' => 'height: {{VALUE}}!important;',
               ],
               'condition' => [
                   'image_box_styles' => 'style_three',
                ],
           ]);
           $this->add_control(
               'image_height_enable_six',
              [
                 'label' => __('Image Height Enable', 'creote-addons'),
                  'type' => Controls_Manager::SWITCHER,
                  'label_on' => __('Yes', 'creote-addons'),
                  'label_off' => __('No', 'creote-addons'),
                  'return_value' => 'yes',
                  'default' => 'no',
                  'condition' => [
                   'image_box_styles' => 'style_six',
                ],
              ]
           ); 
           $this->add_control(
               'height_six',
               [
               'label'       => esc_html__( 'Image Height', 'creote-addons' ),
               'type'        => Controls_Manager::TEXT,
               'default' =>  esc_html__( 'auto' , 'creote-addons'),
               'selectors' => [
                   '{{WRAPPER}} .image_boxes.style_six img , {{WRAPPER}} .image_boxes.style_six' => 'height: {{VALUE}}!important; width:100%; object-fit:cover;',
               ],
               'condition' => [
                   'image_height_enable_six' => 'yes',
                ],
           ]);
           $this->add_control(
   			'image_four_one',
   			[
   				'label' => __( 'Image One', 'creote-addons' ),
   				'type' => Controls_Manager::MEDIA,
   				'default' => [
   					'url' => \Elementor\Utils::get_placeholder_image_src(),
   				],
                   'condition' => [
   					'image_box_styles' => 'style_four',
   				 ],
   			]
           );
           $this->add_control(
   			'image_four_two',
   			[
   				'label' => __( 'Image Two', 'creote-addons' ),
   				'type' => Controls_Manager::MEDIA,
   				'default' => [
   					'url' => \Elementor\Utils::get_placeholder_image_src(),
   				],
                   'condition' => [
   					'image_box_styles' => 'style_four',
   				 ],
   			]
   		);
           $this->add_control(
   			'image_four_three',
   			[
   				'label' => __( 'Image Three', 'creote-addons' ),
   				'type' => Controls_Manager::MEDIA,
   				'default' => [
   					'url' => \Elementor\Utils::get_placeholder_image_src(),
   				],
                   'condition' => [
   					'image_box_styles' => 'style_four',
   				 ],
   			]
   		); 
           $this->add_control(
   			'image_five_one',
   			[
   				'label' => __( 'Image One', 'creote-addons' ),
   				'type' => Controls_Manager::MEDIA,
   				'default' => [
   					'url' => \Elementor\Utils::get_placeholder_image_src(),
   				],
                   'condition' => [
   					'image_box_styles' => 'style_five',
   				 ],
   			]
   		);
           $this->add_control(
   			'image_five_two',
   			[
   				'label' => __( 'Image Two', 'creote-addons' ),
   				'type' => Controls_Manager::MEDIA,
   				'default' => [
   					'url' => \Elementor\Utils::get_placeholder_image_src(),
   				],
                   'condition' => [
   					'image_box_styles' => 'style_five',
   				 ],
   			]
   		); 
           $this->add_control(
   			'image_six_one',
   			[
   				'label' => __( 'Image', 'creote-addons' ),
   				'type' => Controls_Manager::MEDIA,
   				'default' => [
   					'url' => \Elementor\Utils::get_placeholder_image_src(),
   				],
                   'condition' => [
   					'image_box_styles' => 'style_six',
   				 ],
   			]
   		);
           $this->add_control(
   			'image_seven_one',
   			[
   				'label' => __( 'Image', 'creote-addons' ),
   				'type' => Controls_Manager::MEDIA,
   				'default' => [
   					'url' => \Elementor\Utils::get_placeholder_image_src(),
   				],
                   'condition' => [
   					'image_box_styles' => 'style_seven',
   				 ],
   			]
   		);
         $this->add_control(
   			'pattern_image_seven',
   			[
   				'label' => __( 'Pattern Image', 'creote-addons' ),
   				'type' => Controls_Manager::MEDIA,
   				'default' => [
   					'url' => CREOTE_ADDONS_URL . '/assets/images/pattern-n1.png',
   				],
                   'condition' => [
   					'image_box_styles' => 'style_seven',
   				 ],
   			]
   		);
           $this->add_control(
               'years_seven',
               [
                 'label'       => esc_html__( 'Year Of Experience', 'creote-addons' ),
                 'type'        => Controls_Manager::TEXTAREA,
                 'default' =>  esc_html__( '25+ Years Of Experience' , 'creote-addons'),
                 'condition' => [
                   'image_box_styles' => 'style_seven',
                ],
           ]);
           $this->add_control(
               'image_height_enable_seven',
              [
                 'label' => __('Image Height Enable', 'creote-addons'),
                  'type' => Controls_Manager::SWITCHER,
                  'label_on' => __('Yes', 'creote-addons'),
                  'label_off' => __('No', 'creote-addons'),
                  'return_value' => 'yes',
                  'default' => 'no',
                  'condition' => [
                   'image_box_styles' => 'style_seven',
                ],
              ]
           ); 
           $this->add_control(
               'height_seven',
               [
               'label'       => esc_html__( 'Image Height', 'creote-addons' ),
               'type'        => Controls_Manager::TEXT,
               'default' =>  esc_html__( 'auto' , 'creote-addons'),
               'selectors' => [
                   '{{WRAPPER}} .image_boxes.style_seven .image_box img , {{WRAPPER}} .image_boxes.style_seven' => 'height: {{VALUE}}!important; width:100%; object-fit:cover;',
               ],
               'condition' => [
                   'image_height_enable_seven' => 'yes',
                ],
           ]); 
   		$this->add_control(
   			'background_image',
   			[
   				'label' => __( 'Background Image', 'creote-addons' ),
   				'type' => Controls_Manager::MEDIA,
   				'default' => [
                       'url' => CREOTE_ADDONS_URL . '/assets/images/shape-1.png',
   				],
   				'condition' => [
   					'image_box_styles' => 'style_two',
   				 ],
   			]
   		); 
           $this->add_control(
               'video_link_enable',
              [
                 'label' => __('Video Enable', 'creote-addons'),
                  'type' => Controls_Manager::SWITCHER,
                  'label_on' => __('Yes', 'creote-addons'),
                  'label_off' => __('No', 'creote-addons'),
                  'return_value' => 'yes',
                  'default' => 'yes',
              ]
           );
           $this->add_control(
               'video_link',
               [
               'label'       => esc_html__( 'Video Link', 'creote-addons' ),
               'type'        => Controls_Manager::TEXT,
               'default' =>  esc_html__( '#' , 'creote-addons'),
               'condition' => [
                   'video_link_enable' => 'yes',
               ],
           ]);
           $this->add_control(
               'experience_enable',
              [
                 'label' => __('Experience Enable', 'creote-addons'),
                  'type' => Controls_Manager::SWITCHER,
                  'label_on' => __('Yes', 'creote-addons'),
                  'label_off' => __('No', 'creote-addons'),
                  'return_value' => 'yes',
                  'default' => 'yes',
                  'condition' => [
                   'image_box_styles' => 'style_one',
                ],
              ]
           );
         $this->add_control(
           'years',
           [
             'label'       => esc_html__( 'Enter the year', 'creote-addons' ),
             'type'        => Controls_Manager::TEXT,
             'default' =>  esc_html__( '25' , 'creote-addons'),
             'condition' => [
               'image_box_styles' => 'style_one',
            ],
         ]);
         $this->add_control(
           'year_title',
           [
             'label'       => esc_html__( 'Year Text', 'creote-addons' ),
             'type'        => Controls_Manager::TEXTAREA,
             'default' =>  esc_html__( 'Year Of Experience We Just Achived' , 'creote-addons'),
             'condition' => [
               'image_box_styles' => 'style_one',
            ],
         ]);
         $this->add_control(
           'four_experience_enable',
          [
             'label' => __('Experience Enable', 'creote-addons'),
              'type' => Controls_Manager::SWITCHER,
              'label_on' => __('Yes', 'creote-addons'),
              'label_off' => __('No', 'creote-addons'),
              'return_value' => 'yes',
              'default' => 'yes',
              'condition' => [
               'image_box_styles' => 'style_four',
            ],
          ]
       );
       $this->add_control(
           'years_four',
           [
             'label'       => esc_html__( 'Experience', 'creote-addons' ),
             'type'        => Controls_Manager::TEXT,
             'default' =>  esc_html__( '30+ Years Of Experience' , 'creote-addons'),
             'condition' => [
               'image_box_styles' => 'style_four',
            ],
       ]);
         $this->add_control(
           'quotes_enable',
          [
             'label' => __('Author Enable', 'creote-addons'),
              'type' => Controls_Manager::SWITCHER,
              'label_on' => __('Yes', 'creote-addons'),
              'label_off' => __('No', 'creote-addons'),
              'return_value' => 'yes',
              'default' => 'yes',
              'condition' => [
               'image_box_styles' => 'style_two',
               ],
          ]
       );
     $this->add_control(
       'quotes',
       [
         'label'       => esc_html__( 'Quote', 'creote-addons' ),
         'type'        => Controls_Manager::TEXTAREA,
         'default' =>  esc_html__( 'Making What’s Possible in
         Human Resource' , 'creote-addons'),
         'condition' => [
           'image_box_styles' => 'style_two',
           ],
     ]);
     $this->add_control(
       'name',
       [
         'label'       => esc_html__( 'Name', 'creote-addons' ),
         'type'        => Controls_Manager::TEXTAREA,
         'default' =>  esc_html__( '/  Liam Oliver' , 'creote-addons'),
         'condition' => [
           'image_box_styles' => 'style_two',
           ],
     ]);
     $this->add_control(
       'play_video',
       [
         'label'       => esc_html__( 'Play Video', 'creote-addons' ),
         'type'        => Controls_Manager::TEXT,
         'default' =>  esc_html__( 'Play Video' , 'creote-addons'),
         'condition' => [
           'image_box_styles' => 'style_six',
        ],
   ]);
   $this->add_control(
       'years_six',
       [
         'label'       => esc_html__( 'Year Of Experience', 'creote-addons' ),
         'type'        => Controls_Manager::TEXTAREA,
         'default' =>  esc_html__( '25+ Years Of Experience' , 'creote-addons'),
         'condition' => [
           'image_box_styles' => 'style_six',
        ],
   ]);
     $this->add_control(
           'border_enable',
           [
               'label' => __('Border Enable', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'no',
               'condition' => [
                   'image_box_styles' => 'style_three',
               ],
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
               '0' => __('0ms', 'creote-addons'), 
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
              'default' => '0',
              'condition' => [
               'transitions_enable' => 'yes',
             ],
           ]
         );
           $this->end_controls_section();
   	}
       protected function render() {
   		$settings = $this->get_settings_for_display();
         $allowed_tags = wp_kses_allowed_html('post');
   	?>
<?php if($settings['image_box_styles'] == 'style_two'):?><div class="image_boxes style_two" <?php if($settings['transitions_enable'] == 'yes'): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" <?php endif;?>> <?php if(!empty($settings['background_image']['url'])): ?> <img src="<?php echo esc_url($settings['background_image']['url']); ?>" class="background_image" alt="image" /> <?php endif; ?> <?php if(!empty($settings['image_two_one']['url'])): $image_two_one_alt = isset($settings['image_two_one']['alt']) ? $settings['image_two_one']['alt'] : ''; if(!empty($image_two_one_alt)) { $image_two_one_alts = $image_two_one_alt; }else{ $image_two_one_alts = 'image'; } ?> <div class="image one"> <img src="<?php echo esc_url($settings['image_two_one']['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image_two_one_alts); ?>" /> </div> <?php endif; ?> <?php if(!empty($settings['image_two_two']['url'])): $image_two_two = isset($settings['image_two_two']['alt']) ? $settings['image_two_two']['alt'] : ''; if(!empty($image_two_two)) { $image_two_twos = $image_two_two; }else{ $image_two_twos = 'image'; } ?> <div class="image two"> <img src="<?php echo esc_url($settings['image_two_two']['url']); ?>" class="img" alt="<?php echo esc_attr($image_two_twos); ?>" /> <?php if($settings['video_link_enable'] == true): ?> <div class="video_box"> <a href="<?php echo esc_attr($settings['video_link']); ?>" class="lightbox-image"><i class="icon-play"></i></a> </div> <?php endif; ?> </div> <?php endif; ?> <?php if($settings['quotes_enable'] == 'yes'): ?> <div class="authour_quotes"> <i class="icon-quote"></i> <h6> <?php echo esc_attr($settings['quotes']); ?></h6> <p> <?php echo esc_attr($settings['name']); ?></p> </div> <?php endif; ?></div><?php elseif($settings['image_box_styles'] == 'style_three'):?><div class="image_boxes style_three <?php if($settings['border_enable'] == 'yes'): ?> border_yes <?php endif; ?>" <?php if($settings['transitions_enable'] == 'yes'): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" <?php endif;?>> <?php if(!empty($settings['image_three']['url'])): $image_three = isset($settings['image_three']['alt']) ? $settings['image_three']['alt'] : ''; if(!empty($image_three)) { $image_threes = $image_three; }else{ $image_threes = 'image'; } ?> <img src="<?php echo esc_url($settings['image_three']['url']); ?>" class="background_image" alt="<?php echo esc_attr($image_threes); ?>" /> <?php if($settings['video_link_enable'] == true): ?> <div class="video_box"> <a href="<?php echo esc_attr($settings['video_link']); ?>" class="lightbox-image"><i class="icon-play"></i></a> </div> <?php endif; ?> <?php endif; ?></div><?php elseif($settings['image_box_styles'] == 'style_four'):?><div class="image_boxes style_four" <?php if($settings['transitions_enable'] == 'yes'): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" <?php endif;?>> <?php if(!empty($settings['image_four_one']['url'])): $image_four_one = isset($settings['image_four_one']['alt']) ? $settings['image_four_one']['alt'] : ''; if(!empty($image_four_one)) { $image_four_one = $image_four_one; }else{ $image_four_one = 'image'; }?> <div class="image_box one"> <img src="<?php echo esc_url($settings['image_four_one']['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image_four_one); ?>"> </div> <?php endif; ?> <div class="image_box"> <div class="row"> <?php if(!empty($settings['image_four_two']['url'])): $image_four_two = isset($settings['image_four_two']['alt']) ? $settings['image_four_two']['alt'] : ''; if(!empty($image_four_two)) { $image_four_two = $image_four_two; }else{ $image_four_two = 'image'; } ?> <div class="col-lg-6 col-md-6 pad_zero_left"> <div class="imgs"> <img src="<?php echo esc_url($settings['image_four_two']['url']); ?>" class="img-fluid one_img" alt="<?php echo esc_attr($image_four_two); ?>"> </div> </div> <?php endif; ?> <?php if(!empty($settings['image_four_three']['url'])): $image_four_three = isset($settings['image_four_three']['alt']) ? $settings['image_four_three']['alt'] : ''; if(!empty($image_four_three)) { $image_four_three = $image_four_three; }else{ $image_four_three = 'image'; } ?> <div class="col-lg-6 col-md-6 pad_zero_right"> <div class="imgs"> <img src="<?php echo esc_url($settings['image_four_three']['url']); ?>" class="img-fluid one_img" alt="<?php echo esc_attr($image_four_three); ?>"> </div> </div> <?php endif; ?> </div> </div> <?php if(!empty($settings['four_experience_enable'])): ?> <div class="image_content_inner <?php if($settings['video_link_enable'] == true): ?> viceo_en <?php endif; ?>"> <h2> <?php echo wp_kses($settings['years_four'] , $allowed_tags); ?></h2> <?php if($settings['video_link_enable'] == true): ?> <div class="video_box_null"> <a href="<?php echo esc_attr($settings['video_link']); ?>" class="lightbox-image"><i class="icon-play"></i></a> </div> <?php endif; ?> </div> <?php endif; ?></div><?php elseif($settings['image_box_styles'] == 'style_five'):?> <div class="image_boxes style_five" <?php if($settings['transitions_enable'] == 'yes'): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" <?php endif;?>> <?php if(!empty($settings['image_five_one']['url'])): $image_five_one = isset($settings['image_five_one']['alt']) ? $settings['image_five_one']['alt'] : ''; if(!empty($image_five_one)) { $image_five_one = $image_five_one; }else{ $image_five_one = 'image'; } ?> <div class="image_box one"> <img src="<?php echo esc_url($settings['image_five_one']['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image_five_one); ?>"> <?php if($settings['video_link_enable'] == true): ?> <div class="video_box_null"> <a href="<?php echo esc_attr($settings['video_link']); ?>" class="lightbox-image"><i class="icon-play"></i></a> </div> <?php endif; ?> </div> <?php endif; ?> <?php if(!empty($settings['image_five_two']['url'])): $image_five_two = isset($settings['image_five_two']['alt']) ? $settings['image_five_two']['alt'] : ''; if(!empty($image_five_two)) { $image_five_two = $image_five_two; }else{ $image_five_two = 'image'; } ?> <div class="image_box two"> <img src="<?php echo esc_url($settings['image_five_two']['url']); ?>" class="img-fluid two" alt="<?php echo esc_attr($image_five_two); ?>"> </div> <?php endif; ?></div><?php elseif($settings['image_box_styles'] == 'style_six'):?> <div class="image_boxes style_six" <?php if($settings['transitions_enable'] == 'yes'): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" <?php endif;?>> <?php if(!empty($settings['image_six_one']['url'])): $image_six_one = isset($settings['image_six_one']['alt']) ? $settings['image_six_one']['alt'] : ''; if(!empty($image_six_one)) { $image_six_one = $image_six_one; }else{ $image_six_one = 'image'; } ?> <div class="image_box"> <img src="<?php echo esc_url($settings['image_six_one']['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image_six_one); ?>"> <?php if($settings['video_link_enable'] == true): ?> <div class="video_inner type_six"> <a href="<?php echo esc_attr($settings['video_link']); ?>" class="lightbox-image"><i class="icon-play"></i></a> <?php if(!empty($settings['play_video'])): ?> <p><?php echo esc_attr($settings['play_video']); ?></p> <?php endif; ?> </div> <?php endif; ?> <?php if(!empty($settings['years_six'])): ?> <div class="experience"> <div class="experience_inner"> <h2> <?php echo wp_kses($settings['years_six'] , $allowed_tags); ?> </h2> </div> </div> <?php endif; ?> </div> <?php endif; ?> </div><?php elseif($settings['image_box_styles'] == 'style_seven'):?> <div class="image_boxes style_seven" <?php if($settings['transitions_enable'] == 'yes'): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" <?php endif;?>> <?php if(!empty($settings['image_seven_one']['url'])): $image_seven_one = isset($settings['image_seven_one']['alt']) ? $settings['image_seven_one']['alt'] : ''; if(!empty($image_seven_one)) { $image_seven_one = $image_seven_one; }else{ $image_seven_one = 'image'; } ?> <div class="image_box"> <img src="<?php echo esc_url($settings['image_seven_one']['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image_seven_one); ?>"> <?php if($settings['video_link_enable'] == true): ?> <div class="video_inner type_seven"> <a href="<?php echo esc_attr($settings['video_link']); ?>" class="lightbox-image"><i class="icon-play"></i></a> </div> <?php endif; ?> <?php if(!empty($settings['years_seven'])): ?> <div class="experience"> <div class="experience_inner"> <h2> <?php echo wp_kses($settings['years_seven'] , $allowed_tags); ?> </h2> </div> </div> <?php endif; ?> </div> <?php endif; ?> <?php if(!empty($settings['pattern_image_seven']['url'])): ?> <div class="pattern_imag"> <img src="<?php echo esc_url($settings['pattern_image_seven']['url']); ?>" alt="img"/> </div> <?php endif; ?> </div><?php else: ?> <div class="image_boxes style_one" <?php if($settings['transitions_enable'] == 'yes'): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" data-aos-offset="0" <?php endif;?>> <?php if(!empty($settings['image_one']['url'])): $image_one = isset($settings['image_one']['alt']) ? $settings['image_one']['alt'] : ''; if(!empty($image_one)) { $image_one = $image_one; }else{ $image_one = 'image'; } ?> <div class="image one"> <img src="<?php echo esc_url($settings['image_one']['url']); ?>" class="img" alt="<?php echo esc_attr($image_one); ?>" /> </div> <?php endif; ?> <?php if(!empty($settings['image_two']['url'])): $image_two = isset($settings['image_two']['alt']) ? $settings['image_two']['alt'] : ''; if(!empty($image_two)) { $image_two = $image_two; }else{ $image_two = 'image'; } ?> <div class="image two"> <img src="<?php echo esc_url($settings['image_two']['url']); ?>" class="img" alt="<?php echo esc_attr($image_two); ?>" /> <?php if($settings['video_link_enable'] == true): ?> <div class="video_box"> <a href="<?php echo esc_attr($settings['video_link']); ?>" class="lightbox-image"><i class="icon-play"></i></a> </div> <?php endif; ?> </div> <?php endif; ?> <?php if($settings['experience_enable'] == 'yes'): ?> <div class="year_of_experience"> <div class="year"> <?php echo esc_attr($settings['years']); ?> </div> <div class="content"> <h2> <?php echo esc_attr($settings['year_title']); ?></h2> <span class="icon-thumbs-up"></span> </div> </div> <?php endif; ?></div><?php endif;?> 
<?php 
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_image_box_v1());