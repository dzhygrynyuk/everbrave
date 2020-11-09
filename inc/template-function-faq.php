<?php

function faq_type() {

	// Set UI labels for Custom Post Type
	$labels = array(
		'name'               => _x( 'FAQ', 'Post Type General Name', 'alphavalley' ),
		'singular_name'      => _x( 'FAQ', 'Post Type Singular Name', 'alphavalley' ),
		'menu_name'          => __( 'FAQ', 'alphavalley' ),
		'parent_item_colon'  => __( 'Parent FAQ', 'alphavalley' ),
		'all_items'          => __( 'All FAQ', 'alphavalley' ),
		'view_item'          => __( 'View FAQ', 'alphavalley' ),
		'add_new_item'       => __( 'Add New FAQ', 'alphavalley' ),
		'add_new'            => __( 'Add New FAQ', 'alphavalley' ),
		'edit_item'          => __( 'Edit FAQ', 'alphavalley' ),
		'update_item'        => __( 'Update', 'alphavalley' ),
		'search_items'       => __( 'Search Modules', 'alphavalley' ),
		'not_found'          => __( 'Not Found', 'alphavalley' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'alphavalley' ),
	);

	// Set other options for Custom Post Type

	$args = array(
		'label'               => __( 'FAQ', 'alphavalley' ),
		'description'         => __( 'FAQ', 'alphavalley' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor'),
		'hierarchical'        => false,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-editor-help',
		'can_export'          => true,
		'public' => false,
		'publicly_queryable' => true,
		'show_ui' => true,
		'exclude_from_search' => true,
		'show_in_nav_menus' => false,
		'has_archive' => false,
		'show_in_rest' => true,
		'capability_type'     => 'page',
	);
	// Registering your Custom Post Type
	register_post_type( 'faq', $args );
}
add_action( 'init', 'faq_type', 0 );