var webpack = require('webpack');

module.exports = {
    entry: {
          polyfills: './resources/app/polyfills',
          vendor: "./resources/app/vendor",
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
                  tests: /\.ts/, 
                  loaders: ['ts-loader'], 
                  exclude: /node_modules/
              }
          ]
      },
      plugins: [
          new webpack.optimize.CommonsChunkPlugin({
              name: ['bundle', 'vendor', 'polyfills']
          })
      ]
};