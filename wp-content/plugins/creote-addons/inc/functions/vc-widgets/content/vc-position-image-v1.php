<?php
add_action( 'vc_before_init', 'vc_moving_image_vcmap' );
function vc_moving_image_vcmap() {
 vc_map( array(
  "name" => __( "Moving Image V1", "creote-addons" ),
  "base" => "vc_moving_image_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
    'type'       => 'dropdown',
    'heading'    => esc_html__( 'Image Types', 'creote-addons' ),
    'param_name' => 'image_types',
    'value'      => array(
        esc_html__( 'Style One', 'creote-addons' )  => 'style_one',
    ),
    'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'attach_image',
        'heading' => esc_html__('Image', 'creote-addons') ,
        'param_name' => 'image',
        'value' => '',
        'group' => esc_html__('General', 'creote-addons') ,
     ),
     array(
        'type' => 'textarea',
        'heading' => esc_html__('Image Width', 'creote-addons') ,
        'param_name' => 'width',
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Image Height', 'creote-addons') ,
        'param_name' => 'height',
        'group' => esc_html__('General', 'creote-addons') ,
    ),
     array(
      'type'        => 'checkbox',
      'heading'     => esc_html__( 'Top Enable / Disable', 'creote-addons' ),
      'param_name'  => 'top_enable',
      'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
      'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Move Top', 'creote-addons') ,
        'param_name' => 'top',
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'top_enable',
            'value'   => 'yes',
          ),
    ),
    array(
        'type'        => 'checkbox',
        'heading'     => esc_html__( 'Left Enable / Disable', 'creote-addons' ),
        'param_name'  => 'left_enable',
        'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
        'group' => esc_html__('General', 'creote-addons') ,
      ),
      array(
          'type' => 'textfield',
          'heading' => esc_html__('Move Left', 'creote-addons') ,
          'param_name' => 'left',
          'group' => esc_html__('General', 'creote-addons') ,
          'dependency'  => array(
              'element' => 'left_enable',
              'value'   => 'yes',
            ),
      ),
      array(
        'type'        => 'checkbox',
        'heading'     => esc_html__( 'Right Enable / Disable', 'creote-addons' ),
        'param_name'  => 'right_enable',
        'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
        'group' => esc_html__('General', 'creote-addons') ,
      ),
      array(
          'type' => 'textfield',
          'heading' => esc_html__('Move Right', 'creote-addons') ,
          'param_name' => 'right',
          'group' => esc_html__('General', 'creote-addons') ,
          'dependency'  => array(
              'element' => 'right_enable',
              'value'   => 'yes',
            ),
      ),
      array(
        'type'        => 'checkbox',
        'heading'     => esc_html__( 'Bottom Enable / Disable', 'creote-addons' ),
        'param_name'  => 'bottom_enable',
        'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
        'group' => esc_html__('General', 'creote-addons') ,
      ),
      array(
          'type' => 'textfield',
          'heading' => esc_html__('Move Bottom', 'creote-addons') ,
          'param_name' => 'bottom',
          'group' => esc_html__('General', 'creote-addons') ,
          'dependency'  => array(
              'element' => 'bottom_enable',
              'value'   => 'yes',
            ),
      ),
)));
}
// shortcode
add_shortcode( 'vc_moving_image_init', 'vc_moving_image' );
function vc_moving_image( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'image_types' => 'style_one',
      'image' => '' , 
      'width' => '500px',
      'height' => '500px',
      'top_enable' => '',
      'top' => '0px',
      'left_enable' => '',
      'left' => '0px',
      'right_enable' => '',
      'right' => '',
      'bottom_enable' => '',
      'bottom' => '',
   ), $atts
);
$left = '';
$right = '';
$top = '';
$bottom = '';
$width  = $atts['width'];
$width    = ! empty( $width ) ? "width: $width!important;" : '';
$height  = $atts['height'];
$height    = ! empty( $height ) ? "height: $height!important;" : '';
$imagedimension   = "style='$width $height'";
if($atts['top_enable'] == 'yes'):
$top  = $atts['top'];
$top    = !empty($top) ? "top: $top!important;" : '';
endif;
if($atts['left_enable'] == 'yes'):
$left  = $atts['left'];
$left    = !empty($left) ? "left: $left!important;" : '';
endif;
if($atts['right_enable'] == 'yes'):
$right  = $atts['right'];
$right    = !empty($right) ? "right: $right!important;" : '';
endif;
if($atts['bottom_enable'] == 'yes'):
$bottom  = $atts['bottom'];
$bottom    = !empty($bottom) ? "bottom: $bottom!important;" : '';
endif;
$move_image   = "style='$top $left $right $bottom $height $width'";
$allowed_tags = wp_kses_allowed_html('post');
$image_types = $atts['image_types'];
$attachment_image_one = wp_get_attachment_image_src( intval( $atts['image'] ), 'full' );
$image           = $attachment_image_one ? $attachment_image_one[0] : '';
ob_start();
?>
<?php if($image_types == 'style_one'): ?>
    <div class="move_image_absolute" <?php echo __($move_image ); ?>>    
        <?php if(!empty($image)): ?>
            <img src="<?php echo esc_url($image); ?>" class="class-fluid" alt="image" <?php echo __($imagedimension); ?> />
        <?php endif; ?>
    </div>
    <?php endif; ?>
<?php
return ob_get_clean();
}
