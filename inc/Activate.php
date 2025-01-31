<?php
/**
 * Techspace functions and definitions
 *
 * @link https://github.com/vxlrubel/techspace
 * @author Rubel Mahmud
 * @package Techspace
 * @since 1.0
 */

namespace Techspace;

//  directly access denied
defined('ABSPATH') || exit;

class Activate{
    
    public function __construct(){
        // create page
        add_action('after_switch_theme', [ $this, 'create_default_pages' ] );

        // set home and blog pages
        add_action('after_switch_theme', [ $this, 'set_home_and_blog_pages' ] );

        // set permalink
        add_action('after_switch_theme', [ $this, 'set_permalink' ] );
    }

    /**
     * set permalink to post name
     * 
     * @return void
     */
    public function set_permalink() {
        global $wp_rewrite;
        
        // Set permalink structure to "Post name"
        update_option('permalink_structure', '/%postname%/');
    
        // Flush rewrite rules to apply the changes
        $wp_rewrite->flush_rules();
    }
    
    /**
     * set home page and set the blog page when activate the theme.
     * 
     * @return void
     */
    public function set_home_and_blog_pages() {
        $home_page = get_page_by_title('Home');
        $blog_page = get_page_by_title('Blog');
    
        if ($home_page) {
            update_option('page_on_front', $home_page->ID);
            update_option('show_on_front', 'page');
        }
    
        if ($blog_page) {
            update_option('page_for_posts', $blog_page->ID);
        }
    }

    /**
     * create default pages
     * 
     * @return void
     */
    public function create_default_pages() {
        $pages = [
            'Home'      => 'page-home.php',
            'Services'  => 'page-services.php',
            'Portfolio' => 'page-portfolio.php',
            'About'     => 'page-about.php',
            'Blog'      => 'page-blog.php',
            'Contact'   => 'page-contact.php',
        ];
    
        foreach ($pages as $title => $template) {
            if (!get_page_by_title($title)) {
                $page_id = wp_insert_post([
                    'post_title'   => $title,
                    'post_content' => '',
                    'post_status'  => 'publish',
                    'post_type'    => 'page',
                ]);
    
                if ($page_id && !is_wp_error($page_id)) {
                    update_post_meta($page_id, '_wp_page_template', $template);
                }
            }
        }
    }

}