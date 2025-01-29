<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
        echo apply_filters( 'ts_google_map', true );
        wp_head();
    ?>
</head>
<body>

    <div class="text-primary">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis, accusamus facere nulla ut odio molestias?</div>
    
    <?php wp_footer(); ?>
</body>
</html>