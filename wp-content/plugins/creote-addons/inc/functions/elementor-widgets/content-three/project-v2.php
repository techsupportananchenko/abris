<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_project_filter_v1_new extends Widget_Base
{
    public function get_name()
    {
        return 'creote-project-filter-v1-new';
    }
    public function get_title()
    {
        return __('Project Filter' , 'creote-addons');
    }
    public function get_icon()
    {
        return 'icon-c';
    }
    public function get_categories()
    {
        return ['104'];
    } 
    protected function register_controls()
    { 
        $this->start_controls_section(
            'project_set_content',
            [
                'label' => __('Project  Settings', 'creote-addons')
            ]
        );
        $this->add_control(
            'project_filter_style',
            [
                'label' => __('Project style', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_one'  => __('Project Style One ', 'creote-addons'),
                    'style_two' => __('Project Style Two ', 'creote-addons'),
                ],
                'default' => 'style_one',
            ]
        );
        $this->add_control(
            'project_filter_box_style',
            [
                'label' => __('Filter style', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_one'  => __('Filter Style One ', 'creote-addons'),
                    'style_two' => __('Filter Style Two ', 'creote-addons'),
                ],
                'default' => 'style_one',
            ]
        );
        $this->add_control(
            'project_filter_column',
            [
                'label' => __('Project Column', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'three_column'  => __('Project Three Column ', 'creote-addons'),
                    'two_column' => __('Project Two Column ', 'creote-addons'),
                ],
                'default' => 'three_column',
            ]
        );
        $this->add_control(
            'hide_filter_tab',
            [
                'label' => __('Filter Tab Enable / Disable', 'creote-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
          );
          $this->add_control(
            'view_all',
            [
                'label' => __('View All Text', 'creote-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('View All', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
        );
          $this->add_control(
            'orgin_right_enable',
            [
              'label' => __( 'Orgin Right Enable / Disable', 'creote-addons' ),
              'type' => Controls_Manager::SWITCHER,
              'label_on' => __( 'Show', 'creote-addons' ),
              'label_off' => __( 'Hide', 'creote-addons' ),
              'return_value' => 'yes',
              'default' => 'no',
            ]
          );
        $this->add_control(
            'pagination_enable_dis',
            [
                'label' => __('Pagination Enable / Disable', 'creote-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
          );
        $this->add_control(
            'post_count',
        [
            'label'   => esc_html__( 'Number of post', 'creote-addons' ),
            'type'    => Controls_Manager::NUMBER,
            'default' => 1,
            'min'     => 1,
            'max'     => 100,
            'step'    => 1,
         ]);
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
        $this->end_controls_section();
        $this->start_controls_section('projectfilt_box_css',
        [ 
            'label' => __('Filter Tab Css', 'creote-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
        );
        $this->add_control(
            'filter_color',
             [
                'label' => __('Filter Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .fliter_group li   ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'filter_color_bg',
             [
                'label' => __('Filter Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .fliter_group  li   ' => 'background: {{VALUE}}!important;',
                  ],
             ]
          );    
           $this->add_control(
            'filter_color_bor',
             [
                'label' => __('Filter Border Color (style-2)', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .fliter_group.style_two  li   ' => 'border-color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'filter_color_count',
             [
                'label' => __('Filter Count Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .fliter_group li span   ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'filter_color_count_bg',
             [
                'label' => __('Filter Count bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .fliter_group li span   ' => 'background: {{VALUE}}!important;',
                  ],
             ]
          );
        $this->add_control(
            'hrsvnfilt',
            [
                'type' => Controls_Manager::DIVIDER,
            ] 
        );
            $this->add_control(
                'filter_color_hover',
                 [
                    'label' => __('Filter Hover Color', 'creote-addons'),
                    'type' => Controls_Manager::COLOR,
                     'selectors' => [
                        '{{WRAPPER}} .fliter_group li:hover , {{WRAPPER}} .fliter_group li.current ' => 'color: {{VALUE}}!important;',
                      ],
                 ]
              );
            $this->add_control(
                'filter_color_hover_bg',
                 [
                    'label' => __(' Filter Hover Bg Color', 'creote-addons'),
                    'type' => Controls_Manager::COLOR,
                     'selectors' => [
                        '{{WRAPPER}} .fliter_group li:hover , {{WRAPPER}} .fliter_group li.current ' => 'background: {{VALUE}}!important;',
                      ],
                 ]
              );
              $this->add_control(
                'filter_color_bor_hover',
                 [
                    'label' => __('Filter Hover Border Color (style-2)', 'creote-addons'),
                    'type' => Controls_Manager::COLOR,
                     'selectors' => [
                        '{{WRAPPER}} .fliter_group.style_two  li:hover  , {{WRAPPER}} .fliter_group li.current   ' => 'border-color: {{VALUE}}!important;',
                      ],
                 ]
              );
              $this->add_control(
                'filter_color_count_hover',
                 [
                    'label' => __('Filter Hover Count  Color', 'creote-addons'),
                    'type' => Controls_Manager::COLOR,
                     'selectors' => [
                        '{{WRAPPER}} .fliter_group li:hover span  , {{WRAPPER}} .fliter_group li.current span ' => 'color: {{VALUE}}!important;',
                      ],
                 ]
              );
              $this->add_control(
                'filter_color_count_bg_hover',
                 [
                    'label' => __('Filter Hover Count  bg Color', 'creote-addons'),
                    'type' => Controls_Manager::COLOR,
                     'selectors' => [
                        '{{WRAPPER}} .fliter_group li:hover span   , {{WRAPPER}} .fliter_group li.current span ' => 'background: {{VALUE}}!important;',
                      ],
                 ]
              );
        $this->end_controls_section();
        $this->start_controls_section('projectcaro_box_css',
        [ 
            'label' => __('Custom Css', 'creote-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
        );
        $this->add_control(
            'project_title_color',
             [
                'label' => __('Title Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_one .content_box .content_box_inner h2 a , {{WRAPPER}} .project_box.type_two .content_box h2 a  ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
        $this->add_control(
            'project_cat_color',
             [
                'label' => __('Categoty Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_one .content_box .content_box_inner p a , .project_box.type_one .content_box .content_box_inner p  , {{WRAPPER}}  .project_box.type_two .content_box p a , .project_box.type_two .content_box .content_box_inner p ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'zoom_icon_color',
             [
                'label' => __('Zoom Icon Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_one .image_box .overlay a.zoom_button , {{WRAPPER}} .project_box.type_two .image_box a span  ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'read_more_color',
             [
                'label' => __('Read More Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_one .content_box .content_box_inner a.read_more_link  ' => 'color: {{VALUE}}!important;',
                  ],
                  'condition' => [
                    'project_style' => 'style_one',
                ]
             ]
          );
          $this->add_control(
            'read_morebg_color',
             [
                'label' => __('Read More Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_one .content_box .content_box_inner a.read_more_link ' => 'background: {{VALUE}}!important;',
                  ],
                  'condition' => [
                    'project_style' => 'style_one',
                ]
             ]
          );
          $this->add_control(
            'gradient_color',
             [
                'label' => __('Gradient Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_one .image_box:before ' => 'background-image: linear-gradient(to top, {{VALUE}}, rgba(0, 0, 30, 0))!important;',
                  ],
                  'condition' => [
                    'project_style' => 'style_one',
                ]
             ]
          );
          $this->add_control(
            'gradient_two_colors',
             [
                'label' => __('Gradient Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_two .gradient ' => 'background:linear-gradient(to bottom, {{VALUE}} 10%, rgba(0,0,0,0) 58%, rgba(0,0,0,0) 100%)!important;',
                  ],
                  'condition' => [
                    'project_style' => 'style_two', 
                ]
             ]
          );
          $this->add_control(
            'hrsvn',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
          $this->add_control(
			'projects_image_height',
			[
				'label' => esc_html__( 'Project Image Height', 'creote-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 2000,
				'step' => 1,
                'selectors' => [
                    '{{WRAPPER}} .project_box .image_box img ' => 'height: {{VALUE}}px!important;',
                ],
			]
		);
          $this->add_control(
            'hrsix',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'verlay_color',
             [
                'label' => __('Overlay Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_one .image_box .overlay:before , {{WRAPPER}} .project_box.type_two .image_box::before ' => 'background:{{VALUE}}!important;',
                  ],
             ]
          );
        $this->add_control(
            'heading_hover_color',
             [
                'label' => __('Heading Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_one .content_box h2 a:hover , {{WRAPPER}} .project_box.type_two .content_box h2 a:hover ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
        $this->add_control(
            'project_cat_hover_color',
             [
                'label' => __('Category Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_one .content_box p a:hover , {{WRAPPER}} .project_box.type_two .content_box p a:hover ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'project_zoom_color',
             [
                'label' => __('Zoom Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}  .project_box.type_one .image_box a span:hover , {{WRAPPER}}  .project_box.type_two .image_box a span:hover ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
        $this->add_control(
            'read_more_color_hover',
             [
                'label' => __('Read More Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_one .content_box .content_box_inner a.read_more_link:hover ' => 'color: {{VALUE}}!important; background-image:none;',
                  ],
                  'condition' => [
                    'project_style' => 'style_one',
                ]
             ]
          );
          $this->add_control(
            'read_more_color_bg_hover',
             [
                'label' => __('Read More Hover bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .project_box.type_one .content_box .content_box_inner a.read_more_link:hover ' => 'background: {{VALUE}}!important; background-image:none;',
                  ],
                  'condition' => [
                    'project_style' => 'style_one',
                ]
             ]
          );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        if($settings['project_filter_column'] == 'three_column'){
            $column_name = 'project-wrapper three_column_grid';
        }
        elseif($settings['project_filter_column'] == 'two_column'){
            $column_name = 'project-wrapper two_column_grid';
        }
?>
<section class="project_v1 project_tabs <?php if($settings['orgin_right_enable'] == 'yes'): ?> orgin_right_enable <?php endif; ?>"><?php if($settings['hide_filter_tab'] == 'yes'):$taxonomy = 'project_category';$terms = get_terms($taxonomy); if($terms && !is_wp_error($terms)):?> 

<div class="row"> 

<div class="col-sm-12"> 

<div class="fliter_group <?php echo esc_attr($settings['project_filter_box_style']);?> project_posts"> 
<ul class="project_filter clearfix"> 
<li data-filter="*" class="current"> <?php echo esc_html($settings['view_all']); ?></li> <?php foreach ( $terms as $term ) { ?> 
<li data-filter=".project_category-<?php echo ($term->slug); ?>"><?php echo $term->name; ?></li> <?php } ?> 
</ul> 
</div> 
</div> 
</div><?php endif;?><?php endif;?> 

<div class="projectcontainer"> 
<!--Tabs Content--> <?php if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); } elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); } else { $paged = 1; } $args = array( 'post_type' => 'project', 'ignore_sticky_posts' => true, 'paged' => $paged, 'posts_per_page' => $settings['post_count'], 'orderby' => $settings['query_orderby'], 'order' => $settings['query_order'], ); $query = new \WP_Query( $args ); if ( $query->have_posts()): while ( $query->have_posts() ) : $query->the_post(); $post_terms = wp_get_post_terms( get_the_id(), 'project_category'); $project_category = 'project_category'; $term_slug = ''; if($post_terms) foreach($post_terms as $p_term) $term_slug .= $project_category . '-' . $p_term->slug.' '; ?> <article class="project-wrapper <?php echo esc_attr($column_name); ?> <?php echo esc_attr($term_slug); ?>"> <?php if($settings['project_filter_style'] == 'style_two'):?> 

<div class="project_box type_two"> 

<div class="image_box "> <?php the_post_thumbnail(); ?> <a data-fancybox="gallery" href="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>"> 

<span class="icon-plus zoom_icon">
</span> </a> 

<div class="gradient">
</div> 
</div> 

<div class="content_box "> <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?> 
<?php $cats = get_the_terms( get_the_ID(), 'project_category' ); 
$output_cat = array(); if($cats){ 
  foreach($cats as $cat){ 
    $output_cat[] = sprintf( '<a href="%s" class="cat">%s</a>', esc_url( get_term_link( $cat->slug, 'project_category' ) ), $cat->name ); 
    } 
    } 
    if(!empty($output_cat)): ?> 

<p> <?php echo implode( ', ', $output_cat ) ?></p>
 <?php endif; ?> <a href="<?php echo esc_url(get_permalink()); ?>" class="read_more"><?php echo esc_html('Read More ' , 'creote'); ?>

<span class="flaticon-arrow">
</span></a> 
</div> 
</div> <?php else: ?> 

<div class="project_box type_one"> 

<div class="image_box "> <?php the_post_thumbnail(); ?> 

<div class="overlay"> <a data-fancybox="gallery" class="zm_btn" href="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>"> 

<span class="icon-plus zoom_icon">
</span> </a> 
</div> 
</div> 

<div class="content_box"> 

<div class="content_box_inner"> <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?> <?php $cats = get_the_terms( get_the_ID(), 'project_category' ); $output_cat = array(); if ( $cats ) { foreach ( $cats as $cat ) { $output_cat[] = sprintf( '<a href="%s" class="cat">%s</a>', esc_url( get_term_link( $cat->slug, 'project_category' ) ), $cat->name ); } } if(!empty($output_cat)): ?> 

<p> <?php echo implode( ', ', $output_cat ) ?></p> <?php endif; ?> <a href="<?php echo esc_url(get_permalink()); ?>" class="read_more_link">

<span class="icon-arrow-right">
</span></a> 
</div> 
</div> 
</div> <?php endif; ?> </article>
<!-- #post-## --> <?php endwhile; ?> <?php endif;?> <?php wp_reset_postdata(); ?> 
<!--Tabs Content--> 
</div> 
<!---/.pagination----> <?php if($settings['pagination_enable_dis'] == 'yes'):?> 

<div class="row"> 

<div class="col-lg-12"> 

<div class="pagination text-center""> <?php $pagination = 999999999; echo paginate_links( array( 'base' => str_replace( $pagination, '%#%', get_pagenum_link( $pagination ) ), 'format' => '?paged=%#%', 'current' => max(0, $paged), 'total' => $query->max_num_pages, 'prev_text' => '<i class="fa fa-angle-left"></i>', 'next_text' => '<i class="fa fa-angle-right"></i>', 'type'=>'list', 'add_args' => false ) ); ?> 
</div> 
</div> 
</div> <?php endif; ?> </section>
<?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_project_filter_v1_new());