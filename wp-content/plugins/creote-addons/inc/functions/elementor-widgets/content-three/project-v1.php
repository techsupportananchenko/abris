<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_project_v1_new extends Widget_Base
{
    public function get_name()
    {
        return 'creote-project-v1-new';
    }
    public function get_title()
    {
        return __('Project V2' , 'creote-addons');
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
            'project_settings',
            [
                'label' => __('Project Settings', 'creote-addons')
            ]
        );
        $this->add_control(
            'project_box_type',
            [
                'label' => __('Project  Type', 'creote-addons'),
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
                    'project_box_type' => 'carousel',
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
                    'project_box_type' => 'grid',
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
            'project_style',
            [
                'label' => __('Project style', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_one'  => __('Project Style One ', 'creote-addons'),
                    'style_two' => __('Project Style Two ', 'creote-addons'),
                ],
                'default' => 'style_one',
            ]
        ); 
        $this->add_control(
            'post_count',
            [
                'label'   => esc_html__( 'Number of post', 'creote-addons' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 3,
                'min'     => 1,
                'max'     => 100,
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
				  'options' => get_project_categories(),
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
        $this->start_controls_section('projectcaro_box_css',
        [ 
            'label' => __('Custom Css', 'creote-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
        );
        $this->add_control(
            'project_title_color',
             [
                'label' => __('Title Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_one .content_box .content_box_inner h2 a , {{WRAPPER}} .project_box.type_two .content_box h2 a  ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
        $this->add_control(
            'project_cat_color',
             [
                'label' => __('Categoty Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_one .content_box .content_box_inner p a , .project_box.type_one .content_box .content_box_inner p  , {{WRAPPER}}  .project_box.type_two .content_box p a , .project_box.type_two .content_box .content_box_inner p ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'zoom_icon_color',
             [
                'label' => __('Zoom Icon Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_one .image_box .overlay a.zoom_button , {{WRAPPER}} .project_box.type_two .image_box a span  ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'read_more_color',
             [
                'label' => __('Read More Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_one .content_box .content_box_inner a.read_more_link  ' => 'color: {{VALUE}}!important;',
                  ],
                  'condition' => [
                    'project_style' => 'style_one',
                ]
             ]
          );
          $this->add_control(
            'read_morebg_color',
             [
                'label' => __('Read More Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_one .content_box .content_box_inner a.read_more_link ' => 'background: {{VALUE}}!important;',
                  ],
                  'condition' => [
                    'project_style' => 'style_one',
                ]
             ]
          );
          $this->add_control(
            'gradient_color',
             [
                'label' => __('Gradient Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_one .image_box:before ' => 'background-image: linear-gradient(to top, {{VALUE}}, rgba(0, 0, 30, 0))!important;',
                  ],
                  'condition' => [
                    'project_style' => 'style_one',
                ]
             ]
          );
          $this->add_control(
            'gradient_two_colors',
             [
                'label' => __('Gradient Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_two .gradient ' => 'background:linear-gradient(to bottom, {{VALUE}} 10%, rgba(0,0,0,0) 58%, rgba(0,0,0,0) 100%)!important;',
                  ],
                  'condition' => [
                    'project_style' => 'style_two', 
                ]
             ]
          );
          $this->add_control(
            'hrsvn',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
          $this->add_control(
			'projects_image_height',
			[
				'label' => esc_html__( 'Project Image Height', 'creote-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 2000,
				'step' => 1,
                'selectors' => [
                    '{{WRAPPER}} .project_box .image_box img ' => 'height: {{VALUE}}px!important;',
                ],
			]
		);
          $this->add_control(
            'hrsix',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'verlay_color',
             [
                'label' => __('Overlay Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_one .image_box .overlay:before , {{WRAPPER}} .project_box.type_two .image_box::before ' => 'background:{{VALUE}}!important;',
                  ],
             ]
          );
        $this->add_control(
            'heading_hover_color',
             [
                'label' => __('Heading Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_one .content_box h2 a:hover , {{WRAPPER}} .project_box.type_two .content_box h2 a:hover ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
        $this->add_control(
            'project_cat_hover_color',
             [
                'label' => __('Category Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_one .content_box p a:hover , {{WRAPPER}} .project_box.type_two .content_box p a:hover ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'project_zoom_color',
             [
                'label' => __('Zoom Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}  .project_box.type_one .image_box a span:hover , {{WRAPPER}}  .project_box.type_two .image_box a span:hover ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
        $this->add_control(
            'read_more_color_hover',
             [
                'label' => __('Read More Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_one .content_box .content_box_inner a.read_more_link:hover ' => 'color: {{VALUE}}!important; background-image:none;',
                  ],
                  'condition' => [
                    'project_style' => 'style_one',
                ]
             ]
          );
          $this->add_control(
            'read_more_color_bg_hover',
             [
                'label' => __('Read More Hover bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_one .content_box .content_box_inner a.read_more_link:hover ' => 'background: {{VALUE}}!important; background-image:none;',
                  ],
                  'condition' => [
                    'project_style' => 'style_one',
                ]
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
                 'default' => '#f4f4f4',
                 'selectors' => [
                    '{{WRAPPER}} .project_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-prev, .project_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-next' => 'background: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'owl_nav_iconcolor',
             [
                'label' => __('Owl Nav Icon Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#222222',
                 'selectors' => [
                    '{{WRAPPER}} .project_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-prev span, .project_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-next span' => 'color: {{VALUE}}!important;',
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
                 'default' => '#f4f4f4',
                 'selectors' => [
                    '{{WRAPPER}}  .project_all_styles.carousel .owl_dots_block .owl-dots .owl-dot' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
                ],
             ]
          );
        $this->add_control(
            'owl_dot_color_color',
             [
                'label' => __('Owl Dot Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#f4313f',
                 'selectors' => [
                    '{{WRAPPER}} .project_all_styles.carousel .owl_dots_block  .owl-dots .owl-dot' => 'border-color: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'owl_dot_color_active',
             [
                'label' => __('Owl Dot Hover / active color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#f4313f',
                 'selectors' => [
                    '{{WRAPPER}} .project_all_styles.carousel .owl_dots_block .owl-dots .owl-dot:hover , {{WRAPPER}} .project_all_styles.carousel .owl_dots_block .owl-dots .owl-dot.active' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
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
                 'default' => '#f4313f',
                 'selectors' => [
                    '{{WRAPPER}} .project_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-prev:hover, .project_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-next:hover' => 'background: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'hover_owl_nav_iconcolor',
             [
                'label' => __('Owl Nav Hover Icon Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#f4f4f4',
                 'selectors' => [
                    '{{WRAPPER}} .project_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-prev:hover span, .project_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-next:hover span' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display(); 
?> 
<?php if($settings['project_box_type'] == 'carousel') : ?><section class="project_all_styles carousel owl_new_one"> <div class="owl-carousel <?php echo $settings['owl_nav_block'] ?> <?php echo $settings['owl_dots_block'] ?> <?php echo $settings['owl_nav_postion'] ?> theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 20, "autoheight":true, "lazyload":true, "nav": false, "dots": true, "autoplay": true, "autoplayTimeout": 7000, "smartSpeed": 1800, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "3" } , "1000":{ "items" : "<?php echo esc_attr($settings['items_to_display']); ?>" }}}'> <?php $args = array( 'post_type' => 'project', 'ignore_sticky_posts' => true, 'orderby' => 'date', 'posts_per_page' => $settings['post_count'], 'orderby' => $settings['query_orderby'], 'order' => $settings['query_order'], ); if( $settings['query_category'] ) $args['project_category'] = $settings['query_category']; $project_query = new \WP_Query( $args ); ?> <?php while ($project_query->have_posts()) : ?> <?php $project_query->the_post(); ?> <article id="post-<?php esc_attr(the_ID()); ?>" <?php esc_attr(post_class()); ?>> <?php if($settings['project_style'] == 'style_two'):?> <div class="project_box type_two"> <div class="image_box "> <?php the_post_thumbnail(); ?> <a data-fancybox="gallery" href="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>"> <span class="icon-plus zoom_icon"></span> </a> <div class="gradient"></div> </div> <div class="content_box "> <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?> <?php $cats = get_the_terms( get_the_ID(), 'project_category' ); $output_cat = array(); if ( $cats ) { foreach ( $cats as $cat ) { $output_cat[] = sprintf( '<a href="%s" class="cat">%s</a>', esc_url( get_term_link( $cat->slug, 'project_category' ) ), $cat->name ); } } if(!empty($output_cat)): ?> <p> <?php echo implode( ', ', $output_cat ) ?></p> <?php endif; ?> <a href="<?php echo esc_url(get_permalink()); ?>" class="read_more"><?php echo esc_html('Read More ' , 'creote'); ?><span class="icon-arrow-right"></span></a> </div> </div> <?php else: ?> <div class="project_box type_one"> <div class="image_box "> <?php the_post_thumbnail(); ?> <div class="overlay"> <a data-fancybox="gallery" class="zm_btn" href="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>"> <span class="icon-plus zoom_icon"></span> </a> </div> </div> <div class="content_box"> <div class="content_box_inner"> <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?> <?php $cats = get_the_terms( get_the_ID(), 'project_category' ); $output_cat = array(); if ($cats) { foreach ( $cats as $cat ) { $output_cat[] = sprintf( '<a href="%s" class="cat">%s</a>', esc_url( get_term_link( $cat->slug, 'project_category' ) ), $cat->name ); } } if(!empty($output_cat)): ?> <p> <?php echo implode( ', ', $output_cat ) ?></p> <?php endif; ?> <a href="<?php echo esc_url(get_permalink()); ?>" class="read_more_link"><span class="icon-arrow-right"></span></a> </div> </div> </div> <?php endif; ?> </article><!-- #post-## --> <?php endwhile; ?> <?php wp_reset_postdata(); ?> </div></section> <?php else: ?><section class="project_all_styles"> <div class="row"> <?php if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); } elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); } else { $paged = 1; } $args = array( 'post_type' => 'project', 'ignore_sticky_posts' => true, 'paged' => $paged, 'posts_per_page' => $settings['post_count'], 'orderby' => $settings['query_orderby'], 'order' => $settings['query_order'], ); if($settings['query_category'] ) $args['project_category'] = $settings['query_category']; $project_query = new \WP_Query( $args ); ?> <?php while ($project_query->have_posts()) : ?> <?php $project_query->the_post(); ?> <div class="<?php echo esc_attr($settings['column_count']); ?> col-md-4 col-sm-6 col-xs-12"> <article id="post-<?php esc_attr(the_ID()); ?>" <?php esc_attr(post_class()); ?>> <?php if($settings['project_style'] == 'style_two'):?> <div class="project_box type_two"> <div class="image_box "> <?php the_post_thumbnail(); ?> <a data-fancybox="gallery" href="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>"> <span class="icon-plus zoom_icon"></span> </a> <div class="gradient"></div> </div> <div class="content_box "> <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?> <?php $cats = get_the_terms( get_the_ID(), 'project_category' ); $output_cat = array(); if ( $cats ) { foreach ( $cats as $cat ) { $output_cat[] = sprintf( '<a href="%s" class="cat">%s</a>', esc_url( get_term_link( $cat->slug, 'project_category' ) ), $cat->name ); } } if(!empty($output_cat)): ?> <p> <?php echo implode( ', ', $output_cat ) ?></p> <?php endif; ?> <a href="<?php echo esc_url(get_permalink()); ?>" class="read_more"><?php echo esc_html('Read More ' , 'creote'); ?><span class="icon-arrow-right"></span></a> </div> </div> <?php else: ?> <div class="project_box type_one"> <div class="image_box "> <?php the_post_thumbnail(); ?> <div class="overlay"> <a data-fancybox="gallery" class="zm_btn" href="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>"> <span class="icon-plus zoom_icon"></span> </a> </div> </div> <div class="content_box"> <div class="content_box_inner"> <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?> <?php $cats = get_the_terms( get_the_ID(), 'project_category' ); $output_cat = array(); if ( $cats ) { foreach ( $cats as $cat ) { $output_cat[] = sprintf( '<a href="%s" class="cat">%s</a>', esc_url( get_term_link( $cat->slug, 'project_category' ) ), $cat->name ); } } if(!empty($output_cat)): ?> <p> <?php echo implode( ', ', $output_cat ) ?></p> <?php endif; ?> <a href="<?php echo esc_url(get_permalink()); ?>" class="read_more_link"><span class="icon-arrow-right"></span></a> </div> </div> </div> <?php endif; ?> </article> </div> <?php endwhile; ?> <?php wp_reset_postdata(); ?> </div> <?php if($settings['pagination_enable_dis'] == 'yes'):?> <div class="row"> <div class="col-lg-12"> <div class="pagination text-center service"> <?php $pagination = 999999999; echo paginate_links( array( 'base' => str_replace( $pagination, '%#%', get_pagenum_link( $pagination ) ), 'format' => '?paged=%#%', 'current' => max(0, $paged), 'total' => $project_query->max_num_pages, 'prev_text' => '<i class="fa fa-angle-left"></i>', 'next_text' => '<i class="fa fa-angle-right"></i>', 'type'=>'list', 'add_args' => false ) ); ?> </div> </div> </div> <?php endif; ?> </section><?php endif ?>
<?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_project_v1_new());