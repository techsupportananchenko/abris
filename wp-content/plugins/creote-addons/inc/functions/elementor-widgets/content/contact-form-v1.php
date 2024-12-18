<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_contact_form_v1 extends Widget_Base
{
    public function get_name()
    {
        return 'creote-contact-form-v1';
    }
    public function get_title()
    {
        return __('Contact Form V1' , 'creote-addons');
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
			'contact_form',
			[
				'label' => esc_html__( 'Contact Form', 'creote-addons' ),
			]
        );
        $this->add_control(
			'contact_style',
			[
				'label'   => esc_html__( 'Choose Style', 'creote-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'type_one',
				'options' => array(
					'type_one' => esc_html__( 'Style One', 'creote-addons' ),
          'type_two' => esc_html__( 'Style Two', 'creote-addons' ),
          'type_three' => esc_html__( 'Style Three (Simple)', 'creote-addons' ),
				),
			]
      );
      $this->add_control(
        'contact_heading',
        [
            'label' => __('Heading', 'creote-addons'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => __('Request for Our Free Consultation', 'creote-addons'),
            'placeholder' => __('Type Your Text here', 'creote-addons'),
            'condition' => [
              'contact_style' => 'type_two',
            ],
        ]
    ); 
  $this->add_control(
    'image_enable',
  [
      'label' => __('Image Enable', 'creote-addons'),
      'type' => Controls_Manager::SWITCHER,
      'label_on' => __('Yes', 'creote-addons'),
      'label_off' => __('No', 'creote-addons'),
      'return_value' => 'yes',
      'default' => 'no',
      'condition' => [
        'contact_style' => 'type_two',
      ],
  ]
  );
  $this->add_control(
    'image',
    [
        'label' => __('Image', 'creote-addons'),
        'type' => Controls_Manager::MEDIA,
        'default' => [
          'url' => CREOTE_ADDONS_URL. 'assets/images/contact-man-1.png',
        ],
        'condition' => [
            'image_enable' => 'yes',
        ],
    ]
  );
$this->add_control(
  'image_moving',
  [
    'label'   => esc_html__( 'Choose Image Moving Side', 'creote-addons' ),
    'type'    => Controls_Manager::SELECT,
    'default' => 'bottom_right',
    'options' => array(
      'bottom_right' => esc_html__( 'Bottom Right', 'creote-addons' ),
      'bottom_left' => esc_html__( 'Bottom Left', 'creote-addons' ),
    ),
    'condition' => [
      'image_enable' => 'yes',
    ],
  ]
  );
$this->add_control(
  'move_bottom',
  [
      'label' => __('Move Image Bottom', 'creote-addons'),
      'type' => Controls_Manager::TEXT,
      'default' => __('0px', 'creote-addons'),
      'selectors' => [
        '{{WRAPPER}} .contact_form_box_all.type_two img  ' => 'bottom: {{VALUE}};',
      ],
      'condition' => [
        'image_enable' => 'yes',
        'image_moving' => ['bottom_right' , 'bottom_left'],
     ],
  ]
);
$this->add_control(
  'move_right',
  [
      'label' => __('Move Image Right', 'creote-addons'),
      'type' => Controls_Manager::TEXT,
      'default' => __('0px', 'creote-addons'),
      'selectors' => [
        '{{WRAPPER}} .contact_form_box_all.type_two img  ' => 'right: {{VALUE}};',
      ],
      'condition' => [
        'image_enable' => 'yes',
        'image_moving' => ['bottom_right'],
     ],
  ]
);
$this->add_control(
  'move_left',
  [
      'label' => __('Move Image Left', 'creote-addons'),
      'type' => Controls_Manager::TEXT,
      'default' => __('0px', 'creote-addons'),
      'selectors' => [
        '{{WRAPPER}} .contact_form_box_all.type_two img  ' => 'left: {{VALUE}}; right:unset!important',
      ],
      'condition' => [
        'image_enable' => 'yes',
        'image_moving' => ['bottom_left'],
     ],
  ]
);
$this->add_control(
  'contact_form_url',
  [
    'label'   => esc_html__( 'Choose Contact Form', 'creote-addons' ),
    'type'    => Controls_Manager::SELECT,
    'options' =>  creote_contact_form_7_query('wpcf7_contact_form'),
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
$this->start_controls_section('contact_form_css',
[ 
    'label' => __('Custom Css', 'creote-addons'),
    'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
]
);
$this->add_control(
  'icon_moving_position',
  [
    'label'   => esc_html__( 'Icon Moving Position', 'creote-addons' ),
    'type'    => Controls_Manager::SELECT,
    'default' => 'top_right',
    'options' => array(
      'top_left' => esc_html__( 'Top Left', 'creote-addons' ),
      'top_right' => esc_html__( 'Top Right', 'creote-addons' ),
    ),
  ]
);
$this->add_control(
  'top_right_top',
  [
      'label' => esc_html__( 'Icon Move Top', 'creote-addons' ),
      'type' => \Elementor\Controls_Manager::NUMBER,
      'min' => 1,
      'max' => 1000,
      'step' => 1,
      'default' => '',
      'selectors' => [
          '{{WRAPPER}} .contact_form_box_all.type_three .contact_form_box_inner.simple_form label i ' => 'top: {{VALUE}}px!important;',
      ],
      'condition' => [
        'icon_moving_position' => 'top_right',
      ],
  ]
);
$this->add_control(
  'top_right_right',
  [
      'label' => esc_html__( 'Icon Move Right', 'creote-addons' ),
      'type' => \Elementor\Controls_Manager::NUMBER,
      'min' => 1,
      'max' => 1000,
      'step' => 1,
      'default' => '',
      'selectors' => [
          '{{WRAPPER}} .contact_form_box_all.type_three .contact_form_box_inner.simple_form label i ' => 'right: {{VALUE}}px!important;',
      ],
      'condition' => [
        'icon_moving_position' => 'top_right',
      ],
  ]
);
$this->add_control(
  'top_left_top',
  [
      'label' => esc_html__( 'Icon Move Top', 'creote-addons' ),
      'type' => \Elementor\Controls_Manager::NUMBER,
      'min' => 1,
      'max' => 1000,
      'step' => 1,
      'default' => '',
      'selectors' => [
          '{{WRAPPER}} .contact_form_box_all.type_three .contact_form_box_inner.simple_form label i ' => 'top: {{VALUE}}px!important;',
      ],
      'condition' => [
        'icon_moving_position' => 'top_left',
      ],
  ]
);
$this->add_control(
  'top_left_left',
  [
      'label' => esc_html__( 'Icon Move Left', 'creote-addons' ),
      'type' => \Elementor\Controls_Manager::NUMBER,
      'min' => 1,
      'max' => 1000,
      'step' => 1,
      'default' => '',
      'selectors' => [
          '{{WRAPPER}} .contact_form_box_all.type_three .contact_form_box_inner.simple_form label i ' => 'left: {{VALUE}}px!important;',
      ],
      'condition' => [
        'icon_moving_position' => 'top_left',
      ],
  ]
); 
$this->add_control(
  'hr_icon',
  [
      'type' => \Elementor\Controls_Manager::DIVIDER,
  ]
);
$this->add_group_control(
  \Elementor\Group_Control_Typography::get_type(),
  [
    'name' => 'title_typo',
    'label' => __('Title Typography', 'creote-addons'),
    'selector' => '{{WRAPPER}} .contact_form_box_all.type_two .contact_form_shortcode .heading h2 ',
    'condition' => [
      'contact_style' => 'type_two',
    ],
  ]
);
$this->add_control(
  'label_color_title',
   [
      'label' => __('Title Color', 'creote-addons'),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
          '{{WRAPPER}} .contact_form_box_all.type_two .contact_form_shortcode .heading h2 ' => 'color: {{VALUE}}!important;',
      ],
      'condition' => [
        'contact_style' => 'type_two',
      ],
   ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__( 'Label Typography', 'creote-addons' ),
        'name' => 'label_typo',
        'selector' => '{{WRAPPER}} label ',
    ]
);
$this->add_control(
    'label_color',
     [
        'label' => __('Label Color', 'creote-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} label ' => 'color: {{VALUE}}!important;',
        ],
     ]
);
$this->add_control(
    'input_margin',
    [
        'label' => esc_html__( 'Input , Textarea , Select  Margin', 'creote-addons' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors' => [
            '{{WRAPPER}} .wpcf7-form-control-wrap input , {{WRAPPER}} select , {{WRAPPER}} textarea  ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
        ],
    ]
);
$this->add_control(
    'input_padding',
    [
        'label' => esc_html__( 'Input ,  Select  padding', 'creote-addons' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors' => [
            '{{WRAPPER}} .wpcf7-form-control-wrap input , {{WRAPPER}} select , {{WRAPPER}} textarea  ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
        ],
    ]
);
$this->add_control(
    'textarea_padding',
    [
        'label' => esc_html__( 'Textarea   Select  padding', 'creote-addons' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors' => [
            '{{WRAPPER}}  textarea  ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
        ],
    ]
); 
$this->add_control(
    'input_border_radius',
    [
        'label' => esc_html__( 'Input , Textarea , Select Border Radius', 'creote-addons' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors' => [
            '{{WRAPPER}} .wpcf7-form-control-wrap input , {{WRAPPER}} select , {{WRAPPER}} textarea ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
        ],
    ]
);
$this->add_control(
    'input_border',
    [
        'label' => esc_html__( 'Input , Textarea , Select Border Width', 'creote-addons' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors' => [
            '{{WRAPPER}} .wpcf7-form-control-wrap input , {{WRAPPER}} select , {{WRAPPER}} textarea  ' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
        ],
    ]
);
$this->add_control(
    'input_border_stylesss',
    [
    'label' => __('Input , Textarea , Select Border Style', 'creote-addons'),
    'type' => \Elementor\Controls_Manager::SELECT,
    'options' => [
      '' => __( 'Select', 'creote-addons' ),
        'solid' => __( 'Solid', 'creote-addons' ),
        'dotted' => __( 'Dotted', 'creote-addons' ),
        'dashed' => __( 'Dashed', 'creote-addons' ),
        'double' => __( 'Double', 'creote-addons' ),
        'none' => __( 'None', 'creote-addons' ),
    ],
    'default' => __('' , 'creote-addons'),
    'selectors' => [
        '{{WRAPPER}}  .wpcf7-form-control-wrap input , {{WRAPPER}} select , {{WRAPPER}} textarea  ' => 'border-style: {{VALUE}}!important;',
    ],
    ]
);
$this->add_control(
    'input_border_color',
     [
        'label' => __('Input , Textarea , Select Border Color', 'creote-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .wpcf7-form-control-wrap input , {{WRAPPER}} select , {{WRAPPER}} textarea ' => 'border-color: {{VALUE}}!important;',
        ],
     ]
);
$this->add_control(
    'input_color',
     [
        'label' => __('Input , Textarea , Select  Color', 'creote-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .wpcf7-form-control-wrap input::placeholder , {{WRAPPER}} select , {{WRAPPER}} textarea::placeholder ' => 'color: {{VALUE}}!important;',
        ],
     ]
);
$this->add_control(
    'input_bg',
     [
        'label' => __('Input , Textarea , Select  Bg  Color', 'creote-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .wpcf7-form-control-wrap input , {{WRAPPER}} select , {{WRAPPER}} textarea ' => 'background-color: {{VALUE}}!important;',
        ],
     ]
);
$this->add_control(
    'hr_one',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);
$this->add_control(
    'input_height',
    [
        'label' => esc_html__( 'Input , Select  Height', 'creote-addons' ),
        'type' => \Elementor\Controls_Manager::NUMBER,
        'min' => 1,
        'max' => 1000,
        'step' => 1,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .wpcf7-form-control-wrap input , {{WRAPPER}} select ' => 'height: {{VALUE}}px!important;',
        ],
    ]
);
$this->add_control(
    'text_area_height',
    [
        'label' => esc_html__( 'Textarea Height', 'creote-addons' ),
        'type' => \Elementor\Controls_Manager::NUMBER,
        'min' => 1,
        'max' => 1000,
        'step' => 1,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} textarea ' => 'height: {{VALUE}}px!important;',
        ],
    ]
);
$this->add_control(
    'hr_two',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);
$this->add_control(
    'input_sub_border_color',
     [
        'label' => __('Submit Button Border Color', 'creote-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} input[type="submit"] ' => 'border-color: {{VALUE}}!important; border-style:solid!important; border-width:1px!important',
        ],
     ]
);
$this->add_control(
    'input_sub_bg',
     [
        'label' => __('Submit Button Bg Color', 'creote-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} input[type="submit"] ' => 'background: {{VALUE}}!important;',
        ],
     ]
);
$this->add_control(
    'input_sub_color',
     [
        'label' => __('Submit Button Color', 'creote-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} input[type="submit"] ' => 'color: {{VALUE}}!important;',
        ],
     ]
);
$this->add_control(
    'submit_btn_width',
    [
        'label' => esc_html__( 'Button Width', 'creote-addons' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => '140px',
        'selectors' => [
            '{{WRAPPER}} input[type="submit"] ' => 'min-width: {{VALUE}}!important; width:unset!important;',
        ],
    ]
);
$this->add_control(
  'input_sub_border_radius',
  [
      'label' => esc_html__( 'Submit Button Border Radius', 'creote-addons' ),
      'type' => \Elementor\Controls_Manager::DIMENSIONS,
      'size_units' => [ 'px', '%', 'em' ],
      'selectors' => [
          '{{WRAPPER}} input[type="submit"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
      ],
  ]
);
$this->add_responsive_control(
'button_align',
[
'label' => esc_html__( 'Button Alignment', 'creote-addons' ),
'type' => \Elementor\Controls_Manager::CHOOSE,
'options' => [
  '0 auto 0 0' => [
    'title' => esc_html__( 'Left', 'creote-addons' ),
    'icon' => 'fa fa-align-left',
  ],
  'auto' => [
    'title' => esc_html__( 'Center', 'creote-addons' ),
    'icon' => 'fa fa-align-center',
  ],
  '0 0 0 auto' => [
    'title' => esc_html__( 'Right', 'creote-addons' ),
    'icon' => 'fa fa-align-right',
  ],
],
'default' => 'auto',
'toggle' => true,
        'selectors' => [
            '{{WRAPPER}} input[type="submit"] ' => 'margin: {{VALUE}}!important; display:inherit!important',
        ],
]
); 
$this->end_controls_section();
}
protected function render() {
		$settings = $this->get_settings_for_display();
    $allowed_tags = wp_kses_allowed_html('post');
  ?>
<section class="contact_form_box_all <?php echo esc_attr($settings['contact_style']); ?>" <?php if($settings['transitions_enable'] == 'yes'): ?> data-aos="fade-up" data-aos-offset="0" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" <?php endif;?>> <?php if($settings['contact_style'] == 'type_two'): ?> <div class="contact_form_box_inner"> <?php if($settings['image_enable'] == 'yes'): $image = isset($settings['image']['alt']) ? $settings['image']['alt'] : ''; if(!empty($image)) { $image = $image; }else{ $image = 'image'; } ?> <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr($image); ?>" /> <?php endif; ?> <div class="contact_form_shortcode"> <?php if(!empty($settings['contact_heading'])): ?> <div class="heading"> <h2><?php echo wp_kses($settings['contact_heading'] , $allowed_tags); ?></h2> </div> <?php endif; ?> <div class="_form"> <?php if(!empty($settings['contact_form_url'])): ?> <?php echo do_shortcode('[contact-form-7 id="' . $settings['contact_form_url'] . '"]'); ?> <?php elseif(empty($settings['contact_form_url'])): ?> <p><?php echo esc_html('There is no contact form please create it' , 'creote-addons'); ?></p> <?php endif; ?> </div> </div> </div> <?php elseif($settings['contact_style'] == 'type_three'): ?> <div class="contact_form_box_inner simple_form"> <div class="contact_form_shortcode"> <?php if(!empty($settings['contact_form_url'])): ?> <?php echo do_shortcode('[contact-form-7 id="' . $settings['contact_form_url'] . '"]'); ?> <?php else: ?> <p><?php echo esc_html('There is no contact form please create it' , 'creote-addons'); ?></p> <?php endif; ?> </div> </div> <?php else: ?> <div class="contact_form_box_inner"> <div class="contact_form_shortcode"> <?php if(!empty($settings['contact_form_url'])): ?> <?php echo do_shortcode('[contact-form-7 id="'.$settings['contact_form_url'].'"]'); ?> <?php else: ?> <p><?php echo esc_html('There is no contact form please create it' , 'creote-addons'); ?></p> <?php endif; ?> </div> </div> <?php endif; ?></section>
<?php 
	}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_contact_form_v1());