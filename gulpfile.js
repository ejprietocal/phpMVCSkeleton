const { src, dest, watch , series, parallel } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('autoprefixer');
const postcss    = require('gulp-postcss')
const sourcemaps = require('gulp-sourcemaps')
const cssnano = require('cssnano');
const terser = require('gulp-terser-js');
const imagemin = require('gulp-imagemin'); // Minificar imagenes 
const cache = require('gulp-cache');
const webp = require('gulp-webp');
const rename = require('gulp-rename');
const avif = require('gulp-avif');


const paths = {
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js',
    imagenes: 'src/img/**/*',
    videos: 'src/video/**/*'

}

function css() {
    return src(paths.scss)
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(postcss([autoprefixer(), cssnano()]))
        .pipe(rename({suffix: '.min'}))
        .pipe(sourcemaps.write('.'))
        .pipe( dest('public/build/css') );
}
function javascript() {
    return src(paths.js)
      .pipe(terser())
      .pipe(rename({suffix: '.min'}))
      .pipe(sourcemaps.write('.'))
      .pipe(dest('public/build/js'));
}


function imagenes() {
    return src(paths.imagenes)
        .pipe(cache(imagemin({ optimizationLevel: 3})))
        .pipe(dest('public/build/img'))
        // .pipe(notify({ message: 'Imagen Completada'}));
}

function versionWebp(done) {
        src(paths.imagenes)
        .pipe( webp() )
        .pipe(dest('public/build/img'))
        // .pipe(notify({ message: 'Imagen Completada'}));

        done()
}
function versionAvif(done) {
        src(paths.imagenes)
        .pipe( avif({quality: 50}))
        .pipe(dest('public/build/img'))
        // .pipe(notify({ message: 'Imagen Completada'}));
        done()
}

function watchArchivos() {
    watch( paths.scss, css );
    watch( paths.js, javascript );
    watch( paths.imagenes, imagenes );
    watch( paths.imagenes, versionWebp );
    watch( paths.imagenes, versionAvif );
}

exports.css = css;
exports.watchArchivos = watchArchivos;
exports.versionWebp = versionWebp;
exports.versionAvif = versionAvif;
exports.default = parallel(css, javascript,  imagenes, versionWebp, versionAvif,watchArchivos ); 
exports.build = parallel(css, javascript,  imagenes, versionWebp,versionAvif); 