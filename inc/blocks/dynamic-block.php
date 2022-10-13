<?php
/**
 * Page Grid Block JSX Renderer
 */
function prefix_dynamic_block_jsx_renderer() {
    register_block_type( 'prefix-blocks/dynamic-block', [
        'attributes'=> [],
        'render_callback' => 'prefix_dynamic_block_render_callback'
    ] );
}
add_action( 'init', 'prefix_dynamic_block_jsx_renderer' );

function prefix_dynamic_block_render_callback( $attributes ) {
    return 'Dynamic Blocks';
}