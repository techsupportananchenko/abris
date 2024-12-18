<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_slider_v4 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-slider-v4';
       }
       public function get_title()
       {
           return __('Slider V4', 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['101'];
       }
       protected function register_controls(){
         $this->start_controls_section('slider_v4_slect',
         [ 
             'label' => __('Slider v4', 'creote-addons')
         ]
         );
         $this->add_control(
           'container_width',
           [
             'label' => __('Layout', 'creote-addons'),
             'type' => Controls_Manager::SELECT,
             'options' => [
               'auto-container' => __( 'Boxed Container', 'creote-addons' ),
               'full-container' => __( 'Full Width Container', 'creote-addons' ),
               ],
               'default' => __('auto-container' , 'creote-addons'),
             ]
       );
         $this->end_controls_section();
           // style one start
           $this->start_controls_section('slider_v1_settings',
           [ 
               'label' => __('Slider Content', 'creote-addons'),
               'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
           ]
           );
           $repeater = new Repeater();
           $repeater->add_control(
            'tag_enable',
            [
              'label' => __( 'Tag Enable', 'creote-addons' ),
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
             'label' => __('Tag Content', 'creote-addons'),
             'type' => Controls_Manager::TEXTAREA,
             'default' => __('$18', 'creote-addons'),
             'placeholder' => __('Type your text here', 'creote-addons'),    
             'condition' => [
                'tag_enable' => 'yes',
            ],
          ]
        );
        $repeater->add_control(
          'tag_trans',
          [
            'label' => __( 'Tag Transition', 'creote-addons' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '_fadeInDownBig' ,
            'options' => [
              '_bounce'  => __( 'Bounce', 'creote-addons' ),
              '_bounceInDown'  => __( 'Bounce In Down', 'creote-addons' ),
              '_bounceInLeft'  => __( 'Bounce In Left', 'creote-addons' ),
              '_bounceInRight'  => __( 'Bounce In Right', 'creote-addons' ),
              '_bounceInUp'  => __( 'Bounce In Up', 'creote-addons' ),
              '_fadeIn'  => __( 'Fade In', 'creote-addons' ),
              '_fadeInDown'  => __( 'Fade In Down', 'creote-addons' ),
              '_fadeInDownBig'  => __( 'Fade In Down Big', 'creote-addons' ),
              '_FadeInLeft'  => __( 'Fade In Left', 'creote-addons' ),
              '_FadeInLeftBig'  => __( 'Fade In Left Big', 'creote-addons' ),
              '_FadeInRight'  => __( 'Fade In Right', 'creote-addons' ),
              '_FadeInRightBig'  => __( 'Fade In Right Big', 'creote-addons' ),
              '_FadeInUp'  => __( 'Fade In Up', 'creote-addons' ),
              '_FadeInUpBig'  => __( 'Fade In Up Big', 'creote-addons' ),
              '_fadeInTopLeft'  => __( 'Fade In Top Right', 'creote-addons' ),
              '_fadeInTopRight'  => __( 'Fade In Top Right', 'creote-addons' ),
              '_fadeInBottomLeft'  => __( 'Fade In Bottom Right', 'creote-addons' ),
              '_fadeInBottomRight'  => __( 'Fade In Bottom Right', 'creote-addons' ),
              '_flip'  => __( 'Flip', 'creote-addons' ),
              '_flipInX'  => __( 'flip In X', 'creote-addons' ),
              '_flipInY'  => __( 'flip In Y', 'creote-addons' ), 
              '_lightSpeedInRight'  => __( 'light Speed In Right', 'creote-addons' ),
              '_lightSpeedInLeft'  => __( 'light Speed In Left', 'creote-addons' ), 
              '_rotateIn'  => __( 'Rotate In ', 'creote-addons' ),
              '_rotateInDownRight'  => __( 'Rotate In Down Right', 'creote-addons' ),
              '_rotateInDownLeft'  => __( 'Rotate In Down Left', 'creote-addons' ),
              '_rotateInUpRight'  => __( 'Rotate In Up Right', 'creote-addons' ),
              '_rotateInUpLeft'  => __( 'Rotate In Up Left', 'creote-addons' ),
              '_zoomIn'  => __( 'Zoom In ', 'creote-addons' ),
              '_zoomInRight'  => __( 'Zoom In  Right', 'creote-addons' ),
              '_zoomInLeft'  => __( 'Zoom In  Left', 'creote-addons' ),
              '_zoomInDown'  => __( 'Zoom In Dowm ', 'creote-addons' ),
              '_zoomInUp'  => __( 'Zoom In Up ', 'creote-addons' ),
              '_slideInRight'  => __( 'Slide In  Right', 'creote-addons' ),
              '_slideInLeft'  => __( 'Slide In  Left', 'creote-addons' ),
              '_slideInDown'  => __( 'Slide In Dowm ', 'creote-addons' ),
              '_slideInUp'  => __( 'Slide In Up ', 'creote-addons' ),
              '_backInDown'  => __( 'Back In Down', 'creote-addons' ),
              '_backInLeft'  => __( 'Back In Left', 'creote-addons' ),
              '_backInRight'  => __( 'Back In Right', 'creote-addons' ),
              '_backInUp'  => __( 'Back In Up', 'creote-addons' ),
            ],
            'condition' => [
                'tag_enable' => 'yes',
            ],
          ]
        );
           $repeater->add_control(
               'small_heading_enable',
               [
                 'label' => __( 'Small Heading Enable', 'creote-addons' ),
                 'type' => Controls_Manager::SWITCHER,
                 'label_on' => __( 'Show', 'creote-addons' ),
                 'label_off' => __( 'Hide', 'creote-addons' ),
                 'return_value' => 'yes',
                 'default' => 'yes',
               ]
             );
           $repeater->add_control(
             'small_heading',
             [
                'label' => __('Small Heading', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Our Vision to Grow Better', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),    
                'condition' => [
                   'small_heading_enable' => 'yes',
               ],
             ]
           );
           $repeater->add_control(
             'small_heading_trans',
             [
               'label' => __( 'Small Heading Transition', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::SELECT,
               'default' => '_fadeInDownBig' ,
               'options' => [
                 '_bounce'  => __( 'Bounce', 'creote-addons' ),
                 '_bounceInDown'  => __( 'Bounce In Down', 'creote-addons' ),
                 '_bounceInLeft'  => __( 'Bounce In Left', 'creote-addons' ),
                 '_bounceInRight'  => __( 'Bounce In Right', 'creote-addons' ),
                 '_bounceInUp'  => __( 'Bounce In Up', 'creote-addons' ),
                 '_fadeIn'  => __( 'Fade In', 'creote-addons' ),
                 '_fadeInDown'  => __( 'Fade In Down', 'creote-addons' ),
                 '_fadeInDownBig'  => __( 'Fade In Down Big', 'creote-addons' ),
                 '_FadeInLeft'  => __( 'Fade In Left', 'creote-addons' ),
                 '_FadeInLeftBig'  => __( 'Fade In Left Big', 'creote-addons' ),
                 '_FadeInRight'  => __( 'Fade In Right', 'creote-addons' ),
                 '_FadeInRightBig'  => __( 'Fade In Right Big', 'creote-addons' ),
                 '_FadeInUp'  => __( 'Fade In Up', 'creote-addons' ),
                 '_FadeInUpBig'  => __( 'Fade In Up Big', 'creote-addons' ),
                 '_fadeInTopLeft'  => __( 'Fade In Top Right', 'creote-addons' ),
                 '_fadeInTopRight'  => __( 'Fade In Top Right', 'creote-addons' ),
                 '_fadeInBottomLeft'  => __( 'Fade In Bottom Right', 'creote-addons' ),
                 '_fadeInBottomRight'  => __( 'Fade In Bottom Right', 'creote-addons' ),
                 '_flip'  => __( 'Flip', 'creote-addons' ),
                 '_flipInX'  => __( 'flip In X', 'creote-addons' ),
                 '_flipInY'  => __( 'flip In Y', 'creote-addons' ), 
                 '_lightSpeedInRight'  => __( 'light Speed In Right', 'creote-addons' ),
                 '_lightSpeedInLeft'  => __( 'light Speed In Left', 'creote-addons' ), 
                 '_rotateIn'  => __( 'Rotate In ', 'creote-addons' ),
                 '_rotateInDownRight'  => __( 'Rotate In Down Right', 'creote-addons' ),
                 '_rotateInDownLeft'  => __( 'Rotate In Down Left', 'creote-addons' ),
                 '_rotateInUpRight'  => __( 'Rotate In Up Right', 'creote-addons' ),
                 '_rotateInUpLeft'  => __( 'Rotate In Up Left', 'creote-addons' ),
                 '_zoomIn'  => __( 'Zoom In ', 'creote-addons' ),
                 '_zoomInRight'  => __( 'Zoom In  Right', 'creote-addons' ),
                 '_zoomInLeft'  => __( 'Zoom In  Left', 'creote-addons' ),
                 '_zoomInDown'  => __( 'Zoom In Dowm ', 'creote-addons' ),
                 '_zoomInUp'  => __( 'Zoom In Up ', 'creote-addons' ),
                 '_slideInRight'  => __( 'Slide In  Right', 'creote-addons' ),
                 '_slideInLeft'  => __( 'Slide In  Left', 'creote-addons' ),
                 '_slideInDown'  => __( 'Slide In Dowm ', 'creote-addons' ),
                 '_slideInUp'  => __( 'Slide In Up ', 'creote-addons' ),
                 '_backInDown'  => __( 'Back In Down', 'creote-addons' ),
                 '_backInLeft'  => __( 'Back In Left', 'creote-addons' ),
                 '_backInRight'  => __( 'Back In Right', 'creote-addons' ),
                 '_backInUp'  => __( 'Back In Up', 'creote-addons' ),
               ],
               'condition' => [
                   'small_heading_enable' => 'yes',
               ],
             ]
           );
           $repeater->add_control(
               'small_divider',
               [
                   'type' => Controls_Manager::DIVIDER, 
               ]
           );
           $repeater->add_control(
               'heading_enable',
               [
                 'label' => __( 'Heading Enable', 'creote-addons' ),
                 'type' => Controls_Manager::SWITCHER,
                 'label_on' => __( 'Show', 'creote-addons' ),
                 'label_off' => __( 'Hide', 'creote-addons' ),
                 'return_value' => 'yes',
                 'default' => 'yes',
               ]
             );
           $repeater->add_control(
             'heading',
             [
                'label' => __('Heading', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Inspired <br>  Performance', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),    
                'condition' => [
                   'heading_enable' => 'yes',
               ],
             ]
           );
           $repeater->add_control(
             'heading_trans',
             [
               'label' => __( 'Heading Transition', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::SELECT,
               'default' => '_fadeInDownBig' ,
               'options' => [
                 '_bounce'  => __( 'Bounce', 'creote-addons' ),
                 '_bounceInDown'  => __( 'Bounce In Down', 'creote-addons' ),
                 '_bounceInLeft'  => __( 'Bounce In Left', 'creote-addons' ),
                 '_bounceInRight'  => __( 'Bounce In Right', 'creote-addons' ),
                 '_bounceInUp'  => __( 'Bounce In Up', 'creote-addons' ),
                 '_fadeIn'  => __( 'Fade In', 'creote-addons' ),
                 '_fadeInDown'  => __( 'Fade In Down', 'creote-addons' ),
                 '_fadeInDownBig'  => __( 'Fade In Down Big', 'creote-addons' ),
                 '_FadeInLeft'  => __( 'Fade In Left', 'creote-addons' ),
                 '_FadeInLeftBig'  => __( 'Fade In Left Big', 'creote-addons' ),
                 '_FadeInRight'  => __( 'Fade In Right', 'creote-addons' ),
                 '_FadeInRightBig'  => __( 'Fade In Right Big', 'creote-addons' ),
                 '_FadeInUp'  => __( 'Fade In Up', 'creote-addons' ),
                 '_FadeInUpBig'  => __( 'Fade In Up Big', 'creote-addons' ),
                 '_fadeInTopLeft'  => __( 'Fade In Top Right', 'creote-addons' ),
                 '_fadeInTopRight'  => __( 'Fade In Top Right', 'creote-addons' ),
                 '_fadeInBottomLeft'  => __( 'Fade In Bottom Right', 'creote-addons' ),
                 '_fadeInBottomRight'  => __( 'Fade In Bottom Right', 'creote-addons' ),
                 '_flip'  => __( 'Flip', 'creote-addons' ),
                 '_flipInX'  => __( 'flip In X', 'creote-addons' ),
                 '_flipInY'  => __( 'flip In Y', 'creote-addons' ), 
                 '_lightSpeedInRight'  => __( 'light Speed In Right', 'creote-addons' ),
                 '_lightSpeedInLeft'  => __( 'light Speed In Left', 'creote-addons' ), 
                 '_rotateIn'  => __( 'Rotate In ', 'creote-addons' ),
                 '_rotateInDownRight'  => __( 'Rotate In Down Right', 'creote-addons' ),
                 '_rotateInDownLeft'  => __( 'Rotate In Down Left', 'creote-addons' ),
                 '_rotateInUpRight'  => __( 'Rotate In Up Right', 'creote-addons' ),
                 '_rotateInUpLeft'  => __( 'Rotate In Up Left', 'creote-addons' ),
                 '_zoomIn'  => __( 'Zoom In ', 'creote-addons' ),
                 '_zoomInRight'  => __( 'Zoom In  Right', 'creote-addons' ),
                 '_zoomInLeft'  => __( 'Zoom In  Left', 'creote-addons' ),
                 '_zoomInDown'  => __( 'Zoom In Dowm ', 'creote-addons' ),
                 '_zoomInUp'  => __( 'Zoom In Up ', 'creote-addons' ),
                 '_slideInRight'  => __( 'Slide In  Right', 'creote-addons' ),
                 '_slideInLeft'  => __( 'Slide In  Left', 'creote-addons' ),
                 '_slideInDown'  => __( 'Slide In Dowm ', 'creote-addons' ),
                 '_slideInUp'  => __( 'Slide In Up ', 'creote-addons' ),
                 '_backInDown'  => __( 'Back In Down', 'creote-addons' ),
                 '_backInLeft'  => __( 'Back In Left', 'creote-addons' ),
                 '_backInRight'  => __( 'Back In Right', 'creote-addons' ),
                 '_backInUp'  => __( 'Back In Up', 'creote-addons' ),
               ],
               'condition' => [
                   'heading_enable' => 'yes',
               ],
             ]
           );
           $repeater->add_control(
               'heading_divider',
               [
                   'type' => Controls_Manager::DIVIDER, 
               ]
           );
           $repeater->add_control(
               'description_enable',
               [
                 'label' => __( 'Description Enable', 'creote-addons' ),
                 'type' => Controls_Manager::SWITCHER,
                 'label_on' => __( 'Show', 'creote-addons' ),
                 'label_off' => __( 'Hide', 'creote-addons' ),
                 'return_value' => 'yes',
                 'default' => 'yes',
               ]
             );
           $repeater->add_control(
             'description',
             [
                'label' => __('Description', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Inspired <br>  Performance', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),    
                'condition' => [
                   'description_enable' => 'yes',
               ],
             ]
           );
           $repeater->add_control(
             'description_trans',
             [
               'label' => __( 'Description Transition', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::SELECT,
               'default' => '_fadeInDownBig' ,
               'options' => [
                 '_bounce'  => __( 'Bounce', 'creote-addons' ),
                 '_bounceInDown'  => __( 'Bounce In Down', 'creote-addons' ),
                 '_bounceInLeft'  => __( 'Bounce In Left', 'creote-addons' ),
                 '_bounceInRight'  => __( 'Bounce In Right', 'creote-addons' ),
                 '_bounceInUp'  => __( 'Bounce In Up', 'creote-addons' ),
                 '_fadeIn'  => __( 'Fade In', 'creote-addons' ),
                 '_fadeInDown'  => __( 'Fade In Down', 'creote-addons' ),
                 '_fadeInDownBig'  => __( 'Fade In Down Big', 'creote-addons' ),
                 '_FadeInLeft'  => __( 'Fade In Left', 'creote-addons' ),
                 '_FadeInLeftBig'  => __( 'Fade In Left Big', 'creote-addons' ),
                 '_FadeInRight'  => __( 'Fade In Right', 'creote-addons' ),
                 '_FadeInRightBig'  => __( 'Fade In Right Big', 'creote-addons' ),
                 '_FadeInUp'  => __( 'Fade In Up', 'creote-addons' ),
                 '_FadeInUpBig'  => __( 'Fade In Up Big', 'creote-addons' ),
                 '_fadeInTopLeft'  => __( 'Fade In Top Right', 'creote-addons' ),
                 '_fadeInTopRight'  => __( 'Fade In Top Right', 'creote-addons' ),
                 '_fadeInBottomLeft'  => __( 'Fade In Bottom Right', 'creote-addons' ),
                 '_fadeInBottomRight'  => __( 'Fade In Bottom Right', 'creote-addons' ),
                 '_flip'  => __( 'Flip', 'creote-addons' ),
                 '_flipInX'  => __( 'flip In X', 'creote-addons' ),
                 '_flipInY'  => __( 'flip In Y', 'creote-addons' ), 
                 '_lightSpeedInRight'  => __( 'light Speed In Right', 'creote-addons' ),
                 '_lightSpeedInLeft'  => __( 'light Speed In Left', 'creote-addons' ), 
                 '_rotateIn'  => __( 'Rotate In ', 'creote-addons' ),
                 '_rotateInDownRight'  => __( 'Rotate In Down Right', 'creote-addons' ),
                 '_rotateInDownLeft'  => __( 'Rotate In Down Left', 'creote-addons' ),
                 '_rotateInUpRight'  => __( 'Rotate In Up Right', 'creote-addons' ),
                 '_rotateInUpLeft'  => __( 'Rotate In Up Left', 'creote-addons' ),
                 '_zoomIn'  => __( 'Zoom In ', 'creote-addons' ),
                 '_zoomInRight'  => __( 'Zoom In  Right', 'creote-addons' ),
                 '_zoomInLeft'  => __( 'Zoom In  Left', 'creote-addons' ),
                 '_zoomInDown'  => __( 'Zoom In Dowm ', 'creote-addons' ),
                 '_zoomInUp'  => __( 'Zoom In Up ', 'creote-addons' ),
                 '_slideInRight'  => __( 'Slide In  Right', 'creote-addons' ),
                 '_slideInLeft'  => __( 'Slide In  Left', 'creote-addons' ),
                 '_slideInDown'  => __( 'Slide In Dowm ', 'creote-addons' ),
                 '_slideInUp'  => __( 'Slide In Up ', 'creote-addons' ),
                 '_backInDown'  => __( 'Back In Down', 'creote-addons' ),
                 '_backInLeft'  => __( 'Back In Left', 'creote-addons' ),
                 '_backInRight'  => __( 'Back In Right', 'creote-addons' ),
                 '_backInUp'  => __( 'Back In Up', 'creote-addons' ),
               ],
               'condition' => [
                   'description_enable' => 'yes',
               ],
             ]
           );
           $repeater->add_control(
               'button_enable',
               [
                 'label' => __( 'Button Enable', 'creote-addons' ),
                 'type' => Controls_Manager::SWITCHER,
                 'label_on' => __( 'Show', 'creote-addons' ),
                 'label_off' => __( 'Hide', 'creote-addons' ),
                 'return_value' => 'yes',
                 'default' => 'yes',
               ]
             );
           $repeater->add_control(
               'button',
               [
               'label' => __('Btn Label', 'creote-addons'),
               'type' => Controls_Manager::TEXT,
               'default' => __('Contact Us', 'creote-addons'),
               'placeholder' => __('Btn Label Here', 'creote-addons'),
               'condition' => [
                   'button_enable' => 'yes',
               ],
               ]
               );
           $repeater->add_control(
               'button_link',
           [
               'label' => __('Btn Link One', 'creote-addons'),
               'type' => Controls_Manager::URL,
               'placeholder' => __('https://your-link.com', 'creote-addons'),
               'show_external' => true,
               'default' => [
                   'url' => '#',
                   'is_external' => true,
                   'nofollow' => true,
               ],
               'condition' => [
                   'button_enable' => 'yes',
               ],
           ]
           );
           $repeater->add_control(
             'button_trans',
             [
               'label' => __( 'Button Transition', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::SELECT,
               'default' => '_zoomIn' ,
               'options' => [
                 '_bounce'  => __( 'Bounce', 'creote-addons' ),
                 '_bounceInDown'  => __( 'Bounce In Down', 'creote-addons' ),
                 '_bounceInLeft'  => __( 'Bounce In Left', 'creote-addons' ),
                 '_bounceInRight'  => __( 'Bounce In Right', 'creote-addons' ),
                 '_bounceInUp'  => __( 'Bounce In Up', 'creote-addons' ),
                 '_fadeIn'  => __( 'Fade In', 'creote-addons' ),
                 '_fadeInDown'  => __( 'Fade In Down', 'creote-addons' ),
                 '_fadeInDownBig'  => __( 'Fade In Down Big', 'creote-addons' ),
                 '_FadeInLeft'  => __( 'Fade In Left', 'creote-addons' ),
                 '_FadeInLeftBig'  => __( 'Fade In Left Big', 'creote-addons' ),
                 '_FadeInRight'  => __( 'Fade In Right', 'creote-addons' ),
                 '_FadeInRightBig'  => __( 'Fade In Right Big', 'creote-addons' ),
                 '_FadeInUp'  => __( 'Fade In Up', 'creote-addons' ),
                 '_FadeInUpBig'  => __( 'Fade In Up Big', 'creote-addons' ),
                 '_fadeInTopLeft'  => __( 'Fade In Top Right', 'creote-addons' ),
                 '_fadeInTopRight'  => __( 'Fade In Top Right', 'creote-addons' ),
                 '_fadeInBottomLeft'  => __( 'Fade In Bottom Right', 'creote-addons' ),
                 '_fadeInBottomRight'  => __( 'Fade In Bottom Right', 'creote-addons' ),
                 '_flip'  => __( 'Flip', 'creote-addons' ),
                 '_flipInX'  => __( 'flip In X', 'creote-addons' ),
                 '_flipInY'  => __( 'flip In Y', 'creote-addons' ), 
                 '_lightSpeedInRight'  => __( 'light Speed In Right', 'creote-addons' ),
                 '_lightSpeedInLeft'  => __( 'light Speed In Left', 'creote-addons' ), 
                 '_rotateIn'  => __( 'Rotate In ', 'creote-addons' ),
                 '_rotateInDownRight'  => __( 'Rotate In Down Right', 'creote-addons' ),
                 '_rotateInDownLeft'  => __( 'Rotate In Down Left', 'creote-addons' ),
                 '_rotateInUpRight'  => __( 'Rotate In Up Right', 'creote-addons' ),
                 '_rotateInUpLeft'  => __( 'Rotate In Up Left', 'creote-addons' ),
                 '_zoomIn'  => __( 'Zoom In ', 'creote-addons' ),
                 '_zoomInRight'  => __( 'Zoom In  Right', 'creote-addons' ),
                 '_zoomInLeft'  => __( 'Zoom In  Left', 'creote-addons' ),
                 '_zoomInDown'  => __( 'Zoom In Dowm ', 'creote-addons' ),
                 '_zoomInUp'  => __( 'Zoom In Up ', 'creote-addons' ),
                 '_slideInRight'  => __( 'Slide In  Right', 'creote-addons' ),
                 '_slideInLeft'  => __( 'Slide In  Left', 'creote-addons' ),
                 '_slideInDown'  => __( 'Slide In Dowm ', 'creote-addons' ),
                 '_slideInUp'  => __( 'Slide In Up ', 'creote-addons' ),
                 '_backInDown'  => __( 'Back In Down', 'creote-addons' ),
                 '_backInLeft'  => __( 'Back In Left', 'creote-addons' ),
                 '_backInRight'  => __( 'Back In Right', 'creote-addons' ),
                 '_backInUp'  => __( 'Back In Up', 'creote-addons' ),
               ],
               'condition' => [
                   'button_enable' => 'yes',
               ],
             ]
           );
           $repeater->add_control(
            'image_divider',
            [
                'type' => Controls_Manager::DIVIDER, 
            ]
           );
           $repeater->add_control(
            'slider_background_image',
            [
              'label' => __( 'Background Image', 'creote-addons' ),
              'type' => Controls_Manager::MEDIA,
              'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
              ],
            ] 
           );
          $repeater->add_control(
           'content_padding',
           [
             'label' => __( 'Content Padding', 'creote-addons' ),
             'type' => Controls_Manager::TEXT,
             'placeholder' => __('0px 0px 0px 0px' , 'creote-addons'),
           ]
         );
          $this->add_control(
           'v4_slider_repeater',
           [
               'label' => __('Slider Repeater', 'creote-addons'),
               'type' => Controls_Manager::REPEATER,
               'fields' => $repeater->get_controls(),
               'default' => [
                   [ 
                     'small_heading' => __('Our Vision to Grow Better', 'creote-addons'),
                     'heading' => __('Helping Clients Achieve  Results Through Their People.', 'creote-addons'),
                     'description' => __('Helping Clients Achieve  Results Through Their People.', 'creote-addons'),
                     'button' => __('Read More', 'creote-addons'),
                   ],
                   [
                     'small_heading' => __('Our Vision to Grow Better', 'creote-addons'),
                     'heading' => __('Helping Clients Achieve  Results Through Their People.', 'creote-addons'),
                     'description' => __('Helping Clients Achieve  Results Through Their People.', 'creote-addons'),
                     'button' => __('Read More', 'creote-addons'),
                    ],
                    [
                     'small_heading' => __('Our Vision to Grow Better', 'creote-addons'),
                     'heading' => __('Helping Clients Achieve  Results Through Their People.', 'creote-addons'),
                     'description' => __('Helping Clients Achieve  Results Through Their People.', 'creote-addons'),
                     'button' => __('Read More', 'creote-addons'),
                    ]
               ],
               'title_field' => '{{{ heading }}}',
           ]
         );
           $this->end_controls_section();
           $this->start_controls_section('slider_v4_css',
           [ 
               'label' => __('Custom Css', 'creote-addons') ,
               'tab' =>Controls_Manager::TAB_STYLE,
           ]
           );
           $this->add_control(
            'loop_enable',
            [
              'label' => __( 'Loop Enable', 'creote-addons' ),
              'type' => \Elementor\Controls_Manager::SWITCHER,
              'label_on' => __( 'Show', 'creote-addons' ),
              'label_off' => __( 'Hide', 'creote-addons' ),
              'return_value' => 'yes',
              'default' => 'no',
            ]
          );
          $this->add_control(
            'autoplay_enable',
            [
              'label' => __( 'Autoplay Enable', 'creote-addons' ),
              'type' => \Elementor\Controls_Manager::SWITCHER,
              'label_on' => __( 'Show', 'creote-addons' ),
              'label_off' => __( 'Hide', 'creote-addons' ),
              'return_value' => 'yes',
              'default' => 'no',
            ]
          );
           $this->add_responsive_control(
            'autplaytimeout',
             [
              'label' => esc_html__( 'Slider Time Out', 'creote-addons' ),
              'type' => \Elementor\Controls_Manager::NUMBER,
              'min' => 0,
              'max' => 52000,
              'step' => 1,
              'default' => '7000', 
             ]
          );
          $this->add_responsive_control(
            'sliderspeed',
             [
              'label' => esc_html__( 'Slider Speed', 'creote-addons' ),
              'type' => \Elementor\Controls_Manager::NUMBER,
              'min' => 0,
              'max' => 52000,
              'step' => 1,
              'default' => '1800', 
             ]
          );
          $this->add_responsive_control(
            'slider_height',
             [
              'label' => esc_html__( 'Slider Height', 'creote-addons' ),
              'type' => \Elementor\Controls_Manager::NUMBER,
              'min' => 0,
              'max' => 2000,
              'step' => 1,
              'default' => '',
              'selectors' => [
                '{{WRAPPER}}  .slider .slide-item ,  {{WRAPPER}} .slide-item-content' => 'height: {{VALUE}}px!important;',
                '{{WRAPPER}} .slider .slide-item-content .image-layer ' => 'height: {{VALUE}}px!important;',
              ],
             ]
          );
           $this->add_responsive_control(
            'slider_radius',
            [
              'label' => __( 'Slider Radius', 'creote-addons' ),
              'type' => Controls_Manager::DIMENSIONS,
              'size_units' => ['px'],
              'selectors' => [
                '{{WRAPPER}} .slider' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
              ],
            ]
          );
           $this->add_control(
             'small_heading_color',
              [
                 'label' => __('Small Heading Color', 'creote-addons'),
                 'type' => Controls_Manager::COLOR,
                  'selectors' => [
                     '{{WRAPPER}} .slider_version_v4.style_one .slide-item-content .slider_content h6 ' => 'color: {{VALUE}}!important;',
                   ],
              ]
           );
           $this->add_control(
            'small_headingbg_color',
             [
                'label' => __('Small Heading Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .slider_version_v4.style_one .slide-item-content .slider_content h6 ' => 'background: {{VALUE}}!important;',
                  ],
             ]
          );
           $this->add_control(
             'heading_color',
              [
                 'label' => __('Heading Color', 'creote-addons'),
                 'type' => Controls_Manager::COLOR,
                  'selectors' => [
                     '{{WRAPPER}} .slider_version_v4.style_one .slide-item-content .slider_content h1  ' => 'color: {{VALUE}}!important;',
                   ],
              ]
           );
             $this->add_control(
               'description_color',
                [
                   'label' => __('Description Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .slider_version_v4.style_one .slide-item-content .slider_content p ' => 'color: {{VALUE}}!important;',
                   ], 
                ]
             );
             $this->add_control(
               'button_color',
                [
                   'label' => __('Button Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                    'selectors' => [
                       '{{WRAPPER}} .slider_version_v4.style_one .slide-item-content .slider_content a.theme-btn  ' => 'color: {{VALUE}}!important;',
                     ],
                ]
             );
               $this->add_control(
                 'button_bg_color',
                  [
                     'label' => __('Button Background Color', 'creote-addons'),
                     'type' => Controls_Manager::COLOR,
                     'selectors' => [
                         '{{WRAPPER}} .slider_version_v4.style_one .slide-item-content .slider_content a.theme-btn ' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
                     ], 
                  ]
               );
               $this->add_control(
                 'hover_button_color',
                  [
                     'label' => __('Button Hover Color', 'creote-addons'),
                     'type' => Controls_Manager::COLOR,
                      'selectors' => [
                         '{{WRAPPER}} .slider_version_v4.style_one .slide-item-content .slider_content a.theme-btn:hover  ' => 'color: {{VALUE}}!important;',
                       ],
                  ]
               );
                 $this->add_control(
                   'hover_button_bg_color',
                    [
                       'label' => __('Button Hover Background Color', 'creote-addons'),
                       'type' => Controls_Manager::COLOR,
                       'selectors' => [
                           '{{WRAPPER}} .slider_version_v4.style_one .slide-item-content .slider_content a.theme-btn:hover ' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
                       ], 
                    ]
                 );
             $this->add_control(
               'border_radius',
               [
                 'label' => __( 'Button Border Radius', 'creote-addons' ),
                 'type' => Controls_Manager::DIMENSIONS,
                 'size_units' => ['px'],
                 'selectors' => [
                   '{{WRAPPER}} .theme-btn   ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
                 ],
               ]
             );
             $this->add_control(
              'pricecolor',
               [
                  'label' => __('Price Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                   'selectors' => [
                      '{{WRAPPER}} .slider_version_v4.slider.style_one .tag_content  ' => 'color: {{VALUE}}!important;',
                    ],
               ]
            );
             $this->end_controls_section();
             $this->start_controls_section('nav_dots_css',
             [ 
                 'label' => __('Navigation / Pagination Css', 'creote-addons') ,
                 'tab' =>Controls_Manager::TAB_STYLE,
             ]
             );
             $this->add_control(
               'navigation_enable',
               [
                 'label' => __( 'Navigation Enable', 'creote-addons' ),
                 'type' => \Elementor\Controls_Manager::SWITCHER,
                 'label_on' => __( 'Show', 'creote-addons' ),
                 'label_off' => __( 'Hide', 'creote-addons' ),
                 'return_value' => 'yes',
                 'default' => 'no',
               ]
             );
             $this->add_control(
               'nav_positions',
               [
                 'label' => __( 'Navigation Position', 'creote-addons' ),
                 'type' => \Elementor\Controls_Manager::SELECT,
                 'default' => 'nav_position_one' ,
                 'options' => [
                   'nav_position_one'  => __( 'Nav Position One', 'creote-addons' ),
                   'nav_position_two'  => __( 'Nav position Two', 'creote-addons' ),
                 ],
                 'condition' => [
                   'navigation_enable' => 'yes'
                 ],
               ]
             );
             $this->add_control(
               'navigation_color',
                [
                   'label' => __('Navigation  Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                    'selectors' => [
                       '{{WRAPPER}} .slider .owl-prev::before, .slider .owl-next::before  ' => 'color: {{VALUE}}!important;',
                     ],
                     'condition' => [
                       'navigation_enable' => 'yes'
                     ],
                ]
             );
               $this->add_control(
                 'navigation_bg_color',
                  [
                     'label' => __('Navigation Background Color', 'creote-addons'),
                     'type' => Controls_Manager::COLOR,
                     'selectors' => [
                         '{{WRAPPER}} .slider .owl-prev::before, .slider .owl-next::before ' => 'background: {{VALUE}}!important;',
                     ], 
                     'condition' => [
                       'navigation_enable' => 'yes'
                     ],
                  ]
               );
             $this->add_control(
               'pagination_enable',
               [
                 'label' => __( 'Pagination Enable', 'creote-addons' ),
                 'type' => \Elementor\Controls_Manager::SWITCHER,
                 'label_on' => __( 'Show', 'creote-addons' ),
                 'label_off' => __( 'Hide', 'creote-addons' ),
                 'return_value' => 'yes',
                 'default' => 'no',
               ]
             );
             $this->add_control(
               'pag_positions',
               [
                 'label' => __( 'Pagination Position', 'creote-addons' ),
                 'type' => \Elementor\Controls_Manager::SELECT,
                 'default' => 'pag_position_one' ,
                 'options' => [
                   'pag_position_one'  => __( 'Pagination Position One', 'creote-addons' ),
                   'pag_position_two'  => __( 'Pagination position Two', 'creote-addons' ),
                 ],
                 'condition' => [
                   'pagination_enable' => 'yes'
                 ],
               ]
             );
             $this->add_control(
               'dot_color',
                [
                   'label' => __('Dot Border  Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                    'selectors' => [
                       '{{WRAPPER}} .slider .banner-carousel .owl-dots .owl-dot  ' => 'border-color: {{VALUE}}!important;',
                     ],
                     'condition' => [
                       'navigation_enable' => 'yes'
                     ],
                ]
             );
               $this->add_control(
                 'dot_active_color',
                  [
                     'label' => __('Dot Active Background Color', 'creote-addons'),
                     'type' => Controls_Manager::COLOR,
                     'selectors' => [
                         '{{WRAPPER}} .slider .banner-carousel .owl-dots .owl-dot:hover , {{WRAPPER}} .slider .banner-carousel .owl-dots .owl-dot.active  ' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
                     ], 
                     'condition' => [
                       'navigation_enable' => 'yes'
                     ],
                  ]
               );
             $this->end_controls_section();
           }
       protected function render()
       {
           $settings = $this->get_settings_for_display();
           $allowed_tags = wp_kses_allowed_html('post');
           $loop_enable = "";
           if($settings['loop_enable'] == "yes"){
            $loop_enable = "true";
           }else{
            $loop_enable = "false";
           }
           $autoplay_enable = "";
           if($settings['autoplay_enable'] == "yes"){
            $autoplay_enable = "true";
           }else{
            $autoplay_enable = "false";
           }
          ?>
<section class="slider style_one slider_version_v4 <?php echo esc_attr($settings['pag_positions']); ?> <?php echo esc_attr($settings['nav_positions']); ?>"> <div class="banner-carousel theme_carousel owl-theme owl-carousel" data-options='{"loop": <?php echo esc_attr($loop_enable); ?>, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": <?php echo esc_attr($autoplay_enable); ?>, "autoplayTimeout": <?php echo esc_attr($settings['autplaytimeout']); ?>, "smartSpeed": <?php echo esc_attr($settings['sliderspeed']); ?>, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'> <?php foreach($settings['v4_slider_repeater'] as $key => $v4_slider_repeater): $content_paddings = $v4_slider_repeater['content_padding']; $content_paddings = ! empty( $content_paddings ) ? "padding: $content_paddings;" : ''; $content_paddingscss = 'style="'.$content_paddings.'"'; ?> <div class="slide-item"> <div class="slide-item-content"> <div class="image-layer" <?php if(!empty($v4_slider_repeater['slider_background_image']['url'])): ?> style="background-image:url(<?php echo esc_url($v4_slider_repeater['slider_background_image']['url']); ?>)" <?php endif; ?>></div> <div class="<?php echo esc_attr($settings['container_width']); ?>"> <div class="contnet_d_flex"> <div class="text_box_content"> <div class="slider_content" <?php if(!empty($content_paddingscss)): ?> <?php echo __($content_paddingscss); ?> <?php endif; ?>> <?php if(!empty($v4_slider_repeater['small_heading_enable'] == 'yes')): ?> <h6 class="animated <?php echo esc_attr($v4_slider_repeater['small_heading_trans']); ?>"> <?php echo wp_kses($v4_slider_repeater['small_heading'] , $allowed_tags); ?> </h6> <?php endif; ?> <?php if(!empty($v4_slider_repeater['heading_enable'] == 'yes')): ?> <h1 class="animated <?php echo esc_attr($v4_slider_repeater['heading_trans']); ?>"> <?php echo wp_kses($v4_slider_repeater['heading'] , $allowed_tags); ?> </h1> <?php endif; ?> <?php if(!empty($v4_slider_repeater['description_enable'] == 'yes')): ?> <p class="animated <?php echo esc_attr($v4_slider_repeater['description_trans']); ?>"> <?php echo wp_kses($v4_slider_repeater['description'] , $allowed_tags); ?> </p> <?php endif; ?> <?php if($v4_slider_repeater['button_enable'] == 'yes' || $v4_slider_repeater['tag_enable'] == 'yes'): ?> <ul> <?php if($v4_slider_repeater['button_enable'] == 'yes'): ?> <?php $target = $v4_slider_repeater['button_link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $v4_slider_repeater['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <li> <div class="thm_btn animated <?php echo esc_attr($v4_slider_repeater['button_trans']); ?>"> <a href="<?php echo esc_url($v4_slider_repeater['button_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn one animated <?php echo esc_attr($v4_slider_repeater['button_trans']); ?>"> <?php echo esc_html($v4_slider_repeater['button']); ?> </a> </div> </li> <?php endif; ?> <?php if($v4_slider_repeater['tag_enable'] == 'yes'): ?> <li> <div class="tag_content animated <?php echo esc_attr($v4_slider_repeater['tag_trans']); ?>"> <?php echo wp_kses($v4_slider_repeater['tag_content'] , $allowed_tags); ?> </div></li> <?php endif; ?> </ul> <?php endif; ?> </div> </div> </div> </div> </div> </div> <?php endforeach;?> </div></section>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_slider_v4());