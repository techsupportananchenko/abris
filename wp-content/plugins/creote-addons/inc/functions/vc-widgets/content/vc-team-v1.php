<?php
add_action( 'vc_before_init', 'vc_team_v1_vcmap' );
function vc_team_v1_vcmap() {
 vc_map( array(
  "name" => __( "Team  V1", "creote-addons" ),
  "base" => "vc_team_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
        'type'       => 'dropdown',
        'heading'    => esc_html__( 'Team Styles', 'creote-addons' ),
        'param_name' => 'team_styles',
        'value'      => array(
            esc_html__( 'Style One', 'creote-addons' )  => 'style_one',
            esc_html__( 'Style Two', 'creote-addons' )  => 'style_two',
        ),
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'attach_image',
        'heading' => esc_html__('Member Image', 'creote-addons') ,
        'param_name' => 'member_image',
        'value' => '',
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Member Name', 'creote-addons') ,
        'param_name' => 'member_name',
        'value' => esc_html__('Amelia Margaret', 'creote-addons') ,
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Member Designation', 'creote-addons') ,
        'param_name' => 'member_designation', 
        'value' => esc_html__('Director', 'creote-addons') ,
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('About Member', 'creote-addons') ,
        'param_name' => 'about_member', 
        'value' => esc_html__('Director', 'creote-addons') ,
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'team_styles',
            'value'   => 'style_two',
          ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Button Text', 'creote-addons') ,
        'param_name' => 'button_text',
        'value' => 'View Profile',
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'vc_link',
        'heading' => esc_html__('Link', 'creote-addons') ,
        'param_name' => 'button_link',
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'param_group',
        'heading' => esc_html__('Social Media Content', 'creote-addons') ,
        'value' => '',
        'param_name' => 'social_media_repeater',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Social Media Name', 'creote-addons') ,
                'param_name' => 'media_text',
                'value' => esc_html__('fa fa-facebook', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Social Media Link', 'creote-addons') ,
                'param_name' => 'media_link',
                'value' => __('#', 'creote-addons'),
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
add_shortcode( 'vc_team_v1_init', 'vc_team_v1' );
function vc_team_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'team_styles' => 'style_one',
      'member_image'  => '',
      'member_name'  => 'Amelia Margaret',
      'member_designation'   => 'Director',
      'about_member'   => '',
      'button_text'   => 'View Profile',
      'button_link'   => '#',
      'social_media_repeater'  => '',
      'transitions_enable'  => '',
      'transitions'  => '',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$social_media_repeaters = function_exists( 'vc_param_group_parse_atts' ) ? vc_param_group_parse_atts( $atts['social_media_repeater'] ) : array();
$member_image = wp_get_attachment_image_src( intval( $atts['member_image'] ), 'full' );
$member_images           = $member_image ? $member_image[0] : '';
$button_link_href  = '';
$button_link_target  = '';
 if (!empty( $atts['button_link'])) {
   $button_link = vc_build_link($atts['button_link']);
   $button_link_href = $button_link['url'];
   $button_link_target = $button_link['target'];
}
ob_start();
?>
  <div class="team_box <?php echo esc_attr($atts['team_styles']); ?>" <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
        <?php if($atts['team_styles'] == 'style_one'):?>
            <?php // team one end   ?>
               <div class="team_box_outer">
                   <?php if(!empty($member_images)): ?>
                    <div class="member_image">
                        <img src="<?php echo esc_attr($member_images ); ?>" alt="team image" />
                    </div>
                    <?php endif; ?>
                    <div class="about_member">
                        <div class="share_media">
                            <ul class="first">
                            <li class="text"><?php echo esc_html('Share' , 'creote-addons'); ?></li>
                                <li><i class="fa fa-share-alt"></i></li>
                           </ul>
                            <ul>
                            <li class="shar_alt"><i class="fa fa-share-alt"></i></li>
                            <?php if(!empty($social_media_repeaters)): foreach($social_media_repeaters as $social_media_repeater):   ?>
                                <li><a href="<?php echo esc_url($social_media_repeater['media_link']); ?>"> <i class="<?php echo esc_attr($social_media_repeater['media_text']); ?>"> </i> </a></li>
                            <?php endforeach; endif; ?>
                            </ul>
                        </div>
                        <div class="authour_details">
                            <span><?php echo esc_attr($atts['member_designation']); ?> </span>
                            <h6><?php echo esc_attr($atts['member_name']); ?></h6>
                            <div class="button_view"> 
                            <a href="<?php echo esc_url($button_link_href); ?>"  <?php if(!empty($button_link_target)):?> target="<?php echo esc_attr($button_link_target); ?>" <?php endif; ?>  class="theme-btn one">
                                    <?php echo esc_html($atts['button_text']);?>
                                </a>
                            </div>
                        </div>
                    </div>
               </div>
               <?php // team one end   ?>
               <?php elseif($atts['team_styles'] == 'style_two'):?>
        <div class="team_box_outer">
                                    <div class="image_box ">
                                    <?php if(!empty($member_images)): ?>
                                        <img src="<?php echo esc_attr($member_images ); ?>" alt="team image" />
                                        <?php endif; ?>
                                        <div class="overlay ">
                                            <?php if(!empty($atts['button_text'])): ?>
                                                <a href="<?php echo esc_url($button_link_href); ?>"  <?php if(!empty($button_link_target)):?> target="<?php echo esc_attr($button_link_target); ?>" <?php endif; ?>  class="read_m">  
                                           <?php echo esc_html($atts['button_text']);?> <i class="icon-right-arrow"></i></a>
                                           <?php endif; ?>
                                            <ul>
                                            <?php if(!empty($social_media_repeaters)): foreach($social_media_repeaters as $social_media_repeater):   ?>
                                <li><a href="<?php echo esc_url($social_media_repeater['media_link']); ?>"> <i class="<?php echo esc_attr($social_media_repeater['media_text']); ?>"> </i> </a></li>
                            <?php endforeach; endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="content_box ">
                                    <?php if(!empty($atts['member_name'])): ?>
                                        <h2>     <a href="<?php echo esc_url($button_link_href); ?>"  <?php if(!empty($button_link_target)):?> target="<?php echo esc_attr($button_link_target); ?>" <?php endif; ?>>
                                        <?php echo esc_attr($atts['member_name']); ?></a></h2>
                                        <?php endif; ?>
                                        <?php if(!empty($atts['member_designation'])): ?>
                                        <p class="job_details"><?php echo esc_attr($atts['member_designation']); ?> </p>
                                        <?php endif; ?>
                                        <?php if(!empty($atts['about_member'])): ?>
                                        <p><?php echo wp_kses($atts['about_member'] , $allowed_tags); ?> </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
        <?php endif; ?> 
        </div>
<?php
return ob_get_clean();
}
