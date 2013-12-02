<?php 

/* Custom post type slider */
add_action('init', 'register_slider');

function register_slider() 
{
  $labels = array(
    'name' =>'Slider',
    'singular_name' => 'Slide',
    'add_new' => 'Add a slide',
    'add_new_item' => 'Add a new slide',
    'edit_item' =>'Edit the slide',
    'new_item' => 'New slide',
    'view_item' => 'See the slide',
    'search_items' => 'Search a slide',
    'not_found' => 'No slide',
    'not_found_in_trash' => 'No slide in the trash',
    'parent_item_colon' => '',
    'menu_name' => 'Slider',

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
  register_post_type('slider', $args);
}