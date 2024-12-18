<?php
add_action( 'vc_before_init', 'vc_themebtn_v1_vcmap' );
function vc_themebtn_v1_vcmap() {
 vc_map( array(
  "name" => __( "Theme Button V1", "creote-addons" ),
  "base" => "vc_themebtn_v1_init",
  "class" => "",
    "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
    'type'       => 'dropdown',
    'heading'    => esc_html__( 'Theme Button style', 'creote-addons' ),
    'param_name' => 'theme_btn_styles',
    'value'      => array(
        esc_html__( 'Style One', 'creote-addons' )  => 'style_one',
        esc_html__( 'Style Two', 'creote-addons' )  => 'style_two',
        esc_html__( 'Style Three', 'creote-addons' )  => 'style_three',
        esc_html__( 'Style Four', 'creote-addons' )  => 'style_four',
        esc_html__( 'Style Five', 'creote-addons' )  => 'style_five',
    ),
    'group' => esc_html__('General', 'creote-addons') ,
    ),
  array(
      'type'       => 'dropdown',
      'heading'    => esc_html__('Button alignments', 'creote-addons'),
      'param_name' => 'btn_alignments',
      'value'      => array(
          esc_html__( 'Text Left', 'creote-addons' ) => 'left' ,
          esc_html__( 'Text Center', 'creote-addons' ) => 'center' ,
          esc_html__( 'Text Right', 'creote-addons' ) => 'right',
      ),
      'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Button Text', 'creote-addons') ,
        'param_name' => 'button_text',
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'heading'    => esc_html__( 'URL (Link)', 'creote-addons' ),
        'type'       => 'vc_link',
        'param_name' => 'button_link',
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
add_shortcode( 'vc_themebtn_v1_init', 'vc_themebtn_v1' );
function vc_themebtn_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'theme_btn_styles' => 'style_one',
      'btn_alignments' => 'left',
      'button_text' => 'Contact Us',
      'button_link' => '',
      'transitions_enable' => '',
      'transitions' => '',
   ), $atts
);
//styling
$btn_alignments  = $atts['btn_alignments'];
$btn_alignments    = ! empty( $btn_alignments ) ? "text-align: $btn_alignments!important;" : '';
$btn_alignmentscss  = "style='$btn_alignments'";
//stylingend
$allowed_tags = wp_kses_allowed_html('post');
$button_link = '';
$button_link_target = '';
if ( ! empty( $atts['button_link'] ) ) {
$link            = vc_build_link( $atts['button_link'] );
$button_link           = $link['url'];
$button_link_target = $link['target'];
}
ob_start();
?>
<div class="theme_btn_all" <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?> <?php echo __($btn_alignmentscss); ?>>
        <?php if($atts['theme_btn_styles'] == 'style_one'):?>
            <a href="<?php echo esc_url($button_link); ?>" <?php if(!empty($button_link_target)):?> target="<?php echo esc_attr($button_link_target); ?>" <?php endif; ?> class="theme-btn one">
                <?php echo esc_html($atts['button_text']); ?>
            </a>
        <?php elseif($atts['theme_btn_styles'] == 'style_two'):?>
          <a href="<?php echo esc_url($button_link); ?>" <?php if(!empty($button_link_target)):?> target="<?php echo esc_attr($button_link_target); ?>" <?php endif; ?> class="theme-btn two">
           <?php echo esc_html($atts['button_text']); ?>
        </a>
        <?php elseif($atts['theme_btn_styles'] == 'style_three'):?>
          <a href="<?php echo esc_url($button_link); ?>" <?php if(!empty($button_link_target)):?> target="<?php echo esc_attr($button_link_target); ?>" <?php endif; ?> class="theme-btn three">
             <?php echo esc_html($atts['button_text']);?>
           </a>
           <?php elseif($atts['theme_btn_styles'] == 'style_four'):?>
            <a href="<?php echo esc_url($button_link); ?>" <?php if(!empty($button_link_target)):?> target="<?php echo esc_attr($button_link_target); ?>" <?php endif; ?>
              class="theme-btn four">
            <?php echo esc_html($atts['button_text']);?> <i class="icon-right-arrow"></i>
          </a>
       <?php elseif($atts['theme_btn_styles'] == 'style_five'):?>
        <a href="<?php echo esc_url($button_link); ?>" <?php if(!empty($button_link_target)):?> target="<?php echo esc_attr($button_link_target); ?>" <?php endif; ?>
              class="theme-btn five">
   <?php echo esc_html($atts['button_text']);?> <i class="icon-right-arrow"></i>
   </a>
   <?php endif; ?>
        </div>
<?php
return ob_get_clean();
}
