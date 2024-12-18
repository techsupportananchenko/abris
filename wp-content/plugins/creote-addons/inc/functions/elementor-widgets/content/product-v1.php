<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_product_post_grid_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-product-post-v1';
       }
       public function get_title()
       {
           return __('Product V1' , 'creote-addons');
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
               'product_grid_content',
               [
                   'label' => __('Product  Content', 'creote-addons')
               ]
           );
           $this->add_control(
           'product_styles',
           [
                'label' => __('News Styles', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                  'style_one' => __( 'Style One', 'creote-addons' ),
                  'style_two' => __( 'Style Two', 'creote-addons' ),
                  'style_three' => __( 'Style Three', 'creote-addons' ),
                  'style_four' => __( 'Style Four', 'creote-addons' ),
   			    ],
               'default' => __('style_one' , 'creote-addons'),
             ]
           );
           $this->add_control(
               'product_column',
               [
                 'label' => __('News Column', 'creote-addons'),
                 'type' => Controls_Manager::SELECT,
                 'options' => [
                   'four_column' => __( 'Four Column', 'creote-addons' ),
                   'three_column' => __( 'Three Column', 'creote-addons' ),
                   'two_column' => __( 'Two Column', 'creote-addons' ),
                   'one_column' => __( 'One Column', 'creote-addons' ),
                   ],
                 'default' => __('three_column' , 'creote-addons'),
                 ]
           );
       $this->add_control(
           'post_count',
           [
               'label' => __('Post Count', 'creote-addons'),
               'type'    => Controls_Manager::NUMBER,
               'default' => 9,
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
                 'options' => get_product_categories(),
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
           $css_classes = '';
           if($settings['product_column'] == 'one_column') {
               $css_classes = 'one_column product_wrapper_grid';
           }
           elseif( $settings['product_column'] == 'two_column'){
               $css_classes = 'two_column product_wrapper_grid';
           } 
           elseif($settings['product_column'] == 'four_column'){
               $css_classes = 'four_column product_wrapper_grid';
           } 
           else{
            $css_classes = 'three_column product_wrapper_grid';
        } 
   ?>
<section class="product_shop_section elemen_wp <?php echo esc_attr($css_classes); ?> <?php echo esc_attr($settings['product_styles']); ?>"> <div class="full_box"> <div class="grid_show_case grid_layout clearfix"> <!-- swiper-slide --> <?php if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); } elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); } else { $paged = 1; } $args = array( 'post_type' => 'product', 'ignore_sticky_posts' => true, 'orderby' => 'date', 'paged' => $paged, 'posts_per_page' => $settings['post_count'], 'orderby' => $settings['query_orderby'], 'order' => $settings['query_order'], ); if( $settings['query_category'] ) $args['product_cat'] = $settings['query_category']; $product_grid_query = new \WP_Query( $args ); ?> <?php while ($product_grid_query->have_posts()) : ?> <?php $product_grid_query->the_post(); global $product; // Ensure visibility. if ( empty( $product ) || ! $product->is_visible() ) { return; } ?> <?php if($settings['product_styles'] == 'style_two'): ?> <div <?php wc_product_class( 'project-wrapper grid_box', $product ); ?>> <div class="product_box type_two"> <div class="inner_box"> <?php woocommerce_show_product_sale_flash(); ?> <div class="image_box"> <?php woocommerce_template_loop_product_thumbnail()?> <div class="cart_btn"> <?php woocommerce_template_loop_add_to_cart(); ?> </div> </div> <div class="overlay"> <ul> <li class="upper_box"> <a href="<?php echo esc_attr($product->get_id()); ?>" class="creote_quick_view_btn"> <i class="icon-eye"></i> </a> </li> <?php if(class_exists('YITH_WCWL')): ?> <li class="whish_list_box"> <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?> </li> <?php endif; ?> </ul> </div> </div> <div class="content_box"> <?php creote_get_current_product_category(); ?> <h2><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h2> <div class="rating_price"> <?php creote_get_star_rating(); ?> <?php woocommerce_template_loop_price(); ?> </div> </div> </div> </div> <?php elseif($settings['product_styles'] == 'style_three'): ?> <div <?php wc_product_class( 'project-wrapper grid_box', $product ); ?>> <div class="product_box type_three"> <div class="inner_box"> <?php woocommerce_show_product_sale_flash(); ?> <div class="image_box"> <?php woocommerce_template_loop_product_thumbnail()?> <div class="quick_vide_btn"> <div class="cart_btn"> <a href="<?php echo esc_attr($product->get_id()); ?>" class="creote_quick_view_btn"> <?php echo esc_html__('Quick View' , 'creote-addons') ?> </a> <?php woocommerce_template_loop_add_to_cart(); ?> </div> </div> </div> <div class="content_box"> <h2><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h2> <div class="rating_price"> <?php woocommerce_template_loop_price(); ?> </div> </div> </div> </div> </div> <?php elseif($settings['product_styles'] == 'style_four'): ?> <div <?php wc_product_class( 'project-wrapper grid_box', $product ); ?>> <div class="product_box type_four"> <div class="inner_box"> <div class="image_box"> <?php woocommerce_template_loop_product_thumbnail()?> <div class="overlay"> <div class="zoom_btn"> <a href="<?php echo esc_attr($product->get_id()); ?>" class="creote_quick_view_btn"> <i class="icon-eye"></i> </a> </div> <div class="cart_btn"> <?php creote_add_to_cart_button_woocommerce(); ?> </div> </div> </div> <div class="content_box"> <?php woocommerce_template_loop_price(); ?> <h2><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h2> </div> </div> </div> </div> <?php else: ?> <div <?php wc_product_class( 'project-wrapper grid_box', $product ); ?>> <div class="product_box type_one"> <div class="inner_box"> <?php woocommerce_show_product_sale_flash(); ?> <div class="image_box"> <?php woocommerce_template_loop_product_thumbnail()?> </div> <div class="labels"> <?php creote_wc_template_loop_stock(); ?> </div> <div class="overlay"> <ul> <li class="upper_box"> <a href="<?php echo esc_attr($product->get_id()); ?>" class="creote_quick_view_btn"> <i class="icon-eye"></i> </a> </li> <?php if(class_exists('YITH_WCWL')): ?> <li class="whish_list_box"> <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?> </li> <?php endif; ?> </ul> </div> </div> <div class="content_box"> <?php creote_get_current_product_category(); ?> <h2><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h2> <div class="product_attributes"> <?php echo esc_html(creote_attribute_links()); ?> </div> <div class="rating_price"> <?php woocommerce_template_loop_price(); ?> <?php creote_get_star_rating(); ?> </div> <div class="cart_btn"> <a href="<?php echo esc_attr($product->get_id()); ?>" class="creote_quick_view_btn"> <?php echo esc_html__('Quick View' , 'creote-addons') ?> </a> <?php woocommerce_template_loop_add_to_cart(); ?> </div> </div> </div> </div> <?php endif; ?> <?php endwhile; ?> <?php wp_reset_postdata(); ?> </div> <?php if($settings['pagination_enable'] == true):?> <div class="row"> <div class="col-lg-12"> <div class="pagination text-center"> <?php global $wp_query; $product_grid_query = !empty($product_grid_query) ? $product_grid_query : $wp_query; if ($product_grid_query->max_num_pages > 1) { $pagination = 999999999; $items = paginate_links( array( 'base' => str_replace($pagination, '%#%', esc_url(get_pagenum_link($pagination))), 'format' => '?paged=%#%', 'prev_next' => TRUE, 'current' => max(0, $paged), 'total' => $product_grid_query->max_num_pages, 'type' => 'array', 'prev_text' => '<i class="fa fa-angle-left"></i>', 'next_text' => '<i class="fa fa-angle-right"></i>', 'add_args' => false ) ); $pagination_output = "<div class=\"col-sm-12 text-center\"><div class=\"ic-pagination\"><ul><li>"; $pagination_output .= join("</li><li>", (array)$items); $pagination_output .= "</li></ul></div></div>"; echo $pagination_output; } ?> </div> </div> </div> <?php endif; ?> </div></section>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_product_post_grid_v1());