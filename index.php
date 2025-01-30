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


    
    <?php wp_footer(); ?>
</body>
</html>