<!doctype html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<html>
<head>
  <title><?php

    global $paged;

    // Set empty variable
    $page_title = '';

    // Add page numeral if needed
    if ( $paged > 1 ) {
      $page_title = '&lsaquo; ' . sprintf( __( 'Página %s', 'diahd2014' ), $paged ) . ' |';
    }

    // Add page title
    wp_title( $page_title ? $page_title : '|', true, 'right' );

    // Add sitename
    bloginfo( 'name' );

  ?></title>

  <!-- Set encoding -->
  <meta charset="utf-8">

  <!-- Google Chrome Frame for IE -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <!-- Pingback -->
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

  <!-- Wordpress head -->
  <?php wp_head(); ?>
</head>
<body class="home blog">
  <div id="wrap">

    <div id="header" class="container">
      <!-- Sitename -->
      <div class="pull-left">
        <a href="<?php bloginfo('url'); ?>" rel="home">
          <img src="<?php print get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo( 'description' ); ?>" title="<?php bloginfo( 'description' ); ?>">
        </a>
      </div>

      <!-- Primary Nav -->
      <div class="pull-right">
        <p class="text-right">
          <?php if ( ! is_user_logged_in()  ) : ?>
            <a href="<?php echo wp_login_url(); ?>" class="btn btn-xs btn-success">
              <?php _e('Log in'); ?> <span class="fa fa-arrow-circle-o-right"></span>
            </a>
          <?php else : ?>
            <a href="<?php echo bp_loggedin_user_domain(); ?>" class="btn btn-xs btn-success">
              <span class="fa fa-user"></span> <?php echo bp_core_get_user_displayname( bp_loggedin_user_id() ); ?>
            </a>
          <?php endif?>
        </p>
        <?php diahd2014_primary_nav(); ?>
      </div>
    </div>

    <!-- Jumbotron Welcome -->
    <div class="jumbotron jumbotron-primary">
      <div class="container">
        <p class="pull-left">
          <?php

            if ( is_single() || is_archive() || is_tag() || is_category() ) :

              echo 'Blog';

            elseif ( is_page() ) :

              echo the_title();

            else:

              _e('Bienvenido al Día HD 2014', 'diahd2014');

            endif;

          ?>
        </p>
        <?php if ( ! is_user_logged_in() && ! is_page( bp_get_signup_slug() )  ) : ?>
        <p class="pull-right">
          <a href="<?php echo wp_registration_url(); ?>" class="btn btn-lg btn-default">
            <?php _e('Signup'); ?> <span class="fa fa-arrow-circle-o-right"></span>
          </a>
        </p>
        <?php endif; ?>
      </div>
    </div>

    <?php if ( is_home() ) : ?>
      <?php if ( $lead = get_theme_mod( 'featured_content_lead' ) ) : ?>
      <!-- Lead -->
      <div class="jumbotron jumbotron-lead jumbotron-default">
        <div class="container">
          <p class="text-center">
            <?php echo $lead; ?>
          </p>
        </div>
      </div>
      <?php endif; ?>
    <?php endif; ?>
