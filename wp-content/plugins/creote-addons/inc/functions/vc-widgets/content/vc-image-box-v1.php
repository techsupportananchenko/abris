<?php
add_action( 'vc_before_init', 'vc_image_box_v1_vcmap' );
function vc_image_box_v1_vcmap() {
 vc_map( array(
  "name" => __( "Image Box V1", "creote-addons" ),
  "base" => "vc_image_box_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
    'type'       => 'dropdown',
    'heading'    => esc_html__( 'Image Box Styles', 'creote-addons' ),
    'param_name' => 'image_box_styles',
    'value'      => array(
        esc_html__( 'Style One', 'creote-addons' )  => 'style_one',
        esc_html__( 'Style Two', 'creote-addons' )  => 'style_two',
        esc_html__( 'Style Three', 'creote-addons' )  => 'style_three',
        esc_html__( 'Style Four', 'creote-addons' )  => 'style_four',
    ),
    'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'attach_image',
        'heading' => esc_html__('Image One', 'creote-addons') ,
        'param_name' => 'image_one',
        'value' => '',
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'image_box_styles',
            'value'   => 'style_one',
          ),
     ),
     array(
        'type' => 'attach_image',
        'heading' => esc_html__('Image Two', 'creote-addons') ,
        'param_name' => 'image_two',
        'value' => '',
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'image_box_styles',
            'value'   => 'style_one',
          ),
     ),
     array(
        'type' => 'attach_image',
        'heading' => esc_html__('Image One', 'creote-addons') ,
        'param_name' => 'image_two_one',
        'value' => '',
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'image_box_styles',
            'value'   => 'style_two',
          ),
     ),
     array(
        'type' => 'attach_image',
        'heading' => esc_html__('Image Two', 'creote-addons') ,
        'param_name' => 'image_two_two',
        'value' => '',
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'image_box_styles',
            'value'   => 'style_two',
          ),
     ),
     array(
        'type' => 'attach_image',
        'heading' => esc_html__('Image', 'creote-addons') ,
        'param_name' => 'image_three',
        'value' => '',
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'image_box_styles',
            'value'   => 'style_three',
          ),
     ),
     array(
        'type' => 'textfield',
        'heading' => esc_html__('Image', 'creote-addons') ,
        'param_name' => 'img_height',
        'value' => esc_html__('400px', 'creote-addons') ,
        'description' => esc_html__('you Can set the image height here eg: (100px , 10rem  or 10rem) like this', 'creote-addons'),
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'image_box_styles',
            'value'   => 'style_three',
          ),
     ),
     array(
        'type' => 'attach_image',
        'heading' => esc_html__('Image One', 'creote-addons') ,
        'param_name' => 'image_four_one',
        'value' => '',
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'image_box_styles',
            'value'   => 'style_four',
          ),
     ),
     array(
        'type' => 'attach_image',
        'heading' => esc_html__('Image Two', 'creote-addons') ,
        'param_name' => 'image_four_two',
        'value' => '',
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'image_box_styles',
            'value'   => 'style_four',
          ),
     ),
     array(
        'type' => 'attach_image',
        'heading' => esc_html__('Image Three', 'creote-addons') ,
        'param_name' => 'image_four_three',
        'value' => '',
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'image_box_styles',
            'value'   => 'style_four',
          ),
     ),
     array(
        'type' => 'attach_image',
        'heading' => esc_html__('Background Image', 'creote-addons') ,
        'param_name' => 'background_image',
        'value' => '',
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'image_box_styles',
            'value'   => 'style_two',
          ),
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
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'video_link_enable',
            'value'   => 'yes',
        ),
    ),
    array(
        'type'        => 'checkbox',
        'heading'     => esc_html__( 'Experience Enable / Disable', 'creote-addons' ),
        'param_name'  => 'experience_enable',
        'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'image_box_styles',
            'value'   => 'style_one',
        ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Years', 'creote-addons') ,
        'param_name' => 'years',
        'group' => esc_html__('General', 'creote-addons') ,
        'value' =>  esc_html__( '25' , 'creote-addons'),
        'dependency'  => array(
            'element' => 'image_box_styles',
            'value'   => 'style_one',
        ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Years Text', 'creote-addons') ,
        'param_name' => 'year_title',
        'group' => esc_html__('General', 'creote-addons') ,
        'value' =>  esc_html__( 'Year Of Experience We Just Achived' , 'creote-addons'),
        'dependency'  => array(
            'element' => 'image_box_styles',
            'value'   => 'style_one',
        ),
    ),
    array(
        'type'        => 'checkbox',
        'heading'     => esc_html__( 'Experience Enable / Disable', 'creote-addons' ),
        'param_name'  => 'four_experience_enable',
        'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'image_box_styles',
            'value'   => 'style_four',
        ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Experience', 'creote-addons') ,
        'param_name' => 'years_four',
        'group' => esc_html__('General', 'creote-addons') ,
        'value' =>  esc_html__( '30+ Years Of Experience' , 'creote-addons'),
        'dependency'  => array(
            'element' => 'image_box_styles',
            'value'   => 'style_one',
        ),
    ),
    array(
        'type'        => 'checkbox',
        'heading'     => esc_html__( 'Author Enable / Disable', 'creote-addons' ),
        'param_name'  => 'quotes_enable',
        'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'image_box_styles',
            'value'   => 'style_two',
        ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Quote', 'creote-addons') ,
        'param_name' => 'quotes',
        'value' => esc_html__('Making What’s Possible in
        Human Resource', 'creote-addons') ,
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'image_box_styles',
            'value'   => 'style_two',
        ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Name', 'creote-addons') ,
        'value' => esc_html__('/  Liam Oliver', 'creote-addons') ,
        'param_name' => 'name',
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'image_box_styles',
            'value'   => 'style_two',
        ),
    ),
    array(
        'type'        => 'checkbox',
        'heading'     => esc_html__( 'Border Enable / Disable', 'creote-addons' ),
        'param_name'  => 'border_enable',
        'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'image_box_styles',
            'value'   => 'style_three',
        ),
    ),
)));
}
// shortcode
add_shortcode( 'vc_image_box_v1_init', 'vc_image_box_v1' );
function vc_image_box_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'image_box_styles' => 'style_one',
      'image_one' => '',
      'image_two' => '',
      'image_two_one' => '',
      'image_two_two' => '',
      'image_three' => '',
      'image_four_one' => '',
      'image_four_two' => '',
      'image_four_three' => '',
      'img_height' => '',
      'four_experience_enable' => '',
      'years_four' => '30+ Years Of Experience',
      'background_image' => '',
      'video_link_enable' => '',
      'video_link' => '',
      'experience_enable' => '',
      'years' => '25',
      'year_title' => 'Year Of Experience We Just Achived',
      'quotes_enable' => '',
      'quotes' => 'Making What’s Possible in
      Human Resource',
      'name' => '/  Liam Oliver',
      'border_enable' => 'yes',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$image_one = wp_get_attachment_image_src( intval( $atts['image_one'] ), 'full' );
$image_ones           = $image_one ? $image_one[0] : '';
$image_two = wp_get_attachment_image_src( intval( $atts['image_two'] ), 'full' );
$image_twos           = $image_two ? $image_two[0] : '';
$image_two_one = wp_get_attachment_image_src( intval( $atts['image_two_one'] ), 'full' );
$image_two_ones           = $image_two_one ? $image_two_one[0] : '';
$image_two_two = wp_get_attachment_image_src( intval( $atts['image_two_two'] ), 'full' );
$image_two_twos           = $image_two_two ? $image_two_two[0] : '';
$image_three = wp_get_attachment_image_src( intval( $atts['image_three'] ), 'full' );
$image_threes           = $image_three ? $image_three[0] : '';
$image_four_one = wp_get_attachment_image_src( intval( $atts['image_four_one'] ), 'full' );
$image_four_ones           = $image_four_one ? $image_four_one[0] : '';
$image_four_two = wp_get_attachment_image_src( intval( $atts['image_four_two'] ), 'full' );
$image_four_twos           = $image_four_two ? $image_four_two[0] : '';
$image_four_three = wp_get_attachment_image_src( intval( $atts['image_four_three'] ), 'full' );
$image_four_threes           = $image_four_three ? $image_four_three[0] : '';
$background_image = wp_get_attachment_image_src( intval( $atts['background_image'] ), 'full' );
$background_images           = $background_image ? $background_image[0] : '';
$img_height  = $atts['img_height'];
$img_height    = ! empty( $img_height ) ? "height: $img_height!important;" : '';
$style_css  = "style='$img_height'";
ob_start();
?>
    <?php if($atts['image_box_styles'] == 'style_one'):?>
            <div class="image_boxes style_one">
                <?php if(!empty($image_ones)): ?>
                <div class="image one">
                    <img src="<?php echo esc_url($image_ones); ?>" class="img" alt="image" />
                </div>
                <?php endif; ?>
                <?php if(!empty($image_twos)): ?>
                <div class="image two">
                    <img src="<?php echo esc_url($image_twos); ?>" class="img" alt="image" />
                    <?php if($atts['video_link_enable'] == true): ?>
                <div class="video_box">
                    <a href="<?php echo esc_attr($atts['video_link']); ?>" class="lightbox-image"><i class="icon-play"></i></a>
                </div>
                <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php if($atts['experience_enable'] == 'yes'): ?>
                <div class="year_of_experience">
                    <div class="year">
                            <?php echo esc_attr($atts['years']); ?>
                    </div>
                    <div class="content">
                        <h2>   <?php echo esc_attr($atts['year_title']); ?></h2>
                        <span class="icon-thumbs-up"></span>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php elseif($atts['image_box_styles'] == 'style_two'):?>
            <div class="image_boxes style_two">
                <?php if(!empty($background_images)): ?>
                    <img src="<?php echo esc_url($background_images); ?>" class="background_image" alt="image" />
                <?php endif; ?>
                <?php if(!empty($image_two_ones)): ?>
                <div class="image one">
                    <img src="<?php echo esc_url($image_two_ones); ?>" class="img" alt="image" />
                </div>
                <?php endif; ?>
                <?php if(!empty($image_two_twos)): ?>
                <div class="image two">
                    <img src="<?php echo esc_url($image_two_twos); ?>" class="img" alt="image" />
                    <?php if($atts['video_link_enable'] == true): ?>
                <div class="video_box">
                    <a href="<?php echo esc_attr($atts['video_link']); ?>" class="lightbox-image"><i class="icon-play"></i></a>
                </div>
                <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php if($atts['quotes_enable'] == 'yes'): ?>
                <div class="authour_quotes">
                        <i class="icon-quote"></i>
                        <h6>    <?php echo esc_attr($atts['quotes']); ?></h6>
                        <p>   <?php echo esc_attr($atts['name']); ?></p>
                </div>
                <?php endif; ?>
            </div>
            <?php elseif($atts['image_box_styles'] == 'style_three'):?>
            <div class="image_boxes style_three <?php if($atts['border_enable'] == 'yes'): ?> border_yes <?php endif; ?>" <?php echo __($img_height); ?>>
                <?php if(!empty($image_threes)): ?>
                    <img src="<?php echo esc_url($image_threes); ?>" class="background_image" alt="image" <?php echo __($img_height); ?> />
                    <?php if($atts['video_link_enable'] == true): ?>
                <div class="video_box">
                    <a href="<?php echo esc_attr($atts['video_link']); ?>" class="lightbox-image"><i class="icon-play"></i></a>
                </div>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php elseif($atts['image_box_styles'] == 'style_four'):?>
        <div class="image_boxes style_four"> 
        <?php if(!empty($image_four_ones)): ?>
            <div class="image_box one">
                <img src="<?php echo esc_url($image_four_ones); ?>" class="img-fluid" alt="about">
            </div>
            <?php endif; ?>
            <div class="image_box">
                <div class="row">
                <?php if(!empty($image_four_twos)): ?>
                    <div class="col-lg-6 pad_zero_left">
                        <div class="imgs">
                        <img src="<?php echo esc_url($image_four_twos); ?>" class="img-fluid one_img" alt="about">
                    </div>    </div>
                    <?php endif; ?>
                    <?php if(!empty($image_four_threes)): ?>
                    <div class="col-lg-6 pad_zero_right">
                    <div class="imgs">
                        <img src="<?php echo esc_url($image_four_threes); ?>" class="img-fluid one_img" alt="about">
                    </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if(!empty($atts['four_experience_enable'])): ?>
            <div class="image_content_inner  <?php if($atts['video_link_enable'] == true): ?> viceo_en  <?php endif; ?>">
                <h2> <?php echo wp_kses($atts['years_four'] , $allowed_tags); ?></h2>
                <?php if($atts['video_link_enable'] == true): ?>
                <div class="video_box_null">
                    <a href="<?php echo esc_attr($atts['video_link']); ?>" class="lightbox-image"><i class="icon-play"></i></a>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endif;?> 
<?php
return ob_get_clean();
}
