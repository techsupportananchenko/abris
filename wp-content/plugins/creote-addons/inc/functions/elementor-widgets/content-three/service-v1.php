<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_service_v1_new extends Widget_Base
{
    public function get_name()
    {
        return 'creote-service-v1-new';
    }
    public function get_title()
    {
        return __('service V1' , 'creote-addons');
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
            'service_settings',
            [
                'label' => __('service Settings', 'creote-addons')
            ]
        );
        $this->add_control(
            'service_style',
            [
                'label' => __('service style', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'type_one'  => __('Style One ', 'creote-addons'),
                    'type_two' => __('Style Two ', 'creote-addons'),
                    'type_three' => __('Style Three ', 'creote-addons'),
                ],
                'default' => 'type_two',
            ]
        );
        $this->add_control(
            'service_box_type',
            [
                'label' => __('service  Type', 'creote-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'grid' => [
						'title' => __( 'Grid Type', 'creote-addons' ),
						'icon' => 'fa  fa-th',
					],
					'carousel' => [
						'title' => __( 'Carousel Type', 'creote-addons' ),
						'icon' => 'fa fa-sliders',
					],
				],
                'default' => 'grid',
            ]
        );
        $this->add_control(
            'hrowlitems',
            [
                'type' => Controls_Manager::DIVIDER,
                'condition' => [
                    'hover_custom_css' => 'yes',
                ]
            ]
           );
           $this->add_control(
            'items_to_display',
            [
                'label' => __('Carousel Items To Display', 'creote-addons'),
                'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 3,
				'max'     => 8,
				'step'    => 1,
                'condition' => [
                    'service_box_type' => 'carousel',
                ]
            ]
         );
          $this->add_control(
            'column_count',
            [
                'label' => __('Column Size', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'col-xl-12'  => __('One Column', 'creote-addons'),
                    'col-xl-6' => __('Two Column', 'creote-addons'),
                    'col-xl-4' => __('Three Column', 'creote-addons'),
                    'col-xl-3' => __('Four Coumn', 'creote-addons'),
                ],
                'default' => 'col-xl-3',
                'condition' => [
                    'service_box_type' => 'grid',
                ]
            ]
        );
        $this->add_control(
            'hrowlitemsend',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
           );
        $this->add_control(
            'excerpt_enable',
            [
                'label' => __('Excerpt Enable / Disable', 'creote-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
          );
        $this->add_control(
            'post_count',
            [
                'label'   => esc_html__( 'Number of post', 'creote-addons' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 8,
                'min'     => 1,
                'max'     => 1000,
                'step'    => 1,
            ]);
        $this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'creote-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'creote-addons' ),
					'title'      => esc_html__( 'Title', 'creote-addons' ),
					'menu_order' => esc_html__( 'Menu Order', 'creote-addons' ),
					'rand'       => esc_html__( 'Random', 'creote-addons' ),
				),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'creote-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESc' => esc_html__( 'DESC', 'creote-addons' ),
					'ASC'  => esc_html__( 'ASC', 'creote-addons' ),
				),
			]
		);
        $this->add_control(
			'read_more',
			[
				'label'       => esc_html__( 'Read More Text', 'creote-addons' ),
				'type'        => Controls_Manager::TEXT,
                'description' => esc_html__( 'Enter Text for button' , 'creote-addons' ),
                'default' =>  esc_html__( 'Read More' , 'creote-addons'),
			]
		);
		$this->add_control(
            'query_category', 
				[
				  'type' => Controls_Manager::SELECT,
				  'label' => esc_html__('Category', 'creote-addons'),
				  'options' => get_service_categories(),
				]
        );
        $this->add_control(
            'hrtl_enable_dis',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'pagination_enable_dis',
            [
                'label' => __('Pagination Enable / Disable', 'creote-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
          );
        $this->end_controls_section();
        $this->start_controls_section('service_box_css',
        [ 
            'label' => __('Custom Css', 'creote-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
        );
        $this->add_control(
            'service_bg_color',
             [
                'label' => __('Service Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_box.type_one ,  {{WRAPPER}}  .service_box.type_two ,  {{WRAPPER}}  .service_box.type_three ' => 'background: {{VALUE}}!important;',
                ]
             ]
          );
          $this->add_control(
            'heading_color',
             [
                'label' => __('Heading Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .service_box.type_one .content_box h2 a ,  {{WRAPPER}}  .service_box.type_two .content_heaing h2 a ,  {{WRAPPER}}   .service_box.type_three .content_heaing h2 a ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
        $this->add_control(
            'hrthree',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
          $this->add_control(
            'description_color',
             [
                'label' => __('Description Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .service_box.type_one .content_box  p  ,  {{WRAPPER}}   .service_box.type_two .content_heaing p ,  {{WRAPPER}}   .service_box.type_three .content_heaing p ' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
        $this->add_control(
            'hreighteens',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'icon_bg_color',
             [
                'label' => __('Icon Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .service_box.type_one .content_box .icon_box .icon_box_inner .icon ,  {{WRAPPER}}  .service_box.type_two .icon_box .icon  ,   {{WRAPPER}} .service_box.type_three .content_box .icon_box ' => 'background: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'icon_color',
             [
                'label' => __('Icon  Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .service_box.type_one .content_box .icon_box .icon_box_inner .icon  ,  {{WRAPPER}}  .service_box.type_two .icon_box span ,   {{WRAPPER}} .service_box.type_three .content_box .icon_box i ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
        $this->add_control(
            'hreighteen',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'readmore_color',
             [
                'label' => __('Read More Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .service_box.type_one .read_more.type_one ,  {{WRAPPER}}  .service_box.type_two .read_more.type_two ' => 'color: {{VALUE}}!important;',
                  ],
                  'condition' => [
                    'service_style' => ['type_two' , 'type_one'],
                ]
             ]
          );
          $this->add_control(
            'border_color',
             [
                'label' => __('Heading Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .service_box.type_two .content_heaing p ' => 'border-color: {{VALUE}}!important;',
                  ],
                'condition' => [
                    'service_style' => 'type_two',
                ]
             ]
          );
          $this->add_control(
            'hrsix',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'heading_hover_color',
             [
                'label' => __('Heading Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .service_box.type_one:hover  h2 a ,  {{WRAPPER}}  .service_box.type_two h2:hover a  ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'readmore_hover_color',
             [
                'label' => __('Read More Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}  .service_box.type_one .read_more.type_one:hover ,  {{WRAPPER}}  .service_box.type_two .read_more.type_two:hover ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'hovericon_bg_color',
             [
                'label' => __('Icon bg Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .service_box.type_one:hover .content_box .icon_box .icon_box_inner .icon ,  {{WRAPPER}} .service_box.type_two:hover .icon_box i ,  {{WRAPPER}} .service_box.type_three:hover .content_box .icon_box  ' => 'background: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'hovericon_color',
             [
                'label' => __('Icon Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .service_box.type_one:hover .content_box .icon_box .icon_box_inner .icon ,  {{WRAPPER}} .service_box.type_two:hover .icon_box i  ,  {{WRAPPER}} .service_box.type_three:hover .icon_box i  ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'hrfourteen',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
           );
           $this->add_control(
            'bg_overlay_color',
             [
                'label' => __('Bg Overlay Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .service_box.type_one .image_box .overlay:before  , {{WRAPPER}} .service_box.type_three .image_box .overlay:before  ,  {{WRAPPER}} .service_box.type_two .image_box::before ' => 'background: {{VALUE}}!important; background-image:none',
                  ],
             ]
          );
          $this->end_controls_section();
        $this->start_controls_section('owl_nav_dot_css',
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
                    '{{WRAPPER}} .service_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-prev , .service_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-next' => 'background: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'owl_nav_iconcolor',
             [
                'label' => __('Owl Nav Icon Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR, 
                 'selectors' => [
                    '{{WRAPPER}} .service_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-prev span , .service_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-next span' => 'color: {{VALUE}}!important;',
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
                    '{{WRAPPER}}  .service_all_styles.carousel .owl_dots_block .owl-dots .owl-dot' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
                ],
             ]
          );
        $this->add_control(
            'owl_dot_color_color',
             [
                'label' => __('Owl Dot Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR, 
                 'selectors' => [
                    '{{WRAPPER}} .service_all_styles.carousel .owl_dots_block  .owl-dots .owl-dot' => 'border-color: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'owl_dot_color_active',
             [
                'label' => __('Owl Dot Hover / active color', 'creote-addons'),
                'type' => Controls_Manager::COLOR, 
                 'selectors' => [
                    '{{WRAPPER}} .service_all_styles.carousel .owl_dots_block .owl-dots .owl-dot:hover , {{WRAPPER}} .service_all_styles.carousel .owl_dots_block .owl-dots .owl-dot.active' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
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
                    '{{WRAPPER}} .service_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-prev:hover , {{WRAPPER}} .service_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-next:hover' => 'background: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'hover_owl_nav_iconcolor',
             [
                'label' => __('Owl Nav Hover Icon Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR, 
                 'selectors' => [
                    '{{WRAPPER}} .service_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-prev:hover span , {{WRAPPER}} .service_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-next:hover span' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
        $this->end_controls_section();
    }
    protected function render()
    {
$settings = $this->get_settings_for_display();     
?>
<?php if($settings['service_box_type'] == 'carousel') : ?><section class="service_all_styles carousel owl_new_one"> <div class="owl-carousel <?php echo $settings['owl_nav_block'] ?> <?php echo $settings['owl_dots_block'] ?> <?php echo $settings['owl_nav_postion'] ?> theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 20, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 7000, "smartSpeed": 1800, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "3" } , "1000":{ "items" : "<?php echo esc_attr($settings['items_to_display']); ?>" }}}'> <?php $args = array( 'post_type' => 'service', 'ignore_sticky_posts' => true, 'posts_per_page' => $settings['post_count'], 'orderby' => $settings['query_orderby'], 'order' => $settings['query_order'], ); if( $settings['query_category'] ) $args['service_category'] = $settings['query_category']; $service_query = new \WP_Query( $args ); ?> <?php while ($service_query->have_posts()) : ?> <?php $service_query->the_post(); $service_icon = get_post_meta( get_the_ID(), 'service_icon', true ); $service_icon_images = rwmb_meta( 'service_icon_image', array( 'size' => 'thumbnail' ) ); ?> <article id="post-<?php esc_attr(the_ID()); ?>" <?php esc_attr(post_class()); ?>> <?php if($settings['service_style'] == 'type_one' || $settings['service_style'] == 'type_three'):?> <div class="service_box <?php echo esc_attr($settings['service_style']); ?> clearfix"> <?php if(has_post_thumbnail()): ?> <div class="image_box"> <?php the_post_thumbnail() ?> <div class="overlay"></div> </div> <?php endif; ?> <div class="content_box"> <div class="icon_box clearfix"> <?php if(!empty($service_icon)): ?> <div class="icon_box_inner"> <i class="<?php echo esc_attr($service_icon); ?> icon"></i> </div> <?php elseif(!empty($service_icon_images)): foreach($service_icon_images as $service_icon_image ):?> <div class="icon_box_inner"> <img src="<?php echo esc_url($service_icon_image['url']); ?>"> </div> <?php endforeach; ?> <?php endif; ?> </div> <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?> <?php if($settings['excerpt_enable'] == 'yes'): ?> <?php the_excerpt('<p>','</p>' ); ?> <?php endif; ?> <?php if($settings['service_style'] == 'type_one'):?> <a href="<?php echo esc_url( get_permalink() ); ?>" class="read_more type_one"> <span class="icon-arrow-right"></span> <?php echo esc_html($settings['read_more']); ?> </a> <?php endif; ?> </div> </div> <?php else: ?> <div class="service_box type_two clearfix"> <div class="content_heaing"> <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?> <?php if($settings['excerpt_enable'] == 'yes'): ?> <?php the_excerpt('<p>','</p>' ); ?> <?php endif; ?> <?php if(!empty($service_icon)): ?> <div class="icon_box clearfix"> <i class="<?php echo esc_attr($service_icon); ?> icon"></i> </div> <?php elseif(!empty($service_icon_images)): foreach($service_icon_images as $service_icon_image ):?> <div class="icon_box clearfix"> <img src="<?php echo esc_url($service_icon_image['url']); ?>"> </div> <?php endforeach; ?> <?php endif; ?> </div> <?php if(has_post_thumbnail()): ?> <div class="image_box"> <?php the_post_thumbnail() ?> </div> <?php endif; ?> <div class="btn_box"> <a href="<?php echo esc_url( get_permalink() ); ?>" class="read_more type_two"><span class="icon-arrow-right"></span><?php echo esc_html($settings['read_more']); ?></a> </div> </div> <?php endif;?> </article> <?php endwhile; ?> <?php wp_reset_postdata(); ?> </div> </section><?php else: ?><section class="service_all_styles "> <div class="row"> <?php if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); } elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); } else { $paged = 1; } $args = array( 'post_type' => 'service', 'ignore_sticky_posts' => true, 'paged' => $paged, 'posts_per_page' => $settings['post_count'], 'orderby' => $settings['query_orderby'], 'order' => $settings['query_order'], ); if( $settings['query_category'] ) $args['service_category'] = $settings['query_category']; $service_query = new \WP_Query( $args ); ?> <?php while ($service_query->have_posts()) : ?> <?php $service_query->the_post(); $service_icon = get_post_meta( get_the_ID(), 'service_icon', true ); $service_icon_images = rwmb_meta( 'service_icon_image', array( 'size' => 'thumbnail' ) ); ?> <div class="<?php echo esc_attr($settings['column_count']); ?> col-md-4 col-sm-6 col-xs-12"> <article id="post-<?php esc_attr(the_ID()); ?>" <?php esc_attr(post_class()); ?>> <?php if($settings['service_style'] == 'type_one' || $settings['service_style'] == 'type_three'):?> <div class="service_box <?php echo esc_attr($settings['service_style']); ?> clearfix"> <?php if ( has_post_thumbnail() ): ?> <div class="image_box"> <?php the_post_thumbnail() ?> <div class="overlay"></div> </div> <?php endif; ?> <div class="content_box"> <div class="icon_box clearfix"> <?php if(!empty($service_icon)): ?> <div class="icon_box_inner"> <i class="<?php echo esc_attr($service_icon); ?> icon"></i> </div> <?php elseif(!empty($service_icon_images)): foreach($service_icon_images as $service_icon_image ):?> <div class="icon_box_inner"> <img src="<?php echo esc_url($service_icon_image['url']); ?>"> </div> <?php endforeach; ?> <?php endif; ?> </div> <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?> <?php if($settings['excerpt_enable'] == 'yes'): ?> <?php the_excerpt('<p>','</p>' ); ?> <?php endif; ?> <?php if($settings['service_style'] == 'type_one'):?> <?php if(!empty($settings['read_more'])): ?> <a href="<?php echo esc_url( get_permalink() ); ?>" class="read_more type_one"> <span class="icon-arrow-right"></span> <?php echo esc_html($settings['read_more']); ?> </a> <?php endif; ?> <?php endif; ?> </div> </div> <?php else:?> <div class="service_box type_two clearfix"> <div class="content_heaing"> <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?> <?php if($settings['excerpt_enable'] == 'yes'): ?> <?php the_excerpt('<p>','</p>' ); ?> <?php endif; ?> <?php if(!empty($service_icon)): ?> <div class="icon_box clearfix"> <i class="<?php echo esc_attr($service_icon); ?> icon"></i> </div> <?php elseif(!empty($service_icon_images)): foreach($service_icon_images as $service_icon_image ):?> <div class="icon_box clearfix"> <img src="<?php echo esc_url($service_icon_image['url']); ?>"> </div> <?php endforeach; ?> <?php endif; ?> </div> <?php if ( has_post_thumbnail() ): ?> <div class="image_box"> <?php the_post_thumbnail() ?> </div> <?php endif; ?> <?php if(!empty($settings['read_more'])): ?> <div class="btn_box"> <a href="<?php echo esc_url( get_permalink() ); ?>" class="read_more type_two"><span class="icon-arrow-right"></span><?php echo esc_html($settings['read_more']); ?></a> </div> <?php endif;?> </div> <?php endif;?> </article> </div> <?php endwhile; ?> <?php wp_reset_postdata(); ?> </div> <?php if($settings['pagination_enable_dis'] == 'yes'):?> <div class="row"> <div class="col-lg-12"> <div class="pagination text-center""> <?php $pagination = 999999999; echo paginate_links( array( 'base' => str_replace( $pagination, '%#%', get_pagenum_link( $pagination ) ), 'format' => '?paged=%#%', 'current' => max(0, $paged), 'total' => $service_query->max_num_pages, 'prev_text' => '<i class="fa fa-angle-left"></i>', 'next_text' => '<i class="fa fa-angle-right"></i>', 'type'=>'list', 'add_args' => false ) ); ?> </div> </div> </div> <?php endif; ?> </section> <?php endif ?>
<?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_service_v1_new());