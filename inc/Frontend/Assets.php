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
    public function __construct(){
        // remove block livrary css
        add_action( 'wp_enqueue_scripts', [$this, 'remove_wp_block_library_css'], 100 );
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
}