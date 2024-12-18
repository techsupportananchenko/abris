<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_fun_facts_v2 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-fun-facts-box-v2';
       }
       public function get_title()
       {
           return __('Fun Facts V2 ', 'creote-addons');
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
           $this->start_controls_section('counter_setting',
           [ 
               'label' => __('Fun Facts Settings', 'creote-addons')
           ]
           );
           $this->add_control(
               'counter_style',
               [
                   'label' => __('Fun Facts style', 'creote-addons'),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
                       'style_one' => __('counter Type one ', 'creote-addons'),
                       'style_two' => __('counter Type Two ', 'creote-addons'),
                       'style_three' => __('counter Type Three ', 'creote-addons'),
                   ],
                   'default' => 'style_one',
               ]
           );
           $this->add_control(
            'tag_type',
            [
            'label' => __('Title Tag', 'luxride-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'div' => __( 'Div Tag', 'luxride-addons' ),
                'h1' => __( 'H1 Tag', 'luxride-addons' ),
                'h2' => __( 'H2 Tag', 'luxride-addons' ),
                'h3' => __( 'H3 Tag', 'luxride-addons' ),
                'h4' => __( 'H4 Tag', 'luxride-addons' ),
                'h5' => __( 'H5 Tag', 'luxride-addons' ),
                'h6' => __( 'H6 Tag', 'luxride-addons' ),
            ],
            'default' => 'h2' , 
            ]
        ); 
           $this->end_controls_section();
           $this->start_controls_section('fun_facts_content',
           [ 
               'label' => __('Fun Facts Content', 'creote-addons')
           ]
           );
           $this->add_control(
               'icon_type',
               [
                   'label' => __('Icon Font  / Icon Image ', 'creote-addons'),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
                       'icon_fonts_enable' => __( 'Icon Font Type', 'creote-addons' ),
                       'icon_image_enable' => __( 'Icon Image Type', 'creote-addons' ),
                    ],
                   'default' => __('icon_fonts_enable' , 'creote-addons'),
               ]
           );
           $this->add_control(
               'icon_image',
               [
                   'label' => __('Icon Image', 'creote-addons'),
                   'type' => Controls_Manager::MEDIA,
                   'default' => [
                       'url' => CREOTE_ADDONS_URL . 'inc/core-widgets/images/fun-fact-1.svg',
                     ],
                    'condition' => [
                       'icon_type' => 'icon_image_enable',
                    ]
               ]
           ); 
           $this->add_control(
               'icon_fonts',
               [
                   'label' => __('Icon', 'creote-addons'),
                   'type' => Controls_Manager::ICON,
                   'options' => get_creote_icon(),
                   'default' => __('icon-play' , 'creote-addons'),
                    'condition' => [
                       'icon_type' => 'icon_fonts_enable',
                    ]
               ]
           );
           $this->add_control(
               'counter_start',
           [
               'label' => esc_html__('Counter Start', 'creote-addons'),
               'type' => Controls_Manager::TEXT,
               'default' => __('4536' , 'creote-addons'),
           ]);
           $this->add_control(
               'fact_heading',
               [
                   'label' => __('Heading', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('Heading', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
               ]
           );
           $this->add_control(
               'fact_description',
               [
                   'label' => __('Description', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('Heading', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
               ]
           );
           $this->add_control(
               'fact_symbols',
               [
                   'label' => __('Symbols', 'creote-addons'),
                   'type' => Controls_Manager::TEXT,
                   'default' => __('+', 'creote-addons'),
                   'placeholder' => __('Enter Your Symbols', 'creote-addons'),
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
                  'default' => 'yes',
              ]
           );
             $this->add_responsive_control(
               'transitions',
               [
                 'label' => __( 'Transitions', 'creote-addons' ),
                 'type' => Controls_Manager::SELECT,
                 'options' => [
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
                  'default' => '100',
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
<section class="section__counter">
    <?php if ($settings['counter_style'] == 'style_two'): ?>
        <div class="counter-block style_two count-box"
            <?php if ($settings['transitions_enable'] == 'yes'): ?>
                data-aos="fade-up" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" data-aos-offset="0"
            <?php endif; ?>>
            <div class="coun_ter">
                <span class="count-text" data-speed="1500" data-stop="<?php echo esc_attr($settings['counter_start']); ?>">0</span>
                <small><?php echo esc_attr($settings['fact_symbols']); ?></small>
            </div>
            <div class="content_box">
            <<?php echo esc_attr($settings['tag_type']); ?> class="funtitle"><?php echo wp_kses($settings['fact_heading'], $allowed_tags); ?></<?php echo esc_attr($settings['tag_type']); ?>>
            </div>
            <div class="icon_box <?php if ($settings['icon_type'] == 'icon_fonts_enable'): ?> icon_yes <?php endif; ?>">
                <?php if ($settings['icon_type'] == 'icon_image_enable'): ?>
                    <?php if (!empty($settings['icon_image']['url'])):
                        $icon_image = isset($settings['icon_image']['alt']) ? $settings['icon_image']['alt'] : 'image'; ?>
                        <div class="icon">
                            <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image); ?>" />
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($settings['icon_type'] == 'icon_fonts_enable'): ?>
                    <div class="icon">
                        <span class="<?php echo esc_html($settings['icon_fonts']); ?>"></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php elseif ($settings['counter_style'] == 'style_three'): ?>
        <div class="counter-block style_three count-box"
            <?php if ($settings['transitions_enable'] == 'yes'): ?>
                data-aos="fade-up" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" data-aos-offset="0"
            <?php endif; ?>>
            <div class="icon_box <?php if ($settings['icon_type'] == 'icon_fonts_enable'): ?> icon_yes <?php endif; ?>">
                <?php if ($settings['icon_type'] == 'icon_image_enable'):
                    $icon_image = isset($settings['icon_image']['alt']) ? $settings['icon_image']['alt'] : 'image'; ?>
                    <div class="icon">
                        <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image); ?>" />
                    </div>
                <?php endif; ?>
                <?php if ($settings['icon_type'] == 'icon_fonts_enable'): ?>
                    <div class="icon">
                        <span class="<?php echo esc_html($settings['icon_fonts']); ?>"></span>
                    </div>
                <?php endif; ?>
            </div>
            <div class="content_box">
                <?php if (!empty($settings['fact_description'])): ?>
                    <p><?php echo wp_kses($settings['fact_description'], $allowed_tags); ?></p>
                <?php endif; ?>
                <<?php echo esc_attr($settings['tag_type']); ?> class="funtitle">
                    <div class="coun_ter">
                        <span class="count-text" data-speed="1500" data-stop="<?php echo esc_attr($settings['counter_start']); ?>">0</span>
                        <small><?php echo esc_attr($settings['fact_symbols']); ?></small>
                    </div>
                    <?php echo wp_kses($settings['fact_heading'], $allowed_tags); ?>
                    </<?php echo esc_attr($settings['tag_type']); ?>>
            </div>
        </div>
    <?php else: ?>
        <div class="counter-block style_one count-box"
            <?php if ($settings['transitions_enable'] == 'yes'): ?>
                data-aos="fade-up" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" data-aos-offset="0"
            <?php endif; ?>>
            <div class="icon_box <?php if ($settings['icon_type'] == 'icon_fonts_enable'): ?> icon_yes <?php endif; ?>">
                <?php if ($settings['icon_type'] == 'icon_image_enable'):
                    $icon_image = isset($settings['icon_image']['alt']) ? $settings['icon_image']['alt'] : 'image'; ?>
                    <div class="icon">
                        <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image); ?>" />
                    </div>
                <?php endif; ?>
                <?php if ($settings['icon_type'] == 'icon_fonts_enable'): ?>
                    <div class="icon">
                        <span class="<?php echo esc_html($settings['icon_fonts']); ?>"></span>
                    </div>
                <?php endif; ?>
                <div class="coun_ter">
                    <span class="count-text" data-speed="1500" data-stop="<?php echo esc_attr($settings['counter_start']); ?>">0</span>
                    <small><?php echo esc_attr($settings['fact_symbols']); ?></small>
                </div>
            </div>
            <div class="content_box">
                <?php if (!empty($settings['fact_heading'])): ?>
                    <<?php echo esc_attr($settings['tag_type']); ?> class="funtitle"><?php echo wp_kses($settings['fact_heading'], $allowed_tags); ?></<?php echo esc_attr($settings['tag_type']); ?>>
                <?php endif; ?>
                <?php if (!empty($settings['fact_description'])): ?>
                    <p><?php echo wp_kses($settings['fact_description'], $allowed_tags); ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</section>

<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_fun_facts_v2());