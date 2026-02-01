[![TYPO3 13](https://img.shields.io/badge/TYPO3-13-orange.svg?style=for-the-badge)](https://get.typo3.org/version/13)
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

Include the Site set, either in your page config or as dependency of another set.

## Changelog

### 1.1.1 - 2026-02-01
* [NEW]: update JS library to [8.0.7](https://www.npmjs.com/package/img-comparison-slider/v/8.0.7) which uses Constructable Stylesheets for Shadow DOM to avoid issues with nonce attribe when CSP is enabled

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
