<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_progress_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-progress-bar-v1';
       }
       public function get_title()
       {
           return __('Progress Bar V1', 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['102'];
       }
       protected function register_controls(){
           $this->start_controls_section('progress_settings',
           [ 
               'label' => __('progress Settings', 'creote-addons')
           ]
           );
           $this->add_control(
               'progress_type',
               [
                   'label' => __('Progress Bar Styles', 'creote-addons'),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
                       'type_one' => __( 'progress Style One', 'creote-addons' ),
                       'type_two' => __( 'progress Style Two', 'creote-addons' ),
                       'type_three' => __( 'progress Style Three', 'creote-addons' ),
                       'type_four' => __( 'progress Style Four', 'creote-addons' ),
   				],
                   'default' => __('type_one' , 'creote-addons'),
               ]
           );
           $this->add_control(
               'color_type',
               [
                   'label' => __('Color Type', 'creote-addons'),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
                       'color_one' => __( 'Type One', 'creote-addons' ),
                       'color_two' => __( 'Type Two', 'creote-addons' ),
   				],
                   'default' => __('color_one' , 'creote-addons'),
                   'condition' => [
                       'progress_type' => 'type_four',
                   ],
               ]
           );
           $this->add_control(
               'heading',
               [
                   'label' => __('Heading', 'creote-addons'),
                   'type' => Controls_Manager::TEXT,
                   'default' => __('Consultion', 'creote-addons'),
                   'placeholder' => __('Enter the text here', 'creote-addons'),
               ]
           );
           $this->add_control(
               'description',
               [
                   'label' => __('Description', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('Certain circumstances seds owing to the claims duty
                   righteous indignation and so beguiled.', 'creote-addons'),
                   'placeholder' => __('Enter the text here', 'creote-addons'),
                   'condition' => [
                       'progress_type' => 'type_two',
                   ],
               ]
           );
           $this->add_control(
               'extra_content',
               [
                   'label' => __('Description', 'creote-addons'),
                   'type' => Controls_Manager::TEXT,
                   'default' => __('Year of  2020', 'creote-addons'),
                   'placeholder' => __('Enter the text here', 'creote-addons'),
                   'condition' => [
                       'progress_type' => 'type_two',
                   ],
               ]
           );
           $this->add_control(
               'percentage',
               [
                   'label' => __('Percentage', 'creote-addons'),
                   'type' => Controls_Manager::NUMBER,
                   'min' => 0,
   				'max' => 100,
   				'step' => 1,
   				'default' => 70,
               ]
           );
         $this->add_control(
           'trans',
           [
           'type' => Controls_Manager::DIVIDER,
           ]
         );
         $this->add_control(
           'transitions_enable',
          [
             'label' => __('Transitions Enable', 'creote-addons'),
              'type' => Controls_Manager::SWITCHER,
              'label_on' => __('Yes', 'creote-addons'),
              'label_off' => __('No', 'creote-addons'),
              'return_value' => 'yes',
              'default' => 'no',
          ]
       );
         $this->add_responsive_control(
           'transitions',
           [
             'label' => __( 'Transitions', 'creote-addons' ),
             'type' => Controls_Manager::SELECT,
             'options' => [
               '0' => __('0ms', 'creote-addons'), 
               '100' => __('100ms', 'creote-addons'),
               '200' => __('200ms', 'creote-addons'),
               '300' => __('300ms', 'creote-addons'),
               '400' => __('400ms', 'creote-addons'),
               '500' => __('500ms', 'creote-addons'),
               '600' => __('600ms', 'creote-addons'),
               '700' => __('700ms', 'creote-addons'),
               '800' => __('800ms', 'creote-addons'),
               '900' => __('900ms', 'creote-addons'),
               '1000' => __('1000ms', 'creote-addons'),
               ],
              'default' => '0',
              'condition' => [
               'transitions_enable' => 'yes',
             ],
           ]
         );
           $this->end_controls_section();
       }
       protected function render()
       {
           $settings = $this->get_settings_for_display();
           $allowed_tags = wp_kses_allowed_html('post');
           ?> 
<?php if($settings['progress_type'] == 'type_two'): ?><div class="progress_bar style_two" <?php if($settings['transitions_enable'] == 'yes'): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" data-aos-offset="0" <?php endif;?>> <div class="progress_new"> <div class="ProgressBar ProgressBar--animateText" data-progress="<?php echo esc_attr($settings['percentage']); ?>"> <svg class="ProgressBar-contentCircle" height="170" width="170"> <circle class="ProgressBar-background" cx="85" cy="85" r="75" /> <circle transform="rotate(-90, 85, 85)" class="ProgressBar-circle" cx="85" cy="85" r="75" /> </svg> </div> <div class="progress-value"> <div> <h6><?php echo esc_attr($settings['extra_content']); ?> </h6> </div> </div> </div> <div class="content_box"> <h2><?php echo esc_attr($settings['percentage']); ?><?php echo esc_html('%' , 'creote-addons'); ?></h2> <h3><?php echo esc_attr($settings['heading']); ?> </h3> <p><?php echo esc_attr($settings['description']); ?> </p> </div></div><?php elseif($settings['progress_type'] == 'type_three'): ?><div class="progress_bar style_three" <?php if($settings['transitions_enable'] == 'yes'): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" data-aos-offset="0" <?php endif;?>> <h2><?php echo esc_attr($settings['heading']); ?> <span><?php echo esc_attr($settings['percentage']); ?><?php echo esc_html('%' , 'creote-addons'); ?></span></h2> <div class="bar"> <div class="bar-inner count-bar" data-percent="<?php echo esc_attr($settings['percentage']); ?>%"></div> </div></div><?php elseif($settings['progress_type'] == 'type_four'): ?><div class="progress_bar style_four <?php echo esc_attr($settings['color_type']); ?>" <?php if($settings['transitions_enable'] == 'yes'): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" data-aos-offset="0" <?php endif;?>> <div class="progress_new"> <div class="ProgressBar ProgressBar--animateText" data-progress="<?php echo esc_attr($settings['percentage']); ?>"> <svg class="ProgressBar-contentCircle" height="140" width="140"> <circle class="ProgressBar-background" cx="70" cy="70" r="60" /> <circle transform="rotate(-90, 70, 70)" class="ProgressBar-circle" cx="70" cy="70" r="60" /> </svg> </div> <div class="progress-value"> <h6><?php echo esc_attr($settings['percentage']); ?><?php echo esc_html('%' , 'creote-addons'); ?></h6> </div> </div> <div class="content_box"> <h2><?php echo esc_attr($settings['heading']); ?> </h2> </div></div><?php else: ?> <div class="progress_bar" <?php if($settings['transitions_enable'] == 'yes'): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" data-aos-offset="0" <?php endif;?>> <h2><?php echo esc_attr($settings['heading']); ?> <span><?php echo esc_attr($settings['percentage']); ?><?php echo esc_html('%' , 'creote-addons'); ?></span></h2> <div class="bar"> <div class="bar-inner count-bar" data-percent="<?php echo esc_attr($settings['percentage']); ?>%"></div> </div></div><?php endif; ?>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_progress_v1());