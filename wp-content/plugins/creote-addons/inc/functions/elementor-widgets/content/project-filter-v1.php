<?php
   namespace Elementor;
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   class Widget_creote_project_filter_v1 extends Widget_Base
   {
       public function get_name()
       {
           return 'creote-project-filter-v1';
       }
       public function get_title()
       {
           return __('Projetc Filter V1' , 'creote-addons');
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
           $this->start_controls_section(
               'project_settings',
               [
                   'label' => __('Project Settings', 'creote-addons')
               ]
           );
           $this->add_control(
            'fileteroption',
            [
                'label' => __('Filter Type', 'creote-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'type_one'   => esc_html__( 'Type One', 'creote-addons' ),
                    'type_two' => esc_html__( 'Type Two', 'creote-addons' ), 
                ],
                'default' => 'type_one',
            ]
        );  
           $this->add_control(
               'project_filter_style',
               [
                   'label' => __('Project style', 'creote-addons'),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
                       'style_one'   => esc_html__( 'Project Style One', 'creote-addons' ),
                       'style_two' => esc_html__( 'Project Style Two', 'creote-addons' ),
                       'style_three' => esc_html__( 'Project Style Three', 'creote-addons' ),
                       'style_four' => esc_html__( 'Project Style Four', 'creote-addons' ),
                       'style_five' => esc_html__( 'Project Style Five', 'creote-addons' ),
                       'style_six' => esc_html__( 'Project Style Six', 'creote-addons' ),
                       'style_eight' => esc_html__( 'Project Style Seven', 'creote-addons' ),
                   ],
                   'default' => 'style_one',
               ]
           );
           $this->add_control(
            'active_enable',
            [
               'label' => __( 'Active Hover Enable / Disable', 'creote-addons' ),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __( 'Show', 'creote-addons' ),
               'label_off' => __( 'Hide', 'creote-addons' ),
               'return_value' => 'yes',
               'default' => 'yes',
               'condition' => [
                  'project_filter_style' => 'style_five',
               ],
            ]
          );
           $this->add_control(
               'project_column',
               [
                 'label' => __('Project Column', 'creote-addons'),
                 'type' => Controls_Manager::SELECT,
                 'options' => [
                   'col-lg-3 col-md-6 col-sm-6 col-xs-12' => __( 'Four Column', 'creote-addons' ),
                   'col-lg-4 col-md-6 col-sm-6 col-xs-12' => __( 'Three Column', 'creote-addons' ),
                   'col-lg-6 col-md-6 col-sm-6 col-xs-12' => __( 'Two Column', 'creote-addons' ),
                   'col-lg-12 col-md-12 col-sm-12 col-xs-12' => __( 'One Column', 'creote-addons' ),
                   ],
                 'default' => __('col-lg-4 col-md-6 col-sm-6 col-xs-12' , 'creote-addons'),
                 ]
           );
         $this->add_control(
            'post_counts',
            [ 
            'label'   => esc_html__( 'Number of post', 'creote-addons' ),
            'type'    => Controls_Manager::NUMBER,
            'default' => 1,
            'min'     => 1,
            'max'     => 100,
            'step'    => 1,
            ]
         );
           $this->add_control(
            'query_orderbys',
            [
                'label'   => esc_html__( 'Order By', 'creote-addons' ),
                'type'    => Controls_Manager::SELECT,
                'options' => array(
                    'date' => esc_html__( 'Date', 'creote-addons' ),
                    'name' => esc_html__( 'Name', 'creote-addons' ),
                    'id'   => esc_html__( 'Ids', 'creote-addons' ),
                    'rand' => esc_html__( 'Random', 'creote-addons' ),
                    'modified' => esc_html__( 'Modified', 'creote-addons' ),
                    'comment_count'  => esc_html__( 'Comment Count', 'creote-addons' ),
                    'menu_order'   => esc_html__( 'Menu Order', 'creote-addons' ),
                ),
                'default' => 'rand',
                'condition' => [
                  'fileteroption' => 'type_two',
                ],
            ]
         );
        $this->add_control(
            'query_order',
            [
                'label'   => esc_html__( 'Order', 'creote-addons' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'DESC',
                'options' => array(
                    'DESc' => esc_html__( 'DESC', 'creote-addons' ),
                    'ASC'  => esc_html__( 'ASC', 'creote-addons' ),
                ), 
                'condition' => [
                  'fileteroption' => 'type_two',
                ],
            ]
        );
           $this->add_control(
               'text_limit',
               [
                   'label'   => esc_html__( 'Text Limit', 'creote-addons' ),
                   'type'    => Controls_Manager::NUMBER,
                   'default' => 12,
                   'min'     => 1,
                   'max'     => 100,
                   'step'    => 1,
               ]
           );
           $repeater = new Repeater();
           $repeater->add_control(
               'post_count',
               [
                   'label' => __('Post Count', 'creote-addons'),
                   'type'    => Controls_Manager::NUMBER,
   				'default' => 3,
   				'min'     => 1,
   				'max'     => 100,
   				'step'    => 1,
               ]
           );
         
            $repeater->add_control(
                'query_orderby',
                [
                    'label'   => esc_html__( 'Order By', 'luxride-addons' ),
                    'type'    => \Elementor\Controls_Manager::SELECT,
                    'default' => 'date',
                    'options' => array(
                        'date'       => esc_html__( 'Date', 'luxride-addons' ),
                        'title'      => esc_html__( 'Title', 'luxride-addons' ),
                        'menu_order' => esc_html__( 'Menu Order', 'luxride-addons' ),
                        'rand'       => esc_html__( 'Random', 'luxride-addons' ),
                    ),
                ]
            );
            $repeater->add_control(
                'query_order',
                [
                    'label'   => esc_html__( 'Order', 'luxride-addons' ),
                    'type'    => \Elementor\Controls_Manager::SELECT,
                    'default' => 'DESC',
                    'options' => array(
                        'DESC' => esc_html__( 'DESC', 'luxride-addons' ),
                        'ASC'  => esc_html__( 'ASC', 'luxride-addons' ),
                    ),
                ]
            ); 
                $repeater->add_control(
                'query_category', 
                    [
                    'type' => Controls_Manager::SELECT,
                    'label' => esc_html__('Category', 'creote-addons'),
                    'options' => get_project_categories(),
                    ]
            );
            $repeater->add_responsive_control(
                'post_id',
                [
                   'label' => __('Enter the Post Id to dispay', 'luxride-addons'),
                   'type' => \Elementor\Controls_Manager::TEXTAREA,
                   'default' => __('', 'luxride-addons'),
                   'placeholder' => __('Enter the post id like this -> 1054 , 103 , 11', 'luxride-addons'),    
                ]
            ); 
            $repeater->add_responsive_control(
                'post_id_not',
                [
                   'label' => __('Enter the Post Id that do not dispay', 'luxride-addons'),
                   'type' => \Elementor\Controls_Manager::TEXTAREA,
                   'default' => __('', 'luxride-addons'),
                   'placeholder' => __('Enter the post id like this -> 154 , 103 , 11', 'luxride-addons'),    
                ]
            ); 
           $repeater->add_control(
               'filtertitle',
               [
                   'label'       => esc_html__( 'Filter Title', 'creote-addons' ),
                   'type'        => Controls_Manager::TEXTAREA,
                   'default' =>  esc_html__( 'Planting' , 'creote-addons'),
               ]
           );
           $this->add_control(
               'project_filter_repeater',
               [
                   'label' => __( 'Project Repeater', 'creote-addons' ),
                   'type' => \Elementor\Controls_Manager::REPEATER,
                   'fields' => $repeater->get_controls(),
                   'default' => [
                       [
                           'post_count' => __( '1', 'creote-addons' ),
                       ],
                   ],
                   'title_field' => '{{{filtertitle}}}',
                   'condition' => [
                    'fileteroption' => 'type_one',
                  ],
               ]
           );
           $this->add_control(
               'stylefilter',
               [
                   'label' => __('Filter style', 'creote-addons'),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
                       'dark'   => esc_html__( 'Dark', 'creote-addons' ),
                       'light' => esc_html__( 'Light', 'creote-addons' ),
                   ],
                   'default' => 'dark',
               ]
           );
           $this->add_control(
               'filter_enable',
               [
                 'label' => __( 'Filter Enable / Disable', 'creote-addons' ),
                 'type' => Controls_Manager::SWITCHER,
                 'label_on' => __( 'Show', 'creote-addons' ),
                 'label_off' => __( 'Hide', 'creote-addons' ),
                 'return_value' => 'yes',
                 'default' => 'yes',
               ]
             );
             $this->add_control(
               'orgin_right_enable',
               [
                 'label' => __( 'Orgin Right Enable / Disable', 'creote-addons' ),
                 'type' => Controls_Manager::SWITCHER,
                 'label_on' => __( 'Show', 'creote-addons' ),
                 'label_off' => __( 'Hide', 'creote-addons' ),
                 'return_value' => 'yes',
                 'default' => 'no',
                 'condition' => [
                  'filter_enable' => 'yes',
                ],
               ]
             );
           $this->add_responsive_control(
               'alignment',
               [
                   'label' => __('Filter Alignment', 'creote-addons'),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
                       'inherit'   => esc_html__( 'Inherit', 'creote-addons' ),
                       'left' => esc_html__( 'Left', 'creote-addons' ),
                       'right' => esc_html__( 'Right', 'creote-addons' ),
                       'center' => esc_html__( 'Center', 'creote-addons' ),
                   ],
                   'default' => 'center',
                   'selectors' => [
                     '{{WRAPPER}} .fliter_group ' => 'text-align: {{VALUE}}!important;',
                 ],
               ]
           );
             $this->add_control(
             'tag_enable',
             [
               'label' => __( 'Offer Enable', 'creote-addons' ),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => __( 'Show', 'creote-addons' ),
               'label_off' => __( 'Hide', 'creote-addons' ),
               'return_value' => 'yes',
               'default' => 'yes',
             ]
           );
           $this->add_control(
            'read_more',
            [
                'label'       => esc_html__( 'Read More Text', 'creote-addons' ),
                'type'        => Controls_Manager::TEXT,
                'description' => esc_html__( 'Enter Text for button' , 'creote-addons' ),
                'default' =>  esc_html__( 'Read More' , 'creote-addons'),
            ]
        );
        $this->add_control(
         'view_all',
         [
             'label'       => esc_html__( 'View All', 'creote-addons' ),
             'type'        => Controls_Manager::TEXT, 
             'default' =>  esc_html__( '' , 'creote-addons'),
         ]
     );
    $this->end_controls_section(); 
   }
   protected function render(){
   $settings = $this->get_settings_for_display();
   $allowed_tags = wp_kses_allowed_html('post');
   $project_cat = $settings['project_filter_repeater'];
   ?>
<?php if($settings['fileteroption'] == 'type_two'): ?>
    <section class="project_all filt_<?php echo esc_attr($settings['project_filter_style']); ?> <?php if($settings['filter_enable'] == 'yes'): ?> filter_enabled <?php if($settings['orgin_right_enable'] == 'yes'): ?> orgin_right_enable <?php endif; ?><?php endif; ?>">
        <?php if($settings['filter_enable'] == 'yes'): $taxonomy = 'project_category'; $terms = get_terms($taxonomy); if($terms && !is_wp_error($terms)): ?>

            <div class="row">

                <div class="col-lg-12">

                    <div class="fliter_group">
                        <ul class="project_filter <?php echo esc_attr($settings['stylefilter']); ?> clearfix">
                            <li data-filter="*" class="current">
                                <?php if(!empty($settings['view_all'])): echo esc_attr($settings['view_all']); else: echo esc_html__( 'View All' , 'creote-addons'); endif; ?>
                            </li>
                            <?php foreach ( $terms as $term ) { ?>
                                <li data-filter=".project_category-<?php echo ($term->slug); ?>">
                                    <?php echo $term->name; ?>
                                </li>
                                <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endif;?>
                <?php endif; ?>

                    <div class="project_container clearfix ">

                        <div class="row clearfix">
                            <?php 
if ( get_query_var( 'paged' ) ) { 
    $paged = get_query_var( 'paged' ); 
    } elseif ( get_query_var( 'page' ) ) {
    $paged = get_query_var( 'page' );
    } else { $paged = 1; 
 } 
          $query_args =  array(
             'post_type' => 'project', 
             'ignore_sticky_posts' => true,
              'paged' => $paged, 
              'posts_per_page' => $settings['post_counts'], 
              'orderby' => $settings['query_orderbys'], 
              'order' => $settings['query_order'], ); 
              $project_query = new \WP_Query( $query_args ); if ($project_query->have_posts()) { while ($project_query->have_posts()) : $project_query->the_post(); $project_meta_date = get_post_meta( get_the_ID(), 'date_id', true ); $project_meta_client = get_post_meta( get_the_ID(), 'client_id', true ); $project_information_enable = get_post_meta( get_the_ID(), 'project_information_enable', true ); $myexcerpt = wp_trim_words(get_the_excerpt(), $settings['text_limit']); $post_terms = wp_get_post_terms( get_the_id(), 'project_category'); $project_category = 'project_category'; $term_slug = ''; if($post_terms) foreach($post_terms as $p_term) $term_slug .= $project_category . '-' . $p_term->slug.' '; ?>
                                <?php if($settings['project_filter_style'] == 'style_two'):?>

                                    <div class="project-wrapper grid-item <?php echo esc_attr($settings['project_column']); ?> <?php echo esc_attr($term_slug); ?>">

                                        <div class="project_box style_three clearfix">

                                            <div class="content_inner">
                                                <?php $cats = get_the_terms( get_the_ID(), 'project_category' ); $output_cat = array(); if($cats){ foreach($cats as $cat){ $output_cat[] = sprintf( '<a href="%s" class="cat">%s</a>', esc_url( get_term_link( $cat->slug, 'project_category' ) ), $cat->name ); } } if(!empty($output_cat)): ?>

                                                    <div>
                                                        <?php echo implode( ', ', $output_cat ) ?>
                                                    </div>
                                                    <?php endif; ?>
                                                        <h2><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo get_the_title(); ?></a></h2>
                                                        <?php if(!empty($myexcerpt)):?>

                                                            <p class="short_desc">
                                                                <?php echo esc_html($myexcerpt); ?>
                                                            </p>
                                                            <?php endif; ?>
                                                                <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="read_more">
                                                                    <?php echo esc_html__($settings['read_more']); ?>

                                                                        <span class="icon-right-arrow-long"></a> 

<div class="share_me"> <?php do_action('creote_get_share_options_one'); ?> 
</div> 
</div> 

<div class="image"> <?php echo get_the_post_thumbnail( get_the_ID(), array(370,330) ); ?> <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="pro-link"></a> 

<div class="overlay"> 
</div> <?php if($project_information_enable == true): ?> 

<div class="text"> 
<ul> <?php if(!empty($project_meta_date)): ?> 
<li><?php echo esc_html('Date :' , 'creote-addons'); ?> 

<span><?php echo wp_kses($project_meta_date , $allowed_tags); ?>
</span></li>
                                                                        <?php endif; ?>
                                                                            <?php if(!empty($project_meta_client)): ?>
                                                                                <li>
                                                                                    <?php echo esc_html('Client :' , 'creote-addons'); ?>

                                                                                        <span><?php echo wp_kses($project_meta_client , $allowed_tags); ?>
</span></li>
                                                                                <?php endif; ?>
                                                                                    </ul>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                        </div>
                        <?php elseif($settings['project_filter_style'] == 'style_three' ):?>

                            <div class="project-wrapper grid-item <?php echo esc_attr($settings['project_column']); ?> <?php echo esc_attr($term_slug); ?>">

                                <div class="project_post style_one">
                                    <?php if ( has_post_thumbnail() ): ?>

                                        <div class="image">
                                            <?php the_post_thumbnail('creote_project_caro_image_style_one'); ?>
                                        </div>
                                        <?php endif;?>

                                            <div class="project_caro_content">

                                                <div class="left_side">
                                                    <?php $cats = get_the_terms( get_the_ID(), 'project_category' ); $output_cat = array(); if($cats){ foreach($cats as $cat){ $output_cat[] = sprintf( '<a href="%s" class="cat">%s</a>', esc_url( get_term_link( $cat->slug, 'project_category' ) ), $cat->name ); } } if(!empty($output_cat)): ?>

                                                        <p>
                                                            <?php echo implode( ', ', $output_cat ) ?>
                                                        </p>
                                                        <?php endif; ?>
                                                            <?php the_title( '<h2 class="title_pro"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                                                </div>

                                                <div class="right_side"> <a href="<?php echo esc_url(get_permalink()); ?>"><i class="icon-right-arrow"></i></a> <a href="<?php echo esc_url(get_permalink()); ?>" class="two"><i class="icon-right-arrow"></i></a>
                                                </div>
                                            </div>
                                </div>
                            </div>
                            <?php elseif($settings['project_filter_style'] == 'style_four' ):?>

                                <div class="project-wrapper grid-item <?php echo esc_attr($settings['project_column']); ?> <?php echo esc_attr($term_slug); ?>">

                                    <div class="project_post style_one style_four">
                                        <?php if(has_post_thumbnail()): ?>

                                            <div class="image">
                                                <?php the_post_thumbnail('creote_project_caro_image_style_one'); ?> <a href="<?php echo esc_url(get_permalink()); ?>" class="two"><i class="icon-right-arrow"></i></a>
                                            </div>
                                            <?php endif;?>

                                                <div class="project_caro_content">

                                                    <div class="left_side">
                                                        <?php $cats = get_the_terms( get_the_ID(), 'project_category' ); $output_cat = array(); if($cats){ foreach($cats as $cat){ $output_cat[] = sprintf( '<a href="%s" class="cat">%s</a>', esc_url( get_term_link( $cat->slug, 'project_category' ) ), $cat->name ); } } if(!empty($output_cat)): ?>

                                                            <p>
                                                                <?php echo implode( ', ', $output_cat ) ?>
                                                            </p>
                                                            <?php endif; ?>
                                                                <?php the_title( '<h2 class="title_pro"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                                <?php elseif($settings['project_filter_style'] == 'style_five' ):?>

                                    <div class="project-wrapper grid-item <?php echo esc_attr($settings['project_column']); ?> <?php echo esc_attr($term_slug); ?>">

                                        <div class="project_post style_one style_five <?php if($settings['active_enable'] == 'yes'): ?>hover_actives<?php endif; ?>">
                                            <?php if(has_post_thumbnail()): ?>

                                                <div class="image">
                                                    <?php the_post_thumbnail('creote_project_caro_image_style_one'); ?> <a href="<?php echo esc_url(get_permalink()); ?>" class="two"><i class="icon-right-arrow"></i></a>

                                                        <div class="project_caro_content">

                                                            <div class="left_side">
                                                                <?php $cats = get_the_terms( get_the_ID(), 'project_category' ); $output_cat = array(); if($cats){ foreach($cats as $cat){ $output_cat[] = sprintf( '<a href="%s" class="cat">%s</a>', esc_url( get_term_link( $cat->slug, 'project_category' ) ), $cat->name ); } } if(!empty($output_cat)): ?>

                                                                    <p>
                                                                        <?php echo implode( ', ', $output_cat ) ?>
                                                                    </p>
                                                                    <?php endif; ?>
                                                                        <?php the_title( '<h2 class="title_pro"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                                                            </div>
                                                        </div>
                                                </div>
                                                <?php endif;?>
                                        </div>
                                    </div>
                                    <?php elseif($settings['project_filter_style'] == 'style_six' ):?>

                                        <div class="project-wrapper grid-item <?php echo esc_attr($settings['project_column']); ?> <?php echo esc_attr($term_slug); ?>">

                                            <div class="project_post style_six">
                                                <?php if(has_post_thumbnail()): ?>

                                                    <div class="image_box ">
                                                        <?php the_post_thumbnail('creote_project_caro_image_style_one'); ?>

                                                            <div class="overlay ">

                                                                <div class="content_box ">
                                                                    <?php the_title( '<h2 class="title_pro"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                                                                        <?php $cats = get_the_terms( get_the_ID(), 'project_category' ); $output_cat = array(); if($cats){ foreach($cats as $cat){ $output_cat[] = sprintf( '<a href="%s" class="cat">%s</a>', esc_url( get_term_link( $cat->slug, 'project_category' ) ), $cat->name ); } } if(!empty($output_cat)): ?>

                                                                            <p>
                                                                                <?php echo implode( ', ', $output_cat ) ?>
                                                                            </p>
                                                                            <?php endif; ?>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <?php endif;?>
                                                        <a data-fancybox="gallery" href="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>">

                                                            <span class="icon-add zoom_icon">
</span> </a>
                                            </div>
                                        </div>
                                        <?php elseif($settings['project_filter_style'] == 'style_eight' ):?>

                                            <div class="project-wrapper grid-item <?php echo esc_attr($settings['project_column']); ?> <?php echo esc_attr($term_slug); ?>">

                                                <div class="project_post style_eight">

                                                    <div class="inner_box">
                                                        <?php if(has_post_thumbnail()): ?>

                                                            <div class="image_box ">
                                                                <?php the_post_thumbnail('creote_project_caro_image_style_one'); ?>
                                                                    <a data-fancybox="gallery" href="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>">

                                                                        <span class="icon-plus zoom_icon">
</span> </a>
                                                            </div>
                                                            <?php endif;?>

                                                                <div class="content_box ">
                                                                    <?php the_title( '<h2 class="title_pro"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                                                                        <?php $cats = get_the_terms( get_the_ID(), 'project_category' ); $output_cat = array(); if($cats){ foreach($cats as $cat){ $output_cat[] = sprintf( '<a href="%s" class="cat">%s</a>', esc_url( get_term_link( $cat->slug, 'project_category' ) ), $cat->name ); } } if(!empty($output_cat)): ?>

                                                                            <p>
                                                                                <?php echo implode( ', ', $output_cat ) ?>
                                                                            </p>
                                                                            <?php endif; ?>
                                                                                <a href="<?php echo esc_url(get_permalink()); ?>" class="arrow_btn ">

                                                                                    <span class="icon-right-arrow-long">
</span></a>
                                                                </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php else: ?>

                                                <div class="project-wrapper grid-item <?php echo esc_attr($settings['project_column']); ?> <?php echo esc_attr($term_slug); ?>">

                                                    <div class="project_box style_two">

                                                        <div class="entry-thumbnail image">
                                                            <?php echo get_the_post_thumbnail( get_the_ID(), array(370,330) ); ?>

                                                                <div class="overlay">
                                                                    <a data-fancybox="gallery" href="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>">

                                                                        <span class="fa fa-search icon">
</span> </a>
                                                                </div>
                                                        </div>

                                                        <div class="content_inner">
                                                            <h2><a href="<?php echo esc_url( get_the_permalink()); ?>"><?php echo get_the_title(); ?></a></h2>

                                                            <div class="meta_value">
                                                                <?php $cats = get_the_terms( get_the_ID(), 'project_category' ); $output_cat = array(); if($cats){ foreach($cats as $cat){ $output_cat[] = sprintf( '<a href="%s" class="cat">%s</a>', esc_url( get_term_link( $cat->slug, 'project_category' ) ), $cat->name ); } } if(!empty($output_cat)): ?>
                                                                    <?php echo implode( ', ', $output_cat ) ?>
                                                                        <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endif; endwhile;} ?>
                    </div>
                    </div>
    </section>
    <?php else: ?>
        <section class="project_all filt_<?php echo esc_attr($settings['project_filter_style']); ?> <?php if($settings['filter_enable'] == 'yes'): ?> filter_enabled <?php if($settings['orgin_right_enable'] == 'yes'): ?> orgin_right_enable <?php endif; ?><?php endif; ?>">
            <?php if($settings['filter_enable'] == 'yes'): ?>

                <div class="row">

                    <div class="col-lg-12">

                        <div class="fliter_group">
                            <ul class="project_filter <?php echo esc_attr($settings['stylefilter']); ?> clearfix">
                                <li data-filter="*" class="current">
                                    <?php if(!empty($settings['view_all'])): echo esc_attr($settings['view_all']); else: echo esc_html__( 'View All' , 'creote-addons'); endif; ?>
                                </li>
                                <?php if (!empty( $project_cat )) { foreach ($project_cat as $key => $value) { ?>
                                    <li data-filter=".project_category-<?php echo esc_attr($value['query_category']);?>">
                                        <?php echo esc_attr($value['filtertitle']); ?>
                                    </li>
                                    <?php }} ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                    <div class="project_container clearfix ">

                        <div class="row clearfix">
                            <?php if ( ! empty( $project_cat ) ) { foreach ( $project_cat as $key => $value ) { 
                                $post_in = "";
                                if (!empty($value["post_id"])) {
                                    $post_in = explode(",", $settings["post_id"]);
                                }
                                $post_id_not = "";
                                if (!empty($value["post_id_not"])) {
                                    $post_id_not = explode(",", $settings["post_id_not"]);
                                }
                                $query_args = array( 
                                    'post_type' => 'project', 
                                    'ignore_sticky_posts' => true, 
                                    'posts_per_page' => $value['post_count'], 
                                    "orderby" => $value["query_orderby"],
                                    "order" => $value["query_order"],
                                    "post__in" => $post_in,
                                    "post__not_in" => $post_id_not,
                                    ); 
                                    if($value['query_category'] ) $query_args['project_category'] = $value['query_category'];
                                     $project_query = new \WP_Query( $query_args ); 
                                     if ($project_query->have_posts()) {
                                         while ($project_query->have_posts()) : 
                                         $project_query->the_post(); 
                                         $term_list = 
                                         wp_get_post_terms(get_the_id(), 'project_category', array("fields" => "names")); 
                                         $project_meta_date = get_post_meta( get_the_ID(), 'date_id', true ); 
                                         $project_meta_client = get_post_meta( get_the_ID(), 'client_id', true ); 
                                         $project_information_enable = get_post_meta( get_the_ID(), 'project_information_enable', true ); 
                                         $myexcerpt = wp_trim_words(get_the_excerpt(), $settings['text_limit']); ?>
                                <?php if($settings['project_filter_style'] == 'style_two'):?>

                                    <div class="project-wrapper grid-item <?php echo esc_attr($settings['project_column']); ?> project_category-<?php echo esc_attr($value['query_category']);?>">

                                        <div class="project_box style_three clearfix">

                                            <div class="content_inner">

                                                <div>
                                                    <?php $cats = get_the_terms( get_the_ID(), 'project_category' ); $output_cat = array(); if($cats){ foreach($cats as $cat){ $output_cat[] = sprintf( '<a href="%s" class="cat">%s</a>', esc_url( get_term_link( $cat->slug, 'project_category' ) ), $cat->name ); } } if(!empty($output_cat)): ?>

                                                        <?php echo implode( ', ', $output_cat ) ?>
                                                            <?php endif; ?>
                                                </div>
                                                <h2><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo get_the_title(); ?></a></h2>
                                                <?php if(!empty($myexcerpt)):?>

                                                    <p class="short_desc">
                                                        <?php echo esc_html($myexcerpt); ?>
                                                    </p>
                                                    <?php endif; ?>
                                                        <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="read_more">
                                                            <?php echo esc_html__($settings['read_more']); ?>

                                                                <span class="icon-right-arrow-long"></a> 

                                                            <div class="share_me"> <?php do_action('creote_get_share_options_one'); ?> 
                                                            </div> 
                                                            </div> 

                                                            <div class="image"> <?php echo get_the_post_thumbnail( get_the_ID(), array(370,330) ); ?> <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="pro-link"></a> 

                                                            <div class="overlay"> 
                                                            </div> <?php if($project_information_enable == true): ?> 

                                                            <div class="text"> 
                                                            <ul> <?php if(!empty($project_meta_date)): ?> 
                                                            <li><?php echo esc_html('Date :' , 'creote-addons'); ?> 

                                                            <span><?php echo wp_kses($project_meta_date , $allowed_tags); ?>
                                                                </span></li>
                                                                <?php endif; ?>
                                                                    <?php if(!empty($project_meta_client)): ?>
                                                                        <li>
                                                                            <?php echo esc_html('Client :' , 'creote-addons'); ?>

                                                                                <span><?php echo wp_kses($project_meta_client , $allowed_tags); ?>
                                                                            </span></li>
                                                                        <?php endif; ?>
                                                                            </ul>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                        </div>
                        <?php elseif($settings['project_filter_style'] == 'style_three' ):?>

                            <div class="project-wrapper grid-item <?php echo esc_attr($settings['project_column']); ?> project_category-<?php echo esc_attr($value['query_category']);?>">

                                <div class="project_post style_one">
                                    <?php if ( has_post_thumbnail() ): ?>

                                        <div class="image">
                                            <?php the_post_thumbnail('creote_project_caro_image_style_one'); ?>
                                        </div>
                                        <?php endif;?>

                                            <div class="project_caro_content">

                                                <div class="left_side">

                                                    <?php $cats = get_the_terms( get_the_ID(), 'project_category' ); $output_cat = array(); if($cats){ foreach($cats as $cat){ $output_cat[] = sprintf( '<a href="%s" class="cat">%s</a>', esc_url( get_term_link( $cat->slug, 'project_category' ) ), $cat->name ); } } if(!empty($output_cat)): ?>

                                                        <p>
                                                            <?php echo implode( ', ', $output_cat ) ?>
                                                        </p>
                                                        <?php endif; ?>
                                                            <?php the_title( '<h2 class="title_pro"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                                                </div>

                                                <div class="right_side"> <a href="<?php echo esc_url(get_permalink()); ?>"><i class="icon-right-arrow"></i></a> <a href="<?php echo esc_url(get_permalink()); ?>" class="two"><i class="icon-right-arrow"></i></a>
                                                </div>
                                            </div>
                                </div>
                            </div>
                            <?php elseif($settings['project_filter_style'] == 'style_four' ):?>

                                <div class="project-wrapper grid-item <?php echo esc_attr($settings['project_column']); ?> project_category-<?php echo esc_attr($value['query_category']);?>">

                                    <div class="project_post style_one style_four">
                                        <?php if(has_post_thumbnail()): ?>

                                            <div class="image">
                                                <?php the_post_thumbnail('creote_project_caro_image_style_one'); ?> <a href="<?php echo esc_url(get_permalink()); ?>" class="two"><i class="icon-right-arrow"></i></a>
                                            </div>
                                            <?php endif;?>

                                                <div class="project_caro_content">

                                                    <div class="left_side">

                                                        <?php $cats = get_the_terms( get_the_ID(), 'project_category' ); $output_cat = array(); if($cats){ foreach($cats as $cat){ $output_cat[] = sprintf( '<a href="%s" class="cat">%s</a>', esc_url( get_term_link( $cat->slug, 'project_category' ) ), $cat->name ); } } if(!empty($output_cat)): ?>

                                                            <p>
                                                                <?php echo implode( ', ', $output_cat ) ?>
                                                            </p>
                                                            <?php endif; ?>
                                                                <?php the_title( '<h2 class="title_pro"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                                <?php elseif($settings['project_filter_style'] == 'style_five' ):?>

                                    <div class="project-wrapper grid-item <?php echo esc_attr($settings['project_column']); ?> project_category-<?php echo esc_attr($value['query_category']);?>">

                                        <div class="project_post style_one style_five <?php if($settings['active_enable'] == 'yes'): ?>hover_actives<?php endif; ?>">
                                            <?php if(has_post_thumbnail()): ?>

                                                <div class="image">
                                                    <?php the_post_thumbnail('creote_project_caro_image_style_one'); ?> <a href="<?php echo esc_url(get_permalink()); ?>" class="two"><i class="icon-right-arrow"></i></a>

                                                        <div class="project_caro_content">

                                                            <div class="left_side">

                                                                <?php $cats = get_the_terms( get_the_ID(), 'project_category' ); $output_cat = array(); if($cats){ foreach($cats as $cat){ $output_cat[] = sprintf( '<a href="%s" class="cat">%s</a>', esc_url( get_term_link( $cat->slug, 'project_category' ) ), $cat->name ); } } if(!empty($output_cat)): ?>

                                                                    <p>
                                                                        <?php echo implode( ', ', $output_cat ) ?>
                                                                    </p>
                                                                    <?php endif; ?>
                                                                        <?php the_title( '<h2 class="title_pro"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
                                                            </div>
                                                        </div>
                                                </div>
                                                <?php endif;?>
                                        </div>
                                    </div>
                                    <?php elseif($settings['project_filter_style'] == 'style_six' ):?>

                                        <div class="project-wrapper grid-item <?php echo esc_attr($settings['project_column']); ?> project_category-<?php echo esc_attr($value['query_category']);?>">

                                            <div class="project_post style_six">
                                                <?php if(has_post_thumbnail()): ?>

                                                    <div class="image_box ">
                                                        <?php the_post_thumbnail('creote_project_caro_image_style_one'); ?>

                                                            <div class="overlay ">

                                                                <div class="content_box ">
                                                                    <?php the_title( '<h2 class="title_pro"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>

                                                                        <?php $cats = get_the_terms( get_the_ID(), 'project_category' ); $output_cat = array(); if($cats){ foreach($cats as $cat){ $output_cat[] = sprintf( '<a href="%s" class="cat">%s</a>', esc_url( get_term_link( $cat->slug, 'project_category' ) ), $cat->name ); } } if(!empty($output_cat)): ?>

                                                                            <p>
                                                                                <?php echo implode( ', ', $output_cat ) ?>
                                                                            </p>
                                                                            <?php endif; ?>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <?php endif;?>
                                                        <a data-fancybox="gallery" href="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>">

                                                            <span class="icon-add zoom_icon">
</span> </a>
                                            </div>
                                        </div>
                                        <?php elseif($settings['project_filter_style'] == 'style_eight' ):?>

                                            <div class="project-wrapper grid-item <?php echo esc_attr($settings['project_column']); ?> project_category-<?php echo esc_attr($value['query_category']);?>">

                                                <div class="project_post style_eight">

                                                    <div class="inner_box">
                                                        <?php if(has_post_thumbnail()): ?>

                                                            <div class="image_box ">
                                                                <?php the_post_thumbnail('creote_project_caro_image_style_one'); ?>
                                                                    <a data-fancybox="gallery" href="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>">

                                                                        <span class="icon-plus zoom_icon">
</span> </a>
                                                            </div>
                                                            <?php endif;?>

                                                                <div class="content_box ">
                                                                    <?php the_title( '<h2 class="title_pro"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>

                                                                        <?php $cats = get_the_terms( get_the_ID(), 'project_category' ); $output_cat = array(); if($cats){ foreach($cats as $cat){ $output_cat[] = sprintf( '<a href="%s" class="cat">%s</a>', esc_url( get_term_link( $cat->slug, 'project_category' ) ), $cat->name ); } } if(!empty($output_cat)): ?>

                                                                            <p>
                                                                                <?php echo implode( ', ', $output_cat ) ?>
                                                                            </p>
                                                                            <?php endif; ?>
                                                                                <a href="<?php echo esc_url(get_permalink()); ?>" class="arrow_btn ">

                                                                                    <span class="icon-right-arrow-long">
</span></a>
                                                                </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php else: ?>

                                                <div class="project-wrapper grid-item <?php echo esc_attr($settings['project_column']); ?> project_category-<?php echo esc_attr($value['query_category']);?>">

                                                    <div class="project_box style_two">

                                                        <div class="entry-thumbnail image">
                                                            <?php echo get_the_post_thumbnail( get_the_ID(), array(370,330) ); ?>

                                                                <div class="overlay">
                                                                    <a data-fancybox="gallery" href="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>">

                                                                        <span class="fa fa-search icon">
</span> </a>
                                                                </div>
                                                        </div>

                                                        <div class="content_inner">
                                                            <h2><a href="<?php echo esc_url( get_the_permalink()); ?>"><?php echo get_the_title(); ?></a></h2>

                                                            <div class="meta_value">
                                                                <?php $cats = get_the_terms( get_the_ID(), 'project_category' ); $output_cat = array(); if($cats){ foreach($cats as $cat){ $output_cat[] = sprintf( '<a href="%s" class="cat">%s</a>', esc_url( get_term_link( $cat->slug, 'project_category' ) ), $cat->name ); } } if(!empty($output_cat)): ?>

                                                                    <?php echo implode( ', ', $output_cat ) ?>
                                                                        <?php endif; ?>
                                                                            </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endif; endwhile;}}} ?>
                    </div>
                    </div>
        </section>
        <?php endif; ?>
<?php
wp_reset_postdata();
}
}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_creote_project_filter_v1());