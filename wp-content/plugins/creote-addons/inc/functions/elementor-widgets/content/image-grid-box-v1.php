<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_image_gri_box_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-mega-menu-image-grid-v1';
       }
       public function get_title()
       {
           return __('Image Grid Box' , 'creote-addons');
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
          'grid_image_box_content',
          [
            'label' => esc_html__( 'Image Content', 'creote-addons' ),
          ]
        );
        $this->add_control(
          'image_box_styles',
          [
            'label'   => esc_html__( 'Image Box Style', 'creote-addons' ),
            'type'    => Controls_Manager::SELECT,
            'default' => 'style_one',
            'options' => array(
              'style_one' => esc_html__( 'Style One', 'creote-addons' ),
              'style_two' => esc_html__( 'Style Two', 'creote-addons' ),
            ),
        ]);
        $this->add_control(
          'column_size',
          [
            'label'   => esc_html__( 'Column Size', 'creote-addons' ),
            'type'    => Controls_Manager::SELECT,
            'default' => 'col-lg-4 col-md-4 col-sm-6 col-xs-12',
            'options' => array(
                  'col-lg-2 col-md-4 col-sm-6 col-xs-12' => esc_html__( 'Six Column', 'creote-addons' ),
                  'col-lg-3 col-md-4 col-sm-6 col-xs-12' => esc_html__( 'Four Column', 'creote-addons' ),
                  'col-lg-4 col-md-4 col-sm-6 col-xs-12' => esc_html__( 'Three Column', 'creote-addons' ),
                  'col-lg-6 col-md-6 col-sm-6 col-xs-12' => esc_html__( 'Two Column', 'creote-addons' ),
                  'col-lg-12 col-md-12 col-sm-12 col-xs-12' => esc_html__( 'One Column', 'creote-addons' ),
            ),
        ]);
           $this->add_control(
             'object_fit_cover',
            [
               'label' => __('Image Fit Enable / Disbale', 'creote-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
             ]
           );
          $this->add_control(
            'image_box_height',
            [
              'label'       => esc_html__( 'Image Box Height', 'creote-addons' ),
              'type'        => Controls_Manager::TEXT,
              'default' =>  esc_html__( '300px' , 'creote-addons'),
              'selectors' => [
                '{{WRAPPER}} .mg_image_box .image_box ' => 'height:{{VALUE}}!important;',
              ],
          ]);
           $repeater = new Repeater();
         $repeater->add_control(
   			'image',
   		  	[
   				'label' => __( 'Image One', 'creote-addons' ),
   				'type' => Controls_Manager::MEDIA,
   				  'default' => [
   					  'url' => \Elementor\Utils::get_placeholder_image_src(),
   				  ],
   			  ]
         );
           $repeater->add_control(
               'height',
               [
               'label'       => esc_html__( 'Image Height', 'creote-addons' ),
               'type'        => Controls_Manager::TEXT,
               'default' =>  esc_html__( 'auto' , 'creote-addons'),
               'selectors' => [
                   '{{WRAPPER}} .image_boxes.style_three img , {{WRAPPER}} .image_boxes.style_three' => 'height: {{VALUE}}!important;',
               ],
           ]);
         $repeater->add_control(
           'title',
           [
             'label'       => esc_html__( 'Title', 'creote-addons' ),
             'type'        => Controls_Manager::TEXTAREA,
             'default' =>  esc_html__( 'Title' , 'creote-addons'),
         ]);
         $repeater->add_control(
           'tag',
           [
             'label'       => esc_html__( 'Tag', 'creote-addons' ),
             'type'        => Controls_Manager::TEXTAREA,
             'default' =>  esc_html__( 'New' , 'creote-addons'),
         ]);
       $repeater->add_control(
           'link',
           [
           'label' => __('Link', 'creote-addons'),
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
         'image_carousel_repeater',
         [
             'label' => __('Carousel Repeater', 'creote-addons'),
             'type' => Controls_Manager::REPEATER,
             'fields' => $repeater->get_controls(),
             'default' => [
                 [
                   'title' =>  esc_html__( 'Title', 'creote-addons' ),
                   'tag' =>  esc_html__( 'New', 'creote-addons' ),
                 ],
                 [
                   'title' =>  esc_html__( 'Title', 'creote-addons' ),
                   'tag' =>  esc_html__( 'New', 'creote-addons' ),
                 ],
                 [
                   'title' =>  esc_html__( 'Title', 'creote-addons' ),
                   'tag' =>  esc_html__( 'New', 'creote-addons' ),
                 ],
                 [
                   'title' =>  esc_html__( 'Title', 'creote-addons' ),
                   'tag' =>  esc_html__( 'New', 'creote-addons' ),
                 ],
             ],
             'title_field' => '{{{ title }}}',
         ]
     );
$this->end_controls_section();
$this->start_controls_section('image_css',
[ 
    'label' => __('Image Box Css', 'creote-addons'),
    'tab' =>Controls_Manager::TAB_STYLE,
    'condition' => [
     'image_box_styles' => ['style_one'],
   ],
]
);
$this->add_control(
  'custom_css_enable',
 [
    'label' => __('Custom Css Enable', 'creote-addons'),
     'type' => Controls_Manager::SWITCHER,
     'label_on' => __('Yes', 'creote-addons'),
     'label_off' => __('No', 'creote-addons'),
     'return_value' => 'yes',
     'default' => 'no',
 ]
);
$this->add_group_control(
 \Elementor\Group_Control_Typography::get_type(),
 [
   'name' => 'tag_typo',
   'label' => __('Tag Typography ', 'creote-addons'),
   'selector' => '{{WRAPPER}} .mg_image_box .tag ',
   'condition' => [
     'custom_css_enable' => 'yes'
 ],
 ]
);
$this->add_responsive_control(
  'tag_color',
   [
      'label' => __('Tag Color', 'creote-addons'),
      'type' => Controls_Manager::COLOR,
      'selectors' => [
          '{{WRAPPER}} .mg_image_box .tag  ' => 'color: {{VALUE}};',
      ],
      'condition' => [
        'custom_css_enable' => 'yes'
    ],
   ]
 );
 $this->add_responsive_control(
  'tag_bg_color',
   [
      'label' => __('Tag Bg Color', 'creote-addons'),
      'type' => Controls_Manager::COLOR,
      'selectors' => [
          '{{WRAPPER}} .mg_image_box .tag  ' => 'background: {{VALUE}};',
      ],
      'condition' => [
        'custom_css_enable' => 'yes'
    ],
   ]
 );
 $this->add_responsive_control(
  'arrow_color',
   [
      'label' => __('Arrow Color', 'creote-addons'),
      'type' => Controls_Manager::COLOR,
      'selectors' => [
          '{{WRAPPER}} .mg_image_box .image_box .ab_link span  ' => 'color: {{VALUE}};',
      ],
      'condition' => [
        'custom_css_enable' => 'yes'
    ],
   ]
 );
 $this->add_responsive_control(
  'arrow_bg_color',
   [
      'label' => __('Arrow Bg Color', 'creote-addons'),
      'type' => Controls_Manager::COLOR,
      'selectors' => [
          '{{WRAPPER}} .mg_image_box .image_box .ab_link span  ' => 'background: {{VALUE}};',
      ],
      'condition' => [
        'custom_css_enable' => 'yes'
    ],
   ]
 ); 
$this->add_group_control(
\Elementor\Group_Control_Typography::get_type(),
[
 'name' => 'title_typo',
 'label' => __('Title Typography ', 'creote-addons'),
 'selector' => '{{WRAPPER}} .mg_image_box h2 a ',
 'condition' => [
   'custom_css_enable' => 'yes'
],
]
);$this->add_responsive_control(
  'title_color',
  [
    'label' => __('Title Color', 'creote-addons'),
    'type' => Controls_Manager::COLOR,
    'selectors' => [
        '{{WRAPPER}} .mg_image_box h2 a ' => 'color: {{VALUE}};',
    ],
    'condition' => [
      'custom_css_enable' => 'yes'
  ],
  ]
  );
  $this->add_responsive_control(
    'title_bg_color',
    [
      'label' => __('Title Bg Color', 'creote-addons'),
      'type' => Controls_Manager::COLOR,
      'selectors' => [
          '{{WRAPPER}} .mg_image_box h2  ' => 'background: {{VALUE}};',
      ],
      'condition' => [
        'custom_css_enable' => 'yes'
    ],
    ]
    );
$this->end_controls_section();
}
protected function render() {
   	$settings = $this->get_settings_for_display();
    $allowed_tags = wp_kses_allowed_html('post');
?>
<section class="image_grid_content <?php echo esc_attr($settings['image_box_styles']); ?> <?php if($settings['object_fit_cover'] == 'yes'): ?> image_covered <?php endif; ?>"> <div class="row"> <?php foreach($settings['image_carousel_repeater'] as $key => $image_carousel_repeater): $target = $image_carousel_repeater['link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $image_carousel_repeater['link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <div class="<?php echo esc_attr($settings['column_size']); ?>"> <?php // style one ?> <div class="mg_image_box"> <?php if(!empty($image_carousel_repeater['image']['url'])): $image = 'alt'; $image = isset($image_carousel_repeater['image']['alt']) ? $image_carousel_repeater['image']['alt'] : ''; if(!empty($image)) { $image = $image; }else{ $image = 'image'; } ?> <div class="image_box"> <img src="<?php echo esc_url($image_carousel_repeater['image']['url']); ?>" class="img" alt="<?php echo esc_attr($image); ?>" /> <?php if($settings['image_box_styles'] == 'style_one'):?> <a href="<?php echo esc_url($image_carousel_repeater['link']['url']);?>" class="ab_link" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>> <span class="icon-right-arrow-long"></span> </a> <?php endif; ?> </div> <?php endif; ?> <div class="content"> <?php if($settings['image_box_styles'] == 'style_one'): ?> <?php if(!empty($image_carousel_repeater['title'])): ?> <h2> <a href="<?php echo esc_url($image_carousel_repeater['link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>> <?php echo wp_kses($image_carousel_repeater['title'] ,$allowed_tags); ?> </a> </h2> <?php endif; ?> <?php endif; ?> <?php if($settings['image_box_styles'] == 'style_two'): ?> <?php if(!empty($image_carousel_repeater['title'])): ?> <h3> <a href="<?php echo esc_url($image_carousel_repeater['link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>> <?php echo wp_kses($image_carousel_repeater['title'] ,$allowed_tags); ?> </a> </h3> <?php endif; ?> <?php endif; ?> <?php if(!empty($image_carousel_repeater['tag'])): ?> <div class="tag"> <?php echo wp_kses($image_carousel_repeater['tag'] ,$allowed_tags); ?> </div> <?php endif; ?> </div> </div> <?php // style one end ?> </div> <?php endforeach; ?> </div></section>
<?php 
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_image_gri_box_v1());