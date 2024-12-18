<?php
add_action( 'vc_before_init', 'vc_price_pan_tab_v1_vcmap' );
function vc_price_pan_tab_v1_vcmap() {
 vc_map( array(
  "name" => __( "Price Plan Tab V1", "creote-addons" ),
  "base" => "vc_price_pan_tab_v1_init",
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
    ),
    'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Tab One Name', 'creote-addons') ,
        'param_name' => 'tab_one_name',
        'value' => esc_html__('Monthly', 'creote-addons') ,
        'group' => esc_html__('Tab One', 'creote-addons') ,
    ),
    array(
        'type' => 'param_group',
        'heading' => esc_html__('Tab One Content', 'creote-addons') ,
        'value' => '',
        'param_name' => 'price_tab_v1_repeater_one',
        'params' => array(
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
                'type' => 'textfield',
                'heading' => esc_html__('Tag Content', 'creote-addons') ,
                'param_name' => 'tag_content',
                'value' => esc_html__('Popular', 'creote-addons') ,
            ),
        ),
        'group' => esc_html__('Tab One', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Tab Two Name', 'creote-addons') ,
        'param_name' => 'tab_two_name',
        'value' => esc_html__('Yearly', 'creote-addons') ,
        'group' => esc_html__('Tab Two', 'creote-addons') ,
    ),
    array(
        'type' => 'param_group',
        'heading' => esc_html__('Tab Two Content', 'creote-addons') ,
        'value' => '',
        'param_name' => 'price_tab_v1_repeater_two',
        'params' => array(
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
                'type' => 'textfield',
                'heading' => esc_html__('Tag Content', 'creote-addons') ,
                'param_name' => 'tag_content',
                'value' => esc_html__('Popular', 'creote-addons') ,
            ),
        ),
        'group' => esc_html__('Tab Two', 'creote-addons') ,
    ),
)));
}
// shortcode
add_shortcode( 'vc_price_pan_tab_v1_init', 'vc_price_pan_tab_v1' );
function vc_price_pan_tab_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'price_plan_styles' => 'style_one',
      'tab_one_name'  => 'Monthly',
      'tab_two_name'  => 'Yearly',
      'price_tab_v1_repeater_two' => '',
      'price_tab_v1_repeater_one' => '',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$price_tab_v1_repeater_ones = function_exists( 'vc_param_group_parse_atts' ) ? vc_param_group_parse_atts( $atts['price_tab_v1_repeater_one'] ) : array();
$price_tab_v1_repeater_twos = function_exists( 'vc_param_group_parse_atts' ) ? vc_param_group_parse_atts( $atts['price_tab_v1_repeater_two'] ) : array();
ob_start();
?>
<section class="price_plan_with_tab price_tb_<?php echo esc_attr($atts['price_plan_styles']) ?>">
 <div class="row">
   <div class="col-lg-12 ml-auto">
         <div class="tab_pricing_list">
         <ul class="nav nav-tabs" id="myTab" role="tablist">
           <?php if(!empty($atts['tab_one_name'])): ?>
             <li class="nav-item" role="presentation">
             <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                 <?php echo esc_html($atts['tab_one_name']);  ?></button>
             </li>
           <?php endif; ?>
           <?php if(!empty($atts['tab_two_name'])): ?>
             <li class="nav-item" role="presentation">
             <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
             <?php echo esc_html($atts['tab_two_name']);  ?></button>
             </li>
             <?php endif; ?>
           </ul>
     </div>
   </div>
 </div>
  <div class="tab-content price_tab_content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
   <div class="row">
   <?php if(!empty($price_tab_v1_repeater_ones)): foreach($price_tab_v1_repeater_ones as $key => $price_tab_v1_repeater_one): ?>  
   <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
   <div class="price_plan_box style_one <?php if(!empty($price_tab_v1_repeater_one['tag_content'])): ?> tag_enables <?php endif; ?>">
   <?php if(!empty($price_tab_v1_repeater_one['tag_content'])): ?>
            <div class="tag"><?php echo wp_kses($price_tab_v1_repeater_one['tag_content'] , $allowed_tags) ?></div>
            <?php endif; ?>
            <div class="inner_box">
                <div class="top">
                  <?php if(!empty($price_tab_v1_repeater_one['price_title'])): ?>  <h2><?php echo wp_kses($price_tab_v1_repeater_one['price_title'] , $allowed_tags) ?></h2><?php endif; ?>
                    <?php if(!empty($price_tab_v1_repeater_one['price_notes'])): ?>   <p><?php echo wp_kses($price_tab_v1_repeater_one['price_notes'] , $allowed_tags) ?></p><?php endif; ?>
                </div>
                <div class="mid">
                <?php if(!empty($price_tab_v1_repeater_one['price'])): ?>  <h4><?php echo wp_kses($price_tab_v1_repeater_one['price'] , $allowed_tags) ?></h4><?php endif; ?>
                <?php if(!empty($price_tab_v1_repeater_one['description'])): ?>   <p><?php echo wp_kses($price_tab_v1_repeater_one['description'] , $allowed_tags) ?></p><?php endif; ?>
                </div>
                <div class="bottom">
                <?php if($price_tab_v1_repeater_one['features_enable'] == 'yes'): ?>
                    <ul>
                       <?php if(!empty($price_tab_v1_repeater_one['plan_benifits'])): ?>
                      <?php $plan_benifitss = explode("\n", ($price_tab_v1_repeater_one['plan_benifits']));?>
                        <?php foreach($plan_benifitss as $plan_benifit):?>
                        <li>
                            <span> <?php echo wp_kses($plan_benifit, true); ?></span>
                            <i class="fa fa-check"></i>
                        </li>
                        <?php endforeach; ?>
                <?php endif; ?>
                <?php if(!empty($price_tab_v1_repeater_one['plan_benifits_no'])): ?>
                      <?php $plan_benifits_nos = explode("\n", ($price_tab_v1_repeater_one['plan_benifits_no']));?>
                        <?php foreach($plan_benifits_nos as $plan_benifits_no):?>
                        <li>
                            <span> <?php echo wp_kses($plan_benifits_no, true); ?></span>
                            <i class="fa fa-times"></i>
                        </li>
                        <?php endforeach; ?>
                <?php endif; ?>
                </ul>
                <?php endif; ?>
                    <?php if(!empty($price_tab_v1_repeater_one['button_text'])): ?> 
                      <?php 
                      $button_link_one  = '';
                      $button_link_one_target  = '';
                       if (!empty( $price_tab_v1_repeater_one['button_link'])) {
                         $button_link = vc_build_link($price_tab_v1_repeater_one['button_link']);
                         $button_link_one = $button_link['url'];
                         $button_link_one_target = $button_link['target'];
                      }
                      ?>
                       <a href="<?php echo esc_url($button_link_one); ?>"  <?php if(!empty($button_link_one_target)):?> target="<?php echo esc_attr($button_link_one_target); ?>" <?php endif; ?> class="theme-btn two">
                             <?php echo esc_html($price_tab_v1_repeater_one['button_text']);?> 
                        </a>
                    <?php endif;?>
                </div>
            </div>
        </div>
        </div>
        <?php endforeach; endif;?>
        </div>
 </div>
 <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
<div class="row">
<?php if(!empty($price_tab_v1_repeater_twos)): foreach($price_tab_v1_repeater_twos as $key => $price_tab_v1_repeater_two): ?>   
<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
<div class="price_plan_box style_one <?php if(!empty($price_tab_v1_repeater_two['tag_content'])): ?> tag_enables <?php endif; ?>">
    <?php if(!empty($price_tab_v1_repeater_two['tag_content'])): ?>
         <div class="tag"><?php echo wp_kses($price_tab_v1_repeater_two['tag_content'] , $allowed_tags) ?></div>
         <?php endif; ?>
         <div class="inner_box">
             <div class="top">
               <?php if(!empty($price_tab_v1_repeater_two['price_title'])): ?>  <h2><?php echo wp_kses($price_tab_v1_repeater_two['price_title'] , $allowed_tags) ?></h2><?php endif; ?>
                 <?php if(!empty($price_tab_v1_repeater_two['price_notes'])): ?>   <p><?php echo wp_kses($price_tab_v1_repeater_two['price_notes'] , $allowed_tags) ?></p><?php endif; ?>
             </div>
             <div class="mid">
             <?php if(!empty($price_tab_v1_repeater_two['price'])): ?>  <h4><?php echo wp_kses($price_tab_v1_repeater_two['price'] , $allowed_tags) ?></h4><?php endif; ?>
             <?php if(!empty($price_tab_v1_repeater_two['description'])): ?>   <p><?php echo wp_kses($price_tab_v1_repeater_two['description'] , $allowed_tags) ?></p><?php endif; ?>
             </div>
             <div class="bottom">
             <?php if($price_tab_v1_repeater_two['features_enable'] == 'yes'): ?>
                 <ul>
                    <?php if(!empty($price_tab_v1_repeater_two['plan_benifits'])): ?>
                   <?php $plan_benifitsstwo = explode("\n", ($price_tab_v1_repeater_two['plan_benifits']));?>
                     <?php foreach($plan_benifitsstwo as $plan_benifitwo):?>
                     <li>
                         <span> <?php echo wp_kses($plan_benifitwo, true); ?></span>
                         <i class="fa fa-check"></i>
                     </li>
                     <?php endforeach; ?>
             <?php endif; ?>
             <?php if(!empty($price_tab_v1_repeater_two['plan_benifits_no'])): ?>
                   <?php $plan_benifits_notwos = explode("\n", ($price_tab_v1_repeater_two['plan_benifits_no']));?>
                     <?php foreach($plan_benifits_notwos as $plan_benifits_notwo):?>
                     <li>
                         <span> <?php echo wp_kses($plan_benifits_notwo, true); ?></span>
                         <i class="fa fa-times"></i>
                     </li>
                     <?php endforeach; ?>
             <?php endif; ?>
             </ul>
             <?php endif; ?>
                 <?php if(!empty($price_tab_v1_repeater_two['button_text'])): ?> 
                    <?php 
                      $button_link_two  = '';
                      $button_link_two_target  = '';
                       if (!empty( $price_tab_v1_repeater_two['button_link'])) {
                         $button_links = vc_build_link($price_tab_v1_repeater_two['button_link']);
                         $button_link_two = $button_links['url'];
                         $button_link_two_target = $button_links['target'];
                      }
                      ?>
                      <a href="<?php echo esc_url($button_link_two); ?>"  <?php if(!empty($button_link_two_target)):?> target="<?php echo esc_attr($button_link_two_target); ?>" <?php endif; ?> class="theme-btn two">
                          <?php echo esc_html($price_tab_v1_repeater_two['button_text']);?> 
                     </a>
                 <?php endif;?>
             </div>
         </div>
     </div>
     </div>
     <?php endforeach; endif;?>
</div>
   </div>
 </div>
</section>
<?php
return ob_get_clean();
}
