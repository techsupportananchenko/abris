<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_mlogo_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-logo-v1';
       }
       public function get_title()
       {
           return __('Logo', 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['100'];
       }
       protected function register_controls(){
           $this->start_controls_section('logo_settings',
           [ 
               'label' => __('Logo Content', 'creote-addons'),
               'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
           ]
           );
           $this->add_control(
               'logo_default',
           [
               'label' => __( 'Logo Default', 'creote-addons' ),
               'type' => Controls_Manager::MEDIA,
               'default' => [
                  'url' => CREOTE_ADDONS_URL . '/assets/images/logo-default.png',
               ],
           ] 
          );
          $this->add_control(
           'logo_link',
           [
               'label' => __( 'Link', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::URL,
               'placeholder' => __( 'https://your-link.com', 'creote-addons' ),
               'show_external' => true,
               'default' => [
                   'url' => '',
                   'is_external' => true,
                   'nofollow' => true,
               ],
           ]
        );
          $this->add_control(
           'logo_width',
           [
               'label' => __( 'Logo Width', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => __( '170px', 'creote-addons' ),
               'placeholder' => __( 'Enter logo width here in (px , rem and em )', 'creote-addons' ),
               'selectors' => [
                   '{{WRAPPER}} .header_logo_box_solo img' => 'width: {{VALUE}}!important;',
               ],
           ]
       );
          $this->add_control(
           'padding_logo',
           [
               'label' => __( 'Padding', 'creote-addons' ),
               'type' => Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px', '%', 'em' ],
               'selectors' => [
                   '{{WRAPPER}} .header_logo_box_solo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               ],
           ]
         );
         $this->add_control(
           'background_color',
           [
               'label' => __( 'background Color', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .header_logo_box_solo' => 'background-color: {{VALUE}}',
               ],
           ]
       );
       $this->add_control(
           'border_radius',
           [
               'label' => __( 'Border Radius', 'creote-addons' ),
               'type' => Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px', '%', 'em' ],
               'selectors' => [
                   '{{WRAPPER}} .header_logo_box_solo' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               ],
           ]
         );
         $this->add_responsive_control(
           'logo_alignments',
           [
               'label' => __('Logo alignments', 'creote-addons'),
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
                 '{{WRAPPER}} .header_logo_box_solo ' => 'text-align: {{VALUE}}!important;',
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
<div class="header_logo_box_solo">
   <a href="<?php echo esc_url(home_url()); ?>" class="logo navbar-brand">
   <img src="<?php echo esc_url($settings['logo_default']['url']); ?>" alt="<?php echo esc_html(get_bloginfo( 'name' )); ?>" class="logo_default">
   </a>
</div>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_mlogo_v1());