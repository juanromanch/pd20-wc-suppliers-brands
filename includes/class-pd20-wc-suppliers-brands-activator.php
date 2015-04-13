<?php

/**
 * Fired during plugin activation
 *
 * @link:       http://www.paradigma20.com
 * @since      0.0.1
 *
 * @package    Pd20_Wc_Suppliers_Brands
 * @subpackage Pd20_Wc_Suppliers_Brands/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      0.0.1
 * @package    Pd20_Wc_Suppliers_Brands
 * @subpackage Pd20_Wc_Suppliers_Brands/includes
 * @author:       Juan Román <jroman@paradigma20.com>
 */
class Pd20_Wc_Suppliers_Brands_Activator {

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    0.0.1
     */
    public static function activate() {
        
        self::check_wp_version('3.3');
        self::check_wc_active();
    }
    
    /**
     * Check if WorPress version is 3.3 or higer
     * 
     * @since 0.0.1
     */
    private static function check_wp_version($param) {
        global $wp_version;
        
        if (version_compare($wp_version, $param, "<")) {
            wp_die("Suppliers & Brands for WooCommerce requires WordPress 3.3 or higher in order to work. Please upgrade WordPress and try again.<br /><br />Back to <a href='" . admin_url() . "'>WordPress Admin</a>.");
        }        
        
    }
    
    /**
     * Check if WooCommerce is active.
     * 
     * @since 0.0.1
     */    
    private static function check_wc_active() {
        
            if (!class_exists('Woocommerce')) {
            wp_die( "Suppliers & Brands for WooCommerce requires WooCommerce in order to work. Please install WooCommerce and try again.<br /><br />Back to <a href='" . admin_url() . "'>WordPress Admin</a>.");
        }

        
    }
}
