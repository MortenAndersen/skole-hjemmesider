<?php 
add_action('init', function () {
    $taxonomyName = 'fag';

    $fag = [
        "dan" => "Dansk",
        "mat" => "Matematik",
        "eng" => "Engelsk",
        "tys" => "Tysk",
        "his" => "Historie",
        "kri" => "Kristendomskundskab",
        "sam" => "Samfundsfag",
        "Bio" => "Biologi",
        "fys" => "Fysik/kemi",
        "geo" => "Geografi",
        "nat" => "Natur/teknologi",
        "bil" => "Billedkunst",
        "idr" => "Idræt",
        "mad" => "Madkundskab",
        "haa" => "Håndværk og design",
        "mus" => "Musik",
        
    ];
    foreach ($fag as $slug => $name) {
        wp_insert_term($name, $taxonomyName, [
            'slug' => $slug,
        ]);
    }
}, 999);