<?php 
// https://wordpress.stackexchange.com/questions/32902/display-all-posts-in-a-custom-post-type-grouped-by-a-custom-taxonomy


add_shortcode('test', 'test_test');
function test_test($atts) {
  
     global $post;
    ob_start();

    extract(shortcode_atts(
        array(

            'fag' => 'not-set',

        ), 
    $atts));

// ----------------------------------------------------


$klasse_group_terms = get_terms( 'klasser' );




foreach ( $klasse_group_terms as $klasse_group_term ) {

    $klasse_group_query = new WP_Query( array(
        'post_type' => 'sh_filer',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page'    => -1,
        'tax_query' => array(
            'relation'      => 'AND',
            array(
                'taxonomy' => 'klasser',
                'field' => 'slug',
                'terms' => array( $klasse_group_term->slug ),
                'operator' => 'IN'
            ),
            /*
            array(
                'taxonomy' => 'fag',
                'field' => 'slug',
                'terms' => array('dan'),
                'operator' => 'AND'
            ),
            */
            array(
                'taxonomy' => 'typer',
                'field' => 'slug',
                'terms' => 'aarsplaner',
                'operator' => 'IN'  
            ),      
        )
        
    ) );

    
    
    if ( $klasse_group_query->have_posts() ) {
        echo '<h3>' . $klasse_group_term->name . '</h3>';
        echo '<ul>';
    

    while ( $klasse_group_query->have_posts() ) : $klasse_group_query->the_post();
        echo '<li>' . get_the_title() . '</br>';
        echo strip_tags(get_the_term_list( $post->ID, 'fag', ' ',', ')) . '</br>';
        echo strip_tags(get_the_term_list( $post->ID, 'typer', ' ',', ')) . '</br>';
        echo strip_tags(get_the_term_list( $post->ID, 'klasser', ' ',', ')) . '</li>';


endwhile;
    echo '</ul>';
}

    // Reset things, for good measure
    $member_group_query = null;
    wp_reset_postdata();
}
    


// -------------------------------------------

    $myvariable = ob_get_clean();
    return $myvariable;
}