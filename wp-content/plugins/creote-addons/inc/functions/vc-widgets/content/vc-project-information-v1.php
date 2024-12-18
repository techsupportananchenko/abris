<?php
add_action( 'vc_before_init', 'vc_project_information_v1_vcmap' );
function vc_project_information_v1_vcmap() {
 vc_map( array(
  "name" => __( "Project Information V1", "creote-addons" ),
  "base" => "vc_project_information_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Heading', 'creote-addons') ,
        'param_name' => 'heading',
        'value' => __('Project Information', 'creote-addons'),
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
      'type' => 'param_group',
      'heading' => esc_html__('Project Information Content', 'creote-addons') ,
      'value' => '',
      'param_name' => 'project_information_repeater',
      'params' => array(
          array(
              'type' => 'textfield',
              'heading' => esc_html__('Information Title', 'creote-addons') ,
              'param_name' => 'information_title',
              'value' => esc_html__('Client:', 'creote-addons') ,
          ),
          array(
              'type' => 'textfield',
              'heading' => esc_html__('Information Content', 'creote-addons') ,
              'param_name' => 'information_content',
              'value' => __('The Sixmothers Group', 'creote-addons'),
          ),
      ),
      'group' => esc_html__('General', 'creote-addons') ,
  ),
  array(
    'type' => 'param_group',
    'heading' => esc_html__('Social Media Content', 'creote-addons') ,
    'value' => '',
    'param_name' => 'social_media_repeater',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Social Media', 'creote-addons') ,
            'param_name' => 'social_media_content',
            'value' => esc_html__('fa fa-facebook', 'creote-addons') ,
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Social Media Link', 'creote-addons') ,
            'param_name' => 'social_media_link',
            'value' => __('#', 'creote-addons'),
        ),
    ),
    'group' => esc_html__('General', 'creote-addons') ,
),
array(
  'type' => 'textfield',
  'heading' => esc_html__('Button Text', 'creote-addons') ,
  'param_name' => 'button_text',
  'value' => esc_html__('Interested', 'creote-addons') ,
  'group' => esc_html__('General', 'creote-addons') ,
),
array(
  'type' => 'vc_link',
  'heading' => esc_html__('Link', 'creote-addons') ,
  'param_name' => 'button_link',
  'group' => esc_html__('General', 'creote-addons') ,
),
)));
}
// shortcode
add_shortcode( 'vc_project_information_v1_init', 'vc_project_information_v1' );
function vc_project_information_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'heading' => 'Project Information',
      'project_information_repeater' => '',
      'social_media_repeater'  => '',
      'button_text'  => 'Interested',
      'button_link'  => '',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$button_link_href  = '';
$button_link_target  = '';
 if (!empty( $atts['button_link'])) {
   $button_link = vc_build_link($atts['button_link']);
   $button_link_href = $button_link['url'];
   $button_link_target = $button_link['target'];
}
$project_information_repeaters = function_exists( 'vc_param_group_parse_atts' ) ? vc_param_group_parse_atts( $atts['project_information_repeater'] ) : array();
$social_media_repeaters = function_exists( 'vc_param_group_parse_atts' ) ? vc_param_group_parse_atts( $atts['social_media_repeater'] ) : array();
ob_start();
?>
<div class="project_information">
            <?php if(!empty($atts['heading'])): ?>
                <h2><?php echo wp_kses($atts['heading'] , $allowed_tags); ?></h2>
            <?php endif; ?>
            <div class="project_information_bo">
            <?php if(!empty($project_information_repeaters)): foreach($project_information_repeaters as $key => $project_information):?>
                <div class="repeat_informtion">
                    <?php if(!empty($project_information['information_title'])): ?>
                        <h6><?php echo wp_kses($project_information['information_title'] , $allowed_tags); ?></h6>
                    <?php endif; ?>
                    <?php if(!empty($project_information['information_content'])): ?>
                        <p><?php echo wp_kses($project_information['information_content'] , $allowed_tags); ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; endif;?>
                      <div class="social_medias">
            <?php if(!empty($social_media_repeaters)): foreach($social_media_repeaters as $key => $socail):?>
                    <?php if(!empty($socail['social_media_content'])): ?>
                    <a href="<?php if(!empty($socail['social_media_link'])): echo esc_url($socail['social_media_link']); endif; ?>">      
                        <span class="<?php echo esc_html($socail['social_media_content']); ?>"></span> 
                    </a>
                    <?php endif; ?>
            <?php endforeach; endif; ?>
            </div>
            <?php if(!empty($atts['button_text'])): ?> 
              <a href="<?php echo esc_url($button_link_href); ?>"  <?php if(!empty($button_link_target)):?> target="<?php echo esc_attr($button_link_target); ?>" <?php endif; ?> class="theme-btn two">
              <?php echo esc_html($atts['button_text']);?>
            </a>
            <?php endif;?>
            </div>
        </div>
<?php
return ob_get_clean();
}
