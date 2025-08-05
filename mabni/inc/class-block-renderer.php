<?php
/**
 * Example block renderer class.
 */

defined( 'ABSPATH' ) || exit();

class Mabni_Block_Renderer {
    /**
     * Render callback for the section block.
     *
     * @param array  $attributes Block attributes.
     * @param string $content    Inner blocks markup.
     * @return string
     */
    public static function render_section( $attributes, $content ) {
        $class = isset( $attributes['className'] ) ? $attributes['className'] : '';
        return sprintf( '<div class="mabni-section %s">%s</div>', esc_attr( $class ), $content );
    }
}
