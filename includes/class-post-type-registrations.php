<?php
/**
 * Documentation Post Type
 *
 * @package   Documentation_Post_Type
 * @license   GPL-2.0+
 */

/**
 * Register post types and taxonomies.
 *
 * @package Documentation_Post_Type
 */
class Documentation_Post_Type_Registrations {

	public $post_type = 'documentation';

	public $taxonomies = array( 'documentation-category', 'documentation-tag', 'product-tag' );

	public function init() {
		// Add the team post type and taxonomies
		add_action( 'init', array( $this, 'register' ) );
	}

	/**
	 * Initiate registrations of post type and taxonomies.
	 *
	 * @uses Documentation_Post_Type_Registrations::register_post_type()
	 * @uses Documentation_Post_Type_Registrations::register_taxonomy_categories()
	 * @uses Documentation_Post_Type_Registrations::register_taxonomy_product_tags()
	 */
	public function register() {
		$this->register_post_type();
		$this->register_taxonomy_categories();
		$this->register_taxonomy_tags();
		$this->register_taxonomy_product_tags();
	}

	/**
	 * Register the custom post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	protected function register_post_type() {
		$labels = array(
			'name'               => __( 'Documentation', 'documentation-post-type' ),
			'singular_name'      => __( 'Doc', 'documentation-post-type' ),
			'add_new'            => __( 'Add Doc', 'documentation-post-type' ),
			'add_new_item'       => __( 'Add New Doc', 'documentation-post-type' ),
			'edit_item'          => __( 'Edit Doc', 'documentation-post-type' ),
			'new_item'           => __( 'New Doc', 'documentation-post-type' ),
			'view_item'          => __( 'View Doc', 'documentation-post-type' ),
			'search_items'       => __( 'Search Docs', 'documentation-post-type' ),
			'not_found'          => __( 'No docs found', 'documentation-post-type' ),
			'not_found_in_trash' => __( 'No docs in the trash', 'documentation-post-type' ),
		);

		$supports = array(
			'title',
			'editor',
			'thumbnail',
			'custom-fields',
			'revisions',
		);

		$args = array(
			'labels'          => $labels,
			'supports'        => $supports,
			'public'          => true,
			'capability_type' => 'post',
			'rewrite'         => array( 'slug' => 'documentation', ), // Permalinks format
			'menu_position'   => 30,
			'menu_icon'       => 'dashicons-book',
		);

		$args = apply_filters( 'documentation_post_type_args', $args );

		register_post_type( $this->post_type, $args );
	}

	/**
	 * Register a taxonomy for Documentation Categories.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	protected function register_taxonomy_categories() {
		$labels = array(
			'name'                       => __( 'Doc Categories', 'documentation-post-type' ),
			'singular_name'              => __( 'Doc Category', 'documentation-post-type' ),
			'menu_name'                  => __( 'Doc Categories', 'documentation-post-type' ),
			'edit_item'                  => __( 'Edit Doc Category', 'documentation-post-type' ),
			'update_item'                => __( 'Update Doc Category', 'documentation-post-type' ),
			'add_new_item'               => __( 'Add New Doc Category', 'documentation-post-type' ),
			'new_item_name'              => __( 'New Doc Category Name', 'documentation-post-type' ),
			'parent_item'                => __( 'Parent Doc Category', 'documentation-post-type' ),
			'parent_item_colon'          => __( 'Parent Doc Category:', 'documentation-post-type' ),
			'all_items'                  => __( 'All Doc Categories', 'documentation-post-type' ),
			'search_items'               => __( 'Search Doc Categories', 'documentation-post-type' ),
			'popular_items'              => __( 'Popular Doc Categories', 'documentation-post-type' ),
			'separate_items_with_commas' => __( 'Separate doc categories with commas', 'documentation-post-type' ),
			'add_or_remove_items'        => __( 'Add or remove doc categories', 'documentation-post-type' ),
			'choose_from_most_used'      => __( 'Choose from the most used doc categories', 'documentation-post-type' ),
			'not_found'                  => __( 'No doc categories found.', 'documentation-post-type' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_tagcloud'     => true,
			'hierarchical'      => true,
			'rewrite'           => array( 'slug' => 'documentation-category' ),
			'show_admin_column' => true,
			'query_var'         => true,
		);

		$args = apply_filters( 'documentation_post_type_category_args', $args );

		register_taxonomy( $this->taxonomies[0], $this->post_type, $args );
	}

	/**
	 * Register a taxonomy for Documentation Tags.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	protected function register_taxonomy_tags() {

		$labels = array(
			'name'                       => __( 'Doc Tags', 'documentation-post-type' ),
			'singular_name'              => __( 'Doc Tag', 'documentation-post-type' ),
			'menu_name'                  => __( 'Doc Tags', 'documentation-post-type' ),
			'edit_item'                  => __( 'Edit Doc Tag', 'documentation-post-type' ),
			'update_item'                => __( 'Update Doc Tag', 'documentation-post-type' ),
			'add_new_item'               => __( 'Add New Doc Tag', 'documentation-post-type' ),
			'new_item_name'              => __( 'New Doc Tag Name', 'documentation-post-type' ),
			'parent_item'                => __( 'Parent Doc Tag', 'documentation-post-type' ),
			'parent_item_colon'          => __( 'Parent Doc Tag:', 'documentation-post-type' ),
			'all_items'                  => __( 'All Doc Tags', 'documentation-post-type' ),
			'search_items'               => __( 'Search Doc Tags', 'documentation-post-type' ),
			'popular_items'              => __( 'Popular Doc Tags', 'documentation-post-type' ),
			'separate_items_with_commas' => __( 'Separate doc tags with commas', 'documentation-post-type' ),
			'add_or_remove_items'        => __( 'Add or remove doc tags', 'documentation-post-type' ),
			'choose_from_most_used'      => __( 'Choose from the most used doc tags', 'documentation-post-type' ),
			'not_found'                  => __( 'No doc tags found.', 'documentation-post-type' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_tagcloud'     => true,
			'hierarchical'      => false,
			'rewrite'           => array( 'slug' => 'documentation-tag' ),
			'show_admin_column' => true,
			'query_var'         => true,
		);

		$args = apply_filters( 'documentation_post_type_tag_args', $args );

		register_taxonomy( $this->taxonomies[1], $this->post_type, $args );

	}

	/**
	 * Register a taxonomy for Product Tags.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	protected function register_taxonomy_product_tags() {

		$labels = array(
			'name'                       => __( 'Product Tags', 'documentation-post-type' ),
			'singular_name'              => __( 'Product Tag', 'documentation-post-type' ),
			'menu_name'                  => __( 'Product Tags', 'documentation-post-type' ),
			'edit_item'                  => __( 'Edit Product Tag', 'documentation-post-type' ),
			'update_item'                => __( 'Update Product Tag', 'documentation-post-type' ),
			'add_new_item'               => __( 'Add New Product Tag', 'documentation-post-type' ),
			'new_item_name'              => __( 'New Product Tag Name', 'documentation-post-type' ),
			'parent_item'                => __( 'Parent Product Tag', 'documentation-post-type' ),
			'parent_item_colon'          => __( 'Parent Product Tag:', 'documentation-post-type' ),
			'all_items'                  => __( 'All Product Tags', 'documentation-post-type' ),
			'search_items'               => __( 'Search Product Tags', 'documentation-post-type' ),
			'popular_items'              => __( 'Popular Product Tags', 'documentation-post-type' ),
			'separate_items_with_commas' => __( 'Separate product tags with commas', 'documentation-post-type' ),
			'add_or_remove_items'        => __( 'Add or remove product tags', 'documentation-post-type' ),
			'choose_from_most_used'      => __( 'Choose from the most used product tags', 'documentation-post-type' ),
			'not_found'                  => __( 'No product tags found.', 'documentation-post-type' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_tagcloud'     => true,
			'hierarchical'      => false,
			'rewrite'           => array( 'slug' => 'document-tag' ),
			'show_admin_column' => true,
			'query_var'         => true,
		);

		$args = apply_filters( 'documentation_post_type_product_args', $args );

		register_taxonomy( $this->taxonomies[2], $this->post_type, $args );

	}

}