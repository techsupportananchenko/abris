<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_project_information_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-project-inforamtion-v1';
       }
       public function get_title()
       {
           return __('Project Information V1', 'creote-addons');
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
           $this->start_controls_section('progress_settings',
           [ 
               'label' => __('Information Settings', 'creote-addons')
           ]
           ); 
           $this->add_control(
               'heading',
               [
                   'label' => __('Heading', 'creote-addons'),
                   'type' => Controls_Manager::TEXT,
                   'default' => __('Project 
                   Information', 'creote-addons'),
                   'placeholder' => __('Enter the text here', 'creote-addons'),
               ]
           );
           $repeater = new Repeater();
           $repeater->add_control(
               'information_title',
               [
                   'label' => __('Information Title', 'creote-addons'),
                   'type' => Controls_Manager::TEXT,
                   'default' => __(' Client:
                   ', 'creote-addons'),
                   'placeholder' => __('Enter the text here', 'creote-addons'),
               ]
           );
           $repeater->add_control(
               'information_content',
               [
                   'label' => __('Information Content', 'creote-addons'),
                   'type' => Controls_Manager::TEXT,
                   'default' => __('The Sixmothers Group', 'creote-addons'),
                   'placeholder' => __('Enter the text here', 'creote-addons'),
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
           'project_information_repeater',
           [
               'label' => __('Project Information Repeater', 'creote-addons'),
               'type' => Controls_Manager::REPEATER,
               'fields' => $repeater->get_controls(),
               'default' => [
                   [
                   'information_title' =>  esc_html__( 'Client: ' , 'creote-addons'),
                   'information_content' =>  esc_html__('The Sixmothers Group' , 'creote-addons'),
                   ],
                   [
                   'information_title' =>  esc_html__( 'Location: ' , 'creote-addons'),
                   'information_content' =>  esc_html__('Philadelphia, United States' , 'creote-addons'),
                   ],
                   [
                   'information_title' =>  esc_html__( 'Date: ' , 'creote-addons'),
                   'information_content' =>  esc_html__(' February 14, 2021' , 'creote-addons'),
                   ],
                   [
                   'information_title' =>  esc_html__( 'Website: ' , 'creote-addons'),
                   'information_content' =>  esc_html__('www.clientwebsite.com' , 'creote-addons'),
                   ]
               ], 
               'title_field' => '{{{ information_title }}}',
           ]
       );
       $repeaterteo = new Repeater();
       $repeaterteo->add_control(
           'social_media_content',
           [
               'label' => __('Social Media', 'creote-addons'),
               'type' => Controls_Manager::TEXT,
               'default' => __('fa fa-facebook ', 'creote-addons'),
               'placeholder' => __('Enter Class Name Of social Media', 'creote-addons'),
           ]
       );
       $repeaterteo->add_control(
           'social_media_link',
           [
               'label' => __('Social Media Link', 'creote-addons'),
               'type' => Controls_Manager::TEXT,
               'default' => __('#', 'creote-addons'),
               'placeholder' => __('Enter the Link Here', 'creote-addons'),
           ]
       );
           $this->add_control(
               'social_media_repeater',
               [
                   'label' => __('Social Media Repeater', 'creote-addons'),
                   'type' => Controls_Manager::REPEATER,
                   'fields' => $repeaterteo->get_controls(),
                   'default' => [
                       [
                       'social_media_content' =>  esc_html__( 'fa fa-facebook' , 'creote-addons'), 
                       ],
                       [
                       'social_media_content' =>  esc_html__( 'fa fa-twitter' , 'creote-addons'), 
                       ],
                       [
                       'social_media_content' =>  esc_html__( 'fa fa-skype' , 'creote-addons'), 
                       ],
                       [
                       'social_media_content' =>  esc_html__( 'fa fa-instagram' , 'creote-addons'), 
                       ]
                   ], 
                   'title_field' => '{{{ social_media_content }}}',
               ]
           );
           $this->add_control(
               'button_text',
               [
                 'label'       => esc_html__( 'Button Text', 'creote-addons' ),
                 'type'        => Controls_Manager::TEXT,
                         'default' =>  esc_html__( 'Interested' , 'creote-addons'),
             ]);
             $this->add_control(
               'button_link',
               [
                 'label' => __('Theme Link', 'creote-addons'),
                 'type' => Controls_Manager::URL,
                 'placeholder' => __('https://your-link.com', 'creote-addons'),
                 'show_external' => true,
                 'default' => [
                     'url' => '#',
                     'is_external' => true,
                     'nofollow' => true,
                 ],
             ]);  
           $this->end_controls_section();
       }
       protected function render()
       {
           $settings = $this->get_settings_for_display();
           $allowed_tags = wp_kses_allowed_html('post');
           ?> 
<div class="project_information"> <?php if(!empty($settings['heading'])): ?> <h2><?php echo wp_kses($settings['heading'] , $allowed_tags); ?></h2> <?php endif; ?> <div class="project_information_bo"> <?php foreach($settings['project_information_repeater'] as $key => $project_information):?> <div class="repeat_informtion"> <?php if(!empty($project_information['information_title'])): ?> <h6><?php echo wp_kses($project_information['information_title'] , $allowed_tags); ?></h6> <?php endif; ?> <?php if(!empty($project_information['information_content'])): ?> <p><?php echo wp_kses($project_information['information_content'] , $allowed_tags); ?></p> <?php endif; ?> </div> <?php endforeach;?> <div class="social_medias"> <?php foreach($settings['social_media_repeater'] as $key => $socail):?> <?php if(!empty($socail['social_media_content'])): ?> <a href="<?php if(!empty($socail['social_media_link'])): echo esc_url($socail['social_media_link']); endif; ?>"> <span class="<?php echo esc_html($socail['social_media_content']); ?>"></span> </a> <?php endif; ?> <?php endforeach;?> </div> <?php if(!empty($settings['button_text'])): ?> <?php $target = $settings['button_link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?> <a href="<?php echo esc_url($settings['button_link']['url']);?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="theme-btn two"> <?php echo esc_html($settings['button_text']);?> </a> <?php endif;?> </div></div>
<?php
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_project_information_v1());