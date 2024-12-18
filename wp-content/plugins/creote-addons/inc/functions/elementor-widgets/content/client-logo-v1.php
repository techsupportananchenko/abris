<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_logo_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-client-brand-v1';
       }
       public function get_title()
       {
           return __('Client V1' , 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['102'];
       }
       protected function register_controls()
       {
        $this->start_controls_section('logo_cotnent',
           [ 
               'label' => __('Logo cotnent', 'creote-addons')
           ]
        );
           $this->add_control(
               'client_logo_style',
               [
                   'label' => __('Client Styles', 'creote-addons'),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
                       'type_one' => esc_html__( 'Style One', 'creote-addons' ),
                       'type_two' => esc_html__( 'Style Two', 'creote-addons' ),
                       'type_three' => esc_html__( 'Style Three', 'creote-addons' ),
                   ],
                   'default' => 'type_one',
               ]
             );
             $this->add_responsive_control(
               'logo_alignments',
               [
                   'label' => __('Logo alignments', 'creote-addons'),
                   'type' => Controls_Manager::CHOOSE,
                   'options' => [
                     'left' => [
                       'title' => __( ' Left', 'creote-addons' ),
                       'icon' => 'eicon-text-align-left',
                     ],
                     'center' => [
                       'title' => __( ' Center', 'creote-addons' ),
                       'icon' => 'eicon-text-align-center',
                     ],
                     'right' => [
                       'title' => __( ' Right', 'creote-addons' ),
                       'icon' => 'eicon-text-align-right',
                     ],
                   ],
                   'default' => 'center',
                   'toggle' => true,
                   'selectors' => [
                     '{{WRAPPER}} .client_logo_carousel .swiper-slide .image ' => 'text-align: {{VALUE}}!important;',
                   ],
               ]
           );
           $repeater = new Repeater();
           $repeater->add_control(
               'brandimage',
               [
                   'label' => __('Brand Image', 'creote-addons'),
                   'type' => Controls_Manager::MEDIA,
                   'default' => [
                       'url' => \Elementor\Utils::get_placeholder_image_src(),
                     ],
               ]
           );
        $repeater->add_control(
               'image_width',
               [
                   'label' => __('Image Width', 'creote-addons'),
                   'type' => Controls_Manager::TEXT,
                   'default' =>  __('200px', 'creote-addons'),
               ]
       );
       $repeater->add_control(
           'margin_top',
           [
               'label' => __('Margin Top', 'creote-addons'),
               'type'    => Controls_Manager::NUMBER,
               'default' => 0,
               'min'     => -200,
               'max'     => 200,
               'step'    => 1,
           ]
       );
       $repeater->add_control(
           'margin_bottom',
           [
               'label' => __('Margin Bottom', 'creote-addons'),
               'type'    => Controls_Manager::NUMBER,
               'default' => 0,
               'min'     => -200,
               'max'     => 200,
               'step'    => 1,
           ]
       );
           $this->add_control(
               'client_logo_repeater',
               [
                   'label' => __('Client Logo Repeater', 'creote-addons'),
                   'type' => Controls_Manager::REPEATER,
                   'fields' => $repeater->get_controls(),
                   'default' => [
                       [
                       'brandimage' =>  \Elementor\Utils::get_placeholder_image_src(),
                       'image_width' =>  __('200px', 'creote-addons'),
                       ],
                       [
                       'brandimage' =>  \Elementor\Utils::get_placeholder_image_src(),
                       'image_width' =>  __('200px', 'creote-addons'),
                       ],
                       [
                       'brandimage' =>  \Elementor\Utils::get_placeholder_image_src(),
                       'image_width' =>  __('200px', 'creote-addons'),
                       ],
                       [
                       'brandimage' =>  \Elementor\Utils::get_placeholder_image_src(),
                       'image_width' =>  __('200px', 'creote-addons'),
                        ],
                   ],
                   'title_field' =>  __('Client Logo', 'creote-addons'),
               ]
           );
           $this->add_responsive_control(
               'pagination_enable',
               [
                 'label' => __( 'Pagination Enable', 'creote-addons' ),
                 'type' => \Elementor\Controls_Manager::SWITCHER,
                 'label_on' => __( 'Show', 'creote-addons' ),
                 'label_off' => __( 'Hide', 'creote-addons' ),
                 'return_value' => 'yes',
                 'default' => 'no',
               ]
             );
             $this->add_control(
                'opacity',
                [
                    'label' => __('Image Opacity', 'creote-addons'),
                    'type' => Controls_Manager::TEXT,
                    'default' =>  __('.5', 'creote-addons'),
                    'selectors' => [
                        '{{WRAPPER}} .client_logo_carousel  img  ' => 'opacity: {{VALUE}};',
                    ],
                ]
            );
           $this->end_controls_section();
       }
       protected function render()
       {
           $settings = $this->get_settings_for_display();
           $client_swipre = '';
           if($settings['client_logo_style'] == 'type_one'){
               $client_swipre = 'client_logo_swiper';
           }
           elseif($settings['client_logo_style'] == 'type_two'){
               $client_swipre = 'client_logo_swiper_two';
           }
           elseif($settings['client_logo_style'] == 'type_three'){
               $client_swipre = 'client_logo_swiper_three';
           }
?>
<section class="client_logo_carousel <?php echo esc_attr($settings['client_logo_style']); ?>"> <div class="swiper-container <?php echo esc_attr($client_swipre); ?>"> <div class="swiper-wrapper"> <?php if($settings['client_logo_style'] == 'type_two'):?> <?php foreach($settings['client_logo_repeater'] as $brandimage): $image_width = $brandimage['image_width']; $image_width = ! empty( $image_width ) ? "width: $image_width!important;" : ''; $margin_top = $brandimage['margin_top']; $margin_top = ! empty( $margin_top ) ? "margin-top: $margin_top!important;" : ''; $margin_bottom = $brandimage['margin_bottom']; $margin_bottom = ! empty( $margin_bottom ) ? "margin-bottom: $margin_bottom!important;" : ''; $image_width_css = "style='$image_width $margin_top $margin_bottom'"; $brandimage_alt = isset($brandimage['brandimage']['alt']) ? $brandimage['brandimage']['alt'] : ''; if(!empty($brandimage_alt)) { $brandimage_alts = $brandimage_alt; }else{ $brandimage_alts = 'image'; } ?> <div class="swiper-slide"> <div class="image"> <img src="<?php echo esc_url($brandimage['brandimage']['url']); ?>" alt="<?php echo esc_attr($brandimage_alts); ?>" <?php echo $image_width_css; ?> /> </div> </div> <?php endforeach;?> <?php elseif($settings['client_logo_style'] == 'type_three'):?> <?php foreach($settings['client_logo_repeater'] as $brandimage): $image_width = $brandimage['image_width']; $image_width = ! empty( $image_width ) ? "width: $image_width!important;" : ''; $margin_top = $brandimage['margin_top']; $margin_top = ! empty( $margin_top ) ? "margin-top: $margin_top!important;" : ''; $margin_bottom = $brandimage['margin_bottom']; $margin_bottom = ! empty( $margin_bottom ) ? "margin-bottom: $margin_bottom!important;" : ''; $image_width_css = "style='$image_width $margin_top $margin_bottom'"; $brandimage_alt = isset($brandimage['brandimage']['alt']) ? $brandimage['brandimage']['alt'] : ''; if(!empty($brandimage_alt)) { $brandimage_alts = $brandimage_alt; }else{ $brandimage_alts = 'image'; } ?> <div class="swiper-slide"> <div class="image"> <img src="<?php echo esc_url($brandimage['brandimage']['url']); ?>" alt="<?php echo esc_attr($brandimage_alts); ?>" <?php echo $image_width_css; ?> /> </div> </div> <?php endforeach;?> <?php else: ?> <?php foreach($settings['client_logo_repeater'] as $brandimage): $image_width = $brandimage['image_width']; $image_width = ! empty( $image_width ) ? "width: $image_width!important;" : ''; $margin_top = $brandimage['margin_top']; $margin_top = ! empty( $margin_top ) ? "margin-top: $margin_top!important;" : ''; $margin_bottom = $brandimage['margin_bottom']; $margin_bottom = ! empty( $margin_bottom ) ? "margin-bottom: $margin_bottom!important;" : ''; $image_width_css = "style='$image_width $margin_top $margin_bottom'"; $brandimage_alt = isset($brandimage['brandimage']['alt']) ? $brandimage['brandimage']['alt'] : ''; if(!empty($brandimage_alt)) { $brandimage_alts = $brandimage_alt; }else{ $brandimage_alts = 'image'; } ?> <div class="swiper-slide"> <div class="image"> <img src="<?php echo esc_url($brandimage['brandimage']['url']); ?>" alt="<?php echo esc_attr($brandimage_alts); ?>" <?php echo $image_width_css; ?> /> </div> </div> <?php endforeach;?> <?php endif;?> </div> <?php if($settings['pagination_enable'] == 'yes'): ?> <div class="p_pagination"> <div class="swiper-pagination"></div> </div> <?php endif;?> </div></section>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_logo_v1());