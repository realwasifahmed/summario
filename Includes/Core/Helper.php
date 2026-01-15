<?php

if (!function_exists("summaro_build_prompt")) {
    /**
     * Build AI prompt string based on settings and post context
     *
     * @param int|null $post_id
     * @return string
     */

    function summaro_build_prompt(): string
    {
        $settings = get_option("summaro_settings", []);

        $template = $settings["prompt_template"] ?? "";
        if (empty($template)) {
            return "";
        }

        $post_id = get_the_ID();
        if (!$post_id) {
            return "";
        }

        $replacements = [];

        // Context toggles
        if (!empty($settings["context"]["post_title"])) {
            $replacements["{post_title}"] = get_the_title($post_id);
        }

        if (!empty($settings["context"]["post_url"])) {
            $replacements["{post_url}"] = get_permalink($post_id);
        }

        if (!empty($settings["context"]["site_name"])) {
            $replacements["{site_name}"] = get_bloginfo("name");
        }

        if (!empty($settings["context"]["post_excerpt"])) {
            $excerpt = wp_strip_all_tags(get_the_excerpt($post_id));
            $length = absint($settings["context"]["excerpt_len"] ?? 160);

            $replacements["{post_excerpt}"] = mb_substr($excerpt, 0, $length);
        }

        // Always available
        $replacements["{source}"] = get_bloginfo("name");

        // Replace placeholders
        $prompt = strtr($template, $replacements);

        /**
         * Filter final prompt before returning
         */
        return trim(
            apply_filters("summaro_prompt", $prompt, $post_id, $settings),
        );
    }
}

if (!function_exists("summaro_build_share_url")) {
    /**
     * Build social sharing URL for a given provider
     *
     * @param string   $provider_key
     * @param int|null $post_id
     * @return string
     */
    function summaro_build_share_url(
        string $provider_key,
        ?int $post_id = null,
    ): string {
        $providers = require SUMMARO_PATH .
            "Includes/Config/SocialMediaProvider.php";

        if (empty($providers[$provider_key])) {
            return "";
        }

        $provider = $providers[$provider_key];

        $post_id = $post_id ?: get_the_ID();
        if (!$post_id) {
            return "";
        }

        $base_url = $provider["base_url"] ?? "";
        $params = $provider["params"] ?? [];

        if (empty($base_url) || empty($params)) {
            return "";
        }

        // Build replacements
        $replacements = [
            "{post_title}" => get_the_title($post_id),
            "{post_url}" => get_permalink($post_id),
            "{page_url}" => get_permalink($post_id), // alias
            "{site_name}" => get_bloginfo("name"),
        ];

        // Build query args
        $query_args = [];

        foreach ($params as $param_key => $value_template) {
            $query_args[$param_key] = strtr($value_template, $replacements);
        }

        /**
         * Filter share URL query args
         */
        $query_args = apply_filters(
            "summaro_share_query_args",
            $query_args,
            $provider_key,
            $post_id,
        );

        /**
         * Filter final share URL
         */
        return esc_url(add_query_arg($query_args, $base_url));
    }
}
