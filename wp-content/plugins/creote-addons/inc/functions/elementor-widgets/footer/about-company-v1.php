<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_about_company_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-about-company-v1';
       }
       public function get_title()
       {
           return __('About Company v1' , 'creote-addons');
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
   			'about_company_one_content',
   			[
   				'label' => esc_html__( 'Company Content', 'creote-addons' ),
   			]
           );
           $this->add_control(
               'logo',
               [
                   'label' => __('Company Logo', 'creote-addons'),
                   'type' => Controls_Manager::MEDIA,
                   'default' => [
                       'url' => CREOTE_ADDONS_URL. 'assets/images/logo-default.png',
                     ],
               ]
           );
           $this->add_control(
   			'logo_height',
   			[
   				'label' => __( 'Logo Width', 'creote-addons' ),
   				'type' => \Elementor\Controls_Manager::NUMBER,
   				'min' => 1,
   				'max' => 10000,
   				'step' => 1,
   				'default' => 150,
                   'selectors' => [
   					'{{WRAPPER}} .about_company .logo  img' => 'width: {{VALUE}}px',
   				],
   			]
   		);
           $this->add_control(
               'logo_link',
           [
               'label' => __('Logo Link', 'creote-addons'),
               'type' => Controls_Manager::URL,
               'placeholder' => __('https://your-link.com', 'creote-addons'),
               'show_external' => true,
               'default' => [
                   'url' => '#',
                   'is_external' => true,
                   'nofollow' => true,
               ],
           ]
           );  
           $this->add_control(
               'description',
               [
                   'label' => __('Description', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('Duty the obligations of business will frequently occur that pleasure have too repudiated annoyances  endures accepted.', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
               ]
           ); 
           $this->add_control(
               'need_help_image',
               [
                   'label' => __('Help Image', 'creote-addons'),
                   'type' => Controls_Manager::MEDIA,
                   'default' => [
                       'url' => CREOTE_ADDONS_URL. 'assets/images/authour-image.png',
                     ],
               ]
           );
           $this->add_control(
               'need_help_title',
               [
                   'label' => __('Help Title', 'creote-addons'),
                   'type' => Controls_Manager::TEXT,
                   'default' => __('Need Help?', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
               ]
           ); 
           $this->add_control(
               'need_help_description',
               [
                   'label' => __('Help Description', 'creote-addons'),
                   'type' => Controls_Manager::TEXT,
                   'default' => __('Free Consultation', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
               ]
           ); 
           $this->add_control(
               'link_box',
           [
               'label' => __('Help Link', 'creote-addons'),
               'type' => Controls_Manager::URL,
               'placeholder' => __('https://your-link.com', 'creote-addons'),
               'show_external' => true,
               'default' => [
                   'url' => '#',
                   'is_external' => true,
                   'nofollow' => true,
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
                 '{{WRAPPER}} .footer_widgets.about_company .content_in_r p , {{WRAPPER}} .footer_widgets.about_company .content_in_r .consulting .help_con h2 a' => 'color: {{VALUE}}',
             ],
         ]
     );
     $this->add_control(
         'color_two',
         [
             'label' => __( 'Color  Two', 'creote-addons' ),
             'type' => \Elementor\Controls_Manager::COLOR,
             'selectors' => [
                 '{{WRAPPER}} .footer_widgets.about_company .content_in_r .consulting .help_con h6' => 'color: {{VALUE}}',
             ],
         ]
     );
     $this->end_controls_section();
   	}
       protected function render() {
   		$settings = $this->get_settings_for_display();
           $allowed_tags = wp_kses_allowed_html('post');
           $target = $settings['link_box']['is_external'] ? ' target="_blank"' : '';
           $nofollow = $settings['link_box']['nofollow'] ? ' rel="nofollow"' : ''; 
           $logo_target = $settings['logo_link']['is_external'] ? ' target="_blank"' : '';
           $logo_nofollow = $settings['logo_link']['nofollow'] ? ' rel="nofollow"' : ''; 
   		?>
<div class="footer_widgets about_company <?php echo esc_attr($settings['dark_white']); ?>"> <div class="about_company_inner"> <?php if(!empty($settings['logo']['url'])): $logo = isset($settings['logo']['alt']) ? $settings['logo']['alt'] : ''; if(!empty($logo)) { $logo = $logo; }else{ $logo = 'image'; } ?> <div class="logo"> <a href="<?php echo esc_url($settings['logo_link']['url']); ?>" <?php echo esc_attr($logo_target); ?> <?php echo esc_attr($logo_nofollow); ?>> <img src="<?php echo esc_url($settings['logo']['url']); ?>" alt="<?php echo esc_attr($logo); ?>" /> </a> </div> <?php endif; ?> <div class="content_in_r"> <?php if(!empty($settings['description'])):?> <p> <?php echo wp_kses($settings['description'] , $allowed_tags) ?></p> <?php endif; ?> <div class="consulting"> <?php if(!empty($settings['need_help_image']['url'])): $image = isset($settings['need_help_image']['alt']) ? $settings['need_help_image']['alt'] : ''; if(!empty($image)) { $image = $image; }else{ $image = 'image'; } ?> <div class="image"> <img src="<?php echo esc_url($settings['need_help_image']['url']); ?>" alt="<?php echo esc_attr($image); ?>" /> </div> <?php endif; ?> <div class="help_con"> <?php if(!empty($settings['need_help_title'])):?> <h6><?php echo wp_kses($settings['need_help_title'] , $allowed_tags) ?></h6> <?php endif; ?> <?php if(!empty($settings['need_help_description'])):?> <h2> <a href="<?php echo esc_url($settings['link_box']['url']); ?>" <?php echo esc_attr($logo_target); ?> <?php echo esc_attr($logo_nofollow); ?>> <?php echo wp_kses($settings['need_help_description'] , $allowed_tags) ?> </a> </h2> <?php endif; ?> </div> </div> </div> </div></div>
<?php 
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_about_company_v1());