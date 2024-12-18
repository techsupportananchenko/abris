<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_contact_list_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-contact-list-v1';
       }
       public function get_title()
       {
           return __('Contact List', 'creote-addons');
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
           $this->start_controls_section('contact_list_settings',
           [ 
               'label' => __('Contact Content', 'creote-addons'),
               'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
           ]
           );
           $this->add_control(
               'contact_list_style',
               [
                 'label'   => esc_html__( 'Contact Style', 'creote-addons' ),
                 'type'    => Controls_Manager::SELECT,
                 'default' => 'type_one',
                 'options' => array(
                   'type_one' => esc_html__( 'Style One', 'creote-addons' ),
                   'type_two' => esc_html__( 'Style Two', 'creote-addons' ),
                  ),
                  ]
           );
           $this->add_control(
               'items_contact',
               [
                 'label'   => esc_html__( 'Select Items', 'creote-addons' ),
                 'type'    => Controls_Manager::SELECT,
                 'default' => 'mail_id',
                 'options' => array(
                   'mail_id' => esc_html__( 'Mail Id', 'creote-addons' ),
                   'phone_number' => esc_html__( 'Phone Number', 'creote-addons' ),
                   'address' => esc_html__( 'Address', 'creote-addons' ),
                  ),
                  ]
           );
           $this->add_control(
   			'mail_id_text',
   			[
   				'label'       => esc_html__( 'Mail Id', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
                   'default' =>  esc_html__( 'sendmail@creote.com' , 'creote-addons'),
                   'condition' => [
                       'items_contact' => 'mail_id'
                   ],
   			]
           );
           $this->add_control(
   			'phone_number_text',
   			[
   				'label'       => esc_html__( 'Phone Number', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
                   'default' =>  esc_html__( '+98 060 712 34 ' , 'creote-addons'),
                   'condition' => [
                       'items_contact' => 'phone_number'
                   ],
   			]
           );
           $this->add_control(
   			'address_text',
   			[
   				'label'       => esc_html__( 'Address', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
                   'default' =>  esc_html__( '61W Business Str Hobert, LA ' , 'creote-addons'),
                   'condition' => [
                       'items_contact' => 'address'
                   ],
   			]
           );
           $this->add_control(
               'text_color',
               [
                   'label' => __( 'Color', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .contact_list .same_contact a , {{WRAPPER}} .contact_list .same_contact p  ' => 'color: {{VALUE}}',
                   ],
               ]
           );
           $this->add_control(
               'icon_color',
               [
                   'label' => __( 'Icon Color', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .contact_list .same_contact a span , {{WRAPPER}} .contact_list .same_contact p span  ' => 'color: {{VALUE}}',
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
<div class="contact_list <?php echo esc_attr($settings['contact_list_style']); ?>"> <?php if($settings['items_contact'] == 'phone_number'): ?> <div class="same_contact phone"> <a href="tel:<?php echo esc_attr($settings['phone_number_text']); ?>"><span class="icon-phone-call"></span><?php echo esc_attr($settings['phone_number_text']); ?></a> </div> <?php elseif($settings['items_contact'] == 'address'): ?> <div class="same_contact address"> <p><span class="icon-placeholder"></span><?php echo esc_attr($settings['address_text']); ?></p> </div> <?php else: ?> <div class="same_contact mail"> <a href="mailto:<?php echo esc_attr($settings['mail_id_text']); ?>"><span class="icon-email"></span><?php echo esc_attr($settings['mail_id_text']); ?></a> </div> <?php endif; ?></div>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_contact_list_v1());