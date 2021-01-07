var gulp = require('gulp');
var sass = require('gulp-sass');
var mainBowerFiles = require('main-bower-files');
var gulpFilter = require('gulp-filter');
var minify = require('gulp-minify-css');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var runSequence = require('gulp-run-sequence');
var clean = require('gulp-clean');
var shell = require("shelljs");
var zip = require("gulp-zip");
var wpPot = require('gulp-wp-pot');
var sort = require('gulp-sort');


var dest = './dist';
var src = './assets';

var config = {
  url: "http://demo.link:8888/",
  sass: {
    src: [src + '/scss/*.sass', src + '/scss/*.scss'],
    dest: dest + '/css',
  },
  js: {
    src: src + '/js/*.js',
    dest: dest + '/js',
  },
  images: {
    src: src + '/images/**/*',
    dest: dest + '/images'
  },
  fonts: {
    src: src + '/fonts/**/*',
    dest: dest + '/fonts'
  },
  bower: {
    js: dest + '/js',
    css: dest + '/css',
    images: dest + '/images',
    fonts: dest + '/fonts'
  },
  watch: {
    sass: src + '/scss/**/*',
    js: src + '/js/*.js',
    images: src + '/images/**/*',
    fonts: src + '/fonts/**/*',
    tasks: ['build']
  }
};


gulp.task('sass', function () {
  console.log("compiling sass");
  return gulp.src(config.sass.src)
      .pipe(sass(config.sass.settings))
      .pipe(gulp.dest(config.sass.dest));
});

gulp.task('js', function () {
  return gulp.src(config.js.src)
      .pipe(uglify())
      .pipe(gulp.dest(config.js.dest));
});

gulp.task('fonts', function () {
  return gulp.src(config.fonts.src)
      .pipe(gulp.dest(config.fonts.dest));
});

gulp.task('images', function () {
  return gulp.src(config.images.src)
      .pipe(gulp.dest(config.images.dest));
});

/** move main bower files inside dest directory **/
gulp.task('bower', function () {
  /*** Filters for bower main files **/
  var jsFilter = gulpFilter('**/*.js', {restore: true}),
      cssFilter = gulpFilter( ['**/*.css', '**/**/*.css'], {restore: true}),
      sassFilter = gulpFilter(['**/*.scss', '**/*.scss'], {restore: true}),
      fontFilter = gulpFilter(['**/*.svg', '**/*.eot', '**/*.woff', '**/*.woff2', '**/*.ttf'], {restore: true}),
      imgFilter = gulpFilter(['**/*.png', '**/*.gif', '**/*.jpg'], {restore: true});

  return gulp.src(mainBowerFiles())

      .pipe(jsFilter)
      .pipe(uglify())
      .pipe(gulp.dest(config.bower.js))
      .pipe(jsFilter.restore)

      .pipe(sassFilter)
      .pipe(sass())
      .pipe(gulp.dest(config.bower.css))
      .pipe(rename({extname: 'css'}))
      .pipe(sassFilter.restore)

      .pipe(cssFilter)
      .pipe(minify())
      .pipe(gulp.dest(config.bower.css))
      .pipe(cssFilter.restore)

      .pipe(imgFilter)
      .pipe(gulp.dest(config.bower.images))
      .pipe(imgFilter.restore)

      .pipe(fontFilter)
      .pipe(gulp.dest(config.bower.fonts))
      .pipe(fontFilter.restore);
});

gulp.task('sync', function(){
  //shell.exec(`browser-sync start --proxy "${config.url}" --files "**/*, !assets, !node_modules, !bower_components"`);
});

/** watch on every less js fonts and images change **/
gulp.task('watch', function () {
  console.log("watching..");
  gulp.watch(config.watch.sass, ['sass']);
  gulp.watch(config.watch.js, ['js']);
  gulp.watch(config.watch.image, ['image']);
  gulp.watch(config.watch.fonts, ['fonts']);
});

/** removes the destination directory */
gulp.task('build-clean', function () {
  return gulp.src(dest).pipe(clean());
});

/** runs build specific tasks after cleaning is done **/
gulp.task('build', function (cb) {
  return runSequence('build-clean', ['js', 'fonts', 'bower', 'images', 'sass'], cb);
});

/** after  build is done run watch to recompile on every change**/
gulp.task('default', function () {
  runSequence('build', ['watch']);
});

gulp.task('package', function() {
  gulp.src([
        './*',
        './*/**',
        '!./bower_components/**',
        '!./node_modules/**',
        '!./assets/**',
        '!./bower_components',
        '!./node_modules',
        '!./assets',

      ])
      .pipe(zip('gamez.zip'))
      .pipe(gulp.dest('.'));
});

gulp.task('generatePot', function () {
  return gulp.src([
        './*.php',
        './*/**.php',
        '!./bower_components/**',
        '!./node_modules/**',
        '!./assets/**',
        '!./bower_components',
        '!./node_modules',
        '!./assets' ])
      .pipe(sort())
      .pipe(wpPot( {
        domain: 'gamez',
        destFile:'gamez.pot',
        package: 'gamez',
        bugReport: 'https://www.themexpert.com',
        lastTranslator: 'ThemeXpert <info@themexpert.com>',
        team: 'ThemeXpert <info@themexpert.com>'
      } ))
      .pipe(gulp.dest('languages'));
});