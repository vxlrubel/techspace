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
        }
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
        define( 'TS_THEME_VERSION', '1.0' );
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