<?php

  // Allow from any origin
  if (isset($_SERVER['HTTP_ORIGIN'])) {
      header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
      header('Access-Control-Allow-Credentials: true');
      header('Access-Control-Max-Age: 86400');    // cache for 1 day
  }

  function return_json() {

    if(isset($_GET["json"])):
      if ($_GET["json"] == true):

        wp_send_json( array( 'success' => true, 'result' => get_post_data() ) );

      endif;
    endif;

  }
  add_action( 'wp', 'return_json' );

  function get_post_data() {

    global $post;

    $postslist = new stdClass();

    //Collect current posts, with ACF

    while ( have_posts() ) : 

      the_post();

      $postslist->posts[] = json_api_add_acf($post);

    endwhile;

    //Collect all posts, without ACF
    $types = get_post_types(['public' => true]);

    $args = array(
        'post_type'  => $types,
        'posts_per_page' => get_option( 'posts_per_page' ),
        'offset' => get_query_var('paged')
    );

    //Get ACF options
    // if(function_exists('get_field')) {
    //   $options['option_key'] = get_field('option_key', 'option');
    //   $postslist->options = $options;
    // }

    //$postslist->all_posts = get_posts($args);
    
    return $postslist;
  }
   
  function json_api_add_acf($post) 
  {
    if(!$post)
      return;

      if($post->post_content) {
        $post->post_content = wpautop($post->post_content);
      }
      //Fetch ACF data
      if(function_exists('get_fields')) {
        $post->acf = get_fields($post->id);
      }
      return $post;
  }

?>