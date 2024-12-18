<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Header_v1 extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'creote-header-v13';
    }
    public function get_title()
    {
        return __('Header V13', 'creote-addons');
    }
    public function get_icon()
    {
        return 'icon-c';
    }
    public function get_categories()
    {
        return ['100'];
    }
    protected function register_controls(){
        $this->start_controls_section('headers_settings',
        [ 
            'label' => __('Header Settings', 'creote-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
        );
        $this->add_control(
            'logo_default',
            [
            'label' => __( 'Logo Default', 'creote-addons' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
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
                '{{WRAPPER}} .header_v13 .logo img ' => 'width: {{VALUE}}!important;',
            ],
        ]
        );
        $this->add_control(
            'margin_logo',
            [
                'label' => __( 'Margin', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .header_v13 .logo img  ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'hr_sear',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
            'top_bar_enable',
            [
                'label' => __('Top Bar Enable / Disable', 'creote-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
         'header_width',
            [
            'label' => __('Header Styles', 'creote-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'no-container' => __( 'No Container', 'creote-addons' ),
                'full-container' => __( 'Full With Container', 'creote-addons' ),
                'large-container' => __( 'large Container', 'creote-addons' ),
                'medium-container' => __( 'medium Container', 'creote-addons' ),
                'auto-container' => __( 'auto Container', 'creote-addons' ),
            ],
            'default' => __('medium-container' , 'creote-addons'),
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section('top_content',
        [ 
            'label' => __('Topbar Content', 'creote-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            'condition' => [
                'top_bar_enable' => 'yes'
            ]
        ]
        );
        $this->add_control(
            'top_button_enable',
            [
                'label' => __('Button  Enable / Disable', 'creote-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'top_button_text',
            [
                'label' => __( 'Button  Text', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Get a quote', 'creote-addons' ),
                'placeholder' => __( 'Type your title here', 'creote-addons' ),
                'condition' => [
                    'top_button_enable' => 'yes'
                ],
            ]
        );
        $this->add_control(
            'top_button_link',
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
                    'top_button_enable' => 'yes'
                ],
            ]
        );
        $this->add_control(
			'top_hr_one',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
            'high_light_text',
            [
                'label' => __( 'Text', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Welcome to our consulting company.', 'creote-addons' ),
                'placeholder' => __( 'Type your Mail Address here', 'creote-addons' ),
            ]
        );
        $this->add_control(
			'top_hr_two',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
            'location_address',
            [
                'label' => __( 'Address', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '61W Business Str Hobert, LA ', 'creote-addons' ),
                'placeholder' => __( 'Type your Address Here', 'creote-addons' ),
            ]
        );
        $this->add_control(
            'email_address',
            [
                'label' => __( 'Email Id', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'sendmail@creote.com', 'creote-addons' ),
                'placeholder' => __( 'Type your Mail Address here', 'creote-addons' ),
            ]
        );
        $this->add_control(
            'phone_number',
            [
                'label' => __( 'Phone Number', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '+98 060 712 34', 'creote-addons' ),
                'placeholder' => __( 'Type your Phone Number here', 'creote-addons' ),
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section('header_content',
        [ 
            'label' => __('Header Content', 'creote-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
        );  
        $this->add_control(
            'navigations',
            [
                'label' => __('Select Navigation', 'creote-addons'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => creote_navmenu(),
            ]
        );
        $this->add_control(
            'search_enable',
            [
                'label' => __('Search Enable / Disable', 'creote-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
			'hr_five_f',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
            'cart_enable',
            [
                'label' => __('Cart Enable / Disable', 'creote-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
			'hr_optional',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
            'optional_panel',
            [
                'label' => __('Optional Panel Enable / Disable', 'creote-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
    $this->end_controls_section();
    $this->start_controls_section('topbar_m_css',
    [ 
        'label' => __('Topbar Css', 'creote-addons'),
        'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
        'condition' => [
            'top_bar_enable' => 'yes'
        ],
    ]);
    $this->add_control(
        'top_bar_bg_color',
         [
            'label' => __('Top Bar Bg Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
             'selectors' => [
                '{{WRAPPER}} .header_v13 .header_top ' => 'background: {{VALUE}}!important;',
              ],
         ]
      );
      $this->add_control(
        'b_color',
         [
            'label' => __('Button Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
             'selectors' => [
                '{{WRAPPER}} .header_v13 .header_top .get_a_quote ' => 'color: {{VALUE}}!important;',
              ],
         ]
      );  
      $this->add_control(
        'b_bg_color',
         [
            'label' => __('Button bg Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
             'selectors' => [
                '{{WRAPPER}} .header_v13 .header_top .get_a_quote ' => 'background: {{VALUE}}!important;',
              ],
         ]
      );
    $this->add_control(
        'c_color',
         [
            'label' => __('Content Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
             'selectors' => [
                '{{WRAPPER}} .header_v13 .header_top ul li , {{WRAPPER}} .header_v13 .header_top ul li a ,  {{WRAPPER}} .header_v13 .header_top p ' => 'color: {{VALUE}}!important;',
              ],
         ]
      );
      $this->add_control(
        'i_color',
         [
            'label' => __('Icon Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
             'selectors' => [
                '{{WRAPPER}} .header_v13 .header_top ul li span ' => 'color: {{VALUE}}!important;',
              ],
         ]
      ); 
    $this->end_controls_section();
    $this->start_controls_section('header_m_css',
    [ 
        'label' => __('Header Css', 'creote-addons'),
        'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
    ]);
    $this->add_control(
        'header_bg_color',
         [
            'label' => __('Header Bg Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
             'selectors' => [
                '{{WRAPPER}} .header_v13 .navbar_outer ' => 'background: {{VALUE}};',
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
        'mennu_right_icon_color',
         [
            'label' => __('Icon Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .header_style_six_nw .header .header_content_collapse .header_right_content ul li .search-toggler i, {{WRAPPER}}  .header_style_six_nw .header .header_content_collapse .header_right_content ul li .header_side_cart i, {{WRAPPER}}  .header_style_six_nw .header .header_content_collapse .header_right_content ul li .contact-toggler i' => 'color: {{VALUE}};',
            ],
         ]
    );
    $this->add_control(
        'cart_count_color',
         [
            'label' => __('Cart Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .header_v13 .navbar_outer .navbar_right li .mini-cart-count ' => 'color: {{VALUE}};',
            ],
         ]
    );
    $this->add_control(
        'cart_bg_count_color',
         [
            'label' => __('Cart Bg Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .header_v13 .navbar_outer .navbar_right li .mini-cart-count ' => 'background: {{VALUE}};',
            ],
         ]
    );
    $this->add_control(
        'c_count_color',
         [
            'label' => __('Contact Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .header_v13 .navbar_outer .navbar_right li .contact-toggler i ' => 'color: {{VALUE}};',
            ],
         ]
    );
    $this->add_control(
        'c_bg_count_color',
         [
            'label' => __('Contact Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .header_v13 .navbar_outer .navbar_right li .contact-toggler ' => 'background: {{VALUE}};',
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
<header class="main-header header header_v13"> <?php if($settings['top_bar_enable'] == 'yes'): ?> <section class="header_top"> <div class="<?php echo esc_attr($settings['header_width']); ?>"> <div class="header_top_inner"> <div class="top_left"> <ul class="top-links clearfix"> <?php if(!empty($settings['top_button_text'])): $target_top_button = $settings['top_button_link']['is_external'] ? ' target="_blank"' : ''; $nofollow_top_button = $settings['top_button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <li><a href="<?php echo esc_url($settings['top_button_link']['url']); ?>" <?php echo esc_attr($target_top_button); ?> <?php echo esc_attr($nofollow_top_button); ?> class="get_a_quote"> <?php echo esc_attr($settings['top_button_text']); ?> </a> <li> <?php endif; ?> <li><?php echo wp_kses($settings['high_light_text'] , $allowed_tags); ?></li> </ul> </div> <div class="top_right text-right"> <ul class="contact_info_two"> <?php if(!empty($settings['phone_number'])): ?> <li class="single"> <p> <span class="icon-telephone"></span> <a href="tel:<?php echo esc_attr($settings['phone_number']); ?>"><?php echo esc_attr($settings['phone_number']); ?></a> </p> </li> <?php endif; ?> <?php if(!empty($settings['email_address'])): ?> <li class="single"> <p><span class="icon-mail"></span><a href="mailto:<?php echo esc_attr($settings['email_address']); ?>"><?php echo esc_attr($settings['email_address']); ?></a> </p> </li> <?php endif; ?> <?php if(!empty($settings['location_address'])): ?> <li class="single"> <p> <span class="icon-location2"></span> <?php echo esc_attr($settings['location_address']); ?></p> </li> <?php endif; ?> </ul> </div> </div> </div> </section> <?php endif; ?> <section class="navbar_outer"> <div class="<?php echo esc_attr($settings['header_width']); ?>"> <nav class="inner_box"> <div class="header_logo_box"> <a href="<?php echo esc_url($url); ?>" class="logo navbar-brand" <?php echo esc_attr($logo_target); ?> <?php echo esc_attr($logo_nofollow); ?>> <img src="<?php echo esc_url($settings['logo_default']['url']); ?>" alt="<?php echo esc_html(get_bloginfo( 'name' )); ?>" class="logo_default"> </a> </div> <div class="navbar_togglers hamburger_menu"> <span class="line"></span> <span class="line"></span> <span class="line"></span> </div> <div class="header_content header_content_collapse"> <div class="header_menu_box"> <div class="navigation_menu"> <?php if(!empty($settings['navigations'])): wp_nav_menu(array( 'menu' => $settings['navigations'], 'container' => false, 'menu_class' => 'navbar_nav', 'menu_id' => 'myNavbar', 'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback', 'walker' => new \WP_Bootstrap_Navwalker() ) ); endif; ?> </div> </div> <ul class="navbar_right navbar_nav "> <?php if($settings['search_enable'] == 'yes'): ?> <li> <button type="button" class="search-toggler"><i class="icon-search"></i></button> </li> <?php endif; ?> <?php if($settings['cart_enable'] == 'yes'): if(class_exists('woocommerce')):?> <li> <?php $items_counts = is_object( WC()->cart ) ? WC()->cart->get_cart_contents_count() : ''; ?> <div class="mini_cart_togglers header_side_cart"> <div class="mini-cart-count"> <?php if(!empty($items_counts)): echo $items_counts ? $items_counts : '&nbsp;'; else: echo esc_html('0'); endif; ?> </div> <i class="icon-shopping-bag1"></i> </div> </li> <?php endif; endif;?> <?php if($settings['optional_panel'] == 'yes'): ?> <li> <button type="button" class="contact-toggler"><i class="icon-menu1"></i></button> </li> <?php endif; ?> </ul> </div> </nav> </div> </section></header>
<?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Header_v1());