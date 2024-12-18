<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_shape_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-shape-box-v1';
       }
       public function get_title()
       {
           return __('Shape V1' , 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['107'];
       }
       protected function register_controls() {
   		$this->start_controls_section(
   			'shape_content',
   			[
   				'label' => esc_html__( 'Shape Image Content', 'creote-addons' ),
   			]
           );
           $this->add_control(
   			'image',
   			[
   				'label' => __( 'Image', 'creote-addons' ),
   				'type' => Controls_Manager::MEDIA,
   				'default' => [
   					'url' => \Elementor\Utils::get_placeholder_image_src(),
   				],
   			]
           );
           $this->add_control(
               'move_image',
               [
                   'label' => __('Move Image', 'creote-addons'),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
                       'top_left' => __( 'Top Left', 'creote-addons' ),
                       'top_right' => __( 'Top Right', 'creote-addons' ),
                       'bottom_left' => __( 'Bottom Left', 'creote-addons' ),   
                       'bottom_right' => __( 'Bottom Right', 'creote-addons' ),    
   			   	],
                   'default' => __('top_left' , 'creote-addons'),
               ]
           );
           $this->add_control(
   			'move_top_l_one',
   			[
   				'label' => __( 'Move Top', 'creote-addons' ),
   				'type' => \Elementor\Controls_Manager::TEXT,
   				'default' => 100,
                   'selectors' => [
   					'{{WRAPPER}} .shape_one  ' => 'top: {{VALUE}}',
   				],
                   'condition' => [
                       'move_image' => 'top_left',
                   ],
   			]
   		);
           $this->add_control(
   			'move_top_l_two',
   			[
   				'label' => __( 'Move Left', 'creote-addons' ),
   				'type' => \Elementor\Controls_Manager::TEXT,
   				'default' => 100,
                   'selectors' => [
   					'{{WRAPPER}} .shape_one ' => 'left: {{VALUE}}',
   				],
                   'condition' => [
                       'move_image' => 'top_left',
                   ],
   			]
   		);
           $this->add_control(
   			'move_top_r_one',
   			[
   				'label' => __( 'Move Top', 'creote-addons' ),
   				'type' => \Elementor\Controls_Manager::TEXT,
   				'default' => 100,
                   'selectors' => [
   					'{{WRAPPER}} .shape_one ' => 'top: {{VALUE}}',
   				],
                   'condition' => [
                       'move_image' => 'top_right',
                   ],
   			]
   		);
           $this->add_control(
   			'move_top_r_two',
   			[
   				'label' => __( 'Move Right', 'creote-addons' ),
   				'type' => \Elementor\Controls_Manager::TEXT,
   				'default' => 100,
                   'selectors' => [
   					'{{WRAPPER}} .shape_one ' => 'right: {{VALUE}}',
   				],
                   'condition' => [
                       'move_image' => 'top_right',
                   ],
   			]
   		);
           $this->add_control(
   			'move_bottom_l_one',
   			[
   				'label' => __( 'Move Bottom', 'creote-addons' ),
   				'type' => \Elementor\Controls_Manager::TEXT,
   				'default' => 100,
                   'selectors' => [
   					'{{WRAPPER}} .shape_one ' => 'bottom: {{VALUE}}',
   				],
                   'condition' => [
                       'move_image' => 'bottom_left',
                   ],
   			]
   		);
           $this->add_control(
   			'move_bottom_l_two',
   			[
   				'label' => __( 'Move Left', 'creote-addons' ),
   				'type' => \Elementor\Controls_Manager::TEXT,
   				'default' => 100,
                   'selectors' => [
   					'{{WRAPPER}} .shape_one ' => 'left: {{VALUE}}',
   				],
                   'condition' => [
                       'move_image' => 'bottom_left',
                   ],
   			]
   		);
           $this->add_control(
   			'move_bottom_r_one',
   			[
   				'label' => __( 'Move Bottom', 'creote-addons' ),
   				'type' => \Elementor\Controls_Manager::TEXT,
   				'default' => 100,
                   'selectors' => [
   					'{{WRAPPER}} .shape_one ' => 'bottom: {{VALUE}}',
   				],
                   'condition' => [
                       'move_image' => 'bottom_right',
                   ],
   			]
   		);
           $this->add_control(
   			'move_bottom_r_two',
   			[
   				'label' => __( 'Move Left', 'creote-addons' ),
   				'type' => \Elementor\Controls_Manager::TEXT,
   				'default' => 100,
                   'selectors' => [
   					'{{WRAPPER}} .shape_one ' => 'right: {{VALUE}}',
   				],
                   'condition' => [
                       'move_image' => 'bottom_right',
                   ],
   			]
   		);
           $this->add_control(
   			'z_index',
   			[
   				'label' => __( 'Z Index', 'creote-addons' ),
   				'type' => \Elementor\Controls_Manager::NUMBER,
   				'min' => 1,
   				'max' => 10000,
   				'step' => 1,
   				'default' => 100,
                   'selectors' => [
   					'{{WRAPPER}} .shape_one ' => 'z-index: {{VALUE}}',
   				],
   			]
   		);
           $this->add_control(
   			'image_height',
   			[
   				'label' => __( 'Image Height', 'creote-addons' ),
   				'type' => \Elementor\Controls_Manager::NUMBER,
   				'min' => 1,
   				'max' => 10000,
   				'step' => 1,
   				'default' => 100,
                   'selectors' => [
   					'{{WRAPPER}} .shape_one img , {{WRAPPER}} .shape_one  ' => 'height: {{VALUE}}px; width:auto;',
   				],
   			]
   		);
           $this->end_controls_section();      
   	}
       protected function render() {
   		$settings = $this->get_settings_for_display();
           $allowed_tags = wp_kses_allowed_html('post');
   		?>
<?php if(!empty($settings['image']['url'])):
	 $image = isset($settings['image']['alt']) ? $settings['image']['alt'] : '';
	 if(!empty($image)) {
	   $image = $image;
	 }else{
	   $image = 'image';
	}
	?>
<div class="shape_one move_allside">
   <img src="<?php echo esc_url($settings['image']['url']); ?>"  alt="<?php echo esc_attr($image); ?>" />
</div>
<?php endif; ?>
<?php 
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_shape_v1());