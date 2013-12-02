<?php 

/* Custom post type fleet */
add_action('init', 'register_fleet');

function register_fleet() 
{
  $labels = array(
    'name' =>'Fleet',
    'singular_name' => 'Plane',
    'add_new' => 'Add a plane',
    'add_new_item' => 'Add a new plane',
    'edit_item' =>'Edit the plane',
    'new_item' => 'New plane',
    'view_item' => 'See the plane',
    'search_items' => 'Search a plane',
    'not_found' => 'No plane',
    'not_found_in_trash' => 'No plane in the trash',
    'parent_item_colon' => '',
    'menu_name' => 'Fleet',

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','author','thumbnail',)
  ); 
  register_post_type('fleet', $args);
}