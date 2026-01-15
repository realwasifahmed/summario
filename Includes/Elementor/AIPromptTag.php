<?php

namespace WasifCode\Summario\Elementor;

use Elementor\Core\DynamicTags\Tag;
use Elementor\Modules\DynamicTags\Module;
use Elementor\Controls_Manager;

class AIPromptTag extends Tag
{
    public function get_name(): string
    {
        return "summaro_ai_prompt";
    }

    public function get_title(): string
    {
        return esc_html__("AI Prompt Link", "summaro");
    }

    public function get_group(): array
    {
        return ["ai-summarizer"];
    }

    public function get_categories(): array
    {
        return [Module::URL_CATEGORY];
    }

    /**
     * 🔑 THIS is where dynamism lives
     */
    protected function register_controls(): void
    {
        $providers = require SUMMARO_PATH . "Includes/Config/Providers.php";

        $options = [];
        foreach ($providers as $key => $provider) {
            $options[$key] = $provider["title"];
        }

        $this->add_control("provider", [
            "label" => esc_html__("AI Provider", "summaro"),
            "type" => Controls_Manager::SELECT,
            "options" => $options,
            "default" => array_key_first($options),
        ]);
    }

    public function render(): void
    {
        $settings = get_option("summaro_settings", []);
        $providers = require SUMMARO_PATH . "Includes/Config/Providers.php";
        $provider = $this->get_settings("provider");

        if (
            empty($provider) ||
            empty($providers[$provider]) ||
            empty($settings["enabled"]) ||
            empty($settings["tools"][$provider]) ||
            !function_exists("summaro_build_prompt")
        ) {
            return;
        }

        $prompt = summaro_build_prompt();

        if (empty($prompt)) {
            return;
        }

        echo esc_url($providers[$provider]["base_url"] . rawurlencode($prompt));
    }
}
