<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_blog_post_grid_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-blog-post-v1';
       }
       public function get_title()
       {
           return __('Blog Post V1' , 'creote-addons');
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
               'blog_post_grid_content',
               [
                   'label' => __('Blog  Content', 'creote-addons')
               ]
           );
           $this->add_control(
           'news_styles',
           [
             'label' => __('News Styles', 'creote-addons'),
             'type' => Controls_Manager::SELECT,
             'options' => [
               'style_one' => __( 'Style One', 'creote-addons' ),
               'style_two' => __( 'Style Two', 'creote-addons' ),
               'style_three' => __( 'Style Three', 'creote-addons' ),
               'style_four' => __( 'Style Four', 'creote-addons' ),
               'style_five' => __( 'Style Five', 'creote-addons' ),
               'style_six' => __( 'Style Six', 'creote-addons' ),
               'style_seven' => __( 'Style Seven', 'creote-addons' ),
               'style_eight' => __( 'Style Eight', 'creote-addons' ),
               'style_nine' => __( 'Style Nine', 'creote-addons' ),
               'style_ten' => __( 'Style Ten', 'creote-addons' ),
   			],
               'default' => __('style_one' , 'creote-addons'),
             ]
           );
           $this->add_control(
               'news_column',
               [
                 'label' => __('News Column', 'creote-addons'),
                 'type' => Controls_Manager::SELECT,
                 'options' => [
                  'five_column' => __( 'Five Column', 'creote-addons' ),
                   'four_column' => __( 'Four Column', 'creote-addons' ),
                   'three_column' => __( 'Three Column', 'creote-addons' ),
                   'two_column' => __( 'Two Column', 'creote-addons' ),
                   'one_column' => __( 'One Column', 'creote-addons' ),
                   ],
                 'default' => __('three_column' , 'creote-addons'),
                 ]
           );
           $this->add_control(
               'normal_view',
              [
                 'label' => __('List View Disable / Enable', 'creote-addons'),
                  'type' => Controls_Manager::SWITCHER,
                  'label_on' => __('Yes', 'creote-addons'),
                  'label_off' => __('No', 'creote-addons'),
                  'return_value' => 'yes',
                  'default' => 'no',
                  'condition' => [
                       'news_styles' => 'style_two'
                  ],
              ]
           );
           $this->add_control(
               'masonory_enable',
              [
                 'label' => __('Gird View Enable', 'creote-addons'),
                  'type' => Controls_Manager::SWITCHER,
                  'label_on' => __('Yes', 'creote-addons'),
                  'label_off' => __('No', 'creote-addons'),
                  'return_value' => 'yes',
                  'default' => 'no',
                  'condition' => [
                       'news_styles' => 'style_four'
                  ],
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
           'query_category', 
               [
                 'type' => Controls_Manager::SELECT,
                 'label' => esc_html__('Category', 'creote-addons'),
                 'options' => get_blog_categories(),
               ]
       );
       $this->add_control(
         'button_text',
         [
             'label' => __('Button Text', 'creote-addons'),
             'type' => Controls_Manager::TEXTAREA,
             'default' => __('Read More', 'creote-addons'),
             'placeholder' => __('Type your text here', 'creote-addons'),
         ]
     );
       $this->add_control(
         'border_radius_enable',
        [
           'label' => __('Border Radius Disable / Enable', 'creote-addons'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('Yes', 'creote-addons'),
            'label_off' => __('No', 'creote-addons'),
            'return_value' => 'yes',
            'default' => 'no',
            'condition' => [
                 'news_styles' => 'style_four'
            ],
        ]
     );
         $this->add_control(
           'trans',
           [
           'type' => Controls_Manager::DIVIDER,
           ]
         );
       $this->add_control(
           'pagination_enable',
          [
             'label' => __('Pagination Enable', 'creote-addons'),
              'type' => Controls_Manager::SWITCHER,
              'label_on' => __('Yes', 'creote-addons'),
              'label_off' => __('No', 'creote-addons'),
              'return_value' => 'yes',
              'default' => 'yes',
          ]
       );
       $this->add_responsive_control(
           'pagination_alignment',
           [
               'label' => __('Pagination alignments', 'creote-addons'),
               'type' => Controls_Manager::CHOOSE,
               'options' => [
                 'left' => [
                   'title' => __( 'Pagination Left', 'creote-addons' ),
                   'icon' => 'fa fa-align-left',
                 ],
                 'center' => [
                   'title' => __( 'Pagination Center', 'creote-addons' ),
                   'icon' => 'fa fa-align-center',
                 ],
                 'right' => [
                   'title' => __( 'Pagination Right', 'creote-addons' ),
                   'icon' => 'fa fa-align-right',
                 ],
               ],
               'default' => 'center',
               'toggle' => true,
               'selectors' => [
                 '{{WRAPPER}} .pagination ' => 'text-align: {{VALUE}}!important;',
               ],
               'condition' => [
                   'pagination_enable' => 'yes'
              ],
           ]
       );
         $this->end_controls_section();
       }
       protected function render()
       {
           $settings = $this->get_settings_for_display();
           $allowed_tags = wp_kses_allowed_html('post');
           $image_size = 'creote-full-width';
           $css_classes = ''; 
             if($settings['news_column'] == 'one_column') {
               $image_size = 'creote-grid-1170-520';
               $css_classes = 'one_column news_wrapper_grid';
             }
             elseif( $settings['news_column'] == 'two_column'){
               $image_size = 'creote-grid-570-420';
               $css_classes = 'two_column news_wrapper_grid';
             } 
             elseif($settings['news_column'] == 'four_column'){
               $image_size = 'creote-grid-270-180';
               $css_classes = 'four_column news_wrapper_grid';
             }
             elseif($settings['news_column'] == 'five_column'){
               $image_size = 'creote-grid-270-180';
               $css_classes = 'five_column news_wrapper_grid';
             }  else{
               $image_size = 'creote-grid-470-280';
               $css_classes = 'three_column news_wrapper_grid';
             } 
   ?>
<section class="blog_post_section elemen_wp <?php echo esc_attr($css_classes); ?> <?php echo esc_attr($settings['news_styles']); ?> <?php if($settings['masonory_enable'] == 'yes'): ?> masonary_enable <?php endif; ?>"> <div class="grid_show_case grid_layout clearfix"> <!-- swiper-slide --> <?php if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); } elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); } else { $paged = 1; } $args = array( 'post_type' => 'post', 'ignore_sticky_posts' => true, 'orderby' => 'date', 'paged' => $paged, 'posts_per_page' => $settings['post_count'], 'orderby' => $settings['query_orderby'], 'order' => $settings['query_order'], ); if( $settings['query_category'] ) $args['category_name'] = $settings['query_category']; $blog_grid_query = new \WP_Query( $args ); ?> <?php while ($blog_grid_query->have_posts()) : ?> <?php $blog_grid_query->the_post(); $myexcerpt = wp_trim_words(get_the_excerpt(), $settings['text_limit']); $mycontent = wp_trim_words(get_the_content(), $settings['text_limit']); $myexcerptwo = wp_trim_words(get_the_excerpt(), 15); $mycontentwo = wp_trim_words(get_the_content(), 15); ?> <?php if($settings['news_styles'] == 'style_two'): ?> <div class="grid_box _card"> <div class="news_box default_style list_view <?php if($settings['normal_view'] == 'yes'): ?> normal_view <?php endif; ?> <?php if(has_post_thumbnail()): ?>has_images<?php else: ?>no_images<?php endif; ?>" id="post-<?php esc_attr(the_ID()); ?>"> <?php if(has_post_thumbnail()): ?> <div class="image img_hover-1"> <?php the_post_thumbnail(); ?> <?php creote_category(); ?> </div> <?php endif;?> <div class="content_box"> <div class="date"> <span class="date_in_number"><?php echo esc_attr(get_the_date(get_option('date_format'))); ?></span> </div> <div class="source"> <?php the_title( '<h2 class="title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?> <?php if(!empty($myexcerpt)):?> <p class="short_desc"><?php echo esc_html($myexcerpt); ?></p> <?php endif; ?> <a href="<?php echo esc_url(get_permalink()); ?>" class="link__go"><?php echo esc_attr($settings['button_text']);?></a> </div> <div class="auhtour_box"> <?php echo get_avatar( get_the_author_meta( 'ID' ) , 60 ); ?> <div class="contnet_a"> <p><?php echo esc_html__('POSTED BY' , 'creote-addons'); ?></p> <h4> <?php the_author(); ?> </h4> </div> </div> </div> </div> </div> <?php elseif($settings['news_styles'] == 'style_three'): ?> <div class="news_box style_two grid_box _card <?php if(has_post_thumbnail()): ?>has_images<?php else: ?>no_images<?php endif; ?>" id="post-<?php esc_attr(the_ID()); ?>"> <div class="content_box"> <div class="overlay"> </div> <?php if(has_post_thumbnail()): ?> <?php the_post_thumbnail(); ?> <?php endif;?> <div class="category"> <?php creote_category(); ?> </div> <div class="content_mid"> <span class="date_in_number"><?php echo esc_attr(get_the_date(get_option('date_format'))); ?></span> <?php the_title( '<h2 class="title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?> </div> <div class="auhtour_box"> <?php echo get_avatar( get_the_author_meta( 'ID' ) , 60 ); ?> <div class="contnet_a"> <p><?php echo esc_html__('POSTED BY' , 'creote-addons'); ?></p> <h4> <?php the_author(); ?> </h4> </div> </div> </div> </div> <?php elseif($settings['news_styles'] == 'style_four'): ?> <div class="grid_box _card style_man"> <div class="news_box style_four <?php if($settings['border_radius_enable'] == 'yes'): ?>no_radius<?php endif; ?> <?php if(has_post_thumbnail()): ?>has_images<?php else: ?>no_images<?php endif; ?>" id="post-<?php esc_attr(the_ID()); ?>" <?php if(has_post_thumbnail()): ?> style="background-image: url('<?php the_post_thumbnail_url();?>');" <?php endif;?>> <div class="overlay"> </div> <div class="date"> <span class="date_in_month"><?php echo esc_attr(get_the_date('M')); ?></span> <span class="date_in_number"><?php echo esc_attr(get_the_date('d')); ?></span> </div> <div class="content_box"> <div class="category"> <?php creote_category(); ?> </div> <?php the_title( '<h2 class="title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?> </div> <div class="auhtour_box"> <?php echo get_avatar( get_the_author_meta( 'ID' ) , 60 ); ?> <div class="contnet_a"> <p><?php echo esc_html__('POSTED BY' , 'creote-addons'); ?></p> <h4> <?php the_author(); ?> </h4> </div> </div> </div> </div> <?php elseif($settings['news_styles'] == 'style_five'): ?> <div class="grid_box _card"> <div class="news_box style_five"> <div class="content_box"> <ul> <li> <?php creote_comments(); ?> </li> <li> <a href="#"><span class="fa fa-clock-o"></span><?php echo esc_attr(get_the_date(get_option('date_format'))); ?></a> </li> </ul> <?php the_title( '<h2 class="title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?> <?php if(!empty($myexcerpt)):?> <p class="short_desc"><?php echo esc_html($myexcerpt); ?></p> <?php endif; ?> <a href="<?php echo esc_url(get_permalink()); ?>" class="link__go"><?php echo esc_attr($settings['button_text']);?><i class="icon-right-arrow-long"></i></a> </div> </div> </div> <?php elseif($settings['news_styles'] == 'style_six'): ?> <div class="news_box style_six grid_box _card <?php if(has_post_thumbnail()): ?>has_images<?php else: ?>no_images<?php endif; ?>" id="post-<?php esc_attr(the_ID()); ?>"> <div class="content_box"> <div class="overlay"> </div> <?php if(has_post_thumbnail()): ?> <?php the_post_thumbnail(); ?> <?php endif;?> <div class="category"> <?php creote_category(); ?> </div> <div class="content_mid"> <span class="date_in_number"><?php echo esc_attr(get_the_date(get_option('date_format'))); ?></span> <?php the_title( '<h2 class="title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?> </div> <div class="auhtour_box"> <?php echo get_avatar( get_the_author_meta( 'ID' ) , 60 ); ?> <div class="contnet_a"> <p><?php echo esc_html__('POSTED BY' , 'creote-addons'); ?></p> <h4> <?php the_author(); ?> </h4> </div> </div> </div> </div> <?php elseif($settings['news_styles'] == 'style_seven'): ?> <div class="grid_box _card"> <div class="news_box style_seven"> <?php if(has_post_thumbnail()): ?> <div class="image_box "> <?php the_post_thumbnail(); ?> <div class="date"><?php echo esc_attr(get_the_date(get_option('date_format'))); ?></div> </div> <?php endif;?> <div class="content_box "> <ul> <li><a href="#"><span class="fa fa-user "></span><?php the_author(); ?></a></li> <li><?php creote_comments(); ?></li> </ul> <?php the_title( '<h2 class="title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?> <?php if(!empty($myexcerpt)):?> <p class="short_desc"><?php echo esc_html($myexcerpt); ?></p> <?php endif; ?> <a href="<?php echo esc_url(get_permalink()); ?>" class="read_more "><?php echo esc_attr($settings['button_text']);?><i class="icon-right-arrow-long"></i></a> </div> </div> </div> <?php elseif($settings['news_styles'] == 'style_eight'): ?> <div class="grid_box _card"> <div class="news_box style_eight"> <?php if(has_post_thumbnail()): ?> <div class="image_box "> <?php the_post_thumbnail(); ?> </div> <?php endif;?> <div class="content_box"> <div class="category"> <?php creote_category(); ?> </div> <?php the_title( '<h2 class="title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?> <a href="<?php echo esc_url(get_permalink()); ?>" class="link__go"><?php echo esc_attr($settings['button_text']);?><i class="icon-right-arrow-long"></i></a> </div> </div> </div> <?php elseif($settings['news_styles'] == 'style_nine'): ?> <div class="grid_box _card"> <div class="news_box style_nine"> <div class="content_box"> <div class="date"> <span class="date_in_number"><?php echo esc_attr(get_the_date('d')); ?></span> <span class="date_in_month"><?php echo esc_attr(get_the_date('M')); ?></span> </div> <div class="content_bx_in"> <div class="category"> <?php creote_category(); ?> </div> <?php the_title( '<h2 class="title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?> </div> </div> <?php if(has_post_thumbnail()): ?> <div class="image_box "> <?php the_post_thumbnail(); ?> </div> <?php endif;?> </div> </div> <?php elseif($settings['news_styles'] == 'style_ten'): ?> <div class="grid_box _card"> <div class="news_box style_ten"> <?php if(has_post_thumbnail()): ?> <div class="image_box"> <?php the_post_thumbnail(); ?> </div> <?php endif;?> <?php the_title( '<h2 class="title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?> <ul> <li class="cag"> <?php creote_category(); ?> </li><li class="dte"><i class="icon-clock"></i><?php echo esc_attr(get_the_date(get_option('date_format'))); ?></li> </ul> </div> </div> <?php else: ?> <div class="grid_box _card"> <div class="news_box style_one blog_classic <?php if(has_post_thumbnail()): ?>has_images<?php else: ?>no_images<?php endif; ?>" id="post-<?php esc_attr(the_ID()); ?>"> <?php if(has_post_thumbnail()): ?> <div class="image img_hover-1"> <?php the_post_thumbnail($image_size); ?> <a class="arrow" href="<?php echo esc_url(get_permalink()); ?>"><i class="fa fa-angle-right"></i></a> </div> <?php endif;?> <div class="content_box"> <div class="date"> <span class="date_in_number"><?php echo esc_attr(get_the_date('d')); ?></span> <span class="date_in_month"><?php echo esc_attr(get_the_date('M')); ?></span> </div> <?php creote_category(); ?> <?php the_title( '<h2 class="title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?> </div> </div> </div> <?php endif; ?> <?php endwhile; ?> <?php wp_reset_postdata(); ?> </div> <?php if($settings['pagination_enable'] == true):?> <div class="row"> <div class="col-lg-12"> <div class="pagination"> <?php $pagination = 999999999; echo paginate_links( array( 'base' => str_replace( $pagination, '%#%', get_pagenum_link( $pagination ) ), 'format' => '?paged=%#%', 'current' => max(0, $paged), 'total' => $blog_grid_query->max_num_pages, 'prev_text' => '<i class="fa fa-angle-left"></i>', 'next_text' => '<i class="fa fa-angle-right"></i>', 'type'=>'list', 'add_args' => false ) ); ?> </div> </div> </div> <?php endif; ?> </section>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_blog_post_grid_v1());