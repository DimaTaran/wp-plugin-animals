<?php
function add_animal_from_page(){
   if( wp_verify_nonce( $_POST['nonce'], 'animal-check') ) {
       $dates = ['title', 'color', 'age'];
       foreach ( $dates as $date ) {
           $$date = sanitize_text_field( $_POST[$date] );
       }

       $post = array(
           'comment_status' =>  'close',
           'post_status' =>  'publish' ,
           'post_title' => $title,
           'post_type' =>  'animal',
       );

       // Insert the post into the database
       $post_id = wp_insert_post( $post );
       update_post_meta( $post_id, 'animals_color', $color );
       update_post_meta( $post_id, 'animals_age', $age );
       print_r( json_encode( ['title' => $title, 'color' => $color, 'age' => $age] ) );
       wp_die();
   } else wp_die( 'Security failed' );
}

function delete_animal_from_page(){
    if( wp_verify_nonce( $_POST['nonce'], 'animal-check') ) {

        // Insert the post into the database
        $post_id = sanitize_text_field( $_POST['postID'] );

        delete_post_meta( $post_id, 'animals_color' );
        delete_post_meta( $post_id, 'animals_age');
        wp_delete_post( $post_id );
        wp_die('Deleted');
    } else wp_die( 'Security failed' );
}
