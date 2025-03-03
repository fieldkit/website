const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const webpack = require("webpack");
const PACKAGE = require("./package.json");
const version = PACKAGE.version;
const ProjectName = PACKAGE.name;


module.exports = {
  entry: "./fieldkit/assets/scripts/main.js",
  module: {
    rules: [
      {
        generator: {
          filename: "../fonts/fieldkit-fonts/[name].[contenthash][ext]",
        },
        test: /\.(woff|woff2|eot|ttf|otf)$/,
        type: "asset/resource",
      },
      {
        exclude: /node_modules/,
        test: /\.js$/,
        use: "babel-loader",
      },
      {
        test: /\.scss$/i,
        use: [
          MiniCssExtractPlugin.loader, // Extracts CSS into a separate file
          "css-loader", // Converts CSS into JS modules
          "sass-loader", // Compiles SCSS to CSS
        ],
      },
    ],
  },
  output: {
    filename: "main.bundle.js",
    path: path.resolve(__dirname, "fieldkit/assets/scripts/"), // JS output path
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "../../style.css",
    }),
    new webpack.BannerPlugin({
      banner: `${ProjectName} v${version} - Copyright ${new Date().getUTCFullYear()}`,
    }),
  ],
};
