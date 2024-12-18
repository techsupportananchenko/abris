<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_project_carousel_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-project-carousel-v1';
       }
       public function get_title()
       {
           return __('Project Carousel V1' , 'creote-addons');
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
               'project_carousel_content',
               [
                   'label' => __('Project  Content', 'creote-addons')
               ]
           );
           $this->add_control(
           'project_styles',
           [
             'label' => __('Project Styles', 'creote-addons'),
             'type' => Controls_Manager::SELECT,
             'options' => [
               'style_one' => __( 'Style One', 'creote-addons' ),
               'style_two' => __( 'Style Two', 'creote-addons' ),
               'style_three' => __( 'Style Three', 'creote-addons' ),
               'style_four' => __( 'Style Four', 'creote-addons' ),
   		   ],
             'default' => __('style_three' , 'creote-addons'),
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
                 'options' => get_project_categories(),
               ]
       );
       $this->add_responsive_control(
           'dark_white',
           [
             'label' => __( 'Color Type', 'creote-addons' ),
             'type' => Controls_Manager::SELECT,
             'options' => [
               'dark_color' => __('Dark Color', 'creote-addons'), 
               'light_color' => __('Light Color', 'creote-addons'),
               ],
              'default' => 'dark_color',
              'condition' => [
               'project_styles' => 'style_two',
             ],
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
         $this->end_controls_section();
       }
       protected function render()
       {
           $settings = $this->get_settings_for_display(); 
           $allowed_tags = wp_kses_allowed_html('post'); 
           $swiper_class = '';
           if($settings['project_styles'] == 'style_one' || $settings['project_styles'] == 'style_four'){
           $swiper_class = esc_html('swiper__center' , 'creote-addons');
           } elseif($settings['project_styles'] == 'style_two'){
               $swiper_class = esc_html('swiper__center_three' , 'creote-addons');
           } 
           else{
               $swiper_class = esc_html('swipe_four_nocenter' , 'creote-addons');
           } 
   ?>
<section class="project_caro_section carousel <?php echo esc_attr($settings['project_styles']); ?> <?php echo esc_attr($settings['dark_white']); ?>"> <div class="swiper-container <?php echo esc_attr($swiper_class); ?>"> <div class="swiper-wrapper"> <!-- swiper-slide --> <?php $args = array( 'post_type' => 'project', 'ignore_sticky_posts' => true, 'orderby' => 'date', 'posts_per_page' => $settings['post_count'], 'orderby' => $settings['query_orderby'], 'order' => $settings['query_order'], ); if( $settings['query_category'] ) $args['project_category'] = $settings['query_category']; $project_caro_query = new \WP_Query( $args ); ?> <?php while ($project_caro_query->have_posts()) : ?> <?php $project_caro_query->the_post(); $term_list = wp_get_post_terms(get_the_id(), 'project_category', array("fields" => "names")); $myexcerpt = wp_trim_words(get_the_excerpt(), $settings['text_limit']); ?> <?php if($settings['project_styles'] == 'style_four'): ?> <div class="swiper-slide"> <div class="project_post style_one <?php if($settings['project_styles'] == 'style_four'): ?> style_four_caro<?php endif; ?>"> <?php if ( has_post_thumbnail() ): ?> <div class="image"> <?php the_post_thumbnail('creote_project_caro_image_style_one'); ?> </div> <?php endif;?> <div class="project_caro_content"> <div class="left_side"> <?php if(!empty($term_list)): ?> <p><?php echo esc_attr_e(implode( ', ', (array)$term_list ));?></p> <?php endif; ?> <?php the_title( '<h2 class="title_pro"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?> </div> <div class="right_side"> <a href="<?php echo esc_url(get_permalink()); ?>"><i class="icon-right-arrow"></i></a> <a href="<?php echo esc_url(get_permalink()); ?>" class="two"><i class="icon-right-arrow"></i></a> </div> </div> </div> </div> <?php elseif($settings['project_styles'] == 'style_two'): ?> <div class="swiper-slide"> <div class="project_post style_seven"> <?php if(has_post_thumbnail()): ?> <div class="image_box"> <?php the_post_thumbnail('creote_project_caro_image_style_one'); ?> </div> <?php endif; ?> <div class="content_box "> <?php the_title( '<h2 class="title_pro"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?> <?php if(!empty($term_list)): ?> <p><?php echo esc_attr_e(implode( ', ', (array)$term_list ));?></p> <?php endif; ?> <div class="image_zoom_box "> <a href="<?php the_post_thumbnail_url(); ?>" data-fancybox="gallery"><span class="fa fa-plus zoom_icon"></span></a> </div> </div> <div class="overlay "> <div class="text "> <?php the_title( '<h2 class="title_pro"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?> <?php if(!empty($myexcerpt)){?> <p class="short_desc"><?php echo esc_html($myexcerpt); ?></p> <?php } ?> <a href="<?php echo esc_url(get_permalink()); ?>" class="read_more tp_five "><?php echo esc_html__($settings['read_more']); ?></a> </div> </div> </div> </div> <?php elseif($settings['project_styles'] == 'style_one'): ?> <div class="swiper-slide"> <div class="project_post style_one"> <?php if ( has_post_thumbnail() ): ?> <div class="image"> <?php the_post_thumbnail('creote_project_caro_image_style_one'); ?> </div> <?php endif;?> <div class="project_caro_content"> <div class="left_side"> <?php if(!empty($term_list)): ?> <p><?php echo esc_attr_e(implode( ', ', (array)$term_list ));?></p> <?php endif; ?> <?php the_title( '<h2 class="title_pro"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?> </div> <div class="right_side"> <a href="<?php echo esc_url(get_permalink()); ?>"><i class="icon-right-arrow"></i></a> <a href="<?php echo esc_url(get_permalink()); ?>" class="two"><i class="icon-right-arrow"></i></a> </div> </div> </div> </div> <?php else: ?> <div class="swiper-slide"> <div class="project_post style_nine"> <?php if ( has_post_thumbnail() ): ?> <div class="image"> <?php the_post_thumbnail('creote_project_caro_image_style_one'); ?> <div class="image_zoom_box "> <a href="<?php the_post_thumbnail_url(); ?>" data-fancybox="gallery"><span class="fa fa-plus zoom_icon"></span></a> </div> </div> <?php endif;?> <div class="project_caro_content"> <?php if(!empty($term_list)): ?> <p><?php echo esc_attr_e(implode( ', ', (array)$term_list ));?></p> <?php endif; ?> <?php the_title( '<h2 class="title_pro"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?> </div> </div> </div> <?php endif; ?> <?php endwhile; ?> <?php wp_reset_postdata(); ?> </div> <div class="p_pagination"> <div class="swiper-pagination"></div> </div> </div></section>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_project_carousel_v1());