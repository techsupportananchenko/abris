<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_price_plan_tab_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-price-plan-tab-v1';
       }
       public function get_title()
       {
           return __('Price Plan Tab V1' , 'creote-addons');
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
               'price_set_content',
               [
                   'label' => __('Content', 'creote-addons'),
                   'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
               ]
           );
           $this->add_control(
               'price_plan_styles',
               [
                   'label' => __('Price Plan style', 'creote-addons'),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
                       'style_one' => __('Style one ', 'creote-addons'),
                       'style_two' => __('Style Two ', 'creote-addons'),
                   ],
                   'default' => 'style_one',
               ]
           );
           $this->add_control(
             'tab_one_name',
             [
               'label'       => esc_html__( 'Tab One Title', 'creote-addons' ),
               'type'        => Controls_Manager::TEXT,
               'default' =>  esc_html__( 'Monthly' , 'creote-addons'),
             ]
           );
           $this->add_control(
             'tab_two_name',
             [
               'label'       => esc_html__( 'Tab Two  Title', 'creote-addons' ),
               'type'        => Controls_Manager::TEXT,
               'default' =>  esc_html__( 'Anually' , 'creote-addons'),
             ]
           );
           $this->end_controls_section();
           $this->start_controls_section(
               'price_tab_content_one',
               [
                   'label' => __('Tab  Content', 'creote-addons'),
                   'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                   'condition' => [
                     'price_plan_styles' => 'style_one'
                   ],
               ]
           );
           $repeater = new Repeater();
           $repeater->add_control(
   			'price_title',
   			[
   				'label'       => esc_html__( 'Heading', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
             'default' =>  esc_html__( 'Bronze Package' , 'creote-addons'),
   			]
           );
           $repeater->add_control(
   			'price_notes',
   			[
   				'label'       => esc_html__( 'Notes', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( 'Pricing plan for startup company' , 'creote-addons'),
   			]
           );
           $repeater->add_control(
   			'price',
   			[
   				'label'       => esc_html__( 'Price', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( '$35' , 'creote-addons'),
   			]
           );
           $repeater->add_control(
   			'description',
   			[
   				'label'       => esc_html__( 'Description', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( 'Loves or pursues or desires obtain pain
                   of itself is pain occasionally.' , 'creote-addons'),
   			]
           );
           $repeater->add_control(
   			'button_text',
   			[
   				'label'       => esc_html__( 'Plan Button', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( 'Choosr Plan' , 'creote-addons'),
   			]
           );
           $repeater->add_control(
               'button_link',
           [
               'label' => __('Plan Link', 'creote-addons'),
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
           $repeater->add_control(
   			'features_enable',
   			[
   				'label' => __( 'Features Enable', 'creote-addons' ),
   				'type' => Controls_Manager::SWITCHER,
   				'label_on' => __( 'Show', 'creote-addons' ),
   				'label_off' => __( 'Hide', 'creote-addons' ),
   				'return_value' => 'yes',
   				'default' => 'yes',
   			]
   		);
           $repeater->add_control(
               'plan_benifits',
               [
                 'label'       => esc_html__( 'Plan Benifits Yes', 'creote-addons' ),
                 'type'        => Controls_Manager::TEXTAREA,
                  'default' =>  esc_html__( 'Document watermarking' , 'creote-addons'),
                  'condition' => [
                   'features_enable' => 'yes',
                  ],
               ]
             );
             $repeater->add_control(
               'plan_benifits_no',
               [
                 'label'       => esc_html__( 'Plan Benifits No', 'creote-addons' ),
                 'type'        => Controls_Manager::TEXTAREA,
                 'default' =>  esc_html__( 'Document watermarking' , 'creote-addons'),
                 'condition' => [
                   'features_enable' => 'yes',
                  ],
               ]
             );
           $repeater->add_control(
               'tag_enable',
               [
                 'label' => __( 'Offer Enable', 'creote-addons' ),
                 'type' => Controls_Manager::SWITCHER,
                 'label_on' => __( 'Show', 'creote-addons' ),
                 'label_off' => __( 'Hide', 'creote-addons' ),
                 'return_value' => 'yes',
                 'default' => 'yes',
               ]
             );
             $repeater->add_control(
               'tag_content',
               [
                 'label'       => esc_html__( 'Tag Text', 'creote-addons' ),
                 'type'        => Controls_Manager::TEXT,
                 'default' =>  esc_html__( 'Popular' , 'creote-addons'),
                 'condition' => [
                   'tag_enable' => 'yes',
                  ],
               ]
             );
           $this->add_control(
               'price_tab_v1_repeater_one',
               [
                   'label' => __('Price Plan Repeater Tab One', 'creote-addons'),
                   'type' => Controls_Manager::REPEATER,
                   'fields' => $repeater->get_controls(),
                   'default' => [
                       [
                       'price_title' =>  esc_html__( 'Bronze Package' , 'creote-addons'),
                       'price_notes' =>  esc_html__('Pricing plan for startup company' , 'creote-addons'),
                       'price'  =>  esc_html__('149' , 'creote-addons'),
                       'description'  =>  esc_html__('Loves or pursues or desires obtain pain
                       of itself is pain occasionally.' , 'creote-addons'),
                       'button_text'  =>  esc_html__('Get Now' , 'creote-addons'),
                       'features_enable'=>  esc_html__('yes' , 'creote-addons'),
                       'plan_benifits'=>  esc_html__('Document watermarking' , 'creote-addons'),
                       'plan_benifits_no'=>  esc_html__('Document watermarking' , 'creote-addons'),
                       'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                       ],
                        [
                       'price_title' =>  esc_html__( 'Bronze Package' , 'creote-addons'),
                       'price_notes' =>  esc_html__('Pricing plan for startup company' , 'creote-addons'),
                       'price'  =>  esc_html__('149' , 'creote-addons'),
                       'description'  =>  esc_html__('Loves or pursues or desires obtain pain
                       of itself is pain occasionally.' , 'creote-addons'),
                       'button_text'  =>  esc_html__('Get Now' , 'creote-addons'),
                       'features_enable'=>  esc_html__('yes' , 'creote-addons'),
                       'plan_benifits'=>  esc_html__('Document watermarking' , 'creote-addons'),
                       'plan_benifits_no'=>  esc_html__('Document watermarking' , 'creote-addons'),
                       'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                       ],
                        [
                       'price_title' =>  esc_html__( 'Bronze Package' , 'creote-addons'),
                       'price_notes' =>  esc_html__('Pricing plan for startup company' , 'creote-addons'),
                       'price'  =>  esc_html__('149' , 'creote-addons'),
                       'description'  =>  esc_html__('Loves or pursues or desires obtain pain
                       of itself is pain occasionally.' , 'creote-addons'),
                       'button_text'  =>  esc_html__('Get Now' , 'creote-addons'),
                       'features_enable'=>  esc_html__('yes' , 'creote-addons'),
                       'plan_benifits'=>  esc_html__('Document watermarking' , 'creote-addons'),
                       'plan_benifits_no'=>  esc_html__('Document watermarking' , 'creote-addons'),
                       'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                       ] 
                   ],
                   'title_field' => '{{{ price_title }}}',
               ]
           );
           $repeater = new Repeater();
           $repeater->add_control(
   			'price_title',
   			[
   				'label'       => esc_html__( 'Heading', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( 'Bronze Package' , 'creote-addons'),
   			]
           );
           $repeater->add_control(
   			'price_notes',
   			[
   				'label'       => esc_html__( 'Notes', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( 'Pricing plan for startup company' , 'creote-addons'),
   			]
           );
           $repeater->add_control(
   			'price',
   			[
   				'label'       => esc_html__( 'Price', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( '$35' , 'creote-addons'),
   			]
           );
           $repeater->add_control(
   			'description',
   			[
   				'label'       => esc_html__( 'Description', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( 'Loves or pursues or desires obtain pain
                   of itself is pain occasionally.' , 'creote-addons'),
   			]
           );
           $repeater->add_control(
   			'button_text',
   			[
   				'label'       => esc_html__( 'Plan Button', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( 'Choosr Plan' , 'creote-addons'),
   			]
           );
           $repeater->add_control(
               'button_link',
           [
               'label' => __('Plan Link', 'creote-addons'),
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
           $repeater->add_control(
   			'features_enable',
   			[
   				'label' => __( 'Features Enable', 'creote-addons' ),
   				'type' => Controls_Manager::SWITCHER,
   				'label_on' => __( 'Show', 'creote-addons' ),
   				'label_off' => __( 'Hide', 'creote-addons' ),
   				'return_value' => 'yes',
   				'default' => 'yes',
   			]
   		);
           $repeater->add_control(
               'plan_benifits',
               [
                 'label'       => esc_html__( 'Plan Benifits Yes', 'creote-addons' ),
                 'type'        => Controls_Manager::TEXTAREA,
                  'default' =>  esc_html__( 'Document watermarking' , 'creote-addons'),
                  'condition' => [
                   'features_enable' => 'yes',
                  ],
               ]
             );
             $repeater->add_control(
               'plan_benifits_no',
               [
                 'label'       => esc_html__( 'Plan Benifits No', 'creote-addons' ),
                 'type'        => Controls_Manager::TEXTAREA,
                 'default' =>  esc_html__( 'Document watermarking' , 'creote-addons'),
                 'condition' => [
                   'features_enable' => 'yes',
                  ],
               ]
             );
           $repeater->add_control(
               'tag_enable',
               [
                 'label' => __( 'Offer Enable', 'creote-addons' ),
                 'type' => Controls_Manager::SWITCHER,
                 'label_on' => __( 'Show', 'creote-addons' ),
                 'label_off' => __( 'Hide', 'creote-addons' ),
                 'return_value' => 'yes',
                 'default' => 'yes',
               ]
             );
             $repeater->add_control(
               'tag_content',
               [
                 'label'       => esc_html__( 'Tag Text', 'creote-addons' ),
                 'type'        => Controls_Manager::TEXT,
                 'default' =>  esc_html__( 'Popular' , 'creote-addons'),
                 'condition' => [
                   'tag_enable' => 'yes',
                  ],
               ]
             );
           $this->add_control(
               'price_tab_v1_repeater_two',
               [
                   'label' => __('Price Plan Repeater Tab Two', 'creote-addons'),
                   'type' => Controls_Manager::REPEATER,
                   'fields' => $repeater->get_controls(),
                   'default' => [
                       [
                       'price_title' =>  esc_html__( 'Bronze Package' , 'creote-addons'),
                       'price_notes' =>  esc_html__('Pricing plan for startup company' , 'creote-addons'),
                       'price'  =>  esc_html__('149' , 'creote-addons'),
                       'description'  =>  esc_html__('Loves or pursues or desires obtain pain
                       of itself is pain occasionally.' , 'creote-addons'),
                       'button_text'  =>  esc_html__('Get Now' , 'creote-addons'),
                       'features_enable'=>  esc_html__('yes' , 'creote-addons'),
                       'plan_benifits'=>  esc_html__('Collaboration with up to 10 users' , 'creote-addons'),
                       'plan_benifits_no'=>  esc_html__('Collaboration with up to 10 users' , 'creote-addons'),
                       'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                       ],
                        [
                       'price_title' =>  esc_html__( 'Bronze Package' , 'creote-addons'),
                       'price_notes' =>  esc_html__('Pricing plan for startup company' , 'creote-addons'),
                       'price'  =>  esc_html__('149' , 'creote-addons'),
                       'description'  =>  esc_html__('Loves or pursues or desires obtain pain
                       of itself is pain occasionally.' , 'creote-addons'),
                       'button_text'  =>  esc_html__('Get Now' , 'creote-addons'),
                       'features_enable'=>  esc_html__('yes' , 'creote-addons'),
                       'plan_benifits'=>  esc_html__('Collaboration with up to 10 users' , 'creote-addons'),
                       'plan_benifits_no'=>  esc_html__('Collaboration with up to 10 users' , 'creote-addons'),
                       'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                       ],
                        [
                       'price_title' =>  esc_html__( 'Bronze Package' , 'creote-addons'),
                       'price_notes' =>  esc_html__('Pricing plan for startup company' , 'creote-addons'),
                       'price'  =>  esc_html__('149' , 'creote-addons'),
                       'description'  =>  esc_html__('Loves or pursues or desires obtain pain
                       of itself is pain occasionally.' , 'creote-addons'),
                       'button_text'  =>  esc_html__('Get Now' , 'creote-addons'),
                       'features_enable'=>  esc_html__('yes' , 'creote-addons'),
                       'plan_benifits'=>  esc_html__('Collaboration with up to 10 users' , 'creote-addons'),
                       'plan_benifits_no'=>  esc_html__('Collaboration with up to 10 users' , 'creote-addons'),
                       'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                       ] 
                   ],
                   'title_field' => '{{{ price_title }}}',
               ]
           );
           $this->end_controls_section();
           // =======================================================price plan style two
           $this->start_controls_section(
             'price_tab_content_two',
             [
                 'label' => __('Tab  Content', 'creote-addons'),
                 'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                 'condition' => [
                   'price_plan_styles' => 'style_two'
                 ],
             ]
         );
         $repeater = new Repeater();
         $repeater->add_control(
       'price_title',
       [
         'label'       => esc_html__( 'Heading', 'creote-addons' ),
         'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'Bronze Package' , 'creote-addons'),
       ]
         );
         $repeater->add_control(
       'price_notes',
       [
         'label'       => esc_html__( 'Notes', 'creote-addons' ),
         'type'        => Controls_Manager::TEXT,
                 'default' =>  esc_html__( 'Pricing plan for startup company' , 'creote-addons'),
       ]
         );
         $repeater->add_control(
       'price',
       [
         'label'       => esc_html__( 'Price', 'creote-addons' ),
         'type'        => Controls_Manager::TEXT,
                 'default' =>  esc_html__( '$35' , 'creote-addons'),
       ]
         );
         $repeater->add_control(
       'button_text',
       [
         'label'       => esc_html__( 'Plan Button', 'creote-addons' ),
         'type'        => Controls_Manager::TEXT,
                 'default' =>  esc_html__( 'Choosr Plan' , 'creote-addons'),
       ]
         );
         $repeater->add_control(
             'button_link',
         [
             'label' => __('Plan Link', 'creote-addons'),
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
         $repeater->add_control(
       'features_enable',
       [
         'label' => __( 'Features Enable', 'creote-addons' ),
         'type' => Controls_Manager::SWITCHER,
         'label_on' => __( 'Show', 'creote-addons' ),
         'label_off' => __( 'Hide', 'creote-addons' ),
         'return_value' => 'yes',
         'default' => 'yes',
       ]
     );
         $repeater->add_control(
             'plan_benifits',
             [
               'label'       => esc_html__( 'Plan Benifits Yes', 'creote-addons' ),
               'type'        => Controls_Manager::TEXTAREA,
                'default' =>  esc_html__( 'Document watermarking' , 'creote-addons'),
                'condition' => [
                 'features_enable' => 'yes',
                ],
             ]
           );
           $repeater->add_control(
             'plan_benifits_no',
             [
               'label'       => esc_html__( 'Plan Benifits No', 'creote-addons' ),
               'type'        => Controls_Manager::TEXTAREA,
               'default' =>  esc_html__( 'Document watermarking' , 'creote-addons'),
               'condition' => [
                 'features_enable' => 'yes',
                ],
             ]
           );
         $repeater->add_control(
             'tag_enable',
             [
               'label' => __( 'Offer Enable', 'creote-addons' ),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __( 'Show', 'creote-addons' ),
               'label_off' => __( 'Hide', 'creote-addons' ),
               'return_value' => 'yes',
               'default' => 'yes',
             ]
           );
           $repeater->add_control(
             'tag_content',
             [
               'label'       => esc_html__( 'Tag Text', 'creote-addons' ),
               'type'        => Controls_Manager::TEXT,
               'default' =>  esc_html__( 'Popular' , 'creote-addons'),
               'condition' => [
                 'tag_enable' => 'yes',
                ],
             ]
           );
         $this->add_control(
             'price_tab_v2_repeater_one',
             [
                 'label' => __('Price Plan Repeater Tab One', 'creote-addons'),
                 'type' => Controls_Manager::REPEATER,
                 'fields' => $repeater->get_controls(),
                 'default' => [
                     [
                     'price_title' =>  esc_html__( 'Bronze Package' , 'creote-addons'),
                     'price_notes' =>  esc_html__('Pricing plan for startup company' , 'creote-addons'),
                     'price'  =>  esc_html__('149' , 'creote-addons'),
                     'button_text'  =>  esc_html__('Get Now' , 'creote-addons'),
                     'features_enable'=>  esc_html__('yes' , 'creote-addons'),
                     'plan_benifits'=>  esc_html__('Document watermarking' , 'creote-addons'),
                     'plan_benifits_no'=>  esc_html__('Document watermarking' , 'creote-addons'),
                     'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                     ],
                      [
                     'price_title' =>  esc_html__( 'Bronze Package' , 'creote-addons'),
                     'price_notes' =>  esc_html__('Pricing plan for startup company' , 'creote-addons'),
                     'price'  =>  esc_html__('149' , 'creote-addons'),
                     'button_text'  =>  esc_html__('Get Now' , 'creote-addons'),
                     'features_enable'=>  esc_html__('yes' , 'creote-addons'),
                     'plan_benifits'=>  esc_html__('Document watermarking' , 'creote-addons'),
                     'plan_benifits_no'=>  esc_html__('Document watermarking' , 'creote-addons'),
                     'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                     ],
                      [
                     'price_title' =>  esc_html__( 'Bronze Package' , 'creote-addons'),
                     'price_notes' =>  esc_html__('Pricing plan for startup company' , 'creote-addons'),
                     'price'  =>  esc_html__('149' , 'creote-addons'),
                     'button_text'  =>  esc_html__('Get Now' , 'creote-addons'),
                     'features_enable'=>  esc_html__('yes' , 'creote-addons'),
                     'plan_benifits'=>  esc_html__('Document watermarking' , 'creote-addons'),
                     'plan_benifits_no'=>  esc_html__('Document watermarking' , 'creote-addons'),
                     'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                     ] 
                 ],
                 'title_field' => '{{{ price_title }}}',
             ]
         );
         $repeater = new Repeater();
         $repeater->add_control(
       'price_title',
       [
         'label'       => esc_html__( 'Heading', 'creote-addons' ),
         'type'        => Controls_Manager::TEXT,
                 'default' =>  esc_html__( 'Bronze Package' , 'creote-addons'),
       ]
         );
         $repeater->add_control(
       'price_notes',
       [
         'label'       => esc_html__( 'Notes', 'creote-addons' ),
         'type'        => Controls_Manager::TEXT,
                 'default' =>  esc_html__( 'Pricing plan for startup company' , 'creote-addons'),
       ]
         );
         $repeater->add_control(
       'price',
       [
         'label'       => esc_html__( 'Price', 'creote-addons' ),
         'type'        => Controls_Manager::TEXT,
                 'default' =>  esc_html__( '$35' , 'creote-addons'),
       ]
         );
         $repeater->add_control(
       'button_text',
       [
         'label'       => esc_html__( 'Plan Button', 'creote-addons' ),
         'type'        => Controls_Manager::TEXT,
                 'default' =>  esc_html__( 'Choosr Plan' , 'creote-addons'),
       ]
         );
         $repeater->add_control(
             'button_link',
         [
             'label' => __('Plan Link', 'creote-addons'),
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
         $repeater->add_control(
       'features_enable',
       [
         'label' => __( 'Features Enable', 'creote-addons' ),
         'type' => Controls_Manager::SWITCHER,
         'label_on' => __( 'Show', 'creote-addons' ),
         'label_off' => __( 'Hide', 'creote-addons' ),
         'return_value' => 'yes',
         'default' => 'yes',
       ]
     );
         $repeater->add_control(
             'plan_benifits',
             [
               'label'       => esc_html__( 'Plan Benifits Yes', 'creote-addons' ),
               'type'        => Controls_Manager::TEXTAREA,
                'default' =>  esc_html__( 'Document watermarking' , 'creote-addons'),
                'condition' => [
                 'features_enable' => 'yes',
                ],
             ]
           );
           $repeater->add_control(
             'plan_benifits_no',
             [
               'label'       => esc_html__( 'Plan Benifits No', 'creote-addons' ),
               'type'        => Controls_Manager::TEXTAREA,
               'default' =>  esc_html__( 'Document watermarking' , 'creote-addons'),
               'condition' => [
                 'features_enable' => 'yes',
                ],
             ]
           );
         $repeater->add_control(
             'tag_enable',
             [
               'label' => __( 'Offer Enable', 'creote-addons' ),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __( 'Show', 'creote-addons' ),
               'label_off' => __( 'Hide', 'creote-addons' ),
               'return_value' => 'yes',
               'default' => 'yes',
             ]
           );
           $repeater->add_control(
             'tag_content',
             [
               'label'       => esc_html__( 'Tag Text', 'creote-addons' ),
               'type'        => Controls_Manager::TEXT,
               'default' =>  esc_html__( 'Popular' , 'creote-addons'),
               'condition' => [
                 'tag_enable' => 'yes',
                ],
             ]
           );
         $this->add_control(
             'price_tab_v2_repeater_two',
             [
                 'label' => __('Price Plan Repeater Tab Two', 'creote-addons'),
                 'type' => Controls_Manager::REPEATER,
                 'fields' => $repeater->get_controls(),
                 'default' => [
                     [
                     'price_title' =>  esc_html__( 'Bronze Package' , 'creote-addons'),
                     'price_notes' =>  esc_html__('Pricing plan for startup company' , 'creote-addons'),
                     'price'  =>  esc_html__('149' , 'creote-addons'),
                     'button_text'  =>  esc_html__('Get Now' , 'creote-addons'),
                     'features_enable'=>  esc_html__('yes' , 'creote-addons'),
                     'plan_benifits'=>  esc_html__('Collaboration with up to 10 users' , 'creote-addons'),
                     'plan_benifits_no'=>  esc_html__('Collaboration with up to 10 users' , 'creote-addons'),
                     'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                     ],
                      [
                     'price_title' =>  esc_html__( 'Bronze Package' , 'creote-addons'),
                     'price_notes' =>  esc_html__('Pricing plan for startup company' , 'creote-addons'),
                     'price'  =>  esc_html__('149' , 'creote-addons'),
                     'button_text'  =>  esc_html__('Get Now' , 'creote-addons'),
                     'features_enable'=>  esc_html__('yes' , 'creote-addons'),
                     'plan_benifits'=>  esc_html__('Collaboration with up to 10 users' , 'creote-addons'),
                     'plan_benifits_no'=>  esc_html__('Collaboration with up to 10 users' , 'creote-addons'),
                     'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                     ],
                      [
                     'price_title' =>  esc_html__( 'Bronze Package' , 'creote-addons'),
                     'price_notes' =>  esc_html__('Pricing plan for startup company' , 'creote-addons'),
                     'price'  =>  esc_html__('149' , 'creote-addons'),
                     'button_text'  =>  esc_html__('Get Now' , 'creote-addons'),
                     'features_enable'=>  esc_html__('yes' , 'creote-addons'),
                     'plan_benifits'=>  esc_html__('Collaboration with up to 10 users' , 'creote-addons'),
                     'plan_benifits_no'=>  esc_html__('Collaboration with up to 10 users' , 'creote-addons'),
                     'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                     ] 
                 ],
                 'title_field' => '{{{ price_title }}}',
             ]
         );
         $this->end_controls_section();
       }
       protected function render()
       {
           $settings = $this->get_settings_for_display();
           $allowed_tags = wp_kses_allowed_html('post');
   ?>
<section class="price_plan_with_tab price_tb_<?php echo esc_attr($settings['price_plan_styles']); ?>"> <div class="row"> <div class="col-lg-12 ml-auto"> <div class="tab_pricing_list"> <ul class="nav nav-tabs" id="myTab" role="tablist"> <?php if(!empty($settings['tab_one_name'])): ?> <li class="nav-item" role="presentation"> <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"> <?php echo esc_html($settings['tab_one_name']); ?></button> </li> <?php endif; ?> <?php if(!empty($settings['tab_two_name'])): ?> <li class="nav-item" role="presentation"> <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"> <?php echo esc_html($settings['tab_two_name']); ?></button> </li> <?php endif; ?> </ul> </div> </div> </div> <div class="tab-content price_tab_content" id="myTabContent"> <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> <div class="row"> <?php if($settings['price_plan_styles'] == 'style_one'): ?> <?php // style one ?> <?php foreach($settings['price_tab_v1_repeater_one'] as $key => $price_tab_v1_repeater_one):?> <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <div class="price_plan_box style_one <?php if($price_tab_v1_repeater_one['tag_enable'] == 'yes'): ?> tag_enables <?php endif; ?>"> <?php if($price_tab_v1_repeater_one['tag_enable'] == 'yes'): ?> <div class="tag"><?php echo wp_kses($price_tab_v1_repeater_one['tag_content'] , $allowed_tags) ?></div> <?php endif; ?> <div class="inner_box"> <div class="top"> <?php if(!empty($price_tab_v1_repeater_one['price_title'])): ?> <h2><?php echo wp_kses($price_tab_v1_repeater_one['price_title'] , $allowed_tags) ?></h2> <?php endif; ?> <?php if(!empty($price_tab_v1_repeater_one['price_notes'])): ?> <p><?php echo wp_kses($price_tab_v1_repeater_one['price_notes'] , $allowed_tags) ?></p> <?php endif; ?> </div> <div class="mid"> <?php if(!empty($price_tab_v1_repeater_one['price'])): ?> <h4><?php echo wp_kses($price_tab_v1_repeater_one['price'] , $allowed_tags) ?></h4> <?php endif; ?> <?php if(!empty($price_tab_v1_repeater_one['description'])): ?> <p><?php echo wp_kses($price_tab_v1_repeater_one['description'] , $allowed_tags) ?></p> <?php endif; ?> </div> <div class="bottom"> <?php if($price_tab_v1_repeater_one['features_enable'] == 'yes'): ?> <ul> <?php if(!empty($price_tab_v1_repeater_one['plan_benifits'])): ?> <?php $plan_benifitss = explode("\n", ($price_tab_v1_repeater_one['plan_benifits']));?> <?php foreach($plan_benifitss as $plan_benifit):?> <li> <span> <?php echo wp_kses($plan_benifit, true); ?></span> <i class="fa fa-check"></i> </li> <?php endforeach; ?> <?php endif; ?> <?php if(!empty($price_tab_v1_repeater_one['plan_benifits_no'])): ?> <?php $plan_benifits_nos = explode("\n", ($price_tab_v1_repeater_one['plan_benifits_no']));?> <?php foreach($plan_benifits_nos as $plan_benifits_no):?> <li> <span> <?php echo wp_kses($plan_benifits_no, true); ?></span> <i class="fa fa-times"></i> </li> <?php endforeach; ?> <?php endif; ?> </ul> <?php endif; ?> <?php if(!empty($price_tab_v1_repeater_one['button_text'])): ?> <?php $target = $price_tab_v1_repeater_one['button_link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $price_tab_v1_repeater_one['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <a href="<?php echo esc_url($price_tab_v1_repeater_one['button_link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn two"> <?php echo esc_html($price_tab_v1_repeater_one['button_text']);?> </a> <?php endif;?> </div> </div> </div> </div> <?php endforeach;?> <?php // style one end ?> <?php elseif($settings['price_plan_styles'] == 'style_two'): ?> <?php // style Two ?> <?php foreach($settings['price_tab_v2_repeater_one'] as $key => $price_tab_v2_repeater_one):?> <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <div class="price_plan_box style_two <?php if($price_tab_v2_repeater_one['tag_enable'] == 'yes'): ?> tag_enables <?php endif; ?>"> <?php if($price_tab_v2_repeater_one['tag_enable'] == 'yes'): ?> <div class="tag"><?php echo wp_kses($price_tab_v2_repeater_one['tag_content'] , $allowed_tags) ?></div> <?php endif; ?> <div class="inner_box"> <div class="top"> <?php if(!empty($price_tab_v2_repeater_one['price_title'])): ?> <h2><?php echo wp_kses($price_tab_v2_repeater_one['price_title'] , $allowed_tags) ?></h2> <?php endif; ?> <?php if(!empty($price_tab_v2_repeater_one['price_notes'])): ?> <p><?php echo wp_kses($price_tab_v2_repeater_one['price_notes'] , $allowed_tags) ?></p> <?php endif; ?> </div> <div class="mid"> <?php if(!empty($price_tab_v2_repeater_one['price'])): ?> <h4><?php echo wp_kses($price_tab_v2_repeater_one['price'] , $allowed_tags) ?></h4> <?php endif; ?> </div> <div class="bottom"> <?php if($price_tab_v2_repeater_one['features_enable'] == 'yes'): ?> <ul> <?php if(!empty($price_tab_v2_repeater_one['plan_benifits'])): ?> <?php $plan_benifitss = explode("\n", ($price_tab_v2_repeater_one['plan_benifits']));?> <?php foreach($plan_benifitss as $plan_benifit):?> <li> <span> <?php echo wp_kses($plan_benifit, true); ?></span> <i class="fa fa-check"></i> </li> <?php endforeach; ?> <?php endif; ?> <?php if(!empty($price_tab_v2_repeater_one['plan_benifits_no'])): ?> <?php $plan_benifits_nos = explode("\n", ($price_tab_v2_repeater_one['plan_benifits_no']));?> <?php foreach($plan_benifits_nos as $plan_benifits_no):?> <li> <span> <?php echo wp_kses($plan_benifits_no, true); ?></span> <i class="fa fa-times"></i> </li> <?php endforeach; ?> <?php endif; ?> </ul> <?php endif; ?> <?php if(!empty($price_tab_v2_repeater_one['button_text'])): ?> <?php $target = $price_tab_v2_repeater_one['button_link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $price_tab_v2_repeater_one['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <a href="<?php echo esc_url($price_tab_v2_repeater_one['button_link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn two"> <?php echo esc_html($price_tab_v2_repeater_one['button_text']);?> </a> <?php endif;?> </div> </div> </div> </div> <?php endforeach;?> <?php // style Two end ?> <?php endif; ?> </div> </div> <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"> <div class="row"> <?php if($settings['price_plan_styles'] == 'style_two'): ?> <?php // style Two ?> <?php foreach($settings['price_tab_v2_repeater_two'] as $key => $price_tab_v2_repeater_two):?> <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <div class="price_plan_box style_two <?php if($price_tab_v2_repeater_two['tag_enable'] == 'yes'): ?> tag_enables <?php endif; ?>"> <?php if($price_tab_v2_repeater_two['tag_enable'] == 'yes'): ?> <div class="tag"><?php echo wp_kses($price_tab_v2_repeater_two['tag_content'] , $allowed_tags) ?></div> <?php endif; ?> <div class="inner_box"> <div class="top"> <?php if(!empty($price_tab_v2_repeater_two['price_title'])): ?> <h2><?php echo wp_kses($price_tab_v2_repeater_two['price_title'] , $allowed_tags) ?></h2> <?php endif; ?> <?php if(!empty($price_tab_v2_repeater_two['price_notes'])): ?> <p><?php echo wp_kses($price_tab_v2_repeater_two['price_notes'] , $allowed_tags) ?></p> <?php endif; ?> </div> <div class="mid"> <?php if(!empty($price_tab_v2_repeater_two['price'])): ?> <h4><?php echo wp_kses($price_tab_v2_repeater_two['price'] , $allowed_tags) ?></h4> <?php endif; ?> </div> <div class="bottom"> <?php if($price_tab_v2_repeater_two['features_enable'] == 'yes'): ?> <ul> <?php if(!empty($price_tab_v2_repeater_two['plan_benifits'])): ?> <?php $plan_benifitsstwo = explode("\n", ($price_tab_v2_repeater_two['plan_benifits']));?> <?php foreach($plan_benifitsstwo as $plan_benifitwo):?> <li> <span> <?php echo wp_kses($plan_benifitwo, true); ?></span> <i class="fa fa-check"></i> </li> <?php endforeach; ?> <?php endif; ?> <?php if(!empty($price_tab_v2_repeater_two['plan_benifits_no'])): ?> <?php $plan_benifits_notwos = explode("\n", ($price_tab_v2_repeater_two['plan_benifits_no']));?> <?php foreach($plan_benifits_notwos as $plan_benifits_notwo):?> <li> <span> <?php echo wp_kses($plan_benifits_notwo, true); ?></span> <i class="fa fa-times"></i> </li> <?php endforeach; ?> <?php endif; ?> </ul> <?php endif; ?> <?php if(!empty($price_tab_v2_repeater_two['button_text'])): ?> <?php $targetwo = $price_tab_v2_repeater_two['button_link']['is_external'] ? ' target="_blank"' : ''; $nofollowtwo = $price_tab_v2_repeater_two['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <a href="<?php echo esc_url($price_tab_v2_repeater_two['button_link']['url']);?>" <?php echo esc_attr($targetwo); ?> <?php echo esc_attr($nofollowtwo); ?> class="theme-btn two"> <?php echo esc_html($price_tab_v2_repeater_two['button_text']);?> </a> <?php endif;?> </div> </div> </div> </div> <?php endforeach;?> <?php else: ?> <?php foreach($settings['price_tab_v1_repeater_two'] as $key => $price_tab_v1_repeater_two):?> <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <div class="price_plan_box style_one <?php if($price_tab_v1_repeater_two['tag_enable'] == 'yes'): ?> tag_enables <?php endif; ?>"> <?php if($price_tab_v1_repeater_two['tag_enable'] == 'yes'): ?> <div class="tag"><?php echo wp_kses($price_tab_v1_repeater_two['tag_content'] , $allowed_tags) ?></div> <?php endif; ?> <div class="inner_box"> <div class="top"> <?php if(!empty($price_tab_v1_repeater_two['price_title'])): ?> <h2><?php echo wp_kses($price_tab_v1_repeater_two['price_title'] , $allowed_tags) ?></h2> <?php endif; ?> <?php if(!empty($price_tab_v1_repeater_two['price_notes'])): ?> <p><?php echo wp_kses($price_tab_v1_repeater_two['price_notes'] , $allowed_tags) ?></p> <?php endif; ?> </div> <div class="mid"> <?php if(!empty($price_tab_v1_repeater_two['price'])): ?> <h4><?php echo wp_kses($price_tab_v1_repeater_two['price'] , $allowed_tags) ?></h4> <?php endif; ?> <?php if(!empty($price_tab_v1_repeater_two['description'])): ?> <p><?php echo wp_kses($price_tab_v1_repeater_two['description'] , $allowed_tags) ?></p> <?php endif; ?> </div> <div class="bottom"> <?php if($price_tab_v1_repeater_two['features_enable'] == 'yes'): ?> <ul> <?php if(!empty($price_tab_v1_repeater_two['plan_benifits'])): ?> <?php $plan_benifitsstwo = explode("\n", ($price_tab_v1_repeater_two['plan_benifits']));?> <?php foreach($plan_benifitsstwo as $plan_benifitwo):?> <li> <span> <?php echo wp_kses($plan_benifitwo, true); ?></span> <i class="fa fa-check"></i> </li> <?php endforeach; ?> <?php endif; ?> <?php if(!empty($price_tab_v1_repeater_two['plan_benifits_no'])): ?> <?php $plan_benifits_notwos = explode("\n", ($price_tab_v1_repeater_two['plan_benifits_no']));?> <?php foreach($plan_benifits_notwos as $plan_benifits_notwo):?> <li> <span> <?php echo wp_kses($plan_benifits_notwo, true); ?></span> <i class="fa fa-times"></i> </li> <?php endforeach; ?> <?php endif; ?> </ul> <?php endif; ?> <?php if(!empty($price_tab_v1_repeater_two['button_text'])): ?> <?php $targetwo = $price_tab_v1_repeater_two['button_link']['is_external'] ? ' target="_blank"' : ''; $nofollowtwo = $price_tab_v1_repeater_two['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <a href="<?php echo esc_url($price_tab_v1_repeater_two['button_link']['url']);?>" <?php echo esc_attr($targetwo); ?> <?php echo esc_attr($nofollowtwo); ?> class="theme-btn two"> <?php echo esc_html($price_tab_v1_repeater_two['button_text']);?> </a> <?php endif;?> </div> </div> </div> </div> <?php endforeach;?> <?php // style Two end ?> <?php endif;?> </div> </div> </div></section>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_price_plan_tab_v1());