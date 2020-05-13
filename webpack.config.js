/* eslint-env node */
const path = require("path");

module.exports = {
  entry: "./fieldkit/assets/scripts/main.js",
  module: {
    rules: [{ exclude: /node_modules/, loader: "babel-loader", test: /\.js$/ }],
  },
  output: {
    filename: "main.bundle.js",
    path: path.resolve(__dirname, "fieldkit/assets/scripts/"),
  },
};
