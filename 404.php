<?php

// directly access denied
defined('ABSPATH') || exit;

get_header(); ?>
<main class="main-area" id="mainContent">
    <div class="container h-100">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <?php do_action( 'page_404' ); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>