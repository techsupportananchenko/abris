<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_contact_box_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-contact-box-v1';
       }
       public function get_title()
       {
           return __('Contact Box v1' , 'creote-addons');
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
   			'contact_box_content',
   			[
   				'label' => esc_html__( 'Content', 'creote-addons' ),
   			]
           );
           $this->add_control(
   			'contact_box_styles',
   			[
   				'label'   => esc_html__( 'Contact Box Style', 'creote-addons' ),
   				'type'    => Controls_Manager::SELECT,
   				'default' => 'style_one',
   				'options' => array(
   					'style_one' => esc_html__( 'Style One', 'creote-addons' ),
                    'style_two' => esc_html__( 'Style Two', 'creote-addons' ),
   				),
   			]
           );
           
           $this->add_responsive_control(
               'dark_white',
               [
                 'label' => __( 'Color Type', 'creote-addons' ),
                 'type' => Controls_Manager::SELECT,
                 'options' => [
                   'color_one' => __('Color One', 'creote-addons'), 
                   'color_two' => __('Color Two', 'creote-addons'),
                   ],
                  'default' => 'color_one',
                  'condition' => [
                   'contact_box_styles' => 'style_two',
                ]
               ]
             );
           $this->add_control(
               'icon_or_image',
               [
                   'label'   => esc_html__( 'Icon (or) Image', 'creote-addons' ),
                   'type'    => Controls_Manager::SELECT,
                   'default' => 'icon_yes',
                   'options' => array(
                       'icon_yes' => esc_html__( 'Icon', 'creote-addons' ),
                       'image_yes'  => esc_html__( 'Icon Image', 'creote-addons' ),
                   ),
               ]
           );
               $this->add_control(
                   'icon_image',
                   [
                       'label' => __('Icon Image', 'creote-addons'),
                       'type' => Controls_Manager::MEDIA,
                       'default' => [
                           'url' => CREOTE_ADDONS_URL. 'assets/images/010-job-search.png',
                         ],
                        'condition' => [
                           'icon_or_image' => 'image_yes',
                        ]
                   ]
               );
                $this->add_control(
                   'icon_fonts',
                   [
                       'label' => __('Icon Fonts', 'creote-addons'),
                       'type' => Controls_Manager::ICON,
                       'options' => get_creote_icon(),
                       'default' => __('icon-play' , 'creote-addons'),
                        'condition' => [
                           'icon_or_image' => 'icon_yes',
                        ]
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
               'description',
               [
                   'label' => __('Description', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('Phone: +98 060 712 34  &  Email: sendmail@qetus.com', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
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
?> 
<div class="contact_box_content <?php echo esc_attr($settings['contact_box_styles']); ?>" 
    <?php if ($settings['transitions_enable'] == 'yes'): ?> 
        data-aos="fade-up" 
        data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" 
        data-aos-offset="0" 
    <?php endif; ?>
>
    <?php if ($settings['contact_box_styles'] == 'style_two'): ?>
        <div class="contact_box_inner <?php echo esc_attr($settings['dark_white']); ?>">
            <?php if ($settings['icon_or_image'] == 'image_yes'):
                $icon_image = isset($settings['icon_image']['alt']) ? $settings['icon_image']['alt'] : '';
                $icon_image = !empty($icon_image) ? $icon_image : 'image'; 
            ?>
                <div class="icon_bx">
                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image); ?>" />
                </div>
            <?php elseif ($settings['icon_or_image'] == 'icon_yes'): ?>
                <div class="icon_bx">
                    <span class="<?php echo esc_html($settings['icon_fonts']); ?>"></span>
                </div>
            <?php endif; ?>
            <div class="text">
                <?php if (!empty($settings['heading'])): ?>
                    <div class="contitle"><?php echo wp_kses($settings['heading'], $allowed_tags); ?></div>
                <?php endif; ?>
                <?php if (!empty($settings['description'])): ?>
                    <p><?php echo wp_kses($settings['description'], $allowed_tags); ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php else: ?>
        <div class="contact_box_inner <?php if (!empty($settings['icon_fonts'])): ?> icon_yes <?php endif; ?>">
            <?php if ($settings['icon_or_image'] == 'image_yes'):
                $icon_image = isset($settings['icon_image']['alt']) ? $settings['icon_image']['alt'] : '';
                $icon_image = !empty($icon_image) ? $icon_image : 'image'; 
            ?>
                <div class="icon_bx">
                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image); ?>" />
                </div>
            <?php elseif ($settings['icon_or_image'] == 'icon_yes'): ?>
                <div class="icon_bx">
                    <span class="<?php echo esc_html($settings['icon_fonts']); ?>"></span>
                </div>
            <?php endif; ?>
            <div class="contnet">
                <?php if (!empty($settings['heading'])): ?>
                  <div class="contitle"><?php echo wp_kses($settings['heading'], $allowed_tags); ?></div>
                <?php endif; ?>
                <?php if (!empty($settings['description'])): ?>
                    <p><?php echo wp_kses($settings['description'], $allowed_tags); ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php 
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_contact_box_v1());