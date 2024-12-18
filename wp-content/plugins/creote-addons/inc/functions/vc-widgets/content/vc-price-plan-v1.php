<?php
add_action( 'vc_before_init', 'vc_price_plan_v1_vcmap' );
function vc_price_plan_v1_vcmap() {
 vc_map( array(
  "name" => __( "Price Plan V1", "creote-addons" ),
  "base" => "vc_price_plan_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
    'type'       => 'dropdown',
    'heading'    => esc_html__( 'Price Plan Styles', 'creote-addons' ),
    'param_name' => 'price_plan_styles',
    'value'      => array(
        esc_html__( 'Style One', 'creote-addons' )  => 'style_one',
        esc_html__( 'Style Two', 'creote-addons' )  => 'style_two',
    ),
    'group' => esc_html__('General', 'creote-addons') ,
    ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title', 'creote-addons') ,
                'param_name' => 'price_title',
                'value' => esc_html__('Bronze Package', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Price Short Description', 'creote-addons') ,
                'param_name' => 'price_notes',
                'value' => esc_html__('Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse Cillum.', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Price', 'creote-addons') ,
                'param_name' => 'price',
                'value' => esc_html__('59$', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Description', 'creote-addons') ,
                'param_name' => 'description',
                'value' => esc_html__('Serenity Is Multi-Faceted Blockchain Based Ecosystem, Energy Retailer For The People, Focusing On The Promotion Of Sustainable Living, Renewable Energy Production And Smart Energy Grid Utility Services.', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Plan Button Text', 'creote-addons') ,
                'param_name' => 'button_text',
                'value' => esc_html__('Choosr Plan', 'creote-addons') ,
            ),
            array(
                'type' => 'vc_link',
                'heading' => esc_html__('Plan Link', 'creote-addons') ,
                'param_name' => 'button_link',
            ),
            array(
                'type'        => 'checkbox',
                'heading'     => esc_html__( 'Features Enable / Disable', 'creote-addons' ),
                'param_name'  => 'features_enable',
                'value'       => array( 
                    esc_html__( 'Yes', 'creote-addons' ) => 'yes' , 
                ),
            ),
            array(
                'type' => 'textarea',
                'heading' => esc_html__('Plan Benifits Yes', 'creote-addons') ,
                'param_name' => 'plan_benifits',
                'value' => esc_html__('Document watermarking', 'creote-addons') ,
                'dependency'  => array(
                    'element' => 'features_enable',
                    'value'   => 'yes',
                ), 
            ),
            array(
                'type' => 'textarea',
                'heading' => esc_html__('Plan Benifits No', 'creote-addons') ,
                'param_name' => 'plan_benifits_no',
                'value' => esc_html__('Document watermarking no', 'creote-addons') ,
                'dependency'  => array(
                    'element' => 'features_enable',
                    'value'   => 'yes',
                ), 
            ),
            array(
                'type'        => 'checkbox',
                'heading'     => esc_html__( 'Tag Enable / Disable', 'creote-addons' ),
                'param_name'  => 'tag_enable',
                'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Tag Content', 'creote-addons') ,
                'param_name' => 'tag_content',
                'value' => esc_html__('Popular', 'creote-addons') ,
                'dependency'  => array(
                    'element' => 'tag_enable',
                    'value'   => 'yes',
                ), 
            ),
)));
}
// shortcode
add_shortcode( 'vc_price_plan_v1_init', 'vc_price_plan_v1' );
function vc_price_plan_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'price_plan_styles' => 'style_one',
      'price_title' => 'Bronze Package',
      'price_notes' => 'Pricing plan for startup company',
      'price' => '59$',
      'description' => 'Loves or pursues or desires obtain pain
      of itself is pain occasionally.',
      'button_text' => 'Choose Plan',
      'button_link' => '#',
      'features_enable' => 'yes',
      'plan_benifits' => 'Document watermarking',
      'plan_benifits_no' => 'Document watermarking no',
      'tag_enable' => 'yex',
      'tag_content' => 'Popular',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$button_link  = '';
$button_link_target  = '';
 if (!empty( $atts['button_link'])) {
   $button_links = vc_build_link($atts['button_link']);
   $button_link = $button_links['url'];
   $button_link_target = $button_links['target'];
}
ob_start();
?>
<?php if($atts['price_plan_styles'] == 'style_one'): ?>
        <div class="price_plan_box style_one">
            <div class="tag"><?php echo wp_kses($atts['tag_content'] , $allowed_tags) ?></div>
            <div class="inner_box">
                <div class="top">
                  <?php if(!empty($atts['price_title'])): ?>  <h2><?php echo wp_kses($atts['price_title'] , $allowed_tags) ?></h2><?php endif; ?>
                    <?php if(!empty($atts['price_notes'])): ?>   <p><?php echo wp_kses($atts['price_notes'] , $allowed_tags) ?></p><?php endif; ?>
                </div>
                <div class="mid">
                <?php if(!empty($atts['price'])): ?>  <h4><?php echo wp_kses($atts['price'] , $allowed_tags) ?></h4><?php endif; ?>
                <?php if(!empty($atts['description'])): ?>   <p><?php echo wp_kses($atts['description'] , $allowed_tags) ?></p><?php endif; ?>
                </div>
                <div class="bottom">
                <?php if($atts['features_enable'] == 'yes'): ?>
                 <ul>
                    <?php if(!empty($atts['plan_benifits'])): ?>
                   <?php $plan_benifitsstwo = explode("\n", ($atts['plan_benifits']));?>
                     <?php foreach($plan_benifitsstwo as $plan_benifitwo):?>
                     <li>
                         <span> <?php echo wp_kses($plan_benifitwo, true); ?></span>
                         <i class="fa fa-check"></i>
                     </li>
                     <?php endforeach; ?>
             <?php endif; ?>
             <?php if(!empty($atts['plan_benifits_no'])): ?>
                   <?php $plan_benifits_notwos = explode("\n", ($atts['plan_benifits_no']));?>
                     <?php foreach($plan_benifits_notwos as $plan_benifits_notwo):?>
                     <li>
                         <span> <?php echo wp_kses($plan_benifits_notwo, true); ?></span>
                         <i class="fa fa-times"></i>
                     </li>
                     <?php endforeach; ?>
             <?php endif; ?>
             </ul>
             <?php endif; ?>
                    <?php if(!empty($atts['button_text'])): ?> 
                       <a href="<?php echo esc_url($button_link); ?>"  <?php if(!empty($button_link_target)):?> target="<?php echo esc_attr($button_link_target); ?>" <?php endif; ?> class="theme-btn two">
                             <?php echo esc_html($atts['button_text']);?> 
                        </a>
                    <?php endif;?>
                </div>
            </div>
        </div>
<?php endif; ?>
<?php
return ob_get_clean();
}
