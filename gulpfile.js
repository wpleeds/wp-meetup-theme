const gulp          = require( 'gulp' );
const webpack       = require( 'webpack' );
const sourcemaps    = require( 'gulp-sourcemaps' );
const watch         = require( 'gulp-watch' );
const postcss       = require( 'gulp-postcss' );
const autoprefixer  = require( 'autoprefixer' );
const sass          = require( 'gulp-sass' );
const imagemin      = require( 'gulp-imagemin' );
const svg2png       = require( 'gulp-svg2png' );

// All the configs for different tasks.
const config = {
	sass: {
		style: 'compressed'
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
	iconify: {
		src:           './assets/src/images/**/*.svg',
		pngOutput:     './assets/dist/images',
		scssOutput:    './assets/src/styles/global/icons',
		cssOutput:     false,
		defaultWidth:  '200px',
		defaultHeight: '200px',
	}
};

gulp.task( 'styles', () => {
	gulp.src( './assets/src/styles/*.scss' )
		.pipe( sourcemaps.init() )
		.pipe( sass( config.sass ).on( 'error', sass.logError ) )
		.pipe( postcss( config.postcss ))
		.pipe( sourcemaps.write('.') )
		.pipe( gulp.dest('./assets/dist/styles') );
});

gulp.task( 'js', function( callback ) {
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

gulp.task( 'images', () => {
	return gulp.src( './assets/src/images/**/*.{jpg,jpeg,png}')
		.pipe( imagemin( config.imagemin ) )
		.pipe( gulp.dest( 'assets/dist/images' ) );
} );

gulp.task( 'svg', () => {
	return gulp.src( './assets/src/images/**/*.svg')
		.pipe( imagemin( config.imagemin ) )
		.pipe( gulp.dest( './assets/dist/images' ) )
		.pipe( svg2png() )
		.pipe( gulp.dest( './assets/dist/images' ) );
} );

gulp.task('watch', function() {
	gulp.watch( 'assets/src/styles/**/*.scss', ['styles'] );
	gulp.watch( ['assets/src/scripts/**/*.js'], ['js'] );
});

// Tasks
gulp.task( 'default', [ 'styles', 'js', 'images', 'svg' ] );
