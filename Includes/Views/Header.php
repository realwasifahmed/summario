<?php
$current_tab = isset($_GET["tab"])
    ? sanitize_key($_GET["tab"])
    : "dashboard"; ?>

<div class="wrap">
    <h1 class="wp-heading-inline">Summaro</h1>

    <p class="description">
        Summaro helps you generate AI prompt URLs for your WordPress posts,
           making it easy to open AI tools with the right context for summarization
           and content sharing.
    </p>

    <!--<nav class="nav-tab-wrapper wp-clearfix">
        <a href="<?php echo admin_url("admin.php?page=summario"); ?>"
           class="nav-tab <?php echo $current_tab === "dashboard"
               ? "nav-tab-active"
               : ""; ?>">
            Dashboard
        </a>

        <a href="<?php echo admin_url(
            "admin.php?page=summario&tab=settings",
        ); ?>"
           class="nav-tab <?php echo $current_tab === "settings"
               ? "nav-tab-active"
               : ""; ?>">
            Settings
        </a>

        <a href="<?php echo admin_url(
            "admin.php?page=summario&tab=providers",
        ); ?>"
           class="nav-tab <?php echo $current_tab === "providers"
               ? "nav-tab-active"
               : ""; ?>">
            AI Providers
        </a>

        <a href="<?php echo admin_url(
            "admin.php?page=summario&tab=sharing",
        ); ?>"
           class="nav-tab <?php echo $current_tab === "sharing"
               ? "nav-tab-active"
               : ""; ?>">
            Sharing
        </a>
    </nav>-->
</div>
