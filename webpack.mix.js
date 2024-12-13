const mix = require('laravel-mix');
const globImporter = require('node-sass-glob-importer');

// Explicitly set Webpack's devtool option for source maps
mix.webpackConfig({
	devtool: 'source-map',
});

mix.sass('assets/css/theme-style.scss', 'assets/dist', {
	sassOptions: {
		importer: globImporter(),
	},
});

mix.sass('assets/css/gutenberg-style.scss', 'assets/dist', {
	sassOptions: {
		importer: globImporter(),
	},
});

mix.sass('assets/css/editor-style.scss', 'assets/dist', {
	sassOptions: {
		importer: globImporter(),
	},
});
