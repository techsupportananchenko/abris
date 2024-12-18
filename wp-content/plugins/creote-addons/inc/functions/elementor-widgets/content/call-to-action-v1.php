<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_call_to_action_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-call-to-action-v1';
       }
       public function get_title()
       {
           return __('Call To Action V1' , 'creote-addons');
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
               'call_to_action_content',
               [
                   'label' => __('Content', 'creote-addons')
               ]
           );
           $this->add_control(
   			'call_to_action_styles',
   			[
   				'label'   => esc_html__( 'Call To Action  Style', 'creote-addons' ),
   				'type'    => Controls_Manager::SELECT,
   				'default' => 'style_one',
   				'options' => array(
   					'style_one' => esc_html__( 'Style One', 'creote-addons' ),
   					'style_two' => esc_html__( 'Style Two', 'creote-addons' ), 
   				),
   			]
           );
           $this->add_control(
            'smtitle_tag',
            [
                'label' => __(' Small Title Tag', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'div' => __( 'Div Tag', 'creote-addons' ),
                    'h1' => __( 'H1 Tag', 'creote-addons' ),
                    'h2' => __( 'H2 Tag', 'creote-addons' ),  
                    'h3' => __( 'H3 Tag', 'creote-addons' ),    
                    'h4' => __( 'H4 Tag', 'creote-addons' ), 
                    'h5' => __( 'H5 Tag', 'creote-addons' ),
                    'h6' => __( 'H6 Tag', 'creote-addons' ),
               ],
                'default' => __('div' , 'creote-addons'),
                'condition' => [
                    'call_to_action_styles' => 'style_one',
                ],
            ]
        );
           $this->add_control(
   			'sm_title',
   			[
   				'label'       => esc_html__( 'Small Title', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
                   'default' =>  esc_html__( 'Need Some Help?' , 'creote-addons'),
                   'condition' => [
                       'call_to_action_styles' => 'style_one',
                   ],
   			]
           );
           $this->add_control(
            'title_tag',
            [
                'label' => __(' Title Tag', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'div' => __( 'Div Tag', 'creote-addons' ),
                    'h1' => __( 'H1 Tag', 'creote-addons' ),
                    'h2' => __( 'H2 Tag', 'creote-addons' ),  
                    'h3' => __( 'H3 Tag', 'creote-addons' ),    
                    'h4' => __( 'H4 Tag', 'creote-addons' ), 
                    'h5' => __( 'H5 Tag', 'creote-addons' ),
                    'h6' => __( 'H6 Tag', 'creote-addons' ),
               ],
                'default' => __('div' , 'creote-addons'),
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
   			'description',
   			[
   				'label'       => esc_html__( 'Description', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
                   'default' =>  esc_html__( 'Whether you’re stuck or just want some tips on where to start, hit up our experts anytime.' , 'creote-addons'),
                   'condition' => [
                       'call_to_action_styles' => 'style_one',
                   ],
   			]
           );
           $this->add_control(
   			'button_text',
   			[
   				'label'       => esc_html__( 'Button Text', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( 'Contact us' , 'creote-addons'),
                   'condition' => [
                       'call_to_action_styles' => 'style_one',
                   ],
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
               'condition' => [
                   'call_to_action_styles' => 'style_one',
               ],
           ]);  
           $this->add_control(
               'icon_fonts',
               [
                   'label' => __('Icon', 'creote-addons'),
                   'type' => Controls_Manager::ICON,
                   'options' => get_creote_icon(),
                   'default' => __('icon-phone-call1' , 'creote-addons'),
               ]
           );
           $this->add_control(
   			'contact_title',
   			[
   				'label'       => esc_html__( 'Contact Title', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( 'Contact Us Soon' , 'creote-addons'),
   			]
           );
           $this->add_control(
            'ctitle_tag',
            [
                'label' => __('Contact Title Tag', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'div' => __( 'Div Tag', 'creote-addons' ),
                    'h1' => __( 'H1 Tag', 'creote-addons' ),
                    'h2' => __( 'H2 Tag', 'creote-addons' ),  
                    'h3' => __( 'H3 Tag', 'creote-addons' ),    
                    'h4' => __( 'H4 Tag', 'creote-addons' ), 
                    'h5' => __( 'H5 Tag', 'creote-addons' ),
                    'h6' => __( 'H6 Tag', 'creote-addons' ),
               ],
                'default' => __('div' , 'creote-addons'),
            ]
        );
           $this->add_control(
   			'mail_id',
   			[
   				'label'       => esc_html__( 'Mail Id', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( 'creote@support.com' , 'creote-addons'),
   			]
           );
           $this->add_control(
   			'phone_num',
   			[
   				'label'       => esc_html__( 'Phone Number', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( '16599349993' , 'creote-addons'),
   			]
           );
           $this->add_control(
               'video_link_enable',
              [
                 'label' => __('Video Enable', 'creote-addons'),
                  'type' => Controls_Manager::SWITCHER,
                  'label_on' => __('Yes', 'creote-addons'),
                  'label_off' => __('No', 'creote-addons'),
                  'return_value' => 'yes',
                  'default' => 'yes',
                  'condition' => [
                   'call_to_action_styles' => 'style_one',
               ],
              ]
           );
           $this->add_control(
               'video_link',
               [
               'label'       => esc_html__( 'Video Link', 'creote-addons' ),
               'type'        => Controls_Manager::TEXT,
               'default' =>  esc_html__( '#' , 'creote-addons'),
               'condition' => [
                   'video_link_enable' => 'yes',
               ],
           ]);
           $this->add_control(
   			'image',
   			[
   				'label' => __( 'Image', 'creote-addons' ),
   				'type' => Controls_Manager::MEDIA,
   				'default' => [
   					'url' => \Elementor\Utils::get_placeholder_image_src(),
   				],
                   'condition' => [
                       'call_to_action_styles' => 'style_two',
                   ],
   			]
           );
           $this->add_responsive_control(
               'image_mar_st_two',
               [
                 'label' => __( 'Image Margin', 'creote-addons' ),
                 'type' => Controls_Manager::DIMENSIONS,
                 'size_units' => [ 'px', '%', 'em' ],
                 'selectors' => [
                   '{{WRAPPER}} .call_to_action.style_two .image_right ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                 ],
                 'condition' => [
                   'call_to_action_styles' => 'style_two',
               ],
               ]
           );
           $this->add_control(
   			'background_left',
   			[
   				'label' => __( 'Background Image', 'creote-addons' ),
   				'type' => Controls_Manager::MEDIA,
   				'default' => [
   					'url' => \Elementor\Utils::get_placeholder_image_src(),
   				],
   			]
           );
        $this->end_controls_section();    
       }
protected function render(){
    $settings = $this->get_settings_for_display();
    $allowed_tags = wp_kses_allowed_html('post');
?>
<?php if($settings['call_to_action_styles'] == 'style_two'): ?><div class="call_to_action style_two"> <?php if(!empty($settings['background_left']['url'])): $background_left = isset($settings['background_left']['alt']) ? $settings['background_left']['alt'] : ''; if(!empty($background_left)) { $background_left = $background_left; }else{ $background_left = 'image'; } ?> <div class="image parallax_cover"> <img src="<?php echo esc_url($settings['background_left']['url']); ?>" class="cover-parallax" alt="<?php echo esc_attr($background_left); ?>" /> </div> <?php endif; ?> <div class="auto-container"> <div class="row"> <div class="col-lg-8"> <div class="left_content"> <div class="main_content"> <<?php echo esc_attr($settings['title_tag']); ?> class="title_g"><?php echo esc_html($settings['title']);?></<?php echo esc_attr($settings['title_tag']); ?>> <div class="bottom_content"> <div class="call_content"> <span class="<?php echo esc_html($settings['icon_fonts']);?> icon"></span> <div class="content_bx"> <<?php echo esc_attr($settings['ctitle_tag']); ?> class="contitle"><?php echo esc_html($settings['contact_title']);?></<?php echo esc_attr($settings['ctitle_tag']); ?>> <p><a href="mailto:<?php echo esc_html($settings['mail_id']); ?>"><?php echo esc_html($settings['mail_id']); ?></a> <?php echo esc_html__('&' , 'creote-addons'); ?> <a href="tel:<?php echo esc_html($settings['phone_num']); ?>"><?php echo esc_html($settings['phone_num']); ?></a></p> </div> </div> </div> </div> </div> </div> <div class="col-lg-4"> <?php if(!empty($settings['image']['url'])): $image = isset($settings['image']['alt']) ? $settings['image']['alt'] : ''; if(!empty($image)) { $image = $image; }else{ $image = 'image'; } ?> <div class="image_right"> <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr($image); ?>" /> </div> <?php endif; ?> </div> </div> </div></div><?php else: ?> <div class="call_to_action style_one"> <?php if(!empty($settings['background_left']['url'])): $background_left = isset($settings['background_left']['alt']) ? $settings['background_left']['alt'] : ''; if(!empty($background_left)) { $background_left = $background_left; }else{ $background_left = 'image'; } ?> <div class="image parallax_cover"> <img src="<?php echo esc_url($settings['background_left']['url']); ?>" class="cover-parallax" alt="<?php echo esc_attr($background_left); ?>" /> </div> <?php endif; ?> <div class="auto-container"> <div class="row"> <div class="col-lg-12"> <div class="left_content"> <div class="main_content"> <?php if($settings['video_link_enable'] == true): ?> <div class="video_box"> <a href="<?php echo esc_attr($settings['video_link']); ?>" class="lightbox-image"><i class="icon-play"></i></a> </div> <?php endif; ?> <<?php echo esc_attr($settings['smtitle_tag']); ?> class="sm_title"><?php echo esc_html($settings['sm_title']);?></<?php echo esc_attr($settings['smtitle_tag']); ?>> <<?php echo esc_attr($settings['title_tag']); ?> class="title_g"><?php echo esc_html($settings['title']);?></<?php echo esc_attr($settings['title_tag']); ?>> <p><?php echo esc_html($settings['description']);?></p> <div class="bottom_content"> <div class="button_content"> <?php $target = $settings['button_link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <a href="<?php echo esc_url($settings['button_link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn three"> <?php echo esc_html($settings['button_text']);?><i class="icon-right-arrow-long"></i> </a> </div> <div class="call_content"> <span class="<?php echo esc_html($settings['icon_fonts']);?> icon"></span> <div class="content_bx"> <<?php echo esc_attr($settings['ctitle_tag']); ?> class="contitle"><?php echo esc_html($settings['contact_title']);?></<?php echo esc_attr($settings['ctitle_tag']); ?>> <p><a href="mailto:<?php echo esc_html($settings['mail_id']); ?>"><?php echo esc_html($settings['mail_id']); ?></a> <?php echo esc_html('&' , 'creote-addons'); ?> <a href="tel:<?php echo esc_html($settings['phone_num']); ?>"><?php echo esc_html($settings['phone_num']); ?></a></p> </div> </div> </div> </div> </div> </div> </div> </div></div><?php endif; ?>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_call_to_action_v1());