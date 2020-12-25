/**
 * External dependencies
 */
const path = require( 'path' );
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const WebpackRTLPlugin = require( 'rtlcss-webpack-plugin' );
const OptimizeCSSAssetsPlugin = require( 'optimize-css-assets-webpack-plugin' );

module.exports = {
	...defaultConfig,
	entry: {
		index: path.resolve( __dirname, 'client/index.js' ),
	},
	output: {
		...defaultConfig.output,
		chunkFilename: 'chunks/[name].js',
	},
	resolve: {
		...defaultConfig.resolve,
		modules: [ path.join( __dirname, 'client' ), 'node_modules' ],
	},
	plugins: [
		...defaultConfig.plugins,
		new WebpackRTLPlugin( {
			filename: '[name]-rtl.css',
		} ),
	],
	optimization: {
		...defaultConfig.optimization,
		minimizer: [
			...defaultConfig.optimization.minimizer,
			new OptimizeCSSAssetsPlugin( {} ),
		],
	},
};
