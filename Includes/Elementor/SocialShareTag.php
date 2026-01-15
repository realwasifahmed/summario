<?php

namespace WasifCode\Summario\Elementor;

use Elementor\Core\DynamicTags\Tag;
use Elementor\Modules\DynamicTags\Module;
use Elementor\Controls_Manager;

class SocialShareTag extends Tag
{
    public function get_name(): string
    {
        return "summaro_social_share";
    }

    public function get_title(): string
    {
        return esc_html__("Social Share Link", "summaro");
    }

    public function get_group(): array
    {
        return ["social-sharing"];
    }

    public function get_categories(): array
    {
        return [Module::URL_CATEGORY];
    }

    /**
     * Provider selector
     */
    protected function register_controls(): void
    {
        $providers = require SUMMARO_PATH .
            "Includes/Config/SocialMediaProvider.php";

        $options = [];
        foreach ($providers as $key => $provider) {
            $options[$key] = $provider["title"];
        }

        $this->add_control("provider", [
            "label" => esc_html__("Social Network", "summaro"),
            "type" => Controls_Manager::SELECT,
            "options" => $options,
            "default" => array_key_first($options),
        ]);
    }

    public function render(): void
    {
        $provider = $this->get_settings("provider");

        if (empty($provider) || !function_exists("summaro_build_share_url")) {
            return;
        }

        $url = summaro_build_share_url($provider);

        if (empty($url)) {
            return;
        }

        echo esc_url($url);
    }
}
