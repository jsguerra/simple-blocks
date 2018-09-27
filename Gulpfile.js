var gulp = require('gulp'),
    sass = require('gulp-sass');

gulp.task('styles', function() {
  gulp.src('wp-simple-min/sass/**/*.scss')
      .pipe(sass().on('error', sass.logError))
      .pipe(gulp.dest('./wp-simple-min/'))
});

//Watch task
gulp.task('default',function() {
  gulp.watch('wp-simple-min/sass/**/*.scss',['styles']);
});