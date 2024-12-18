<?php
add_action( 'vc_before_init', 'vc_count_down_box_vcmap' );
function vc_count_down_box_vcmap() {
 vc_map( array(
  "name" => __( "Count Down V1", "creote-addons" ),
  "base" => "vc_count_down_box_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
        'type' => 'attach_image',
        'heading' => esc_html__('Logo', 'creote-addons') ,
        'param_name' => 'logo',
        'value' => '',
        'group' => esc_html__('General', 'creote-addons') ,
     ),
     array(
        'type' => 'vc_link',
        'heading' => esc_html__('Logo Link', 'creote-addons') ,
        'param_name' => 'logo_link',
        'value' => '#',
        'group' => esc_html__('General', 'creote-addons') ,
    ) ,
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Title', 'creote-addons') ,
        'param_name' => 'title',
        'value' => esc_html__('We are here
        with a new concept', 'creote-addons') ,
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Description', 'creote-addons') ,
        'param_name' => 'description',
        'value' => esc_html__('Idea of denouncing pleasure and praising pain was born & we will give 
        you  a complete account of system.', 'creote-addons') ,
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Date & Timinig', 'creote-addons' ),
        'param_name' => 'coundowntext',
        'value' => 'Feb 15 2022 23:59:59',
        'group' => esc_html__('General', 'creote-addons') ,
    ) ,
)));
}
// shortcode
add_shortcode( 'vc_count_down_box_init', 'vc_count_down_box_v1' );
function vc_count_down_box_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'logo' => '',
      'logo_link' => '#',
      'title' => 'We are here  with a new concept',
      'description' => 'Idea of denouncing pleasure and praising pain was born & we will give   you  a complete account of system.',
      'coundowntext' => 'Feb 15 2022 23:59:59',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$link_box = '';
$link_box_target = '';
if (!empty( $atts['logo_link'])) {
$link            = vc_build_link( $atts['logo_link'] );
$link_box           = $link['url'];
$link_box_target = $link['target'];
}
$logo = wp_get_attachment_image_src( intval( $atts['logo'] ), 'full' );
$logo_get           = $logo ? $logo[0] : '';
ob_start();
?>
 <section class="counter_section">
<div class="upper_section">
    <?php if(!empty($logo_get)): ?>
    <div class="logo_sec">
    <a href="<?php echo esc_url($link_box); ?>"  <?php if(!empty($link_box_target)):?> target="<?php echo esc_attr($link_box_target); ?>" <?php endif; ?>>
     <img src="<?php echo esc_url($logo_get); ?>" alt="logo" />
   </a>
    </div>
    <?php endif; ?>
    <div class="title">
        <?php if(!empty($atts['title'])): ?>
        <h2><?php echo wp_kses($atts['title'], $allowed_tags); ?></h2>
        <?php endif; ?>
        <?php if(!empty($atts['description'])): ?>
        <p><?php echo wp_kses($atts['description'], $allowed_tags); ?></p>
        <?php endif; ?>
    </div>
</div>
<div class="Countdown-timer">
  <div class="countdown" data-date="<?php echo esc_html($atts['coundowntext']); ?>">
    <div class="item">
      <span data-days><?php echo esc_html('0'); ?></span>
      <p><?php echo esc_html('days'); ?></p>
      <small class="cuot">:</small>
    </div>
    <div class="item">
      <span data-hours><?php echo esc_html('0'); ?></span>
      <p><?php echo esc_html('hours'); ?></p>
      <small class="cuot">:</small>
    </div>
    <div class="item">
      <span data-minutes><?php echo esc_html('0'); ?></span>
      <p><?php echo esc_html('minutes'); ?></p>
      <small class="cuot">:</small>
    </div>
    <div class="item">
      <span data-seconds><?php echo esc_html('0'); ?></span>
      <p><?php echo esc_html('seconds'); ?></p>
    </div>
  </div>
</div>
</section>
<?php
return ob_get_clean();
}
