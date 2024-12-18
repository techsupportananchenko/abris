<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_testimonial_v1_new extends Widget_Base
{
    public function get_name()
    {
        return 'creote-testimonial-v3';
    }
    public function get_title()
    {
        return __('Testimonial V3' , 'creote-addons');
    }
    public function get_icon()
    {
        return 'icon-c';
    }
    public function get_categories()
    {
        return ['104'];
    }
    protected function register_controls()
    {
        $this->start_controls_section(
            'testimonial_settings',
            [
                'label' => __('Testimonial Settings', 'creote-addons')
            ]
        );
           $this->add_control(
            'testminoal_style',
            [
                'label' => __('Testimonial Type', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'type_one'  => __('Testimonial Type One', 'creote-addons'),
                    'type_two' => __('Testimonial Type Two  ', 'creote-addons'),
                ],
                'default' => 'type_one',
            ]
          );
          $this->add_control(
            'hrowlitems',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
           );
           $this->add_control(
            'items_to_display_big',
            [
                'label' => __('Carousel Items To Display Large Device', 'creote-addons'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 1,
                'min'     => 1,
                'max'     => 5,
                'step'    => 1,
            ]
         );
         $this->add_control(
          'items_to_display',
          [
              'label' => __('Carousel Items To Display Desktop', 'creote-addons'),
              'type'    => Controls_Manager::NUMBER,
              'default' => 1,
              'min'     => 1,
              'max'     => 5,
              'step'    => 1,
          ]
       );
         $this->add_control(
          'items_to_display_lap',
          [
              'label' => __('Carousel Items To Display Laptop', 'creote-addons'),
              'type'    => Controls_Manager::NUMBER,
              'default' => 1,
              'min'     => 1,
              'max'     => 5,
              'step'    => 1,
          ]
       );
       $this->add_control(
        'items_to_display_tab',
        [
            'label' => __('Carousel Items To Display Tablet', 'creote-addons'),
            'type'    => Controls_Manager::NUMBER,
            'default' => 1,
            'min'     => 1,
            'max'     => 5,
            'step'    => 1,
        ]
     );
     $this->add_control(
      'items_to_display_mobile',
      [
          'label' => __('Carousel Items To Display Mobile', 'creote-addons'),
          'type'    => Controls_Manager::NUMBER,
          'default' => 1,
          'min'     => 1,
          'max'     => 5,
          'step'    => 1,
      ]
   );
   $this->add_control(
    'items_to_display_mini',
    [
        'label' => __('Carousel Items To Display Small Mobile', 'creote-addons'),
        'type'    => Controls_Manager::NUMBER,
        'default' => 1,
        'min'     => 1,
        'max'     => 5,
        'step'    => 1,
    ]
 );
          $this->add_control(
            'hrowlitemsend',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
           );
           $repeater = new Repeater();
        $repeater->add_control(
            'image_enable',
           [
              'label' => __('Image Enable', 'creote-addons'),
               'type' => \Elementor\Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'yes',
           ]
        );
        $repeater->add_control(
            'image',
            [
                'label' => __('Image', 'creote-addons'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'image_enable' => 'yes',
                ],
            ]
        );
     $repeater->add_control(
		'name',
		[
		'label'       => esc_html__( 'Name', 'creote-addons' ),
		'type'        => \Elementor\Controls_Manager::TEXT,
        'default' =>  esc_html__( 'Jacob Leonardo' , 'creote-addons'),
    ]);
    $repeater->add_control(
		'designation',
		[
		'label'       => esc_html__( 'Designation', 'creote-addons' ),
		'type'        => \Elementor\Controls_Manager::TEXT,
        'default' =>  esc_html__( 'Senior Manager of Excel Solution' , 'creote-addons'),
    ]);
    $repeater->add_control(
		'comment',
		[
		'label'       => esc_html__( 'Comment', 'creote-addons' ),
		'type'        => \Elementor\Controls_Manager::TEXTAREA,
        'default' =>  esc_html__( 'While running an early stage startup everything feels
        hard, that’s why it’s been so nice to have our accounting
        feel easy. We recommed Qetus.' , 'creote-addons'),
    ]);
    $repeater->add_control(
        'rating_one',
        [
            'label' => __( 'Rating', 'creote-addons' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' =>  esc_html__( 'two' , 'creote-addons'),
            'options' => [
                'one' => __('1', 'creote-addons'),
                'two' => __('2', 'creote-addons'),
                'three' => __('3', 'creote-addons'),
                'four' => __('4', 'creote-addons'),
                'five' => __('5', 'creote-addons'),
            ],
        ]
    );
    $this->add_control(
        'testi_v1_repeater',
        [
            'label' => __('Testimonial Content', 'creote-addons'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                   'image_enable' => 'yes' ,
                   'name' =>  __('Fleix Everard ', 'creote-addons'),
                   'designation' =>  __('HR, Blue Soft Sol', 'creote-addons'),
                   'comment'  =>  __('You bring tremendous value to company. We have generated more leads in the last 45 days than the last 2 days ...', 'creote-addons'),
                   'rating_one' => 'three'
                ],
                [
                    'image_enable' => 'yes' ,
                    'name' =>  __('Boris Elbert ', 'creote-addons'),
                    'designation' =>  __('Green Tech', 'creote-addons'),
                    'comment'  =>  __('I love creote  everyone has been great to work with and you’re all great partner for company, we thank you ...', 'creote-addons'),
                    'rating_one' => 'three'
                 ], 
                 [
                    'image_enable' => 'yes' ,
                    'name' =>  __('Ivor Herbert', 'creote-addons'),
                    'designation' =>  __('Manager, Airlines', 'creote-addons'),
                    'comment'  =>  __('We hired creote to assist us with refining marketing plans, you truly understands & gave us very good ideas.', 'creote-addons'),
                    'rating_one' => 'three'
                 ]
            ],
            'title_field' => '{{{ name }}}',
        ]
    );
      $this->end_controls_section();
        $this->start_controls_section('testimonial_box_css',
        [ 
            'label' => __('Custom Css', 'creote-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
        );
          $this->add_control(
            'heading_color',
             [
                'label' => __('Heading Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .testimonial_box.type_one .lower_content .authour_name h2 , {{WRAPPER}} .testimonial_box.type_two .lower_content .authour_name h2 ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'small_text_color',
             [
                'label' => __('Position Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .testimonial_box.type_one .lower_content .authour_name h6 , {{WRAPPER}} .testimonial_box.type_two .lower_content .authour_name h6 ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'description_color',
             [
                'label' => __('Description Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .testimonial_box.type_one p  , {{WRAPPER}} .testimonial_box.type_two  .description p ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
        $this->add_control(
            'meta_star_onecolor',
             [
                'label' => __('Rating Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}  .testimonial_box.type_one .lower_content .authour_name p i  , {{WRAPPER}}  .testimonial_box.type_two .lower_content p i  ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'meta_star_onecolortwo',
             [
                'label' => __('Rating Color Two', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}  .testimonial_box.type_one .lower_content .authour_name p i.empty  , {{WRAPPER}}  .testimonial_box.type_two .lower_content p i.empty  ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'meta_tag_twocolor',
             [
                'label' => __('Quote Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .testimonial_box.type_one span  , {{WRAPPER}} .testimonial_box.type_two .upper_content .image_box span ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'meta_tag_twocolor_bg',
             [
                'label' => __('Quote Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .testimonial_box.type_one span , {{WRAPPER}} .testimonial_box.type_two .upper_content .image_box span  ' => 'background: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'hrfreety',
            [
                'type' => Controls_Manager::DIVIDER,
                'condition' => [
                    'testminoal_style' => ['type_one'],
                  ],
            ]
        );
        $this->add_control(
            'hover_heading_color',
             [
                'label' => __('Heading Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR, 
                 'selectors' => [
                    '{{WRAPPER}} .testimonial_box.type_one:hover .lower_content .authour_name h2 , {{WRAPPER}} .testimonial_box.type_two .lower_content .authour_name h2:hover ' => 'color: {{VALUE}}!important;',
                  ],
                  'condition' => [
                    'testminoal_style' => ['type_one'],
                  ],
             ]
          );
          $this->add_control(
            'hover_small_text_color',
             [
                'label' => __('Position Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR, 
                 'selectors' => [
                    '{{WRAPPER}} .testimonial_box.type_one:hover .lower_content .authour_name h6  ' => 'color: {{VALUE}}!important;',
                  ],
                  'condition' => [
                    'testminoal_style' => ['type_one'],
                  ],
             ]
          );
          $this->add_control(
            'hover_description_color',
             [
                'label' => __('Description Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .testimonial_box.type_one:hover p ' => 'color: {{VALUE}}!important;',
                  ],
                  'condition' => [
                    'testminoal_style' => ['type_one'],
                  ],
             ]
          );
        $this->add_control(
            'hover_meta_star_onecolor',
             [
                'label' => __('Rating Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}  .testimonial_box.type_one:hover .lower_content .authour_name p i  ' => 'color: {{VALUE}}!important;',
                  ],
                  'condition' => [
                    'testminoal_style' => ['type_one'],
                  ],
             ]
          );
          $this->add_control(
            'hover_meta_tag_twocolor',
             [
                'label' => __('Quote Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .testimonial_box.type_one:hover span.icon-quote  ' => 'color: {{VALUE}}!important;',
                  ],
                  'condition' => [
                    'testminoal_style' => ['type_one'],
                  ],
             ]
          );
          $this->add_control(
            'hover_meta_tag_twocolor_bg',
             [
                'label' => __('Quote Bg Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .testimonial_box.type_one:hover span.icon-quote  ' => 'background: {{VALUE}}!important;',
                  ],
                  'condition' => [
                    'testminoal_style' => ['type_one'],
                  ],
             ]
          );
          $this->add_control(
            'hover_testi_bg',
             [
                'label' => __('Testimonial Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .testimonial_box.type_one .testimonial_inner:before  ' => 'background: {{VALUE}}!important;',
                  ],
                  'condition' => [
                    'testminoal_style' => ['type_one'],
                  ],
             ]
          );
          $this->end_controls_section();
          $this->start_controls_section('newsowl_nav_dot_css',
          [ 
              'label' => __('Owl Nav / Dots', 'creote-addons'),
              'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
          );
          $this->add_control(
              'owl_nav_block',
              [
                  'label' => __('Owl Nav Disable / Enable', 'creote-addons'),
                  'type' => Controls_Manager::CHOOSE,
                  'options' => [
                      'owl_nav_block' => [
                          'title' => __('Enable', 'creote-addons'),
                          'icon' => 'fa fa-check-circle',
                      ],
                      'owl_nav_none' => [
                          'title' => __('Disable', 'creote-addons'),
                          'icon' => 'fa fa-ban',
                      ],
                  ],
                  'default' => 'owl_nav_block',
                  'toggle' => true,
              ]
          );
          $this->add_control(
              'owl_dots_block',
              [
                  'label' => __('Owl dots Disable / Enable', 'creote-addons'),
                  'type' => Controls_Manager::CHOOSE,
                  'options' => [
                      'owl_dots_block' => [
                          'title' => __('Enable', 'creote-addons'),
                          'icon' => 'fa fa-check-circle',
                      ],
                      'owl_dots_none' => [
                          'title' => __('Disable', 'creote-addons'),
                          'icon' => 'fa fa-ban',
                      ],
                  ],
                  'default' => 'owl_dots_block',
                  'toggle' => true,
              ]
          );
          $this->add_control(
            'owl_nav_postion',
            [
                'label' => __('Owl Nav Position', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'owl_type_one'  => __( 'Position Type One', 'creote-addons' ),
                    'owl_type_two' => __( 'Position Type Two', 'creote-addons' ),
                    'owl_type_three' => __( 'Position Type Three', 'creote-addons' ),
                    'owl_type_four' => __( 'Position Type Four', 'creote-addons' ),
                ],
                'default' => __('owl_type_one' , 'creote-addons'),
            ]
        );
          $this->add_control(
              'hrfivety',
              [
                  'type' => Controls_Manager::DIVIDER,
              ]
          );
          $this->add_control(
              'owl_nav_color',
               [
                  'label' => __('Owl Nav Bg Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                   'selectors' => [
                      '{{WRAPPER}} .testimonial_all.carousel .owl_nav_block.owl-carousel .owl-nav .owl-prev, .testimonial_all.carousel .owl_nav_block.owl-carousel .owl-nav .owl-next' => 'background: {{VALUE}}!important;',
                  ],
               ]
            );
            $this->add_control(
              'owl_nav_iconcolor',
               [
                  'label' => __('Owl Nav Icon Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                   'selectors' => [
                      '{{WRAPPER}} .testimonial_all.carousel .owl_nav_block.owl-carousel .owl-nav .owl-prev span, .testimonial_all.carousel .owl_nav_block.owl-carousel .owl-nav .owl-next span' => 'color: {{VALUE}}!important;',
                  ],
               ]
            );
            $this->add_control(
              'hrfivetst',
              [
                  'type' => Controls_Manager::DIVIDER,
              ]
          );
          $this->add_control(
              'owl_dot_color',
               [
                  'label' => __('Owl Dot Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                   'selectors' => [
                      '{{WRAPPER}} .testimonial_all.carousel .owl_dots_block .owl-dots .owl-dot' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
                  ],
               ]
            );
          $this->add_control(
              'owl_dot_color_color',
               [
                  'label' => __('Owl Dot Border Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                   'selectors' => [
                      '{{WRAPPER}} .testimonial_all.carousel .owl_dots_block  .owl-dots .owl-dot' => 'border-color: {{VALUE}}!important;',
                  ],
               ]
            );
            $this->add_control(
              'owl_dot_color_active',
               [
                  'label' => __('Owl Dot Hover / active color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                   'selectors' => [
                      '{{WRAPPER}} .testimonial_all.carousel .owl_dots_block .owl-dots .owl-dot:hover ,  {{WRAPPER}} .testimonial_all.carousel .owl_dots_block .owl-dots .owl-dot.active' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
                  ],
               ]
            );
            $this->add_control(
              'hrfivets',
              [
                  'type' => Controls_Manager::DIVIDER,
              ]
          );
            $this->add_control(
              'hover_owl_nav_color',
               [
                  'label' => __('Owl Nav Hover Bg Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                   'selectors' => [
                      '{{WRAPPER}} .testimonial_all.carousel .owl_nav_block.owl-carousel .owl-nav .owl-prev:hover , {{WRAPPER}} .testimonial_all.carousel .owl_nav_block.owl-carousel .owl-nav .owl-next:hover' => 'background: {{VALUE}}!important;',
                  ],
               ]
            );
            $this->add_control(
              'hover_owl_nav_iconcolor',
               [
                  'label' => __('Owl Nav Hover Icon Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                   'selectors' => [
                      '{{WRAPPER}} .testimonial_all.carousel .owl_nav_block.owl-carousel .owl-nav .owl-prev:hover span , {{WRAPPER}}  .testimonial_all.carousel .owl_nav_block.owl-carousel .owl-nav .owl-next:hover span' => 'color: {{VALUE}}!important;',
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
<section class="testimonial_all carousel owl_new_one">
    <div class="owl-carousel <?php echo $settings['owl_nav_block']; ?> <?php echo $settings['owl_dots_block']; ?> <?php echo $settings['owl_nav_postion']; ?> theme_carousel owl-theme owl-carousel" 
        data-options='{
            "loop": true, 
            "margin": 10, 
            "autoheight": true, 
            "lazyload": true, 
            "nav": false, 
            "dots": true, 
            "autoplay": true, 
            "autoplayTimeout": 7000, 
            "smartSpeed": 1800, 
            "responsive": { 
                "0": { 
                    "items": "<?php echo esc_attr($settings['items_to_display_mini']); ?>" 
                }, 
                "768": { 
                    "items": "<?php echo esc_attr($settings['items_to_display_mobile']); ?>" 
                }, 
                "1024": { 
                    "items": "<?php echo esc_attr($settings['items_to_display_tab']); ?>" 
                }, 
                "1200": { 
                    "items": "<?php echo esc_attr($settings['items_to_display_lap']); ?>" 
                }, 
                "1366": { 
                    "items": "<?php echo esc_attr($settings['items_to_display']); ?>" 
                }, 
                "2400": { 
                    "items": "<?php echo esc_attr($settings['items_to_display_big']); ?>" 
                } 
            }
        }'>
 <?php foreach($settings['testi_v1_repeater'] as $test_block):?> <?php if($settings['testminoal_style'] == 'type_two'): ?> <div class="testimonial_box type_two"> <div class="upper_content"> <?php if($test_block['image_enable'] == 'yes'): if(!empty($test_block['image']['url'])): $image = isset($test_block['image']['alt']) ? $test_block['image']['alt'] : ''; if(!empty($image)) { $image = $image; }else{ $image = 'image'; } ?> <div class="image_box"> <img src="<?php echo esc_url($test_block['image']['url']); ?>" alt="<?php echo esc_attr($image); ?>" /> <span class="icon-quote"></span> </div> <?php endif; ?> <?php endif; ?> <?php if(!empty($test_block['comment'])): ?> <div class="description"> <p><?php echo wp_kses($test_block['comment'] , $allowed_tags); ?> </p> </div> <?php endif; ?> </div> <div class="lower_content clearfix"> <div class="authour_name"> <?php if(!empty($test_block['name'])): ?> <h2><?php echo esc_attr($test_block['name']); ?></h2> <?php endif; ?> <?php if(!empty($test_block['designation'])): ?> <h6><?php echo esc_attr($test_block['designation']); ?></h6> <?php endif; ?> </div> <p> <?php if($test_block['rating_one'] == 'one'): ?> <i class="fa fa-star fill"></i> <i class="fa fa-star empty"></i> <i class="fa fa-star empty"></i> <i class="fa fa-star empty"></i> <i class="fa fa-star empty"></i> <?php elseif($test_block['rating_one'] == 'two'): ?> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star empty"></i> <i class="fa fa-star empty"></i> <i class="fa fa-star empty"></i> <?php elseif($test_block['rating_one'] == 'three'): ?> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star empty"></i> <i class="fa fa-star empty"></i> <?php elseif($test_block['rating_one'] == 'four'): ?> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star empty"></i> <?php elseif($test_block['rating_one'] == 'five'): ?> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <?php else: ?> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <?php endif; ?> </p> </div> </div> <?php else: ?> <div class="testimonial_box type_one"> <span class="icon-quote"></span> <div class="testimonial_inner"> <?php if(!empty($test_block['comment'])): ?> <div class="description"> <p><?php echo wp_kses($test_block['comment'] , $allowed_tags); ?> </p> </div> <?php endif; ?> <div class="lower_content clearfix"> <?php if($test_block['image_enable'] == 'yes'): if(!empty($test_block['image']['url'])): $image = isset($test_block['image']['alt']) ? $test_block['image']['alt'] : ''; if(!empty($image)) { $image = $image; }else{ $image = 'image'; } ?> <div class="image_box"> <img src="<?php echo esc_url($test_block['image']['url']); ?>" alt="<?php echo esc_attr($image); ?>" /> </div> <?php endif; ?> <?php endif; ?> <div class="authour_name"> <?php if(!empty($test_block['name'])): ?> <h2><?php echo esc_attr($test_block['name']); ?></h2> <?php endif; ?> <?php if(!empty($test_block['designation'])): ?> <h6><?php echo esc_attr($test_block['designation']); ?></h6> <?php endif; ?> <p> <?php if($test_block['rating_one'] == 'one'): ?> <i class="fa fa-star fill"></i> <i class="fa fa-star empty"></i> <i class="fa fa-star empty"></i> <i class="fa fa-star empty"></i> <i class="fa fa-star empty"></i> <?php elseif($test_block['rating_one'] == 'two'): ?> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star empty"></i> <i class="fa fa-star empty"></i> <i class="fa fa-star empty"></i> <?php elseif($test_block['rating_one'] == 'three'): ?> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star empty"></i> <i class="fa fa-star empty"></i> <?php elseif($test_block['rating_one'] == 'four'): ?> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star empty"></i> <?php elseif($test_block['rating_one'] == 'five'): ?> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <?php else: ?> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <i class="fa fa-star fill"></i> <?php endif; ?> </p> </div> </div> </div> </div> <?php endif; ?> <?php endforeach;?> </div></section>
<?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_testimonial_v1_new());