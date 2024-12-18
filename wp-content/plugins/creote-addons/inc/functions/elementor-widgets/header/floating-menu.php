<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_floating_menu_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-floating-menu-v1';
       }
       public function get_title()
       {
           return __('Floating Menu V1', 'creote-addons');
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
           $this->start_controls_section('floating_menu_settings',
           [ 
               'label' => __('Floating Menu Settings', 'creote-addons'),
               'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
           ]
           );
           $repeater = new Repeater();
           $repeater->add_control(
            'icon_switch',
           [
              'label' => __('Move Icon Center Enable', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'no',
            ]
          );
           $repeater->add_control(
            'icon_fonts',
            [
                'label' => __('Icon Fonts', 'creote-addons'),
                'type' => Controls_Manager::ICON,
                'options' => get_creote_icon(),
                'default' => __('icon-play' , 'creote-addons'),
                 'condition' => [
                    'icon_switch' => 'yes',
                 ]
            ]
        );
           $repeater->add_control(
               'floating_menu_text',
           [
               'label' => esc_html__('Menu Text', 'creote-addons'),
               'type' => Controls_Manager::TEXT,
               'default' => __('Item' , 'creote-addons'),
           ]);
           $repeater->add_control(
               'floating_menu_link',
               [
                   'label' => __( 'Menu Link', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::URL,
                   'placeholder' => __( 'https://your-link.com', 'creote-addons' ),
                   'show_external' => true,
                   'default' => [
                       'url' => '',
                       'is_external' => false,
                       'nofollow' => false,
                   ],
               ]
           );  
           $this->add_control(
               'floating_repater_menu',
               [
                   'label' => __('Floating Menu Repeater', 'creote-addons'),
                   'type' => Controls_Manager::REPEATER,
                   'fields' => $repeater->get_controls(),
                   'default' => [
                       [
                           'floating_menu_text' =>  __('Item','creote-addons'),
                           'floating_menu_link' => __('#','creote-addons'),
                       ],
                       [
                           'floating_menu_text' =>  __('Item','creote-addons'),
                           'floating_menu_link' => __('#','creote-addons'),
                       ],
                       [
                           'floating_menu_text' =>  __('Item','creote-addons'),
                           'floating_menu_link' => __('#','creote-addons'),
                       ],
                       [
                           'floating_menu_text' =>  __('Item','creote-addons'),
                           'floating_menu_link' => __('#','creote-addons'),
                       ],
                       [
                           'floating_menu_text' =>  __('Item','creote-addons'),
                           'floating_menu_link' => __('#','creote-addons'),
                       ],
                   ],
                   'title_field' => '{{{ floating_menu_text }}}',
           ]);
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
           $this->add_control(
               'floating_color',
                [
                   'label' => __('Menu Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                   'selectors' => [
                       ' {{WRAPPER}} .floating_menu_box ul li a  ' => 'color: {{VALUE}}!important;',
                   ],
                ]
           );
           $this->add_control(
            'menu_icon_color',
             [
                'label' => __('Menu Icon Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    ' {{WRAPPER}} .floating_menu_box ul li a i  ' => 'color: {{VALUE}}!important;',
                ],
             ]
        );
            $this->add_control(
            'menu_active_color',
                [
                'label' => __('Menu Active Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .floating_menu_box ul li.active a , {{WRAPPER}} .floating_menu_box ul li:hover a  ' => 'color: {{VALUE}}!important;',
                ],
                ]
            );
            $this->add_control(
                'menu_activebg_color',
                [
                    'label' => __('Menu Active Bg Color', 'creote-addons'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .floating_menu_box ul li.active a , {{WRAPPER}} .floating_menu_box ul li:hover a  ' => 'background: {{VALUE}}!important;',
                ],
                ]
            );
            $this->add_control(
                'closeicocolor',
                [
                    'label' => __('Close Icon Color', 'creote-addons'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .floating_menu_box ul .close ' => 'color: {{VALUE}}!important;',
                ],
                ]
            );
            $this->add_control(
                'closeicobgcolor',
                [
                    'label' => __('Close Icon Bg Color', 'creote-addons'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .floating_menu_box ul .close ' => 'background: {{VALUE}}!important;',
                ],
                ]
            );
            $this->add_control(
                'floating_bg_color',
                [
                    'label' => __('Background Color', 'creote-addons'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .floating_menu_box ul ' => 'background: {{VALUE}}!important;',
                ],
                ]
            );
           $this->end_controls_section();
   }
protected function render(){
    $settings = $this->get_settings_for_display();
    $allowed_tags = wp_kses_allowed_html('post');
?>
<div class="floating_menu_box"> <ul class="float_menu_box"> <i class="close fa fa-times"></i> <?php foreach($settings['floating_repater_menu'] as $key => $floating_repater_menu): $target = $floating_repater_menu['floating_menu_link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $floating_repater_menu['floating_menu_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <li class="floating_menu_text <?php if($key == 0) echo 'active';?>"> <a href="<?php echo esc_url($floating_repater_menu['floating_menu_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>> <?php if($floating_repater_menu['icon_switch'] == 'yes'): ?> <i class="<?php echo esc_attr($floating_repater_menu['icon_fonts']); ?>"></i> <?php endif; ?> <?php echo wp_kses($floating_repater_menu['floating_menu_text'] , $allowed_tags); ?> </a> </li> <?php endforeach; ?> </ul></div>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_floating_menu_v1());