var
    gulp = require('gulp'),
    sass = require('gulp-sass'),
    clean = require('gulp-clean'),
    postCss = require('gulp-postcss'),
    browserSync = require('browser-sync');
    sourceMaps = require('gulp-sourcemaps');
    autoprefixer = require('autoprefixer');
    yaml = require('js-yaml');
    fs = require('fs');
    config = yaml.safeLoad(fs.readFileSync('./build/config.yml', 'utf-8'));

// if (fs.existsSync('./build/config.yml')) {
//     let localConfig = yml.safeLoad(fs.readFileSync('./build/config.yml', 'utf-8'));
//     config = Object.assign(config, localConfig);
//     console.log(config);
// }

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

gulp.task('browserSync', function () {

});

gulp.task('copyJS', function () {

});

gulp.task('watch', function () {

});

gulp.task('clean', function () {

});

gulp.task('build', function () {

});