const { series, src, dest, watch, parallel } = require('gulp');
const sass = require('gulp-sass');
const imagemin = require('gulp-imagemin');
const notify = require('gulp-notify');
const webp = require('gulp-webp');
const concat = require('gulp-concat');


// Paths
paths = {
    imagenes: 'src/img/**/*',
    deployimg: './deployment/build/img',
    deployjs: './deployment/build/js',
    deploycss: './deployment/build/css',
    build_img: './build/img',
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js'
};


// Funcion que compila SASS
function css(){
    return src(paths.scss)
        .pipe(sass({
            outputStyle : 'expanded'
        }))
        .pipe(dest('./build/css'))
        .pipe(dest(paths.deploycss))
}

function compilarcss(){
    watch(paths.scss, css);
    watch(paths.js, javascritp)
}


// Funcion que compila JS
function javascritp(){
    return src(paths.js)
        .pipe(concat('bundle.js'))
        .pipe(dest('./build/js'))
        .pipe(dest(paths.deployjs))
}


// Funcion que minifica las imagenes

function imagenes(){
    return src(paths.imagenes)
        .pipe(imagemin())
        .pipe(dest(paths.build_img))
        .pipe(dest(paths.deployimg))
        .pipe(notify({
            message: 'Imagen minificada.'
        }));
}

function imgwebp(){
    return src(paths.imagenes)
        .pipe(webp())
        .pipe(dest(paths.build_img))
        .pipe(dest(paths.deployimg))
        .pipe(notify({
            message: 'Version Webp lista.'
        }));    
}

exports.css = css;
exports.compilarcss = compilarcss;
exports.imagenes = imagenes;
exports.default = series(javascritp, compilarcss);
exports.imagenes = series(imagenes, imgwebp);