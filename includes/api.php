<?php

function custom_res_api()
{
	register_rest_field('post', 'wpvue', array(
		'get_callback'     => 'get_additional_post_data'
	));
	register_rest_route(
		'wpvue/v1',
		'/menus',
		[
			'methods'           =>  'GET',
			'callback'          =>  'get_menus'
		]
	);
	register_rest_route(
		'wpvue/v1',
		'/menus/(?P<id>[a-zA-Z(-]+)',
		[
			'methods'           =>  'GET',
			'callback'          =>  'get_menu_data'
		]
	);
}
add_action('rest_api_init', 'custom_res_api');

function get_additional_post_data($arr)
{
	$data = [];

	$excerpt = get_the_excerpt();

	if (strlen($excerpt) > 90) {
		$data['post_exp'] = substr($excerpt, 0, 90) . '...';
	} else {
		$data['post_exp'] = $excerpt;
	}

	$gallery = acf_photo_gallery('image_gallery', $post->ID);

	if ($gallery) {
		$data['gallery_image'] = $gallery;
	}

	$data['thumbnail'] = get_the_post_thumbnail_url($arr['id'], 'wpvue-thumb');

	return $data;
}


function get_menus(){
	$menus                      =   [];

	foreach( get_registered_nav_menus() as $slug => $desc ){
		$obj                    =   new stdClass;
		$obj->slug              =   $slug;
		$obj->description       =   $desc;
		$menus[]                =   $obj;
	}

	return $menus;
}

function get_menu_data( $data ){
	$menu                       =   wp_get_nav_menu_object( $data['id'] );
	$menu_items                 =   wp_get_nav_menu_items( $menu->term_id );
	return $menu_items;
}