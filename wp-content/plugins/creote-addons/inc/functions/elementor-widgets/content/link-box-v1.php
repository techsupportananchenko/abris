<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_link_box_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-link-box-v1';
       }
       public function get_title()
       {
           return __('Link Box v1' , 'creote-addons');
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
   			'link_box_content',
   			[
   				'label' => esc_html__( 'Content', 'creote-addons' ),
   			]
           );
           $this->add_control(
   			'link_box_styles',
   			[
   				'label'   => esc_html__( 'LinkZ Box Style', 'creote-addons' ),
   				'type'    => Controls_Manager::SELECT,
   				'default' => 'style_one',
   				'options' => array(
   					'style_one' => esc_html__( 'Style One', 'creote-addons' ),
                       'style_two' => esc_html__( 'Style Two', 'creote-addons' ),
   				),
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
               'heading',
               [
                   'label' => __('Heading', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('General Enquires', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
               ]
           );
           $this->add_control(
               'link_text',
               [
                   'label' => __('Link Text', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('Get Appointment', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
               ]
           ); 
           $this->add_control(
               'read_link',
           [
               'label' => __('Link', 'creote-addons'),
               'type' => Controls_Manager::URL,
               'placeholder' => __('https://your-link.com', 'creote-addons'),
               'show_external' => true,
               'default' => [
                   'url' => '#',
                   'is_external' => false,
                   'nofollow' => false,
               ],
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
              'default' => 'yes',
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
       protected function render() {
   		$settings = $this->get_settings_for_display();
           $allowed_tags = wp_kses_allowed_html('post');
           $target = $settings['read_link']['is_external'] ? ' target="_blank"' : '';
           $nofollow = $settings['read_link']['nofollow'] ? ' rel="nofollow"' : ''; 
   		?>
<div class="link_box_contents <?php echo esc_attr($settings['link_box_styles']); ?>" <?php if($settings['transitions_enable'] == 'yes'): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" data-aos-offset="0" <?php endif;?>> <?php if($settings['link_box_styles'] == 'style_two'): ?> <div class="link_content_bx"> <div class="con_box"> <h2><?php echo wp_kses($settings['heading'] , $allowed_tags); ?></h2> <a href="<?php echo esc_url($settings['read_link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>><?php echo wp_kses($settings['link_text'] , $allowed_tags); ?> <i class="icon-right-arrow-long"></i></a> </div> <?php if(!empty($settings['image'])): $image = isset($settings['image']['alt']) ? $settings['image']['alt'] : ''; if(!empty($image)) { $image = $image; }else{ $image = 'image'; } ?> <div class="image_box"> <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr($image); ?>" /> </div> <?php endif; ?> </div> <?php else: ?> <div class="link_content_bx"> <?php if(!empty($settings['image'])): $image = isset($settings['image']['alt']) ? $settings['image']['alt'] : ''; if(!empty($image)) { $image = $image; }else{ $image = 'image'; } ?> <div class="image_box"> <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr($image); ?>" /> </div> <?php endif; ?> <div class="con_box"> <h2><?php echo wp_kses($settings['heading'] , $allowed_tags); ?></h2> <a href="<?php echo esc_url($settings['read_link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>><?php echo wp_kses($settings['link_text'] , $allowed_tags); ?> <i class="icon-right-arrow-long"></i></a> </div> </div> <?php endif; ?></div>
<?php 
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_link_box_v1());