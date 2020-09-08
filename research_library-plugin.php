<?php 
/** 
 * @package ResearchLibraryPlugin
 */
/*
Plugin Name: Research Library
Plugin URI: https://github.com/johnmalcolm/reserach_library-plugin
Description: Research Library allow you to create and manage curated lists of journal articles from over 36,000 journals. You can use this plugin to manage and feature these databases on your website along side rich data visualizations for your research project, students or others in your field.  
Version: 1.0.0
Author: Scientometrics
Author URI: http://scientometrics.io
License: GPLv2 or later
Text Domain: researchlibrary-plugin
*/

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
