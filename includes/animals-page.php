<?php

function create_page(){
    $post = array(
        'comment_status' =>  'close',
        'post_name' => 'Animals',
        'post_status' =>  'publish' ,
        'post_title' => 'Animals',
        'post_type' =>  'page',
    );

    if (  get_page_by_title( 'Animals' ) ) {
        return;
    }
// Insert the post into the database
    wp_insert_post( $post );
}


