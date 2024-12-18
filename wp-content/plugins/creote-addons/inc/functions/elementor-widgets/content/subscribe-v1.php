<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_subscribe_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-subscribe-v1';
       }
       public function get_title()
       {
           return __('Newsletter V1' , 'creote-addons');
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
               'subscribe_content',
               [
                   'label' => __('Subscribe  Content', 'creote-addons')
               ]
           );
           $this->add_control(
             'subscribe_style_two',
             [
               'label'   => esc_html__( 'Choose Style', 'creote-addons' ),
               'type'    => Controls_Manager::SELECT,
               'default' => 'type_one',
               'options' => array(
                 'type_one' => esc_html__( 'Style One', 'creote-addons' ),
                 'type_two' => esc_html__( 'Style Two', 'creote-addons' ),
                 'type_three' => esc_html__( 'Style Three', 'creote-addons' ),
                ),
                ]
             );
             $this->add_control(
               'subscribe_high',
               [
                  'label'       => esc_html__( 'Highlight Text', 'creote-addons' ),
                  'type'        => Controls_Manager::TEXTAREA,
                  'default' =>  esc_html__( 'Updates on products' , 'creote-addons'),
                  'condition' => [
                     'subscribe_style_two' => ['type_three'],
                  ], 
               ]
              );
           $this->add_control(
   			'subscribe_title',
   			[
   				'label'       => esc_html__( 'Subscribe Title', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
               'default' =>  esc_html__( 'Subscribe to creote' , 'creote-addons'),   
   			]
           );
           $this->add_control(
               'subscribe_description',
               [
               	'label'       => esc_html__( 'Quotes Description', 'creote-addons' ),
   				   'type'        => Controls_Manager::TEXTAREA,
                  'default' =>  esc_html__( 'Get the latest posts delivers right to your inbox' , 'creote-addons'),
               ]
           );
           $this->add_control(
               'subscribe_shortcode',
               [
               	'label'       => esc_html__( 'Shortcode', 'creote-addons' ),
   				   'type'        => Controls_Manager::TEXTAREA,
                  'default' =>  esc_html__( '[mc4wp_form id="1174"]' , 'creote-addons'),
                  'placeholder'  =>  esc_html__( '[mc4wp_form id="1174"]' , 'creote-addons'),
               ]
           );
           $this->add_control(
   			'padding_sub',
   			[
   				'label' => __( 'Content Padding', 'creote-addons' ),
   				'type' => Controls_Manager::DIMENSIONS,
   				'size_units' => [ 'px', '%', 'em' ],
   				'selectors' => [
   					'{{WRAPPER}} .newsteller.style_one , {{WRAPPER}} .newsteller.style_two' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
   				],
               'condition' => [
                  'subscribe_style_two' => ['type_one' , 'type_two'],
               ], 
   			]
   		);
           $this->add_control(
               'background_image',
               [
                   'label' => __('Background Image', 'creote-addons'),
                   'type' => Controls_Manager::MEDIA,
                   'default' => [
                       'url' => \Elementor\Utils::get_placeholder_image_src(),
                   ],
                  'condition' => [
                     'subscribe_style_two' => 'type_two',
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
<?php if($settings['subscribe_style_two'] == 'type_two'): ?><section class="newsteller style_two" <?php if(!empty($settings['background_image']['url'])): ?> style="background-image:url(<?php echo esc_url($settings['background_image']['url']); ?>)" <?php endif; ?>> <div class="auto-container"> <div class="inner_stell"> <div class="row"> <div class="col-md-12"> <div class="content"> <?php if(!empty($settings['subscribe_title'])):?> <h2><?php echo wp_kses($settings['subscribe_title'] , $allowed_tags); ?></h2> <?php endif;?> <?php if(!empty($settings['subscribe_description'])):?> <p><?php echo wp_kses($settings['subscribe_description'] , $allowed_tags); ?> </p> <?php endif;?> </div> <div class="item_scubscribe"> <div class="input_group"> <?php echo do_shortcode( $settings['subscribe_shortcode'] );?> </div> </div> </div> </div> </div> </div></section><?php elseif($settings['subscribe_style_two'] == 'type_three'): ?><section class="newsteller style_three"> <div class="auto-container"> <div class="row"> <div class="col-lg-12 col-md-12"> <div class="content"> <?php if(!empty($settings['subscribe_high'])):?> <h6><?php echo wp_kses($settings['subscribe_high'] , $allowed_tags); ?></h6> <?php endif;?> <?php if(!empty($settings['subscribe_title'])):?> <h2><?php echo wp_kses($settings['subscribe_title'] , $allowed_tags); ?></h2> <?php endif;?> <?php if(!empty($settings['subscribe_description'])):?> <p><?php echo wp_kses($settings['subscribe_description'] , $allowed_tags); ?> </p> <?php endif;?> </div> </div> <div class="col-lg-12 col-md-12"> <div class="item_scubscribe"> <div class="input_group"> <?php echo do_shortcode( $settings['subscribe_shortcode'] );?> </div> </div> </div> </div> </div></section><?php else: ?> <section class="newsteller style_one"> <div class="auto-container"> <div class="row"> <div class="col-lg-6 col-md-12"> <div class="content"> <?php if(!empty($settings['subscribe_title'])):?> <h2><?php echo wp_kses($settings['subscribe_title'] , $allowed_tags); ?></h2> <?php endif;?> <?php if(!empty($settings['subscribe_description'])):?> <p><?php echo wp_kses($settings['subscribe_description'] , $allowed_tags); ?> </p> <?php endif;?> </div> </div> <div class="col-lg-6 col-md-12"> <div class="item_scubscribe"> <div class="input_group"> <?php echo do_shortcode( $settings['subscribe_shortcode'] );?> </div> </div> </div> </div> </div></section><?php endif; ?>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_subscribe_v1());