<?php
add_action( 'vc_before_init', 'vc_icon_box_v1_vcmap' );
function vc_icon_box_v1_vcmap() {
 vc_map( array(
  "name" => __( "Icon Box V1", "creote-addons" ),
  "base" => "vc_icon_box_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
    'type'       => 'dropdown',
    'heading'    => esc_html__( 'Icon Styles', 'creote-addons' ),
    'param_name' => 'iconboxstyle',
    'value'      => array(
        esc_html__( 'Style One', 'creote-addons' )  => 'style_one',
        esc_html__( 'Style Two', 'creote-addons' )  => 'style_two',
        esc_html__( 'Style Three', 'creote-addons' )  => 'style_three',
        esc_html__( 'Style Four', 'creote-addons' )  => 'style_four',
    ),
    'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type'       => 'dropdown',
        'heading'    => esc_html__('Icon Box alignments', 'creote-addons'),
        'param_name' => 'icon_title_alignments',
        'value'      => array(
            esc_html__( 'Text Left', 'creote-addons' ) => 'text-start' ,
            esc_html__( 'Text Center', 'creote-addons' ) => 'text-center' ,
            esc_html__( 'Text Right', 'creote-addons' ) => 'text-end',
        ),
        'group' => esc_html__('General', 'creote-addons') ,
    ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Icon Type', 'creote-addons'),
                'param_name' => 'icon_or_image',
                'value'      => array(
                    esc_html__( 'Icon Font Type', 'creote-addons' ) => 'icon_yes' ,
                    esc_html__( 'Icon Image Type', 'creote-addons' ) => 'image_yes' ,
                ),
                'group' => esc_html__('General', 'creote-addons') ,
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Icon Image', 'creote-addons') ,
                'param_name' => 'icon_image',
                'value' => '',
                'dependency'  => array(
                    'element' => 'icon_or_image',
                    'value'   => 'image_yes',
                ),
                'group' => esc_html__('General', 'creote-addons') ,
             ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Icon Fonts', 'creote-addons') ,
                'param_name' => 'icon_fonts',
                'value'       => vc_get_creote_icons(),
                'dependency'  => array(
                    'element' => 'icon_or_image',
                    'value'   => 'icon_yes',
                ),
                'group' => esc_html__('General', 'creote-addons') ,
            ),
            array(
                'type'        => 'checkbox',
                'heading'     => esc_html__('Move Icon Center Enable', 'creote-addons'),
                'param_name'  => 'icon_center',
                'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
                'group' => esc_html__('General', 'creote-addons') ,
                'dependency'  => array(
                    'element' => 'iconboxstyle',
                    'value'   => 'style_one',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Heading', 'creote-addons') ,
                'param_name' => 'icon_box_heading',
                'value' => esc_html__('Conserve Water', 'creote-addons') ,
                'group' => esc_html__('General', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Description', 'creote-addons') ,
                'param_name' => 'icon_box_description',
                'value' => esc_html__('Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse Cillum.', 'creote-addons') ,
                'group' => esc_html__('General', 'creote-addons') ,
            ),
            array(
                'type' => 'textarea',
                'heading' => esc_html__('List items', 'creote-addons') ,
                'param_name' => 'list_items',
                'value' => esc_html__('Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse Cillum.', 'creote-addons') ,
                'group' => esc_html__('General', 'creote-addons') ,
                'dependency'  => array(
                    'element' => 'iconboxstyle',
                    'value'   => 'style_three',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Button Text', 'creote-addons') ,
                'param_name' => 'button_text',
                'value' => esc_html__('Read More', 'creote-addons') ,
                'group' => esc_html__('General', 'creote-addons') ,
                'dependency'  => array(
                    'element' => 'iconboxstyle',
                    'value'   => 'style_three',
                ),
            ),
            array(
                'type' => 'vc_link',
                'heading' => esc_html__('Link', 'creote-addons') ,
                'param_name' => 'link_box',
                'value' => esc_html__('#', 'creote-addons') ,
                'group' => esc_html__('General', 'creote-addons') ,
            ),
        array(
            'type'       => 'dropdown',
            'heading'    => esc_html__( 'Color Type ', 'creote-addons' ),
            'param_name' => 'dar_light_color',
            'value'      => array(
                 esc_html__('Dark Color  One', 'creote-addons')  => 'dark_color_one', 
                 esc_html__('Light Color One', 'creote-addons')  => 'light_color_one',
                 esc_html__('Light Color Two', 'creote-addons')  => 'light_color_two',
            ),
            'group' => esc_html__('General', 'creote-addons') ,
        ),
            array(
                'type'        => 'checkbox',
                'heading'     => esc_html__( 'Transitions Enable / Disable', 'creote-addons' ),
                'param_name'  => 'transitions_enable',
                'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
                'group' => esc_html__('General', 'creote-addons') ,
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
                'group' => esc_html__('General', 'creote-addons') ,
            ),
)));
}
// shortcode
add_shortcode( 'vc_icon_box_v1_init', 'vc_icon_box_v1' );
function vc_icon_box_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'iconboxstyle' => 'style_one',
      'icon_title_alignments' => 'text-center',
      'icon_or_image' => 'icon_yes',
      'icon_image' => '',
      'icon_fonts' => 'fa fa-facebook',
      'icon_center' => '',
      'icon_box_heading' => 'Conserve Water',
      'icon_box_description' => 'We denounce with righteous indignation dislike men who are so beguiled demoralized by the charms of pleasure of the moment,',
      'list_items' => 'Commitment to excellence
      Consumer focus',
      'button_text' => 'Read More',
      'link_box' => '',
      'transitions_enable' => '',
      'dar_light_color' => '',
      'transitions' => '0',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$link_box  = '';
$link_box_target  = '';
 if (!empty( $atts['link_box'])) {
   $link = vc_build_link($atts['link_box']);
   $link_box = $link['url'];
   $link_box_target = $process_link['target'];
}
$icon_image = wp_get_attachment_image_src( intval( $atts['icon_image'] ), 'full' );
$icon_images           = $icon_image ? $icon_image[0] : '';
ob_start();
?>
   <div class="icon_box_all  <?php echo esc_attr($atts['iconboxstyle']); ?> <?php echo esc_attr($atts['dar_light_color']); ?>" <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
<?php if($atts['iconboxstyle'] == 'style_one'): ?>
<div class="icon_content <?php if($atts['icon_center'] == 'yes'): ?> icon_centers <?php endif; ?>">
        <?php if($atts['icon_or_image'] == 'image_yes'): ?>
            <?php if(!empty($icon_images)): ?>
        <div class="icon">
            <img src="<?php echo esc_url($icon_images); ?>" class="img-fluid svg_image" alt="icon png" />
        </div>
        <?php endif; ?>
        <?php elseif($atts['icon_or_image'] == 'icon_yes'): ?>
        <div class="icon">
            <span class="<?php echo esc_html($atts['icon_fonts']); ?>"></span>
        </div>
        <?php endif; ?>
        <div class="txt_content">
           <?php if(!empty($atts['icon_box_heading'])):?>
               <h3>
               <a href="<?php echo esc_url($link_box); ?>"  <?php if(!empty($link_box_target)):?> target="<?php echo esc_attr($link_box_target); ?>" <?php endif; ?>>
                    <?php echo wp_kses($atts['icon_box_heading'] , $allowed_tags) ?>
                    </a>
                </h3>
            <?php endif; ?>
            <?php if(!empty($atts['icon_box_description'])):?>
            <p>
                <?php echo wp_kses($atts['icon_box_description'] , $allowed_tags) ?>
            </p>
            <?php endif; ?>
        </div>
</div>
<?php elseif($atts['iconboxstyle'] == 'style_two'): ?>
<div class="icon_content <?php if($atts['icon_or_image'] == 'image_yes'): ?> icon_imgs <?php endif; ?>">
        <?php if($atts['icon_or_image'] == 'image_yes'): ?>
            <?php if(!empty($icon_images)): ?>
        <div class="icon">
            <img src="<?php echo esc_url($icon_images); ?>" class="img-fluid svg_image" alt="icon png" />
        </div>
        <?php endif; ?>
        <?php elseif($atts['icon_or_image'] == 'icon_yes'): ?>
        <div class="icon">
            <span class="<?php echo esc_html($atts['icon_fonts']); ?>"></span>
        </div>
        <?php endif; ?>
        <div class="txt_content">
           <?php if(!empty($atts['icon_box_heading'])):?>
               <h3>
               <a href="<?php echo esc_url($link_box); ?>"  <?php if(!empty($link_box_target)):?> target="<?php echo esc_attr($link_box_target); ?>" <?php endif; ?>>
                        <?php echo wp_kses($atts['icon_box_heading'] , $allowed_tags) ?>
                    </a>
                </h3>
            <?php endif; ?>
            <?php if(!empty($atts['icon_box_description'])):?>
            <p>
                <?php echo wp_kses($atts['icon_box_description'] , $allowed_tags) ?>
            </p>
            <?php endif; ?>
        </div>
</div>
<?php elseif($atts['iconboxstyle'] == 'style_three'): ?>
    <div class="icon_content <?php if($atts['icon_or_image'] == 'image_yes'): ?> icon_imgs <?php endif; ?>">
        <?php if($atts['icon_or_image'] == 'image_yes'): ?>
            <?php if(!empty($icon_images)): ?>
        <div class="icon">
            <img src="<?php echo esc_url($icon_images); ?>" class="img-fluid svg_image" alt="icon png" />
        </div>
        <?php endif; ?>
        <?php elseif($atts['icon_or_image'] == 'icon_yes'): ?>
        <div class="icon">
            <span class="<?php echo esc_html($atts['icon_fonts']); ?>"></span>
        </div>
        <?php endif; ?>
        <div class="txt_content">
           <?php if(!empty($atts['icon_box_heading'])):?>
               <h3>
               <a href="<?php echo esc_url($link_box); ?>"  <?php if(!empty($link_box_target)):?> target="<?php echo esc_attr($link_box_target); ?>" <?php endif; ?>>
                        <?php echo wp_kses($atts['icon_box_heading'] , $allowed_tags) ?>
                    </a>
                </h3>
            <?php endif; ?>
            <?php if(!empty($atts['icon_box_description'])):?>
            <p>
                <?php echo wp_kses($atts['icon_box_description'] , $allowed_tags) ?>
            </p>
            <?php endif; ?>
            <?php if(!empty($atts['list_items'])): ?>
          <?php $list_items = explode("\n", ($atts['list_items']));?>
          <ul>
            <?php foreach($list_items as $list_item):?>
            <li>
                <?php echo wp_kses($list_item, true); ?>
            </li>
            <?php endforeach; ?>
          </ul>
    <?php endif; ?>
    <?php if(!empty($atts['button_text'])): ?>
        <div class="btn_left">
        <a href="<?php echo esc_url($link_box); ?>"  <?php if(!empty($link_box_target)):?> target="<?php echo esc_attr($link_box_target); ?>" <?php endif; ?> class="theme-btn one">
  <?php echo esc_html($atts['button_text']);?>
</a>
</div>
    <?php endif; ?>
        </div>
</div>
<?php elseif($atts['iconboxstyle'] == 'style_four'): ?>
    <div class="icon_content <?php if($atts['icon_or_image'] == 'image_yes'): ?> icon_imgs <?php endif; ?>">
        <?php if($atts['icon_or_image'] == 'image_yes'): ?>
            <?php if(!empty($icon_images)): ?>
        <div class="icon">
            <img src="<?php echo esc_url($icon_images); ?>" class="img-fluid svg_image" alt="icon png" />
            <img src="<?php echo esc_url(CREOTE_ADDONS_URL. 'assets/images/shape-1-small.png'); ?>" class="shape" alt="img" />
        </div>
        <?php endif; ?>
        <?php elseif($atts['icon_or_image'] == 'icon_yes'): ?>
        <div class="icon">
            <span class="<?php echo esc_html($atts['icon_fonts']); ?>"></span>
            <img src="<?php echo esc_url(CREOTE_ADDONS_URL. 'assets/images/shape-1-small.png'); ?>" class="shape" alt="img" />
        </div>
        <?php endif; ?>
        <div class="txt_content">
           <?php if(!empty($atts['icon_box_heading'])):?>
               <h3>
               <a href="<?php echo esc_url($link_box); ?>"  <?php if(!empty($link_box_target)):?> target="<?php echo esc_attr($link_box_target); ?>" <?php endif; ?>>
                        <?php echo wp_kses($atts['icon_box_heading'] , $allowed_tags) ?>
                    </a>
                </h3>
            <?php endif; ?>
            <?php if(!empty($atts['icon_box_description'])):?>
            <p>
                <?php echo wp_kses($atts['icon_box_description'] , $allowed_tags) ?>
            </p>
            <?php endif; ?>
        </div>
</div>
<?php endif; ?>
</div>
<?php
return ob_get_clean();
}
