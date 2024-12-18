<?php
add_action( 'vc_before_init', 'vc_foo_get_in_touch_v1_vcmap' );
function vc_foo_get_in_touch_v1_vcmap() {
 vc_map( array(
  "name" => __( "Footer Get In Touch V1", "creote-addons" ),
  "base" => "vc_foo_get_in_touch_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Footer Widgets", "creote-addons"),
  "params" => array(
            array(
                'heading'    => esc_html__( 'Address Title', 'creote-addons' ),
                'type'       => 'textfield',
                'value' => esc_html__('Location', 'creote-addons') ,
                'param_name' => 'address_title',
                'group' => esc_html__('General', 'creote-addons'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Address Content', 'creote-addons') ,
                'param_name' => 'address_content',
                'value' => esc_html__('280 Granite Run Drive Suite #200
                Lancaster, PA 1760', 'creote-addons') ,
                'group' => esc_html__('General', 'creote-addons'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Contact Title', 'creote-addons') ,
                'param_name' => 'contact_title',
                'value' => esc_html__('Contact', 'creote-addons') ,
                'group' => esc_html__('General', 'creote-addons'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__(' Phone Title', 'creote-addons') ,
                'param_name' => 'phone_title',
                'value' => esc_html__('Phone :', 'creote-addons') ,
                'group' => esc_html__('General', 'creote-addons'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__(' Phone Number', 'creote-addons') ,
                'param_name' => 'phone_number',
                'value' => esc_html__('+98 060 712 34', 'creote-addons') ,
                'group' => esc_html__('General', 'creote-addons'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__(' Mail Title', 'creote-addons') ,
                'param_name' => 'mail_title',
                'value' => esc_html__('Mail Us :', 'creote-addons') ,
                'group' => esc_html__('General', 'creote-addons'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__(' Mail Id', 'creote-addons') ,
                'param_name' => 'mail_id',
                'value' => esc_html__('sendmail@creote.com', 'creote-addons') ,
                'group' => esc_html__('General', 'creote-addons'),
            ),
            array(
                'type'        => 'checkbox',
                'heading'     => esc_html__( 'Transitions Enable / Disable', 'creote-addons' ),
                'param_name'  => 'transitions_enable',
                'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
                'description' => esc_html__( 'Click Check box to use the icon Image will display in output', 'creote-addons' ),
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
        'type' => 'colorpicker',
        'heading' => esc_html__('Color One', 'creote-addons') ,
        'param_name' => 'color_one',
        'group' => esc_html__('Css', 'creote-addons'),
      ),
      array(
        'type' => 'colorpicker',
        'heading' => esc_html__('Color Two', 'creote-addons') ,
        'param_name' => 'color_two',
        'group' => esc_html__('Css', 'creote-addons'),
      ),
)));
}
// shortcode
add_shortcode( 'vc_foo_get_in_touch_v1_init', 'vc_foo_get_in_touch_v1' );
function vc_foo_get_in_touch_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
    'address_title' => 'Location',
    'address_content' => '280 Granite Run Drive Suite #200  Lancaster, PA 1760',
    'contact_title' => 'Contact',
    'phone_title' => 'Phone :',
    'phone_number' => '+98 060 712 34',
    'mail_title' => 'Mail Us :',
    'mail_id' => 'sendmail@creote.com',
    'transitions' => '',
    'transitions_enable' => '',
    'color_one' => '',
    'color_two' => '',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$color_one = $atts['color_one'];
$color_one    = ! empty( $color_one ) ? "color: $color_one!important;" : '';
$color_onecss  = "style='$color_one'";
$color_two = $atts['color_two'];
$color_two    = ! empty( $color_two ) ? "color: $color_two!important;" : '';
$color_two_css  = "style='$color_two'";
ob_start();
?>
<div class="footer_widgets get_in_touch_foo" <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
        <div class="get_intouch_inrfo">
            <div class="foo_cont_inner">
                <div class="top">
                <?php if(!empty($atts['address_title'])):?>
                    <h6 <?php echo __($color_onecss); ?>> <?php echo wp_kses($atts['address_title'] , $allowed_tags) ?></h6>
                <?php endif; ?>
                <?php if(!empty($atts['address_content'])):?>
                    <p <?php echo __($color_two_css); ?>> <?php echo wp_kses($atts['address_content'] , $allowed_tags) ?></p>
                <?php endif; ?>
                </div>
                <div class="bottom">
                <?php if(!empty($atts['contact_title'])):?>
                    <h6 <?php echo __($color_onecss); ?>> <?php echo wp_kses($atts['contact_title'] , $allowed_tags) ?></h6>
                <?php endif; ?>
                <div class="con_content">
                <?php if(!empty($atts['phone_title'])):?>
                    <h5 <?php echo __($color_onecss); ?>> <?php echo wp_kses($atts['phone_title'] , $allowed_tags) ?></h5>
                <?php endif; ?>
                <?php if(!empty($atts['phone_number'])):?>
                    <a href="tel:<?php echo esc_attr($atts['phone_number']); ?>" <?php echo __($color_two_css); ?>> <?php echo wp_kses($atts['phone_number'] , $allowed_tags) ?></a>
                <?php endif; ?>
                </div>
                <div class="con_content">
                <?php if(!empty($atts['mail_title'])):?>
                    <h5 <?php echo __($color_onecss); ?>> <?php echo wp_kses($atts['mail_title'] , $allowed_tags) ?></h5>
                <?php endif; ?>
                <?php if(!empty($atts['mail_id'])):?>
                    <a href="tel:<?php echo esc_attr($atts['mail_id']); ?>" <?php echo __($color_two_css); ?>> <?php echo wp_kses($atts['mail_id'] , $allowed_tags) ?></a>
                <?php endif; ?>
                </div>
                </div>
            </div>
        </div>
    </div>
<?php
return ob_get_clean();
}
