<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_moving_imagev1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-moving-image-v1';
       }
       public function get_title()
       {
           return __('Moving Image V1' , 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['102'];
       }
       protected function register_controls() {
           $this->start_controls_section(
               'moving_image_content',
               [
                   'label' => __('Image Content', 'creote-addons')
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
   		'width',
   		[
   		'label'       => esc_html__( 'Image Width', 'creote-addons' ),
   		'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( '500px' , 'creote-addons'),
           'selectors' => [
               '{{WRAPPER}} .move_image_absolute img  , {{WRAPPER}} .move_image_absolute' => 'width: {{VALUE}}!important;',
           ],
       ]);
       $this->add_control(
   		'height',
   		[
   		'label'       => esc_html__( 'Image Height', 'creote-addons' ),
   		'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( '500px' , 'creote-addons'),
           'selectors' => [
               '{{WRAPPER}} .move_image_absolute img , {{WRAPPER}} .move_image_absolute' => 'height: {{VALUE}}!important;',
           ],
       ]);
        $this->add_control(
           'top_enable',
          [
             'label' => __('Top Enable', 'creote-addons'),
              'type' => Controls_Manager::SWITCHER,
              'label_on' => __('Yes', 'creote-addons'),
              'label_off' => __('No', 'creote-addons'),
              'return_value' => 'yes',
              'default' => 'yes',
          ]
        );
        $this->add_control(
   		'top',
   		[
   		'label'       => esc_html__( 'Move Top', 'creote-addons' ),
   		'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( '0px' , 'creote-addons'),
           'condition' => [
               'top_enable' => 'yes',
           ],
           'selectors' => [
               '{{WRAPPER}} .move_image_absolute ' => 'top: {{VALUE}}!important;',
           ],
       ]);
       $this->add_control(
           'left_enable',
          [
             'label' => __('Left Enable', 'creote-addons'),
              'type' => Controls_Manager::SWITCHER,
              'label_on' => __('Yes', 'creote-addons'),
              'label_off' => __('No', 'creote-addons'),
              'return_value' => 'yes',
              'default' => 'yes',
          ]
        );
        $this->add_control(
   		'left',
   		[
   		'label'       => esc_html__( 'Move Left', 'creote-addons' ),
   		'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( '0px' , 'creote-addons'),
           'condition' => [
               'left_enable' => 'yes',
           ],
           'selectors' => [
               '{{WRAPPER}} .move_image_absolute ' => 'left: {{VALUE}}!important;',
           ],
       ]);
       $this->add_control(
           'right_enable',
          [
             'label' => __('Right Enable', 'creote-addons'),
              'type' => Controls_Manager::SWITCHER,
              'label_on' => __('Yes', 'creote-addons'),
              'label_off' => __('No', 'creote-addons'),
              'return_value' => 'yes',
              'default' => 'no',
          ]
        );
        $this->add_control(
   		'right',
   		[
   		'label'       => esc_html__( 'Move Right', 'creote-addons' ),
   		'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( '0px' , 'creote-addons'),
           'condition' => [
               'right_enable' => 'yes',
           ],
           'selectors' => [
               '{{WRAPPER}} .move_image_absolute ' => 'right: {{VALUE}}!important;',
           ],
       ]);
       $this->add_control(
           'bottom_enable',
          [
             'label' => __('Bottom Enable', 'creote-addons'),
              'type' => Controls_Manager::SWITCHER,
              'label_on' => __('Yes', 'creote-addons'),
              'label_off' => __('No', 'creote-addons'),
              'return_value' => 'yes',
              'default' => 'no',
          ]
        );
        $this->add_control(
   		'bottom',
   		[
   		'label'       => esc_html__( 'Move Bottom', 'creote-addons' ),
   		'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( '0px' , 'creote-addons'),
           'condition' => [
               'bottom_enable' => 'yes',
           ],
           'selectors' => [
               '{{WRAPPER}} .move_image_absolute ' => 'bottom: {{VALUE}}!important;',
           ],
       ]);
           $this->end_controls_section();
       }
       protected function render()
       {
           $settings = $this->get_settings_for_display();
   ?>
 <div class="move_image_absolute"> <?php if(!empty($settings['image']['url'])): $image = isset($settings['image']['alt']) ? $settings['image']['alt'] : ''; if(!empty($image)) { $image = $image; }else{ $image = 'image'; } ?> <img src="<?php echo esc_url($settings['image']['url']); ?>" class="class-fluid" alt="<?php echo esc_attr($image); ?>" /> <?php endif; ?></div> 
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_moving_imagev1());