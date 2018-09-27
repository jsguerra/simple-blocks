var gulp = require('gulp'),
    sass = require('gulp-sass'),
    prefix = require('autoprefixer');

gulp.task('default', function () {
  sass('wp-simple-min/sass/style.scss', {style: 'compact'})
    .pipe(prefix('last 2 versions', '> 1%'))
    .pipe(gulp.dest('/'));
});