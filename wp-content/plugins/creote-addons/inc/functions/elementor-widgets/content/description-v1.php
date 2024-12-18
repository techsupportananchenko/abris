<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_description_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-description-v1';
       }
       public function get_title()
       {
           return __('Description V1 ' , 'creote-addons');
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
               'description_content',
               [
                   'label' => __('Description Content', 'creote-addons')
               ]
           ); 
           $this->add_responsive_control(
             'desc_alignments',
             [
                 'label' => __('Description alignments', 'creote-addons'),
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
                   '{{WRAPPER}} .description_box ' => 'text-align: {{VALUE}}!important;',
                 ],
             ]
         );  
         $this->add_control(
   			'description',
   			[
   				'label'       => esc_html__( 'Description', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
                   'default' =>  esc_html__( 'Our power of choice is untrammelled and when nothing prevents being able to do what we like best every pleasure.' , 'creote-addons'),
   			]
           );
           $this->add_responsive_control(
               'description_padding',
               [
                 'label' => __( 'Description Padding', 'creote-addons' ),
                 'type' => Controls_Manager::DIMENSIONS,
                 'size_units' => [ 'px', '%', 'em' ],
                 'selectors' => [
                   '{{WRAPPER}} .description_box p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                 ],
               ]
           );
           $this->add_responsive_control(
               'description_margin',
               [
                 'label' => __( 'Description Margin', 'creote-addons' ),
                 'type' => Controls_Manager::DIMENSIONS,
                 'size_units' => [ 'px', '%', 'em' ],
                 'selectors' => [
                   '{{WRAPPER}} .description_box p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
             $this->add_responsive_control(
               'decription_color',
                [
                   'label' => __('Description Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                    'selectors' => [
                       '{{WRAPPER}} .description_box p  ' => 'color: {{VALUE}}!important;',
                     ],
                ]
             );
          $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
              'name' => 'des_typo',
              'label' => __('Subtitle Typography ', 'creote-addons'),
              'selector' => '{{WRAPPER}} .description_box p ',
            ]
          );
        $this->end_controls_section();
       }
       protected function render()
       {
           $settings = $this->get_settings_for_display();
           $allowed_tags = wp_kses_allowed_html('post');
   ?>
<div class="description_box" <?php if($settings['transitions_enable'] == 'yes'): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" <?php endif;?>> <?php if(!empty($settings['description'])):?> <p><?php echo wp_kses($settings['description'] , $allowed_tags) ?></p> <?php endif; ?></div>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_description_v1());