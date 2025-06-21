<?php
add_shortcode('type_all', 'type_all_grouped_by_terms');
function type_all_grouped_by_terms($atts) {
	ob_start();

	extract(shortcode_atts(array(
		'orderby' => 'date',
		'order'   => 'ASC',
	), $atts));

	// Hent kun terms med indhold – sorteret alfabetisk
	$terms = get_terms(array(
		'taxonomy'   => 'typer',
		'hide_empty' => true,
		
	));
  // Dansk sortering med ÆØÅ korrekt placeret
setlocale(LC_COLLATE, 'da_DK.utf8'); // På nogle servere skal du bruge 'da_DK.UTF-8'
usort($terms, function($a, $b) {
	return strcoll($a->name, $b->name);
});


	if (!empty($terms) && !is_wp_error($terms)) {
		foreach ($terms as $term) {

			// WP_Query for filer i dette term
			$loop = new WP_Query(array(
				'post_type'      => 'sh_filer',
				'tax_query'      => array(
					array(
						'taxonomy' => 'typer',
						'field'    => 'slug',
						'terms'    => $term->slug,
					),
				),
				'orderby'        => $orderby,
				'order'          => $order,
				'posts_per_page' => -1,
			));

			if ($loop->have_posts()) {
				// Overskrift med term-navn
				echo '<h2>' . esc_html($term->name) . '</h2>';

				// Dynamisk class inkl. term slug
				$classes = 'filer term-' . esc_attr($term->slug);
				if (current_user_can('editor') || current_user_can('administrator')) {
					$classes .= ' filer-admin';
				}

				echo '<div class="' . $classes . '">';

				while ($loop->have_posts()) : $loop->the_post();
					fil_loop();
				endwhile;

				echo '</div>';
			}

			wp_reset_postdata();
		}
	} else {
		echo '<p><strong>Ingen filer fundet.</strong></p>';
	}

	return ob_get_clean();
}
