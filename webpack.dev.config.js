var webpack = require('webpack');
var HtmlWebpackPlugin = require('html-webpack-plugin');
var helpers = require('./helpers');
var ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = {
    entry: {
          bundle: "./resources/app/boot"
      },
      output: {
          path: __dirname,
          filename : "./public/js/[name].js"
      },
      resolve: {
          extensions: ['', '.js', '.ts']
      },
      module: {
          loaders: [
              {
                  test: /\.ts$/, 
                  loader: 'ts', 
                  exclude: /node_modules/
              },
              {
                  test: /\.html$/,
                  loader: 'html'
              },
              {
                  test: /\.(png|jpe?g|gif|svg|woff|woff2|ttf|eot|ico)$/,
                  loader: 'file?name=assets/[name].[hash].[ext]'
              },
              {
                  test: /\.css$/,
                  exclude: helpers.root('resource', 'app'),
                  loader: ExtractTextPlugin.extract('css', 'css?sourceMap')
              },
              {
                  test: /\.css$/,
                  include: helpers.root('resource', 'app'),
                  loader: 'raw'
              }
          ]
      },
      plugins: [
          new webpack.optimize.CommonsChunkPlugin({
              name: ['bundle']
          })
      ]
};