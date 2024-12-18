<?php
add_action( 'vc_before_init', 'vc_foo_recent_post_v1_vcmap' );
function vc_foo_recent_post_v1_vcmap() {
 vc_map( array(
  "name" => __( "Footer Recent Post v1", "creote-addons" ),
  "base" => "foo_recent_post_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Footer Widgets", "creote-addons"),
  "params" => array(
    array(
        'type'       => 'dropdown',
        'heading'    => esc_html__('News Style  ', 'creote-addons'),
        'param_name' => 'news_styles',
        'value'      => array(
            esc_html__( ' Style One', 'creote-addons' ) => 'style_one' ,
            esc_html__( ' Style Two', 'creote-addons' ) => 'style_two' ,
        ),
        'group' => esc_html__('General', 'creote-addons') ,
      ),
      array(
        'type' => 'textfield',
        'heading' => esc_html__('Post Count', 'creote-addons') ,
        'param_name' => 'post_count',
        'value' => esc_html__('4', 'creote-addons') ,
        'group' => esc_html__('General', 'creote-addons') ,
     ) ,
      array(
        'type'       => 'dropdown',
        'heading'    => esc_html__('Category', 'creote-addons'),
        'param_name' => 'query_category',
        'value'      => vc_get_blog_categories(),
        'group' => esc_html__('General', 'creote-addons') ,
      ),
)));
}
// shortcode
add_shortcode( 'foo_recent_post_v1_init', 'vc_foo_recent_post_v1' );
function vc_foo_recent_post_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'news_styles' => 'style_one',
      'post_count' => '4',
      'query_category' => '',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
ob_start();
?>
    <div class="footer_widgets recent_news_em_wp <?php echo esc_attr($atts['news_styles']); ?>  clearfix">
  <div class="news_boxed">
       <!-- swiper-slide -->
          <?php 
           $args = array(
              'post_type' => 'post',
              'ignore_sticky_posts' => true,
              'posts_per_page' => $atts['post_count'],
              'orderby'        => 'date', 
          );
          if($atts['query_category']) $args['category_name'] = $atts['query_category'];
            $blog_grid_query = new \WP_Query( $args ); 
          ?>
             <?php while ($blog_grid_query->have_posts()) : ?>
                 <?php $blog_grid_query->the_post(); ?>
                 <?php if($atts['news_styles'] == 'style_one'): ?>
                 <div class="news_recent clearfix<?php if(has_post_thumbnail()): ?>  image_s  <?php endif;?>">
                    <?php if(has_post_thumbnail()): ?>
                              <div class="image ">
                              <?php the_post_thumbnail(); ?>
                              </div>
                              <?php endif;?>    
                              <div class="content ">
                              <?php the_title( '<h2 class="title"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                              <a href="#" class="date"><span class="fa fa-clock-o"></span><?php echo esc_attr(get_the_date('M d , Y')); ?></a>
                              </div>
                          </div>
                  <?php elseif($atts['news_styles'] == 'style_two'): ?>
                      <div class="news_recent clearfix<?php if(has_post_thumbnail()): ?>  image_s  <?php endif;?>">
                    <?php if(has_post_thumbnail()): ?>
                              <div class="image ">
                              <?php the_post_thumbnail(); ?>
                              </div>
                              <?php endif;?>    
                              <div class="content ">
                              <a href="#" class="date"><span class="fa fa-clock-o"></span><?php echo esc_attr(get_the_date('M d , Y')); ?></a>
                              <?php the_title( '<h2 class="title"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                              </div>
                          </div>
                  <?php endif; ?>
                 <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
          </div>    
        </div>
<?php
return ob_get_clean();
}
