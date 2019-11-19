'use strict';

const gulp = require('gulp');
const sass = require("gulp-sass");
const html = require('gulp-htmlmin');

sass.compiler = require('node-sass');

// * Minify *

gulp.task('sass', () => {
  return gulp.src('./src/styles/sass/master.scss')
    .pipe(sass({
      outputStyle: 'compressed'
    }).on('error', sass.logError))
    .pipe(gulp.dest('./src/styles/css'));
});

gulp.task('html', () => {
  return gulp.src('./src/views/*/*.html')
    .pipe(html({
      collapseWhitespace: true
    }))
    .pipe(gulp.dest('./dist'));
});

// * Default is a Observable :)*

gulp.task('default', () => {
  gulp.watch('./src/views/*/*.html', gulp.series('html'));
  gulp.watch('./src/styles/sass/**/*.scss', gulp.series('sass'));
  gulp.watch('./src/styles/sass/master.scss', gulp.series('sass'));
});

// gulp.task('default', async () => {
//     await gulp.task('sass', () => {
//         return gulp.src('./src/styles/sass/master.scss')
//             .pipe(sass({
//                 outputStyle: 'compressed'
//             }).on('error', sass.logError))
//             .pipe(gulp.dest('./src/styles/css'));
//     });

//     await gulp.task('html', () => {
//         return gulp.src('./src/views/*/*.html')
//             .pipe(html({
//                 collapseWhitespace: true
//             }))
//             .pipe(gulp.dest('./dist'));
//     });
// });
