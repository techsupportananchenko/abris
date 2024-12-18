<?php
add_action( 'vc_before_init', 'vc_slider_v2_vcmap' );
function vc_slider_v2_vcmap() {
 vc_map( array(
  "name" => __( "Slider V2", "creote-addons" ),
  "base" => "vc_slider_v2_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Slider", "creote-addons"),
  "params" => array(
    array(
        'type' => 'param_group',
        'heading' => esc_html__('Slider Content', 'creote-addons') ,
        'value' => '',
        'param_name' => 'slider_repeater',
        'params' => array(
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__( 'Content Alignment', 'creote-addons' ),
                'param_name' => 'content_alginment',
                'value'      => array(
                    esc_html__('content Left', 'creote-addons')  => 'content_left',
                    esc_html__('content Right', 'creote-addons')  => 'content_right', 
                 ),
             ),
             array(
                "type" => "textfield",
                "class" => "",
                "heading" => __( "Heading", "creote-addons" ),
                "param_name" => "heading",
                "value" => __( "Inspired <br>  Performance", "creote-addons" ),
             ),
             array(
                'type' => 'dropdown',
                'heading' => esc_html__('Heading Transition ', 'creote-addons') ,
                'param_name' => 'heading_trans',
                'value' => array(
                  esc_html__( 'Bounce', 'creote-addons' ) =>  '_bounce'  ,
                  esc_html__( 'Bounce In Down', 'creote-addons' ) =>  '_bounceInDown'  ,
                  esc_html__( 'Bounce In Left', 'creote-addons' ) =>  '_bounceInLeft'  ,
                  esc_html__( 'Bounce In Right', 'creote-addons' ) =>  '_bounceInRight'  ,
                  esc_html__( 'Bounce In Up', 'creote-addons' ) => '_bounceInUp'  ,
                  esc_html__( 'Fade In', 'creote-addons' ) =>  '_fadeIn' ,
                  esc_html__( 'Fade In Down', 'creote-addons' ) =>  '_fadeInDown'  ,
                  esc_html__( 'Fade In Down Big', 'creote-addons' ) =>  '_fadeInDownBig' ,
                  esc_html__( 'Fade In Left', 'creote-addons' ) => '_FadeInLeft'  ,
                  esc_html__( 'Fade In Left Big', 'creote-addons' ) => '_FadeInLeftBig'  ,
                  esc_html__( 'Fade In Right', 'creote-addons' ) =>  '_FadeInRight' ,
                  esc_html__( 'Fade In Right Big', 'creote-addons' ) => '_FadeInRightBig'  ,
                  esc_html__( 'Fade In Up', 'creote-addons' ) =>   '_FadeInUp' ,
                  esc_html__( 'Fade In Up Big', 'creote-addons' ) =>  '_FadeInUpBig' ,
                  esc_html__( 'Fade In Top Right', 'creote-addons' ) =>  '_fadeInTopLeft' ,
                  esc_html__( 'Fade In Top Right', 'creote-addons' ) =>  '_fadeInTopRight'  ,
                  esc_html__( 'Fade In Bottom Right', 'creote-addons' ) => '_fadeInBottomLeft'  ,
                  esc_html__( 'Fade In Bottom Right', 'creote-addons' ) => '_fadeInBottomRight'  ,
                  esc_html__( 'Flip', 'creote-addons' ) =>  '_flip'  ,
                  esc_html__( 'flip In X', 'creote-addons' ) => '_flipInX'  ,
                  esc_html__( 'flip In Y', 'creote-addons' ) => '_flipInY'  ,
                  esc_html__( 'flip Out X', 'creote-addons' ) =>  '_flipOutX' ,
                  esc_html__( 'flip Out Y', 'creote-addons' ) =>   '_flipOutY' ,
                  esc_html__( 'light Speed In Right', 'creote-addons' ) =>  '_lightSpeedInRight' ,
                  esc_html__( 'light Speed In Left', 'creote-addons' ) => '_lightSpeedInLeft'  ,
                  esc_html__( 'light Speed Out tRight', 'creote-addons' ) =>  '_lightSpeedOutRight' ,
                  esc_html__( 'light Speed Out Left', 'creote-addons' ) =>   '_lightSpeedOutLeft' ,
                  esc_html__( 'Rotate In ', 'creote-addons' ) =>    '_rotateIn'  ,
                  esc_html__( 'Rotate In Down Right', 'creote-addons' ) => '_rotateInDownRight'  ,
                  esc_html__( 'Rotate In Down Left', 'creote-addons' ) =>   '_rotateInDownLeft' ,
                  esc_html__( 'Rotate In Up Right', 'creote-addons' ) =>  '_rotateInUpRight' ,
                  esc_html__( 'Rotate In Up Left', 'creote-addons' ) => '_rotateInUpLeft'  ,
                  esc_html__( 'Zoom In ', 'creote-addons' ) =>  '_zoomIn' ,
                  esc_html__( 'Zoom In  Right', 'creote-addons' ) =>  '_zoomInRight' ,
                  esc_html__( 'Zoom In  Left', 'creote-addons' ) =>  '_zoomInLeft' ,
                  esc_html__( 'Zoom In Dowm ', 'creote-addons' ) => '_zoomInDown'  ,
                  esc_html__( 'Zoom In Up ', 'creote-addons' ) =>  '_zoomInUp' ,
                  esc_html__( 'Slide In  Right', 'creote-addons' ) => '_slideInRight'  ,
                  esc_html__( 'Slide In  Left', 'creote-addons' ) =>  '_slideInLeft' ,
                  esc_html__( 'Slide In Dowm ', 'creote-addons' ) =>  '_slideInDown'  ,
                  esc_html__( 'Slide In Up ', 'creote-addons' ) =>  '_slideInUp' ,
                  esc_html__( 'Back In Down', 'creote-addons' ) => '_backInDown'  ,
                  esc_html__( 'Back In Left', 'creote-addons' ) => '_backInLeft'   ,
                  esc_html__( 'Back In Right', 'creote-addons' ) => '_backInRight' ,
                  esc_html__( 'Back In Up', 'creote-addons' ) =>  '_backInUp' 
                ) ,
             ),
             array(
                "type" => "textfield",
                "class" => "",
                "heading" => __( "Description", "creote-addons" ),
                "param_name" => "description",
                "value" => __( "Inspired <br>  Performance", "creote-addons" ),
             ),
             array(
                'type' => 'dropdown',
                'heading' => esc_html__('Description Transition ', 'creote-addons') ,
                'param_name' => 'description_trans',
                'value' => array(
                  esc_html__( 'Bounce', 'creote-addons' ) =>  '_bounce'  ,
                  esc_html__( 'Bounce In Down', 'creote-addons' ) =>  '_bounceInDown'  ,
                  esc_html__( 'Bounce In Left', 'creote-addons' ) =>  '_bounceInLeft'  ,
                  esc_html__( 'Bounce In Right', 'creote-addons' ) =>  '_bounceInRight'  ,
                  esc_html__( 'Bounce In Up', 'creote-addons' ) => '_bounceInUp'  ,
                  esc_html__( 'Fade In', 'creote-addons' ) =>  '_fadeIn' ,
                  esc_html__( 'Fade In Down', 'creote-addons' ) =>  '_fadeInDown'  ,
                  esc_html__( 'Fade In Down Big', 'creote-addons' ) =>  '_fadeInDownBig' ,
                  esc_html__( 'Fade In Left', 'creote-addons' ) => '_FadeInLeft'  ,
                  esc_html__( 'Fade In Left Big', 'creote-addons' ) => '_FadeInLeftBig'  ,
                  esc_html__( 'Fade In Right', 'creote-addons' ) =>  '_FadeInRight' ,
                  esc_html__( 'Fade In Right Big', 'creote-addons' ) => '_FadeInRightBig'  ,
                  esc_html__( 'Fade In Up', 'creote-addons' ) =>   '_FadeInUp' ,
                  esc_html__( 'Fade In Up Big', 'creote-addons' ) =>  '_FadeInUpBig' ,
                  esc_html__( 'Fade In Top Right', 'creote-addons' ) =>  '_fadeInTopLeft' ,
                  esc_html__( 'Fade In Top Right', 'creote-addons' ) =>  '_fadeInTopRight'  ,
                  esc_html__( 'Fade In Bottom Right', 'creote-addons' ) => '_fadeInBottomLeft'  ,
                  esc_html__( 'Fade In Bottom Right', 'creote-addons' ) => '_fadeInBottomRight'  ,
                  esc_html__( 'Flip', 'creote-addons' ) =>  '_flip'  ,
                  esc_html__( 'flip In X', 'creote-addons' ) => '_flipInX'  ,
                  esc_html__( 'flip In Y', 'creote-addons' ) => '_flipInY'  ,
                  esc_html__( 'flip Out X', 'creote-addons' ) =>  '_flipOutX' ,
                  esc_html__( 'flip Out Y', 'creote-addons' ) =>   '_flipOutY' ,
                  esc_html__( 'light Speed In Right', 'creote-addons' ) =>  '_lightSpeedInRight' ,
                  esc_html__( 'light Speed In Left', 'creote-addons' ) => '_lightSpeedInLeft'  ,
                  esc_html__( 'light Speed Out tRight', 'creote-addons' ) =>  '_lightSpeedOutRight' ,
                  esc_html__( 'light Speed Out Left', 'creote-addons' ) =>   '_lightSpeedOutLeft' ,
                  esc_html__( 'Rotate In ', 'creote-addons' ) =>    '_rotateIn'  ,
                  esc_html__( 'Rotate In Down Right', 'creote-addons' ) => '_rotateInDownRight'  ,
                  esc_html__( 'Rotate In Down Left', 'creote-addons' ) =>   '_rotateInDownLeft' ,
                  esc_html__( 'Rotate In Up Right', 'creote-addons' ) =>  '_rotateInUpRight' ,
                  esc_html__( 'Rotate In Up Left', 'creote-addons' ) => '_rotateInUpLeft'  ,
                  esc_html__( 'Zoom In ', 'creote-addons' ) =>  '_zoomIn' ,
                  esc_html__( 'Zoom In  Right', 'creote-addons' ) =>  '_zoomInRight' ,
                  esc_html__( 'Zoom In  Left', 'creote-addons' ) =>  '_zoomInLeft' ,
                  esc_html__( 'Zoom In Dowm ', 'creote-addons' ) => '_zoomInDown'  ,
                  esc_html__( 'Zoom In Up ', 'creote-addons' ) =>  '_zoomInUp' ,
                  esc_html__( 'Slide In  Right', 'creote-addons' ) => '_slideInRight'  ,
                  esc_html__( 'Slide In  Left', 'creote-addons' ) =>  '_slideInLeft' ,
                  esc_html__( 'Slide In Dowm ', 'creote-addons' ) =>  '_slideInDown'  ,
                  esc_html__( 'Slide In Up ', 'creote-addons' ) =>  '_slideInUp' ,
                  esc_html__( 'Back In Down', 'creote-addons' ) => '_backInDown'  ,
                  esc_html__( 'Back In Left', 'creote-addons' ) => '_backInLeft'   ,
                  esc_html__( 'Back In Right', 'creote-addons' ) => '_backInRight' ,
                  esc_html__( 'Back In Up', 'creote-addons' ) =>  '_backInUp' 
                ) ,
             ),
             array(
                "type" => "textfield",
                "class" => "",
                "heading" => __( "Description", "creote-addons" ),
                "param_name" => "description",
                "value" => __( "Inspired <br>  Performance", "creote-addons" ),
             ),
             array(
                'type' => 'dropdown',
                'heading' => esc_html__('Description Transition ', 'creote-addons') ,
                'param_name' => 'description_trans',
                'value' => array(
                  esc_html__( 'Bounce', 'creote-addons' ) =>  '_bounce'  ,
                  esc_html__( 'Bounce In Down', 'creote-addons' ) =>  '_bounceInDown'  ,
                  esc_html__( 'Bounce In Left', 'creote-addons' ) =>  '_bounceInLeft'  ,
                  esc_html__( 'Bounce In Right', 'creote-addons' ) =>  '_bounceInRight'  ,
                  esc_html__( 'Bounce In Up', 'creote-addons' ) => '_bounceInUp'  ,
                  esc_html__( 'Fade In', 'creote-addons' ) =>  '_fadeIn' ,
                  esc_html__( 'Fade In Down', 'creote-addons' ) =>  '_fadeInDown'  ,
                  esc_html__( 'Fade In Down Big', 'creote-addons' ) =>  '_fadeInDownBig' ,
                  esc_html__( 'Fade In Left', 'creote-addons' ) => '_FadeInLeft'  ,
                  esc_html__( 'Fade In Left Big', 'creote-addons' ) => '_FadeInLeftBig'  ,
                  esc_html__( 'Fade In Right', 'creote-addons' ) =>  '_FadeInRight' ,
                  esc_html__( 'Fade In Right Big', 'creote-addons' ) => '_FadeInRightBig'  ,
                  esc_html__( 'Fade In Up', 'creote-addons' ) =>   '_FadeInUp' ,
                  esc_html__( 'Fade In Up Big', 'creote-addons' ) =>  '_FadeInUpBig' ,
                  esc_html__( 'Fade In Top Right', 'creote-addons' ) =>  '_fadeInTopLeft' ,
                  esc_html__( 'Fade In Top Right', 'creote-addons' ) =>  '_fadeInTopRight'  ,
                  esc_html__( 'Fade In Bottom Right', 'creote-addons' ) => '_fadeInBottomLeft'  ,
                  esc_html__( 'Fade In Bottom Right', 'creote-addons' ) => '_fadeInBottomRight'  ,
                  esc_html__( 'Flip', 'creote-addons' ) =>  '_flip'  ,
                  esc_html__( 'flip In X', 'creote-addons' ) => '_flipInX'  ,
                  esc_html__( 'flip In Y', 'creote-addons' ) => '_flipInY'  ,
                  esc_html__( 'flip Out X', 'creote-addons' ) =>  '_flipOutX' ,
                  esc_html__( 'flip Out Y', 'creote-addons' ) =>   '_flipOutY' ,
                  esc_html__( 'light Speed In Right', 'creote-addons' ) =>  '_lightSpeedInRight' ,
                  esc_html__( 'light Speed In Left', 'creote-addons' ) => '_lightSpeedInLeft'  ,
                  esc_html__( 'light Speed Out tRight', 'creote-addons' ) =>  '_lightSpeedOutRight' ,
                  esc_html__( 'light Speed Out Left', 'creote-addons' ) =>   '_lightSpeedOutLeft' ,
                  esc_html__( 'Rotate In ', 'creote-addons' ) =>    '_rotateIn'  ,
                  esc_html__( 'Rotate In Down Right', 'creote-addons' ) => '_rotateInDownRight'  ,
                  esc_html__( 'Rotate In Down Left', 'creote-addons' ) =>   '_rotateInDownLeft' ,
                  esc_html__( 'Rotate In Up Right', 'creote-addons' ) =>  '_rotateInUpRight' ,
                  esc_html__( 'Rotate In Up Left', 'creote-addons' ) => '_rotateInUpLeft'  ,
                  esc_html__( 'Zoom In ', 'creote-addons' ) =>  '_zoomIn' ,
                  esc_html__( 'Zoom In  Right', 'creote-addons' ) =>  '_zoomInRight' ,
                  esc_html__( 'Zoom In  Left', 'creote-addons' ) =>  '_zoomInLeft' ,
                  esc_html__( 'Zoom In Dowm ', 'creote-addons' ) => '_zoomInDown'  ,
                  esc_html__( 'Zoom In Up ', 'creote-addons' ) =>  '_zoomInUp' ,
                  esc_html__( 'Slide In  Right', 'creote-addons' ) => '_slideInRight'  ,
                  esc_html__( 'Slide In  Left', 'creote-addons' ) =>  '_slideInLeft' ,
                  esc_html__( 'Slide In Dowm ', 'creote-addons' ) =>  '_slideInDown'  ,
                  esc_html__( 'Slide In Up ', 'creote-addons' ) =>  '_slideInUp' ,
                  esc_html__( 'Back In Down', 'creote-addons' ) => '_backInDown'  ,
                  esc_html__( 'Back In Left', 'creote-addons' ) => '_backInLeft'   ,
                  esc_html__( 'Back In Right', 'creote-addons' ) => '_backInRight' ,
                  esc_html__( 'Back In Up', 'creote-addons' ) =>  '_backInUp' 
                ) ,
             ),
             array(
                "type" => "textfield",
                "class" => "",
                "heading" => __( "Button Text", "creote-addons" ),
                "param_name" => "button",
                "value" => __( "Contact us", "creote-addons" ),
             ),
             array(
                'type' => 'vc_link',
                'heading' => esc_html__('Button Link', 'creote-addons') ,
                'param_name' => 'button_link',
                'value' => '#',
            ) ,
             array(
                'type' => 'dropdown',
                'heading' => esc_html__('Button Transition ', 'creote-addons') ,
                'param_name' => 'button_trans',
                'value' => array(
                  esc_html__( 'Bounce', 'creote-addons' ) =>  '_bounce'  ,
                  esc_html__( 'Bounce In Down', 'creote-addons' ) =>  '_bounceInDown'  ,
                  esc_html__( 'Bounce In Left', 'creote-addons' ) =>  '_bounceInLeft'  ,
                  esc_html__( 'Bounce In Right', 'creote-addons' ) =>  '_bounceInRight'  ,
                  esc_html__( 'Bounce In Up', 'creote-addons' ) => '_bounceInUp'  ,
                  esc_html__( 'Fade In', 'creote-addons' ) =>  '_fadeIn' ,
                  esc_html__( 'Fade In Down', 'creote-addons' ) =>  '_fadeInDown'  ,
                  esc_html__( 'Fade In Down Big', 'creote-addons' ) =>  '_fadeInDownBig' ,
                  esc_html__( 'Fade In Left', 'creote-addons' ) => '_FadeInLeft'  ,
                  esc_html__( 'Fade In Left Big', 'creote-addons' ) => '_FadeInLeftBig'  ,
                  esc_html__( 'Fade In Right', 'creote-addons' ) =>  '_FadeInRight' ,
                  esc_html__( 'Fade In Right Big', 'creote-addons' ) => '_FadeInRightBig'  ,
                  esc_html__( 'Fade In Up', 'creote-addons' ) =>   '_FadeInUp' ,
                  esc_html__( 'Fade In Up Big', 'creote-addons' ) =>  '_FadeInUpBig' ,
                  esc_html__( 'Fade In Top Right', 'creote-addons' ) =>  '_fadeInTopLeft' ,
                  esc_html__( 'Fade In Top Right', 'creote-addons' ) =>  '_fadeInTopRight'  ,
                  esc_html__( 'Fade In Bottom Right', 'creote-addons' ) => '_fadeInBottomLeft'  ,
                  esc_html__( 'Fade In Bottom Right', 'creote-addons' ) => '_fadeInBottomRight'  ,
                  esc_html__( 'Flip', 'creote-addons' ) =>  '_flip'  ,
                  esc_html__( 'flip In X', 'creote-addons' ) => '_flipInX'  ,
                  esc_html__( 'flip In Y', 'creote-addons' ) => '_flipInY'  ,
                  esc_html__( 'flip Out X', 'creote-addons' ) =>  '_flipOutX' ,
                  esc_html__( 'flip Out Y', 'creote-addons' ) =>   '_flipOutY' ,
                  esc_html__( 'light Speed In Right', 'creote-addons' ) =>  '_lightSpeedInRight' ,
                  esc_html__( 'light Speed In Left', 'creote-addons' ) => '_lightSpeedInLeft'  ,
                  esc_html__( 'light Speed Out tRight', 'creote-addons' ) =>  '_lightSpeedOutRight' ,
                  esc_html__( 'light Speed Out Left', 'creote-addons' ) =>   '_lightSpeedOutLeft' ,
                  esc_html__( 'Rotate In ', 'creote-addons' ) =>    '_rotateIn'  ,
                  esc_html__( 'Rotate In Down Right', 'creote-addons' ) => '_rotateInDownRight'  ,
                  esc_html__( 'Rotate In Down Left', 'creote-addons' ) =>   '_rotateInDownLeft' ,
                  esc_html__( 'Rotate In Up Right', 'creote-addons' ) =>  '_rotateInUpRight' ,
                  esc_html__( 'Rotate In Up Left', 'creote-addons' ) => '_rotateInUpLeft'  ,
                  esc_html__( 'Zoom In ', 'creote-addons' ) =>  '_zoomIn' ,
                  esc_html__( 'Zoom In  Right', 'creote-addons' ) =>  '_zoomInRight' ,
                  esc_html__( 'Zoom In  Left', 'creote-addons' ) =>  '_zoomInLeft' ,
                  esc_html__( 'Zoom In Dowm ', 'creote-addons' ) => '_zoomInDown'  ,
                  esc_html__( 'Zoom In Up ', 'creote-addons' ) =>  '_zoomInUp' ,
                  esc_html__( 'Slide In  Right', 'creote-addons' ) => '_slideInRight'  ,
                  esc_html__( 'Slide In  Left', 'creote-addons' ) =>  '_slideInLeft' ,
                  esc_html__( 'Slide In Dowm ', 'creote-addons' ) =>  '_slideInDown'  ,
                  esc_html__( 'Slide In Up ', 'creote-addons' ) =>  '_slideInUp' ,
                  esc_html__( 'Back In Down', 'creote-addons' ) => '_backInDown'  ,
                  esc_html__( 'Back In Left', 'creote-addons' ) => '_backInLeft'   ,
                  esc_html__( 'Back In Right', 'creote-addons' ) => '_backInRight' ,
                  esc_html__( 'Back In Up', 'creote-addons' ) =>  '_backInUp' 
                ) ,
             ),
             array(
                'type' => 'attach_image',
                'heading' => esc_html__('Slider Image', 'creote-addons') ,
                'param_name' => 'slider_image',
                'value' => '',
             ),
             array(
                'type' => 'textfield',
                'heading' => esc_html__('Image Margin', 'creote-addons') ,
                'param_name' => 'image_margin',
                'value' => '0px 0px 0px 0px',
                "description" => __( "This text field for Banner  margin to move image Eg(20px 20px 10rem 10em)", "creote-addons" ),
             ),
             array(
                'type' => 'dropdown',
                'heading' => esc_html__('Image Transition ', 'creote-addons') ,
                'param_name' => 'image_trans',
                'value' => array(
                  esc_html__( 'Bounce', 'creote-addons' ) =>  '_bounce'  ,
                  esc_html__( 'Bounce In Down', 'creote-addons' ) =>  '_bounceInDown'  ,
                  esc_html__( 'Bounce In Left', 'creote-addons' ) =>  '_bounceInLeft'  ,
                  esc_html__( 'Bounce In Right', 'creote-addons' ) =>  '_bounceInRight'  ,
                  esc_html__( 'Bounce In Up', 'creote-addons' ) => '_bounceInUp'  ,
                  esc_html__( 'Fade In', 'creote-addons' ) =>  '_fadeIn' ,
                  esc_html__( 'Fade In Down', 'creote-addons' ) =>  '_fadeInDown'  ,
                  esc_html__( 'Fade In Down Big', 'creote-addons' ) =>  '_fadeInDownBig' ,
                  esc_html__( 'Fade In Left', 'creote-addons' ) => '_FadeInLeft'  ,
                  esc_html__( 'Fade In Left Big', 'creote-addons' ) => '_FadeInLeftBig'  ,
                  esc_html__( 'Fade In Right', 'creote-addons' ) =>  '_FadeInRight' ,
                  esc_html__( 'Fade In Right Big', 'creote-addons' ) => '_FadeInRightBig'  ,
                  esc_html__( 'Fade In Up', 'creote-addons' ) =>   '_FadeInUp' ,
                  esc_html__( 'Fade In Up Big', 'creote-addons' ) =>  '_FadeInUpBig' ,
                  esc_html__( 'Fade In Top Right', 'creote-addons' ) =>  '_fadeInTopLeft' ,
                  esc_html__( 'Fade In Top Right', 'creote-addons' ) =>  '_fadeInTopRight'  ,
                  esc_html__( 'Fade In Bottom Right', 'creote-addons' ) => '_fadeInBottomLeft'  ,
                  esc_html__( 'Fade In Bottom Right', 'creote-addons' ) => '_fadeInBottomRight'  ,
                  esc_html__( 'Flip', 'creote-addons' ) =>  '_flip'  ,
                  esc_html__( 'flip In X', 'creote-addons' ) => '_flipInX'  ,
                  esc_html__( 'flip In Y', 'creote-addons' ) => '_flipInY'  ,
                  esc_html__( 'flip Out X', 'creote-addons' ) =>  '_flipOutX' ,
                  esc_html__( 'flip Out Y', 'creote-addons' ) =>   '_flipOutY' ,
                  esc_html__( 'light Speed In Right', 'creote-addons' ) =>  '_lightSpeedInRight' ,
                  esc_html__( 'light Speed In Left', 'creote-addons' ) => '_lightSpeedInLeft'  ,
                  esc_html__( 'light Speed Out tRight', 'creote-addons' ) =>  '_lightSpeedOutRight' ,
                  esc_html__( 'light Speed Out Left', 'creote-addons' ) =>   '_lightSpeedOutLeft' ,
                  esc_html__( 'Rotate In ', 'creote-addons' ) =>    '_rotateIn'  ,
                  esc_html__( 'Rotate In Down Right', 'creote-addons' ) => '_rotateInDownRight'  ,
                  esc_html__( 'Rotate In Down Left', 'creote-addons' ) =>   '_rotateInDownLeft' ,
                  esc_html__( 'Rotate In Up Right', 'creote-addons' ) =>  '_rotateInUpRight' ,
                  esc_html__( 'Rotate In Up Left', 'creote-addons' ) => '_rotateInUpLeft'  ,
                  esc_html__( 'Zoom In ', 'creote-addons' ) =>  '_zoomIn' ,
                  esc_html__( 'Zoom In  Right', 'creote-addons' ) =>  '_zoomInRight' ,
                  esc_html__( 'Zoom In  Left', 'creote-addons' ) =>  '_zoomInLeft' ,
                  esc_html__( 'Zoom In Dowm ', 'creote-addons' ) => '_zoomInDown'  ,
                  esc_html__( 'Zoom In Up ', 'creote-addons' ) =>  '_zoomInUp' ,
                  esc_html__( 'Slide In  Right', 'creote-addons' ) => '_slideInRight'  ,
                  esc_html__( 'Slide In  Left', 'creote-addons' ) =>  '_slideInLeft' ,
                  esc_html__( 'Slide In Dowm ', 'creote-addons' ) =>  '_slideInDown'  ,
                  esc_html__( 'Slide In Up ', 'creote-addons' ) =>  '_slideInUp' ,
                  esc_html__( 'Back In Down', 'creote-addons' ) => '_backInDown'  ,
                  esc_html__( 'Back In Left', 'creote-addons' ) => '_backInLeft'   ,
                  esc_html__( 'Back In Right', 'creote-addons' ) => '_backInRight' ,
                  esc_html__( 'Back In Up', 'creote-addons' ) =>  '_backInUp' 
                ) ,
             ),
             array(
                'type' => 'attach_image',
                'heading' => esc_html__('Background Image', 'creote-addons') ,
                'param_name' => 'slider_background_image',
                'value' => '',
             ),
             array(
                'type' => 'textfield',
                'heading' => esc_html__('Content Padding', 'creote-addons') ,
                'param_name' => 'content_paddingss',
                'value' => '0px 0px 0px 0px',
                "description" => __( "This text field for Banner  Content Padding  Eg(20px 20px 10rem 10em)", "creote-addons" ),
             ), 
            ),
        'group'      => esc_html__( 'Slider Content', 'creote-addons' ),
        ),
   array(
      'type' => 'colorpicker',
      'heading' => esc_html__('Heading Color', 'creote-addons') ,
      'param_name' => 'heading_color',
      'value' => '',
      'group' => esc_html__('Css', 'creote-addons'),
   ),
   array(
    'type' => 'colorpicker',
    'heading' => esc_html__('Description Color', 'creote-addons') ,
    'param_name' => 'description_color',
    'value' => '',
    'group' => esc_html__('Css', 'creote-addons'),
   ),
   array(
    'type'        => 'checkbox',
    'heading'     => esc_html__( 'Navigation Enable', 'creote-addons' ), 
    'param_name'  => 'navigation_enable',
    'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
    'group' => esc_html__('Navigation / Pagination Css', 'creote-addons'),
   ),
   array(
    'type'       => 'dropdown',
    'heading'    => esc_html__( 'Navigation Position', 'creote-addons' ),
    'param_name' => 'nav_positions',
    'value'      => array(
        esc_html__('Nav Position One', 'creote-addons')  => 'nav_position_one',
        esc_html__('Nav Position two', 'creote-addons')  => 'nav_position_two', 
     ),
     'dependency'  => array(
        'element' => 'navigation_enable',
        'value'   => 'yes',
      ),
     'group' => esc_html__('Navigation / Pagination Css', 'creote-addons'),
   ),
   array(
    'type'        => 'checkbox',
    'heading'     => esc_html__( 'Pagination Enable', 'creote-addons' ), 
    'param_name'  => 'pagination_enable',
    'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
    'group' => esc_html__('Navigation / Pagination Css', 'creote-addons'),
   ),
   array(
    'type'       => 'dropdown',
    'heading'    => esc_html__( 'Pagination Position', 'creote-addons' ),
    'param_name' => 'pag_position_one',
    'value'      => array(
        esc_html__('Pagination Position One', 'creote-addons')  => 'pag_position_one',
        esc_html__('Pagination Position Two', 'creote-addons')  => 'pag_position_two', 
     ),
     'dependency'  => array(
        'element' => 'pagination_enable',
        'value'   => 'yes',
      ),
     'group' => esc_html__('Navigation / Pagination Css', 'creote-addons'),
   ),
   )
));
}
// shortcode
add_shortcode( 'vc_slider_v2_init', 'vc_single_banner_v2' );
function vc_single_banner_v2( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'slider_repeater' => '',
      'border_radius' => '',
      'heading_color' => '',
      'description_color' => '',
      'navigation_enable' => '',
      'nav_positions' => 'nav_position_one',
      'pagination_enable' => 'yes',
      'pag_positions' => 'pag_position_one',
   ), $atts
);
$slider_repeaters = function_exists( 'vc_param_group_parse_atts' ) ? vc_param_group_parse_atts( $atts['slider_repeater'] ) : array();
$headingcolor  = $atts['heading_color'];
$headingcolor    = ! empty( $headingcolor ) ? "color: $headingcolor!important;" : '';
$headingcolor_css   = "style='$headingcolor'";
$descriptioncolor  = $atts['description_color'];
$descriptioncolor    = ! empty( $descriptioncolor ) ? "color: $descriptioncolor!important;" : '';
$descriptioncolor_css   = "style='$descriptioncolor'";
$allowed_tags = wp_kses_allowed_html('post');
ob_start();
?>
<section class="slider style_two  <?php echo esc_attr($atts['nav_positions']); ?>">
        <div class="banner_style_two swiper-container">
        <div class="swiper-wrapper">
        <?php if(!empty($slider_repeaters)): foreach($slider_repeaters as $key => $slider_repeater): 
         $slider_background_image_one  = ! empty( $slider_repeater['slider_background_image'] ) ? $slider_repeater['slider_background_image'] : ''; 
           $slider_background_image = wp_get_attachment_image_src( intval( $slider_background_image_one ), 'full' );
           $slider_background_images           = $slider_background_image ? $slider_background_image[0] : '';
            $content_padding  = $slider_repeater['content_paddingss'];
            $content_padding    = ! empty( $content_padding ) ? "padding: $content_padding!important;" : '';
            $content_paddingscss   = "style='$content_padding'";
            $image_margin  = $slider_repeater['image_margin'];
            $image_margin    = ! empty( $image_margin ) ? "padding: $image_margin!important;" : '';
            $image_margincss   = "style='$image_margin'";
            $button_link_href  = '';
$button_link_target  = '';
 if (!empty( $slider_repeater['button_link'])) {
   $button_link = vc_build_link($slider_repeater['button_link']);
   $button_link_href = $button_link['url'];
   $button_link_target = $button_link['target'];
}
            ?>
          <div class="swiper-slide">
            <div class="slide-item <?php echo esc_attr($slider_repeater['content_alginment']); ?>">
                <div class="image-layer" <?php if(!empty($slider_background_images)): ?>  style="background:url(<?php echo esc_url($slider_background_images); ?>)" <?php endif; ?>></div>
                <div class="auto-container">
                    <div class="row">
                        <div class="col-md-12 col-lg-7 col-sm-12 col-xs-12">
                            <div class="slider_content" <?php echo __($content_paddingscss); ?>>
                                <?php if(!empty($slider_repeater['heading'])): ?>
                                    <h1  class="animated <?php echo esc_attr($slider_repeater['heading_trans']); ?>">
                                        <?php echo wp_kses($slider_repeater['heading'] , $allowed_tags); ?>
                                    </h1>
                                <?php endif; ?>
                                <?php if(!empty($slider_repeater['description'])): ?>
                                    <p  class="animated <?php echo esc_attr($slider_repeater['description_trans']); ?>">
                                        <?php echo wp_kses($slider_repeater['description'] , $allowed_tags); ?>
                                    </p>
                                <?php endif; ?> 
                                <ul>
                  <?php if(!empty($slider_repeater['button'])) :?>
                    <li>
                    <a href="<?php echo esc_url($button_link_href); ?>"  <?php if(!empty($button_link_target)):?> target="<?php echo esc_attr($button_link_target); ?>" <?php endif; ?>  class="theme-btn one  animated <?php echo esc_attr($slider_repeater['button_trans']); ?>">
                     <?php echo esc_html($slider_repeater['button']); ?>
                  </a>
                  </li>
                  <?php endif; ?>
                  <?php if(!empty($slider_repeater['video_link'])): ?>
                    <li>
                    <div class="video_box animated <?php echo esc_attr($slider_repeater['video_trans']); ?>">
                       <a href="<?php echo esc_attr($slider_repeater['video_link']); ?>" class="lightbox-image"><i class="icon-play"></i></a>
                    </div>
                  </li>
                <?php endif; ?>
                  </ul>
                            </div>
                        </div> 
                        <div class="col-md-12 col-lg-5 col-sm-12 col-xs-12 image_column">
                            <?php
                             if(!empty($slider_repeater['slider_image'])):
                             $attachment_image_one = wp_get_attachment_image_src(intval( $slider_repeater['slider_image']), 'full' );
                             $ban_one_image_one           = $attachment_image_one ? $attachment_image_one[0] : '';
                            ?>
                        <div class="slider_image <?php echo esc_attr($slider_repeater['image_trans']); ?>"   <?php echo __($image_margincss); ?>>
                        <img src="<?php  echo esc_url($ban_one_image_one);  ?>" class="img-fluid" alt="<?php esc_attr_e('slider image', 'creote-addons'); ?>" />
                        </div>
                    <?php endif; ?>  
                        </div>
                    </div>
                </div>
          </div>
     </div>
     <?php endforeach; endif;?>
  </div>  
    <?php if($atts['navigation_enable'] == 'yes'): ?>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    <?php endif; ?>
</section>
 <?php
 return ob_get_clean();
 }
