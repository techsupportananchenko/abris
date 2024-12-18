<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.
class Widget_creote_icon_box_v1_new extends Widget_Base
{
    public function get_name()
    {
        return 'creote-icon-box-v2-new';
    }
    public function get_title()
    {
        return __('Icon Box V2', 'creote-addons');
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
        $this->start_controls_section('icon_box_settings',
        [ 
            'label' => __('Icon Settings', 'creote-addons')
        ]
        );
        $this->add_control(
            'icon_box_type',
            [
                'label' => __('Icon Box Type', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'type_one'  => __( 'Type One', 'creote-addons' ),
                    'type_two' => __( 'Type Two', 'creote-addons' ),
                    'type_three' => __( 'Type Three', 'creote-addons' ),
				],
                'default' => __('type_one' , 'creote-addons'),
            ]
        );
        $this->add_control(
            'tag_type',
            [
            'label' => __('Title Tag', 'luxride-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'div' => __( 'Div Tag', 'luxride-addons' ),
                'h1' => __( 'H1 Tag', 'luxride-addons' ),
                'h2' => __( 'H2 Tag', 'luxride-addons' ),
                'h3' => __( 'H3 Tag', 'luxride-addons' ),
                'h4' => __( 'H4 Tag', 'luxride-addons' ),
                'h5' => __( 'H5 Tag', 'luxride-addons' ),
                'h6' => __( 'H6 Tag', 'luxride-addons' ),
            ],
            'default' => 'h2' , 
            ]
        ); 
        $this->add_control(
            'icon_image_enable',
           [
              'label' => __('Icon Image Enable', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'no',
           ]
        );
        $this->add_control(
            'icon_image',
            [
                'label' => __('Icon Image', 'creote-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => CREOTE_ADDONS_URL . 'assets/images/customer-support.png',
                  ],
                 'condition' => [
                    'icon_image_enable' => 'yes',
                 ]
            ]
        );
        $this->add_control(
            'icon_fonts_enable',
           [
              'label' => __('Icon Enable', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'yes',
           ]
        );
        $this->add_control(
            'icon_fonts',
            [
                'label' => __('Icon', 'creote-addons'),
                'type' => Controls_Manager::ICON,
                'options' => get_creote_icon(),
                'default' => __('fa fa-ban' , 'creote-addons'),
                 'condition' => [
                    'icon_fonts_enable' => 'yes',
                 ]
            ]
        );
        $this->add_control(
            'icon_heading_text',
            [
                'label' => __('Icon Box Heading', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
        );
        $this->add_control(
            'icon_description',
            [
                'label' => __('Icon Box Description', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'creote-addons'),
                'placeholder' => __('Type your text here', 'creote-addons'),
            ]
        );
        $this->add_control(
            'link',
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
        ]);
        $this->add_control(
            'read_more_enable',
           [
              'label' => __('Read More Enable', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'yes',
           ]
        );
        $this->add_control(
            'read_more_btn',
            [
                'label' => __('Read More', 'creote-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __('Read More', 'creote-addons'),
                'default' => __('Read More' , 'creote-addons'),
                'condition' => [
                    'read_more_enable' => 'yes',
                ]
            ]
        );
        $this->add_control(
            'box_active',
           [
              'label' => __('Box Active Enable / Diable', 'creote-addons'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'creote-addons'),
               'label_off' => __('No', 'creote-addons'),
               'return_value' => 'yes',
               'default' => 'no',
                'condition' => [
                    'icon_box_type' => 'type_two',
                ]
           ]
        );
        $this->end_controls_section();
        $this->start_controls_section('icon_box_css',
        [ 
            'label' => __('Custom Css', 'creote-addons'),
            'tab' =>Controls_Manager::TAB_STYLE,
        ]
        );
          $this->add_control(
            'heading_color',
             [
                'label' => __('Heading Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .icon_box_new_box.type_one .icontitle a , {{WRAPPER}} .icon_box_new_box.type_two .icontitle a , {{WRAPPER}} .icon_box_new_box.type_three .content .icontitle a  ' => 'color: {{VALUE}}!important;',
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
            'd_color',
             [
                'label' => __('Description Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon_box_new_box.type_one p , {{WRAPPER}} .icon_box_new_box.type_two p , {{WRAPPER}} .icon_box_new_box.type_three .content p ' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
        $this->add_control(
            'hrfour',
            [
                'type' => Controls_Manager::DIVIDER,  
            ]
        );
          $this->add_control(
            'icon_bgcolor',
             [
                'label' => __('Icon Background Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon_box_new_box.type_one .icon_bx span , {{WRAPPER}}  .icon_box_new_box.type_two span.icon , {{WRAPPER}} .icon_box_new_box.type_three .icon_box  ' => 'background: {{VALUE}}!important; background-image:none;',
                ],
             ]
          );
          $this->add_control(
            'icon_color',
             [
                'label' => __('Icon  Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .icon_box_new_box.type_one .icon_bx small , {{WRAPPER}}  .icon_box_new_box.type_two span.icon , {{WRAPPER}} .icon_box_new_box.type_three .icon_box span ' => 'color: {{VALUE}}!important; background-image:none;',
                  ],
             ]
          );
          $this->add_control(
            'icon_bordercolor',
             [
                'label' => __('Icon Border Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .icon_box_new_box.type_two .icon_box , {{WRAPPER}} .icon_box_new_box.type_two::before , {{WRAPPER}} .icon_box_new_box.type_two::after' => 'border-color: {{VALUE}}!important; background-image:none;',
                ],
                'condition' => [
                    'icon_box_type' => ['type_two'],
                ]
             ]
          );
          $this->add_control(
            'icon_dotcolor',
             [
                'label' => __('Icon Dot Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon_bg_rotate::before' => 'background: {{VALUE}}!important; background-image:none;',
                ],
                'condition' => [
                    'icon_box_type' => ['type_two'],
                ]
             ]
          );
          $this->add_control(
            'read_more_color',
             [
                'label' => __('Read More Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .icon_box_new_box a.read_more' => 'color: {{VALUE}}!important;',
                  ],
             ]
          ); 
        $this->add_control(
            'hrfive',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'heading_hover_color',
             [
                'label' => __('Heading Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon_box_new_box.type_one .icontitle a:hover , {{WRAPPER}} .icon_box_new_box.type_two .icontitle a:hover , {{WRAPPER}} .icon_box_new_box.type_three .content .icontitle:hover a ' => 'color: {{VALUE}}!important;',
                ],
             ]
          );
        $this->add_control(
            'hover_icon_bg_color',
             [
                'label' => __('Icon Hover Bg Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .icon_box_new_box.type_two:hover span.icon , {{WRAPPER}} .icon_box_new_box.type_three:hover .icon_box span ' => 'background: {{VALUE}}!important; background-image:none!important;',
                ],
             ]
          );
          $this->add_control(
            'hover_icon_color',
             [
                'label' => __('Icon Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .icon_box_new_box.type_two:hover span.icon , {{WRAPPER}} .icon_box_new_box.type_three:hover .icon_box span ' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->add_control(
            'icon_hoverbordercolor',
             [
                'label' => __('Icon Border Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}}  .icon_box_new_box.type_two:hover .icon_box , {{WRAPPER}} .icon_box_new_box.type_two:hover::before , {{WRAPPER}} .icon_box_new_box.type_two:hover::after' => 'border-color: {{VALUE}}!important; background-image:none;',
                  ],
                  'condition' => [ 
                    'icon_box_type' => ['type_two'],
                ]
             ]
          );
          $this->add_control(
            'icon_hoverdotcolor',
             [
                'label' => __('Icon Dot Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .icon_box_new_box.type_two:hover .icon_bg_rotate::before' => 'background: {{VALUE}}!important; background-image:none;',
                  ],
                  'condition' => [
                    'icon_box_type' => ['type_two'],
                ]
             ]
          );
          $this->add_control(
            'read_more_hover_color',
             [
                'label' => __('Read More Hover Color', 'creote-addons'),
                'type' => Controls_Manager::COLOR,
                 'selectors' => [
                    '{{WRAPPER}} .icon_box_new_box a.read_more:hover' => 'color: {{VALUE}}!important;',
                  ],
             ]
          );
          $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $target = $settings['link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : ''; 
        ?> 
        <?php if ($settings['icon_box_type'] == 'type_two') : ?>
    <div class="icon_box_new_box type_two <?php if ($settings['box_active'] == 'yes') : ?> box_actived <?php endif; ?>">
        <span class="borders"></span>
        <div class="icon_box">
            <?php if ($settings['icon_image_enable'] == 'yes' && $settings['icon_fonts_enable'] !== 'yes') :
                if (!empty($settings['icon_image']['url'])) :
                    $icon_image = isset($settings['icon_image']['alt']) ? $settings['icon_image']['alt'] : 'image';
                    ?>
                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image); ?>" />
                <?php endif; ?>
            <?php endif; ?>

            <?php if ($settings['icon_image_enable'] !== 'yes' && $settings['icon_fonts_enable'] == 'yes') : ?>
                <span class="<?php echo esc_html($settings['icon_fonts']); ?> icon"></span>
            <?php endif; ?>

            <span class="icon_bg_rotate"></span>
        </div>
        <div class="content">
            <<?php echo esc_attr($settings['tag_type']); ?> class="icontitle">
                <?php if(!empty($settings['link']['url'])): ?>
                <a <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> href="<?php echo esc_url($settings['link']['url']); ?>">
                    <?php echo esc_html($settings['icon_heading_text']); ?>
                </a>
                <?php else: ?>
                    <?php echo esc_html($settings['icon_heading_text']); ?>
                <?php endif; ?>
            </<?php echo esc_attr($settings['tag_type']); ?>>
            <p><?php echo esc_html($settings['icon_description']); ?></p>
            <?php if ($settings['read_more_enable'] == 'yes') : ?>
                <a <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> href="<?php echo esc_url($settings['link']['url']); ?>" class="read_more type_two">
                    <?php echo esc_html($settings['read_more_btn']); ?><span class="icon-arrow-right"></span>
                </a>
            <?php endif; ?>
        </div>
    </div>
<?php elseif ($settings['icon_box_type'] == 'type_three') : ?>
    <div class="icon_box_new_box type_three">
        <div class="icon_box">
            <?php if ($settings['icon_image_enable'] == 'yes' && $settings['icon_fonts_enable'] !== 'yes') :
                if (!empty($settings['icon_image']['url'])) :
                    $icon_image = isset($settings['icon_image']['alt']) ? $settings['icon_image']['alt'] : 'image';
                    ?>
                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image); ?>" />
                <?php endif; ?>
            <?php endif; ?>

            <?php if ($settings['icon_image_enable'] !== 'yes' && $settings['icon_fonts_enable'] == 'yes') : ?>
                <span class="<?php echo esc_html($settings['icon_fonts']); ?> icon"></span>
            <?php endif; ?>
        </div>
        <div class="content">
        <<?php echo esc_attr($settings['tag_type']); ?> class="icontitle">
        <?php if(!empty($settings['link']['url'])): ?>
                <a <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> href="<?php echo esc_url($settings['link']['url']); ?>">
                    <?php echo esc_html($settings['icon_heading_text']); ?>
                </a>
                <?php else: ?>
                    <?php echo esc_html($settings['icon_heading_text']); ?>
                <?php endif; ?>
            </<?php echo esc_attr($settings['tag_type']); ?>>
            <p><?php echo esc_html($settings['icon_description']); ?></p>
            <?php if ($settings['read_more_enable'] == 'yes') : ?>
                <a <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> href="<?php echo esc_url($settings['link']['url']); ?>" class="read_more type_two">
                    <?php echo esc_html($settings['read_more_btn']); ?><span class="icon-arrow-right"></span>
                </a>
            <?php endif; ?>
        </div>
    </div>
<?php else : ?>
    <div class="icon_box_new_box type_one">
        <div class="icon_bx">
            <?php if ($settings['icon_image_enable'] == 'yes' && $settings['icon_fonts_enable'] !== 'yes') :
                if (!empty($settings['icon_image']['url'])) :
                    $icon_image = isset($settings['icon_image']['alt']) ? $settings['icon_image']['alt'] : 'image';
                    ?>
                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" class="img-fluid svg_image" alt="<?php echo esc_attr($icon_image); ?>" />
                <?php endif; ?>
            <?php endif; ?>

            <?php if ($settings['icon_image_enable'] !== 'yes' && $settings['icon_fonts_enable'] == 'yes') : ?>
                <small class="<?php echo esc_html($settings['icon_fonts']); ?> icon_fonts"></small>
            <?php endif; ?>
            <span class="icon_bg"></span>
        </div>
        <div class="text_box">
        <<?php echo esc_attr($settings['tag_type']); ?> class="icontitle">
        <?php if(!empty($settings['link']['url'])): ?>
                <a <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> href="<?php echo esc_url($settings['link']['url']); ?>">
                    <?php echo esc_html($settings['icon_heading_text']); ?>
                </a>
                <?php else: ?>
                    <?php echo esc_html($settings['icon_heading_text']); ?>
                <?php endif; ?>
            </<?php echo esc_attr($settings['tag_type']); ?>>
            <p><?php echo esc_html($settings['icon_description']); ?></p>
            <?php if ($settings['read_more_enable'] == 'yes') : ?>
                <a <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> href="<?php echo esc_url($settings['link']['url']); ?>" class="read_more type_two">
                    <?php echo esc_html($settings['read_more_btn']); ?><span class="icon-arrow-right"></span>
                </a>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_icon_box_v1_new());