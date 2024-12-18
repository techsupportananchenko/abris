<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_priceplan_box_v1_new extends Widget_Base
{
    public function get_name()
    {
        return 'creote-priceplan-box-v1-new';
    }
    public function get_title()
    {
        return __('Price plan V2 ', 'creote-addons');
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
        $this->start_controls_section('priceplan_box_one',
        [ 
            'label' => __('Price Plan Settings', 'creote-addons')
        ]
        );
        $this->add_control(
            'priceplan_box_style',
            [
                'label' => __('Price Plan Style', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'type_one'  => __('Price Plan Style One', 'creote-addons'),
                    'type_two'  => __('Price Plan Style Two', 'creote-addons'),
                ],
                'default' => 'type_one',
            ]
          );
          $this->add_control(
            'tag',
            [
                'label' => __('Tag', 'creote-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Most Recommended', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
          );
          $this->add_control(
            'title',
            [
                'label' => __('Title', 'creote-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Individual Plan', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
          );
          $this->add_control(
            'price',
            [
                'label' => __('Price', 'creote-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('22$', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
          );
          $this->add_control(
            'month',
            [
                'label' => __('Month / Year', 'creote-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Year', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
          );
          $this->add_control(
            'description',
            [
                'label' => __('Description', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Most Recommended Power of choice is untrammelled and do what we like.', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
          );
          $this->add_control(
            'getstartbtn',
            [
                'label' => __('Button Text', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __('Get Started', 'creote-addons'),
                'default' => __('Get Started' , 'creote-addons'),
            ]
          );
          $this->add_control(
            'getstartbtnlink',
            [ 
            'label' => __('Button Text', 'creote-addons'),
            'type' => Controls_Manager::URL,
            'placeholder' => __('https://your-link.com', 'creote-addons'),
            'show_external' => true,
            'default' => [
                'url' => '#',
                'is_external' => true,
                'nofollow' => true,
            ],
           ]);
          $this->end_controls_section();
          $this->start_controls_section('price_benifits',
          [ 
              'label' => __('Price List Content', 'creote-addons')
          ]
          );
        $repeater = new Repeater();
        $repeater->add_control(
            'yesno',
            [
                'label' => __('Yes / No', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'yes'  => __('yes', 'creote-addons'),
                    'no'  => __('No', 'creote-addons'),
                ],
                'default' => 'yes',
            ]
          );
        $repeater->add_control(
            'list_items',
            [
                'label' => __('List Items', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );
        $this->add_control(
            'price_benifits_repeater',
            [
                'label' => __('Price List Content', 'creote-addons'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'yesno' => 'yes',
                        'list_items' =>  __('Which is the same  saying through', 'creote-addons'),
                    ],
                    [
                        'yesno' => 'yes',
                        'list_items' =>  __('Which is the same  saying through', 'creote-addons'),
                    ],
                    [
                         'yesno' => 'no',
                        'list_items' =>  __('Which is the same  saying through', 'creote-addons'),
                    ],
                    [
                        'yesno' => 'yes',
                        'list_items' =>  __('Which is the same  saying through', 'creote-addons'),
                    ],
                ],
                'title_field' => '{{{ list_items }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section('price_css',
        [ 
            'label' => __('Custom Css', 'creote-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
        );
        $this->add_control(
            'tag_color',
             [
                'label' => __('Tag Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_one .tags , {{WRAPPER}} .pricing_plan_box.type_two  .tags ' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'tag_color_bg',
             [
                'label' => __('Tag Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_one .tags  , {{WRAPPER}} .pricing_plan_box.type_two  .tags ' => 'background: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'phr_one',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'title_color',
             [
                'label' => __('Title Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_one h2  , {{WRAPPER}} .pricing_plan_box.type_two h2 ' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'desc_color',
             [
                'label' => __('Description Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_two .price_box .lower_content p  ' => 'color: {{VALUE}}!important;',
                ],
                'condition' => [
                    'priceplan_box_style' => ['type_two']
                ]
             ]
          );
          $this->add_control(
            'phr_two',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
          $this->add_control(
            'price_color',
             [
                'label' => __('Price Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_one h6 small , {{WRAPPER}} .pricing_plan_box.type_two .price_box .price h6 ' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'year_color',
             [
                'label' => __('Year Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_one h6 , {{WRAPPER}} .pricing_plan_box.type_two .price_box .price p ' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'price_box_bg_color',
             [
                'label' => __('Price Box Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_two .price_box .price ' => 'background: {{VALUE}}!important;',
                ],
                'condition' => [
                    'priceplan_box_style' => ['type_two']
                ]
             ]
          );
          $this->add_control(
            'phr_three',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
          $this->add_control(
            'hover_content_bg_color',
             [
                'label' => __('Feature Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_two .hover_content ' => 'background: {{VALUE}}!important;',
                ],
                'condition' => [
                    'priceplan_box_style' => ['type_two']
                ]
             ]
          );
          $this->add_control(
            'hover_content_border_color',
             [
                'label' => __('Feature Border Top Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_two .hover_content ' => 'border-top-color: {{VALUE}}!important;',
                ],
                'condition' => [
                    'priceplan_box_style' => ['type_two']
                ]
             ]
          );
          $this->add_control(
            'plist_color',
             [
                'label' => __('Description / List Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_two .hover_content ul li  ' => 'color: {{VALUE}}!important;',
                ],
                'condition' => [
                    'priceplan_box_style' => ['type_two']
                ]
             ]
          );
          $this->add_control(
            'paralist_color',
             [
                'label' => __('Description / List Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_one  .upper_content p , {{WRAPPER}} .pricing_plan_box.type_one  .lower_content ul li ' => 'color: {{VALUE}}!important;',
                ],
                'condition' => [
                    'priceplan_box_style' => ['type_one']
                ]
             ]
          );
          $this->add_control(
            'list_icon_color_yes',
             [
                'label' => __('List Icon Color Yes', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_one .lower_content ul li span.yes_ico , {{WRAPPER}} .pricing_plan_box.type_two .hover_content ul li span.yes_ico   ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'list_icon_color_no',
             [
                'label' => __('List Icon Color No', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_one .lower_content ul li span.no_ico , {{WRAPPER}} .pricing_plan_box.type_two .hover_content ul li span.no_icon   ' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'br_color',
             [
                'label' => __('Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .pricing_plan_box.type_one .pricing_plan_box_inner .lower_content  , {{WRAPPER}}  .pricing_plan_box.type_one .pricing_plan_box_inner .upper_content  ' => 'border-color: {{VALUE}}!important;',
                ],
                'condition' => [
                    'priceplan_box_style' => ['type_one']
                ]
             ]
          );
          $this->add_control(
            'phr_four',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
          $this->add_control(
            'read_more_color',
             [
                'label' => __('Get start Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_one .get_start_button .theme-btn , {{WRAPPER}} .pricing_plan_box.type_two .hover_content .get_start_button .theme-btn ' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'read_morebg_color',
             [
                'label' => __('Get start  Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_one .get_start_button .theme-btn , {{WRAPPER}} .pricing_plan_box.type_two .hover_content .get_start_button .theme-btn ' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'phr_five',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
          $this->add_control(
            'box_bg',
             [
                'label' => __('Box Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .pricing_plan_box.type_one .pricing_plan_box_inner , {{WRAPPER}} .pricing_plan_box.type_two .price_box ' => 'background: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'box_bor_bg',
             [
                'label' => __('Box Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_two .price_box ' => ' border-color: {{VALUE}}!important;',
                ],
                'condition' => [
                    'priceplan_box_style' => ['type_two']
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
            'title_color_ho',
             [
                'label' => __('Hover Title  Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_one .pricing_plan_box_inner:hover h2 ' => 'color: {{VALUE}}!important;',
                ],
                'condition' => [
                    'priceplan_box_style' => ['type_one']
                ]
             ]
          );
          $this->add_control(
            'phr_six',
            [
                'type' => Controls_Manager::DIVIDER,
                'condition' => [
                    'priceplan_box_style' => ['type_one']
                ]
            ]
        );
          $this->add_control(
            'price_color_hover',
             [
                'label' => __('Hover Price Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_one .pricing_plan_box_inner:hover  h6 small ' => 'color: {{VALUE}}!important;',
                ],
                'condition' => [
                    'priceplan_box_style' => ['type_one']
                ]
             ]
          );
          $this->add_control(
            'year_color_hover',
             [
                'label' => __('Hover Year Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_one .pricing_plan_box_inner:hover h6 ' => 'color: {{VALUE}}!important;',
                ],
                'condition' => [
                    'priceplan_box_style' => ['type_one']
                ]
             ]
          );
          $this->add_control(
            'phr_sev',
            [
                'type' => Controls_Manager::DIVIDER,
                'condition' => [
                    'priceplan_box_style' => ['type_one']
                ]
            ]
        );
          $this->add_control(
            'paralist_color_hover',
             [
                'label' => __('Hover Description / List  Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_one .pricing_plan_box_inner:hover  .upper_content p , {{WRAPPER}} .pricing_plan_box.type_one .pricing_plan_box_inner:hover  .lower_content ul li   ' => 'color: {{VALUE}}!important;',
                ],
                'condition' => [
                    'priceplan_box_style' => ['type_one']
                ]
             ]
          );
        $this->add_control(
            'list_icon_color_yes_hover',
             [
                'label' => __('Hover List Icon Color Yes', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_one .pricing_plan_box_inner:hover .lower_content ul li span.yes_ico   ' => 'color: {{VALUE}}!important;',
                ],
                'condition' => [
                    'priceplan_box_style' => ['type_one']
                ]
             ]
          );
        $this->add_control(
            'list_icon_color_no_hover',
             [
                'label' => __('Hover List Icon Color No', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_one .pricing_plan_box_inner:hover .lower_content ul li span.no_ico   ' => 'color: {{VALUE}}!important;',
                ],
                'condition' => [
                    'priceplan_box_style' => ['type_one']
                ]
             ]
          );
        $this->add_control(
            'br_color_hover',
             [
                'label' => __('Hover Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .pricing_plan_box.type_one .pricing_plan_box_inner:hover .lower_content  , {{WRAPPER}}  .pricing_plan_box.type_one .pricing_plan_box_inner .upper_content  ' => 'border-color: {{VALUE}}!important;',
                ],
                'condition' => [
                    'priceplan_box_style' => ['type_one']
                ]
             ]
          );
          $this->add_control(
            'phr_eight',
            [
                'type' => Controls_Manager::DIVIDER,
                'condition' => [
                    'priceplan_box_style' => ['type_one']
                ]
            ]
        );
          $this->add_control(
            'read_more_color_hover',
             [
                'label' => __('Hover Get start Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_one  .pricing_plan_box_inner:hover .get_start_button .theme-btn  ,
                    {{WRAPPER}} .pricing_plan_box.type_two .hover_content .get_start_button .theme-btn:hover' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'read_more_color_hover_bg',
             [
                'label' => __('Hover Get start  Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_plan_box.type_one  .pricing_plan_box_inner:hover .get_start_button .theme-btn ,
                    {{WRAPPER}} .pricing_plan_box.type_two .hover_content .get_start_button .theme-btn:hover ' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'phr_nnine',
            [
                'type' => Controls_Manager::DIVIDER,
                'condition' => [
                    'priceplan_box_style' => ['type_one']
                ]
            ]
        );
          $this->add_control(
            'price_bg',
             [
                'label' => __('Price Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .pricing_plan_box.type_one .pricing_plan_box_inner:before ' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
                ],
                'condition' => [
                    'priceplan_box_style' => ['type_one']
                ]
             ]
          );
        $this->end_controls_section();
    }
protected function render(){
     $settings = $this->get_settings_for_display();
     $target = $settings['getstartbtnlink']['is_external'] ? ' target="_blank"' : '';
     $nofollow = $settings['getstartbtnlink']['nofollow'] ? ' rel="nofollow"' : ''; 
?>
<?php if($settings['priceplan_box_style'] == 'type_two'): ?><div class="pricing_plan_box type_two"> <?php if(!empty($settings['tag'])): ?> <div class="tags"><?php echo esc_html($settings['tag']); ?></div> <?php endif; ?> <div class="price_box"> <div class="price"> <?php if(!empty($settings['price'])) : ?> <h6><?php echo esc_html($settings['price']); ?> </h6> <p><?php echo esc_html($settings['month']); ?></p> <?php endif; ?> </div> <div class="lower_content"> <?php if(!empty($settings['title'])) : ?> <div class="title_s"> <h2><?php echo esc_html($settings['title']); ?></h2> </div> <?php endif; ?> <?php if(!empty($settings['description'])) : ?> <p><?php echo esc_html($settings['description']); ?></p> <?php endif; ?> </div> </div> <div class="hover_content"> <ul> <?php foreach($settings['price_benifits_repeater'] as $price_list):?> <li> <?php if($price_list['yesno'] == 'yes'): ?> <span class="yes_ico fa fa-check-circle-o"></span> <?php elseif($price_list['yesno'] == 'no'): ?> <span class="no_icon fa fa-times-circle-o"></span> <?php endif; ?> <?php echo esc_html($price_list['list_items']); ?> </li> <?php endforeach; ?> </ul> <?php if(!empty($settings['getstartbtn'])) : ?> <div class="get_start_button theme_btn_all"> <a href="<?php echo esc_url($settings['getstartbtnlink']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn one"><?php echo esc_html($settings['getstartbtn']); ?></a> </div> <?php endif; ?> </div></div> <?php else: ?> <div class="pricing_plan_box type_one"> <?php if(!empty($settings['tag'])): ?> <div class="tags"><?php echo esc_html($settings['tag']); ?></div> <?php endif; ?> <div class="pricing_plan_box_inner"> <div class="upper_content"> <?php if(!empty($settings['title'])) : ?> <div class="title_s"> <h2><?php echo esc_html($settings['title']); ?></h2> </div> <?php endif; ?> <?php if(!empty($settings['price'])) : ?> <div class="price_rs"> <h6><small><?php echo esc_html($settings['price']); ?></small> <?php echo esc_html('/');?> <span><?php echo esc_html($settings['month']); ?></span></h6> </div> <?php endif; ?> <?php if(!empty($settings['description'])) : ?> <p><?php echo esc_html($settings['description']); ?></p> <?php endif; ?> </div> <div class="lower_content"> <ul> <?php foreach($settings['price_benifits_repeater'] as $price_list):?> <li> <?php if($price_list['yesno'] == 'yes'): ?> <span class="yes_ico fa fa-check-circle-o"></span> <?php elseif($price_list['yesno'] == 'no'): ?> <span class="no_ico fa fa-times-circle-o"></span> <?php endif; ?> <?php echo esc_html($price_list['list_items']); ?> </li> <?php endforeach; ?> </ul> </div> <?php if(!empty($settings['getstartbtn'])) : ?> <div class="get_start_button theme_btn_all"> <a href="<?php echo esc_url($settings['getstartbtnlink']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn one"><?php echo esc_html($settings['getstartbtn']); ?><span class="icon-arrow-right"></span></a> </div> <?php endif; ?> </div></div><?php endif; ?>
<?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_priceplan_box_v1_new());