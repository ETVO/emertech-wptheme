<?php
/**
 * Functions to enable SVG support and upload
 * 
 * @package Emertech WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Emertech SVG Support class
 */
class Emertech_SVG_Support {

    /**
     * Add filters and actions of class functions
     * 
     * @since 1.0
     */
    public function __construct() {
        
        // Add filters
        add_filter('wp_check_filetype_and_ext', array('Emertech_SVG_Support', 'check_type_and_ext'), 10, 4);
        add_filter('upload_mimes', 'cc_mime_types');
    
        // Add actions
        add_action('admin_head', 'sanitize_svg');
    }

    /**
     * Check file type and extension
     * 
     * @since 1.0
     */
    public function check_type_and_ext($data, $file, $filename, $mimes) {
        // global $wp_version;
        // if ( $wp_version !== '4.7.1' ) {
        //     return $data;
        // }
        
        $filetype = wp_check_filetype( $filename, $mimes );
        
        return [
            'ext'             => $filetype['ext'],
            'type'            => $filetype['type'],
            'proper_filename' => $data['proper_filename']
        ];
    }
    
    /**
     * Add SVG image filetype to WP mimes array 
     *
     * @param [array] $mimes
     * @since 1.0
     */
    function cc_mime_types( $mimes ){
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }

    /**
     * Sanitize SVG Files
     * 
     * @since 1.0
     */
    function sanitize_svg() {
        echo '<style type="text/css">
              .attachment-266x266, .thumbnail img {
                   width: 100% !important;
                   height: auto !important;
              }
              </style>';
    }
}

new Emertech_SVG_Support();