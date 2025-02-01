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

        // add desktop menu
        add_action( 'site_desktop_menu', [ $this, 'desktop_menu' ] );

        // add 404 page content
        add_action( 'page_404', [ $this, 'page_404' ] );
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
    
        // Get the current requested URL path
        $current_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    
        echo '<ul class="d-flex align-items-center justify-content-center gap-1 h-100 list-unstyled p-0 m-0">';
        
        foreach ($menu_items as $label => $url) {

            $menu_path    = trim(parse_url($url, PHP_URL_PATH), '/');
            $active_class = ($current_path === $menu_path) ? ' class="active"' : '';
    
            printf('<li%s><a href="%s">%s</a></li>', $active_class, esc_url($url), esc_html($label));
        }

        echo '</ul>';
    }
    
    

    /**
     * create content for not found page or 404 page
     * 
     * @return void
     */
    public function page_404(){ ?>
        <div class="page-not-found">
            <div class="error-page">
                <span>4</span>
                <span>0</span>
                <span>4</span>
            </div>
            <div>
                <span class="d-block fs-2 text-uppercase title">Page not found</span>
                <span class="short-description">The requested URL was not found on this server.</span>
            </div>
            <div>
                <a href="<?php echo esc_url( home_url( '/' ) );?>" class="btn btn-primary rounded-0 px-3 visit-home-page">Visit Home Page</a>
            </div>
        </div>
    <?php }

}