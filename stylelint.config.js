export default {
  extends: [
    "stylelint-config-recommended",
    "stylelint-prettier/recommended",
  ],
  plugins: [
    "stylelint-order",
    "stylelint-scss"
  ],
  rules: {
    "at-rule-empty-line-before": [
      "always",
      {
        except: ["blockless-after-same-name-blockless", "first-nested"],
        ignore: ["after-comment"],
        severity: "warning"
      }
    ],
    "at-rule-no-unknown": null,
    "at-rule-no-vendor-prefix": true,
    "color-hex-length": "long",
    "comment-empty-line-before": [
      "always",
      {
        except: ["first-nested"],
        ignore: ["after-comment", "stylelint-commands"],
        severity: "warning"
      }
    ],
    "custom-property-empty-line-before": [
      "always",
      {
        except: ["after-custom-property", "first-nested"],
        ignore: ["after-comment"],
        severity: "warning"
      }
    ],
    "declaration-empty-line-before": [
      "always",
      {
        except: ["after-declaration", "first-nested"],
        ignore: ["after-comment"],
        severity: "warning"
      }
    ],
    "declaration-property-value-no-unknown": false, // disabling to allow custom properties
    "declaration-no-important": null, // modifying to null to allow !important
    // "max-nesting-depth": [
    //   2,
    //   {
    //     ignore: ["pseudo-classes"],
    //     ignoreAtRules: ["media", "supports"],
    //     severity: "warning"
    //   }
    // ],
    "media-feature-name-no-vendor-prefix": true,
    "no-descending-specificity": null,
    "no-duplicate-selectors": null, // disabling to allow duplicate selectors
    "no-empty-source": null,
    // Replace deprecated rule with the new one:
    // "order/properties-order": ["alphabetical", { unspecified: "bottom" }],
    "prettier/prettier": true,
    "property-no-vendor-prefix": true,
    "rule-empty-line-before": [
      "always",
      {
        except: ["first-nested"],
        ignore: ["after-comment"],
        severity: "warning"
      }
    ],
    "scss/at-rule-no-unknown": null, // disabling to allow @use
    // "selector-max-compound-selectors": [
    //   3,
    //   {
    //     severity: "warning"
    //   }
    // ],
    "selector-no-vendor-prefix": true,
    "selector-pseudo-element-colon-notation": "double",
    "value-no-vendor-prefix": true
  }
};
