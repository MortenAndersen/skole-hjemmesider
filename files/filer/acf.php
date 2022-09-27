<?php 
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_6314858a4385c',
	'title' => 'SkoleHjemmesider',
	'fields' => array(
		array(
			'key' => 'field_6331930e67610',
			'label' => 'Fil',
			'name' => 'Fil',
			'type' => 'file',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'library' => 'all',
			'min_size' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_6332d91c0f371',
			'label' => 'Bemærkning',
			'name' => 'bemaerkning',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_6332d9250f372',
			'label' => 'Beskrivelse',
			'name' => 'beskrivelse',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'rows' => '',
			'placeholder' => '',
			'new_lines' => 'wpautop',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'sh_filer',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
));

endif;		