<?php 

/* Custom post type partner */
add_action('init', 'register_partners');

function register_partners() 
{
  $labels = array(
    'name' =>'partners',
    'singular_name' => 'partner',
    'add_new' => 'Add an partner',
    'add_new_item' => 'Add a new partner',
    'edit_item' =>'Edit the partner',
    'new_item' => 'New partner',
    'view_item' => 'See the partner',
    'search_items' => 'Search a partner',
    'not_found' => 'No partner',
    'not_found_in_trash' => 'No partner in the trash',
    'parent_item_colon' => '',
    'menu_name' => 'Partners',

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
  register_post_type('partners', $args);
}