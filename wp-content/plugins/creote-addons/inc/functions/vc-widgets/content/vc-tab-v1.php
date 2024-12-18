<?php
add_action( 'vc_before_init', 'vc_tab_v1_vcmap' );
function vc_tab_v1_vcmap() {
 vc_map( array(
  "name" => __( "Tab V1", "creote-addons" ),
  "base" => "vc_tab_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
        'type'       => 'dropdown',
        'heading'    => esc_html__( 'Tab Style style', 'creote-addons' ),
        'param_name' => 'tab_box_style',
        'value'      => array(
            esc_html__( 'Style One', 'creote-addons' )  => 'type_one',
            esc_html__( 'Style Two', 'creote-addons' )  => 'type_two',
        ),
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'param_group',
        'heading' => esc_html__('Tab  Content', 'creote-addons') ,
        'value' => '',
        'param_name' => 'tabs_content_v1_repeater',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Tab Id', 'creote-addons') ,
                'param_name' => 'tab_id',
                'value' => esc_html__('tabone', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Tab Title', 'creote-addons') ,
                'param_name' => 'tab_title',
                'value' => esc_html__('01. Affordable', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__(' Highlight Text', 'creote-addons') ,
                'param_name' => 'con_hg_text',
                'value' => esc_html__('Why Creote', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title', 'creote-addons') ,
                'param_name' => 'con_title',
                'value' => esc_html__('Affordable & Flexible', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Description', 'creote-addons') ,
                'param_name' => 'con_des',
                'value' => esc_html__('Must explain too you how all this mistaken idea of denouncing pleasures
                praising pain was born and we will give you complete account of the system
                the actual teachings of the great explorer.', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Button Text', 'creote-addons') ,
                'param_name' => 'button_text',
            ),
            array(
                'heading'    => esc_html__( 'URL (Link)', 'creote-addons' ),
                'type'       => 'vc_link',
                'param_name' => 'button_link',
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Image', 'creote-addons') ,
                'param_name' => 'tab_image',
                'value' => '',
            ),
        ),
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'tab_box_style',
            'value'   => 'type_one',
        ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Call Heading', 'creote-addons') ,
        'param_name' => 'call_heading',
        'value' => esc_html__('Call For  Free Consultation', 'creote-addons') ,
        'group' => esc_html__('Contact', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'tab_box_style',
            'value'   => 'type_one',
        ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Call Number', 'creote-addons') ,
        'param_name' => 'call_number',
        'value' => esc_html__('180667586677', 'creote-addons') ,
        'group' => esc_html__('Contact', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'tab_box_style',
            'value'   => 'type_one',
        ),
    ),
    array(
        'type' => 'param_group',
        'heading' => esc_html__('Tab  Content', 'creote-addons') ,
        'value' => '',
        'param_name' => 'tabs_content_v1_repeater_two',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Tab Id', 'creote-addons') ,
                'param_name' => 'tab_id',
                'value' => esc_html__('tabone', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Tab Title', 'creote-addons') ,
                'param_name' => 'tab_title',
                'value' => esc_html__('01. Affordable', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__(' Highlight Text', 'creote-addons') ,
                'param_name' => 'con_hg_text',
                'value' => esc_html__('Why Creote', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title', 'creote-addons') ,
                'param_name' => 'con_title',
                'value' => esc_html__('Affordable & Flexible', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Description', 'creote-addons') ,
                'param_name' => 'con_des',
                'value' => esc_html__('Must explain too you how all this mistaken idea of denouncing pleasures
                praising pain was born and we will give you complete account of the system
                the actual teachings of the great explorer.', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('List items', 'creote-addons') ,
                'param_name' => 'list_items',
                'value' => esc_html__('Cost-Effective Services
                Helps Reduce Business Risks
                Management of Employee Performance
                Increasing Company’s Agility', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Button Text', 'creote-addons') ,
                'param_name' => 'button_text',
                'value' => esc_html__('Read More', 'creote-addons') ,
            ),
            array(
                'heading'    => esc_html__( 'URL (Link)', 'creote-addons' ),
                'type'       => 'vc_link',
                'param_name' => 'button_link',
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Image', 'creote-addons') ,
                'param_name' => 'tab_images',
                'value' => '',
            ),
        ),
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'tab_box_style',
            'value'   => 'type_two',
        ),
    ),
)));
}
// shortcode
add_shortcode( 'vc_tab_v1_init', 'vc_tab_v1' );
function vc_tab_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'tab_box_style' => 'type_one',
      'tabs_content_v1_repeater'  => '',
      'tabs_content_v1_repeater_two'  => '',
      'call_heading'   => 'Call For  Free Consultation',
      'call_number'   => '180667586677',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$tabs_content_v1_repeaters = function_exists( 'vc_param_group_parse_atts' ) ? vc_param_group_parse_atts( $atts['tabs_content_v1_repeater'] ) : array();
$tabs_content_v1_repeater_twos = function_exists( 'vc_param_group_parse_atts' ) ? vc_param_group_parse_atts( $atts['tabs_content_v1_repeater_two'] ) : array();
ob_start();
?>
<section class="tabs_all_box  tabs_all_box_start <?php echo esc_attr($atts['tab_box_style']); ?>">
<div class="tab_over_all_box">
               <?php if($atts['tab_box_style'] == 'type_one'): ?>
                <?php //style_one ?>
                <div class="tabs_header clearfix">
                    <ul class="showcase_tabs_btns nav-pills nav   clearfix">
                        <?php  if(!empty($tabs_content_v1_repeaters)): foreach($tabs_content_v1_repeaters as $key => $tabs_block_one):?>
                        <li class="nav-item">
                            <a class="s_tab_btn nav-link <?php if($key == 0) echo 'active';?>" data-tab="#tab<?php echo esc_attr($tabs_block_one['tab_id']); ?>"> 
                                     <?php if(!empty($tabs_block_one['tab_title'])): ?> <?php echo esc_html($tabs_block_one['tab_title']); ?><?php endif;?>
                        </a></li>
                    <?php endforeach; endif;?>
                    </ul>
                    <div class="toll_free">
                           <a href="tel:<?php echo esc_html($atts['call_number']); ?>"> <i class="icon-phone-call"></i>
                            <?php echo esc_html($atts['call_heading']); ?> 
                            </a>
                    </div>
                </div>
                  <div class="s_tab_wrapper">
                     <div class="s_tabs_content">
                     <?php  if(!empty($tabs_content_v1_repeaters)): foreach($tabs_content_v1_repeaters as $key => $tabs_block_one): 
                        $tab_image_o  = ! empty( $tabs_block_one['tab_image'] ) ? $tabs_block_one['tab_image'] : ''; 
                        $tab_images_one = wp_get_attachment_image_src( intval( $tab_image_o ), 'full' );
                        $tab_image_bg          = $tab_images_one ? $tab_images_one[0] : '';
                        ?>
                            <div class="s_tab fade <?php if($key == 0) echo 'active-tab show';?>" id="tab<?php echo esc_attr($tabs_block_one['tab_id']); ?>">
                            <div class="tab_content one"    <?php if(!empty($tab_image_bg)):?> style="background-image:url(<?php echo esc_url($tab_image_bg); ?>)"    <?php endif;?>>
                              <div class="content_image">
                            <?php if(!empty($tabs_block_one['con_hg_text'])): ?> <h6><?php echo esc_html($tabs_block_one['con_hg_text']); ?></h6><?php endif;?>
                              <?php if(!empty($tabs_block_one['con_title'])): ?> <h2><?php echo esc_html($tabs_block_one['con_title']); ?></h2><?php endif;?>
                                <?php if(!empty($tabs_block_one['con_des'])): ?> <p><?php echo esc_html($tabs_block_one['con_des']); ?></p><?php endif;?>
                                  <?php if(!empty($tabs_block_one['button_text'])): ?> 
                                    <?php 
                                     $button_link_href = '';
                                     $button_link_target = '';
                                     if ( ! empty( $tabs_block_one['button_link'] ) ) {
                                     $link            = vc_build_link( $tabs_block_one['button_link'] );
                                     $button_link_href           = $link['url'];
                                     $button_link_target = $link['target'];
                                     } 
                                     ?>
            <a href="<?php echo esc_url($button_link_href); ?>" <?php if(!empty($button_link_target)):?> target="<?php echo esc_attr($button_link_target); ?>" <?php endif; ?> class="rd_more">
              <?php echo esc_html($tabs_block_one['button_text']);?> <i class="icon-right-arrow"></i>
            </a>
                                    <?php endif;?>
                                  </div>
                            </div>
                            </div>
                        <?php endforeach; endif; ?>
                  </div>
                </div>
                <?php //style_one end?>
                <?php elseif($atts['tab_box_style'] == 'type_two'): ?>
                  <?php //style_two ?>
                  <div class="tabs_header clearfix">
               <ul class="showcase_tabs_btns nav-pills nav   clearfix">
                   <?php if(!empty($tabs_content_v1_repeater_twos)): foreach($tabs_content_v1_repeater_twos as $key => $tabs_block_two):?>
                   <li class="nav-item">
                       <a class="s_tab_btn nav-link <?php if($key == 0) echo 'active';?>" data-tab="#tab<?php echo esc_attr($tabs_block_two['tab_id']); ?>"> 
                                <?php if(!empty($tabs_block_two['tab_title'])): ?> <?php echo esc_html($tabs_block_two['tab_title']); ?><?php endif;?>
                   </a></li>
               <?php endforeach; endif; ?>
               </ul>
           </div>
             <div class="s_tab_wrapper">
                <div class="s_tabs_content">
                <?php if(!empty($tabs_content_v1_repeater_twos)): foreach($tabs_content_v1_repeater_twos as $key => $tabs_block_two): 
                        $tab_images  = ! empty( $tabs_block_two['tab_images'] ) ? $tabs_block_two['tab_images'] : ''; 
                        $tab_images_two = wp_get_attachment_image_src( intval( $tab_images ), 'full' );
                        $tab_image_twos          = $tab_images_two ? $tab_images_two[0] : '';
                    ?>
                       <div class="s_tab fade <?php if($key == 0) echo 'active-tab show';?>" id="tab<?php echo esc_attr($tabs_block_two['tab_id']); ?>">
                       <div class="tab_content one">
                         <div class="row">
                         <?php if(!empty($tab_image_twos)):?> 
                           <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="image">
                            <img src="<?php echo esc_url($tab_image_twos); ?>" alt="img" />  
                         </div>
                          </div>
                        <?php endif;?>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                         <div class="content_bx">
                       <?php if(!empty($tabs_block_two['con_hg_text'])): ?> <h6><?php echo esc_html($tabs_block_two['con_hg_text']); ?></h6><?php endif;?>
                         <?php if(!empty($tabs_block_two['con_title'])): ?> <h2><?php echo esc_html($tabs_block_two['con_title']); ?></h2><?php endif;?>
                           <?php if(!empty($tabs_block_two['con_des'])): ?> <p><?php echo esc_html($tabs_block_two['con_des']); ?></p><?php endif;?>
                            <?php if(!empty($tabs_block_two['list_items'])): ?>
                      <?php $list_items = explode("\n", ($tabs_block_two['list_items']));?>
                      <ul>
                        <?php foreach($list_items as $list_item):?>
                        <li>
                            <?php echo wp_kses($list_item, true); ?>
                        </li>
                        <?php endforeach; ?>
                      </ul>
                <?php endif; ?>
                             <?php if(!empty($tabs_block_two['button_text'])): ?> 
                               <?php  
                                     $button_link_href_two = '';
                                     $button_link_target_two = '';
                                     if ( ! empty( $tabs_block_two['button_link'] ) ) {
                                     $link_two            = vc_build_link( $tabs_block_two['button_link'] );
                                     $button_link_href_two           = $link_two['url'];
                                     $button_link_target_two = $link['target'];
                                     } 
                                     ?>
            <a href="<?php echo esc_url($button_link_href_two); ?>" <?php if(!empty($button_link_target_two)):?> target="<?php echo esc_attr($button_link_target_two); ?>" <?php endif; ?> class="theme-btn two">
         <?php echo esc_html($tabs_block_two['button_text']);?> 
       </a>
                               <?php endif;?>
                             </div>
                       </div>
                       </div>
                          </div>
                       </div>
                   <?php endforeach; endif;?>
             </div>
           </div>
           <?php //style_two end ?>
                  <?php endif; ?>
                </div>  
    </section>   
<?php
return ob_get_clean();
}
