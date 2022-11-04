<?php 

add_shortcode('skolebesked', 'skole_besked');
function skole_besked($atts) {
  
     global $post;
    ob_start();

    extract(shortcode_atts(
        array(

        ), 
    $atts));

// ----------------------------------------------------

$besked_stor = get_field('skole_besked_stor', 'option');

echo '<div class="skole-besked stor-besked">';
    echo $besked_stor;
echo '</div>';

// -------------------------------------------

$besked = get_field('skole_besked_alm', 'option');

echo '<div class="skole-besked">';
    echo $besked;
echo '</div>';

// -------------------------------------------

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

$image = get_field('skole_billede', 'option');
if( $image ):

       echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" />';

endif; 

// -------------------------------------------

    $myvariable = ob_get_clean();
    return $myvariable;
}