<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_fun_facts_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-fun-facts-box-v1';
       }
       public function get_title()
       {
           return __('Fun Facts V1 ', 'creote-addons');
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
           $this->add_control(
               'column_count',
               [
                   'label' => __('Column Size', 'creote-addons'),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
                       'one_column'  => __('One Column', 'creote-addons'),
                       'two_column' => __('Two Column', 'creote-addons'),
                       'three_column' => __('Three Column', 'creote-addons'),
                       'four_column' => __('Four Coumn', 'creote-addons'),
                   ],
                   'default' => 'three_column',
               ]
           );
           $this->end_controls_section();
           $this->start_controls_section('fun_facts_content',
           [ 
               'label' => __('Fun Facts Content', 'creote-addons')
           ]
           );
           $repeater = new Repeater(); 
           $repeater->add_control(
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
           $repeater->add_control(
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
           $repeater->add_control(
               'icon_fonts',
               [
                   'label' => __('Icon', 'creote-addons'),
                   'type' => Controls_Manager::ICON,
                   'options' => get_creote_icon(),
                   'default' => __('tio tio-apple' , 'creote-addons'),
                    'condition' => [
                       'icon_type' => 'icon_fonts_enable',
                    ]
               ]
           );
           $repeater->add_control(
               'counter_start',
           [
               'label' => esc_html__('Counter Start', 'creote-addons'),
               'type' => Controls_Manager::TEXT,
               'default' => __('4536' , 'creote-addons'),
           ]);
           $repeater->add_control(
               'fact_heading',
               [
                   'label' => __('Heading', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('Heading', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
               ]
           );
           $repeater->add_control(
               'fact_description',
               [
                   'label' => __('Description', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('Heading', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
               ]
           );
           $repeater->add_control(
               'fact_symbols',
               [
                   'label' => __('Symbols', 'creote-addons'),
                   'type' => Controls_Manager::TEXT,
                   'default' => __('+', 'creote-addons'),
                   'placeholder' => __('Enter Your Symbols', 'creote-addons'),
               ]
           );
           $repeater->add_control(
               'trans',
               [
               'type' => Controls_Manager::DIVIDER,
               ]
           );
           $repeater->add_control(
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
             $repeater->add_responsive_control(
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
           $this->add_control(
               'fun_facts_content_repeater',
               [
                   'label' => __('facts Content Repeater', 'creote-addons'),
                   'type' => Controls_Manager::REPEATER,
                   'fields' => $repeater->get_controls(),
                   'default' => [
                       [
                           'icon_fonts_enable' => 'yes',
                           'icon_fonts' =>  __('icon-play','creote-addons'),
                           'counter_start' => __('85.45','creote-addons'),
                           'fact_heading' => __('Accuracy rate','creote-addons'),
                           'fact_description' => __('in fulfilling orders','creote-addons'),
                           'fact_symbols' => __('%','creote-addons'),
                           'transitions'  =>  __('0','creote-addons'),
                       ],
                       [
                           'icon_fonts_enable' => 'yes',
                           'icon_fonts' =>  __('icon-play','creote-addons'),
                           'counter_start' => __('12.5','creote-addons'),
                           'fact_heading' => __('On the Inc. 5000','creote-addons'),
                           'fact_description' => __('Business Deals','creote-addons'),
                           'fact_symbols' => __('M','creote-addons'),
                           'transitions'   =>  __('100','creote-addons'),
                       ],
                       [
                           'icon_fonts_enable' => 'yes',
                           'icon_fonts' =>  __('icon-play','creote-addons'),
                           'counter_start' => __('3200','creote-addons'),
                           'fact_heading' => __('Ecommerce businesses','creote-addons'),
                           'fact_description' => __('Happy customers','creote-addons'),
                           'fact_symbols' => __('+','creote-addons'),
                           'transitions'  =>  __('200','creote-addons'),
                       ], 
                       [
                           'icon_fonts_enable' => 'yes',
                           'icon_fonts' =>  __('icon-play','creote-addons'),
                           'counter_start' => __('3200','creote-addons'),
                           'fact_heading' => __('World class','creote-addons'),
                           'fact_description' => __('Service provider','creote-addons'),
                           'fact_symbols' => __('R','creote-addons'),
                           'transitions'  =>  __('300','creote-addons'),
                       ],
                   ],
                   'title_field' => '{{{ fact_heading }}}',
               ]);
           $this->end_controls_section();
       }
protected function render(){
    $settings = $this->get_settings_for_display();
    $allowed_tags = wp_kses_allowed_html('post');  
?>  
<section class="section__counter <?php echo esc_attr($settings['column_count']); ?>">
    <div class="grid_show_case grid_layout clearfix">
        <?php foreach($settings['fun_facts_content_repeater'] as $counterblock): ?>
            <?php if($settings['counter_style'] == 'style_two'): ?>
                <div class="grid_box _card">
                    <div class="counter-block style_two count-box" 
                        <?php if($counterblock['transitions_enable'] == 'yes'): ?>
                            data-aos="fade-up" data-aos-delay="<?php echo esc_html($counterblock['transitions']); ?>" data-aos-offset="0"
                        <?php endif; ?>>
                        <div class="coun_ter">
                            <span class="count-text" data-speed="1500" data-stop="<?php echo esc_attr($counterblock['counter_start']); ?>">0</span>
                            <small><?php echo esc_attr($counterblock['fact_symbols']); ?></small>
                        </div>
                        <div class="content_box">
                        <<?php echo esc_attr($settings['tag_type']); ?> class="funtitle"><?php echo esc_attr($counterblock['fact_heading']); ?>
                        </<?php echo esc_attr($settings['tag_type']); ?>>
                        </div>
                        <div class="icon_box <?php if($counterblock['icon_type'] == 'icon_fonts_enable'): ?> icon_yes <?php endif; ?>">
                            <?php if($counterblock['icon_type'] == 'icon_image_enable' && !empty($counterblock['icon_image']['url'])):
                                $icon_image = isset($counterblock['icon_image']['alt']) ? $counterblock['icon_image']['alt'] : 'image'; ?>
                                <div class="icon">
                                    <img src="<?php echo esc_url($counterblock['icon_image']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image); ?>" />
                                </div>
                            <?php endif; ?>
                            <?php if($counterblock['icon_type'] == 'icon_fonts_enable'): ?>
                                <div class="icon">
                                    <span class="<?php echo esc_html($counterblock['icon_fonts']); ?>"></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="grid_box _card">
                    <div class="counter-block style_one count-box"
                        <?php if($counterblock['transitions_enable'] == 'yes'): ?>
                            data-aos="fade-up" data-aos-delay="<?php echo esc_html($counterblock['transitions']); ?>" data-aos-offset="0"
                        <?php endif; ?>>
                        <div class="icon_box <?php if($counterblock['icon_type'] == 'icon_fonts_enable'): ?> icon_yes <?php endif; ?>">
                            <?php if($counterblock['icon_type'] == 'icon_image_enable' && !empty($counterblock['icon_image']['url'])):
                                $icon_image = isset($counterblock['icon_image']['alt']) ? $counterblock['icon_image']['alt'] : 'image'; ?>
                                <div class="icon">
                                    <img src="<?php echo esc_url($counterblock['icon_image']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image); ?>" />
                                </div>
                            <?php endif; ?>
                            <?php if($counterblock['icon_type'] == 'icon_fonts_enable'): ?>
                                <div class="icon">
                                    <span class="<?php echo esc_html($counterblock['icon_fonts']); ?>"></span>
                                </div>
                            <?php endif; ?>
                            <div class="coun_ter">
                                <span class="count-text" data-speed="1500" data-stop="<?php echo esc_attr($counterblock['counter_start']); ?>">0</span>
                                <small><?php echo esc_attr($counterblock['fact_symbols']); ?></small>
                            </div>
                        </div>
                        <div class="content_box">
                        <<?php echo esc_attr($settings['tag_type']); ?> class="funtitle"><?php echo esc_attr($counterblock['fact_heading']); ?>   </<?php echo esc_attr($settings['tag_type']); ?>>
                            <p><?php echo esc_attr($counterblock['fact_description']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>


<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_fun_facts_v1());