<?php
declare(strict_types=1);

namespace Panth\ImageOptimizer\Helper;

use Panth\Core\Helper\AbstractConfig;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractConfig
{
    private const XML_PATH_IMAGE_OPTIMIZER = 'panth_imageoptimizer/';

    protected function getConfigValue(string $group, string $field, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_IMAGE_OPTIMIZER . $group . '/' . $field,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    protected function isCoreModuleEnabled(): bool
    {
        return true;
    }

    public function isEnabled($storeId = null): bool
    {
        if (!$this->isCoreModuleEnabled()) {
            return false;
        }

        return (bool)$this->getConfigValue('general', 'enabled', $storeId);
    }

    public function isDebugMode($storeId = null): bool
    {
        return $this->isEnabled($storeId) && (bool)$this->getConfigValue('general', 'debug_mode', $storeId);
    }

    public function isWebpEnabled($storeId = null): bool
    {
        return $this->isEnabled($storeId) && (bool)$this->getConfigValue('webp', 'enabled', $storeId);
    }

    public function isFallbackEnabled($storeId = null): bool
    {
        return (bool)$this->getConfigValue('webp', 'fallback_enabled', $storeId);
    }

    public function isLazyLoadingEnabled($storeId = null): bool
    {
        return $this->isEnabled($storeId) && (bool)$this->getConfigValue('lazy_loading', 'enabled', $storeId);
    }

    public function getLoadingStrategy($storeId = null): string
    {
        return (string)$this->getConfigValue('lazy_loading', 'loading_strategy', $storeId) ?: 'native';
    }

    public function getThreshold($storeId = null): int
    {
        return (int)$this->getConfigValue('lazy_loading', 'threshold', $storeId) ?: 300;
    }

    public function getPlaceholderType($storeId = null): string
    {
        return (string)$this->getConfigValue('lazy_loading', 'placeholder', $storeId) ?: 'blur';
    }

    public function isFadeInEnabled($storeId = null): bool
    {
        return (bool)$this->getConfigValue('lazy_loading', 'fade_in', $storeId);
    }

    public function shouldExcludeAboveFold($storeId = null): bool
    {
        return (bool)$this->getConfigValue('lazy_loading', 'exclude_above_fold', $storeId);
    }

    public function getExcludeCount($storeId = null): int
    {
        return (int)$this->getConfigValue('lazy_loading', 'exclude_count', $storeId) ?: 3;
    }

    public function shouldPreloadCriticalImages($storeId = null): bool
    {
        return (bool)$this->getConfigValue('performance', 'preload_critical_images', $storeId);
    }

    public function getPreloadCount($storeId = null): int
    {
        return (int)$this->getConfigValue('performance', 'preload_count', $storeId) ?: 2;
    }

    public function isDecodeAsyncEnabled($storeId = null): bool
    {
        return (bool)$this->getConfigValue('performance', 'decode_async', $storeId);
    }

    public function isFetchpriorityEnabled($storeId = null): bool
    {
        return (bool)$this->getConfigValue('performance', 'fetchpriority', $storeId);
    }

    public function getConfigJson($storeId = null): string
    {
        return (string)json_encode([
            'enabled' => $this->isEnabled($storeId),
            'debug' => $this->isDebugMode($storeId),
            'webp' => [
                'enabled' => $this->isWebpEnabled($storeId),
                'fallback' => $this->isFallbackEnabled($storeId),
            ],
            'lazyLoading' => [
                'enabled' => $this->isLazyLoadingEnabled($storeId),
                'strategy' => $this->getLoadingStrategy($storeId),
                'threshold' => $this->getThreshold($storeId),
                'placeholder' => $this->getPlaceholderType($storeId),
                'fadeIn' => $this->isFadeInEnabled($storeId),
                'excludeAboveFold' => $this->shouldExcludeAboveFold($storeId),
                'excludeCount' => $this->getExcludeCount($storeId),
            ],
            'performance' => [
                'preload' => $this->shouldPreloadCriticalImages($storeId),
                'preloadCount' => $this->getPreloadCount($storeId),
                'decodeAsync' => $this->isDecodeAsyncEnabled($storeId),
                'fetchpriority' => $this->isFetchpriorityEnabled($storeId),
            ],
        ], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
    }
}
