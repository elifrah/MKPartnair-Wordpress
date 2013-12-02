<?php 

/* Custom post type partner */
add_action('init', 'register_translation');

function register_translation() 
{
  $labels = array(
    'name' =>'translation',
    'singular_name' => 'translation',
    'add_new' => 'Add a translation',
    'add_new_item' => 'Add a new translation',
    'edit_item' =>'Edit the translation',
    'new_item' => 'New translation',
    'view_item' => 'See the translation',
    'search_items' => 'Search a translation',
    'not_found' => 'No translation',
    'not_found_in_trash' => 'No translation in the trash',
    'parent_item_colon' => '',
    'menu_name' => 'Translations',

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
  register_post_type('translation', $args);
}