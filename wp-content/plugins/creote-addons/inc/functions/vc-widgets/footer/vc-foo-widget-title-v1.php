<?php
add_action( 'vc_before_init', 'vc_foo_widget_title_v1_vcmap' );
function vc_foo_widget_title_v1_vcmap() {
 vc_map( array(
  "name" => __( "Footer Widget Title V1", "creote-addons" ),
  "base" => "vc_foo_widget_title_v1",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Footer Widgets", "creote-addons"),
  "params" => array(
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__( 'Widget style', 'creote-addons' ),
                'param_name' => 'widget_style',
                'value'      => array(
                    esc_html__( 'Style One', 'creote-addons' )  => 'style_one',
                    esc_html__( 'Style Two', 'creote-addons' )  => 'style_two', 
                ),
                'group' => esc_html__('General', 'creote-addons') ,
            ),
            array(
                'heading'    => esc_html__( 'Widget Title', 'creote-addons' ),
                'type'       => 'textfield',
                'value' => esc_html__('About Company', 'creote-addons') ,
                'param_name' => 'widget_title',
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
        'heading' => esc_html__('Title Color', 'creote-addons') ,
        'param_name' => 'widget_title_color',
        'group' => esc_html__('Css', 'creote-addons'),
      ),
)));
}
// shortcode
add_shortcode( 'vc_foo_widget_title_v1', 'vc_foo_widget_title_v1' );
function vc_foo_widget_title_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
       'widget_style'  => 'style_one',
    'widget_title' => 'About Company',
    'transitions' => '',
    'transitions_enable' => '',
    'widget_title_color' => '',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$widget_title_color = $atts['widget_title_color'];
$widget_title_color    = ! empty( $widget_title_color ) ? "color: $widget_title_color!important;" : '';
$widget_title_color_css  = "style='$widget_title_color'";
ob_start();
?>
<?php if(!empty($atts['widget_title'])):?>
   <div class="footer_widgets wid_tit <?php echo esc_attr($atts['widget_style']); ?>" <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
            <div class="fo_wid_title">
                <h2 <?php  echo __($widget_title_color_css); ?>><?php echo wp_kses($atts['widget_title'] , $allowed_tags) ?></h2>
            </div>
    </div>
    <?php endif; ?>   
<?php
return ob_get_clean();
}
