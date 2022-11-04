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

$images = get_field('skole_billeder', 'option');
if( $images ):

       foreach( $images as $image ): 
  
                echo '<a href="' . esc_url($image['url']) . '">
                     <img src="' . esc_url($image['sizes']['thumbnail']) . '" alt="' . esc_attr($image['alt']) . '" />
                </a>';


       endforeach; 

endif; 

// -------------------------------------------

    $myvariable = ob_get_clean();
    return $myvariable;
}