<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_team_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-team-v1';
       }
       public function get_title()
       {
           return __('Team V1 ' , 'creote-addons');
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
               'settings',
               [
                   'label' => __('Team Content', 'creote-addons')
               ]
           );
           $this->add_control(
               'team_styles',
               [
                   'label' => __('Team Styles', 'creote-addons'),
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
         $this->add_control(
             'member_image',
             [
                 'label' => __('member Image', 'creote-addons'),
                 'type' => Controls_Manager::MEDIA,
                 'default' => [
                   'url' => \Elementor\Utils::get_placeholder_image_src(),
                  ],
             ]
         );
       $this->add_control(
           'member_name',
           [
             'label'       => esc_html__( 'Member name', 'creote-addons' ),
             'type'        => Controls_Manager::TEXT,
             'default' =>  esc_html__( 'Amelia Margaret' , 'creote-addons'),
           ]
       );
       $this->add_control(
           'member_designation',
           [
           'label'       => esc_html__( 'Member Designation', 'creote-addons' ),
           'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'Director' , 'creote-addons'),
           ]
       );
       $this->add_control(
           'about_member',
           [
           'label'       => esc_html__( 'About Member', 'creote-addons' ),
           'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'The HR Manger of Creote, he is very intelligent and smart.' , 'creote-addons'),
           'condition' => [
               'team_styles' => 'style_two',
             ],
           ]
       );
       $this->add_control(
           'about_member_two',
           [
           'label'       => esc_html__( 'About Member', 'creote-addons' ),
           'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'The HR Manger of Creote, he is very intelligent and smart.' , 'creote-addons'),
           'condition' => [
               'team_styles' => ['style_three' , 'style_five'],
             ],
           ]
       );
       $this->add_control(
           'button_text_s_one',
           [
           'label'       => esc_html__( 'Button Text', 'creote-addons' ),
           'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'View Profile' , 'creote-addons'),
           'condition' => [
               'team_styles' => 'style_one',
             ],
           ]
       );
       $this->add_control(
           'button_text_s_two',
           [
           'label'       => esc_html__( 'Button Text', 'creote-addons' ),
           'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'View Profile' , 'creote-addons'),
           'condition' => [
               'team_styles' => 'style_two',
             ],
           ]
       );
       $this->add_control(
           'button_link',
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
       $this->add_control(
         'media_enable',
        [
           'label' => __('Media Enable', 'creote-addons'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('Yes', 'creote-addons'),
            'label_off' => __('No', 'creote-addons'),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
     );
       $repeater = new Repeater();
       $repeater->add_control(
           'media_text',
           [
             'label'       => esc_html__( 'Media name', 'creote-addons' ),
             'type'        => Controls_Manager::TEXT,
             'default' =>  esc_html__( 'fa fa-facebook' , 'creote-addons'),
           ]
       );
       $repeater->add_control(
         'media_link',
         [
         'label' => __('Media Link', 'creote-addons'),
         'type' => Controls_Manager::URL,
         'placeholder' => __('https://your-link.com', 'creote-addons'),
         'show_external' => true,
         'default' => [
             'url' => '#',
             'is_external' => false,
             'nofollow' => false,
         ],
         ]
      );  
       $this->add_control(
           'social_media_repeater',
           [
               'label' => __('Social media Repeater', 'creote-addons'),
               'type' => Controls_Manager::REPEATER,
               'fields' => $repeater->get_controls(),
               'default' => [
                   [
                     'media_text' => __('fab fa-facebook', 'creote-addons'),
                     'media_link' =>  __('#', 'creote-addons'),
                   ],
                   [
                     'media_text' => __('fab fa-twitter', 'creote-addons'),
                     'media_link' =>  __('#', 'creote-addons'),
                    ],
                    [
                     'media_text' => __('fab fa-skype', 'creote-addons'),
                     'media_link' =>  __('#', 'creote-addons'),
                    ],
                    [
                       'media_text' => __('fab fa-instagram', 'creote-addons'),
                       'media_link' =>  __('#', 'creote-addons'),
                      ]
               ],
               'title_field' => '{{{ media_text }}}',
               'condition' => [
                  'media_enable' => 'yes',
                ],
           ]
         ); 
             $this->end_controls_section();
             $this->start_controls_section('style_css',
             [ 
                 'label' => __('Style', 'creote-addons'),
                 'tab' =>Controls_Manager::TAB_STYLE,
          ]);
           $this->add_control(
             'ovlocor', 
              [
                 'label' => __('Overlay  Color', 'creote-addons'),
                 'type' => Controls_Manager::COLOR,
                 'selectors' => [
                     '{{WRAPPER}} .team_box.style_one .team_box_outer .member_image::before ' => 'background:linear-gradient(to top, {{VALUE}} 6%, rgba(0, 0, 0, 0) 70%);',
                     '{{WRAPPER}} .team_box.style_two .team_box_outer .image_box::before , {{WRAPPER}} .team_box.style_three .team_box_outer .image_box::before , {{WRAPPER}} .team_box.type_one .image_box::before ' => 'background-color:{{VALUE}};',
                     '{{WRAPPER}} .team_box.style_four .team_box_outer .image_box::after ' => 'background:linear-gradient(0deg, {{VALUE}} 40%, rgba(0, 0, 0, 0.09) 150%);',
                 ],
              ]
            );
            $this->add_control(
               'bgcolor',
                [
                   'label' => __('Background  Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .team_box.style_two .team_box_outer , {{WRAPPER}} .team_box.type_one ' => 'background:{{VALUE}};',
                   ],
                   'condition' => [
                     'team_styles' => ['style_two' , 'style_five'],
                   ],
                ]
            );
            $this->add_control(
               'bgocolor',
                [
                   'label' => __('Background OVerlay  Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .team_box.style_two .team_box_outer .content_box::before ' => 'background:{{VALUE}};',
                   ],
                   'condition' => [
                     'team_styles' => 'style_two',
                   ],
                ]
            );
            $this->add_control(
                'ttcolor',
                 [
                    'label' => __('Title Color', 'creote-addons'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .team_box.type_one .content_box .teamtitle a , {{WRAPPER}} .team_box.style_one .team_box_outer .about_member .authour_details .job_details , {{WRAPPER}} .team_box.style_four .team_box_outer .content_box .teamtitle a ,
                        {{WRAPPER}} .team_box.style_two .team_box_outer .content_box .teamtitle a , {{WRAPPER}} .team_box.style_three .team_box_outer .content_box .teamtitle a ' => 'color: {{VALUE}};',
                    ],
                 ]
            );
            $this->add_control(
              'tdecolor',
               [
                  'label' => __('Designation  Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                  'selectors' => [
                      '{{WRAPPER}} .team_box.type_one .content_box .job_details , {{WRAPPER}} .team_box.style_one .team_box_outer .about_member .authour_details span ,
                      {{WRAPPER}} .team_box.style_two .team_box_outer .content_box p.job_details ,  {{WRAPPER}}
                      .team_box.style_three .team_box_outer .content_box .job_details , {{WRAPPER}} .team_box.style_four .team_box_outer .content_box .job_details ' => 'color: {{VALUE}};',
                  ],
               ]
          );
          $this->add_control(
            'tddecolor',
             [
                'label' => __('Description  Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_box.style_two .team_box_outer .content_box p , {{WRAPPER}}
                    .team_box.style_three .team_box_outer .content_box p , {{WRAPPER}} .team_box.type_one .content_box p ' => 'color: {{VALUE}};',
                ],
                'condition' => [
                  'team_styles' => ['style_two' , 'style_three' , 'style_five'],
                ],
             ]
        );
        $this->add_control(
         'vrocolor',
          [
             'label' => __('Border  Color', 'creote-addons'),
             'type' => Controls_Manager::COLOR,
             'selectors' => [
                 '{{WRAPPER}} .team_box.style_two .team_box_outer .content_box p.job_details , {{WRAPPER}} .team_box.type_one .content_box .job_details ' => 'border-color: {{VALUE}};',
             ],
             'condition' => [
               'team_styles' => ['style_two' , 'style_five'],
             ],
          ]
      );
          $this->add_control(
              'srcolor',
               [
                  'label' => __('Share   Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                  'selectors' => [
                      '{{WRAPPER}} .team_box.type_one .image_box .overlay ul li a , {{WRAPPER}} .team_box.style_four .team_box_outer .content_box .share_links ul li a , {{WRAPPER}} .team_box.style_one .team_box_outer .about_member .share_media ul.first .text , {{WRAPPER}} .team_box.style_three .team_box_outer .image_box .share_links a.shar_icon ,
                      {{WRAPPER}} .team_box.style_two .team_box_outer .image_box .overlay ul li a ,   {{WRAPPER}} .team_box.style_three .team_box_outer .image_box .share_links ul li a ' => 'color: {{VALUE}};',
                      '{{WRAPPER}} .team_box.style_one .team_box_outer .about_member .share_media ul li i ' => 'background: {{VALUE}};',
                      '{{WRAPPER}} .team_box.style_one .team_box_outer .about_member .share_media ul .shar_alt ' => ' border-color:{{VALUE}};',
                      '{{WRAPPER}} .team_box.style_one .team_box_outer .about_member .share_media ul .shar_alt i ' => 'background: unset!important; color:{{VALUE}}!important',
                  ],
               ]
          );
          $this->add_control(
            'srbgcolor',
             [
                'label' => __('Share Bg  Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_box.style_one .team_box_outer .about_member .share_media ul li i  ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team_box.style_one .team_box_outer .about_member .share_media ul , {{WRAPPER}} .team_box.style_two .team_box_outer .image_box .overlay ul li a ,
                    {{WRAPPER}} .team_box.style_three .team_box_outer .image_box .share_links a.shar_icon ,
                    {{WRAPPER}} .team_box.type_one .image_box .overlay ul li a  , {{WRAPPER}} .team_box.style_three .team_box_outer .image_box .share_links ul ' => 'background: {{VALUE}};',
                ],
                'condition' => [
                  'team_styles' => ['style_one' , 'style_two' , 'style_three' , 'style_five'],
                ],
             ]
         );
         $this->add_control(
            'srbrcolor',
             [
                'label' => __('Share Border  Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_box.style_four .team_box_outer .content_box .share_links ul li a ' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                  'team_styles' => ['style_four'],
                ],
             ]
         );
          $this->add_control(
              'btncolor',
               [
                  'label' => __('Button Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                  'selectors' => [
                      '{{WRAPPER}} .team_box.style_two .team_box_outer .image_box .overlay .read_m ' => 'color: {{VALUE}};',
                  ],
                  'condition' => [
                     'team_styles' => ['style_one' , 'style_two'],
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
                  'condition' => [
                     'team_styles' => 'style_one',
                   ],
               ]
          );
          $this->add_control(
            'hocolor',
             [
                'label' => __('Hover Content  Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_box.style_two .team_box_outer:hover .content_box .teamtitle a , 
                    {{WRAPPER}} .team_box.style_two .team_box_outer:hover .content_box p.job_details ,
                    {{WRAPPER}} .team_box.style_two .team_box_outer:hover .content_box p ' => 'color:{{VALUE}};',
                ],
                'condition' => [
                  'team_styles' => 'style_two',
                ],
             ]
         );
         $this->add_control(
            'fobrcolo',
             [
                'label' => __('Hover Content Border  Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_box.style_two .team_box_outer:hover .content_box p.job_details   ' => 'border-color:{{VALUE}};',
                ],
                'condition' => [
                  'team_styles' => 'style_two',
                ],
             ]
         );
        $this->end_controls_section();
       }
protected function render(){
   $settings = $this->get_settings_for_display();
   $allowed_tags = wp_kses_allowed_html('post');
   $target = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
   $nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : ''; 
   $member_image = isset($settings['member_image']['alt']) ? $settings['member_image']['alt'] : '';
   if(!empty($member_image)) {
     $member_image = $member_image;
    }else{
      $member_image = 'image';
   }
   ?>
 
 <div class="team_box <?php echo esc_attr($settings['team_styles']); ?>">
    <?php if ($settings['team_styles'] == 'style_two'): ?>
        <div class="team_box_outer">
            <div class="image_box">
                <?php if (!empty($settings['member_image']['url'])): ?>
                    <img src="<?php echo esc_attr($settings['member_image']['url']); ?>" alt="<?php echo esc_attr($member_image); ?>" />
                <?php endif; ?>
                <div class="overlay">
                    <?php if (!empty($settings['button_text_s_two'])): ?>
                        <a href="<?php echo esc_url($settings['button_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="read_m">
                            <?php echo esc_html($settings['button_text_s_two']); ?>
                            <i class="icon-right-arrow"></i>
                        </a>
                    <?php endif; ?>
                    <?php if ($settings['media_enable'] == 'yes'): ?>
                        <ul>
                            <?php foreach ($settings['social_media_repeater'] as $social_media_repeater): 
                                $media_target2 = $social_media_repeater['media_link']['is_external'] ? ' target="_blank"' : ''; 
                                $media_nofollow2 = $social_media_repeater['media_link']['nofollow'] ? ' rel="nofollow"' : ''; 
                            ?>
                                <li>
                                    <a href="<?php echo esc_url($social_media_repeater['media_link']['url']); ?>" <?php echo esc_attr($media_target2); ?> <?php echo esc_attr($media_nofollow2); ?>>
                                        <i class="<?php echo esc_attr($social_media_repeater['media_text']); ?>"></i>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="content_box">
                <?php if (!empty($settings['member_name'])): ?>
                  <div class="teamtitle">
                        <a href="<?php echo esc_url($settings['button_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
                            <?php echo esc_attr($settings['member_name']); ?>
                        </a>
                </div>
                <?php endif; ?>
                <?php if (!empty($settings['member_designation'])): ?>
                    <p class="job_details"><?php echo esc_attr($settings['member_designation']); ?></p>
                <?php endif; ?>
                <?php if (!empty($settings['about_member'])): ?>
                    <p><?php echo wp_kses($settings['about_member'], $allowed_tags); ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php elseif ($settings['team_styles'] == 'style_three'): ?>
        <div class="team_box_outer">
            <div class="image_box">
                <?php if (!empty($settings['member_image']['url'])): ?>
                    <img src="<?php echo esc_attr($settings['member_image']['url']); ?>" alt="<?php echo esc_attr($member_image); ?>" />
                <?php endif; ?>
                <?php if ($settings['media_enable'] == 'yes'): ?>
                    <div class="share_links">
                        <a href="#" class="shar_icon"><span class="fa fa-share-alt"></span></a>
                        <ul class="clearfix">
                            <?php foreach ($settings['social_media_repeater'] as $social_media_repeater): 
                                $media_target3 = $social_media_repeater['media_link']['is_external'] ? ' target="_blank"' : ''; 
                                $media_nofollow3 = $social_media_repeater['media_link']['nofollow'] ? ' rel="nofollow"' : ''; 
                            ?>
                                <li>
                                    <a href="<?php echo esc_url($social_media_repeater['media_link']['url']); ?>" <?php echo esc_attr($media_target3); ?> <?php echo esc_attr($media_nofollow3); ?>>
                                        <i class="<?php echo esc_attr($social_media_repeater['media_text']); ?>"></i>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <div class="content_box">
                <?php if (!empty($settings['member_name'])): ?>
                    <div class="teamtitle">
                        <a href="<?php echo esc_url($settings['button_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
                            <?php echo esc_attr($settings['member_name']); ?>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if (!empty($settings['member_designation'])): ?>
                    <div class="job_details"><?php echo esc_attr($settings['member_designation']); ?></div>
                <?php endif; ?>
                <?php if (!empty($settings['about_member_two'])): ?>
                    <p><?php echo wp_kses($settings['about_member_two'], $allowed_tags); ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php elseif ($settings['team_styles'] == 'style_four'): ?>
        <div class="team_box_outer">
            <div class="image_box">
                <?php if (!empty($settings['member_image']['url'])): ?>
                    <img src="<?php echo esc_attr($settings['member_image']['url']); ?>" alt="<?php echo esc_attr($member_image); ?>" />
                <?php endif; ?>
            </div>
            <div class="content_box">
                <?php if ($settings['media_enable'] == 'yes'): ?>
                    <div class="share_links">
                        <ul class="clearfix">
                            <?php foreach ($settings['social_media_repeater'] as $social_media_repeater): 
                                $media_target4 = $social_media_repeater['media_link']['is_external'] ? ' target="_blank"' : ''; 
                                $media_nofollow4 = $social_media_repeater['media_link']['nofollow'] ? ' rel="nofollow"' : ''; 
                            ?>
                                <li>
                                    <a href="<?php echo esc_url($social_media_repeater['media_link']['url']); ?>" <?php echo esc_attr($media_target4); ?> <?php echo esc_attr($media_nofollow4); ?>>
                                        <i class="<?php echo esc_attr($social_media_repeater['media_text']); ?>"></i>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if (!empty($settings['member_name'])): ?>
                  <div class="teamtitle">
                        <a href="<?php echo esc_url($settings['button_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
                            <?php echo esc_attr($settings['member_name']); ?>
                        </a>
                </div>
                <?php endif; ?>
                <?php if (!empty($settings['member_designation'])): ?>
                    <div class="job_details"><?php echo esc_attr($settings['member_designation']); ?></div>
                <?php endif; ?>
            </div>
        </div>
    <?php elseif ($settings['team_styles'] == 'style_five'): ?>
        <div class="team_box type_one">
            <div class="content_box">
                <?php if (!empty($settings['member_name'])): ?>
                  <div class="teamtitle">
                        <a href="<?php echo esc_url($settings['button_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
                            <?php echo esc_attr($settings['member_name']); ?>
                        </a>
                </div>
                <?php endif; ?>
                <?php if (!empty($settings['member_designation'])): ?>
                    <div class="job_details"><?php echo esc_attr($settings['member_designation']); ?></div>
                <?php endif; ?>
                <?php if (!empty($settings['about_member_two'])): ?>
                    <p><?php echo esc_attr($settings['about_member_two']); ?></p>
                <?php endif; ?>
            </div>
            <?php if (!empty($settings['member_image'])): ?>
                <div class="image_box">
                    <img src="<?php echo esc_url($settings['member_image']['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($member_image); ?>">
                    <div class="overlay">
                        <?php if ($settings['media_enable'] == 'yes'): ?>
                            <ul class="clearfix">
                                <?php foreach ($settings['social_media_repeater'] as $social_media_repeater): 
                                    $media_target5 = $social_media_repeater['media_link']['is_external'] ? ' target="_blank"' : ''; 
                                    $media_nofollow5 = $social_media_repeater['media_link']['nofollow'] ? ' rel="nofollow"' : ''; 
                                ?>
                                    <li>
                                        <a href="<?php echo esc_url($social_media_repeater['media_link']['url']); ?>" <?php echo esc_attr($media_target5); ?> <?php echo esc_attr($media_nofollow5); ?>>
                                            <i class="<?php echo esc_attr($social_media_repeater['media_text']); ?>"></i>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <div class="team_box_outer">
            <?php if (!empty($settings['member_image']['url'])): ?>
                <div class="member_image">
                    <img src="<?php echo esc_attr($settings['member_image']['url']); ?>" alt="<?php echo esc_attr($member_image); ?>" />
                </div>
            <?php endif; ?>
            <div class="about_member">
                <?php if ($settings['media_enable'] == 'yes'): ?>
                    <div class="share_media">
                        <ul class="first">
                            <li class="text"><?php echo esc_html__('Share', 'creote-addons'); ?></li>
                            <li><i class="fa fa-share-alt"></i></li>
                        </ul>
                        <ul>
                            <li class="shar_alt"><i class="fa fa-share-alt"></i></li>
                            <?php foreach ($settings['social_media_repeater'] as $social_media_repeater): 
                                $media_target1 = $social_media_repeater['media_link']['is_external'] ? ' target="_blank"' : ''; 
                                $media_nofollow1 = $social_media_repeater['media_link']['nofollow'] ? ' rel="nofollow"' : ''; 
                            ?>
                                <li>
                                    <a href="<?php echo esc_url($social_media_repeater['media_link']['url']); ?>" <?php echo esc_attr($media_target1); ?> <?php echo esc_attr($media_nofollow1); ?>>
                                        <i class="<?php echo esc_attr($social_media_repeater['media_text']); ?>"></i>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="authour_details">
                    <?php if (!empty($settings['member_designation'])): ?>
                        <span><?php echo esc_attr($settings['member_designation']); ?></span>
                    <?php endif; ?>
                    <?php if (!empty($settings['member_name'])): ?>
                        <div class="job_details"><?php echo esc_attr($settings['member_name']); ?></div>
                    <?php endif; ?>
                    <?php if (!empty($settings['button_text_s_one'])): ?>
                        <div class="button_view">
                            <a href="<?php echo esc_url($settings['button_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn one">
                                <?php echo esc_html($settings['button_text_s_one']); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

 
 <?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_team_v1());