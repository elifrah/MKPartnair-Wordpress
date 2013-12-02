<?php 

/* Custom post type advantage */
add_action('init', 'register_advantages');

function register_advantages() 
{
  $labels = array(
    'name' =>'Advantages',
    'singular_name' => 'Advantage',
    'add_new' => 'Add an advantage',
    'add_new_item' => 'Add a new advantage',
    'edit_item' =>'Edit the advantage',
    'new_item' => 'New advantage',
    'view_item' => 'See the advantage',
    'search_items' => 'Search a advantage',
    'not_found' => 'No advantage',
    'not_found_in_trash' => 'No advantage in the trash',
    'parent_item_colon' => '',
    'menu_name' => 'Advantages',

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
  register_post_type('advantages', $args);
}