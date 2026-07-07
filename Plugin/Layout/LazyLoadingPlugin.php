<?php
declare(strict_types=1);

namespace Panth\ImageOptimizer\Plugin\Layout;

use Magento\Framework\View\LayoutInterface;
use Panth\ImageOptimizer\Helper\Data as ConfigHelper;
use Panth\ImageOptimizer\Service\RequestImageCounter;

class LazyLoadingPlugin
{
    public function __construct(
        private readonly ConfigHelper $configHelper,
        private readonly RequestImageCounter $counter
    ) {
    }

    public function afterGetOutput(LayoutInterface $subject, $result)
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
        if (stripos($result, '<img') === false) {
            return $result;
        }

        $excludeAboveFold = $this->configHelper->shouldExcludeAboveFold();
        $excludeCount = max(0, $this->configHelper->getExcludeCount());

        return preg_replace_callback(
            '/<img\b[^>]*>/i',
            function (array $match) use ($excludeAboveFold, $excludeCount): string {
                $tag = $match[0];
                $position = $this->counter->increment();
                $shouldBeEager = $excludeAboveFold && $position <= $excludeCount;
                $isFirst = $position === 1;

                $hasEager = (bool) preg_match('/\bloading\s*=\s*["\']?eager/i', $tag);
                $hasLazy = (bool) preg_match('/\bloading\s*=\s*["\']?lazy/i', $tag);
                $hasFetchPriority = (bool) preg_match('/\bfetchpriority\s*=/i', $tag);

                if ($shouldBeEager) {
                    if ($hasLazy) {
                        $tag = preg_replace(
                            '/\bloading\s*=\s*["\']?lazy["\']?/i',
                            'loading="eager"',
                            $tag,
                            1
                        ) ?? $tag;
                    } elseif (!$hasEager) {
                        $tag = preg_replace('/<img\b/i', '<img loading="eager"', $tag, 1) ?? $tag;
                    }
                    if ($isFirst && !$hasFetchPriority) {
                        $tag = preg_replace('/<img\b/i', '<img fetchpriority="high"', $tag, 1) ?? $tag;
                    }
                    return $tag;
                }

                if (!$hasEager && !$hasLazy) {
                    $tag = preg_replace('/<img\b/i', '<img loading="lazy"', $tag, 1) ?? $tag;
                }
                return $tag;
            },
            $result
        ) ?? $result;
    }
}
