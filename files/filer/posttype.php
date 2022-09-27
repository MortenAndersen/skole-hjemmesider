<?php 

// Posttype Filer

add_action( 'init', 'create_posttype_skolehjemmesider_filer' );

	function create_posttype_skolehjemmesider_filer() {
		 register_post_type(
	    	'sh_filer',
	    	array(
	    		'labels' => array(
	    			'name' => __('Filer', 'skolehjemmesider-domain'),
	    			'singular_name' => __('Fil', 'skolehjemmesider-domain')
	    		),
	    		'public' => true,
	    		'show_in_admin_bar'   => true,
				'show_in_nav_menus'   => false,
				'publicly_queryable'  => false,
				'query_var'           => false,
				'exclude_from_search' => true,
	    		'menu_icon' => 'dashicons-format-gallery',
	    		'supports' => array(
	    			'title',
	    			'page-attributes'
	    		),
	    		'show_in_rest' => true,
	    		'rewrite' => array(
	    			'slug' => 'sh-filer'
	    		),
	    	)
	    );
	}

function posttype_function_skolehjemmesider_filer() {
	create_posttype_skolehjemmesider_filer();
}