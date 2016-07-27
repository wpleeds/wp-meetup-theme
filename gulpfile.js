const gulp          = require( 'gulp' );
const webpack       = require( 'webpack' );
const sourcemaps    = require( 'gulp-sourcemaps' );
const watch         = require( 'gulp-watch' );
const postcss       = require( 'gulp-postcss' );
const autoprefixer  = require( 'autoprefixer' );
const sass          = require( 'gulp-sass' );
const newer         = require( 'gulp-newer' );
const imagemin      = require( 'gulp-imagemin' );
const svg2png       = require( 'gulp-svg2png' );

// All the configs for different tasks.
const config = {
	sass: {
		outputStyle: 'compressed'
	},
	webpack: require( './webpack.config.js' ),
	imagemin: {
		progressive: true,
		svgoPlugins: [
			{ removeViewBox: false },
			{ cleanupIDs: false }
		],
	},
	postcss: [
		autoprefixer( { browsers: ['last 3 versions'] } ),
	],
};

// Compile and minify CSS.
gulp.task( 'styles', () => {
	gulp.src( './assets/src/styles/*.scss' )
		.pipe( sourcemaps.init() )
		.pipe( sass( config.sass ).on( 'error', sass.logError ) )
		.pipe( postcss( config.postcss ))
		.pipe( sourcemaps.write('.') )
		.pipe( gulp.dest('./assets/dist/styles') );
});

// Bundle JS.
gulp.task( 'js', ( callback ) => {
	webpack(
		config.webpack,
		function( err, stats ) {
			if ( stats.compilation.errors.length > 0 ) {
				console.log(stats.compilation.errors.toString());
			}
			if ( stats.compilation.warnings.length > 0 ) {
				console.log(stats.compilation.warnings.toString() );
			}
			callback();
		}
	);
});

// Minify images.
gulp.task( 'images', () => {
	return gulp.src( './assets/src/images/**/*.{jpg,jpeg,png}')
		.pipe( newer( 'assets/dist/images' ) )
		.pipe( imagemin( config.imagemin ) )
		.pipe( gulp.dest( 'assets/dist/images' ) );
} );

// Minify SVG and write to dest.
// Then convert SVG to PNG and write to dest.
gulp.task( 'svg', () => {
	return gulp.src( './assets/src/images/**/*.svg')
		.pipe( newer( 'assets/dist/images' ) )
		.pipe( imagemin( config.imagemin ) )
		.pipe( gulp.dest( './assets/dist/images' ) )
		.pipe( svg2png( 2.0, false, 2 ) )
		.pipe( gulp.dest( './assets/dist/images' ) );
} );

// Watch for changes in JS/CSS.
gulp.task('watch', () => {
	gulp.watch( 'assets/src/styles/**/*.scss', ['styles'] );
	gulp.watch( ['assets/src/scripts/**/*.js'], ['js'] );
});

// Tasks
gulp.task( 'default', [ 'styles', 'js', 'images', 'svg' ] );
