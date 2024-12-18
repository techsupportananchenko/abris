<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_footer_copy_right_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-footer-copyright-v1';
       }
       public function get_title()
       {
           return __('Copy Right V1' , 'creote-addons');
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
   			'copyright_conten',
   			[
   				'label' => esc_html__( 'Copy Right  Content', 'creote-addons' ),
   			]
           );
           $this->add_control(
               'copy_right_style',
               [
                 'label' => __('Copy Right Styles', 'creote-addons'),
                 'type' => Controls_Manager::SELECT,
                 'options' => [
                   'style_one' => __( 'Style One', 'creote-addons' ), 
                   'style_two' => __( 'Style Two', 'creote-addons' ), 
                   ],
                   'default' => __('style_one' , 'creote-addons'),
                 ]
           );
           $this->add_control(
               'copy_right_content',
           [
               'label' => esc_html__('Copy Right Text', 'creote-addons'),
               'type' => Controls_Manager::TEXTAREA,
               'default' => __('© 2021 Steelthemes. All Rights Reserved.' , 'creote-addons'),
           ]);
         $this->end_controls_section();
         $this->start_controls_section(
           'meida_contnet',
           [
               'label' => esc_html__( 'Media  Content', 'creote-addons' ),
               'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
               'condition' => [
                   'copy_right_style' => 'style_one',
               ]
           ]
        );
           $repeater = new Repeater();
           $repeater->add_control(
               'media_icon',
           [
               'label' => esc_html__('Media Icon', 'creote-addons'),
               'type' => Controls_Manager::TEXT,
               'default' => __('fab fa-facebook' , 'creote-addons'),
           ]);
           $repeater->add_control(
               'tool_tip',
           [
               'label' => esc_html__('Tooltip', 'creote-addons'),
               'type' => Controls_Manager::TEXT,
               'default' => __('Facebook' , 'creote-addons'),
           ]);
           $repeater->add_control(
            'media_link',
            [
            'label' => __('Media Link', 'creote-addons'),
            'type' => Controls_Manager::URL,
            'placeholder' => __('https://your-link.com', 'creote-addons'),
            'show_external' => true,
            'default' => [
                'url' => '#',
                'is_external' => false,
                'nofollow' => false,
            ],
            ]
         );  
         $this->add_control(
           'media_repeater',
           [
               'label' => __('Media Repeater', 'creote-addons'),
               'type' => Controls_Manager::REPEATER,
               'fields' => $repeater->get_controls(),
               'default' => [
                   [
                       'media_icon' =>  __('fab fa-facebook','creote-addons'),
                       'tool_tip' =>  __('facebook','creote-addons'),
                   ],
                   [
                       'media_icon' =>  __('fab fa-twitter','creote-addons'),
                       'tool_tip' =>  __('twitter','creote-addons'),
                   ],
                   [
                       'media_icon' =>  __('fab fa-skype','creote-addons'),
                       'tool_tip' =>  __('skype','creote-addons'),
                   ],
                   [
                       'media_icon' =>  __('fab fa-instagram','creote-addons'),
                       'tool_tip' =>  __('instagram','creote-addons'),
                   ]
               ],
               'title_field' => '{{{ media_icon }}}',
           ]);
           $this->end_controls_section();
           $this->start_controls_section(
               'nav_content',
               [
                   'label' => esc_html__( 'Navigation  Content', 'creote-addons' ),
                   'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                   'condition' => [
                       'copy_right_style' => 'style_two',
                   ]
               ]
            );
               $repeater_two = new Repeater();
               $repeater_two->add_control(
                   'link_text',
               [
                   'label' => esc_html__('Media Icon', 'creote-addons'),
                   'type' => Controls_Manager::TEXT,
                   'default' => __('About' , 'creote-addons'),
               ]);
               $repeater_two->add_control(
                   'link_go',
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
               ]
               );  
             $this->add_control(
               'nav_repeater',
               [
                   'label' => __('Navigation Repeater', 'creote-addons'),
                   'type' => Controls_Manager::REPEATER,
                   'fields' => $repeater_two->get_controls(),
                   'default' => [
                       [
                           'link_text' =>  __('Terms Of Use ','creote-addons'),
                       ],
                       [
                           'link_text' =>  __('Private Policy','creote-addons'),
                       ] 
                   ],
                   'title_field' => '{{{ link_text }}}',
               ]);
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
                     '{{WRAPPER}} .footer_copy_content ' => 'color: {{VALUE}}',
                 ],
             ]
         );
         $this->add_control(
             'color_two',
             [
                 'label' => __( 'Color  Two', 'creote-addons' ),
                 'type' => \Elementor\Controls_Manager::COLOR,
                 'selectors' => [
                     '{{WRAPPER}} .footer_copy_content_right .social_media_v_one ul li a , {{WRAPPER}} .footer_copy_content_right .nav_link_v_one ul li a ' => 'color: {{VALUE}}',
                 ],
             ]
         );
         $this->add_control(
           'color_three',
           [
               'label' => __( 'Color  Three', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .footer_copy_content_right .social_media_v_one ul li a' => 'background-color: {{VALUE}}',
               ],
               'condition' => [
                   'copy_right_style' => 'style_one',
               ],
           ]
       );
         $this->end_controls_section();
   	}
       protected function render() {
   		$settings = $this->get_settings_for_display();
           $allowed_tags = wp_kses_allowed_html('post');
   		?>
<div class="footer_copy_right <?php echo esc_attr($settings['copy_right_style']); ?>"> <div class="row"> <div class="col-lg-6 col-md-12"> <div class="footer_copy_content"> <?php echo wp_kses($settings['copy_right_content'] , $allowed_tags); ?> </div> </div> <?php if($settings['copy_right_style'] == 'style_two'): ?> <div class="col-lg-6 col-md-12"> <div class="footer_copy_content_right"> <div class="nav_link_v_one"> <ul> <?php foreach($settings['nav_repeater'] as $nav_repeater): ?> <?php $target = $nav_repeater['link_go']['is_external'] ? ' target="_blank"' : ''; $nofollow = $nav_repeater['link_go']['nofollow'] ? ' rel="nofollow"' : ''; ?> <li> <a href="<?php echo esc_url($nav_repeater['link_go']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>> <?php echo esc_attr($nav_repeater['link_text']); ?> </a> </li> <?php endforeach;?> </ul> </div> </div> </div> <?php else: ?> <div class="col-lg-6 col-md-12"> <div class="footer_copy_content_right"> <div class="social_media_v_one"> <ul> <?php foreach($settings['media_repeater'] as $media): $media_target5 = $media['media_link']['is_external'] ? ' target="_blank"' : ''; $media_nofollow5 = $media['media_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <li> <a href="<?php echo esc_url($media['media_link']['url']); ?>" <?php echo esc_attr($media_target5); ?> <?php echo esc_attr($media_nofollow5); ?>> <span class="<?php echo esc_attr($media['media_icon']); ?>"></span> <small><?php echo esc_attr($media['tool_tip']); ?></small> </a> </li> <?php endforeach;?> </ul> </div> </div> </div> <?php endif; ?> </div></div>
<?php 
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_footer_copy_right_v1());