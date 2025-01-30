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


    <footer class="clearfix footer-area">
        <div class="copyrigh-area text-center">
            <div class="container">
                Copyright @2025. All right reserved by <a href="javascript:void(0)" class="text-dark text-decoration-none fw-bold">Techspace</a>
            </div>
        </div>
    </footer>
    
    
    <?php wp_footer(); ?>
</body>
</html>