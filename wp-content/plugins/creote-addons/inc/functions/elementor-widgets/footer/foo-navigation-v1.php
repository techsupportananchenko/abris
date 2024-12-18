<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_foo_navigation_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-foo-navigation-v1';
       }
       public function get_title()
       {
           return __('Navigation v1' , 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['105'];
       }
       protected function register_controls() {
   		$this->start_controls_section(
   			'foo_navigation_content',
   			[
   				'label' => esc_html__( 'Navigation Content', 'creote-addons' ),
   			]
           );
           $this->add_control(
               'navigation_menu_styles',
               [
                   'label' => __('Navigation style', 'creote-addons'),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
                       'style_one' => __( 'Style One', 'creote-addons' ), 
                       'style_two' => __( 'Style Two', 'creote-addons' ),
                       'style_three' => __( 'Style Three', 'creote-addons' ), 
   			   	],
                   'default' => __('style_one' , 'creote-addons'),
               ]
           );
           $this->add_responsive_control(
               'dark_white',
               [
                 'label' => __( 'Service Color Type', 'creote-addons' ),
                 'type' => Controls_Manager::SELECT,
                 'options' => [
                   'dark_color' => __('Dark Color', 'creote-addons'), 
                   'light_color' => __('Light Color', 'creote-addons'),
                   ],
                  'default' => 'light_color',
               ]
             );
           $this->add_control(
   			'hr_one',
   			[
   				'type' => \Elementor\Controls_Manager::DIVIDER,
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
               'navigations_two',
               [
                   'label' => __('Select Navigation', 'creote-addons'),
                   'type' => Controls_Manager::SELECT2,
                   'options' => creote_navmenu(),
                   'condition' => [
                       'navigation_menu_styles' => 'style_three',
                     ],
               ]
           );
         $this->end_controls_section();
         $this->start_controls_section('css_changing',
         [ 
             'label' => __('Style', 'creote-addons'),
             'tab' =>Controls_Manager::TAB_STYLE,
         ]);
       $this->add_control(
           'color_two',
           [
               'label' => __( 'Color', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .footer_widgets.navigation_foo .navigation_foo_inner ul li a ' => 'color: {{VALUE}}',
               ],
           ]
       );
       $this->end_controls_section();
   	}
       protected function render() {
   		$settings = $this->get_settings_for_display();
           $allowed_tags = wp_kses_allowed_html('post');
   		?>
<div class="footer_widgets clearfix navigation_foo <?php echo esc_attr($settings['dark_white']); ?> <?php echo esc_attr($settings['navigation_menu_styles']); ?>"> <?php if($settings['navigation_menu_styles'] == 'style_two'): ?> <div class="navigation_foo_box"> <div class="navigation_foo_inner"> <?php if(!empty($settings['navigations'])): wp_nav_menu(array( 'menu' => $settings['navigations'], ) ); endif; ?> </div> </div> <?php elseif($settings['navigation_menu_styles'] == 'style_three'): ?> <div class="navigation_foo_box"> <div class="navigation_foo_inner"> <div class="left"> <?php if(!empty($settings['navigations'])): wp_nav_menu(array( 'menu' => $settings['navigations'], ) ); endif; ?> </div> <div class="right"> <?php if(!empty($settings['navigations_two'])): wp_nav_menu(array( 'menu' => $settings['navigations_two'], ) ); endif; ?> </div> </div> </div> <?php else: ?> <div class="navigation_foo_box"> <div class="navigation_foo_inner"> <?php if(!empty($settings['navigations'])): wp_nav_menu(array( 'menu' => $settings['navigations'], ) ); endif; ?> </div> </div> <?php endif; ?></div>
<?php 
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_foo_navigation_v1());