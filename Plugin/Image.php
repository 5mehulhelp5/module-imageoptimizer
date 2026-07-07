<?php
declare(strict_types=1);

namespace Panth\ImageOptimizer\Plugin;

use Magento\Catalog\Model\Product\Image as ProductImage;
use Panth\ImageOptimizer\Helper\Data as ConfigHelper;
use Panth\ImageOptimizer\Service\RequestImageCounter;

class Image
{
    public function __construct(
        private readonly ConfigHelper $configHelper,
        private readonly RequestImageCounter $counter
    ) {
    }

    public function afterToHtml(ProductImage $subject, $result)
    {
        if (!is_string($result) || $result === '') {
            return $result;
        }
        if (!$this->configHelper->isEnabled() || !$this->configHelper->isLazyLoadingEnabled()) {
            return $result;
        }

        $strategy = $this->configHelper->getLoadingStrategy();
        if ($strategy !== 'native' && $strategy !== 'hybrid') {
            return $result;
        }

        if (!preg_match('/<img\b(?![^>]*\bloading\s*=)/i', $result)) {
            return $result;
        }

        $position = $this->counter->increment();

        $excludeAboveFold = $this->configHelper->shouldExcludeAboveFold();
        $excludeCount = max(0, $this->configHelper->getExcludeCount());

        if ($excludeAboveFold && $position <= $excludeCount) {
            $injected = $position === 1
                ? '<img loading="eager" fetchpriority="high"'
                : '<img loading="eager"';

            return preg_replace(
                '/<img\b(?![^>]*\bloading\s*=)/i',
                $injected,
                $result,
                1
            );
        }

        return preg_replace(
            '/<img\b(?![^>]*\bloading\s*=)/i',
            '<img loading="lazy"',
            $result,
            1
        );
    }
}
