<?php
/*
Plugin Name: WooCommerce Unit Of Measure
Plugin URI:
Description: WooCommerce Unit Of Measure allows the user to add a unit of measure after the price on WooCommerce products
Version: 2.4.2
Author: Bradley Davis
Author URI: http://bradley-davis.com
License: GPL3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Text Domain: woocommerce-uom
WC requires at least: 3.0.0
WC tested up to: 3.4.4

@author		 Bradley Davis
@category   Admin
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
     * @since 1.0.1
     */
    public function __construct() {
      $this->uom_class_loader();
    }

    /**
     * Add the classes that make the magic
     * @since 2.0
     */
    function uom_class_loader() {
      require_once trailingslashit( dirname( __FILE__ ) ) . 'classes/class-uom-product-input.php';
      require_once trailingslashit( dirname( __FILE__ ) ) . 'classes/class-uom-product-output.php';
    }

  } // END class Woo_UOM

	// Instantiate the class
	$woo_uom = new Woo_UOM();

endif; // If WC is active
