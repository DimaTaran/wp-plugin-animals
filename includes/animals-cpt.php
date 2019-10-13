<?php

// Create Custom Post Type
function type_register_animals(){
    $singular_name = apply_filters('animals_label_single', 'Animal');
    $plural_name = apply_filters('animals_label_plural', 'Animals');

    $labels = array(
        'name' => $plural_name,
        'singular_name' => $singular_name,
        'add_new' 		=> __('Add New'),
        'add_new_item'	=> 'Add New '.$singular_name,
        'edit'			=> 'Edit',
        'edit_item'		=> 'Edit '.$singular_name,
        'new_item'		=> 'New '.$singular_name,
        'view'			=> 'View',
        'view_item'		=> 'View '.$singular_name,
        'search_items'	=> 'Search '.$plural_name,
        'not_found'		=> 'No '.$plural_name.' Found',
        'not_found_in_trash'		=> 'No '.$plural_name.' Found',
        'menu_name'		=> $plural_name
    );

    $args = apply_filters('animals_args', array(
        'labels'		=> $labels,
        'description'	=> 'Animals by category',
        'taxonomies'	=> array('category'),
        'public'		=> true,
        'show_in_menu'	=> true,
        'menu_position'	=> 5,
        'menu_icon'		=> null,
        'show_in_nav_menus'	=> true,
        'capability_type'	=> 'post',
        'rewrite'               => array('slug' => 'animals', 'with_front' => FALSE),
        'supports'		=>	array(
            'title'
        )
    ));

    // Register Post Type
    register_post_type( 'animal', $args );
    flush_rewrite_rules();
}

add_action( 'init', 'type_register_animals');

// Create Breed Taxonomy
function animals_taxonomy(){
    register_taxonomy(
        'breeds',
        'animal',
        array(
            'label' => 'Breeds',
            'hierarchical'          => true,
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'breeds',
                'with_front' => false
            )
        )
    );
}

add_action( 'init', 'animals_taxonomy' );

function animals_load_templates( $template ){
    if ( get_query_var('post_type') == 'animal' ) {
        $new_template = plugin_dir_path(__FILE__). 'templates/single-animal.php';
        if('' != $new_template){
            return $new_template;
        }
    }

    return $template;
}

add_filter('template_include', 'animals_load_templates');