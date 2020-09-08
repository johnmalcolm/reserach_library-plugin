<?php 
/** 
 * @package ResearchLibraryPlugin
 */
/*
Plugin Name: Research Library
Plugin URI: https://github.com/johnmalcolm/wp-researchlibrary
Description: Research Library allow you to create and manage curated lists of journal articles from over 36,000 journals. You can use this plugin to manage and feature these databases on your website along side rich data visualizations for your research project, students or others in your field.  
Version: 1.0.0
Author: Scientometrics
Author URI: http://scientometrics.io
License: GPLv2 or later
Text Domain: researchlibrary-plugin
*/

function wporg_options_page_html() {
    ?>
    <div class="wrap">
      <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
      <form action="options.php" method="post">
        <?php
        // output security fields for the registered setting "wporg_options"
        settings_fields( 'wporg_options' );
        // output setting sections and their fields
        // (sections are registered for "wporg", each field is registered to a specific section)
        do_settings_sections( 'wporg' );
        // output save settings button
        submit_button( __( 'Save Settings', 'textdomain' ) );
        ?>
      </form>
    </div>
    <?php
}

add_action( 'admin_menu', 'wporg_options_page' );
function wporg_options_page() {
    add_menu_page(
        'WPOrg',
        'WPOrg Options',
        'manage_options',
        'wporg',
        'wporg_options_page_html',
        plugin_dir_url(__FILE__) . 'images/icon_wporg.png',
        20
    );
}

/**
 * Register the "book" custom post type
 */
function research_library_setup_post_type() {
    register_post_type( 'book', ['public' => true ] ); 
} 
add_action( 'init', 'research_library_setup_post_type' );
 
 
/**
 * Activate the plugin.
 */
function research_library_activate() { 
    // Trigger our function that registers the custom post type plugin.
    research_library_setup_post_type(); 
    // Clear the permalinks after the post type has been registered.
    flush_rewrite_rules(); 
}
register_activation_hook( __FILE__, 'research_library_activate' );
