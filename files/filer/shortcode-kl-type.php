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
    
    echo '<div class="aarsplaner grid g-d-4 gap-1">';
       while ( $loop->have_posts() ) : $loop->the_post(); 

            echo '<div class="fil">';
                $file = get_field('Fil');
                if( $file ) {
                    echo '<a href="' . $file['url'] . '" target="_blank">' . get_the_title() . '</a>';
                } else {
                    echo '<p>' . get_the_title() . '<br />- <em>Fil skal indsættes!</em></p>';
                }

            edit_post_link( __( 'edit', 'skolehjemmesider-domain' ), '<p>', '</p>' );
            echo '</div>';

        endwhile; wp_reset_query();
    echo '</div>';

}
    
// -------------------------------------------

    $myvariable = ob_get_clean();
    return $myvariable;
}