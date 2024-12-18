<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_slider_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-slider-v1';
       }
       public function get_title()
       {
           return __('Slider V1', 'creote-addons');
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
         $this->start_controls_section('slider_v1_slect',
         [ 
             'label' => __('Slider V1', 'creote-addons')
         ]
         );
         $this->add_control(
           'slider_styles',
           [
             'label' => __('Slider Styles', 'creote-addons'),
             'type' => Controls_Manager::SELECT,
             'options' => [
               'style_one' => __( 'Slider Style One', 'creote-addons' ),
               'style_two' => __( 'Slider Style Two', 'creote-addons' ),
               'style_three' => __( 'Slider Style Three', 'creote-addons' ),
               'style_four' => __( 'Slider Style Four', 'creote-addons' ),
   			      ],
               'default' => __('style_one' , 'creote-addons'),
             ]
           );
         $this->end_controls_section();
           // style one start
           $this->start_controls_section('slider_v1_settings',
           [ 
               'label' => __('Slider Content', 'creote-addons'),
               'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
               'condition' => [
                   'slider_styles' => 'style_one'
               ]
           ]
           );
           $repeater = new Repeater();
           $repeater->add_control(
             'content_alginment',
             [
               'label' => __( 'Content Alignment', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::SELECT,
               'default' => 'content_left' ,
               'options' => [
                 'content_left'  => __( 'Content Left', 'creote-addons' ),
                 'content_right'  => __( 'Content Right', 'creote-addons' ),
               ],
             ]
           );
           $repeater->add_control(
             'heading',
             [
                'label' => __('Heading', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Inspired <br>  Performance', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),    
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
             ]
           );
           $repeater->add_control(
             'small_heading',
             [
                 'label' => __('Small Heading', 'creote-addons'),
                 'type' => Controls_Manager::TEXTAREA,
                 'default' => __('Our Vision to Grow Better', 'creote-addons'),
                 'placeholder' => __('Type your text here', 'creote-addons'),
             ]
            );
            $repeater->add_control(
             'small_heading_trans',
             [
               'label' => __( 'Small Heading Transition', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::SELECT,
               'default' => '_flipInY' ,
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
             ]
           );
           $repeater->add_control(
           'description',
           [
             'label' => __('Description Text', 'creote-addons'),
             'type' => Controls_Manager::TEXTAREA,
             'default' => __('Duty obligations of business it will frequently occur that pleasures
              have to be repudiated and annoyances accepted.', 'creote-addons'),
             'placeholder' => __('Type your text here', 'creote-addons'),
           ]
           );
           $repeater->add_control(
             'description_trans',
             [
               'label' => __( 'Description Transition', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::SELECT,
               'default' => '_flipInX' ,
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
             ]
           );
           $repeater->add_control(
           'button',
           [
           'label' => __('Btn Label', 'creote-addons'),
           'type' => Controls_Manager::TEXT,
           'default' => __('Contact Us', 'creote-addons'),
           'placeholder' => __('Btn Label Here', 'creote-addons'),
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
           ]
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
         ]
       );
          $repeater->add_control(
           'slider_image',
           [
             'label' => __( 'Image', 'creote-addons' ),
             'type' => Controls_Manager::MEDIA,
             'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
             ],
           ] 
          );
          $repeater->add_control(
           'image_trans',
           [
             'label' => __( 'Image Transition', 'creote-addons' ),
             'type' => \Elementor\Controls_Manager::SELECT,
             'default' => '_flipInX' ,
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
           ]
         );
         $repeater->add_control(
           'image_margin',
           [
             'label' => __( 'Image Margin', 'creote-addons' ),
             'type' => Controls_Manager::TEXT,
             'placeholder' => __('0px 0px 0px 0px' , 'creote-addons'),
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
           'slider_repeater',
           [
               'label' => __('Slider Repeater', 'creote-addons'),
               'type' => Controls_Manager::REPEATER,
               'fields' => $repeater->get_controls(),
               'default' => [
                   [
                     'heading' => __('Inspired  Performance', 'creote-addons'),
                     'small_heading' =>  __('Our Vision to Grow Better', 'creote-addons'),
                     'description' =>  __('Duty obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted.', 'creote-addons'),
                     'button' =>  __('Read More', 'creote-addons'),
                     'content_alginment' => 'content_left'
                   ],
                   [
                     'heading' => __('Inspired  Performance', 'creote-addons'),
                     'small_heading' =>  __('Our Vision to Grow Better', 'creote-addons'),
                     'description' =>  __('Duty obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted.', 'creote-addons'),
                     'button' =>  __('Read More', 'creote-addons'),
                     'content_alginment' => 'content_right'
                    ],
                    [
                     'heading' => __('Inspired  Performance', 'creote-addons'),
                     'small_heading' =>  __('Our Vision to Grow Better', 'creote-addons'),
                     'description' =>  __('Duty obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted.', 'creote-addons'),
                     'button' =>  __('Read More', 'creote-addons'),
                     'content_alginment' => 'content_left'
                    ]
               ],
               'title_field' => '{{{ heading }}}',
           ]
         );
           $this->end_controls_section();
           // slider style one end ======================
             // slider style Two start ================
             $this->start_controls_section('slider_style_two_settings',
             [ 
                 'label' => __('Slider Content', 'creote-addons'),
                 'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                 'condition' => [
                     'slider_styles' => 'style_four'
                 ]
             ]
             ); 
             $repeater = new Repeater();
             $repeater->add_control(
               'content_alginment',
               [
                 'label' => __( 'Content Alignment', 'creote-addons' ),
                 'type' => \Elementor\Controls_Manager::SELECT,
                 'default' => 'content_left' ,
                 'options' => [
                   'content_left'  => __( 'Content Left', 'creote-addons' ),
                   'content_right'  => __( 'Content Right', 'creote-addons' ),
                   'content_center'  => __( 'Content Center', 'creote-addons' ),
                 ],
               ]
             );
             $repeater->add_control(
               'small_heading',
               [
                   'label' => __('Small Heading', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('Our Vision to Grow Better', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
               ]
              );
              $repeater->add_control(
               'small_heading_trans',
               [
                 'label' => __( 'Small Heading Transition', 'creote-addons' ),
                 'type' => \Elementor\Controls_Manager::SELECT,
                 'default' => '_flipInY' ,
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
               ]
             );
             $repeater->add_control(
               'heading',
               [
                  'label' => __('Heading', 'creote-addons'),
                  'type' => Controls_Manager::TEXTAREA,
                  'default' => __('Inspired <br>  Performance', 'creote-addons'),
                  'placeholder' => __('Type your text here', 'creote-addons'),    
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
               ]
             );
             $repeater->add_control(
             'description',
             [
               'label' => __('Description Text', 'creote-addons'),
               'type' => Controls_Manager::TEXTAREA,
               'default' => __('Duty obligations of business it will frequently occur that pleasures
                have to be repudiated and annoyances accepted.', 'creote-addons'),
               'placeholder' => __('Type your text here', 'creote-addons'),
             ]
             );
             $repeater->add_control(
               'description_trans',
               [
                 'label' => __( 'Description Transition', 'creote-addons' ),
                 'type' => \Elementor\Controls_Manager::SELECT,
                 'default' => '_flipInX' ,
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
               ]
             );
             $repeater->add_control(
             'button',
             [
             'label' => __('Btn Label', 'creote-addons'),
             'type' => Controls_Manager::TEXT,
             'default' => __('Contact Us', 'creote-addons'),
             'placeholder' => __('Btn Label Here', 'creote-addons'),
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
             ]
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
             'slider_repeater_sttwo',
             [
                 'label' => __('Slider Repeater', 'creote-addons'),
                 'type' => Controls_Manager::REPEATER,
                 'fields' => $repeater->get_controls(),
                 'default' => [
                     [
                       'heading' => __('Inspired  Performance', 'creote-addons'),
                       'small_heading' =>  __('Our Vision to Grow Better', 'creote-addons'),
                       'description' =>  __('Duty obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted.', 'creote-addons'),
                       'button' =>  __('Read More', 'creote-addons'),
                       'content_alginment' => 'content_left'
                     ],
                     [
                       'heading' => __('Inspired  Performance', 'creote-addons'),
                       'small_heading' =>  __('Our Vision to Grow Better', 'creote-addons'),
                       'description' =>  __('Duty obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted.', 'creote-addons'),
                       'button' =>  __('Read More', 'creote-addons'),
                       'content_alginment' => 'content_center'
                      ],
                      [
                       'heading' => __('Inspired  Performance', 'creote-addons'),
                       'small_heading' =>  __('Our Vision to Grow Better', 'creote-addons'),
                       'description' =>  __('Duty obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted.', 'creote-addons'),
                       'button' =>  __('Read More', 'creote-addons'),
                       'content_alginment' => 'content_right'
                      ]
                 ],
                 'title_field' => '{{{ heading }}}',
             ]
           ); 
             $this->end_controls_section(); 
             // slider style two end ======================
             // slider style Three start ================
             $this->start_controls_section('slider_style_three_settings',
             [ 
                 'label' => __('Slider Content', 'creote-addons'),
                 'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                 'condition' => [
                     'slider_styles' => 'style_three'
                 ]
             ]
             );
             $repeater = new Repeater();
             $repeater->add_control(
               'content_alginment',
               [
                 'label' => __( 'Content Alignment', 'creote-addons' ),
                 'type' => \Elementor\Controls_Manager::SELECT,
                 'default' => 'content_left' ,
                 'options' => [
                   'content_left'  => __( 'Content Left', 'creote-addons' ),
                   'content_right'  => __( 'Content Right', 'creote-addons' ),
                   'content_center'  => __( 'Content Center', 'creote-addons' ),
                 ],
               ]
             );
             $repeater->add_control(
               'heading',
               [
                  'label' => __('Heading', 'creote-addons'),
                  'type' => Controls_Manager::TEXTAREA,
                  'default' => __('Inspired <br>  Performance', 'creote-addons'),
                  'placeholder' => __('Type your text here', 'creote-addons'),    
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
               ]
             );
             $repeater->add_control(
               'description',
               [
                   'label' => __('Description', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('Our Vision to Grow Better', 'creote-addons'),
                   'placeholder' => __('Type your text here', 'creote-addons'),
               ]
              );
              $repeater->add_control(
               'description_trans',
               [
                 'label' => __( 'Description Transition', 'creote-addons' ),
                 'type' => \Elementor\Controls_Manager::SELECT,
                 'default' => '_flipInY' ,
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
               ]
             );
             $repeater->add_control(
             'button',
             [
             'label' => __('Btn Label', 'creote-addons'),
             'type' => Controls_Manager::TEXT,
             'default' => __('Contact Us', 'creote-addons'),
             'placeholder' => __('Btn Label Here', 'creote-addons'),
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
             ]
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
           ]
         );
           $repeater->add_control(
             'video_link',
             [
             'label' => __('Vide Link', 'creote-addons'),
             'type' => Controls_Manager::TEXT,
             'default' => __('https://www.youtube.com/71EZb94AS1k', 'creote-addons'),
             'placeholder' => __('https://www.youtube.com/embed/71EZb94AS1k', 'creote-addons'),
             ]
             );
         $repeater->add_control(
           'video_trans',
           [
             'label' => __( 'Video Transition', 'creote-addons' ),
             'type' => \Elementor\Controls_Manager::SELECT,
             'default' => '_flipInX' ,
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
           ]
         );
            $repeater->add_control(
             'content_paddings',
             [
               'label' => __( 'Content Padding', 'creote-addons' ),
               'type' => Controls_Manager::TEXT,
               'placeholder' => __('0px 0px 0px 0px' , 'creote-addons'),
             ]
           );
           $repeater->add_control(
             'slider_background_image',
             [
               'label' => __( 'Banner Background Image', 'creote-addons' ),
               'type' => Controls_Manager::MEDIA,
               'default' => [
                 'url' => \Elementor\Utils::get_placeholder_image_src(),
               ],
             ] 
            ); 
            $this->add_control(
             'slider_repeater_three',
             [
                 'label' => __('Slider Repeater', 'creote-addons'),
                 'type' => Controls_Manager::REPEATER,
                 'fields' => $repeater->get_controls(),
                 'default' => [
                     [
                       'heading' => __('Inspired  Performance', 'creote-addons'),
                       'description' =>  __('Our Vision to Grow Better', 'creote-addons'),
                       'button' =>  __('Read More', 'creote-addons'),
                       'content_alginment' => 'content_left'
                     ],
                     [
                       'heading' => __('Inspired  Performance', 'creote-addons'),
                       'description' =>  __('Our Vision to Grow Better', 'creote-addons'),
                       'button' =>  __('Read More', 'creote-addons'),
                       'content_alginment' => 'content_center'
                      ],
                      [
                       'heading' => __('Inspired  Performance', 'creote-addons'),
                       'description' =>  __('Our Vision to Grow Better', 'creote-addons'),
                       'button' =>  __('Read More', 'creote-addons'),
                       'content_alginment' => 'content_right'
                      ]
                 ],
                 'title_field' => '{{{ heading }}}',
             ]
           ); 
             $this->end_controls_section();
          // style three start
          // style one start
          $this->start_controls_section('slider_v2_settings',
          [ 
              'label' => __('Slider Content', 'creote-addons'),
              'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
              'condition' => [
                  'slider_styles' => 'style_two'
              ]
          ]
          ); 
               $repeater = new Repeater();
               $repeater->add_control(
                 'content_alginment',
                 [
                   'label' => __( 'Content Alignment', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::SELECT,
                   'default' => 'content_left' ,
                   'options' => [
                     'content_left'  => __( 'Content Left', 'creote-addons' ),
                     'content_right'  => __( 'Content Right', 'creote-addons' ),
                   ],
                 ]
               ); 
               $repeater->add_control(
                 'heading',
                 [
                    'label' => __('Heading', 'creote-addons'),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => __('Inspired <br>  Performance', 'creote-addons'),
                    'placeholder' => __('Type your text here', 'creote-addons'),    
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
                 ]
               );
               $repeater->add_control(
                 'description',
                 [
                     'label' => __('Description', 'creote-addons'),
                     'type' => Controls_Manager::TEXTAREA,
                     'default' => __('Our Vision to Grow Better', 'creote-addons'),
                     'placeholder' => __('Type your text here', 'creote-addons'),
                 ]
                );
                $repeater->add_control(
                 'description_trans',
                 [
                   'label' => __( 'Description Transition', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::SELECT,
                   'default' => '_flipInY' ,
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
                 ]
               );
          $repeater->add_control(
               'button',
               [
               'label' => __('Btn Label', 'creote-addons'),
               'type' => Controls_Manager::TEXT,
               'default' => __('Contact Us', 'creote-addons'),
               'placeholder' => __('Btn Label Here', 'creote-addons'),
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
               ]
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
             ]
           );
             $repeater->add_control(
               'video_link',
               [
               'label' => __('Vide Link', 'creote-addons'),
               'type' => Controls_Manager::TEXT,
               'default' => __('https://www.youtube.com/71EZb94AS1k', 'creote-addons'),
               'placeholder' => __('https://www.youtube.com/embed/71EZb94AS1k', 'creote-addons'),
               ]
               );
           $repeater->add_control(
             'video_trans',
             [
               'label' => __( 'Video Transition', 'creote-addons' ),
               'type' => \Elementor\Controls_Manager::SELECT,
               'default' => '_flipInX' ,
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
             ]
           );
              $repeater->add_control(
               'slider_image',
               [
                 'label' => __( 'Image', 'creote-addons' ),
                 'type' => Controls_Manager::MEDIA,
                 'default' => [
                   'url' => \Elementor\Utils::get_placeholder_image_src(),
                 ],
               ] 
              );
              $repeater->add_control(
               'image_trans',
               [
                 'label' => __( 'Image Transition', 'creote-addons' ),
                 'type' => \Elementor\Controls_Manager::SELECT,
                 'default' => '_flipInX' ,
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
               ]
             );
             $repeater->add_control(
               'image_margin',
               [
                 'label' => __( 'Image Margin', 'creote-addons' ),
                 'type' => Controls_Manager::TEXT,
                 'placeholder' => __('0px 0px 0px 0px' , 'creote-addons'),
               ]
             );
              $repeater->add_control(
               'content_paddings',
               [
                 'label' => __( 'Content Padding', 'creote-addons' ),
                 'type' => Controls_Manager::TEXT,
                 'placeholder' => __('0px 0px 0px 0px' , 'creote-addons'),
               ]
             );
             $repeater->add_control(
               'slider_background_image',
               [
                 'label' => __( 'Banner Background Image', 'creote-addons' ),
                 'type' => Controls_Manager::MEDIA,
                 'default' => [
                   'url' => \Elementor\Utils::get_placeholder_image_src(),
                 ],
               ] 
              );
              $this->add_control(
               'slider_repeater_four',
               [
                   'label' => __('Slider Repeater', 'creote-addons'),
                   'type' => Controls_Manager::REPEATER,
                   'fields' => $repeater->get_controls(),
                   'default' => [
                       [
                         'heading' => __('Inspired  Performance', 'creote-addons'),
                         'description' =>  __('Our Vision to Grow Better', 'creote-addons'),
                         'button' =>  __('Read More', 'creote-addons'),
                         'content_alginment' => 'content_left'
                       ],
                       [
                         'heading' => __('Inspired  Performance', 'creote-addons'),
                         'description' =>  __('Our Vision to Grow Better', 'creote-addons'),
                         'button' =>  __('Read More', 'creote-addons'),
                         'content_alginment' => 'content_right'
                        ],
                        [
                         'heading' => __('Inspired  Performance', 'creote-addons'),
                         'description' =>  __('Our Vision to Grow Better', 'creote-addons'),
                         'button' =>  __('Read More', 'creote-addons'),
                         'content_alginment' => 'content_left'
                        ]
                   ],
                   'title_field' => '{{{ heading }}}',
               ]
             );
             $this->end_controls_section();
           $this->start_controls_section('slider_v1_css',
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
             'heading_color',
              [
                 'label' => __('Heading Color', 'creote-addons'),
                 'type' => Controls_Manager::COLOR,
                 'selectors' => [
                   '{{WRAPPER}} .slider .slide-item .slider_content h1  ' => 'color: {{VALUE}}!important;',
                 ],
              ]
           );
           $this->add_control(
             'small_heading_color',
              [
                 'label' => __('Small Heading Color', 'creote-addons'),
                 'type' => Controls_Manager::COLOR,
                 'selectors' => [
                   '{{WRAPPER}} .slider .slide-item .slider_content h6 ' => 'color: {{VALUE}}!important;',
                 ],
              ]
           );
           $this->add_control(
             'description_color',
               [
                 'label' => __('Description Color', 'creote-addons'),
                 'type' => Controls_Manager::COLOR,
                 'selectors' => [
                   '{{WRAPPER}} .slider .slide-item .slider_content p ' => 'color: {{VALUE}}!important;',
                 ],  
                ]
             );
             $this->add_control(
              'button_color',
               [
                  'label' => __('Button Color', 'creote-addons'),
                  'type' => Controls_Manager::COLOR,
                   'selectors' => [
                      '{{WRAPPER}}  a.theme-btn  ' => 'color: {{VALUE}}!important;',
                    ],
               ]
            ); 
              $this->add_control(
                'button_bg_color',
                 [
                    'label' => __('Button Background Color', 'creote-addons'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}  a.theme-btn ' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
                    ], 
                 ]
              );
              $this->add_control(
                'hover_button_color',
                 [
                    'label' => __('Button Hover Color', 'creote-addons'),
                    'type' => Controls_Manager::COLOR,
                     'selectors' => [
                        '{{WRAPPER}} a.theme-btn:hover  ' => 'color: {{VALUE}}!important;',
                      ],
                 ]
              );
                $this->add_control(
                  'hover_button_bg_color',
                   [
                      'label' => __('Button Hover Background Color', 'creote-addons'),
                      'type' => Controls_Manager::COLOR,
                      'selectors' => [
                          '{{WRAPPER}} a.theme-btn:hover ' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
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
                   '{{WRAPPER}} .theme-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
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
<section class="slider <?php echo esc_attr($settings['slider_styles']); ?> <?php echo esc_attr($settings['pag_positions']); ?> <?php echo esc_attr($settings['nav_positions']); ?>"> <div class="banner-carousel theme_carousel owl-theme owl-carousel" data-options='{"loop": <?php echo esc_attr($loop_enable); ?>, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": <?php echo esc_attr($autoplay_enable); ?>, "autoplayTimeout": <?php echo esc_attr($settings['autplaytimeout']); ?>, "smartSpeed": <?php echo esc_attr($settings['sliderspeed']); ?>, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'> <?php if($settings['slider_styles'] == 'style_four'): // style_one ?> <?php // style two start ?> <?php foreach($settings['slider_repeater_sttwo'] as $key => $slider_repeater_sttwo): $content_paddings = $slider_repeater_sttwo['content_padding']; $content_paddings = ! empty( $content_paddings ) ? "padding: $content_paddings;" : ''; $content_paddingscss = 'style=" ' . $content_paddings . '"'; ?> <div class="slide-item"> <div class="slide-item-content"> <div class="slide-item <?php echo esc_attr($slider_repeater_sttwo['content_alginment']); ?>"> <div class="image-layer" <?php if(!empty($slider_repeater_sttwo['slider_background_image']['url'])): ?> style="background-image:url(<?php echo esc_url($slider_repeater_sttwo['slider_background_image']['url']); ?>)" <?php endif; ?>></div> <div class="auto-container"> <div class="row"> <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <div class="slider_content" <?php echo $content_paddingscss; ?>> <?php if(!empty($slider_repeater_sttwo['small_heading'])): ?> <h6 class="animated <?php echo esc_attr($slider_repeater_sttwo['small_heading_trans']); ?>"> <?php echo wp_kses($slider_repeater_sttwo['small_heading'] , $allowed_tags); ?> </h6> <?php endif; ?> <?php if(!empty($slider_repeater_sttwo['heading'])): ?> <h1 class="animated <?php echo esc_attr($slider_repeater_sttwo['heading_trans']); ?>"> <?php echo wp_kses($slider_repeater_sttwo['heading'] , $allowed_tags); ?> </h1> <?php endif; ?> <?php if(!empty($slider_repeater_sttwo['description'])): ?> <p class="description animated <?php echo esc_attr($slider_repeater_sttwo['description_trans']); ?>"> <?php echo wp_kses($slider_repeater_sttwo['description'] , $allowed_tags); ?> </p> <?php endif; ?> <?php if(!empty($slider_repeater_sttwo['button'])) :?> <?php $target = $slider_repeater_sttwo['button_link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $slider_repeater_sttwo['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <a href="<?php echo esc_url($slider_repeater_sttwo['button_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn one animated <?php echo esc_attr($slider_repeater_sttwo['button_trans']); ?>"> <?php echo esc_html($slider_repeater_sttwo['button']); ?> </a> <?php endif; ?> </div> </div> </div> </div> </div> </div> </div> <?php endforeach;?> <?php // slider style two end ?> <?php elseif($settings['slider_styles'] == 'style_three'): // style_one ?> <?php // slider style three start ?> <?php foreach($settings['slider_repeater_three'] as $key => $slider_repeater_three): $content_paddings = $slider_repeater_three['content_paddings']; $content_paddings = ! empty( $content_paddings ) ? "padding: $content_paddings;" : ''; $content_paddingscss = $content_paddings; ?> <div class="slide-item"> <div class="slide-item-content <?php echo esc_attr($slider_repeater_three['content_alginment']); ?>"> <div class="image-layer" <?php if(!empty($slider_repeater_three['slider_background_image']['url'])): ?> style="background-image:url(<?php echo esc_url($slider_repeater_three['slider_background_image']['url']); ?>)" <?php endif; ?>></div> <div class="auto-container"> <div class="row"> <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <div class="slider_content" <?php if(!empty($content_paddingscss)): ?> <?php echo __($content_paddingscss); ?> <?php endif; ?>> <?php if(!empty($slider_repeater_three['heading'])): ?> <h1 class="animated <?php echo esc_attr($slider_repeater_three['heading_trans']); ?>"> <?php echo wp_kses($slider_repeater_three['heading'] , $allowed_tags); ?> </h1> <?php endif; ?> <?php if(!empty($slider_repeater_three['description'])): ?> <p class="animated <?php echo esc_attr($slider_repeater_three['description_trans']); ?>"> <?php echo wp_kses($slider_repeater_three['description'] , $allowed_tags); ?> </p> <?php endif; ?> <ul> <?php if(!empty($slider_repeater_three['button'])) :?> <?php $target = $slider_repeater_three['button_link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $slider_repeater_three['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <li> <a href="<?php echo esc_url($slider_repeater_three['button_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn five animated <?php echo esc_attr($slider_repeater_three['button_trans']); ?>"> <?php echo esc_html($slider_repeater_three['button']); ?> </a> </li> <?php endif; ?> <?php if(!empty($slider_repeater_three['video_link'])): ?> <li> <div class="video_box animated <?php echo esc_attr($slider_repeater_three['video_trans']); ?>"> <a href="<?php echo esc_attr($slider_repeater_three['video_link']); ?>" class="lightbox-image"><i class="icon-play"></i></a> </div> </li> <?php endif; ?> </ul> </div> </div> </div> </div> </div> </div> <?php endforeach;?> <?php // slider style three End ?> <?php elseif($settings['slider_styles'] == 'style_two'): // style_one ?> <?php // style two start ?> <?php foreach($settings['slider_repeater_four'] as $key => $slider_repeater_four): $image_margin = $slider_repeater_four['image_margin']; $image_margin = ! empty( $image_margin ) ? "margin: $image_margin;" : ''; $image_margincss = $image_margin ; $content_paddings = $slider_repeater_four['content_paddings']; $content_paddings = ! empty( $content_paddings ) ? "padding: $content_paddings;" : ''; $content_paddingscss = $content_paddings ; ?> <div class="slide-item"> <div class="slide-item-content <?php echo esc_attr($slider_repeater_four['content_alginment']); ?>"> <div class="image-layer" <?php if(!empty($slider_repeater_four['slider_background_image']['url'])): ?> style="background-image:url(<?php echo esc_url($slider_repeater_four['slider_background_image']['url']); ?>)" <?php endif; ?>></div> <div class="auto-container"> <div class="row"> <div class="col-md-12 col-lg-7 col-sm-12 col-xs-12"> <div class="slider_content" <?php if(!empty($content_paddingscss)): ?> <?php echo __($content_paddingscss); ?> <?php endif; ?>> <?php if(!empty($slider_repeater_four['heading'])): ?> <h1 class="animated <?php echo esc_attr($slider_repeater_four['heading_trans']); ?>"> <?php echo wp_kses($slider_repeater_four['heading'] , $allowed_tags); ?> </h1> <?php endif; ?> <?php if(!empty($slider_repeater_four['description'])): ?> <p class="animated <?php echo esc_attr($slider_repeater_four['description_trans']); ?>"> <?php echo wp_kses($slider_repeater_four['description'] , $allowed_tags); ?> </p> <?php endif; ?> <ul> <?php if(!empty($slider_repeater_four['button'])) :?> <?php $target = $slider_repeater_four['button_link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $slider_repeater_four['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <li> <a href="<?php echo esc_url($slider_repeater_four['button_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn three animated <?php echo esc_attr($slider_repeater_four['button_trans']); ?>"> <?php echo esc_html($slider_repeater_four['button']); ?> </a> </li> <?php endif; ?> <?php if(!empty($slider_repeater_four['video_link'])): ?> <li> <div class="video_box animated <?php echo esc_attr($slider_repeater_four['video_trans']); ?>"> <a href="<?php echo esc_attr($slider_repeater_four['video_link']); ?>" class="lightbox-image"><i class="icon-play"></i></a> </div> </li> <?php endif; ?> </ul> </div> </div> <div class="col-md-12 col-lg-5 col-sm-12 col-xs-12 image_column"> <?php if(!empty($slider_repeater_four['slider_image']['url'])) : $image = isset($slider_repeater_four['slider_image']['alt']) ? $slider_repeater_four['slider_image']['alt'] : ''; if(!empty($image)) { $image = $image; }else{ $image = 'image'; } ?> <div class="slider_image <?php echo esc_attr($slider_repeater_four['image_trans']); ?>" <?php if(!empty($image_margincss)): ?> <?php echo __($image_margincss); ?> <?php endif; ?>> <img src="<?php echo esc_url($slider_repeater_four['slider_image']['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image); ?>" /> </div> <?php endif; ?> </div> </div> </div> </div> </div> <?php endforeach;?> <?php else: ?> <?php foreach($settings['slider_repeater'] as $key => $slider_repeater): $image_margin = $slider_repeater['image_margin']; $image_margin = ! empty( $image_margin ) ? "margin: $image_margin;" : ''; $image_margincss = 'style="'.$image_margin.'"'; ?> <div class="slide-item"> <div class="slide-item-content <?php echo esc_attr($slider_repeater['content_alginment']); ?>"> <div class="image-layer" <?php if(!empty($slider_repeater['slider_background_image']['url'])): ?> style="background-image:url(<?php echo esc_url($slider_repeater['slider_background_image']['url']); ?>)" <?php endif; ?>></div> <div class="auto-container"> <div class="row"> <div class="col-md-12 col-lg-7 col-sm-12 col-xs-12"> <div class="slider_content" <?php if(!empty($slider_repeater['content_padding'])): ?> style="padding:<?php echo esc_attr($slider_repeater['content_padding']); ?>;" <?php endif; ?> > <?php if(!empty($slider_repeater['heading'])): ?> <h1 class="animated <?php echo esc_attr($slider_repeater['heading_trans']); ?>"> <?php echo wp_kses($slider_repeater['heading'] , $allowed_tags); ?> </h1> <?php endif; ?> <?php if(!empty($slider_repeater['small_heading'])): ?> <h6 class="animated <?php echo esc_attr($slider_repeater['small_heading_trans']); ?>"> <?php echo wp_kses($slider_repeater['small_heading'] , $allowed_tags); ?> </h6> <?php endif; ?> <?php if(!empty($slider_repeater['description'])): ?> <p class="description animated <?php echo esc_attr($slider_repeater['description_trans']); ?>"> <?php echo wp_kses($slider_repeater['description'] , $allowed_tags); ?> </p> <?php endif; ?> <?php if(!empty($slider_repeater['button'])) :?> <?php $target = $slider_repeater['button_link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $slider_repeater['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <a href="<?php echo esc_url($slider_repeater['button_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn one animated <?php echo esc_attr($slider_repeater['button_trans']); ?>"> <?php echo esc_html($slider_repeater['button']); ?> </a> <?php endif; ?> </div> </div> <div class="col-md-12 col-lg-5 col-sm-12 col-xs-12 image_column"> <?php if(!empty($slider_repeater['slider_image']['url'])) : $image = isset($slider_repeater['slider_image']['alt']) ? $slider_repeater['slider_image']['alt'] : ''; if(!empty($image)) { $image = $image; }else{ $image = 'image'; } ?> <div class="slider_image <?php echo esc_attr($slider_repeater['image_trans']); ?>" <?php if(!empty($image_margincss)): ?> <?php echo __($image_margincss); ?> <?php endif; ?>> <img src="<?php echo esc_url($slider_repeater['slider_image']['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image); ?>" /> </div> <?php endif; ?> </div> </div> </div> </div> </div> <?php endforeach;?> <?php // style two end ?> <?php endif; ?> </div></section>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_slider_v1());