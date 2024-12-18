<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_texteditor_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-text-editor-v1';
       }
       public function get_title()
       {
           return __('Text Editor V1' , 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['103'];
       }
       /**
 * Register text editor widget controls.
 *
 * Adds different input fields to allow the user to change and customize the widget settings.
 *
 * @since 3.1.0
 * @access protected
 */
protected function register_controls() {
    $this->start_controls_section(
        'section_editor',
        [
            'label' => esc_html__( 'Text Editor', 'elementor' ),
        ]
    );
    $this->add_control(
        'editor_creote',
        [
            'label' => esc_html__( 'Text Editor', 'elementor' ),
            'type' => Controls_Manager::WYSIWYG,
            'default' => '<p>' . esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ) . '</p>',
        ]
    );
    $text_columns = range( 1, 10 );
    $text_columns = array_combine( $text_columns, $text_columns );
    $text_columns[''] = esc_html__( 'Default', 'elementor' );
    $this->add_responsive_control(
        'text_columns',
        [
            'label' => esc_html__( 'Columns', 'elementor' ),
            'type' => Controls_Manager::SELECT,
            'separator' => 'before',
            'options' => $text_columns,
            'selectors' => [
                '{{WRAPPER}}' => 'columns: {{VALUE}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'column_gap',
        [
            'label' => esc_html__( 'Columns Gap', 'elementor' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%', 'em', 'vw' ],
            'range' => [
                'px' => [
                    'max' => 100,
                ],
                '%' => [
                    'max' => 10,
                    'step' => 0.1,
                ],
                'vw' => [
                    'max' => 10,
                    'step' => 0.1,
                ],
                'em' => [
                    'max' => 10,
                    'step' => 0.1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}' => 'column-gap: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_style',
        [
            'label' => esc_html__( 'Text Editor', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_responsive_control(
        'align',
        [
            'label' => esc_html__( 'Alignment', 'elementor' ),
            'type' => Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => esc_html__( 'Left', 'elementor' ),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => esc_html__( 'Center', 'elementor' ),
                    'icon' => 'eicon-text-align-center',
                ],
                'right' => [
                    'title' => esc_html__( 'Right', 'elementor' ),
                    'icon' => 'eicon-text-align-right',
                ],
                'justify' => [
                    'title' => esc_html__( 'Justified', 'elementor' ),
                    'icon' => 'eicon-text-align-justify',
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .position-relative ' => 'text-align: {{VALUE}}!important;',
            ],
        ]
    );
    $this->add_control(
        'text_color',
        [
            'label' => esc_html__( 'Text Color', 'elementor' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .position-relative  , {{WRAPPER}} .position-relative  p , {{WRAPPER}} .position-relative h1 , {{WRAPPER}}
                .position-relative h2 , {{WRAPPER}} .position-relative h3 , {{WRAPPER}} .position-relative h4 , {{WRAPPER}} .position-relative h5 , {{WRAPPER}} .position-relative h6 , {{WRAPPER}} .position-relative a , {{WRAPPER}}
                .position-relative ul li , {{WRAPPER}} .position-relative ul li a ' => 'color: {{VALUE}}!important;',
            ],
        ]
    );
    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'typography_crs',
            'selector' =>  '{{WRAPPER}} .position-relative  , {{WRAPPER}} .position-relative  p , {{WRAPPER}} .position-relative h1 , {{WRAPPER}} body
                .position-relative h2 , {{WRAPPER}} .position-relative h3 , {{WRAPPER}} .position-relative h4 , {{WRAPPER}} .position-relative h5 , {{WRAPPER}} .position-relative h6 , {{WRAPPER}} .position-relative a ,
                 .position-relative ul li , {{WRAPPER}} .position-relative ul li a '
        ]
    );
    $this->add_group_control(
        Group_Control_Text_Shadow::get_type(),
        [
            'name' => 'text_shadow_crs',
            'selector' =>  '{{WRAPPER}} .position-relative  , {{WRAPPER}} .position-relative  p , {{WRAPPER}} .position-relative h1 ,
            .position-relative h2 , {{WRAPPER}} .position-relative h3 , {{WRAPPER}} .position-relative h4 , {{WRAPPER}} .position-relative h5 , {{WRAPPER}} .position-relative h6 , {{WRAPPER}} .position-relative a ,
            .position-relative ul li , {{WRAPPER}} .position-relative ul li a ' 
        ]
    );
    $this->end_controls_section();
}
protected function render(){
    $settings = $this->get_settings_for_display();
    $allowed_tags = wp_kses_allowed_html('post');
?>
   <div class="position-relative">
        <?php echo wp_kses($settings['editor_creote'] , $allowed_tags); ?>
    </div>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_texteditor_v1());