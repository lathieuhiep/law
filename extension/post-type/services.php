<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post_type meta elements
*---------------------------------------------------------------------
*/

add_action('init', 'law_create_service', 10);

function law_create_service() {

	/* Start post type template */
	$labels = array(
		'name'                  =>  _x( 'Service', 'post type general name', 'law' ),
		'singular_name'         =>  _x( 'Service', 'post type singular name', 'law' ),
		'menu_name'             =>  _x( 'Service', 'admin menu', 'law' ),
		'name_admin_bar'        =>  _x( 'All Services', 'add new on admin bar', 'law' ),
		'add_new'               =>  _x( 'Add New', 'Service', 'law' ),
		'add_new_item'          =>  esc_html__( 'Add New Service', 'law' ),
		'edit_item'             =>  esc_html__( 'Edit Service', 'law' ),
		'new_item'              =>  esc_html__( 'New Service', 'law' ),
		'view_item'             =>  esc_html__( 'View Service', 'law' ),
		'all_items'             =>  esc_html__( 'All Services', 'law' ),
		'search_items'          =>  esc_html__( 'Search Service', 'law' ),
		'not_found'             =>  esc_html__( 'No template found', 'law' ),
		'not_found_in_trash'    =>  esc_html__( 'No template found in trash', 'law' ),
		'parent_item_colon'     =>  ''
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'          => 'dashicons-clipboard',
		'rewrite'            => array( 'slug' => 'dich-vu' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	);

	register_post_type('service', $args );
	/* End post type template */

    /* Start taxonomy prodcut */
    $taxonomy_labels = array(
        'name'              => _x( 'Service categories', 'taxonomy general name', 'law' ),
        'singular_name'     => _x( 'Service category', 'taxonomy singular name', 'law' ),
        'search_items'      => __( 'Search template category', 'law' ),
        'all_items'         => __( 'All Category', 'law' ),
        'parent_item'       => __( 'Parent category', 'law' ),
        'parent_item_colon' => __( 'Parent category:', 'law' ),
        'edit_item'         => __( 'Edit category', 'law' ),
        'update_item'       => __( 'Update category', 'law' ),
        'add_new_item'      => __( 'Add New category', 'law' ),
        'new_item_name'     => __( 'New category Name', 'law' ),
        'menu_name'         => __( 'Categories', 'law' ),
    );

    $taxonomy_args = array(

        'labels'            => $taxonomy_labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'danh-muc-dich-vu' ),

    );

    register_taxonomy( 'service_cat', array( 'service' ), $taxonomy_args );
    /* End taxonomy prodcut */

}
