<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php bloginfo('name'); ?> • <?php bloginfo('description'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/foundation.min.css" />
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" />
  <script src="<?php bloginfo('template_url'); ?>/js/vendor/modernizr.js"></script>
  <link rel="apple-touch-icon" href="http://mayfly.link/wordpress/wp-content/uploads/2015/02/apple-icon.png" />
  <meta name="apple-mobile-web-app-capable" content="yes">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap">
    <nav class="tab-bar">
      <section class="left">
        <a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
      </section>

      <section class="middle tab-bar-section">
        <h1 class="title"><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo.svg" alt="<?php bloginfo('name'); ?>"></a></h1>
      </section>

    </nav>

    <aside class="left-off-canvas-menu">
      <ul class="off-canvas-list">
        <li>
          <h3>
          <a href="<?php bloginfo('url'); ?>">
            <img src="<?php bloginfo('template_url'); ?>/img/logo.svg" alt="<?php bloginfo('name'); ?>">
            <?php bloginfo('name'); ?>
          </a>
          </h3>
          <p>One link each 24 hours.<br />And nothing else.</p>
        </li>
        <li><label>...</label></li>
        <li><a href="<?php bloginfo('url'); ?>/about">About</a></li>
        <li><a href="<?php bloginfo('url'); ?>/random">Random Past</a></li>
        <li><a href="http://twitter.com/mayflylink">Twitter Notifications</a></li>
        <li><a href="<?php bloginfo('url'); ?>/wordpress/wp-admin">Login</a></li>
        <?php if(is_user_logged_in()) { ?><li><a href="<?php bloginfo('url'); ?>/new-link">+ New Link </a></li><?php } ?>
      </ul>
    </aside>