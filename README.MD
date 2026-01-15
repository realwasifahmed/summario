# Summaro

Summaro is a lightweight WordPress plugin that generates smart AI prompt URLs and social sharing links for your posts.
It integrates deeply with Elementor using Dynamic Tags, allowing you to connect content to AI tools and social networks without writing custom logic.

Summaro does not generate AI content itself.
It builds structured prompt and sharing URLs so you can open AI tools or share content with the correct context instantly.

---

## Features

* AI prompt URL generation for multiple AI tools
* Social sharing URL generation for popular networks
* Elementor Dynamic Tags integration
* Provider based and fully modular architecture
* Global helper functions for reuse across themes and plugins
* Copy link support with clean JavaScript behavior
* No external APIs or API keys required
* Lightweight and performance focused

---

## Supported AI Providers

* ChatGPT
* Gemini
* Claude
* Perplexity
* xAI Grok

Providers are defined via configuration files and can be extended without modifying core logic.

---

## Supported Social Networks

* X Twitter
* Facebook
* LinkedIn

Each network uses the correct official sharing URL format.

---

## Elementor Integration

Summaro adds two Dynamic Tag groups to Elementor.

### AI Summarizer

* AI Prompt Link
  Generates a URL that opens the selected AI tool with a structured prompt based on post context.

### Social Sharing

* Social Share Link
  Generates a share URL for the selected social network.

* Copy Page Link
  Outputs the current page URL for copy to clipboard use.

All tags belong to the URL category and work with buttons, links, attributes, and custom HTML widgets.

---

## Copy Link Behavior

Summaro includes an optional JavaScript helper that enables copy to clipboard behavior.

Usage pattern

* Assign the Copy Page Link dynamic tag to a link or button
* Add the attribute `data-summaro-copy="1"`
* Clicking the element copies the link instead of navigating

Visual feedback is handled entirely via CSS using pseudo elements.

---

## Prompt Builder System

Summaro uses a single global helper to build prompts.

Supported placeholders

* `{post_title}`
* `{post_url}`
* `{page_url}`
* `{post_excerpt}`
* `{site_name}`
* `{source}`

Placeholder replacement is controlled by settings and context toggles.

The prompt builder is filterable for advanced customization.

---

## Settings

Summaro includes a settings page in the WordPress admin.

Available options

* Enable or disable Summaro globally
* Toggle AI providers
* Toggle social networks
* Control prompt context options
* Customize the prompt template

Settings are stored in a single option and sanitized properly.

---

## Architecture Overview

Summaro follows a clean separation of concerns.

* Config files define providers
* Helper functions build URLs and prompts
* Elementor Dynamic Tags expose values
* JavaScript handles interaction behavior only

No logic is duplicated between layers.

---

## Requirements

* WordPress 6.0 or later
* Elementor free or Pro
* PHP 7.4 or later

---

## Installation

1. Upload the plugin folder to `wp-content/plugins`
2. Activate the plugin from the WordPress admin
3. Open Elementor and use the new Dynamic Tags

No additional setup is required.

---

## Usage Examples

AI prompt link in Elementor button

* Button link set to Dynamic
* Select AI Summarizer
* Choose AI Prompt Link
* Select provider

Social share button

* Button link set to Dynamic
* Select Social Sharing
* Choose Social Share Link
* Select network

Copy link button

* Button link set to Dynamic
* Select Social Sharing
* Choose Copy Page Link
* Add attribute `data-summaro-copy="1"`

---

## Developer Friendly

Summaro is built to be extended.

Available filters

* `summaro_prompt`
* `summaro_share_query_args`

Providers can be added via configuration files without touching core code.

---

## What Summaro Does Not Do

* It does not call AI APIs
* It does not generate AI text
* It does not track analytics
* It does not inject UI widgets automatically

This keeps the plugin fast, predictable, and privacy friendly.

---

## License

Summaro is licensed under GPL v2 or later.

You are free to modify and redistribute it under the same license terms.

---

## Author

Developed by Wasif Ahmed
Website [https://wasifcode.com](https://wasifcode.com)
