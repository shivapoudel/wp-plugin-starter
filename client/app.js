/**
 * External dependencies
 */
import { Component } from '@wordpress/element';
import { __ } from '@wordpress/i18n';

export default class App extends Component {
	render() {
		return (
			<div className="wp-plugin-starter-app">
				<header className="wp-plugin-starter-app-header">
					{ __(
						'Welcome to WP Plugin Starter App!',
						'wp-plugin-starter'
					) }
					<p>
						Edit <code>client/app.js</code> and save to reload.
					</p>
					<a
						className="wp-plugin-starter-app-link"
						href="https://github.com/shivapoudel/wp-plugin-starter"
						target="_blank"
						rel="noopener noreferrer"
					>
						See Github Repository
					</a>
				</header>
			</div>
		);
	}
}
