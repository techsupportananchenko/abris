<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_widget_title_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-widget-title-v1';
       }
       public function get_title()
       {
           return __('Widget Title v1' , 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['105'];
       }
       protected function register_controls() {
   		$this->start_controls_section(
   			'widget_title_stlye',
   			[
   				'label' => esc_html__( 'Title Content', 'creote-addons' ),
   			]
           );
           $this->add_control(
               'widget_style',
               [
                 'label' => __('Title Styles', 'creote-addons'),
                 'type' => Controls_Manager::SELECT,
                 'options' => [
                   'style_one' => __( 'Style One', 'creote-addons' ),
                   'style_two' => __( 'Style Two', 'creote-addons' ),
                   ],
                   'default' => __('style_one' , 'creote-addons'),
                 ]
           );
           $this->add_control(
               'widget_title',
               [
                   'label' => __('Widget Title', 'creote-addons'),
                   'type' => Controls_Manager::TEXT,
                   'default' => __('Get In Touch', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
               ]
           ); 
           $this->add_control(
               'widget_title_color',
               [
                   'label' => __( 'Title Color', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .footer_widgets .fo_wid_title h2' => 'color: {{VALUE}}',
                   ],
               ]
           );
         $this->end_controls_section();
   	}
       protected function render() {
   		$settings = $this->get_settings_for_display();
           $allowed_tags = wp_kses_allowed_html('post');
   		?>
<?php if(!empty($settings['widget_title'])):?>
<div class="footer_widgets wid_tit <?php echo esc_attr($settings['widget_style']); ?>">
   <div class="fo_wid_title">
      <h2><?php echo wp_kses($settings['widget_title'] , $allowed_tags) ?></h2>
   </div>
</div>
<?php endif; ?>   
<?php 
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_widget_title_v1());