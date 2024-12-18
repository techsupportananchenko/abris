<?php
add_action( 'vc_before_init', 'vc_foo_about_company_v1_vcmap' );
function vc_foo_about_company_v1_vcmap() {
 vc_map( array(
  "name" => __( "Footer About Company V1", "creote-addons" ),
  "base" => "vc_foo_about_company_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Footer Widgets", "creote-addons"),
  "params" => array(
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('logo', 'creote-addons') ,
                'param_name' => 'logo',
                'group' => esc_html__('General', 'creote-addons'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Logo Width', 'creote-addons') ,
                'param_name' => 'logo_width',
                'value' => esc_html__('150px', 'creote-addons') ,
                'group' => esc_html__('General', 'creote-addons'),
            ),
            array(
                'heading'    => esc_html__( 'URL (Link)', 'creote-addons' ),
                'type'       => 'vc_link',
                'param_name' => 'logo_link',
                'group' => esc_html__('General', 'creote-addons'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Description', 'creote-addons') ,
                'param_name' => 'description',
                'value' => esc_html__('Duty the obligations of business will frequently occur that pleasure have too repudiated annoyances  endures accepted', 'creote-addons') ,
                'group' => esc_html__('General', 'creote-addons'),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Help Image', 'creote-addons') ,
                'param_name' => 'need_help_image',
                'group' => esc_html__('General', 'creote-addons'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__(' Help Title', 'creote-addons') ,
                'param_name' => 'need_help_title',
                'value' => esc_html__('Need Help?', 'creote-addons') ,
                'group' => esc_html__('General', 'creote-addons'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__(' Help Description', 'creote-addons') ,
                'param_name' => 'need_help_description',
                'value' => esc_html__('Free Consultation', 'creote-addons') ,
                'group' => esc_html__('General', 'creote-addons'),
            ),
            array(
                'heading'    => esc_html__( 'Help (Link)', 'creote-addons' ),
                'type'       => 'vc_link',
                'param_name' => 'link_box',
                'group' => esc_html__('General', 'creote-addons') ,
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
add_shortcode( 'vc_foo_about_company_v1_init', 'vc_foo_about_company_v1' );
function vc_foo_about_company_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
    'logo' => '',
    'logo_width' => '150px',
    'logo_link' => '',
    'description' => 'Duty the obligations of business will frequently occur that pleasure have too repudiated annoyances  endures accepted.',
    'need_help_image' => '',
    'need_help_title' => 'Need Help?',
    'need_help_description' => 'Free Consultation',
    'link_box' => '',
    'transitions' => '',
    'transitions_enable' => '',
    'color_one' => '',
    'color_two' => '',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$logo_link_href = '';
$logo_link_target = '';
if ( ! empty( $atts['logo_link'] ) ) {
$logo_link            = vc_build_link( $atts['logo_link'] );
$logo_link_href           = $logo_link['url'];
$logo_link_target = $logo_link['target'];
} 
$link_href = '';
$link_target = '';
if ( ! empty( $atts['link_box'] ) ) {
$link            = vc_build_link( $atts['link_box'] );
$link_href           = $link['url'];
$link_target = $link['target'];
} 
$logo = wp_get_attachment_image_src( intval( $atts['logo'] ), 'full' );
$logo_img           = $logo ? $logo[0] : '';
$need_help_image = wp_get_attachment_image_src( intval( $atts['need_help_image'] ), 'full' );
$need_help_image_css           = $need_help_image ? $need_help_image[0] : '';
$logo_width = $atts['logo_width'];
$logo_width    = ! empty( $logo_width ) ? "width: $logo_width!important;" : '';
$logo_width_css  = "style='$logo_width'";
$color_one = $atts['color_one'];
$color_one    = ! empty( $color_one ) ? "color: $color_one!important;" : '';
$color_onecss  = "style='$color_one'";
$color_two = $atts['color_two'];
$color_two    = ! empty( $color_two ) ? "color: $color_two!important;" : '';
$color_two_css  = "style='$color_two'";
ob_start();
?>
<div class="footer_widgets about_company" <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
<div class="about_company_inner">
        <?php if(!empty($logo_img)): ?>
            <div class="logo">
            <a href="<?php echo esc_url($logo_link_href); ?>"  <?php if(!empty($logo_link_target)):?> target="<?php echo esc_attr($logo_link_target); ?>" <?php endif; ?>>
                <img src="<?php echo esc_url($logo_img); ?>" alt="logo"  <?php echo __($logo_width_css); ?>/>
                </a>
            </div>
       <?php endif; ?>
        <div class="content_in_r">
            <?php if(!empty($atts['description'])):?>
           <p <?php echo __($color_onecss); ?>> <?php echo wp_kses($atts['description'] , $allowed_tags) ?></p>
            <?php endif; ?>
            <div class="consulting">
            <?php if(!empty($need_help_image_css)): ?>
             <div class="image">
                <img src="<?php echo esc_url($need_help_image_css); ?>" alt="need help" />
             </div>
             <?php endif; ?>
             <div class="help_con">
             <?php if(!empty($atts['need_help_title'])):?>
                <h6 <?php echo __($color_two_css); ?>><?php echo wp_kses($atts['need_help_title'] , $allowed_tags) ?></h6>
            <?php endif; ?>
            <?php if(!empty($atts['need_help_description'])):?>
                <h2> 
                <a href="<?php echo esc_url($link_href); ?>"  <?php if(!empty($link_target)):?> target="<?php echo esc_attr($link_target); ?>" <?php endif; ?> <?php echo __($color_onecss); ?>>
                <?php echo wp_kses($atts['need_help_description'] , $allowed_tags) ?>
            </a>
            </h2>
            <?php endif; ?>
            </div>
            </div>
        </div>
</div>
</div>
<?php
return ob_get_clean();
}
