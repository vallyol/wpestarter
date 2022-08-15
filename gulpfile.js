// Required
const gulp = require('gulp');

// Plugins
const autoprefixer = require('gulp-autoprefixer'),
      cleanCSS = require('gulp-clean-css'),
      sass = require('gulp-sass')(require('sass')),
      concat = require('gulp-concat'),
      uglify = require('gulp-uglify'),
      rsync = require('gulp-rsync');
// Vars
var 
paths = {
  'source': './',
  'root': './',
  'host': 'cl92849@92.53.96.128',
  'dest': 'goszakaz/public_html/wp-content/themes/wpestarter'
},
styles = {
  'in': 'assets/scss/app.scss',
  'out':'assets/css/',
  'sources': 'assets/scss/**/*.*'
},
scripts = {
  'in': 'assets/js/*.*',
  'out': 'assets/js/',
  'filename': 'app.min.js'
};

// Tasks: styling
gulp.task('sass', function() {
  return gulp.src(styles.in)
    .pipe(sass())
    .pipe(autoprefixer())
    .pipe(cleanCSS())
    .pipe(gulp.dest(styles.out));
});

// Tasks: scripts
gulp.task('scripts', function() {
  return gulp.src(scripts.in)
    .pipe(concat(scripts.filename))
    .pipe(uglify())
    .pipe(gulp.dest(scripts.out));
});

// Tasks: deploy
gulp.task('deploy', function() {
  return gulp.src(paths.source)
  .pipe(rsync({
    root: paths.root,
    hostname: paths.host,
    destination: paths.dest,
    recursive: true,
    archive: true,
    silent: false,
    compress: true,
    exclude: ['node_modules/', '.directory', '*.txt']
  }));
});

// Tasks: watch
gulp.task('watch', function() {
  gulp.watch(styles.sources, gulp.series('sass', 'deploy'));
  gulp.watch(scripts.in, gulp.series('scripts', 'deploy'));
  gulp.watch(paths.source + '**/*.php', gulp.series('deploy'));
});