<?php

function my_plugin_add_stylesheet() {
    wp_enqueue_style( 'my-style', get_stylesheet_directory_uri() . '/style.css', false, '1.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'my_plugin_add_stylesheet' );

function add_pdf_menu_item($menu_links){
    $new = array( 'pdf_invoices' => __('Invoices', 'innowell') );

	$menu_links = array_slice( $menu_links, 0, 1, true ) + $new + array_slice( $menu_links, 1, NULL, true );

	return $menu_links;
}
add_filter( 'woocommerce_account_menu_items', 'add_pdf_menu_item');


function add_pdf_endpoint( $url, $endpoint, $value, $permalink ){
	if( $endpoint === 'invoices' ) {
 
		$url = site_url();
 
	}
	return $url;
}
add_filter( 'woocommerce_get_endpoint_url', 'add_pdf_endpoint', 4, 10);


function pdf_menu_endpoint() {
	add_rewrite_endpoint( 'pdf_invoices', EP_PAGES );
}
add_action( 'init', 'pdf_menu_endpoint' );


function pdf_invoice_content() {
	get_template_part("invoices");
}
add_action( 'woocommerce_account_pdf_invoices_endpoint', 'pdf_invoice_content' );