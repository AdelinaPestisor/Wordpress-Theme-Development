<?php
//  theme functions 

//  @package Magnificent

if ( ! function_exists( 'theme_setup' ) ) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     */
    function theme_setup() {
     
        /**
         * Make theme available for translation.
         * Translations can be placed in the /languages/ directory.
         */
        load_theme_textdomain( 'text_domain', get_template_directory() . '/languages' );
     
        /**
         * Add default posts and comments RSS feed links to <head>.
         */
        add_theme_support( 'automatic-feed-links' );
     
        /**
         * Enable support for post thumbnails and featured images.
         */
        add_theme_support( 'post-thumbnails' );

        // add custom logo to navbar
        add_theme_support( 'custom-logo' );
     
        /* Add support for two custom navigation menus.
         */
        register_nav_menus( array(
            'primary'   => __( 'Primary Menu', 'text_domain' ),
            'secondary' => __('Secondary Menu', 'text_domain' )
        ) );
     
        /**
         * Enable support for the following post formats:
         * aside, gallery, quote, image, and video
         */
        add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
    }
} // theme_setup
add_action( 'after_setup_theme', 'theme_setup' );


//add internal scrips an styles - //add external scripts ans styles (ex: bootstrap)
// print_r(get_template_directory_uri());
function magnificent_enqueue_scripts(){
    wp_enqueue_style("bootstrap-css", get_template_directory_uri() . "/modules/css/bootstrap.min.css", [], false, "all" );
    wp_enqueue_style("styles-css", get_stylesheet_uri(), "bootstrap-css", filemtime(get_template_directory() . "/style.css"), "all" );
    

    wp_enqueue_script("mail-js", get_template_directory_uri(). "/assets/main.js", [], filemtime(get_template_directory() . "/main.js"), true);
    wp_enqueue_script("boostrap-js", get_template_directory_uri(). "/modules/js/bootstrap.min.js", ['jquery'], false, true);
}
add_action("wp_enqueue_scripts", "magnificent_enqueue_scripts" );


//add bootstrap navwalker
// Register Custom Navigation Walker 
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // File exists... require it.
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
//widgets registration
function my_sidebares(){
    register_sidebar(
        array(
            'name'=>'footer-widgets',
            'id'=>'footer-sidebar',
            'class'=>'col-4 mx-4 ',
            'before_widget'  => '<li id="%1$s" class="widget %2$s">',
            'after_widget'   => "</li>\n",
            'before_widget'=> '<div class = "col-sm bg-custom-widgets">',
            'after_widget'=>'</div>'
        )  
    );  
}
add_action('widgets_init','my_sidebares');


// iPhone Message Shortcodes
function imsg_shortcode( $atts , $content = null ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'reply' => 'false',
		),
		$atts
	);
	
	// Check if reply and assign the HTML class attribute
	$msgType = (esc_attr($atts['reply']) == 'true') ? 'reply' : 'first';
	
	// Output the HTML code with the shortcode text as the message
	return '<div class="imsg ' . $msgType . '">' . $content . '</div>';
}
add_shortcode( 'imsg', 'imsg_shortcode' );

?>

<!-- add google font -->

<?php 

function wpb_add_google_fonts() {
    wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet', false );
    }
    
    add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );
?>


