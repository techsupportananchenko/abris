<?php
add_action( 'vc_before_init', 'vc_faqs_v1_vcmap' );
function vc_faqs_v1_vcmap() {
 vc_map( array(
  "name" => __( "Faqs V1", "creote-addons" ),
  "base" => "vc_faqs_v1_init",
  "class" => "",
  "icon" => "icon-creote-svg", 
  "category" => __( "Creote Content", "creote-addons"),
  "params" => array(
    array(
    'type'       => 'dropdown',
    'heading'    => esc_html__( 'Faqs Styles', 'creote-addons' ),
    'param_name' => 'faq_type',
    'value'      => array(
        esc_html__( 'Style One', 'creote-addons' )  => 'type_one',
        esc_html__( 'Style Two', 'creote-addons' )  => 'type_two',
    ),
    'group' => esc_html__('General', 'creote-addons') ,
    ),
    array(
        'type' => 'param_group',
        'heading' => esc_html__('Faqs Content', 'creote-addons') ,
        'value' => '',
        'param_name' => 'faqs_v1_repeater',
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Icon Fonts', 'creote-addons') ,
                'param_name' => 'faq_icons',
                'value'       => vc_get_creote_icons(),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Faqs Heading', 'creote-addons') ,
                'param_name' => 'faqsheading_text',
                'value' => esc_html__('How do I make a yearly payment?', 'creote-addons') ,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Faqs Description', 'creote-addons') ,
                'param_name' => 'faqsdescription',
                'value' => esc_html__('Serenity Is Multi-Faceted Blockchain Based Ecosystem, Energy Retailer For The People, Focusing On The Promotion Of Sustainable Living, Renewable Energy Production And Smart Energy Grid Utility Services.', 'creote-addons') ,
            ),
            array(
                'type'        => 'checkbox',
                'heading'     => esc_html__( 'Faq Active / Deactive', 'creote-addons' ),
                'param_name'  => 'faqs_active_tbs',
                'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
            ),
            array(
                'type'        => 'checkbox',
                'heading'     => esc_html__( 'Transitions Enable / Disable', 'creote-addons' ),
                'param_name'  => 'transitions_enable',
                'value'       => array( esc_html__( 'Yes', 'creote-addons' ) => 'yes' ),
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
            ),
        ),
        'group' => esc_html__('General', 'creote-addons') ,
    ),
)));
}
// shortcode
add_shortcode( 'vc_faqs_v1_init', 'vc_faqs_v1' );
function vc_faqs_v1( $atts, $content = null ) { 
 $atts = shortcode_atts(
   array(
      'faq_type' => 'type_one',
      'faqs_v1_repeater' => '',
   ), $atts
);
$allowed_tags = wp_kses_allowed_html('post');
$faqs_v1_repeaters = function_exists( 'vc_param_group_parse_atts' ) ? vc_param_group_parse_atts( $atts['faqs_v1_repeater'] ) : array();
ob_start();
?>
<section class="faq_section <?php echo esc_attr($atts['faq_type']); ?>">
    <div class="block_faq">
        <div class="accordion">
            <dl>
                    <?php if(!empty($faqs_v1_repeaters)): foreach($faqs_v1_repeaters as $key => $faqs_block): 
                          $transitions_enable  = ! empty( $faqs_block['transitions_enable'] ) ? $faqs_block['transitions_enable'] : ''; 
                          $faqs_active_tb  = ! empty( $faqs_block['faqs_active_tbs'] ) ? $faqs_block['faqs_active_tbs'] : '';
                        ?>
                  <?php if($atts['faq_type'] == 'type_one'): ?>
        <dt class="faq_header <?php if($faqs_active_tb == 'yes'): echo  esc_attr('active'); endif;?>"  <?php if($transitions_enable == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($faqs_block['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
           <span class="<?php echo esc_attr($faqs_block['faq_icons']);?>"></span> <?php echo wp_kses($faqs_block['faqsheading_text'] , $allowed_tags);?>
      </dt>
                <dd class="accordion-content" <?php if($faqs_active_tb == 'yes'):?> style="display:block;" <?php endif;?>  <?php if($transitions_enable == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($faqs_block['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
                    <p>
                        <?php echo wp_kses($faqs_block['faqsdescription'] , $allowed_tags);?>
                    </p>
                </dd>
                <?php elseif($atts['faq_type'] == 'type_two'): ?>
        <dt class="faq_header <?php if($faqs_active_tb == 'yes'): echo  esc_attr('active'); endif;?>"  <?php if($transitions_enable == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($faqs_block['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
            <?php echo wp_kses($faqs_block['faqsheading_text'] , $allowed_tags);?><span class="<?php echo esc_attr($faqs_block['faq_icons']);?>"></span>
      </dt>
                <dd class="accordion-content" <?php if($faqs_active_tb == 'yes'):?> style="display:block;" <?php endif;?>  <?php if($transitions_enable == 'yes'):  ?>  data-aos="fade-up" data-aos-delay="<?php echo esc_html($faqs_block['transitions']); ?>" data-aos-offset="0" <?php endif;?>>
                    <p>
                        <?php echo wp_kses($faqs_block['faqsdescription'] , $allowed_tags);?>
                    </p>
                </dd>
                <?php endif; ?>
                <?php endforeach; endif;?>
            </dl>
        </div>
    </div>
</section>
<?php
return ob_get_clean();
}
