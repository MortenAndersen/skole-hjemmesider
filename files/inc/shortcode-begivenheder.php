<?php 
add_shortcode('skolebegivenheder', 'skole_begivenhed');
function skole_begivenhed($atts) {
  
     global $post;
    ob_start();

    extract(shortcode_atts(
        array(

        ), 
    $atts));

// ----------------------------------------------------
$overskrift = get_field('overskrift', 'option');

if( have_rows('begivenhed', 'option') ):
    if( $overskrift ):
        echo '<h2>'  . $overskrift . '</h2>';
    endif;
    echo '<div class="skole-begivenheder">';
    while( have_rows('begivenhed', 'option') ) : the_row();
    
        $sub_overskrift = get_sub_field('overskrift');
        $sub_tekst = get_sub_field('tekst');
        $sub_file = get_sub_field('fil');
        $sub_file_txt = get_sub_field('link_tekst');
        $sub_billede = get_sub_field('billede');
            $size = 'thumbnail';
            $thumb = $sub_billede['sizes'][ $size ];
            $width = $sub_billede['sizes'][ $size . '-width' ];
            $height = $sub_billede['sizes'][ $size . '-height' ];

        echo '<div class="begivenhed">';
            if( $sub_overskrift ):
                echo '<div class="begivenhed-title">' . $sub_overskrift . '</div>';
            endif;

            if( $sub_tekst ):
                echo '<div class="begivenhed-tekst">' . $sub_tekst . '</div>';
            endif;

            if( $sub_billede ):
                echo '<img width="' . $width . '" height="' . $height . '" src="' . esc_url($thumb) . '" />';
            endif;
            
            if( $sub_file ): 
                if( $sub_file_txt ) {
                    echo '<div class="begivenhed-fil">' . download_icon() .' <a href="' . $sub_file['url'] . '" target="_blank">' . $sub_file_txt . '</a></div>';
                } else {
                    echo '<div class="begivenhed-fil">' . download_icon() .' <a href="' . $sub_file['url'] . '" target="_blank">' . $sub_overskrift . '</a></div>';
                }
            endif;
        echo '</div>';

    endwhile;
    echo '</div>';
endif;

// -------------------------------------------

    $myvariable = ob_get_clean();
    return $myvariable;
}