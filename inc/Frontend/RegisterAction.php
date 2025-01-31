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

        add_action( 'site_desktop_menu', [ $this, 'desktop_menu' ] );
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
    
    /**
     * STatic desktop menu
     * 
     * @return void
     */
    public function desktop_menu() {
        $menu_items = [
            'Home'      => home_url('/'),
            'Services'  => home_url('/services'),
            'Portfolio' => home_url('/portfolio'),
            'About'     => home_url('/about'),
            'Blog'      => home_url('/blog'),
            'Contact'   => home_url('/contact'),
        ];
    
        echo '<ul class="d-flex align-items-center justify-content-center gap-1 h-100 list-unstyled p-0 m-0">';
        
        foreach ($menu_items as $label => $url) {
            printf('<li><a href="%s">%s</a></li>', esc_url($url), esc_html($label));
        }
    
        echo '</ul>';
    }    

}