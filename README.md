# WP Custom Dashboard Widget

A WordPress plugin that adds a custom dashboard widget displaying motivational quotes and a welcome message. Includes a settings page and a shortcode for frontend display.

---

## Features

1. *Dashboard Widget*
   - Displays a welcome message with current date and time.
   - Shows a random motivational quote.

2. *Settings Page*
   - Manage motivational quotes under *Settings → Dashboard Widget Settings*.
   - Add, remove, or edit quotes.

3. *Shortcode*
   - [dashboard_widget_message] displays the welcome message and random quote on the frontend.

---

## Installation

1. Clone this repository or download the plugin file.
2. Place wp-custom-dashboard-widget.php in your WordPress /wp-content/plugins/ directory.
3. Activate the plugin in WordPress admin.

---

## Usage

- *Dashboard:* See the custom widget in the admin dashboard.
- *Shortcode:* Use [dashboard_widget_message] in posts/pages to display the message.
- *Settings:* Update quotes from the settings page.

---

## Contribution

1. Fork this repository.
2. Implement the plugin features in wp-custom-dashboard-widget.php.
3. Submit a Pull Request with your changes.

---

## Notes

- All code should follow WordPress coding standards.
- Proper sanitization applied (esc_html(), esc_attr()).
- Aim for a single-file implementation (~150 lines).