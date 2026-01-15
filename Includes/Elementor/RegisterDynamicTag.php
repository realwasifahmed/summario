<?php

namespace WasifCode\Summario\Elementor;

use Elementor\Core\DynamicTags\Manager;
use WasifCode\Summario\Elementor\AIPromptTag;
use WasifCode\Summario\Elementor\SocialShareTag;
use WasifCode\Summario\Elementor\CopyLinkTag;

class RegisterDynamicTag
{
    public static function register(Manager $manager)
    {
        $manager->register(new AIPromptTag());
        $manager->register(new SocialShareTag());
        $manager->register(new CopyLinkTag());
    }
}
