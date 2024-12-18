<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_header_v11 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-header-v11';
       }
       public function get_title()
       {
           return __('Header V11', 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['100'];
       }
       protected function register_controls(){
           $this->start_controls_section('header_content',
           [ 
               'label' => __('Header Content', 'creote-addons'),
               'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
           ]
           );
        $this->add_control(
            'header_width',
            [
              'label' => __('Header Styles', 'creote-addons'),
              'type' => Controls_Manager::SELECT,
              'options' => [
                'no-container' => __( 'No Container', 'creote-addons' ),
                'full-container' => __( 'Full With Container', 'creote-addons' ),
                'large-container' => __( 'large Container', 'creote-addons' ),
                'medium-container' => __( 'medium Container', 'creote-addons' ),
                'auto-container' => __( 'auto Container', 'creote-addons' ),
            ],
              'default' => __('large-container' , 'creote-addons'),
            ]
        );
           $this->add_control(
            'navigations',
            [
                'label' => __('Select Navigation', 'creote-addons'),
                'type' => Controls_Manager::SELECT2,
                'options' => creote_navmenu(),
            ]
        );
        $this->add_control(
            'logo_defaults',
        [
            'label' => __( 'Logo Default', 'creote-addons' ),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => CREOTE_ADDONS_URL . '/assets/images/logo-default.png',
            ],
        ] 
       );
       $this->add_control(
        'logo_width',
        [
            'label' => __( 'Logo Width', 'creote-addons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( '170px', 'creote-addons' ),
            'placeholder' => __( 'Enter logo width here in (px , rem and em )', 'creote-addons' ),
            'selectors' => [
                '{{WRAPPER}} .header .header_logo_box img' => 'width: {{VALUE}}!important; min-width: {{VALUE}}!important;',
            ],
        ]
    );
       $this->add_control(
        'margin_logo',
        [
            'label' => __( 'Margin', 'creote-addons' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .header .header_logo_box img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
      );
     $this->add_control(
        'logo_link',
        [
            'label' => __( 'Link', 'creote-addons' ),
            'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => __( 'https://your-link.com', 'creote-addons' ),
            'show_external' => true,
            'default' => [
                'url' => '',
                'is_external' => true,
                'nofollow' => true,
            ],
        ]
    );
    $this->add_responsive_control(
        'search_enable',
        [
            'label' => __('Search show / hide', 'creote-addons'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('Yes', 'creote-addons'),
            'label_off' => __('No', 'creote-addons'),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
           $this->add_responsive_control(
               'button__text_enable',
               [
                   'label' => __('Link Text show / hide', 'creote-addons'),
                   'type' => Controls_Manager::SWITCHER,
                   'label_on' => __('Yes', 'creote-addons'),
                   'label_off' => __('No', 'creote-addons'),
                   'return_value' => 'yes',
                   'default' => 'yes',
               ]
           );
           $this->add_control(
               'button_link_texts',
               [
                   'label' => __( 'Link Text', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::TEXT,
                   'default' => __( 'Get a Quote', 'creote-addons' ),
                   'placeholder' => __( 'Type your title here', 'creote-addons' ),
                   'condition' => [
                       'button__text_enable' => 'yes'
                   ],
               ]
           );
           $this->add_control(
               'button_text_links',
               [
                   'label' => __( 'Link', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::URL,
                   'placeholder' => __( 'https://your-link.com', 'creote-addons' ),
                   'show_external' => true,
                   'default' => [
                       'url' => '',
                       'is_external' => true,
                       'nofollow' => true,
                   ],
                   'condition' => [
                       'button__text_enable' => 'yes'
                   ],
               ]
           );
           $this->end_controls_section();
           $this->start_controls_section('custom_css_enabled',
           [ 
               'label' => __('Header  Css', 'creote-addons'),
               'tab' =>Controls_Manager::TAB_STYLE,
           ]
           );
           $this->add_control(
               'header_positions',
               [
                 'label' => __('Header Position', 'creote-addons'),
                 'type' => Controls_Manager::SELECT,
                 'options' => [
                   'absolute' => __( 'Position Absolute', 'creote-addons' ),
                   'relative' => __( 'Position Relative', 'creote-addons' ),
                 ],
                 'default' => __('relative' , 'creote-addons'),
                 'selectors' => [
                   '{{WRAPPER}} .header.header_default.style_nine  ' => 'position: {{VALUE}}; z-index:999; width:100%; left:0;',
                ],
               ]
           );
           $this->add_control(
               'header_bg_color',
                [
                   'label' => __('Header Bg Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                    'selectors' => [
                       '{{WRAPPER}} .header.header_default.style_nine ' => 'background: {{VALUE}}!important;',
                     ],
                ]
             );
             $this->add_control(
                'header_border',
                [
                    'label' => esc_html__( 'Header Border Width', 'creote-addons' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .header.header_default.style_nine ' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
                    ],
                ]
            );
            $this->add_control(
                'geader_border_style',
                [
                'label' => __('Header Border Style', 'creote-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'solid' => __( 'Solid', 'creote-addons' ),
                    'dotted' => __( 'Dotted', 'creote-addons' ),
                    'dashed' => __( 'Dashed', 'creote-addons' ),
                    'double' => __( 'Double', 'creote-addons' ),
                    'none' => __( 'None', 'creote-addons' ),
                ],
                'default' => __('none' , 'creote-addons'),
                'selectors' => [
                    '{{WRAPPER}} .header.header_default.style_nine ' => 'border-style: {{VALUE}}!important;',
                ],
                ]
            );
            $this->add_control(
                'header_border_color',
                 [
                    'label' => __('Header Border Color', 'creote-addons'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .header.header_default.style_nine' => 'border-color: {{VALUE}}!important;',
                    ],
                 ]
                );
                $this->add_control(
                    'ho',
                        [
                        'type' => Controls_Manager::DIVIDER, 
                        ]
                    );
                 $this->add_control(
                   'hm_colors',
                    [
                       'label' => __('Menu Color', 'creote-addons'),
                       'type' => Controls_Manager::COLOR,
                        'selectors' => [
                           '{{WRAPPER}} .header .header_content_collapse .navigation_menu .navbar_nav li a.nav-link ' => 'color: {{VALUE}};',
                           '{{WRAPPER}} .header .header_content_collapse .navigation_menu .navbar_nav li .dropdown-btn span:before , {{WRAPPER}} .header .header_content_collapse .navigation_menu .navbar_nav li .fa-angle-down ' => 'color: {{VALUE}};',
                         ],
                    ]
                 ); 
                 $this->add_control(
                   'hmacho_colors',
                    [
                       'label' => __('Menu Active / Hover Color', 'creote-addons'),
                       'type' => Controls_Manager::COLOR,
                        'selectors' => [
                           '{{WRAPPER}} .header .header_content_collapse .navigation_menu .navbar_nav li a.nav-link:hover , {{WRAPPER}} .header .header_content_collapse .navigation_menu .navbar_nav li.active a.nav-link  ' => 'color: {{VALUE}};',
                           '{{WRAPPER}} .header .header_content_collapse .navigation_menu .navbar_nav li:hover .dropdown-btn span:before , {{WRAPPER}} .header .header_content_collapse .navigation_menu .navbar_nav li.active .dropdown-btn span:before ' => 'color: {{VALUE}};',
                           '{{WRAPPER}} .header .header_content_collapse .navigation_menu .navbar_nav li:hover .dropdown-btn .fa-angle-down , {{WRAPPER}} .header .header_content_collapse .navigation_menu .navbar_nav li.active .dropdown-btn .fa-angle-down ' => 'color: {{VALUE}};',
                         ],
                    ]
                 ); 
                 $this->add_control(
                   'drobg_color',
                    [
                       'label' => __('DropDown Bg Color', 'creote-addons'),
                       'type' => Controls_Manager::COLOR,
                        'selectors' => [
                           '{{WRAPPER}}  .dropdown-menu ' => 'background: {{VALUE}}!important;',
                         ],
                    ]
                 ); 
                 $this->add_control(
                   'dm_colors',
                    [
                       'label' => __('DropDown Menu Color', 'creote-addons'),
                       'type' => Controls_Manager::COLOR,
                        'selectors' => [
                           '{{WRAPPER}}  .header .header_content_collapse .navigation_menu .navbar_nav li .dropdown-menu li a.nav-link  ,
                            {{WRAPPER}} .header .header_content_collapse .navigation_menu .navbar_nav li .dropdown-menu li .dropdown-btn span:before ,
                            {{WRAPPER}} .header .header_content_collapse .navigation_menu .navbar_nav li .dropdown-menu li .dropdown-btn .fa-angle-down   ' => 'color: {{VALUE}}!important;',
                         ],
                    ]
                 ); 
                 $this->add_control(
                   'dmh_colors',
                    [
                       'label' => __('DropDown Menu Hover Color', 'creote-addons'),
                       'type' => Controls_Manager::COLOR,
                        'selectors' => [
                           '{{WRAPPER}}  .header .header_content_collapse .navigation_menu .navbar_nav li .dropdown-menu li a.nav-link:hover , {{WRAPPER}} .header .header_content_collapse .navigation_menu .navbar_nav li .dropdown-menu li:hover .dropdown-btn span:before 
                           , {{WRAPPER}} .header .header_content_collapse .navigation_menu .navbar_nav li .dropdown-menu li:hover .dropdown-btn .fa-angle-down  ' => 'color: {{VALUE}}!important;',
                         ],
                    ]
                 ); 
                 $this->add_control(
                    'htp',
                        [
                        'type' => Controls_Manager::DIVIDER, 
                        ]
                    );
           $this->add_control(
               'search_color',
                [
                   'label' => __('Search Icon Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .header.header_default.style_nine  .header_right_content   .search-toggler i  ' => 'color: {{VALUE}};',
                   ],
                ]
           );
           $this->add_control(
               'button_color',
                [
                   'label' => __('Button Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .header.header_default.style_nine .header_right_content .theme-btn.one ' => 'color: {{VALUE}};',
                   ],
                ]
           );
           $this->add_control(
            'button_border_color',
             [
                'label' => __('Button Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header.header_default.style_nine .header_right_content .theme-btn.one ' => 'border-color: {{VALUE}};',
                ],
             ]
        );
           $this->add_control(
               'button_bg_color',
                [
                   'label' => __('Button bg Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .header.header_default.style_nine  .header_right_content .theme-btn.one ' => 'background: {{VALUE}};',
                   ],
                ]
           );
           $this->add_control(
            'button_color_hover',
             [
                'label' => __('Button Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header.header_default.style_nine .header_right_content ul .theme-btn.one:hover ' => 'color: {{VALUE}};',
                ],
             ]
        );
        $this->add_control(
         'button_border_color_hover',
          [
             'label' => __('Button Hover Border Color', 'creote-addons'),
             'type' => Controls_Manager::COLOR,
             'selectors' => [
                 '{{WRAPPER}} .header.header_default.style_nine .header_right_content .theme-btn.one:hover ' => 'border-color: {{VALUE}};',
             ],
          ]
     );
        $this->add_control(
            'button_bg_color_hover',
             [
                'label' => __('Button Hover bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header.header_default.style_nine  .header_right_content .theme-btn.one:hover ' => 'background: {{VALUE}};',
                ],
             ]
        );
           $this->end_controls_section();
}
       protected function render()
       {
           $settings = $this->get_settings_for_display();
           $allowed_tags = wp_kses_allowed_html('post');
           $url = '';
           $logo_target = $settings['logo_link']['is_external'] ? ' target="_blank"' : '';
           $logo_nofollow = $settings['logo_link']['nofollow'] ? ' rel="nofollow"' : ''; 
              if(empty($settings['logo_link']['url'])):
                  $url = home_url();
              elseif(!empty($settings['logo_link']['url'])):
                  $url = $settings['logo_link']['url'];
              endif;
           ?>
<header class="header header_default style_nine pack_two_style_one"> <div class="<?php echo esc_attr($settings['header_width']); ?>"> <div class="d-flex align-items-center"> <div class="header_logo_box"> <a href="<?php echo esc_url($url); ?>" class="logo navbar-brand" <?php echo esc_attr($logo_target); ?> <?php echo esc_attr($logo_nofollow); ?>> <img src="<?php echo esc_url($settings['logo_defaults']['url']); ?>" alt="<?php echo esc_html(get_bloginfo( 'name' )); ?>" class="logo_defaults"> </a> </div> <div class="menu_column"> <div class="navbar_togglers hamburger_menu"> <span class="line"></span> <span class="line"></span> <span class="line"></span> </div> <div class="header_content_collapse"> <div class="header_menu_box"> <div class="navigation_menu text-left"> <?php if(!empty($settings['navigations'])): wp_nav_menu(array( 'menu' => $settings['navigations'], 'container' => false, 'menu_class' => 'navbar_nav', 'menu_id' => 'myNavbar', 'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback', 'walker' => new \WP_Bootstrap_Navwalker() ) ); endif; ?> </div> </div> </div> </div> <?php if($settings['search_enable'] == 'yes' || $settings['button__text_enable'] == 'yes'): ?> <div class="right_column"> <div class="header_right_content d-flex align-items-center"> <?php if($settings['search_enable'] == 'yes'): ?> <button type="button" class="search-toggler"><i class="icon-search"></i></button> <?php endif;?> <?php if($settings['button__text_enable'] == 'yes'): ?> <?php $target_four = $settings['button_text_links']['is_external'] ? ' target="_blank"' : ''; $nofollow_four = $settings['button_text_links']['nofollow'] ? ' rel="nofollow"' : ''; ?> <a href="<?php echo esc_url($settings['button_text_links']['url']); ?>" <?php echo esc_attr($target_four); ?> <?php echo esc_attr($nofollow_four); ?> class="theme-btn one"> <?php echo esc_attr($settings['button_link_texts']); ?> </a> <?php endif;?> </div> </div> <?php endif;?> </div> </div></header>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_header_v11());