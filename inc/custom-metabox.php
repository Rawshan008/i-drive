<?php 
/**
 * Custom Metabox
 */

//  Declear Metabox Custom Field 
function i_dive_custom_metabox_post() {
  add_meta_box(
    'post_category_id',           
    __('Screen Category', 'i-dive'),    
    'post_category_custom_box',  
    'post',
    'side',                           
  );
}
add_action('add_meta_boxes', 'i_dive_custom_metabox_post');
 

// Metabox Select Value 
function post_category_custom_box( $post ) {
  $value = get_post_meta( $post->ID, '_i_dive_meta_key', true );
  ?>
  <select name="i_dive_field" id="i_dive_field">
      <option value=""><?php echo esc_html__('Categories', 'i-dive') ?></option>
      <option value="featured" <?php selected( $value, 'featured' ); ?>><?php echo esc_html__('Featured', 'i-dive') ?></option>
      <option value="trending" <?php selected( $value, 'trending' ); ?>><?php echo esc_html__('Trending ', 'i-dive'); ?></option>
  </select>
  <?php
}


// Save metabox
function i_dive_save_postdata( $post_id ) {
  if ( array_key_exists( 'i_dive_field', $_POST ) ) {
      update_post_meta(
          $post_id,
          '_i_dive_meta_key',
          $_POST['i_dive_field']
      );
  }
}
add_action( 'save_post', 'i_dive_save_postdata' );

