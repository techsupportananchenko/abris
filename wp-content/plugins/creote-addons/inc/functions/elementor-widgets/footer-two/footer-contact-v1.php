<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_footer_contact_sv1_new extends Widget_Base
{
    public function get_name()
    {
        return 'creote-footer-contacts-v2';
    }
    public function get_title()
    {
        return __('Contact  V2' , 'creote-addons');
    }
    public function get_icon()
    {
        return 'eicon-number-field';
    }
    public function get_categories()
    {
        return ['105'];
    }
    protected function register_controls(){
        $this->start_controls_section('footer_contact_settings_v1',
        [ 
            'label' => __('Contact Settings', 'creote-addons')
        ]
        );
        $this->add_control(
            'contact_type',
            [
                'label' => __('Contact Type', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'address_type' => __('Address', 'creote-addons'),
                    'phone_type' => __('Phone', 'creote-addons'),
                    'mail_type' => __('Mail', 'creote-addons'),
                    'timing_type' => __('Timing', 'creote-addons'),
                ],
                'default' => 'address_type',
            ]
        );
        $this->add_control(
            'heading_text',
            [
                'label' => __('Heading', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
        );
        $this->add_control(
            'address',
            [
                'label' => __(' Address', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('United States 866 Wilshire, 2nd Street Los Angeles 90024.', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
                'condition' => [
                    'contact_type' => 'address_type',
                ]
            ]
        );
        $this->add_control(
            'phone',
            [
                'label' => __('Phone', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('+555 5678 12340', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
                'condition' => [
                    'contact_type' => 'phone_type',
                ]
            ]
        );
        $this->add_control(
            'mail',
            [
                'label' => __(' Mail Id', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('support@creote.com', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
                'condition' => [
                    'contact_type' => 'mail_type',
                ]
            ]
        );
        $this->add_control(
            'timing',
            [
                'label' => __(' Timing', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Mon - Sat: 09.00 to 06.00 (Sun:Closed)', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
                'condition' => [
                    'contact_type' => 'timing_type',
                ]
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section('button_css',
        [ 
            'label' => __('Custom Css ', 'creote-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
        );
        $this->add_control(
            'icon_olor',
             [
                'label' => __('Icon Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .footer_contact_widget .single h6 span ' => 'color: {{VALUE}}!important',
				], 
             ]
        );
        $this->add_control(
            'title_text_olor',
             [
                'label' => __('Title Text Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .footer_contact_widget .single h6 ' => 'color: {{VALUE}}!important',
				], 
             ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Content Typo', 'creote-addons' ),
				'name' => 'content_typo',
				'selector' => '{{WRAPPER}} .footer_contact_widget .single p , {{WRAPPER}} .footer_contact_widget .single p a ',
			]
		);
        $this->add_control(
            'content_text_color',
             [
                'label' => __('Content Text Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
					'{{WRAPPER}} .footer_contact_widget .single p , {{WRAPPER}} .footer_contact_widget .single p a ' => 'color: {{VALUE}}!important',
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
   <div class="footer_contact_widget"><div class="contact_info_nbox type_one"> <?php if($settings['contact_type'] == 'mail_type'): ?> <div class="single"><?php if(!empty($settings['heading_text'])) : ?> <h6> <span class="icon-mail"></span> <?php echo wp_kses($settings['heading_text'], $allowed_tags); ?></h6><?php endif; ?> <p><a href="mailto:<?php echo wp_kses($settings['mail'] , $allowed_tags); ?>"><?php echo wp_kses($settings['mail'], $allowed_tags); ?></a></p> </div> <?php elseif($settings['contact_type'] == 'address_type') : ?> <div class="single"><?php if(!empty($settings['heading_text'])) : ?> <h6> <span class="icon-location2"></span> <?php echo wp_kses($settings['heading_text'], $allowed_tags); ?> </h6><?php endif; ?> <p><?php echo wp_kses($settings['address'] , $allowed_tags); ?></p> </div> <?php elseif($settings['contact_type'] == 'timing_type'): ?> <div class="single"><?php if(!empty($settings['heading_text'])) : ?> <h6> <span class="icon-clock"></span> <?php echo wp_kses($settings['heading_text'] , $allowed_tags); ?></h6><?php endif; ?> <p><?php echo wp_kses($settings['timing'] , $allowed_tags); ?></p> </div> <?php else: ?> <div class="single"><?php if(!empty($settings['heading_text'])): ?> <h6> <span class="icon-telephone"></span> <?php echo wp_kses($settings['heading_text'] , $allowed_tags); ?> </h6><?php endif; ?> <p><a href="tel:<?php echo wp_kses($settings['phone'] , $allowed_tags); ?>"><?php echo wp_kses($settings['phone'], $allowed_tags); ?></a></p> </div><?php endif; ?></div> </div>
        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_footer_contact_sv1_new());
