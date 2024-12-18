<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_footer_recentnews_v1 extends Widget_Base
{
    public function get_name()
    {
        return 'creote-footer-recent-news-v1';
    }
    public function get_title()
    {
        return __('Footer Recent News  V1' , 'creote-addons');
    }
    public function get_icon()
    {
        return 'eicon-number-field';
    }
    public function get_categories()
    {
        return ['105'];
    }
    protected function register_controls(){
        $this->start_controls_section('news_settings_v1',
        [ 
            'label' => __('News Settings', 'creote-addons')
        ]
        );
        $this->add_control(
            'news_style',
            [
                'label' => __('News Style', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'type_one' => __('Style one', 'creote-addons'),
                    'type_two' => __('Style Two', 'creote-addons'),
                ],
                'default' => 'type_one',
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
        $this->end_controls_section();
        $this->start_controls_section('recent_foo_csss',
        [ 
            'label' => __('Custom Css ', 'creote-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Title Typo', 'creote-addons' ),
				'name' => 'title_typo',
				'selector' => '{{WRAPPER}} .foo_news_recent_box .news_recent .content_box h2 a , {{WRAPPER}} .foo_news_recent_box .news_recent.style_two li a ',
			]
		);
        $this->add_control(
            'title_text_olor',
             [
                'label' => __('Title Text Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .foo_news_recent_box .news_recent .content_box h2 a , {{WRAPPER}} .foo_news_recent_box .news_recent.style_two li a  , {{WRAPPER}} .foo_news_recent_box .news_recent.style_two li a:before ' => 'color: {{VALUE}}!important',
				], 
             ]
        );
        $this->add_control(
            'hotitle_text_olor',
             [
                'label' => __('Title Text Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .foo_news_recent_box .news_recent.style_one .content_box h2 a:hover , {{WRAPPER}} .foo_news_recent_box .news_recent.style_two li a:hover ' => 'color: {{VALUE}}!important',
				], 
             ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Date Typo', 'creote-addons' ),
				'name' => 'content_typo',
				'selector' => '{{WRAPPER}} .foo_news_recent_box .news_recent  .post-date ',
			]
		);
        $this->add_control(
            'content_icon_color',
             [
                'label' => __('Date Icon Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .foo_news_recent_box .news_recent  .post-date span , {{WRAPPER}} .foo_news_recent_box .news_recent  .post-date i ' => 'color: {{VALUE}}!important',
				], 
             ]
        );
        $this->add_control(
            'content_text_color',
             [
                'label' => __('Date Text Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .foo_news_recent_box .news_recent  .post-date ' => 'color: {{VALUE}}!important',
				], 
             ]
        );
        $this->add_control(
            'title_border_olor',
             [
                'label' => __('News Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .foo_news_recent_box .news_recent.style_one ' => 'border-bottom-color: {{VALUE}}!important',
				], 
                'condition' => [
                    'news_style' => 'type_one',
                ]
             ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
        ?>
<div class="foo_news_recent_box"> <?php $args = array( 'post_type' => 'post', 'ignore_sticky_posts' => true, 'orderby' => 'date', 'posts_per_page' => $settings['post_count'], 'orderby' => $settings['query_orderby'], 'order' => $settings['query_order'], ); if( $settings['query_category'] ) $args['category_name'] = $settings['query_category']; $blog_query = new \WP_Query( $args ); ?> <?php while ($blog_query->have_posts()) : ?> <?php $blog_query->the_post(); ?> <?php if($settings['news_style'] == 'type_two') : ?> <ul class="news_recent style_two"> <li> <?php the_title('<a href="' . esc_url(get_permalink()) . '">', '</a>' ); ?> <span class="post-date"><i class="flaticon-calendar"></i><?php echo get_the_date(get_option('date_format')); ?></span> </li> </ul> <?php else: ?> <div class="news_recent clearfix style_one"> <?php if(has_post_thumbnail()): ?> <div class="image_box"> <?php the_post_thumbnail(); ?> </div> <?php endif; ?> <div class="content_box"> <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?> <p class="post-date"><span class="flaticon-calendar"></span><?php echo esc_attr(get_the_date(get_option('date_format'))); ?> </p> </div> </div> <?php endif;?> <?php endwhile; ?> <?php wp_reset_postdata(); ?></div>
<?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_footer_recentnews_v1());