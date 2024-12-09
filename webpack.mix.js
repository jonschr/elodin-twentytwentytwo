const mix = require('laravel-mix');
const globImporter = require('node-sass-glob-importer');

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
