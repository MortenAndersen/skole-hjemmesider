<?php 

function fil_loop() {

	echo '<div class="fil">';
        $file = get_field('Fil');
        if( $file ) {
            echo '<div class="fil-title"><a href="' . $file['url'] . '" target="_blank">' . get_the_title() . '</a></div>';
        } else {
            echo '<div class="fil-title"><strong>' . get_the_title() . '</strong></div>';
        }
        $note = get_field('bemaerkning');
        if ( $note ) {
            echo '<div class="note"><em>' . $note . '</em></div>';
        }

        $info = get_field('beskrivelse');
        if ( $info ) {
            echo '<div class="info">' . $info . '</div>';
        }
            
        edit_post_link( __( '+', 'skolehjemmesider-domain' ), '<div class="edit">', '</div>' );

    echo '</div>';

}