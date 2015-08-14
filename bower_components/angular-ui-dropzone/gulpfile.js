var gulp = require('gulp');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var del = require('del');

var paths = {
	scripts: './src/*.js'
};

gulp.task('default', function() {
  return gulp.src(paths.scripts)
			.pipe(gulp.dest('dist'))
      .pipe(uglify())
			.pipe(rename({ suffix: '-min' }))
			.pipe(gulp.dest('dist'));
});

