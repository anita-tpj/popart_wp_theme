const gulp = require('gulp');
const imagemin = require('gulp-imagemin');
const uglify = require('gulp-uglify')
const sass = require('gulp-sass');
const browserSync = require ('browser-sync').create();

//Log the message
gulp.task('message', function(){
    console.log('Gulp is running..');
})

//Miinify images
gulp.task('imagemin', function(){
    gulp.src('assets/images/*')
    .pipe(imagemin())
    .pipe(gulp.dest('images'));
});

//Minify Scripts
gulp.task('minifyjs', function(){
    gulp.src('assets/scripts/*.js')
    .pipe(uglify())
    .pipe(gulp.dest('js'));
});


//Compile SCSS
gulp.task('sass', function(){
    gulp.src('assets/sass/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest(''))
    .pipe(gulp.dest('assets'))
    .pipe(browserSync.stream());
});


//Static Server
gulp.task('serve', function() {  
    browserSync.init(["assets/*.css", "assets/scripts/*.js"], {
      server: "./assets"
    });
    gulp.watch("assets/*.html").on('change', browserSync.reload);
});
  
 
// Default Task
gulp.task('default', ['message', 'imagemin', 'minifyjs', 'sass', 'serve'], function () {  
gulp.watch('assets/scripts/*.js', ['minifyjs']);
gulp.watch('assets/images/*', ['imagemin']);
gulp.watch('assets/sass/*.scss', ['sass']);
});