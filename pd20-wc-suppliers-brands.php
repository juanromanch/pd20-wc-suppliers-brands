<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * this starts the plugin.
 *
 * @link:             http://www.paradigma20.com
 * @since             0.0.1
 * @package           Pd20_Wc_Suppliers_Brands
 * @wordpress-plugin
 * Plugin Name:       Suppliers & Brands for WooCommerce
 * Plugin URI:        http://www.paradigma20.com
 * Description:       Adds brands an suppliers information to WooCommerce
 * Version:           0.0.1
 * Author:            Juan Román
 * Author URI:        http://www.paradigma20.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pd20-wc-suppliers-brands
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_pd20_wc_suppliers_brands() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pd20-wc-suppliers-brands-activator.php';
	Pd20_Wc_Suppliers_Brands_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_pd20_wc_suppliers_brands() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pd20-wc-suppliers-brands-deactivator.php';
	Pd20_Wc_Suppliers_Brands_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_pd20_wc_suppliers_brands' );
register_deactivation_hook( __FILE__, 'deactivate_pd20_wc_suppliers_brands' );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require_once plugin_dir_path(__FILE__) . 'includes/class-pd20-wc-suppliers-brands.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.0.1
 */
//$pd20_wcpb_plugin = plugin_basename(__FILE__);

function run_Pd20_Wc_Suppliers_Brands() {
    $plugin = new Pd20_Wc_Suppliers_Brands(__FILE__);
    $plugin->run();
}

run_Pd20_Wc_Suppliers_Brands();