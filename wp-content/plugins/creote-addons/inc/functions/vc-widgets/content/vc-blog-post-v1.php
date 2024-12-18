<?php
add_action( 'vc_before_init', 'vc_blog_post_v1_vcmap' );
function vc_blog_post_v1_vcmap() {
 vc_map( array(
  "name" => __( "Blog Grid v1", "creote-addons" ),
  "base" => "blog_post_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
        'type'       => 'dropdown',
        'heading'    => esc_html__('News Style  ', 'creote-addons'),
        'param_name' => 'news_styles',
        'value'      => array(
            esc_html__( 'Select Style', 'creote-addons' ) => '',
            esc_html__( 'Blog Style One', 'creote-addons' ) => 'style_one' ,
            esc_html__( 'Blog Style Two', 'creote-addons' ) => 'style_two' ,
            esc_html__( 'Blog Style Three', 'creote-addons' ) => 'style_three' ,
            esc_html__( 'Blog Style Four', 'creote-addons' ) => 'style_four' ,
            esc_html__( 'Blog Style Five', 'creote-addons' ) => 'style_five' ,
            esc_html__( 'Blog Style Six', 'creote-addons' ) => 'style_six' ,
        ),
        'group' => esc_html__('General', 'creote-addons') ,
      ),
      array(
        'type'       => 'dropdown',
        'heading'    => esc_html__('Column Size ', 'creote-addons'),
        'param_name' => 'news_column',
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
        'type'        => 'checkbox',
        'heading'     => esc_html__( 'List View  Disable / Enable', 'creote-addons' ),
        'param_name'  => 'normal_view',
        'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'news_styles',
            'value'   => 'style_two',
          ),
      ),
      array(
        'type'        => 'checkbox',
        'heading'     => esc_html__( 'Grid View Enable / Disable', 'creote-addons' ),
        'param_name'  => 'masonory_enable',
        'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'news_styles',
            'value'   => 'style_four',
          ),
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
        'value'      => vc_get_blog_categories(),
        'group' => esc_html__('General', 'creote-addons') ,
      ),
    array(
        'type'        => 'checkbox',
        'heading'     => esc_html__( 'Transitions Enable / Disable', 'creote-addons' ),
        'param_name'  => 'transitions_enable',
        'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
        'description' => esc_html__( 'Click Check box to use the icon Image will display in output', 'creote-addons' ),
        'group' => esc_html__('Transitions', 'creote-addons') ,
      ),
     array(
        'type'        => 'checkbox',
        'heading'     => esc_html__( 'Pagination Enable / Disable', 'creote-addons' ),
        'param_name'  => 'pagination_enable',
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
            'element' => 'pagination_enable',
            'value'   => 'yes',
          ),
      ),
)));
}
// shortcode
add_shortcode( 'blog_post_v1_init', 'vc_blog_post_v1' );
function vc_blog_post_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'news_styles' => 'style_one',
      'normal_view' => '',
      'news_column' => 'three_column',
      'post_count' => '4',
      'query_orderby' => 'date',
      'query_order' => 'DESc',
      'query_category' => '',
      'text_limit' => '12',
      'masonory_enable' => '',
      'pagination_enable' => '',
      'pagination_alignment' => 'text-center',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$image_size = 'creote-full-width';
$css_classes = '';
  if($atts['news_column'] == 'one_column') {
    $image_size = 'creote-grid-1170-520';
    $css_classes = 'one_column news_wrapper_grid';
  }
  elseif( $atts['news_column'] == 'two_column'){
    $image_size = 'creote-grid-570-420';
    $css_classes = 'two_column news_wrapper_grid';
  } 
  elseif( $atts['news_column'] == 'three_column'){
    $image_size = 'creote-grid-470-280';
    $css_classes = 'three_column news_wrapper_grid';
  }
  elseif($atts['news_column'] == 'four_column'){
    $image_size = 'creote-grid-270-180';
    $css_classes = 'four_column news_wrapper_grid';
  } else{
    $image_size = 'creote-full-width';
  }
ob_start();
?>
<section
    class="blog_post_section  elemen_wp  <?php echo esc_attr($css_classes); ?> <?php echo esc_attr($atts['news_styles']); ?> <?php if($atts['masonory_enable'] == 'yes'): ?> masonary_enable <?php endif; ?>">
    <div class="grid_show_case grid_layout clearfix">
        <!-- swiper-slide -->
        <?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
             $args = array(
                'post_type' => 'post',
                'ignore_sticky_posts' => true,
                'orderby' => 'date',
                'paged'             => $paged,
                'posts_per_page' => $atts['post_count'],
                 'orderby'        => $atts['query_orderby'],
                 'order'          =>  $atts['query_order'],
            );
            if( $atts['query_category'] ) $args['category_name'] = $atts['query_category'];
              $blog_grid_query = new \WP_Query( $args ); 
            ?>
        <?php while ($blog_grid_query->have_posts()) : ?>
        <?php $blog_grid_query->the_post(); ?>
        <?php 
                        $myexcerpt = wp_trim_words(get_the_excerpt(), $atts['text_limit']);  
                        $mycontent = wp_trim_words(get_the_content(), $atts['text_limit']); 
                        $myexcerptwo = wp_trim_words(get_the_excerpt(), 15);  
                        $mycontentwo = wp_trim_words(get_the_content(), 15); 
                    ?>
        <?php if($atts['news_styles'] == 'style_one'): ?>
        <div class="grid_box _card">
            <div class="news_box  style_one blog_classic <?php if(has_post_thumbnail()): ?>has_images<?php else: ?>no_images<?php endif; ?>"
                id="post-<?php esc_attr(the_ID()); ?>">
                <?php if(has_post_thumbnail()): ?>
                <div class="image img_hover-1">
                    <?php the_post_thumbnail($image_size); ?>
                    <a class="arrow" href="<?php echo esc_url(get_permalink()); ?>"><i
                            class="fa fa-angle-right"></i></a>
                </div>
                <?php endif;?>
                <div class="content_box">
                    <div class="date">
                        <span class="date_in_number"><?php echo esc_attr(get_the_date('d')); ?></span>
                        <span class="date_in_month"><?php echo esc_attr(get_the_date('M')); ?></span>
                    </div>
                    <?php creote_category(); ?>
                    <?php the_title( '<h2 class="title"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                </div>
            </div>
        </div>
        <?php elseif($atts['news_styles'] == 'style_two'): ?>
        <div class="grid_box _card">
            <div class="news_box default_style list_view <?php if($atts['normal_view'] == 'yes'): ?> normal_view <?php endif; ?> <?php if(has_post_thumbnail()): ?>has_images<?php else: ?>no_images<?php endif; ?>"
                id="post-<?php esc_attr(the_ID()); ?>">
                <?php if(has_post_thumbnail()): ?>
                <div class="image img_hover-1">
                    <?php the_post_thumbnail(); ?>
                    <?php creote_category(); ?>
                </div>
                <?php endif;?>
                <div class="content_box">
                    <div class="date">
                        <span class="date_in_number"><?php echo esc_attr(get_the_date('M d , Y')); ?></span>
                    </div>
                    <div class="source">
                        <?php the_title( '<h2 class="title"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                        <?php if(!empty($myexcerpt)){?>
                        <p class="short_desc"><?php echo  esc_html($myexcerpt); ?></p>
                        <?php }elseif(!empty($mycontent)){ ?>
                        <p class="short_desc"><?php echo  do_shortcode($mycontent); ?></p>
                        <?php } ?>
                        <a href="<?php echo esc_url(get_permalink()); ?>"
                            class="link__go"><?php echo esc_html('Read more' , 'rakon');?></a>
                    </div>
                    <div class="auhtour_box">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ) , 60 ); ?>
                        <div class="contnet_a">
                            <p><?php echo esc_html('POSTED BY'); ?></p>
                            <h4>
                                <?php the_author(); ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php elseif($atts['news_styles'] == 'style_three'): ?>
        <div class="news_box style_two grid_box _card   <?php if(has_post_thumbnail()): ?>has_images<?php else: ?>no_images<?php endif; ?>"
            id="post-<?php esc_attr(the_ID()); ?>">
            <div class="content_box">
                <div class="overlay"> </div>
                <?php if(has_post_thumbnail()): ?>
                <?php the_post_thumbnail(); ?>
                <?php endif;?>
                <div class="category">
                    <?php creote_category(); ?>
                </div>
                <div class="content_mid">
                    <span class="date_in_number"><?php echo esc_attr(get_the_date('M d , Y')); ?></span>
                    <?php the_title( '<h2 class="title"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                </div>
                <div class="auhtour_box">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ) , 60 ); ?>
                    <div class="contnet_a">
                        <p><?php echo esc_html('POSTED BY'); ?></p>
                        <h4> <?php the_author(); ?> </h4>
                    </div>
                </div>
            </div>
        </div>
        <?php elseif($atts['news_styles'] == 'style_four'): ?>
        <div class="grid_box _card style_man">
            <div class="news_box  style_four   <?php if(has_post_thumbnail()): ?>has_images<?php else: ?>no_images<?php endif; ?>"
                id="post-<?php esc_attr(the_ID()); ?>"
                <?php if(has_post_thumbnail()): ?> style="background-image: url('<?php the_post_thumbnail_url();?>');"
                <?php endif;?>>
                <div class="overlay"> </div>
                <div class="date">
                    <span class="date_in_month"><?php echo esc_attr(get_the_date('M')); ?></span>
                    <span class="date_in_number"><?php echo esc_attr(get_the_date('d')); ?></span>
                </div>
                <div class="content_box">
                    <div class="category">
                        <?php creote_category(); ?>
                    </div>
                    <?php the_title( '<h2 class="title"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                </div>
                <div class="auhtour_box">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ) , 60 ); ?>
                    <div class="contnet_a">
                        <p><?php echo esc_html('POSTED BY'); ?></p>
                        <h4> <?php the_author(); ?> </h4>
                    </div>
                </div>
            </div>
        </div>
        <?php elseif($atts['news_styles'] == 'style_five'): ?>
        <div class="grid_box _card">
            <div class="news_box style_five">
                <div class="content_box">
                    <ul>
                        <li>
                            <?php creote_comments(); ?>
                        </li>
                        <li>
                            <a href="#"><span
                                    class="fa fa-clock-o"></span><?php echo esc_attr(get_the_date('M d , Y')); ?></a>
                        </li>
                    </ul>
                    <?php the_title( '<h2 class="title"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                    <?php if(!empty($myexcerpt)){?>
                    <p class="short_desc"><?php echo  esc_html($myexcerpt); ?></p>
                    <?php }elseif(!empty($mycontent)){ ?>
                    <p class="short_desc"><?php echo  do_shortcode($mycontent); ?></p>
                    <?php } ?>
                    <a href="<?php echo esc_url(get_permalink()); ?>"
                        class="link__go"><?php echo esc_html('Read more' , 'rakon');?><i
                            class="icon-right-arrow-long"></i></a>
                </div>
            </div>
        </div>
        <?php elseif($atts['news_styles'] == 'style_six'): ?>
        <div class="news_box style_six grid_box _card   <?php if(has_post_thumbnail()): ?>has_images<?php else: ?>no_images<?php endif; ?>"
            id="post-<?php esc_attr(the_ID()); ?>">
            <div class="content_box">
                <div class="overlay"> </div>
                <?php if(has_post_thumbnail()): ?>
                <?php the_post_thumbnail(); ?>
                <?php endif;?>
                <div class="category">
                    <?php creote_category(); ?>
                </div>
                <div class="content_mid">
                    <span class="date_in_number"><?php echo esc_attr(get_the_date('M d , Y')); ?></span>
                    <?php the_title( '<h2 class="title"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                </div>
                <div class="auhtour_box">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ) , 60 ); ?>
                    <div class="contnet_a">
                        <p><?php echo esc_html('POSTED BY'); ?></p>
                        <h4> <?php the_author(); ?> </h4>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>
    <?php if($atts['pagination_enable'] == true):?>
    <div class="row">
        <div class="col-lg-12">
            <div class="pagination <?php echo esc_attr($atts['pagination_alignment']); ?>">
                <?php
$pagination = 999999999;
echo paginate_links( array(
  'base' => str_replace( $pagination, '%#%', get_pagenum_link( $pagination ) ),
  'format' => '?paged=%#%',
  'current' => max( 1, get_query_var('paged') ),
  'total' => $blog_grid_query->max_num_pages,
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