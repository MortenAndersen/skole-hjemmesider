<?php
add_shortcode('aargang-type', 'aargang_type');
function aargang_type($atts) {
  
    global $post;
    ob_start();

    extract(shortcode_atts(
        array(
            'aargang' => '',
            'type' => '',
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ), 
    $atts));

// ----------------------------------------------------

    $loop = new WP_Query( array(
        'post_type' => 'sh_filer',
        'tax_query' => array(
            'relation'      => 'AND',
            array(
                'taxonomy' => 'aargang',
                'field' => 'slug',
                'terms' => $aargang,
                'operator' => 'IN'
            ),
            array(
                'taxonomy' => 'typer',
                'field' => 'slug',
                'terms' => $type,
                'operator' => 'IN'  
            ),      
        ),  
        
        'orderby' => $orderby,
        'order' => $order,  
        'posts_per_page'    => -1,  
    ));

// -------------------------------------------

if ( $loop->have_posts() ) {

        if( current_user_can('editor') || current_user_can('administrator') ) {
            echo '<div class="filer filer-admin">';
        }
        else {
            echo '<div class="filer">';
        }

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