<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_offer_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-offer-v1';
       }
       public function get_title()
       {
           return __('Offer V1' , 'creote-addons');
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
               'offer_content',
               [
                   'label' => __('Content', 'creote-addons')
               ]
           );
           $this->add_control(
   			'sm_title',
   			[
   				'label'       => esc_html__( 'Small Title', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
                'default' =>  esc_html__( 'Need Some Help?' , 'creote-addons'),    
   			]
           );
           $this->add_control(
   			'title',
   			[
   				'label'       => esc_html__( 'Title', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
                   'default' =>  esc_html__( 'Need Some Help?' , 'creote-addons'),
   			]
           );
           $this->add_control(
   			'button_text',
   			[
   				'label'       => esc_html__( 'Button Text', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                'default' =>  esc_html__( 'Contact us' , 'creote-addons'),
            ]);
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
           ]); 
           $this->add_control(
            'coundowntext',
            [
                'label'       => esc_html__( 'Offer Date & Timinig', 'creote-addons' ),
                'type'        => Controls_Manager::TEXT,
                'default' =>  esc_html__( 'Feb 15 2022 23:59:59' , 'creote-addons'),
            ]
          );
          $this->add_control(
            'image',
            [
              'label' => __( 'Image', 'creote-addons' ),
              'type' => Controls_Manager::MEDIA,
              'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
              ],       
          ]);
        $this->end_controls_section();    
        $this->start_controls_section('slider_v1_css',
        [ 
            'label' => __('Custom Css', 'creote-addons') ,
            'tab' =>Controls_Manager::TAB_STYLE,
        ]
        );
        $this->add_control(
          'heading_color',
           [
              'label' => __('Heading Color', 'creote-addons'),
              'type' => Controls_Manager::COLOR,
              'selectors' => [
                '{{WRAPPER}} .offer h1  ' => 'color: {{VALUE}}!important;',
              ],
           ]
        );
        $this->add_control(
          'small_heading_color',
           [
              'label' => __('Small Heading Color', 'creote-addons'),
              'type' => Controls_Manager::COLOR,
              'selectors' => [
                '{{WRAPPER}} .offer h6 ' => 'color: {{VALUE}}!important;',
              ],
           ]
        );
        $this->add_control(
          'description_color',
            [
              'label' => __('Description Color', 'creote-addons'),
              'type' => Controls_Manager::COLOR,
              'selectors' => [
                '{{WRAPPER}} .offer p ' => 'color: {{VALUE}}!important;',
              ],  
             ]
          );
          $this->add_control(
            'button_color',
              [
                'label' => __('Button Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                  '{{WRAPPER}} .offer .bottom_content a ' => 'color: {{VALUE}}!important;',
                ],  
            ]
        );
        $this->add_control(
            'button_bg_color',
              [
                'label' => __('Button Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                  '{{WRAPPER}} .offer .bottom_content a ' => 'background: {{VALUE}}!important;',
                ],  
            ]
        );
        $this->add_control(
            'titme_color',
              [
                'label' => __('Time Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                  '{{WRAPPER}} .offer .bottom_content a ' => 'color: {{VALUE}}!important;',
                ],  
            ]
        );
          $this->end_controls_section();
       }
protected function render(){
$settings = $this->get_settings_for_display();
$allowed_tags = wp_kses_allowed_html('post');
?>
 <div class="offer style_one"> <div class="row"> <div class="col-lg-6 col-md-12"> <div class="left_content"> <div class="main_content"> <h6><?php echo wp_kses($settings['sm_title'] , $allowed_tags);?></h6> <h1><?php echo wp_kses($settings['title'] , $allowed_tags);?></h1> <div class="counter_section"> <div class="Countdown-timer"> <div class="countdown" data-date="<?php echo esc_html($settings['coundowntext']); ?>"> <div class="item"> <span data-days><?php echo esc_html('0'); ?></span> <p><?php echo esc_html__('days'); ?></p> <small class="cuot">:</small> </div> <div class="item"> <span data-hours><?php echo esc_html('0'); ?></span> <p><?php echo esc_html__('hours'); ?></p> <small class="cuot">:</small> </div> <div class="item"> <span data-minutes><?php echo esc_html('0'); ?></span> <p><?php echo esc_html__('minutes'); ?></p> <small class="cuot">:</small> </div> <div class="item"> <span data-seconds><?php echo esc_html('0'); ?></span> <p><?php echo esc_html__('seconds'); ?></p> </div> </div> </div> </div> <div class="bottom_content"> <div class="button_content"> <?php $target = $settings['button_link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <a href="<?php echo esc_url($settings['button_link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn one"> <?php echo esc_html($settings['button_text']);?> </a> </div> </div> </div> </div> </div> <div class="col-lg-6 col-md-12"> <?php if(!empty($settings['image']['url'])): $image = isset($settings['image']['alt']) ? $settings['image']['alt'] : ''; if(!empty($image)) { $image = $image; }else{ $image = 'image'; } ?> <div class="image"> <img src="<?php echo esc_url($settings['image']['url']); ?>" class="img" alt="<?php echo esc_attr($image); ?>" /> </div> <?php endif; ?> </div> </div></div>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_offer_v1());