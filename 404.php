<?php

// directly access denied
defined('ABSPATH') || exit;

get_header(); ?>
<main class="main-area" id="mainContent">
    <div class="container h-100">
        <div class="h-100 d-flex align-items-center justify-content-center">
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
        </div>
    </div>
</main>
<?php get_footer(); ?>