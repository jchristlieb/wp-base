var
    gulp = require('gulp'),
    sass = require('gulp-sass'),
    clean = require('gulp-clean'),
    postCss = require('gulp-postcss'),
    cssNano = require('cssnano'),
    browserSync = require('browser-sync');
    sourceMaps = require('gulp-sourcemaps');
    autoprefixer = require('autoprefixer');
    runSequence = require('run-sequence');
    yaml = require('js-yaml');
    fs = require('fs');
    config = yaml.safeLoad(fs.readFileSync('./build/config.yml', 'utf-8'));


gulp.task('compileScss', function () {
    // get main.scss file
    gulp.src(config.css.sourceDir + config.css.mainFile)
        // init sourcemap to trace back errors from css to scss
        .pipe(sourceMaps.init())
        // write error log
        .pipe(sass().on('error', sass.logError))
        .pipe(sourceMaps.write())
        // add last two vendor prefixes to code
        .pipe(postCss([
            autoprefixer({browsers: ['last 2 versions']})
        ]))
        // write compiled code into main.css
        .pipe(gulp.dest(config.css.destDir))
        .pipe(browserSync.stream())
});

gulp.task('compileScssProduction', function () {
    // get main.scss file
    gulp.src(config.css.sourceDir + config.css.mainFile)
    // init sourcemap to trace back errors from css to scss

        // write error log
        .pipe(sass().on('error', sass.logError))

        // add last two vendor prefixes to code
        .pipe(postCss([
            autoprefixer({browsers: ['last 2 versions']}),
            cssNano({preset: 'default'}),
        ]))
        // write compiled code into main.css
        .pipe(gulp.dest(config.css.destDir))
        .pipe(browserSync.stream())
});


gulp.task('browserSync', function () {
        // initiate a browser session
        browserSync.init({
            proxy: config.browserSync.proxy,
            port: config.browserSync.port,
            ui: {
                port: config.browserSync.ui.port,
            }
        })
});

gulp.task('copyJs', function () {
        // copy all 3rd party JS dependencies to destDir
        gulp.src(config.js.source)
            .pipe(gulp.dest(config.js.destDir))
});

gulp.task('copyFa', function () {
        // copy all FontAwesome resources to destDir
        gulp.src(config.fa.source)
            .pipe(gulp.dest(config.fa.destDir))
});

gulp.task('watch', function () {
        // run compileCss if .scss files change
        gulp.watch(config.css.watchDir, ['compileScss'])
        // reload browser each time a change happened
        gulp.watch(config.browserSync.watchDir).on('change', browserSync.reload)
});

gulp.task('clean', function () {
    return gulp.src([
        config.css.destDir,
        config.js.destDir
    ], {read: false})
        .pipe(clean());
});

// special stream for deployment triggered through fabfile.py
gulp.task('build', ['clean'], function (callback) {
    return runSequence(
        ['compileScssProduction', 'copyJs', 'copyFa'],
        callback)
});

gulp.task('buildWatch', ['clean'], function (callback) {
    return runSequence(
        'browserSync',
        ['compileScss', 'copyJs', 'copyFa'],
        'watch', callback)
});

// make 'buildWatch' default stream
gulp.task('default', ['buildWatch'], function(){});