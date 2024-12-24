<?php
/**
 * Class that handles specific [vc_gitem_post_excerpt] shortcode.
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

require_once vc_path_dir( 'SHORTCODES_DIR', 'vc-gitem-post-data.php' );

/**
 * Class WPBakeryShortCode_Vc_Gitem_Post_Excerpt
 */
class WPBakeryShortCode_Vc_Gitem_Post_Excerpt extends WPBakeryShortCode_Vc_Gitem_Post_Data {
	/**
	 * Get name.
	 *
	 * @return mixed|string
	 */
	protected function getFileName() {
		return 'vc_gitem_post_data';
	}

	/**
	 * Get data_source attribute value
	 *
	 * @param array $atts - list of shortcode attributes.
	 *
	 * @return string
	 */
	public function getDataSource( array $atts ) {
		return 'post_excerpt';
	}
}