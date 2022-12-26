<?php
/**
 * Register Cover Pattern.
 */

function register_prefix_cover_pattern() {
    register_block_pattern(
        'prefix-patterns/cover',
        array(
            'title'       => __( 'Cover', 'my-plugin' ),
            'description' => __( 'Cover Patterns', 'my-plugin' ),
            'categories'    => [ 'header' ],
            'content'     => '<!-- wp:cover {"url":"https://i.picsum.photos/id/866/1900/600.jpg?hmac=1iqRUzhoCGkBH6yRzqXIFS9cfDK2OoOX15J4BY9zmk4","id":54,"dimRatio":50,"isDark":false,"align":"full"} -->
            <div class="wp-block-cover alignfull is-light"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-54" alt="" src="https://i.picsum.photos/id/866/1900/600.jpg?hmac=1iqRUzhoCGkBH6yRzqXIFS9cfDK2OoOX15J4BY9zmk4" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","textColor":"background","fontSize":"large"} -->
            <p class="has-text-align-center has-background-color has-text-color has-large-font-size"><strong>Lorem ipsum dolor sit amet id erat aliquet diam ullamcorper tempus massa eleifend vivamus</strong></p>
            <!-- /wp:paragraph --></div></div>
            <!-- /wp:cover -->',
        )
    );
}
add_action( 'init', 'register_prefix_cover_pattern' );