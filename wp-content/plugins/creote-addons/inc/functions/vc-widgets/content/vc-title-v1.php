<?php
add_action( 'vc_before_init', 'vc_title_v1_vcmap' );
function vc_title_v1_vcmap() {
 vc_map( array(
  "name" => __( "Title V1", "creote-addons" ),
  "base" => "vc_title_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
    'type'       => 'dropdown',
    'heading'    => esc_html__( 'Title style', 'creote-addons' ),
    'param_name' => 'title_styles',
    'value'      => array(
        esc_html__( 'Style One', 'creote-addons' )  => 'style_one',
        esc_html__( 'Style Two', 'creote-addons' )  => 'style_two', 
        esc_html__( 'Style Three', 'creote-addons' )  => 'style_three', 
    ),
    'group' => esc_html__('General', 'creote-addons') ,
    ),
  array(
      'type'       => 'dropdown',
      'heading'    => esc_html__('Title alignments', 'creote-addons'),
      'param_name' => 'title_alignments',
      'value'      => array(
          esc_html__( 'Text Left', 'creote-addons' ) => 'left' ,
          esc_html__( 'Text Center', 'creote-addons' ) => 'center' ,
          esc_html__( 'Text Right', 'creote-addons' ) => 'right',
      ),
      'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Small Heading', 'creote-addons') ,
        'param_name' => 'title_small_heading',
        'group' => esc_html__('Title Content', 'creote-addons') ,
    ),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Title', 'creote-addons') ,
        'param_name' => 'title_heading',
        'group' => esc_html__('Title Content', 'creote-addons') ,
    ),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Description', 'creote-addons') ,
        'param_name' => 'title_description',
        'group' => esc_html__('Title Content', 'creote-addons') ,
    ),
    array(
        'type'       => 'dropdown',
        'heading'    => esc_html__( 'Title Color Type ', 'creote-addons' ),
        'param_name' => 'dark_white',
        'value'      => array(
             esc_html__('Dark Color', 'creote-addons')  => 'dark_color', 
             esc_html__('Light Color', 'creote-addons')  => 'light_color',
        ),
        'group' => esc_html__('Title Content', 'creote-addons') ,
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
    array(
        'type' => 'colorpicker',
        'heading' => esc_html__('Small Title Color', 'creote-addons') ,
        'param_name' => 'smtitle_color',
        'value' => '',
        'group' => esc_html__('Css', 'creote-addons'),
      ),
    array(
        'type' => 'colorpicker',
        'heading' => esc_html__('Title Color', 'creote-addons') ,
        'param_name' => 'title_color',
        'value' => '',
        'group' => esc_html__('Css', 'creote-addons'),
      ),
      array(
        'type' => 'colorpicker',
        'heading' => esc_html__('Description Color', 'creote-addons') ,
        'param_name' => 'description_color',
        'value' => '',
        'group' => esc_html__('Css', 'creote-addons'),
      ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__('Small Title Padding', 'creote-addons') ,
      'param_name' => 'smtitle_padding',
      'value' => '0px 0px 0px 0px',
      'group' => esc_html__('Css', 'creote-addons'),
    ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__(' Title Padding', 'creote-addons') ,
      'param_name' => 'title_padding',
      'value' => '0px 0px 0px 0px',
      'group' => esc_html__('Css', 'creote-addons'),
    ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__('Description  Padding', 'creote-addons') ,
      'param_name' => 'desc_padding',
      'value' => '0px 0px 0px 0px',
      'group' => esc_html__('Css', 'creote-addons'),
    ),
)));
}
// shortcode
add_shortcode( 'vc_title_v1_init', 'vc_titles_v1' );
function vc_titles_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'title_styles' => 'style_one',
      'title_alignments' => 'left',
      'title_small_heading' => 'Intelligent',
      'title_heading' => 'Human Resourcess',
      'title_description' => '',
      'transitions_enable' => '',
      'transitions' => '',
      'title_color' => '',
      'smtitle_color' => '',
      'description_color' => '',
      'smtitle_padding' => '',
      'title_padding' => '',
      'desc_padding' => '', 
      'dark_white' => 'dark_color',
   ), $atts
);
//styling
$title_color  = $atts['title_color'];
$title_color    = ! empty( $title_color ) ? "color: $title_color!important;" : '';
$title_padding  = $atts['title_padding'];
$title_padding    = ! empty( $title_padding ) ? "padding: $title_padding!important;" : '';
$title_colorcss  = "style='$title_color $title_padding '";
$smtitle_color  = $atts['smtitle_color'];
$smtitle_color    = ! empty( $smtitle_color ) ? "color: $smtitle_color!important;" : '';
$smtitle_padding  = $atts['smtitle_padding'];
$smtitle_padding    = ! empty( $smtitle_padding ) ? "padding: $smtitle_padding!important;" : '';
$smtitle_colorcss  = "style='$smtitle_color $smtitle_padding'";
$description_color  = $atts['description_color'];
$description_color    = ! empty( $description_color ) ? "color: $description_color!important;" : '';
$desc_padding  = $atts['desc_padding'];
$desc_padding    = ! empty( $desc_padding ) ? "padding: $desc_padding!important;" : '';
$description_colorcss  = "style='$description_color $desc_padding'";
$title_alignments = $atts['title_alignments'];
$title_alignments    = ! empty( $title_alignments ) ? "text-align: $title_alignments!important;" : '';
$title_alignmentscss  = "style='$title_alignments'";
//stylingend
$allowed_tags = wp_kses_allowed_html('post');
ob_start();
?>
<div class="title_all_box  <?php echo esc_attr($atts['dark_white']); ?>  
<?php echo esc_attr($atts['title_styles']); ?>" <?php if($atts['transitions_enable'] == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($atts['transitions']); ?>" data-aos-offset="0" <?php endif;?>
    <?php echo __($title_alignmentscss); ?>>
    <?php if($atts['title_styles'] == 'style_one'):?>
            <?php // title one end   ?>
               <div class="title_sections">
                   <?php if(!empty($atts['title_small_heading'])):?>
                  <div class="before_title" <?php echo __($smtitle_colorcss); ?>>
                  <?php echo wp_kses($atts['title_small_heading'] , $allowed_tags) ?>
                  </div>
                  <?php endif; ?>
                  <?php if(!empty($atts['title_heading'])):?>
                  <h2 <?php echo __($title_colorcss); ?>>  <?php echo wp_kses($atts['title_heading'] , $allowed_tags) ?></h2>
                  <?php endif; ?>
                  <?php if(!empty($atts['title_description'])):?>
                  <p <?php echo __($description_colorcss); ?>>  <?php echo wp_kses($atts['title_description'] , $allowed_tags) ?></p>
                  <?php endif; ?>
            </div>
            <?php // title one end   ?>
            <?php elseif($atts['title_styles'] == 'style_two'):?>
            <?php // title two    ?>
               <div class="title_sections two">
                   <?php if(!empty($atts['title_small_heading'])):?>
                  <div class="before_title" <?php echo __($smtitle_colorcss); ?>>
                  <?php echo wp_kses($atts['title_small_heading'] , $allowed_tags) ?>
                  </div>
                  <?php endif; ?>
                  <?php if(!empty($atts['title_heading'])):?>
                  <h2 <?php echo __($title_colorcss); ?>>  <?php echo wp_kses($atts['title_heading'] , $allowed_tags) ?></h2>
                  <?php endif; ?>
                  <?php if(!empty($atts['title_description'])):?>
                  <p <?php echo __($description_colorcss); ?>>  <?php echo wp_kses($atts['title_description'] , $allowed_tags) ?></p>
                  <?php endif; ?>
            </div>
        <?php // title two end   ?>
        <?php elseif($atts['title_styles'] == 'style_three'):?>
          <?php // title three end   ?>
               <div class="title_sections three <?php echo esc_attr($atts['title_alignments']); ?>">
                   <?php if(!empty($atts['title_small_heading'])):?>
                  <div class="before_title" <?php echo __($smtitle_colorcss); ?>>
                  <?php echo wp_kses($atts['title_small_heading'] , $allowed_tags) ?>
                  </div>
                  <?php endif; ?>
                  <?php if(!empty($atts['title_heading'])):?>
                  <h2  <?php echo __($title_colorcss); ?>>  <?php echo wp_kses($atts['title_heading'] , $allowed_tags) ?></h2>
                  <?php endif; ?>
                  <?php if(!empty($atts['title_description'])):?>
                  <p <?php echo __($description_colorcss); ?>>  <?php echo wp_kses($atts['title_description'] , $allowed_tags) ?></p>
                  <?php endif; ?>
            </div>
        <?php // title three end   ?>
        <?php endif; ?>    
        </div>
<?php
return ob_get_clean();
}
