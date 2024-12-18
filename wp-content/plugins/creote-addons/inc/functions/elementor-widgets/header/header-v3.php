<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_header_v3 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-header-v3';
       }
       public function get_title()
       {
           return __('Header V4', 'creote-addons');
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
           $this->start_controls_section('headers_settings_v3',
           [ 
               'label' => __('Header Settings', 'creote-addons'),
               'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
           ]
           );
           $this->add_control(
            'logo_default',
        [
            'label' => __( 'Logo Default', 'creote-addons' ),
            'type' => Controls_Manager::MEDIA,
            'default' => [
               'url' => CREOTE_ADDONS_URL . '/assets/images/logo-default.png',
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
    $this->add_control(
        'logo_width',
        [
            'label' => __( 'Logo Width', 'creote-addons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( '170px', 'creote-addons' ),
            'placeholder' => __( 'Enter logo width here in (px , rem and em )', 'creote-addons' ),
            'selectors' => [
                '{{WRAPPER}} .header.style_three .header_mid .mid_logo_icon img' => 'width: {{VALUE}}!important; min-width: {{VALUE}}!important;',
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
                '{{WRAPPER}} .header.style_three .header_mid .mid_logo_icon img ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
      );
      $this->add_control(
         'colo',
             [
             'type' => Controls_Manager::DIVIDER, 
             ]
         );
           $this->add_control(
               'mid_bar_enable',
               [
                   'label' => __('Top Bar show / hide', 'creote-addons'),
                   'type' => Controls_Manager::SWITCHER,
                   'label_on' => __('Yes', 'creote-addons'),
                   'label_off' => __('No', 'creote-addons'),
                   'return_value' => 'yes',
                   'default' => 'no',
               ]
           );
           $this->end_controls_section();
           $this->start_controls_section('mid_content',
           [ 
               'label' => __('Top Content', 'creote-addons'),
               'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
               'condition' => [
                   'mid_bar_enable' => 'yes'
               ]
           ]
           );
           $repeater = new Repeater();
           $repeater->add_control(
               'icon_fonts',
               [
                   'label' => __('Icon', 'creote-addons'),
                   'type' => Controls_Manager::ICON,
                   'options' => get_creote_icon(),
                   'default' => __('icon-phone-call1' , 'creote-addons'),
               ]
           );
           $repeater->add_control(
               'content_one',
               [
                   'label' => __( 'Content One', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::TEXT,
                   'default' => __( 'Online Services 24/7', 'creote-addons' ), 
               ]
           );
           $repeater->add_control(
               'content_two',
               [
                   'label' => __( 'Content One', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::TEXT,
                   'default' => __( '+122 123 4567', 'creote-addons' ), 
               ]
           );
           $this->add_control(
               'information_repeater',
               [
                   'label' => __('Information Content', 'creote-addons'),
                   'type' => Controls_Manager::REPEATER,
                   'fields' => $repeater->get_controls(),
                   'default' => [
                       [
                          'icon_fonts' =>  __('fab fa-facebook', 'creote-addons'),
                          'content_one' =>  __('8:00AM - 6:00PM', 'creote-addons'),
                          'content_two' =>  __('Monday to Saturday', 'creote-addons'),
                       ],
                       [
                           'icon_fonts' =>  __('fab fa-facebook', 'creote-addons'),
                           'content_one' =>  __('Online Services 24/7', 'creote-addons'),
                           'content_two' =>  __('+122 123 4567', 'creote-addons'),
                       ],
                       [
                           'icon_fonts' =>  __('fab fa-facebook', 'creote-addons'),
                           'content_one' =>  __('219 Amara Fort Apt. 394', 'creote-addons'),
                           'content_two' =>  __('New York, NY 941', 'creote-addons'),
                       ],
                   ],
                   'title_field' => '{{{ content_one }}}',
               ]
           );
           $this->end_controls_section();
           $this->start_controls_section('headers_content',
           [ 
               'label' => __('Header Content', 'creote-addons'),
               'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
           'search_enable',
           [
               'label' => __('Search Button show / hide', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'yes',
           ]
       );
       $this->add_control(
           'button_enable',
           [
               'label' => __('Button show / hide', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'yes',
           ]
       );
       $this->add_control(
           'button_text',
           [
               'label' => __( 'Button Text', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => __( 'Get In Touch', 'creote-addons' ),
               'placeholder' => __( 'Type your title here', 'creote-addons' ),
           ]
       );
       $this->add_control(
           'button_link',
           [
               'label' => __( 'Button Link', 'creote-addons' ),
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
       $this->add_control(
           'modal_enable',
           [
               'label' => __('Modal Button show / hide', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'yes',
           ]
       );
        $this->end_controls_section();
        $this->start_controls_section('topbar_css',
        [ 
            'label' => __('Top Bar Css', 'creote-addons'),
            'tab' =>Controls_Manager::TAB_STYLE,
        ]
        );
        $this->add_control(
            'top_bor_color',
             [
                'label' => __('Top Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .header.style_three .header_mid ' => 'border-color: {{VALUE}};',
                  ],
             ]
          ); 
        $this->add_control(
            'top_bg_color',
             [
                'label' => __('Top Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .header.style_three .header_mid ' => 'background: {{VALUE}};',
                  ],
             ]
          ); 
          $this->add_control(
            'iss_color',
             [
                'label' => __('Icon Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .header.style_three .header_mid .mid_content .mid_icon  ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          ); 
          $this->add_control(
            'c_color',
             [
                'label' => __('Title Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .header.style_three .header_mid .mid_content .text h4 ' => 'color: {{VALUE}};',
                  ],
             ]
          ); 
          $this->add_control(
             't_color',
              [
                 'label' => __('Content Color', 'creote-addons'),
                 'type' => Controls_Manager::COLOR,
                  'selectors' => [
                     '{{WRAPPER}} .header.style_three .header_mid .mid_content .text p ' => 'color: {{VALUE}};',
                   ],
              ]
           ); 
        $this->end_controls_section();
        $this->start_controls_section('Header_css',
        [ 
            'label' => __('Header  Css', 'creote-addons'),
            'tab' =>Controls_Manager::TAB_STYLE,
        ]
        );
        $this->add_control(
            'header_bg_color',
             [
                'label' => __('Header Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .header.style_three .navbar_outer   ' => 'background: {{VALUE}};',
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
            'hto',
                [
                'type' => Controls_Manager::DIVIDER, 
                ]
            );
            $this->add_control(
                'icon_colors',
                 [
                    'label' => __(' Icon  Color', 'creote-addons'),
                    'type' => Controls_Manager::COLOR,
                     'selectors' => [
                        '{{WRAPPER}}  .header.style_three .navbar_outer .modal_box_buttom .contact-toggler i , {{WRAPPER}} .header.style_three .navbar_outer .header_content_collapse .header_right_content .search-toggler i ' => 'color: {{VALUE}}!important;',
                      ], 
                 ]
              ); 
          $this->add_control(
            'iconb_colors',
             [
                'label' => __(' Icon Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}  .header.style_three .navbar_outer .modal_box_buttom .contact-toggler , {{WRAPPER}} .header.style_three .navbar_outer .header_content_collapse .header_right_content .search-toggler ' => 'border-color: {{VALUE}}!important;',
                  ], 
             ]
          ); 
          $this->add_control(
             'iconbg_colors',
              [
                 'label' => __(' Icon bg Color', 'creote-addons'),
                 'type' => Controls_Manager::COLOR,
                  'selectors' => [
                     '{{WRAPPER}} .header.style_three .navbar_outer .modal_box_buttom .contact-toggler , {{WRAPPER}} .header.style_three .navbar_outer .header_content_collapse .header_right_content .search-toggler ' => 'background: {{VALUE}}!important;',
                   ],
              ]
           ); 
           $this->add_control(
            'hop',
                [
                'type' => Controls_Manager::DIVIDER, 
                ]
            );
           $this->add_control(
            'btn_color',
             [
                'label' => __('Button Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .header.style_three .navbar_outer .header_content_collapse .header_right_content .theme-btn  ' => 'color: {{VALUE}};',
                  ],
             ]
          ); 
         $this->add_control(
            'btnbg_color',
             [
                'label' => __('Button Bg  Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .header.style_three .navbar_outer .header_content_collapse .header_right_content .theme-btn  ' => 'background: {{VALUE}}!important;',
                  ],
             ]
          ); 
          $this->add_control(
            'btnho_color',
             [
                'label' => __('Button Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .header.style_three .navbar_outer .header_content_collapse .header_right_content .theme-btn:hover  ' => 'color: {{VALUE}};',
                  ],
             ]
          ); 
         $this->add_control(
            'btnbgho_color',
             [
                'label' => __('Button Bg  Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .header.style_three .navbar_outer .header_content_collapse .header_right_content .theme-btn:hover   ' => 'background: {{VALUE}}!important;',
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
           if($settings['mid_bar_enable'] == 'yes'):
           $logo_target = $settings['logo_link']['is_external'] ? ' target="_blank"' : '';
           $logo_nofollow = $settings['logo_link']['nofollow'] ? ' rel="nofollow"' : ''; 
              if(empty($settings['logo_link']['url'])):
                  $url = home_url();
              elseif(!empty($settings['logo_link']['url'])):
                  $url = $settings['logo_link']['url'];
              endif;
            endif;
           ?>
<header class="header header_default style_three"> <?php if($settings['mid_bar_enable'] == 'yes'): ?> <div class="header_mid"> <div class="medium-container"> <div class="row align-items-center"> <?php if(!empty($settings['logo_default']['url'])): ?> <div class="col-lg-3 col-md-12"> <div class="logo mid_logo_icon"> <a href="<?php echo esc_url($url); ?>" class="logo_mid" <?php echo esc_attr($logo_target); ?> <?php echo esc_attr($logo_nofollow); ?>> <img src="<?php echo esc_url($settings['logo_default']['url']); ?>" alt="<?php echo esc_html(get_bloginfo( 'name' )); ?>" class="logo_default"> </a> </div> </div> <?php endif; ?> <?php if(!empty($settings['information_repeater'])): ?> <div class="col-lg-9 col-md-12"> <div class="row"> <?php foreach($settings['information_repeater'] as $information_repeater):?> <div class="col-lg-4 same_column"> <div class="mid_content one"> <?php if(!empty($information_repeater['icon_fonts'])): ?> <span class="<?php echo esc_attr($information_repeater['icon_fonts']); ?> mid_icon"></span> <?php endif; ?> <div class="text"> <?php if(!empty($information_repeater['content_one'])): ?> <h4> <?php echo esc_attr($information_repeater['content_one']); ?></h4> <?php endif; ?> <?php if(!empty($information_repeater['content_two'])): ?> <p><?php echo esc_attr($information_repeater['content_two']); ?></p> <?php endif; ?> </div> </div> </div> <?php endforeach;?> </div> </div> <?php endif; ?> </div> </div> </div> <?php endif; ?> <div class="navbar_outer <?php if($settings['modal_enable'] == 'yes'): ?> mod_btn_enable <?php endif; ?>"> <div class="medium-container"> <div class="row align-items-center"> <div class="col-lg-12 menu_column"> <div class="navbar_togglers hamburger_menu"> <span class="line"></span> <span class="line"></span> <span class="line"></span> </div> <div class="header_content_collapse"> <div class="header_menu_box"> <?php if($settings['modal_enable'] == 'yes'): ?> <div class="modal_box_buttom"> <button type="button" class="contact-toggler"><i class="icon-bar"></i></button> </div> <?php endif;?> <div class="navigation_menu"> <?php if(!empty($settings['navigations'])): wp_nav_menu(array( 'menu' => $settings['navigations'], 'container' => false, 'menu_class' => 'navbar_nav', 'menu_id' => 'myNavbar', 'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback', 'walker' => new \WP_Bootstrap_Navwalker() ) ); endif; ?> </div> </div> <div class="header_right_content"> <ul> <?php if($settings['search_enable'] == 'yes'): ?> <li> <button type="button" class="search-toggler"><i class="icon-search"></i></button> </li> <?php endif;?> <?php if($settings['button_enable'] == 'yes'): ?> <li> <?php $target = $settings['button_link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <a href="<?php echo esc_url($settings['button_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn five"> <?php echo esc_attr($settings['button_text']); ?> </a> </li> <?php endif;?> </ul> </div> </div> </div> </div> </div> </div></header>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_header_v3());