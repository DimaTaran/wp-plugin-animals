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

function create_page(){
    $post = array(

//  'menu_order' => [ <order> ] //If new post is a page, sets the order should it appear in the tabs.
//  'page_template' => [ <template file> ] //Sets the template for the page.
        'comment_status' =>  'open',  // 'closed' means no comments.




//  'post_content' => [ <the text of the post> ] //The full text of the post.

        'post_name' => 'Animals', // The name (slug) for your post

        'post_status' =>  'publish' , //Set the status of the new post.
        'post_title' => 'Animals', //The title of your post.
        'post_type' =>  'page',  //Sometimes you want to post a page.

    );

// Insert the post into the database
    wp_insert_post( $post );

}
register_activation_hook(__FILE__, 'create_page');


add_filter( 'page_template', 'animals_page_template' );
function animals_page_template( $page_template )
{
    if ( is_page( 'animals' ) ) {
        $page_template = plugin_dir_path(__FILE__) . '/includes/templates/page-animals.php';
    }
    return $page_template;
}

// Load Scripts
require_once(plugin_dir_path(__FILE__) . '/includes/animals-scripts.php');
//
//// Load Shortcodes
//require_once(plugin_dir_path(__FILE__) . '/includes/youtube-vid-gallery-shortcodes.php');

// Create Page
//var_dump(plugin_dir_path(__FILE__) . '/includes/animals-page.php');
//require_once(plugin_dir_path(__FILE__) . 'includes/animals-page.php');



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

