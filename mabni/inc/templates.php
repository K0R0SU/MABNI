<?php
/**
 * Template library utilities and REST endpoint.
 */

defined( 'ABSPATH' ) || exit();

/**
 * Return the template directory path.
 *
 * @return string
 */
function mabni_get_template_dir() {
    return plugin_dir_path( __DIR__ ) . 'templates/';
}

/**
 * REST endpoint exposing bundled templates.
 */
add_action(
    'rest_api_init',
    function () {
        register_rest_route(
            'mabni/v1',
            '/templates',
            array(
                'methods'  => 'GET',
                'callback' => function () {
                    $templates = array();
                    foreach ( glob( mabni_get_template_dir() . '*.json' ) as $file ) {
                        $templates[] = basename( $file, '.json' );
                    }
                    return rest_ensure_response( $templates );
                },
            )
        );
    }
);
