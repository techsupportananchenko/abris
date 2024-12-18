<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_contact_form_footer_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-contact-form-footer-v1';
       }
       public function get_title()
       {
           return __('Footer Form   V1' , 'creote-addons');
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
   			'contact_form',
   			[
   				'label' => esc_html__( 'Contact Form', 'creote-addons' ),
   			]
           );
           $this->add_control(
   			'dark_light',
   			[
   				'label'   => esc_html__( 'Dark / Light', 'creote-addons' ),
   				'type'    => Controls_Manager::SELECT,
   				'default' => 'light_c',
   				'options' => array(
   					'light_c' => esc_html__( 'Light Color', 'creote-addons' ),
             'dark_c' => esc_html__( 'Dark Color', 'creote-addons' ),
   				),
   			]
           );
           $this->add_control(
   			'title',
   			[
   				'label'       => __( 'Title', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
                   'default' => __( 'Contact Us', 'creote-addons' ),
   				'placeholder' => __( 'Contact Us', 'creote-addons' ),
   			]
          );
         $this->add_control(
   			'contact_form_url',
   			[
   				'label'       => __( 'Contact Form 7 Url', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
   				'dynamic'     => [
   					'active' => true,
   				],
   				'placeholder' => __( 'Enter your Contact Form 7 Url', 'creote-addons' )
   			]
         );
           $this->end_controls_section();
   	}
       protected function render() {
   		$settings = $this->get_settings_for_display();
           $allowed_tags = wp_kses_allowed_html('post');
   		?>
<section class="footer_contact_form <?php echo esc_attr($settings['dark_light']); ?> type_one" > <div class="form_box_foo"> <?php if(!empty($settings['title'])): ?> <h2> <?php echo wp_kses( $settings['title'] , $allowed_tags);?></h2> <?php endif; ?> <div class="contact_form_shortcode"> <?php echo do_shortcode( $settings['contact_form_url'] );?> </div> </div></section>
<?php 
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_contact_form_footer_v1());