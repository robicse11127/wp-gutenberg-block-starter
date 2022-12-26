<?php
/**
 * Plugin Name: WP Gutenberg Block Starter
 * Description: A boilerplate plate plugin structure for WP Gutenberg Block Development
 * Author: Md. Rabiul Islam
 * Author URI: http://example.com
 * Text-Domain: wp-gutenberg-starter
 */
if( ! defined( 'ABSPATH' ) ) : exit(); endif;

define( 'PREFIX_PLUGIN_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'PREFIX_PLUGIN_URL', trailingslashit( plugins_url( '/', __FILE__ ) ) );

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
        $this->register_blocks();
        $this->register_patterns();
        add_filter( 'block_categories', [ $this, 'prefix_block_category' ], 10, 2);
    }

    /**
     * Enqueue Scripts
     */
    public function enqueue_scripts() {
        add_action( 'enqueue_block_editor_assets', [ $this, 'register_block_editor_assets' ] );
        add_action( 'admin_enqueue_scritps', [ $this, 'register_admin_scripts' ] );
        add_action( 'wp_enqueue_scritps', [ $this, 'register_public_scripts' ] );
    }

    /**
     * Regsiter Block Editor Assets
     */
    public function register_block_editor_assets() {}

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
        $prefix_block_files = glob( PREFIX_PLUGIN_PATH . '/src/blocks/**/index.php' );

        foreach( $prefix_block_files as $prefix_block ) {
            require_once $prefix_block;
        }
    }

    /**
     * Register Patterns.
     */
    public function register_patterns() {
        require_once PREFIX_PLUGIN_PATH . '/inc/patterns/index.php';
    }


    /**
     * Register custom block category.
     */
    public function prefix_block_category( $categories, $post ) {
        return array_merge(
            $categories,
            array(
                array(
                    'slug' => 'prefix-blocks',
                    'title' => __( 'Prefix Blocks', 'prefix-blocks' ),
                ),
            )
        );
    }
}

/**
 * Init Main Plugin
 */
function prefix_run_plugin() {
    return WP_Your_Class_Name::init();
}
// Run the plugin
prefix_run_plugin();
