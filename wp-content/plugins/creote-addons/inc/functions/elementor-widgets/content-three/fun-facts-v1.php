<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_fun_facts_v1_new extends Widget_Base
{
    public function get_name()
    {
        return 'creote-fun-facts-box-v2-new';
    }
    public function get_title()
    {
        return __('Fun Facts V2 ', 'creote-addons');
    }
    public function get_icon()
    {
        return 'icon-c';
    }
    public function get_categories()
    {
        return ['104'];
    }
    protected function register_controls(){
        $this->start_controls_section('funfacts_setting',
        [ 
            'label' => __('Fun Facts Settings', 'creote-addons')
        ]
        );
        $this->add_control(
            'funfacts_style',
            [
                'label' => __('Fun Facts style', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'type_one' => __('Funfacts Type one ', 'creote-addons'),
                    'type_two' => __('Funfacts Type Two ', 'creote-addons'),
                ],
                'default' => 'type_one',
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
                    'col-xl-12'  => __('One Column', 'creote-addons'),
                    'col-xl-6 col-md-6 col-sm-6 col-xs-12' => __('Two Column', 'creote-addons'),
                    'col-xl-4 col-md-6 col-sm-6 col-xs-12' => __('Three Column', 'creote-addons'),
                    'col-xl-3 col-md-6 col-sm-6 col-xs-12' => __('Four Coumn', 'creote-addons'),
                ],
                'default' => 'col-xl-4 col-md-6 col-sm-6 col-xs-12',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section('fun_facts_content',
        [ 
            'label' => __('Fun Facts Content', 'creote-addons')
        ]
        );
        $this->add_control(
            'icon_image_enable',
           [
              'label' => __('Icon Image Enable', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'no',
           ]
        );
        $this->add_control(
            'icon_image',
            [
                'label' => __('Icon Image', 'creote-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                  ],
                 'condition' => [
                    'icon_image_enable' => 'yes',
                 ]
            ]
        );
        $this->add_control(
            'icon_fonts_enable',
           [
              'label' => __('Icon Enable', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'yes',
           ]
        );
        $this->add_control(
            'icon_fonts',
            [
                'label' => __('Icon', 'creote-addons'),
                'type' => Controls_Manager::SELECT2,
                'options' => get_creote_icon(),
                'default' => __('fa fa-ban' , 'creote-addons'),
                 'condition' => [
                    'icon_fonts_enable' => 'yes',
                 ]
            ]
        );
        $this->add_control(
            'counter_start',
        [
            'label' => esc_html__('Counter Stop', 'creote-addons'),
            'type' => Controls_Manager::TEXT,
            'default' => __('4536' , 'creote-addons'),
        ]);
        $this->add_control(
            'counter_stop',
        [
            'label' => esc_html__('Counter Start', 'creote-addons'),
            'type' => Controls_Manager::TEXT,
            'default' => __('536' , 'creote-addons'),
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
        $this->end_controls_section();
        $this->start_controls_section('funfacts_box_css',
        [ 
            'label' => __('Custom Css', 'creote-addons'),
            'tab' =>Controls_Manager::TAB_STYLE,
        ]
        );
        $this->add_control(
            'custom_css',
            [
                'label' => __('Custom Css Enable', 'creote-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
          );
          $this->add_control(
            'hrtwo',
            [
                'type' => Controls_Manager::DIVIDER,
                'condition' => [
                    'custom_css' => 'yes',
                ]
            ]
        );
        $this->add_control(
            'fun_heading_color',
             [
                'label' => __('Funfacts Title Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#000',
                 'selectors' => [
                    '{{WRAPPER}} .fun_facts_box.type_one .content_box h2 , {{WRAPPER}} .fun_facts_box.type_two .upper_content .text_box h2  ' => 'color: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'custom_css' => 'yes',
                ]
             ]
          );
          $this->add_control(
            'fun_description_color',
             [
                'label' => __('Funfacts Description Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#888',
                 'selectors' => [
                    '{{WRAPPER}} .fun_facts_box.type_one .content_box p , {{WRAPPER}} .fun_facts_box.type_two .content_box p  ' => 'color: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'custom_css' => 'yes',
                ]
             ]
          );
          $this->add_control(
            'fun_icon_color',
             [
                'label' => __('Funfacts Icon Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#fff',
                 'selectors' => [
                    '{{WRAPPER}} .fun_facts_box.type_one .icon_bx small , {{WRAPPER}} .fun_facts_box.type_two .upper_content .icon_bx small ' => 'color: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'custom_css' => 'yes',
                ]
             ]
          );
          $this->add_control(
            'fun_icon_color_bg',
             [
                'label' => __('Funfacts Icon Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#000',
                 'selectors' => [
                    '{{WRAPPER}} .fun_facts_box.type_one .icon_bx small ' => 'background: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'custom_css' => 'yes',
                ]
             ]
          );
        $this->add_control(
            'fun_count_color',
             [
                'label' => __('Funfacts Count Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#000',
                 'selectors' => [
                    '{{WRAPPER}} .fun_facts_box.type_one .content_box h6 span  , {{WRAPPER}} .fun_facts_box.type_two .upper_content .text_box h6 span  ' => 'color: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'custom_css' => 'yes',
                ]
             ]
          );
          $this->add_control(
            'fun_count_symbol_color',
             [
                'label' => __('Funfacts Count Symbol Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#f4313f',
                 'selectors' => [
                    '{{WRAPPER}} .fun_facts_box.type_one .content_box h6  , {{WRAPPER}} .fun_facts_box.type_two .upper_content .text_box h6 ' => 'color: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'custom_css' => 'yes',
                ]
             ]
          );
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
 ?>
<?php if($settings['funfacts_style'] == 'type_two'): ?>
    <div class="fun_facts_box type_two count-box">
        <div class="upper_content clearfix">
            <div class="icon_bx">
                <?php if($settings['icon_image_enable'] == 'yes' && $settings['icon_fonts_enable'] !== 'yes' ): ?>
                    <?php if(!empty($settings['icon_image'])):
                        $icon_image = isset($settings['icon_image']['alt']) ? $settings['icon_image']['alt'] : 'image'; ?>
                        <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image); ?>" />
                    <?php endif; ?>
                <?php endif; ?>
                <?php if($settings['icon_image_enable'] !== 'yes' && $settings['icon_fonts_enable'] == 'yes' ): ?>
                    <small class="<?php echo esc_html($settings['icon_fonts']); ?> icon"></small>
                <?php endif; ?>
            </div>
            <div class="text_box">
                <div class="cownt">
                    <span class="count-text" data-speed="1500" data-stop="<?php echo esc_html($settings['counter_start']); ?>">
                        <?php echo esc_html($settings['counter_stop']); ?>
                    </span>
                    <?php echo esc_html($settings['fact_symbols']); ?>
                </div>
                <<?php echo esc_attr($settings['tag_type']); ?> class="funtitle"><?php echo esc_html($settings['fact_heading']); ?></<?php echo esc_attr($settings['tag_type']); ?>>
            </div>
        </div>
        <div class="content_box">
            <p><?php echo esc_html($settings['fact_description']); ?></p>
        </div>
    </div>
<?php else: ?>
    <div class="fun_facts_box type_one count-box">
        <div class="icon_bx">
            <?php if($settings['icon_image_enable'] == 'yes' && $settings['icon_fonts_enable'] !== 'yes' ): ?>
                <?php if(!empty($settings['icon_image'])):
                    $icon_image = isset($settings['icon_image']['alt']) ? $settings['icon_image']['alt'] : 'image'; ?>
                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image); ?>" />
                <?php endif; ?>
            <?php endif; ?>
            <?php if($settings['icon_image_enable'] !== 'yes' && $settings['icon_fonts_enable'] == 'yes' ): ?>
                <small class="<?php echo esc_html($settings['icon_fonts']); ?> icon"></small>
            <?php endif; ?>
        </div>
        <div class="content_box">
        <<?php echo esc_attr($settings['tag_type']); ?> class="funtitle"><?php echo esc_html($settings['fact_heading']); ?></<?php echo esc_attr($settings['tag_type']); ?>>
        <div class="cownt">
                <span class="count-text" data-speed="1500" data-stop="<?php echo esc_html($settings['counter_start']); ?>">
                    <?php echo esc_html($settings['counter_stop']); ?>
                </span>
                <?php echo esc_html($settings['fact_symbols']); ?>
            </div>
            <p><?php echo esc_html($settings['fact_description']); ?></p>
        </div>
    </div>
<?php endif; ?>

<?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_fun_facts_v1_new());