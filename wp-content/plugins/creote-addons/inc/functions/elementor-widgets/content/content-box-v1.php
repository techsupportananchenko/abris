<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_content_box_v1 extends Widget_Base
{
    public function get_name()
    {
        return 'creote-content-box-v1';
    }
    public function get_title()
    {
        return __('Content Box v1' , 'creote-addons');
    }
    public function get_icon()
    {
        return 'icon-creote-svg';
    }
    public function get_categories()
    {
        return ['102'];
    }
    protected function register_controls() {
		$this->start_controls_section(
			'contnetbox_content',
			[
				'label' => esc_html__( 'Content', 'creote-addons' ),
			]
        );
        
        
        $this->add_control(
            'tag_type',
            [
                'label' => __('Heading Tag', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'div' => __( 'Div Tag', 'creote-addons' ),
                    'h1' => __( 'H1 Tag', 'creote-addons' ),
                    'h2' => __( 'H2 Tag', 'creote-addons' ),  
                    'h3' => __( 'H3 Tag', 'creote-addons' ),    
                    'h4' => __( 'H4 Tag', 'creote-addons' ), 
                    'h5' => __( 'H5 Tag', 'creote-addons' ),
                    'h6' => __( 'H6 Tag', 'creote-addons' ),
               ],
                'default' => __('div' , 'creote-addons'),
            ]
        );
        $this->add_control(
            'content_box_heading',
            [
                'label' => __('Heading', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Open Communication', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
        );
        $this->add_control(
            'content_box_description',
            [
                'label' => __('Description', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('The less water you use, the less runoff and wastewater that eventually end up in the ocean.', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
        ); 
        $this->add_control(
            'link_box',
        [
            'label' => __('Link', 'creote-addons'),
            'type' => Controls_Manager::URL,
            'placeholder' => __('https://your-link.com', 'creote-addons'),
            'show_external' => true,
            'default' => [
                'url' => '#',
                'is_external' => true,
                'nofollow' => true,
            ],
        ]
        );  
      $this->add_control(
        'transitions_enable',
       [
          'label' => __('Transitions Enable', 'creote-addons'),
           'type' => Controls_Manager::SWITCHER,
           'label_on' => __('Yes', 'creote-addons'),
           'label_off' => __('No', 'creote-addons'),
           'return_value' => 'yes',
           'default' => 'yes',
        ]
      );
      $this->add_responsive_control(
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
    $this->end_controls_section();
    $this->start_controls_section('title_section_css',
    [ 
        'label' => __('Title Css', 'creote-addons'),
        'tab' =>Controls_Manager::TAB_STYLE,
    ]
    );
    $this->add_control(
      'custom_css_enable',
     [
        'label' => __('Custom Css Enable', 'creote-addons'),
         'type' => Controls_Manager::SWITCHER,
         'label_on' => __('Yes', 'creote-addons'),
         'label_off' => __('No', 'creote-addons'),
         'return_value' => 'yes',
         'default' => 'no',
     ]
   );
$this->add_responsive_control(
  'dot_color',
   [
      'label' => __('Dot Color', 'creote-addons'),
      'type' => Controls_Manager::COLOR,
      'selectors' => [
          '{{WRAPPER}} .content_box_cn.style_one .txt_content::before , {{WRAPPER}}  .content_box_cn.style_one .txt_content::after ' => 'background: {{VALUE}};',
      ],
      'condition' => [
        'custom_css_enable' => 'yes'
    ],
   ]
 );
 $this->add_responsive_control(
  'title_color',
   [
      'label' => __('Title Color', 'creote-addons'),
      'type' => Controls_Manager::COLOR,
      'selectors' => [
          '{{WRAPPER}} .content_box_cn.style_one .txt_content h3 a  ' => 'color: {{VALUE}};',
      ],
      'condition' => [
        'custom_css_enable' => 'yes'
    ],
   ]
 );
 $this->add_responsive_control(
  'description_color',
   [
      'label' => __('Description Color', 'creote-addons'),
      'type' => Controls_Manager::COLOR,
      'selectors' => [
          '{{WRAPPER}} .content_box_cn.style_one .txt_content p ' => 'color: {{VALUE}};',
      ],
      'condition' => [
        'custom_css_enable' => 'yes'
    ],
   ]
 );      
$this->end_controls_section();
 }
protected function render() {
	$settings = $this->get_settings_for_display();
    $allowed_tags = wp_kses_allowed_html('post');
    $target = $settings['link_box']['is_external'] ? ' target="_blank"' : '';
    $nofollow = $settings['link_box']['nofollow'] ? ' rel="nofollow"' : ''; 
?>    
  <div class="content_box_cn style_one"
    <?php if($settings['transitions_enable'] == 'yes'): ?> 
        data-aos="fade-up" data-aos-offset="0" data-aos-delay="<?php echo esc_html($settings['transitions']); ?>" 
    <?php endif; ?>
>
 
        <div class="txt_content">
            <?php if(!empty($settings['content_box_heading'])): ?>
                <<?php echo esc_attr($settings['tag_type']); ?> class="contentitle">
                    <a href="<?php echo esc_url($settings['link_box']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
                        <?php echo wp_kses($settings['content_box_heading'], $allowed_tags); ?>
                    </a>
                </<?php echo esc_attr($settings['tag_type']); ?>>
            <?php endif; ?>
            <?php if(!empty($settings['content_box_description'])): ?>
                <p>
                    <?php echo wp_kses($settings['content_box_description'], $allowed_tags); ?>
                </p>
            <?php endif; ?>
        </div>
    
</div>
  
<?php 
	}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_content_box_v1());