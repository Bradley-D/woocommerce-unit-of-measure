<?php
if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;

class Woo_Uom_Output {

  /**
   * The Constructor!
   * @since 1.0.1
   */
  public function __construct() {
    $this->uom_add_actions_filters();
  }

  /**
   * Add actions and filters.
   * @since 1.0.1
   */
  function uom_add_actions_filters() {
    add_filter( 'woocommerce_get_price_html', array( &$this, 'woo_uom_render_output' ) );
  }

  /**
   * Render the output
   * @since 1.0.1
   * @return $price + UOM string
   */
	 function woo_uom_render_output( $price ) {
    global $woocommerce, $post;
    // Check if uom_pro is installed
    if ( in_array( 'wc-unit-measure-pro/wc-unit-measure-pro.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) :
      return $price;
    else :
      // Display Custom Field Value
      $woo_uom_output = get_post_meta( $post->ID, '_woo_uom_input', true );
      return $price . ' ' . '<span class="uom">' . $woo_uom_output . '</span>';
    endif;
  }

}
// Instantiate the class
$woo_uom_output = new Woo_Uom_Output();
