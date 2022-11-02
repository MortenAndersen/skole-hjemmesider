<?php 
function skole_top_bar() {

$elev = get_field('skole_elev_intra', 'option');
$foraeldre = get_field('skole_foraeldre_intra', 'option');
$personale = get_field('skole_personale_intra', 'option');

$facebook = get_field('skole_facebook', 'option');

echo '<div class="skole-bar">';
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
		echo '<div class="bar-icons">';
			echo '<div class="search-action">' . search_icon() . '</div>';
			echo '<div class="phone-action">' . phone_icon() . '</div>';
			echo '<div class="mail-action">' . mail_icon() . '</div>';
		echo '</div>';
	echo '</nav>';
	
		if ($facebook) {
			echo '<div class="skole-some">';
				echo '<a href="' . $facebook . '" target="_blank">' . facebook_icon() . '</a>';
			echo '</div>';
		}

echo '</div>';

echo '<div class="slide-search info-con">';
	echo '<div class="slide-con">';
		get_search_form();
	echo '</div>';
echo '</div>';

echo '<div class="slide-phone info-con">';
	echo '<div class="slide-con">';

if( have_rows('skole_telefon', 'option') ):
    while( have_rows('skole_telefon', 'option') ) : the_row();

        $sub_label = get_sub_field('label');
        $sub_telefon = get_sub_field('telefon');

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