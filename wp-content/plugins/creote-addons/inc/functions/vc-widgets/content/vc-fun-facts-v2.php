<?php
add_action( 'vc_before_init', 'vc_fun_facts_v2_vcmap' );
function vc_fun_facts_v2_vcmap() {
 vc_map( array(
  "name" => __( "Fun Facts V2", "creote-addons" ),
  "base" => "vc_fun_facts_v2_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
    'type'       => 'dropdown',
    'heading'    => esc_html__( 'Fun Facts Styles', 'creote-addons' ),
    'param_name' => 'counter_style',
    'value'      => array(
        esc_html__( 'Style One', 'creote-addons' )  => 'style_one',
        esc_html__( 'Style Two', 'creote-addons' )  => 'style_two',
    ),
    'group' => esc_html__('General', 'creote-addons') ,
    ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Icon Type', 'creote-addons'),
                'param_name' => 'icon_type',
                'value'      => array(
                    esc_html__( 'Icon Font Type', 'creote-addons' ) => 'icon_fonts_enable' ,
                    esc_html__( 'Icon Image Type', 'creote-addons' ) => 'icon_image_enable' ,
                ),
                'group' => esc_html__('General', 'creote-addons') ,
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Icon Image', 'creote-addons') ,
                'param_name' => 'icon_images',
                'value' => '',
                'dependency'  => array(
                    'element' => 'icon_type',
                    'value'   => 'icon_image_enable',
                ),
                'group' => esc_html__('General', 'creote-addons') ,
             ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Icon Fonts', 'creote-addons') ,
                'param_name' => 'icon_fonts',
                'value'       => vc_get_creote_icons(),
                'dependency'  => array(
                    'element' => 'icon_type',
                    'value'   => 'icon_fonts_enable',
                ),
                'group' => esc_html__('General', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Counter Start', 'creote-addons') ,
                'param_name' => 'counter_start',
                'value' => esc_html__('4536', 'creote-addons') ,
                'group' => esc_html__('General', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Fact Heading', 'creote-addons') ,
                'param_name' => 'fact_heading',
                'value' => esc_html__('How do I make a yearly payment?', 'creote-addons') ,
                'group' => esc_html__('General', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Fact Description', 'creote-addons') ,
                'param_name' => 'fact_description',
                'value' => esc_html__('Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse Cillum.', 'creote-addons') ,
                'group' => esc_html__('General', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Fact Symbols', 'creote-addons') ,
                'param_name' => 'fact_symbols',
                'value' => esc_html__('+', 'creote-addons') ,
                'description' => __('Enter Your Symbols', 'creote-addons'),
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
add_shortcode( 'vc_fun_facts_v2_init', 'vc_fun_facts_v2' );
function vc_fun_facts_v2( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'counter_style' => 'style_one',
      'icon_type' => 'icon_fonts_enable',
      'icon_images' => '',
      'icon_fonts' => 'fa fa-facebook',
      'counter_start' => '423',
      'fact_heading' => 'Projects Completes',
      'fact_description' => 'we denounce with righteous indignation dislike men who are so beguiled demoralized by the charms of pleasure of the moment,',
      'fact_symbols' => '%',
      'transitions_enable' => '',
      'transitions' => '',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
ob_start();
?>
 <section class="section__counter">
      <?php if($atts['counter_style'] == 'style_one'): ?>
          <div class="counter-block style_one count-box" <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
              <div class="icon_box  <?php if($atts['icon_type'] == 'icon_fonts_enable' ): ?> icon_yes <?php endif; ?>">
                          <?php if($atts['icon_type'] == 'icon_image_enable'): 
                            $icon_image = wp_get_attachment_image_src( intval( $atts['icon_images'] ), 'full' );
                            $icon_images           = $icon_image ? $icon_image[0] : '';
                            ?>
                            <?php if(!empty($icon_images)): ?>
                              <div class="icon">
                              <img src="<?php echo esc_url($icon_images); ?>" class="img-fluid svg_image" alt="<?php esc_attr_e('icon png', 'creote-addons'); ?>" />
                              </div>
                              <?php endif; ?>
                              <?php endif; ?>
                           <?php if($atts['icon_type'] == 'icon_fonts_enable'): ?>
                               <div class="icon">
                                 <span class="<?php echo esc_html($atts['icon_fonts']); ?>"></span>
                               </div>
                           <?php endif; ?>
                           <div class="coun_ter">
                           <span class="count-text" data-speed="1500" data-stop="<?php echo esc_attr($atts['counter_start']); ?>">0</span>
                              <small><?php echo esc_attr($atts['fact_symbols']); ?></small>
                           </div>
          </div>
          <div class="content_box">
              <h6><?php echo esc_attr($atts['fact_heading']); ?></h6>
              <p><?php echo esc_attr($atts['fact_description']); ?></p>
          </div>     
      </div>
          <?php elseif($atts['counter_style'] == 'style_two'): ?>
              <div class="counter-block style_two count-box" <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
                  <div class="coun_ter">
             <span class="count-text" data-speed="1500" data-stop="<?php echo esc_attr($atts['counter_start']); ?>">0</span>
                   <small><?php echo esc_attr($atts['fact_symbols']); ?></small>
          </div>
          <div class="content_box">
              <h6><?php echo esc_attr($atts['fact_heading']); ?></h6>
          </div>  
              <div class="icon_box  <?php if($atts['icon_type'] == 'icon_fonts_enable'): ?> icon_yes <?php endif; ?>">
                          <?php if($atts['icon_type'] == 'icon_image_enable' ): 
                            $icon_image = wp_get_attachment_image_src( intval( $atts['icon_images'] ), 'full' );
                            $icon_images           = $icon_image ? $icon_image[0] : '';
                            ?>
                            <?php if(!empty($icon_images)): ?>
                              <div class="icon">
                              <img src="<?php echo esc_url($icon_images); ?>" class="img-fluid svg_image" alt="<?php esc_attr_e('icon png', 'creote-addons'); ?>" />
                              </div>
                              <?php endif; ?>
                              <?php endif; ?>
                           <?php if($atts['icon_type'] == 'icon_fonts_enable'): ?>
                               <div class="icon">
                                 <span class="<?php echo esc_html($atts['icon_fonts']); ?>"></span>
                               </div>
                           <?php endif; ?>
          </div>
      </div>
          <?php endif; ?>
  </section>
<?php
return ob_get_clean();
}
