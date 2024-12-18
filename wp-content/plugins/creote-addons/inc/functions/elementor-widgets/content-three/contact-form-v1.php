<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_contact_form_v1_new extends Widget_Base
{
    public function get_name()
    {
        return 'creote-contact-form-v2';
    }
    public function get_title()
    {
        return __('Contact Form V2' , 'creote-addons');
    }
    public function get_icon()
    {
        return 'icon-c';
    }
    public function get_categories()
    {
        return ['104'];
    } 
    protected function register_controls() {
		$this->start_controls_section(
			'contact_form',
			[
				'label' => esc_html__( 'Contact Form', 'creote-addons' ),
			]
        ); 
        $this->add_control(
            'contact_image_enable',
           [
              'label' => __('Image Enable', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'no',
           ]
        );
        $this->add_control(
            'contact_image',
            [
                'label' => __('Image', 'creote-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                  ],
                 'condition' => [
                    'contact_image_enable' => 'yes',
                 ]
            ]
        ); 
        $this->add_control(
            'sub_contact_heading',
            [
                'label' => __('Sub Heading', 'creote-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Write Message', 'creote-addons'),
                'placeholder' => __('Write Message', 'creote-addons'),
            ]
        );
        $this->add_control(
            'contact_heading',
            [
                'label' => __('Heading', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Don’t Hesitate To Send Your Message To Us', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
        );
		$this->add_control(
			'contact_form_url',
			[
				'label'       => __( 'Contact Form 7 Url', 'elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Contact Form 7 Url', 'elementor' )
			]
        );
        $this->add_control(
            'emergency_enadis',
           [
              'label' => __('Emergency Enable', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'no',
           ]
        );
        $this->add_control(
            'emeregency_heading',
            [
                'label' => __('Emergency Heading', 'creote-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('For  Emergency', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
                'condition' => [
                    'emergency_enadis' => 'yes',
                 ]
            ]
        );
        $this->add_control(
            'emergency_no_icon',
            [
                'label' => __('Icon', 'creote-addons'),
                'type' => Controls_Manager::ICON,
                'options' => get_creote_icon(),
                'default' => __('' , 'creote-addons'),
            ]
        );
        $this->add_control(
            'emergency_no',
            [
                'label' => __('Emergency Number', 'creote-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('+44 555 67 890', 'creote-addons'),
                'placeholder' => __('Type your Number
                 here', 'creote-addons'),
                'condition' => [
                    'emergency_enadis' => 'yes',
                 ]
            ]
        ); 
        $this->end_controls_section();
        $this->start_controls_section('corntactform_box_css',
        [ 
            'label' => __('Custom Css', 'creote-addons')
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
            'hronetwoo',
            [
                'type' => Controls_Manager::DIVIDER,
                'condition' => [
                    'custom_css' => 'yes',
                ]
            ]
        ); 
        $this->add_control(
            'corntactform_heading_color',
             [
                'label' => __('Contact Title Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#000',
                 'selectors' => [
                    '{{WRAPPER}} .contact_form_box.type_one h2 , {{WRAPPER}} .contact_form_box.type_two h2 ' => 'color: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'custom_css' => 'yes',
                ]
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
            'corntactform_label_color',
             [
                'label' => __('Contact Label Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#000',
                 'selectors' => [
                    '{{WRAPPER}} .contact_form_box.type_one label , {{WRAPPER}} .contact_form_box.type_two label    ' => 'color: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'custom_css' => 'yes',
                ]
             ]
          ); 
          $this->add_control(
            'hree',
            [
                'type' => Controls_Manager::DIVIDER,
                'condition' => [
                    'custom_css' => 'yes',
                ]
            ]
        );
        $this->add_control(
            'contact_emergency_head_color',
             [
                'label' => __('Emergency Text Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#000',
                 'selectors' => [
                    '{{WRAPPER}} .contact_form_box.type_one .emergrncy_contact h6 span ' => 'color: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'custom_css' => 'yes',
                ]
             ]
          ); 
        $this->add_control(
            'contact_emergency_head_num_color',
             [
                'label' => __('Emergency Number Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#000',
                 'selectors' => [
                    '{{WRAPPER}} .contact_form_box.type_one .emergrncy_contact  h6 a , {{WRAPPER}} .contact_form_box.type_one .emergrncy_contact small ' => 'color: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'custom_css' => 'yes',
                ]
             ]
          ); 
          $this->add_control(
            'hrthreeee',
            [
                'type' => Controls_Manager::DIVIDER,
                'condition' => [
                    'custom_css' => 'yes',
                ]
            ]
        ); 
        $this->add_control(
            'corntact_button_color',
             [
                'label' => __('Contact Button Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#fff',
                 'selectors' => [
                    '{{WRAPPER}} .contact_form_box.type_one .wpcf7-submit , {{WRAPPER}} .contact_form_box.type_two .wpcf7-submit ' => 'color: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'custom_css' => 'yes',
                ]
             ]
          );
        $this->add_control(
            'corntact_button_bg_color',
             [
                'label' => __('Contact Button Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#000',
                 'selectors' => [
                    '{{WRAPPER}} .contact_form_box.type_one .wpcf7-submit , {{WRAPPER}} .contact_form_box.type_two .wpcf7-submit' => 'background: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'custom_css' => 'yes',
                ]
             ]
          );
          $this->add_control(
            'hrsvn',
            [
                'type' => Controls_Manager::DIVIDER,
                'condition' => [
                    'hover_custom_css' => 'yes',
                ]
            ]
        );
          $this->add_control(
            'hover_custom_css',
            [
                'label' => __('Button Hover Enable', 'creote-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
          );
          $this->add_control(
            'hrsix',
            [
                'type' => Controls_Manager::DIVIDER,
                'condition' => [
                    'hover_custom_css' => 'yes',
                ]
            ]
        ); 
        $this->add_control(
            'hover_corntact_button_color',
             [
                'label' => __('Contact Button Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#000',
                 'selectors' => [
                    '{{WRAPPER}} .contact_form_box.type_one .wpcf7-submit:hover , {{WRAPPER}} .contact_form_box.type_two .wpcf7-submit:hover' => 'color: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'hover_custom_css' => 'yes',
                ]
             ]
          );
        $this->add_control(
            'hover_corntact_button_bg_color',
             [
                'label' => __('Contact Button Bg Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'default' => '#fff',
                 'selectors' => [
                    '{{WRAPPER}} .contact_form_box.type_one .wpcf7-submit:hover , {{WRAPPER}} .contact_form_box.type_two .wpcf7-submit:hover' => 'background: {{VALUE}}!important;',
                  ],
                 'condition' => [
                    'hover_custom_css' => 'yes',
                ]
             ]
          );
        $this->end_controls_section();
	}
    protected function render() {
	$settings = $this->get_settings_for_display();
	$allowed_tags = wp_kses_allowed_html('post');
?>
<div class="contact_form_box type_one"> <?php if(!empty($settings['contact_image'])): $contact_image = isset($settings['contact_image']['alt']) ? $settings['contact_image']['alt'] : ''; if(!empty($contact_image)) { $contact_image = $contact_image; }else{ $contact_image = 'image'; } ?> <div class="image_box"> <img src="<?php echo esc_url($settings['contact_image']['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($contact_image); ?>"> </div> <?php endif; ?> <div class="contact_inner_box"> <div class="heading type_two text_left"> <?php if(!empty($settings['sub_contact_heading'])): ?> <div class="small_text"> <?php echo esc_html($settings['sub_contact_heading']); ?> </div> <?php endif; ?> <?php if(!empty($settings['contact_heading'])): ?> <div class="heading_text"><?php echo esc_html($settings['contact_heading']); ?></div> <?php endif; ?> <?php if(!empty($settings['sub_contact_heading'])): ?> <div class="small_text_sub"> <?php echo esc_html($settings['sub_contact_heading']); ?></div> <?php endif; ?> </div> <div class="contact_form_shortcode"> <?php echo do_shortcode( $settings['contact_form_url'] );?> </div> <?php if(!empty($settings['emeregency_heading'])): ?> <div class="emergrncy_contact"> <?php if(!empty($settings['emergency_no_icon'])): ?> <small class="<?php echo esc_html($settings['emergency_no_icon']);?>"> </small> <?php endif; ?> <h6><span><?php echo esc_html($settings['emeregency_heading']); ?></span><a href="tel:http://<?php echo esc_html($settings['emergency_no']); ?>"><?php echo esc_html($settings['emergency_no']); ?></a> </h6> </div> <?php endif; ?> </div></div>
<?php 
	}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_contact_form_v1_new());