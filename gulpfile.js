var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var cleanCSS = require('gulp-clean-css');
var minify = require('gulp-minify');
sass.compiler = require('node-sass');

gulp.task('sass', function () {
    return gulp.src('./assets/src/styles/app.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(autoprefixer())
        .pipe(gulp.dest('./assets/dist/css'));
});

gulp.task('js', function() {
    return gulp.src('./assets/src/js/main.js')
        .pipe(minify())
        .pipe(gulp.dest('./assets/dist/js/'))
});


gulp.task('watch', function () {
    gulp.watch('./assets/src/styles/scss/**/*.scss', gulp.series('sass'));
    gulp.watch('./assets/src/styles/sass/**/*.sass', gulp.series('sass'));
    gulp.watch('./assets/src/js/main.js', gulp.series('js'));
});

