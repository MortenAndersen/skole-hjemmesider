<?php
add_shortcode('kl-type', 'kl_type');
function kl_type($atts) {
  
    global $post;
    ob_start();

    extract(shortcode_atts(
        array(
            'kl' => '',
            'type' => '',
        ), 
    $atts));

// ----------------------------------------------------

    $loop = new WP_Query( array(
        'post_type' => 'sh_filer',
        'orderby' => 'menu_order',
        'order' => 'ASC',  
        'posts_per_page'    => -1,
        'tax_query' => array(
            'relation'      => 'AND',
            array(
                'taxonomy' => 'klasser',
                'field' => 'slug',
                'terms' => $kl,
                'operator' => 'IN'
            ),
            array(
                'taxonomy' => 'typer',
                'field' => 'slug',
                'terms' => $type,
                'operator' => 'IN'  
            ),      
        )      
    ));

// -------------------------------------------

    if ( $loop->have_posts() ) {
        echo '<div class="filer">';
            while ( $loop->have_posts() ) : $loop->the_post(); 
                fil_loop();
            endwhile; wp_reset_query();
        echo '</div>';
    } else {
        echo '<p><strong>Ingen Filer i denne shortcode!</strong></p>';
    }
    
// -------------------------------------------

    $myvariable = ob_get_clean();
    return $myvariable;
}