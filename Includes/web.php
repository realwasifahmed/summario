<?php

use WasifCode\Summario\Controllers\AdminMenuPageController;
use WasifCode\Summario\Controllers\SettingsController;
use WasifCode\Summario\Elementor\RegisterDynamicTag;
use WasifCode\Summario\Elementor\RegisterDynamicTagGroup;

add_action("admin_menu", [
    AdminMenuPageController::class,
    "register_admin_menu",
]);

add_action("admin_enqueue_scripts", [
    AdminMenuPageController::class,
    "admin_enqueue_custom_icon",
]);

add_action("wc_summario_template_dashboard", [
    SettingsController::class,
    "render",
]);

add_action("admin_init", [SettingsController::class, "register_settings"]);

add_action("elementor/dynamic_tags/register", [
    RegisterDynamicTagGroup::class,
    "register_group",
]);

add_action("elementor/dynamic_tags/register", [
    RegisterDynamicTag::class,
    "register",
]);

add_action("wp_enqueue_scripts", [SettingsController::class, "enqueue"]);
