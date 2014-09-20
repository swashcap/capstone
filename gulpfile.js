'use strict';

var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var mainBowerFiles = require('main-bower-files')();

/**
 * Handle stream errors.
 *
 * @link http://cameronspear.com/blog/how-to-handle-gulp-watch-errors-with-plumber/
 */
var onError = function (err) {
    console.log(err);
};

gulp.task('styles', function () {
    return gulp.src('assets/sass/*.scss')
        .pipe($.plumber({ errorHandler: onError }))
        .pipe($.rubySass({
            loadPath: [
                'assets/bower_components/'
            ],
            precision: 10,
            sourcemap: false,
            style: 'expanded'
        }))
        .pipe($.autoprefixer('last 2 version', 'ie 9'))
        .pipe(gulp.dest('assets/css/'))
        .pipe($.size());
});

// Lint source files
gulp.task('lintScripts', function () {
    return gulp.src('assets/js/source/**/*.js')
        .pipe($.jshint())
        .pipe($.jshint.reporter(require('jshint-stylish')));
});

gulp.task('scripts', ['lintScripts'], function () {
    /**
     * Concatenate scripts.
     *
     * This relies on the Bower manifest (bower.json) as a reference for
     * all Bower components. jQuery and Modernizr are stripped from as
     * they'll be loaded separately.
     *
     * @link https://github.com/ck86/main-bower-files
     */
    var files = mainBowerFiles;
    files.push('assets/js/vendor/**/*.js', 'assets/js/source/**/*.js');

    return gulp.src(files)
        .pipe($.plumber({ errorHandler: onError }))
        .pipe($.filter(['**/*.js', '!jquery.js', '!jquery.min.js', '!modernizr.custom.js']))
        .pipe($.concat('main.min.js'))
        .pipe(gulp.dest('assets/js/'))
        .pipe($.size());
});

gulp.task('build', function () {
    /** @todo Write this task! */
    console.warn('The "build" task needs to be written!');
});

gulp.task('default', ['styles', 'scripts']);

gulp.task('watch', ['styles', 'scripts'], function () {
    $.livereload.listen();

    gulp.watch([
        'assets/css/*.css',
        'assets/js/*.js',
        '**.*php'
    ])
        .on('change', $.livereload.changed);

    gulp.watch('assets/sass/**/*.scss', ['styles']);
    gulp.watch('assets/js/source/**/*.js', ['scripts']);
});
