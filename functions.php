<?php
/**
 * Techspace functions and definitions
 *
 * @link https://github.com/vxlrubel/techspace
 * @author Rubel Mahmud
 * @package Techspace
 * @since 1.0
 */

//  directly access denied
 defined('ABSPATH') || exit;

 use Techspace\Frontend\Assets;
// Load Composer autoloader
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}


final class Techspace{


    // instance of the class
    private static $instance;

    // theme version
    public static $version = '1.0';
    
    public function __construct(){
        $this->define_constant();

        // initiate only for frontend1
        if( !is_admin() ){
            add_action( 'wp', [ $this, 'initiate_for_frontend' ] );
            add_action( 'init', [ $this, 'remove_emoji_styles'] );
        }

        // theme setup
        add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );

    }

    /**
     * theme setup
     * 
     * @return void
     */
    public function setup_theme(){
        
        // Enable title tag support
        add_theme_support( 'title-tag' );

        // Enable post thumbnails
        add_theme_support( 'post-thumbnails' );

        // Enable custom logo
        add_theme_support( 'custom-logo', [
            'height'      => 28,
            'width'       => 120,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => [ 'site-title', 'site-description' ]
        ] );

        // Enable HTML5 markup support
        add_theme_support( 'html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ] );

        // Enable custom background
        add_theme_support( 'custom-background', [
            'default-color' => 'ffffff',
            'default-image' => '',
        ] );

        // Enable custom header
        add_theme_support( 'custom-header', [
            'default-image'      => '',
            'default-text-color' => '#444444',
            'width'              => 1200,
            'height'             => 400,
            'flex-width'         => true,
            'flex-height'        => true,
        ] );

        // Enable automatic feed links
        add_theme_support( 'automatic-feed-links' );

        // Enable wide and full alignment support
        add_theme_support( 'align-wide' );

        // Enable editor styles
        add_theme_support( 'editor-styles' );
        add_editor_style( 'editor-style.css' );

        // Enable responsive embeds
        add_theme_support( 'responsive-embeds' );
    }
    
    /**
     * remove the emoji style from frontend.
     * 
     * @return void
     */
    public function remove_emoji_styles() {
        remove_action('wp_head', 'wp_print_styles');
        remove_action('wp_head', 'wp_print_head_scripts');
        remove_action('wp_footer', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
    }
    
    /**
     * initiate the frontend script only.
     * 
     * @return void
     */
    public function initiate_for_frontend(){
        new Assets;
    }

    /**
     * define some default constant
     * @return void
     */
    public function define_constant(){
        define( 'TS_THEME_VERSION', self::$version );
        define( 'TS_THEME_DIR', trailingslashit( get_template_directory() ) );
        define( 'TS_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
        define( 'TS_ASSETS', trailingslashit( TS_THEME_URI . 'assets' ) );
        define( 'TS_ASSETS_ADMIN', trailingslashit( TS_ASSETS . 'admin' ) );
    }

    /**
     * create a new instance
     *
     * @return void
     */
    public static function init(){
        if( is_null( self::$instance ) ){
            self::$instance = new self();
        }

        return self::$instance;
    }
}

function techspace(){
    return Techspace::init();
}
techspace();
