<?php
/**
 * @package Creote Addons
 * @subpackage Widgets
 * @since 1.0.0
 */
class creote_Recent_Posts extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'creote_widget_recented_entries',
			'description'                 => __( 'Your most recent Posts.' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'recented-posts', __( 'Creote - Recent Posts' ), $widget_ops );
		$this->alt_option_name = 'creote_widget_recented_entries';
	}
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );
		if ($r->have_posts()) :
		?>
		<?php echo wp_kses_post($args['before_widget']); ?>
		<?php if ( $title ) {
			echo wp_kses_post($args['before_title'] . $title . $args['after_title']);
		} ?>
		<div class="post_inner cr_wid_post inner_box ">
		<?php while ( $r->have_posts() ) : $r->the_post();
              $image = get_the_post_thumbnail_url(); ?>
			<div class="blog_in clearfix  <?php if(!empty($image)): ?> image_in <?php endif; ?>">
            <?php if(!empty($image)): ?>
			<div class="image">
		         <img src="<?php echo esc_url($image); ?>" alt="img" />
			</div>
            <?php endif; ?>
			<div class="content_inner">
					<?php if ( $show_date ) : ?>
				<p class="post-date"><span class="icon-calendar"></span><?php  echo esc_attr(get_the_date(get_option('date_format'))); ?></p>
			<?php endif; ?>
				<h3><a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a></h3>
			</div>
			</div>
		<?php endwhile; ?>
		</div>
		<?php echo wp_kses_post($args['after_widget']); ?>
		<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();
		endif;
	}
	public function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = sanitize_text_field( $new_instance['title'] );
		$instance['number']    = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		return $instance;
	}
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		?>
		<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		<p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number of posts to show:' ); ?></label>
		<input class="tiny-text" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" size="3" /></p>
		<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_date' )); ?>" />
		<label for="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>"><?php esc_html_e( 'Display post date?' ); ?></label></p>
		<?php
	}
}
