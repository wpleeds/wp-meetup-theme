## Brower support.

Currently we support the last 2 versions of major browsers. IE10+.

## Development Guidelines

The theme uses gulp to run various tasks used in the development of the theme. This includes compiling CSS, bundling JS and minifiying images.

1. Reqirements: [NPM](http://blog.npmjs.org/post/85484771375/how-to-install-npm) and [Gulp](http://gulpjs.com/) CLI
1. Run `npm install` to install all package dependencies.
1. Run `gulp` to run all the tasks required to build the theme.
1. `gulp watch` to watch for changes, and run required tasks automatically.

* The theme styles use SCSS stored in `assets/styles/src` and get compiled into css and stored in `assets/styles/dist/`. We use postCSS + autoprefixer to handle all browser prefixes.
* The theme uses webpack to bundle the scripts into a single file which is loaded async in the footer.
* Images used in the theme should be kept in `assets/images/src` and loaded from `assets/images/dist/`. The `gulp images` task will handle automatic image compression.
