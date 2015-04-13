<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link:       http://www.paradigma20.com
 * @since      0.0.1
 *
 * @package    Pd20_Wc_Suppliers_Brands
 * @subpackage Pd20_Wc_Suppliers_Brands/includes
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    Pd20_Wc_Suppliers_Brands
 * @subpackage Pd20_Wc_Suppliers_Brands/admin
 * @author:       Juan Román <jroman@paradigma20.com>
 */
class Pd20_Wc_Suppliers_Brands_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 * @var      string    $name    The ID of this plugin.
	 */
	private $name;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.0.1
	 * @var      string    $name       The name of the plugin.
	 * @var      string    $version    The version of this plugin.
	 */
	public function __construct( $name, $version ) {

		$this->name = $name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    0.0.1
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Pd20_Wc_Suppliers_Brands_Public_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pd20_Wc_Suppliers_Brands_Public_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->name, plugin_dir_url( __FILE__ ) . 'css/pd20-wc-suppliers-brands-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    0.0.1
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Pd20_Wc_Suppliers_Brands_Public_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pd20_Wc_Suppliers_Brands_Public_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->name, plugin_dir_url( __FILE__ ) . 'js/pd20-wc-suppliers-brands-public.js', array( 'jquery' ), $this->version, FALSE );

	}

}
