<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_footer_recent_post_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-foo-recent-post-v1';
       }
       public function get_title()
       {
           return __('Recent Post V1' , 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['105'];
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
   			],
               'default' => __('style_one' , 'creote-addons'),
             ]
           );
           $this->add_responsive_control(
               'dark_white',
               [
                 'label' => __( 'Service Color Type', 'creote-addons' ),
                 'type' => Controls_Manager::SELECT,
                 'options' => [
                   'dark_color' => __('Dark Color', 'creote-addons'), 
                   'light_color' => __('Light Color', 'creote-addons'),
                   ],
                  'default' => 'light_color',
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
           'query_category', 
               [
                 'type' => Controls_Manager::SELECT,
                 'label' => esc_html__('Category', 'creote-addons'),
                 'options' => get_blog_categories(),
               ]
       );
       $this->end_controls_section();
       } 
       protected function render()
       {
           $settings = $this->get_settings_for_display();
           $allowed_tags = wp_kses_allowed_html('post');
   ?>
<div class="footer_widgets recent_news_em_wp <?php echo esc_attr($settings['news_styles']); ?> clearfix"> <div class="news_boxed <?php echo esc_attr($settings['dark_white']); ?>"> <!-- swiper-slide --> <?php $args = array( 'post_type' => 'post', 'ignore_sticky_posts' => true, 'posts_per_page' => $settings['post_count'], 'orderby' => 'date', ); if( $settings['query_category'] ) $args['category_name'] = $settings['query_category']; $blog_grid_query = new \WP_Query( $args ); ?> <?php while ($blog_grid_query->have_posts()) : ?> <?php $blog_grid_query->the_post(); ?> <?php if($settings['news_styles'] == 'style_two'): ?> <div class="news_recent clearfix<?php if(has_post_thumbnail()): ?> image_s <?php endif;?>"> <?php if(has_post_thumbnail()): ?> <div class="image "> <?php the_post_thumbnail(); ?> </div> <?php endif;?> <div class="content "> <a class="date"><span class="fa fa-clock-o"></span><?php echo esc_attr(get_the_date(get_option('date_format'))); ?></a> <?php the_title( '<h2 class="title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?> </div> </div> <?php else: ?> <div class="news_recent clearfix<?php if(has_post_thumbnail()): ?> image_s <?php endif;?>"> <?php if(has_post_thumbnail()): ?> <div class="image "> <?php the_post_thumbnail(); ?> </div> <?php endif;?> <div class="content "> <?php the_title( '<h2 class="title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?> <a class="date"><span class="fa fa-clock-o"></span><?php echo esc_attr(get_the_date(get_option('date_format'))); ?></a> </div> </div> <?php endif; ?> <?php endwhile; ?> <?php wp_reset_postdata(); ?> </div></div>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_footer_recent_post_v1());