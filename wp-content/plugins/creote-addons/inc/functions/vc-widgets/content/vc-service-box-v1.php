<?php
add_action( 'vc_before_init', 'vc_service_v1_vcmap' );
function vc_service_v1_vcmap() {
 vc_map( array(
  "name" => __( "Service Box V1", "creote-addons" ),
  "base" => "vc_service_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
    'type'       => 'dropdown',
    'heading'    => esc_html__( 'Service style', 'creote-addons' ),
    'param_name' => 'service_types',
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
        'heading' => esc_html__('Image', 'creote-addons') ,
        'param_name' => 'image',
        'value' => '',
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
          'element' => 'service_types',
          'value'   => 'style_one',
        ),
     ),
     array(
      'type'        => 'checkbox',
      'heading'     => esc_html__( 'Image Fit Enable / Disable', 'creote-addons' ),
      'param_name'  => 'image_fit',
      'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
      'group' => esc_html__('General', 'creote-addons') ,
      'dependency'  => array(
        'element' => 'service_types',
        'value'   => 'style_one',
      ),
    ),
    array(
      'type'        => 'checkbox',
      'heading'     => esc_html__( 'Active Box Enable / Disable', 'creote-addons' ),
      'param_name'  => 'service_active',
      'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
      'description' => esc_html__( 'Click Check box to enable Active Box', 'creote-addons' ),
      'group' => esc_html__('General', 'creote-addons') ,
      'dependency'  => array(
        'element' => 'service_types',
        'value'   => 'style_two',
      ),
    ),
     array(
      'type' => 'attach_image',
      'heading' => esc_html__('Image', 'creote-addons') ,
      'param_name' => 'image_two',
      'group' => esc_html__('General', 'creote-addons') ,
      'dependency'  => array(
        'element' => 'service_types',
        'value'   => 'style_two',
      ),
   ),
   array(
    'type' => 'attach_image',
    'heading' => esc_html__('Image', 'creote-addons') ,
    'param_name' => 'image_four',
    'group' => esc_html__('General', 'creote-addons') ,
    'dependency'  => array(
      'element' => 'service_types',
      'value'   => 'style_four',
    ),
 ),
   array(
    'type' => 'attach_image',
    'heading' => esc_html__('Icon Image', 'creote-addons') ,
    'param_name' => 'icon_image_two',
    'group' => esc_html__('General', 'creote-addons') ,
    'dependency'  => array(
      'element' => 'service_types',
      'value'   => 'style_two',
    ),
 ),
 array(
  'type' => 'dropdown',
  'heading' => esc_html__('Icon Fonts', 'creote-addons') ,
  'param_name' => 'icon_font_three',
  'value'       => vc_get_creote_icons(),
  'group' => esc_html__('General', 'creote-addons') ,
  'dependency'  => array(
      'element' => 'service_types',
      'value'   => 'style_three',
  ),
),
array(
  'type' => 'dropdown',
  'heading' => esc_html__('Icon Fonts', 'creote-addons') ,
  'param_name' => 'icon_font_four',
  'value'       => vc_get_creote_icons(),
  'group' => esc_html__('General', 'creote-addons') ,
  'dependency'  => array(
      'element' => 'service_types',
      'value'   => 'style_four',
  ),
),
array(
  'type' => 'textarea',
  'heading' => esc_html__('Step Number', 'creote-addons') ,
  'param_name' => 'number',
  'value' => esc_html__('01', 'creote-addons') ,
  'group' => esc_html__('General', 'creote-addons') ,
  'dependency'  => array(
    'element' => 'service_types',
    'value'   => 'style_three',
),
),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Heading', 'creote-addons') ,
        'param_name' => 'heading',
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Description', 'creote-addons') ,
        'param_name' => 'description',
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
      'type' => 'textarea',
      'heading' => esc_html__('Service List', 'creote-addons') ,
      'param_name' => 'service_list',
      'value' => esc_html__('Reducing Redundancy
      Uncovering Hidden Resources
      Increasing Company’s Agility', 'creote-addons') ,
      'group' => esc_html__('General', 'creote-addons') ,
      'dependency'  => array(
        'element' => 'service_types',
        'value'   => 'style_two',
    ),
  ),
    array(
      'type' => 'textarea',
      'heading' => esc_html__('Link Text', 'creote-addons') ,
      'param_name' => 'read_more',
      'value' => esc_html__('Read More', 'creote-addons') ,
      'group' => esc_html__('General', 'creote-addons') ,
      'dependency'  => array(
        'element' => 'service_types',
        'value'   => 'style_one',
    ),
  ),
  array(
    'type' => 'textarea',
    'heading' => esc_html__('Link Text', 'creote-addons') ,
    'param_name' => 'read_more_three',
    'value' => esc_html__('Read More', 'creote-addons') ,
    'group' => esc_html__('General', 'creote-addons') ,
    'dependency'  => array(
      'element' => 'service_types',
      'value'   => 'style_three',
  ),
),
    array(
        'type' => 'vc_link',
        'heading' => esc_html__('Link', 'creote-addons') ,
        'param_name' => 'read_link',
        'value' => '#',
        'group' => esc_html__('General', 'creote-addons') ,
    ) ,
    array(
        'type'       => 'dropdown',
        'heading'    => esc_html__( 'Process Color Type ', 'creote-addons' ),
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
add_shortcode( 'vc_service_v1_init', 'vc_service_v1' );
function vc_service_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'service_types' => 'style_one',
      'image' => '' , 
      'image_two' => '' , 
      'icon_image_two' => '' , 
      'icon_font_three' => '' , 
      'number' => '01' , 
      'service_list' => 'Reducing Redundancy
      Uncovering Hidden Resources
      Increasing Company’s Agility' , 
      'image_fit' => '' , 
      'heading' => 'Innovative HR Solutions',
      'read_more' => 'Read more',
      'read_more_three' => 'Read more',
      'read_link' => '',
      'description' => 'Certain circumstances seds owing to the claims duty ourrighteous indignation and so beguiled.',
      'transitions_enable' => '',
      'transitions' => '',
      'icon_font_four'  => '',
      'service_active' => '',
      'image_four'=> '',
      'dark_white' => 'dark_color',
   ), $atts
);
$read_link_href  = '';
$read_link_target  = '';
 if (!empty( $atts['read_link'])) {
   $read_link = vc_build_link($atts['read_link']);
   $read_link_href = $read_link['url'];
   $read_link_target = $read_link['target'];
}
$allowed_tags = wp_kses_allowed_html('post');
$attachment_image_one = wp_get_attachment_image_src( intval( $atts['image'] ), 'full' );
$image           = $attachment_image_one ? $attachment_image_one[0] : '';
$image_two = wp_get_attachment_image_src( intval( $atts['image_two'] ), 'full' );
$image_twos           = $image_two ? $image_two[0] : '';
$icon_image_two = wp_get_attachment_image_src( intval( $atts['icon_image_two'] ), 'full' );
$icon_image_twos           = $icon_image_two ? $icon_image_two[0] : '';
$image_four = wp_get_attachment_image_src( intval( $atts['image_four'] ), 'full' );
$image_fours           = $image_four ? $image_four[0] : '';
ob_start();
?>
<div class="service_box <?php echo esc_attr($atts['service_types']); ?> <?php echo esc_attr($atts['dark_white']); ?>" <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
       <?php if($atts['service_types'] == 'style_one'):?>
           <div class="service_content">
             <?php if(!empty($image)): ?>
               <div class="image <?php if($atts['image_fit'] == 'yes'): ?> image_fit <?php endif; ?>">
                 <img src="<?php echo esc_url($image); ?>" class="img-fluid" alt="<?php esc_attr_e('Service Image', 'creote-addons'); ?>" />
               </div>
             <?php endif; ?>
             <div class="content_inner">
             <?php if(!empty($atts['heading'])): ?>
                 <h2>
             <a href="<?php echo esc_url($read_link_href); ?>"  <?php if(!empty($read_link_target)):?> target="<?php echo esc_attr($read_link_target); ?>" <?php endif; ?>>
             <?php echo wp_kses($atts['heading'] , $allowed_tags) ?>
             </a> 
             </h2>
             <?php endif; ?>
             <?php if(!empty($atts['description'])): ?>
               <p>  <?php echo wp_kses($atts['description'] , $allowed_tags) ?></p>
             <?php endif; ?>
             <?php if(!empty($atts['read_more'])): ?>
              <a href="<?php echo esc_url($read_link_href); ?>"  <?php if(!empty($read_link_target)):?> target="<?php echo esc_attr($read_link_target); ?>" <?php endif; ?> class="read_more">
                <?php echo wp_kses($atts['read_more'] , $allowed_tags) ?>
               </a>
             <?php endif; ?>
             </div>
           </div>
           <?php elseif($atts['service_types'] == 'style_two'):?>
<div class="service_content_two <?php if($atts['service_active'] == 'yes'): ?> active_ser <?php endif; ?>">
<div class="content_inner" <?php if(!empty($image_twos)): ?> style="background-image:url(<?php echo esc_url($image_twos); ?>);" <?php endif; ?>>
      <div class="content_inner_in">
    <?php if(!empty($icon_image_twos)): ?>
      <div class="icon_image">
        <img src="<?php echo esc_url($icon_image_twos); ?>" class="img-fluid" alt="<?php esc_attr_e('Service Image', 'creote-addons'); ?>" />
      </div>
    <?php endif; ?>
    <?php if(!empty($atts['heading'])): ?>
        <h2>
        <a href="<?php echo esc_url($read_link_href); ?>"  <?php if(!empty($read_link_target)):?> target="<?php echo esc_attr($read_link_target); ?>" <?php endif; ?>>
    <?php echo wp_kses($atts['heading'] , $allowed_tags) ?>
    </a> 
    </h2>
    <?php endif; ?>
    <?php if(!empty($atts['description'])): ?>
      <p>  <?php echo wp_kses($atts['description'] , $allowed_tags) ?></p>
    <?php endif; ?>
    <?php if(!empty($atts['service_list'])): ?>
            <?php $service_lists = explode("\n", ($atts['service_list']));?>
            <ul>
              <?php foreach($service_lists as $service_list):?>
              <li>
                  <?php echo wp_kses($service_list, true); ?>
              </li>
              <?php endforeach; ?>
            </ul>
      <?php endif; ?>
    </div>
    </div>
    <div class="ovarlay_link">
    <a href="<?php echo esc_url($read_link_href); ?>"  <?php if(!empty($read_link_target)):?> target="<?php echo esc_attr($read_link_target); ?>" <?php endif; ?>>
          <i class="icon-right-arrow"></i>
    </a> 
    </div>
    <div class="overlay_content">
    <?php if(!empty($atts['heading'])): ?>
        <h2>
        <a href="<?php echo esc_url($read_link_href); ?>"  <?php if(!empty($read_link_target)):?> target="<?php echo esc_attr($read_link_target); ?>" <?php endif; ?>>
    <?php echo wp_kses($atts['heading'] , $allowed_tags) ?>
    </a> 
    </h2>
    <?php endif; ?>
    <?php if(!empty($atts['description'])): ?>
      <p>  <?php echo wp_kses($atts['description'] , $allowed_tags) ?></p>
    <?php endif; ?>
    </div>
  </div>
  <?php elseif($atts['service_types'] == 'style_three'):?>
  <div class="service_content">
    <div class="content_inner">
    <?php if(!empty($atts['icon_font_three'])): ?>
          <span class="<?php echo esc_attr($atts['icon_font_three']); ?>"><i></i></span>
    <?php endif; ?>
    <?php if(!empty($atts['number'])): ?>
          <small class="nom"><?php echo esc_attr($atts['number']); ?></small>
    <?php endif; ?>
    <?php if(!empty($atts['heading'])): ?>
        <h2>    <a href="<?php echo esc_url($read_link_href); ?>"  <?php if(!empty($read_link_target)):?> target="<?php echo esc_attr($read_link_target); ?>" <?php endif; ?>>
    <?php echo wp_kses($atts['heading'] , $allowed_tags) ?>
    </a> 
    </h2>
    <?php endif; ?>
    <?php if(!empty($atts['description'])): ?>
      <p>  <?php echo wp_kses($atts['description'] , $allowed_tags) ?></p>
    <?php endif; ?>
    <?php if(!empty($atts['read_more_three'])): ?>
      <a href="<?php echo esc_url($read_link_href); ?>"  <?php if(!empty($read_link_target)):?> target="<?php echo esc_attr($read_link_target); ?>" <?php endif; ?> class="read_more">
       <?php echo wp_kses($atts['read_more_three'] , $allowed_tags) ?> <i class="icon-right-arrow"></i>
      </a>
    <?php endif; ?>
    </div>
  </div>
  <?php elseif($atts['service_types'] == 'style_four'):?>
            <div class="service_content">
            <div class="image_box">
            <?php if(!empty($image_fours)): ?>
                  <img src="<?php echo esc_url($image_fours); ?>" class="img-fluid" alt="<?php esc_attr_e('Service Image', 'creote-addons'); ?>" />
              <?php endif; ?>
            <?php if(!empty($atts['icon_font_four'])): ?>
                    <span class="<?php echo esc_attr($atts['icon_font_four']); ?>"></span>
              <?php endif; ?>
            </div>
              <div class="content_inner">
              <?php if(!empty($atts['heading'])): ?>
                  <h2>      <a href="<?php echo esc_url($read_link_href); ?>"  <?php if(!empty($read_link_target)):?> target="<?php echo esc_attr($read_link_target); ?>" <?php endif; ?>>
              <?php echo wp_kses($atts['heading'] , $allowed_tags) ?>
              </a> 
              </h2>
              <?php endif; ?>
              <?php if(!empty($atts['description'])): ?>
                <p>  <?php echo wp_kses($atts['description'] , $allowed_tags) ?></p>
              <?php endif; ?>
              </div>
            </div>
<?php endif; ?>
     </div>
<?php
return ob_get_clean();
}
