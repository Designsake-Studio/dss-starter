<!DOCTYPE html>
<!--[if lt IE 7]><html class="ie ie6" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9]><html class="ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if (gte IE 10)|!(IE)]><!--><html <?php language_attributes(); ?>><!--<![endif]-->

<head>

	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<title><?php wp_title(' | ', true, 'right'); ?></title>

  <!-- GENERATE FAVICON : https://realfavicongenerator.net/ -->
	<?php wp_head(); ?>

</head>



<body <?php body_class(); ?>  itemscope="itemscope" itemtype="http://schema.org/WebPage">

  <?php get_template_part( 'partials/_preloader' ); ?>

  <div class="js-sitewrap site-wrap"> <!-- .body has opacity 0 for fade in effect on load -->

    <header class="site-header">

      <div class="site-branding">
        <?php
        the_custom_logo();
        if ( is_front_page() && is_home() ) : ?>
          <h1 class="h4 site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php else : ?>
          <p class="h4 site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
        <?php endif; ?>
      </div><!-- .site-branding -->

      <nav id="site-navigation" class="main-navigation">
        <?php
        wp_nav_menu( array(
          'theme_location' => 'main_menu',
          'menu_class' => 'primary-menu',
          'container_class' => 'main-menu',
        ) );
        ?>
      </nav><!-- #site-navigation -->
    </header><!-- #masthead -->

    <main role="main">