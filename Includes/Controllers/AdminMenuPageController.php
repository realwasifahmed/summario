<?php

namespace WasifCode\Summario\Controllers;

class AdminMenuPageController
{
    /**
     * Register admin menu
     */
    public static function register_admin_menu()
    {
        add_menu_page(
            "Summario", // Page title
            "Summario", // Menu title
            "manage_options", // Capability
            "summario", // Menu slug
            [self::class, "render"], // Callback
            "dashicons-fontello", // Icon
            60, // Position
        );
    }

    /**
     * Render admin page
     */
    public static function render($sub = "")
    {
        require_once SUMMARO_PATH . "Includes/Views/Header.php";

        $sub = sanitize_key($sub);

        if (!empty($sub)) {
            do_action("wc_summario_template_" . $sub);
        } else {
            do_action("wc_summario_template_dashboard");
        }
    }

    public static function admin_enqueue_custom_icon()
    {
        wp_enqueue_style(
            "summaro-icon",
            SUMMARO_URL . "Includes/Assets/css/fontello.css",
            [],
            SUMMARO_VERSION,
        );
    }
}
