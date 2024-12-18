<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_image_box_v3_new extends Widget_Base
{
    public function get_name()
    {
        return 'creote-image-box-v3-new';
    }
    public function get_title()
    {
        return __('Image Box V3', 'creote-addons');
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
        $this->start_controls_section('image_box_two',
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
                ],
                'default' => 'type_one',
            ]
          );
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
            ]
        );
        $this->add_control(
            'image_three',
            [
                'label' => __('Image Three', 'creote-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                     'image_box_style' => 'type_one'
                ]
            ]
        );
        $this->add_control(
            'hrowlitemsfour',
            [
                'type' => Controls_Manager::DIVIDER,
                'condition' => [
                    'image_box_style' => 'type_two'
               ]
            ]
           );
        $this->add_control(
            'heading',
            [
                'label' => __('Heading', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' =>   __('Business Analysis', 'creote-addons'),
                'condition' => [
                    'image_box_style' => 'type_two'
               ]
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => __('Description', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' =>   __('Expectional business model', 'creote-addons'),
                'condition' => [
                    'image_box_style' => 'type_two'
               ]
            ]
        );
        $this->add_control(
            'progress_bar_number',
            [
                'label' => __('Progress Bar Percentage', 'creote-addons'),
                'type'    => Controls_Manager::NUMBER,
				'default' => 10,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
            ]
        );
        $this->add_control(
            'hrowlitems',
            [
                'type' => Controls_Manager::DIVIDER,
                'condition' => [
                    'image_box_style' => 'type_one'
               ]
            ]
           );
        $this->add_control(
            'video_link',
        [
            'label' => __('Video Link', 'creote-addons'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => __('https://youtu.be/RN81h85V6D4, making it look like readable English', 'creote-addons'),
            'placeholder' => __('Enter the Video Link ', 'creote-addons'),
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
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'Video Button Ripple Color', 'creote-addons' ),
                'selector' =>  '{{WRAPPER}} .video-inner a:after , .video-inner a:before ',
                'condition' => [
                    'video_css' => 'yes',
                ]
			]
		);
        $this->end_controls_section();
    }
    protected function render(){
    $settings = $this->get_settings_for_display();    
    ?> 
    <?php if($settings['image_box_style'] == 'type_two'): ?> <div class="image_box_new clearfix type_five"> <div class="left"> <?php if(!empty($settings['image_one'])): $image_one = isset($settings['image_one']['alt']) ? $settings['image_one']['alt'] : ''; if(!empty($image_one)) { $image_one = $image_one; }else{ $image_one = 'image'; } ?> <div class="image one"> <img src="<?php echo esc_url($settings['image_one']['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image_one); ?>"> </div> <?php endif; ?> </div> <div class="right"> <?php if(!empty($settings['image_two'])): $image_two = isset($settings['image_two']['alt']) ? $settings['image_two']['alt'] : ''; if(!empty($image_two)) { $image_two = $image_two; }else{ $image_two = 'image'; } ?> <div class="image two"> <img src="<?php echo esc_url($settings['image_two']['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image_two); ?>"> </div> <?php endif; ?> <div class="card"> <div class="percent"> <svg> <circle cx="105" cy="105" r="100"></circle> <circle cx="105" cy="105" r="100" style="--percent: <?php echo esc_html($settings['progress_bar_number']); ?>"></circle> </svg> <div class="number"> <h3><?php echo esc_html($settings['progress_bar_number']); ?><span><?php echo esc_html('%' , 'creote-addons'); ?></span></h3> </div> </div> <div class="title text-center"> <?php if(!empty($settings['heading'])):?> <h2><?php echo esc_html($settings['heading']); ?></h2> <?php endif; ?> <?php if(!empty($settings['description'])):?> <p><?php echo esc_html($settings['description']); ?></p> <?php endif; ?> </div></div> </div></div> <?php else: ?> <div class="image_box_new clearfix type_four"> <div class="left"> <?php if(!empty($settings['image_one'])): $image_one = isset($settings['image_one']['alt']) ? $settings['image_one']['alt'] : ''; if(!empty($image_one)) { $image_one = $image_one; }else{ $image_one = 'image'; } ?> <div class="image one"> <img src="<?php echo esc_url($settings['image_one']['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image_one); ?>"> </div> <?php endif; ?> <?php if(!empty($settings['image_two'])): $image_two = isset($settings['image_two']['alt']) ? $settings['image_two']['alt'] : ''; if(!empty($image_two)) { $image_two = $image_two; }else{ $image_two = 'image'; } ?> <div class="image two"> <img src="<?php echo esc_url($settings['image_two']['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image_two); ?>"> </div> <?php endif; ?> </div> <?php if(!empty($settings['video_link'])) :?> <div class="video_box video-inner text-center"> <a href="<?php echo esc_html($settings['video_link']); ?>" class="lightbox-image"> <i class="icon-play"></i> </a> </div> <?php endif; ?> <div class="right"> <?php if(!empty($settings['image_three'])): $image_three = isset($settings['image_three']['alt']) ? $settings['image_three']['alt'] : ''; if(!empty($image_three)) { $image_three = $image_three; }else{ $image_three = 'image'; } ?> <div class="image three"> <img src="<?php echo esc_url($settings['image_three']['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image_three); ?>"> </div> <?php endif; ?> </div></div><?php endif; ?>
<?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_image_box_v3_new());