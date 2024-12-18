<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_timeline_v1 extends Widget_Base{ 
       public function get_name()
       {
           return 'creote-timeline-v1';
       } 
       public function get_title()
       {
           return __('Time Line V1', 'creote-addons');
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
           $this->start_controls_section('timelinesrttings',
           [ 
               'label' => __('Time Line Settings', 'creote-addons')
           ]
           ); 
           $this->add_control(
   			'time_line_style',
   			[
   				'label'   => esc_html__( 'Time Line Style', 'creote-addons' ),
   				'type'    => Controls_Manager::SELECT,
   				'default' => 'style_one',
   				'options' => array(
   					'style_one' => esc_html__( 'Style One', 'creote-addons' ),
                  'style_two' => esc_html__( 'Style Two', 'creote-addons' ),
   				),
   			]
           ); 
           $repeater = new Repeater(); 
           $repeater->add_control(
   			'image',
   			[
   				'label' => __( 'Image', 'creote-addons' ),
   				'type' => Controls_Manager::MEDIA,
   				'default' => [
   					'url' => \Elementor\Utils::get_placeholder_image_src(),
   				],
   			]
   		); 
           $repeater->add_control(
               'timeline_date',
               [
                   'label' => __('Date', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('2021', 'creote-addons'),
                   'placeholder' => __('Type Your Text here', 'creote-addons'),
               ]
           ); 
           $repeater->add_control(
               'timeline_heading',
               [
                   'label' => __('Heading', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('Pre-mining 49% of token ', 'creote-addons'),
                   'placeholder' => __('Type Your Text here', 'creote-addons'),
               ]
           );
           $repeater->add_control(
               'timeline_description',
               [
                   'label' => __('Description', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('No one rejects dislikes or avoids pleasures itself because it is pleasures, but because those who
                   pursue pleasure rationally.', 'creote-addons'),
                   'placeholder' => __('Type Your Text here', 'creote-addons'),
               ]
           );
           $repeater->add_control(
               'link_box',
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
               'timeline_content_repeater',
               [
                   'label' => __('timeline Content', 'creote-addons'),
                   'type' => Controls_Manager::REPEATER,
                   'fields' => $repeater->get_controls(),
                   'default' => [
                       [
                          'timeline_date' =>  __('2021', 'creote-addons'),
                          'timeline_heading' =>  __('New Milestone', 'creote-addons'),
                          'timeline_description' =>  __('No one rejects dislikes or avoids pleasures itself because it is pleasures, but because those who
                          pursue pleasure rationally.', 'creote-addons'),
                       ],
                       [
                           'timeline_date' =>  __('2021', 'creote-addons'),
                           'timeline_heading' =>  __('New Milestone', 'creote-addons'),
                           'timeline_description' =>  __('No one rejects dislikes or avoids pleasures itself because it is pleasures, but because those who
                           pursue pleasure rationally.', 'creote-addons'),
                        ],
                        [
                           'timeline_date' =>  __('2021', 'creote-addons'),
                           'timeline_heading' =>  __('New Milestone', 'creote-addons'),
                           'timeline_description' =>  __('No one rejects dislikes or avoids pleasures itself because it is pleasures, but because those who
                           pursue pleasure rationally.', 'creote-addons'),
                        ],
                        [
                           'timeline_date' =>  __('2021', 'creote-addons'),
                           'timeline_heading' =>  __('New Milestone', 'creote-addons'),
                           'timeline_description' =>  __('No one rejects dislikes or avoids pleasures itself because it is pleasures, but because those who
                           pursue pleasure rationally.', 'creote-addons'),
                        ],
                   ],
                   'title_field' => '{{{ timeline_heading }}}',
               ]
           ); 
           $this->add_control(
            'arrow_enable',
           [
              'label' => __('Arrow Enable', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'no',
               'condition' => [
                  'time_line_style' => 'style_two'
               ]
           ]
         ); 
         $this->end_controls_section(); 
} 
protected function render() {
$settings = $this->get_settings_for_display();
$allowed_tags = wp_kses_allowed_html('post');
$class_name = '';
   if($settings['time_line_style'] == 'style_one'):
      $class_name = 'swiper__timeline';
   elseif($settings['time_line_style'] == 'style_two'):
      $class_name = 'swiper__center_three_test';
   endif;
 ?> 
<section class="time_line_section <?php echo esc_attr($settings['time_line_style']) ?>"> <div class="swiper-container <?php echo esc_attr($class_name); ?>"> <?php if($settings['time_line_style'] == 'style_one'): ?> <div class="swiper-button-next"> <div class="border_one sme"></div> </div> <div class="swiper-button-prev"> <div class="border_two sme"></div> </div> <?php endif; ?> <div class="swiper-wrapper"> <?php foreach($settings['timeline_content_repeater'] as $timeline_content): $target = $timeline_content['link_box']['is_external'] ? ' target="_blank"' : ''; $nofollow = $timeline_content['link_box']['nofollow'] ? ' rel="nofollow"' : ''; ?> <?php if($settings['time_line_style'] == 'style_two'): ?> <div class="swiper-slide"> <div class="event_box type_two"> <div class="date_box "> <h6><?php echo wp_kses($timeline_content['timeline_date'] , $allowed_tags); ?></h6> </div> <div class="content_box "> <?php if(!empty($timeline_content['image']['url'])): $image = isset($timeline_content['image']['alt']) ? $timeline_content['image']['alt'] : ''; if(!empty($image)) { $image = $image; }else{ $image = 'image'; } ?> <div class="image"> <img src="<?php echo esc_url($timeline_content['image']['url']); ?>" alt="<?php echo esc_attr($image); ?>" /> </div> <?php endif; ?> <div class="c_box"> <h2> <a href="<?php echo esc_url($timeline_content['link_box']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>> <?php echo wp_kses($timeline_content['timeline_heading'] , $allowed_tags); ?> </a> </h2> <p> <?php echo wp_kses($timeline_content['timeline_description'] , $allowed_tags); ?></p> </div> </div> </div> </div> <?php else: ?> <div class="swiper-slide"> <div class="time_line_box"> <div class="time_inner"> <div class="border_liner"> <span></span> <span class="last"></span> </div> <div class="content"> <h2> <a href="<?php echo esc_url($timeline_content['link_box']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>> <?php echo wp_kses($timeline_content['timeline_heading'] , $allowed_tags); ?> </a> </h2> <p> <?php echo wp_kses($timeline_content['timeline_description'] , $allowed_tags); ?></p> </div> <div class="year"> <?php echo wp_kses($timeline_content['timeline_date'] , $allowed_tags); ?> </div> <?php if(!empty($timeline_content['image']['url'])): $image = isset($timeline_content['image']['alt']) ? $timeline_content['image']['alt'] : ''; if(!empty($image)) { $image = $image; }else{ $image = 'image'; } ?> <div class="image"> <img src="<?php echo esc_url($timeline_content['image']['url']); ?>" alt="<?php echo esc_attr($image); ?>" /> </div> <?php endif; ?> </div> </div> </div> <?php endif; ?> <?php endforeach; ?> </div> </div> <?php if($settings['arrow_enable'] == 'yes'): ?> <div class="position-relative"> <div class="next-single-one_three"> </div> <div class="prev-single-one_three"> </div> </div> <?php endif; ?></section>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_timeline_v1());