require('es6-promise').polyfill();

const gulp = require('gulp');

const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');

const source = require('vinyl-source-stream');
const browserify = require('browserify');
const concat = require('gulp-concat');
const rename = require("gulp-rename");
const terser = require('gulp-terser');

const plumber = require('gulp-plumber');
const gutil = require('gulp-util');

const imagemin = require('gulp-imagemin');

const browserSync = require('browser-sync').create();

/* Error Handling */
var onError = function (err) {
    // If the error occurred in a scss file
    if (err.file.endsWith('.scss')) {
        console.log('An error occurred:', gutil.colors.magenta(err.message));
    } else {
        console.log('An error occurred:', gutil.colors.blue(err.message));
    }
    gutil.beep();
    this.emit('end');
};

/* ---------------- Tasks ----------------------- */

/* Compile SASS to CSS */
gulp.task('sass', function() {
    return gulp.src('./sass/**/*.scss')
        .pipe(plumber({ errorHandler: onError }))
        .pipe(sass())
        .pipe(autoprefixer())
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(gulp.dest('./'))
        .pipe(browserSync.stream());
});

/* Browserify */
gulp.task('browserify', function() {

    const b = browserify({
        entries: './js/require.js',
        debug: true
    });

    return b.bundle()
        .pipe(source('vendor.js'))
        .pipe(gulp.dest('./js/vendor'))
        .on('error', function () {
            console.log("Error while browserifying the requested modules.")
        });
});

/* Concatenate, check and minify all javascript files */
gulp.task('js', function() {
    return gulp.src(['./js/custom/*.js', './js/vendor/*.js'])
        .pipe(concat('app.js'))
        .pipe(rename({suffix: '.min'}))
        .pipe(terser())
        .pipe(gulp.dest('./js'))
        .pipe(browserSync.stream());
});

/* Minify PNG, JPEG, GIF and SVG images */
gulp.task('images', function() {
    return gulp.src('./images/src/*')
        .pipe(plumber({errorHandler: onError}))
        .pipe(imagemin({optimizationLevel: 7, progressive: true}))
        .pipe(gulp.dest('./images/dist'))
        .pipe(browserSync.stream());
});

/* Refresh browser */
gulp.task('reload', function (done) {
    browserSync.reload();
    done();
});

/* Watch for changes in the scss or javascript files */
gulp.task('watch', function() {
    browserSync.init({
        files: ['./**/*.php'],
        proxy: 'http://localhost',
        hostname: "dev.sitename.local",
        port: 3000
    });
    gulp.watch('./sass/**/*.scss', gulp.series('sass', 'reload'));
    gulp.watch('./js/require.js', gulp.series('browserify'));
    gulp.watch(['./js/custom/*.js', './js/vendor/*.js'], gulp.series('js', 'reload'));
    gulp.watch('./images/src/*', gulp.series('images', 'reload'));
});

/* Default Task */
gulp.task('default', gulp.series('sass', 'browserify', 'js', 'images', 'watch'));

