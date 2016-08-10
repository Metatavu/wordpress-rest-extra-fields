<?php
defined( 'ABSPATH' ) or die( 'Access denied!' );

/*
Plugin name: WordPress Rest Extra Fields
Plugin URI: https://github.com/Metatavu/wordpress-rest-extra-fields
Description: Plugin which allows configuring rest-api to return some extra fields.
Author: Metatavu Oy
Author URI: https://metatavu.fi
Version: 0.0.1
*/

if( !function_exists('register_extra_rest_fields') ) {

  add_action( 'rest_api_init', 'register_extra_rest_fields' );
  function register_extra_rest_fields() {
    register_rest_field( 'post',
      'blm_latitude',
      array(
        'get_callback' => 'get_rest_meta_field',
        'update_callback' => null,
        'schema' => null,
      )
    );
    register_rest_field( 'post',
      'blm_longitude',
      array(
        'get_callback' => 'get_rest_meta_field',
        'update_callback' => null,
        'schema' => null,
      )
    );
    register_rest_field( 'post',
      'blm_formatted_address',
      array(
        'get_callback' => 'get_rest_meta_field',
        'update_callback' => null,
        'schema' => null,
      )
    );
  }
  
  function get_rest_meta_field( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
  }

}

?>
