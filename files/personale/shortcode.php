<?php
add_shortcode('sh-personale', 'sh_personale');
function sh_personale($atts) {
    global $post;
    ob_start();

    // define attributes and their defaults
    extract(shortcode_atts(
        array(
            'grid' => '2',
            'gap' =>'2',
            'id' => '',       
        ), 
    $atts));


/* -------------------------------------- */

    $loop = new WP_Query( array(
        'post_type' => 'sh_personale',
        'orderby' => 'menu_order',
        'order' => 'ASC',     
    ));

/* -------------------------------------- */

if ( $loop->have_posts() ) {

		while ( $loop->have_posts() ) : $loop->the_post();
			the_title();
		endwhile; wp_reset_query();

}

    $myvariable = ob_get_clean();
    return $myvariable;
}