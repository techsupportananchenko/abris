<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_extra_content_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-extra-content-v1';
       }
       public function get_title()
       {
           return __('Extra Content' , 'creote-addons');
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
               'extra_content_box',
               [
                   'label' => __('Extra Content', 'creote-addons')
               ]
           );
           $this->add_control(
           'extra_content_types',
           [
             'label' => __('Extra Content Types', 'creote-addons'),
             'type' => Controls_Manager::SELECT,
             'options' => [
               'authour_box' => __( 'Authour Box', 'creote-addons' ),
               'download_docs' => __( 'Download Document', 'creote-addons' ),
               'authour_box_two' => __( 'Authour Box Two', 'creote-addons' ),
               'image_with_content' => __( 'Image With Content', 'creote-addons' ),
   			    ],
             'default' => __('authour_box' , 'creote-addons'),
             ]
           );
         // ---------- autnour box
         $this->add_control(
   			'authour_text',
   			[
   				'label'       => esc_html__( 'Authour Text', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
           'default' =>  esc_html__( 'Liam Oliver,  Founder & CEO of Qetus' , 'creote-addons'),
           'condition' => [
             'extra_content_types' => 'authour_box',
           ],
         ]);
         $this->add_control(
           'authour_text_two',
           [
             'label'       => esc_html__( 'Authour Text', 'creote-addons' ),
             'type'        => Controls_Manager::TEXTAREA,
             'default' =>  esc_html__( 'Liam Oliver,  Founder & CEO of Qetus' , 'creote-addons'),
             'condition' => [
               'extra_content_types' => 'authour_box_two',
             ],
           ]);
         $this->add_control(
           'description',
           [
             'label'       => esc_html__( 'Authour Description', 'creote-addons' ),
             'type'        => Controls_Manager::TEXTAREA,
             'default' =>  esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo' , 'creote-addons'),
             'condition' => [
               'extra_content_types' => 'authour_box_two',
             ],
           ]);
         $this->add_control(
           'authour_image',
           [
               'label' => __('Author Image', 'creote-addons'),
               'type' => Controls_Manager::MEDIA,
               'default' => [
                   'url' => CREOTE_ADDONS_URL. 'assets/images/authour-image.png',
                 ],
                'condition' => [
                   'extra_content_types' => 'authour_box_two',
                ]
           ]
        );
         $this->add_control(
           'sign_image',
           [
               'label' => __('Signature', 'creote-addons'),
               'type' => Controls_Manager::MEDIA,
               'default' => [
                   'url' => CREOTE_ADDONS_URL. 'assets/images/signature.png',
                 ],
                'condition' => [
                   'extra_content_types' => 'authour_box',
                ]
           ]
        );
        $this->add_control(
         'sign_image_two',
         [
             'label' => __('Signature', 'creote-addons'),
             'type' => Controls_Manager::MEDIA,
             'default' => [
                 'url' => CREOTE_ADDONS_URL. 'assets/images/signature.png',
               ],
              'condition' => [
                 'extra_content_types' => 'authour_box_two',
              ]
         ]
      );
         // ---------- autnour box
         $this->add_control(
           'download_text',
           [
             'label'       => esc_html__( 'Download Text', 'creote-addons' ),
             'type'        => Controls_Manager::TEXTAREA,
             'default' =>  esc_html__( 'Download our latest presentation' , 'creote-addons'),
             'condition' => [
               'extra_content_types' => 'download_docs',
             ],
         ]);
         $this->add_control(
           'download_link',
         [
           'label'       => esc_html__( 'Download Document Link', 'creote-addons' ),
           'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( '#' , 'creote-addons'),
           'condition' => [
             'extra_content_types' => 'download_docs',
         ],
        ]);  
       $this->add_control(
         'img_tit',
         [
             'label' => __('Image', 'creote-addons'),
             'type' => Controls_Manager::MEDIA,
             'default' => [
               'url' => CREOTE_ADDONS_URL. 'assets/images/authour-image.png',
               ],
              'condition' => [
                 'extra_content_types' => 'image_with_content',
              ]
         ]
      );
       $this->add_control(
   			'title_img',
   			[
   				'label'       => esc_html__( 'Title', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
           'default' =>  esc_html__( 'Since 1998, <br> Operating in Birmingham. ' , 'creote-addons'),
           'condition' => [
             'extra_content_types' => 'image_with_content',
           ],
         ]);
         $this->add_responsive_control(
           'dark_white',
           [
             'label' => __( 'Extra Content Color Type', 'creote-addons' ),
             'type' => Controls_Manager::SELECT,
             'options' => [
               'dark_color' => __('Dark Color', 'creote-addons'), 
               'light_color' => __('Light Color', 'creote-addons'),
               ],
              'default' => 'dark_color',
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
            'default' => 'yes',
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
       $this->start_controls_section('ex_css',
       [ 
           'label' => __('Custom Css', 'creote-addons'),
           'tab' =>Controls_Manager::TAB_STYLE,
       ]
       );
       $this->add_control(
        'bg_color',
         [
            'label' => __('Box Bg Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .extra_content .authour_box_content  ' => 'background: {{VALUE}};',
            ],
            'condition' => [
              'extra_content_types' => 'authour_box_two',
            ],
         ]
     );
     $this->add_control(
      'br_color',
       [
          'label' => __('Box Border Color', 'creote-addons'),
          'type' => Controls_Manager::COLOR,
          'selectors' => [
              '{{WRAPPER}}  .extra_content .authour_box_content  ' => 'border-color: {{VALUE}};',
          ],
          'condition' => [
            'extra_content_types' => 'authour_box_two',
          ],
       ]
   );
      $this->add_control(
         'title_color',
          [
             'label' => __('Title Color', 'creote-addons'),
             'type' => Controls_Manager::COLOR,
             'selectors' => [
                 '{{WRAPPER}} .extra_content .authour_box_content .text h6 , {{WRAPPER}}  .extra_content .download_box_content a ,
                 {{WRAPPER}} .extra_content .authour_box_content .text h6 , {{WRAPPER}} .extra_content .simple_image h2 ' => 'color: {{VALUE}};',
             ],
          ]
      );
      $this->add_control(
        'de_color',
         [
            'label' => __('Description Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .extra_content .authour_box_content.two .text p ' => 'color: {{VALUE}};',
            ],
            'condition' => [
              'extra_content_types' => 'authour_box_two',
            ],
         ]
     );
      $this->add_control(
        'arrowcolor_color',
         [
            'label' => __('Download icon Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .extra_content .download_box_content a i ' => 'color: {{VALUE}};',
            ],
            'condition' => [
              'extra_content_types' => 'download_docs',
            ],
         ]
     );
     $this->add_control(
      'arrowcolorbg_color',
       [
          'label' => __('Download icon Bg Color', 'creote-addons'),
          'type' => Controls_Manager::COLOR,
          'selectors' => [
              '{{WRAPPER}} .extra_content .download_box_content a i ' => 'background: {{VALUE}};',
          ],
          'condition' => [
            'extra_content_types' => 'download_docs',
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
<div class="extra_content <?php echo esc_attr($settings['extra_content_types']); ?> <?php echo esc_attr($settings['dark_white']); ?>" <?php if($settings['transitions_enable'] == 'yes'): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" data-aos-offset="0" <?php endif;?>> <?php if($settings['extra_content_types'] == 'download_docs'):?> <div class="download_box_content"> <?php if(!empty($settings['download_text'])): ?> <a href="<?php echo esc_url($settings['download_link']);?>" download> <?php echo wp_kses($settings['download_text'] , $allowed_tags) ?> <i class="icon-download-symbol"></i> </a> <?php endif; ?> </div> <?php elseif($settings['extra_content_types'] == 'authour_box_two'):?> <div class="authour_box_content two"> <?php if(!empty($settings['authour_image']['url'])): $authour_image = isset($settings['authour_image']['alt']) ? $settings['authour_image']['alt'] : ''; if(!empty($authour_image)) { $authour_image = $authour_image; }else{ $authour_image = 'image'; } ?> <div class="image"> <img src="<?php echo esc_url($settings['authour_image']['url']); ?>" class="img-fluid authour_image" alt="<?php echo esc_attr($authour_image); ?>" /> </div> <?php endif; ?> <div class="text"> <?php if(!empty($settings['authour_text_two'])): ?> <h6><?php echo wp_kses($settings['authour_text_two'] , $allowed_tags) ?></h6> <?php endif; ?> <?php if(!empty($settings['description'])): ?> <p><?php echo wp_kses($settings['description'] , $allowed_tags) ?></p> <?php endif; ?> <?php if(!empty($settings['sign_image_two']['url'])): $sign_image_two = isset($settings['sign_image_two']['alt']) ? $settings['sign_image_two']['alt'] : ''; if(!empty($sign_image_two)) { $sign_image_two = $sign_image_two; }else{ $sign_image_two = 'image'; } ?> <img src="<?php echo esc_url($settings['sign_image_two']['url']); ?>" class="img-fluid sign_image_two" alt="<?php echo esc_attr($sign_image_two); ?>" /> <?php endif; ?> </div> </div> <?php elseif($settings['extra_content_types'] == 'image_with_content'):?> <div class="simple_image"> <?php if(!empty($settings['img_tit']['url'])): $img_tit = isset($settings['img_tit']['alt']) ? $settings['img_tit']['alt'] : ''; if(!empty($img_tit)) { $img_tit = $img_tit; }else{ $img_tit = 'image'; } ?> <img src="<?php echo esc_url($settings['img_tit']['url']); ?>" alt="<?php echo esc_attr($img_tit); ?>" /> <?php endif; ?> <h2> <?php echo wp_kses($settings['title_img'] , $allowed_tags) ?> </h2> </div> <?php else: ?> <div class="authour_box_content"> <?php if(!empty($settings['sign_image']['url'])): $sign_image = isset($settings['sign_image']['alt']) ? $settings['sign_image']['alt'] : ''; if(!empty($sign_image)) { $sign_image = $sign_image; }else{ $sign_image = 'image'; } ?> <div class="image"> <img src="<?php echo esc_url($settings['sign_image']['url']); ?>" class="img-fluid sign_image" alt="<?php echo esc_attr($sign_image); ?>" /> </div> <?php endif; ?> <?php if(!empty($settings['authour_text'])): ?> <div class="text"> <h6><?php echo wp_kses($settings['authour_text'] , $allowed_tags) ?></h6> </div> <?php endif; ?> </div> <?php endif; ?></div>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_extra_content_v1());