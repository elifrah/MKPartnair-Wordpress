<?php 

/* Custom post type flash */
add_action('init', 'register_flash');

function register_flash() 
{
  $labels = array(
    'name' =>'Flash',
    'singular_name' => 'FLash',
    'add_new' => 'Add a flash',
    'add_new_item' => 'Add a new flash',
    'edit_item' =>'Edit the flash',
    'new_item' => 'New flash',
    'view_item' => 'See the flash',
    'search_items' => 'Search a flash',
    'not_found' => 'No flash',
    'not_found_in_trash' => 'No flash in the trash',
    'parent_item_colon' => '',
    'menu_name' => 'Flash',

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
  register_post_type('flash', $args);
}