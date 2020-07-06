const autoprefixer = require("autoprefixer");
const cssnano = require("cssnano");
const postcssCustomMedia = require("postcss-custom-media");

module.exports = {
  plugins: [autoprefixer(), cssnano(), postcssCustomMedia()],
};
