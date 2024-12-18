<?php
/**
 * @package Creote Addons
 * @subpackage Contact US
 * @since 1.0.0
 */
class creote_contact extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'widget_contactus',
			'description'                 => __( 'Creote Contact Us' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'creote-contactus', __( 'Creote - Contact Us' ), $widget_ops );
		$this->alt_option_name = 'widget_contactus';
	}
	public function widget( $args, $instance ) {
		extract( $args );
		echo wp_kses_post($before_widget); ?>
        <div class="contact_box_widget widget_box"> 
            <div class="widget_content">
            <?php if(! empty($instance['backgroundimage'])) : ?> 
		            <img src="<?php echo wp_kses_post($instance['backgroundimage']); ?>" alt="backgroundimage"/>
		        <?php endif; ?>
                <div class="top_section">
                <?php if(!empty($instance['title'])) : ?>
                    <h3><?php echo wp_kses_post($instance['title']); ?></h3>
                <?php endif; ?>
                <?php if(!empty($instance['description'])) : ?>
                    <p><?php echo wp_kses_post($instance['description']); ?></p>
                <?php endif; ?>
                </div>
                <div class="bottom_section">
                <?php if(! empty($instance['phonenumber'])) : ?> 
                    <a href="tel:<?php echo esc_attr($instance['phonenumber']); ?>" class="phone_number"><?php echo wp_kses_post($instance['phonenumber']); ?></a>
		        <?php endif; ?>
                <?php if(! empty($instance['mailid'])) : ?> 
                    <a href="mailto:<?php echo esc_attr($instance['mailid']); ?>" class="mailid"><?php echo wp_kses_post($instance['mailid']); ?></a>
		        <?php endif; ?>
                </div>
            </div>
            <?php if(! empty($instance['linktext'])) : ?> 
                    <a href="<?php if(! empty($instance['linktext'])):  echo esc_url($instance['link']); endif; ?>" class="theme-btn one"><?php echo wp_kses_post($instance['linktext']); ?></a>
		        <?php endif; ?>
        </div>
	<?php echo wp_kses_post($after_widget);
}
	public function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = $new_instance['title'] ;
        $instance['description']     = $new_instance['description'] ;
		$instance['phonenumber']     = strip_tags( $new_instance['phonenumber'] );
        $instance['mailid']     = $new_instance['mailid'] ;
        $instance['backgroundimage']     = $new_instance['backgroundimage'] ;
        $instance['linktext']     = $new_instance['linktext'] ;
		$instance['link']     = strip_tags( $new_instance['link'] );
		return $instance;
	}
	public function form( $instance ) {
		$title     = ( $instance ) ? esc_attr( $instance['title'] ) : '';
        $description     = ( $instance ) ? esc_attr( $instance['description'] ) : '';
		$backgroundimage =  ( $instance ) ? esc_attr( $instance['backgroundimage'] ) : '';
        $phonenumber     = ( $instance ) ? esc_attr( $instance['phonenumber'] ) : ''; 
        $mailid     =  ($instance ) ? esc_attr( $instance['mailid'] ) : '';
        $linktext     =  ($instance ) ? esc_attr( $instance['linktext'] ) : '';
        $link     = ( $instance ) ? esc_attr( $instance['link'] ) : '';
		?>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'description' )); ?>"><?php esc_html_e( 'Description:' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'description' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'description' )); ?>" type="text" value="<?php echo esc_attr($description); ?>" />
    </p>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'backgroundimage' )); ?>"><?php esc_html_e( 'Background Image:' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'backgroundimage' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'backgroundimage' )); ?>" type="text" value="<?php echo esc_attr($backgroundimage); ?>" />
	</p>
    <p>
		<label for="<?php echo esc_attr($this->get_field_id( 'phonenumber' )); ?>"><?php esc_html_e( 'Phone Number:' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'phonenumber' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'phonenumber' )); ?>" type="text" value="<?php echo esc_attr($phonenumber); ?>" />
	</p>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'mailid' )); ?>"><?php esc_html_e( 'Mail Id:' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'mailid' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'mailid' )); ?>" type="text" value="<?php echo esc_attr($mailid); ?>" />
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
