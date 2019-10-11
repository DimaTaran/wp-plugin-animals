<?php
/**
* Plugin Name: Animals
* Description: Create Post type Animal and display It on Page
* Version: 1.0
* Author: Dmitry Taran
*
 **/



// Exit If Accessed Directly
if(!defined('ABSPATH')){
    exit;
}

//// Load Scripts
//require_once(plugin_dir_path(__FILE__) . '/includes/youtube-vid-gallery-scripts.php');
//
//// Load Shortcodes
//require_once(plugin_dir_path(__FILE__) . '/includes/youtube-vid-gallery-shortcodes.php');

// Check if admin and include admin scripts
if ( is_admin() ) {
    // Load Custom Post Type
    require_once(plugin_dir_path(__FILE__) . '/includes/animals-cpt.php');

//    // Load Settings
//    require_once(plugin_dir_path(__FILE__) . '/includes/youtube-vid-gallery-settings.php');
//
    // Load Post Fields
    require_once(plugin_dir_path(__FILE__) . '/includes/animals-fields.php');
}

