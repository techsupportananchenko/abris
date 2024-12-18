<?php
add_action( 'vc_before_init', 'vc_description_v1_vcmap' );
function vc_description_v1_vcmap() {
 vc_map( array(
  "name" => __( "Description V1", "creote-addons" ),
  "base" => "vc_description_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
  array(
      'type'       => 'dropdown',
      'heading'    => esc_html__('Description alignments', 'creote-addons'),
      'param_name' => 'des_alignments',
      'value'      => array(
          esc_html__( 'Text Left', 'creote-addons' ) => 'left' ,
          esc_html__( 'Text Center', 'creote-addons' ) => 'center' ,
          esc_html__( 'Text Right', 'creote-addons' ) => 'right',
      ),
      'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Description', 'creote-addons') ,
        'param_name' => 'description',
        'group' => esc_html__('Title Content', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Description  Margin', 'creote-addons') ,
        'param_name' => 'desc_margin',
        'value' => '0px 0px 0px 0px',
        'group' => esc_html__('Css', 'creote-addons'),
      ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Description  Padding', 'creote-addons') ,
        'param_name' => 'desc_padding',
        'value' => '0px 0px 0px 0px',
        'group' => esc_html__('Css', 'creote-addons'),
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
      'type' => 'colorpicker',
      'heading' => esc_html__('Description Color', 'creote-addons') ,
      'param_name' => 'description_color',
      'group' => esc_html__('Css', 'creote-addons'),
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
add_shortcode( 'vc_description_v1_init', 'vc_description_v1' );
function vc_description_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'des_alignments' => 'left',
      'description' => 'Our power of choice is untrammelled and when nothing prevents being able to do what we like best every pleasure.',
      'transitions_enable' => '',
      'transitions' => '',
      'desc_margin' => '0px',
      'desc_padding' => '0px', 
      'description_color' => '', 
   ), $atts
);
$desc_margin  = $atts['desc_margin'];
$desc_margin    = ! empty( $desc_margin ) ? "margin: $desc_margin!important;" : '';
$description_color  = $atts['description_color'];
$description_color    = ! empty( $description_color ) ? "color: $description_color!important;" : '';
$desc_padding  = $atts['desc_padding'];
$desc_padding    = ! empty( $desc_padding ) ? "padding: $desc_padding!important;" : '';
$style_two  = "style=' $desc_padding $desc_margin $description_color'";
$title_alignments = $atts['des_alignments'];
$title_alignments    = ! empty( $title_alignments ) ? "text-align: $title_alignments!important;" : '';
$style  = "style='$title_alignments'";
//stylingend
$allowed_tags = wp_kses_allowed_html('post');
ob_start();
?>
<div class="description_box" <?php echo __($style); ?> <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
                  <?php if(!empty($atts['description'])):?>
                  <p <?php echo __($style_two); ?>><?php echo wp_kses($atts['description'] , $allowed_tags) ?></p>
                  <?php endif; ?>    
        </div>
<?php
return ob_get_clean();
}
