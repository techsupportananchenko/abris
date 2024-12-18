<?php
add_action( 'vc_before_init', 'vc_contact_form_v1_vcmap' );
function vc_contact_form_v1_vcmap() {
 vc_map( array(
  "name" => __( "Contact Form v1", "creote-addons" ),
  "base" => "contact_form_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__( 'Choose style', 'creote-addons' ),
                'param_name' => 'contact_style',
                'value'      => array(
                    esc_html__('Style One', 'creote-addons')  => 'type_one',
                    esc_html__('Style Two', 'creote-addons')  => 'light_c',
                 ),
                'group' => esc_html__('General', 'creote-addons') ,
             ),
             array(
              'type' => 'textarea',
              'heading' => esc_html__('Description', 'creote-addons') ,
              'param_name' => 'description',
              'group' => esc_html__('General', 'creote-addons') ,
              'dependency'  => array(
                'element' => 'contact_style',
                'value'   => 'light_c',
              ),
            ),
            array(
                "type" => "textarea_html",
                "holder" => "div",
                "class" => "",
                "heading" => __( "Contact Form 7 Shortcode", "creote-addons" ),
                "param_name" => "content",
                "value" => __( "Enter your Contact Form 7 Shortcode", "creote-addons" ),
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
add_shortcode( 'contact_form_v1_init', 'vc_contact_form_v1' );
function vc_contact_form_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
    'contact_style' => 'type_one',
    'title' => 'Contact Us' ,
    'transitions_enable' => '',
    'transitions' => '',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
ob_start();
?>
 <?php if($atts['contact_style'] == 'type_one'): ?>
<section class="contact_form_box_all <?php echo esc_attr($atts['contact_style']); ?>" <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
<div class="contact_form_box_inner">
    <?php if(!empty($content)): ?>
   <div class="contact_form_shortcode">
   <?php echo do_shortcode($content);?>
   </div>
   <?php endif; ?>
</div>
</section>
<?php elseif($atts['contact_style'] == 'light_c'): ?>
<section class="footer_contact_form light_c type_one" data-aos="fade-up" data-aos-delay="0" data-aos-offset="0">
   <div class="form_box_foo">
            <h2> <?php echo wp_kses($atts['title'] , $allowed_tags) ?> </h2>
            <?php if(!empty($content)): ?>
            <div class="contact_form_shortcode">
            <?php echo do_shortcode($content);?>
             </div>
             <?php endif; ?>
   </div>
</section>
<?php endif; ?>
<?php
return ob_get_clean();
}
