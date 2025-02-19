import eslintConfigCompat from "eslint-plugin-compat";
import eslintConfigImport from "eslint-plugin-import";
import eslintConfigPrettier from "eslint-config-prettier";
import eslintConfigPromise from "eslint-plugin-promise";

export default [
  // Extended configurations:
  eslintConfigPrettier,
  eslintConfigPromise.configs["flat/recommended"],
  eslintConfigImport.flatConfigs.recommended,
  eslintConfigCompat.configs["flat/recommended"],
  // Custom settings:
  {
    ignores: ["**/*.bundle.js", "wordpress/", "node_modules/"],
    languageOptions: {
      ecmaVersion: "latest",
      sourceType: "module",
    },
    rules: {
      eqeqeq: "error",
      indent: ["error", 2, { SwitchCase: 1 }],
      "linebreak-style": ["error", "unix"],
      "no-console": "error",
      quotes: ["error", "double"],
      semi: ["error", "always"],
      "sort-imports": "error",
      "sort-keys": "error",
      "sort-vars": "error",
    },
  },
];
