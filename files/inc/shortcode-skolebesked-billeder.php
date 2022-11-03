<?php 

add_shortcode('skolebesked-billeder', 'skole_besked_billeder');
function skole_besked_billeder($atts) {
  
     global $post;
    ob_start();

    extract(shortcode_atts(
        array(

        ), 
    $atts));

// ----------------------------------------------------

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