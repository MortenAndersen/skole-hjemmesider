<?php
add_shortcode('skole-fil', 'skole_fil');
function skole_fil($atts) {
    global $post;
    ob_start();

    // define attributes and their defaults


    extract(shortcode_atts(
        array(

            'order' => 'DESC',
            'kl' => 'not-set',
            'type' => 'not-set',
            'fag' => 'not-set',


        ), 
    $atts));

$klasse_liste = explode(",",$kl);
$type_liste = explode(",",$type);
$fag_liste = explode(",",$fag);

/* -------------------------------------- */






// 1 stk - fag
//if ($type = 'not-set' && $kl = 'not-set' && $fag != 'not-set' ) {

    $posts = get_posts(array(
        'post_type' => 'sh_filer',
 
        
        'posts_per_page' => -1,

        'meta_key'			=> 'fag',

	'order' => $order,
        'tax_query' => array(
		    array (
		      'taxonomy' => 'fag',
		      'field' => 'slug',
		      'terms' => $fag_liste,
		    )
  		),
    ));
//} 





/* -------------------------------------- */

/* -------------------------------------- */


$current_header = '';

echo '<ul>';
		foreach( $posts as $post ): 





			echo '<li>';
			the_title();
			the_field('klasse');
			echo '<ul>';
				echo '<li>' . strip_tags(get_the_term_list( $post->ID, 'klasser', ' ',', ')) . '</li>';
				echo '<li>' . strip_tags(get_the_term_list( $post->ID, 'typer', ' ',', ')) . '</li>';
				echo '<li>' . strip_tags(get_the_term_list( $post->ID, 'fag', ' ',', ')) . '</li>';
			echo '</ul>';










		

			edit_post_link( __( 'edit', 'skolehjemmesider-domain' ), '<p>', '</p>' );

			echo '</li>';


		endforeach;
			echo '</ul>';

		wp_reset_query();
		//wp_reset_postdata();



    $myvariable = ob_get_clean();
    return $myvariable;
}