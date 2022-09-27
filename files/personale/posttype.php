<?php 

// Posttype Personale

add_action( 'init', 'create_posttype_skolehjemmesider_personale' );

	function create_posttype_skolehjemmesider_personale() {
		 register_post_type(
	    	'sh_personale',
	    	array(
	    		'labels' => array(
	    			'name' => __('Personale', 'skolehjemmesider-domain'),
	    			'singular_name' => __('Person', 'skolehjemmesider-domain')
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
	    			'slug' => 'person'
	    		),
	    	)
	    );
	}

function posttype_function_skolehjemmesider_personale() {
	create_posttype_skolehjemmesider_persoanle();
}