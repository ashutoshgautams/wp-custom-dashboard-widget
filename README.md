# WP Custom Dashboard Widget

A WordPress plugin exercise to add a custom dashboard widget that displays motivational quotes and a welcome message. This is designed as a hands-on coding exercise where you will fork the repo, implement the plugin, and submit a Pull Request (PR).

---

## Problem Statement

Create a WordPress plugin that:

1. **Adds a Custom Dashboard Widget**  
   - Display a welcome message with the current date and time.  
   - Display a random motivational quote from a predefined array.  

2. **Includes a Settings Page**  
   - Add a submenu under **Settings → Dashboard Widget Settings**.  
   - Allow the admin to add, remove, or edit quotes.  
   - Save quotes using WordPress `options`.  

3. **Provides a Shortcode**  
   - `[dashboard_widget_message]` outputs the same welcome message and random quote on the frontend.  

4. **Follows WordPress Best Practices**  
   - Proper sanitization and escaping (`esc_html()`, `esc_attr()`).  
   - Use WordPress hooks and functions correctly.  

---

## Instructions

1. Fork this repository to your own GitHub account.  
2. Clone your fork locally:  
   ```bash
   git clone https://github.com/YOUR_USERNAME/wp-custom-dashboard-widget.git
   cd wp-custom-dashboard-widget
