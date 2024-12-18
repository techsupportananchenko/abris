<?php
add_action( 'vc_before_init', 'vc_project_filt_v1_vcmap' );
function vc_project_filt_v1_vcmap() {
 vc_map( array(
  "name" => __( "Project Filter v1", "creote-addons" ),
  "base" => "project_filt_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
        'type'       => 'dropdown',
        'heading'    => esc_html__('Project Style  ', 'creote-addons'),
        'param_name' => 'project_filter_style',
        'value'      => array(
            esc_html__( 'Style One', 'creote-addons' ) => 'style_one' ,
            esc_html__( 'Style Two', 'creote-addons' ) => 'style_two' ,
            esc_html__( 'Style Three', 'creote-addons' ) => 'style_three' ,
            esc_html__( 'Style Four', 'creote-addons' ) => 'style_four' ,
            esc_html__( 'Style Five', 'creote-addons' ) => 'style_five' ,
        ),
        'group' => esc_html__('General', 'creote-addons') ,
      ),
      array(
        'type'       => 'dropdown',
        'heading'    => esc_html__('Column Size ', 'creote-addons'),
        'param_name' => 'project_column',
        'value'      => array(
            esc_html__( 'Three Column', 'creote-addons' ) => 'col-lg-4 col-md-6 col-sm-6 col-xs-12' ,
            esc_html__( 'One Column', 'creote-addons' ) => 'col-lg-12 col-md-12 col-sm-12 col-xs-12' ,
            esc_html__( 'Two Column', 'creote-addons' ) => 'col-lg-6 col-md-6 col-sm-6 col-xs-12' ,
            esc_html__( 'Four Column', 'creote-addons' ) => 'col-lg-3 col-md-6 col-sm-6 col-xs-12' ,
        ),
        'group' => esc_html__('General', 'creote-addons') ,
      ),
      array(
        'type' => 'param_group',
        'heading' => esc_html__('Project Content', 'creote-addons') ,
        'value' => '',
        'param_name' => 'project_filter_repeater',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Post Count', 'creote-addons') ,
                'param_name' => 'post_count',
                'value' => esc_html__('4', 'creote-addons') ,
             ) ,
             array(
                'type' => 'textfield',
                'heading' => esc_html__('Text Limit ', 'creote-addons') ,
                'param_name' => 'text_limit',
                'value' => esc_html__('12', 'creote-addons') ,
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
            ),
              array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Category', 'creote-addons'),
                'param_name' => 'query_category',
                'value'      => vc_get_project_categories(),
              ),
              array(
                'type'       => 'textfield',
                'heading'    => esc_html__('Filter Title', 'creote-addons'),
                'param_name' => 'filtertitle',
                'value'      => esc_html__('Title', 'creote-addons'),
              ),
        ),
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type'       => 'dropdown',
        'heading'    => esc_html__('Filter style', 'creote-addons'),
        'param_name' => 'stylefilter',
        'value'      => array(
            esc_html__( 'Dark', 'creote-addons' ) => 'dark' ,
            esc_html__( 'Light', 'creote-addons' ) => 'Light' ,
        ),
        'group' => esc_html__('Other Settings', 'creote-addons') ,
    ),
    array(
      'type'        => 'checkbox',
      'heading'     => esc_html__( 'Filter Enable / Disable', 'creote-addons' ),
      'param_name'  => 'filter_enable',
      'value'       => array( 
          esc_html__( 'Yes', 'creote-addons' ) => 'yes' , 
      ),
      'group' => esc_html__('Other Settings', 'creote-addons') ,
  ),
    array(
        'type'       => 'dropdown',
        'heading'    => esc_html__('Filter Alignment', 'creote-addons'),
        'param_name' => 'alignment',
        'value'      => array(
            esc_html__( 'Inherit', 'creote-addons' ) => 'inherit' ,
            esc_html__( 'Left', 'creote-addons' ) => 'left' ,
            esc_html__( 'Right', 'creote-addons' ) => 'right' ,
            esc_html__( 'Center', 'creote-addons' ) => 'center' ,
        ),
        'group' => esc_html__('Other Settings', 'creote-addons') ,
    ),
    array(
      'type'       => 'textfield',
      'heading'    => esc_html__('View All Text', 'creote-addons'),
      'param_name' => 'view_all', 
    ),
)));
}
// shortcode
add_shortcode( 'project_filt_v1_init', 'vc_project_filt_v1' );
function vc_project_filt_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'project_filter_style' => 'style_one',
      'project_column' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12',
      'project_filter_repeater' => '',
     'stylefilter' => 'dark' ,
     'alignment' => 'center' ,
     'stylefilter' => 'text-center' ,
     'filter_enable' => '' ,
     'view_all' => '' ,
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$alignment  = $atts['alignment'];
$alignment    = ! empty( $alignment ) ? "text-align:$alignment!important;" : '';
$alignmentcss  = "style='$alignment'";
$project_filter_repeater = function_exists( 'vc_param_group_parse_atts' ) ? vc_param_group_parse_atts( $atts['project_filter_repeater'] ) : array();
ob_start();
?>
<section class="project_all filt_<?php echo esc_attr($atts['project_filter_style']); ?> <?php if($atts['filter_enable'] == 'yes'): ?> filter_enabled    <?php endif; ?>">
  <?php if($atts['filter_enable'] == 'yes'): ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="fliter_group" <?php echo __($alignmentcss); ?>>
        <ul class="project_filter <?php echo esc_attr($atts['stylefilter']); ?> clearfix">
          <li data-filter="*" class="current"><?php if(!empty($atts['view_all'])): echo esc_attr($atts['view_all']); else: echo esc_html__( 'View All' , 'creote-addons'); endif; ?></li>
          <?php if (!empty( $project_filter_repeater )) {
       foreach($project_filter_repeater as $key => $value) { ?>
          <li data-filter=".project_category-<?php echo esc_attr($value['query_category']);?>">
            <?php echo esc_attr($value['filtertitle']); ?></li>
          <?php }} ?>
        </ul>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <div class="project_container  clearfix ">
    <div class="row clearfix">
      <?php if (! empty( $project_filter_repeater)) {
       foreach ($project_filter_repeater as $key => $value ) {
        $post_count  = ! empty( $value['post_count'] ) ? $value['post_count'] : '';
        $query_orderby  = ! empty( $value['query_orderby'] ) ? $value['query_orderby'] : '';
        $query_order  = ! empty( $value['query_order'] ) ? $value['query_order'] : '';
        $query_args = array(
           'post_type' => 'project',
           'ignore_sticky_posts' => true,
           'orderby' => 'date',
           'posts_per_page' => $post_count,
           'orderby'        =>  $query_orderby,
           'order'          =>  $query_order,
        );
        if( $value['query_category'] ) $query_args['project_category'] = $value['query_category'];     
       $project_query = new \WP_Query( $query_args );
       if ($project_query->have_posts()) {
       while ($project_query->have_posts()) : $project_query->the_post(); 
       $term_list = wp_get_post_terms(get_the_id(), 'project_category', array("fields" => "names"));
       $project_meta_date =  get_post_meta( get_the_ID(), 'date_id', true );
       $project_meta_client =  get_post_meta( get_the_ID(), 'client_id', true );
       $project_information_enable =  get_post_meta( get_the_ID(), 'project_information_enable', true );
       $myexcerpt = wp_trim_words(get_the_excerpt(), $value['text_limit']);  
       $mycontent = wp_trim_words(get_the_content(), $value['text_limit']); 
       ?>
      <?php 
       if ( $atts['project_filter_style'] == 'style_one' ): ?>
      <div
        class="project-wrapper grid-item  <?php echo esc_attr($atts['project_column']); ?>    project_category-<?php echo esc_attr($value['query_category']);?>">
        <div class="project_box style_two">
          <div class="entry-thumbnail image">
            <?php echo get_the_post_thumbnail( get_the_ID(), array(370,330) ); ?>
            <div class="overlay">
              <a data-fancybox="gallery" href="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>">
                <span class="fa fa-search icon"></span>
              </a>
            </div>
          </div>
          <div class="content_inner">
            <h2><a href="<?php echo esc_url( get_the_permalink()); ?>"><?php echo get_the_title(); ?></a></h2>
            <div class="meta_value">
              <a href="#"><?php echo esc_attr($value['query_category']);?></a>
            </div>
          </div>
        </div>
      </div>
      <?php  elseif($atts['project_filter_style'] == 'style_two'):?>
      <div
        class="project-wrapper grid-item    <?php echo esc_attr($atts['project_column']); ?>  project_category-<?php echo esc_attr($value['query_category']);?>">
        <div class="project_box style_three clearfix">
          <div class="content_inner">
            <div><a href="#"><?php echo esc_attr($value['query_category']);?></a></div>
            <h2><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo get_the_title(); ?></a></h2>
            <?php if(!empty($myexcerpt)):?>
            <p class="short_desc"><?php echo  wp_kses($myexcerpt , $allowed_tags); ?></p>
            <?php elseif(!empty($mycontent)): ?>
            <p class="short_desc"><?php echo  wp_kses($mycontent , $allowed_tags); ?></p>
            <?php endif; ?>
            <a href="<?php echo esc_url( get_the_permalink() ); ?>"
              class="read_more"><?php echo esc_html('Read More' , 'creote-addons'); ?> <span
                class="icon-right-arrow-long"></a>
            <div class="share_me">
            <?php do_action('creote_get_share_options_one'); ?>
            </div>
          </div>
          <div class="image">
            <?php echo get_the_post_thumbnail( get_the_ID(), array(370,330) ); ?>
            <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="pro-link"></a>
            <div class="overlay"> </div>
            <?php if($project_information_enable == true): ?>
            <div class="text">
              <ul>
                <?php if(!empty($project_meta_date)): ?>
                <li><?php echo esc_html('Date :' , 'creote-addons'); ?>
                  <span><?php echo wp_kses($project_meta_date , $allowed_tags); ?></span></li>
                <?php endif; ?>
                <?php if(!empty($project_meta_client)): ?>
                <li>
                  <?php echo esc_html('Client :' , 'creote-addons'); ?><span><?php echo wp_kses($project_meta_client , $allowed_tags); ?></span>
                </li>
                <?php endif; ?>
              </ul>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php elseif($atts['project_filter_style'] == 'style_three' ):?>
      <div
        class="project-wrapper grid-item   <?php echo esc_attr($atts['project_column']); ?>  project_category-<?php echo esc_attr($value['query_category']);?>">
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
      <?php elseif($atts['project_filter_style'] == 'style_four' ):?>
      <div
        class="project-wrapper grid-item   <?php echo esc_attr($atts['project_column']); ?>  project_category-<?php echo esc_attr($value['query_category']);?>">
        <div class="project_post style_one style_four">
          <?php if(has_post_thumbnail()): ?>
          <div class="image">
            <?php the_post_thumbnail('creote_project_caro_image_style_one'); ?>
            <a href="<?php echo esc_url(get_permalink()); ?>" class="two"><i class="icon-right-arrow"></i></a>
          </div>
          <?php endif;?>
          <div class="project_caro_content">
            <div class="left_side">
              <p><?php echo implode( ', ', (array)$term_list );?></p>
              <?php the_title( '<h2 class="title_pro"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
            </div>
          </div>
        </div>
      </div>
      <?php elseif($atts['project_filter_style'] == 'style_five' ):?>
      <div
        class="project-wrapper grid-item   <?php echo esc_attr($atts['project_column']); ?>  project_category-<?php echo esc_attr($value['query_category']);?>">
        <div class="project_post style_one style_five">
          <?php if(has_post_thumbnail()): ?>
          <div class="image">
            <?php the_post_thumbnail('creote_project_caro_image_style_one'); ?>
            <a href="<?php echo esc_url(get_permalink()); ?>" class="two"><i class="icon-right-arrow"></i></a>
            <div class="project_caro_content">
              <div class="left_side">
                <p><?php echo implode( ', ', (array)$term_list );?></p>
                <?php the_title( '<h2 class="title_pro"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
              </div>
            </div>
          </div>
          <?php endif;?>
        </div>
      </div>
      <?php endif;
       endwhile;
        wp_reset_postdata(); }}} ?>
    </div>
  </div>
</section>
<?php
return ob_get_clean();
}