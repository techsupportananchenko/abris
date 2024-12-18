<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_footer_gallery_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-footer-gallery-v1';
       }
       public function get_title()
       {
           return __('Gallery V1' , 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['105'];
       }
       protected function register_controls()
       {
           $this->start_controls_section(
               'gallery_content',
               [
                   'label' => __('Gallery', 'creote-addons')
               ]
           ); 
           $repeater = new Repeater();
           $repeater->add_control(
               'image',
               [
                   'label' => __('Image', 'creote-addons'),
                   'type' => Controls_Manager::MEDIA,
                   'default' => [
                     'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
               ]
           );
           $repeater->add_control(
               'link',
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
               'gallery_repeater',
               [
                   'label' => __('Gallery Repeater', 'creote-addons'),
                   'type' => Controls_Manager::REPEATER,
                   'fields' => $repeater->get_controls(),
                   'default' => [
                       [
                           'image' => __('', 'creote-addons'),
                           'link' =>  __('#', 'creote-addons'),
                       ],
                       [
                           'image' => __('', 'creote-addons'),
                           'link' =>  __('#', 'creote-addons'),
                       ],
                   ],
                   'title_field' => __('Image', 'creote-addons'),
               ]
           );
           $this->end_controls_section();
       }
       protected function render()
       {
           $settings = $this->get_settings_for_display();
           $allowed_tags = wp_kses_allowed_html('post');
   ?>
<div class="gallery_repeater"> <ul class="items_gal"> <?php foreach($settings['gallery_repeater'] as $gallery_repeater): $target = $gallery_repeater['link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $gallery_repeater['link']['nofollow'] ? ' rel="nofollow"' : ''; $image = isset($gallery_repeater['image']['alt']) ? $gallery_repeater['image']['alt'] : ''; if(!empty($image)) { $image = $image; }else{ $image = 'image'; } ?> <li> <span class="image"> <img src="<?php echo esc_url($gallery_repeater['image']['url']); ?>" class="gal" alt="<?php echo esc_attr($image); ?>" /> <a href="<?php echo esc_url($gallery_repeater['link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>><i class="icon-chevron-right"></i></a> </span> </li> <?php endforeach; ?> </ul></div>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_footer_gallery_v1());