<?php 

add_shortcode('skolebesked-stor', 'skole_besked_stor');
function skole_besked_stor($atts) {
  
     global $post;
    ob_start();

    extract(shortcode_atts(
        array(

        ), 
    $atts));

// ----------------------------------------------------

$besked = get_field('skole_besked_stor', 'option');

echo '<div class="skole-besked stor-besked">';
    echo $besked;
echo '</div>';

// -------------------------------------------

    $myvariable = ob_get_clean();
    return $myvariable;
}