<?php
add_action( 'vc_before_init', 'vc_subscribe_v1_vcmap' );
function vc_subscribe_v1_vcmap() {
 vc_map( array(
  "name" => __( "Subscribe V1", "creote-addons" ),
  "base" => "vc_subscribe_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
        'type'       => 'dropdown',
        'heading'    => esc_html__( 'Choose style', 'creote-addons' ),
        'param_name' => 'subscribe_style_two',
        'value'      => array(
            esc_html__( 'Style One', 'creote-addons' )  => 'type_one',
            esc_html__( 'Style Two', 'creote-addons' )  => 'type_two',
            esc_html__( 'Style Three', 'creote-addons' )  => 'type_three',
        ),
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__('Highlight Text', 'creote-addons') ,
      'param_name' => 'subscribe_high',
      'value' => esc_html__('Updates on products', 'creote-addons') ,
      'group' => esc_html__('General', 'creote-addons') ,
      'dependency'  => array(
        'element' => 'subscribe_style_two',
        'value'   => 'type_three',
      ), 
  ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Title', 'creote-addons') ,
        'param_name' => 'subscribe_title',
        'value' => esc_html__('Subscribe to creote', 'creote-addons') ,
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Description', 'creote-addons') ,
        'param_name' => 'subscribe_description',
        'value' => esc_html__('Get the latest posts delivers right to your inbox', 'creote-addons') ,
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textarea_html',
        'heading' => esc_html__('Shortcode', 'creote-addons') ,
        'param_name' => 'content',
        'description' => esc_html__('Enter the mail chimp mc4wp form shortcode here', 'creote-addons') ,
        'value' => esc_html__('[mc4wp_form id="1174"]', 'creote-addons') ,
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Content Padding', 'creote-addons') ,
        'param_name' => 'padding_sub',
        'value' => esc_html__('30px 30px 30px 30px', 'creote-addons') ,
        'description' => esc_html__('Enter the Padding Here eg( 20px  , 30rem ) like this', 'creote-addons') ,
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__('Border Radius', 'creote-addons') ,
      'param_name' => 'border_radius_sub',
      'value' => esc_html__('30px 30px 30px 30px', 'creote-addons') ,
      'description' => esc_html__('Enter the Border Radius Here eg( 20px  , 30rem ) like this', 'creote-addons') ,
      'group' => esc_html__('General', 'creote-addons') ,
      'dependency'  => array(
        'element' => 'subscribe_style_two',
        'value'   => 'type_two',
      ), 
  ),
    array(
      'type' => 'attach_image',
      'heading' => esc_html__('Background Image', 'creote-addons') ,
      'param_name' => 'background_image',
      'group' => esc_html__('General', 'creote-addons') ,
      'dependency'  => array(
        'element' => 'subscribe_style_two',
        'value'   => 'type_two',
      ), 
   ),
)));
}
// shortcode
add_shortcode( 'vc_subscribe_v1_init', 'vc_subscribe_v1' );
function vc_subscribe_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
     'subscribe_high'  => 'Updates on products',
      'subscribe_style_two' => 'type_one',
      'subscribe_title'  => 'Subscribe to creote',
      'subscribe_description'  => 'Get the latest posts delivers right to your inbox',
      'padding_sub'  => '',
      'background_image'  => '',
      'border_radius_sub'   => '',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$padding_sub  = $atts['padding_sub'];
$padding_sub    = ! empty( $padding_sub ) ? "padding: $padding_sub!important;" : '';
$border_radius_sub  = $atts['border_radius_sub'];
$border_radius_sub    = ! empty( $border_radius_sub ) ? "border-radius: $border_radius_sub!important;" : '';
$background_image  = ! empty( $atts['background_image'] ) ? $atts['background_image'] : ''; 
$background_image_css = wp_get_attachment_image_src( intval( $background_image ), 'full' );
$background_image_css_out  =  ! empty($background_image_css) ? "background-image: url($background_image_css[0])!important; background-size:cover; background-position:center!important; background-repeat:no-repeat;" : '';
$style_css  = "style='$padding_sub'";
$style_css_two  = "style='$padding_sub $border_radius_sub $background_image_css_out'";
ob_start();
?>
  <?php if($atts['subscribe_style_two'] == 'type_one'): ?>
    <section class="newsteller style_one" <?php echo __($style_css); ?>>
   <div class="auto-container">
   <div class="row">
   <div class="col-lg-6 col-md-12">
       <div class="content">
         <?php if(!empty($atts['subscribe_title'])):?>
           <h2><?php echo wp_kses($atts['subscribe_title'] , $allowed_tags); ?></h2>
           <?php endif;?>
               <?php if(!empty($atts['subscribe_description'])):?>
           <p><?php echo wp_kses($atts['subscribe_description'] , $allowed_tags); ?> </p>
           <?php endif;?>
             </div>
           </div>
           <?php if(!empty($content)) : ?> 
           <div class="col-lg-6 col-md-12">
             <div class="item_scubscribe">
               <div class="input_group">
               <?php echo do_shortcode($content);?>
               </div>
             </div>
     </div>
     <?php endif; ?>
   </div>
   </div>
</section>
<?php elseif($atts['subscribe_style_two'] == 'type_two'): ?>
  <section class="newsteller style_two" <?php echo __($style_css_two); ?>>
   <div class="auto-container">
      <div class="inner_stell">
         <div class="row">
            <div class="col-md-12">
               <div class="content">
                  <?php if(!empty($atts['subscribe_title'])):?>
                  <h2><?php echo wp_kses($atts['subscribe_title'] , $allowed_tags); ?></h2>
                  <?php endif;?>
                  <?php if(!empty($atts['subscribe_description'])):?>
                  <p><?php echo wp_kses($atts['subscribe_description'] , $allowed_tags); ?> </p>
                  <?php endif;?>
               </div>
               <?php if(!empty($content)): ?> 
               <div class="item_scubscribe">
                  <div class="input_group">
                     <?php echo do_shortcode($content);?>
                  </div>
               </div>
               <?php endif;?>
            </div>
         </div>
      </div>
   </div>
</section>
<?php elseif($atts['subscribe_style_two'] == 'type_thee'): ?>
  <section class="newsteller style_three">
   <div class="auto-container">
      <div class="row">
         <div class="col-lg-12 col-md-12">
            <div class="content">
               <?php if(!empty($atts['subscribe_high'])):?>
                  <h6><?php echo wp_kses($atts['subscribe_high'] , $allowed_tags); ?></h6>
               <?php endif;?>
               <?php if(!empty($atts['subscribe_title'])):?>
               <h2><?php echo wp_kses($atts['subscribe_title'] , $allowed_tags); ?></h2>
               <?php endif;?>
               <?php if(!empty($atts['subscribe_description'])):?>
               <p><?php echo wp_kses($atts['subscribe_description'] , $allowed_tags); ?> </p>
               <?php endif;?>
            </div>
         </div>
         <?php if(!empty($content)): ?> 
         <div class="col-lg-12 col-md-12">
            <div class="item_scubscribe">
               <div class="input_group">
                  <?php echo do_shortcode($content);?>
               </div>
            </div>
         </div>
         <?php endif;?>
      </div>
   </div>
</section>
<?php endif; ?>
<?php
return ob_get_clean();
}
