<?php

  add_theme_support( 'title-tag' );
  add_action('admin_bar_init', 'remove_admin_login_header');
  function remove_admin_login_header() {
  remove_action('wp_head', '_admin_bar_bump_cb');
  }

  remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
  remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
  remove_action( 'admin_print_styles', 'print_emoji_styles' );

  require_once('includes/post_json.php');
  require_once('includes/custom_post_types.php');

  // Load scripts
  function load_vue_scripts() {
    vue_load_style('app.css', 'dist/css/app.css', false, null);
    vue_load_script('manifest.js', 'dist/js/manifest.js', true);
    vue_load_script('vendor.js', 'dist/js/vendor.js', true);
    vue_load_script('app.js', 'dist/js/app.js', true);
  }

  function vue_load_style($name, $filepath) {
    if(file_exists(get_template_directory() . $filepath))
      wp_enqueue_style($name, get_theme_file_uri( $filepath ), array(), filemtime(get_template_directory() . $filepath), false );
  }

  function vue_load_script($name, $filepath, $footer) {
    if(file_exists(get_template_directory() . $filepath))
      wp_enqueue_script( $name, get_theme_file_uri( $filepath ), array(), filemtime(get_template_directory() . $filepath), $footer );
  }

  add_action('wp_enqueue_scripts', 'load_vue_scripts', 100);

  // Update CSS within in Admin
  function admin_style() {
    wp_enqueue_style('admin-styles', get_template_directory_uri().'/admin.css');
  }
  
  add_action('admin_enqueue_scripts', 'admin_style');

?>