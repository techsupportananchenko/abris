<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_icon_box_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-iconbox-v1';
       }
       public function get_title()
       {
           return __('Icon Box v1' , 'creote-addons');
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
   			'iconboxvonecontet',
   			[
   				'label' => esc_html__( 'Icon Box Content', 'creote-addons' ),
   			]
           );
           $this->add_control(
   			'iconboxstyle',
   			[
   				'label'   => esc_html__( 'Icon Box Style', 'creote-addons' ),
   				'type'    => Controls_Manager::SELECT,
   				'default' => 'style_one',
   				'options' => array(
   					'style_one' => esc_html__( 'Style One', 'creote-addons' ),
                  'style_two'  => esc_html__( 'Style Two', 'creote-addons' ),
                  'style_three'  => esc_html__( 'Style Three', 'creote-addons' ),
                  'style_four'  => esc_html__( 'Style Four', 'creote-addons' ),
                  'style_five'  => esc_html__( 'Style Five', 'creote-addons' ),
                  'style_six'  => esc_html__( 'Style Six', 'creote-addons' ),
                  'style_seven'  => esc_html__( 'Style Seven', 'creote-addons' ),
   				),
   			]);
         $this->add_control(
          'tag_type',
          [
          'label' => __('Title Tag', 'luxride-addons'),
          'type' => \Elementor\Controls_Manager::SELECT,
          'options' => [
              'div' => __( 'Div Tag', 'luxride-addons' ),
              'h1' => __( 'H1 Tag', 'luxride-addons' ),
              'h2' => __( 'H2 Tag', 'luxride-addons' ),
              'h3' => __( 'H3 Tag', 'luxride-addons' ),
              'h4' => __( 'H4 Tag', 'luxride-addons' ),
              'h5' => __( 'H5 Tag', 'luxride-addons' ),
              'h6' => __( 'H6 Tag', 'luxride-addons' ),
          ],
          'default' => 'h2' , 
          ]
      ); 
           $this->add_control(
             'icon_title_alignments',
             [
                 'label' => __('Icon box  alignments', 'creote-addons'),
                 'type' => Controls_Manager::CHOOSE,
                 'options' => [
                   'text-left' => [
                     'title' => __( 'Text Left', 'creote-addons' ),
                     'icon' => 'fa fa-align-left',
                   ],
                   'text-center' => [
                     'title' => __( 'Text Center', 'creote-addons' ),
                     'icon' => 'fa fa-align-center',
                   ],
                   'text-right' => [
                     'title' => __( 'Text Right', 'creote-addons' ),
                     'icon' => 'fa fa-align-right',
                   ],
                 ],
                 'default' => 'text-center',
                 'toggle' => true,
                 'condition' => [
                   'iconboxstyle' => 'style_four',
                ]
             ]
         );
         $this->add_control(
           'icon_or_image',
           [
               'label'   => esc_html__( 'Icon (or) Image', 'creote-addons' ),
               'type'    => Controls_Manager::SELECT,
               'default' => 'icon_yes',
               'options' => array(
                   'icon_yes' => esc_html__( 'Icon', 'creote-addons' ),
                   'image_yes'  => esc_html__( 'Icon Image', 'creote-addons' ),
               ),
           ]
       );
           $this->add_control(
               'icon_image',
               [
                   'label' => __('Icon Image', 'creote-addons'),
                   'type' => Controls_Manager::MEDIA,
                   'default' => [
                       'url' => CREOTE_ADDONS_URL. 'assets/images/010-job-search.png',
                     ],
                    'condition' => [
                       'icon_or_image' => 'image_yes',
                    ]
               ]
           );
            $this->add_control(
               'icon_fonts',
               [
                   'label' => __('Icon Fonts', 'creote-addons'),
                   'type' => Controls_Manager::ICON,
                   'options' => get_creote_icon(),
                   'default' => __('icon-play' , 'creote-addons'),
                    'condition' => [
                       'icon_or_image' => 'icon_yes',
                    ]
               ]
           );
           $this->add_control(
               'icon_center',
              [
                 'label' => __('Move Icon Center Enable', 'creote-addons'),
                  'type' => Controls_Manager::SWITCHER,
                  'label_on' => __('Yes', 'creote-addons'),
                  'label_off' => __('No', 'creote-addons'),
                  'return_value' => 'yes',
                  'default' => 'yes',
                  'condition' => [
                   'iconboxstyle' => 'style_one',
                ]
               ]
             );
           $this->add_control(
               'icon_box_heading',
               [
                   'label' => __('Heading', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('Conserve Water', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
               ]
           );
           $this->add_control(
               'icon_box_description',
               [
                   'label' => __('Description', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('The less water you use, the less runoff and wastewater that eventually end up in the ocean.', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
               ]
           ); 
           $this->add_control(
               'link_text',
               [
                   'label' => __('Link Text', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('Read More', 'creote-addons'),
                   'condition' => [
                       'iconboxstyle' => 'style_five',
                    ]
               ]
           ); 
           $this->add_control(
               'icon_box_number',
               [
                   'label' => __('Steps', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('01', 'creote-addons'),
                   'condition' => [
                       'iconboxstyle' => 'style_five',
                    ]
               ]
           );  
           $this->add_control(
               'list_items',
               [
                   'label' => __('List Items', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('Commitment to excellence
                   Consumer focus', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
                   'condition' => [
                       'iconboxstyle' => 'style_three',
                    ]
               ]
           );  
           $this->add_control(
               'button_text',
               [
                   'label' => __('Button Text', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('Read More', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
                   'condition' => [
                       'iconboxstyle' => ['style_three'],
                    ]
               ]
           );  
           $this->add_control(
            'link_box',
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
         $this->end_controls_section(); 
         $this->start_controls_section('custom_css',
         [ 
             'label' => __('Custom Css', 'creote-addons') ,
             'tab' =>Controls_Manager::TAB_STYLE,
             'condition' => [
               'iconboxstyle' => ['style_seven'],
            ]
         ]
         ); 
         $this->add_control(
           'icon_color',
            [
               'label' => __('Icon Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                 '{{WRAPPER}} .icon_box_all.style_seven .icon_content .icon span  ' => 'color: {{VALUE}}!important;',
               ],
            ]
         );
         $this->add_control(
           'small_heading_color',
            [
               'label' => __('Heading Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                 '{{WRAPPER}} .icon_box_all.style_seven .icon_content .text_box .icontitle a ' => 'color: {{VALUE}}!important;',
               ],
            ]
         );
         $this->add_control(
           'description_color',
             [
               'label' => __('Description Color', 'creote-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                 '{{WRAPPER}} .icon_box_all.style_seven .icon_content .text_box p ' => 'color: {{VALUE}}!important;',
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
   		?>
<div class="icon_box_all <?php echo esc_attr($settings['iconboxstyle']); ?>" 
    <?php if($settings['transitions_enable'] == 'yes'): ?> 
        data-aos="fade-up" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" data-aos-offset="0" 
    <?php endif; ?>>

    <?php if($settings['iconboxstyle'] == 'style_two'): ?>
        <div class="icon_content <?php if($settings['icon_or_image'] == 'image_yes'): ?> icon_imgs <?php endif; ?>">
            <?php if($settings['icon_or_image'] == 'image_yes'): 
                $icon_image = isset($settings['icon_image']['alt']) ? $settings['icon_image']['alt'] : 'image'; ?>
                <div class="icon">
                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image); ?>" />
                </div>
            <?php elseif($settings['icon_or_image'] == 'icon_yes'): ?>
                <div class="icon">
                    <span class="<?php echo esc_html($settings['icon_fonts']); ?>"></span>
                </div>
            <?php endif; ?>
            <div class="txt_content">
                <?php if(!empty($settings['icon_box_heading'])): ?>
                  <<?php echo esc_attr($settings['tag_type']); ?> class="icontitle">
                        <?php if(!empty($settings['link_box']['url'])): ?>
                            <a href="<?php echo esc_url($settings['link_box']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
                                <?php echo wp_kses($settings['icon_box_heading'], $allowed_tags); ?>
                            </a>
                        <?php else: ?>
                            <?php echo wp_kses($settings['icon_box_heading'], $allowed_tags); ?>
                        <?php endif; ?>
                 </<?php echo esc_attr($settings['tag_type']); ?>>
                <?php endif; ?>
                <?php if(!empty($settings['icon_box_description'])): ?>
                    <p>
                        <?php echo wp_kses($settings['icon_box_description'], $allowed_tags); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>

    <?php elseif($settings['iconboxstyle'] == 'style_three'): ?>
        <div class="icon_content <?php if($settings['icon_or_image'] == 'image_yes'): ?> icon_imgs <?php endif; ?>">
            <?php if($settings['icon_or_image'] == 'image_yes'): 
                $icon_image = isset($settings['icon_image']['alt']) ? $settings['icon_image']['alt'] : 'image'; ?>
                <div class="icon">
                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image); ?>" />
                </div>
            <?php elseif($settings['icon_or_image'] == 'icon_yes'): ?>
                <div class="icon">
                    <span class="<?php echo esc_html($settings['icon_fonts']); ?>"></span>
                </div>
            <?php endif; ?>
            <div class="txt_content">
                <?php if(!empty($settings['icon_box_heading'])): ?>
                  <<?php echo esc_attr($settings['tag_type']); ?> class="icontitle">
                  <?php if(!empty($settings['link_box']['url'])): ?>
                            <a href="<?php echo esc_url($settings['link_box']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
                                <?php echo wp_kses($settings['icon_box_heading'], $allowed_tags); ?>
                            </a>
                        <?php else: ?>
                            <?php echo wp_kses($settings['icon_box_heading'], $allowed_tags); ?>
                        <?php endif; ?>
                        </<?php echo esc_attr($settings['tag_type']); ?>>
                <?php endif; ?>
                <?php if(!empty($settings['icon_box_description'])): ?>
                    <p>
                        <?php echo wp_kses($settings['icon_box_description'], $allowed_tags); ?>
                    </p>
                <?php endif; ?>
                <?php if(!empty($settings['list_items'])): 
                    $list_items = explode("\n", ($settings['list_items'])); ?>
                    <ul>
                        <?php foreach($list_items as $list_item): ?>
                            <li>
                                <?php echo wp_kses($list_item, true); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <?php if(!empty($settings['button_text']) && !empty($settings['link_box']['url'])): ?>
                    <div class="btn_left">
                        <a href="<?php echo esc_url($settings['link_box']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn one">
                            <?php echo esc_html($settings['button_text']); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    <?php elseif($settings['iconboxstyle'] == 'style_four'): ?>
        <div class="icon_content <?php if($settings['icon_or_image'] == 'image_yes'): ?> icon_imgs <?php endif; ?>">
            <?php if($settings['icon_or_image'] == 'image_yes'): 
                $icon_image = isset($settings['icon_image']['alt']) ? $settings['icon_image']['alt'] : 'image'; ?>
                <div class="icon">
                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image); ?>" />
                    <img src="<?php echo esc_url(CREOTE_ADDONS_URL. 'assets/images/shape-1-small.png'); ?>" class="shape" alt="img" />
                </div>
            <?php elseif($settings['icon_or_image'] == 'icon_yes'): ?>
                <div class="icon">
                    <span class="<?php echo esc_html($settings['icon_fonts']); ?>"></span>
                    <img src="<?php echo esc_url(CREOTE_ADDONS_URL. 'assets/images/shape-1-small.png'); ?>" class="shape" alt="img" />
                </div>
            <?php endif; ?>
            <div class="txt_content">
                <?php if(!empty($settings['icon_box_heading'])): ?>
                  <<?php echo esc_attr($settings['tag_type']); ?> class="icontitle">
                  <?php if(!empty($settings['link_box']['url'])): ?>
                            <a href="<?php echo esc_url($settings['link_box']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
                                <?php echo wp_kses($settings['icon_box_heading'], $allowed_tags); ?>
                            </a>
                        <?php else: ?>
                            <?php echo wp_kses($settings['icon_box_heading'], $allowed_tags); ?>
                        <?php endif; ?>
                        </<?php echo esc_attr($settings['tag_type']); ?>>
                <?php endif; ?>
                <?php if(!empty($settings['icon_box_description'])): ?>
                    <p>
                        <?php echo wp_kses($settings['icon_box_description'], $allowed_tags); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>

    <?php elseif($settings['iconboxstyle'] == 'style_five'): ?>
        <div class="icon_content">
            <?php if($settings['icon_or_image'] == 'image_yes'): 
                $icon_image = isset($settings['icon_image']['alt']) ? $settings['icon_image']['alt'] : 'image'; ?>
                <div class="icon">
                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image); ?>" />
                </div>
            <?php elseif($settings['icon_or_image'] == 'icon_yes'): ?>
                <div class="icon">
                    <span class="<?php echo esc_html($settings['icon_fonts']); ?>"></span>
                </div>
            <?php endif; ?>
            <?php if(!empty($settings['icon_box_heading'])): ?>
                <small><?php echo esc_attr($settings['icon_box_number']); ?></small>
            <?php endif; ?>
            <div class="text_box">
                <?php if(!empty($settings['icon_box_heading'])): ?>
                  <<?php echo esc_attr($settings['tag_type']); ?> class="icontitle">
                        <?php echo wp_kses($settings['icon_box_heading'], $allowed_tags); ?>
                        </<?php echo esc_attr($settings['tag_type']); ?>>
                <?php endif; ?>
                <?php if(!empty($settings['icon_box_description'])): ?>
                    <p>
                        <?php echo wp_kses($settings['icon_box_description'], $allowed_tags); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="hover_content">
                <div class="content">
                    <div class="inner">
                        <?php if(!empty($settings['icon_box_description'])): ?>
                            <p>
                                <?php echo wp_kses($settings['icon_box_description'], $allowed_tags); ?>
                            </p>
                        <?php endif; ?>
                        <?php if(!empty($settings['link_text']) && !empty($settings['link_box']['url'])): ?>
                            <a href="<?php echo esc_url($settings['link_box']['url']); ?>" class="read_more" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
                                <?php echo wp_kses($settings['link_text'], $allowed_tags); ?> 
                                <span class="icon-right-arrow-long"></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    <?php elseif($settings['iconboxstyle'] == 'style_six'): ?>
        <div class="icon_content">
            <?php if($settings['icon_or_image'] == 'image_yes'): 
                $icon_image = isset($settings['icon_image']['alt']) ? $settings['icon_image']['alt'] : 'image'; ?>
                <div class="icon">
                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image); ?>" />
                </div>
            <?php elseif($settings['icon_or_image'] == 'icon_yes'): ?>
                <div class="icon">
                    <span class="<?php echo esc_html($settings['icon_fonts']); ?>"></span>
                </div>
            <?php endif; ?>
            <div class="text_box">
                <?php if(!empty($settings['icon_box_heading'])): ?>
                  <<?php echo esc_attr($settings['tag_type']); ?> class="icontitle">
                  <?php if(!empty($settings['link_box']['url'])): ?>
                            <a href="<?php echo esc_url($settings['link_box']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
                                <?php echo wp_kses($settings['icon_box_heading'], $allowed_tags); ?>
                            </a>
                        <?php else: ?>
                            <?php echo wp_kses($settings['icon_box_heading'], $allowed_tags); ?>
                        <?php endif; ?>
                        </<?php echo esc_attr($settings['tag_type']); ?>>
                <?php endif; ?>
                <?php if(!empty($settings['icon_box_description'])): ?>
                    <p>
                        <?php echo wp_kses($settings['icon_box_description'], $allowed_tags); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>

    <?php elseif($settings['iconboxstyle'] == 'style_seven'): ?>
        <div class="icon_content">
            <?php if($settings['icon_or_image'] == 'image_yes'): 
                $icon_image = isset($settings['icon_image']['alt']) ? $settings['icon_image']['alt'] : 'image'; ?>
                <div class="icon">
                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image); ?>" />
                </div>
            <?php elseif($settings['icon_or_image'] == 'icon_yes'): ?>
                <div class="icon">
                    <span class="<?php echo esc_html($settings['icon_fonts']); ?>"></span>
                </div>
            <?php endif; ?>
            <div class="text_box">
                <?php if(!empty($settings['icon_box_heading'])): ?>
                  <<?php echo esc_attr($settings['tag_type']); ?> class="icontitle">
                  <?php if(!empty($settings['link_box']['url'])): ?>
                            <a href="<?php echo esc_url($settings['link_box']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
                                <?php echo wp_kses($settings['icon_box_heading'], $allowed_tags); ?>
                            </a>
                        <?php else: ?>
                            <?php echo wp_kses($settings['icon_box_heading'], $allowed_tags); ?>
                        <?php endif; ?>
                        </<?php echo esc_attr($settings['tag_type']); ?>>
                <?php endif; ?>
                <?php if(!empty($settings['icon_box_description'])): ?>
                    <p>
                        <?php echo wp_kses($settings['icon_box_description'], $allowed_tags); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>

    <?php else: ?>
        <div class="icon_content <?php if($settings['icon_center'] == 'yes'): ?> icon_centers <?php endif; ?>">
            <?php if($settings['icon_or_image'] == 'image_yes'): 
                $icon_image = isset($settings['icon_image']['alt']) ? $settings['icon_image']['alt'] : 'image'; ?>
                <div class="icon">
                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image); ?>" />
                </div>
            <?php elseif($settings['icon_or_image'] == 'icon_yes'): ?>
                <div class="icon">
                    <span class="<?php echo esc_html($settings['icon_fonts']); ?>"></span>
                </div>
            <?php endif; ?>
            <div class="txt_content">
                <?php if(!empty($settings['icon_box_heading'])): ?>
                  <<?php echo esc_attr($settings['tag_type']); ?> class="icontitle">
                  <?php if(!empty($settings['link_box']['url'])): ?>
                            <a href="<?php echo esc_url($settings['link_box']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
                                <?php echo wp_kses($settings['icon_box_heading'], $allowed_tags); ?>
                            </a>
                        <?php else: ?>
                            <?php echo wp_kses($settings['icon_box_heading'], $allowed_tags); ?>
                        <?php endif; ?>
                        </<?php echo esc_attr($settings['tag_type']); ?>>
                <?php endif; ?>
                <?php if(!empty($settings['icon_box_description'])): ?>
                    <p>
                        <?php echo wp_kses($settings['icon_box_description'], $allowed_tags); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php 
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_icon_box_v1());