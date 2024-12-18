<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_contact_box_v1_new extends Widget_Base
{
    public function get_name()
    {
        return 'creote-contact-box-v1-new';
    }
    public function get_title()
    {
        return __('Contact Box V2', 'creote-addons');
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
        $this->start_controls_section('contact_box_settings',
        [ 
            'label' => __('Contact Box Settings', 'creote-addons')
        ]
        );
        $this->add_control(
			'contact_box_style',
			[
				'label'   => esc_html__( 'Choose Style', 'creote-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'type_one',
				'options' => array(
					'type_one' => esc_html__( 'Style One', 'creote-addons' ),
					'type_two'  => esc_html__( 'Style Two', 'creote-addons' ),
				),
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
        $this->start_controls_section('contact_box_content',
        [ 
            'label' => __('Contact Content', 'creote-addons')
        ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'icon_fonts_enable',
           [
              'label' => __('Contact Icon Enable', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'yes',
           ]
        );
        $repeater->add_control(
            'icon_fonts',
            [
                'label' => __('Contact Icon', 'creote-addons'),
                'type' => Controls_Manager::ICON,
                'options' => get_creote_icon(),
                'default' => __('flaticon-address' , 'creote-addons'),
                 'condition' => [
                    'icon_fonts_enable' => 'yes',
                 ]
            ]
        );
        $repeater->add_control(
            'box_heading_text',
            [
                'label' => __('Contact Box Heading', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
        );
        $repeater->add_control(
            'box_description',
            [
                'label' => __('Contact Box Description', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
        );
        $repeater->add_control(
            'address_enable',
            [
                'label' => __('Address Enable', 'creote-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
          );
        $repeater->add_control(
            'detailsaddress',
            [
                'label' => __('Details(address)', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __('(+555) 555-1234', 'creote-addons'),
                'default' => __('(+555) 555-1234' , 'creote-addons'),
                'condition' => [
                    'address_enable' => 'yes',
                ]
            ]
        );
        $repeater->add_control(
            'email_enable',
            [
                'label' => __('Mail Id Enable', 'creote-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
          );
        $repeater->add_control(
            'emailtxtone',
            [
                'label' => __('Email One', 'creote-addons'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('support@creote.com', 'creote-addons'),
                'default' => __('support@creote.com' , 'creote-addons'),
                'condition' => [
                    'email_enable' => 'yes',
                ]
            ]
        );
        $repeater->add_control(
            'emailtxttwo',
            [
                'label' => __('Email Two', 'creote-addons'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('support@creote.com', 'creote-addons'),
                'default' => __('support@creote.com' , 'creote-addons'),
                'condition' => [
                    'email_enable' => 'yes',
                ]
            ]
        );
        $repeater->add_control(
            'phone_enable',
            [
                'label' => __('Phone No Enable', 'creote-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
          );
        $repeater->add_control(
            'phoneno',
            [
                'label' => __('Phone Number One', 'creote-addons'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('(+555) 555-1234', 'creote-addons'),
                'default' => __('(+555) 555-1234' , 'creote-addons'),
                'condition' => [
                    'phone_enable' => 'yes',
                ]
            ]
        );
        $repeater->add_control(
            'phonenotwo',
            [
                'label' => __('Phone Number Two', 'creote-addons'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('(+555) 555-1234', 'creote-addons'),
                'default' => __('(+555) 555-1234' , 'creote-addons'),
                'condition' => [
                    'phone_enable' => 'yes',
                ]
            ]
        );
        $repeater->add_control(
			'active_contact_bg',
			[
				'label'   => esc_html__( 'Active Background', 'creote-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'nonactive',
				'options' => array(
					'active' => esc_html__( 'Active', 'creote-addons' ),
					'nonactive'  => esc_html__( 'Not Active', 'creote-addons' ),
				),
			]
        );
        $this->add_control(
            'contact_box_content_repeater',
            [
                'label' => __('Contact Box Repeater', 'creote-addons'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'icon_fonts_enable' => 'yes',
                        'icon_fonts' => __('icon-address' , 'creote-addons'),
                        'box_heading_text' =>  __('Address' , 'creote-addons'),
                        'box_description'=>  __('Visit to explore the world' , 'creote-addons'),
                        'address_enable' => 'yes' , 
                        'detailsaddress'=>  __('124, Queens walk 2nd cross newyork 5241.' , 'creote-addons'),
                        'email_enable' => 'no' , 
                        'phone_enable' => 'no' , 
                        'active_contact_bg' => 'nonactive',
                    ],
                    [
                        'icon_fonts_enable' => 'yes',
                        'icon_fonts' => __('icon-telephone' , 'creote-addons'),
                        'box_heading_text' =>  __('Make a Call' , 'creote-addons'),
                        'box_description'=>  __('Let’s talk with our experts' , 'creote-addons'),
                        'email_enable' => 'yes' , 
                        'emailtxtone'=>  __('career@example.com' , 'creote-addons'),
                        'phone_enable' => 'no' , 
                        'address_enable' => 'no' , 
                        'active_contact_bg' => 'active',
                    ],
                    [
                        'icon_fonts_enable' => 'yes',
                        'icon_fonts' => __('icon-mail' , 'creote-addons'),
                        'box_heading_text' =>  __('Send a Mail' , 'creote-addons'),
                        'box_description'=>  __('Dont’s hesitate to mail' , 'creote-addons'),
                        'address_enable' => 'no' ,
                        'email_enable' => 'no' , 
                        'phone_enable' => 'yes' , 
                        'phoneno'=>  __('+44 555 67 890' , 'creote-addons'),
                        'active_contact_bg' => 'nonactive',
                    ],
                ],
                'title_field' => '{{{ box_heading_text }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section('contactbox_box_css',
        [ 
            'label' => __('Custom Css', 'creote-addons') ,
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
        );
        $this->add_control(
            'contact_box_bg_color',
             [
                'label' => __('Contact Box Background Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .info_section .info_inner .info-box  ' => 'background: {{VALUE}}!important;',
                  ],
             ]
          );
        $this->add_control(
            'contact_headingiocn_color',
             [
                'label' => __('Contact Icon Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .info_section .info_inner .info-box .box .icon_box i ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'contact_headingiocn_color_bor',
             [
                'label' => __('Contact Icon Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .info_section .info_inner .info-box .box .icon_box i ' => 'border-color: {{VALUE}}!important;',
                  ],
             ]
          );
        $this->add_control(
            'contact_heading_color',
             [
                'label' => __('Contact Title Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .info_section .info_inner .info-box .box .ctitles ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'contact_sub_title_color',
             [
                'label' => __('Contact Small Title Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .info_section .info_inner .info-box .box span ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'contact_sub_title_color_border',
             [
                'label' => __('Contact Small Title Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .info_section .info_inner .info-box .box span ' => 'border-color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'hrthreeee',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'contact_description_color',
             [
                'label' => __('Contact Description Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .info_section .info_inner .info-box .text p, .info_section .info_inner .info-box .text p a' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'hrsvn',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
          $this->add_control(
            'border_radius_enable',
            [
                'label' => __('Contact Box Border Radius Disable', 'creote-addons'),
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
            ]
        );
        $this->add_control(
            'hover_contact_box_bg_color',
             [
                'label' => __('Contact Box Background Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .info_section .info_inner .info-box:hover , {{WRAPPER}} .info_section .info_inner .info-box.active   ' => 'background: {{VALUE}}!important;',
                  ],
             ]
          );
        $this->add_control(
            'hover_contact_headingiocn_color',
             [
                'label' => __('Contact Icon Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}  .info_section .info_inner .info-box:hover .box .icon_box i  , {{WRAPPER}} .info_section .info_inner .info-box.active .box .icon_box i ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'hover_contact_headingiocn_color_bor',
             [
                'label' => __('Contact Icon Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}  .info_section .info_inner .info-box:hover .box .icon_box i , {{WRAPPER}} .info_section .info_inner .info-box.active .box .icon_box i ' => 'border-color: {{VALUE}}!important;',
                  ],
             ]
          );
        $this->add_control(
            'hover_contact_heading_color',
             [
                'label' => __('Contact Title Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}  .info_section .info_inner .info-box:hover .box .ctitles , {{WRAPPER}} .info_section .info_inner .info-box.active .box .ctitles ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'hover_contact_sub_title_color',
             [
                'label' => __('Contact Small Title Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}  .info_section .info_inner .info-box:hover .box span , {{WRAPPER}} .info_section .info_inner .info-box.active  .box span  ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'hover_contact_sub_title_color_border',
             [
                'label' => __('Contact Small Title Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}  .info_section .info_inner .info-box:hover .box span , {{WRAPPER}} .info_section .info_inner .info-box.active  .box span ' => 'border-color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'hover_hrthreeee',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'hover_contact_description_color',
             [
                'label' => __('Contact Description Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}  .info_section .info_inner .info-box:hover .text p ,  .info_section .info_inner .info-box:hover p a  , {{WRAPPER}} .info_section .info_inner .info-box.active  .text p a , .info_section .info_inner .info-box.active  .text p  ' => 'color: {{VALUE}}!important;',
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
       <section class="info_section <?php echo esc_attr($settings['contact_box_style']); ?> <?php if($settings['border_radius_enable'] == 'yes'): ?> border_disable <?php endif; ?>">
    <div class="info_inner">
        <div class="row">
            <?php foreach ($settings['contact_box_content_repeater'] as $contact_box): ?>
                <div class="<?php echo esc_attr($settings['column_count']); ?> info-column">
                    <div class="info-box <?php echo esc_attr($contact_box['active_contact_bg']); ?>">
                        <div class="hidden-icon"><i class="<?php echo esc_html($contact_box['icon_fonts']); ?>"></i></div>
                        <div class="box">
                            <div class="icon_box"><i class="<?php echo esc_html($contact_box['icon_fonts']); ?>"></i></div>
                            <div class="heading-box">
                                <div class="ctitles"><?php echo esc_html($contact_box['box_heading_text']); ?></div>
                                <span><?php echo esc_html($contact_box['box_description']); ?></span>
                            </div>
                        </div>
                        <div class="text">
                            <?php if ($contact_box['address_enable'] == 'yes'): ?>
                                <?php if (!empty($contact_box['detailsaddress'])): ?>
                                    <p><?php echo wp_kses($contact_box['detailsaddress'], $allowed_tags); ?></p>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if ($contact_box['email_enable'] == 'yes'): ?>
                                <?php if (!empty($contact_box['emailtxtone'])): ?>
                                    <p><a href="mailto:<?php echo esc_attr($contact_box['emailtxtone']); ?>" target="_blank"><?php echo esc_html($contact_box['emailtxtone']); ?></a></p>
                                <?php endif; ?>
                                <?php if (!empty($contact_box['emailtxttwo'])): ?>
                                    <p><a href="mailto:<?php echo esc_attr($contact_box['emailtxttwo']); ?>" target="_blank"><?php echo esc_html($contact_box['emailtxttwo']); ?></a></p>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if ($contact_box['phone_enable'] == 'yes'): ?>
                                <?php if (!empty($contact_box['phoneno'])): ?>
                                    <p><a href="tel:<?php echo esc_attr($contact_box['phoneno']); ?>" target="_blank"><?php echo esc_html($contact_box['phoneno']); ?></a></p>
                                <?php endif; ?>
                                <?php if (!empty($contact_box['phonenotwo'])): ?>
                                    <p><a href="tel:<?php echo esc_attr($contact_box['phonenotwo']); ?>" target="_blank"><?php echo esc_html($contact_box['phonenotwo']); ?></a></p>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

    <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_contact_box_v1_new());
