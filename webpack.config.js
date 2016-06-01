module.exports =  {
	devtool: 'source-map',
	entry: {
		theme: './assets/src/scripts/theme.js',
		customizer: './assets/src/scripts/customizer.js',
	},
	output: {
		path: 'assets/dist/scripts',
		filename: '[name].js',
		sourceMapFilename: '[file].map'
	},
	module: {
		loaders: []
	},
	plugins: [],
	externals: {
		'jquery' : 'jQuery'
	},
	resolve: {
		extensions: [ '', '.js' ]
	},
}
