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
$besked = get_field('skole_besked_alm', 'option');
$images = get_field('billedgalleri', 'option');

if ( $besked_stor || $besked || $images ) {
echo '<div class="skole-besked-con">';

if ( $besked_stor ) {
    echo '<h2>';
        echo $besked_stor;
    echo '</h2>';
}

// -------------------------------------------


if ( $besked ) {
    echo '<div class="skole-besked">';
        echo $besked;
    echo '</div>';
}

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


if( $images ): 

if (count( $images ) <= 2 ) {
    $cl = ' g-d-1 ';
} elseif (count( $images ) <= 4 ) {
    $cl = ' g-d-2 ';
} else {
    $cl = ' g-d-3 ';
}


    echo '<div class="skole-billede grid' . $cl . 'gap-1">';
       foreach( $images as $image ):

                echo '<a href="' . esc_url($image['url']) . '" class="lightbox-link">';
                     echo '<img src="' . esc_url($image['sizes']['large']) . '" alt="' . esc_attr($image['alt']) . '" />';
                echo '</a>';

        endforeach;
    echo '</div>';
endif;

echo '</div>';
}
// -------------------------------------------

    $myvariable = ob_get_clean();
    return $myvariable;
}