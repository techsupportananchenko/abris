<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_foo_contact_list_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-footer-contact-list-v1';
       }
       public function get_title()
       {
           return __('Contact V1', 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['105'];
       }
       protected function register_controls(){
           $this->start_controls_section('contact_foo_list_settings',
           [ 
               'label' => __('Contact Content', 'creote-addons'),
               'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
               'mail_icon',
               [
                   'label' => __('Icon', 'creote-addons'),
                   'type' => Controls_Manager::ICON,
                   'options' => get_creote_icon(),
                   'default' => __('icon-mail' , 'creote-addons'),
                    'condition' => [
                       'items_contact' => 'mail_id',
                    ]
               ]
           );
           $this->add_control(
   			'mail_id_title',
   			[
   				'label'       => esc_html__( 'Title', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
                   'default' =>  esc_html__( 'Mail Us' , 'creote-addons'),
                   'condition' => [
                       'items_contact' => 'mail_id'
                   ],
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
               'phone_icon',
               [
                   'label' => __('Icon', 'creote-addons'),
                   'type' => Controls_Manager::ICON,
                   'options' => get_creote_icon(),
                   'default' => __('icon-telephone' , 'creote-addons'),
                    'condition' => [
                       'items_contact' => 'phone_number',
                    ]
               ]
           );
           $this->add_control(
   			'phone_number_title',
   			[
   				'label'       => esc_html__( 'Title', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
                   'default' =>  esc_html__( 'Phone' , 'creote-addons'),
                   'condition' => [
                       'items_contact' => 'phone_number'
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
               'address_icon',
               [
                   'label' => __('Icon', 'creote-addons'),
                   'type' => Controls_Manager::ICON,
                   'options' => get_creote_icon(),
                   'default' => __('icon-location2' , 'creote-addons'),
                    'condition' => [
                       'items_contact' => 'address',
                    ]
               ]
           );
           $this->add_control(
   			'address_title',
   			[
   				'label'       => esc_html__( 'Title', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
                   'default' =>  esc_html__( 'Address' , 'creote-addons'),
                   'condition' => [
                       'items_contact' => 'address'
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
               'title_color',
               [
                   'label' => __( 'Title Color', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .footer_contact_list .same_contact .content h6  ' => 'color: {{VALUE}}!important',
                   ],
               ]
           );
           $this->add_control(
               'text_color',
               [
                   'label' => __( 'Content Color', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .footer_contact_list .same_contact a , {{WRAPPER}} .footer_contact_list .same_contact p  ' => 'color: {{VALUE}}!important',
                   ],
               ]
           );
           $this->add_control(
               'icon_color',
               [
                   'label' => __( 'Icon Color', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .footer_contact_list .same_contact span  ' => 'color: {{VALUE}}!important',
                   ],
               ]
           );
           $this->add_control(
               'icon_bg_color',
               [
                   'label' => __( 'Icon Bg Color', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .footer_contact_list .same_contact span  ' => 'background: {{VALUE}}!important',
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
<div class="footer_contact_list <?php echo esc_attr($settings['dark_white']); ?> type_one"> <?php if($settings['items_contact'] == 'phone_number'): ?> <div class="same_contact phone"> <?php if(!empty($settings['phone_icon'])): ?> <span class="<?php echo esc_attr($settings['phone_icon']); ?>"></span> <?php endif; ?> <div class="content"> <?php if(!empty($settings['phone_number_title'])): ?> <h6 class="titles"> <?php echo esc_attr($settings['phone_number_title']); ?></h6> <?php endif; ?> <?php if(!empty($settings['phone_number_text'])): ?> <a href="tel:<?php echo esc_attr($settings['phone_number_text']); ?>"><?php echo esc_attr($settings['phone_number_text']); ?></a> <?php endif; ?> </div> </div> <?php elseif($settings['items_contact'] == 'address'): ?> <div class="same_contact address"> <?php if(!empty($settings['address_icon'])): ?> <span class="<?php echo esc_attr($settings['address_icon']); ?>"></span> <?php endif; ?> <div class="content"> <?php if(!empty($settings['address_title'])): ?> <h6 class="titles"> <?php echo esc_attr($settings['address_title']); ?></h6> <?php endif; ?> <?php if(!empty($settings['address_text'])): ?> <p><?php echo esc_attr($settings['address_text']); ?></p> <?php endif; ?> </div> </div> <?php else: ?> <div class="same_contact mail"> <?php if(!empty($settings['mail_icon'])): ?> <span class="<?php echo esc_attr($settings['mail_icon']); ?>"></span> <?php endif; ?> <div class="content"> <?php if(!empty($settings['mail_id_title'])): ?> <h6 class="titles"> <?php echo esc_attr($settings['mail_id_title']); ?></h6> <?php endif; ?> <?php if(!empty($settings['mail_id_text'])): ?> <a href="mailto:<?php echo esc_attr($settings['mail_id_text']); ?>"><?php echo esc_attr($settings['mail_id_text']); ?></a> <?php endif; ?> </div> </div> <?php endif; ?></div>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_foo_contact_list_v1());