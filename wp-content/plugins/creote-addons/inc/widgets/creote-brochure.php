<?php
/**
 * @package Creote Addons
 * @subpackage Brochure
 * @since 1.0.0
 */
class creote_brouchure extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'widget_crochure',
			'description'                 => __( 'Creote Brochure Download' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'creote-brochure', __( 'Creote - Brochure Download' ), $widget_ops );
		$this->alt_option_name = 'widget_brochure';
	}
	public function widget( $args, $instance ) {
		extract( $args );
		echo wp_kses_post($before_widget); ?>
        <div class="brouchure_box_widget widget_box">
            <div class="widget_content">
                <?php if(!empty($instance['title'])) : ?>
                    <h3><?php echo wp_kses_post($instance['title']); ?></h3>
                <?php endif; ?>
                <?php if(! empty($instance['linktext'])) : ?> 
					<div class="btnnd clearfix">
                    <a href="<?php if(! empty($instance['linktext'])): echo esc_url($instance['link']); endif; ?>" class="theme-btn one"><?php echo wp_kses_post($instance['linktext']); ?></a>
				</div>
		        <?php endif; ?>
                <?php if(! empty($instance['image'])) : ?> 
		            <img src="<?php echo wp_kses_post($instance['image']); ?>" alt="image"/>
		        <?php endif; ?>
            </div>
        </div>
	<?php echo wp_kses_post($after_widget);
}
	public function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = $new_instance['title'] ;
		$instance['linktext']     = $new_instance['linktext'] ;
		$instance['link']     = strip_tags( $new_instance['link'] );
        $instance['image']     = $new_instance['image'] ;
		return $instance;
	}
	public function form( $instance ) {
		$title     = ( $instance ) ? esc_attr( $instance['title'] ) : '';
		$image =  ( $instance ) ? esc_attr( $instance['image'] ) : '';
		$linktext     =  ($instance ) ? esc_attr( $instance['linktext'] ) : '';
        $link     = ( $instance ) ? esc_attr( $instance['link'] ) : ''; 
		?>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
    </p>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'image' )); ?>"><?php esc_html_e( 'Image:' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'image' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'image' )); ?>" type="text" value="<?php echo esc_attr($image); ?>" />
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
