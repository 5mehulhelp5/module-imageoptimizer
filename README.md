<!-- SEO Meta -->
<!--
  Title: Magento 2 Image Optimizer Extension: Lazy Loading, WebP Detection & Core Web Vitals | Hyva + Luma | Panth Infotech
  Description: Panth Image Optimizer adds frontend image performance to Magento 2: native and IntersectionObserver lazy loading, WebP browser detection with PNG/JPG fallback, preload hints, async decoding, and fetchpriority for LCP. Works on Magento 2.4.4 to 2.4.8, PHP 8.1 to 8.4, Hyva and Luma. Built by Top Rated Plus Magento developer Kishan Savaliya.
  Keywords: magento 2 image optimizer, magento 2 lazy loading, magento 2 webp detection, magento 2 core web vitals, magento 2 LCP optimization, magento 2 fetchpriority, magento 2 preload images, hyva image optimizer, luma image optimizer, magento 2 image performance extension
  Author: Kishan Savaliya (Panth Infotech)
  Canonical: https://kishansavaliya.com/magento-2-imageoptimizer.html
-->

# Magento 2 Image Optimizer: Lazy Loading, WebP Detection and Core Web Vitals Booster (Hyva + Luma)

[![Magento 2.4.4 - 2.4.8](https://img.shields.io/badge/Magento-2.4.4%20--%202.4.8-orange?logo=magento&logoColor=white)](https://magento.com)
[![PHP 8.1 - 8.4](https://img.shields.io/badge/PHP-8.1%20--%208.4-blue?logo=php&logoColor=white)](https://php.net)
[![Hyva + Luma](https://img.shields.io/badge/Themes-Hyva%20%2B%20Luma-14b8a6)](https://www.hyva.io)
[![Live Demo & Details](https://img.shields.io/badge/Live%20Demo%20%26%20Details-magento--2--imageoptimizer-0D9488?style=flat)](https://kishansavaliya.com/magento-2-imageoptimizer.html)
[![Packagist](https://img.shields.io/badge/Packagist-mage2kishan%2Fmodule--imageoptimizer-orange?logo=packagist&logoColor=white)](https://packagist.org/packages/mage2kishan/module-imageoptimizer)
[![Upwork Top Rated Plus](https://img.shields.io/badge/Upwork-Top%20Rated%20Plus-14a800?logo=upwork&logoColor=white)](https://www.upwork.com/freelancers/~016dd1767321100e21)
[![Website](https://img.shields.io/badge/Website-kishansavaliya.com-0D9488)](https://kishansavaliya.com)

> **Speed up your Magento 2 store by loading images smarter, not harder.** Panth Image Optimizer adds lazy loading (Native, IntersectionObserver, or Hybrid), client-side WebP detection with PNG/JPG fallback, preload hints for critical images, async decoding, and fetchpriority on LCP candidates. Pure frontend layer, no server changes needed.

**Product page:** [kishansavaliya.com/magento-2-imageoptimizer.html](https://kishansavaliya.com/magento-2-imageoptimizer.html)

---

## Quick Answer

**What is Panth Image Optimizer?** It is a Magento 2 frontend image performance extension that adds lazy loading, WebP browser detection, preload hints, async decoding, and fetchpriority to improve Core Web Vitals (LCP, INP) without touching your server or image storage.

**What does it add to my store?**

- **Three lazy loading strategies** (Native, IntersectionObserver, Hybrid) so offscreen images are not fetched until needed.
- **WebP browser detection** that strips unsupported WebP source tags so browsers fall back to PNG/JPG automatically.
- **Preload hints** that inject `<link rel="preload" as="image">` for above-the-fold images to cut LCP time.
- **Async decoding and fetchpriority** attributes so LCP candidates get network priority and decode off the main thread.
- **Admin debug mode** for troubleshooting optimization activity in the browser console.

**Which themes are supported?** Both **Hyva** and **Luma** out of the box.

**What does it need?** Magento 2.4.4 to 2.4.8, PHP 8.1 to 8.4, and the free `mage2kishan/module-core` package.

---

## Need Custom Magento 2 Development?

> **Get a free quote for your project in 24 hours** for custom modules, Hyva themes, performance work, M1 to M2 migrations, and Adobe Commerce Cloud.

<p align="center">
  <a href="https://kishansavaliya.com/get-quote">
    <img src="https://img.shields.io/badge/Get%20a%20Free%20Quote%20%E2%86%92-Reply%20within%2024%20hours-DC2626?style=for-the-badge" alt="Get a Free Quote" />
  </a>
</p>

<table>
<tr>
<td width="50%" align="center">

### Kishan Savaliya
**Top Rated Plus on Upwork**

[![Hire on Upwork](https://img.shields.io/badge/Hire%20on%20Upwork-Top%20Rated%20Plus-14a800?style=for-the-badge&logo=upwork&logoColor=white)](https://www.upwork.com/freelancers/~016dd1767321100e21)

100% Job Success • 10+ Years Magento Experience
Adobe Certified • Hyva Specialist

</td>
<td width="50%" align="center">

### Panth Infotech Agency
**Magento Development Team**

[![Visit Agency](https://img.shields.io/badge/Visit%20Agency-Panth%20Infotech-14a800?style=for-the-badge&logo=upwork&logoColor=white)](https://www.upwork.com/agencies/1881421506131960778/)

Custom Modules • Theme Design • Migrations
Performance • SEO • Adobe Commerce Cloud

</td>
</tr>
</table>

**Visit our website:** [kishansavaliya.com](https://kishansavaliya.com) &nbsp;|&nbsp; **Get a quote:** [kishansavaliya.com/get-quote](https://kishansavaliya.com/get-quote)

---

## Table of Contents

- [Who Is It For](#who-is-it-for)
- [Key Features](#key-features)
- [Compatibility](#compatibility)
- [Installation](#installation)
- [Configuration](#configuration)
- [How It Works](#how-it-works)
- [Lazy Loading Strategies](#lazy-loading-strategies)
- [WebP Detection and Fallback](#webp-detection-and-fallback)
- [Performance Hints](#performance-hints)
- [FAQ](#faq)
- [Support](#support)
- [About Panth Infotech](#about-panth-infotech)
- [Quick Links](#quick-links)

---

## Who Is It For

- **Stores with slow page scores** where large images are fetched on page load even when they are below the fold.
- **Merchants targeting Core Web Vitals** who want to improve LCP and INP without a full CDN or image conversion setup.
- **Hyva storefronts** that want fine-grained control over lazy loading and preloading on top of what the theme already does.
- **Stores already serving WebP** who need a client-side fallback layer so visitors on older browsers still see the right image.
- **Developers and agencies** who want a single admin toggle per feature and debug mode to verify what is running.

---

## Key Features

### Lazy Loading (Three Strategies)

- **Native lazy loading** adds `loading="lazy"` via a PHP plugin on product images, with zero JavaScript required.
- **IntersectionObserver strategy** uses JavaScript to swap `data-src` to `src` when an image approaches the viewport.
- **Hybrid mode** combines both strategies for maximum browser coverage and the best UX.
- **Above-the-fold exclusion** skips lazy loading for the first N images so LCP candidates always load immediately.
- **Configurable threshold** starts fetching images N pixels before they enter the viewport.
- **Placeholder types** (blur, solid color, SVG) shown while an image loads (IntersectionObserver only).
- **Fade-in effect** applies a smooth opacity transition when images finish loading.

### WebP Browser Detection (Frontend Only)

- **Client-side WebP support check** runs a canvas probe to detect whether the visitor's browser can render WebP.
- **Automatic fallback** strips `<source type="image/webp">` elements from `<picture>` tags so the browser loads PNG/JPG.
- **No server-side conversion** required. This module works on top of any existing image pipeline.
- **Zero layout shift** because the fallback logic runs before the image is decoded.

### Core Web Vitals Boosters

- **Preload critical images** injects `<link rel="preload" as="image">` for the first N images, helping LCP.
- **Async decoding** adds `decoding="async"` to all images so decode work happens off the main thread.
- **fetchpriority="high"** hints Chrome 101+ to prioritize LCP candidates in the network queue.
- **Configurable preload count** so you control exactly how many images get the preload treatment.

### Admin and Developer Experience

- **Unified admin config** under Stores > Configuration > Panth Extensions > Image Optimizer.
- **Debug mode** logs optimization activity to the browser console. Disable in production.
- **Store-scope aware** so all settings respect default, website, and store view hierarchy.
- **MEQP-style code** with constructor dependency injection only.

---

## Compatibility

| Requirement | Versions Supported |
|---|---|
| Magento Open Source | 2.4.4, 2.4.5, 2.4.6, 2.4.7, 2.4.8 |
| Adobe Commerce | 2.4.4, 2.4.5, 2.4.6, 2.4.7, 2.4.8 |
| Adobe Commerce Cloud | 2.4.4 to 2.4.8 |
| PHP | 8.1.x, 8.2.x, 8.3.x, 8.4.x |
| Hyva Theme | 1.3+ (fully compatible) |
| Luma Theme | Native support |
| Required Dependency | `mage2kishan/module-core` (free) |

---

## Installation

### Composer Installation (Recommended)

```bash
composer require mage2kishan/module-imageoptimizer
bin/magento module:enable Panth_Core Panth_ImageOptimizer
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento setup:static-content:deploy -f
bin/magento cache:flush
```

### Manual Installation via ZIP

1. Download the latest release from [Packagist](https://packagist.org/packages/mage2kishan/module-imageoptimizer) or from the [product page](https://kishansavaliya.com/magento-2-imageoptimizer.html).
2. Extract it to `app/code/Panth/ImageOptimizer/` in your Magento install.
3. Make sure `Panth_Core` is installed too (required dependency).
4. Run the commands above starting from `bin/magento module:enable`.

### Verify Installation

```bash
bin/magento module:status Panth_ImageOptimizer
# Expected: Module is enabled
```

After install, open:
```
Admin -> Stores -> Configuration -> Panth Extensions -> Image Optimizer
```

---

## Configuration

Go to **Stores -> Configuration -> Panth Extensions -> Image Optimizer**.

### General Settings

| Setting | Group | Default | Description |
|---|---|---|---|
| Enable Image Optimizer | General Settings | Yes | Master switch for all frontend image optimizations. |
| Enable Debug Mode | General Settings | No | Log optimization activity to the browser console. Disable in production. |

### WebP Detection (Frontend Only)

| Setting | Group | Default | Description |
|---|---|---|---|
| Enable WebP Detection | WebP Detection | Yes | Detect browser WebP support via JavaScript. |
| Enable Fallback Behavior | WebP Detection | Yes | Strip WebP source tags from picture elements when WebP is unsupported so the browser loads PNG/JPG. |

### Lazy Loading

| Setting | Group | Default | Description |
|---|---|---|---|
| Enable Lazy Loading | Lazy Loading | Yes | Defer offscreen images until they approach the viewport. |
| Loading Strategy | Lazy Loading | Hybrid | Native, IntersectionObserver, or Hybrid. |
| Threshold (pixels) | Lazy Loading | 200 | Start loading images N pixels before viewport (IntersectionObserver only). |
| Placeholder Type | Lazy Loading | Blur | Visual placeholder while an image loads (IntersectionObserver only). |
| Enable Fade-In Effect | Lazy Loading | Yes | Smooth opacity transition when images finish loading. |
| Exclude Above-the-Fold Images | Lazy Loading | Yes | Skip lazy loading for the first N images to protect LCP. |
| Exclude First N Images | Lazy Loading | 3 | Number of top-of-page images to load immediately. |

### Performance Settings

| Setting | Group | Default | Description |
|---|---|---|---|
| Preload Critical Images | Performance Settings | Yes | Inject preload hints for the first N images on the page. |
| Preload Image Count | Performance Settings | 1 | Number of images to preload (recommended: 1 to 2). |
| Async Image Decoding | Performance Settings | Yes | Add `decoding="async"` to all images. |
| Use fetchpriority Attribute | Performance Settings | Yes | Set `fetchpriority="high"` on LCP candidates (Chrome 101+). |

---

## How It Works

1. A PHP plugin on Magento's image renderer adds `loading="lazy"`, `decoding="async"`, and `fetchpriority` attributes during HTML generation.
2. A small JavaScript bundle is injected on every storefront page. It:
   - Runs a WebP feature test using a canvas probe and caches the result.
   - Strips unsupported `<source type="image/webp">` tags when WebP is not available.
   - Sets up an IntersectionObserver that swaps `data-src` to `src` when images approach the viewport.
   - Injects `<link rel="preload" as="image">` tags in the `<head>` for the first N critical images.
3. All behavior is gated by admin settings. Turn off any piece to fall back to Magento's default rendering.

**What this module does not do:**
- No server-side WebP generation (use a dedicated CDN or conversion module for that).
- No responsive image srcset or sizes rewriting.
- No CDN URL rewriting.

---

## Lazy Loading Strategies

### Native (`loading="lazy"`)

The simplest approach. A PHP plugin injects the `loading="lazy"` attribute on product images during HTML rendering. No JavaScript required. Supported in all modern browsers.

**Best for:** stores with minimal JS overhead, Hyva storefronts, or sites that want server-rendered HTML only.

### IntersectionObserver (JS-based)

A JavaScript observer watches images and swaps `data-src` to `src` when they near the viewport. Supports fade-in effects, placeholders, and configurable thresholds.

**Best for:** stores that want a smooth fade-in UX, older browsers, or granular control over when images load.

### Hybrid (Both)

Applies native `loading="lazy"` as the baseline and layers IntersectionObserver on top for enhanced UX (fade-in, blur placeholder). Maximum compatibility.

**Best for:** most production stores. This is the recommended default.

---

## WebP Detection and Fallback

On page load, a short JavaScript snippet tests WebP support:

```js
const webp = new Image();
webp.onload = webp.onerror = () => {
  document.documentElement.classList.toggle('webp', webp.height === 2);
};
webp.src = 'data:image/webp;base64,UklGRh4AAABXRUJQVlA4TBEAAAAvAAAAAAfQ//73v/+BiOh/AAA=';
```

When WebP is not supported, the module walks the DOM and removes `<source type="image/webp">` elements from `<picture>` tags. The browser then loads the `<img>` fallback (PNG/JPG) automatically.

**Note:** this module does not generate WebP files on the server. Use a dedicated WebP-generation module or a CDN (Cloudflare Polish, Fastly IO, Bunny Optimizer) to produce WebP sources. Panth Image Optimizer handles the client-side fallback layer only.

---

## Performance Hints

### Preload Critical Images

On every page, the module injects `<link rel="preload" as="image">` tags into the `<head>` for the first N images. This tells the browser to fetch LCP candidates in parallel with the HTML, reducing LCP on product and category pages.

### Async Decoding

All images receive `decoding="async"`, which tells the browser to decode images off the main thread. This reduces blocking time and improves INP (Interaction to Next Paint).

### fetchpriority

LCP candidates receive `fetchpriority="high"`, hinting Chrome 101+ to prioritize them in the network queue ahead of lower-priority assets. Combined with preload, this is the single biggest LCP win available without changing your image pipeline.

---

## FAQ

### Does this module convert my images to WebP on the server?

No. This module only handles client-side WebP detection and fallback. For server-side WebP generation, use a dedicated conversion module or an image CDN such as Cloudflare Polish, Fastly IO, or Bunny Optimizer.

### Will lazy loading hurt my LCP score?

Only if configured incorrectly. The module ships with above-the-fold exclusion enabled by default (first 3 images skip lazy loading) and also supports preload and fetchpriority for LCP candidates. Properly configured, lazy loading improves overall Core Web Vitals without hurting LCP.

### Does this work with Hyva?

Yes. All features work on both Hyva and Luma storefronts. Hyva already uses `loading="lazy"` natively. This module adds the IntersectionObserver layer, WebP fallback, preload hints, and fetchpriority on top.

### Will it conflict with my CDN image optimizer?

No. This module only manipulates HTML attributes and DOM elements. It does not rewrite image URLs, generate files, or intercept HTTP requests. It works alongside Cloudflare, Fastly, Bunny, KeyCDN, and any other CDN.

### Can I disable individual features?

Yes. Every feature (lazy loading, WebP detection, preload, async decode, fetchpriority) has its own admin toggle. Turn off only what you do not need.

### Does it support multi-store setups?

Yes. All settings respect Magento's standard scope hierarchy (default, website, store view).

### Which lazy loading strategy should I pick?

**Hybrid** is recommended for most stores. It combines the compatibility of native with the UX of IntersectionObserver. Pick **Native** if you want zero JavaScript. Pick **IntersectionObserver** if you need fade-in or blur placeholders without native behavior.

### Does Panth Image Optimizer need Panth Core?

Yes. `mage2kishan/module-core` is a free, required dependency that Composer installs for you automatically.

### Is the source code available?

Yes. The full source is on GitHub at [github.com/mage2sk/module-imageoptimizer](https://github.com/mage2sk/module-imageoptimizer).

---

## Support

| Channel | Contact |
|---|---|
| Product Page | [kishansavaliya.com/magento-2-imageoptimizer.html](https://kishansavaliya.com/magento-2-imageoptimizer.html) |
| Email | kishansavaliyakb@gmail.com |
| Website | [kishansavaliya.com](https://kishansavaliya.com) |
| WhatsApp | +91 84012 70422 |
| GitHub Issues | [github.com/mage2sk/module-imageoptimizer/issues](https://github.com/mage2sk/module-imageoptimizer/issues) |
| Upwork (Top Rated Plus) | [Hire Kishan Savaliya](https://www.upwork.com/freelancers/~016dd1767321100e21) |
| Upwork Agency | [Panth Infotech](https://www.upwork.com/agencies/1881421506131960778/) |

Response time: 1-2 business days.

### Need Custom Magento Development?

Looking for **custom Magento module development**, **Hyva theme work**, **store migrations**, or **performance tuning**? Get a free quote in 24 hours:

<p align="center">
  <a href="https://kishansavaliya.com/get-quote">
    <img src="https://img.shields.io/badge/%F0%9F%92%AC%20Get%20a%20Free%20Quote-kishansavaliya.com%2Fget--quote-DC2626?style=for-the-badge" alt="Get a Free Quote" />
  </a>
</p>

<p align="center">
  <a href="https://www.upwork.com/freelancers/~016dd1767321100e21">
    <img src="https://img.shields.io/badge/Hire%20Kishan-Top%20Rated%20Plus-14a800?style=for-the-badge&logo=upwork&logoColor=white" alt="Hire on Upwork" />
  </a>
  &nbsp;&nbsp;
  <a href="https://www.upwork.com/agencies/1881421506131960778/">
    <img src="https://img.shields.io/badge/Visit-Panth%20Infotech%20Agency-14a800?style=for-the-badge&logo=upwork&logoColor=white" alt="Visit Agency" />
  </a>
  &nbsp;&nbsp;
  <a href="https://kishansavaliya.com/magento-2-imageoptimizer.html">
    <img src="https://img.shields.io/badge/View%20Product%20Page-magento--2--imageoptimizer-0D9488?style=for-the-badge" alt="View Product Page" />
  </a>
</p>

---

## About Panth Infotech

Built and maintained by **Kishan Savaliya** ([kishansavaliya.com](https://kishansavaliya.com)), a **Top Rated Plus** Magento developer on Upwork with 10+ years of eCommerce experience.

**Panth Infotech** is a Magento 2 development agency that builds high quality, security focused extensions and themes for both Hyva and Luma storefronts. The extension suite covers SEO, performance, checkout, product presentation, customer engagement, and store management, with each module built to MEQP standards and tested across Magento 2.4.4 to 2.4.8.

Browse the full extension catalog on our [Magento extensions page](https://kishansavaliya.com/magento-extensions.html) or on [Packagist](https://packagist.org/packages/mage2kishan/).

---

## Quick Links

| Resource | Link |
|---|---|
| **Product Page** | [magento-2-imageoptimizer.html](https://kishansavaliya.com/magento-2-imageoptimizer.html) |
| **Packagist** | [mage2kishan/module-imageoptimizer](https://packagist.org/packages/mage2kishan/module-imageoptimizer) |
| **GitHub** | [mage2sk/module-imageoptimizer](https://github.com/mage2sk/module-imageoptimizer) |
| **Website** | [kishansavaliya.com](https://kishansavaliya.com) |
| **Free Quote** | [kishansavaliya.com/get-quote](https://kishansavaliya.com/get-quote) |
| **Upwork (Top Rated Plus)** | [Hire Kishan Savaliya](https://www.upwork.com/freelancers/~016dd1767321100e21) |
| **Upwork Agency** | [Panth Infotech](https://www.upwork.com/agencies/1881421506131960778/) |
| **Email** | kishansavaliyakb@gmail.com |
| **WhatsApp** | +91 84012 70422 |

---

<p align="center">
  <strong>Ready to improve your store's image performance and Core Web Vitals?</strong><br/>
  <a href="https://kishansavaliya.com/magento-2-imageoptimizer.html">
    <img src="https://img.shields.io/badge/%F0%9F%9A%80%20See%20Image%20Optimizer%20%E2%86%92-Product%20Page%20%26%20Details-DC2626?style=for-the-badge" alt="See Image Optimizer" />
  </a>
</p>

---

**SEO Keywords:** magento 2 image optimizer, magento 2 image optimization extension, magento 2 lazy loading, magento 2 lazy loading module, magento 2 webp detection, magento 2 webp fallback, magento 2 webp browser detection, magento 2 core web vitals, magento 2 LCP optimization, magento 2 fetchpriority, magento 2 preload images, magento 2 async decoding, magento 2 intersectionobserver lazy loading, magento 2 native lazy loading, hyva image optimizer, hyva lazy loading, luma image optimizer, luma lazy loading, magento 2 picture element fallback, magento 2 image performance extension, magento 2 core web vitals module, magento 2.4.8 image optimization, php 8.4 magento image, magento 2 page speed, magento 2 LCP booster, panth image optimizer, panth infotech, mage2kishan imageoptimizer, mage2sk, hire magento performance developer, top rated plus magento freelancer, kishan savaliya magento, magento 2 image lazy load plugin, magento 2 image fade-in, magento 2 image placeholder, magento 2 above the fold images, magento 2 image preload link
