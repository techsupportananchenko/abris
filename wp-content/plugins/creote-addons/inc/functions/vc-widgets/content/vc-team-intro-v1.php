<?php
add_action( 'vc_before_init', 'vc_team_intro_v1_vcmap' );
function vc_team_intro_v1_vcmap() {
 vc_map( array(
  "name" => __( "Team Intro V1", "creote-addons" ),
  "base" => "vc_team_intro_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
        'type' => 'attach_image',
        'heading' => esc_html__('Image', 'creote-addons') ,
        'param_name' => 'team_intro_image',
        'value' => '',
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Image Height', 'creote-addons') ,
        'param_name' => 'image_width',
        'value' => '500px',
        'description' => esc_html__('Enter image Width eg(400px) like this', 'creote-addons') ,
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Image Margin', 'creote-addons') ,
        'param_name' => 'image_margin',
        'value' => '20px 20px 20px 20px',
        'description' => esc_html__('Enter image Margin eg(20px 20px 20px 20px) like this', 'creote-addons') ,
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Intro Sub Title', 'creote-addons') ,
        'param_name' => 'team_intro_sub_title',
        'value' => 'Strong Team',
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Intro  Title', 'creote-addons') ,
        'param_name' => 'team_intro_title',
        'value' => 'Foundation of Business',
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Intro Quotes', 'creote-addons') ,
        'param_name' => 'intro_quotes',
        'value' => 'Teamwork is the secret that makes common people achieve  uncommon results.',
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'attach_image',
        'heading' => esc_html__('Signature', 'creote-addons') ,
        'param_name' => 'authour_sign',
        'value' => '',
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Authour Name', 'creote-addons') ,
        'param_name' => 'authour_name',
        'value' => 'Liam Oliver ,',
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Authour Position', 'creote-addons') ,
        'param_name' => 'authour_position',
        'value' => 'Founder & CEO of Qetus,',
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'attach_image',
        'heading' => esc_html__('Background Image', 'creote-addons') ,
        'param_name' => 'background_image',
        'value' => '',
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
add_shortcode( 'vc_team_intro_v1_init', 'vc_team_intro_v1' );
function vc_team_intro_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'team_intro_image' => '',
      'image_width'  => '',
      'image_margin'  => '',
      'team_intro_sub_title'   => 'Strong Team',
      'team_intro_title'   => 'Foundation of Business',
      'intro_quotes'   => 'Teamwork is the secret that makes common people achieve  uncommon results.',
      'authour_sign'  => '',
      'authour_name'  => 'Liam Oliver',
      'authour_position'  => 'Founder & CEO of Qetus',
      'background_image'  => '',
      'transitions_enable'  => '',
      'transitions'  => '',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$image_width  = $atts['image_width'];
$image_width    = ! empty( $image_width ) ? "height: $image_width!important;" : '';
$image_margin  = $atts['image_margin'];
$image_margin    = ! empty( $image_margin ) ? "margin: $image_margin!important;" : '';
$style_css  = "style='$image_margin'";
$height  = "style='$image_width'";
$background_image = wp_get_attachment_image_src( intval( $atts['background_image'] ), 'full' );
$background_images           = $background_image ? $background_image[0] : '';
$team_intro_image = wp_get_attachment_image_src( intval( $atts['team_intro_image'] ), 'full' );
$team_intro_images           = $team_intro_image ? $team_intro_image[0] : '';
$authour_sign = wp_get_attachment_image_src( intval( $atts['authour_sign'] ), 'full' );
$authour_signs           = $authour_sign ? $authour_sign[0] : '';
ob_start();
?>
<div class="team_intro_box" <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
  <div class="team_intro_inner">
  <?php if(!empty($background_images)): ?> 
      <div class="image parallax_cover">
          <img src="<?php echo esc_url($background_images); ?>" class="cover-parallax" alt="image" />
      </div>
  <?php endif; ?>
      <div class="team_intro_start">
          <div class="row">
              <div class="col-lg-8">
                  <div class="left_content"> 
                      <div class="title">
                          <h6><?php echo wp_kses($atts['team_intro_sub_title'], $allowed_tags);?></h6>
                          <h1><?php echo wp_kses($atts['team_intro_title'], $allowed_tags);?></h1>
                      </div>
                      <div class="quotes">
                          <span class="icon-quote"></span>
                          <h5><?php echo wp_kses($atts['intro_quotes'], $allowed_tags);?></h5>
                      </div>
                      <div class="authour_dtls">
                      <?php if(!empty($authour_signs)): ?> 
                          <img src="<?php echo esc_url($authour_signs); ?>" class="sign" alt="image" />
                      <?php endif; ?>
                       <h4><?php echo wp_kses($atts['authour_name'], $allowed_tags);?>
                       <?php if(!empty($atts['authour_position'])): ?> 
                        <span><?php echo wp_kses($atts['authour_position'], $allowed_tags);?></span>
                       <?php endif; ?>
                      </h4>
                  </div>
                </div>
            </div>
            <div class="col-lg-4">
            </div>
        </div>
      </div>
  </div>
  <?php if(!empty($team_intro_images)): ?> 
    <div class="image_right" <?php echo __($style_css); ?>>
        <img src="<?php echo esc_url($team_intro_images); ?>"  alt="image" <?php echo __($height); ?> />
    </div>
  <?php endif; ?>
</div>
<?php
return ob_get_clean();
}
