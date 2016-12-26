const gulp = require('gulp');
const elixir = require('laravel-elixir');
const webpack = require('webpack');
const WebpackDevServer = require('webpack-dev-server');
const webpackConfig = require('./webpack.config');
const webpackDevConfig = require('./webpack.dev.config');
const mergeWebpack = require('webpack-merge');

gulp.task('webpack-dev-server', ()=>{
    let config = mergeWebpack(webpackConfig,webpackDevConfig);
    let inlineHot = [
        'webpack/hot/dev-server',
        'webpack-dev-server/client?http://localhost'
    ];

    config.entry.admin = [config.entry.admin].concat(inlineHot);
    config.entry.spa = [config.entry.spa].concat(inlineHot);

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
        .sass('./resources/assets/spa/sass/spa.scss')
        .copy('./node-modules/materialize-css/fonts/roboto', 'public/fonts/roboto');
    gulp.start('webpack-dev-server');
    mix.browserSync({
        host: '0.0.0.0',
        proxy:'http://localhost'
    });
});