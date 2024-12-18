<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_image_box_v1_new extends Widget_Base
{
    public function get_name()
    {
        return 'creote-image-box-v2';
    }
    public function get_title()
    {
        return __('Image Box V2 ', 'creote-addons');
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
        $this->start_controls_section('image_box_one',
        [ 
            'label' => __('Image Box One', 'creote-addons')
        ]
        );
        $this->add_control(
            'image_box_style',
            [
                'label' => __('Image Box Style', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'type_one'  => __('Image Box Style One', 'creote-addons'),
                    'type_two' => __('Image Box Style Two', 'creote-addons'),
                    'type_three' => __('Image Box Style Three', 'creote-addons'),
                ],
                'default' => 'type_one',
            ]
          );
        $this->add_control(
            'higlight_text',
            [
                'label' => __('Heading', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA
            ]
        );
        $this->add_control(
            'description_text',
            [
                'label' => __('Description', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'condition' => [
                    'image_box_style' => 'type_three',
                ]
            ]
        );
        $this->add_control(
            'read_more_enable',
           [
              'label' => __('Read More Enable', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'yes',
               'condition' => [
                'image_box_style' => 'type_three',
               ]
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
                    'read_more_enable' => 'yes',
                    'image_box_style' => 'type_three',
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
                'nofollow' => true,
            ],
            'condition' => [
                'read_more_enable' => 'yes',
                'image_box_style' => 'type_three',
            ]
        ]);
        $this->add_control(
            'image_one',
            [
                'label' => __('Image One', 'creote-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'image_two',
            [
                'label' => __('Image Two', 'creote-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'image_box_style' => ['type_one' , 'type_two'] 
                ]
            ]
        );
        $this->add_control(
            'hrowlitems',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
           );
        $this->add_control(
            'video_link',
        [
            'label' => __('Video Link', 'creote-addons'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => __('https://youtu.be/RN81h85V6D4', 'creote-addons'),
            'placeholder' => __('Enter the Video Link ', 'creote-addons'),
        ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
			'custom_css_content',
			[
				'label' => __( 'Custom Css', 'plugin-name' ),
				'tab' =>Controls_Manager::TAB_CONTENT,
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
            'heading_css',
             [
                'label' => __('Text Box Background' , 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#000',
                  'selectors' => [
                    '{{WRAPPER}} .image_box.type_one .image_one .year_experience h2 , {{WRAPPER}} .image_box.type_two .quote:before' => 'background: {{VALUE}}!important;',
                  ],
                  'condition' => [
                    'custom_css' => 'yes',
                ]
             ]
          );
          $this->add_control(
            'heading_css_color',
             [
                'label' => __('Text Box Color' , 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#fff',
                  'selectors' => [
                    '{{WRAPPER}} .image_box.type_one .image_one .year_experience h2 , {{WRAPPER}} .image_box.type_two .quote h2 ,  {{WRAPPER}} .image_box.type_three .content_box h1' => 'color: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'custom_css' => 'yes',
                ]
             ]
          );
          $this->add_control(
            'read_more_color',
             [
                'label' => __('Read More Color' , 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#fff',
                  'selectors' => [
                    '{{WRAPPER}} .image_box.type_three .content_box a.read_more' => 'color: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'custom_css' => 'yes',
                    'image_box_style' => 'type_three',
                ]
             ]
          );
          $this->add_control(
            'image_box_bg',
             [
                'label' => __('Image Box Bg Color (style 2)' , 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#f8f8f8',
                  'selectors' => [
                    '{{WRAPPER}} .image_box.type_two .image.two::before' => 'background: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'custom_css' => 'yes',
                ]
             ]
          );
          $this->add_control(
            'image_box_bg_two',
             [
                'label' => __('Image Box Bg Color (style 3)' , 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#f8f8f8',
                  'selectors' => [
                    '{{WRAPPER}} .image_box.type_three .image_box:before' => 'background: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'custom_css' => 'yes',
                ]
             ]
          );
        $this->end_controls_section();
        $this->start_controls_section(
			'video_ripple_bg',
			[
				'label' => __( 'Video Icon Css', 'plugin-name' ),
				'tab' =>Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
            'video_css',
            [
                'label' => __('Video Css Enable', 'creote-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
          );
          $this->add_control(
            'video_color_two',
             [
                'label' => __('Video Button Bg Color' , 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#000',
                  'selectors' => [
                    '{{WRAPPER}} .video-inner a ' => 'background: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'video_css' => 'yes',
                ]
             ]
          );
          $this->add_control(
            'video_icon_color_two',
             [
                'label' => __('Video Button icon Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#fff',
                 'selectors' => [
                    '{{WRAPPER}} .video-inner a' => 'color: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'video_css' => 'yes',
                ]
             ]
          ); 
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?> 
<?php if($settings['image_box_style'] == 'type_two'): ?><div class="image_box_new type_two clearfix"> <div class="image_box_inner"> <?php if(!empty($settings['image_one'])): $image_one = isset($settings['image_one']['alt']) ? $settings['image_one']['alt'] : ''; if(!empty($image_one)) { $image_one = $image_one; }else{ $image_one = 'image'; } ?> <div class="image one"> <img src="<?php echo esc_url($settings['image_one']['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image_one); ?>"> <?php if(!empty($settings['video_link'])) :?> <div class="video_box video-inner text-center"> <a href="<?php echo esc_html($settings['video_link']); ?>" class="lightbox-image"><i class="icon-play"></i></a> </div> <?php endif ?> <?php if(!empty($settings['higlight_text'])):?> <div class="quote"> <h2><?php echo esc_html($settings['higlight_text']); ?></h2> </div> <?php endif ?> </div> <?php endif; ?> <?php if(!empty($settings['image_two'])): $image_two = isset($settings['image_two']['alt']) ? $settings['image_two']['alt'] : ''; if(!empty($image_two)) { $image_two = $image_two; }else{ $image_two = 'image'; } ?> <div class="image two"> <img src="<?php echo esc_url($settings['image_two']['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image_two); ?>"> </div> <?php endif; ?> </div></div><?php elseif($settings['image_box_style'] == 'type_three'): $target = $settings['link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : ''; ?><?php $image_ox_three_bg = $settings['image_one']['url']; $image_ox_three_bg_css = 'style=background:url('.$image_ox_three_bg.')'; ?><div class="image_box_new type_three" <?php echo esc_attr($image_ox_three_bg_css);?>> <div class="content_box"> <div class="row"> <div class="col-lg-7"> <div class="content_box_inner"> <?php if(!empty($settings['higlight_text'])):?> <h1><?php echo esc_html($settings['higlight_text']); ?></h1> <?php endif; ?> <?php if(!empty($settings['description_text'])):?> <p><?php echo esc_html($settings['description_text']); ?></p> <?php endif; ?> <?php if($settings['read_more_enable'] == 'yes'):?> <a href="<?php echo esc_url($settings['link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="read_more type_two"><?php echo esc_html($settings['read_more_btn']); ?><span class="icon-right-arrow"></span></a> <?php endif; ?> </div> </div> <div class="col-lg-5"> <?php if(!empty($settings['video_link'])) :?> <div class="video_box video-inner text-center"> <a href="<?php echo esc_html($settings['video_link']); ?>" class="lightbox-image"><i class="icon-play"></i></a> </div> <?php endif ?> </div> </div> </div></div><?php else: ?> <div class="image_box_new type_one clearfix"> <?php if(!empty($settings['image_one'])): $image_one = isset($settings['image_one']['alt']) ? $settings['image_one']['alt'] : ''; if(!empty($image_one)) { $image_one = $image_one; }else{ $image_one = 'image'; } ?> <div class="image_one"> <img src="<?php echo esc_url($settings['image_one']['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image_one); ?>"> <?php if(!empty($settings['higlight_text'])):?> <div class="year_experience"> <h2><?php echo esc_html($settings['higlight_text']); ?></h2> </div> <?php endif; ?> </div> <?php endif; ?> <?php if(!empty($settings['video_link'])) :?> <div class="video_box video-inner text-center"> <a href="<?php echo esc_html($settings['video_link']); ?>" class="lightbox-image"><i class="icon-play"></i></a> </div> <?php endif ?> <?php if(!empty($settings['image_two'])): $image_two = isset($settings['image_two']['alt']) ? $settings['image_two']['alt'] : ''; if(!empty($image_two)) { $image_two = $image_two; }else{ $image_two = 'image'; } ?> <div class="image_two"> <img src="<?php echo esc_url($settings['image_two']['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image_two); ?>"> </div> <?php endif; ?></div><?php endif; ?> 
<?php
    }
} 
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_image_box_v1_new());