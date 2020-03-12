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

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

  <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory');?>/public/images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory');?>/public/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory');?>/public/images/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?php bloginfo('template_directory');?>/public/images/favicon/site.webmanifest">
  <link rel="mask-icon" href="<?php bloginfo('template_directory');?>/public/images/favicon/safari-pinned-tab.svg" color="#e91486">
  <meta name="msapplication-TileColor" content="#e91486">
  <meta name="theme-color" content="#e91486">

	<?php wp_head(); ?>

</head>



<body <?php body_class(); ?>  itemscope="itemscope" itemtype="http://schema.org/WebPage">

  <?php get_template_part( 'partials/_preloader' ); ?>

  <div class="js-sitewrap site-wrap"> <!-- .body has opacity 0 for fade in effect on load -->

    <header class="site-header">

      <div class="site-branding">
        <?php
        the_custom_logo();
        if ( is_front_page() && is_home() ) :
          ?>
          <h1 class="h4 site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php
        else :
          ?>
          <p class="h4 site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
          <?php
        endif;

          ?>


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