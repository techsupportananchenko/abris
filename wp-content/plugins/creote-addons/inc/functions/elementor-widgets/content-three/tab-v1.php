<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_tab_v1_new extends Widget_Base
{
    public function get_name()
    {
        return 'creote-tab-v1-new';
    }
    public function get_title()
    {
        return __('Tabs V1' , 'creote-addons');
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
            'tabs_set_content',
            [
                'label' => __('Tab  Settings', 'creote-addons')
            ]
        );
        $this->add_control(
            'tab_box_style',
            [
                'label' => __('Team Style', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'type_one'  => __('Tab Style One', 'creote-addons'),
                    'type_two'  => __('Tab  Style Two', 'creote-addons'),
                ],
                'default' => 'type_one',
            ]
          );
          $this->add_control(
            'tag_type',
            [
            'label' => __('Title Tag', 'luxride-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'div' => __( 'Div Tag', 'luxride-addons' ),
                'h1' => __( 'H1 Tag', 'luxride-addons' ),
                'h2' => __( 'H2 Tag', 'luxride-addons' ),
                'h3' => __( 'H3 Tag', 'luxride-addons' ),
                'h4' => __( 'H4 Tag', 'luxride-addons' ),
                'h5' => __( 'H5 Tag', 'luxride-addons' ),
                'h6' => __( 'H6 Tag', 'luxride-addons' ),
            ],
            'default' => 'h2' , 
            ]
        ); 
        $this->end_controls_section();
        $this->start_controls_section(
            'tabs_settings_content',
            [
                'label' => __('tabs Content Box', 'creote-addons')
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
			'tab_id',
			[
				'label'       => esc_html__( 'Tab Id Without gap', 'creote-addons' ),
				'type'        => Controls_Manager::TEXT,
                'default' =>  esc_html__( 'tabone' , 'creote-addons'),
			]
		);
        $repeater->add_control(
			'tab_title',
			[
				'label'       => esc_html__( 'Tab Title', 'creote-addons' ),
				'type'        => Controls_Manager::TEXT,
                'default' =>  esc_html__( 'Title' , 'creote-addons'),
			]
        );
        $repeater->add_control(
            'hssoemtw',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
          );
          $repeater->add_control(
			'heading',
			[
				'label'       => esc_html__( 'Heading', 'creote-addons' ),
				'type'        => Controls_Manager::TEXTAREA,
                'default' =>  esc_html__( 'Ultricies ultricies nunc, elit a bibendum malesuada cursus fringilla. Laoreet pellentesque sit pellentesque id.' , 'creote-addons'),
			]
        );
        $repeater->add_control(
			'description',
			[
				'label'       => esc_html__( 'Description', 'creote-addons' ),
				'type'        => Controls_Manager::TEXTAREA,
                'default' =>  esc_html__( 'When our power of choice is untrammelled and when nothing prevents our being able to do what we like best' , 'creote-addons'),
			]
        );
        $repeater->add_control(
            'tab_imagenable',
            [
                'label' => __('Image Enable', 'creote-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
          );
        $repeater->add_control(
            'tab_image',
            [
                'label' => __('Image', 'creote-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                  ],
                  'condition' => [
                    'tab_imagenable' => 'yes',
                ]
            ]
        );
        $repeater->add_control(
            'read_more_enable',
           [
              'label' => __('Read More Enable', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'yes',
           ]
        );
        $repeater->add_control(
            'read_more_btn',
            [
                'label' => __('Read More', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __('Read More', 'creote-addons'),
                'default' => __('Read More' , 'creote-addons'),
                'condition' => [
                    'read_more_enable' => 'yes',
                ]
            ]
        );
        $repeater->add_control(
            'link',
        [ 
            'label' => __('Link', 'creote-addons'),
            'type' => Controls_Manager::URL,
            'placeholder' => __('https://your-link.com', 'creote-addons'),
            'show_external' => true,
            'default' => [
                'url' => '#',
                'is_external' => true,
                'nofollow' => true,
            ],
        ]);
        $this->add_control(
            'tabs_content_v1_repeater',
            [
                'label' => __('tabs Content Repeater', 'creote-addons'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tab_id' =>  esc_html__( 'tabone' , 'creote-addons'),
                        'tab_title' =>  esc_html__('Title' , 'creote-addons'),
                        'heading' => esc_html__('Ultricies ultricies nunc, elit a bibendum malesuada cursus fringilla. Laoreet pellentesque sit pellentesque id.' , 'creote-addons'),
                    ],
                    [
                        'tab_id' =>  esc_html__( 'tabtwo' , 'creote-addons'),
                        'tab_title' =>  esc_html__('Title Two' , 'creote-addons'),
                        'heading' =>  esc_html__('Ultricies ultricies nunc, elit a bibendum malesuada cursus fringilla. Laoreet pellentesque sit pellentesque id.' , 'creote-addons'),
                    ],
                ],
                'title_field' => '{{{ tab_title }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section('tabs_box_css',
        [ 
            'label' => __('Custom Css', 'creote-addons') ,
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
        );
        $this->add_control(
            'tabs_list_color',
             [
                'label' => __('Tab  Title Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tabs_all_box_two .content_tabs_btns li ' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
        $this->add_control(
            'tabs_cart_color',
             [
                'label' => __('Tab  Title Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tabs_all_box_two .content_tabs_btns li ' => 'background: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'hronetabac',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
          $this->add_control(
            'tabs_cart_color_active_hover',
             [
                'label' => __('Tab Hover Title  Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tabs_all_box_two .content_tabs_btns li:hover , {{WRAPPER}} .tabs_all_box_two .content_tabs_btns li.active-btn ' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'tabs_cart_color_activebg_hover',
             [
                'label' => __('Tab Hover Title Bg  Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tabs_all_box_two .content_tabs_btns li:hover , {{WRAPPER}} .tabs_all_box_two .content_tabs_btns li.active-btn ' => 'background: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'hronetabace',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'tbcontent_bg_color',
             [
                'label' => __('Tab box Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tab_box .tab_inner_box ' => 'background: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'tbcontent_bor_color',
             [
                'label' => __('Tab box Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tab_box .tab_inner_box  ' => 'border-color: {{VALUE}}!important;',
                ],
             ]
          );
        $this->add_control(
            'tbcontent_heading_color',
             [
                'label' => __('Tab box Title Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .c_tab_wrapper h2 a ' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'tabs_price_color',
             [
                'label' => __('Tab box Description Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .c_tab_wrapper p ' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
        $this->add_control(
            'reda_m_color',
             [
                'label' => __('Read more Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .c_tab_wrapper .read_more ' => 'color: {{VALUE}}!important;',
                ],
             ]
          ); 
        $this->end_controls_section();
    }
protected function render(){
    $settings = $this->get_settings_for_display();
    $allowed_tags = wp_kses_allowed_html('post');
?>
 
 <section class="tabs_all_box_two content_tabs <?php echo esc_attr($settings['tab_box_style']); ?>">
    <div class="row">
        <div class="col-lg-12">
            <div class="tabs_header clearfix">
                <ul class="content_tabs_btns text-left clearfix">
                    <?php foreach($settings['tabs_content_v1_repeater'] as $key => $tabs_block_one): ?>
                        <li class="c_tab_btn <?php if($key == 0) echo 'active-btn'; ?>" data-tab="#tab_<?php echo esc_attr($tabs_block_one['tab_id']); ?>">
                            <?php echo esc_html($tabs_block_one['tab_title']); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="c_tab_wrapper">
                <div class="c_tabs_content">
                    <?php foreach($settings['tabs_content_v1_repeater'] as $key => $tabs_block_one):
                        $target1 = $tabs_block_one['link']['is_external'] ? ' target="_blank"' : '';
                        $nofollow1 = $tabs_block_one['link']['nofollow'] ? ' rel="nofollow"' : '';
                    ?>
                        <div class="c_tab <?php if($key == 0) echo 'active-tab'; ?>" id="tab_<?php echo esc_attr($tabs_block_one['tab_id']); ?>">
                            <?php if($settings['tab_box_style'] == 'type_two'): ?>
                                <div class="tab_box type_two">
                                    <div class="tab_inner_box">
                                        <?php if($tabs_block_one['tab_imagenable'] == 'yes'):
                                            $tab_image = isset($tabs_block_one['tab_image']['alt']) ? $tabs_block_one['tab_image']['alt'] : 'image'; ?>
                                            <div class="image_box">
                                                <img src="<?php echo esc_url($tabs_block_one['tab_image']['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($tab_image); ?>">
                                            </div>
                                        <?php endif; ?>
                                        <?php if(!empty($tabs_block_one['heading'])): ?>
                                            <<?php echo esc_attr($settings['tag_type']); ?> class="tabtitle">
                                                <a <?php echo esc_attr($target1); ?> <?php echo esc_attr($nofollow1); ?> href="<?php echo esc_url($tabs_block_one['link']['url']); ?>">
                                                    <?php echo esc_attr($tabs_block_one['heading']); ?>
                                                </a>
                                            </<?php echo esc_attr($settings['tag_type']); ?>>
                                        <?php endif; ?>
                                        <?php if(!empty($tabs_block_one['description'])): ?>
                                            <p><?php echo wp_kses($tabs_block_one['description'], $allowed_tags); ?></p>
                                        <?php endif; ?>
                                        <?php if($tabs_block_one['read_more_enable'] == 'yes' && !empty($tabs_block_one['read_more_btn'])): ?>
                                            <a href="<?php echo esc_url($tabs_block_one['link']['url']); ?>" <?php echo esc_attr($target1); ?> <?php echo esc_attr($nofollow1); ?> class="read_more type_one">
                                                <?php echo esc_attr($tabs_block_one['read_more_btn']); ?>
                                                <span class="icon-arrow-right"></span>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="tab_box type_one">
                                    <div class="tab_inner_box">
                                        <?php if(!empty($tabs_block_one['heading'])): ?>
                                            <<?php echo esc_attr($settings['tag_type']); ?> class="tabtitle">
                                                <a <?php echo esc_attr($target1); ?> <?php echo esc_attr($nofollow1); ?> href="<?php echo esc_url($tabs_block_one['link']['url']); ?>">
                                                    <?php echo esc_attr($tabs_block_one['heading']); ?>
                                                </a>
                                            </<?php echo esc_attr($settings['tag_type']); ?>>
                                        <?php endif; ?>
                                        <?php if(!empty($tabs_block_one['description'])): ?>
                                            <p><?php echo wp_kses($tabs_block_one['description'], $allowed_tags); ?></p>
                                        <?php endif; ?>
                                        <?php if($tabs_block_one['tab_imagenable'] == 'yes'):
                                            $tab_image = isset($tabs_block_one['tab_image']['alt']) ? $tabs_block_one['tab_image']['alt'] : 'image'; ?>
                                            <div class="image_box">
                                                <img src="<?php echo esc_url($tabs_block_one['tab_image']['url']); ?>" class="img-fluid                                                 alt="<?php echo esc_attr($tab_image); ?>">
                                            </div>
                                        <?php endif; ?>
                                        <?php if($tabs_block_one['read_more_enable'] == 'yes' && !empty($tabs_block_one['read_more_btn'])): ?>
                                            <a href="<?php echo esc_url($tabs_block_one['link']['url']); ?>" <?php echo esc_attr($target1); ?> <?php echo esc_attr($nofollow1); ?> class="read_more type_one">
                                                <?php echo esc_attr($tabs_block_one['read_more_btn']); ?>
                                                <span class="icon-arrow-right"></span>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>


 <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_tab_v1_new());