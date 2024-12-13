const mix = require('laravel-mix');
const globImporter = require('node-sass-glob-importer');

// Compile SCSS files
mix.sass('assets/css/theme-style.scss', 'assets/dist', {
	sassOptions: {
		importer: globImporter(),
	},
})
	.sass('assets/css/gutenberg-style.scss', 'assets/dist', {
		sassOptions: {
			importer: globImporter(),
		},
	})
	.sass('assets/css/editor-style.scss', 'assets/dist', {
		sassOptions: {
			importer: globImporter(),
		},
	});
