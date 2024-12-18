<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_quote_box_v1_new extends Widget_Base
{
    public function get_name()
    {
        return 'creote-quote-box-v1-new';
    }
    public function get_title()
    {
        return __('Quote Box V1', 'creote-addons');
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
        $this->start_controls_section('quote_box_settings',
        [ 
            'label' => __('Quote Settings', 'creote-addons')
        ]
        );
        $this->add_control(
            'quote_box_type',
            [
                'label' => __('Quote Box Type', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'type_one'  => __( 'Type One', 'creote-addons' ),
					'type_two' => __( 'Type Two', 'creote-addons' ),
				],
                'default' => __('type_one' , 'creote-addons'),
            ]
        );
        $this->add_control(
            'quote_description',
            [
                'label' => __( 'Quote Description', 'creote-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Default description', 'creote-addons' ),
				'placeholder' => __( 'Type your description here', 'creote-addons' ),
            ]
        );
        $this->add_control(
            'authour_name',
            [
                'label' => __('Authour name', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
        );
        $this->add_control(
            'quote_fonts',
            [
                'label' => __('Quote Icon', 'creote-addons'),
                'type' => Controls_Manager::ICON,
                'options' => get_creote_icon(),
                'default' => __('fa fa-ban' , 'creote-addons'),
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section('quote_box_css',
        [ 
            'label' => __('Custom Css', 'creote-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
        );
          $this->add_control(
            'heading_color',
             [
                'label' => __('Authour Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quote_box_new.type_one h2 , {{WRAPPER}} .quote_box_new.type_two h2 ' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
        $this->add_control(
            'd_color',
             [
                'label' => __('Description Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quote_box_new.type_one .description , {{WRAPPER}} .quote_box_new.type_two .description ' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
          $this->add_control(
            'quote_color',
             [
                'label' => __('Quote Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quote_box_new.type_one small , {{WRAPPER}} .quote_box_new.type_two small ' => 'color: {{VALUE}}!important;',
                ],
             ]
        );
        $this->add_control(
        'quote_color_bg',
            [
            'label' => __('Quote Color', 'creote-addons'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .quote_box_new.type_one small  ' => 'background: {{VALUE}}!important;',
            ],
        ]
        );
        $this->add_control(
            'qbox_color',
             [
                'label' => __('Box Background Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quote_box_new.type_one , {{WRAPPER}} .quote_box_new.type_two ' => 'background: {{VALUE}}!important;',
                ],
            ]
        );
        $this->add_control(
            'qbox_border_color',
             [
                'label' => __('Box Border Color(style 2)', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .quote_box_new.type_two' => 'border-color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
    ?> 
        <?php if($settings['quote_box_type'] == 'type_two') : ?> <div class="quote_box_new type_two"> <div class="description"> <?php echo $settings['quote_description']; ?> </div> <h2><?php echo esc_html($settings['authour_name']); ?></h2> <small class="<?php echo esc_html($settings['quote_fonts']); ?> quote_fonts"></small> </div> <?php else: ?> <div class="quote_box_new type_one"> <div class="description"> <?php echo $settings['quote_description']; ?> </div> <h2><?php echo esc_html($settings['authour_name']); ?></h2> <small class="<?php echo esc_html($settings['quote_fonts']); ?> quote_fonts"></small> </div> <?php endif ?>
        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_quote_box_v1_new());
