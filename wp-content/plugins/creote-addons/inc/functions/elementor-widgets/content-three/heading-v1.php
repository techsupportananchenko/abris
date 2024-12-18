<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_heading_v2 extends Widget_Base
{
    public function get_name()
    {
        return 'creote-heading-v2';
    }
    public function get_title()
    {
        return __('Title V2', 'creote-addons');
    }
    public function get_icon()
    {
        return 'icon-c';
    }
    public function get_categories()
    {
        return ['104'];
    }
    protected function register_controls(){
        $this->start_controls_section('heading_content',
        [ 
            'label' => __('Heading Content', 'creote-addons')
        ]
        );
        $this->add_control(
            'headings_types',
            [
                'label' => __('Heading Type', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'type_one' => __( 'Heading Style One', 'creote-addons' ),
                    'type_two' => __( 'Heading Style Two', 'creote-addons' ),
				],
                'default' => 'type_one',
            ]
        );
        $this->add_control(
            'title_tag',
            [
                'label' => __('Main Title Tag', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'div' => __( 'Div Tag', 'creote-addons' ),
                    'h1' => __( 'H1 Tag', 'creote-addons' ),
                    'h2' => __( 'H2 Tag', 'creote-addons' ),  
                    'h3' => __( 'H3 Tag', 'creote-addons' ),    
                    'h4' => __( 'H4 Tag', 'creote-addons' ), 
                    'h5' => __( 'H5 Tag', 'creote-addons' ),
                    'h6' => __( 'H6 Tag', 'creote-addons' ),
               ],
                'default' => __('div' , 'creote-addons'),
            ]
        );
        $this->add_control(
            'heading_small_text',
            [
                'label' => __('Small Heading Text', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
           );
        $this->add_control(
            'heading_main_text',
            [
                'label' => __('Heading Text', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
           );
        $this->add_control(
            'heading_decription',
        [
            'label' => __('Description Text', 'creote-addons'),
            'type' => Controls_Manager::TEXTAREA,
            'placeholder' => __('Type your text here', 'creote-addons'),
        ]
        );
        $this->add_control(
            'heading_icon',
            [
                'label' => __('Icon', 'creote-addons'),
                'type' => Controls_Manager::ICON,
                'options' => get_creote_icon(),
                'default' => __('' , 'creote-addons'),
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section('heading_css',
        [ 
            'label' => __('Heading Css ', 'creote-addons') ,
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
        );
        $this->add_control(
            'heading_text_alignment',
            [
                'label' => __('Heading Alignment', 'creote-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'text_left' => [
                        'title' => __('Text Left', 'creote-addons'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'text_center' => [
                        'title' => __('Text Center', 'creote-addons'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'text_right' => [
                        'title' => __('Text Right', 'creote-addons'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'text_left',
                'toggle' => true,
            ]
        );
        $this->add_control(
            'one',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Higlight Text Typography', 'creote-addons' ),
				'name' => 'higlight_typo',
				'selector' => '{{WRAPPER}} .small_text',
			]
		);
        $this->add_control(
            'small_text_padding',
             [
                'label' => __('Highlight Text Padding', 'creote-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                 'selectors' => [
                    '{{WRAPPER}}  .small_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
				'size_units' => [ 'px', 'em', '%' ],
                'placeholder' => __('0px', 'creote-addons'),
             ]
        );
        $this->add_control(
            'higlight_text_color',
             [
                'label' => __('Small Heading Text Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .small_text' => 'color: {{VALUE}}!important',
				],
             ]
          );
          $this->add_control(
            'higlight_text_color_twos',
             [
                'label' => __('Small Heading Text Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .small_text_sub' => '-webkit-text-stroke: 1px {{VALUE}}!important',
				],
                'condition' => [
                    'headings_types' => 'type_two' 
                ]
             ]
          );
          $this->add_control(
            'two',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Heading Text Typography', 'creote-addons' ),
				'name' => 'heading_typo',
				'selector' => '{{WRAPPER}} .heading_text',
			]
		);
        $this->add_control(
            'heading_padding',
             [
                'label' => __('Heading Padding', 'creote-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                 'selectors' => [
                    '{{WRAPPER}}  .heading_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
				'size_units' => [ 'px', 'em', '%' ],
                'placeholder' => __('0px', 'creote-addons'),
             ]
        );
          $this->add_control(
            'heading_text_color',
             [
                'label' => __('Heading Text Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .heading_text' => 'color: {{VALUE}}!important',
				],
             ]
          );
          $this->add_control(
            'three',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Description Text Typography', 'creote-addons' ),
				'name' => 'description_typo',
				'selector' => '{{WRAPPER}} .description_text',
			]
		);
          $this->add_control(
            'description_text_color',
             [
                'label' => __('Description Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .description_text' => 'color: {{VALUE}}!important',
				],
             ]
          );
        $this->add_control(
            'description_padding',
             [
                'label' => __('Description Padding', 'creote-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                 'selectors' => [
                    '{{WRAPPER}}  .description_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'size_units' => [ 'px', 'em', '%' ],
                'placeholder' => __('0px', 'creote-addons'),
             ]
          );
          $this->add_control(
            'four',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
          $this->add_control(
            'icon_text_color',
             [
                'label' => __('Icon Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .icon' => 'color: {{VALUE}}!important',
				],
             ]
          );
          $this->add_control(
            'heading_two_small_color',
             [
                'label' => __('Heading Type two Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .heading.type_two small' => 'border-color: {{VALUE}}!important',
				],
             ]
          );
          $this->add_control(
            'heading_two_small_dot_color',
             [
                'label' => __('Heading Type two Dot Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .heading.type_two small::after' => 'background-color: {{VALUE}}!important',
				],
             ]
          );
        $this->end_controls_section();
    }
protected function render(){
    $settings = $this->get_settings_for_display();
    $allowed_tags = wp_kses_allowed_html('post');
    ?>
<div class="heading <?php echo $settings['headings_types']; ?> <?php echo isset($settings['heading_text_alignment']) ? $settings['heading_text_alignment'] : 'text_left'; ?>"> <?php if(!empty($settings['heading_small_text'])) : ?> <div class="small_text"> <?php if($settings['headings_types'] == 'type_one') : ?> <?php if(!empty($settings['heading_icon'])) : ?> <span class="<?php echo esc_html($settings['heading_icon']); ?> icon"></span> <?php endif; ?> <?php endif; ?> <?php echo wp_kses($settings['heading_small_text'], $allowed_tags); ?> </div> <?php endif; ?> <?php if(!empty($settings['heading_main_text'])):?> <?php if($settings['title_tag'] == 'h1'): ?> <h1 class="heading_text"> <?php echo wp_kses($settings['heading_main_text'] , $allowed_tags) ?></h1> <?php elseif($settings['title_tag'] == 'h2'): ?> <h2 class="heading_text"> <?php echo wp_kses($settings['heading_main_text'] , $allowed_tags) ?></h2> <?php elseif($settings['title_tag'] == 'h3'): ?> <h3 class="heading_text"> <?php echo wp_kses($settings['heading_main_text'] , $allowed_tags) ?></h3> <?php elseif($settings['title_tag'] == 'h4'): ?> <h4 class="heading_text"> <?php echo wp_kses($settings['heading_main_text'] , $allowed_tags) ?></h4> <?php elseif($settings['title_tag'] == 'h5'): ?> <h5 class="heading_text"> <?php echo wp_kses($settings['heading_main_text'] , $allowed_tags) ?></h5> <?php elseif($settings['title_tag'] == 'h6'): ?> <h6 class="heading_text"> <?php echo wp_kses($settings['heading_main_text'] , $allowed_tags) ?></h6> <?php else: ?> <div class="heading_text"> <?php echo wp_kses($settings['heading_main_text'] , $allowed_tags) ?></div> <?php endif; ?> <?php endif; ?> <?php if($settings['headings_types'] == 'type_two') : ?> <div class="small_text_sub"><?php echo wp_kses($settings['heading_small_text'], $allowed_tags); ?></div> <?php endif; ?> <?php if(!empty($settings['heading_decription'])) : ?> <p class="description_text"><?php echo wp_kses($settings['heading_decription'], $allowed_tags); ?></p> <?php endif; ?></div>
<?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_heading_v2());