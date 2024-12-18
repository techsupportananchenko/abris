<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creotetimeline_carousel_v1 extends Widget_Base
{
    public function get_name()
    {
        return 'creote-timeline-carousel-v1';
    }
    public function get_title()
    {
        return __('Timeline Carousel V1', 'creote-addons');
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
        $this->start_controls_section('time_line_caro_settings',
        [ 
            'label' => __('Timeline  Settings', 'creote-addons')
        ]
        );
        $this->add_control(
            'items_to_display',
            [
                'label' => __('Carousel Items To Display', 'creote-addons'),
                'type'    => Controls_Manager::NUMBER,
				'default' => 1,
				'min'     => 1,
				'max'     => 5,
				'step'    => 1,
            ]
         );
         $this->add_control(
            'center_enable',
           [
              'label' => __('Carousel Center Enable', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'yes',
           ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'date_helde',
            [
                'label' => __('Date', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
        );
        $repeater->add_control(
            'time_heading_text',
            [
                'label' => __('Heading', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
        );
        $repeater->add_control(
            'time_description',
            [
                'label' => __('Description', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
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
            'condition' => [
                'read_more_enable' => 'yes',
            ]
        ]);
        $this->add_control(
            'timeline_caro_content_v1_repeater',
            [
                'label' => __('Icon Box Content Repeater', 'creote-addons'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                    'date_helde' =>  __('26 April 2008' , 'creote-addons'),
                    'time_heading_text' =>  __('Heading' , 'creote-addons'),
                    'time_description' =>  __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.' , 'creote-addons'),
                    ],
                    [
                    'date_helde'  =>  __('26 April 2008' , 'creote-addons'),
                    'time_heading_text' =>  __('Heading' , 'creote-addons'),
                    'time_description' =>  __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.' , 'creote-addons'),
                    ],
                ],
                'title_field' => '{{{ time_heading_text }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section('timeline_box_css',
        [ 
            'label' => __('Custom Css', 'creote-addons')
        ]
        );
          $this->add_control(
            'date_color',
             [
                'label' => __('Date Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .time_box.type_one .date_box h6 ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'date_color_bg',
             [
                'label' => __('Date Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR, 
                 'selectors' => [
                    '{{WRAPPER}} .time_box.type_one .date_box h6 ' => 'background: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'date_color_bg_bobg',
             [
                'label' => __('Date Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR, 
                 'selectors' => [
                    '{{WRAPPER}} .time_box.type_one .date_box h6::before ' => 'background: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'date_color_bg_bobgdot',
             [
                'label' => __('Date Dot Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR, 
                 'selectors' => [
                    '{{WRAPPER}} .time_box.type_one .date_box ' => 'border-color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'headingcolor',
             [
                'label' => __('Heading Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR, 
                 'selectors' => [
                    '{{WRAPPER}} .time_box.type_one .content_box h2 ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
        $this->add_control(
            'd_color',
             [
                'label' => __('Description Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR, 
                 'selectors' => [
                    '{{WRAPPER}} .time_box.type_one .content_box p ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'read_color',
             [
                'label' => __('Read More Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .time_box.type_one .content_box a.read_more ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'bg_icon_color',
             [
                'label' => __(' Background Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}  .time_box.type_one .content_box ' => 'background: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'hrtwo',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        ); 
          $this->add_control(
            'hover_date_color',
             [
                'label' => __('Date Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .time_box.type_one:hover .date_box h6 , {{WRAPPER}} .owl-item.active.center .time_box.type_one .date_box h6 ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'hover_date_color_bg',
             [
                'label' => __('Date Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .time_box.type_one:hover .date_box h6  ,  {{WRAPPER}}  .owl-item.active.center .time_box.type_one .date_box h6 ' => 'background: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'hover_date_color_bg_bobg',
             [
                'label' => __('Date Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .time_box.type_one:hover  .date_box h6::before ,  {{WRAPPER}}  .owl-item.active.center  .time_box.type_one .date_box h6::before ' => 'background: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'hover_date_color_bg_bobgdot',
             [
                'label' => __('Date Dot Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .time_box.type_one:hover  .date_box ,  {{WRAPPER}}  .owl-item.active.center .time_box.type_one .date_box  ' => 'border-color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'hover_headingcolor',
             [
                'label' => __('Heading Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .time_box.type_one:hover .content_box h2 ,  {{WRAPPER}}  .owl-item.active.center .time_box.type_one .content_box h2 ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
        $this->add_control(
            'hover_d_color',
             [
                'label' => __('Description Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .time_box.type_one:hover .content_box p ,  {{WRAPPER}}  .owl-item.active.center .time_box.type_one .content_box p ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'hover_read_color',
             [
                'label' => __('Read More Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .time_box.type_one:hover .content_box a.read_more ,  {{WRAPPER}}  .owl-item.active.center .time_box.type_one .content_box a.read_more ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'hover_bg_icon_color',
             [
                'label' => __(' Background Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}  .time_box.type_one:hover .content_box ,  {{WRAPPER}}  .owl-item.active.center .time_box.type_one .content_box ' => 'background: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->end_controls_section();
          $this->start_controls_section('icon_caro_nav_dot_css',
          [ 
              'label' => __('Owl Nav / Dots', 'creote-addons')
          ]
          );
          $this->add_control(
              'owl_nav_block',
              [
                  'label' => __('Owl Nav Disable / Enable', 'creote-addons'),
                  'type' => Controls_Manager::CHOOSE,
                  'options' => [
                      'owl_nav_block' => [
                          'title' => __('Enable', 'creote-addons'),
                          'icon' => 'fa fa-check-circle',
                      ],
                      'owl_nav_none' => [
                          'title' => __('Disable', 'creote-addons'),
                          'icon' => 'fa fa-ban',
                      ],
                  ],
                  'default' => 'owl_nav_block',
                  'toggle' => true,
              ]
          );
          $this->add_control(
              'owl_dots_block',
              [
                  'label' => __('Owl dots Disable / Enable', 'creote-addons'),
                  'type' => Controls_Manager::CHOOSE,
                  'options' => [
                      'owl_dots_block' => [
                          'title' => __('Enable', 'creote-addons'),
                          'icon' => 'fa fa-check-circle',
                      ],
                      'owl_dots_none' => [
                          'title' => __('Disable', 'creote-addons'),
                          'icon' => 'fa fa-ban',
                      ],
                  ],
                  'default' => 'owl_dots_block',
                  'toggle' => true,
              ]
          );
          $this->add_control(
            'owl_nav_postion',
            [
                'label' => __('Owl Nav Position', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'owl_type_one'  => __( 'Position Type One', 'creote-addons' ),
                    'owl_type_two' => __( 'Position Type Two', 'creote-addons' ),
                    'owl_type_three' => __( 'Position Type Three', 'creote-addons' ),
                    'owl_type_four' => __( 'Position Type Four', 'creote-addons' ),
                ],
                'default' => __('owl_type_one' , 'creote-addons'),
            ]
        );
          $this->add_control(
              'hrfivety',
              [
                  'type' => Controls_Manager::DIVIDER,
              ]
          );
          $this->add_control(
              'owl_nav_color',
               [
                  'label' => __('Owl Nav Bg Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                   'selectors' => [
                      '{{WRAPPER}} .time_line_carousel_box .owl_nav_block.owl-carousel .owl-nav .owl-prev , {{WRAPPER}} .time_line_carousel_box .owl_nav_block.owl-carousel .owl-nav .owl-next' => 'background: {{VALUE}}!important;',
                  ],
               ]
            );
            $this->add_control(
              'owl_nav_iconcolor',
               [
                  'label' => __('Owl Nav Icon Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                   'selectors' => [
                      '{{WRAPPER}} .time_line_carousel_box .owl_nav_block.owl-carousel .owl-nav .owl-prev span , {{WRAPPER}} .time_line_carousel_box .owl_nav_block.owl-carousel .owl-nav .owl-next span' => 'color: {{VALUE}}!important;',
                  ],
               ]
            );
            $this->add_control(
              'hrfivetst',
              [
                  'type' => Controls_Manager::DIVIDER,
              ]
          );
          $this->add_control(
              'owl_dot_color',
               [
                  'label' => __('Owl Dot Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                   'selectors' => [
                      '{{WRAPPER}} .time_line_carousel_box .owl_dots_block .owl-dots .owl-dot' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
                  ],
               ]
            );
          $this->add_control(
              'owl_dot_color_color',
               [
                  'label' => __('Owl Dot Border Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                   'selectors' => [
                      '{{WRAPPER}} .time_line_carousel_box .owl_dots_block  .owl-dots .owl-dot' => 'border-color: {{VALUE}}!important;',
                  ],
               ]
            );
            $this->add_control(
              'owl_dot_color_active',
               [
                  'label' => __('Owl Dot Hover / active color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                   'selectors' => [
                      '{{WRAPPER}} .time_line_carousel_box .owl_dots_block .owl-dots .owl-dot:hover , {{WRAPPER}} .time_line_carousel_box .owl_dots_block .owl-dots .owl-dot.active' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
                  ],
               ]
            );
            $this->add_control(
              'hrfivets',
              [
                  'type' => Controls_Manager::DIVIDER,
              ]
          );
            $this->add_control(
              'hover_owl_nav_color',
               [
                  'label' => __('Owl Nav Hover Bg Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                   'selectors' => [
                      '{{WRAPPER}} .time_line_carousel_box .owl_nav_block.owl-carousel .owl-nav .owl-prev:hover , {{WRAPPER}} .time_line_carousel_box .owl_nav_block.owl-carousel .owl-nav .owl-next:hover' => 'background: {{VALUE}}!important;',
                  ],
               ]
            );
            $this->add_control(
              'hover_owl_nav_iconcolor',
               [
                  'label' => __('Owl Nav Hover Icon Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                   'selectors' => [
                      '{{WRAPPER}} .time_line_carousel_box .owl_nav_block.owl-carousel .owl-nav .owl-prev:hover span  , {{WRAPPER}} .time_line_carousel_box .owl_nav_block.owl-carousel .owl-nav .owl-next:hover span' => 'color: {{VALUE}}!important;',
                  ],
               ]
            );
          $this->end_controls_section(); 
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?> 
<section class="time_line_carousel_box owl_new_one"> <div class="owl-carousel <?php echo $settings['owl_nav_block'] ?> <?php echo $settings['owl_dots_block'] ?> <?php echo $settings['owl_nav_postion']; ?> theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 10, "autoheight":true, "lazyload":true, <?php if($settings['center_enable']):?> "center": true ,<?php endif; ?> "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 7000, "smartSpeed": 1800, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "3" } , "1000":{ "items" : "<?php echo esc_attr($settings['items_to_display']); ?>" }}}'> <?php foreach($settings['timeline_caro_content_v1_repeater'] as $timelineco): ?> <div class="time_box type_one "> <?php if(!empty($timelineco['date_helde'])) : ?> <div class="date_box "> <h6><?php echo esc_html($timelineco['date_helde']); ?></h6> </div> <?php endif; ?> <div class="content_box "> <h2><?php echo esc_html($timelineco['time_heading_text']); ?></h2> <p><?php echo esc_html($timelineco['time_description']); ?></p> <?php if($timelineco['read_more_enable'] == 'yes'): $target1 = $timelineco['link']['is_external'] ? ' target="_blank"' : ''; $nofollow1 = $timelineco['link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <a <?php echo esc_attr($target1); ?> <?php echo esc_attr($nofollow1); ?> href="<?php echo esc_url($timelineco['link'] ['url']); ?>" class="read_more type_two"><?php echo esc_html($timelineco['read_more_btn']); ?><span class="icon-arrow-right"></span></a> <?php endif; ?> </div> </div> <?php endforeach; ?> </div> </section> 
        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creotetimeline_carousel_v1());
