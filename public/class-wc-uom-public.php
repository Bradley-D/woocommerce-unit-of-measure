<?php
/**
 * The public specific functionality for WooCommerce RRP.
 *
 * @author     Bradley Davis
 * @package    WooCommerce_RRP
 * @subpackage WooCommerce_RRP/public
 * @since      3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly.
endif;

/**
 * Public parent class that outputs everything.
 *
 * @since 3.0.0
 */
class WC_UOM_Public {
	/**
	 * The Constructor.
	 *
	 * @since 3.0.0
	 */
	public function __construct() {
		$this->wc_uom_public_activate();
	}

	/**
	 * Add all filter type actions.
	 *
	 * @since 3.0.0
	 */
	public function wc_uom_public_activate() {
		add_filter( 'woocommerce_get_price_html', array( $this, 'wc_uom_render_output' ), 10, 2 );
	}

	/**
	 * Render the output.
	 *
	 * @since 1.0.1
	 * @param float $price Gives access to product price.
	 * @return $price
	 */
	public function wc_uom_render_output( $price ) {
		global $post;
		// Check if uom text exists.
		$woo_uom_output = get_post_meta( $post->ID, '_woo_uom_input', true );
		// Check if variable OR UOM text exists.
		if ( $woo_uom_output ) :
			$price = $price . ' <span class="uom">' . esc_attr( $woo_uom_output, 'woocommerce-uom' ) . '</span>';
			return $price;
		else :
			return $price;
		endif;
	}
}

/**
 * Instantiate the class
 *
 * @since 3.0.0
 */
$wc_uom_public = new WC_UOM_Public();
