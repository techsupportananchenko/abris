<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_foo_grt_intouch_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-getinto-touch-v1';
       }
       public function get_title()
       {
           return __('Get Into Touch v1' , 'creote-addons');
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
   			'get_in_touch_content',
   			[
   				'label' => esc_html__( 'Get In Touch Content', 'creote-addons' ),
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
               'address_title',
               [
                   'label' => __('Address Title', 'creote-addons'),
                   'type' => Controls_Manager::TEXT,
                   'default' => __('Location', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
               ]
           ); 
           $this->add_control(
               'address_content',
               [
                   'label' => __('Address Content', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('280 Granite Run Drive Suite #200
                   Lancaster, PA 1760', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
               ]
           ); 
           $this->add_control(
   			'hr_two',
   			[
   				'type' => \Elementor\Controls_Manager::DIVIDER,
   			]
   		);
           $this->add_control(
               'contact_title',
               [
                   'label' => __('Contact Title', 'creote-addons'),
                   'type' => Controls_Manager::TEXT,
                   'default' => __('Contact', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
               ]
           ); 
           $this->add_control(
               'phone_title',
               [
                   'label' => __('Phone Title', 'creote-addons'),
                   'type' => Controls_Manager::TEXT,
                   'default' => __('Phone :'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
               ]
           ); 
           $this->add_control(
               'phone_number',
               [
                   'label' => __('Phone Number', 'creote-addons'),
                   'type' => Controls_Manager::TEXT,
                   'default' => __('+98 060 712 34'),
                   'placeholder' => __('Type your Phone Number here', 'creote-addons'),
               ]
           ); 
           $this->add_control(
               'mail_title',
               [
                   'label' => __('Mail Title', 'creote-addons'),
                   'type' => Controls_Manager::TEXT,
                   'default' => __('Mail Us :'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
               ]
           ); 
           $this->add_control(
               'mail_id',
               [
                   'label' => __('Mail Id', 'creote-addons'),
                   'type' => Controls_Manager::TEXT,
                   'default' => __('sendmail@creote.com'),
                   'placeholder' => __('Type your Mail Id here', 'creote-addons'),
               ]
           ); 
         $this->end_controls_section();
         $this->start_controls_section('css_changing',
         [ 
             'label' => __('Style', 'creote-addons'),
             'tab' =>Controls_Manager::TAB_STYLE,
         ]);
         $this->add_control(
           'color_one',
           [
               'label' => __( 'Color  One', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .footer_widgets.get_in_touch_foo .foo_cont_inner .top h6,  {{WRAPPER}} 
                   .footer_widgets.get_in_touch_foo .foo_cont_inner .bottom h6 ,  {{WRAPPER}}  .footer_widgets.get_in_touch_foo .foo_cont_inner .bottom .con_content h5' => 'color: {{VALUE}}',
               ],
           ]
       );
       $this->add_control(
           'color_two',
           [
               'label' => __( 'Color  Two', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .footer_widgets.get_in_touch_foo .foo_cont_inner .top p , {{WRAPPER}} .footer_widgets.get_in_touch_foo .foo_cont_inner .bottom .con_content a' => 'color: {{VALUE}}',
               ],
           ]
       );
       $this->end_controls_section();
   	}
       protected function render() {
   		$settings = $this->get_settings_for_display();
           $allowed_tags = wp_kses_allowed_html('post');
   		?>
<div class="footer_widgets get_in_touch_foo <?php echo esc_attr($settings['dark_white']); ?>"> <div class="get_intouch_inrfo"> <div class="foo_cont_inner"> <div class="top"> <?php if(!empty($settings['address_title'])):?> <h6> <?php echo wp_kses($settings['address_title'] , $allowed_tags) ?></h6> <?php endif; ?> <?php if(!empty($settings['address_content'])):?> <p> <?php echo wp_kses($settings['address_content'] , $allowed_tags) ?></p> <?php endif; ?> </div> <div class="bottom"> <?php if(!empty($settings['contact_title'])):?> <h6> <?php echo wp_kses($settings['contact_title'] , $allowed_tags) ?></h6> <?php endif; ?> <div class="con_content"> <?php if(!empty($settings['phone_title'])):?> <h5> <?php echo wp_kses($settings['phone_title'] , $allowed_tags) ?></h5> <?php endif; ?> <?php if(!empty($settings['phone_number'])):?> <a href="tel:<?php echo esc_attr($settings['phone_number']); ?>"> <?php echo wp_kses($settings['phone_number'] , $allowed_tags) ?></a> <?php endif; ?> </div> <div class="con_content"> <?php if(!empty($settings['mail_title'])):?> <h5> <?php echo wp_kses($settings['mail_title'] , $allowed_tags) ?></h5> <?php endif; ?> <?php if(!empty($settings['mail_id'])):?> <a href="mailto:<?php echo esc_attr($settings['mail_id']); ?>"> <?php echo wp_kses($settings['mail_id'] , $allowed_tags) ?></a> <?php endif; ?> </div> </div> </div> </div></div>
<?php 
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_foo_grt_intouch_v1());