<?php
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Skole',
        'menu_title'    => 'Skole',
        'menu_slug'     => 'skole-general-settings',
        'capability'    => 'edit_posts',
        //'redirect'      => false
    ));


    acf_add_options_sub_page(array(
        'page_title'    => 'Beskeder og alm. tekst på forsiden.',
        'menu_title'    => 'Besked',
        'parent_slug'   => 'skole-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Begivenheder',
        'menu_title'    => 'Begivenheder',
        'parent_slug'   => 'skole-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Top bar',
        'menu_title'    => 'Top bar',
        'parent_slug'   => 'skole-general-settings',
    ));
    
}