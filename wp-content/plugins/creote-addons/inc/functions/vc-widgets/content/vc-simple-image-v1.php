<?php
add_action( 'vc_before_init', 'vc_simple_image_box_v1_vcmap' );
function vc_simple_image_box_v1_vcmap() {
 vc_map( array(
  "name" => __( "Simple Image V1", "creote-addons" ),
  "base" => "vc_simple_image_box_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
      array(
        'type' => 'attach_image',
        'heading' => esc_html__('Image', 'creote-addons') ,
        'param_name' => 'image',
        'group' => esc_html__('General', 'creote-addons') ,
     ),
     array(
        'type'        => 'checkbox',
        'heading'     => esc_html__( 'Parallax Enable / Disable', 'creote-addons' ),
        'param_name'  => 'parallax_enable',
        'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
        'group' => esc_html__('General', 'creote-addons') ,
      ),
     array(
        'type' => 'textfield',
        'heading' => esc_html__('Image', 'creote-addons') ,
        'param_name' => 'img_height',
        'value' => esc_html__('400px', 'creote-addons') ,
        'description' => esc_html__('you Can set the image height here eg: (100px , 10rem  or 10rem) like this', 'creote-addons'),
        'group' => esc_html__('General', 'creote-addons') ,
     ),
     array(
        'type' => 'textfield',
        'heading' => esc_html__('Border Radius', 'creote-addons') ,
        'param_name' => 'border_radius',
        'value' => esc_html__('20px 20px 20px 20px', 'creote-addons') ,
        'description' => esc_html__('you Can set the image Border Radius here eg: (100px , 10%) like this', 'creote-addons'),
        'group' => esc_html__('General', 'creote-addons') ,
     ),
     array(
        'type'        => 'checkbox',
        'heading'     => esc_html__( 'Transitions Enable / Disable', 'creote-addons' ),
        'param_name'  => 'transitions_enable',
        'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
        'description' => esc_html__( 'Click Check box to use the icon Image will display in output', 'creote-addons' ),
        'group' => esc_html__('Transitions', 'creote-addons') ,
      ),
      array(
        'type'       => 'dropdown',
        'heading'    => esc_html__( 'Transitions ', 'creote-addons' ),
        'param_name' => 'transitions',
        'value'      => array(
             esc_html__('0ms', 'creote-addons')  => '0', 
             esc_html__('100ms', 'creote-addons')  => '100',
             esc_html__('200ms', 'creote-addons')  => '200',
             esc_html__('300ms', 'creote-addons')  => '300',
             esc_html__('400ms', 'creote-addons')  => '400',
             esc_html__('500ms', 'creote-addons')  => '500',
             esc_html__('600ms', 'creote-addons')  => '600',
             esc_html__('700ms', 'creote-addons') => '700',
             esc_html__('800ms', 'creote-addons') => '800',
             esc_html__('900ms', 'creote-addons') => '900',
             esc_html__('1000ms', 'creote-addons') => '1000',
        ),
        'dependency'  => array(
          'element' => 'transitions_enable',
          'value'   => 'yes',
        ),
        'group' => esc_html__('Transitions', 'creote-addons') ,
      ),
)));
}
// shortcode
add_shortcode( 'vc_simple_image_box_v1_init', 'vc_simple_image_box_v1' );
function vc_simple_image_box_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'image' => '',
      'parallax_enable' => '',
      'img_height' => '400px',
      'border_radius' => '20px 20px 20px 20px',
      'transitions' => '',
      'transitions_enable' => '',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$image = wp_get_attachment_image_src( intval( $atts['image'] ), 'full' );
$images           = $image ? $image[0] : '';
$img_height  = $atts['img_height'];
$img_height    = ! empty( $img_height ) ? "height: $img_height!important;" : '';
$border_radius  = $atts['border_radius'];
$border_radius    = ! empty( $border_radius ) ? "border-radius: $border_radius!important;" : '';
$style_css  = "style='$img_height $border_radius '";
ob_start();
?>
         <?php if(!empty($images )): ?>
            <div class="simple_image_boxes <?php if($atts['parallax_enable'] == 'yes'):  ?> parallax_cover<?php endif;?>" <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?> <?php echo __($style_css); ?> <?php __($border_radius); ?>>
                    <img src="<?php echo esc_url($images ); ?>" class="simp_img <?php if($atts['parallax_enable'] == 'yes'):  ?>cover-parallax<?php endif;?>" alt="image"  <?php echo __($style_css); ?> />
            </div>
            <?php endif; ?>
<?php
return ob_get_clean();
}
