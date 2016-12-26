/**
 * Created by leonardo on 22/11/16.
 */
var webpack = require('webpack');
module.exports = {
    entry: {
        admin: './resources/assets/admin/js/admin.js',
        spa: './resources/assets/spa/js/spa.js'
    },
    output: {
        path: __dirname + '/public/build',
        filename: '[name].bundle.js',
        publicPath: '/build/'
    },
    plugins: [
        new webpack.ProvidePlugin({
            'window.$': 'jquery',
            'window.JQuery': 'jquery'
        }),
    ],
    module: {
        loaders:[
            {
                test: /\.js$/,
                exclude: /(node_modules|bower_components)/,
                loader: 'babel',
                query: {
                    presets: ['es2015']
                }
            },
            {
                test: /\.vue$/,
                loader: 'vue'
            }
        ]
    }
}