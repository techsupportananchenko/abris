<?php
add_action( 'vc_before_init', 'vc_single_header_v2_vcmap' );
function vc_single_header_v2_vcmap() {
 vc_map( array(
  "name" => __( "Header V2", "creote-addons" ),
  "base" => "single_header_v2_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Header", "creote-addons"),
  "params" => array(
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Navigation', 'creote-addons') ,
        'param_name' => 'navigations',
        'value'       => vc_creote_navmenu(),
        'group' => esc_html__('Header Content', 'creote-addons') ,
    ),
    array(
        'type'        => 'checkbox',
        'heading'     => esc_html__( 'Topbar show / hide', 'creote-addons' ),
        'param_name'  => 'top_bar_enable',
        'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
        'description' => esc_html__( 'Click Check box to enable Top Bar', 'creote-addons' ),
        'group' => esc_html__('Topbar Content', 'creote-addons') ,
      ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Address', 'creote-addons') ,
        'param_name' => 'location_address',
        'value' => '61W Business Str Hobert, LA',
        "description" => __( "This text field for Address", "creote-addons" ),
        'group' => esc_html__('Topbar Content', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'top_bar_enable',
            'value'   => 'yes',
          ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Mail Id', 'creote-addons') ,
        'param_name' => 'email_address',
        'value' => 'sendmail@creote.com',
        "description" => __( "This text field for Mail Id", "creote-addons" ),
        'group' => esc_html__('Topbar Content', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'top_bar_enable',
            'value'   => 'yes',
          ),
    ),
    array(
        'type' => 'param_group',
        'heading' => esc_html__('Social Media Content', 'creote-addons') ,
        'param_name' => 'social_media_repeater',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Social Media Icon', 'creote-addons') ,
                'param_name' => 'social_media_icon',
                'value' => 'fa fa-facebook',
                "description" => __( "This text field for Social Media Icon", "creote-addons" ),
            ),
            array(
                'heading'    => esc_html__( 'Link', 'creote-addons' ),
                'type'       => 'vc_link',
                'param_name' => 'socail_media_link',
            ),
        ),
        'group' => esc_html__('Topbar Content', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'top_bar_enable',
            'value'   => 'yes',
        ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Button Text', 'creote-addons') ,
        'param_name' => 'button_text',
        'value' => 'Get A Quote',
        "description" => __( "This text field for Button", "creote-addons" ),
        'group' => esc_html__('Topbar Content', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'top_bar_enable',
            'value'   => 'yes',
          ),
    ),
    array(
        'heading'    => esc_html__( 'Button  URL (Link)', 'creote-addons' ),
        'type'       => 'vc_link',
        'param_name' => 'button_link',
        'group' => esc_html__('Topbar Content', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'top_bar_enable',
            'value'   => 'yes',
        ),
    ),
    array(
        'type' => 'attach_image',
        'heading' => esc_html__('Logo Default', 'creote-addons') ,
        'param_name' => 'logo_default',
        'group' => esc_html__('Header Content', 'creote-addons') ,
    ),
    array(
        'heading'    => esc_html__( 'Logo  URL (Link)', 'creote-addons' ),
        'type'       => 'vc_link',
        'param_name' => 'logo_link',
        'group' => esc_html__('Header Content', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Logo Width', 'creote-addons') ,
        'param_name' => 'logo_width',
        'value' => '170px',
        "description" => __( "Enter logo width here in (px , rem and em )", "creote-addons" ),
        'group' => esc_html__('Header Content', 'creote-addons') ,
     ) ,
     array(
        'type' => 'textfield',
        'heading' => esc_html__('Logo Margin', 'creote-addons') ,
        'param_name' => 'margin_logo',
        'value' => '0px 0px 0px 0px',
        'group' => esc_html__('Header Content', 'creote-addons') ,
     ) ,
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Phone Title', 'creote-addons') ,
        'param_name' => 'phone_title',
        'value' => 'Call Us',
        'group' => esc_html__('Header Content', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Phone Number', 'creote-addons') ,
        'param_name' => 'phone_number',
        'value' => '+98 060 712 34',
        "description" => __( "This text field for Phone Number", "creote-addons" ),
        'group' => esc_html__('Header Content', 'creote-addons') ,
    ),
    array(
        'type'        => 'checkbox',
        'heading'     => esc_html__( 'Search  show / hide', 'creote-addons' ),
        'param_name'  => 'search_enable',
        'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
        'description' => esc_html__( 'Click Check box to enable the Search', 'creote-addons' ),
        'group' => esc_html__('Header Content', 'creote-addons') ,
      ),
array(
    'type'        => 'checkbox',
    'heading'     => esc_html__( 'Modal  show / hide', 'creote-addons' ),
    'param_name'  => 'modal_enable',
    'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
    'description' => esc_html__( 'Click Check box to enable the Modal Box', 'creote-addons' ),
    'group' => esc_html__('Header Content', 'creote-addons') ,
  ),
   )
));
}
// shortcode
add_shortcode( 'single_header_v2_init', 'vc_single_header_v2' );
function vc_single_header_v2( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
       'top_bar_enable' => ' ',
      'location_address' => '61W Business Str Hobert, LA',
      'email_address' => 'sendmail@creote.com', 
      'phone_title' => 'Call Us',
      'phone_number' => '+98 060 712 34',
      'social_media_repeater' =>  '',
      'logo_default' => '',
      'navigations' => '',
      'search_enable' => '',
      'button_link' => '',
      'button_text' => 'Get In Touch',
      'modal_enable' => '',
      'logo_link' => '',
      'logo_width' => '170px',
      'margin_logo' => '0px 0px 0px 0px',
 ), $atts
);
//styling
$button_link  = '';
$button_link_href  = '';
 if (!empty( $atts['button_link'])) {
   $button_link_go = vc_build_link($atts['button_link']);
   $button_link = $button_link_go['url'];
   $button_link_href = $button_link_go['target'];
}
$logo_width  = $atts['logo_width'];
$logo_width    = ! empty( $logo_width ) ? "width: $logo_width!important;" : ''; 
$margin_logo  = $atts['margin_logo'];
$margin_logo    = ! empty( $margin_logo ) ? "margin: $margin_logo!important;" : '';
$style  = "style='$logo_width $margin_logo'";
$allowed_tags = wp_kses_allowed_html('post');
$social_media_repeater = function_exists( 'vc_param_group_parse_atts' ) ? vc_param_group_parse_atts( $atts['social_media_repeater'] ) : array();
ob_start();
?>
<?php if($atts['top_bar_enable'] == 'yes'): ?>
    <div class="top_bar style_two">
        <div class="auto-container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                 <div class="top_inner">
                    <div class="left_side common_css">
                            <div class="contntent address">
                                    <i class="icon-placeholder"></i>
                                    <div class="text">
                                        <?php if(!empty($atts['location_address'])): ?>
                                            <span><?php echo esc_attr($atts['location_address']); ?></span>
                                        <?php endif; ?>
                                    </div>
                            </div>
                            <div class="contntent email">
                            <i class="icon-email"></i>
                                    <div class="text">
                                        <?php if(!empty($atts['email_address'])): ?>
                                            <a href="mailto:<?php echo esc_attr($atts['email_address']); ?>"><?php echo esc_attr($atts['email_address']); ?></a>
                                        <?php endif; ?>
                                    </div>
                            </div>
                    </div>
                    <div class="right_side common_css">
                    <div class="contntent media">
                                    <div class="text">
                                    <?php if(!empty($social_media_repeater)): foreach($social_media_repeater as $key => $media_repearter):
                                        $socail_media_link_href  = '';
                                        $socail_media_link_target  = '';
                                         if (!empty( $media_repearter['socail_media_link'])) {
                                           $socail_media_link = vc_build_link($media_repearter['socail_media_link']);
                                           $socail_media_link_href = $socail_media_link['url'];
                                           $socail_media_link_target = $socail_media_link['target'];
                                        }
                                        ?>
                                  <a href="<?php echo esc_url($socail_media_link_href); ?>"  <?php if(!empty($socail_media_link_target)):?> target="<?php echo esc_attr($socail_media_link_target); ?>" <?php endif; ?>> 
                                         <i class="<?php echo esc_attr($media_repearter['social_media_icon']); ?>"></i>
                                </a>
                                <?php endforeach;?>
                                <?php endif; ?>
                                    </div>
                            </div>
                            <?php if(!empty($atts['button_text'])): ?>
                            <div class="contntent cbutton">
                            <a href="<?php echo esc_url($button_link); ?>" <?php if(!empty($button_link_href)):?> target="<?php echo esc_attr($button_link_href); ?>" <?php endif; ?>   class="theme-btn three">  <?php echo esc_attr($atts['button_text']); ?> </a>
                            </div>
                           <?php endif; ?>
                    </div>
                </div>
                </div>
                </div>
        </div>
    </div>
    <?php endif;?>
    <header class="header header_default style_two">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-4 col-md-9 col-sm-9 col-xs-9 logo_column">
                <div class="header_log_outer">
                    <div class="header_logo_box">
                    <a href="<?php echo esc_url(home_url()); ?>" class="logo navbar-brand">
                    <?php if(!empty($atts['logo_default'])):?>
                        <?php $logo_defaults = explode(',',$atts['logo_default']); 
                              foreach( $logo_defaults as $logo_default ){
                              $logo_default = wp_get_attachment_image_src( $logo_default, 'image_box' ); ?>
                   <img class="logo_default" src="<?php echo esc_url($logo_default[0]); ?>" alt="logo default" <?php echo __($style); ?>>
                    <?php   } ?>
                    <?php else: ?>
                        <img class="logo_default" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-default.png" alt="logo default">
                   <?php endif;?>
        </a>
                    </div>
                    <div class="phone_box">
                            <i class="icon-phone-call1"></i>
                                    <div class="text">
                                        <?php if(!empty($atts['phone_title'])): ?>
                                            <small><?php echo esc_attr($atts['phone_title']); ?></small>
                                        <?php endif; ?>
                                        <?php if(!empty($atts['phone_number'])): ?>
                                            <a href="tel:<?php echo esc_attr($atts['phone_number']); ?>"><?php echo esc_attr($atts['phone_number']); ?></a>
                                        <?php endif; ?>
                                    </div>
                            </div>
                    </div>
            </div>
            <div class="col-lg-8 col-md-3 col-sm-3 col-xs-3 menu_column">
                    <div class="navbar_togglers hamburger_menu">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                    </div>
                    <div class="header_content_collapse">
                    <div class="header_menu_box">
                    <div class="navigation_menu">
                    <?php  if(!empty($atts['navigations'])):
					         	wp_nav_menu(array(
							    'menu' => $atts['navigations'],
						        'container' => false,
                                'menu_class' => 'navbar_nav',
                                'menu_id' => 'myNavbar',
                                'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
							    'walker' => new \WP_Bootstrap_Navwalker()
							)
						 ); endif;
					?>
                            </div>
                    </div>
                    <div class="header_right_content">
                        <ul>
                        <?php if($atts['search_enable'] == 'yes'): ?>
                            <li> 
                                <button type="button" class="search-toggler"><i class="icon-search"></i></button>
                            </li>
                            <?php endif;?>
                            <?php if($atts['modal_enable'] == 'yes'): ?>
                            <li>
                            <button type="button" class="contact-toggler"><i class="icon-setup-dots"></i></button>
                            </li>
                            <?php endif;?>
                        </ul>    
                    </div>
                    </div>
            </div>
        </div>
    </div>
 </header>
<?php
return ob_get_clean();
}
