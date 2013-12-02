<?php 

/* Custom post type slider */
add_action('init', 'register_push');

function register_push() 
{
  $labels = array(
    'name' =>'Push',
    'singular_name' => 'Push',
    'add_new' => 'Add a push',
    'add_new_item' => 'Add a new push',
    'edit_item' =>'Edit the push',
    'new_item' => 'New push',
    'view_item' => 'See the push',
    'search_items' => 'Search a push',
    'not_found' => 'No push',
    'not_found_in_trash' => 'No push in the trash',
    'parent_item_colon' => '',
    'menu_name' => 'Push',

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
  register_post_type('push', $args);
}