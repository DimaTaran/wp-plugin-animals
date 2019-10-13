<?php


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

