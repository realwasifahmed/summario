<?php

namespace WasifCode\Summario\Elementor;

use Elementor\Core\DynamicTags\Tag;
use Elementor\Modules\DynamicTags\Module;

class CopyLinkTag extends Tag
{
    public function get_name(): string
    {
        return "summaro_copy_link";
    }

    public function get_title(): string
    {
        return esc_html__("Copy Page Link", "summaro");
    }

    public function get_group(): array
    {
        return ["social-sharing"];
    }

    public function get_categories(): array
    {
        return [Module::URL_CATEGORY];
    }

    public function render(): void
    {
        $post_id = get_the_ID();

        if (!$post_id) {
            return;
        }

        echo esc_url(get_permalink($post_id));
    }
}
