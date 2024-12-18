<?php
add_action( 'vc_before_init', 'vc_call_to_action_vcmap' );
function vc_call_to_action_vcmap() {
 vc_map( array(
  "name" => __( "Call to Action V1", "creote-addons" ),
  "base" => "vc_call_to_action_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
    'type'       => 'dropdown',
    'heading'    => esc_html__( 'Call To Action style', 'creote-addons' ),
    'param_name' => 'call_to_action_styles',
    'value'      => array(
        esc_html__( 'Style One', 'creote-addons' )  => 'style_one',
        esc_html__( 'Style Two', 'creote-addons' )  => 'style_two',
    ),
    'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Small Title', 'creote-addons') ,
        'param_name' => 'sm_title',
        'value' =>esc_html__('Need Some Help?', 'creote-addons') , 
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'call_to_action_styles',
            'value'   => 'style_one',
        ),
    ),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Title', 'creote-addons') ,
        'param_name' => 'title',
        'value' =>esc_html__('Need Some Help?', 'creote-addons') , 
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Description', 'creote-addons') ,
        'param_name' => 'description',
        'value' =>esc_html__('Whether you’re stuck or just want some tips on where to start, hit up our experts anytime.', 'creote-addons') , 
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'call_to_action_styles',
            'value'   => 'style_one',
        ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Button Text', 'creote-addons') ,
        'param_name' => 'button_text',
        'value' =>esc_html__('Contact Us', 'creote-addons') , 
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'call_to_action_styles',
            'value'   => 'style_one',
        ),
    ),
    array(
        'type' => 'vc_link',
        'heading' => esc_html__('Link', 'creote-addons') ,
        'param_name' => 'button_link',
        'value' => '#',
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'call_to_action_styles',
            'value'   => 'style_one',
        ),
    ) ,
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Icon Fonts', 'creote-addons') ,
        'param_name' => 'icon_fonts',
        'value'       => vc_get_creote_icons(),
        'group' => esc_html__('General', 'creote-addons') ,
      ),
      array(
        'type' => 'textfield',
        'heading' => esc_html__('Contact Title', 'creote-addons') ,
        'param_name' => 'contact_title',
        'value' =>esc_html__('Contact Us Soon', 'creote-addons') , 
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Mail Id', 'creote-addons') ,
        'param_name' => 'mail_id',
        'value' =>esc_html__('creote@support.com', 'creote-addons') , 
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Phone Number', 'creote-addons') ,
        'param_name' => 'phone_num',
        'value' =>esc_html__('16599349993', 'creote-addons') , 
        'group' => esc_html__('General', 'creote-addons') ,
    ),
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
        'type' => 'attach_image',
        'heading' => esc_html__('Image', 'creote-addons') ,
        'param_name' => 'image',
        'value' => '',
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'call_to_action_styles',
            'value'   => 'style_two',
          ),
     ),
     array(
        'type' => 'textfield',
        'heading' => esc_html__('Image  Margin', 'creote-addons') ,
        'param_name' => 'image_mar_st_two',
        'value' => '0px 0px 0px 0px',
        'group' => esc_html__('General', 'creote-addons'),
        'dependency'  => array(
            'element' => 'call_to_action_styles',
            'value'   => 'style_two',
          ),
      ),
     array(
        'type' => 'attach_image',
        'heading' => esc_html__('Background Image', 'creote-addons') ,
        'param_name' => 'background_left',
        'value' => '',
        'group' => esc_html__('General', 'creote-addons') ,
     ),
)));
}
// shortcode
add_shortcode( 'vc_call_to_action_init', 'vc_call_to_action_v1' );
function vc_call_to_action_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'call_to_action_styles' => 'style_one',
      'sm_title' => 'Need Some Help?',
      'title' => 'Need Some Help?' , 
      'description' => 'Whether you’re stuck or just want some tips on where to start, hit up our experts anytime.' , 
      'button_text' => 'Contact Us',
      'button_link' => '#',
      'icon_fonts' => 'fa fa-envelope',
      'contact_title' => 'Contact Us Soon',
      'mail_id' => 'creote@support.com',
      'phone_num' => '16599349993',
      'video_link_enable' => 'yes',
      'video_link' => '#',
      'image_mar_st_two'  => '0 0 0 0',
      'image'  => '',
      'background_left'  => '',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$background_image = wp_get_attachment_image_src( intval( $atts['background_left'] ), 'full' );
$bg_image           = $background_image ? $background_image[0] : '';
$image_one = wp_get_attachment_image_src( intval( $atts['image'] ), 'full' );
$image           = $image_one ? $image_one[0] : '';
$button_link_href  = '';
$button_link_target  = '';
 if (!empty( $atts['button_link'])) {
   $button_link = vc_build_link($atts['button_link']);
   $button_link_href = $button_link['url'];
   $button_link_target = $button_link['target'];
}
$image_mar_st_two  = $atts['image_mar_st_two'];
$image_mar_st_two    = ! empty( $image_mar_st_two ) ? "margin: $image_mar_st_two!important;" : '';
$style  = "style='$image_mar_st_two'";
ob_start();
?>
<?php if($atts['call_to_action_styles'] == 'style_one'): ?>
    <div class="call_to_action  style_one">
<?php if(!empty($bg_image)): ?> 
        <div class="image parallax_cover">
            <img src="<?php echo esc_url($bg_image); ?>" class="cover-parallax" alt="image" />
        </div>
    <?php endif; ?>
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-12">
    <div class="left_content">
        <div class="main_content">
        <?php if($atts['video_link_enable'] == true): ?>
            <div class="video_box">
                <a href="<?php echo esc_attr($atts['video_link']); ?>" class="lightbox-image"><i class="icon-play"></i></a>
            </div>
        <?php endif; ?>
            <h6><?php echo esc_html($atts['sm_title']);?></h6>
            <h1><?php echo wp_kses($atts['title'] , $allowed_tags);?></h1>
            <p><?php echo esc_html($atts['description']);?></p>
            <div class="bottom_content">
                <div class="button_content">
                <a href="<?php echo esc_url($button_link_href); ?>"  <?php if(!empty($button_link_target)):?> target="<?php echo esc_attr($button_link_target); ?>" <?php endif; ?> class="theme-btn three">
                        <?php echo esc_html($atts['button_text']);?><i class="icon-right-arrow-long"></i>
                    </a>
                </div>
                <div class="call_content">
                        <span class="<?php echo esc_html($atts['icon_fonts']);?> icon"></span>
                        <div class="content_bx">
                            <h2><?php echo esc_html($atts['contact_title']);?></h2>
                            <p><?php echo esc_html($atts['mail_id']); ?> <?php echo esc_html('&' , 'creote-addons'); ?> <?php echo esc_html($atts['phone_num']); ?></p>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>
</div>
<?php elseif($atts['call_to_action_styles'] == 'style_two'): ?>
    <div class="call_to_action  style_two">
    <?php if(!empty($bg_image)): ?> 
        <div class="image parallax_cover">
            <img src="<?php echo esc_url($bg_image); ?>" class="cover-parallax" alt="image" />
        </div>
    <?php endif; ?>
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8">
    <div class="left_content">
        <div class="main_content">
            <h1><?php echo wp_kses($atts['title'] , $allowed_tags);?></h1>
            <div class="bottom_content">
                <div class="call_content">
                        <span class="<?php echo esc_html($atts['icon_fonts']);?> icon"></span>
                        <div class="content_bx">
                            <h2><?php echo wp_kses($atts['contact_title'] , $allowed_tags);?></h2>
                            <p><?php echo esc_html($atts['mail_id']); ?> <?php echo esc_html('&' , 'creote-addons'); ?> <?php echo esc_html($atts['phone_num']); ?></p>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-lg-4">
    <?php if(!empty($image)): ?> 
    <div class="image_right" <?php echo __($style); ?>>
            <img src="<?php echo esc_url($image); ?>"  alt="image" />
        </div>
        <?php endif; ?>
</div>
    </div>
</div>
</div>
<?php endif; ?>
<?php
return ob_get_clean();
}
