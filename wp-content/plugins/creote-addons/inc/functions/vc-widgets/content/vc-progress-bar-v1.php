<?php
add_action( 'vc_before_init', 'vc_progress_bar_v1_vcmap' );
function vc_progress_bar_v1_vcmap() {
 vc_map( array(
  "name" => __( "Progress bar V1", "creote-addons" ),
  "base" => "vc_progress_bar_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
    'type'       => 'dropdown',
    'heading'    => esc_html__( 'Progress style', 'creote-addons' ),
    'param_name' => 'progress_type',
    'value'      => array(
        esc_html__( 'Style One', 'creote-addons' )  => 'type_one',
        esc_html__( 'Style Two', 'creote-addons' )  => 'type_two',
        esc_html__( 'Style Three', 'creote-addons' )  => 'type_three',
    ),
    'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Heading', 'creote-addons') ,
        'value' => __('Consultion', 'creote-addons'),
        'param_name' => 'heading',
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Description', 'creote-addons') ,
        'param_name' => 'description',
        'value' => __('Certain circumstances seds owing to the claims duty
        righteous indignation and so beguiled.', 'creote-addons'),
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Heading', 'creote-addons') ,
        'value' => __('Year of  2020', 'creote-addons'),
        'param_name' => 'extra_content',
        'group' => esc_html__('General', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'progress_type',
            'value'   => 'type_two',
          ),
    ),
    array(
      'type' => 'textarea',
      'heading' => esc_html__('Percentage', 'creote-addons') ,
      'param_name' => 'percentage',
      'value' => __('50', 'creote-addons'),
      'description' => esc_html__('Use Percentage 1  to 100', 'creote-addons') ,
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
add_shortcode( 'vc_progress_bar_v1_init', 'vc_progress_bar_v1' );
function vc_progress_bar_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'progress_type' => 'type_one',
      'heading' => 'Consultion',
      'description' => 'Certain circumstances seds owing to the claims duty righteous indignation and so beguiled.' , 
      'extra_content' => 'Year of  2020' , 
      'heading_title' => 'Claims of duty',
      'percentage' => '50',
      'transitions_enable' => '',
      'transitions' => '',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
ob_start();
?>
<?php if($atts['progress_type'] == 'type_one'): ?>
        <div class="progress_bar" <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
            <h2><?php echo wp_kses($atts['heading'] , $allowed_tags); ?> <span><?php echo esc_attr($atts['percentage']); ?><?php echo esc_html('%' , 'creote-addons'); ?></span></h2>
            <div class="bar">
            <div class="bar-inner count-bar" data-percent="<?php echo esc_attr($atts['percentage']); ?>%"></div>
            </div>
        </div>
        <?php elseif($atts['progress_type'] == 'type_two'): ?>
        <div class="progress_bar style_two" <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
          <div class="progress_new">
      <div class="ProgressBar ProgressBar--animateText" data-progress="<?php echo esc_attr($atts['percentage']); ?>">
         <svg class="ProgressBar-contentCircle" height="170" width="170">
            <circle  class="ProgressBar-background" cx="85" cy="85" r="75" />
            <circle transform="rotate(-90, 85, 85)"   class="ProgressBar-circle" cx="85" cy="85" r="75" />
         </svg>
      </div>
      <div class="progress-value">
         <div>
            <h6><?php echo esc_attr($atts['extra_content']); ?> </h6>
         </div>
      </div>
   </div>
        <div class="content_box">
                <h2><?php echo esc_attr($atts['percentage']); ?><?php echo esc_html('%' , 'creote-addons'); ?></h2>
                <h3><?php echo wp_kses($atts['heading'] , $allowed_tags); ?> </h3>
                <p><?php echo wp_kses($atts['description'] , $allowed_tags); ?> </p>
            </div>
	</div>
        <?php elseif($atts['progress_type'] == 'type_three'): ?>
        <div class="progress_bar style_three" <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
            <h2><?php echo wp_kses($atts['heading'] , $allowed_tags); ?> <span><?php echo esc_attr($atts['percentage']); ?><?php echo esc_html('%' , 'creote-addons'); ?></span></h2>
            <div class="bar">
            <div class="bar-inner count-bar" data-percent="<?php echo esc_attr($atts['percentage']); ?>%"></div>
            </div>
        </div>
        <?php endif; ?>
<?php
return ob_get_clean();
}
