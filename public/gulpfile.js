var gulp = require('gulp');

var sass = require('gulp-sass');

var browserSync = require('browser-sync').create();

gulp.task('watch', function(){
  gulp.watch('scss/**/*.scss', ['sass']);
  // Other watchers
})

gulp.task('sass', function() {
  return gulp.src('scss/main.scss') // Gets all files ending with .scss in app/scss
    .pipe(sass())
    .pipe(gulp.dest('css'))
    .pipe(browserSync.reload({
      stream: true
    }))
});

gulp.task('browserSync', function() {
  browserSync.init({
    server: {
      baseDir: 'app'
    },
  })
})
