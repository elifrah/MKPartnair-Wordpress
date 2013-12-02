<?php 

/* Custom post type advantage */
add_action('init', 'register_testimonies');

function register_testimonies() 
{
  $labels = array(
    'name' =>'testimonies',
    'singular_name' => 'Testimonies',
    'add_new' => 'Add an testimony',
    'add_new_item' => 'Add a new testimony',
    'edit_item' =>'Edit the testimony',
    'new_item' => 'New testimony',
    'view_item' => 'See the testimony',
    'search_items' => 'Search a testimony',
    'not_found' => 'No testimony',
    'not_found_in_trash' => 'No testimony in the trash',
    'parent_item_colon' => '',
    'menu_name' => 'Testimonies',

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
  register_post_type('testimonies', $args);
}