<?php

function animals_page_template( $page_template )
{
    if ( is_page( 'animals' ) ) {
        $page_template = plugin_dir_path(__FILE__) . '/templates/page-animals.php';
    }
    return $page_template;
}
