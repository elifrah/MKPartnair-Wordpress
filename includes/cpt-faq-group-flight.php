<?php 

/* Custom post type slider */
add_action('init', 'register_faq_group_flight');

function register_faq_group_flight() 
{
  $labels = array(
    'name' =>'FAQ',
    'singular_name' => 'FAQ',
    'add_new' => 'Add a FAQ',
    'add_new_item' => 'Add a new FAQ',
    'edit_item' =>'Edit the FAQ',
    'new_item' => 'New FAQ',
    'view_item' => 'See the FAQ',
    'search_items' => 'Search a FAQ',
    'not_found' => 'No FAQ',
    'not_found_in_trash' => 'No FAQ in the trash',
    'parent_item_colon' => '',
    'menu_name' => 'FAQ Group',

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
  register_post_type('faq_group_flight', $args);
}