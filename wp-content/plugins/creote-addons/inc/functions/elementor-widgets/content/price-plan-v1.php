<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_price_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-price-v1';
       }
       public function get_title()
       {
           return __('Price V1' , 'creote-addons');
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
                       'style_three' => __('Style Three ', 'creote-addons'),
                   ],
                   'default' => 'style_one',
               ]
           );
           $this->add_control(
            'image',
            [
            'label' => __('Image', 'creote-addons'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
            'condition' => [
                'price_plan_styles' => 'style_three',
               ],
            ]
         );
           $this->add_control(
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
           $this->add_control(
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
   			'price_title',
   			[
   				'label'       => esc_html__( 'Heading', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( 'Bronze Package' , 'creote-addons'),
   			]
           );
           $this->add_control(
   			'price_notes',
   			[
   				'label'       => esc_html__( 'Notes', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( 'Pricing plan for startup company' , 'creote-addons'),
   			]
           );
           $this->add_control(
   			'price',
   			[
   				'label'       => esc_html__( 'Price', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( '$35' , 'creote-addons'),
   			]
           );
           $this->add_control(
            'price_period',
            [
                'label'       => esc_html__( 'Price Period', 'creote-addons' ),
                'type'        => Controls_Manager::TEXT,
                'default' =>  esc_html__( 'Monthly' , 'creote-addons'),
                'condition' => [
                    'price_plan_styles' => 'style_three',
                   ],
            ]
         );
           $this->add_control(
   			'description',
   			[
   				'label'       => esc_html__( 'Description', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( 'Loves or pursues or desires obtain pain
                   of itself is pain occasionally.' , 'creote-addons'),
   			]
           );
           $this->add_control(
   			'button_text',
   			[
   				'label'       => esc_html__( 'Plan Button', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXT,
                   'default' =>  esc_html__( 'Choosr Plan' , 'creote-addons'),
   			]
           );
           $this->add_control(
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
           $this->add_control(
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
           $this->end_controls_section();
           $this->start_controls_section(
               'features_con',
               [
                   'label' => __('Features', 'creote-addons'),
                   'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                   'condition' => [
                       'features_enable' => 'yes'
                   ]
               ]
           );
           $repeater = new Repeater();
           $repeater->add_control(
   			'plan_benifits_yes_no',
   			[
   				'label' => __( 'Plan Benifits Yes / No', 'creote-addons' ),
   				'type' => Controls_Manager::SWITCHER,
   				'label_on' => __( 'Show', 'creote-addons' ),
   				'label_off' => __( 'Hide', 'creote-addons' ),
   				'return_value' => 'yes',
   				'default' => 'yes',
   			]
   		);
           $repeater->add_control(
   			'features',
   			[
   				'label'       => esc_html__( 'Features', 'creote-addons' ),
   				'type'        => Controls_Manager::TEXTAREA,
                   'default' =>  esc_html__( 'Choosr Plan' , 'creote-addons'),
   			]
           );
           $this->add_control(
               'features_repeater',
               [
                   'label' => __('Features Repeater', 'creote-addons'),
                   'type' => Controls_Manager::REPEATER,
                   'fields' => $repeater->get_controls(),
                   'default' => [
                       [
                       'features' =>  esc_html__( 'Document watermarking' , 'creote-addons'),
                       'plan_benifits_yes_no' => 'yes',
                       ],
                       [
                       'features' =>  esc_html__( 'Document watermarking' , 'creote-addons'),
                       'plan_benifits_yes_no' => 'yes',
                       ],
                       [
                       'features' =>  esc_html__( 'Collaboration with up to 10 users' , 'creote-addons'),
                       'plan_benifits_yes_no' => 'yes',
                       ],
                       [
                       'features' =>  esc_html__( 'Built-in integrations with Office 365 and G Suite' , 'creote-addons'),
                       'plan_benifits_yes_no' => 'yes',
                       ],
                       [
                       'features' =>  esc_html__( 'Admin Console access' , 'creote-addons'),
                       'plan_benifits_yes_no' => 'yes',
                       ]
                   ],
                   'title_field' => '{{{ features }}}',
               ]
           );
           $this->end_controls_section();
       }
       protected function render()
       {
      $settings = $this->get_settings_for_display();
      $allowed_tags = wp_kses_allowed_html('post');
   ?>
   <?php if($settings['price_plan_styles'] == 'style_two'): ?><?php // style Two ?><div class="price_plan_box style_two <?php if($settings['tag_enable'] == 'yes'): ?> tag_enables <?php endif; ?>"> <?php if($settings['tag_enable'] == 'yes'): ?> <div class="tag"><?php echo wp_kses($settings['tag_content'] , $allowed_tags) ?></div> <?php endif; ?> <div class="inner_box"> <div class="top"> <?php if(!empty($settings['price_title'])): ?> <h2><?php echo wp_kses($settings['price_title'] , $allowed_tags) ?></h2> <?php endif; ?> <?php if(!empty($settings['price_notes'])): ?> <p><?php echo wp_kses($settings['price_notes'] , $allowed_tags) ?></p> <?php endif; ?> </div> <div class="mid"> <?php if(!empty($settings['price'])): ?> <h4><?php echo wp_kses($settings['price'] , $allowed_tags) ?></h4> <?php endif; ?> </div> <div class="bottom"> <?php if($settings['features_enable'] == 'yes'): ?> <ul> <?php foreach($settings['features_repeater'] as $key => $features_repeater):?> <?php $iconnamet = 'fa'; if($features_repeater['plan_benifits_yes_no'] == 'yes'){ $iconnamet = 'fa fa-check'; } else{ $iconnamet = 'fa fa-times'; } ?> <?php if(!empty($features_repeater['features'])): ?> <li> <i class="<?php echo esc_attr($iconnamet); ?>"></i> <?php echo esc_html($features_repeater['features']); ?> </li> <?php endif; ?> <?php endforeach;?> </ul> <?php endif; ?> <?php if(!empty($settings['button_text'])): ?> <?php $targetwo = $settings['button_link']['is_external'] ? ' target="_blank"' : ''; $nofollowtwo = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <a href="<?php echo esc_url($settings['button_link']['url']);?>" <?php echo esc_attr($targetwo); ?> <?php echo esc_attr($nofollowtwo); ?> class="theme-btn two"> <?php echo esc_html($settings['button_text']);?> </a> <?php endif;?> </div> </div></div><?php elseif($settings['price_plan_styles'] == 'style_three'): ?><?php // style Two ?><div class="price_plan_box style_three <?php if($settings['tag_enable'] == 'yes'): ?> tag_enables <?php endif; ?>"> <?php if(!empty($settings['image']['url'])): $image = isset($settings['image']['alt']) ? $settings['image']['alt'] : ''; if(!empty($image)) { $image = $image; }else{ $image = 'image'; }?> <div class="image"> <img src="<?php echo esc_url($settings['image']['url']); ?>" class="class-fluid" alt="<?php echo esc_attr($image); ?>" /> <?php if($settings['tag_enable'] == 'yes'): ?> <div class="tag"><?php echo wp_kses($settings['tag_content'] , $allowed_tags) ?></div> <?php endif; ?> <div class="mid"> <?php if(!empty($settings['price'])): ?> <div class="pri"><?php echo wp_kses($settings['price'] , $allowed_tags) ?></div> <?php endif; ?> <?php if(!empty($settings['price_period'])): ?> <h6><?php echo wp_kses($settings['price_period'] , $allowed_tags) ?></h6> <?php endif; ?> </div> </div> <?php endif; ?> <div class="inner_box"> <div class="top"> <?php if(!empty($settings['price_title'])): ?> <h2><?php echo wp_kses($settings['price_title'] , $allowed_tags) ?></h2> <?php endif; ?> <?php if(!empty($settings['price_notes'])): ?> <p><?php echo wp_kses($settings['price_notes'] , $allowed_tags) ?></p> <?php endif; ?> </div> <div class="bottom"> <?php if($settings['features_enable'] == 'yes'): ?> <ul> <?php foreach($settings['features_repeater'] as $key => $features_repeater):?> <?php $iconnamet = 'fa'; if($features_repeater['plan_benifits_yes_no'] == 'yes'){ $iconnamet = 'fa fa-check'; } else{ $iconnamet = 'fa fa-times'; } ?> <?php if(!empty($features_repeater['features'])): ?> <li> <i class="<?php echo esc_attr($iconnamet); ?>"></i> <?php echo esc_html($features_repeater['features']); ?> </li> <?php endif; ?> <?php endforeach;?> </ul> <?php endif; ?> <?php if(!empty($settings['button_text'])): ?> <?php $targetwo = $settings['button_link']['is_external'] ? ' target="_blank"' : ''; $nofollowtwo = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <a href="<?php echo esc_url($settings['button_link']['url']);?>" <?php echo esc_attr($targetwo); ?> <?php echo esc_attr($nofollowtwo); ?> class="theme-btn two"> <?php echo esc_html($settings['button_text']);?> </a> <?php endif;?> </div> </div></div><?php else: ?> <div class="price_plan_box style_one"><?php if($settings['tag_enable'] == 'yes'): ?> <div class="tag"><?php echo wp_kses($settings['tag_content'] , $allowed_tags) ?></div> <?php endif; ?> <div class="inner_box"> <div class="top"> <?php if(!empty($settings['price_title'])): ?> <h2><?php echo wp_kses($settings['price_title'] , $allowed_tags) ?></h2> <?php endif; ?> <?php if(!empty($settings['price_notes'])): ?> <p><?php echo wp_kses($settings['price_notes'] , $allowed_tags) ?></p> <?php endif; ?> </div> <div class="mid"> <?php if(!empty($settings['price'])): ?> <h4><?php echo wp_kses($settings['price'] , $allowed_tags) ?></h4> <?php endif; ?> <?php if(!empty($settings['description'])): ?> <p><?php echo wp_kses($settings['description'] , $allowed_tags) ?></p> <?php endif; ?> </div> <div class="bottom"> <?php if($settings['features_enable'] == 'yes'): ?> <ul> <?php foreach($settings['features_repeater'] as $key => $features_repeater):?> <?php $iconnamet = 'fa'; if($features_repeater['plan_benifits_yes_no'] == 'yes'){ $iconnamet = 'fa fa-check'; } else{ $iconnamet = 'fa fa-times'; } ?> <?php if(!empty($features_repeater['features'])): ?> <li> <i class="<?php echo esc_attr($iconnamet); ?>"></i> <?php echo esc_html($features_repeater['features']); ?> </li> <?php endif; ?> <?php endforeach;?> </ul> <?php endif; ?> <?php if(!empty($settings['button_text'])): ?> <?php $target = $settings['button_link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <a href="<?php echo esc_url($settings['button_link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn two"> <?php echo esc_html($settings['button_text']);?> </a> <?php endif;?> </div> </div></div><?php // style Two end ?><?php endif;?> 
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_price_v1());