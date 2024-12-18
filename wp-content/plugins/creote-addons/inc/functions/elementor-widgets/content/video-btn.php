<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_video_btn_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-videobtns-v1';
       }
       public function get_title()
       {
           return __('Video Button' , 'creote-addons');
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
               'video_btn_content',
               [
                   'label' => __('Video Button Content', 'creote-addons')
               ]
           );
           $this->add_control(
               'video_button_link',
           [
               'label' => __('Video Link', 'creote-addons'),
               'type' => Controls_Manager::URL,
               'placeholder' => __('https://www.youtube.com/71EZb94AS1k', 'creote-addons'),
               'show_external' => true,
               'default' => [
                   'url' => 'https://www.youtube.com/71EZb94AS1k',
                   'is_external' => true,
                   'nofollow' => true,
               ],
           ]
           );  
           $this->add_responsive_control(
             'video_alignments',
             [
                 'label' => __('Video alignments', 'creote-addons'),
                 'type' => Controls_Manager::CHOOSE,
                 'options' => [
                   'left' => [
                     'title' => __( 'Text Left', 'creote-addons' ),
                     'icon' => 'fa fa-align-left',
                   ],
                   'center' => [
                     'title' => __( 'Text Center', 'creote-addons' ),
                     'icon' => 'fa fa-align-center',
                   ],
                   'right' => [
                     'title' => __( 'Text Right', 'creote-addons' ),
                     'icon' => 'fa fa-align-right',
                   ],
                 ],
                 'default' => 'center',
                 'toggle' => true,
                 'selectors' => [
                   '{{WRAPPER}} .video_btn_all ' => 'text-align: {{VALUE}}!important;',
                 ],
             ]
         );
           $this->add_control(
               'video_btn_icon',
                [
                   'label' => __('Icon Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .video_btn_all .video_box  a  ' => 'color: {{VALUE}}!important;',
                   ],
                ]
             );
             $this->add_control(
               'video_btn_bg',
                [
                   'label' => __('Background Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                    'selectors' => [
                       '{{WRAPPER}} .video_box a ' => 'background-color: {{VALUE}}!important;', 
                     ],
                ]
             );
             $this->add_control(
               'video_btn_bg_ripple',
                [
                   'label' => __('Ripple Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                    'selectors' => [
                       '{{WRAPPER}} .video_box:before  ' => 'background: {{VALUE}}!important;', 
                     ],
                ]
             );
             $this->add_control(
               'video_btn_bg_ripple_two',
                [
                   'label' => __('Ripple Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                    'selectors' => [
                       '{{WRAPPER}}   .video_box:after ' => 'background: {{VALUE}}!important;', 
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
<div class="video_btn_all">
   <div class="video_box">
      <a href="<?php echo esc_attr($settings['video_button_link']['url']); ?>" class="lightbox-image"><i class="icon-play"></i></a>
   </div>
</div>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_video_btn_v1());