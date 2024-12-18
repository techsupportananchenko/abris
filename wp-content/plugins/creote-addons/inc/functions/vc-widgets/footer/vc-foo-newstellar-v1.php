<?php
add_action( 'vc_before_init', 'vc_foo_subscribes_v1_vcmap' );
function vc_foo_subscribes_v1_vcmap() {
 vc_map( array(
  "name" => __( "Footer Subscribe V1", "creote-addons" ),
  "base" => "vc_foo_subscribes_v1",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Footer Widgets", "creote-addons"),
  "params" => array(
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__( 'Subscribe style', 'creote-addons' ),
                'param_name' => 'subscribe_styles',
                'value'      => array(
                    esc_html__( 'Style One', 'creote-addons' )  => 'style_one',
                    esc_html__( 'Style Two', 'creote-addons' )  => 'style_two', 
                ),
                'group' => esc_html__('General', 'creote-addons') ,
            ),
            array(
                'heading'    => esc_html__( 'Subscribe Shor Description', 'creote-addons' ),
                'type'       => 'textfield',
                'value' => esc_html__('Subscribe Us & Recive Our Offers and Updates i Your Inbox Directly.', 'creote-addons') ,
                'param_name' => 'subscribe_short_description',
                'group' => esc_html__('General', 'creote-addons'),
            ),
            array(
                "type" => "textarea_html",
                "holder" => "div",
                "class" => "",
                "heading" => __( "Shortcode", "creote-addons" ),
                "param_name" => "content",
                "value" => __( "Enter your Mail Form Shortcode", "creote-addons" ),
                'group' => esc_html__('General', 'creote-addons') ,
             ),
             array(
                'heading'    => esc_html__( 'Notes', 'creote-addons' ),
                'type'       => 'textfield',
                'value' => esc_html__('* We do not share your email id', 'creote-addons') ,
                'param_name' => 'notes',
                'group' => esc_html__('General', 'creote-addons'),
            ),
              array(
                'type' => 'param_group',
                'heading' => esc_html__('Media Content', 'creote-addons') ,
                'value' => '',
                'param_name' => 'media_repeater',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Media Icon', 'creote-addons') ,
                        'param_name' => 'media_icon',
                        'value' => esc_html__('fa fa-facebook', 'creote-addons') ,
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Tooltip', 'creote-addons') ,
                        'param_name' => 'tool_tip',
                        'value' => esc_html__('Facebook', 'creote-addons') ,
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Link', 'creote-addons') ,
                        'param_name' => 'media_link',
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
add_shortcode( 'vc_foo_subscribes_v1', 'vc_foo_subscribes_v1' );
function vc_foo_subscribes_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
       'subscribe_styles'  => 'style_one',
    'subscribe_short_description' => 'Subscribe Us & Recive Our Offers and Updates i Your Inbox Directly.',
    'notes' => '* We do not share your email id',
    'transitions' => '',
    'transitions_enable' => '',
    'color_one' => '',
    'media_repeater' => '',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$media_repeaters = function_exists( 'vc_param_group_parse_atts' ) ? vc_param_group_parse_atts( $atts['media_repeater'] ) : array();
$color_one = $atts['color_one'];
$color_one    = ! empty( $color_one ) ? "color: $color_one!important;" : '';
$color_onecss  = "style='$color_one'";
ob_start();
?>
<div class="footer_widgets foo_subscribe <?php echo esc_attr($atts['subscribe_styles']); ?>" <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
    <?php if($atts['subscribe_styles'] == 'style_one'): ?>
    <div class="item_subscribe with_text">
    <?php if(!empty($atts['subscribe_short_description'])) : ?> 
            <p <?php echo __($color_onecss ); ?>><?php echo wp_kses($atts['subscribe_short_description'] , $allowed_tags); ?></p>
        <?php endif; ?>   
			<?php if(!empty($content)) : ?> 
            <div class="shortcodes">
                <?php echo do_shortcode($content);?>
            </div>
            <?php endif; ?>  
            <?php if(!empty($atts['notes'])) : ?> 
            <p <?php echo __($color_onecss ); ?>><?php echo wp_kses($atts['notes'] , $allowed_tags); ?></p>
        <?php endif; ?>  
          </div>
          <div class="social_media_v_one">
                <ul>
                <?php if(!empty($media_repeaters)): foreach($media_repeaters as $key => $media): ?>
                    <li>
                        <a href="<?php echo esc_url($media['media_link']); ?>">
                    <span class="<?php echo esc_attr($media['media_icon']); ?>"></span>
                </a>
                    <small><?php echo esc_attr($media['tool_tip']); ?></small>
                </a></li>
                <?php endforeach; endif; ?>
                </ul>
            </div>
            <?php endif; ?>
    </div>
<?php
return ob_get_clean();
}
