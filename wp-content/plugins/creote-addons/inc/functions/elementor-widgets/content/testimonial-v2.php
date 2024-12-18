<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_testimonials_v2 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-testimonial-v2';
       }
       public function get_title()
       {
           return __('Testimonial V2' , 'creote-addons');
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
               'textimonial_box_content',
               [
                   'label' => __('Testimonial Content', 'creote-addons')
               ]
           );
           $this->add_control(
               'testimonial_styles',
               [
                 'label' => __('Testimonial Styles', 'creote-addons'),
                 'type' => Controls_Manager::SELECT,
                 'options' => [
                   'style_v2_one' => __( 'Style One', 'creote-addons' ),
                   'style_v2_two' => __( 'Style Two', 'creote-addons' ),
                   ],
                 'default' => __('style_v2_one' , 'creote-addons'),
                 ]
               );
           $this->end_controls_section();
           $this->start_controls_section(
               'testimonial_repeater',
               [
                   'label' => __('Testimonial Content', 'creote-addons'),
                   'condition' => [
                    'testimonial_styles' => 'style_v2_one',
                ],
               ]
           );
           $repeater = new Repeater();
           $repeater->add_control(
               'content_image',
               [
                   'label' => __('Image', 'creote-addons'),
                   'type' => Controls_Manager::MEDIA,
                   'default' => [
                       'url' => \Elementor\Utils::get_placeholder_image_src(),
                   ],
               ]
           );
           $repeater->add_control(
               'brand_image',
               [
                   'label' => __('Brand Image', 'creote-addons'),
                   'type' => Controls_Manager::MEDIA,
                   'default' => [
                       'url' => \Elementor\Utils::get_placeholder_image_src(),
                   ],
               ]
           );
           $repeater->add_control(
               'client_image',
               [
                   'label' => __('Client Image', 'creote-addons'),
                   'type' => Controls_Manager::MEDIA,
                   'default' => [
                       'url' => \Elementor\Utils::get_placeholder_image_src(),
                   ],
               ]
           );
        $repeater->add_control(
   		'name',
   		[
   		'label'       => esc_html__( 'Name', 'creote-addons' ),
   		'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'Jacob Leonardo' , 'creote-addons'),
       ]);
       $repeater->add_control(
   		'designation',
   		[
   		'label'       => esc_html__( 'Designation', 'creote-addons' ),
   		'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'Senior Manager of Excel Solution' , 'creote-addons'),
       ]);
       $repeater->add_control(
   		'comment',
   		[
   		'label'       => esc_html__( 'Comment', 'creote-addons' ),
   		'type'        => Controls_Manager::TEXTAREA,
           'default' =>  esc_html__( 'While running an early stage startup everything feels
           hard, that’s why it’s been so nice to have our accounting
           feel easy. We recommed Qetus.' , 'creote-addons'),
       ]);
       $repeater->add_control(
           'rating_one',
           [
               'label' => __( 'Rating', 'creote-addons' ),
               'type' => Controls_Manager::SELECT,
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
           'testimonial_repeater_c',
           [
               'label' => __('Testimonial Repeater', 'creote-addons'),
               'type' => Controls_Manager::REPEATER,
               'fields' => $repeater->get_controls(),
               'default' => [
                   [
                   'name' => __('Jacob Leonardo', 'creote-addons'),
                   'designation' =>  __('Senior Manager of Excel Solution', 'creote-addons'),
                   'comment' =>  __('While running an early stage startup everything feels
                   hard, that’s why it’s been so nice to have our accounting
                   feel easy. We recommed Qetus.', 'creote-addons'),
                   ],
                   [
                   'name' => __('Jacob Leonardo', 'creote-addons'),
                   'designation' =>  __('Senior Manager of Excel Solution', 'creote-addons'),
                   'comment' =>  __('While running an early stage startup everything feels
                   hard, that’s why it’s been so nice to have our accounting
                   feel easy. We recommed Qetus.', 'creote-addons'),
                   ],
                   [
                   'name' => __('Jacob Leonardo', 'creote-addons'),
                   'designation' =>  __('Senior Manager of Excel Solution', 'creote-addons'),
                   'comment' =>  __('While running an early stage startup everything feels
                   hard, that’s why it’s been so nice to have our accounting
                   feel easy. We recommed Qetus.', 'creote-addons'),
                   ]
               ],
               'title_field' => '{{{ name }}}',
           ]
         );
           $this->end_controls_section();
           $this->start_controls_section(
            'testimonial_repeater_two',
            [
                'label' => __('Testimonial Content', 'creote-addons'),
                'condition' => [
                 'testimonial_styles' => 'style_v2_two',
             ],
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'client_image',
            [
                'label' => __('Client Image', 'creote-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'name',
        [
            'label'       => esc_html__( 'Name', 'creote-addons' ),
            'type'        => Controls_Manager::TEXT,
            'default' =>  esc_html__( 'Jacob Leonardo' , 'creote-addons'),
        ]);
    $repeater->add_control(
        'designation',
        [
        'label'       => esc_html__( 'Designation', 'creote-addons' ),
        'type'        => Controls_Manager::TEXT,
        'default' =>  esc_html__( 'Senior Manager of Excel Solution' , 'creote-addons'),
    ]);
    $repeater->add_control(
        'comment',
        [
        'label'       => esc_html__( 'Comment', 'creote-addons' ),
        'type'        => Controls_Manager::TEXTAREA,
        'default' =>  esc_html__( 'While running an early stage startup everything feels
        hard, that’s why it’s been so nice to have our accounting
        feel easy. We recommed Qetus.' , 'creote-addons'),
    ]);
    $repeater->add_control(
        'rating_one',
        [
            'label' => __( 'Rating', 'creote-addons' ),
            'type' => Controls_Manager::SELECT,
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
        'testimonial_repeater_c_two',
        [
            'label' => __('Testimonial Repeater', 'creote-addons'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                'name' => __('Jacob Leonardo', 'creote-addons'),
                'designation' =>  __('Senior Manager of Excel Solution', 'creote-addons'),
                'comment' =>  __('While running an early stage startup everything feels
                hard, that’s why it’s been so nice to have our accounting
                feel easy. We recommed Qetus.', 'creote-addons'),
                ],
                [
                'name' => __('Jacob Leonardo', 'creote-addons'),
                'designation' =>  __('Senior Manager of Excel Solution', 'creote-addons'),
                'comment' =>  __('While running an early stage startup everything feels
                hard, that’s why it’s been so nice to have our accounting
                feel easy. We recommed Qetus.', 'creote-addons'),
                ],
                [
                'name' => __('Jacob Leonardo', 'creote-addons'),
                'designation' =>  __('Senior Manager of Excel Solution', 'creote-addons'),
                'comment' =>  __('While running an early stage startup everything feels
                hard, that’s why it’s been so nice to have our accounting
                feel easy. We recommed Qetus.', 'creote-addons'),
                ]
            ],
            'title_field' => '{{{ name }}}',
        ]
      );
        $this->end_controls_section();
           $this->start_controls_section('transition_css',
           [ 
               'label' => __('Transition', 'creote-addons'),
               'tab' =>Controls_Manager::TAB_STYLE,
           ]);
           $this->add_control(
            'arrow_enable',
           [
              'label' => __('Arrow Enable', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'yes',
            ]
        ); 
            $this->end_controls_section();
       }
    protected function render()
    {
    $settings = $this->get_settings_for_display();
    $allowed_tags = wp_kses_allowed_html('post');
   ?>
<div class="testimonial_sec <?php echo esc_attr($settings['testimonial_styles']); ?>"> <div class="swiper-container swiper_single"> <div class="swiper-wrapper"> <?php if($settings['testimonial_styles'] == 'style_v2_two'): ?> <?php foreach($settings['testimonial_repeater_c_two'] as $testimonial_repeater_c_two):?> <div class="swiper-slide"> <div class="testimonial_box clearfix"> <div class="authour_details"> <?php if(!empty($testimonial_repeater_c_two['client_image'])): ?> <div class="c_image"> <img src="<?php echo esc_url($testimonial_repeater_c_two['client_image']['url']); ?>" alt="image" /> </div> <?php endif; ?> <div class="comment"> <?php echo wp_kses($testimonial_repeater_c_two['comment'] , $allowed_tags); ?> </div> <div class="details clearfix"> <div class="c_content"> <div class="content_in"> <h2><?php echo esc_attr($testimonial_repeater_c_two['name']); ?></h2> <span><?php echo esc_attr($testimonial_repeater_c_two['designation']); ?></span> </div> </div> </div> <div class="rating"> <ul> <?php if($testimonial_repeater_c_two['rating_one'] == 'one'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c_two['rating_one'] == 'two'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c_two['rating_one'] == 'three'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c_two['rating_one'] == 'four'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c_two['rating_one'] == 'five'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li> <?php else: ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li> <?php endif; ?> </ul> </div> </div> </div> </div> <?php endforeach;?> <?php else: ?> <?php if(!empty($settings['testimonial_repeater_c'])):foreach($settings['testimonial_repeater_c'] as $testimonial_repeater_c):?> <div class="swiper-slide"> <div class="testimonial_box clearfix"> <?php if(!empty($testimonial_repeater_c['content_image'])): $image = isset($testimonial_repeater_c['content_image']['alt']) ? $testimonial_repeater_c['content_image']['alt'] : ''; if(!empty($image)) { $image = $image; }else{ $image = 'image'; } ?> <div class="image"> <img src="<?php echo esc_url($testimonial_repeater_c['content_image']['url']); ?>" alt="<?php echo esc_attr($content_image) ?>" /> </div> <?php endif; ?> <div class="authour_details"> <?php if(!empty($testimonial_repeater_c['brand_image'])): $brand_image = isset($testimonial_repeater_c['brand_image']['alt']) ? $testimonial_repeater_c['brand_image']['alt'] : ''; if(!empty($brand_image)) { $brand_image = $brand_image; }else{ $brand_image = 'image'; } ?> <div class="b_image"> <img src="<?php echo esc_url($testimonial_repeater_c['brand_image']['url']); ?>" alt="<?php echo esc_attr($brand_image); ?>" /> </div> <?php endif; ?> <div class="comment"> <?php echo wp_kses($testimonial_repeater_c['comment'] , $allowed_tags); ?> </div> <div class="details clearfix"> <?php if(!empty($testimonial_repeater_c['client_image'])): $client_image = isset($testimonial_repeater_c['client_image']['alt']) ? $testimonial_repeater_c['client_image']['alt'] : ''; if(!empty($client_image)) { $client_image = $client_image; }else{ $client_image = 'image'; } ?> <div class="c_image"> <img src="<?php echo esc_url($testimonial_repeater_c['client_image']['url']); ?>" alt="<?php echo esc_attr($client_image); ?>" /> </div> <?php endif; ?> <div class="c_content"> <div class="content_in"> <h2><?php echo esc_attr($testimonial_repeater_c['name']); ?></h2> <span><?php echo esc_attr($testimonial_repeater_c['designation']); ?></span> </div> </div> </div> <div class="rating"> <ul> <?php if($testimonial_repeater_c['rating_one'] == 'one'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'two'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'three'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'four'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span></li> <?php elseif($testimonial_repeater_c['rating_one'] == 'five'): ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li> <?php else: ?> <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li> <?php endif; ?> </ul> </div> </div> </div> </div> <?php endforeach; endif;?> <?php endif; ?> </div> </div> <?php if($settings['arrow_enable'] == 'yes'): ?> <div class="arrows"> <div class="prev-single-one"></div> <div class="next-single-one"></div> </div> <?php endif; ?></div>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_testimonials_v2());