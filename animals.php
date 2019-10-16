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
require_once(plugin_dir_path(__FILE__) . 'includes/animals-page.php');
register_activation_hook(__FILE__, 'create_page');

require_once(plugin_dir_path(__FILE__) . '/includes/animals-templates.php');
add_filter( 'page_template', 'animals_page_template' );

// Load Scripts
require_once(plugin_dir_path(__FILE__) . '/includes/animals-scripts.php');
//

// Check if admin and include admin scripts
if ( is_admin() ) {
    // Load Custom Post Type
    require_once(plugin_dir_path(__FILE__) . '/includes/animals-cpt.php');

    // Load Post Fields
    require_once(plugin_dir_path(__FILE__) . '/includes/animals-fields.php');
}
require_once(plugin_dir_path(__FILE__) . '/includes/animals-ajax.php');

add_action('wp_ajax_add-animal', 'add_animal_from_page');
add_action('wp_ajax_del-animal', 'delete_animal_from_page');
add_action('wp_ajax_edit-animal', 'edit_animal_from_page');