# Changelog

All notable changes to this extension are documented here. The format
is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/).

## [1.0.7]

### Changed
- Replaced typographic characters (em dashes, curly quotes, ellipsis) with plain ASCII punctuation. No functional changes.

## [1.0.6]

### Changed
- Code cleanup: removed redundant inline comments and docblocks from the PHP source. No functional changes.

## [1.0.5]

### Changed
- Rewrote README to match gold template: updated section order, Quick Answer
  block, Configuration table sourced from system.xml, canonical URL updated
  to product page, em-dashes removed, filler phrases removed.

## [1.2.0] - Current release

### Added
- **Fetch priority support** - `fetchpriority="high"` attribute on
  critical images for Chrome 101+ browsers
- **Preload image count** - configurable number of images to preload
  via `<link rel="preload">`
- **Above-fold exclusion count** - configurable number of images to
  skip from lazy loading

### Improved
- Refined IntersectionObserver threshold handling with configurable
  rootMargin
- Better fade-in transition (0.3s ease) for lazy-loaded images

## [1.1.0]

### Added
- **Intersection Observer strategy** - JavaScript-based lazy loading
  with data-src/data-srcset swapping
- **Hybrid strategy** - combines native `loading="lazy"` with
  IntersectionObserver for maximum coverage
- **Placeholder types** - blur effect (LQIP), dominant color, loading
  spinner, SVG placeholder
- **Fade-in effect** - smooth opacity transition when images load
- **Above-fold exclusion** - skip lazy loading for the first N images
  to protect LCP
- **Async decoding** - `decoding="async"` attribute on all images
- **Preload critical images** - dynamic `<link rel="preload">` injection

## [1.0.0] - Initial release

### Added
- **Native lazy loading** - PHP after-plugin on
  `Magento\Catalog\Model\Product\Image` adds `loading="lazy"` to
  product image `<img>` tags that do not already have a loading
  attribute
- **WebP browser detection** - JavaScript canvas probe detects WebP
  support; removes `<source type="image/webp">` tags when the browser
  cannot render WebP
- **Admin configuration** - full system.xml with per-store-view
  settings under Stores > Configuration > Panth Extensions > Image
  Optimizer
- **Debug mode** - logs all optimization activity to the browser console
- **ACL** - dedicated admin resource for configuration access control
- **Unit tests** - PHPUnit tests for Helper\Data and Plugin\Image

### Compatibility
- Magento Open Source / Commerce / Cloud 2.4.4 - 2.4.8
- PHP 8.1, 8.2, 8.3, 8.4

---

## Support

For all questions, bug reports, or feature requests:

- **Email:** kishansavaliyakb@gmail.com
- **Website:** https://kishansavaliya.com
- **WhatsApp:** +91 84012 70422
