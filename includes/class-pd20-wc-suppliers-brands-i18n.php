<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that its ready for translation.
 *
 * @link:       http://www.paradigma20.com
 * @since      0.0.1
 *
 * @package    Pd20_Wc_Suppliers_Brands
 * @subpackage Pd20_Wc_Suppliers_Brands/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that its ready for translation.
 *
 * @since      0.0.1
 * @package    Pd20_Wc_Suppliers_Brands
 * @subpackage Pd20_Wc_Suppliers_Brands/includes
 * @author:       Juan Román <jroman@paradigma20.com>
 */
class Pd20_Wc_Suppliers_Brands_i18n {

	/**
	 * The domain specified for this plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 * @var      string    $domain    The domain identifier for this plugin.
	 */
	private $domain;

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    0.0.1
	 */
	public function load_plugin_textdomain() {
//wp_die(var_dump(
		load_plugin_textdomain(
			$this->domain,
			FALSE,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		//))
        );

	}

	/**
	 * Set the domain equal to that of the specified domain.
	 *
	 * @since    0.0.1
	 * @param    string    $domain    The domain that represents the locale of this plugin.
	 */
	public function set_domain( $domain ) {
		$this->domain = $domain;
	}

}
