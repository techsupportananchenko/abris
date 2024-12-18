<?php
add_action( 'vc_before_init', 'vc_client_logo_vcmap' );
function vc_client_logo_vcmap() {
 vc_map( array(
  "name" => __( "Client Logo V1", "creote-addons" ),
  "base" => "vc_client_logo_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
    'type'       => 'dropdown',
    'heading'    => esc_html__( 'Client Logo style', 'creote-addons' ),
    'param_name' => 'client_logo_style',
    'value'      => array(
        esc_html__( 'Style One', 'creote-addons' )  => 'type_one',
    ),
    'group' => esc_html__('General', 'creote-addons') ,
    ),
     array(
        'type' => 'param_group',
        'heading' => esc_html__('Client Logo Content', 'creote-addons') ,
        'value' => '',
        'param_name' => 'client_logo_repeater',
        'params' => array(
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Image', 'creote-addons') ,
                'param_name' => 'brandimage',
             ),
             array(
              'type' => 'textfield',
              'heading' => esc_html__('Image Width', 'creote-addons') ,
              'param_name' => 'img_height',
              'description' => esc_html__('you Can set the image height here eg: (100px , 10rem  or 10rem) like this', 'creote-addons'),
           ),
        ),
        'group'      => esc_html__( 'General', 'creote-addons' ),
    ),
)));
}
// shortcode
add_shortcode( 'vc_client_logo_init', 'vc_client_logo_v1' );
function vc_client_logo_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'client_logo_style' => 'type_one',
      'client_logo_repeater' => '',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$client_logo_repeaters = function_exists( 'vc_param_group_parse_atts' ) ? vc_param_group_parse_atts( $atts['client_logo_repeater'] ) : array();
ob_start();
?>
 <section class="client_logo_carousel type_one">
 <div class="logo_c-carousel theme_carousel owl-theme owl-carousel" data-options='{"loop": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": false, "dots": false, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "2" } , "1024" :{ "items" : "3" } , "1200":{ "items" : "5" }}}'>
            <?php if($atts['client_logo_style'] == 'type_one'):?>
                <?php if(!empty($client_logo_repeaters)): foreach($client_logo_repeaters as $key => $client_logo_repeater):
                $style_css  = '';
                $img_height  = '';
                if(!empty($client_logo_repeater['img_height'])):
                $img_height  = $client_logo_repeater['img_height'];
                $img_height    = ! empty($img_height ) ? "width: $img_height!important;" : '';
                $style_css  = "style='$img_height'";
                endif;
                    $brandimage = wp_get_attachment_image_src( intval( $client_logo_repeater['brandimage'] ), 'full' );
                    $image           = $brandimage ? $brandimage[0] : '';
                    ?>
                   <?php if(!empty($image)): ?>
                <div class="slide-logo-item">
                <div class="image">
                    <img src="<?php echo esc_url($image); ?>"  alt="clients-logo m-auto" <?php echo __($style_css); ?> />
               </div>
               </div>
               <?php endif; ?>
               <?php endforeach; endif;?>
            <?php endif;?>
    </section>
<?php
return ob_get_clean();
}
