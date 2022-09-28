<?php 
add_action('init', function () {
    $taxonomyName = 'aargang';

    $aargang = [
        "2010" => "2010",
        "2011" => "2011",
        "2012" => "2012",
        "2013" => "2013",
        "2014" => "2014",
        "2015" => "2015",
        "2016" => "2016",
        "2017" => "2017",
        "2018" => "2018",
        "2019" => "2019",
        "2020" => "2020",
        "2021" => "2021",
        "2022" => "2022",
        "2023" => "2023",
        "2024" => "2024",
        "2025" => "2025",
    ];
    foreach ($aargang as $slug => $name) {
        wp_insert_term($name, $taxonomyName, [
            'slug' => $slug,
        ]);
    }
}, 999);