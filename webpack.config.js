const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const webpack = require("webpack");
const PACKAGE = require("./package.json");
const version = PACKAGE.version;
const ProjectName = PACKAGE.name;


module.exports = {
  entry: ["./fieldkit/assets/scripts/main.js",
    "./fieldkit/assets/styles/main.scss",
  ],
  module: {
    rules: [
      {
        generator: {
          filename: "./fieldkit/assets/fonts/fieldkit-fonts/[name].[contenthash][ext]",
        },
        test: /\.(woff|woff2|eot|ttf|otf)$/,
        type: "asset/resource",
      },
      {
        exclude: /node_modules/,
        test: /\.(?:js|mjs|cjs)$/,
        use: {
          loader: "babel-loader",
          options: {
            presets: [["@babel/preset-env", { targets: "defaults" }]],
          },
        },
      },
      {
        test: /\.(css|sass|scss)$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: "css-loader",
            options: { importLoaders: 2, url: false },
          },
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
    ],
  },
  optimization: {
    minimizer: ["...", new CssMinimizerPlugin()],
  },
  output: {
    filename: "assets/scripts/[name].bundle.js",
    path: path.resolve(__dirname, "fieldkit"),
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "style.css",
    }),
    new webpack.BannerPlugin({
      banner: `Theme Name: ${ProjectName}\nText Domain: ${ProjectName}\nVersion: v${version}\nCopyright ${new Date().getUTCFullYear()}`,
      test: /\.(css|sass|scss)$/,
    }),
  ],
};
