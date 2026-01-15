<?php
/**
 * Plugin Name: Summaro
 * Plugin URI: https://wasifcode.com/summaro
 * Description:  Summaro helps you generate AI prompt URLs for your WordPress posts, making it easy to open AI tools with the right context for summarization and content sharing.
 * Version: 1.0.5
 * Author: Wasif Ahmed
 * Author URI: https://wasifcode.com
 * Text Domain: summaro
 * Domain Path: /languages
 * Requires at least: 6.0
 * Tested up to: 6.4
 * Requires PHP: 7.4
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined("ABSPATH")) {
    exit();
}

/**
 * Plugin constants
 */
define("SUMMARO_PATH", plugin_dir_path(__FILE__));
define("SUMMARO_URL", plugin_dir_url(__FILE__));
define("SUMMARO_VERSION", "1.0.5");

/**
 * Composer autoload
 */
if (file_exists(SUMMARO_PATH . "vendor/autoload.php")) {
    require_once SUMMARO_PATH . "vendor/autoload.php";
}

/**
 * Helper Functions
 */
if (file_exists(SUMMARO_PATH . "/Includes/Core/Helper.php")) {
    require_once SUMMARO_PATH . "/Includes/Core/Helper.php";
}

/**
 * Hook Files
 */
if (file_exists(SUMMARO_PATH . "/Includes/web.php")) {
    require_once SUMMARO_PATH . "Includes/web.php";
}
