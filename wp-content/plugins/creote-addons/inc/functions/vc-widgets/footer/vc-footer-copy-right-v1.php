<?php
add_action( 'vc_before_init', 'vc_copy_right_v1_vcmap' );
function vc_copy_right_v1_vcmap() {
 vc_map( array(
  "name" => __( "Footer Copy Right V1", "creote-addons" ),
  "base" => "vc_copy_right_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Footer Widgets", "creote-addons"),
  "params" => array(
    array(
        'type'       => 'dropdown',
        'heading'    => esc_html__( 'Footer Copyright Style ', 'creote-addons' ),
        'param_name' => 'copy_right_style',
        'value'      => array( 
             esc_html__('Style One', 'creote-addons')  => 'style_one',
             esc_html__('Style_two', 'creote-addons')  => 'style_two',
        ),
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Copy Right Text', 'creote-addons') ,
        'param_name' => 'copy_right_content',
        'value' => esc_html__('© 2021 Steelthemes. All Rights Reserved.', 'creote-addons') ,
        'group' => esc_html__('General', 'creote-addons') ,
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
        'dependency'  => array(
            'element' => 'copy_right_style',
            'value'   => 'style_one',
          ), 
    ),
    array(
        'type' => 'param_group',
        'heading' => esc_html__('Navigation Content', 'creote-addons') ,
        'value' => '',
        'param_name' => 'nav_repeater',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Link Text', 'creote-addons') ,
                'param_name' => 'link_text',
                'value' => esc_html__('About', 'creote-addons') ,
            ),
            array(
                'type' => 'vc_link',
                'heading' => esc_html__('Link', 'creote-addons') ,
                'param_name' => 'link_go',   
            ),
        ),
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'copy_right_style',
            'value'   => 'style_two',
        ), 
    ),
    array(
        'type' => 'colorpicker',
        'heading' => esc_html__('Color  One', 'creote-addons') ,
        'param_name' => 'color_one',
        'group' => esc_html__('General', 'creote-addons'),
    ),
    array(
        'type' => 'colorpicker',
        'heading' => esc_html__('Color  Two', 'creote-addons') ,
        'param_name' => 'color_two',
        'group' => esc_html__('General', 'creote-addons'),
    ),
    array(
        'type' => 'colorpicker',
        'heading' => esc_html__('Color  Three', 'creote-addons') ,
        'param_name' => 'color_three',
        'group' => esc_html__('General', 'creote-addons'),
        'dependency'  => array(
            'element' => 'copy_right_style',
            'value'   => 'style_one',
        ), 
    ),
)));
}
// shortcode
add_shortcode( 'vc_copy_right_v1_init', 'vc_copy_right_v1' );
function vc_copy_right_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'copy_right_style'  => 'style_one',
      'copy_right_content' => '© 2021 Steelthemes. All Rights Reserved.',
      'media_repeater' => '',
      'nav_repeater' => '',
      'color_one'  => '',
      'color_two'  => '',
      'color_three'  => '', 
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$copy_right  = $atts['color_one'];
$copy_right    = ! empty( $copy_right ) ? "color: $copy_right!important;" : '';
$style_css_one  = "style='$copy_right'";
$color_two  = $atts['color_two'];
$color_two    = ! empty( $color_two ) ? "color: $color_two!important;" : '';
$color_three  = $atts['color_three'];
$color_three    = ! empty( $color_three ) ? "background-color: $color_three!important;" : '';
$style_css_two  = "style='$color_two $color_three'";
$style_css_three  = "style='$color_two'";
$media_repeaters = function_exists( 'vc_param_group_parse_atts' ) ? vc_param_group_parse_atts( $atts['media_repeater'] ) : array();
$nav_repeaters = function_exists( 'vc_param_group_parse_atts' ) ? vc_param_group_parse_atts( $atts['nav_repeater'] ) : array();
ob_start();
?>
            <div class="footer_copy_right <?php echo esc_attr($atts['copy_right_style']); ?>">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="footer_copy_content" <?php echo __($style_css_one); ?>>
                                <?php echo wp_kses($atts['copy_right_content'] , $allowed_tags); ?>
                            </div>
                        </div>
                        <?php if($atts['copy_right_style'] == 'style_one'): ?>
                        <div class="col-lg-6 col-md-12">
                            <div class="footer_copy_content_right">
                            <div class="social_media_v_one">
                                <ul>
                                    <?php if(!empty($media_repeaters)): foreach($media_repeaters as $key => $media): ?>
                                        <li>
                                            <a href="<?php echo esc_url($media['media_link']); ?>" <?php echo __($style_css_two); ?>>
                                            <span class="<?php echo esc_attr($media['media_icon']); ?>"></span>
                                            <small><?php echo esc_attr($media['tool_tip']); ?></small>
                                            </a>
                                        </li>
                                    <?php endforeach;  endif;?>
                                </ul>
                            </div>
                            </div>
                        </div>
                        <?php elseif($atts['copy_right_style'] == 'style_two'): ?>
                        <div class="col-lg-6 col-md-12">
                            <div class="footer_copy_content_right">
                            <div class="nav_link_v_one">
                                <ul>
                                    <?php if(!empty($nav_repeaters)): foreach($nav_repeaters as $key => $nav_repeater): 
                                          $link_href = '';
                                          $link_target = '';
                                          if ( ! empty( $nav_repeater['link_go'] ) ) {
                                          $link            = vc_build_link( $nav_repeater['link_go'] );
                                          $link_href           = $link['url'];
                                          $link_target = $link['target'];
                                          } 
                                        ?>
                                        <li>
                                        <a href="<?php echo esc_url($link_href); ?>"  <?php if(!empty($link_target)):?> target="<?php echo esc_attr($link_target); ?>" <?php endif; ?>>
                                       <?php echo esc_attr($nav_repeater['link_text']); ?>
                                            </a>
                                        </li>
                                    <?php endforeach;  endif;?>
                                </ul>
                            </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
            </div>
<?php
return ob_get_clean();
}
