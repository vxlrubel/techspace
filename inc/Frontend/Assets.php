<?php
/**
 * Techspace functions and definitions
 *
 * @link https://github.com/vxlrubel/techspace
 * @author Rubel Mahmud
 * @package Techspace
 * @since 1.0
 */

namespace Techspace\Frontend;
//  directly access denied
defined('ABSPATH') || exit;

class Assets{

    // stylesheet directory
    private $style_directory = 'css/';

    // scripts directory
    private $script_directory = 'js/';
    
    public function __construct(){
        // remove block livrary css
        add_action( 'wp_enqueue_scripts', [$this, 'remove_wp_block_library_css'], 100 );

        // register stylesheets
        add_action( 'wp_enqueue_scripts', [ $this, 'register_stylesheets' ] );

        // register scripts
        add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );

    }

    /**
     * remove unnecessary block livrary style.
     * @return void
     */
    public function remove_wp_block_library_css(){
        wp_dequeue_style('wp-block-library'); 
        wp_dequeue_style('wp-block-library-theme'); 
        wp_dequeue_style('global-styles');
    }
    
    /**
     * register scripts
     *
     * @return void
     */
    public function register_scripts(){
        $get_scripts = $this->get_scripts();

        foreach ( $get_scripts as $handle => $script ){
            wp_enqueue_script(
                $handle,
                $script['src'],
                $script['deps'],
                TS_THEME_VERSION,
                true
            );
        }

        $args = [
            'ajax_url' => admin_url( 'admin-ajax.php' )
        ];
        
        wp_localize_script( 'ts-script', 'TS', $args );
    }

    /**
     * register stylesheets
     *
     * @return void
     */
    public function register_stylesheets(){
        $get_style = $this->get_styles();

        foreach ( $get_style as $handle => $style ){
            $deps = isset( $style['deps'] ) ? $style['deps'] : '';
            wp_enqueue_style(
                $handle,
                $style['src'],
                $deps,
                TS_THEME_VERSION,
                'all'
            );
        }
    }

     /**
     * get the stylesheets
     *
     * @return $stylesheets
     */
    public function get_styles(){
        $stylesheets = [
            'bootstrap' => [
                'src' => TS_ASSETS . $this->style_directory . 'bootstrap.min.css'
            ],
            'ts-main-style' => [
                'src' => TS_ASSETS . $this->style_directory . 'main.css'
            ],
            'ts-style' => [
                'src' => get_stylesheet_uri()
            ]
        ];

        $stylesheets = apply_filters( 'ts_style', $stylesheets );

        return $stylesheets;
    }

    /**
     * get scripts
     *
     * @return void
     */
    public function get_scripts(){
        $scripts = [
            'bootstrap' => [
                'src'  => TS_ASSETS . $this->script_directory . 'bootstrap.bundle.min.js',
                'deps' => []
            ],
            'vuejs' => [
                'src'  => TS_ASSETS . $this->script_directory . 'vue.global.prod.js',
                'deps' => ['bootstrap']
            ],
            'ts-script' => [
                'src'  => TS_ASSETS . $this->script_directory . 'custom.js',
                'deps' => ['vuejs']
            ]
        ];

        $scripts = apply_filters( 'ts_scripts', $scripts );
        
        return $scripts;
    }

}