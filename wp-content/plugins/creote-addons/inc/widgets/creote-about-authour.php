<?php
/**
 * @package Creote Addons
 * @subpackage About Authour
 * @since 1.0.0
 */
class creote_about_authour extends WP_Widget {
	/**Sets up a new About widget instance. **/
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'widget_about_authour',
			'description'                 => __( 'Creote About Authour' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'creote-about-authour', __( 'Creote - About Authour ' ), $widget_ops );
		$this->alt_option_name = 'widget_about_authour';
	}
	/**
     * Outputs the content for the current creote About widget instance.
	 * @since 2.8.0
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 * 'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current creote About widget instance.
	 */
	public function widget( $args, $instance ) {
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'About Authour' );
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		extract( $args );
		echo wp_kses_post($before_widget); ?>
        <div class="about_authour widget_box">
        <?php if(! empty($instance['title'])) : ?> 
            <h2 class="widget-title"><?php echo wp_kses_post($instance['title']); ?></h2>
		<?php elseif(empty($instance['title'])) : ?> 
		    <h2 class="widget-title"><?php echo wp_kses_post($before_title.$title.$after_title); ?></h2>
		<?php endif; ?>
            <div class="widget_content">
                <?php if(!empty($instance['authourname'])) : ?>
                    <h3><?php echo wp_kses_post($instance['authourname']); ?></h3>
                <?php endif; ?>
                <?php if(! empty($instance['authourimage'])) : ?> 
		            <img src="<?php echo wp_kses_post($instance['authourimage']); ?>" alt="authourimage"/>
		        <?php endif; ?>
                <?php if(! empty($instance['description'])) : ?> 
                    <p><?php echo wp_kses_post($instance['description']); ?></p>
		        <?php endif; ?>
                <?php if(! empty($instance['linktext'])) : ?> 
                    <a href="<?php echo esc_url($instance['link']); ?>"><?php echo wp_kses_post($instance['linktext']); ?></a>
		        <?php endif; ?>
            </div>
        </div>
	<?php echo wp_kses_post($after_widget);
}
	/**
	 * Handles updating the settings for the current creote About widget instance.
	 *
	 * @since 2.8.0
	 * @param array $new_instance New settings for this instance as input by the user via
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = $new_instance['title'];
		$instance['authourname']     = $new_instance['authourname'] ;
		$instance['authourimage']     = $new_instance['authourimage'] ;
		$instance['description']     = $new_instance['description'] ;
		$instance['linktext']     = $new_instance['linktext'] ;
		$instance['link']     = strip_tags( $new_instance['link'] );
		return $instance;
	}
	/**
	 * Outputs the settings form for the creote About widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title     = ( $instance ) ? esc_attr( $instance['title'] ) : '';
		$authourname     = ( $instance ) ? esc_attr( $instance['authourname'] ) : '';
		$authourimage =  ( $instance ) ? esc_attr( $instance['authourimage'] ) : '';
		$description =  ( $instance ) ? esc_attr( $instance['description'] ) : '';
		$linktext     =  ($instance ) ? esc_attr( $instance['linktext'] ) : '';
        $link     = ( $instance ) ? esc_attr( $instance['link'] ) : ''; 
		?>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Widget Title:' ); ?></label>
    	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
	</p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'authourname' )); ?>"><?php esc_html_e( 'Authour Name:' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'authourname' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'authourname' )); ?>" type="text" value="<?php echo esc_attr($authourname); ?>" />
    </p>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'authourimage' )); ?>"><?php esc_html_e( 'Authour Image:' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'authourimage' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'authourimage' )); ?>" type="text" value="<?php echo esc_attr($authourimage); ?>" />
	</p>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'description' )); ?>"><?php esc_html_e( 'Authour Content:' ); ?></label>
        <textarea class="widefat" rows="16" cols="20" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>" ><?php echo wp_kses_post($description); ?></textarea>
	</p>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'linktext' )); ?>"><?php esc_html_e( 'Link Text:' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'linktext' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'linktext' )); ?>" type="text" value="<?php echo esc_attr($linktext); ?>" />
	</p>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'link' )); ?>"><?php esc_html_e( 'Link:' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'link' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'link' )); ?>" type="text" value="<?php echo esc_attr($link); ?>" />
	</p>
<?php
}
}
