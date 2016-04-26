<?php
/*
Plugin Name: WP REST API (V2) Woocommerce endpoints
Description: WP REST API (V2) Modifications for Woocommerce endpoints.
Author: Oleg Kostin
Version: 1.1
Author URI: http://pmr.io
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) :

    /**
     * Check if WP REST API is active
     **/
    if ( in_array( 'rest-api/plugin.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) :


        if ( ! function_exists ( 'wp_rest_is_shop_init' ) ) :

            /**
             * Init JSON REST API is_shop endpoint.
             *
             * @since 1.0.0
             */
            function wp_rest_is_shop_init() {
                register_rest_field(
                    'page',
                    'is_shop',
                    array(
                        'get_callback' => 'wp_rest_is_shop',
                    )
                );
            }

            /**
             * Handler for updating page data with is_shop.
             *
             * @since 1.0.0
             *
             * @param array $object The object from the response
             * @param string $field_name Name of field
             * @param WP_REST_Request $request Current request
             *
             * @return bool
             */
            function wp_rest_is_shop( $object, $field_name, $request ) {
                return wc_get_page_id( 'shop' ) === $object['id'];
            }

            add_action( 'init', 'wp_rest_is_shop_init' );

        endif;

        if ( ! function_exists ( 'wp_rest_is_cart_init' ) ) :

            /**
             * Init JSON REST API is_cart endpoint.
             *
             * @since 1.0.0
             */
            function wp_rest_is_cart_init() {
                register_rest_field(
                    'page',
                    'is_cart',
                    array(
                        'get_callback' => 'wp_rest_is_cart',
                    )
                );
            }

            /**
             * Handler for updating page data with is_cart.
             *
             * @since 1.0.0
             *
             * @param array $object The object from the response
             * @param string $field_name Name of field
             * @param WP_REST_Request $request Current request
             *
             * @return bool
             */
            function wp_rest_is_cart( $object, $field_name, $request ) {
                return wc_get_page_id( 'cart' ) === $object['id'];
            }

            add_action( 'init', 'wp_rest_is_cart_init' );

        endif;

        if ( ! function_exists ( 'wp_rest_is_checkout_init' ) ) :

            /**
             * Init JSON REST API is_checkout endpoint.
             *
             * @since 1.0.0
             */
            function wp_rest_is_checkout_init() {
                register_rest_field(
                    'page',
                    'is_checkout',
                    array(
                        'get_callback' => 'wp_rest_is_checkout',
                    )
                );
            }

            /**
             * Handler for updating page data with is_checkout.
             *
             * @since 1.0.0
             *
             * @param array $object The object from the response
             * @param string $field_name Name of field
             * @param WP_REST_Request $request Current request
             *
             * @return bool
             */
            function wp_rest_is_checkout( $object, $field_name, $request ) {
                return wc_get_page_id( 'checkout' ) === $object['id'];
            }

            add_action( 'init', 'wp_rest_is_checkout_init' );

        endif;

        if ( ! function_exists ( 'wp_rest_is_account_page_init' ) ) :

            /**
             * Init JSON REST API is_account_page endpoint.
             *
             * @since 1.0.0
             */
            function wp_rest_is_account_page_init() {
                register_rest_field(
                    'page',
                    'is_account_page',
                    array(
                        'get_callback' => 'wp_rest_is_account_page',
                    )
                );
            }

            /**
             * Handler for updating page data with is_account_page.
             *
             * @since 1.0.0
             *
             * @param array $object The object from the response
             * @param string $field_name Name of field
             * @param WP_REST_Request $request Current request
             *
             * @return bool
             */
            function wp_rest_is_account_page( $object, $field_name, $request ) {
                return wc_get_page_id( 'myaccount' ) === $object['id'];
            }

            add_action( 'init', 'wp_rest_is_account_page_init' );

        endif;


    endif;


endif;
