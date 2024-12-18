<?php
add_action( 'vc_before_init', 'vc_service_post_v1_vcmap' );
function vc_service_post_v1_vcmap() {
 vc_map( array(
  "name" => __( "Service Grid v1", "creote-addons" ),
  "base" => "service_post_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
        'type'       => 'dropdown',
        'heading'    => esc_html__('Service Style  ', 'creote-addons'),
        'param_name' => 'service_styles',
        'value'      => array(
            esc_html__( 'Style One', 'creote-addons' ) => 'style_one' ,
            esc_html__( 'Style Two', 'creote-addons' ) => 'style_two' ,
            esc_html__( 'Style Three', 'creote-addons' ) => 'style_three' ,
        ),
        'group' => esc_html__('General', 'creote-addons') ,
      ),
      array(
        'type'       => 'dropdown',
        'heading'    => esc_html__('Column Size ', 'creote-addons'),
        'param_name' => 'service_column',
        'value'      => array(
            esc_html__( 'Select Column', 'creote-addons' ) => '',
            esc_html__( 'One Column', 'creote-addons' ) => 'one_column' ,
            esc_html__( 'Two Column', 'creote-addons' ) => 'two_column' ,
            esc_html__( 'Three Column', 'creote-addons' ) => 'three_column' ,
            esc_html__( 'Four Column', 'creote-addons' ) => 'four_column' ,
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
        'value'      => vc_get_service_categories(),
        'group' => esc_html__('General', 'creote-addons') ,
      ),
      array(
        'type' => 'textfield',
        'heading' => esc_html__('Read More Text', 'creote-addons') ,
        'param_name' => 'read_more',
        'value' => esc_html__('Read More', 'creote-addons') ,
        'group' => esc_html__('General', 'creote-addons') ,
     ) ,
      array(
        'type'       => 'dropdown',
        'heading'    => esc_html__('Color Type', 'creote-addons'),
        'param_name' => 'dark_white',
        'value'      => array(
            esc_html__( 'Dark Color', 'creote-addons' ) => 'dark_color',
            esc_html__( 'Light Color', 'creote-addons' ) => 'light_color' ,
        ),
        'group' => esc_html__('General', 'creote-addons') ,
      ),
     array(
        'type'        => 'checkbox',
        'heading'     => esc_html__( 'Pagination Enable / Disable', 'creote-addons' ),
        'param_name'  => 'npagination_enable_dis',
        'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
        'description' => esc_html__( 'Click Check box to enable Pagination', 'creote-addons' ),
        'group' => esc_html__('General', 'creote-addons') ,
      ),
      array(
        'type'       => 'dropdown',
        'heading'    => esc_html__('Pagination Alignment', 'creote-addons'),
        'param_name' => 'pagination_alignment',
        'value'      => array(
            esc_html__( 'Pagination Center', 'creote-addons' ) => 'text-center' ,
            esc_html__( 'Pagination Left', 'creote-addons' ) => 'text-start' ,
            esc_html__( 'Pagination Right', 'creote-addons' ) => 'text-end' ,
        ),
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'npagination_enable_dis',
            'value'   => 'yes',
          ),
      ),
      array(
        'type'        => 'checkbox',
        'heading'     => esc_html__( 'Transitions Enable / Disable', 'creote-addons' ),
        'param_name'  => 'transitions_enable',
        'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
        'description' => esc_html__( 'Click Check box to use the icon Image will display in output', 'creote-addons' ),
        'group' => esc_html__('Transitions', 'creote-addons') ,
      ),
)));
}
// shortcode
add_shortcode( 'service_post_v1_init', 'vc_service_post_v1' );
function vc_service_post_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'service_styles' => 'style_one',
      'service_column' => 'three_column',
      'post_count' => '4',
      'read_more' => 'Read more',
      'query_orderby' => 'date',
      'query_order' => 'DESc',
      'query_category' => '',
      'text_limit' => '12',
      'transitions_enable' => '',
      'dark_white' => '',
      'npagination_enable_dis' => '',
      'pagination_alignment' => 'text-center',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$image_size = 'creote-service-full-width';
$css_classes = '';
  if($atts['service_column'] == 'one_column') {
    $image_size = 'creote-service-grid-1170-520';
    $css_classes = 'col-lg-12';
  }
  elseif( $atts['service_column'] == 'two_column'){
    $image_size = 'creote-service-grid-570-420';
    $css_classes = 'col-lg-6 col-md-6 col-sm-6 col-xs-12';
  } 
  elseif( $atts['service_column'] == 'three_column'){
    $image_size = 'creote-service-grid-470-280';
    $css_classes = 'col-lg-4 col-md-4 col-sm-6 col-xs-12';
  }
  elseif($atts['service_column'] == 'four_column'){
    $image_size = 'creote-service-grid-270-180';
    $css_classes = 'col-lg-3 col-md-4 col-sm-6 col-xs-12';
  } else{
    $image_size = 'creote-service-full-width';
  }
ob_start();
?>
<section class="service_section grid_all news_wrapper_grid  <?php echo esc_attr($atts['dark_white']); ?>">
  <div class="row clearfix">
    <?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                $args = array(
                   'post_type' => 'service',
                   'ignore_sticky_posts' => true,
                   'orderby' => 'date',
                   'paged'             => $paged,
                   'posts_per_page' => $atts['post_count'],
                    'orderby'        => $atts['query_orderby'],
                    'order'          =>  $atts['query_order'],
               );
               if( $atts['query_category'] ) $args['service_category'] = $atts['query_category'];
               $service_query = new \WP_Query( $args ); 
               ?>
    <?php while ($service_query->have_posts()) : ?>
    <?php $service_query->the_post();
     $myexcerpt = wp_trim_words(get_the_excerpt(), $atts['text_limit']);  
     $mycontent = wp_trim_words(get_the_content(), $atts['text_limit']); 
     $class_icon_in = 'icon_no';
      if((get_post_meta( get_the_ID(), 'service_icon', true )) || (get_post_meta(get_the_ID() , 'service_icon_image', true))):
          $class_icon_in = 'icon_yes';
      endif;
      $service_transition =  get_post_meta( get_the_ID(), 'transition_timing_service', true );
      $service_icon =  get_post_meta( get_the_ID(), 'service_icon', true );
      $service_icon_images =   rwmb_meta( 'service_icon_image', array( 'size' => 'thumbnail' ) );;
      $cats = get_the_terms( get_the_ID(), 'service_category' );
?>
    <?php if($atts['service_styles'] == 'style_one'): ?>
    <div class="<?php echo esc_attr($css_classes); ?>">
      <div class="service_post style_one " <?php if(!empty($atts['transitions_enable']) == true): ?> data-aos="fade-up"
        data-aos-delay="<?php echo esc_attr($service_transition); ?>" data-aos-offset="0" <?php endif; ?>>
        <?php if(has_post_thumbnail()): ?>
        <div class="image">
          <div class="overlay"></div>
          <?php the_post_thumbnail($image_size); ?>
        </div>
        <?php endif;?>
        <div class="service_content <?php echo esc_attr($class_icon_in); ?>">
          <?php if(!empty($service_icon)): ?>
          <div class="icon_box">
            <span class="<?php echo esc_attr($service_icon);  ?> icon"></span>
          </div>
          <?php  elseif(!empty($service_icon_images)):
           foreach($service_icon_images as $service_icon_image ):?>
          <div class="icon_box">
            <img src="<?php echo esc_url($service_icon_image['url']); ?>">
          </div>
          <?php  endforeach; endif;  ?>
          <?php the_title( '<h2 class="title_service"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
          <?php if(!empty($myexcerpt)){?>
          <p class="short_desc"><?php echo  esc_html($myexcerpt); ?></p>
          <?php }elseif(!empty($mycontent)){ ?>
          <p class="short_desc"><?php echo  esc_html($mycontent); ?></p>
          <?php } ?>
          <a class="read_more" href="<?php echo esc_url(get_permalink()); ?>">
            <?php echo esc_attr($atts['read_more']); ?><i class="icon-right-arrow-long"></i></a>
        </div>
      </div>
    </div>
    <?php elseif($atts['service_styles'] == 'style_two'): ?>
    <div class="<?php echo esc_attr($css_classes); ?>">
      <div class="service_post style_two" <?php if(!empty($atts['transitions_enable']) == true): ?> data-aos="fade-up"
        data-aos-delay="<?php echo esc_attr($service_transition); ?>" data-aos-offset="0" <?php endif; ?>>
        <?php if(has_post_thumbnail()): ?>
        <div class="image">
          <div class="overlay"></div>
          <?php the_post_thumbnail($image_size); ?>
          <?php if(!empty($service_icon)): ?>
          <div class="icon_box">
            <span class="<?php echo esc_attr($service_icon);  ?> icon"></span>
            <a href="<?php echo esc_url(get_permalink()); ?>"><i class="fa fa-angle-right"></i></a>
          </div>
          <?php  elseif(!empty($service_icon_images)):
                                    foreach($service_icon_images as $service_icon_image ):?>
          <div class="icon_box">
            <img src="<?php echo esc_url($service_icon_image['url']); ?>">
            <a href="<?php echo esc_url(get_permalink()); ?>"><i class="fa fa-angle-right"></i></a>
          </div>
          <?php  endforeach;
                                   endif;
                                    ?>
        </div>
        <?php endif;?>
        <div class="service_content">
          <?php if(!empty($cats)): ?>
          <div class="catss">
            <?php  foreach($cats as $cat): ?>
            <a href="<?php esc_url(get_term_link($cat->slug, 'service_category')); ?>"
              class="cat"><?php echo esc_attr($cat->name); ?><span><?php echo esc_html(',' , 'creote-addons'); ?><span></a>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
          <?php the_title( '<h2 class="title_service"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
        </div>
      </div>
    </div>
    <?php elseif($atts['service_styles'] == 'style_three'): ?>
    <div class="<?php echo esc_attr($css_classes); ?>">
      <div class="service_post style_three" <?php if(!empty($atts['transitions_enable']) == true): ?> data-aos="fade-up"
        data-aos-delay="<?php echo esc_attr($service_transition); ?>" data-aos-offset="0" <?php endif; ?>>
        <?php if(has_post_thumbnail()): ?>
        <div class="image_box">
          <?php the_post_thumbnail($image_size); ?>
        </div>
        <?php endif;?>
        <div class="text_box">
          <div class="text_box_inner">
            <?php if(!empty($service_icon)): ?>
            <span class="<?php echo esc_attr($service_icon); ?> icon"></span>
            <?php  elseif(!empty($service_icon_images)):
              foreach($service_icon_images as $service_icon_image ):?>
            <img src="<?php echo esc_url($service_icon_image['url']); ?>" alt="icon_image" class="ic_img">
            <?php  endforeach;
           endif;
            ?>
            <?php the_title( '<h2 class="title_service"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
            <?php if(!empty($myexcerpt)){?>
            <p class="short_desc"><?php echo  esc_html($myexcerpt); ?></p>
            <?php }elseif(!empty($mycontent)){ ?>
            <p class="short_desc"><?php echo  esc_html($mycontent); ?></p>
            <?php } ?>
            <a class="read_more" href="<?php echo esc_url(get_permalink()); ?>">
              <?php echo esc_attr($atts['read_more']); ?><i class="icon-right-arrow-long"></i></a>
            <?php if(!empty($service_icon)): ?>
            <div class="bg_icon">
              <span class="<?php echo esc_attr($service_icon);  ?> icon"></span>
            </div>
            <?php  elseif(!empty($service_icon_images)):
              foreach($service_icon_images as $service_icon_image ):?>
            <div class="bg_icon">
              <img src="<?php echo esc_url($service_icon_image['url']); ?>" alt="icon_image" class="ic_img">
              </div>
              <?php  endforeach;
              endif;
            ?>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  </div>
  <?php if($atts['npagination_enable_dis'] == 'yes'):?>
  <div class="row">
    <div class="col-lg-12">
      <div class="pagination <?php echo esc_attr($atts['pagination_alignment']); ?> service">
        <?php
     $pagination = 999999999;
     echo paginate_links( array(
          'base' => str_replace( $pagination, '%#%', get_pagenum_link( $pagination ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $service_query->max_num_pages,
          'prev_text' => '<i class="fa fa-angle-left"></i>',
          'next_text' => '<i class="fa fa-angle-right"></i>',
          'type'=>'list', 
          'add_args' => false
     ) );
?>
      </div>
    </div>
  </div>
  <?php endif; ?>
</section>
<?php
return ob_get_clean();
}