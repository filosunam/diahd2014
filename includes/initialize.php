<?php

  // Initialize!
  add_action( 'after_setup_theme', 'diahd2014_init', 1 );

  // After setup theme
  function diahd2014_init() {

    // Head cleanup
    add_action('init', 'diahd2014_head_cleanup');

    // Scripts and styles
    add_action( 'wp_enqueue_scripts', 'diahd2014_assets', 999 );

    // Theme support
    add_action( 'after_setup_theme', 'diahd2014_theme_support' );

    // Add sidebars
    add_action( 'widgets_init', 'diahd2014_register_sidebars' );

    // Flush rewrite rules for custom post types
    add_action( 'after_switch_theme', 'diahd2014_flush_rewrite_rules' );

    // Add support to post thumbnails
    add_theme_support( 'post-thumbnails' );

  }

  // Enqueue assets for the frontend
  function diahd2014_assets() {

    if ( ! is_admin () ) {

      // Asset format (css and js files)
      $asset = get_stylesheet_directory_uri() . '/built/%2$s/%1$s.%2$s';

      // Register main styles
      wp_register_style( 'diahd2014_style', sprintf( $asset, 'styles', 'css' ) );

      // Enqueue main styles
      wp_enqueue_style( 'diahd2014_style' );


      // Register bootstrap scripts
      wp_register_script( 'bootstrap', get_stylesheet_directory_uri() . '/bower_components/bootstrap/dist/js/bootstrap.min.js', array( 'jquery' ), false, true );
      // Register main scripts
      wp_register_script( 'diahd2014_script', sprintf( $asset, 'main.min', 'js' ), array( 'jquery', 'bootstrap' ), false, true );

      // Enqueue bootstrap scripts
      wp_enqueue_script( 'bootstrap' );
      // Enqueue main scripts
      wp_enqueue_script( 'diahd2014_script' );

    }

  }

  // Hook for theme support
  function diahd2014_theme_support() {

    // Add menus support
    add_theme_support( 'menus' );

    // Register primary menu
    register_nav_menus( array( 'primary' => __('Primario', 'diahd2014') ) );

    // Register secondary menu
    register_nav_menus( array( 'secondary' => __('Secundario', 'diahd2014') ) );

  }

  // Hook for clean head
  function diahd2014_head_cleanup(){

    // Rsd link
    remove_action( 'wp_head', 'rsd_link' );
    // Windows live writer
    remove_action( 'wp_head', 'wlwmanifest_link' );
    // Index link
    remove_action( 'wp_head', 'index_rel_link' );
    // Previous link
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
    // Start link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
    // Links for adjacent posts
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    // WP version
    remove_action( 'wp_head', 'wp_generator' );

  }

  // Hook for flush rewrite rules
  function diahd2014_flush_rewrite_rules() {
    flush_rewrite_rules();
  }

?>
