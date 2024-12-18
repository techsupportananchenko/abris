<?php
add_action( 'vc_before_init', 'vc_foo_navigation_v1_vcmap' );
function vc_foo_navigation_v1_vcmap() {
 vc_map( array(
  "name" => __( "Footer Navigation V1", "creote-addons" ),
  "base" => "vc_foo_navigation_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Footer Widgets", "creote-addons"),
  "params" => array(
        array(
        'type'       => 'dropdown',
        'heading'    => esc_html__( 'Navigation style', 'creote-addons' ),
        'param_name' => 'navigation_menu_styles',
        'value'      => array(
            esc_html__( 'Style One', 'creote-addons' )  => 'style_one',
            esc_html__( 'Style Two', 'creote-addons' )  => 'style_two',
        ),
        'group' => esc_html__('General', 'creote-addons') ,
        ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Navigation Content', 'creote-addons') ,
                'value' => '',
                'param_name' => 'navigations_repeater',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Menu Item', 'creote-addons') ,
                        'param_name' => 'menu_item',
                        'value' => esc_html__('About Us', 'creote-addons') ,
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('Menu Link', 'creote-addons') ,
                        'param_name' => 'menu_link',
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
)));
}
// shortcode
add_shortcode( 'vc_foo_navigation_v1_init', 'vc_foo_navigation_v1' );
function vc_foo_navigation_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
    'navigation_menu_styles' => 'style_one',
    'navigations_repeater' => '',
    'transitions' => '',
    'transitions_enable' => '',
    'color_one' => '',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$color_one = $atts['color_one'];
$color_one    = ! empty( $color_one ) ? "color: $color_one!important;" : '';
$color_onecss  = "style='$color_one'";
$navigations_repeaters = function_exists( 'vc_param_group_parse_atts' ) ? vc_param_group_parse_atts( $atts['navigations_repeater'] ) : array();
ob_start();
?>
<div class="footer_widgets navigation_foo <?php echo esc_attr($atts['navigation_menu_styles']); ?>"
    <?php if($atts['transitions_enable'] == 'yes'):  ?> data-aos="fade-up"
    data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
    <?php if($atts['navigation_menu_styles'] == 'style_one'): ?>
    <div class="navigation_foo_box">
        <div class="navigation_foo_inner">
            <?php  if(!empty($navigations_repeaters)):?>
            <ul>
                <?php foreach($navigations_repeaters as $key => $navigations_repeater): 
                        $menu_link_href = '';
                        $menu_link_target = '';
                        if ( ! empty( $navigations_repeater['menu_link'] ) ) {
                        $menu_link            = vc_build_link( $navigations_repeater['menu_link'] );
                        $menu_link_href           = $menu_link['url'];
                        $menu_link_target = $menu_link['target'];
                        } 
                        ?>
                <li>
                    <a href="<?php echo esc_url($menu_link_href); ?>" <?php if(!empty($menu_link_target)):?>
                        target="<?php echo esc_attr($menu_link_target); ?>" <?php endif; ?>
                        <?php echo __($color_onecss); ?>>
                        <?php echo wp_kses($navigations_repeater['menu_item'] , $allowed_tags); ?>
                    </a>
                </li>
                <?php endforeach; ?>
                <ul>
          <?php endif; ?>
        </div>
    </div>
    <?php elseif($atts['navigation_menu_styles'] == 'style_two'): ?>
    <div class="navigation_foo_box">
        <?php if(!empty($atts['widget_title'])):?>
        <div class="fo_wid_title">
            <h2 <?php echo __($widget_title_colorcss); ?>><?php echo wp_kses($atts['widget_title'] , $allowed_tags) ?>
            </h2>
        </div>
        <?php endif; ?>
        <div class="navigation_foo_inner">
            <?php  if(!empty($navigations_repeaters)):?>
            <ul>
                <?php foreach($navigations_repeaters as $key => $navigations_repeater): 
                        $menu_link_href = '';
                        $menu_link_target = '';
                        if ( ! empty( $navigations_repeater['menu_link'] ) ) {
                        $menu_link            = vc_build_link( $navigations_repeater['menu_link'] );
                        $menu_link_href           = $menu_link['url'];
                        $menu_link_target = $menu_link['target'];
                        } 
                        ?>
                <li>
                    <a href="<?php echo esc_url($menu_link_href); ?>" <?php if(!empty($menu_link_target)):?>
                        target="<?php echo esc_attr($menu_link_target); ?>" <?php endif; ?>
                        <?php echo __($color_onecss); ?>>
                        <?php echo wp_kses($navigations_repeater['menu_item'] , $allowed_tags); ?>
                    </a>
                </li>
                <?php endforeach; ?>
                <ul>
                    <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
</div>
<?php
return ob_get_clean();
}