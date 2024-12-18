<?php
add_action( 'vc_before_init', 'vc_contact_box_vcmap' );
function vc_contact_box_vcmap() {
 vc_map( array(
  "name" => __( "Contact Box V1", "creote-addons" ),
  "base" => "vc_contact_box_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
    'type'       => 'dropdown',
    'heading'    => esc_html__( 'Contact Box style', 'creote-addons' ),
    'param_name' => 'contact_box_styles',
    'value'      => array(
        esc_html__( 'Style One', 'creote-addons' )  => 'style_one',
    ),
    'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Icon Fonts', 'creote-addons') ,
        'param_name' => 'icon_fonts',
        'value'       => vc_get_creote_icons(),
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Heading', 'creote-addons') ,
        'param_name' => 'heading',
        'value' => esc_html__('General Enquires', 'creote-addons') ,
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Description', 'creote-addons') ,
        'param_name' => 'description',
        'value' => esc_html__('Phone: +98 060 712 34  &  Email: sendmail@qetus.com', 'creote-addons') ,
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
add_shortcode( 'vc_contact_box_init', 'vc_contact_box_v1' );
function vc_contact_box_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'contact_box_styles' => 'style_one',
      'icon_fonts' => 'fa fa-map-marker',
      'heading' => 'General Enquires',
      'description' => 'Phone: +98 060 712 34  &  Email: sendmail@qetus.com',
      'transitions_enable' => '',
      'transitions' => '',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
ob_start();
?>
 <div class="contact_box_content  <?php echo esc_attr($atts['contact_box_styles']); ?>" <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
<?php if($atts['contact_box_styles'] == 'style_one'): ?>
        <div class="contact_box_inner <?php if(!empty($atts['icon_fonts'])): ?> icon_yes <?php endif; ?>">
            <?php if(!empty($atts['icon_fonts'])): ?>
            <div class="icon_bx">
                <span class="<?php echo esc_attr($atts['icon_fonts']); ?>"></span>
            </div>
            <?php endif; ?>
        <div class="contnet">
           <?php if(!empty($atts['heading'])):?>
               <h3> <?php echo wp_kses($atts['heading'] , $allowed_tags) ?> </h3>
            <?php endif; ?>
            <?php if(!empty($atts['description'])):?>
            <p>
                <?php echo wp_kses($atts['description'] , $allowed_tags) ?>
            </p>
            <?php endif; ?>
            </div>
        </div>
<?php endif; ?>
</div>
<?php
return ob_get_clean();
}
