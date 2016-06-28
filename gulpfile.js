var gulp = require('gulp');
var gulpWebpack = require('gulp-webpack');
var webpack = require('webpack');
var gulpSourcemaps = require('gulp-sourcemaps');
var gulpSass = require('gulp-sass');
var uglify = require('gulp-uglify');
var gulpAutoPrefixer = require('gulp-autoprefixer');
var gulpCleanCss = require('gulp-clean-css');
var webpackConfig = require("./webpack.config.js");
var webpackDevConfig = require('./webpack.dev.config.js');
var stream = require('webpack-stream');

var path = {
    SASS_SRC: ['./resources/assets/sass/app.scss'],
    DEST_SRC: './resources/app',
    DEST: './public',
    ROOT:''
};

gulp.task('webpack', function() {
  return gulp.src(path.ROOT)
    .pipe(gulpSourcemaps.init())
    .pipe(stream(webpackConfig))
    .pipe(uglify())
    .pipe(gulpSourcemaps.write())
    .pipe(gulp.dest(path.ROOT));
});

gulp.task('webpack-dev', function() {
  return gulp.src(path.ROOT)
    .pipe(gulpSourcemaps.init())
    .pipe(stream(webpackDevConfig))
    .pipe(gulpSourcemaps.write())
    .pipe(gulp.dest(path.ROOT));
});

gulp.task('watch-angular', function() {
  gulp.watch("resources/app/**/**", ["webpack-dev"], { interval: 750 });
});

gulp.task('watch-sass', function() {
  gulp.watch("resources/assets/sass/**", ["sass"], { interval: 750 });
});

gulp.task('sass', function() {
  return gulp.src(path.SASS_SRC)
    .pipe(gulpSourcemaps.init())
    .pipe(gulpSass({style:"compressed"}).on('error', gulpSass.logError))
    .pipe(gulpAutoPrefixer())
    .pipe(gulpCleanCss({
      compatibility:'ie8',
      keepSpecialComments: 0
    }))
    .pipe(gulpSourcemaps.write('.'))
    .pipe(gulp.dest(path.DEST + '/css'));
});

gulp.task('default', ['webpack-dev','sass', 'watch-angular', 'watch-sass']);