<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_menum_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-menu-v1';
       }
       public function get_title()
       {
           return __('Menu', 'creote-addons');
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
           $this->start_controls_section('menu_settings',
           [ 
               'label' => __('Menu Content', 'creote-addons'),
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
               'menu_padding',
               [
                   'label' => __( 'Menu Padding', 'creote-addons' ),
                   'type' => Controls_Manager::DIMENSIONS,
                   'size_units' => [ 'px', '%', 'em' ],
                   'selectors' => [
                       '{{WRAPPER}} .header_solo .header_content_collapse .navigation_menu .navbar_nav li ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                   ],
               ]
           );
           $this->add_control(
            'drop_menu_padding',
            [
                'label' => __( 'Drop Down Menu Padding', 'creote-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .header_solo .header_content_collapse .navigation_menu .navbar_nav li .dropdown-menu li ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
           $this->add_control(
               'menu_border_radius',
               [
                   'label' => __( 'Border Radius', 'creote-addons' ),
                   'type' => Controls_Manager::DIMENSIONS,
                   'size_units' => [ 'px', '%', 'em' ],
                   'selectors' => [
                       '{{WRAPPER}} .header_solo .header_content_collapse .navigation_menu .navbar_nav li ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
           $this->add_responsive_control(
               'title_alignments',
               [
                   'label' => __('Menu alignments', 'creote-addons'),
                   'type' => Controls_Manager::CHOOSE,
                   'options' => [
                     'left' => [
                       'title' => __( 'Text Left', 'creote-addons' ),
                       'icon' => 'fa fa-align-left',
                     ],
                     'center' => [
                       'title' => __( 'Text Center', 'creote-addons' ),
                       'icon' => 'fa fa-align-center',
                     ],
                     'right' => [
                       'title' => __( 'Text Right', 'creote-addons' ),
                       'icon' => 'fa fa-align-right',
                     ],
                   ],
                   'default' => 'center',
                   'toggle' => true,
                   'selectors' => [
                     '{{WRAPPER}}  .header_solo .header_content_collapse .navigation_menu  ' => 'text-align: {{VALUE}}!important;',
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
<header class="header header_solo"> <div class="navbar_togglers hamburger_menu"> <span class="line"></span> <span class="line"></span> <span class="line"></span> </div> <div class="header_content_collapse"> <div class="header_menu_box"> <div class="navigation_menu"> <?php if(!empty($settings['navigations'])): wp_nav_menu(array( 'menu' => $settings['navigations'], 'container' => false, 'menu_class' => 'navbar_nav', 'menu_id' => 'myNavbar_menu', 'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback', 'walker' => new \WP_Bootstrap_Navwalker() ) ); endif; ?> </div> </div> </div></header>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_menum_v1());