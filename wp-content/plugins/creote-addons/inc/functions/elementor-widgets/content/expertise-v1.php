<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_expertise_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-expertise-v1';
       }
       public function get_title()
       {
           return __('Expertise V1' , 'creote-addons');
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
               'expertise_box_content',
               [
                   'label' => __('Expertise Title  / Video', 'creote-addons')
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
               'title_enable',
              [
                 'label' => __('Title Enable', 'creote-addons'),
                  'type' => Controls_Manager::SWITCHER,
                  'label_on' => __('Yes', 'creote-addons'),
                  'label_off' => __('No', 'creote-addons'),
                  'return_value' => 'yes',
                  'default' => 'yes',
              ]
           );
        $this->add_control(
   		'heading',
   		[
   		'label'       => esc_html__( 'Heading', 'creote-addons' ),
   		'type'        => Controls_Manager::TEXTAREA,
           'default' =>  esc_html__( 'Recruitment Process' , 'creote-addons'),
           'condition' => [
               'title_enable' => 'yes',
           ],
       ]);
       $this->add_control(
   		'description',
   		[
   		'label'       => esc_html__( 'Description', 'creote-addons' ),
   		'type'        => Controls_Manager::TEXTAREA,
           'default' =>  esc_html__( 'These cases are perfectly simple and easy to distinguish.' , 'creote-addons'),
           'condition' => [
               'title_enable' => 'yes',
           ],
       ]);
       $this->add_control(
   		'button_text',
   		[
   		'label'       => esc_html__( 'Button Text', 'creote-addons' ),
   		'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'Read more' , 'creote-addons'),
           'condition' => [
             'title_enable' => 'yes',
           ],
       ]);
       $this->add_control(
           'button_link',
       [
           'label' => __('Link', 'creote-addons'),
           'type' => Controls_Manager::URL,
           'placeholder' => __('https://your-link.com', 'creote-addons'),
           'show_external' => true,
           'default' => [
               'url' => '#',
               'is_external' => false,
               'nofollow' => false,
           ],
           'condition' => [
               'title_enable' => 'yes',
             ],
       ]);  
        $this->end_controls_section();
        $this->start_controls_section(
            'expertise_repeater',
            [
                'label' => __('Expertise Content', 'creote-addons')
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
   		'step_no',
   		[
   		'label'       => esc_html__( 'Step Number', 'creote-addons' ),
   		'type'        => Controls_Manager::TEXTAREA,
           'default' =>  esc_html__( '01' , 'creote-addons'),
       ]);
       $repeater->add_control(
   		'title',
   		[
   		'label'       => esc_html__( 'Title', 'creote-addons' ),
   		'type'        => Controls_Manager::TEXTAREA,
           'default' =>  esc_html__( 'Payroll Management' , 'creote-addons'),
       ]);
       $repeater->add_control(
           'link',
       [
           'label' => __('Link', 'creote-addons'),
           'type' => Controls_Manager::URL,
           'placeholder' => __('https://your-link.com', 'creote-addons'),
           'show_external' => true,
           'default' => [
               'url' => '#',
               'is_external' => false,
               'nofollow' => false,
           ],
       ]);  
       $repeater->add_control(
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
         $repeater->add_responsive_control(
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
       $this->add_control(
           'expertise_repeater_g',
           [
               'label' => __('Expertise Repeater', 'creote-addons'),
               'type' => Controls_Manager::REPEATER,
               'fields' => $repeater->get_controls(),
               'default' => [
                   [
                     'step_no' => __('01.', 'creote-addons'),
                     'title' =>  __('Payroll Management', 'creote-addons'),
                   ],
                   [
                     'step_no' => __('02.', 'creote-addons'),
                     'title' =>  __(' Employee Compensation', 'creote-addons'),
                    ],
                    [
                     'step_no' => __('03.', 'creote-addons'),
                     'title' =>  __('Benefits Management', 'creote-addons'),
                    ]
               ],
               'title_field' => '{{{ title }}}',
           ]
         ); 
        $this->end_controls_section(); 
        $this->start_controls_section('style_css',
           [ 
               'label' => __('Style', 'creote-addons'),
               'tab' =>Controls_Manager::TAB_STYLE,
        ]);
        $this->add_control(
            'background_image',
            [
               'label' => __('Background Image', 'creote-addons'),
               'type' => Controls_Manager::MEDIA,
               'default' => [
                   'url' => \Elementor\Utils::get_placeholder_image_src(),
               ],
            ]
         ); 
         $this->add_control(
           'ovlocor',
            [
               'label' => __('Overlay  Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .area_of_expertise::before ' => 'background:linear-gradient(300deg, {{VALUE}} 40%, rgba(0, 0, 0, 0.09) 100%)',
               ],
            ]
          ); 
          $this->add_control(
              'icolor',
               [
                  'label' => __('Icon Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                  'selectors' => [
                      '{{WRAPPER}} .area_of_expertise .title_and_video .video_box a ' => 'color: {{VALUE}};',
                  ],
               ]
          );
          $this->add_control(
            'ibcolor',
             [
                'label' => __('Icon Bg  Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .area_of_expertise .title_and_video .video_box a ' => 'background: {{VALUE}};',
                ],
             ]
        );
        $this->add_control(
            'rpcolor',
             [
                'label' => __('Ripple Bg  Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video_box:before , {{WRAPPER}} .video_box:after ' => 'background: {{VALUE}};',
                ],
             ]
        );
          $this->add_control(
              'tcolor',
               [
                  'label' => __('Title Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                  'selectors' => [
                      '{{WRAPPER}} .area_of_expertise .title_and_video .title_sections h2 ' => 'color: {{VALUE}};',
                  ],
               ]
          );
        $this->add_control(
            'dcolor',
             [
                'label' => __('Description Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title_all_box .title_sections p ' => 'color: {{VALUE}};',
                ],
             ]
        );
        $this->add_control(
            'btncolor',
             [
                'label' => __('Button Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btn.one ' => 'color: {{VALUE}};',
                ],
             ]
        );
        $this->add_control(
            'btnbgcolor',
             [
                'label' => __('Button Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btn.one ' => 'background: {{VALUE}};border-color: {{VALUE}};',
                ],
             ]
        );
        $this->add_control(
            'hbtncolor',
             [
                'label' => __('Button Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btn.one:hover ' => 'color: {{VALUE}};',
                ],
             ]
        );
        $this->add_control(
            'hbtnbgcolor',
             [
                'label' => __('Button Hover Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btn.one:hover ' => 'background: {{VALUE}};border-color: {{VALUE}};',
                ],
             ]
        );
        $this->add_control(
            'ncolor',
             [
                'label' => __('Number Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .area_of_expertise .expertise_box .step_number h1 ' => 'color: {{VALUE}};',
                ],
             ]
        );
        $this->add_control(
            'dtcolor',
             [
                'label' => __('Title Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .area_of_expertise .expertise_box .title a ' => 'color: {{VALUE}};',
                ],
             ]
        );
        $this->add_control(
            'brcolor',
             [
                'label' => __('Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .area_of_expertise .expertise_box::before ' => 'background: {{VALUE}};',
                ],
             ]
        );
        $this->add_control(
            'bgrcolor',
             [
                'label' => __('Border Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .area_of_expertise .expertise_box:hover::before ' => 'background: {{VALUE}};',
                ],
             ]
        );
        $this->add_control(
            'bgtrcolor',
             [
                'label' => __('Numner Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .area_of_expertise .expertise_box:hover .step_number h1 ' => 'color: {{VALUE}};',
                ],
             ]
        );
        $this->add_control(
            'bgtsrcolor',
             [
                'label' => __('Title Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .area_of_expertise .expertise_box:hover .title a ' => 'color: {{VALUE}};',
                ],
             ]
        );
        $this->add_control(
            'lcolor',
             [
                'label' => __('LineColor', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .area_of_expertise .expertise_box:first-child:after, .area_of_expertise .expertise_box:nth-child(2):after ' => 'background: {{VALUE}};',
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
<div class="area_of_expertise"> <?php if(!empty($settings['background_image']['url'])): ?> <img src="<?php echo esc_url($settings['background_image']['url']); ?>" class="cover-parallax" alt="image" /> <?php endif; ?> <div class="title_and_video"> <div class="auto-container"> <div class="row"> <?php if($settings['video_link_enable'] == true): ?> <div class="col-lg-4"> <div class="video_box text-center"> <a href="<?php echo esc_attr($settings['video_link']); ?>" class="lightbox-image"><i class="icon-play"></i></a> </div> </div> <?php endif; ?> <div class="col-lg-2"></div> <div class="col-lg-6"> <div class="title_all_box style_one text-end"> <div class="title_sections"> <?php if(!empty($settings['heading'])):?> <h2> <?php echo wp_kses($settings['heading'] , $allowed_tags) ?></h2> <?php endif; ?> <?php if(!empty($settings['description'])):?> <p> <?php echo wp_kses($settings['description'] , $allowed_tags) ?></p> <?php endif; ?> </div> <?php if(!empty($settings['button_text'])): ?> <div class="theme_btn"> <?php $target = $settings['button_link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <a href="<?php echo esc_url($settings['button_link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn one"> <?php echo esc_html($settings['button_text']);?> </a> </div> <?php endif; ?> </div> </div> </div> </div> </div> <div class="expertise"> <div class="auto-container"> <div class="row"> <?php foreach($settings['expertise_repeater_g'] as $expertise_repeater):?> <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 expertise_box"> <?php if(!empty($expertise_repeater['step_no'])): ?> <div class="step_number"> <div><?php echo esc_attr($expertise_repeater['step_no']); ?></div> </div> <?php endif; ?> <?php if(!empty($expertise_repeater['title'])): ?> <div class="title"> <?php $target_exp = $expertise_repeater['link']['is_external'] ? ' target="_blank"' : ''; $nofollow_exp = $expertise_repeater['link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <a href="<?php echo esc_url($expertise_repeater['link']['url']);?>" <?php echo esc_attr($target_exp); ?> <?php echo esc_attr($nofollow_exp); ?>> <?php echo esc_html($expertise_repeater['title']);?> </a> </div> <?php endif; ?> </div> <?php endforeach;?> </div> </div> </div></div>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_expertise_v1());