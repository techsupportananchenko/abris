<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_process_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-process-v1';
       }
       public function get_title()
       {
           return __('Process V1 ' , 'creote-addons');
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
               'process_content',
               [
                   'label' => __('Process Content', 'creote-addons')
               ]
           );
           $this->add_control(
               'process_styles',
               [
                   'label' => __('Process Styles', 'creote-addons'),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
                       'style_one' => __( 'Style One', 'creote-addons' ),
                       'style_two' => __( 'Style Two', 'creote-addons' ),
                       'style_three' => __( 'Style Three', 'creote-addons' ),    
                       'style_four' => __( 'Style Four', 'creote-addons' ), 
   			   	],
                   'default' => __('style_one' , 'creote-addons'),
               ]
           );
           $this->add_control(
             'alignment',
             [
                 'label' => __('Alignment', 'creote-addons'),
                 'type' => Controls_Manager::SELECT,
                 'options' => [
                     'left' => __( 'Left', 'creote-addons' ),
                     'right' => __( 'Right', 'creote-addons' ),
                  ],
                 'default' => __('left' , 'creote-addons'),
                 'condition' => [
                   'process_styles' => 'style_three',
                ]
             ]
         );
           $this->add_control(
             'icon_type',
             [
                 'label' => __('Icon Font  / Icon Image ', 'creote-addons'),
                 'type' => Controls_Manager::SELECT,
                 'options' => [
                     'icon_font' => __( 'Icon Font Type', 'creote-addons' ),
                     'icon_image' => __( 'Icon Image Type', 'creote-addons' ),
                  ],
                 'default' => __('icon_font' , 'creote-addons'),
             ]
         );
         $this->add_control(
             'icon_image_get',
             [
                 'label' => __('Icon Image', 'creote-addons'),
                 'type' => Controls_Manager::MEDIA,
                 'default' => [
                     'url' => CREOTE_ADDONS_URL. 'inc/core-widgets/images/icon-box-svg.svg',
                   ],
                  'condition' => [
                     'icon_type' => 'icon_image',
                  ]
             ]
         );
          $this->add_control(
             'icon_font_get',
             [
                 'label' => __('Icon Fonts', 'creote-addons'),
                 'type' => Controls_Manager::ICON,
                 'options' => get_creote_icon(),
                 'default' => __('fa fa-address-card' , 'creote-addons'),
                  'condition' => [
                     'icon_type' => 'icon_font',
                  ]
             ]
         );
         $this->add_control(
           'step_number',
           [
             'label'       => esc_html__( 'Steps Number', 'creote-addons' ),
             'type'        => Controls_Manager::TEXT,
             'default' =>  esc_html__( '01' , 'creote-addons'),
             'condition' => [
               'process_styles' => ['style_one' , 'style_two' , 'style_three' , 'style_four'],
               ]
           ]
         );
         $this->add_control(
          'tag_type',
          [
          'label' => __('Heading Tag', 'luxride-addons'),
          'type' => \Elementor\Controls_Manager::SELECT,
          'options' => [
              'div' => __( 'Div Tag', 'luxride-addons' ),
              'h1' => __( 'H1 Tag', 'luxride-addons' ),
              'h2' => __( 'H2 Tag', 'luxride-addons' ),
              'h3' => __( 'H3 Tag', 'luxride-addons' ),
              'h4' => __( 'H4 Tag', 'luxride-addons' ),
              'h5' => __( 'H5 Tag', 'luxride-addons' ),
              'h6' => __( 'H6 Tag', 'luxride-addons' ),
          ],
          'default' => 'h2' , 
          ]
      ); 
         $this->add_control(
   			'heading',
   		  [
   				'label'       => esc_html__( 'Heading', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'Claims of duty' , 'creote-addons'),
   		  ]
         );
         $this->add_control(
   			'description',
   		  [
   				'label'       => esc_html__( 'Description', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
           'default' =>  esc_html__( 'Certain circumstances seds owing to the claims duty ourighteous indignation and so beguiled.' , 'creote-addons'),
   		  ]
         );
         $this->add_control(
           'button_text',
           [
             'label'       => esc_html__( 'Button Text', 'creote-addons' ),
             'type'        => Controls_Manager::TEXTAREA,
             'default' =>  esc_html__( 'Read more' , 'creote-addons'),
             'condition' => [
               'process_styles' => ['style_two'],
             ],
           ]
           );
         $this->add_control(
           'process_link',
       [
           'label' => __('Link', 'creote-addons'),
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
           $this->add_responsive_control(
               'dark_white',
               [
                 'label' => __( 'Process Color Type', 'creote-addons' ),
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
             $this->start_controls_section('process_css',
             [ 
                 'label' => __('Process Css', 'creote-addons'),
                 'tab' =>Controls_Manager::TAB_STYLE,
             ]
             );
            $this->add_control(
               'icon_color',
                [
                   'label' => __('Icon Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .process_box .process_box_outer_two .content_box .icon span , {{WRAPPER}} .process_box.style_four .process_box_outer_four .icon span ,
                       {{WRAPPER}} .process_box.style_one .process_box_outer .icon .number , {{WRAPPER}} .process_box.style_three .process_box_outer_three .icon span ' => 'color: {{VALUE}};',
                   ],
                ]
            );
            $this->add_control(
               'iconbg_color',
                [
                   'label' => __('Icon Bg Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .process_box.style_one .process_box_outer .icon span , {{WRAPPER}}  .process_box.style_four .process_box_outer_four .icon ' => 'background: {{VALUE}};',
                       '{{WRAPPER}} .process_box.style_one .process_box_outer .icon .number , {{WRAPPER}} .process_box.style_one .process_box_outer .icon .number::before ' => 'background: {{VALUE}};',
                   ],
                   'condition' => [
                     'process_styles' => ['style_one' , 'style_four'],
                   ],
                ]
            );
         $this->add_control(
           'small_title_color',
            [
               'label' => __('Title Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .process_box .process_box_outer_two .content_box .proctitle a , {{WRAPPER}} .process_box.style_four .process_box_outer_four .proctitle a ,
                    {{WRAPPER}} .process_box.style_one .process_box_outer .content_box .proctitle a , {{WRAPPER}} .process_box.style_three .process_box_outer_three .proctitle a  ' => 'color: {{VALUE}};',
               ],
            ]
          );
          $this->add_control(
            'line_color',
             [
                'label' => __('Line Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process_box.style_one .process_box_outer .content_box .proctitle:before  ' => 'background: {{VALUE}};',
                ],
                'condition' => [
                  'process_styles' => ['style_one'],
               ],
             ]
           );
          $this->add_control(
           'description_color',
            [
               'label' => __('Description Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .process_box .process_box_outer_two p , {{WRAPPER}} .process_box.style_four .process_box_outer_four p ,
                   {{WRAPPER}} .process_box.style_one .process_box_outer .content_box p  , {{WRAPPER}} .process_box.style_three .process_box_outer_three p ' => 'color: {{VALUE}};',
               ],
            ]
          );
          $this->add_control(
            'step_color',
             [
                'label' => __('Step Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process_box.style_three .process_box_outer_three .number .no , {{WRAPPER}} .process_box.style_four .process_box_outer_four .icon .no  ' => 'color: {{VALUE}};',
                ],
                'condition' => [
                   'process_styles' => ['style_three' , 'style_four'],
                ],
             ]
           );
           $this->add_control(
            'stepbg_color',
             [
                'label' => __('Step Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process_box.style_four .process_box_outer_four .icon .no  ' => 'background: {{VALUE}};',
                ],
                'condition' => [
                   'process_styles' => ['style_four'],
                ],
             ]
           );
          $this->add_control(
           'button_color',
            [
               'label' => __('Button Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .process_box .process_box_outer_two a.theme-btn  ' => 'color: {{VALUE}};',
               ],
               'condition' => [
                  'process_styles' => ['style_two'],
               ],
            ]
          );
          $this->add_control(
            'button_bor_color',
             [
                'label' => __('Button Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process_box .process_box_outer_two a.theme-btn  ' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                  'process_styles' => ['style_two'],
               ],
             ]
           );
           $this->add_control(
            'button_bg_color',
             [
                'label' => __('Button Background Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process_box .process_box_outer_two a.theme-btn  ' => 'background: {{VALUE}};',
                ],
                'condition' => [
                  'process_styles' => ['style_two'],
               ],
             ]
           );
           $this->add_control(
            'hover_button_icon_color',
             [
                'label' => __('Button Hover Icon Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process_box .process_box_outer_two a.theme-btn::after  ' => 'color: {{VALUE}};',
                ],
                'condition' => [
                  'process_styles' => ['style_two'],
               ],
             ]
           );
           $this->add_control(
            'buttonh_color',
             [
                'label' => __('Button Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process_box .process_box_outer_two a.theme-btn:hover  ' => 'color: {{VALUE}};',
                ],
                'condition' => [
                   'process_styles' => ['style_two'],
                ],
             ]
           );
           $this->add_control(
            'button_hbg_color',
             [
                'label' => __('Button Hover Border / Background Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process_box .process_box_outer_two a.theme-btn:hover  ' => 'border-color: {{VALUE}}; background: {{VALUE}};',
                ],
                'condition' => [
                  'process_styles' => ['style_two'],
               ],
             ]
           );
       $this->end_controls_section();
       }
       protected function render()
       {
         $settings = $this->get_settings_for_display();
         $allowed_tags = wp_kses_allowed_html('post');
         $target = $settings['process_link']['is_external'] ? ' target="_blank"' : '';
   		$nofollow = $settings['process_link']['nofollow'] ? ' rel="nofollow"' : ''; 
   ?>
 
 <div class="process_box <?php echo esc_attr($settings['process_styles']); ?> <?php echo esc_attr($settings['dark_white']); ?>" 
    <?php if($settings['transitions_enable'] == 'yes'): ?> 
        data-aos="fade-up" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" data-aos-offset="0" 
    <?php endif;?>>
    
    <?php if($settings['process_styles'] == 'style_two'):?>
        <div class="process_box_outer_two">
            <?php if(!empty($settings['step_number'])): ?>
                <div class="number"> 
                    <?php echo wp_kses($settings['step_number'] , $allowed_tags) ?> 
                </div>
            <?php endif; ?>
            <div class="content_box clearfix">
                <?php if($settings['icon_type'] == 'icon_font'):?>
                    <div class="icon"> 
                        <span class="<?php echo esc_attr($settings['icon_font_get']); ?>"></span> 
                    </div>
                <?php elseif($settings['icon_type'] == 'icon_image'): 
                    if(!empty($settings['icon_image_get']['url'])): 
                        $icon_image_get = isset($settings['icon_image_get']['alt']) ? $settings['icon_image_get']['alt'] : ''; 
                        if(empty($icon_image_get)) { 
                            $icon_image_get = 'image'; 
                        } 
                    ?>
                    <div class="icon">
                        <div class="img"> 
                            <img src="<?php echo esc_url($settings['icon_image_get']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image_get); ?>" /> 
                        </div>
                    </div>
                    <?php endif; ?> 
                <?php endif; ?>
                <?php if(!empty($settings['heading'])):?> 
                  <<?php echo esc_attr($settings['tag_type']); ?> class="proctitle">
                        <a href="<?php echo esc_url($settings['process_link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>> 
                            <?php echo wp_kses($settings['heading'] , $allowed_tags) ?> 
                        </a> 
                        </<?php echo esc_attr($settings['tag_type']); ?>>
                <?php endif; ?> 
            </div>
            <?php if(!empty($settings['description'])):?> 
                <p> 
                    <?php echo wp_kses($settings['description'] , $allowed_tags) ?> 
                </p> 
            <?php endif; ?> 
            <a href="<?php echo esc_url($settings['process_link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn two"> 
                <?php echo esc_html($settings['button_text']);?> 
            </a> 
        </div>

    <?php elseif($settings['process_styles'] == 'style_three'):?>
        <div class="process_box_outer_three <?php echo esc_attr($settings['alignment']); ?>">
            <?php if($settings['icon_type'] == 'icon_font'):?>
                <div class="icon"> 
                    <span class="<?php echo esc_attr($settings['icon_font_get']); ?>"></span> 
                </div>
            <?php elseif($settings['icon_type'] == 'icon_image'): ?> 
                <div class="icon"> 
                    <?php if(!empty($settings['icon_image_get']['url'])): 
                        $icon_image_get = isset($settings['icon_image_get']['alt']) ? $settings['icon_image_get']['alt'] : ''; 
                        if(empty($icon_image_get)) { 
                            $icon_image_get = 'image'; 
                        } 
                    ?>
                    <div class="img"> 
                        <img src="<?php echo esc_url($settings['icon_image_get']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image_get); ?>" /> 
                    </div> 
                    <?php endif; ?> 
                </div> 
            <?php endif; ?> 
            <div class="content_box"> 
                <?php if(!empty($settings['heading'])):?> 
                  <<?php echo esc_attr($settings['tag_type']); ?> class="proctitle">
                        <a href="<?php echo esc_url($settings['process_link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>> 
                            <?php echo wp_kses($settings['heading'] , $allowed_tags);?> 
                        </a> 
                        </<?php echo esc_attr($settings['tag_type']); ?>>
                <?php endif; ?> 
                <?php if(!empty($settings['description'])):?> 
                    <p> 
                        <?php echo wp_kses($settings['description'] , $allowed_tags);?> 
                    </p> 
                <?php endif; ?> 
            </div> 
            <?php if(!empty($settings['step_number'])): ?> 
                <div class="number"> 
                    <div class="no"> 
                        <?php echo wp_kses($settings['step_number'] , $allowed_tags);?> 
            </div> 
                </div> 
            <?php endif; ?> 
        </div>

    <?php elseif($settings['process_styles'] == 'style_four'):?>
        <div class="process_box_outer_four <?php echo esc_attr($settings['alignment']); ?>">
            <?php if($settings['icon_type'] == 'icon_font'):?>
                <div class="icon"> 
                    <span class="<?php echo esc_attr($settings['icon_font_get']); ?>"></span> 
                    <?php if(!empty($settings['step_number'])): ?> 
                      <div class="no"> 
                            <?php echo wp_kses($settings['step_number'] , $allowed_tags);?> 
                        </div> 
                    <?php endif; ?> 
                </div>
            <?php elseif($settings['icon_type'] == 'icon_image'): ?> 
                <div class="icon"> 
                    <?php if(!empty($settings['icon_image_get']['url'])): 
                        $icon_image_get = isset($settings['icon_image_get']['alt']) ? $settings['icon_image_get']['alt'] : ''; 
                        if(empty($icon_image_get)) { 
                            $icon_image_get = 'image'; 
                        } 
                    ?>
                    <img src="<?php echo esc_url($settings['icon_image_get']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image_get); ?>" /> 
                    <?php endif; ?> 
                    <?php if(!empty($settings['step_number'])): ?> 
                      <div class="no"> 
                            <?php echo wp_kses($settings['step_number'] , $allowed_tags);?> 
                        </div> 
                    <?php endif; ?> 
                </div> 
            <?php endif; ?> 
            <div class="content_box"> 
                <?php if(!empty($settings['heading'])):?> 
                  <<?php echo esc_attr($settings['tag_type']); ?> class="proctitle">
                        <a href="<?php echo esc_url($settings['process_link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>> 
                            <?php echo wp_kses($settings['heading'] , $allowed_tags);?> 
                        </a> 
                        </<?php echo esc_attr($settings['tag_type']); ?>>
                <?php endif; ?> 
                <?php if(!empty($settings['description'])):?> 
                    <p> 
                        <?php echo wp_kses($settings['description'] , $allowed_tags);?> 
                    </p> 
                <?php endif; ?> 
            </div> 
        </div>

    <?php else: ?>
        <div class="process_box_outer">
            <?php if($settings['icon_type'] == 'icon_font'):?>
                <div class="icon"> 
                    <span class="<?php echo esc_attr($settings['icon_font_get']); ?>"></span> 
                    <?php if(!empty($settings['step_number'])): ?> 
                        <div class="number"> 
                            <?php echo wp_kses($settings['step_number'] , $allowed_tags) ?> 
                        </div> 
                    <?php endif; ?> 
                </div>
            <?php elseif($settings['icon_type'] == 'icon_image'): ?> 
                <div class="icon"> 
                    <?php if(!empty($settings['icon_image_get']['url'])): 
                        $icon_image_get = isset($settings['icon_image_get']['alt']) ? $settings['icon_image_get']['alt'] : ''; 
                        if(empty($icon_image_get)) { 
                            $icon_image_get = 'image'; 
                        } 
                    ?>
                    <div class="img"> 
                        <img src="<?php echo esc_url($settings['icon_image_get']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image_get); ?>" /> 
                    </div> 
                    <?php endif; ?> 
                    <?php if(!empty($settings['step_number'])): ?> 
                        <div class="number"> 
                            <?php echo wp_kses($settings['step_number'] , $allowed_tags) ?> 
                        </div> 
                    <?php endif; ?> 
                </div> 
            <?php endif; ?> 
            <div class="content_box"> 
                <?php if(!empty($settings['heading'])):?> 
                    <?php 
                        $target = $settings['process_link']['is_external'] ? ' target="_blank"' : ''; 
                        $nofollow = $settings['process_link']['nofollow'] ? ' rel="nofollow"' : ''; 
                    ?> 
               <<?php echo esc_attr($settings['tag_type']); ?> class="proctitle">
                        <a href="<?php echo esc_url($settings['process_link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>> 
                            <?php echo wp_kses($settings['heading'] , $allowed_tags) ?> 
                        </a> 
                        </<?php echo esc_attr($settings['tag_type']); ?>>
                <?php endif; ?> 
                <?php if(!empty($settings['description'])):?> 
                    <p> 
                        <?php echo wp_kses($settings['description'] , $allowed_tags) ?> 
                    </p> 
                <?php endif; ?> 
            </div>
        </div> 
    <?php endif; ?> 
</div>

 
 <?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_process_v1());