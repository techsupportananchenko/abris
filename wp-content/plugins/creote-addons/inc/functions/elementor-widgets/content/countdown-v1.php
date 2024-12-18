<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_countdown_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-countdown-v1';
       }
       public function get_title()
       {
           return __('Count Down' , 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['102'];
       }
       protected function register_controls()
       { 
           $this->start_controls_section(
               'count_down_content',
               [
                   'label' => __('Count Down Content', 'creote-addons')
               ]
           );
           $this->add_control(
   			'logo',
   			[
   				'label' => __( 'logo', 'creote-addons' ),
   				'type' => Controls_Manager::MEDIA,
   				'default' => [
   					'url' => \Elementor\Utils::get_placeholder_image_src(),
   				], 
   			]
   		);
           $this->add_control(
               'logo_link',
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
           ]
           );  
           $this->add_control(
   			'title',
   			[
   				'label'       => esc_html__( 'Title', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( 'We are here
                   with a new concept' , 'creote-addons'),
   			]
           );
           $this->add_control(
   			'description',
   			[
   				'label'       => esc_html__( 'Description', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( 'Idea of denouncing pleasure and praising pain was born & we will give 
                   you  a complete account of system.' , 'creote-addons'),
   			]
           );
           $this->add_control(
   			'coundowntext',
   			[
   				'label'       => esc_html__( 'Date & Timinig', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( 'Feb 15 2022 23:59:59' , 'creote-addons'),
   			]
           );
           $this->end_controls_section();
       }
       protected function render()
       {
           $settings = $this->get_settings_for_display();
           $allowed_tags = wp_kses_allowed_html('post');
   ?>
<?php $target = $settings['logo_link']['is_external'] ? ' target="_blank"' : '';
   $nofollow = $settings['logo_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
<section class="counter_section"> <div class="upper_section"> <?php if(!empty($settings['logo']['url'])): ?> <div class="logo_sec"> <a href="<?php echo esc_url($settings['logo_link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>><img src="<?php echo esc_url($settings['logo']['url']); ?>" alt="logo" /></a> </div> <?php endif; ?> <div class="title"> <?php if(!empty($settings['title'])): ?> <h2><?php echo wp_kses($settings['title'], $allowed_tags); ?></h2> <?php endif; ?> <?php if(!empty($settings['description'])): ?> <p><?php echo wp_kses($settings['description'], $allowed_tags); ?></p> <?php endif; ?> </div> </div> <div class="Countdown-timer"> <div class="countdown" data-date="<?php echo esc_html($settings['coundowntext']); ?>"> <div class="item"> <span data-days><?php echo esc_html('0'); ?></span> <p><?php echo esc_html__('days' , 'creote-addons'); ?></p> <small class="cuot">:</small> </div> <div class="item"> <span data-hours><?php echo esc_html('0'); ?></span> <p><?php echo esc_html__('hours' , 'creote-addons'); ?></p> <small class="cuot">:</small> </div> <div class="item"> <span data-minutes><?php echo esc_html('0'); ?></span> <p><?php echo esc_html__('minutes' , 'creote-addons'); ?></p> <small class="cuot">:</small> </div> <div class="item"> <span data-seconds><?php echo esc_html('0'); ?></span> <p><?php echo esc_html__('seconds' , 'creote-addons'); ?></p> </div> </div> </div></section>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_countdown_v1());