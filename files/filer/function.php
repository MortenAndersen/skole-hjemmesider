<?php

function fil_loop() {

	echo '<div class="fil">';
	$file = get_field('Fil');
	if ($file) {
		echo '<div class="fil-title"><a href="' . $file['url'] . '" target="_blank"><svg height="20" width="20"><path d="M5.5 16q-.625 0-1.062-.438Q4 15.125 4 14.5V13h1.5v1.5h9V13H16v1.5q0 .625-.438 1.062Q15.125 16 14.5 16Zm4.5-3L6 9l1.062-1.062 2.188 2.187V3h1.5v7.125l2.188-2.187L14 9Z"/></svg>' . get_the_title() . '</a></div>';
	} else {
		echo '<div class="fil-title"><strong>' . get_the_title() . '</strong></div>';
	}
	$note = get_field('bemaerkning');
	if ($note) {
		echo '<div class="note"><em>' . $note . '</em></div>';
	}

	$info = get_field('beskrivelse');
	if ($info) {
		echo '<div class="info">' . $info . '</div>';
	}

	edit_post_link(__('+', 'skolehjemmesider-domain'), '<div class="edit">', '</div>');

	if (is_user_logged_in()) {
		$updated = get_the_modified_time('j/n Y');
		echo '<div class="sidst-opdateret">Opdateret: ' . $updated . '</div>';
	}

	echo '</div>';

}