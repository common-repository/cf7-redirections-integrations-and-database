<?php

/**
 * A helper to debug
 *
 * @package         CF7_To_RID
 * @since           2.0.0
 */

defined( 'ABSPATH' ) || die( 'No scripts!' );

/**
 * Emulate dd function from laravel
 *
 * @SuppressWarnings(PHPMD)
 */
if ( ! function_exists( 'dd' ) ) {
    function dd( $param, $include_pre = true ) {
        echo $include_pre ? '<pre>' : '';
        print_r( $param );
        echo $include_pre ? '</pre>' : '';
        exit;
    }
}

/**
 * Emulate dump function from
 * laravel but write to logs
 */
if ( ! function_exists( 'dump' ) ) {
    function dump( $param ) {
        error_log( $param );
    }
}

