<?php 
add_action('init', function () {
    $taxonomyName = 'klasser';

    $klasser = [
        "0kl" => "0. kl.",
        "1kl" => "1. kl.",
        "2kl" => "2. kl.",
        "3kl" => "3. kl.",
        "4kl" => "4. kl.",
        "5kl" => "5. kl.",
        "6kl" => "6. kl.",
        "7kl" => "7. kl.",
        "8kl" => "8. kl.",
        "9kl" => "9. kl.",
        "10kl" => "10. kl.",
        
    ];
    foreach ($klasser as $slug => $name) {
        wp_insert_term($name, $taxonomyName, [
            'slug' => $slug,
        ]);
    }
}, 999);