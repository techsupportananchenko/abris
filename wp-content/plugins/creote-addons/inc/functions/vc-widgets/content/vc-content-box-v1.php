<?php
add_action( 'vc_before_init', 'vc_content_box_vcmap' );
function vc_content_box_vcmap() {
 vc_map( array(
  "name" => __( "Content Box V1", "creote-addons" ),
  "base" => "vc_content_box_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
    'type'       => 'dropdown',
    'heading'    => esc_html__( 'Content Box style', 'creote-addons' ),
    'param_name' => 'content_box_styles',
    'value'      => array(
        esc_html__( 'Style One', 'creote-addons' )  => 'style_one',
    ),
    'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Heading', 'creote-addons') ,
        'param_name' => 'content_box_heading',
        'value' => esc_html__('Open Communication', 'creote-addons') ,
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Description', 'creote-addons') ,
        'param_name' => 'content_box_description',
        'value' => esc_html__('The less water you use, the less runoff and wastewater that eventually end up in the ocean.', 'creote-addons') ,
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'vc_link',
        'heading' => esc_html__('Link', 'creote-addons') ,
        'param_name' => 'link_box',
        'value' => '#',
        'group' => esc_html__('General', 'creote-addons') ,
    ) ,
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
add_shortcode( 'vc_content_box_init', 'vc_content_box_v1' );
function vc_content_box_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'content_box_styles' => 'style_one',
      'content_box_heading' => 'Open Communication',
      'content_box_description' => 'The less water you use, the less runoff and wastewater that eventually end up in the ocean.',
      'link_box' => '',
      'transitions_enable' => '',
      'transitions' => '',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$link_box = '';
$link_box_target = '';
if (!empty( $atts['link_box'])) {
$link            = vc_build_link( $atts['link_box'] );
$link_box           = $link['url'];
$link_box_target = $link['target'];
}
ob_start();
?>
 <div class="content_box_cn  <?php echo esc_attr($atts['content_box_styles']); ?>" <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
<?php if($atts['content_box_styles'] == 'style_one'): ?>
        <div class="txt_content">
           <?php if(!empty($atts['content_box_heading'])):?>
               <h3>
               <a href="<?php echo esc_url($link_box); ?>"  <?php if(!empty($link_box_target)):?> target="<?php echo esc_attr($link_box_target); ?>" <?php endif; ?>>
                    <?php echo wp_kses($atts['content_box_heading'] , $allowed_tags) ?>
                    </a>
                </h3>
            <?php endif; ?>
            <?php if(!empty($atts['content_box_description'])):?>
            <p>
                <?php echo wp_kses($atts['content_box_description'] , $allowed_tags) ?>
            </p>
            <?php endif; ?>
        </div>
<?php endif; ?>
</div>
<?php
return ob_get_clean();
}
