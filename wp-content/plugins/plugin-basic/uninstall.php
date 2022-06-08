<?php
/**
   *
   * @package   plugin-basic-demoo
   * @author    P Lê <phamle21@gmail.com>
   * @license   MIT License
   * @link      https://fb.com/phamle21
   * @copyright 2022 Pham Le
   * 
 */

// If uninstall, not called from WordPress, then exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Delete plugin settings
delete_option( 'plugin-basic-demoo' );
delete_site_option( 'plugin-basic-demoo' );