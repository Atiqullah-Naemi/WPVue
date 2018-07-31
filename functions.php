<?php


// includes other files
require get_theme_file_path('/includes/api.php');


// enqueue scripts
function wpvue_files()
{
  wp_enqueue_script('main-wpvue-js', 'http://localhost:8080/dist/build.js', array(), false, true);
  wp_localize_script('main-wpvue-js', 'wpvue', array(
    'root_url' => home_url(),
    'site_name' => get_bloginfo('name')
  )); 
}
add_action('wp_enqueue_scripts', 'wpvue_files');


// add theme features
function wpvue_features()
{
	add_theme_support('title-tag');
  	add_theme_support('post-thumbnails');
  	add_image_size('wpvue-thumb', 300, 180, true);
}

add_action('after_setup_theme', 'wpvue_features');

