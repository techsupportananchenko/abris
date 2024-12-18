<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Header_v3 extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'creote-header-v14';
    }
    public function get_title()
    {
        return __('Header V15', 'creote-addons');
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
        $this->start_controls_section('mid_content',
        [ 
            'label' => __('Top  Content', 'creote-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            'condition' => [
                'top_bar_enable' => 'yes'
            ]
        ]
        );
        $this->add_control(
            'location_title',
            [
                'label' => __( 'Address Title', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Locate Us:', 'creote-addons' ),
                'placeholder' => __( 'Type your text Here', 'creote-addons' ),
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
            'timing_title',
            [
                'label' => __( 'Timing Title', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Opening Hours:', 'creote-addons' ),
                'placeholder' => __( 'Type your text Here', 'creote-addons' ),
            ]
        );
        $this->add_control(
            'timing',
            [
                'label' => __( 'Timing', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Mon - Sat: 09.00 to 06.00 (Sun:Closed)', 'creote-addons' ),
                'placeholder' => __( 'Type your Mail Address here', 'creote-addons' ),
            ]
        );
        $this->add_control(
            'email_title',
            [
                'label' => __( 'Email Title', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Send Mail Us:', 'creote-addons' ),
                'placeholder' => __( 'Type your text Here', 'creote-addons' ),
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
            'phone_title',
            [
                'label' => __( 'Phone Title', 'creote-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Call Us Now:', 'creote-addons' ),
                'placeholder' => __( 'Type your text Here', 'creote-addons' ),
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
                '{{WRAPPER}} header .logo_box img' => 'width: {{VALUE}}!important;',
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
                    '{{WRAPPER}}  header  .logo_box img ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'hr_logo_md',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
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
			'hr_sear',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
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
    $this->start_controls_section('mbar_css',
    [ 
        'label' => __('Top Bar Css', 'creote-addons'),
        'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
    ]);
    $this->add_control(
        'm_bg_color',
         [
            'label' => __('Top Bar Bg Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
             'selectors' => [
                '{{WRAPPER}} .header_v14 .header_mid ' => 'background: {{VALUE}}!important;',
              ],
         ]
      );
      $this->add_control(
        'im_color',
         [
            'label' => __('Icon Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
             'selectors' => [
                '{{WRAPPER}} .header_v14 .header_mid .midbar_mid ul li span ' => 'color: {{VALUE}}!important;',
              ],
         ]
      );
      $this->add_control(
        'it_color',
         [
            'label' => __('Icon Title Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
             'selectors' => [
                '{{WRAPPER}} .header_v14 .header_mid .contact_info li small ' => 'color: {{VALUE}}!important;',
              ],
         ]
      );
      $this->add_control(
        'id_color',
         [
            'label' => __('Icon Description Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
             'selectors' => [
                '{{WRAPPER}} .header_v14 .header_mid .contact_info li p , {{WRAPPER}} .header_v14 .header_mid .contact_info li p a ' => 'color: {{VALUE}}!important;',
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
        'h_bg_color',
         [
            'label' => __('Header Bg Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
             'selectors' => [
                '{{WRAPPER}} .header_v14 .navbar_outer .inner_box ' => 'background: {{VALUE}}!important;',
              ],
         ]
      );
      $this->add_control(
        'h_br_color',
         [
            'label' => __('Header Border Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
             'selectors' => [
                '{{WRAPPER}} .header_v14 .navbar_outer .inner_box ' => 'border-color: {{VALUE}}!important;',
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
                '{{WRAPPER}} .header_v13 .navbar_outer .navbar_right li i ' => 'color: {{VALUE}};',
            ],
         ]
    );
    $this->add_control(
        'cart_count_color',
         [
            'label' => __('Cart Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .main-header .mini-cart-count ' => 'color: {{VALUE}};',
            ],
         ]
    );
    $this->add_control(
        'cart_bg_count_color',
         [
            'label' => __('Cart Bg Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .main-header .mini-cart-count ' => 'background: {{VALUE}};',
            ],
         ]
    );
    $this->add_control(
        'cartbcount_color',
         [
            'label' => __('Icon Background Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .header_v13 .navbar_outer .navbar_right .contact-toggler ' => 'background: {{VALUE}};',
            ],
         ]
    );
    $this->add_control(
        'mennu_b_icon_color',
         [
            'label' => __('Right Content Background Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .header_v14 .navbar_outer .navbar_right ' => 'background: {{VALUE}};',
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
 <header class="main-header header header_v14 header_v13 "> <?php if($settings['top_bar_enable'] == 'yes'): ?> <section class="header_mid"> <div class="<?php echo esc_attr($settings['header_width']); ?>"> <div class="row align-items-center"> <!--Top Right--> <div class="col-lg-12 fullwidth_after_1200"> <div class="midbar_mid"> <div class="contact_widget"> <ul class="contact_info"> <li class="single"> <span class="icon-location2"></span> <small><?php echo esc_attr($settings['location_title']); ?> </small> <p><?php echo esc_attr($settings['location_address']); ?></p> </li> <li class="single"> <span class="icon-clock"></span> <small> <?php echo esc_attr($settings['timing_title']); ?></small> <p><?php echo esc_attr($settings['timing']); ?></p> </li> <li class="single"> <span class="icon-telephone"></span> <small> <?php echo esc_attr($settings['phone_title']); ?> </small> <p><a href="tel:<?php echo esc_attr($settings['phone_number']); ?> "><?php echo esc_attr($settings['phone_number']); ?></a></p> </li> <li class="single"> <span class="icon-mail"></span> <small> <?php echo esc_attr($settings['email_title']); ?></small> <p><a href="mailto:<?php echo esc_attr($settings['email_address']); ?> "><?php echo esc_attr($settings['email_address']); ?></a></p> </li> </ul> </div> </div> </div> </div> </div> </section> <?php endif; ?> <section class="navbar_outer"> <div class="<?php echo esc_attr($settings['header_width']); ?>"> <nav class="inner_box"> <div class="site-logo"> <a href="<?php echo esc_url($url); ?>" class="logo navbar-brand" <?php echo esc_attr($logo_target); ?> <?php echo esc_attr($logo_nofollow); ?>> <img src="<?php echo esc_url($settings['logo_default']['url']); ?>" alt="<?php echo esc_html(get_bloginfo( 'name' )); ?>" class="logo_default"> </a> </div> <div class="header_content header_content_collapse"> <div class="header_menu_box"> <div class="navigation_menu"> <?php if(!empty($settings['navigations'])): wp_nav_menu(array( 'menu' => $settings['navigations'], 'container' => false, 'menu_class' => 'navbar_nav', 'menu_id' => 'myNavbar', 'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback', 'walker' => new \WP_Bootstrap_Navwalker() ) ); endif; ?> </div> </div> </div> <div class="navbar_right navbar_nav "> <ul> <?php if($settings['search_enable'] == 'yes'): ?> <li> <button type="button" class="search-toggler"><i class="icon-search"></i></button> </li> <?php endif; ?> <?php if($settings['cart_enable'] == 'yes'): if(class_exists('woocommerce')):?> <li> <?php $items_counts = is_object( WC()->cart ) ? WC()->cart->get_cart_contents_count() : ''; ?> <div class="mini_cart_togglers header_side_cart"> <div class="mini-cart-count"> <?php if(!empty($items_counts)): echo $items_counts ? $items_counts : '&nbsp;'; else: echo esc_html('0'); endif; ?> </div> <i class="icon-shopping-bag1"></i> </div> </li> <?php endif; endif;?> <?php if($settings['optional_panel'] == 'yes'): ?> <li> <button type="button" class="contact-toggler"><i class="icon-menu1"></i></button> </li> <?php endif; ?> </ul> </div> </nav> </div> </section></header>

<?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Header_v3());