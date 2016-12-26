/**
 * Created by leonardo on 22/11/16.
 */
var webpack = require('webpack');

module.exports = {
    devtool: 'source-map',
    plugins: [
        new webpack.HotModuleReplacementPlugin(),
    ]
}