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

$besked = get_field('skole_besked_alm', 'option');

echo '<div class="skole-besked">';
    echo $besked;
echo '</div>';

// -------------------------------------------

    $myvariable = ob_get_clean();
    return $myvariable;
}