<?php 

add_shortcode('intramenu', 'skole_intra_nav');
function skole_intra_nav($atts) {
  
     global $post;
    ob_start();

    extract(shortcode_atts(
        array(

        ), 
    $atts));

// ----------------------------------------------------


$elev = get_field('skole_elev_intra', 'option');
$foraeldre = get_field('skole_foraeldre_intra', 'option');
$personale = get_field('skole_personale_intra', 'option');

echo '<nav class="skole-intra">';
	if ($elev) {
		
		echo '<a href="' . $elev . '" target="_blank">' . intra_icon() . 'Elevintra</a>';
	}
	if ($foraeldre) {
		echo '<a href="' . $foraeldre . '" target="_blank">' . intra_icon() . 'Forældreintra</a>';
	}
	if ($personale) {
		echo '<a href="' . $personale . '" target="_blank">' . intra_icon() . 'Personaleintra</a>';
	}
echo '</nav>';


// -------------------------------------------

    $myvariable = ob_get_clean();
    return $myvariable;
}