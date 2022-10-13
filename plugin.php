<?php
/**
 * Plugin Name: WP Gutenberg Block Starter
 * Description: A boilerplate plate plugin structure for WP Gutenberg Block Development
 * Author: Md. Rabiul Islam
 * Author URI: http://example.com
 * Text-Domain: wp-gutenberg-starter
 */
if( ! defined( 'ABSPATH' ) ) : exit(); endif;

final class WP_Your_Class_Name {

    const VERSION = '1.0.0';

    /**
     * Construct Function
     */
    private function __construct() {
        $this->plugin_constants();
        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }

    /**
     * Define plugin constants
     */
    public function plugin_constants() {
        define( 'PREFIX_VERSION', self::VERSION );
        define( 'PREFIX_PLUGIN_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
        define( 'PREFIX_PLUGIN_URL', trailingslashit( plugins_url( '/', __FILE__ ) ) );
    }

    /**
     * Singletone Instance
     */
    public static function init() {
        static $instance = false;
        if( ! $instance ) {
            $instance = new self();
        }
        return $instance;
    }

    /**
     * Plugin Init
     */
    public function init_plugin() {
        $this->enqueue_scripts();
    }

    /**
     * Enqueue Scripts
     */
    public function enqueue_scripts() {
        add_action( 'enqueue_block_editor_assets', [ $this, 'register_block_editor_assets' ] );
        add_action( 'admin_enqueue_scritps', [ $this, 'register_admin_scripts' ] );
        add_action( 'wp_enqueue_scritps', [ $this, 'register_public_scripts' ] );
        add_action( 'init', [ $this, 'register_blocks' ] );
    }

    /**
     * Regsiter Block Editor Assets
     */
    public function register_block_editor_assets() {

        $index_assets = PREFIX_PLUGIN_PATH . '/build/index.asset.php';

        if ( file_exists( $index_assets ) ) {
            $asstes = require_once $index_assets;
            wp_enqueue_script(
                'prefix-wp-gutenberg-plugin-starter',
                PREFIX_PLUGIN_URL . '/build/index.js',
                $asstes['dependencies'],
                $asstes['version'],
                true
            );
        }
    }

    /**
     * Register Admin Scritps
     */
    public function register_admin_scripts() {
        wp_enqueue_script(
            'prefix-editor',
            PREFIX_PLUGIN_URL . '/assets/js/editor.js',
            rand(),
            true
        );

        wp_enqueue_style(
            'prefix-editor',
            PREFIX_PLUGIN_URL . '/assets/css/editor.css',
            [],
            false,
            'all'
        );
    }

    /**
     * Register Public Scritps
     */
    public function register_public_scripts() {
        wp_enqueue_script(
            'prefix-public',
            PREFIX_PLUGIN_URL . '/assets/js/scripts.js',
            rand(),
            true
        );

        wp_enqueue_style(
            'prefix-public',
            PREFIX_PLUGIN_URL . '/assets/css/style.css',
            [],
            false,
            'all'
        );
    }

    /**
     * Register Blocks
     */
    public function register_blocks() {
        register_block_type( 'prefix-blocks/block', [
            'style'          => 'prefix-public',
            'editor_style'   => 'prefix-editor',
            'editor_scripts' => 'prefix-wp-gutenberg-plugin-starter'
        ] );
    }

    /**
     *
     */

    function my_mario_block_category( $categories, $post ) {
        return array_merge(
            $categories,
            array(
                array(
                    'slug' => 'mario-blocks',
                    'title' => __( 'Mario Blocks', 'mario-blocks' ),
                ),
            )
        );
    }
    // add_filter( 'block_categories', 'my_mario_block_category', 10, 2);
}

/**
 * Init Main Plugin
 */
function prefix_run_plugin() {
    return WP_Your_Class_Name::init();
}
// Run the plugin
prefix_run_plugin();

// Blocks.
require_once PREFIX_PLUGIN_PATH . '/inc/blocks/index.php';

// Patterns.
require_once PREFIX_PLUGIN_PATH . '/inc/patterns/index.php';