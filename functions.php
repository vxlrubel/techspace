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