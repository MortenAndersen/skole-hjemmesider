<?php

function custom_taxonomy_sh_typer() {

	$labels = array(
		'name' => _x('Type', 'Taxonomy General Name', 'skolehjemmesider-domain'),
		'singular_name' => _x('Type', 'Taxonomy Singular Name', 'skolehjemmesider-domain'),
		'menu_name' => __('Type', 'skolehjemmesider-domain'),
		'all_items' => __('All Items', 'skolehjemmesider-domain'),
		'parent_item' => __('Parent type', 'skolehjemmesider-domain'),
		'parent_item_colon' => __('Parent type:', 'skolehjemmesider-domain'),
		'new_item_name' => __('New Item Name', 'skolehjemmesider-domain'),
		'add_new_item' => __('Add New type', 'skolehjemmesider-domain'),
		'edit_item' => __('Edit Item', 'skolehjemmesider-domain'),
		'update_item' => __('Update Item', 'skolehjemmesider-domain'),
		'view_item' => __('View Item', 'skolehjemmesider-domain'),
		'separate_items_with_commas' => __('Separate items with commas', 'skolehjemmesider-domain'),
		'add_or_remove_items' => __('Add or remove items', 'skolehjemmesider-domain'),
		'choose_from_most_used' => __('Choose from the most used', 'skolehjemmesider-domain'),
		'popular_items' => __('Popular Items', 'skolehjemmesider-domain'),
		'search_items' => __('Search Items', 'skolehjemmesider-domain'),
		'not_found' => __('Not Found', 'skolehjemmesider-domain'),
		'no_terms' => __('No items', 'skolehjemmesider-domain'),
		'items_list' => __('Items list', 'skolehjemmesider-domain'),
		'items_list_navigation' => __('Items list navigation', 'skolehjemmesider-domain'),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'public' => false,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => false,
		'show_in_rest' => true,
		'show_in_nav_menus' => false,

	);
	register_taxonomy('typer', array('sh_filer'), $args);
}

add_action('init', 'custom_taxonomy_sh_typer', 2);