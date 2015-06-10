<?php
/*
Plugin Name: WooCommerce Unit Of Measure
Plugin URI: 
Description: WooCommerce Unit Of Measure allows the user to add a unit of measure after the price on WooCommerce products
Version: 1.0
Author: Bradley Davis
Author URI: http://bradley-davis.com
License: GPL3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Text Domain: woocommerce-uom

@author		 Bradley Davis
@category    Admin
@package	 WooCommerce RRP
@since		 1.0

WooCommerce Unit Of Measure. A Plugin that works with the WooCommerce plugin for WordPress.
Copyright (C) 2014 Bradley Davis - bd@bradley-davis.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see http://www.gnu.org/licenses/gpl-3.0.html.
*/
if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;

/**
 * Check if WooCommerce is active
 * @since 1.0
 */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) :
	class Woo_UOM {
		/**
		 * The Constructor!
		 * @since 1.0
		 */
		public function __construct() {
			// If admin or manager show uom input fields on product and save or update the input field
			// if ( is_admin() || shop_manager() ) :
				add_action( 'woocommerce_product_options_general_product_data', array( &$this, 'woo_uom_product_fields' ) );
				add_action( 'woocommerce_process_product_meta', array( &$this, 'woo_uom_save_field_input' ) );
			// endif;
			// Render the uom field output on the frontend
			add_filter( 'woocommerce_get_price_html', array( &$this, 'woo_uom_render_output' ) );
		}

		/**
		 * Add the custom fields or the UOM to the prodcut general tab
		 * @since 1.0
		 */
		public function woo_uom_product_fields() {
		  global $woocommerce, $post;
		  
			echo '<div class="wc_uom_input">'; 
				// Woo_UOM fields will be created here. 
				woocommerce_wp_text_input( 
					array( 
						'id'          => '_woo_uom_input', 
						'label'       => __( 'Unit of Measure', 'woo_uom' ), 
						'placeholder' => '',
						'desc_tip'    => 'true',
						'description' => __( 'Enter your unit of measure for this product here.', 'woo_uom' ) 
					)
				);
			echo '</div>';
		}

		/**
		 * Update the database with the new input
		 * @since 1.0
		 */
		public function woo_uom_save_field_input( $post_id ){
			// Woo_UOM text field
			$woo_uom_input = $_POST['_woo_uom_input'];
			if ( ! empty( $woo_uom_input ) ) :
				update_post_meta( $post_id, '_woo_uom_input', esc_attr( $woo_uom_input ) );
			endif;
		}

		/**
		 * Render the output
		 * @since 1.0
		 * @return $price + UOM string
		 */
		public function woo_uom_render_output( $price, $product ) {
			global $woocommerce, $post;
			// Display Custom Field Value
			$somenewvar = get_post_meta( $post->ID, '_woo_uom_input', true );

			return $price . '&nbsp;' . $somenewvar;
		}
	} // END class Woo_UOM

	// Instantiate the class
	$woo_uom = new Woo_UOM();

endif; // If WC is active