<?php
add_action( 'vc_before_init', 'vc_single_header_v3_vcmap' );
function vc_single_header_v3_vcmap() {
 vc_map( array(
  "name" => __( "Header V3", "creote-addons" ),
  "base" => "single_header_v3_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Header", "creote-addons"),
  "params" => array(
    array(
        'type'        => 'checkbox',
        'heading'     => esc_html__( 'Midbar show / hide', 'creote-addons' ),
        'param_name'  => 'mid_bar_enable',
        'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
        'description' => esc_html__( 'Click Check box to enable Mid Bar', 'creote-addons' ),
        'group' => esc_html__('Midbar Content', 'creote-addons') ,
      ),
      array(
        'type' => 'attach_image',
        'heading' => esc_html__('Logo Default', 'creote-addons') ,
        'param_name' => 'logo_default',
        'group' => esc_html__('Midbar Content', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'mid_bar_enable',
            'value'   => 'yes',
        ),
    ),
    array(
        'heading'    => esc_html__( 'Logo  URL (Link)', 'creote-addons' ),
        'type'       => 'vc_link',
        'param_name' => 'logo_link',
        'group' => esc_html__('Midbar Content', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'mid_bar_enable',
            'value'   => 'yes',
        ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Logo Width', 'creote-addons') ,
        'param_name' => 'logo_width',
        'value' => '170px',
        "description" => __( "Enter logo width here in (px , rem and em )", "creote-addons" ),
        'group' => esc_html__('Header Content', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'mid_bar_enable',
            'value'   => 'yes',
        ),
     ) ,
     array(
        'type' => 'textfield',
        'heading' => esc_html__('Logo Margin', 'creote-addons') ,
        'param_name' => 'margin_logo',
        'value' => '0px 0px 0px 0px',
        'group' => esc_html__('Header Content', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'mid_bar_enable',
            'value'   => 'yes',
        ),
     ) ,
      array(
        'type' => 'param_group',
        'heading' => esc_html__('Information Content', 'creote-addons') ,
        'param_name' => 'information_repeater',
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Icon Fonts', 'creote-addons') ,
                'param_name' => 'icon_fonts',
                'value'       => vc_get_creote_icons(),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Content One', 'creote-addons') ,
                'param_name' => 'content_one',
                'value' => '8:00AM - 6:00PM',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Content Two', 'creote-addons') ,
                'param_name' => 'content_two',
                'value' => 'Monday to Saturday',
            ),
        ),
        'group' => esc_html__('Midbar Content', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'mid_bar_enable',
            'value'   => 'yes',
        ),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Navigation', 'creote-addons') ,
        'param_name' => 'navigations',
        'value'       => vc_creote_navmenu(),
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
        'heading'     => esc_html__( 'Button  show / hide', 'creote-addons' ),
        'param_name'  => 'button_enable',
        'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
        'description' => esc_html__( 'Click Check box to enable the button', 'creote-addons' ),
        'group' => esc_html__('Header Content', 'creote-addons') ,
      ),
 array(
    'type' => 'textfield',
    'heading' => esc_html__('Button  Text', 'creote-addons') ,
    'param_name' => 'button_text',
    'value' => 'Sign Up',
    "description" => __( "This text field for  Button Text", "creote-addons" ),
    'group' => esc_html__('Header Content', 'creote-addons') ,
    'dependency'  => array(
        'element' => 'button_enable',
        'value'   => 'yes',
      ),
 ) ,
array(
'heading'    => esc_html__( 'Button  URL (Link)', 'creote-addons' ),
'type'       => 'vc_link',
'param_name' => 'button_link',
 'dependency'  => array(
    'element' => 'button_enable',
    'value'   => 'yes',
  ),
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
add_shortcode( 'single_header_v3_init', 'vc_single_header_v3' );
function vc_single_header_v3( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'mid_bar_enable' => ' ',
      'information_repeater'  => '',
      'email_title' => 'Mail Id',
      'email_address' => 'sendmail@creote.com', 
      'phone_title' => 'Phone Number',
      'phone_number' => '+98 060 712 34',
      'social_media_repeater' =>  '',
      'logo_default' => '',
      'navigations' => '',
      'search_enable' => '',
      'button_enable' => '',
      'button_link' => '',
      'button_text' => 'Get In Touch',
      'modal_enable' => '',
      'logo_link' => '',
      'logo_width' => '170px',
      'margin_logo' => '0px 0px 0px 0px',
 ), $atts
);
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
$information_repeaters = function_exists( 'vc_param_group_parse_atts' ) ? vc_param_group_parse_atts( $atts['information_repeater'] ) : array();
ob_start();
?>
<header class="header header_default style_three">
    <?php if($atts['mid_bar_enable'] == 'yes'): ?> 
            <div class="header_mid">
                <div class="medium-container">
                    <div class="row align-items-center">
                    <?php if(!empty($atts['logo_default'])):?>
                        <div class="col-lg-3 col-md-12">
                            <div class="logo mid_logo_icon">
                            <a href="<?php echo esc_url(home_url()); ?>" class="logo_mid">
                        <?php $logo_defaults = explode(',',$atts['logo_default']); 
                              foreach( $logo_defaults as $logo_default ){
                              $logo_default = wp_get_attachment_image_src( $logo_default, 'image_box' ); ?>
                   <img class="logo_default" src="<?php echo esc_url($logo_default[0]); ?>" alt="logo default"  <?php echo __($style); ?>>
                    <?php  } ?>
                    </a>
                    </div>
                    </div>
                    <?php else: ?>
                        <div class="col-lg-3 col-md-12">
                            <div class="logo mid_logo_icon">
                            <a href="<?php echo esc_url(home_url()); ?>" class="logo_mid">
                        <img class="logo_default" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-default.png" alt="logo default">
                        </a>
                        </div>
                    </div>
                   <?php endif;?>
                        <div class="col-lg-9 col-md-12">
                            <div class="row">
                            <?php if(!empty($information_repeaters)): foreach($information_repeaters as $key => $information_repeater):?>
                                <div class="col-lg-4 same_column">
                                    <div class="mid_content one">
                                        <?php if(!empty($information_repeater['icon_fonts'])): ?>
                                        <span class="<?php echo esc_attr($information_repeater['icon_fonts']); ?> mid_icon"></span>
                                        <?php endif; ?>
                                        <div class="text">
                                        <?php if(!empty($information_repeater['content_one'])): ?>
                                            <h4> <?php echo esc_attr($information_repeater['content_one']); ?></h4>
                                        <?php endif; ?>
                                        <?php if(!empty($information_repeater['content_two'])): ?>
                                            <p><?php echo esc_attr($information_repeater['content_two']); ?></p>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php endif; ?>   
            <div class="navbar_outer  <?php if($atts['modal_enable'] == 'yes'): ?> mod_btn_enable  <?php endif; ?>">
    <div class="medium-container">
        <div class="row align-items-center">
            <div class="col-lg-12 menu_column">
                    <div class="navbar_togglers hamburger_menu">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                    </div>
                    <div class="header_content_collapse">
                    <?php if($atts['modal_enable'] == 'yes'): ?>
                            <div class="modal_box_buttom">
                            <button type="button" class="contact-toggler"><i class="icon-bar"></i></button>
                    </div>
                            <?php endif;?>
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
                            <?php if($atts['button_enable'] == 'yes'): ?>
                            <li> 
                            <a href="<?php echo esc_url($button_link); ?>"  <?php if(!empty($button_link_href)):?> target="<?php echo esc_attr($button_link_href); ?>" <?php endif; ?> class="theme-btn five">  <?php echo esc_attr($atts['button_text']); ?> </a>
                            </li>
                            <?php endif;?>
                        </ul>    
                    </div>
                    </div>
            </div>
        </div>
    </div>
            </div>
        </header>
<?php
return ob_get_clean();
}
