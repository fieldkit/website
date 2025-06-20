/* eslint-env node */
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const TerserPlugin = require("terser-webpack-plugin");

const npmPackage = require("./package.json");
const path = require("path");
const webpack = require("webpack");
const WORDPRESS_BANNER = `Theme Name: FieldKit
Author: FieldKit
Author URI: https://fieldkit.org/
License: Attribution-NonCommercial 4.0 International
License URI: https://creativecommons.org/licenses/by-nc/4.0/legalcode
Version:  ${npmPackage.version}
`;

module.exports = {
  entry: [
    "./fieldkit/assets/scripts/main.js",
    "./fieldkit/assets/styles/main.scss",
  ],
  module: {
    rules: [
      {
        test: /\.s?css$/,
        use: [
          MiniCssExtractPlugin.loader,
          { loader: "css-loader", options: { importLoaders: 2, url: false } },
          {
            loader: "postcss-loader",
            options: {
              postcssOptions: {
                plugins: [["postcss-preset-env"]],
              },
            },
          },
          "sass-loader",
        ],
      },
      { exclude: /node_modules/, loader: "babel-loader", test: /\.js$/ },
    ],
  },
  optimization: {
    minimize: true,
    minimizer: [new CssMinimizerPlugin(), new TerserPlugin()],
  },
  output: {
    filename: "assets/scripts/[name].bundle.js",
    path: path.resolve(__dirname, "fieldkit/"),
  },
  plugins: [
    new webpack.BannerPlugin({
      banner: WORDPRESS_BANNER,
      test: /\.(css|scss)$/,
    }),
    new MiniCssExtractPlugin({
      filename: "style.css",
    }),
  ],
};
