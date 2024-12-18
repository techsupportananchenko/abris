<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_header_v10 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-header-v10';
       }
       public function get_title()
       {
           return __('Header V10', 'creote-addons');
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
        $this->add_responsive_control(
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
       $this->add_responsive_control(
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
       $this->add_responsive_control(
           'cart_enable',
           [
               'label' => __('Cart show / hide', 'creote-addons'),
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
           'button_link_text',
           [
               'label' => __( 'Link Text', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => __( 'Login', 'creote-addons' ),
               'placeholder' => __( 'Type your title here', 'creote-addons' ),
               'condition' => [
                   'button__text_enable' => 'yes'
               ],
           ]
       );
       $this->add_control(
           'button_text_link',
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
       $this->add_control(
           'scoial_media_enables',
               [
               'label' => __('Social Media show / hide', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'yes',
               ]
       );
       $this->add_control(
           'social_md_text',
           [
               'label' => __( 'Social Media Text', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => __( 'Share', 'creote-addons' ),
           ]
       );
       $repeater = new Repeater();
       $repeater->add_control(
           'media_icon_enable',
           [
             'label' => __('Media Display Type', 'creote-addons'),
             'type' => Controls_Manager::SELECT,
             'options' => [
               'text_type' => __( 'Text Type', 'creote-addons' ),
               'icon_type' => __( 'Icon Type', 'creote-addons' ),
           ],
             'default' => __('text_type' , 'creote-addons'),
           ]
       );
       $repeater->add_control(
           'social_media_text',
           [
               'label' => __( 'Social Media Text', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => __( 'Fb', 'creote-addons' ),
               'placeholder' => __( 'Type your Socail Media text here', 'creote-addons' ),
               'condition' => [
                   'media_icon_enable' => 'text_type'
               ],
           ]
       );
       $repeater->add_control(
           'social_media_icons',
           [
               'label' => __( 'Social Media Icon', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => __( 'fab fa-facebook', 'creote-addons' ),
               'placeholder' => __( 'Type your Socail Media Icon Class Name', 'creote-addons' ),
               'condition' => [
                   'media_icon_enable' => 'icon_type'
               ],
           ]
       );
       $repeater->add_control(
           'socail_media_links',
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
           'social_media_repeaters',
           [
               'label' => __('Social Media Content', 'creote-addons'),
               'type' => Controls_Manager::REPEATER,
               'fields' => $repeater->get_controls(),
               'default' => [
                   [
                       'media_icon_enable' => 'text_type' ,
                       'social_media_text' =>  __('Fb', 'creote-addons'),
                      'social_media_icons' =>  __('fab fa-facebook', 'creote-addons'),
                      'socail_media_links' =>  __('#', 'creote-addons'),
                   ],
                   [
                       'media_icon_enable' => 'text_type' ,
                       'social_media_text' =>  __('Tw', 'creote-addons'),
                      'social_media_icons' =>  __('fab fa-twitter', 'creote-addons'),
                      'socail_media_links' =>  __('#', 'creote-addons'),
                    ],
                    [
                       'media_icon_enable' => 'text_type' ,
                       'social_media_text' =>  __('Sk', 'creote-addons'),
                       'social_media_icons' =>  __('fab fa-skype', 'creote-addons'),
                       'socail_media_links' =>  __('#', 'creote-addons'),
                    ],
                    [
                       'media_icon_enable' => 'text_type' ,
                       'social_media_text' =>  __('Ln', 'creote-addons'),
                       'social_media_icons' =>  __('fab fa-telegram', 'creote-addons'),
                       'socail_media_links' =>  __('#', 'creote-addons'),
                    ],
               ],
               'title_field' =>   __('Media', 'creote-addons'),
               'condition' => [
                   'scoial_media_enables' => 'yes'
               ],
           ]
       );
       $this->end_controls_section();
       $this->start_controls_section('custom_css_enabled',
       [ 
           'label' => __('Header Css', 'creote-addons'),
           'tab' =>Controls_Manager::TAB_STYLE,
       ]
       );
       $this->add_responsive_control(
           'header_positions',
           [
             'label' => __('Header Position', 'creote-addons'),
             'type' => Controls_Manager::SELECT,
             'options' => [
               'absolute' => __( 'Position Absolute', 'creote-addons' ),
               'relative' => __( 'Position Relative', 'creote-addons' ),
             ],
             'default' => __('absolute' , 'creote-addons'),
             'selectors' => [
               '{{WRAPPER}} .header.style_seven  ' => 'position: {{VALUE}};',
            ],
           ]
       );
       $this->add_responsive_control(
           'header_bg_color',
            [
               'label' => __('Header Bg Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
                'selectors' => [
                   '{{WRAPPER}} .header.style_seven ' => 'background: {{VALUE}};',
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
           'mennu_right_icon_color',
            [
               'label' => __('Icon Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .header.style_seven  .header_right_content ul li .search-toggler i, {{WRAPPER}}  .header.style_seven  .header_right_content ul li .header_side_cart i, {{WRAPPER}}  .header.style_seven  .header_right_content ul li .contact-toggler i
                   , {{WRAPPER}} .header_default.style_seven .header_right_content ul li .med_rg_side .social_media_head li.shared_m , {{WRAPPER}}  .header_default.style_seven .header_right_content ul li .med_rg_side .social_media_head li a
                   ' => 'color: {{VALUE}};',
               ],
            ]
       );
       $this->add_control(
           'cart_count_color',
            [
               'label' => __('Cart Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .header.style_seven .header_right_content ul .header_side_cart .mini-cart-count ' => 'color: {{VALUE}};',
               ],
            ]
       );
       $this->add_control(
           'cart_bg_count_color',
            [
               'label' => __('Cart Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .header.style_seven  .header_right_content ul .header_side_cart .mini-cart-count ' => 'background: {{VALUE}};',
               ],
            ]
       );
       $this->add_control(
           'right_btn_color',
            [
               'label' => __('Link Text Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .header.style_seven  .header_right_content ul li.last a ' => 'color: {{VALUE}};',
               ],
            ]
       );
       $this->add_control(
           'contact_toggler_color',
            [
               'label' => __('Contact Toggler Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .header_default.style_seven .left_side_box .modal_box_buttom .contact-toggler i ' => 'color: {{VALUE}};',
               ],
            ]
       );
       $this->add_control(
           'contact_togglerbg__color',
            [
               'label' => __('Contact Toggler Background Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .header_default.style_seven .left_side_box .modal_box_buttom .contact-toggler::before ' => 'background: {{VALUE}};',
               ],
            ]
       );
       $this->add_control(
           'contact_togglerborder__color',
            [
               'label' => __('Contact Toggler Border Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .header_default.style_seven .left_side_box .modal_box_buttom .contact-toggler ' => 'border-color: {{VALUE}};',
               ],
            ]
       );
       $this->add_control(
           'extra_border_color',
            [
               'label' => __('Extra Border Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .header_default.style_seven .left_side_box .modal_box_buttom::before , {{WRAPPER}} .header_default.style_seven .header_right_content ul li .med_rg_side .social_media_head:before ' => 'background: {{VALUE}};',
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
<header class="header header_default style_seven head_<?php echo esc_attr($settings['header_positions']); ?>"> <div class="container-fluid"> <div class="row"> <div class="col-lg-3 col-md-9 col-sm-9 col-xs-9 logo_column"> <div class="left_side_box"> <?php if($settings['modal_enable'] == 'yes'): ?> <div class="modal_box_buttom"> <button type="button" class="contact-toggler"><i class="icon-bar"></i></button> </div> <?php endif;?> <div class="header_logo_box"> <a href="<?php echo esc_url($url); ?>" class="logo navbar-brand" <?php echo esc_attr($logo_target); ?> <?php echo esc_attr($logo_nofollow); ?>> <img src="<?php echo esc_url($settings['logo_default']['url']); ?>" alt="<?php echo esc_html(get_bloginfo( 'name' )); ?>" class="logo_default"> </a> </div> </div> </div> <div class="col-lg-6 col-md-3 col-sm-3 col-xs-3 menu_column"> <div class="navbar_togglers hamburger_menu"> <span class="line"></span> <span class="line"></span> <span class="line"></span> </div> <div class="header_content_collapse"> <div class="header_menu_box"> <div class="navigation_menu text-center"> <?php if(!empty($settings['navigations'])): wp_nav_menu(array( 'menu' => $settings['navigations'], 'container' => false, 'menu_class' => 'navbar_nav', 'menu_id' => 'myNavbar', 'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback', 'walker' => new \WP_Bootstrap_Navwalker() ) ); endif; ?> </div> </div> </div> </div> <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 right_column"> <div class="header_right_content"> <ul> <?php if($settings['scoial_media_enables'] == 'yes'): ?> <li> <div class="med_rg_side"> <ul class="social_media_head"> <?php if(!empty($settings['social_md_text'])): ?> <li class="shared_m"><span class="icon-share-2"></span><?php echo esc_attr($settings['social_md_text']); ?></li> <?php endif; ?> <?php foreach($settings['social_media_repeaters'] as $media_repearter):?> <?php $targetm = $media_repearter['socail_media_links']['is_external'] ? ' target="_blank"' : ''; $nofollowm = $media_repearter['socail_media_links']['nofollow'] ? ' rel="nofollow"' : ''; ?> <li> <a href="<?php echo esc_url($media_repearter['socail_media_links']['url']); ?>" <?php echo esc_attr($targetm); ?> <?php echo esc_attr($nofollowm); ?>> <?php if($media_repearter['media_icon_enable'] == 'text_type'): ?> <small><?php echo esc_attr($media_repearter['social_media_text']); ?></small> <?php elseif($media_repearter['media_icon_enable'] == 'icon_type'): ?> <i class="<?php echo esc_attr($media_repearter['social_media_icons']); ?>"></i> <?php endif; ?> </a> </li> <?php endforeach;?> </ul> </div> </li> <?php endif; ?> <?php if($settings['search_enable'] == 'yes'): ?> <li> <button type="button" class="search-toggler"><i class="icon-search"></i></button> </li> <?php endif;?> <?php if($settings['cart_enable'] == 'yes'): if(class_exists('woocommerce')):?> <li> <?php $items_counts = is_object( WC()->cart ) ? WC()->cart->get_cart_contents_count() : ''; ?> <div class="mini_cart_togglers header_side_cart"> <div class="mini-cart-count"> <?php if(!empty($items_counts)): echo $items_counts ? $items_counts : '&nbsp;'; else: echo esc_html('0'); endif; ?> </div> <i class="icon-shopping-bag1"></i> </div> </li> <?php endif; endif;?> <?php if($settings['button__text_enable'] == 'yes'): ?> <li class="last"> <?php $target_four = $settings['button_text_link']['is_external'] ? ' target="_blank"' : ''; $nofollow_four = $settings['button_text_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <a href="<?php echo esc_url($settings['button_text_link']['url']); ?>" <?php echo esc_attr($target_four); ?> <?php echo esc_attr($nofollow_four); ?> class="login"> <i class="icon-keyhole"></i> <?php echo esc_attr($settings['button_link_text']); ?> </a> </li> <?php endif;?> </ul> </div> </div> </div> </div></header>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_header_v10());