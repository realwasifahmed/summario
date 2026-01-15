<?php

return [
    "x" => [
        "title" => "X (Twitter)",
        "description" => "Share on X",
        "base_url" => "https://x.com/intent/tweet",
        "params" => [
            "text" => "{post_title}",
            "url" => "{post_url}",
        ],
        "settings_key" => "x",
    ],

    "facebook" => [
        "title" => "Facebook",
        "description" => "Share on Facebook",
        "base_url" => "https://www.facebook.com/sharer/sharer.php",
        "params" => [
            "u" => "{post_url}",
        ],
        "settings_key" => "facebook",
    ],

    "linkedin" => [
        "title" => "LinkedIn",
        "description" => "Share on LinkedIn",
        "base_url" => "https://www.linkedin.com/sharing/share-offsite/",
        "params" => [
            "url" => "{post_url}",
        ],
        "settings_key" => "linkedin",
    ],
];
