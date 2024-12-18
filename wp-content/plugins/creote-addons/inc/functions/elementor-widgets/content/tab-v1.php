<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_tab_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-tab-v1';
       }
       public function get_title()
       {
           return __('Tabs V1' , 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['102'];
       }
       protected function register_controls()
       {
           $this->start_controls_section(
               'tabs_settings_content',
               [
                   'label' => __('Tabs Content Box', 'creote-addons')
               ]
           );
           $this->add_control(
             'tab_box_style',
             [
                 'label' => __('Tab Style', 'creote-addons'),
                 'type' => Controls_Manager::SELECT,
                 'options' => [
                     'type_one'  => __('Tab Style One', 'creote-addons'),
                     'type_two'  => __('Tab  Style Two', 'creote-addons'),
                     'type_three'  => __('Tab  Style Three', 'creote-addons'),
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
           $this->end_controls_section();
           $this->start_controls_section(
             'tabs_settings_style_one',
             [
                 'label' => __('Tabs Content Box', 'creote-addons'),
                 'condition' => [
                   'tab_box_style' => 'type_one',
               ],
             ]
         );
           $repeater = new Repeater();
           $repeater->add_control(
   			'tab_id',
   			[
   				'label'       => esc_html__( 'Tab Id Without gap', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( 'tabone' , 'creote-addons'),
   			]
           );
           $repeater->add_control(
             'tab_title',
             [
               'label'       => esc_html__( 'Tab Title', 'creote-addons' ),
               'type'        => Controls_Manager::TEXT,
               'default' =>  esc_html__( '01. Affordable' , 'creote-addons'),
           ]);
         $repeater->add_control(
           'con_hg_text',
           [
             'label'       => esc_html__( 'Highlight Text', 'creote-addons' ),
             'type'        => Controls_Manager::TEXT,
             'default' =>  esc_html__( 'Why Creote.' , 'creote-addons'),
             ]
         );
         $repeater->add_control(
   			'con_title',
   			[
   				'label'       => esc_html__( 'Tab Title', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'Affordable & Flexible' , 'creote-addons'),
   			]);
           $repeater->add_control(
   			'con_des',
   			[
   				'label'       => esc_html__( 'Tab Description', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
           'default' =>  esc_html__( 'Must explain too you how all this mistaken idea of denouncing pleasures
                   praising pain was born and we will give you complete account of the system
                   the actual teachings of the great explorer.' , 'creote-addons'), 
   			]);
           $repeater->add_control(
             'button_text',
             [
               'label'       => esc_html__( 'Button Text', 'creote-addons' ),
               'type'        => Controls_Manager::TEXT,
                       'default' =>  esc_html__( 'Contact us' , 'creote-addons'),
           ]);
           $repeater->add_control(
             'button_link',
             [
               'label' => __('Theme Link', 'creote-addons'),
               'type' => Controls_Manager::URL,
               'placeholder' => __('https://your-link.com', 'creote-addons'),
               'show_external' => true,
               'default' => [
                   'url' => '#',
                   'is_external' => true,
                   'nofollow' => true,
               ],
           ]);  
           $repeater->add_control(
               'hssoemtw',
               [
                   'type' => Controls_Manager::DIVIDER,
               ]
             );
           $repeater->add_control(
               'tab_image',
               [
                   'label' => __('Image', 'creote-addons'),
                   'type' => Controls_Manager::MEDIA,
                   'default' => [
                       'url' => \Elementor\Utils::get_placeholder_image_src(),
                     ],
               ]
           );
           $this->add_control(
               'tabs_content_v1_repeater',
               [
                   'label' => __('tabs Content Repeater', 'creote-addons'),
                   'type' => Controls_Manager::REPEATER,
                   'fields' => $repeater->get_controls(),
                   'default' => [
                       [
                       'tab_id' =>  esc_html__( 'tabone' , 'creote-addons'),
                       'tab_title' =>  esc_html__('01. Affordable' , 'creote-addons'),
                       'con_hg_text'  =>  esc_html__('Why Creote' , 'creote-addons'),
                       'con_title'  =>  esc_html__('Affordable & Flexible' , 'creote-addons'),
                       'con_des'  =>  esc_html__('Must explain too you how all this mistaken idea of denouncing pleasures
                       praising pain was born and we will give you complete account of the system
                       the actual teachings of the great explorer.' , 'creote-addons'),
                       'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                       ],
                       [
                         'tab_id' =>  esc_html__( 'tabtwo' , 'creote-addons'),
                         'tab_title' =>  esc_html__('01. Affordable' , 'creote-addons'),
                         'con_hg_text'  =>  esc_html__('Why Creote' , 'creote-addons'),
                         'con_title'  =>  esc_html__('Affordable & Flexible' , 'creote-addons'),
                         'con_des'  =>  esc_html__('Must explain too you how all this mistaken idea of denouncing pleasures
                         praising pain was born and we will give you complete account of the system
                         the actual teachings of the great explorer.' , 'creote-addons'),
                         'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                       ],
                       [
                         'tab_id' =>  esc_html__( 'tabthree' , 'creote-addons'),
                         'tab_title' =>  esc_html__('01. Affordable' , 'creote-addons'),
                         'con_hg_text'  =>  esc_html__('Why Creote' , 'creote-addons'),
                         'con_title'  =>  esc_html__('Affordable & Flexible' , 'creote-addons'),
                         'con_des'  =>  esc_html__('Must explain too you how all this mistaken idea of denouncing pleasures
                         praising pain was born and we will give you complete account of the system
                         the actual teachings of the great explorer.' , 'creote-addons'),
                         'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                       ]
                   ],
                   'title_field' => '{{{ tab_title }}}',
               ]
           );
           $this->add_control(
             'call_heading',
             [
               'label'       => esc_html__( 'Call Heading', 'creote-addons' ),
               'type'        => Controls_Manager::TEXT,
               'default' =>  esc_html__( 'Call For
               Free Consultation' , 'creote-addons'),
               ]
           );
           $this->add_control(
           'call_number',
           [
             'label'       => esc_html__( 'Call Number', 'creote-addons' ),
             'type'        => Controls_Manager::TEXT,
             'default' =>  esc_html__( '180667586677' , 'creote-addons'),
           ]);
           $this->end_controls_section();
           $this->start_controls_section(
             'tabs_settings_style_two',
             [
                 'label' => __('Tabs Content Box', 'creote-addons'),
                 'condition' => [
                   'tab_box_style' => 'type_two',
               ],
             ]
         );
           $repeater = new Repeater();
           $repeater->add_control(
   			'tab_id',
   			[
   				'label'       => esc_html__( 'Tab Id Without gap', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( 'tabone' , 'creote-addons'),
   			]
           );
           $repeater->add_control(
             'tab_title',
             [
               'label'       => esc_html__( 'Tab Title', 'creote-addons' ),
               'type'        => Controls_Manager::TEXT,
               'default' =>  esc_html__( '01. Affordable' , 'creote-addons'),
           ]);
         $repeater->add_control(
           'con_hg_text',
           [
             'label'       => esc_html__( 'Highlight Text', 'creote-addons' ),
             'type'        => Controls_Manager::TEXT,
             'default' =>  esc_html__( 'Why Creote.' , 'creote-addons'),
             ]
         );
         $repeater->add_control(
   			'con_title',
   			[
   				'label'       => esc_html__( 'Tab Title', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'Affordable & Flexible' , 'creote-addons'),
   			]);
           $repeater->add_control(
   			'con_des',
   			[
   				'label'       => esc_html__( 'Tab Description', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
           'default' =>  esc_html__( 'Must explain too you how all this mistaken idea of denouncing pleasures
                   praising pain was born and we will give you complete account of the system
                   the actual teachings of the great explorer.' , 'creote-addons'), 
   			]);
         $repeater->add_control(
           'list_items',
           [
             'label'       => esc_html__( 'List Items', 'creote-addons' ),
             'type'        => Controls_Manager::TEXTAREA,
             'default' =>  esc_html__( 'Cost-Effective Services
             Helps Reduce Business Risks
             Management of Employee Performance
             Increasing Company’s Agility' , 'creote-addons'), 
           ]);
           $repeater->add_control(
             'button_text',
             [
               'label'       => esc_html__( 'Button Text', 'creote-addons' ),
               'type'        => Controls_Manager::TEXT,
                       'default' =>  esc_html__( 'Contact us' , 'creote-addons'),
           ]);
           $repeater->add_control(
             'button_link',
             [
               'label' => __('Theme Link', 'creote-addons'),
               'type' => Controls_Manager::URL,
               'placeholder' => __('https://your-link.com', 'creote-addons'),
               'show_external' => true,
               'default' => [
                   'url' => '#',
                   'is_external' => true,
                   'nofollow' => true,
               ],
           ]);  
           $repeater->add_control(
               'hssoemtw',
               [
                   'type' => Controls_Manager::DIVIDER,
               ]
             );
           $repeater->add_control(
               'tab_image',
               [
                   'label' => __('Image', 'creote-addons'),
                   'type' => Controls_Manager::MEDIA,
                   'default' => [
                       'url' => \Elementor\Utils::get_placeholder_image_src(),
                     ],
               ]
           );
           $this->add_control(
               'tabs_content_v1_repeater_two',
               [
                   'label' => __('tabs Content Repeater', 'creote-addons'),
                   'type' => Controls_Manager::REPEATER,
                   'fields' => $repeater->get_controls(),
                   'default' => [
                       [
                       'tab_id' =>  esc_html__( 'tabone' , 'creote-addons'),
                       'tab_title' =>  esc_html__('01. Affordable' , 'creote-addons'),
                       'con_hg_text'  =>  esc_html__('Why Creote' , 'creote-addons'),
                       'con_title'  =>  esc_html__('Affordable & Flexible' , 'creote-addons'),
                       'con_des'  =>  esc_html__('Must explain too you how all this mistaken idea of denouncing pleasures
                       praising pain was born and we will give you complete account of the system
                       the actual teachings of the great explorer.' , 'creote-addons'),
                       'list_items' =>  esc_html__('Cost-Effective Services
                       Helps Reduce Business Risks
                       Management of Employee Performance
                       Increasing Company’s Agility' , 'creote-addons'),
                       'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                       ],
                       [
                         'tab_id' =>  esc_html__( 'tabtwo' , 'creote-addons'),
                         'tab_title' =>  esc_html__('01. Affordable' , 'creote-addons'),
                         'con_hg_text'  =>  esc_html__('Why Creote' , 'creote-addons'),
                         'con_title'  =>  esc_html__('Affordable & Flexible' , 'creote-addons'),
                         'con_des'  =>  esc_html__('Must explain too you how all this mistaken idea of denouncing pleasures
                         praising pain was born and we will give you complete account of the system
                         the actual teachings of the great explorer.' , 'creote-addons'),
                         'list_items' =>  esc_html__('Cost-Effective Services
                         Helps Reduce Business Risks
                         Management of Employee Performance
                         Increasing Company’s Agility' , 'creote-addons'),
                         'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                       ],
                       [
                         'tab_id' =>  esc_html__( 'tabthree' , 'creote-addons'),
                         'tab_title' =>  esc_html__('01. Affordable' , 'creote-addons'),
                         'con_hg_text'  =>  esc_html__('Why Creote' , 'creote-addons'),
                         'con_title'  =>  esc_html__('Affordable & Flexible' , 'creote-addons'),
                         'con_des'  =>  esc_html__('Must explain too you how all this mistaken idea of denouncing pleasures
                         praising pain was born and we will give you complete account of the system
                         the actual teachings of the great explorer.' , 'creote-addons'),
                         'list_items' =>  esc_html__('Cost-Effective Services
                         Helps Reduce Business Risks
                         Management of Employee Performance
                         Increasing Company’s Agility' , 'creote-addons'),
                         'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                       ]
                   ],
                   'title_field' => '{{{ tab_title }}}',
               ]
           );
           $this->end_controls_section();
           $this->start_controls_section(
             'tabs_settings_style_three',
             [
                 'label' => __('Tabs Content Box', 'creote-addons'),
                 'condition' => [
                   'tab_box_style' => 'type_three',
               ],
             ]
         );
           $repeater = new Repeater();
           $repeater->add_control(
   			'tab_id',
   			[
   				'label'       => esc_html__( 'Tab Id Without gap', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( 'tabone' , 'creote-addons'),
   			]
           );
           $repeater->add_control(
             'tab_title',
             [
               'label'       => esc_html__( 'Tab Title', 'creote-addons' ),
               'type'        => Controls_Manager::TEXT,
               'default' =>  esc_html__( '01. Affordable' , 'creote-addons'),
           ]);
         $repeater->add_control(
           'con_hg_text',
           [
             'label'       => esc_html__( 'Highlight Text', 'creote-addons' ),
             'type'        => Controls_Manager::TEXT,
             'default' =>  esc_html__( 'Why Creote.' , 'creote-addons'),
             ]
         );
         $repeater->add_control(
   			'con_title',
   			[
   				'label'       => esc_html__( 'Tab Title', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
           'default' =>  esc_html__( 'Affordable & Flexible' , 'creote-addons'),
   			]);
           $repeater->add_control(
   			'con_des',
   			[
   				'label'       => esc_html__( 'Tab Description', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
           'default' =>  esc_html__( 'Must explain too you how all this mistaken idea of denouncing pleasures
                   praising pain was born and we will give you complete account of the system
                   the actual teachings of the great explorer.' , 'creote-addons'), 
   			]);
         $repeater->add_control(
           'list_items',
           [
             'label'       => esc_html__( 'List Items', 'creote-addons' ),
             'type'        => Controls_Manager::TEXTAREA,
             'default' =>  esc_html__( 'Cost-Effective Services
             Helps Reduce Business Risks
             Management of Employee Performance
             Increasing Company’s Agility' , 'creote-addons'), 
           ]);
           $repeater->add_control(
             'button_text',
             [
               'label'       => esc_html__( 'Button Text', 'creote-addons' ),
               'type'        => Controls_Manager::TEXT,
                       'default' =>  esc_html__( 'Contact us' , 'creote-addons'),
           ]);
           $repeater->add_control(
             'button_link',
             [
               'label' => __('Theme Link', 'creote-addons'),
               'type' => Controls_Manager::URL,
               'placeholder' => __('https://your-link.com', 'creote-addons'),
               'show_external' => true,
               'default' => [
                   'url' => '#',
                   'is_external' => true,
                   'nofollow' => true,
               ],
           ]);  
           $repeater->add_control(
               'hssoemtw',
               [
                   'type' => Controls_Manager::DIVIDER,
               ]
             );
           $repeater->add_control(
               'tab_image',
               [
                   'label' => __('Image', 'creote-addons'),
                   'type' => Controls_Manager::MEDIA,
                   'default' => [
                       'url' => \Elementor\Utils::get_placeholder_image_src(),
                     ],
               ]
           );
           $this->add_control(
               'tabs_content_v1_repeater_three',
               [
                   'label' => __('tabs Content Repeater', 'creote-addons'),
                   'type' => Controls_Manager::REPEATER,
                   'fields' => $repeater->get_controls(),
                   'default' => [
                       [
                       'tab_id' =>  esc_html__( 'tabone' , 'creote-addons'),
                       'tab_title' =>  esc_html__('01. Affordable' , 'creote-addons'),
                       'con_hg_text'  =>  esc_html__('Why Creote' , 'creote-addons'),
                       'con_title'  =>  esc_html__('Affordable & Flexible' , 'creote-addons'),
                       'con_des'  =>  esc_html__('Must explain too you how all this mistaken idea of denouncing pleasures
                       praising pain was born and we will give you complete account of the system
                       the actual teachings of the great explorer.' , 'creote-addons'),
                       'list_items' =>  esc_html__('Cost-Effective Services
                       Helps Reduce Business Risks
                       Management of Employee Performance
                       Increasing Company’s Agility' , 'creote-addons'),
                       'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                       ],
                       [
                         'tab_id' =>  esc_html__( 'tabtwo' , 'creote-addons'),
                         'tab_title' =>  esc_html__('01. Affordable' , 'creote-addons'),
                         'con_hg_text'  =>  esc_html__('Why Creote' , 'creote-addons'),
                         'con_title'  =>  esc_html__('Affordable & Flexible' , 'creote-addons'),
                         'con_des'  =>  esc_html__('Must explain too you how all this mistaken idea of denouncing pleasures
                         praising pain was born and we will give you complete account of the system
                         the actual teachings of the great explorer.' , 'creote-addons'),
                         'list_items' =>  esc_html__('Cost-Effective Services
                         Helps Reduce Business Risks
                         Management of Employee Performance
                         Increasing Company’s Agility' , 'creote-addons'),
                         'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                       ],
                       [
                         'tab_id' =>  esc_html__( 'tabthree' , 'creote-addons'),
                         'tab_title' =>  esc_html__('01. Affordable' , 'creote-addons'),
                         'con_hg_text'  =>  esc_html__('Why Creote' , 'creote-addons'),
                         'con_title'  =>  esc_html__('Affordable & Flexible' , 'creote-addons'),
                         'con_des'  =>  esc_html__('Must explain too you how all this mistaken idea of denouncing pleasures
                         praising pain was born and we will give you complete account of the system
                         the actual teachings of the great explorer.' , 'creote-addons'),
                         'list_items' =>  esc_html__('Cost-Effective Services
                         Helps Reduce Business Risks
                         Management of Employee Performance
                         Increasing Company’s Agility' , 'creote-addons'),
                         'button_text' =>  esc_html__('Read More' , 'creote-addons'),
                       ]
                   ],
                   'title_field' => '{{{ tab_title }}}',
               ]
           );
           $this->end_controls_section();
       }
       protected function render()
       {
           $settings = $this->get_settings_for_display();
           $allowed_tags = wp_kses_allowed_html('post');
   ?>
   <section class="tabs_all_box tabs_all_box_start <?php echo esc_attr($settings['tab_box_style']); ?>"> 
    <div class="tab_over_all_box"> 

        <?php if($settings['tab_box_style'] == 'type_two'): ?>
            <!-- style_two -->
            <div class="tabs_header clearfix">
                <ul class="showcase_tabs_btns nav-pills nav clearfix">
                    <?php foreach($settings['tabs_content_v1_repeater_two'] as $key => $tabs_block_two): ?>
                        <li class="nav-item">
                            <a class="s_tab_btn nav-link <?php if($key == 0) echo 'active'; ?>" data-tab="#tab<?php echo esc_attr($tabs_block_two['tab_id']); ?>">
                                <?php if(!empty($tabs_block_two['tab_title'])): ?>
                                    <?php echo esc_html($tabs_block_two['tab_title']); ?>
                                <?php endif; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="s_tab_wrapper">
                <div class="s_tabs_content">
                    <?php foreach($settings['tabs_content_v1_repeater_two'] as $key => $tabs_block_two): ?>
                        <div class="s_tab fade <?php if($key == 0) echo 'active-tab show'; ?>" id="tab<?php echo esc_attr($tabs_block_two['tab_id']); ?>">
                            <div class="tab_content one">
                                <div class="row">
                                    <?php if(!empty($tabs_block_two['tab_image']['url'])): 
                                        $tab_image = isset($tabs_block_two['tab_image']['alt']) ? $tabs_block_two['tab_image']['alt'] : 'image'; ?>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="image">
                                                <img src="<?php echo esc_url($tabs_block_two['tab_image']['url']); ?>" alt="<?php echo esc_attr($tab_image); ?>" />
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="content_bx">
                                            <?php if(!empty($tabs_block_two['con_hg_text'])): ?>
                                              <div class="con_hg_text"><?php echo wp_kses($tabs_block_two['con_hg_text'], $allowed_tags); ?></div>
                                            <?php endif; ?>
                                            <?php if(!empty($tabs_block_two['con_title'])): ?>
                                              <<?php echo esc_attr($settings['tag_type']); ?> class="tabtitle"><?php echo wp_kses($tabs_block_two['con_title'], $allowed_tags); ?></<?php echo esc_attr($settings['tag_type']); ?>>
                                            <?php endif; ?>
                                            <?php if(!empty($tabs_block_two['con_des'])): ?>
                                                <p><?php echo wp_kses($tabs_block_two['con_des'], $allowed_tags); ?></p>
                                            <?php endif; ?>
                                            <?php if(!empty($tabs_block_two['list_items'])): 
                                                $list_items = explode("\n", ($tabs_block_two['list_items'])); ?>
                                                <ul>
                                                    <?php foreach($list_items as $list_item): ?>
                                                        <li><?php echo wp_kses($list_item, true); ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                            <?php if(!empty($tabs_block_two['button_text'])): 
                                                $target = $tabs_block_two['button_link']['is_external'] ? ' target="_blank"' : ''; 
                                                $nofollow = $tabs_block_two['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
                                                <a href="<?php echo esc_url($tabs_block_two['button_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn two">
                                                    <?php echo esc_attr($tabs_block_two['button_text']); ?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- style_two end -->

        <?php elseif($settings['tab_box_style'] == 'type_three'): ?>
            <!-- style_three -->
            <div class="tabs_header clearfix">
                <ul class="showcase_tabs_btns nav-pills nav clearfix">
                    <?php foreach($settings['tabs_content_v1_repeater_three'] as $key => $tabs_block_three): ?>
                        <li class="nav-item">
                            <a class="s_tab_btn nav-link <?php if($key == 0) echo 'active'; ?>" data-tab="#tab<?php echo esc_attr($tabs_block_three['tab_id']); ?>">
                                <?php if(!empty($tabs_block_three['tab_title'])): ?>
                                    <?php echo esc_html($tabs_block_three['tab_title']); ?>
                                <?php endif; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="s_tab_wrapper">
                <div class="s_tabs_content">
                    <?php foreach($settings['tabs_content_v1_repeater_three'] as $key => $tabs_block_three): ?>
                        <div class="s_tab fade <?php if($key == 0) echo 'active-tab show'; ?>" id="tab<?php echo esc_attr($tabs_block_three['tab_id']); ?>">
                            <div class="tab_content one">
                                <?php if(!empty($tabs_block_three['tab_image']['url'])): 
                                    $tab_image = isset($tabs_block_three['tab_image']['alt']) ? $tabs_block_three['tab_image']['alt'] : 'image'; ?>
                                    <div class="image">
                                        <img src="<?php echo esc_url($tabs_block_three['tab_image']['url']); ?>" alt="<?php echo esc_attr($tab_image); ?>" />
                                    </div>
                                <?php endif; ?>
                                <div class="content_bx">
                                    <?php if(!empty($tabs_block_three['con_hg_text'])): ?>
                                        <div class="con_hg_text"><?php echo wp_kses($tabs_block_three['con_hg_text'], $allowed_tags); ?></div>
                                    <?php endif; ?>
                                    <?php if(!empty($tabs_block_three['con_title'])): ?>
                                      <<?php echo esc_attr($settings['tag_type']); ?> class="tabtitle"><?php echo wp_kses($tabs_block_three['con_title'], $allowed_tags); ?></<?php echo esc_attr($settings['tag_type']); ?>>
                                    <?php endif; ?>
                                    <?php if(!empty($tabs_block_three['con_des'])): ?>
                                        <p><?php echo wp_kses($tabs_block_three['con_des'], $allowed_tags); ?></p>
                                    <?php endif; ?>
                                    <?php if(!empty($tabs_block_three['list_items'])): 
                                        $list_items = explode("\n", ($tabs_block_three['list_items'])); ?>
                                        <ul>
                                            <?php foreach($list_items as $list_item): ?>
                                                <li><?php echo wp_kses($list_item, true); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                    <?php if(!empty($tabs_block_three['button_text'])): 
                                        $target = $tabs_block_three['button_link']['is_external'] ? ' target="_blank"' : ''; 
                                        $nofollow = $tabs_block_three['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
                                        <a href="<?php echo esc_url($tabs_block_three['button_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn two">
                                            <?php echo esc_attr($tabs_block_three['button_text']); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- style_three end -->

        <?php else: ?>
            <!-- default style -->
            <div class="tabs_header clearfix">
                <ul class="showcase_tabs_btns nav-pills nav clearfix">
                    <?php foreach($settings['tabs_content_v1_repeater'] as $key => $tabs_block_one): ?>
                        <li class="nav-item">
                            <a class="s_tab_btn nav-link <?php if($key == 0) echo 'active'; ?>" data-tab="#tab<?php echo esc_attr($tabs_block_one['tab_id']); ?>">
                                <?php if(!empty($tabs_block_one['tab_title'])): ?>
                                    <?php echo esc_html($tabs_block_one['tab_title']); ?>
                                <?php endif; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="toll_free">
                    <a href="tel:<?php echo esc_html($settings['call_number']); ?>">
                        <i class="icon-phone-call"></i> <?php echo esc_html($settings['call_heading']); ?>
                    </a>
                </div>
            </div>
            <div class="s_tab_wrapper">
                <div class="s_tabs_content">
                    <?php foreach($settings['tabs_content_v1_repeater'] as $key => $tabs_block_one): ?>
                        <div class="s_tab fade <?php if($key == 0) echo 'active-tab show'; ?>" id="tab<?php echo esc_attr($tabs_block_one['tab_id']); ?>">
                            <div class="tab_content one" <?php if(!empty($tabs_block_one['tab_image']['url'])): ?> style="background-image:url(<?php echo esc_url($tabs_block_one['tab_image']['url']); ?>)" <?php endif; ?>>
                                <div class="content_image">
                                    <?php if(!empty($tabs_block_one['con_hg_text'])): ?>
                                        <div class="con_hg_text"><?php echo wp_kses($tabs_block_one['con_hg_text'], $allowed_tags); ?></div>
                                    <?php endif; ?>
                                    <?php if(!empty($tabs_block_one['con_title'])): ?>
                                      <<?php echo esc_attr($settings['tag_type']); ?> class="tabtitle"><?php echo wp_kses($tabs_block_one['con_title'], $allowed_tags); ?></<?php echo esc_attr($settings['tag_type']); ?>>
                                    <?php endif; ?>
                                    <?php if(!empty($tabs_block_one['con_des'])): ?>
                                        <p><?php echo wp_kses($tabs_block_one['con_des'], $allowed_tags); ?></p>
                                    <?php endif; ?>
                                    <?php if(!empty($tabs_block_one['button_text'])): 
                                        $target = $tabs_block_one['button_link']['is_external'] ? ' target="_blank"' : ''; 
                                        $nofollow = $tabs_block_one['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
                                        <a href="<?php echo esc_url($tabs_block_one['button_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="rd_more">
                                            <?php echo esc_attr($tabs_block_one['button_text']); ?>
                                            <i class="icon-right-arrow"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- default style end -->
        <?php endif; ?>

    </div>
</section>

 <?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_tab_v1());