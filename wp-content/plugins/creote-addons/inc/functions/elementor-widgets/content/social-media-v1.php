<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_social_media_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-social-media-v1';
       }
       public function get_title()
       {
           return __('Social Media V1' , 'creote-addons');
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
   			'media_content',
   			[
   				'label' => esc_html__( 'Media Content', 'creote-addons' ),
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
         $repeater->add_control(
           'transitions_enable',
          [
             'label' => __('Transitions Enable', 'creote-addons'),
              'type' => Controls_Manager::SWITCHER,
              'label_on' => __('Yes', 'creote-addons'),
              'label_off' => __('No', 'creote-addons'),
              'return_value' => 'yes',
              'default' => 'no',
           ]
         );
         $repeater->add_responsive_control(
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
           $this->add_responsive_control(
               'media_alignments',
               [
                   'label' => __('Media alignments', 'creote-addons'),
                   'type' => Controls_Manager::CHOOSE,
                   'options' => [
                     'left' => [
                       'title' => __( 'Text Left', 'creote-addons' ),
                       'icon' => 'fa fa-align-left',
                     ],
                     'center' => [
                       'title' => __( 'Text Center', 'creote-addons' ),
                       'icon' => 'fa fa-align-center',
                     ],
                     'right' => [
                       'title' => __( 'Text Right', 'creote-addons' ),
                       'icon' => 'fa fa-align-right',
                     ],
                   ],
                   'default' => 'center',
                   'toggle' => true,
                   'selectors' => [
                     '{{WRAPPER}} .social_media_v_one ' => 'text-align: {{VALUE}}!important;',
                   ],
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
                     '{{WRAPPER}} .social_media_v_one ul li a ' => 'color: {{VALUE}}',
                 ],
             ]
         );
         $this->add_control(
             'color_two',
             [
                 'label' => __( 'Color  Two', 'creote-addons' ),
                 'type' => \Elementor\Controls_Manager::COLOR,
                 'selectors' => [
                     '{{WRAPPER}} .social_media_v_one ul li a' => 'background-color: {{VALUE}}',
                 ],
             ]
         );
         $this->end_controls_section();
   	}
       protected function render() {
   		$settings = $this->get_settings_for_display();
           $allowed_tags = wp_kses_allowed_html('post');
   		?>
<div class="social_media_v_one"> <ul> <?php foreach($settings['media_repeater'] as $media): $media_target5 = $media['media_link']['is_external'] ? ' target="_blank"' : ''; $media_nofollow5 = $media['media_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <li <?php if($media['transitions_enable'] == 'yes'): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_html($media['transitions']); ?>" data-aos-offset="0" <?php endif;?>> <a href="<?php echo esc_url($media['media_link']['url']); ?>" <?php echo esc_attr($media_target5); ?> <?php echo esc_attr($media_nofollow5); ?>> <span class="<?php echo esc_attr($media['media_icon']); ?>"></span> <small><?php echo esc_attr($media['tool_tip']); ?></small> </a> </li> <?php endforeach; ?> </ul></div>
<?php 
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_social_media_v1());