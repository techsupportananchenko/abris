<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_list_items_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-list-items-v1';
       }
       public function get_title()
       {
           return __('List Items V1 ', 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['102'];
       }
       protected function register_controls(){
           $this->start_controls_section('list_item-settings',
           [ 
               'label' => __('List Item Settings', 'creote-addons')
           ]
           );
           $this->add_control(
               'list_style',
               [
                   'label' => __('List Item Style', 'creote-addons'),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
                       'style_one' => __('Style One ', 'creote-addons'),
                       'style_two' => __('Style Two ', 'creote-addons'),
                   ],
                   'default' => 'style_one',
               ]
           );
           $this->end_controls_section();
           $this->start_controls_section('list_content_one',
           [ 
               'label' => __('List Content', 'creote-addons'),
               'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
               'condition' => [
                   'list_style' => 'style_one'
               ],
           ]
           );
           $repeater = new Repeater();
           $repeater->add_control(
               'list_itme_text',
           [
               'label' => esc_html__('List Item', 'creote-addons'),
               'type' => Controls_Manager::TEXT,
               'default' => __('Item' , 'creote-addons'),
           ]);
           $repeater->add_control(
               'tag',
               [
                   'label' => __('Tag', 'creote-addons'),
                   'type' => Controls_Manager::TEXT,
                   'default' => __('New', 'creote-addons'),
               ]
           );
           $repeater->add_control(
               'link',
               [
                   'label' => __( 'Link', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::URL,
                   'placeholder' => __( 'https://your-link.com', 'creote-addons' ),
                   'show_external' => true,
                   'default' => [
                       'url' => '',
                       'is_external' => true,
                       'nofollow' => true,
                   ],
               ]
           );
           $repeater->add_control(
               'list_item_tag_color',
                [
                   'label' => __('Lite Item Tag Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                ]
           );
           $repeater->add_control(
               'list_item_tag_color_bg',
                [
                   'label' => __('Lite Item Tag Bg Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                ]
           );
           $this->add_control(
               'list_content_repeater_one',
               [
                   'label' => __('List Content Repeater', 'creote-addons'),
                   'type' => Controls_Manager::REPEATER,
                   'fields' => $repeater->get_controls(),
                   'default' => [
                       [
                           'list_itme_text' =>  __('Item','creote-addons'),
                           'tag' => __('New','creote-addons'),
                       ],
                       [
                           'list_itme_text' =>  __('Item','creote-addons'),
                           'tag' => __('New','creote-addons'),
                       ],
                       [
                           'list_itme_text' =>  __('Item','creote-addons'),
                           'tag' => __('New','creote-addons'),
                       ],
                       [
                           'list_itme_text' =>  __('Item','creote-addons'),
                           'tag' => __('New','creote-addons'),
                       ],
                       [
                           'list_itme_text' =>  __('Item','creote-addons'),
                           'tag' => __('New','creote-addons'),
                       ],
                   ],
                   'title_field' => '{{{ list_itme_text }}}',
           ]);
           $this->add_control(
               'list_item_color',
                [
                   'label' => __('Lite Item Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .list_item_box ul li a  ' => 'color: {{VALUE}}!important;',
                   ],
                ]
           );
           $this->add_control(
            'list_itemtag_color',
             [
                'label' => __('Lite Item Tag Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .list_item_box.style_one ul li span ' => 'color: {{VALUE}}!important;',
                ],
             ]
        );
        $this->add_control(
            'list_item_tg_bg_color',
             [
                'label' => __('Lite Item Tag Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .list_item_box.style_one ul li span  ' => 'background: {{VALUE}}!important;',
                ],
             ]
        );
           $this->end_controls_section();
           $this->start_controls_section('list_settings',
           [ 
               'label' => __('List Content', 'creote-addons'),
               'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
               'condition' => [
                'list_style' => 'style_two'
            ],
           ]
           );
           $this->add_control(
             'list_type',
             [
             'label' => __('List Type', 'creote-addons'),
             'type' => \Elementor\Controls_Manager::SELECT,
             'options' => [
                 'linline' => __( 'Inline View', 'creote-addons' ),
                 'list' => __( 'List View', 'creote-addons' ),
             ],
             'default' => __('linline' , 'creote-addons'),
             ]
         ); 
           $repeater_two = new \Elementor\Repeater();
           $repeater_two->add_responsive_control(
               'icon_enable',
               [
                 'label' => __( 'Icon Enable', 'creote-addons' ),
                 'type' => \Elementor\Controls_Manager::SWITCHER,
                 'label_on' => __( 'Show', 'creote-addons' ),
                 'label_off' => __( 'Hide', 'creote-addons' ),
                 'return_value' => 'yes',
                 'default' => 'yes',
               ]
           );
           $repeater_two->add_control(
               'icon_style',
               [
               'label' => __('Icon Styles', 'creote-addons'),
               'type' => \Elementor\Controls_Manager::SELECT,
               'options' => [
                   'type_image' => __( 'Image Type', 'creote-addons' ),
                   'type_icon' => __( 'Image Icon', 'creote-addons' ),
               ],
               'default' => __('type_image' , 'creote-addons'),
               'condition' => [
                   'icon_enable' => 'yes'
               ],
               ]
           );
           $repeater_two->add_responsive_control(
               'image_font',
               [
               'label' => __( 'Image', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::MEDIA,
               'default' => [
                   'url' => \Elementor\Utils::get_placeholder_image_src(),
               ],
               'condition' => [
                   'icon_style' => 'type_image',
                   'icon_enable' => 'yes'
               ],
               ] 
           );
           $repeater_two->add_control(
               'icon_fonts',
               [
                   'label' => __('Icon', 'creote-addons'),
                   'type' => \Elementor\Controls_Manager::ICON,
                   'options' => get_creote_icon(),
                   'default' => __('fi-rs-user' , 'creote-addons'),
                   'condition' => [
                       'icon_style' => 'type_icon',
                       'icon_enable' => 'yes'
                   ],
               ]
           );
           $repeater_two->add_responsive_control(
             'list_item',
             [
                'label' => __('List item', 'creote-addons'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Cake & Milk', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),    
             ]
           );
           $repeater_two->add_responsive_control(
             'list_link',
             [
                 'label' => __('Link', 'creote-addons'),
                 'type' => \Elementor\Controls_Manager::URL,
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
           'list_repeater',
           [
               'label' => __('List Repeater', 'creote-addons'),
               'type' => \Elementor\Controls_Manager::REPEATER,
               'fields' => $repeater_two->get_controls(),
               'default' => [
                   [
                   'list_item' =>  __('Cake & Milk ', 'creote-addons'),
                   'list_link' =>  __('#', 'creote-addons'),
                   ],
                    [
                   'list_item' =>  __('Coffes & Teas', 'creote-addons'),
                   'list_link' =>  __('#', 'creote-addons'),
                   ],
                    [
                   'list_item' =>  __('Pet Foods', 'creote-addons'),
                   'list_link' =>  __('#', 'creote-addons'),
                   ],
                    [
                   'list_item' =>  __('Vegetables', 'creote-addons'),
                   'list_link' =>  __('#', 'creote-addons'),
                   ],
               ],
               'title_field' => '{{{ list_item }}}',
           ]
       );
       $this->end_controls_section();
       $this->start_controls_section('list_css',
       [ 
           'label' => __('Custom Css', 'creote-addons'),
           'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
           'condition' => [
            'list_style' => 'style_two'
            ],
       ]
       );
       $this->add_group_control(
           \Elementor\Group_Control_Typography::get_type(),
           [
               'label' => esc_html__( 'List Typography', 'creote-addons' ),
               'name' => 'steps_typo',
               'selector' => '{{WRAPPER}} .list_item_box  li a',
           ]
       );
       $this->add_control(
           'list_color',
            [
               'label' => __('List Color', 'creote-addons'),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .list_item_box  li a ' => 'color: {{VALUE}}!important;',
               ],
            ]
       );
       $this->add_control(
           'list_margin',
           [
               'label' => esc_html__( 'List Margin', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px', '%', 'em' ],
               'selectors' => [
                   '{{WRAPPER}} .list_item_box  li ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
               ],
           ]
       );
       $this->add_control(
           'list_padding',
           [
               'label' => esc_html__( 'List Padding', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px', '%', 'em' ],
               'selectors' => [
                   '{{WRAPPER}} .list_item_box  li ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
               ],
           ]
       );
       $this->add_control(
           'list_border',
           [
               'label' => esc_html__( 'List Border Width', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px', '%', 'em' ],
               'selectors' => [
                   '{{WRAPPER}} .list_item_box  li ' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
               ],
           ]
       );
       $this->add_control(
           'list_border_style',
           [
           'label' => __('List Border Style', 'creote-addons'),
           'type' => \Elementor\Controls_Manager::SELECT,
           'options' => [
               'solid' => __( 'Solid', 'creote-addons' ),
               'dotted' => __( 'Dotted', 'creote-addons' ),
               'dashed' => __( 'Dashed', 'creote-addons' ),
               'double' => __( 'Double', 'creote-addons' ),
               'none' => __( 'None', 'creote-addons' ),
           ],
           'default' => __('none' , 'creote-addons'),
           'selectors' => [
               '{{WRAPPER}} .list_item_box  li ' => 'border-style: {{VALUE}}!important;',
           ],
           ]
       );
       $this->add_control(
           'list_border_color',
            [
               'label' => __('List Border Color', 'creote-addons'),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .list_item_box  li ' => 'border-color: {{VALUE}}!important;',
               ],
            ]
       );
       $this->add_control(
           'list_border_radius',
           [
               'label' => esc_html__( 'List Border Radius', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px', '%', 'em' ],
               'selectors' => [
                   '{{WRAPPER}} .list_item_box  li ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
               ],
           ]
       );
       $this->add_control(
           'list_background_color',
            [
               'label' => __('List Background Color', 'creote-addons'),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .list_item_box  li' => 'background-color: {{VALUE}}!important;',
               ],
            ]
       );
       $this->add_control(
           'hr_one',
           [
               'type' => \Elementor\Controls_Manager::DIVIDER,
           ]
       );
       $this->add_control(
           'icon_margin_right',
           [
               'label' => esc_html__( 'Icon margin Right', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::NUMBER,
               'min' => 1,
               'max' => 200,
               'step' => 1,
               'default' => '',
               'selectors' => [
                   '{{WRAPPER}} .list_item_box  li .icon_bx ' => 'margin-right: {{VALUE}}px!important;',
               ],
           ]
       );
       $this->add_control(
           'icon_image_width',
           [
               'label' => esc_html__( 'Icon Image Width', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::NUMBER,
               'min' => 1,
               'max' => 200,
               'step' => 1,
               'default' => '',
               'selectors' => [
                   '{{WRAPPER}} .list_item_box  li small img ' => 'width: {{VALUE}}px!important; min-width: {{VALUE}}px!important;',
               ],
           ]
       );
       $this->add_group_control(
           \Elementor\Group_Control_Typography::get_type(),
           [
               'label' => esc_html__( 'Icon Font Typography', 'creote-addons' ),
               'name' => 'icon_font_typo',
               'selector' => '{{WRAPPER}} .list_item_box  li small i ',
           ]
       );
       $this->add_control(
           'icon_color',
            [
               'label' => __('Icon Color', 'creote-addons'),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .list_item_box  li small i ' => 'color: {{VALUE}}!important;',
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
  <?php if($settings['list_style'] == 'style_two'): ?><div class="list_item_box style_two style_<?php echo esc_attr($settings['list_type']); ?>"> <ul class="list-inline"> <?php foreach($settings['list_repeater'] as $key => $list_repeater): $target = $list_repeater['list_link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $list_repeater['list_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <li class="list_items"> <small class='d-flex align-items-center'> <?php if($list_repeater['icon_enable'] == 'yes'): // icon enable ?> <?php if($list_repeater['icon_style'] == 'type_image'): // icon style ?> <span class="icon_bx"> <?php if(!empty($list_repeater['image_font']['url'])): // icon image $image_font = isset($list_repeater['image_font']['alt']) ? $list_repeater['image_font']['alt'] : ''; if(!empty($image_font)) { $image_font = $image_font; }else{ $image_font = 'image'; } ?> <img src="<?php echo esc_attr($list_repeater['image_font']['url']); ?>" alt="<?php echo esc_attr($image_font); ?>" /> <?php endif; // icon image ?> </span> <?php elseif($list_repeater['icon_style'] == 'type_icon'): // icon style ?> <span class="icon_bx"> <i class="<?php echo esc_attr($list_repeater['icon_fonts']); ?>"></i> </span> <?php endif; // icon style ?> <?php endif; // icon enable ?> <a class="nav_link" href="<?php echo esc_url($list_repeater['list_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>> <?php echo wp_kses($list_repeater['list_item'] , $allowed_tags); ?> </a> </small> </li> <?php endforeach; ?> </ul></div><?php else: ?> <div class="list_item_box style_one"> <ul> <?php foreach($settings['list_content_repeater_one'] as $list_content_repeater_one): $target = $list_content_repeater_one['link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $list_content_repeater_one['link']['nofollow'] ? ' rel="nofollow"' : ''; $list_item_tag_color = $list_content_repeater_one['list_item_tag_color']; $list_item_tag_color = ! empty( $list_item_tag_color ) ? "color: $list_item_tag_color!important;" : ''; $list_item_tag_color_bg = $list_content_repeater_one['list_item_tag_color_bg']; $list_item_tag_color_bg = ! empty( $list_item_tag_color_bg ) ? "background: $list_item_tag_color_bg!important;" : ''; $style_css = "style='$list_item_tag_color $list_item_tag_color_bg'"; ?> <li><a href="<?php echo esc_url($list_content_repeater_one['link']['url']) ?>"> <?php echo wp_kses($list_content_repeater_one['list_itme_text'] , $allowed_tags); ?></a> <?php if(!empty($list_content_repeater_one['tag'])): ?> <span class="tags" <?php echo __($style_css); ?>><?php echo esc_attr($list_content_repeater_one['tag']); ?></span> <?php endif; ?> </li> <?php endforeach; ?> </ul></div><?php endif; ?>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_list_items_v1());