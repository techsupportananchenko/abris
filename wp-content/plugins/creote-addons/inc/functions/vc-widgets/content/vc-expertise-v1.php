<?php
add_action( 'vc_before_init', 'vc_expertis_box_vcmap' );
function vc_expertis_box_vcmap() {
 vc_map( array(
  "name" => __( "Expertise V1", "creote-addons" ),
  "base" => "vc_expertis_box_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
        'type'        => 'checkbox',
        'heading'     => esc_html__( 'Video Enable / Disable', 'creote-addons' ),
        'param_name'  => 'video_link_enable',
        'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
        'group' => esc_html__('General', 'creote-addons') ,
      ),
      array(
        'type' => 'textfield',
        'heading' => esc_html__('Video Link', 'creote-addons') ,
        'param_name' => 'video_link',
        'value' =>esc_html__('#', 'creote-addons') , 
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'video_link_enable',
            'value'   => 'yes',
        ),
    ),
    array(
        'type'        => 'checkbox',
        'heading'     => esc_html__( 'Title Enable / Disable', 'creote-addons' ),
        'param_name'  => 'title_enable',
        'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
        'group' => esc_html__('General', 'creote-addons') ,
      ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Heading', 'creote-addons') ,
        'param_name' => 'heading',
        'value' => esc_html__('Recruitment Process', 'creote-addons') ,
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'title_enable',
            'value'   => 'yes',
        ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Description', 'creote-addons') ,
        'param_name' => 'description',
        'value' => esc_html__('These cases are perfectly simple and easy to distinguish.', 'creote-addons') ,
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'title_enable',
            'value'   => 'yes',
        ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Button Text', 'creote-addons') ,
        'param_name' => 'button_text',
        'value' => esc_html__('Read more', 'creote-addons') ,
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'title_enable',
            'value'   => 'yes',
        ),
    ),
    array(
        'type' => 'vc_link',
        'heading' => esc_html__('Link', 'creote-addons') ,
        'param_name' => 'button_link',
        'value' => '#',
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'title_enable',
            'value'   => 'yes',
        ),
    ) ,
    array(
        'type' => 'param_group',
        'heading' => esc_html__('Expertise Content', 'creote-addons') ,
        'value' => '',
        'param_name' => 'expertise_repeater_g',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Step Number', 'creote-addons') ,
                'param_name' => 'step_no',
                'value' => esc_html__('01', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title', 'creote-addons') ,
                'param_name' => 'title',
                'value' => esc_html__('Payroll Management', 'creote-addons') ,
            ),
            array(
                'type' => 'vc_link',
                'heading' => esc_html__('link', 'creote-addons') ,
                'param_name' => 'link', 
            ),
        ),
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'attach_image',
        'heading' => esc_html__('Background Image', 'creote-addons') ,
        'param_name' => 'background_image',
        'value' => '',
        'group' => esc_html__('Style', 'creote-addons') ,
     ),
)));
}
// shortcode
add_shortcode( 'vc_expertis_box_init', 'vc_expertis_box_v1' );
function vc_expertis_box_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
    'video_link_enable' => '',
    'video_link' => '',
    'title_enable' => '',
    'heading' => 'Recruitment Process',
    'description' => 'These cases are perfectly simple and easy to distinguish.',
    'button_text' => 'Read more',
    'button_link' => '#',
    'expertise_repeater_g' => '',
    'background_image' => '',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$button_link = '';
$button_link_target = '';
if (!empty( $atts['button_link'])) {
$link            = vc_build_link( $atts['button_link'] );
$button_link           = $link['url'];
$button_link_target = $link['target'];
}
$expertise_repeater_gs = function_exists( 'vc_param_group_parse_atts' ) ? vc_param_group_parse_atts( $atts['expertise_repeater_g'] ) : array();
$background_image = wp_get_attachment_image_src( intval( $atts['background_image'] ), 'full' );
$bg_image           = $background_image ? $background_image[0] : '';
ob_start();
?>
 <div class="area_of_expertise">
      <?php if(!empty($bg_image)): ?> 
        <div class="image parallax_cover">
            <img src="<?php echo esc_url($bg_image); ?>" class="cover-parallax" alt="image" />
        </div>
    <?php endif; ?>
       <div class="title_and_video">
        <div class="auto-container">
            <div class="row">
                <?php if($atts['video_link_enable'] == true): ?>
                <div class="col-lg-4">
                    <div class="video_box">
                       <a href="<?php echo esc_attr($atts['video_link']); ?>" class="lightbox-image"><i class="icon-play"></i></a>
                    </div>
                </div>
                <?php endif; ?>
                <div class="col-lg-2"></div>
                <div class="col-lg-6">
                <div class="title_all_box style_one text-end">
               <div class="title_sections">
                  <?php if(!empty($atts['heading'])):?>
                  <h2>  <?php echo wp_kses($atts['heading'] , $allowed_tags) ?></h2>
                  <?php endif; ?>
                  <?php if(!empty($atts['description'])):?>
                  <p>  <?php echo wp_kses($atts['description'] , $allowed_tags) ?></p>
                  <?php endif; ?>
            </div>
            <?php if(!empty($atts['button_text'])): ?>
            <div class="theme_btn">
                <a href="<?php echo esc_url($button_link); ?>"  <?php if(!empty($button_link_target)):?> target="<?php echo esc_attr($button_link_target); ?>" <?php endif; ?> class="theme-btn one">
                    <?php echo esc_html($atts['button_text']);?>
                </a>
            </div>
            <?php endif; ?>
        </div>
                </div>
            </div>
        </div>
      </div>
      <div class="expertise">
                    <div class="auto-container">
                        <div class="row">
                        <?php if(!empty($expertise_repeater_gs)): foreach($expertise_repeater_gs as $key => $expertise_repeater):  ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 expertise_box">
                            <?php if(!empty($expertise_repeater['step_no'])): ?>
                            <div class="step_number">
                                <div><?php echo esc_attr($expertise_repeater['step_no']); ?></div>
                            </div>
                            <?php endif; ?>
                            <?php if(!empty($expertise_repeater['title'])): ?>
                            <h2 class="title">
                            <?php  
                            $button_link_two = '';
                            $button_link_two_target = '';
                            if (!empty( $expertise_repeater['button_link'])) {
                            $link_two            = vc_build_link( $expertise_repeater['button_link'] );
                            $button_link_two           = $link_two['url'];
                            $button_link_two_target = $link['target'];
                            }
                            ?>
            <a href="<?php echo esc_url($button_link_two); ?>"  <?php if(!empty($button_link_two_target)):?> target="<?php echo esc_attr($button_link_two_target); ?>" <?php endif; ?>>
              <?php echo esc_html($expertise_repeater['title']);?>
            </a>
                            </h2>
                            <?php endif; ?>
                        </div>    
                        <?php endforeach; endif;?>
                  </div>
                  </div>
      </div>
      </div>
<?php
return ob_get_clean();
}
