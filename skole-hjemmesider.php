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

// Files
if( class_exists('ACF') ) {

	// Filer
	require_once ('files/filer/posttype.php');
	require_once ('files/filer/acf.php');
	require_once ('files/filer/function.php');
	require_once ('files/filer/shortcode-type.php');
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
}