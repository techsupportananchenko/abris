<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_icon_box_carousel_v1 extends Widget_Base
{
    public function get_name()
    {
        return 'creote-icon-box-carousel-v1';
    }
    public function get_title()
    {
        return __('Icon Box Carousel V1', 'creote-addons');
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
        $this->start_controls_section('icon_box_caro_settings',
        [ 
            'label' => __('Icon  Settings', 'creote-addons')
        ]
        );
        $this->add_control(
            'hrtl_enable_dis_two',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'items_to_display',
            [
                'label' => __('Carousel Items To Display', 'creote-addons'),
                'type'    => Controls_Manager::NUMBER,
				'default' => 1,
				'min'     => 1,
				'max'     => 8,
				'step'    => 1,
            ]
         );
        $this->end_controls_section();
        $this->start_controls_section('icon_caro_content',
        [ 
            'label' => __('Icon Box Content', 'creote-addons')
        ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'icon_image_enable',
           [
              'label' => __('Icon Image Enable', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'no',
           ]
        );
        $repeater->add_control(
            'icon_image',
            [
                'label' => __('Icon Image', 'creote-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => CREOTE_ADDONS_URL . 'assets/images/sore-throat.png',
                  ],
                 'condition' => [
                    'icon_image_enable' => 'yes',
                 ]
            ]
        );
        $repeater->add_control(
            'icon_fonts_enable',
           [
              'label' => __('Icon Enable', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'yes',
           ]
        );
        $repeater->add_control(
            'icon_fonts',
            [
                'label' => __('Icon', 'creote-addons'),
                'type' => Controls_Manager::ICON,
                'options' => get_creote_icon(),
                'default' => __('fa fa-ban' , 'creote-addons'),
                 'condition' => [
                    'icon_fonts_enable' => 'yes',
                 ]
            ]
        );
        $repeater->add_control(
            'icon_heading_text',
            [
                'label' => __('Icon Box Heading', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
        );
        $repeater->add_control(
            'icon_description',
            [
                'label' => __('Icon Box Description', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
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
        $this->add_control(
            'icon_box_caro_content_v1_repeater',
            [
                'label' => __('Icon Box Content Repeater', 'creote-addons'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                    'icon_heading_text' =>  __('Heading' , 'creote-addons'),
                    'icon_description' =>  __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.' , 'creote-addons'),
                    ],
                    [
                    'icon_heading_text' =>  __('Heading' , 'creote-addons'),
                    'icon_description' =>  __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.' , 'creote-addons'),
                    ],
                    [
                    'icon_heading_text' =>  __('Heading' , 'creote-addons'),
                    'icon_description' =>  __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.' , 'creote-addons'),
                    ],
                    [
                    'icon_heading_text' =>  __('Heading' , 'creote-addons'),
                    'icon_description' =>  __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.' , 'creote-addons'),
                     ],
                ],
                'title_field' => '{{{ icon_heading_text }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section('iconcaro_box_css',
        [ 
            'label' => __('Custom Css', 'creote-addons'),
            'tab' =>Controls_Manager::TAB_STYLE,
        ]
        );
        $this->add_control(
            'custom_css',
            [
                'label' => __('Custom Css Enable', 'creote-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
          );
          $this->add_control(
            'hrtwo',
            [
                'type' => Controls_Manager::DIVIDER,
                'condition' => [
                    'custom_css' => 'yes',
                ]
            ]
        );
          $this->add_control(
            'heading_color',
             [
                'label' => __('Heading Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .icon_caro.type_one h2 a ' => 'color: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'custom_css' => 'yes',
                ]
             ]
          );
        $this->add_control(
            'd_color',
             [
                'label' => __('Description Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .icon_caro.type_one p ' => 'color: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'custom_css' => 'yes',
                ]
             ]
          );
          $this->add_control(
            'read_color',
             [
                'label' => __('Read More Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .icon_caro.type_one a.read_more ' => 'color: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'custom_css' => 'yes',
                ]
             ]
          );
          $this->add_control(
            'read_bgcolor',
             [
                'label' => __('Read More Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .icon_caro.type_one a.read_more:after ' => 'background: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'custom_css' => 'yes',
                ]
             ]
          );
          $this->add_control(
            'icon_color',
             [
                'label' => __('Icon  Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .icon_caro.type_one .icon small ' => 'color: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'custom_css' => 'yes',
                ]
             ]
          );
          $this->add_control(
            'bg_icon_color',
             [
                'label' => __(' Background Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}  .icon_caro.type_one ' => 'background: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'custom_css' => 'yes',
                ]
             ]
          );
          $this->end_controls_section();
          $this->start_controls_section('icon_caro_nav_dot_css',
          [ 
              'label' => __('Owl Nav / Dots', 'creote-addons'),
              'tab' =>Controls_Manager::TAB_STYLE,
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
                  'devices' => [ 'desktop', 'tablet' ],
                  'toggle' => true,
              ]
          );
          $this->add_control(
              'hrfivety',
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
                      '{{WRAPPER}} .icon_carousel_box_all .owl_dots_block .owl-dots .owl-dot' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
                  ],
               ]
            );
          $this->add_control(
              'owl_dot_color_color',
               [
                  'label' => __('Owl Dot Border Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR, 
                   'selectors' => [
                      '{{WRAPPER}} .icon_carousel_box_all .owl_dots_block  .owl-dots .owl-dot' => 'border-color: {{VALUE}}!important;',
                  ],
               ]
            );
            $this->add_control(
              'owl_dot_color_active',
               [
                  'label' => __('Owl Dot Hover / active color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR, 
                   'selectors' => [
                      '{{WRAPPER}} .icon_carousel_box_all .owl_dots_block .owl-dots .owl-dot:hover , {{WRAPPER}} .icon_carousel_box_all .owl_dots_block .owl-dots .owl-dot.active' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
                  ],
               ]
            );
          $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
<section class="icon_carousel_box_all"> <div class="<?php echo $settings['owl_dots_block'] ?> theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 20, "autoheight":true, "lazyload":true, "nav": false, "dots": true, "autoplay": true, "autoplayTimeout": 7000, "smartSpeed": 1800, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "3" } , "1000":{ "items" : "<?php echo esc_attr($settings['items_to_display']); ?>" }}}'> <?php foreach($settings['icon_box_caro_content_v1_repeater'] as $icon_carouse_content): $target = $icon_carouse_content['link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $icon_carouse_content['link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <div class="icon_caro type_one"> 
    <div class="icon"> <?php if($icon_carouse_content['icon_image_enable'] == 'yes' && $icon_carouse_content['icon_fonts_enable'] !== 'yes' ) :
         $icon_image = isset($icon_carouse_content['icon_image']['alt']) ? $icon_carouse_content['icon_image']['alt'] : ''; 
         if(!empty($icon_image)) { $icon_image = $icon_image; }else{ $icon_image = 'image'; } ?>
          <img src="<?php echo esc_url($icon_carouse_content['icon_image']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image); ?>" /> 
          <?php endif; ?> <?php if($icon_carouse_content['icon_image_enable'] !== 'yes' && $icon_carouse_content['icon_fonts_enable'] == 'yes' ) : ?>
             <small class="<?php echo esc_html($icon_carouse_content['icon_fonts']); ?> icon_fonts"></small> 
             <?php endif; ?> </div> <div class="text"> 
                <h2>
                <?php if(!empty($icon_carouse_content['link']['url'])): ?>
                <a <?php echo esc_attr($target); ?>  <?php echo esc_attr($nofollow); ?> href="<?php echo esc_url($icon_carouse_content['link']['url']); ?>">
                    <?php echo esc_html($icon_carouse_content['icon_heading_text']); ?>
                </a>  
                <?php else: ?>
                    <?php echo esc_html($icon_carouse_content['icon_heading_text']); ?>
                <?php endif; ?>
                </h2> 
                    <p><?php echo esc_html($icon_carouse_content['icon_description']); ?></p>
                    <?php if($icon_carouse_content['read_more_enable'] == 'yes'): ?> <a href="<?php echo esc_url($icon_carouse_content['link'] ['url']); ?>" class="read_more type_one"><?php echo esc_html($icon_carouse_content['read_more_btn']); ?><span class="icon-arrow-right"></span></a> <?php endif; ?> </div> </div> <?php endforeach; ?> </div></section>
<?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_icon_box_carousel_v1());