<?php
add_action( 'vc_before_init', 'vc_foo_shape_v1_vcmap' );
function vc_foo_shape_v1_vcmap() {
 vc_map( array(
  "name" => __( "Shape V1", "creote-addons" ),
  "base" => "vc_foo_shape_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Shape", "creote-addons"),
  "params" => array(
    array(
        'type' => 'attach_image',
        'heading' => esc_html__(' Image', 'creote-addons') ,
        'param_name' => 'image',
        'group' => esc_html__('General', 'creote-addons'),
     ),
    array(
        'type'       => 'dropdown',
        'heading'    => esc_html__( 'Move Image', 'creote-addons' ),
        'param_name' => 'move_image',
        'value'      => array(
             esc_html__('Top Left', 'creote-addons')  => 'top_left', 
             esc_html__('Top Right', 'creote-addons')  => 'top_right',
             esc_html__('Bottom Left', 'creote-addons')  => 'bottom_left', 
             esc_html__('Bottom Right', 'creote-addons')  => 'bottom_right',
        ),
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Move Top', 'creote-addons') ,
        'param_name' => 'move_top_l_one',
        'value' => esc_html__('100px', 'creote-addons'),
        'description' => esc_html__('To Mover Top enter 100px like this', 'creote-addons'),
        'group' => esc_html__('General', 'creote-addons'),
        'dependency'  => array(
            'element' => 'move_image',
            'value'   => 'top_left',
          ),
      ),
      array(
        'type' => 'textfield',
        'heading' => esc_html__('Move Left', 'creote-addons') ,
        'param_name' => 'move_top_l_two',
        'value' => esc_html__('100px', 'creote-addons'),
        'description' => esc_html__('To Mover Left enter 100px like this', 'creote-addons'),
        'group' => esc_html__('General', 'creote-addons'),
        'dependency'  => array(
            'element' => 'move_image',
            'value'   => 'top_left',
          ),
      ),
      array(
        'type' => 'textfield',
        'heading' => esc_html__('Move Top', 'creote-addons') ,
        'param_name' => 'move_top_r_one',
        'value' => esc_html__('100px', 'creote-addons'),
        'description' => esc_html__('To Mover Top enter 100px like this', 'creote-addons'),
        'group' => esc_html__('General', 'creote-addons'),
        'dependency'  => array(
            'element' => 'move_image',
            'value'   => 'top_right',
          ),
      ),
      array(
        'type' => 'textfield',
        'heading' => esc_html__('Move Right', 'creote-addons') ,
        'param_name' => 'move_top_r_two',
        'value' => esc_html__('100px', 'creote-addons'),
        'description' => esc_html__('To Mover Right enter 100px like this', 'creote-addons'),
        'group' => esc_html__('General', 'creote-addons'),
        'dependency'  => array(
            'element' => 'move_image',
            'value'   => 'top_right',
          ),
        ),
      array(
        'type' => 'textfield',
        'heading' => esc_html__('Move Bottom', 'creote-addons') ,
        'param_name' => 'move_bottom_l_one',
        'value' => esc_html__('100px', 'creote-addons'),
        'description' => esc_html__('To Mover Bottom enter 100px like this', 'creote-addons'),
        'group' => esc_html__('General', 'creote-addons'),
        'dependency'  => array(
            'element' => 'move_image',
            'value'   => 'bottom_left',
          ),
      ),
      array(
        'type' => 'textfield',
        'heading' => esc_html__('Move Left', 'creote-addons') ,
        'param_name' => 'move_bottom_l_two',
        'value' => esc_html__('100px', 'creote-addons'),
        'description' => esc_html__('To Mover Left enter 100px like this', 'creote-addons'),
        'group' => esc_html__('General', 'creote-addons'),
        'dependency'  => array(
            'element' => 'move_image',
            'value'   => 'bottom_left',
          ),
        ),
      array(
        'type' => 'textfield',
        'heading' => esc_html__('Move Bottom', 'creote-addons') ,
        'param_name' => 'move_bottom_r_one',
        'value' => esc_html__('100px', 'creote-addons'),
        'description' => esc_html__('To Mover Bottom enter 100px like this', 'creote-addons'),
        'group' => esc_html__('General', 'creote-addons'),
        'dependency'  => array(
            'element' => 'move_image',
            'value'   => 'bottom_right',
          ),
      ),
      array(
        'type' => 'textfield',
        'heading' => esc_html__('Move Right', 'creote-addons') ,
        'param_name' => 'move_bottom_r_two',
        'value' => esc_html__('100px', 'creote-addons'),
        'description' => esc_html__('To Mover Right enter 100px like this', 'creote-addons'),
        'group' => esc_html__('General', 'creote-addons'),
        'dependency'  => array(
            'element' => 'move_image',
            'value'   => 'bottom_right',
          ),
        ),
      array(
        'type' => 'textfield',
        'heading' => esc_html__('Z Index', 'creote-addons') ,
        'param_name' => 'z_index',
        'value' => esc_html__('100px', 'creote-addons'),
        'description' => esc_html__('Z index is used to display above image over image eg(10  or 999)', 'creote-addons'),
        'group' => esc_html__('General', 'creote-addons'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Image Height', 'creote-addons') ,
            'param_name' => 'image_height',
            'value' => esc_html__('100px', 'creote-addons'),
            'group' => esc_html__('General', 'creote-addons'),
        ),
)));
}
// shortcode
add_shortcode( 'vc_foo_shape_v1_init', 'vc_foo_shape_v1' );
function vc_foo_shape_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
    'image' => '',
    'move_image' => 'top_left',
    'move_top_l_one' => '-100px',
    'move_top_l_two' => '-100px',
    'move_top_r_one' => '',
    'move_top_r_two'  => '',
    'move_bottom_l_one' => '',
    'move_bottom_l_two' => '',
    'move_bottom_r_one' => '',
    'move_bottom_r_two' => '',
    'z_index' => '99',
    'image_height'  => '',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$move_top_l_one = '';
if($atts['move_image'] == 'top_left'):
$move_top_l_one = $atts['move_top_l_one'];
$move_top_l_one    = ! empty( $move_top_l_one ) ? "top: $move_top_l_one!important;" : '';
endif;
$move_top_l_two = '';
if($atts['move_image'] == 'top_left'):
$move_top_l_two = $atts['move_top_l_two'];
$move_top_l_two    = ! empty( $move_top_l_two ) ? "left: $move_top_l_two!important;" : '';
endif;
$move_top_r_one = '';
if($atts['move_image'] == 'top_right'):
$move_top_r_one = $atts['move_top_r_one'];
$move_top_r_one    = ! empty( $move_top_r_one ) ? "top: $move_top_r_one!important;" : '';
endif;
$move_top_r_two = '';
if($atts['move_image'] == 'top_right'):
$move_top_r_two = $atts['move_top_r_two'];
$move_top_r_two    = ! empty( $move_top_r_two ) ? "right: $move_top_r_two!important;" : '';
endif;
$move_bottom_l_one = '';
if($atts['move_image'] == 'bottom_left'):
$move_bottom_l_one = $atts['move_bottom_l_one'];
$move_bottom_l_one    = ! empty( $move_bottom_l_one ) ? "bottom: $move_bottom_l_one!important;" : '';
endif;
$move_bottom_l_two = '';
if($atts['move_image'] == 'bottom_left'):
$move_bottom_l_two = $atts['move_bottom_l_two'];
$move_bottom_l_two    = ! empty( $move_bottom_l_two ) ? "left: $move_bottom_l_two!important;" : '';
endif;
$move_bottom_r_one = '';
if($atts['move_image'] == 'bottom_right'):
$move_bottom_r_one = $atts['move_bottom_r_one'];
$move_bottom_r_one    = ! empty( $move_bottom_r_one ) ? "bottom: $move_bottom_r_one!important;" : '';
endif;
$move_bottom_r_two = '';
if($atts['move_image'] == 'bottom_right'):
$move_bottom_r_two = $atts['move_bottom_r_two'];
$move_bottom_r_two    = ! empty( $move_bottom_r_two ) ? "right: $move_bottom_r_two!important;" : '';
endif;
$z_index = $atts['z_index'];
$z_index    = ! empty( $z_index ) ? "z-index: $z_index!important;" : '';
$style_one  = "style='$z_index $move_bottom_r_two $move_bottom_r_one $move_bottom_l_two $move_bottom_l_one $move_top_r_two $move_top_r_one $move_top_l_two $move_top_l_one'";
$image_height = $atts['image_height'];
$image_height    = ! empty( $image_height ) ? "height: $image_height!important;" : '';
$style_two  = "style='$image_height'";
$image = wp_get_attachment_image_src( intval( $atts['image'] ), 'full' );
$images           = $image ? $image[0] : '';
ob_start();
?>
<?php if(!empty($images)): ?>
            <div class="shape_one move_allside" <?php echo __($style_one); ?>>
                    <img src="<?php echo esc_url($images); ?>"  alt="shape" <?php echo __($style_two); ?> />
            </div>
            <?php endif; ?>
<?php
return ob_get_clean();
}
