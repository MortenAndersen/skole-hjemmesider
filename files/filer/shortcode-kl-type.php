<?php
add_shortcode('kl-type', 'kl_type');
function kl_type($atts) {
  
     global $post;
    ob_start();

    extract(shortcode_atts(
        array(

            'kl' => '3kl',
            'type' => 'plan',
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

if ( $loop->have_posts() ) {
    
    echo '<div class="aarsplaner">';
       while ( $loop->have_posts() ) : $loop->the_post(); 

            echo '<div class="fil">';
                $file = get_field('Fil');
                if( $file ) {
                    echo '<div class="fil-title"><a href="' . $file['url'] . '" target="_blank">' . get_the_title() . '</a></div>';
                } else {
                    echo '<div class="fil-title">' . get_the_title() . '</div>';
                }
                $note = get_field('bemaerkning');
                if ( $note ) {
                    echo '<div class="note"><em>' . $note . '</em></div>';
                }

             $info = get_field('beskrivelse');
                if ( $info ) {
                    echo '<div class="info">' . $info . '</div>';
                }
            

            edit_post_link( __( 'edit', 'skolehjemmesider-domain' ), '<div class="edit">', '</div>' );

           echo '</div>';

        endwhile; wp_reset_query();
    echo '</div>';

}
    
// -------------------------------------------

    $myvariable = ob_get_clean();
    return $myvariable;
}