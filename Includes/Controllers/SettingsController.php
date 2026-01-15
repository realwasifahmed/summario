<?php

namespace WasifCode\Summario\Controllers;

class SettingsController
{
    /**
     * Render settings page
     */
    public static function render()
    {
        require_once SUMMARO_PATH . "Includes/Views/Settings.php";
    }

    /**
     * Register settings
     */
    public static function register_settings()
    {
        register_setting(
            "summaro_settings_group", // settings_fields() group
            "summaro_settings", // option name
            [
                "sanitize_callback" => [self::class, "sanitize"],
            ],
        );
    }

    /**
     * Sanitize settings before saving
     */
    public static function sanitize($input)
    {
        $providers = require SUMMARO_PATH . "Includes/Config/Providers.php";

        $sanitized_tools = [];

        foreach ($providers as $provider) {
            $key = $provider["settings_key"];
            $sanitized_tools[$key] = !empty($input["tools"][$key]);
        }

        return [
            "enabled" => !empty($input["enabled"]),
            "open_new_tab" => !empty($input["open_new_tab"]),

            "context" => [
                "post_title" => !empty($input["context"]["post_title"]),
                "post_url" => !empty($input["context"]["post_url"]),
                "site_name" => !empty($input["context"]["site_name"]),
                "post_excerpt" => !empty($input["context"]["post_excerpt"]),
                "excerpt_len" => absint(
                    $input["context"]["excerpt_len"] ?? 160,
                ),
            ],

            "tools" => $sanitized_tools,

            "prompt_template" => sanitize_textarea_field(
                $input["prompt_template"] ?? "",
            ),
        ];
    }

    public static function enqueue(): void
    {
        wp_enqueue_script(
            "summaro-copy-link",
            SUMMARO_URL . "Includes/Assets/js/copy-link.js",
            [],
            SUMMARO_VERSION,
            true,
        );
    }
}
