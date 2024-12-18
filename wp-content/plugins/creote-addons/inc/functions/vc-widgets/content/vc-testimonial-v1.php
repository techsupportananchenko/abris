<?php
add_action( 'vc_before_init', 'vc_testimonial_v1_vcmap' );
function vc_testimonial_v1_vcmap() {
 vc_map( array(
  "name" => __( "Testimonial  V1", "creote-addons" ),
  "base" => "vc_testimonial_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
        'type'       => 'dropdown',
        'heading'    => esc_html__('Testimonial Style', 'creote-addons'),
        'param_name' => 'testimonial_styles',
        'value'      => array(
            esc_html__('Testimonial Style One', 'creote-addons')  => 'style_one',
            esc_html__('Testimonial Style Two', 'creote-addons')  => 'style_two',
            esc_html__('Testimonial Style Three', 'creote-addons')  => 'style_three',
        ),
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type'       => 'dropdown',
        'heading'    => esc_html__( 'Color Type ', 'creote-addons' ),
        'param_name' => 'dark_white',
        'value'      => array(
             esc_html__('Dark Color', 'creote-addons')  => 'dark_color', 
             esc_html__('Light Color', 'creote-addons')  => 'light_color', 
        ),
        'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
      'type' => 'param_group',
      'heading' => esc_html__('Testimonial Content', 'creote-addons') ,
      'value' => '',
      'param_name' => 'testimonial_repeater_c',
      'params' => array(
        array(
          'type'        => 'checkbox',
          'heading'     => esc_html__('Image  Enable', 'creote-addons'),
          'param_name'  => 'image_enable',
          'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
          'description' => esc_html__( 'Click Check to enable clident details content', 'creote-addons' ),
        ),
       array(
          'type' => 'attach_image',
          'heading' => esc_html__(' Image', 'creote-addons') ,
          'param_name' => 'image',
          'dependency'  => array(
            'element' => 'image_enable',
            'value'   => 'yes',
          ),
       ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Client Name', 'creote-addons') ,
        'param_name' => 'name',
        'value' => esc_html__('Jacob Leonardo', 'creote-addons') ,
    ) ,
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Client Designation', 'creote-addons') ,
        'param_name' => 'designation',
        'value' => esc_html__('Senior Manager of Excel Solution', 'creote-addons') ,
    ) ,
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Client Comment', 'creote-addons') ,
        'param_name' => 'comment',
        'value' => esc_html__('While running an early stage startup everything feels
        hard, that’s why it’s been so nice to have our accounting
        feel easy. We recommed Qetus.', 'creote-addons') ,
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => esc_html__( 'Rating', 'creote-addons' ),
        'param_name'  => 'rating_one',
        'value'       => array(
            esc_html__( 'Select', 'creote-addons' ) => '',
            esc_html__( '1 star', 'creote-addons' ) => 'one',
            esc_html__( '2 star', 'creote-addons' ) => 'two',
            esc_html__( '3 star', 'creote-addons' ) => 'three',
            esc_html__( '4 star', 'creote-addons' ) => 'four',
            esc_html__( '5 star', 'creote-addons' ) => 'five',
        ),
    ), 
  ),
  'group'      => esc_html__( 'General', 'creote-addons' ),
  ),
  array(
    'type'        => 'checkbox',
    'heading'     => esc_html__('Quotes  Enable', 'creote-addons'),
    'param_name'  => 'quotes_enable',
    'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
    'dependency'  => array(
        'element' => 'testimonial_styles',
        'value'   => 'style_one',
      ),
    'group'      => esc_html__( 'css', 'creote-addons' ),
  ),
  array(
    'type' => 'textfield',
    'heading' => esc_html__('Quotes Move Top', 'creote-addons') ,
    'param_name' => 'quotes_move_top',
    'value' => esc_html__('0px', 'creote-addons') ,
    'dependency'  => array(
        'element' => 'testimonial_styles',
        'value'   => 'style_one',
    ),
    'group'      => esc_html__( 'css', 'creote-addons' ),
  ) ,
  array(
  'type' => 'textfield',
  'heading' => esc_html__('Quotes Move Left', 'creote-addons') ,
  'param_name' => 'quotes_move_left',
  'value' => esc_html__('0px', 'creote-addons') ,
  'dependency'  => array(
      'element' => 'testimonial_styles',
      'value'   => 'style_one',
  ),
  'group'      => esc_html__( 'css', 'creote-addons' ),
) ,
  array(
    'type'        => 'checkbox',
    'heading'     => esc_html__( 'Transitions Enable / Disable', 'creote-addons' ),
    'param_name'  => 'transitions_enable',
    'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
    'group' => esc_html__('css', 'creote-addons') ,
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
    'group' => esc_html__('css', 'creote-addons') ,
  ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Duration', 'creote-addons') ,
        'param_name' => 'duration',
        'value' => '5000',
        'group' => esc_html__('Swiper Options', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'testimonial_styles',
            'value'   => 'style_three',
        ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('speed', 'creote-addons') ,
        'param_name' => 'speed',
        'value' => '5000',
        'group' => esc_html__('Swiper Options', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'testimonial_styles',
            'value'   => 'style_three',
        ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Desktop Display Items', 'creote-addons') ,
        'param_name' => 'desktop',
        'value' => '3',
        'group' => esc_html__('Swiper Options', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'testimonial_styles',
            'value'   => 'style_three',
        ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Tablet Display Items', 'creote-addons') ,
        'param_name' => 'tablet',
        'value' => '3',
        'group' => esc_html__('Swiper Options', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'testimonial_styles',
            'value'   => 'style_three',
        ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Mobile Display Items', 'creote-addons') ,
        'param_name' => 'mobile',
        'value' => '2',
        'group' => esc_html__('Swiper Options', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'testimonial_styles',
            'value'   => 'style_three',
        ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Mini Device Display Items', 'creote-addons') ,
        'param_name' => 'mini',
        'value' => '1',
        'group' => esc_html__('Swiper Options', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'testimonial_styles',
            'value'   => 'style_three',
        ),
    ), 
    array(
        'type'       => 'dropdown',
        'heading'    => esc_html__('Center Slides', 'creote-addons'),
        'param_name' => 'center',
        'value'      => array(
            esc_html__('True', 'creote-addons')  => 'true',
            esc_html__('False', 'creote-addons')  => 'false', 
        ), 
        'group' => esc_html__('Swiper Options', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'testimonial_styles',
            'value'   => 'style_three',
        ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Space', 'creote-addons') ,
        'param_name' => 'space',
        'value' => '30',
        'group' => esc_html__('Swiper Options', 'creote-addons') ,
        'dependency'  => array(
            'element' => 'testimonial_styles',
            'value'   => 'style_three',
        ),
    ),
)));
}
// shortcode
add_shortcode( 'vc_testimonial_v1_init', 'vc_testimonial_v1' );
function vc_testimonial_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'testimonial_styles' => 'style_one',
      'dark_white' => '',
      'testimonial_repeater_c' => '',
      'quotes_enable' => '',
      'quotes_move_top' => '',
      'quotes_move_left' => '',
      'transitions_enable' => '',
      'transitions' => '',
      'duration'  => '500',
      'speed' => '5000',
      'desktop' => '3',
      'tablet' => '3',
      'mobile' => '2',
      'mini' => '1',
      'center' => 'true',
      'space'  => '30',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$testimonial_repeater_cs = function_exists( 'vc_param_group_parse_atts' ) ? vc_param_group_parse_atts($atts['testimonial_repeater_c']) : array();
ob_start();
?>
<div class="testimonial_sec  <?php echo esc_attr($atts['dark_white']); ?> <?php echo esc_attr($atts['testimonial_styles']); ?>">
<?php if($atts['testimonial_styles'] == 'style_one'): ?>
    <?php if($atts['quotes_enable'] == 'yes'): ?>
        <div class="icon_quotes">
            <i class="icon-quote"></i>
        </div>
    <?php endif; ?>
    <div class="swiper-container swiper_single"> 
        <div class="swiper-wrapper">
        <?php if(!empty($testimonial_repeater_cs)): foreach($testimonial_repeater_cs as $key =>  $testimonial_repeater_c):
            $rating_one  = ! empty( $testimonial_repeater_c['rating_one'] ) ? $testimonial_repeater_c['rating_one'] : ''; 
            $image  = ! empty( $testimonial_repeater_c['image'] ) ? $testimonial_repeater_c['image'] : ''; 
            $image_get = wp_get_attachment_image_src( intval( $image ), 'full' );
            $image_put           = $image_get ? $image_get[0] : '';
            ?>
            <div class="swiper-slide">
                <div class="testimonial_box">
                    <div class="rating">
                        <ul>
                            <?php if($rating_one == 'one'): ?>
                            <li><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                            <?php elseif($rating_one == 'two'): ?>
                            <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                            <?php elseif($rating_one == 'three'): ?>
                            <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                            <?php elseif($rating_one == 'four'): ?>
                            <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span></li>
                            <?php elseif($rating_one == 'five'): ?>
                            <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li>
                            <?php else: ?>
                            <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="authour_details <?php if($testimonial_repeater_c['image_enable'] == 'yes'): ?> image_yes <?php endif; ?>">
                        <?php if($testimonial_repeater_c['image_enable'] == 'yes'): ?>
                            <?php if(!empty($image_put)): ?>
                        <div class="image"> 
                                <img src="<?php echo esc_url($image_put); ?>" alt="image" />
                         </div>
                         <?php endif; ?>
                        <?php endif; ?>
                        <div class="details">
                            <h2><?php echo esc_attr($testimonial_repeater_c['name']); ?></h2>
                            <span><?php echo esc_attr($testimonial_repeater_c['designation']); ?></span>
                        </div>
                    </div>  
                    <div class="comment">
                    <?php echo wp_kses($testimonial_repeater_c['comment'] , $allowed_tags); ?>
                    </div>  
                </div>
            </div>
        <?php endforeach; endif;?>
        </div>
        <div class="arrows">
    <div class="prev-single-one"></div>
<div class="next-single-one"></div>
</div>
<div class="num_pagination">
<div class="number-pagination"></div> 
</div>
</div>
<?php elseif($atts['testimonial_styles'] == 'style_two'): ?>
<div class="swiper-container single_swiper">
<div class="swiper-wrapper">     
<?php if(!empty($testimonial_repeater_cs)): foreach($testimonial_repeater_cs as $key =>  $testimonial_repeater_c):
    $rating_one  = ! empty( $testimonial_repeater_c['rating_one'] ) ? $testimonial_repeater_c['rating_one'] : ''; 
    $image  = ! empty( $testimonial_repeater_c['image'] ) ? $testimonial_repeater_c['image'] : ''; 
    $image_get = wp_get_attachment_image_src( intval( $image ), 'full' );
    $image_put           = $image_get ? $image_get[0] : '';
    ?>
            <div class="swiper-slide">
                <div class="testimonial_box">
                <?php if($testimonial_repeater_c['image_enable'] == 'yes'): ?>
                    <?php if(!empty($image_put)): ?>
                    <div class="authour_image">
                    <i class="icon-quote"></i>
                        <img src="<?php echo esc_url($image_put); ?>" alt="image" />
                    </div> 
                    <?php endif; ?> 
                <?php endif; ?> 
                    <div class="comment">
                    <?php echo wp_kses($testimonial_repeater_c['comment'] , $allowed_tags); ?>
                    </div>  
                    <div class="rating">
                        <ul>
                        <?php if($rating_one == 'one'): ?>
                            <li><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                            <?php elseif($rating_one == 'two'): ?>
                            <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                            <?php elseif($rating_one == 'three'): ?>
                            <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                            <?php elseif($rating_one == 'four'): ?>
                            <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span></li>
                            <?php elseif($rating_one == 'five'): ?>
                            <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li>
                            <?php else: ?>
                            <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; endif;?>
</div>
</div>
<div  class="swiper-container single_swiper_tab">
<div class="swiper-wrapper">
<?php if(!empty($testimonial_repeater_cs)): foreach($testimonial_repeater_cs as $key =>  $testimonial_repeater_c): ?>
<div class="swiper-slide">
<div class="auth_details">
        <h2><?php echo esc_attr($testimonial_repeater_c['name']); ?></h2>
        <span><?php echo esc_attr($testimonial_repeater_c['designation']); ?></span>
</div>
</div>
<?php endforeach; endif;?>
</div>
</div>
<?php elseif($atts['testimonial_styles'] == 'style_three'): ?>
<div class="swiper-container swiper_data"  data-swiper='{
                           "loop": true,
                           "autoplay": {
                             "delay": <?php echo esc_attr($atts['duration']); ?>
                           },
                           "speed": <?php echo esc_attr($atts['speed']); ?>,
                           "centeredSlides": <?php echo esc_attr($atts['center']); ?>, 
                           "spaceBetween": <?php echo esc_attr($atts['space']); ?>,
                           "pagination": {
                             "el": ".swiper-pagination",
                             "clickable": true
                           },
                           "navigation": {
                             "nextEl": ".next-single-one_three",
                             "prevEl": ".prev-single-one_three"
                           },
                           "breakpoints": {
                              "1200": {
                                 "slidesPerView": <?php echo esc_attr($atts['desktop']); ?> 
                                },
                              "1024": {
                               "slidesPerView": <?php echo esc_attr($atts['tablet']); ?> 
                              },
                             "768": {
                               "slidesPerView": <?php echo esc_attr($atts['mobile']); ?>
                             },
                             "576": {
                               "slidesPerView": <?php echo esc_attr($atts['mini']); ?>
                             },
                             "0": {
                              "slidesPerView": 1 
                            }
                           }
                         }'>
<div class="swiper-wrapper">
<?php if(!empty($testimonial_repeater_cs)): foreach($testimonial_repeater_cs as $key =>  $testimonial_repeater_c): 
  $rating_one  = ! empty( $testimonial_repeater_c['rating_one'] ) ? $testimonial_repeater_c['rating_one'] : ''; 
          $image  = ! empty( $testimonial_repeater_c['image'] ) ? $testimonial_repeater_c['image'] : ''; 
          $image_get = wp_get_attachment_image_src( intval( $image ), 'full' );
          $image_put           = $image_get ? $image_get[0] : '';
    ?>
<div class="swiper-slide">
                  <div class="testimonial_box">
                  <i class="icon-quote"></i>
                            <?php if(!empty($testimonial_repeater_c['comment'])): ?>
                            <p class="description">
                            <?php echo wp_kses($testimonial_repeater_c['comment'] , $allowed_tags); ?>
                            </p>
                            <?php endif; ?>
                            <?php if(!empty($testimonial_repeater_c['name'])): ?>
                            <h3 class="title"><?php echo esc_attr($testimonial_repeater_c['name']); ?></h3>
                            <?php endif; ?>
                            <?php if(!empty($testimonial_repeater_c['designation'])): ?>
                            <p class="from"><?php echo esc_attr($testimonial_repeater_c['designation']); ?></p>
                            <?php endif; ?>
                            <?php if($testimonial_repeater_c['image_enable'] == 'yes'): ?>
                    <?php if(!empty($image_put)): ?>
                            <div class="pic">
                            <img src="<?php echo esc_url($image_put); ?>" alt="image" />
                            </div>
                            <?php endif; ?>
                            <?php endif; ?>
                            <div class="rating">
                <ul>
                <?php if($testimonial_repeater_c['rating_one'] == 'one'): ?>
                    <li><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                    <?php elseif($testimonial_repeater_c['rating_one'] == 'two'): ?>
                    <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                    <?php elseif($testimonial_repeater_c['rating_one'] == 'three'): ?>
                    <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                    <?php elseif($testimonial_repeater_c['rating_one'] == 'four'): ?>
                    <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span></li>
                    <?php elseif($testimonial_repeater_c['rating_one'] == 'five'): ?>
                    <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li>
                    <?php else: ?>
                    <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span></li>
                    <?php endif; ?>
                </ul>
            </div>
            </div>           </div>
<?php endforeach; endif;?>
</div>
</div>
<div class="arrows">
    <div class="prev-single-one_three"></div>
    <div class="next-single-one_three"></div>
</div>
<?php endif; ?>
</div>
<?php
return ob_get_clean();
}
