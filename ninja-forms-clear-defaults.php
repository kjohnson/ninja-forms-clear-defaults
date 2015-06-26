<?php if ( ! defined( 'ABSPATH' ) ) exit;

/*
Plugin Name: Ninja Forms - Clear Defaults
Plugin URI: https://ninjaforms.com/
Description: Clear Field Defaults on Loading
Version: 0.0.1

Author: Kyle B. Johnson
Author URI: http://kylebjohnson.me

Copyright 2015 The WP Ninjas.
*/


/**
 * Class NF_Clear_Defaults
 */
class NF_Clear_Defaults
{
    const VERSION = '0.0.1';

    /**
     * Clear ONLY these field IDs.
     *
     * @var array
     */
    public $only = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        add_action( 'ninja_forms_field', array( $this, 'clear_defaults' ), 10, 2 );
    }


    /*
    * Public Methods
    */

    function clear_defaults( $data, $field_id )
    {

        if( empty( $this->only ) OR in_array( $field_id, $this->only ) ) {

            $data['default_value'] = '';

        }

        return $data;
    }


    /*
     * Private Methods
     */

    //Add private methods here
}

new NF_Clear_Defaults();
