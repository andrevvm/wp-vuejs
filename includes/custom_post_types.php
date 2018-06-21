<?php

// Our custom post type function
function vue_custom_post_types() {
 
    register_post_type( 'custom',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Custom Example' ),
                'menu_name' => __( 'Custom' ),
                'singular_name' => __( 'Custom' )
            ),
            'public' => true,
            'has_archive' => true,
            'hierarchical' => false,
            'rewrite' => array('slug' => 'custom', 'with_front' => true),
            'menu_icon' => 'dashicons-book-alt'
        )
    );
    
}

// Hooking up our function to theme setup
add_action( 'init', 'vue_custom_post_types' );

?>