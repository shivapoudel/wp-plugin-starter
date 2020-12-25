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
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_filter( 'plugin_action_links_' . plugin_basename( WPS_PLUGIN_FILE ), array( $this, 'plugin_action_links' ) );
	}

	/**
	 * Registers settings page under Settings.
	 */
	public function admin_menu() {
		add_options_page( esc_html__( 'WP Plugin Starter settings', 'wp-plugin-starter' ), esc_html__( 'Settings', 'wp-plugin-starter' ), 'manage_options', 'wp-plugin-starter-settings', array( $this, 'page_wrapper' ) );
	}

	/**
	 * Set up a div for the app to render into.
	 */
	public function page_wrapper() {
		?>
		<div class="wp-plugin-starter-settings">
			<h1 class="screen-reader-text hide-if-no-js"><?php echo esc_html_e( 'WP Plugin Starter Settings', 'wp-plugin-starter' ); ?></h1>
			<div id="root" class="wp-plugin-starter-settings__container hide-if-no-js"></div>

			<?php // JavaScript is disabled. ?>
			<div class="wrap hide-if-js wp-plugin-starter-settings-no-js">
				<h1 class="wp-heading-inline"><?php echo esc_html_e( 'WP Plugin Starter Settings', 'wp-plugin-starter' ); ?></h1>
				<div class="notice notice-error notice-alt">
					<p>
						<?php
							$message = esc_html__( 'The WP Plugin Starter Settings requires JavaScript. Please enable JavaScript in your browser settings.', 'wp-plugin-starter' );

							/**
							 * Filters the message displayed in the setting interface when JavaScript is
							 * not enabled in the browser.
							 *
							 * @since 1.0.0
							 *
							 * @param string $message The message being displayed.
							 */
							echo wp_kses_post( apply_filters( 'plugin_starter_settings_no_javascript_message', $message ) );
						?>
					</p>
			</div>
		</div>
		<?php
	}

	/**
	 * Enqueue scripts.
	 */
	public function enqueue_scripts() {
		$screen     = get_current_screen();
		$asset_file = include plugin_dir_path( WPS_PLUGIN_FILE ) . 'build/index.asset.php';

		// Register scripts.
		wp_register_script(
			'wp-plugin-starter-settings',
			plugins_url( 'build/index.js', WPS_PLUGIN_FILE ),
			$asset_file['dependencies'],
			$asset_file['version'],
			true
		);

		// Register styles.
		wp_register_style(
			'wp-plugin-starter-settings',
			plugins_url( 'build/index.css', WPS_PLUGIN_FILE ),
			array(),
			filemtime( plugin_dir_path( WPS_PLUGIN_FILE ) . 'build/index.css' )
		);

		// Add RTL support for admin styles.
		wp_style_add_data( 'wp-plugin-starter-settings', 'rtl', 'replace' );

		if (
			isset( $screen->id )
			&& 'settings_page_wp-plugin-starter-settings' === $screen->id
		) {
			wp_enqueue_style( 'wp-plugin-starter-settings' );
			wp_enqueue_script( 'wp-plugin-starter-settings' );
		}
	}

	/**
	 * Show action links on the plugin screen.
	 *
	 * @param mixed $links Plugin Action links.
	 *
	 * @return array
	 */
	public function plugin_action_links( $links ) {
		$action_links = array(
			'settings' => '<a href="' . admin_url( 'options-general.php?page=wp-plugin-starter-settings' ) . '" aria-label="' . esc_attr__( 'View Plugin settings', 'wp-plugin-starter' ) . '">' . esc_html__( 'Settings', 'wp-plugin-starter' ) . '</a>',
		);

		return array_merge( $action_links, $links );
	}
}
