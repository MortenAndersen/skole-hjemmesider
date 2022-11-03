<?php 

add_shortcode('skolebesked-filer', 'skole_besked_filer');
function skole_besked_filer($atts) {
  
     global $post;
    ob_start();

    extract(shortcode_atts(
        array(

        ), 
    $atts));

// ----------------------------------------------------

if( have_rows('skole_filer', 'option') ):
    echo '<div class="skole-filer">';
    while( have_rows('skole_filer', 'option') ) : the_row();
    
        $sub_fil = get_sub_field('fil');

        if( $sub_fil ): 
            echo '<a href="' . $sub_fil['url'] . '" target="_blank">' . $sub_fil['filename'] . '</a>';
        endif;

    endwhile;
    echo '</div>';
endif;

// -------------------------------------------

    $myvariable = ob_get_clean();
    return $myvariable;
}