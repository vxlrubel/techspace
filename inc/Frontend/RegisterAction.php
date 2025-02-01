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
    
    public $menu_items = [];
    
    public function __construct(){

        // menu items
        $this->menu_items = [
            'Home'      => home_url('/'),
            'Services'  => home_url('/services'),
            'Portfolio' => home_url('/portfolio'),
            'About'     => home_url('/about'),
            'Blog'      => home_url('/blog'),
            'Contact'   => home_url('/contact'),
        ];

        // site logo
        add_action( 'site_logo', [ $this, 'site_logo' ], 10 );

        // add desktop menu
        add_action( 'site_desktop_menu', [ $this, 'desktop_menu' ] );

        // add mobile menu
        add_action( 'site_mobile_menu', [ $this, 'mobile_menu' ] );

        // add 404 page content
        add_action( 'page_404', [ $this, 'page_404' ] );

        // toggler button
        add_action( 'toggler_button', [ $this, 'toggler_button' ] );
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
    
        // Get the current requested URL path
        $current_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    
        echo '<ul class="d-flex align-items-center justify-content-center gap-1 h-100 list-unstyled p-0 m-0">';
        
        foreach ( $this->menu_items as $label => $url ) {

            $menu_path    = trim(parse_url($url, PHP_URL_PATH), '/');
            $active_class = ($current_path === $menu_path) ? ' class="active"' : '';
    
            printf('<li%s><a href="%s">%s</a></li>', $active_class, esc_url($url), esc_html($label));
        }

        echo '</ul>';
    }

    /**
     * STatic mobile menu
     * 
     * @return void
     */
    public function mobile_menu() {
    
        // Get the current requested URL path
        $current_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    
        echo '<ul class="p-0 m-0 list-unstyled">';
        
        foreach ( $this->menu_items as $label => $url ) {

            $menu_path    = trim(parse_url($url, PHP_URL_PATH), '/');
            $active_class = ($current_path === $menu_path) ? ' class="active"' : '';
            printf('<li%s><a href="%s" class="text-dark text-decoration-none py-2 d-block px-3">%s</a></li>', $active_class, esc_url($url), esc_html($label));
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

    /**
     * Create the toggler button for manage mobile menu toggler
     * 
     * @return void
     */
    public function toggler_button(){ ?>
        <button
            class="btn btn-primary d-lg-none toggle-menu-button d-inline-flex align-items-center justify-content-center p-1 rounded-0"
            @click.stop.prevent="toggleMenu = !toggleMenu"
            >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                height="24px"
                viewBox="0 -960 960 960"
                width="24px"
                fill="currentColor"
                v-if="!toggleMenu"
            >
                <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
            </svg>
            <svg
                xmlns="http://www.w3.org/2000/svg"
                height="24px"
                viewBox="0 -960 960 960"
                width="24px"
                fill="currentColor"
                v-else
            >
                <path
                d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"
                />
            </svg>
        </button>
    <?php }

}