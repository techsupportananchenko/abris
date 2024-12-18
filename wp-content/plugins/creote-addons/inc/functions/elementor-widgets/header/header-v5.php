<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_header_v5 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-header-v5';
       }
       public function get_title()
       {
           return __('Header V6', 'creote-addons');
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
            $this->add_control(
           'colo',
               [
               'type' => Controls_Manager::DIVIDER, 
               ]
           );
           $this->add_control(
               'phone_enable',
               [
                   'label' => __('Phone Number show / hide', 'creote-addons'),
                   'type' => Controls_Manager::SWITCHER,
                   'label_on' => __('Yes', 'creote-addons'),
                   'label_off' => __('No', 'creote-addons'),
                   'return_value' => 'yes',
                   'default' => 'yes',
               ]
           );
           $this->add_control(
               'phone_title',
               [
                   'label' => __( 'Title', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::TEXT,
                   'default' => __( 'Phone', 'creote-addons' ),
                   'placeholder' => __( 'Type your title here', 'creote-addons' ),
                   'condition' => [
                       'phone_enable' => 'yes'
                   ]
               ]
           );
           $this->add_control(
               'phone_number',
               [
                   'label' => __( 'Phone Number', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::TEXT,
                   'default' => __( '+98 060 712 34', 'creote-addons' ),
                   'placeholder' => __( 'Type your Phone Number here', 'creote-addons' ),
                   'condition' => [
                       'phone_enable' => 'yes'
                   ]
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
                   'condition' => [
                       'button_enable' => 'yes'
                   ]
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
                   'condition' => [
                       'button_enable' => 'yes'
                   ]
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
                       '{{WRAPPER}} .header.header_default.style_five  ' => 'background: {{VALUE}};',
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
                    'pi_colors',
                     [
                        'label' => __(' Phone Icon  Color', 'creote-addons'),
                        'type' => Controls_Manager::COLOR,
                         'selectors' => [
                            '{{WRAPPER}}  .header.style_five .header_content_collapse .header_right_content .contntent.phone small i ' => 'color: {{VALUE}}!important;',
                          ], 
                     ]
                  ); 
                  $this->add_control(
                    'pt_colors',
                     [
                        'label' => __(' Phone Title  Color', 'creote-addons'),
                        'type' => Controls_Manager::COLOR,
                         'selectors' => [
                            '{{WRAPPER}}  .header.style_five .header_content_collapse .header_right_content .contntent.phone small ' => 'color: {{VALUE}}!important;',
                          ], 
                     ]
                  ); 
                  $this->add_control(
                    'pn_colors',
                     [
                        'label' => __(' Phone Number  Color', 'creote-addons'),
                        'type' => Controls_Manager::COLOR,
                         'selectors' => [
                            '{{WRAPPER}}  .header.style_five .header_content_collapse .header_right_content .contntent.phone a ' => 'color: {{VALUE}}!important;',
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
                   'btn_colors',
                    [
                       'label' => __(' Btn  Color', 'creote-addons'),
                       'type' => Controls_Manager::COLOR,
                        'selectors' => [
                           '{{WRAPPER}} .header.style_five .header_content_collapse .header_right_content .theme-btn ' => 'color: {{VALUE}}!important;',
                         ], 
                    ]
                 ); 
                 $this->add_control(
                   'btnbg_colors',
                   [
                       'label' => __(' Btn Bg  Color', 'creote-addons'),
                       'type' => Controls_Manager::COLOR,
                       'selectors' => [
                           '{{WRAPPER}}  .header.style_five .header_content_collapse .header_right_content .theme-btn ' => 'background: {{VALUE}}!important;border-color: {{VALUE}}!important;',
                       ], 
                   ]
               ); 
               $this->add_control(
                'btnh_colors',
                 [
                    'label' => __(' Btn Hover Color', 'creote-addons'),
                    'type' => Controls_Manager::COLOR,
                     'selectors' => [
                        '{{WRAPPER}} .header.style_five .header_content_collapse .header_right_content .theme-btn:hover ' => 'color: {{VALUE}}!important;border-color: {{VALUE}}!important;',
                      ], 
                 ]
              ); 
              $this->add_control(
                'btnbgh_colors',
                [
                    'label' => __(' Btn Hover Bg Color', 'creote-addons'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}  .header.style_five .header_content_collapse .header_right_content .theme-btn:hover ' => 'background: {{VALUE}}!important;',
                    ], 
                ]
            ); 
            $this->add_control(
                'htos',
                    [
                    'type' => Controls_Manager::DIVIDER, 
                    ]
                );
                $this->add_control(
                    'btns_colors',
                     [
                        'label' => __(' Btn  Color', 'creote-addons'),
                        'type' => Controls_Manager::COLOR,
                         'selectors' => [
                            '{{WRAPPER}} .header.style_five .header_content_collapse .header_right_content .round_btn button i ' => 'color: {{VALUE}}!important;',
                            '{{WRAPPER}} .header.style_five .header_content_collapse .header_right_content .round_btn::before' => 'background: {{VALUE}}!important;',
                          ], 
                     ]
                  ); 
                  $this->add_control(
                    'btnbgs_colors',
                    [
                        'label' => __(' Btn Bg  Color', 'creote-addons'),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}}  .header.style_five .header_content_collapse .header_right_content .round_btn ' => 'background: {{VALUE}}!important; ',
                        ], 
                    ]
                ); 
                $this->add_control(
                    'btnsho_colors',
                     [
                        'label' => __(' Btn Hover Color', 'creote-addons'),
                        'type' => Controls_Manager::COLOR,
                         'selectors' => [
                            '{{WRAPPER}} .header.style_five .header_content_collapse .header_right_content .round_btn:hover button i ' => 'color: {{VALUE}}!important;',
                            '{{WRAPPER}} .header.style_five .header_content_collapse .header_right_content .round_btn:hover::before' => 'background: {{VALUE}}!important;',
                          ], 
                     ]
                  ); 
                  $this->add_control(
                    'btnbgsh_colors',
                    [
                        'label' => __(' Btn Hover Bg  Color', 'creote-addons'),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}}  .header.style_five .header_content_collapse .header_right_content .round_btn:hover ' => 'background: {{VALUE}}!important;',
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
<header class="header header_default style_five"> <div class="container-fluid"> <div class="row align-items-center"> <div class="col-lg-2 col-md-9 col-sm-9 col-xs-9 logo_column"> <div class="header_logo_box"> <a href="<?php echo esc_url($url); ?>" class="logo navbar-brand" <?php echo esc_attr($logo_target); ?> <?php echo esc_attr($logo_nofollow); ?>> <img src="<?php echo esc_url($settings['logo_default']['url']); ?>" alt="<?php echo esc_html(get_bloginfo( 'name' )); ?>" class="logo_default"> </a> </div> </div> <div class="col-lg-10 col-md-3 col-sm-3 col-xs-3 menu_column"> <div class="navbar_togglers hamburger_menu"> <span class="line"></span> <span class="line"></span> <span class="line"></span> </div> <div class="header_content_collapse"> <div class="header_menu_box"> <div class="navigation_menu"> <?php if(!empty($settings['navigations'])): wp_nav_menu(array( 'menu' => $settings['navigations'], 'container' => false, 'menu_class' => 'navbar_nav', 'menu_id' => 'myNavbar', 'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback', 'walker' => new \WP_Bootstrap_Navwalker() ) ); endif; ?> </div> </div> <div class="header_right_content"> <ul> <?php if($settings['phone_enable'] == 'yes'): ?> <li class="contntent phone"> <?php if(!empty($settings['phone_title'])): ?> <small> <i class="icon-phone-call"></i><?php echo esc_attr($settings['phone_title']); ?></small> <?php endif; ?> <?php if(!empty($settings['phone_number'])): ?> <a href="tel:<?php echo esc_attr($settings['phone_number']); ?>"><?php echo esc_attr($settings['phone_number']); ?></a> <?php endif; ?> </li> <?php endif; ?> <?php if($settings['button_enable'] == 'yes'): ?> <li> <?php $target = $settings['button_link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <a href="<?php echo esc_url($settings['button_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn one"> <?php echo esc_attr($settings['button_text']); ?> </a> </li> <?php endif;?> <?php if(($settings['modal_enable'] == 'yes') && ($settings['search_enable'] == 'yes')) : ?> <li class="round_btn"> <?php if($settings['search_enable'] == 'yes'): ?> <button type="button" class="search-toggler"><i class="icon-search"></i></button> <?php endif;?> <?php if($settings['modal_enable'] == 'yes'): ?> <button type="button" class="contact-toggler"><i class="icon-setup-dots"></i></button> <?php endif;?> </li> <?php endif;?> </ul> </div> </div> </div> </div> </div></header>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_header_v5());