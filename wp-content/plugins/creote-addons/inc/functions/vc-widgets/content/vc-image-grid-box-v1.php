<?php
add_action( 'vc_before_init', 'vc_image_grid_box_v1_vcmap' );
function vc_image_grid_box_v1_vcmap() {
 vc_map( array(
  "name" => __( "Image Grid V1", "creote-addons" ),
  "base" => "vc_image_gridbox_v1_init",
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
    ),
    'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
      'type'       => 'dropdown',
      'heading'    => esc_html__('Column Size ', 'creote-addons'),
      'param_name' => 'column_size',
      'value'      => array(
          esc_html__( 'Select Column', 'creote-addons' ) => '',
          esc_html__( 'Five Column', 'creote-addons' ) => 'col-lg-2 col-md-4 col-sm-6 col-xs-12',
          esc_html__( 'One Column', 'creote-addons' ) => 'col-lg-12 col-md-12 col-sm-12 col-xs-12' ,
          esc_html__( 'Two Column', 'creote-addons' ) => 'col-lg-6 col-md-6 col-sm-6 col-xs-12' ,
          esc_html__( 'Three Column', 'creote-addons' ) => 'col-lg-4 col-md-4 col-sm-6 col-xs-12' ,
          esc_html__( 'Four Column', 'creote-addons' ) => 'col-lg-3 col-md-4 col-sm-6 col-xs-12' ,
      ),
      'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
      'type'        => 'checkbox',
      'heading'     => __('Image Fit Enable / Disbale', 'creote-addons'),
      'param_name'  => 'object_fit_cover',
      'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
      'group' => esc_html__('General', 'creote-addons') ,
  ),
  array(
    'type' => 'textfield',
    'heading' => esc_html__('Image', 'creote-addons') ,
    'param_name' => 'image_box_height',
    'value' => esc_html__('400px', 'creote-addons') ,
    'description' => esc_html__('you Can set the image height here eg: (100px , 10rem  or 10rem) like this', 'creote-addons'),
    'group' => esc_html__('General', 'creote-addons') ,
 ),
 array(
  'type' => 'param_group',
  'heading' => esc_html__('Image Content Repeater', 'creote-addons') ,
  'value' => '',
  'param_name' => 'image_carousel_repeater',
  'params' => array(
    array(
      'type' => 'attach_image',
      'heading' => esc_html__('Image', 'creote-addons') ,
      'param_name' => 'image',
      'value' => '',
   ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__('Title', 'creote-addons') ,
      'param_name' => 'title',
    ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__('Rag', 'creote-addons') ,
      'param_name' => 'tag',
    ),
    array(
      'type' => 'vc_link',
      'heading' => esc_html__('Link', 'creote-addons') ,
      'param_name' => 'link',
    ),
  ),
  'group' => esc_html__('General', 'creote-addons') ,
),
)));
}
// shortcode
add_shortcode( 'vc_image_gridbox_v1_init', 'vc_image_gridbox_v1' );
function vc_image_gridbox_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'image_box_styles' => 'style_one',
      'column_size' => '',
      'object_fit_cover' => '',
      'image_box_height' => '',
      'image_carousel_repeater' => '',
   ), $atts
);
$image_carousel_repeaters = function_exists( 'vc_param_group_parse_atts' ) ? vc_param_group_parse_atts( $atts['image_carousel_repeater'] ) : array();
$allowed_tags = wp_kses_allowed_html('post');
$img_height  = $atts['image_box_height'];
$img_height    = ! empty( $img_height ) ? "height: $img_height!important;" : '';
$style_css  = "style='$img_height'";
ob_start();
?>
<section class="image_grid_content <?php echo esc_attr($atts['image_box_styles']); ?> <?php if($atts['object_fit_cover'] == 'yes'): ?> image_covered <?php endif; ?>">
   <div class="row">
      <?php if(!empty($image_carousel_repeaters)): foreach($image_carousel_repeaters as $key => $image_carousel_repeater): 
         $link  = '';
         $link_target  = '';
          if (!empty( $image_carousel_repeater['link'])) {
            $button_links = vc_build_link($image_carousel_repeater  ['link']);
            $link = $button_links['url'];
            $link_target = $button_links['target'];
         }
        $image = wp_get_attachment_image_src( intval( $image_carousel_repeater['image'] ), 'full' );
        $images           = $image ? $image[0] : '';
      ?>
      <div class="<?php echo esc_attr($atts['column_size']); ?>">
         <?php // style one ?>
         <?php if($atts['image_box_styles'] == 'style_one' || $atts['image_box_styles'] == 'style_two'):?>
         <div class="mg_image_box">
            <?php if(!empty($images)): ?>
            <div class="image_box" <?php echo __($style_css); ?>>
               <img src="<?php echo esc_url($images); ?>" class="img" alt="image" />
               <?php if($atts['image_box_styles'] == 'style_one'):?>
               <a href="<?php echo esc_url($link); ?>" class="ab_link" target="<?php echo esc_attr($link_target); ?>">
               <span class="icon-right-arrow-long"></span>
               </a> 
               <?php endif; ?>
            </div>
            <?php endif; ?>
              <div class="content">
            <?php if($atts['image_box_styles'] == 'style_one'): ?>
              <?php if(!empty($image_carousel_repeater['title'])): ?>
            <h2>  <a href="<?php echo esc_url($link); ?>"  target="<?php echo esc_attr($link_target); ?>">
               <?php echo wp_kses($image_carousel_repeater['title']  ,$allowed_tags); ?>     </a> 
            </h2>        
            <?php endif; ?>
            <?php endif; ?>
            <?php if($atts['image_box_styles'] == 'style_two'): ?>
            <?php if(!empty($image_carousel_repeater['title'])): ?>
            <h3>  <a href="<?php echo esc_url($link); ?>"  target="<?php echo esc_attr($link_target); ?>">
               <?php echo wp_kses($image_carousel_repeater['title']  ,$allowed_tags); ?>     </a> 
            </h3>
            <?php endif; ?>
            <?php endif; ?>
            <?php if(!empty($image_carousel_repeater['tag'])): ?>
            <div class="tag">  
               <?php echo wp_kses($image_carousel_repeater['tag']  ,$allowed_tags); ?>  
            </div>
            <?php endif; ?>
            </div>
         </div>
         <?php endif;?> 
         <?php // style one end ?>
      </div>
      <?php endforeach; ?>
      <?php endif; ?>
   </div>
</section>
<?php 
return ob_get_clean();
}
