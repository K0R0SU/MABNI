<?php
/**
 * Plugin Name: Mabni – Page Builder
 * Description: A localized Gutenberg-based page builder with custom blocks and templates.
 * Version: 0.1.0
 * Author: Ahmad
 * Text Domain: mabni
 */

defined( 'ABSPATH' ) || exit();

require_once __DIR__ . '/inc/class-loader.php';

/**
 * Register all blocks located in the blocks directory.
 */
function mabni_register_blocks() {
    $dir = __DIR__ . '/blocks/';
    foreach ( glob( $dir . '*/block.json' ) as $block_json ) {
        register_block_type( dirname( $block_json ) );
    }
}
add_action( 'init', 'mabni_register_blocks' );

/**
 * Load plugin text domain for translations.
 */
function mabni_load_textdomain() {
    load_plugin_textdomain( 'mabni', false, basename( __DIR__ ) . '/languages' );
}
add_action( 'init', 'mabni_load_textdomain' );

/**
 * Enqueue shared assets.
 */
function mabni_enqueue_assets() {
    wp_enqueue_style( 'mabni-editor', plugins_url( 'assets/css/editor.css', __FILE__ ), array(), '0.1.0' );
    wp_enqueue_style( 'mabni-style', plugins_url( 'assets/css/style.css', __FILE__ ), array(), '0.1.0' );
    if ( is_rtl() ) {
        wp_enqueue_style( 'mabni-style-rtl', plugins_url( 'assets/css/style-rtl.css', __FILE__ ), array(), '0.1.0' );
    }
}
add_action( 'enqueue_block_assets', 'mabni_enqueue_assets' );
