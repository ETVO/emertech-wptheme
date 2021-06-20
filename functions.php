<?php
/**
 * Theme functions and definitions
 * 
 * @package Emertech WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( "ABSPATH" ) ) {
	exit;
}

// Core constants 
define( "EMERTECH_THEME_DIR", get_template_directory());
define( "EMERTECH_THEME_URI", get_template_directory_uri());
define( "EMERTECH_THEME_CLASS", "Emertech_Theme" );

/**
 * Emertech Theme class
 */
final class Emertech_Theme {

    /**
     * Main theme class constructor
     * 
     * @since   1.0
     */
    public function __construct() {

        // Define theme constants
        $this->emertech_constants();

        // Load theme function files
        $this->emertech_setup();

		// Load theme classes
		add_action( "after_setup_theme", array( EMERTECH_THEME_CLASS, "classes" ), 4 );
            
        // Setup theme (theme support, nav menus, etc.)
        add_action( "after_setup_theme", array( EMERTECH_THEME_CLASS, "theme_setup" ) );

        if(is_admin()) {
            add_action( "admin_enqueue_scripts", array( EMERTECH_THEME_CLASS, "theme_admin_css" ) );
            add_action( "admin_enqueue_scripts", array( EMERTECH_THEME_CLASS, "theme_admin_js" ) );
        }   
        else {
            add_action( "login_enqueue_scripts", array(EMERTECH_THEME_CLASS, "emertech_login_style" ) );
            add_action( "wp_enqueue_scripts", array( EMERTECH_THEME_CLASS, "theme_css" ) );
            add_action( "wp_enqueue_scripts", array( EMERTECH_THEME_CLASS, "theme_js" ) );
            add_action( "wp_enqueue_scripts", array( EMERTECH_THEME_CLASS, "theme_fonts" ) );
        }

        add_action( "wp_head", array(EMERTECH_THEME_CLASS, "head_code" ));
        
        // Add action to make custom query before loading posts
        add_action( 'pre_get_posts', array(EMERTECH_THEME_CLASS, 'set_query_params') );
    }

    /**
     * Defining theme constants
	 *
	 * @since   1.0
     */
    public static function emertech_constants() {

        $version = self::theme_version();

        define( "EMERTECH_THEME_VERSION", $version);

        // JavaScript and CSS paths
        define( "EMERTECH_JS_DIR_URI", EMERTECH_THEME_URI . "/assets/js/" );
        define( "EMERTECH_CSS_DIR_URI", EMERTECH_THEME_URI . "/assets/css/" );

        // Images path
        define( "EMERTECH_IMG_DIR_URI", EMERTECH_THEME_URI . "/assets/img/" );

        // Fonts path
        define( "EMERTECH_FONT_DIR_URI", EMERTECH_THEME_URI . "/assets/fonts/" );

		// Include Paths.
		define( "EMERTECH_INC_DIR", EMERTECH_THEME_DIR . "/inc/" );
		define( "EMERTECH_INC_DIR_URI", EMERTECH_THEME_URI . "/inc/" );
    }

    /**
     * Load all theme functions
	 *
	 * @since   1.0
     */
    public static function emertech_setup() {
        
        // Path of include directory
        $dir = EMERTECH_INC_DIR;

        require_once $dir . "walker/menu-walker.php";
		require_once $dir . "customizer/customizer.php";
    }

    /**
     * Setup theme
	 *
	 * @since   1.0
     */
    public static function theme_setup() {
        // Let WordPress handle Title Tag
        add_theme_support( "title-tag");

		/**
		 * Enable support for site logo
		 */
		add_theme_support(
			"custom-logo",
			apply_filters(
				"ocean_custom_logo_args",
				array(
					"height"      => 90,
					"width"       => 209,
					"flex-height" => true,
					"flex-width"  => true,
				)
			)
		);

        // Register navigation menus.
		register_nav_menus(
			array(
				"topbar_menu" => esc_html__( "Top Bar", "emertech" ),
				"main_menu"   => esc_html__( "Main", "emertech" ),
				"footer_menu" => esc_html__( "Footer", "emertech" ),
				"mobile_menu" => esc_html__( "Mobile (optional)", "emertech" ),
			)
		);

		// Enable support for Post Formats.
		add_theme_support( 'post-formats', array( 'video', 'gallery', 'audio', 'quote', 'link' ) );

		// Enable support for <title> tag.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );
        
        // Add different image predefined sizes (NOT BEING USED A.T.M.)
        // add_image_size( "post-thumbnail", 300, 225, true);
        // add_image_size( "post-single", 600, 450, true);

		/*
		 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'widgets',
			)
		);
        
        add_shortcode( 'year', [EMERTECH_THEME_CLASS, 'get_current_year'] );
    }

    /**
     * Customize admin login page
	 *
	 * @since   1.0
     */
    public static function emertech_login_style() {

        // Setup constants
        $dir = EMERTECH_CSS_DIR_URI;
        $theme_version = EMERTECH_THEME_VERSION;

        // Adding logo to login header
        ?>
           <style>
            #login h1 a, .login h1 a {
                background-image: url('<?php echo EMERTECH_IMG_DIR_URI; ?>emertech-login-logo.png');
            }
           </style> 
        <?php

        // Enqueue custom style
        wp_enqueue_style( "emertech-login-style", $dir . "login.css", false, $theme_version);

        // Add filters 
        add_filter( "login_headerurl", array(EMERTECH_THEME_CLASS, "emertech_login_logo_url") );
        add_filter( "login_headertitle", array(EMERTECH_THEME_CLASS, "emertech_login_logo_url_title") );
    }

    /** 
     * Filter function to set URL in Login page logo
	 *
	 * @since   1.0
     */
    public static function emertech_login_logo_url() {
        return home_url();
    }
    
    /**
     * Filter function to set title in Login page logo
	 *
	 * @since   1.0
     */
    public static function emertech_login_logo_url_title() {
        return get_bloginfo( "name" );
    }

    /**
     * Enqueue theme CSS
	 *
	 * @since   1.0
     */
    public static function theme_css() {

        // Get CSS directory URI
        $dir = EMERTECH_CSS_DIR_URI;

		// Get current theme version
        $theme_version = EMERTECH_THEME_VERSION;
        
		wp_deregister_style( "fontawesome" );
		wp_deregister_style( "font-awesome" );

		// Load fonts stylesheets
		// wp_enqueue_style( "fontawesome", EMERTECH_FONT_DIR_URI . "/fontawesome/css/all.min.css", false, "5.15.1" );
		wp_enqueue_style( "bootstrap-icons", EMERTECH_FONT_DIR_URI . "/bootstrap-icons/bootstrap-icons.css", false, "5.0.0" );
        
        // Register Custom Bootstrap  
        wp_enqueue_style( "emertech-custom-bs", $dir . "custom-bs.css", false, $theme_version);

        // Register Emertech Theme main style 
        wp_enqueue_style( "emertech-style", $dir . "style.css", false, $theme_version);

    }

    /**
     * Enqueue theme JS
	 *
	 * @since   1.0
     */
    public static function theme_js() {
        
		// Get JS directory URI
		$dir = EMERTECH_JS_DIR_URI;

		// Get current theme version
		$theme_version = EMERTECH_THEME_VERSION;
        
		// Register theme script
		wp_enqueue_script( "emertech-script", $dir . "app.js", array( "jquery"), $theme_version, true);
        
		// Register bootstrap script
		wp_enqueue_script( "bootstrap", $dir . "third/bootstrap.min.js", array( "jquery"), $theme_version, true);
    }

    /**
     * Enqueue theme admin CSS
	 *
	 * @since   1.0
     */
    public static function theme_admin_css() {

        // Get CSS directory URI
        $dir = EMERTECH_CSS_DIR_URI;

		// Get current theme version
        $theme_version = EMERTECH_THEME_VERSION;
        
		wp_deregister_style( "fontawesome" );
		wp_deregister_style( "font-awesome" );

		// Load font awesome style
		// wp_enqueue_style( "fontawesome", EMERTECH_FONT_DIR_URI . "/fontawesome/css/all.min.css", false, "5.15.1" );
		wp_enqueue_style( "bootstrap-icons", EMERTECH_FONT_DIR_URI . "/bootstrap-icons/bootstrap-icons.css", false, "5.0.0" );
        
        // Register Custom Bootstrap  
        // wp_enqueue_style( "emertech-admin-bootstrap-style", $dir . "admin-bs.css", false, $theme_version);

    }

    /**
     * Enqueue theme admin JS
     * 
     * @since 1.0
     */
    public static function theme_admin_js() {
        
		// Get JS directory URI
		$dir = EMERTECH_JS_DIR_URI;

		// Get current theme version
		$theme_version = EMERTECH_THEME_VERSION;
        
		// Register admin script
		// wp_enqueue_script( "emertech-script", $dir . "app.js", array( "jquery"), $theme_version, true);
    }

    /**
     * Enqueue theme fonts
	 *
	 * @since   1.0
     */
    public static function theme_fonts() {

        // Get fonts directory URI
        $dir = EMERTECH_FONT_DIR_URI;

		// Get current theme version.
		$theme_version = EMERTECH_THEME_VERSION;
        
        // Register Emertech Theme fonts
        wp_enqueue_style( "emertech-font-proxnova", $dir . "proxima_nova_a/font.css", false, $theme_version);
        wp_enqueue_style( "emertech-font-gotham", $dir . "gotham/font.css", false, $theme_version);
    }

    /**
     * Code to be inserted in WP head
	 *
	 * @since 1.0
     */
    public static function head_code() {
    }

    /**
     * Load theme classes
     *
     * @return void
	 * @since   2.0
     */
    public static function classes() {
        
        // Path of include directory
        $dir = EMERTECH_INC_DIR;

        require_once $dir . "third/kirki-installer-section.php";
    }

    /**
     * Set query params for blog page by using the GET params
     *
     * @param [array] $query
	 * @since   3.0
     */
    function set_query_params( $query ) {
	
        if( $query->is_main_query() 
        && !$query->is_feed() ) {
        
            if(isset($_GET['category'])) {
                $category = $_GET['category'];
                $query->set( 'category_name', $category );
            }
        }
    }

    /**
     * Get current year function for shortcode
     *
     * @param [array] $attr
     * @return integer
	 * @since   2.0
     */
    public function get_current_year($attr) {
        return date('Y');
    }

	/**
	 * Returns active theme version
	 *
	 * @since   1.0
	 */
	public static function theme_version() {

		// Get theme data.
		$theme = wp_get_theme();

		// Return theme version.
		return $theme->get( "Version" );

	}
}

new Emertech_Theme();