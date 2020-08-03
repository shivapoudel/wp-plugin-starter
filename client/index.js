/**
 * External dependencies
 */
import { render } from '@wordpress/element';

/**
 * Internal dependencies
 */
import './index.scss';
import App from './app';

const appRoot = document.getElementById( 'root' );

if ( appRoot ) {
	render( <App />, appRoot );
}
