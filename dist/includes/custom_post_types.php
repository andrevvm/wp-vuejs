<?php

// Our custom post type function
function tonal_custom_post_types() {
 
    register_post_type( 'journal',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Journal' ),
                'menu_name' => __( 'Journal' ),
                'singular_name' => __( 'Volume' )
            ),
            'public' => true,
            'has_archive' => true,
            'hierarchical' => false,
            'rewrite' => array('slug' => 'journal', 'with_front' => false),
            'menu_icon' => 'dashicons-book-alt',
            'supports' => array('title', 'revisions', 'custom-fields')
        )
    );

    register_post_type( 'listen',
        // CPT Options
        array(
            
            'labels' => array(
                'name' => __( 'Listen' ),
                'singular_name' => __( 'Listen' )
            ),

            'capabilities' => array(
                'create_posts' => 'do_not_allow',
              ),

            
            'public' => true,
            'has_archive' => true,
            'hierarchical' => false,
            'rewrite' => array('slug' => 'listen'),
            'menu_icon' => 'dashicons-controls-volumeon',
            'supports' => array('title', 'revisions', 'custom-fields'),
            'capability_type' => array('listen','listens'),
            'map_meta_cap' => true,
        )
    );

    register_post_type( 'shop',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Shop' ),
                'menu_name' => __( 'Shop' ),
                'singular_name' => __( 'Volume' )
            ),
            'public' => true,
            'has_archive' => true,
            'hierarchical' => false,
            'rewrite' => array('slug' => 'shop'),
            'menu_icon' => 'dashicons-cart',
            'supports' => array('title', 'revisions', 'custom-fields')
        )
    );    
    
}

// Hooking up our function to theme setup
add_action( 'init', 'tonal_custom_post_types' );

add_action( 'init', 'add_listen_caps');
function add_listen_caps() {
      $role = get_role( 'administrator' );

      $role->add_cap( 'edit_listen' ); 
      $role->add_cap( 'edit_listens' ); 
      $role->add_cap( 'edit_others_listens' ); 
      $role->remove_cap( 'publish_listens' ); 
      $role->add_cap( 'read_listen' ); 
      $role->add_cap( 'read_private_listens' ); 
      //$role->add_cap( 'delete_listen' ); 
      $role->add_cap( 'edit_published_listens' );
      //$role->add_cap( 'delete_published_listens' );
}

?>