<?php
add_shortcode('skole-fil-kl', 'skole_fil_alle_kl');
function skole_fil_alle_kl($atts) {
    global $post;
    ob_start();

    // define attributes and their defaults
    extract(shortcode_atts(
        array(
            'grid' => '2',
            'gap' =>'2',
            'kl' => '',
            'type' => '',


        ), 
    $atts));

$klasse_liste = explode(",",$kl);
$type_liste = explode(",",$type);


/* -------------------------------------- */

    $posts = get_posts(array(
        'post_type' => 'sh_filer',
        'taxonomy' => 'fag',
    	'orderby' => 'name',
    	'order' => 'ASC', 
        'tax_query' => array(
		    array (
		      'taxonomy' => 'klasser',
		      'field' => 'slug',
		      'terms' => $klasse_liste,
		    ),
		    array (
		      'taxonomy' => 'typer',
		      'field' => 'slug',
		      'terms' => $type_liste,
		    ),
  		),

    ));

/* -------------------------------------- */

echo '<ul>';
		foreach( $posts as $post ):

			echo '<li>';
			if ( get_the_term_list( $post->ID, 'fag' ) ) {
				echo '<h4>' . strip_tags(get_the_term_list( $post->ID, 'fag', ' ',', ')) . '</h4>';
			}
			the_title();
			echo strip_tags(get_the_term_list( $post->ID, 'klasser', ' ',', '));
			echo strip_tags(get_the_term_list( $post->ID, 'typer', ' ',', '));
			echo strip_tags(get_the_term_list( $post->ID, 'fag', ' ',', '));



			echo '</li>';

		endforeach;
echo '</ul>';

		//wp_reset_query();
		wp_reset_postdata();



    $myvariable = ob_get_clean();
    return $myvariable;
}