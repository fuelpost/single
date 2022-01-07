<?php
/**
 * WooCommerce Support
 *
 * @package business
 */

// remove onsale
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

// remove sidebar
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// remove ratings on store page
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

// remove upsell
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' , 10 );

if ( ! function_exists( '_disable_jetpack_infinite_scroll_conditionally' ) ) {
	/**
	 * _disable_jetpack_infinite_scroll_conditionally Disables infinite scroll on WooCommerce pages
	 * Original code credit https://gist.github.com/rspublishing/6b0b2d2eabafa514bd48045d1860f24b
	 */
	function _disable_jetpack_infinite_scroll_conditionally() {
		if ( true === is_woocommerce() ) {
			remove_theme_support( 'infinite-scroll' );
		}
	}
	add_action( 'template_redirect', '_disable_jetpack_infinite_scroll_conditionally', 9 );
}

/*
 * Remove Related Products
 * 
 * Clear the query arguments for related products so none show.
 * Add this code to your theme functions.php file.  
 */
function business_remove_related_products( $args ) {
	return array();
}
add_filter('woocommerce_related_products_args','business_remove_related_products', 10); 
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );

