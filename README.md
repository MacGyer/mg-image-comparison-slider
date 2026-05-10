[![TYPO3 13](https://img.shields.io/badge/TYPO3-13-orange.svg?style=for-the-badge)](https://get.typo3.org/version/13)
[![TYPO3 14](https://img.shields.io/badge/TYPO3-14-orange.svg?style=for-the-badge)](https://get.typo3.org/version/14)
[![Latest Stable Version](http://poser.pugx.org/macgyer/mg-image-comparison-slider/v?style=for-the-badge)](https://packagist.org/packages/macgyer/mg-image-comparison-slider) 
[![Total Downloads](http://poser.pugx.org/macgyer/mg-image-comparison-slider/downloads?style=for-the-badge)](https://packagist.org/packages/macgyer/mg-image-comparison-slider) 
[![License](http://poser.pugx.org/macgyer/mg-image-comparison-slider/license?style=for-the-badge)](https://packagist.org/packages/macgyer/mg-image-comparison-slider) 
[![PHP Version Require](http://poser.pugx.org/macgyer/mg-image-comparison-slider/require/php?style=for-the-badge)](https://packagist.org/packages/macgyer/mg-image-comparison-slider)
[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg?style=for-the-badge)](https://paypal.me/macgyer/5)

# Image Comparison Slider

A slider showing the difference between two images. Can be used vertical and horizontal. Based on `img-comparison-slider`
by [sneas](https://img-comparison-slider.sneas.io/).

## Installation

The preferred way of installation is through Composer.
If you don't have Composer you can get it here: https://getcomposer.org/

To install the package add the following to the ```require``` section of your composer.json:
```json
"require": {
    "macgyer/mg-image-comparison-slider": "^1.0"
}
```

Include the Site Set, either in your site configuration or as a dependency of another Set:

```yaml
# config/sites/<your-site>/config.yaml
dependencies:
  - macgyer/mg-image-comparison-slider
```

### Without Site Sets

If your setup does not use Site Sets, import the TypoScript manually in your sitepackage:

```typoscript
@import 'EXT:mg_image_comparison_slider/Configuration/TypoScript/setup.typoscript'
```

Global default colors for handle and divider require the Site Set. Without it, colors can
be configured individually per content element.

## Changelog

### 1.2.0 - 2026-05-10
* [NEW]: add TYPO3 14 compatibility
* [FIX]: scope inline CSS to element ID to prevent color overrides when multiple sliders appear on the same page
* [FIX]: restore Appearance tab in backend form by basing CE type on `types['header']` instead of `types[1]`
* [FIX]: place Slider tab as second tab directly after General

### 1.1.1 - 2026-02-01
* [NEW]: update JS library to [8.0.7](https://www.npmjs.com/package/img-comparison-slider/v/8.0.7) which uses Constructable Stylesheets for Shadow DOM to avoid issues with nonce attribute when CSP is enabled

### 1.1.0 - 2025-11-22
* [FIX]: render images with `<f:image>` instead of partial
* [NEW]: add settings for handle and divider

### 1.0.1 - 2025-10-31
* [TASK]: cleanup unnecessary CSS rules
* [TASK]: fix README URLs

### 1.0.0 - 2025-10-31
* initial release

---

|                  | URL                                                                |
|------------------|--------------------------------------------------------------------|
| **Repository:**  | https://github.com/MacGyer/mg-image-comparison-slider              |
| **TER:**         | https://extensions.typo3.org/extension/mg_image_comparison_slider  |
