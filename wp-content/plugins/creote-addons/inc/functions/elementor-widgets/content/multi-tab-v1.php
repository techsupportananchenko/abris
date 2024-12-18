<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_multi_tab_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-multi-tab-v1';
       }
       public function get_title()
       {
           return __('Multi Tab Content V1' , 'creote-addons');
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
             'tabs_settings_style_one',
             [
                 'label' => __('Tabs Content Box', 'creote-addons'),
             ]
         );
           $repeater = new Repeater();
           $repeater->add_control(
            'tab_id',
            [
                'label'       => esc_html__( 'Tab Id Without gap', 'creote-addons' ),
                'type'        => Controls_Manager::TEXT,
             'default' =>  esc_html__( 'tabone' , 'creote-addons'),
            ]);
            $repeater->add_control(
            'tab_title',
            [
              'label'       => esc_html__( 'Tab Title', 'creote-addons' ),
              'type'        => Controls_Manager::TEXT,
              'default' =>  esc_html__( '01. Affordable' , 'creote-addons'),
           ]);
           $repeater->add_control(
            'tab_content_type',
            [
                'label' => __('Tab Content Type', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'about_content'  => __('About Content', 'creote-addons'),
                    'service_content'  => __('Service Content', 'creote-addons'),
                    'project_content'  => __('Project Content', 'creote-addons'),
                ],
                'default' => 'about_content',
            ]); 
            $repeater->add_control(
                'about_image',
                [
                    'label' => __('About Image', 'creote-addons'),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => CREOTE_ADDONS_URL. 'assets/images/010-job-search.png',
                    ],
                    'condition' => [
                        'tab_content_type' => 'about_content',
                    ],
                ]
            );
         $repeater->add_control(
           'small_title',
           [
             'label'       => esc_html__( 'Sub Title', 'creote-addons' ),
             'type'        => Controls_Manager::TEXTAREA,
             'default' =>  esc_html__( 'Why Creote.' , 'creote-addons'),
             'condition' => [
                'tab_content_type' => 'about_content',
            ],
             ]
         );
         $repeater->add_control(
   		'title',
   		[
   			'label'       => esc_html__( 'Title', 'creote-addons' ),
   			'type'        => Controls_Manager::TEXTAREA,
            'default' =>  esc_html__( 'Affordable & Flexible' , 'creote-addons'),
            'condition' => [
                'tab_content_type' => 'about_content',
            ],
   		]);
           $repeater->add_control(
   			'con_des',
   			[
   				'label'       => esc_html__( 'Description', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
                'default' =>  esc_html__( 'Must explain too you how all this mistaken idea of denouncing pleasures
                   praising pain was born and we will give you complete account of the system
                   the actual teachings of the great explorer.' , 'creote-addons'), 
                'condition' => [
                    'tab_content_type' => 'about_content',
                ],
   			]);
           $repeater->add_control(
             'button_text',
             [
               'label' => esc_html__( 'Button Text', 'creote-addons' ),
               'type'  => Controls_Manager::TEXT,
                'default' =>  esc_html__( 'Contact us' , 'creote-addons'),
                'condition' => [
                    'tab_content_type' => 'about_content',
                ],
           ]);
           $repeater->add_control(
             'button_link',
             [
               'label' => __('Theme Link', 'creote-addons'),
               'type' => Controls_Manager::URL,
               'placeholder' => __('https://your-link.com', 'creote-addons'),
               'show_external' => true,
               'default' => [
                   'url' => '#',
                   'is_external' => true,
                   'nofollow' => true,
               ],
               'condition' => [
                'tab_content_type' => 'about_content',
                ],
           ]);  
       $repeater->add_control(
        'ser_post_count',
        [
            'label' => __('Service Post Count', 'creote-addons'),
            'type'    => Controls_Manager::NUMBER,
            'default' => 3,
            'min'     => 1,
            'max'     => 100,
            'step'    => 1,
            'condition' => [
                'tab_content_type' => 'service_content',
            ],
        ]
        );
        $repeater->add_control(
            'ser_text_limit',
            [
                'label'   => esc_html__( 'Text Limit', 'creote-addons' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 12,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
                'condition' => [
                    'tab_content_type' => 'service_content',
                ],
            ]
        );
        $repeater->add_control(
        'ser_query_category', 
            [
              'type' => Controls_Manager::SELECT,
              'label' => esc_html__('Service Category', 'creote-addons'),
              'options' => get_service_categories(),
              'condition' => [
                'tab_content_type' => 'service_content',
            ],
            ]
        );
        $repeater->add_control(
        'pro_post_count',
        [
         'label' => __('Project Post Count', 'creote-addons'),
         'type'    => Controls_Manager::NUMBER,
         'default' => 3,
         'min'     => 1,
         'max'     => 100,
         'step'    => 1,
         'condition' => [
            'tab_content_type' => 'project_content',
        ],
        ]
        );
        $repeater->add_control(
            'pro_text_limit',
            [
                'label'   => esc_html__( 'Text Limit', 'creote-addons' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 12,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
                'condition' => [
                    'tab_content_type' => 'project_content',
                ],
            ]
        );
        $repeater->add_control(
        'pro_query_category', 
         [
           'type' => Controls_Manager::SELECT,
           'label' => esc_html__('Category', 'creote-addons'),
           'options' => get_project_categories(),
           'condition' => [
            'tab_content_type' => 'project_content',
        ],
         ]
        );
           $this->add_control(
               'multi_tab_repeater',
               [
                   'label' => __('Tab Content Repeater', 'creote-addons'),
                   'type' => Controls_Manager::REPEATER,
                   'fields' => $repeater->get_controls(),
                   'default' => [
                       [
                       'tab_id' =>  esc_html__( 'tabone' , 'creote-addons'),
                       'tab_title' =>  esc_html__('Innovative Solutions' , 'creote-addons'),
                       'tab_content_type'  =>  esc_html__('about_content' , 'creote-addons'),
                       'small_title'  =>  esc_html__('Why Creote' , 'creote-addons'),
                       'title'  =>  esc_html__('Affordable & Flexible' , 'creote-addons'),
                       'con_des'  =>  esc_html__('Must explain too you how all this mistaken idea of denouncing pleasures
                       praising pain was born and we will give you complete account of the system
                       the actual teachings of the great explorer.' , 'creote-addons'),
                       'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                       ],
                       [
                        'tab_id' =>  esc_html__( 'two' , 'creote-addons'),
                        'tab_title' =>  esc_html__('Innovative Solutions' , 'creote-addons'),
                        'tab_content_type'  =>  esc_html__('about_content' , 'creote-addons'),
                        'small_title'  =>  esc_html__('Why Creote' , 'creote-addons'),
                        'title'  =>  esc_html__('Affordable & Flexible' , 'creote-addons'),
                        'con_des'  =>  esc_html__('Must explain too you how all this mistaken idea of denouncing pleasures
                        praising pain was born and we will give you complete account of the system
                        the actual teachings of the great explorer.' , 'creote-addons'),
                        'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                       ],
                       [
                        'tab_id' =>  esc_html__( 'tthree' , 'creote-addons'),
                        'tab_title' =>  esc_html__('Innovative Solutions' , 'creote-addons'),
                        'tab_content_type'  =>  esc_html__('about_content' , 'creote-addons'),
                        'small_title'  =>  esc_html__('Why Creote' , 'creote-addons'),
                        'title'  =>  esc_html__('Affordable & Flexible' , 'creote-addons'),
                        'con_des'  =>  esc_html__('Must explain too you how all this mistaken idea of denouncing pleasures
                        praising pain was born and we will give you complete account of the system
                        the actual teachings of the great explorer.' , 'creote-addons'),
                        'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                       ]
                   ], 
                   'title_field' => '{{{ tab_title }}}',
               ]
           );
        $this->end_controls_section();
       }
protected function render(){
$settings = $this->get_settings_for_display();
$allowed_tags = wp_kses_allowed_html('post');
?>
<section class="tabs_all_box tabs_all_box_start multi_tab_conent"> <div class="tab_over_all_box"> <?php // if($settings['tab_box_style'] == 'type_one'): ?> <?php //style_one ?> <div class="tabs_header clearfix"> <ul class="showcase_tabs_btns nav-pills nav clearfix"> <?php foreach($settings['multi_tab_repeater'] as $key => $multi_tab_repeater):?> <li class="nav-item"> <a class="s_tab_btn nav-link <?php if($key == 0) echo 'active';?>" data-tab="#tab<?php echo esc_attr($multi_tab_repeater['tab_id']); ?>"> <?php if(!empty($multi_tab_repeater['tab_title'])): ?> <?php echo esc_html($multi_tab_repeater['tab_title']); ?><?php endif;?> </a> </li> <?php endforeach;?> </ul> </div> <div class="s_tab_wrapper"> <div class="s_tabs_content"> <?php foreach($settings['multi_tab_repeater'] as $key => $multi_tab_repeater):?> <div class="s_tab fade <?php if($key == 0) echo 'active-tab show';?>" id="tab<?php echo esc_attr($multi_tab_repeater['tab_id']); ?>"> <?php if($multi_tab_repeater['tab_content_type'] == 'service_content'): ?> <div class="tab_content one" > <div class="row clearfix"> <?php $args = array( 'post_type' => 'service', 'ignore_sticky_posts' => true, 'orderby' => 'date', 'posts_per_page' => $multi_tab_repeater['ser_post_count'], ); if( $multi_tab_repeater['ser_query_category'] ) $args['service_category'] = $multi_tab_repeater['ser_query_category']; $service_query = new \WP_Query( $args ); ?> <?php while ($service_query->have_posts()) : ?> <?php $service_query->the_post();?> <?php $myexcerpt = wp_trim_words(get_the_excerpt(), $multi_tab_repeater['ser_text_limit']); $mycontent = wp_trim_words(get_the_content(), $multi_tab_repeater['ser_text_limit']); $class_icon_in = 'icon_no'; if((get_post_meta( get_the_ID(), 'service_icon', true )) || (get_post_meta(get_the_ID() , 'service_icon_image', true))): $class_icon_in = 'icon_yes'; endif; $service_transition = get_post_meta( get_the_ID(), 'transition_timing_service', true ); $service_icon = get_post_meta( get_the_ID(), 'service_icon', true ); $service_icon_images = rwmb_meta( 'service_icon_image', array( 'size' => 'thumbnail' ) );; $cats = get_the_terms( get_the_ID(), 'service_category' ); ?><div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <div class="service_post style_four"> <?php if(has_post_thumbnail()): ?> <div class="image_box"> <?php the_post_thumbnail($image_size); ?> </div> <?php endif;?> <div class="content_in_box"> <?php if(!empty($service_icon)): ?> <div class="icon_box"> <span class="<?php echo esc_attr($service_icon); ?> icons"></span> </div> <span class="<?php echo esc_attr($service_icon); ?> bg_im"></span> <?php elseif(!empty($service_icon_images)): foreach($service_icon_images as $service_icon_image ):?> <div class="icon_box"> <img src="<?php echo esc_url($service_icon_image['url']); ?>"> </div> <img src="<?php echo esc_url($service_icon_image['url']); ?>" class="bg_im"> <?php endforeach; endif; ?> <div class="content_box "> <?php the_title( '<h2 class="title_service"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?> <?php if(!empty($myexcerpt)){?> <p class="short_desc"><?php echo esc_html($myexcerpt); ?></p> <?php }elseif(!empty($mycontent)){ ?> <p class="short_desc"><?php echo esc_html($mycontent); ?></p> <?php } ?> <a class="read_more" href="<?php echo esc_url(get_permalink()); ?>"> <?php echo esc_html('Read More' , 'creote-addons'); ?><i class="icon-right-arrow-long"></i></a> </div> </div> </div> </div> <?php endwhile; ?> <?php wp_reset_postdata(); ?> </div> </div> <?php else: ?> <div class="tab_content one" > <div class="row"> <div class="col-lg-6 col-md-12"> <?php if(!empty($multi_tab_repeater['about_image']['url'])): $about_image = isset($multi_tab_repeater['about_image']['alt']) ? $multi_tab_repeater['about_image']['alt'] : ''; if(!empty($about_image)) { $about_image = $about_image; } else{ $about_image = 'image'; } ?> <div class="imag_bg"> <img src="<?php echo esc_url($multi_tab_repeater['about_image']['url']); ?>" alt="<?php echo esc_attr($about_image); ?>" class="img-fluid" /> </div> <?php endif;?> </div> </div> <div class="content_bc"> <?php if(!empty($multi_tab_repeater['small_title'])): ?> <h6><?php echo wp_kses($multi_tab_repeater['small_title'] , $allowed_tags); ?></h6> <?php endif;?> <?php if(!empty($multi_tab_repeater['title'])): ?> <h2><?php echo wp_kses($multi_tab_repeater['title'] , $allowed_tags); ?></h2> <?php endif;?> <?php if(!empty($multi_tab_repeater['con_des'])): ?> <p><?php echo wp_kses($multi_tab_repeater['con_des'] , $allowed_tags); ?></p> <?php endif;?> <?php if(!empty($multi_tab_repeater['button_text'])): ?> <?php $target = $multi_tab_repeater['button_link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $multi_tab_repeater['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <a href="<?php echo esc_url($multi_tab_repeater['button_link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="rd_more"> <?php echo esc_attr($multi_tab_repeater['button_text']);?> <i class="icon-right-arrow"></i> </a> <?php endif;?> </div> </div><?php endif; ?> </div> <?php endforeach;?> </div> </div> <?php //style_three end ?> <?php // endif; ?> </div></section>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_multi_tab_v1());