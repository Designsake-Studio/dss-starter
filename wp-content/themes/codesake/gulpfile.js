(function() {
  try {
    var beep = require('beepbeep');
    var gulp = require('gulp');
    var gutil = require('gulp-util');
    var concat = require('gulp-concat');
    var uglify = require('gulp-uglify');
    var uglifycss = require('gulp-uglifycss');
    var imagemin = require('gulp-imagemin');
    var plumber = require('gulp-plumber');
    var sourcemaps = require('gulp-sourcemaps');
    var del = require('del');
    var expect = require('gulp-expect-file');
    var sass = require("gulp-sass");
    var runSequence = require('run-sequence');
    var rev = require('gulp-rev');
    var rename = require('gulp-rename');
    var livereload = require('gulp-livereload');
    var runTimestamp = Math.round(Date.now()/1000);
    var consolidate = require('gulp-consolidate');
    var autoprefixer = require('gulp-autoprefixer');
    var cleanCSS = require('gulp-clean-css');
  } catch( e ) {
    console.log('Could not find one of the packages gulp needs to run.  Please run `npm install` to see if that resolves the issue.  The error is below:');
    console.log(e);
    return false;
  }

  var paths = {
    vendorScripts: [

      'assets/vendor/modernizr/modernizr.js',
      'assets/vendor/jquery/dist/jquery.js',
      'assets/vendor/waypoints/lib/jquery.waypoints.js'

    ],
    appScripts: [

        'assets/scripts/modules/*.js',
        'assets/scripts/Control.js'
    ],
    styles: [
      'assets/stylesheets/application.scss'
    ],
    stylesWatchDir: 'assets/stylesheets/**/*.scss',
    images: ['assets/images/**'],
    fonts: ['assets/fonts/**'],
    icons: ['assets/icons/**/*.svg']
  };




  gulp.task('clean', function(cb) {
    // You can use multiple globbing patterns as you would with `gulp.src`
    del(['public'], cb);
  });

  /* This group of tasks deal with deleting specific groups of items from the
   * public folder.  This is used presently for when the "watch" task notices a
   * change in a certain set of files, it removes the original set, so that
   * we're not building up giant lists of unused files as we make changes to
   * the JS or SASS components. */
  gulp.task('clean:vendorScripts', function(cb) {
    del(['public/js/vendor*'], cb);
  });
  gulp.task('clean:appScripts', function(cb) {
    del(['public/js/application*'], cb);
  });
  gulp.task('clean:styles', function(cb) {
    del(['public/css/'], cb);
  });
  gulp.task('clean:images', function(cb) {
    del(['public/images/'], cb);
  });
  gulp.task('clean:fonts', function(cb) {
    del(['public/fonts/'], cb);
  });

  var errorHandler = function(msg, error, errormessage) {
    var chalk = gutil.colors
    gutil.log(chalk.bgRed('There was an issue', chalk.bold(msg)))
    gutil.log(chalk.bgYellow(errormessage))
    beep()
    error.emit('end')
  }

  gulp.task('scripts:vendor', function(){
    return gulp.src(paths.vendorScripts)
      .pipe(plumber(function (error) {
          errorHandler(
            'building the Vendor Scripts',
            this,
            error.message
          )
      }))
      .pipe(expect(paths.vendorScripts))
      .pipe(concat('vendor.js'))
      .pipe(gulp.dest('public/js'))
      .pipe(uglify())
      .pipe(rename('vendor.min.js'))
      .pipe(gulp.dest('public/js'))
  });

  gulp.task('scripts:app', function(){
    return gulp.src(paths.appScripts)
      .pipe(plumber(function (error) {
          errorHandler(
            'building the App Scripts',
            this,
            error.message
          )
      }))
      .pipe(expect(paths.appScripts))
      .pipe(concat('application.js'))
      .pipe(gulp.dest('public/js'))
      .pipe(uglify())
      .pipe(rename('application.min.js'))
      .pipe(gulp.dest('public/js'))
  });
  gulp.task('styles', function(){
    return gulp.src(paths.styles)
      .pipe(plumber(function (error) {
          errorHandler(
            'building the styles',
            this,
            error.message
          )
      }))
      .pipe(sass({
        precision: 10
      }))
      .pipe(autoprefixer({
          browsers: ['last 2 versions'],
          cascade: false
      }))
      .pipe(gulp.dest('public/css'))
      .pipe(rename('application.min.css'))
      .pipe(cleanCSS({compatibility: 'ie8'}))
      .pipe(gulp.dest('public/css'))
      .pipe(livereload())
  });

  gulp.task('images', function(){
    return gulp.src(paths.images)
      .pipe(plumber(function (error) {
          errorHandler(
            'optimizing the images',
            this,
            error.message
          )
      }))
      .pipe(imagemin())
      .pipe(gulp.dest('public/images'))
  });

  gulp.task('fonts', function(){
    return gulp.src(paths.fonts)
      .pipe(plumber(function (error) {
          errorHandler(
            'moving the fonts',
            this,
            error.message
          )
      }))
      .pipe(gulp.dest('public/fonts'))
  });

  gulp.task('startwatch', function(){
    watchers = [
      gulp.watch(paths.vendorScripts, function(event){
        runSequence('clean:vendorScripts', 'scripts:vendor', 'version');
      }),
      gulp.watch(paths.appScripts, function(event){
        runSequence('clean:appScripts', 'scripts:app', 'version');
      }),
      gulp.watch(paths.stylesWatchDir, function(event){
        runSequence('clean:styles', 'styles', 'version');
      }),
      gulp.watch(paths.images, function(event){
        runSequence('clean:images', 'images', 'version');
      }),
      gulp.watch(paths.fonts, function(event){
        runSequence('clean:fonts', 'fonts', 'version');
      })
    ];

    watchers.forEach(function(watcher, index){
      watcher.on('change', function(event){
        var relPath = event.path.replace(__dirname + '/', '');
        gutil.log('File \'' + gutil.colors.cyan(relPath) + '\' was ' + gutil.colors.magenta(event.type) + '.  Running respective task...');
      });
    });
  });

  gulp.task('version', function(){
    return gulp.src(
      [
        'public/css/application.min.css',
        'public/js/application.min.js',
        'public/js/vendor.min.js'
      ],
      {
        base: 'public'
      })
      .pipe(plumber(function (error) {
          errorHandler(
            'versioning assets',
            this,
            error.message
          )
      }))
      .pipe(gulp.dest('public'))
      .pipe(rev())
      .pipe(gulp.dest('public'))
      .pipe(rev.manifest())
      .pipe(gulp.dest('public'))
      .on('error', gutil.log);
  });

  gulp.task('refresh', function() {
    livereload.listen();
  });

  gulp.task('default', function(){
    runSequence(
      ['clean'],
      ['scripts:vendor', 'scripts:app', 'styles', 'images', 'fonts'],
      ['version', 'startwatch'],
      'refresh'
    );
  });

  gulp.task('build', function(){
    runSequence(
      'clean',
      ['scripts:vendor', 'scripts:app', 'styles', 'images', 'fonts'],
      'version'
    );
  });

  /* Just SCSS and js */
  gulp.task('dev', function(){
    runSequence(
      ['clean'],
      ['scripts:vendor', 'scripts:app', 'styles'],
      ['version', 'startwatch'],
      'refresh'
    );
  });



})();
