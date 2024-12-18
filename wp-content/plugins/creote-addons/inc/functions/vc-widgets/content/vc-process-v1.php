<?php
add_action( 'vc_before_init', 'vc_process_v1_vcmap' );
function vc_process_v1_vcmap() {
 vc_map( array(
  "name" => __( "Process V1", "creote-addons" ),
  "base" => "vc_process_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
    'type'       => 'dropdown',
    'heading'    => esc_html__( 'Process style', 'creote-addons' ),
    'param_name' => 'process_styles',
    'value'      => array(
        esc_html__( 'Style One', 'creote-addons' )  => 'style_one',
        esc_html__( 'Style Two', 'creote-addons' )  => 'style_two',
        esc_html__( 'Style Three', 'creote-addons' )  => 'style_three',
    ),
    'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
      'type'       => 'dropdown',
      'heading'    => esc_html__('Alignment ', 'creote-addons'),
      'param_name' => 'alignment',
      'value'      => array(
          esc_html__( 'Left', 'creote-addons' ) => 'left' ,
          esc_html__( 'Right', 'creote-addons' ) => 'right' ,
      ),
      'dependency'  => array(
        'element' => 'process_styles',
        'value'   => 'style_three',
      ),
      'group' => esc_html__('General', 'creote-addons') ,
    ),
  array(
      'type'       => 'dropdown',
      'heading'    => esc_html__('Icon Font  / Icon Image', 'creote-addons'),
      'param_name' => 'icon_type',
      'value'      => array(
          esc_html__( 'Icon Font Type', 'creote-addons' ) => 'icon_font' ,
          esc_html__( 'Icon Image Type', 'creote-addons' ) => 'icon_image' ,
      ),
      'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'attach_image',
        'heading' => esc_html__('Icon Image', 'creote-addons') ,
        'param_name' => 'icon_image_get',
        'value' => '',
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'icon_type',
            'value'   => 'icon_image',
          ),
     ),
     array(
        'type' => 'dropdown',
        'heading' => esc_html__('Icon Fonts', 'creote-addons') ,
        'param_name' => 'icon_font_get',
        'value'       => vc_get_creote_icons(),
        'dependency'  => array(
          'element' => 'icon_type',
          'value'   => 'icon_font',
        ),
        'group' => esc_html__('General', 'creote-addons') ,
      ),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Steps Number', 'creote-addons') ,
        'param_name' => 'step_number',
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Heading', 'creote-addons') ,
        'param_name' => 'heading_title',
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
      'heading' => esc_html__('Button Text', 'creote-addons') ,
      'param_name' => 'button_text',
      'group' => esc_html__('General', 'creote-addons') ,
      'dependency'  => array(
        'element' => 'style_two',
        'value'   => 'yes',
      ),
  ),
    array(
        'type' => 'vc_link',
        'heading' => esc_html__('Link', 'creote-addons') ,
        'param_name' => 'process_link',
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
add_shortcode( 'vc_process_v1_init', 'vc_processs_v1' );
function vc_processs_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'process_styles' => 'style_one',
      'icon_type' => 'icon_font',
      'icon_font_get' => 'icon-play' , 
      'icon_image_get' => '' , 
      'heading_title' => 'Claims of duty',
      'step_number' => '01',
      'process_link' => '',
      'button_text' => 'Read more',
      'description' => 'Certain circumstances seds owing to the claims duty ourrighteous indignation and so beguiled.',
      'transitions_enable' => '',
      'transitions' => '',
      'dark_white' => 'dark_color',
      'alignment' => 'left',
   ), $atts
);
$process_link_href  = '';
$process_link_target  = '';
 if (!empty( $atts['process_link'])) {
   $process_link = vc_build_link($atts['process_link']);
   $process_link_href = $process_link['url'];
   $process_link_target = $process_link['target'];
}
$allowed_tags = wp_kses_allowed_html('post');
$process_styles = $atts['process_styles'];
$attachment_image_one = wp_get_attachment_image_src( intval( $atts['icon_image_get'] ), 'full' );
$icon_image_get           = $attachment_image_one ? $attachment_image_one[0] : '';
ob_start();
?>
<div class="process_box <?php echo esc_attr($atts['process_styles']); ?> <?php  echo esc_attr($atts['dark_white']); ?>" <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
        <?php if($process_styles == 'style_one'):?>
            <?php // process one end   ?>
               <div class="process_box_outer">
                   <?php if($atts['icon_type'] == 'icon_font'):?>
                  <div class="icon">
                    <span class="<?php echo esc_attr($atts['icon_font_get']); ?>"></span>
                  <?php if(!empty($atts['step_number'])): ?>
                   <div class="number">
                   <?php echo wp_kses($atts['step_number'] , $allowed_tags);?>
                   </div>
                   <?php endif; ?>
                   </div>
                   <?php elseif($atts['icon_type'] == 'icon_image'): ?>
                   <div class="icon">
                     <div class="img">
                     <?php if(!empty($icon_image_get)): ?>
                   <img src="<?php echo esc_url($icon_image_get); ?>" class="img-fluid svg_image" alt="<?php esc_attr_e('icon png', 'creote-addons'); ?>" />
                   <?php endif; ?> 
                   </div>
                  <?php if(!empty($atts['step_number'])): ?>
                   <div class="number">
                   <?php echo wp_kses($atts['step_number'] , $allowed_tags);?>
                   </div>
                   <?php endif; ?>
                   </div>
                   <?php endif; ?>
                  <div class="content_box">
                  <?php if(!empty($atts['heading_title'])):?>
           <h2>     <a href="<?php echo esc_url($process_link_href); ?>"  <?php if(!empty($process_link_target)):?> target="<?php echo esc_attr($process_link_target); ?>" <?php endif; ?>>
            <?php echo wp_kses($atts['heading_title'] , $allowed_tags);?>
            </a></h2>
                  <?php endif; ?>
                  <?php if(!empty($atts['description'])):?>
                  <p>  <?php echo wp_kses($atts['description'] , $allowed_tags);?></p>
                  <?php endif; ?>
                </div>  
            </div>
        <?php // process one end   ?>
        <?php elseif($atts['process_styles'] == 'style_two'):?>
            <?php // process one end   ?>
            <div class="process_box_outer_two">
            <?php if(!empty($atts['step_number'])): ?>
                   <div class="number">
                   <?php echo wp_kses($atts['step_number'] , $allowed_tags);?>
                   </div>
                   <?php endif; ?>
                  <div class="content_box clearfix">
                  <?php if($atts['icon_type'] == 'icon_font'):?>
                  <div class="icon">
                    <span class="<?php echo esc_attr($atts['icon_font_get']); ?>"></span>
                   </div>
                   <?php elseif($atts['icon_type'] == 'icon_image'): ?>
                   <div class="icon">
                   <?php if(!empty($icon_image_get)): ?>
                     <div class="img">
                   <img src="<?php echo esc_url($icon_image_get); ?>" class="img-fluid svg_image" alt="<?php esc_attr_e('icon png', 'creote-addons'); ?>" />
                   </div>
                   <?php endif; ?>
                   </div>
                   <?php endif; ?>
                  <?php if(!empty($atts['heading_title'])):?>
           <h2>    <a href="<?php echo esc_url($process_link_href); ?>"  <?php if(!empty($process_link_target)):?> target="<?php echo esc_attr($process_link_target); ?>" <?php endif; ?>>
            <?php echo wp_kses($atts['heading_title'] , $allowed_tags);?>
            </a></h2>
                  <?php endif; ?>
                  </div>  
                  <?php if(!empty($atts['description'])):?>
                  <p>  <?php echo wp_kses($atts['description'] , $allowed_tags);?></p>
                  <?php endif; ?>
                  <?php if(!empty($atts['button_text'])):?>
                  <a href="<?php echo esc_url($process_link_href); ?>"  <?php if(!empty($process_link_target)):?> target="<?php echo esc_attr($process_link_target); ?>" <?php endif; ?> class="theme-btn two">
              <?php echo esc_html($atts['button_text']);?>
            </a>
            <?php endif; ?>
            </div>
            <?php // process one end   ?>
            <?php elseif($atts['process_styles'] == 'style_three'):?>
            <div class="process_box_outer_three <?php echo esc_attr($atts['alignment']); ?>">
            <?php if($atts['icon_type'] == 'icon_font'):?>
                  <div class="icon">
                    <span class="<?php echo esc_attr($atts['icon_font_get']); ?>"></span>
                   </div>
                   <?php elseif($atts['icon_type'] == 'icon_image'): ?>
                   <div class="icon">
                   <?php if(!empty($icon_image_get)): ?>
                     <div class="img">
                   <img src="<?php echo esc_url($icon_image_get); ?>" class="img-fluid svg_image" alt="<?php esc_attr_e('icon png', 'creote-addons'); ?>" />
                   </div>
                   <?php endif; ?>
                   </div>
                   <?php endif; ?>
                                    <div class="content_box">
                                    <?php if(!empty($atts['heading_title'])):?>
            <h2>    <a href="<?php echo esc_url($process_link_href); ?>"  <?php if(!empty($process_link_target)):?> target="<?php echo esc_attr($process_link_target); ?>" <?php endif; ?>>
             <?php echo wp_kses($atts['heading_title'] , $allowed_tags);?>
             </a></h2>
                   <?php endif; ?>
                   <?php if(!empty($atts['description'])):?>
                  <p>  <?php echo wp_kses($atts['description'] , $allowed_tags);?></p>
                  <?php endif; ?>
                                    </div>
                                    <?php if(!empty($atts['step_number'])): ?>
                   <div class="number">
                  <h6> <?php echo wp_kses($atts['step_number'] , $allowed_tags);?></h6>
                   </div>
                   <?php endif; ?>
                                </div>
        <?php endif; ?>         
        </div>
<?php
return ob_get_clean();
}
