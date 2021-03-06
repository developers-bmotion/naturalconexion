<?php

class WCCT_Compatibility_With_WOOMULTI_CURRENCY_BY_TIVNETINC {

	public function __construct() {

		/**
		 * Checking If Multi Currency Plugin is installed or not
		 */
		if ( false === defined( 'WOOCOMMERCE_MULTICURRENCY_VERSION' ) && false === defined( 'WOOMULTI_CURRENCY_F_VERSION' ) ) {
			return;
		}

		/**
		 * Removing our filters that excludes cart prices discounts by setting them one time
		 * But in this case we want to opt the legacy way of applying discount.
		 */
		remove_filter( 'woocommerce_add_cart_item', array( WCCT_Core()->cart, 'maybe_setup_data' ), 99, 2 );
		remove_filter( 'woocommerce_get_cart_item_from_session', array( WCCT_Core()->cart, 'maybe_setup_data' ), 19, 2 );

	}


}

new WCCT_Compatibility_With_WOOMULTI_CURRENCY_BY_TIVNETINC();
