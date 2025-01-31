<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
        apply_filters( 'ts_google_map', true );
        wp_head();
    ?>
</head>
<body>

    <header class="clearfix header-area text-primary">
        <div class="container">
            <strong>Header: </strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo officia soluta officiis magni vitae reiciendis!
        </div>
    </header>

    <main class="main-area">
        <div class="container">
            <strong>Define Main Area</strong>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo neque odit voluptatem omnis facere impedit!</p>
        </div>
    </main>


    <footer class="clearfix footer-area">
        <div class="copyrigh-area text-center h-100">
            <div class="container h-100">
                <div class="d-flex align-items-center justify-content-center h-100 gap-1">
                    Copyright @2025. All right reserved by <a href="javascript:void(0)" class="text-dark text-decoration-none fw-bold">Techspace</a>
                </div>
            </div>
        </div>
    </footer>
    
    
    <?php wp_footer(); ?>
</body>
</html>