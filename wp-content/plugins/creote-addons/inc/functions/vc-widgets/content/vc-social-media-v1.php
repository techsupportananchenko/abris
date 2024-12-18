<?php
add_action( 'vc_before_init', 'vc_social_media_v1_vcmap' );
function vc_social_media_v1_vcmap() {
 vc_map( array(
  "name" => __( "Social Media V1", "creote-addons" ),
  "base" => "vc_social_media_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
        'type' => 'param_group',
        'heading' => esc_html__('Media Content', 'creote-addons') ,
        'value' => '',
        'param_name' => 'media_repeater',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Media Icon', 'creote-addons') ,
                'param_name' => 'media_icon',
                'value' => esc_html__('fa fa-facebook', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Tooltip', 'creote-addons') ,
                'param_name' => 'tool_tip',
                'value' => esc_html__('Facebook', 'creote-addons') ,
            ),
            array(
                'type'        => 'checkbox',
                'heading'     => esc_html__( 'Open In New Tab Enable / Disable', 'creote-addons' ),
                'param_name'  => 'openinnew',
                'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ), 
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Link', 'creote-addons') ,
                'param_name' => 'media_link',
                'value' => esc_html__('#', 'creote-addons') ,
            ),
        ),
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type'        => 'checkbox',
        'heading'     => esc_html__( 'Transitions Enable / Disable', 'creote-addons' ),
        'param_name'  => 'transitions_enable',
        'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
        'group' => esc_html__('General', 'creote-addons') ,
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
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type'       => 'dropdown',
        'heading'    => esc_html__('Media alignments', 'creote-addons'),
        'param_name' => 'media_alignments',
        'value'      => array(
            esc_html__( 'Text Left', 'creote-addons' ) => 'left' ,
            esc_html__( 'Text Center', 'creote-addons' ) => 'center' ,
            esc_html__( 'Text Right', 'creote-addons' ) => 'right',
        ),
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'colorpicker',
        'heading' => esc_html__('Color  One', 'creote-addons') ,
        'param_name' => 'color_one',
        'group' => esc_html__('General', 'creote-addons'),
      ),
      array(
        'type' => 'colorpicker',
        'heading' => esc_html__('Color  Two', 'creote-addons') ,
        'param_name' => 'color_two',
        'group' => esc_html__('General', 'creote-addons'),
      ),
)));
}
// shortcode
add_shortcode( 'vc_social_media_v1_init', 'vc_social_media_v1' );
function vc_social_media_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'media_repeater' => '',
      'color_one'  => '',
      'color_two'  => '',
      'transitions_enable'   => '',
      'transitions'  => '',
      'media_alignments' => 'left',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$color_one  = $atts['color_one'];
$color_one    = ! empty( $color_one ) ? "color: $color_one!important;" : '';
$color_two  = $atts['color_two'];
$color_two    = ! empty( $color_two ) ? "background-color: $color_two!important;" : '';
$style_css  = "style='$color_two $color_one'";
$media_alignments  = $atts['media_alignments'];
$media_alignments    = ! empty( $media_alignments ) ? "text-align: $media_alignments!important;" : '';
$align_style_css =  "style='$media_alignments'";
$media_repeaters = function_exists( 'vc_param_group_parse_atts' ) ? vc_param_group_parse_atts( $atts['media_repeater'] ) : array();
ob_start();
?>
<div class="social_media_v_one" <?php echo __($align_style_css); ?>>
    <ul <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
            <?php if(!empty($media_repeaters)): foreach($media_repeaters as $key => $media): ?>
                <li>
                    <a href="<?php echo esc_url($media['media_link']); ?>" <?php if($media['openinnew'] == "yes"): ?> target="_blank" <?php endif; ?> <?php echo __($style_css); ?>>
                        <span class="<?php echo esc_attr($media['media_icon']); ?>"></span>
                        <small><?php echo esc_attr($media['tool_tip']); ?></small>
                    </a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>
<?php
return ob_get_clean();
}
