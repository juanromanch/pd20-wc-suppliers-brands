<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the dashboard.
 *
 * @link:       http://www.paradigma20.com
 * @since      0.0.1
 *
 * @package    Pd20_Wc_Suppliers_Brands
 * @subpackage Pd20_Wc_Suppliers_Brands/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, dashboard-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      0.0.1
 * @package    Pd20_Wc_Suppliers_Brands
 * @subpackage Pd20_Wc_Suppliers_Brands/includes
 * @author:       Juan Román <jroman@paradigma20.com>
 */
class Pd20_Wc_Suppliers_Brands {

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    0.0.1
     * @access   protected
     * @var      Pd20_Wc_Suppliers_Brands_Loader    $loader    Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since    0.0.1
     * @access   protected
     * @var      string    $plugin_id    The string used to uniquely identify this plugin.
     */
    protected $plugin_id;

    /**
     * The current version of the plugin.
     *
     * @since    0.0.1
     * @access   protected
     * @var      string    $version    The current version of the plugin.
     */
    protected $version;

    /**
     * Absolute path of the plugin main file.
     *
     * @since    0.0.1
     * @access   protected
     * @var      string    $plugin_location    Absolute path of the plugin main file.
     */
    protected $plugin_location;

    /**
     * Retieve plugin data from plugin header.
     * 
     * Set the plugin id and the plugin version that can be used throughout the plugin.
     * 
     * @since 0.0.1
     * @access public
     * 
     */
    public function retrieve_plugin_headers() {
        $plugin_data = get_plugin_data($this->plugin_location, true);
        $this->plugin_id = $plugin_data['TextDomain'];
        $this->version = $plugin_data['Version'];
    }

    /**
     * Define the core functionality of the plugin.
     *
     * Set location of plugin main file.
     * Hook 'retrieve_plugin_headers' to admin_init acction to ensure we can get plugin data from header
     * Load the dependencies, define the locale, and set the hooks for the Dashboard and
     * the public-facing side of the site.
     *
     * @since    0.0.1
     * @param string $main_file absolute path to main plugin file
     */
    public function __construct($main_file) {
        $this->plugin_location = $main_file;
        //add_action('admin_init', array($this, 'retrieve_plugin_headers'));
        $this->plugin_id = 'pd20-wc-suppliers-brands';
        $this->version = '0.0.1';        
        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        
        //Uncomment when needed
        //$this->define_public_hooks();
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Pd20_Wc_Suppliers_Brands_Loader. Orchestrates the hooks of the plugin.
     * - Pd20_Wc_Suppliers_Brands_i18n. Defines internationalization functionality.
     * - Pd20_Wc_Suppliers_Brands_Admin. Defines all hooks for the dashboard.
     * - Pd20_Wc_Suppliers_Brands_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    0.0.1
     * @access   private
     */
    private function load_dependencies() {


        /**
         * utils.php
         *
         * util.php is a collection of useful functions and snippets that you need or could use every day, designed to avoid conflicts with existing projects.
         *
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/util.php';


        /**
         * Custom class: WC admin settings
         *
         * A simple framework
         *
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-pd20-wc-suppliers-brands-wc-admin-settings.php';

        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-pd20-wc-suppliers-brands-loader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-pd20-wc-suppliers-brands-i18n.php';

        /**
         * The class responsible for defining all actions that occur in the Dashboard.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-pd20-wc-suppliers-brands-admin.php';

        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-pd20-wc-suppliers-brands-public.php';

        $this->loader = new Pd20_Wc_Suppliers_Brands_Loader();
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the Pd20_Wc_Suppliers_Brands_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    0.0.1
     * @access   private
     */
    private function set_locale() {

        $plugin_i18n = new Pd20_Wc_Suppliers_Brands_i18n();
        $plugin_i18n->set_domain($this->get_plugin_id());

        $this->loader->add_action('init', $plugin_i18n, 'load_plugin_textdomain', 0);
    }

    /**
     * Register all of the hooks related to the dashboard functionality
     * of the plugin.
     *
     * @since    0.0.1
     * @access   private
     */
    private function define_admin_hooks() {

        $plugin_admin = new Pd20_Wc_Suppliers_Brands_Admin($this->get_plugin_id(), $this->get_version());
        
        // Just examples in boilerplate. Uncomment when adding some functionality
        //$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
        //$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');

        /*         * *************** BEGIN TAXONONOMIES AND FIEDLS *************************** */
        $this->loader->add_action('init', $plugin_admin, 'create_taxonomies', 1);
        // Add suppliers taxonomy fields to add supplier page
        $this->loader->add_action('supplier_add_form_fields', $plugin_admin, 'suppliers_add_new_meta_fields', 10);
        // Add suppliers taxonomy fields to edit supplier page
        $this->loader->add_action('supplier_edit_form_fields', $plugin_admin, 'suppliers_edit_meta_fields', 10, 2);
        // Save fields when editing
        $this->loader->add_action('edited_supplier', $plugin_admin, 'save_supplier_custom_meta', 10, 2);
        // Save fields when adding
        $this->loader->add_action('create_supplier', $plugin_admin, 'save_supplier_custom_meta', 10, 2);
        /*         * *************** END TAXONONOMIES AND FIEDLS *************************** */
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since    0.0.1
     * @access   private
     */
    private function define_public_hooks() {

        $plugin_public = new Pd20_Wc_Suppliers_Brands_Public($this->get_plugin_id(), $this->get_version());

        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    0.0.1
     */
    public function run() {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since     0.0.1
     * @return    string    The name of the plugin.
     */
    public function get_plugin_id() {
        return $this->plugin_id;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since     0.0.1
     * @return    Pd20_Wc_Suppliers_Brands_Loader    Orchestrates the hooks of the plugin.
     */
    public function get_loader() {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since     0.0.1
     * @return    string    The version number of the plugin.
     */
    public function get_version() {
        return $this->version;
    }

}
