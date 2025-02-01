<?php defined('ABSPATH') || exit; ?>
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

<header class="clearfix fixed-top header-area" id="siteNavbar">
    <div class="container h-100">
      <div class="navigation-bar h-100 align-items-center justify-content-between">
        <div class="logo">
            <?php do_action( 'site_logo' ); ?>
        </div>

        <div class="menu d-none d-lg-block">
          <?php do_action( 'site_desktop_menu' ); ?>
        </div>

        <div class="menu-last-item h-100 d-flex align-items-center justify-content-end">
          <button class="btn btn-primary rounded-0">Get Free Quote</button>
          <?php do_action( 'toggler_button' ) ?>
        </div>
      </div>
    </div>
    <div class="mobile-menu shadow border-bottom d-lg-none" v-if="toggleMenu">
      <div class="container py-3">
        <?php do_action( 'site_mobile_menu' ); ?>
      </div>
    </div>
  </header>
  <div class="header-space"></div>