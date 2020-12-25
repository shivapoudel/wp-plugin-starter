<?php
/**
 * Plugin Name: WP Plugin Starter
 * Plugin URI: https://shivapoudel.com
 * Description: Just another WordPress plugin starter.
 * Version: 1.0.0
 * Author: Shiva Poudel
 * Author URI: https://shivapoudel.com
 * Text Domain: wp-plugin-starter
 * Domain Path: /languages/
 * Requires at least: 5.3
 * Requires PHP: 5.6.20
 *
 * @package WP_Plugin_Starter
 */

use WP_Plugin_Starter\Plugin;

// Exit if access directly.
defined( 'ABSPATH' ) || exit;

// Plugin version.
if ( ! defined( 'WPS_VERSION' ) ) {
	define( 'WPS_VERSION', '1.0.0' );
}

// Plugin root file.
if ( ! defined( 'WPS_PLUGIN_FILE' ) ) {
	define( 'WPS_PLUGIN_FILE', __FILE__ );
}

/**
 * Autoload packages.
 *
 * We want to fail gracefully if `composer install` has not been executed yet, so we are checking for the autoloader.
 * If the autoloader is not present, let's log the failure and display a nice admin notice.
 */
$autoloader = __DIR__ . '/vendor/autoload.php';
if ( is_readable( $autoloader ) ) {
	require $autoloader;
} else {
	if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
		error_log( // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
			sprintf(
				/* translators: 1: composer command. 2: plugin directory */
				esc_html__( 'Your installation of the WP Plugin Starter plugin is incomplete. Please run %1$s within the %2$s directory.', 'wp-plugin-starter' ),
				'`composer install`',
				'`' . esc_html( str_replace( ABSPATH, '', __DIR__ ) ) . '`'
			)
		);
	}

	/**
	 * Outputs an admin notice if composer install has not been ran.
	 */
	add_action(
		'admin_notices',
		function() {
			?>
			<div class="notice notice-error">
				<p>
					<?php
					printf(
						/* translators: 1: composer command. 2: plugin directory */
						esc_html__( 'Your installation of the WP Plugin Starter plugin is incomplete. Please run %1$s within the %2$s directory.', 'wp-plugin-starter' ),
						'<code>composer install</code>',
						'<code>' . esc_html( str_replace( ABSPATH, '', __DIR__ ) ) . '</code>'
					);
					?>
				</p>
			</div>
			<?php
		}
	);
	return;
}

Plugin::instance();
