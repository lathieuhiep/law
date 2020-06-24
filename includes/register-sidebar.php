<?php
/**
 * Register Sidebar
 */
add_action( 'widgets_init', 'law_widgets_init');

function law_widgets_init() {

	$law_widgets_arr  =   array(

		'law-sidebar-main'    =>  array(
			'name'              =>  esc_html__( 'Sidebar Main', 'law' ),
			'description'       =>  esc_html__( 'Display sidebar right or left on all page.', 'law' )
		),

		'law-sidebar-wc' =>  array(
			'name'              =>  esc_html__( 'Sidebar Woocommerce', 'law' ),
			'description'       =>  esc_html__( 'Display sidebar on page shop.', 'law' )
		),

		'law-sidebar-footer-multi-column-1'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 1', 'law' ),
			'description'       =>  esc_html__('Display footer column 1 on all page.', 'law' )
		),

		'law-sidebar-footer-multi-column-2'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 2', 'law' ),
			'description'       =>  esc_html__('Display footer column 2 on all page.', 'law' )
		),

		'law-sidebar-footer-multi-column-3'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 3', 'law' ),
			'description'       =>  esc_html__('Display footer column 3 on all page.', 'law' )
		),

		'law-sidebar-footer-multi-column-4'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 4', 'law' ),
			'description'       =>  esc_html__('Display footer column 4 on all page.', 'law' )
		)

	);

	foreach ( $law_widgets_arr as $law_widgets_id => $law_widgets_value ) :

		register_sidebar( array(
			'name'          =>  esc_attr( $law_widgets_value['name'] ),
			'id'            =>  esc_attr( $law_widgets_id ),
			'description'   =>  esc_attr( $law_widgets_value['description'] ),
			'before_widget' =>  '<section id="%1$s" class="widget %2$s">',
			'after_widget'  =>  '</section>',
			'before_title'  =>  '<h2 class="widget-title">',
			'after_title'   =>  '</h2>'
		));

	endforeach;

}