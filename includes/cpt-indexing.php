<?php 

/* Custom post type slider */
add_action('init', 'register_indexing');

function register_indexing() 
{
  $labels = array(
    'name' =>'Indexing Text',
    'singular_name' => 'Indexing Text',
    'add_new' => 'Add an Indexing Text',
    'add_new_item' => 'Add a new Indexing Text',
    'edit_item' =>'Edit the Indexing Text',
    'new_item' => 'New Indexing Text',
    'view_item' => 'See the Indexing Text',
    'search_items' => 'Search for an Indexing Text',
    'not_found' => 'No Indexing Text',
    'not_found_in_trash' => 'No Indexing Text in the trash',
    'parent_item_colon' => '',
    'menu_name' => 'Indexing Text',

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
  register_post_type('indexing', $args);
}