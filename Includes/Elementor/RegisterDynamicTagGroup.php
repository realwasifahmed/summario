<?php

namespace WasifCode\Summario\Elementor;

class RegisterDynamicTagGroup
{
    public static function register_group($manager)
    {
        $manager->register_group("ai-summarizer", ["title" => "AI Summarizer"]);
        $manager->register_group("social-sharing", [
            "title" => esc_html__("Social Sharing", "summaro"),
        ]);
    }
}
