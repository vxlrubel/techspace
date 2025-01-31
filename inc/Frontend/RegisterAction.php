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

class RegisterAction{
    
    public function __construct(){
        // site logo
        add_action( 'site_logo', [ $this, 'site_logo' ], 10 );
    }

    /**
     * site logo
     * 
     * @return void
     */
    public function site_logo() {
        printf(
            '<a href="%1$s">
                <img alt="site-logo" class="logo" src="%2$s" />
            </a>',
            esc_url( get_home_url('/') ),
            esc_url( get_template_directory_uri() . '/assets/img/logo-dark.webp' )
        );
    }
    

}