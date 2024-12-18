<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_faqs_v1_new extends Widget_Base
{
    public function get_name()
    {
        return 'creote-faqs-v1-new';
    }
    public function get_title()
    {
        return __('Faqs V2', 'creote-addons');
    }
    public function get_icon()
    {
        return 'icon-c';
    }
    public function get_categories()
    {
        return ['104'];
    }
    protected function register_controls(){
        $this->start_controls_section('faqscontent',
        [ 
            'label' => __('Faq Box Content', 'creote-addons')
        ]
        );
        $repeater = new Repeater(); 
        $repeater->add_control(
            'faqsheading_text',
            [
                'label' => __('Icon Box Heading', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
        ); 
        $repeater->add_control(
            'faqsdescription',
            [
                'label' => __('Icon Box Description', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
        );
        $repeater->add_control(
            'faq_count',
            [
                'label' => __('Faq Count', 'creote-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('1', 'creote-addons'),
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
        $this->add_control(
            'faqs_v1_repeater',
            [
                'label' => __('Faqs Box Content', 'creote-addons'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                       'faqsheading_text' =>  __('Heading', 'creote-addons'),
                       'faqsdescription' =>  __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'creote-addons'),
                       'faq_count' =>  __('1', 'creote-addons'),
                       'faqs_active_tb' => 'yes',
                    ],
                    [
                       'faqsheading_text' =>  __('Heading', 'creote-addons'),
                       'faqsdescription' =>  __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'creote-addons'),
                       'faq_count' =>  __('2', 'creote-addons'),
                     ],
                     [
                       'faqsheading_text' =>  __('Heading', 'creote-addons'),
                       'faqsdescription' =>  __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'creote-addons'),
                       'faq_count' =>  __('3', 'creote-addons'),
                     ],
                     [
                       'faqsheading_text' =>  __('Heading', 'creote-addons'),
                       'faqsdescription' =>  __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'creote-addons'),
                       'faq_count' =>  __('4', 'creote-addons'),
                     ],
                     [
                       'faqsheading_text' =>  __('Heading', 'creote-addons'),
                       'faqsdescription' =>  __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'creote-addons'),
                       'faq_count' =>  __('5', 'creote-addons'),
                     ],
                ],
                'title_field' => '{{{ faqsheading_text }}}',
            ]
        ); 
        $this->end_controls_section(); 
        $this->start_controls_section('faqs_box_css',
        [ 
            'label' => __('Custom Css', 'creote-addons') ,
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
        );
        $this->add_control(
            'faq_number_color',
             [
                'label' => __('Faq Number Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .faqs_accordion .article-title .title_box .faq_no ' => '-webkit-text-stroke:1px  {{VALUE}}!important; opacity:1;',
                  ],
             ]
        );
        $this->add_control(
            'faq_heading_color',
             [
                'label' => __('Faq Title Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .faqs_accordion .article-title .title_box  , {{WRAPPER}} .faqs_accordion.type_one .article-title:before ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'faq_headingbg_color',
             [
                'label' => __('Faq Title Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}  .faqs_accordion .article-title ' => 'background: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'faq_headingborder_color',
             [
                'label' => __('Faq Title Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}  .faqs_accordion .article-title , {{WRAPPER}} .faqs_accordion .accordion-content ' => 'border-color: {{VALUE}}!important;',
                  ],
             ]
          ); 
          $this->add_control(
            'faq_description_bg_color',
             [
                'label' => __('Faq Content Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .faqs_accordion .accordion-content   ' => 'background: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'faq_description_border_color',
             [
                'label' => __('Faq Content Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .faqs_accordion .accordion-content   ' => 'border-color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'faq_description_color',
             [
                'label' => __('Faq Description Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .faqs_accordion .accordion-content   ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'hrthree',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        ); 
        $this->add_control(
            'faq_activeheading_colors',
             [
                'label' => __(' Active / Hover Title Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .faqs_accordion .article-title.active .title_box ,   .faqs_accordion .article-title:hover  .title_box   , {{WRAPPER}} .faqs_accordion.type_one .article-title:before ,   .faqs_accordion .article-title:hover:before  ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'faqactive_headingiocn_colors',
             [
                'label' => __('Active / Hover Number Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .faqs_accordion .article-title.active .title_box .faq_no ,  .faqs_accordion .article-title:hover .title_box .faq_no ' => '-webkit-text-stroke:1px  {{VALUE}}!important; opacity:1;',
                  ],
             ]
          ); 
          $this->add_control(
            'faqactive_headingbg_colors',
             [
                'label' => __('Active / Hover Title Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}  .faqs_accordion .article-title.active ,  .faqs_accordion .article-title:hover' => 'background: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'faqactive_headingborder_colors',
             [
                'label' => __('Active / Hover Title Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}  .faqs_accordion .article-title.active ,  .faqs_accordion .article-title:hover' => 'border-color: {{VALUE}}!important;',
                  ],
             ]
          ); 
          $this->add_control(
            'border_radius_enable',
            [
                'label' => __('Faq Box Border Radius Enable', 'creote-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'creote-addons'),
                'label_off' => __('No', 'creote-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
          );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
        ?> 
          <div class="faq_box_all <?php if($settings['border_radius_enable'] == 'yes'): ?> border_enable <?php endif; ?>"><dl class="accordion faqs_accordion type_one"> <?php foreach($settings['faqs_v1_repeater'] as $faqs_block):?> <dt class="article-title <?php if($faqs_block['faqs_active_tb'] == 'yes'): echo esc_attr('active'); endif;?>"> <div class="title_box"> <span class="faq_no"><?php echo esc_html($faqs_block['faq_count']); ?> </span> <?php echo wp_kses($faqs_block['faqsheading_text'] , $allowed_tags) ?> </div> </dt> <dd class="accordion-content" <?php if($faqs_block['faqs_active_tb'] == 'yes'):?> style="display:block;" <?php endif;?>> <?php echo wp_kses($faqs_block['faqsdescription'] , $allowed_tags) ?> </dd> <?php endforeach;?> </dl></div>
        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_faqs_v1_new());
