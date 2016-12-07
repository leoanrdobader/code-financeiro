const gulp = require('gulp');
const elixir = require('laravel-elixir');
const webpack = require('webpack');
const WebpackDevServer = require('webpack-dev-server');
const webpackConfig = require('./webpack.config');
const webpackDevConfig = require('./webpack.dev.config');
const mergeWebpack = require('webpack-merge');
/*
require('laravel-elixir-vue');
require('laravel-elixir-webpack-official');

Elixir.webpack.config.module.loaders = [];
*/
/*
Elixir.webpack.mergeConfig(webpackConfig);
Elixir.webpack.mergeConfig(webpackDevConfig);*/
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

gulp.task('webpack-dev-server', ()=>{
    let config = mergeWebpack(webpackConfig,webpackDevConfig);
    //let config = Elixir.webpack.config;
    let inlineHot = [
        'webpack/hot/dev-server',
        'webpack-dev-server/client?http://localhost'
    ];

    config.entry.admin = [config.entry.admin].concat(inlineHot);

    new WebpackDevServer(webpack(config),{
        hot: true,
        proxy:{
          '*': 'http://localhost'
        },
        watchOptions: {
            aggregateTimeout: 300,
            poll: true
        },
        publicPath: config.output.publicPath,
        noInfo: true,
        stats: { colors: true }
    }).listen(8050,"0.0.0.0",  ()=> {
        console.log('Bundling project..');
    });
});

elixir(mix => {
    mix.sass('./resources/assets/admin/sass/admin.scss')
        .copy('./node-modules/materialize-css/fonts/roboto', 'public/fonts/roboto');
    //mix.webpack('./resources/assets/admin/js/admin.js', './public/build');
    gulp.start('webpack-dev-server');
    mix.browserSync({
        host: '0.0.0.0',
        proxy:'http://localhost'
    });
});