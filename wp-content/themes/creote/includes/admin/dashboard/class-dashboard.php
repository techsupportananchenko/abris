<?php
/*
 ** ==============================
 ** Dashboard
 ** ==============================
 */
class Theme_Admin_Panel{
 
    public function __construct()
    {
        add_action("admin_menu", [$this, "add_admin_menu"]);
        add_action("admin_init", [$this, "register_settings"]);
        add_action( 'admin_notices', [$this,'display_admin_notice']); 
        add_action('template_redirect', [$this , 'check_maintenance_mode']);
        add_action(
            "admin_notices",
            [$this, "display_header_admin_notice"],
            110
        );
        // Add styles and scripts for the admin panel
        add_action("admin_enqueue_scripts", [$this, "creote_admin_scripts"]);  
    }
    
    public function add_admin_menu()
    {
        // Add a top-level menu item with a specific position
        add_menu_page(
            "Creote", // Page title
            "Creote", // Menu title
            "manage_options", // Capability required to access the menu item
            "creote", // Menu slug
            [$this, "render_page"], // Callback function to render the page
            "dashicons-admin-settings", // Icon for the menu item
            2
        );
        // Add subpages
        add_submenu_page(
            "creote",
            "Welcome",
            "Welcome",
            "manage_options",
            "creote",
            [$this, "render_page"],
            0
        ); 
        add_submenu_page(
            "creote",
            "More Themes",
            "More Themes",
            "manage_options",
            "creote-more-themes",
            [$this, "render_our_theme"],
            129
        ); 
    }
    public function enqueue_admin_scripts()
    {
        $screen = get_current_screen();
        if (
            $screen->id === "toplevel_page_creote" ||
            $screen->id === "theme_page_theme-system-status" ||
            $screen->id === "theme_page_theme-options" ||
            $screen->id === "theme_page_theme-plugins"
        ) {
            // Enqueue your CSS and JS files here for styling and functionality of the admin panel
            wp_enqueue_style(
                "admin-panel-style",
                get_template_directory_uri() . "/admin-panel.css"
            );
            wp_enqueue_script(
                "admin-panel-script",
                get_template_directory_uri() . "/admin-panel.js",
                ["jquery"],
                "1.0",
                true
            );
        }
    }
    public function add_single_tabs($tab_activate)
    {
        $navtabs["main"] = [
            "title" => esc_html__("Welcome / Theme Activation", "creote"),
            "link" => "admin.php?page=creote",
        ];
        $navtabs["plugin"] = [
            "title" => esc_html__("Plugins", "creote"),
            "link" => "themes.php?page=install-required-plugins",
        ];
        if (class_exists("OCDI_Plugin")) {
            $navtabs["oneclick"] = [
                "title" => esc_html__("Import Demo Content", "creote"),
                "link" => "themes.php?page=one-click-demo-import",
            ];
        }
        if (class_exists("Creote_Addons")) {
            $navtabs["header"] = [
                "title" => esc_html__("Create Header", "creote"),
                "link" => "edit.php?post_type=header",
            ];
            $navtabs["footer"] = [
                "title" => esc_html__("Create Footer", "creote"),
                "link" => "edit.php?post_type=footer",
            ];
            $navtabs["megamenu"] = [
                "title" => esc_html__("Create Megamenu", "creote"),
                "link" => "edit.php?post_type=mega_menu",
            ];
            $navtabs["themeoptions"] = [
                "title" => esc_html__("Theme Options", "creote"),
                "link" => "admin.php?page=creote-theme-options",
            ];
        }
        $navtabs["ourthemes"] = [
            "title" => esc_html__("Our Themes", "creote"),
            "link" => "admin.php?page=creote-more-themes",
        ];
        ?>
            <div class="nav-tab-wrapper admin_dashboad">
            <?php foreach ($navtabs as $key => $tab) {
                    if ($tab_activate == $key){ ?>
                    <span class="nav-tab nav-tab-active"><?php echo sprintf(__("%s", "creote") , $tab["title"]); ?></span>
                   <?php }else{ ?>
                    <a href="<?php echo esc_url($tab["link"]); ?>" class="nav-tab"><?php echo sprintf(__("%s", "creote") , $tab["title"]); ?></a>
                    <?php
                    }
                } ?>

            </div>
		<?php
    }
    public function render_page()
    {
        $this->add_single_tabs("main");
         
        require_once get_template_directory() .
            "/includes/admin/dashboard/welcome/welcome.php";
    }
    public function render_our_theme()
    {
        $this->add_single_tabs("ourthemes");
        require_once get_template_directory() .
            "/includes/admin/dashboard/ourthemes/outthemes.php";
    }
    
    public function register_settings()
    {
        // Register any settings you need for your theme options
    }
    public function display_header_admin_notice()
    {
        $screen = get_current_screen();
        if (class_exists("Creote_Addons")) {
            // Check if the current screen is the header post type edit screen
            if ($screen && $screen->post_type === "header") {
                $this->add_single_tabs("header");
            }
            // Check if the current screen is the footer post type edit screen
            if ($screen && $screen->post_type === "footer") {
                $this->add_single_tabs("footer");
            }
            // Check if the current screen is the mega_menu post type edit screen
            if ($screen && $screen->post_type === "mega_menu") {
                $this->add_single_tabs("megamenu");
            }
            // Check if the current screen is the theme otpion post type edit screen
            if (
                isset($_GET["page"]) &&
                $_GET["page"] === "creote-theme-options"
            ) {
                $this->add_single_tabs("themeoptions");
            }
        }
        
        if ( $screen->id === 'appearance_page_install-required-plugins' ) {
            $this->add_single_tabs("plugin");
        }
        if (class_exists("OCDI_Plugin")) {
            // Check if the current screen is the one click post type edit screen
            if (
                isset($_GET["page"]) &&
                $_GET["page"] === "one-click-demo-import"
            ) {
                $this->add_single_tabs("oneclick");
            }
        }
    }
    public function check_maintenance_mode() {
        $enable_custom_feature = get_theme_mod('enable_custom_feature', false);
        if ( $enable_custom_feature == true && !current_user_can('manage_options')) {
            include(locate_template('/includes/admin/dashboard/maintenance-mode.php')); 
            exit();
        }
    }
    public function creote_admin_scripts()
    {
        wp_enqueue_style(
            "creote-admin-style",
            get_template_directory_uri() .
                "/includes/admin/dashboard/assets/theme.css",
            [],
            "1.0.0",
            "all"
        );
        wp_enqueue_script(
            "creote-admin",
            get_template_directory_uri() .
                "/includes/admin/dashboard/assets/admin.js",
            ["jquery"],
            "1.0",
            true
        );
    }
    public function display_admin_notice() {
        global $creote_theme_mod;
        $admin_notice_enable = isset( $creote_theme_mod['admin_notice_enable'] ) ? $creote_theme_mod['admin_notice_enable'] : ''; 
        $admin_dashboard_url = admin_url('admin.php?page=creote'); 
        ?>
       <div class="admin-notice admin-notice-creotes notice notice-info is-dismissible <?php if($admin_notice_enable == false): ?> disable_copt_notice <?php  endif; ?>">
        <ul> 
            <li><?php echo esc_html('Before Import Demo Content Check the server configuration here' , 'creote'); ?> <a target="_blank" href="<?php echo esc_url($admin_dashboard_url);?>"><?php echo esc_html('Click here...' , 'creote'); ?></a></li>
            <li><?php echo esc_html('We are here to help you.For any issues please submit your ticket here' , 'creote'); ?> <a target="_blank" href="https://steelthemes.ticksy.com/submit/#100019165"><?php echo esc_html('Get Support' , 'creote'); ?></a></li>
            <li><?php echo esc_html('Looking for creote Documentation' , 'creote'); ?> <a target="_blank" href="https://themepanthers.com/documentation/creote-documentation/"><?php echo esc_html('Click here' , 'creote'); ?></a></li>
                
            </ul>
        <p><?php echo esc_html('Disable this notification totally go to creote -> theme option ->  general settings ->  Disable Admin Notice => Switch Off' , 'creote'); ?></p>
        </div> 
       <?php
    }
    
    // ============================== theme update ============================
    public function ifactivated() {
        $isActivated = get_option('purchase_code') ? true : false; 
        if (!$isActivated) {
            return true;
        } 
        return false;
    }
    public function ifnotactivated() {
        $isActivated = get_option('purchase_code') ? true : false; 
        if (!$isActivated) {
            return false;
        } 
        return true;
    }
  

}

// Create an instance of the admin panel class
new Theme_Admin_Panel();
