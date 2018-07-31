<?php

function custom_res_api()
{
	register_rest_field('post', 'wpvue', array(
		'get_callback'     => 'get_additional_post_data'
	));
}
add_action('rest_api_init', 'custom_res_api');

function get_additional_post_data($arr)
{
	$use_id = absint($arr['author']);
	$data = [];

	$data['username'] = get_the_author_meta('user_nicename', $use_id);
	$data['post_date'] = get_the_date('j F Y');

	$data['thumbnail'] = get_the_post_thumbnail_url($arr['id'], 'wpvue-thumb');

	return $data;
}