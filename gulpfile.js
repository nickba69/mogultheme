var gulp = require('gulp');
var sass = require('gulp-sass');
var minifyCSS = require('gulp-clean-css');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify')

gulp.task('sass', function(){
    gulp.src('./style/sass/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./style/'));
});

gulp.task('sass:watch', function(){
    gulp.watch('./style/sass/*.scss', ['sass']);
});

gulp.task('minify:styles', function() {
    gulp.src('./style/main.css')
    	// .pipe(concat('styles.min.css'))
        .pipe(minifyCSS({
            keepBreaks: true
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./style/'));
});

gulp.task('minify:scripts', function(){
    gulp.src('./js/main.js')
       .pipe(uglify())
       .pipe(rename({suffix: '.min'}))
       .pipe(gulp.dest('./js/'));
});