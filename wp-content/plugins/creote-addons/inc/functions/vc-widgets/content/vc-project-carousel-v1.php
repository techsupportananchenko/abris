<?php
add_action( 'vc_before_init', 'vc_project_carousel_v1_vcmap' );
function vc_project_carousel_v1_vcmap() {
 vc_map( array(
  "name" => __( "Project Carousel v1", "creote-addons" ),
  "base" => "project_carousel_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
        'type'       => 'dropdown',
        'heading'    => esc_html__('Project Style  ', 'creote-addons'),
        'param_name' => 'project_styles',
        'value'      => array(
            esc_html__( 'Style One', 'creote-addons' ) => 'style_one' ,
            esc_html__( 'Style Two', 'creote-addons' ) => 'style_two' ,
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
        'type' => 'textfield',
        'heading' => esc_html__('Text Limit ', 'creote-addons') ,
        'param_name' => 'text_limit',
        'value' => esc_html__('12', 'creote-addons') ,
        'group' => esc_html__('General', 'creote-addons') ,
     ) ,
     array(
        'type'       => 'dropdown',
        'heading'    => esc_html__('Order By', 'creote-addons'),
        'param_name' => 'query_orderby',
        'value'      => array(
            esc_html__( 'Select Order By', 'creote-addons' ) => '',
            esc_html__( 'Date', 'creote-addons' ) => 'date' ,
            esc_html__( 'Title', 'creote-addons' ) => 'Title' ,
            esc_html__( 'Menu Order', 'creote-addons' ) => 'menu_order' ,
            esc_html__( 'Random', 'creote-addons' ) => 'rand' ,
        ),
        'group' => esc_html__('General', 'creote-addons') ,
      ),
      array(
        'type'       => 'dropdown',
        'heading'    => esc_html__('Order', 'creote-addons'),
        'param_name' => 'query_order',
        'value'      => array(
            esc_html__( 'Select Order', 'creote-addons' ) => '',
            esc_html__( 'DESc', 'creote-addons' ) => 'DESc' ,
            esc_html__( 'ASC', 'creote-addons' ) => 'ASC' ,
        ),
        'group' => esc_html__('General', 'creote-addons') ,
      ),
      array(
        'type'       => 'dropdown',
        'heading'    => esc_html__('Category', 'creote-addons'),
        'param_name' => 'query_category',
        'value'      => vc_get_project_categories(),
        'group' => esc_html__('General', 'creote-addons') ,
      ),
      array(
        'type'       => 'dropdown',
        'heading'    => esc_html__( 'Color Type ', 'creote-addons' ),
        'param_name' => 'dark_white',
        'value'      => array(
             esc_html__('Dark Color', 'creote-addons')  => 'dark_color', 
             esc_html__('Light Color', 'creote-addons')  => 'light_color',
        ),
        'dependency'  => array(
          'element' => 'project_styles',
          'value'   => 'style_two',
        ), 
        'group' => esc_html__('General', 'creote-addons') ,
    ),
)));
}
// shortcode
add_shortcode( 'project_carousel_v1_init', 'vc_project_carousel_v1' );
function vc_project_carousel_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'project_styles' => 'style_one',
      'post_count' => '4',
      'query_orderby' => 'date',
      'query_order' => 'DESc',
      'query_category' => '',
      'text_limit' => '12',
      'dark_white' => 'dark_color',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$swiper_class = '';
if($atts['project_styles'] == 'style_one'){
$swiper_class = esc_html('swiper__center' , 'creote-addons');
} 
elseif($atts['project_styles'] == 'style_two'){
  $swiper_class = esc_html('swiper__center_three' , 'creote-addons');
} 
ob_start();
?>
     <section class="project_caro_section  carousel <?php echo esc_attr($atts['project_styles']); ?> <?php echo esc_attr($atts['dark_white']); ?>">
<div class="swiper-container  <?php echo esc_attr($swiper_class); ?>">
  <div class="swiper-wrapper">
       <!-- swiper-slide -->
          <?php
           $args = array(
              'post_type' => 'project',
              'ignore_sticky_posts' => true,
              'orderby' => 'date',
              'posts_per_page' => $atts['post_count'],
               'orderby'        => $atts['query_orderby'],
               'order'          =>  $atts['query_order'],
          );
          if( $atts['query_category'] ) $args['project_category'] = $atts['query_category'];
            $project_caro_query = new \WP_Query( $args ); 
          ?>
             <?php while ($project_caro_query->have_posts()) : ?>
                 <?php $project_caro_query->the_post();
                      $term_list = wp_get_post_terms(get_the_id(), 'project_category', array("fields" => "names"));
                      $myexcerpt = wp_trim_words(get_the_excerpt(), $atts['text_limit']);  
                      $mycontent = wp_trim_words(get_the_content(), $atts['text_limit']); 
                 ?>
                 <?php if($atts['project_styles'] == 'style_one'): ?>
                  <div class="swiper-slide">
                 <div class="project_post style_one">
                 <?php if ( has_post_thumbnail() ): ?>
                      <div class="image">
                        <?php the_post_thumbnail('creote_project_caro_image_style_one'); ?>
                      </div>
                  <?php endif;?>   
                      <div class="project_caro_content">
                          <div class="left_side">
                        <p><?php echo implode( ', ', (array)$term_list );?></p>
                          <?php the_title( '<h2 class="title_pro"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                          </div>
                          <div class="right_side">
                              <a href="<?php echo esc_url(get_permalink()); ?>"><i class="icon-right-arrow"></i></a>
                              <a href="<?php echo esc_url(get_permalink()); ?>" class="two"><i class="icon-right-arrow"></i></a>
                          </div>
                      </div>
                 </div>
                 </div>
                 <?php elseif($atts['project_styles'] == 'style_two'): ?>
                  <div class="swiper-slide">
                 <div class="project_post style_seven">
                 <?php if(has_post_thumbnail()): ?>
                                    <div class="image_box">
                                    <?php the_post_thumbnail('creote_project_caro_image_style_one'); ?>
                                    </div>
                                    <?php endif; ?>
                                    <div class="content_box ">
                                    <?php the_title( '<h2 class="title_pro"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                                        <p><?php echo implode( ', ', (array)$term_list );?></p>
                                        <div class="image_zoom_box ">
                                        <a href="<?php the_post_thumbnail_url(); ?>" data-fancybox="gallery"><span class="fa fa-plus zoom_icon"></span></a>
                                        </div>
                                    </div>
                                    <div class="overlay ">
                                        <div class="text ">
                                        <?php the_title( '<h2 class="title_pro"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                                            <?php if(!empty($myexcerpt)){?>
                                        <p class="short_desc"><?php echo  esc_html($myexcerpt); ?></p>
                                    <?php }elseif(!empty($mycontent)){ ?>
                                        <p class="short_desc"><?php echo  esc_html($mycontent); ?></p>
                                    <?php } ?> 
                                            <a href="<?php echo esc_url(get_permalink()); ?>" class="read_more tp_five "><?php echo esc_html('Read More' , 'creote-addons'); ?></a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                 <?php endif; ?>
                 <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
  </div>  
  <div class="p_pagination">
<div class="swiper-pagination"></div>
 </div>
  </div>   
</section>
<?php
return ob_get_clean();
}
