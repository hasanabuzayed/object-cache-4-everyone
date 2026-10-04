<?php
/**
 * Deactivation logic for Object Cache 4 everyone.
 *
 * @package ObjectCache4Everyone
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'oc4everyone_deactivation' ) ) {
	/**
	 * Cleans up the object-cache.php drop-in and flushes cache upon deactivation.
	 */
	function oc4everyone_deactivation() {
		if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
			error_log( 'Object Cache 4 everyone::oc4everyone_deactivation' );
		}

		$dropin_path = WP_CONTENT_DIR . DIRECTORY_SEPARATOR . 'object-cache.php';

		if ( defined( 'OC4EVERYONE_PREDEFINED_SERVER' ) || file_exists( $dropin_path ) ) {
			// Remove cache folder if using Disk backend.
			if ( defined( 'OC4EVERYONE_PREDEFINED_SERVER' ) && '' === OC4EVERYONE_PREDEFINED_SERVER ) {
				if ( class_exists( 'ObjectCacheDisk' ) ) {
					$diskcached = new ObjectCacheDisk();
					$diskcached->flush();
				}
			}

			// Delete object-cache.php drop-in.
			if ( file_exists( $dropin_path ) ) {
				// Check if the file is actually our drop-in before deleting to avoid accidental data loss.
				$content = file_get_contents( $dropin_path );
				if ( false === $content || strpos( $content, 'Object Cache 4 everyone' ) === false ) {
					return;
				}

				wp_delete_file( $dropin_path );
			}
		}

		// Flush cache on plugin deactivation.
		wp_cache_flush();
	}
}
