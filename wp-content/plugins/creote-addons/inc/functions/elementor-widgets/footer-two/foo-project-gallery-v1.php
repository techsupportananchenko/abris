<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_foo_project_gallery_v1_new extends Widget_Base
{
    public function get_name()
    {
        return 'creote-foo-project-gallery-v1-news';
    }
    public function get_title()
    {
        return __('Footer Project Gallery V1' , 'creote-addons');
    }
    public function get_icon()
    {
        return 'eicon-gallery-group';
    }
    public function get_categories()
    {
        return ['105'];
    }
    protected function register_controls()
    {
        $this->start_controls_section(
            'foo_project_settings',
            [
                'label' => __('Project Settings', 'creote-addons')
            ]
        );
        $this->add_control(
            'post_count',
            [
                'label'   => esc_html__( 'Number of post', 'creote-addons' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 3,
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
		$this->add_control(
            'query_category', 
				[
				  'type' => Controls_Manager::SELECT,
				  'label' => esc_html__('Category', 'creote-addons'),
				  'options' => get_project_categories(),
				]
        );
        $this->end_controls_section();
        $this->start_controls_section('projectcaro_box_css',
        [ 
            'label' => __('Custom Css', 'creote-addons') ,
            'tab' => Controls_Manager::TAB_STYLE,
        ]
        );
        $this->add_control(
            'overlay_background',
             [
                'label' => __('Overlay Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR, 
                'selectors' => [
                    '{{WRAPPER}} .gallery_foot .gallery_foot_inner .image a  ' => 'background: {{VALUE}}!important;',
                ],
            ]
        );
        $this->add_control(
            'overlay_icon_color',
             [
                'label' => __('Overlay Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR, 
                'selectors' => [
                    '{{WRAPPER}} .gallery_foot .gallery_foot_inner .image a span ' => 'color: {{VALUE}}!important;',
                ],
            ]
        );
        $this->end_controls_section();
    }
    protected function render(){
        $settings = $this->get_settings_for_display();
?>
<div class="gallery_foot clearfix"><?php $args = array( 'post_type' => 'projects', 'ignore_sticky_posts' => true, 'posts_per_page' => $settings['post_count'], 'orderby' => $settings['query_orderby'], 'order' => $settings['query_order'], );if( $settings['query_category'] ) $args['project_category'] = $settings['query_category'];$project_query = new \WP_Query( $args ); ?><?php while ($project_query->have_posts()) : ?><?php $project_query->the_post(); ?> <div class="gallery_foot_inner"> <div class="image"> <?php the_post_thumbnail( array(70,70) ); ?> <a href="<?php the_permalink(); ?>"><span class="fa fa-paperclip"></span></a> </div> </div><?php endwhile; ?><?php wp_reset_postdata(); ?></div>
<?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_foo_project_gallery_v1_new());