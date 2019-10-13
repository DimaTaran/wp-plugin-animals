<?php

// Check if admin and add admin scripts
if ( is_admin() ) {
	// Add Admin Scripts
	function animals_add_admin_scripts(){
	    	wp_enqueue_style('animals-main-admin-style', plugins_url() . '/animals/css/style-admin.css');
	    	wp_enqueue_script('animals-main-script',plugins_url().'/animals/js/main.js', array('jquery'));
	}

	add_action( 'admin_init','animals_add_admin_scripts' );
}


// Add Scripts
function animals_add_scripts(){
    wp_enqueue_style('animals-main-style', plugins_url() . '/animals/css/style.css' );
    wp_enqueue_script('animals-main-script',plugins_url().'/animals/js/main.js', array('jquery') );
}

add_action( 'wp_enqueue_scripts','animals_add_scripts' );