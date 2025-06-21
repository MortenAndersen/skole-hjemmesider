<?php 
/*
Plugin Name: Skole Hjemmesider
Version: 1.0
Plugin URI: https://www.skole-hjemmesider.dk
Description: Udvidet funktionalitet til skoler. Requirements: Advanced Custom Fields PRO
Author: Skole-hjemmesider.dk
Text Domain: skolehjemmesider-domain
Author URI: https://www.skole-hjemmesider.dk
*/


// CSS

function skolehjemmesider_register_plugin_styles() {
    wp_register_style('skole-hjemmesider', plugins_url('skole-hjemmesider/css/skole-hjemmesider.css'));
    wp_enqueue_style('skole-hjemmesider');
}
add_action('wp_enqueue_scripts', 'skolehjemmesider_register_plugin_styles');



function ava_test_init() {
    wp_enqueue_script( 'skole-hjemmesider-js', plugins_url( '/js/skole-min.js', __FILE__ ));
}
add_action('wp_enqueue_scripts','ava_test_init',999);

// Thumbnail
if ( function_exists( 'add_theme_support' ) ) {
add_theme_support( 'post-thumbnails' );
add_image_size( 'icon', 75, 75, true );
}

// Files
if( class_exists('ACF') ) {

	// Filer
	require_once ('files/filer/posttype.php');
	require_once ('files/filer/acf.php');
	require_once ('files/filer/function.php');
	require_once ('files/filer/shortcode-type.php');
	require_once ('files/filer/shortcode-type-all.php');
	require_once ('files/filer/shortcode-kl-type.php');
	require_once ('files/filer/shortcode-aargang-type.php');
	require_once ('files/filer/shortcode-alle-klasse.php');

	// Personale
	/*
	require_once ('files/personale/functions.php');
	require_once ('files/personale/posttype.php');
	require_once ('files/personale/shortcode.php');
	*/

	// Begivenheder
	/*
	require_once ('files/begivenheder/functions.php');
	require_once ('files/begivenheder/posttype.php');
	require_once ('files/begivenheder/shortcode.php');
	*/

	// Taxonomy - Klasser & Typer
	require_once ('files/taxonomy/klasser.php');
	require_once ('files/taxonomy/typer.php');
	require_once ('files/taxonomy/fag.php');
	require_once ('files/taxonomy/aargang.php');
	require_once ('files/taxonomy/term-klasser.php');
	require_once ('files/taxonomy/term-fag.php');
	require_once ('files/taxonomy/term-aargang.php');

	// Options pages
	require_once ('files/inc/option-page.php');
	require_once ('files/inc/shortcode-begivenheder.php');
	require_once ('files/inc/shortcode-skolebesked.php');
	require_once ('files/inc/top-bar.php');

	// Icons
	require_once ('img/intra-svg.php');
	require_once ('img/facebook-svg.php');
	require_once ('img/search-svg.php');
	require_once ('img/phone-svg.php');
	require_once ('img/mail-svg.php');
	require_once ('img/instagram-svg.php');
	require_once ('img/download-svg.php');
	require_once ('img/calendar-svg.php');

	// ACF
	require_once ('acf/top-bar.php');
	require_once ('acf/top-bar-email-oa.php');
	require_once ('acf/beskeder.php');
	require_once ('acf/begivenheder.php');
	require_once ('acf/skole-intra.php');
	require_once ('acf/skole-some.php');
}
