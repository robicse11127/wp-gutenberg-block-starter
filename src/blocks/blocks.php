<?php

$prefix_block_files = glob( PREFIX_PLUGIN_PATH . '/src/blocks/**/index.php' );

foreach( $prefix_block_files as $prefix_block ) {
    require_once $prefix_block;
}