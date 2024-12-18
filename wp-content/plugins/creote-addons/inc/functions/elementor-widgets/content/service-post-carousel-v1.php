<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_service_carousel_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-service-carousel-v1';
       }
       public function get_title()
       {
           return __('Service Carousel V1' , 'creote-addons');
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
               'service_carousel_content',
               [
                   'label' => __('Service  Content', 'creote-addons')
               ]
           );
       $this->add_control(
           'post_count',
           [
               'label' => __('Post Count', 'creote-addons'),
               'type'    => Controls_Manager::NUMBER,
               'default' => 3,
               'min'     => 1,
               'max'     => 1000,
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
                 'options' => get_service_categories(),
               ]
       );
       $this->end_controls_section();
       $this->start_controls_section('ex_css',
       [ 
           'label' => __('Custom Css', 'creote-addons'),
           'tab' =>Controls_Manager::TAB_STYLE,
       ]
       );
       $this->add_control(
         'ovlocor',
          [
             'label' => __('Overlay  Color', 'creote-addons'),
             'type' => Controls_Manager::COLOR,
             'selectors' => [
                 '{{WRAPPER}} .service_carousel.style_one .image .overlay ' => 'background: linear-gradient(0deg, {{VALUE}} 30%, rgba(0, 0, 0, 0) 70%);',
             ],
          ]
        );
        $this->add_control(
            'ibcolor',
             [
                'label' => __('Icon Bg  Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_carousel.style_one .content .icon_box span' => 'background: {{VALUE}};',
                ],
             ]
        );
        $this->add_control(
            'icolor',
             [
                'label' => __('Icon Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_carousel.style_one .content .icon_box span' => 'color: {{VALUE}};',
                ],
             ]
        );
        $this->add_control(
            'tcolor',
             [
                'label' => __('Title Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_carousel.style_one .content h2 a ' => 'color: {{VALUE}};',
                ],
             ]
        ); 
    $this->end_controls_section();
}
protected function render(){
    $settings = $this->get_settings_for_display();
    $allowed_tags = wp_kses_allowed_html('post');
?>
<section class="service_caro_section carousel"> <div class="swiper-container swipe_four_nocenter"> <div class="swiper-wrapper"> <!-- swiper-slide --> <?php $args = array( 'post_type' => 'service', 'ignore_sticky_posts' => true, 'orderby' => 'date', 'posts_per_page' => $settings['post_count'], 'orderby' => $settings['query_orderby'], 'order' => $settings['query_order'], ); if( $settings['query_category'] ) $args['service_category'] = $settings['query_category']; $service_caro_query = new \WP_Query( $args ); ?> <?php while ($service_caro_query->have_posts()) : ?> <?php $service_caro_query->the_post(); $service_icon = get_post_meta( get_the_ID(), 'service_icon', true ); $service_icon_images = rwmb_meta( 'service_icon_image', array( 'size' => 'thumbnail' ) ); // style one ?> <div class="swiper-slide"> <div class="service_carousel style_one"> <?php if(has_post_thumbnail()): ?> <div class="image"> <div class="overlay"></div> <?php the_post_thumbnail('creote-service-image'); ?> </div> <?php endif;?> <div class="content"> <?php if(!empty($service_icon)): ?> <div class="icon_box"> <span class="<?php echo esc_attr($service_icon); ?> icon"></span> </div> <?php elseif(!empty($service_icon_images)): foreach($service_icon_images as $service_icon_image ):?> <div class="icon_box"> <img src="<?php echo esc_url($service_icon_image['url']); ?>"> </div> <?php endforeach; ?> <?php endif; ?> <?php the_title('<h2 class="title_service"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?> </div> </div> </div> <?php endwhile; ?> <?php wp_reset_postdata(); ?> </div> <div class="p_pagination"> <div class="swiper-pagination"></div> </div> </div></section>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_service_carousel_v1());