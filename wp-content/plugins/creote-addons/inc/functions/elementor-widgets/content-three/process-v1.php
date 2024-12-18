<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_process_v1_new extends Widget_Base
{
    public function get_name()
    {
        return 'creote-process-v1-new';
    }
    public function get_title()
    {
        return __('Process V2' , 'creote-addons');
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
        $this->start_controls_section('process_settings_v1',
        [ 
            'label' => __('process Settings', 'creote-addons')
        ]
        );
        $this->add_control(
            'process_style',
            [
                'label' => __('Process Style', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'type_one' => __('Process Style one', 'creote-addons'),
                    'type_two' => __('Process Style Two', 'creote-addons'),
                    'type_three' => __('Process Style Three', 'creote-addons'),
                ],
                'default' => 'type_one',
            ]
        ); 
        $this->end_controls_section(); 
        $this->start_controls_section('process_content_v1',
        [ 
            'label' => __('Process  Content', 'creote-addons') ,
            'condition' => [
                'process_style' => ['type_one' , 'type_two'],
             ]
        ]
        ); 
        $this->add_control(
            'icon_image_select',
            [
                'label' => __('Chose Icon or Icon Image', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'icon_image_enable' => __('Icon Image Enable', 'creote-addons'),
                    'icon_fonts_enable' => __('Icon Fonts Enable', 'creote-addons'),
                ],
                'default' => 'icon_image_enable',
            ]
        ); 
        $this->add_control(
            'icon_image',
            [
                'label' => __('Icon Image', 'creote-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => CREOTE_ADDONS_URL . 'assets/images/customer-support.png',
                  ],
                 'condition' => [
                    'icon_image_select' => 'icon_image_enable',
                 ]
            ]
        );
        $this->add_control(
            'icon_fonts',
            [
                'label' => __('Icon', 'creote-addons'),
                'type' => Controls_Manager::ICON,
                'options' => get_creote_icon(),
                'default' => __('fa fa-ban' , 'creote-addons'),
                 'condition' => [
                    'icon_image_select' => 'icon_fonts_enable',
                 ]
            ]
        );
        $this->add_control(
            'tag_type',
            [
            'label' => __('Heading Tag', 'luxride-addons'),
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
        $this->add_control(
            'heading_text',
            [
                'label' => __('Heading', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
        );
        $this->add_control(
            'description_text',
            [
                'label' => __(' Description', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
        );
        $this->add_control(
            'number_icon_fonts',
            [
                'label' => __('Box Count Number', 'creote-addons'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('1', 'creote-addons'),
                'default' => __('1' , 'creote-addons'),
            ]
        );
        $this->add_control(
            'read_more_btn',
            [
                'label' => __('Read More', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __('Read More', 'creote-addons'),
                'default' => __('Read More' , 'creote-addons'),
                'condition' => [
                    'process_style' => 'type_one',
                ]
            ]
        );
        $this->add_control(
            'link',
        [ 
            'label' => __('Link', 'creote-addons'),
            'type' => Controls_Manager::URL,
            'placeholder' => __('https://your-link.com', 'creote-addons'),
            'show_external' => true,
            'default' => [
                'url' => '#',
                'is_external' => true,
                'noprocess' => true,
            ],
        ]);
        $this->end_controls_section();
        $this->start_controls_section('process_content_v2',
        [ 
            'label' => __('Process Content', 'creote-addons') ,
            'condition' => [
                'process_style' => 'type_three',
             ]
        ]
        );
        $this->add_control(
            'image',
            [
                'label' => __('Image', 'creote-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'heading_text_three',
            [
                'label' => __('Heading', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
        );
        $this->add_control(
            'description_text_three',
            [
                'label' => __(' Description', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
        );
        $this->add_control(
            'number_icon_fonts_three',
            [
                'label' => __('Box Count Number', 'creote-addons'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('1', 'creote-addons'),
                'default' => __('1' , 'creote-addons'),
            ]
        );
        $this->add_control(
            'link_three',
        [ 
            'label' => __('Link', 'creote-addons'),
            'type' => Controls_Manager::URL,
            'placeholder' => __('https://your-link.com', 'creote-addons'),
            'show_external' => true,
            'default' => [
                'url' => '#',
                'is_external' => true,
                'noprocess' => true,
            ],
        ]);
        $this->end_controls_section();
        $this->start_controls_section('process_box_css',
        [ 
            'label' => __('Custom Css', 'creote-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
        );
            $this->add_control(
            'icon_color',
             [
                'label' => __('Icon Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .choose_box.type_one .image_box span ,{{WRAPPER}}  .choose_box.type_two .icon_box ' => 'color: {{VALUE}}!important;',
                ],
                'condition' => [
                    'process_style' => ['type_one' , 'type_two'],
                 ]
             ]
            );
            $this->add_control(
                'icon_bborcolor',
                 [
                    'label' => __('Icon Bg Color', 'creote-addons'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}   .choose_box.type_two .icon_box ' => 'border-color: {{VALUE}}!important;',
                    ],
                    'condition' => [
                        'process_style' => 'type_two',
                     ]
                 ]
            );
            $this->add_control(
                'icon_bgcolor',
                 [
                    'label' => __('Icon Bg Color', 'creote-addons'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose_box.type_one .image_box ,  {{WRAPPER}} .choose_box.type_two .icon_box .icon_image ,  {{WRAPPER}} .icon_bg_rotate::before ' => 'background: {{VALUE}}!important;',
                    ],
                    'condition' => [
                        'process_style' => ['type_one' , 'type_two'],
                     ]
                 ]
            );
            $this->add_control(
                'count_number_text_color',
                 [
                    'label' => __('Count Text Color', 'creote-addons'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose_box.type_one .step_no , {{WRAPPER}} .choose_box.type_two .step .step_no , {{WRAPPER}}  .choose_box.type_three .step_no' => 'color: {{VALUE}}!important; opacity:1;',
                    ],
                 ]
            );
            $this->add_control(
                'count_number_text_bg_color',
                 [
                    'label' => __('Count Text Bg Color', 'creote-addons'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose_box.type_one .step_no ' => 'background: {{VALUE}}!important;',
                    ],
                    'condition' => [
                        'process_style' => 'type_one',
                     ]
                 ]
            );
          $this->add_control(
            'heading_color',
             [
                'label' => __('Heading Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .choose_box.type_one .text_box .proctitle a , {{WRAPPER}} .choose_box.type_two .content_box .proctitle a , {{WRAPPER}} .choose_box.type_three .content_box .proctitle a' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'des_color',
             [
                'label' => __('Decription Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .choose_box.type_one .text_box p , {{WRAPPER}} .choose_box.type_two .content_box  p , {{WRAPPER}} .choose_box.type_three .content_box p' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'border_color',
             [
                'label' => __('Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .choose_box.type_two .step::before ' => 'border-bottom-color: {{VALUE}}!important;',
                ],
                'condition' => [
                    'process_style' => 'type_two',
                 ]
             ]
          );
          $this->add_control(
            'border_two_color',
             [
                'label' => __('Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .choose_box.type_three' => 'border-color: {{VALUE}}!important;',
                ],
                'condition' => [
                    'process_style' => 'type_three',
                 ]
             ]
          );
          $this->add_control(
            'read_more_color',
             [
                'label' => __('Read More Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .choose_box.type_one .read_more ' => 'color: {{VALUE}}!important;',
                ],
                'condition' => [
                    'process_style' => 'type_one',
                 ]
             ]
          );
          $this->add_control(
            'box_bg_color',
             [
                'label' => __('Box Background', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .choose_box.type_one .content_box ' => 'background: {{VALUE}}!important;',
                ],
                'condition' => [
                    'process_style' => 'type_one',
                 ]
             ]
          );
        $this->add_control(
            'hrsix',
            [
                'type' => Controls_Manager::DIVIDER,
                'condition' => [
                    'process_style' => 'type_one',
                 ]
            ]
        );
            $this->add_control(
                'ho_count_number_text_color',
                 [
                    'label' => __('Count Text Color', 'creote-addons'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose_box.type_one:hover .step_no ' => 'color: {{VALUE}}!important;',
                    ],
                    'condition' => [
                        'process_style' => 'type_one',
                     ]
                 ]
            );
            $this->add_control(
                'ho_count_number_text_bg_color',
                 [
                    'label' => __('Count Text Bg Color', 'creote-addons'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose_box.type_one:hover .step_no ' => 'background: {{VALUE}}!important;',
                    ],
                    'condition' => [
                        'process_style' => 'type_one',
                     ]
                 ]
            );
          $this->add_control(
            'ho_heading_color',
             [
                'label' => __('Heading Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .choose_box.type_one:hover .text_box .proctitle a' => 'color: {{VALUE}}!important;',
                ],
                'condition' => [
                    'process_style' => 'type_one',
                 ]
             ]
          );
          $this->add_control(
            'ho_des_color',
             [
                'label' => __('Decription Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .choose_box.type_one:hover .text_box p ' => 'color: {{VALUE}}!important;',
                ],
                'condition' => [
                    'process_style' => 'type_one',
                 ]
             ]
          );
          $this->add_control(
            'ho_read_more_color',
             [
                'label' => __('Read More Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .choose_box.type_one:hover .read_more' => 'color: {{VALUE}}!important;',
                ],
                'condition' => [
                    'process_style' => 'type_one',
                 ]
             ]
          );
          $this->add_control(
            'ho_box_bg_color',
             [
                'label' => __('Box Background', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .choose_box.type_one:hover .content_box ' => 'background: {{VALUE}}!important;',
                ],
                'condition' => [
                    'process_style' => 'type_one',
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
  <section class="why_choose_us type_one">
    <div class="row">
        <?php if($settings['process_style'] == 'type_two'): 
            $target1 = $settings['link']['is_external'] ? ' target="_blank"' : ''; 
            $nofollow1 = $settings['link']['nofollow'] ? ' rel="nofollow"' : ''; 
        ?>
            <div class="choose_box type_two">
                <div class="icon_box">
                    <?php if($settings['icon_image_select'] == 'icon_image_enable'):
                        $icon_image = isset($settings['icon_image']['alt']) ? $settings['icon_image']['alt'] : ''; 
                        if(empty($icon_image)) { 
                            $icon_image = 'image'; 
                        } 
                    ?>
                        <div class="icon_image">
                            <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image); ?>" />
                        </div>
                    <?php elseif($settings['icon_image_select'] == 'icon_fonts_enable'): ?>
                        <span class="<?php echo esc_html($settings['icon_fonts']); ?> icon"></span>
                    <?php endif; ?>
                    <span class="icon_bg_rotate"></span>
                </div>
                <div class="content_box">
                <<?php echo esc_attr($settings['tag_type']); ?> class="proctitle">
                        <a href="<?php echo esc_url($settings['link']['url']); ?>" <?php echo esc_attr($target1); ?> <?php echo esc_attr($nofollow1); ?>>
                            <?php echo wp_kses($settings['heading_text'], $allowed_tags); ?>
                        </a>
                    </<?php echo esc_attr($settings['tag_type']); ?>>
                    <p><?php echo wp_kses($settings['description_text'], $allowed_tags); ?></p>
                </div>
                <div class="step">
                    <div class="step_no"><?php echo esc_html($settings['number_icon_fonts']); ?></div>
                </div>
            </div>
        
        <?php elseif($settings['process_style'] == 'type_three'): 
            $target2 = $settings['link_three']['is_external'] ? ' target="_blank"' : ''; 
            $nofollow3 = $settings['link_three']['nofollow'] ? ' rel="nofollow"' : ''; 
        ?>
            <div class="choose_box type_three">
                <?php if(!empty($settings['image']['url'])): 
                    $image = isset($settings['image']['alt']) ? $settings['image']['alt'] : ''; 
                    if(empty($image)) { 
                        $image = 'image'; 
                    } 
                ?>
                    <div class="image">
                        <img src="<?php echo esc_url($settings['image']['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image); ?>" />
                    </div>
                <?php endif; ?>
                <div class="content_box">
                <<?php echo esc_attr($settings['tag_type']); ?> class="proctitle">
                        <a href="<?php echo esc_url($settings['link_three']['url']); ?>" <?php echo esc_attr($target2); ?> <?php echo esc_attr($nofollow3); ?>>
                            <?php echo wp_kses($settings['heading_text_three'], $allowed_tags); ?>
                        </a>
                    </<?php echo esc_attr($settings['tag_type']); ?>>
                    <p><?php echo wp_kses($settings['description_text_three'], $allowed_tags); ?></p>
                </div>
                <small class="step_no"><?php echo esc_html($settings['number_icon_fonts_three']); ?></small>
            </div>
        
        <?php else: 
            $target1 = $settings['link']['is_external'] ? ' target="_blank"' : ''; 
            $nofollow1 = $settings['link']['nofollow'] ? ' rel="nofollow"' : ''; 
        ?>
            <div class="choose_box type_one">
                <div class="image_box">
                    <?php if($settings['icon_image_select'] == 'icon_image_enable'):
                        $icon_image = isset($settings['icon_image']['alt']) ? $settings['icon_image']['alt'] : ''; 
                        if(empty($icon_image)) { 
                            $icon_image = 'image'; 
                        } 
                    ?>
                        <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image); ?>" />
                    <?php elseif($settings['icon_image_select'] == 'icon_fonts_enable'): ?>
                        <span class="<?php echo esc_html($settings['icon_fonts']); ?> icon"></span>
                    <?php endif; ?>
                </div>
                <div class="content_box">
                    <span class="step_no"><?php echo esc_html($settings['number_icon_fonts']); ?></span>
                    <div class="text_box">
                    <<?php echo esc_attr($settings['tag_type']); ?> class="proctitle">
                            <a <?php if(!empty($settings['link']['url'])): ?> href="<?php echo esc_url($settings['link']['url']); ?>" <?php endif; ?> <?php echo esc_attr($target1); ?> <?php echo esc_attr($nofollow1); ?>>
                                <?php echo wp_kses($settings['heading_text'], $allowed_tags); ?>
                            </a>
                        </<?php echo esc_attr($settings['tag_type']); ?>>
                        <p><?php echo wp_kses($settings['description_text'], $allowed_tags); ?></p>
                        <a href="<?php echo esc_url($settings['link']['url']); ?>" class="read_more type_one" <?php echo esc_attr($target1); ?> <?php echo esc_attr($nofollow1); ?>>
                            <?php echo wp_kses($settings['read_more_btn'], $allowed_tags); ?> 
                            <span class="icon-arrow-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

  <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_process_v1_new());