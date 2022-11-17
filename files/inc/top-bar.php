<?php 
function skole_top_bar() {

$elev = get_field('skole_elev_intra', 'option');
$foraeldre = get_field('skole_foraeldre_intra', 'option');
$personale = get_field('skole_personale_intra', 'option');

$facebook = get_field('skole_facebook', 'option');
$instagram = get_field('skole_instagram', 'option');

echo '<div class="skole-bar">';

if ( $elev || $foraeldre || $personale ) {
	echo '<nav class="skole-intra">';
		if ($elev) {		
			echo '<a href="' . $elev . '" target="_blank">' . intra_icon() . 'E<span>lev</span></a>';
		}
		if ($foraeldre) {
			echo '<a href="' . $foraeldre . '" target="_blank">' . intra_icon() . 'F<span>orældre</span></a>';
		}
		if ($personale) {
			echo '<a href="' . $personale . '" target="_blank">' . intra_icon() . 'P<span>ersonale</span></a>';
		}
	echo '</nav>';
}

	echo '<div class="bar-icons">';
		echo '<div class="search-action">' . search_icon() . '</div>';
		echo '<div class="phone-action">' . phone_icon() . '</div>';
		echo '<div class="mail-action">' . mail_icon() . '</div>';
	echo '</div>';
	
	if ( $facebook || $instagram ) {
		echo '<div class="skole-some">';
			if ($facebook) {
				echo '<a href="' . $facebook . '" target="_blank">' . facebook_icon() . '</a>';
			}

			if ($instagram) {
				echo '<a href="' . $instagram . '" target="_blank">' . instagram_icon() . '</a>';	
			}
		echo '</div>';
	}

echo '</div>';

echo '<div class="slide-search info-con">';
	echo '<div class="slide-con">';
	echo '<label>Søg på skolens hjemmeside:</label>';
		get_search_form();
	echo '</div>';
echo '</div>';

echo '<div class="slide-phone info-con">';
	echo '<div class="slide-con">';

if( have_rows('skole_telefon', 'option') ):
    while( have_rows('skole_telefon', 'option') ) : the_row();

        $sub_label = get_sub_field('label');
        $sub_telefon = get_sub_field('telefon');
        $sub_telefon_alt = get_sub_field('telefon_alt');

        if ( $sub_label || $sub_telefon ) {
        	echo '<div class="skole-tlf info-item">';
	        if ( $sub_label ) {
	        	echo '<label>';
	        		echo $sub_label;
	        	echo ':</label>';
	        }

	        if ( $sub_telefon ) {
	        	echo '<a href="tel:' . $sub_telefon . '">' . $sub_telefon . '</a>';
	        }

	        if ( $sub_telefon_alt ) {
	        	echo ' / <a href="tel:' . $sub_telefon_alt . '">' . $sub_telefon_alt . '</a>';
	        }
	        echo '</div>';
	    }

    endwhile;
endif;

	echo '</div>';
echo '</div>';

echo '<div class="slide-mail info-con">';
	echo '<div class="slide-con">';
if( have_rows('skole_email', 'option') ):
    while( have_rows('skole_email', 'option') ) : the_row();

        $sub_label = get_sub_field('label');
        $sub_email = get_sub_field('email');

        if ( $sub_label || $sub_telefon ) {
        	echo '<div class="skole-tlf info-item">';
	        if ( $sub_label ) {
	        	echo '<label>';
	        		echo $sub_label;
	        	echo ':</label>';
	        }

	        if ( $sub_email ) {
	        	echo '<a href="mailto:' . $sub_email . '">' . $sub_email . '</a>';
	        }
	        echo '</div>';
	    }

    endwhile;
endif;
	echo '</div>';
echo '</div>';

}

if( get_field('vis_top_bar', 'option') ) {
	add_action( 'wp_body_open', 'skole_top_bar' );
}