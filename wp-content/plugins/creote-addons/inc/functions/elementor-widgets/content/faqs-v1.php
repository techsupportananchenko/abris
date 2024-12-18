<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_faqs_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-faqs-v1';
       }
       public function get_title()
       {
           return __('Faqs V1', 'creote-addons');
       }
       public function get_icon()
       {
           return 'icon-creote-svg';
       }
       public function get_categories()
       {
           return ['102'];
       }
       protected function register_controls(){
           $this->start_controls_section('faq_settings',
           [ 
               'label' => __('Faq Settings', 'creote-addons')
           ]
           );
           $this->add_control(
               'faq_type',
               [
                   'label' => __('Faqs Styles', 'creote-addons'),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
                       'type_one' => __( 'Faq Style One', 'creote-addons' ),
                       'type_two' => __( 'Faq Style Two', 'creote-addons' ),
   				],
                   'default' => __('type_one' , 'creote-addons'),
               ]
           ); 
           $repeater = new Repeater(); 
           $repeater->add_control(
               'faq_icons',
               [
                   'label' => __('Faqs Icon', 'creote-addons'),
                   'type' => Controls_Manager::ICON,
                   'options' => get_creote_icon(),
                   'default' => __('icon-play' , 'creote-addons'),
               ]
           ); 
           $repeater->add_control(
               'faqsheading_text',
               [
                   'label' => __('Faqs Heading', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('How do I make a yearly payment? ', 'creote-addons'),
                   'placeholder' => __('How do I make a yearly payment?', 'creote-addons'),
               ]
           );
           $repeater->add_control(
               'faq_type_short_des',
              [
                 'label' => __('Short Description Enable', 'creote-addons'),
                  'type' => Controls_Manager::SWITCHER,
                  'label_on' => __('Yes', 'creote-addons'),
                  'label_off' => __('No', 'creote-addons'),
                  'return_value' => 'yes',
                  'default' => 'yes',
              ]
           );
           $repeater->add_control(
               'short_description',
               [
                   'label' => __('Faqs Short Description', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse Cillum.', 'creote-addons'),
                   'placeholder' => __('Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse Cillum.', 'creote-addons'),
                   'condition' => [
                       'faq_type_short_des' => 'yes',
                   ],
               ]
           ); 
           $repeater->add_control(
               'faqsdescription',
               [
                   'label' => __('Faqs Description', 'creote-addons'),
                   'type' => Controls_Manager::TEXTAREA,
                   'default' => __('Serenity Is Multi-Faceted Blockchain Based Ecosystem, Energy Retailer For The People, Focusing On The Promotion Of Sustainable Living, Renewable Energy Production And Smart Energy Grid Utility Services.', 'creote-addons'),
                   'placeholder' => __('Serenity Is Multi-Faceted Blockchain Based Ecosystem, Energy Retailer For The People, Focusing On The Promotion Of Sustainable Living, Renewable Energy Production And Smart Energy Grid Utility Services.', 'creote-addons'),
               ]
           );
           $repeater->add_control(
             'hrfourre',
             [
                 'type' => Controls_Manager::DIVIDER, 
             ]
         ); 
           $repeater->add_control(
             'faqs_active_tb',
            [
               'label' => __('Faq Active / Deactive', 'creote-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
         );
         $repeater->add_control(
           'trans',
           [
           'type' => Controls_Manager::DIVIDER,
           ]
         );
         $repeater->add_control(
           'transitions_enable',
          [
             'label' => __('Transitions Enable', 'creote-addons'),
              'type' => Controls_Manager::SWITCHER,
              'label_on' => __('Yes', 'creote-addons'),
              'label_off' => __('No', 'creote-addons'),
              'return_value' => 'yes',
              'default' => 'no',
          ]
       );
         $repeater->add_responsive_control(
           'transitions',
           [
             'label' => __( 'Transitions', 'creote-addons' ),
             'type' => Controls_Manager::SELECT,
             'options' => [
               '0' => __('0ms', 'creote-addons'), 
               '100' => __('100ms', 'creote-addons'),
               '200' => __('200ms', 'creote-addons'),
               '300' => __('300ms', 'creote-addons'),
               '400' => __('400ms', 'creote-addons'),
               '500' => __('500ms', 'creote-addons'),
               '600' => __('600ms', 'creote-addons'),
               '700' => __('700ms', 'creote-addons'),
               '800' => __('800ms', 'creote-addons'),
               '900' => __('900ms', 'creote-addons'),
               '1000' => __('1000ms', 'creote-addons'),
               ],
              'default' => '0',
              'condition' => [
               'transitions_enable' => 'yes',
             ],
           ]
         );
           $this->add_control(
               'faqs_v1_repeater',
               [
                   'label' => __('Faqs Box Content', 'creote-addons'),
                   'type' => Controls_Manager::REPEATER,
                   'fields' => $repeater->get_controls(),
                   'default' => [
                       [
                           'faq_icons' =>  __('icon-play', 'creote-addons'),
                          'faqsheading_text' =>  __('How do I make a yearly payment?', 'creote-addons'),
                          'faqsdescription' =>  __('Serenity Is Multi-Faceted Blockchain Based Ecosystem, Energy Retailer For The People, Focusing On The Promotion Of Sustainable Living, Renewable Energy Production And Smart Energy Grid Utility Services.'),
                          'faqs_active_tb' => 'yes',
                         ],
                       [
                           'faq_icons' =>  __('icon-play', 'creote-addons'),
                          'faqsheading_text' =>  __('How this technology works?', 'creote-addons'),
                          'faqsdescription' =>  __('Serenity Is Multi-Faceted Blockchain Based Ecosystem, Energy Retailer For The People, Focusing On The Promotion Of Sustainable Living, Renewable Energy Production And Smart Energy Grid Utility Services.', 'creote-addons'),
                          'faqs_active_tb' => 'no',
                         ],
                        [
                           'faq_icons' =>  __('icon-play', 'creote-addons'),
                          'faqsheading_text' =>  __('What is the comunity benefit?', 'creote-addons'),
                          'faqsdescription' =>  __('Serenity Is Multi-Faceted Blockchain Based Ecosystem, Energy Retailer For The People, Focusing On The Promotion Of Sustainable Living, Renewable Energy Production And Smart Energy Grid Utility Services.', 'creote-addons'),
                          'faqs_active_tb' => 'no',
                         ],
                        [
                           'faq_icons' =>  __('icon-play', 'creote-addons'),
                          'faqsheading_text' =>  __('What is the comunity benefit?', 'creote-addons'),
                          'faqsdescription' =>  __('Serenity Is Multi-Faceted Blockchain Based Ecosystem, Energy Retailer For The People, Focusing On The Promotion Of Sustainable Living, Renewable Energy Production And Smart Energy Grid Utility Services.', 'creote-addons'),
                          'faqs_active_tb' => 'no',
                         ], 
                   ],
                   'title_field' => '{{{ faqsheading_text }}}',
               ]
           );
           $this->end_controls_section(); 
       } 
    protected function render(){
    $settings = $this->get_settings_for_display();
    $allowed_tags = wp_kses_allowed_html('post');
    ?> 
<section class="faq_section <?php echo esc_attr($settings['faq_type']); ?>"> <div class="block_faq"> <div class="accordion"> <dl> <?php if($settings['faq_type'] == 'type_two'): ?> <?php foreach($settings['faqs_v1_repeater'] as $key => $faqs_block):?> <dt class="faq_header <?php if($faqs_block['faqs_active_tb'] == 'yes'): echo esc_attr('active'); endif;?>" <?php if($faqs_block['transitions_enable'] == 'yes'): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_html($faqs_block['transitions']); ?>" data-aos-offset="0" <?php endif;?>> <?php echo wp_kses($faqs_block['faqsheading_text'] , $allowed_tags);?><span class="<?php echo esc_attr($faqs_block['faq_icons']);?>"></span> </dt> <dd class="accordion-content" <?php if($faqs_block['faqs_active_tb'] == 'yes'):?> style="display:block;" <?php endif;?> <?php if($faqs_block['transitions_enable'] == 'yes'): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_html($faqs_block['transitions']); ?>" data-aos-offset="0" <?php endif;?>> <p> <?php echo wp_kses($faqs_block['faqsdescription'] , $allowed_tags);?> </p> </dd> <?php endforeach;?> <?php else:?> <?php foreach($settings['faqs_v1_repeater'] as $key => $faqs_block):?> <dt class="faq_header <?php if($faqs_block['faqs_active_tb'] == 'yes'): echo esc_attr('active'); endif;?>" <?php if($faqs_block['transitions_enable'] == 'yes'): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_html($faqs_block['transitions']); ?>" data-aos-offset="0" <?php endif;?>> <span class="<?php echo esc_attr($faqs_block['faq_icons']);?>"></span> <?php echo wp_kses($faqs_block['faqsheading_text'] , $allowed_tags);?> </dt> <dd class="accordion-content" <?php if($faqs_block['faqs_active_tb'] == 'yes'):?> style="display:block;" <?php endif;?> <?php if($faqs_block['transitions_enable'] == 'yes'): ?> data-aos="fade-up" data-aos-delay="<?php echo esc_html($faqs_block['transitions']); ?>" data-aos-offset="0" <?php endif;?>> <p> <?php echo wp_kses($faqs_block['faqsdescription'] , $allowed_tags);?> </p> </dd> <?php endforeach;?> <?php endif; ?> </dl> </div> </div></section>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_faqs_v1());