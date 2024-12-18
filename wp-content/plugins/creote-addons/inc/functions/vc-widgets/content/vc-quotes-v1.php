<?php
add_action( 'vc_before_init', 'vc_quotes_v1_vcmap' );
function vc_quotes_v1_vcmap() {
 vc_map( array(
  "name" => __( "Quotes V1", "creote-addons" ),
  "base" => "vc_quotes_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
      array(
        'type'       => 'dropdown',
        'heading'    => esc_html__( 'Quotes Styles', 'creote-addons' ),
        'param_name' => 'quotes_style',
        'value'      => array(
            esc_html__( 'Style One', 'creote-addons' )  => 'style_one', 
            esc_html__( 'Style Two', 'creote-addons' )  => 'style_two', 
        ),
    '   group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type'       => 'dropdown',
        'heading'    => esc_html__('Icon Type', 'creote-addons'),
        'param_name' => 'icon_type',
        'value'     => array(
            esc_html__( 'Icon Font Type', 'creote-addons' ) => 'icon_yes' ,
            esc_html__( 'Icon Image Type', 'creote-addons' ) => 'image_yes' ,
        ),
        'group' => esc_html__('General', 'creote-addons') ,
    ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Icon Image', 'creote-addons') ,
                'param_name' => 'icon_image',
                'value' => '',
                'dependency'  => array(
                    'element' => 'icon_type',
                    'value'   => 'image_yes',
                ),
                'group' => esc_html__('General', 'creote-addons') ,
             ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Icon Fonts', 'creote-addons') ,
                'param_name' => 'icon_fonts',
                'value'       => vc_get_creote_icons(),
                'dependency'  => array(
                    'element' => 'icon_type',
                    'value'   => 'icon_yes',
                ),
                'group' => esc_html__('General', 'creote-addons') ,
            ),
            array(
                'type' => 'textarea',
                'heading' => esc_html__('Quotes', 'creote-addons') ,
                'param_name' => 'description',
                'value' => esc_html__('Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse Cillum.', 'creote-addons') ,
                'group' => esc_html__('General', 'creote-addons') ,
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Authour Image', 'creote-addons') ,
                'param_name' => 'authour_image',
                'value' => '',
                'dependency'  => array(
                    'element' => 'quotes_style',
                    'value'   => 'style_two',
                ),
                'group' => esc_html__('General', 'creote-addons') ,
             ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Authour Name', 'creote-addons') ,
                'param_name' => 'authour_name',
                'value' => esc_html__('Lamont Shaun', 'creote-addons') ,
                'group' => esc_html__('General', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Authour Designation', 'creote-addons') ,
                'param_name' => 'authour_designation',
                'value' => esc_html__('Ceo & Founder', 'creote-addons') ,
                'group' => esc_html__('General', 'creote-addons') ,
                'dependency'  => array(
                    'element' => 'quotes_style',
                    'value'   => 'style_two',
                ),
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
)));
}
// shortcode
add_shortcode( 'vc_quotes_v1_init', 'vc_quotes_v1' );
function vc_quotes_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'quotes_style' => 'style_one',
      'icon_type' => 'icon_yes',
      'authour_image' => '',
      'icon_image' => '',
      'icon_fonts' => 'fa fa-facebook',
      'authour_name' => 'Lamont Shaun',
      'authour_designation' => 'Ceo & Founder',
      'description' => 'The key for us, number one, has always been  hiring very smart people.',
      'transitions_enable' => '',
      'transitions' => '',
   ), $atts
);
$images = wp_get_attachment_image_src( intval( $atts['icon_image'] ), 'full' );
$images           = $images ? $images[0] : '';
$allowed_tags = wp_kses_allowed_html('post');
ob_start();
?>
<?php if($atts['quotes_style'] == 'style_one'): ?>
    <div class="quotes_box <?php echo esc_attr($atts['quotes_style']); ?>" <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
            <?php if($atts['icon_type'] == 'image_yes'): ?>
                 <div class="icon">
                     <img src="<?php echo esc_url($images); ?>" class="img-fluid svg_image" alt="<?php esc_attr_e('icon png', 'creote-addons'); ?>" />
                 </div>
            <?php elseif($atts['icon_type'] == 'icon_yes'): ?>
                 <div class="icon">
                    <span class="<?php echo esc_html($atts['icon_fonts']); ?>"></span>
                </div>
            <?php endif; ?>
            <div class="content">
                    <h6><?php echo wp_kses($atts['description'] , $allowed_tags); ?></h6>
                    <h3><?php echo wp_kses($atts['authour_name'] , $allowed_tags); ?></h3>
            </div>
            </div>
            <?php elseif($atts['quotes_style'] == 'style_two'): ?>
<div class="quotes_box style_two" <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
   <div class="top_content">
      <?php if(!empty($atts['authour_image'])): ?>
      <div class="auth_img">
         <img src="<?php echo esc_url($atts['authour_image']['url']); ?>" class="auth_img" alt="<?php esc_attr_e('authour png', 'creote-addons'); ?>" />
      </div>
      <?php endif; ?>
      <div class="description_bx">
         <?php if(!empty($atts['description'])): ?>
         <p><?php echo wp_kses($atts['description'] , $allowed_tags); ?></p>
         <?php endif; ?>
         <?php if($atts['icon_type'] == 'icon_image_enable'): ?>
         <div class="icon">
            <img src="<?php echo esc_url($images); ?>" class="svg_image" alt="<?php esc_attr_e('icon png', 'creote-addons'); ?>" />
         </div>
         <?php elseif($atts['icon_type'] == 'icon_fonts_enable'): ?>
         <div class="icon">
            <span class="<?php echo esc_html($atts['icon_fonts']); ?>"></span>
         </div>
         <?php endif; ?>
      </div>
   </div>
   <div class="content">
      <?php if(!empty($atts['authour_name'])): ?>
      <h3><?php echo wp_kses($atts['authour_name'] , $allowed_tags); ?></h3>
      <?php endif; ?>
      <?php if(!empty($atts['authour_designation'])): ?>
      <h6><?php echo wp_kses($atts['authour_designation'] , $allowed_tags); ?></h6>
      <?php endif; ?>
   </div>
</div>
<?php endif; ?>
<?php
return ob_get_clean();
}
