<?php
function animals_add_fields_metabox() {
    add_meta_box(
        'animals_fields',
        __('Animals Details'),
        'animals_fields_callback',
        'animal',
        'normal',
        'default'
    );
}

add_action('add_meta_boxes', 'animals_add_fields_metabox');

// Display meta Box Content
function animals_fields_callback( $post ) {
    wp_nonce_field(basename(__FILE__), 'animals_nonce');
    $animals_stored_meta = get_post_meta($post->ID);
    ?>
    <div class="wrap animals-form">
        <div class="form-group">
            <label for="animals-color"><?php esc_html_e('Animals Color', 'animals-domain'); ?></label>
            <input type="text" name="animals_color" id="animals-color" value="<?php if (! empty($animals_stored_meta['animals_color'])) echo esc_attr($animals_stored_meta['animals_color'][0]); ?>">
        </div>
        <div class="form-group">
            <label for="animals-age"><?php esc_html_e('Animals Age', 'animals-domain'); ?></label>
            <input type="number" name="animals_age" id="animals-age" value="<?php if (! empty($animals_stored_meta['animals_age'])) echo esc_attr($animals_stored_meta['animals_age'][0]); ?>">
        </div>
    </div>
    <?php
}

function animals_save( $post_id ) {
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = (isset($_POST['animals_nonce']) && wp_verify_nonce($_POST['animals_nonce'], basename(__FILE__))) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    if ( isset($_POST['animals_color']) ) {
        update_post_meta($post_id, 'animals_color', sanitize_text_field($_POST['animals_color']));
    }

    if ( isset($_POST['animals_age']) ) {
        update_post_meta($post_id, 'animals_age', sanitize_text_field($_POST['animals_age']));
    }
}

add_action( 'save_post', 'animals_save' );
