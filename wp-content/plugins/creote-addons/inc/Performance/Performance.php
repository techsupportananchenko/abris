<?php  
defined( 'ABSPATH' ) || exit;
class Performance{ 
	public static $instance;  
    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }
	/**
    * Instantiate the object.
    *
    * @since 1.0.0
    *
    * @return void
    */
    public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'performance_dequeue_style' ) );
		add_action( 'init', array( $this, 'performance_elementor_google_fonts' ) );    
		add_action( 'elementor/frontend/after_register_styles', array( $this, 'performance_elementor_font_awesome' ) ); 
        add_action( 'init', array( $this, 'performance_query_strings' ) );
		add_action( 'init', array( $this, 'performance_emoji' ) ); 
	} 
    /**
    * Remove 
    *
    * @since 1.0.0 
    */
    public function performance_dequeue_style($scripts) { 
        $disable_icons = get_addons_creote_option('disable_icons');
        $disable_animation = get_addons_creote_option('disable_animation');
        $disable_wp_block_library = get_addons_creote_option('disable_wp_block_library');
        $disable_migrate_jquery = get_addons_creote_option('disable_migrate_jquery'); 
		if($disable_icons == true) {
			wp_deregister_style( 'elementor-icons' );
		} 
		if($disable_animation == true) {
			wp_deregister_style( 'elementor-animations' );
		}
        if($disable_wp_block_library == true){
            wp_dequeue_style( 'wp-block-library' );
        }
        if ($disable_migrate_jquery == true && ! is_admin() && ! empty( $scripts->registered['jquery'])) {
			$scripts->registered['jquery']->deps = array_diff(
				$scripts->registered['jquery']->deps,
				array( 'jquery-migrate' )
			);
		}
        $disable_elementor_editor_script = get_addons_creote_option('disable_elementor_editor_script');
		if ($disable_elementor_editor_script == true && is_front_page() && ! is_user_logged_in() ) {
			wp_dequeue_script( 'elementor-common-modules' );
			wp_dequeue_script( 'elementor-app-loader' );
			wp_dequeue_script( 'jquery-ui-draggable' );
			wp_dequeue_script( 'backbone-marionette' );
			wp_dequeue_script( 'elementor-dialog' );
			wp_dequeue_script( 'elementor-common' );
			wp_dequeue_script( 'backbone-radio' );
			wp_dequeue_script( 'elementor-app' );
		}
        $disable_elementor_pro = get_addons_creote_option('disable_elementor_pro');
		if ($disable_elementor_pro == true && defined( 'ELEMENTOR_PRO_URL' ) ) {
			wp_deregister_script( 'elementor-pro-frontend' );
		}
	} 
    /**
    * Remove 
	*
    * @since 1.0.0 
	*/
    public function performance_query_strings_split( $src ) {
		$output = preg_split( '/(&ver|\?ver)/', $src );

		return $output[0];
	} 
	public function performance_query_strings() { 
        $disable_query_strings = get_addons_creote_option('disable_query_strings');
		if ($disable_query_strings == true && ! is_admin() ) {
			add_filter( 'script_loader_src', array( $this, 'performance_query_strings_split' ), 15 );
			add_filter( 'style_loader_src', array( $this, 'performance_query_strings_split' ), 15 );
		}
	} 
   /**
    * Remove 
	*
    * @since 1.0.0 
	*/
	public function performance_emoji() {
        $disable_emoji = get_addons_creote_option('disable_emoji');
		if ($disable_emoji == true) {
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
			remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' ); 
			remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
			remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
			remove_action( 'admin_print_styles', 'print_emoji_styles' );
            remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		}
	}
	/**
    * Remove 
	*
    * @since 1.0.0 
	*/
	public function performance_elementor_google_fonts() {
        $disable_google_fonts = get_addons_creote_option('disable_google_fonts');
		if ($disable_google_fonts == true) {
			add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );
		}
	}
    /**
    * Remove 
	*
    * @since 1.0.0 
	*/
    public function performance_elementor_font_awesome() {
        $disable_font_awesome = get_addons_creote_option('disable_font_awesome');
		if ($disable_font_awesome == true) {
			foreach ( array( 'solid', 'regular', 'brands' ) as $style ) {
				wp_deregister_style( 'elementor-icons-fa-' . $style );
			}
		}
	}
   
   
} 

new Performance();