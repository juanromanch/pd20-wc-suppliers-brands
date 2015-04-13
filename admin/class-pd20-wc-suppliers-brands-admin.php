<?php
/**
 * The dashboard-specific functionality of the plugin.
 *
 * @link:       http://www.paradigma20.com
 * @since      0.0.1
 *
 * @package    Pd20_Wc_Suppliers_Brands
 * @subpackage Pd20_Wc_Suppliers_Brands/includes
 */

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin id, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    Pd20_Wc_Suppliers_Brands
 * @subpackage Pd20_Wc_Suppliers_Brands/admin
 * @author:       Juan Román <jroman@paradigma20.com>
 */
class Pd20_Wc_Suppliers_Brands_Admin {

    /**
     * The ID of this plugin.
     *
     * @since    0.0.1
     * @access   private
     * @var      string    $plugin_id    The ID of this plugin.
     */
    private $plugin_id;

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
     * @var      string    $plugin_id       The id of this plugin.
     * @var      string    $version    The version of this plugin.
     */
    public function __construct($plugin_id, $version) {

        $this->plugin_id = $plugin_id;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the Dashboard.
     *
     * @since    0.0.1
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Pd20_Wc_Suppliers_Brands_Admin_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Pd20_Wc_Suppliers_Brands_Admin_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_id, plugin_dir_url(__FILE__) . 'css/pd20-wc-suppliers-brands-admin.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the dashboard.
     *
     * @since    0.0.1
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Pd20_Wc_Suppliers_Brands_Admin_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Pd20_Wc_Suppliers_Brands_Admin_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script($this->plugin_id, plugin_dir_url(__FILE__) . 'js/pd20-wc-suppliers-brands-admin.js', array('jquery'), $this->version, FALSE);
    }

    /**
     * Create 2 new taxonomies: Brands and Suppliers
     * 
     * @since 0.0.1
     */
    public function create_taxonomies() {
        // Add new Suppliers taxonomy, NOT hierarchical (like tags)
        $supplier_labels = array(
            'name' => __('Suppliers', $this->plugin_id),
            'singular_name' => __('Supplier', $this->plugin_id),
            'search_items' => __('Search Suppliers', $this->plugin_id),
            'popular_items' => __('Popular Suppliers', $this->plugin_id),
            'all_items' => __('All Suppliers', $this->plugin_id),
            'parent_item' => null,
            'parent_item_colon' => null,
            'edit_item' => __('Edit Supplier', $this->plugin_id),
            'update_item' => __('Update Supplier', $this->plugin_id),
            'add_new_item' => __('Add New Supplier', $this->plugin_id),
            'new_item_name' => __('New Supplier Name', $this->plugin_id),
            'separate_items_with_commas' => __('Separate suppliers with commas', $this->plugin_id),
            'add_or_remove_items' => __('Add or remove suppliers', $this->plugin_id),
            'choose_from_most_used' => __('Choose from the most used suppliers', $this->plugin_id),
            'not_found' => __('No suppliers found.', $this->plugin_id),
            'menu_name' => _x('Suppliers', 'Admin menu name', $this->plugin_id),
            'search_items' => __('Search Suppliers', $this->plugin_id),
            'popular_items' => __('Popular Suppliers', $this->plugin_id),
        );

        $supplier_args = array(
            'public' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
            //callback function for metabox display
            //'meta_box_cb' 
            //Capabilities for this taxonomy
            //'capabilities'
            //Whether this taxonomy should remember the order in which terms are added to objects
            //'sort'
            'hierarchical' => false,
            'labels' => $supplier_labels,
            'show_admin_column' => true,
            //'update_count_callback' => '_update_post_term_count',
            'query_var' => true,
            'rewrite' => array('slug' => 'supplier'),
        );

        register_taxonomy('supplier', array('product'), $supplier_args);

        // Add new Brands taxonomy, NOT hierarchical (like tags)
        $brand_labels = array(
            'name' => _x('Brands', 'taxonomy general name', $this->plugin_id),
            'singular_name' => _x('Brand', 'taxonomy singular name', $this->plugin_id),
            'search_items' => __('Search Brands', $this->plugin_id),
            'popular_items' => __('Popular Brands', $this->plugin_id),
            'all_items' => __('All Brands', $this->plugin_id),
            'parent_item' => null,
            'parent_item_colon' => null,
            'edit_item' => __('Edit Brand', $this->plugin_id),
            'update_item' => __('Update Brand', $this->plugin_id),
            'add_new_item' => __('Add New Brand', $this->plugin_id),
            'new_item_name' => __('New Brand Name', $this->plugin_id),
            'separate_items_with_commas' => __('Separate brands with commas', $this->plugin_id),
            'add_or_remove_items' => __('Add or remove brands', $this->plugin_id),
            'choose_from_most_used' => __('Choose from the most used brands', $this->plugin_id),
            'not_found' => __('No brands found.', $this->plugin_id),
            'menu_name' => __('Brands', $this->plugin_id),
            'search_items' => __('Search Brands', $this->plugin_id),
            'popular_items' => __('Popular Brands', $this->plugin_id),
        );

        $brand_args = array(
            'public' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
            //callback function for metabox display
            //'meta_box_cb' 
            //Capabilities for this taxonomy
            //'capabilities'
            //Whether this taxonomy should remember the order in which terms are added to objects
            //'sort'
            'hierarchical' => false,
            'labels' => $brand_labels,
            'show_admin_column' => true,
            //'update_count_callback' => '_update_post_term_count',
            'query_var' => true,
            'rewrite' => array('slug' => 'brand'),
        );

        register_taxonomy('brand', array('product'), $brand_args);
    }

    /**
     * Add new fields to Suppliers add new page
     * 
     * @since 0.0.1
     */
    function suppliers_add_new_meta_fields() {
        // this will add the custom meta field to the add new supplier page
        ?>
        <div class="form-field supplier-address-wrap">
            <label for="supplier-address"><?php _e('Supplier address', $this->plugin_id); ?></label>
            <textarea name="supplier-address" id="supplier-address" rows="5" cols="40"></textarea>
            <p>
                <?php _e('Enter the suipplier address', $this->plugin_id); ?>
            </p>
        </div>
        <div class="form-field supplier-webpage-wrap">
            <label for="supplier-webpage"><?php _e('Supplier webpage', $this->plugin_id); ?></label>
            <input name="supplier-webpage" id="supplier-webpage" type="text" value="" size="40">
            <p>
                <?php _e('Enter the suipplier webpage', $this->plugin_id); ?>
            </p>
        </div>
        <?php
    }

    /**
     * Add new fields to Suppliers edit page
     * 
     * @since 0.0.1
     */
    function suppliers_edit_meta_fields($term) {


        //collect the term slug
        $term_slug = $term->slug;

        //collect our saved term field information
        $supplier_address = get_option('supplier_address_' . $term_slug);
        //wp_die(var_dump($supplier_address));
        $supplier_webpage = get_option('supplier_webpage_' . $term_slug);

        // put the term ID into a variable
        $term_id = $term->term_id;
        //wp_die(var_dump($term_id));
        // retrieve the existing value(s) for this meta field. This returns an array
        $term_meta = get_option("taxonomy_$term_id");
        ?>
        <tr class="form-field supplier-address-wrap">
            <th scope="row"><label for="supplier-address"><?php _e('Supplier address', $this->plugin_id); ?></label></th>
            <td>
                <textarea name="supplier-address" id="supplier-address" rows="5" cols="50" class="large-text"><?php echo esc_attr($supplier_address) ? esc_attr($supplier_address) : ''; ?></textarea>
                <p><?php _e('Enter the suipplier address', $this->plugin_id); ?></p>
            </td>
        </tr>
        <tr class="form-field supplier-webpage-wrap">
            <th scope="row"><label for="supplier-webpage"><?php _e('Supplier webpage', $this->plugin_id); ?></label></th>
            <td>
                <input name="supplier-webpage" id="supplier-webpage" type="text" size="40" value="<?php echo esc_attr($supplier_webpage) ? esc_attr($supplier_webpage) : ''; ?>">
                <p><?php _e('Enter the suipplier webpage', $this->plugin_id); ?></p>
            </td>
        </tr>
        <?php
    }

    /**
     * Save new fields to Suppliers in add or edit page
     * 
     * @since 0.0.1
     */
    function save_supplier_custom_meta($term_id) {

        //collect all term related data for this new taxonomy
        $term_item = get_term($term_id, 'supplier');
        $term_slug = $term_item->slug;
        //collect our custom fields
        $supplier_address = sanitize_text_field($_POST['supplier-address']);
        $supplier_webpage = sanitize_text_field($_POST['supplier-webpage']);
        //save our custom fields as wp-options
        update_option('supplier_address_' . $term_slug, $supplier_address);
        update_option('supplier_webpage_' . $term_slug, $supplier_webpage);
    }

}
