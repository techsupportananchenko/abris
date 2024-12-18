<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_simple_image_box_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-simple-image-box-v1';
       }
       public function get_title()
       {
           return __('Simple Image V1' , 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['102'];
       } 
      protected function register_controls() {
   		$this->start_controls_section(
   			'simple_image_content',
   			[
   				'label' => esc_html__( 'Image Content', 'creote-addons' ),
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
           $this->add_control(
               'parallax_enable',
              [
                 'label' => __('Parallax Enable', 'creote-addons'),
                  'type' => Controls_Manager::SWITCHER,
                  'label_on' => __('Yes', 'creote-addons'),
                  'label_off' => __('No', 'creote-addons'),
                  'return_value' => 'yes',
                  'default' => 'yes',
               ]
             );
         $this->add_control(
   			'img_height',
   			[
   				'label' => __( 'Image Height', 'creote-addons' ),
   				'type' => \Elementor\Controls_Manager::NUMBER,
   				'min' => 1,
   				'max' => 10000,
   				'step' => 1,
   				'default' => 400,
                   'selectors' => [
   					'{{WRAPPER}} .simple_image_boxes ' => 'height: {{VALUE}}px',
   				],
   			]
   		);
           $this->add_control(
   			'border_radius',
   			[
   				'label' => __( 'Border Radius', 'creote-addons' ),
   				'type' => Controls_Manager::DIMENSIONS,
   				'size_units' => [ 'px', '%', 'em' ],
   				'selectors' => [
   					'{{WRAPPER}} .simple_image_boxes , {{WRAPPER}} .simple_image_boxes img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
   				],
   			]
   		);
         $this->add_control(
           'transitions_enable',
          [
             'label' => __('Transitions Enable', 'creote-addons'),
              'type' => Controls_Manager::SWITCHER,
              'label_on' => __('Yes', 'creote-addons'),
              'label_off' => __('No', 'creote-addons'),
              'return_value' => 'yes',
              'default' => 'yes',
           ]
         );
         $this->add_responsive_control(
           'transitions',
           [
             'label' => __( 'Transitions', 'creote-addons' ),
             'type' => Controls_Manager::SELECT,
             'options' => [
               '0' => __('0ms', 'creote-addons'), 
               '100' => __('100ms', 'creote-addons'),
               '200' => __('200ms', 'creote-addons'),
               '300' => __('300ms', 'creote-addons'),
               '400' => __('400ms', 'creote-addons'),
               '500' => __('500ms', 'creote-addons'),
               '600' => __('600ms', 'creote-addons'),
               '700' => __('700ms', 'creote-addons'),
               '800' => __('800ms', 'creote-addons'),
               '900' => __('900ms', 'creote-addons'),
               '1000' => __('1000ms', 'creote-addons'),
               ],
              'default' => '0',
              'condition' => [
               'transitions_enable' => 'yes',
             ],
           ]
         );
  $this->end_controls_section();
}
protected function render() {
  $settings = $this->get_settings_for_display();
  $allowed_tags = wp_kses_allowed_html('post');
?>
<?php if(!empty($settings['image']['url'])): 
   $image = 'alt';
   $image = isset($settings['image']['alt']) ? $settings['image']['alt'] : '';
   if(!empty($image)) {
     $image = $image;
   }
  ?>
<div class="simple_image_boxes <?php if($settings['parallax_enable'] == 'yes'):  ?> parallax_cover<?php endif;?>" <?php if($settings['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>"  data-aos-offset="0" <?php endif;?>>
   <img src="<?php echo esc_url($settings['image']['url']); ?>" class="simp_img <?php if($settings['parallax_enable'] == 'yes'):  ?>cover-parallax<?php endif;?>" alt="<?php echo esc_attr($image); ?>" />
</div>
<?php endif; ?>
<?php 
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_simple_image_box_v1());