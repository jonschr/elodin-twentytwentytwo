<?php



add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'bean_recipe',
    array(
      'labels' => array(
        'name' => __( 'Recipes' ),
        'singular_name' => __( 'Recipe' )
      ),
      'public' => true,
      'has_archive' => true,
      'taxonomies' => array('post_tag','category'),
      'rewrite' => array('slug' => 'recipes'),
    )
  );
  flush_rewrite_rules();
}

// Bean Type
add_action('init', 'add_taxonomy_type');
function add_taxonomy_type() {
  $type_labels = array(
    'name'              => _x( 'Bean Types', 'taxonomy general name' ),
    'singular_name'     => _x( 'Bean Type', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Bean Types' ),
    'all_items'         => __( 'All Bean Types' ),
    'parent_item'       => __( 'Parent Bean Type' ),
    'parent_item_colon' => __( 'Parent Bean Type:' ),
    'edit_item'         => __( 'Edit Bean Type' ),
    'update_item'       => __( 'Update Bean Type' ),
    'add_new_item'      => __( 'Add New Bean Type' ),
    'new_item_name'     => __( 'New Bean Type Name' ),
    'menu_name'         => __( 'Bean Types' ),
  );

  register_taxonomy(
    'type', 'bean_recipe',
    array(
      'hierarchical' => true,
      'labels' => $type_labels,
      'rewrite' => false,
      'update_count_callback' => '_update_post_term_count',
      'has_archive' => true,
    )
  );
}


// Cuisine
add_action('init', 'add_taxonomy_cuisine');
function add_taxonomy_cuisine() {
  $cuisine_labels = array(
    'name'              => _x( 'Cuisines', 'taxonomy general name' ),
    'singular_name'     => _x( 'Cuisine', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Cuisines' ),
    'all_items'         => __( 'All Cuisines' ),
    'parent_item'       => __( 'Parent Cuisine' ),
    'parent_item_colon' => __( 'Parent Cuisine:' ),
    'edit_item'         => __( 'Edit Cuisine' ),
    'update_item'       => __( 'Update Cuisine' ),
    'add_new_item'      => __( 'Add New Cuisine' ),
    'new_item_name'     => __( 'New Cuisine Name' ),
    'menu_name'         => __( 'Cuisines' ),
  );

  register_taxonomy(
    'cuisine', 'bean_recipe',
    array(
      'hierarchical' => true,
      'labels' => $cuisine_labels,
      'rewrite' => false,
      'update_count_callback' => '_update_post_term_count',
    )
  );
}


// Nutrition Attribute
add_action('init', 'add_taxonomy_nutrition');
function add_taxonomy_nutrition() {
  $nutrition_labels = array(
    'name'              => _x( 'Nutrition Attributes', 'taxonomy general name' ),
    'singular_name'     => _x( 'Nutrition Attribute', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Nutrition Attributes' ),
    'all_items'         => __( 'All Nutrition Attributes' ),
    'parent_item'       => __( 'Parent Nutrition Attribute' ),
    'parent_item_colon' => __( 'Parent Nutrition Attribute:' ),
    'edit_item'         => __( 'Edit Nutrition Attribute' ),
    'update_item'       => __( 'Update Nutrition Attribute' ),
    'add_new_item'      => __( 'Add New Nutrition Attribute' ),
    'new_item_name'     => __( 'New Nutrition Attribute Name' ),
    'menu_name'         => __( 'Nutrition Attributes' ),
  );

  register_taxonomy(
    'nutrition', 'bean_recipe',
    array(
      'hierarchical' => true,
      'labels' => $nutrition_labels,
      'rewrite' => false,
      'update_count_callback' => '_update_post_term_count',
    )
  );
}

// collection
add_action('init', 'add_taxonomy_collection');
function add_taxonomy_collection() {
  $collection_labels = array(
    'name'              => _x( 'Collections', 'taxonomy general name' ),
    'singular_name'     => _x( 'Collection', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Collections' ),
    'all_items'         => __( 'All Collections' ),
    'parent_item'       => __( 'Parent Collection' ),
    'parent_item_colon' => __( 'Parent Collection:' ),
    'edit_item'         => __( 'Edit Collection' ),
    'update_item'       => __( 'Update Collection' ),
    'add_new_item'      => __( 'Add New Collection' ),
    'new_item_name'     => __( 'New Collection Name' ),
    'menu_name'         => __( 'Collections' ),
  );

  register_taxonomy(
    'collection', 'bean_recipe',
    array(
      'hierarchical' => true,
      'labels' => $collection_labels,
      'rewrite' => false,
      'update_count_callback' => '_update_post_term_count',
    )
  );
}


function add_custom_types_to_tax( $query ) {
if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {

// Get all your post types
$post_types = get_post_types();

$query->set( 'post_type', $post_types );
return $query;
}
}
add_filter( 'pre_get_posts', 'add_custom_types_to_tax' );
