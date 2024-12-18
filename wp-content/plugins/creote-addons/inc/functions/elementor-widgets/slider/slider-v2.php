<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_slider_v2 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-slider-v2';
       }
       public function get_title()
       {
           return __('Slider V2', 'creote-addons');
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
             'label' => __('Slider V2', 'creote-addons')
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
               'style_five' => __( 'Slider Style Five', 'creote-addons' ),
               ],
               'default' => __('style_four' , 'creote-addons'),
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
               'condition' => [
                 'slider_styles' => ['style_one' , 'style_two' , 'style_three' , 'style_five']
               ],
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
           'v2_slider_repeater_one',
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
                     'content_alginment' => 'content_left'
                   ],
                   [
                     'small_heading' => __('Our Vision to Grow Better', 'creote-addons'),
                     'heading' => __('Helping Clients Achieve  Results Through Their People.', 'creote-addons'),
                     'description' => __('Helping Clients Achieve  Results Through Their People.', 'creote-addons'),
                     'button' => __('Read More', 'creote-addons'),
                     'content_alginment' => 'content_center'
                    ],
                    [
                     'small_heading' => __('Our Vision to Grow Better', 'creote-addons'),
                     'heading' => __('Helping Clients Achieve  Results Through Their People.', 'creote-addons'),
                     'description' => __('Helping Clients Achieve  Results Through Their People.', 'creote-addons'),
                     'button' => __('Read More', 'creote-addons'),
                     'content_alginment' => 'content_right'
                    ]
               ],
               'title_field' => '{{{ heading }}}',
           ]
         );
           $this->end_controls_section();
              // style four start
              $this->start_controls_section('slider_v2_settings',
              [ 
                  'label' => __('Slider Content', 'creote-addons'),
                  'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                  'condition' => [
                   'slider_styles' => 'style_four',
                 ],
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
                   'default' => __('<span>Inspired</span> <br>  Performance', 'creote-addons'),
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
                  'description_enable',
                  [
                    'label' => __( 'Description Enable', 'creote-addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'creote-addons' ),
                    'label_off' => __( 'Hide', 'creote-addons' ),
                    'return_value' => 'yes',
                    'default' => 'no',
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
                    'default' => 'no',
                  ]
                );
              $repeater->add_control(
                  'button',
                  [
                  'label' => __('Btn Label One', 'creote-addons'),
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
               'button_two',
               [
               'label' => __('Btn Label Two', 'creote-addons'),
               'type' => Controls_Manager::TEXT,
               'default' => __('Contact Us', 'creote-addons'),
               'placeholder' => __('Btn Label Here', 'creote-addons'),
               'condition' => [
                   'button_enable' => 'yes',
               ],
               ]
               );
           $repeater->add_control(
               'button_link_two',
           [
               'label' => __('Btn Link Two', 'creote-addons'),
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
              'v2_slider_repeater_two',
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
                        'content_alginment' => 'content_left'
                      ],
                      [
                        'small_heading' => __('Our Vision to Grow Better', 'creote-addons'),
                        'heading' => __('Helping Clients Achieve  Results Through Their People.', 'creote-addons'),
                        'description' => __('Helping Clients Achieve  Results Through Their People.', 'creote-addons'),
                        'button' => __('Read More', 'creote-addons'),
                        'content_alginment' => 'content_center'
                       ],
                       [
                        'small_heading' => __('Our Vision to Grow Better', 'creote-addons'),
                        'heading' => __('Helping Clients Achieve  Results Through Their People.', 'creote-addons'),
                        'description' => __('Helping Clients Achieve  Results Through Their People.', 'creote-addons'),
                        'button' => __('Read More', 'creote-addons'),
                        'content_alginment' => 'content_right'
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
             'small_heading_color',
              [
                 'label' => __('Small Heading Color', 'creote-addons'),
                 'type' => Controls_Manager::COLOR,
                  'selectors' => [
                     '{{WRAPPER}} .slider_version_v2 .slide-item-content .slider_content h6 ' => 'color: {{VALUE}}!important;',
                   ],
              ]
           );
           $this->add_control(
             'heading_color',
              [
                 'label' => __('Heading Color', 'creote-addons'),
                 'type' => Controls_Manager::COLOR,
                  'selectors' => [
                     '{{WRAPPER}} .slider_version_v2 .slide-item-content .slider_content h1  ' => 'color: {{VALUE}}!important;',
                   ],
              ]
           );
             $this->add_control(
               'description_color',
                [
                   'label' => __('Description Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .slider_version_v2 .slide-item-content .slider_content p ' => 'color: {{VALUE}}!important;',
                   ], 
                ]
             );
             $this->add_control(
               'button_color',
                [
                   'label' => __('Button Color', 'creote-addons'),
                   'type' => Controls_Manager::COLOR,
                    'selectors' => [
                       '{{WRAPPER}} .slider_version_v2 .slide-item-content .slider_content a.theme-btn  ' => 'color: {{VALUE}}!important;',
                     ],
                ]
             );
               $this->add_control(
                 'button_bg_color',
                  [
                     'label' => __('Button Background Color', 'creote-addons'),
                     'type' => Controls_Manager::COLOR,
                     'selectors' => [
                         '{{WRAPPER}} .slider_version_v2 .slide-item-content .slider_content a.theme-btn ' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
                     ], 
                  ]
               );
               $this->add_control(
                 'hover_button_color',
                  [
                     'label' => __('Button Hover Color', 'creote-addons'),
                     'type' => Controls_Manager::COLOR,
                      'selectors' => [
                         '{{WRAPPER}} .slider_version_v2 .slide-item-content .slider_content a.theme-btn:hover  ' => 'color: {{VALUE}}!important;',
                       ],
                  ]
               );
                 $this->add_control(
                   'hover_button_bg_color',
                    [
                       'label' => __('Button Hover Background Color', 'creote-addons'),
                       'type' => Controls_Manager::COLOR,
                       'selectors' => [
                           '{{WRAPPER}} .slider_version_v2 .slide-item-content .slider_content a.theme-btn:hover ' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
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
<section class="slider slider_version_v2 <?php echo esc_attr($settings['slider_styles']); ?> <?php echo esc_attr($settings['pag_positions']); ?> <?php echo esc_attr($settings['nav_positions']); ?>"> <div class="banner-carousel theme_carousel owl-theme owl-carousel" data-options='{"loop": <?php echo esc_attr($loop_enable); ?>, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": <?php echo esc_attr($autoplay_enable); ?>, "autoplayTimeout": <?php echo esc_attr($settings['autplaytimeout']); ?>, "smartSpeed": <?php echo esc_attr($settings['sliderspeed']); ?>, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'> <?php // slider styles ?> <?php if($settings['slider_styles'] == 'style_one' || $settings['slider_styles'] == 'style_two' || $settings['slider_styles'] == 'style_three' || $settings['slider_styles'] == 'style_five'): ?> <?php // slider styles ?> <?php foreach($settings['v2_slider_repeater_one'] as $key => $v2_slider_repeater_one): $content_paddings = $v2_slider_repeater_one['content_padding']; $content_paddings = ! empty( $content_paddings ) ? "padding: $content_paddings;" : ''; $content_paddingscss = 'style="'.$content_paddings.'"'; ?> <div class="slide-item"> <div class="slide-item-content <?php echo esc_attr($v2_slider_repeater_one['content_alginment']); ?>"> <div class="image-layer" <?php if(!empty($v2_slider_repeater_one['slider_background_image']['url'])): ?> style="background-image:url(<?php echo esc_url($v2_slider_repeater_one['slider_background_image']['url']); ?>)" <?php endif; ?>></div> <div class="<?php echo esc_attr($settings['container_width']); ?>"> <div class="row"> <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <div class="slider_content" <?php echo __($content_paddingscss); ?>> <?php if(!empty($v2_slider_repeater_one['small_heading_enable'] == 'yes')): ?> <h6 class="animated <?php echo esc_attr($v2_slider_repeater_one['small_heading_trans']); ?>"> <?php echo wp_kses($v2_slider_repeater_one['small_heading'] , $allowed_tags); ?> </h6> <?php endif; ?> <?php if(!empty($v2_slider_repeater_one['heading_enable'] == 'yes')): ?> <h1 class="animated <?php echo esc_attr($v2_slider_repeater_one['heading_trans']); ?>"> <?php echo wp_kses($v2_slider_repeater_one['heading'] , $allowed_tags); ?> </h1> <?php endif; ?> <?php if(!empty($v2_slider_repeater_one['description_enable'] == 'yes')): ?> <p class="animated <?php echo esc_attr($v2_slider_repeater_one['description_trans']); ?>"> <?php echo wp_kses($v2_slider_repeater_one['description'] , $allowed_tags); ?> </p> <?php endif; ?> <?php if(!empty($v2_slider_repeater_one['button'])) :?> <?php $target = $v2_slider_repeater_one['button_link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $v2_slider_repeater_one['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <div class="thm_btn animated <?php echo esc_attr($v2_slider_repeater_one['button_trans']); ?>"> <a href="<?php echo esc_url($v2_slider_repeater_one['button_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn one animated <?php echo esc_attr($v2_slider_repeater_one['button_trans']); ?>"> <?php echo esc_html($v2_slider_repeater_one['button']); ?> </a> </div> <?php endif; ?> </div> </div> </div> </div> </div> </div> <?php endforeach;?> <?php // slider styles ?> <?php else: ?> <?php // slider styles ?> <?php foreach($settings['v2_slider_repeater_two'] as $key => $v2_slider_repeater_two): $content_paddings = $v2_slider_repeater_two['content_padding']; $content_paddings = ! empty( $content_paddings ) ? "padding: $content_paddings;" : ''; $content_paddingscss = 'style="'.$content_paddings.'"'; ?> <div class="slide-item"> <div class="slide-item-content <?php echo esc_attr($v2_slider_repeater_two['content_alginment']); ?>"> <div class="image-layer" <?php if(!empty($v2_slider_repeater_two['slider_background_image']['url'])): ?> style="background-image:url(<?php echo esc_url($v2_slider_repeater_two['slider_background_image']['url']); ?>)" <?php endif; ?>></div> <div class="<?php echo esc_attr($settings['container_width']); ?>"> <div class="row"> <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <div class="slider_content" <?php echo __($content_paddingscss); ?>> <?php if(!empty($v2_slider_repeater_two['heading_enable'] == 'yes')): ?> <h1 class="animated <?php echo esc_attr($v2_slider_repeater_two['heading_trans']); ?>"> <?php echo wp_kses($v2_slider_repeater_two['heading'] , $allowed_tags); ?> </h1> <?php endif; ?> <?php if(!empty($v2_slider_repeater_two['description_enable'] == 'yes')): ?> <p class="animated <?php echo esc_attr($v2_slider_repeater_two['description_trans']); ?>"> <?php echo wp_kses($v2_slider_repeater_two['description'] , $allowed_tags); ?> </p> <?php endif; ?> <?php if($v2_slider_repeater_two['button_enable'] == 'yes'): ?> <div class="thm_btn animated <?php echo esc_attr($v2_slider_repeater_two['button_trans']); ?>"> <?php if(!empty($v2_slider_repeater_two['button'])) :?> <?php $target = $v2_slider_repeater_two['button_link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $v2_slider_repeater_two['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <a href="<?php echo esc_url($v2_slider_repeater_two['button_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn one animated <?php echo esc_attr($v2_slider_repeater_two['button_trans']); ?>"> <?php echo esc_html($v2_slider_repeater_two['button']); ?> </a> <?php endif; ?> <?php if(!empty($v2_slider_repeater_two['button_two'])) :?> <?php $target_two = $v2_slider_repeater_two['button_link_two']['is_external'] ? ' target="_blank"' : ''; $nofollow_two = $v2_slider_repeater_two['button_link_two']['nofollow'] ? ' rel="nofollow"' : ''; ?> <a href="<?php echo esc_url($v2_slider_repeater_two['button_link_two']['url']); ?>" <?php echo esc_attr($target_two); ?> <?php echo esc_attr($nofollow_two); ?> class="theme-btn two animated <?php echo esc_attr($v2_slider_repeater_two['button_trans']); ?>"> <?php echo esc_html($v2_slider_repeater_two['button_two']); ?> </a> <?php endif; ?> </div> <?php endif; ?> </div> </div> </div> </div> </div> </div> <?php endforeach;?> <?php // slider styles ?> <?php endif; ?> <?php // slider styles ?> </div></section>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_slider_v2());