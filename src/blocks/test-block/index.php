<?php
function register_test_block() {
    register_block_type(
        PREFIX_PLUGIN_PATH . '/build/blocks/test-block',
        [
            'render_callback' => 'render_test_callback'
        ]
    );
}
add_action( 'init', 'register_test_block' );

/**
 * Render Callback Function.
 *
 * @param array $attributes Block attributes.
 * @return string Rendered Html.
 */
function render_test_callback( $attributes = [] ) {
    return 'Test block rendred';
}