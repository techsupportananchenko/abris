<?php
add_action( 'vc_before_init', 'vc_extra_content_v1_vcmap' );
function vc_extra_content_v1_vcmap() {
 vc_map( array(
  "name" => __( "Extra Content V1", "creote-addons" ),
  "base" => "vc_extra_content_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
    'type'       => 'dropdown',
    'heading'    => esc_html__( 'Extra Content Types', 'creote-addons' ),
    'param_name' => 'extra_content_types',
    'value'      => array(
        esc_html__( 'Authour Box', 'creote-addons' )  => 'authour_box',
        esc_html__( 'Download Document', 'creote-addons' )  => 'download_docs',
        esc_html__( 'Authour Box Two', 'creote-addons' )  => 'authour_box_two',
        esc_html__( 'Image With Content', 'creote-addons' )  => 'image_with_content',
    ),
    'group' => esc_html__('General', 'creote-addons') ,
    ),
    // ------------------ authour
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Authour Text', 'creote-addons') ,
        'param_name' => 'authour_text',
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'extra_content_types',
            'value'   => 'authour_box',
          ),
    ),
    array(
      'type' => 'textarea',
      'heading' => esc_html__('Authour Text', 'creote-addons') ,
      'param_name' => 'authour_text_two',
      'group' => esc_html__('General', 'creote-addons') ,
      'dependency'  => array(
          'element' => 'extra_content_types',
          'value'   => 'authour_box_two',
        ),
  ),
  array(
    'type' => 'textarea',
    'heading' => esc_html__('Authour Description', 'creote-addons') ,
    'param_name' => 'description',
    'group' => esc_html__('General', 'creote-addons') ,
    'dependency'  => array(
        'element' => 'extra_content_types',
        'value'   => 'authour_box_two',
      ),
),
    array(
        'type' => 'attach_image',
        'heading' => esc_html__('Image', 'creote-addons') ,
        'param_name' => 'authour_image',
        'value' => '',
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'extra_content_types',
            'value'   => 'authour_box_two',
          ),
     ),
     array(
      'type' => 'attach_image',
      'heading' => esc_html__('Signature Image', 'creote-addons') ,
      'param_name' => 'sign_image',
      'value' => '',
      'group' => esc_html__('General', 'creote-addons') ,
      'dependency'  => array(
          'element' => 'extra_content_types',
          'value'   => 'authour_box',
        ),
   ),
   array(
    'type' => 'attach_image',
    'heading' => esc_html__('Signature Image', 'creote-addons') ,
    'param_name' => 'sign_image_two',
    'value' => '',
    'group' => esc_html__('General', 'creote-addons') ,
    'dependency'  => array(
        'element' => 'extra_content_types',
        'value'   => 'authour_box_two',
      ),
 ),
// ------------------ download
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Dowunload Text', 'creote-addons') ,
        'param_name' => 'download_text',
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'extra_content_types',
            'value'   => 'download_docs',
          ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Download Document Link', 'creote-addons') ,
        'param_name' => 'download_link',
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'extra_content_types',
            'value'   => 'download_docs',
          ),
    ),
    array(
      'type' => 'attach_image',
      'heading' => esc_html__('Image', 'creote-addons') ,
      'param_name' => 'img_tit',
      'value' => '',
      'group' => esc_html__('General', 'creote-addons') ,
      'dependency'  => array(
          'element' => 'extra_content_types',
          'value'   => 'image_with_content',
        ),
   ),
   array(
    'type' => 'textarea',
    'heading' => esc_html__('Title', 'creote-addons') ,
    'param_name' => 'title_img',
    'value' =>  esc_html__( 'Since 1998, <br> Operating in Birmingham. ' , 'creote-addons'),
    'group' => esc_html__('General', 'creote-addons') ,
    'dependency'  => array(
        'element' => 'extra_content_types',
        'value'   => 'image_with_content',
      ),
),
    array(
        'type'       => 'dropdown',
        'heading'    => esc_html__( 'Title Color Type ', 'creote-addons' ),
        'param_name' => 'dark_white',
        'value'      => array(
             esc_html__('Dark Color', 'creote-addons')  => 'dark_color', 
             esc_html__('Light Color', 'creote-addons')  => 'light_color',
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
add_shortcode( 'vc_extra_content_v1_init', 'vc_extra_content_v1' );
function vc_extra_content_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'extra_content_types' => 'authour_box',
      'authour_text' => '',
      'authour_image' => '',
      'authour_image_two' => '',
      'sign_image' => '',
      'sign_image_two' => '',
      'authour_text_two' => '',
      'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo',
      'img_tit' => '',
      'title_img' => 'Since 1998, <br> Operating in Birmingham.',
      'download_text' => 'Download our latest presentation',
      'download_link' => '#',
      'transitions_enable' => '',
      'transitions' => '',
      'dark_white' => 'dark_color',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$extra_content_types = $atts['extra_content_types'];
$attachment_image_one = wp_get_attachment_image_src( intval( $atts['authour_image'] ), 'full' );
$authour_image           = $attachment_image_one ? $attachment_image_one[0] : '';
$sign_image = wp_get_attachment_image_src( intval( $atts['sign_image'] ), 'full' );
$sign_image_one           = $sign_image ? $sign_image[0] : '';
$sign_image_two = wp_get_attachment_image_src( intval( $atts['sign_image_two'] ), 'full' );
$sign_image_twos           = $sign_image_two ? $sign_image_two[0] : '';
$img_tit = wp_get_attachment_image_src( intval( $atts['img_tit'] ), 'full' );
$img_tits           = $img_tit ? $img_tit[0] : '';
ob_start();
?>
<div class="extra_content <?php echo esc_attr($atts['extra_content_types']); ?> <?php echo esc_attr($atts['dark_white']); ?>" <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
       <?php if($extra_content_types == 'authour_box'):?>
           <div class="authour_box_content">
             <?php if(!empty($sign_image_one)): ?>
               <div class="image">
                 <img src="<?php echo esc_url($sign_image_one); ?>" class="img-fluid sign_image" alt="<?php esc_attr_e('authour Image', 'creote-addons'); ?>" />
               </div>
             <?php endif; ?>
             <?php if(!empty($atts['authour_text'])): ?>
             <div class="text">
                 <h6><?php echo wp_kses($atts['authour_text'] , $allowed_tags) ?></h6>
             </div>
             <?php endif; ?>
           </div>
       <?php elseif($atts['extra_content_types'] == 'download_docs'):?>
         <div class="download_box_content">
             <?php if(!empty($atts['download_text'])): ?>
                 <a href="<?php echo esc_url($atts['download_link']);?>" download>
                   <?php echo wp_kses($atts['download_text'] , $allowed_tags) ?>
                   <i class="icon-download-symbol"></i>
                 </a>
             <?php endif; ?>
           </div>
           <?php elseif($atts['extra_content_types'] == 'authour_box_two'):?>
            <div class="authour_box_content two">
              <?php if(!empty($authour_image)): ?>
                <div class="image">
                  <img src="<?php echo esc_url($authour_image); ?>" class="img-fluid authour_image" alt="<?php esc_attr_e('authour Image', 'creote-addons'); ?>" />
                </div>
              <?php endif; ?>
              <div class="text">
                  <?php if(!empty($atts['authour_text_two'])): ?>
                    <h6><?php echo wp_kses($atts['authour_text_two'] , $allowed_tags) ?></h6>
                  <?php endif; ?>
                  <?php if(!empty($atts['description'])): ?>
                    <p><?php echo wp_kses($atts['description'] , $allowed_tags) ?></p>
                  <?php endif; ?>
                <?php if(!empty($sign_image_twos)): ?>
                  <img src="<?php echo esc_url($sign_image_twos); ?>" class="img-fluid sign_image_two" alt="<?php esc_attr_e('authour Image', 'creote-addons'); ?>" />
              <?php endif; ?>
              </div>
            </div>
            <?php elseif($atts['extra_content_types'] == 'image_with_content'):?>
              <div class="simple_image">
              <?php if(!empty($img_tits)): ?>
                <img src="<?php echo esc_url($img_tits); ?>" alt="img" />
                <?php endif; ?>
                <h2> <?php echo wp_kses($atts['title_img'] , $allowed_tags) ?> </h2>
             </div>
        <?php endif; ?>
     </div>
<?php
return ob_get_clean();
}
