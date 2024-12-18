<?php
add_action( 'vc_before_init', 'vc_time_line_v1_vcmap' );
function vc_time_line_v1_vcmap() {
 vc_map( array(
  "name" => __( "Time Line V1", "creote-addons" ),
  "base" => "vc_time_line_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
    'type'       => 'dropdown',
    'heading'    => esc_html__( 'Title style', 'creote-addons' ),
    'param_name' => 'time_line_style',
    'value'      => array(
        esc_html__( 'Style One', 'creote-addons' )  => 'style_one', 
    ),
    'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'param_group',
        'heading' => esc_html__('Timeline  Content', 'creote-addons') ,
        'value' => '',
        'param_name' => 'timeline_content_repeater',
        'params' => array(
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Image', 'creote-addons') ,
                'param_name' => 'image',
                'value' => '',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('TimeLine Date', 'creote-addons') ,
                'param_name' => 'timeline_date',
                'value' => esc_html__('2021', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('TimeLine Title', 'creote-addons') ,
                'param_name' => 'timeline_heading',
                'value' => esc_html__('New Milestone', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__(' TimeLine Description', 'creote-addons') ,
                'param_name' => 'timeline_description',
                'value' => esc_html__('No one rejects dislikes or avoids pleasures itself because it is pleasures, but because those who
                pursue pleasure rationally.', 'creote-addons') ,
            ),
            array(
                'heading'    => esc_html__( 'URL (Link)', 'creote-addons' ),
                'type'       => 'vc_link',
                'param_name' => 'link_box',
            ),
        ),
        'group' => esc_html__('General', 'creote-addons') ,
    ),
)));
}
// shortcode
add_shortcode( 'vc_time_line_v1_init', 'vc_time_line_v1' );
function vc_time_line_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'time_line_style' => 'style_one',
      'timeline_content_repeater' => 'left',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$timeline_content_repeaters = function_exists( 'vc_param_group_parse_atts' ) ? vc_param_group_parse_atts( $atts['timeline_content_repeater'] ) : array();
ob_start();
?>
<section class="time_line_section <?php echo esc_attr($atts['time_line_style']) ?>">
        <div class="swiper-container swiper__timeline">
            <?php if($atts['time_line_style'] == 'style_one'): ?>
        <div class="swiper-button-next">
            <div class="border_one sme"></div>
        </div>
      <div class="swiper-button-prev">
      <div class="border_two sme"></div>
      </div>
      <?php endif; ?>
          <div class="swiper-wrapper">
          <?php if(!empty($timeline_content_repeaters)): foreach($timeline_content_repeaters as $key => $timeline_content): 
              $image  = ! empty( $timeline_content['image'] ) ? $timeline_content['image'] : ''; 
              $image_put = wp_get_attachment_image_src( intval( $image ), 'full' );
              $image_get          = $image_put ? $image_put[0] : '';
              $link_href = '';
              $link_target = '';
              if ( ! empty( $timeline_content['link_box'] ) ) {
              $link            = vc_build_link( $timeline_content['link_box'] );
              $link_href           = $link['url'];
              $link_target = $link['target'];
              } 
                ?>
                          <?php if($atts['time_line_style'] == 'style_one'): ?>
                <div class="swiper-slide">
                    <div class="time_line_box">
                        <div class="time_inner">
                        <div class="border_liner">
                            <span></span>
                            <span class="last"></span>
                        </div>
                            <div class="content">
                                <h2>
                                <a href="<?php echo esc_url($link_href); ?>" <?php if(!empty($link_target)):?> target="<?php echo esc_attr($link_target); ?>" <?php endif; ?>>
                                        <?php echo wp_kses($timeline_content['timeline_heading'] , $allowed_tags); ?>
                                    </a>
                                <h2>
                                    <p>      <?php echo wp_kses($timeline_content['timeline_description'] , $allowed_tags); ?></p>
                            </div>
                            <div class="year">
                            <?php echo wp_kses($timeline_content['timeline_date'] , $allowed_tags); ?>
                            </div>
                            <?php if(!empty($image_get)): ?>
                            <div class="image">
                                <img src="<?php echo esc_url($image_get); ?>" alt="img" />
                            </div>
                            <?php endif; ?>
                    </div>
                </div>
                </div>
                <?php endif; ?>
            <?php endforeach; endif; ?>
            </div>
        </div>
    </section>
<?php
return ob_get_clean();
}
