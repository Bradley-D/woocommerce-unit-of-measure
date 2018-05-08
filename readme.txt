=== WooCommerce Unit Of Measure ===
Contributors: Brad Davis
Tags: woocommerce, woocommerce-price
Requires at least: 4.0
Tested up to: 4.9.5
Stable tag: 2.1
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

WooCommerce Unit Of Measure allows you to add a unit of measure, or any text after the price of a WooCommerce product.

== Description ==
WooCommerce Unit Of Measure allows you to add a unit of measure (UOM), or any text you require after the price in WooCommerce.

= Requires WooCommerce to be installed. =
= WooCommerce Compatibility Test: v3.3.5 =

== Installation ==
= WooCommerce Compatibility Test: v3.3.5 =
1. Upload WooCommerce Image Hover to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to "Inventory" tab in the product data area and put in your unit of measure
4. Publish or update your product
5. That's it.

== Frequently Asked Questions ==
= Where will the unit of measure output on the product? =
After the price.

= Can I add a unit of measure to a simple or variation product? =
Yes you can. At this stage you can not change the unit of measure per variation but you can add a "global" (displays on all variations) like unit for the product.

= Can I upload the unit of measure text when with WooCommerce CSV Import Suite? =
Yes you can, follow these steps:
- Add a column to your Import Product CSV document
- Add the following title to your new column, meta:_woo_uom_input
- Fill your column with your required unit of measure or whatever text you want to add after the price for your product

= Will this work with my theme? =
Hard to say really, so many themes to test so little time.

== Changelog ==

= 2.1 =
* Added conditional to determine product type
* Removed conditional for uom pro...oh it is still on the way

= 2.0 =
* Tested on WordPress v4.9.5
* Tested on WooCommerce v3.3.5
* Refactored plugin structure

= 1.4 =
* Tested on WordPress 4.9
* Tested on WooCommerce 3.2.4
* Added class to uom string

= 1.3 =
* Added check for uom pro... yeah its on the way

= 1.2 =
* Tested on WordPress 4.8.2
* Tested on WooCommerce 3.2.1
* Add WooCommerce header version check

= 1.1 =
* Moved uom input to Inventory tab so it is available on simple and variable products
* Removed the &nbsp; from the output for accessibility reasons
* Updated some FAQ and descriptions

= 1.0.2 =
* Removed if empty check on save so unit of measure can be removed

= 1.0.1 =
* Removed error on line 96, passed a variable that was not needed to the woo_uom_render_output function
* Removed the conditional statement from the constructor
* Renamed the return variable in the woo_uom_render_output function

= 1.0 =
* Original commit and released to the world
