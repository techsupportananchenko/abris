<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_job_post_grid_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-job-post-v1';
       }
       public function get_title()
       {
           return __('Job Post V1' , 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['103'];
       }
       protected function register_controls()
       {
           $this->start_controls_section(
               'job_post_grid_content',
               [
                   'label' => __('Job  Content', 'creote-addons')
               ]
           );
           $this->add_control(
            'column_settings',
            [
              'label' => __('Column', 'creote-addons'),
              'type' => Controls_Manager::SELECT,
              'options' => [
                'col-lg-12' => __( '1 Column', 'creote-addons' ),
                'col-lg-6 col-md-6 col-sm-12' => __( '2 Column', 'creote-addons' ),
                ],
              'default' => __('col-lg-12' , 'creote-addons'),
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
           'query_category', 
               [
                 'type' => Controls_Manager::SELECT,
                 'label' => esc_html__('Category', 'creote-addons'),
                 'options' => get_blog_categories(),
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
protected function render(){
    $settings = $this->get_settings_for_display();
    $allowed_tags = wp_kses_allowed_html('post');
    $image_size = 'creote-full-width';
 ?>
<section class="job_post_section elemen_wp"> <div class="row"> <!-- swiper-slide --> <?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; $args = array( 'post_type' => 'job_listing', 'ignore_sticky_posts' => true, 'orderby' => 'date', 'paged' => $paged, 'posts_per_page' => $settings['post_count'], 'orderby' => $settings['query_orderby'], 'order' => $settings['query_order'], ); if( $settings['query_category'] ) $args['category_name'] = $settings['query_category']; $job_grid_query = new \WP_Query( $args ); ?> <?php while ($job_grid_query->have_posts()) : ?> <?php $job_grid_query->the_post(); ?> <div class="<?php echo esc_attr($settings['column_settings']); ?>"> <div class="job_grid_box"> <a href="<?php the_job_permalink(); ?>"> <div class="inner_bx <?php if(has_post_thumbnail()): ?>has_images<?php else: ?>no_images<?php endif; ?>" id="post-<?php esc_attr(the_ID()); ?>"> <div class="logo_bx"><?php the_company_logo(); ?> </div> <div class="content_bx"><div class="position"><h3><?php wpjm_the_job_title(); ?></h3><div class="company"><?php the_company_name( '<strong>', '</strong> ' ); ?><?php the_company_tagline( '<span class="tagline">', '</span>' ); ?></div></div><ul class="meta"> <li><?php the_job_location( false ); ?></li><?php do_action( 'job_listing_meta_start' ); ?><?php if ( get_option( 'job_manager_enable_types' ) ) { ?><?php $types = wpjm_get_the_job_types(); ?><?php if ( ! empty( $types ) ) : foreach ( $types as $type ) : ?><li class="job-type <?php echo esc_attr( sanitize_title( $type->slug ) ); ?>"><?php echo esc_html( $type->name ); ?></li><?php endforeach; endif; ?><?php } ?><li class="date"><?php the_job_publish_date(); ?></li><?php do_action( 'job_listing_meta_end' ); ?></ul> </div> </div> </a> </div> </div> <?php endwhile; ?> <?php wp_reset_postdata(); ?> </div> <?php if($settings['pagination_enable'] == true):?> <div class="row"> <div class="col-lg-12"> <div class="pagination"> <?php $pagination = 999999999; echo paginate_links( array( 'base' => str_replace( $pagination, '%#%', get_pagenum_link( $pagination ) ), 'format' => '?paged=%#%', 'current' => max( 1, get_query_var('paged') ), 'total' => $job_grid_query->max_num_pages, 'prev_text' => '<i class="fa fa-angle-left"></i>', 'next_text' => '<i class="fa fa-angle-right"></i>', 'type'=>'list', 'add_args' => false ) ); ?> </div> </div> </div> <?php endif; ?> </section>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_job_post_grid_v1());