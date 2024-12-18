<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_news_v1_new extends Widget_Base
{
    public function get_name()
    {
        return 'creote-news-v1-new';
    }
    public function get_title()
    {
        return __('Blog Post V2' , 'creote-addons');
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
            'news_settings',
            [
                'label' => __('News Settings', 'creote-addons')
            ]
        );
        $this->add_control(
            'blog_box_type',
            [
                'label' => __('News  Type', 'creote-addons'),
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
            'items_to_display',
            [
                'label' => __('Carousel Items To Display', 'creote-addons'),
                'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 3,
				'max'     => 8,
				'step'    => 1,
                'condition' => [
                    'blog_box_type' => 'carousel',
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
                    'col-xl-6 col-md-6 col-sm-6' => __('Two Column', 'creote-addons'),
                    'col-xl-4 col-md-6 col-sm-6' => __('Three Column', 'creote-addons'),
                    'col-xl-3 col-md-6 col-sm-6' => __('Four Coumn', 'creote-addons'),
                ],
                'default' => 'col-xl-6 col-md-6 col-sm-6',
                'condition' => [
                    'blog_box_type' => 'grid',
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
            'news_style',
            [
                'label' => __('News style', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'type_one'  => __('News Style One ', 'creote-addons'),
                    'type_two' => __('News Style Two ', 'creote-addons'),
                    'type_three' => __('News Style Three ', 'creote-addons'),
                ],
                'default' => 'type_two',
            ]
        );
        $this->add_control(
           'text_limit',
           [
               'label'   => esc_html__( 'Text Limit', 'creote-addons' ),
               'type'    => Controls_Manager::NUMBER,
               'default' => 3,
               'min'     => 1,
               'max'     => 100,
               'step'    => 1,
           ]
       );
        $this->add_control(
            'post_count',
            [
                'label' => __('Post Count', 'creote-addons'),
                'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
            ]
        );
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
                  'options' => get_blog_categories(),
                ]
        );
        $this->add_control(
            'hrtl_enable_dis',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'npagination_enable_dis',
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
        $this->start_controls_section('news_box_css',
        [ 
            'label' => __('Custom Css', 'creote-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
        );
        $this->add_control(
            'news_bg_color',
             [
                'label' => __('News Bg  Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}   .news_box.type_two ' => 'background: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'news_bord_color',
             [
                'label' => __('News Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .news_box.type_two .image_box , {{WRAPPER}} .news_box.type_two  ' => 'border-color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'heading_color',
             [
                'label' => __('Heading Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .news_box.type_one .content_box h2 a , .news_box.type_three .content_box h2 a , {{WRAPPER}}  .news_box.type_two .content_inner a ' => 'color: {{VALUE}}!important;',
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
                    '{{WRAPPER}} .news_box.type_one .content_box p , .news_box.type_three .content_box p , {{WRAPPER}}  .news_box.type_two .content_inner p ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
        $this->add_control(
            'hrthreety',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'meta_tag_onecolor',
             [
                'label' => __('Meta Text Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .news_box.type_one .content_box .post-info li a , .news_box.type_three .content_box .post-info li a , {{WRAPPER}} .news_box.type_two .image_box .authour_details h6 a  ' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
          'meta_tag_onecolor_two',
          [
             'label' => __('Meta Text Color (style 2)', 'creote-addons'),
             'type' => Controls_Manager::COLOR,
              'selectors' => [
                 '{{WRAPPER}}  .news_box.type_two .image_box .authour_details p a , {{WRAPPER}} .news_box.type_one .content_box .comments i  , .news_box.type_three .content_box .comments i {{WRAPPER}} .news_box.type_one .content_box .comments a ,.news_box.type_three .content_box .comments a  ' => 'color: {{VALUE}}!important;',
               ],
          ]
       );
          $this->add_control(
            'meta_tag_onecolorocon',
             [
                'label' => __('Meta Icon Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .news_box.type_one .content_box .post-info li a i  , .news_box.type_three .content_box .post-info li a i   ' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'cat_color',
             [
                'label' => __('Category Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news_box.type_one .image_box .post-category  ,  .news_box.type_three .image_box .post-category  ' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'cat_color_bg',
             [
                'label' => __('Category Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .news_box.type_one .image_box .post-category ,  .news_box.type_three .image_box .post-category ' => 'background: {{VALUE}}!important;',
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
            'readmore_color',
             [
                'label' => __('Read More Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .news_box.type_one .read_more.type_one , .news_box.type_three .read_more.type_one , {{WRAPPER}}  .blog_box.type_two .read_more.tp_two , {{WRAPPER}}  .blog_box.type_three .read_more.tp_two ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'readmore_color_bg',
             [
                'label' => __('Read More Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .news_box.type_one .read_more.type_one:after , .news_box.type_three .read_more.type_one:after ' => 'background: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'hrsixs',
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
                    '{{WRAPPER}} .news_box.type_one  .content_box h2:hover a  ,.news_box.type_three  .content_box h2:hover a  , {{WRAPPER}} .news_box.type_two .text_box h2 a  ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'hover_meta_color',
             [
                'label' => __('Meta Hover Color(style 2)', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}.news_box.type_two .text_box h6 a , {{WRAPPER}} .news_box.type_two .text_box p a , {{WRAPPER}} .news_box.type_two .comments a, .news_box.type_two .comments i  ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'readmore_hover_color',
             [
                'label' => __('Read More Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}  .news_box.type_one .read_more.type_one:hover , .news_box.type_three .read_more.type_one:hover , {{WRAPPER}}  .news_box.type_two:hover  .read_more.type_two  ' => 'color: {{VALUE}}!important;',
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
                'label' => __('Background Overlay Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .news_box.type_one  .image_box .overlay::before , .news_box.type_three  .image_box .overlay::before , {{WRAPPER}} .news_box.type_two .overlay ' => 'background: {{VALUE}}!important; background-image:none',
                  ],
             ]
          );
          $this->add_control(
            'hrsvn',
            [
                'type' => Controls_Manager::DIVIDER,
                'condition' => [
                    'news_style' => ['type_one' , 'type_two']
                ]
            ]
        );
          $this->add_control(
            'border_radius_enable',
            [
                'label' => __('News Box Border Radius Disable', 'creote-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'news_style' => ['type_one' , 'type_two']
                ]
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
                      '{{WRAPPER}} .blog_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-prev, .blog_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-next' => 'background: {{VALUE}}!important;',
                  ],
               ]
            );
            $this->add_control(
              'owl_nav_iconcolor',
               [
                  'label' => __('Owl Nav Icon Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                   'selectors' => [
                      '{{WRAPPER}} .blog_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-prev span, .blog_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-next span' => 'color: {{VALUE}}!important;',
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
                      '{{WRAPPER}} .blog_all_styles.carousel .owl_dots_block .owl-dots .owl-dot' => 'background: {{VALUE}};',
                  ],
               ]
            );
          $this->add_control(
              'owl_dot_color_color',
               [
                  'label' => __('Owl Dot Border Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                   'selectors' => [
                      '{{WRAPPER}} .blog_all_styles.carousel .owl_dots_block  .owl-dots .owl-dot' => 'border-color: {{VALUE}};',
                  ],
               ]
            );
            $this->add_control(
              'owl_dot_color_active',
               [
                  'label' => __('Owl Dot Hover / active color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                   'selectors' => [
                      '{{WRAPPER}} .blog_all_styles.carousel .owl_dots_block .owl-dots .owl-dot:hover, .blog_all_styles.carousel .owl_dots_block .owl-dots .owl-dot.active' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
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
                      '{{WRAPPER}} .blog_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-prev:hover, .blog_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-next:hover' => 'background: {{VALUE}}!important;',
                  ],
               ]
            );
            $this->add_control(
              'hover_owl_nav_iconcolor',
               [
                  'label' => __('Owl Nav Hover Icon Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                   'selectors' => [
                      '{{WRAPPER}} .blog_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-prev:hover span, .blog_all_styles.carousel .owl_nav_block.owl-carousel .owl-nav .owl-next:hover span' => 'color: {{VALUE}}!important;',
                  ],
               ]
            );
          $this->end_controls_section();
          $this->start_controls_section('pagi_css',
          [ 
              'label' => __('Pagination Css', 'creote-addons'),
              'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
          );
        $this->add_control(
            'pagi_color',
             [
                'label' => __('Pagination text Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .pagination_box ul li a , .pagination_box ul li span ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'pagi_bg_color',
             [
                'label' => __('Pagination Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .pagination_box ul li a , .pagination_box ul li span ' => 'background: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'pagi_color_active',
             [
                'label' => __('Active / hover text Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .pagination_box ul li .current , {{WRAPPER}} .pagination_box ul li:hover span , {{WRAPPER}} .pagination_box ul li:hover a ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'pagi_active_bg_color',
             [
                'label' => __('Active / hover Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .pagination_box ul li .current , {{WRAPPER}}  .pagination_box ul li:hover span , {{WRAPPER}} .pagination_box ul li:hover a ' => 'background: {{VALUE}}!important;',
                  ],
             ]
          );
        $this->end_controls_section();
    }
protected function render(){
    $settings = $this->get_settings_for_display();
   /*--column-----*/
    $image_size = 'creote_object_fits';
?>
<?php if($settings['blog_box_type'] == 'carousel') : ?><section class="blog_all_styles owl_new_one carousel <?php if($settings['border_radius_enable'] == 'yes'): ?> border_disable <?php endif; ?>"> <div class="<?php echo $settings['owl_nav_block'] ?> <?php echo $settings['owl_dots_block'] ?> <?php echo $settings['owl_nav_postion'] ?> theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 30, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 7000, "smartSpeed": 1800, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "3" } , "1000":{ "items" : "<?php echo esc_attr($settings['items_to_display']); ?>" }}}'> <?php $args = array( 'post_type' => 'post', 'ignore_sticky_posts' => true, 'posts_per_page' => $settings['post_count'], 'orderby' => $settings['query_orderby'], 'order' => $settings['query_order'], ); if( $settings['query_category'] ) $args['category_name'] = $settings['query_category']; $blog_query = new \WP_Query( $args ); ?> <?php while ($blog_query->have_posts()) : ?> <?php $blog_query->the_post(); $myexcerpt = wp_trim_words(get_the_excerpt(), $settings['text_limit']); ?> <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <?php if($settings['news_style'] == 'type_one' || $settings['news_style'] == 'type_three') : ?> <div class="news_box <?php echo esc_html($settings['news_style']); ?> clearfix"> <div class="news_inner"> <?php if(has_post_thumbnail()): ?> <div class="image_box"> <?php the_post_thumbnail($image_size); ?> <div class="overlay"></div> <div class="post-category"> <?php creote_category(); ?> </div> </div> <?php endif; ?> <div class="content_box"> <?php creote_blog_meta_for_type_one();?> <?php the_title( '<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" >', '</a></h2>' ); ?> <?php if(!empty($myexcerpt)):?> <p class="short_desc"><?php echo esc_html($myexcerpt); ?></p> <?php endif; ?> <div class="bottom_content clearfix"> <div class="continure_reading"> <?php if ( 'post' === get_post_type() ) : ?> <a href="<?php echo esc_url(get_permalink()); ?>" class="read_more type_one"> <?php echo esc_html($settings['read_more']); ?> <span class="icon-arrow-right"></span></a> <?php endif; ?> </div> <?php creote_comments();?> </div> </div> </div> </div> <?php else: ?> <div class="news_box type_two"> <div class="image_box clearfix "> <?php if(has_post_thumbnail() ): ?> <div class="image_box_inner"> <?php the_post_thumbnail(array(70,70)); ?> </div> <?php endif; ?> <?php creote_blog_meta_for_type_two(); ?> </div> <div class="content_inner"> <?php the_title( '<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>' ); ?> <?php if(!empty($myexcerpt)):?> <p class="short_desc"><?php echo esc_html($myexcerpt); ?></p> <?php endif; ?> </div> <div class="overlay"> <div class="text_box"> <?php creote_blog_meta_for_type_two(); ?> <?php the_title( '<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>' ); ?> </div> <div class="bottom_content clearfix"> <div class="continure_reading"> <?php if ( 'post' === get_post_type() ) : ?> <a href="<?php echo esc_url(get_permalink()); ?>" class="read_more type_two"> <?php echo esc_html($settings['read_more']); ?> <span class="icon-arrow-right"></span></a> <?php endif; ?> </div> <?php creote_comments();?> </div> </div> </div> <?php endif;?> </div> <?php endwhile; ?> <?php wp_reset_postdata(); ?> </div></section><!-- /.blog-one --> <?php // grid type ?> <?php else: ?><section class="blog_all_styles grid <?php if($settings['border_radius_enable'] == 'yes'): ?> border_disable <?php endif; ?>"> <div class="row"> <?php if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); } elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); } else { $paged = 1; } $args = array( 'post_type' => 'post', 'ignore_sticky_posts' => true, 'paged' => $paged, 'posts_per_page' => $settings['post_count'], 'orderby' => $settings['query_orderby'], 'order' => $settings['query_order'], ); if( $settings['query_category'] ) $args['category_name'] = $settings['query_category']; $blog_query = new \WP_Query( $args ); ?> <?php while ($blog_query->have_posts()) : ?> <?php $blog_query->the_post(); $myexcerpt = wp_trim_words(get_the_excerpt(), $settings['text_limit']); ?> <div class="<?php echo esc_attr($settings['column_count']); ?> col-xs-12"> <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <?php if($settings['news_style'] == 'type_one' || $settings['news_style'] == 'type_three') : ?> <div class="news_box <?php echo esc_html($settings['news_style']); ?> clearfix"> <div class="news_inner"> <?php if(has_post_thumbnail() ): ?> <div class="image_box"> <?php the_post_thumbnail($image_size); ?> <div class="overlay"></div> <div class="post-category"> <?php creote_category();?></div> </div> <?php endif; ?> <div class="content_box"> <?php creote_blog_meta_for_type_one();?> <?php the_title( '<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>' ); ?> <?php if(!empty($myexcerpt)):?> <p class="short_desc"><?php echo esc_html($myexcerpt); ?></p> <?php endif; ?> <div class="bottom_content clearfix"> <div class="continure_reading"> <?php if ( 'post' === get_post_type() ) : ?> <a href="<?php echo esc_url(get_permalink()); ?>" class="read_more type_one"> <?php echo esc_html($settings['read_more']); ?> <span class="icon-arrow-right"></span></a> <?php endif; ?> </div> <?php creote_comments();?> </div> </div> </div> </div> <?php else: ?> <div class="news_box type_two"> <div class="image_box clearfix "> <?php if(has_post_thumbnail()): ?> <div class="image_box_inner"> <?php the_post_thumbnail(array(70,70)); ?> </div> <?php endif; ?> <?php creote_blog_meta_for_type_two(); ?> </div> <div class="content_inner"> <?php the_title( '<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" >', '</a></h2>' ); ?> <?php if(!empty($myexcerpt)):?> <p class="short_desc"><?php echo esc_html($myexcerpt); ?></p> <?php endif; ?> </div> <div class="overlay"> <div class="text_box"> <?php creote_blog_meta_for_type_two(); ?> <?php the_title( '<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>' ); ?> </div> <div class="bottom_content clearfix"> <div class="continure_reading"> <?php if ( 'post' === get_post_type() ) : ?> <a href="<?php echo esc_url(get_permalink()); ?>" class="read_more type_two"> <?php echo esc_html($settings['read_more']); ?> <span class="icon-arrow-right"></span></a> <?php endif; ?> </div> <?php creote_comments();?> </div> </div> </div> <?php endif;?> </div> </div><!-- /.col-lg-3 --> <?php endwhile; ?> <?php wp_reset_postdata(); ?> </div> <?php if($settings['npagination_enable_dis'] == 'yes'):?> <div class="row"> <div class="col-lg-12"> <div class="pagination text-center"> <?php $pagination = 999999999; echo paginate_links( array( 'base' => str_replace( $pagination, '%#%', get_pagenum_link( $pagination ) ), 'format' => '?paged=%#%', 'current' => max(0, $paged), 'total' => $blog_query->max_num_pages, 'prev_text' => '<i class="fa fa-angle-left"></i>', 'next_text' => '<i class="fa fa-angle-right"></i>', 'type'=>'list', 'add_args' => false ) ); ?> </div> </div> </div> <?php endif; ?> </section> <?php endif ?>
<?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_news_v1_new());