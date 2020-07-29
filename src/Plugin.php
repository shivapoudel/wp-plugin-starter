<?php
/**
 * Main plugin class.
 *
 * @package WP_Plugin_Starter
 * @since   1.0.0
 */

namespace WP_Plugin_Starter;

defined( 'ABSPATH' ) || exit;

/**
 * Main plugin class.
 *
 * @since 1.0.0
 */
class Plugin {

	/**
	 * The single instance of the class.
	 *
	 * @var object
	 */
	protected static $instance;

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cloning is forbidden.', 'wp-plugin-starter' ), '1.0.0' );
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Unserializing instances of this class is forbidden.', 'wp-plugin-starter' ), '1.0.0' );
	}

	/**
	 * Main plugin class instance.
	 *
	 * Ensures only one instance of the plugin is loaded or can be loaded.
	 *
	 * @return object Main instance of the class.
	 */
	final public static function instance() {
		if ( is_null( static::$instance ) ) {
			static::$instance = new static();
		}
		return static::$instance;
	}

	/**
	 * Plugin Constructor.
	 */
	public function __construct() {
		// @todo Begin the other execution of plugin.
	}
}
