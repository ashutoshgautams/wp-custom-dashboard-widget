<?php
/*
Plugin Name: WP Custom Dashboard Widget
Description: Adds a custom dashboard widget and allows managing motivational quotes.
Version: 1.0
Author: Mohammed Khalid
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WP_Custom_Dashboard_Widget {

    private $option_name = 'wp_cdw_quotes';

    public function __construct() {
        add_action('wp_dashboard_setup', [$this, 'add_dashboard_widget']);
        add_action('admin_menu', [$this, 'add_settings_page']);
        add_action('admin_init', [$this, 'register_settings']);
        add_shortcode('dashboard_widget_message', [$this, 'shortcode_display']);
    }

    // Add Dashboard Widget
    public function add_dashboard_widget() {
        wp_add_dashboard_widget(
            'wp_cdw_widget',
            'Motivational Widget',
            [$this, 'dashboard_widget_display']
        );
    }

    // Dashboard Widget content
    public function dashboard_widget_display() {
        $quotes = get_option($this->option_name, $this->default_quotes());
        $quote = $quotes[array_rand($quotes)];
        $date = date_i18n('l, F j, Y, g:i a');

        echo '<p><strong>Welcome!</strong></p>';
        echo '<p>Today is: ' . esc_html($date) . '</p>';
        echo '<p>Quote of the moment: <em>' . esc_html($quote) . '</em></p>';
    }

    // Shortcode output
    public function shortcode_display() {
        $quotes = get_option($this->option_name, $this->default_quotes());
        $quote = $quotes[array_rand($quotes)];
        $date = date_i18n('l, F j, Y, g:i a');

        return '<p><strong>Welcome!</strong></p>' .
               '<p>Today is: ' . esc_html($date) . '</p>' .
               '<p>Quote of the moment: <em>' . esc_html($quote) . '</em></p>';
    }

    // Settings page
    public function add_settings_page() {
        add_options_page(
            'Dashboard Widget Settings',
            'Dashboard Widget',
            'manage_options',
            'wp-cdw-settings',
            [$this, 'settings_page_html']
        );
    }

    public function register_settings() {
        register_setting('wp_cdw_settings_group', $this->option_name, [
            'type' => 'array',
            'sanitize_callback' => [$this, 'sanitize_quotes'],
            'default' => $this->default_quotes(),
        ]);
    }

    public function sanitize_quotes($input) {
        $output = [];
        if (is_array($input)) {
            foreach ($input as $quote) {
                $quote = sanitize_text_field($quote);
                if (!empty($quote)) $output[] = $quote;
            }
        }
        return $output;
    }

    // Settings page HTML
    public function settings_page_html() {
        if (!current_user_can('manage_options')) return;

        $quotes = get_option($this->option_name, $this->default_quotes());
        ?>
        <div class="wrap">
            <h1>Dashboard Widget Settings</h1>
            <form method="post" action="options.php">
                <?php settings_fields('wp_cdw_settings_group'); ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Quotes</th>
                        <td>
                            <textarea name="<?php echo esc_attr($this->option_name); ?>[]" rows="10" cols="50" class="large-text"><?php echo esc_textarea(implode("\n", $quotes)); ?></textarea>
                            <p class="description">Enter one quote per line.</p>
                        </td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }

    // Default quotes
    private function default_quotes() {
        return [
            "Believe in yourself!",
            "Every day is a new beginning.",
            "You are stronger than you think.",
            "Stay positive, work hard, make it happen.",
            "The best time for new beginnings is now."
        ];
    }

}

new WP_Custom_Dashboard_Widget();