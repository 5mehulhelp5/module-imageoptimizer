<?php
declare(strict_types=1);

namespace Panth\ImageOptimizer\Test\Unit\Etc;

use Panth\ImageOptimizer\Helper\Data;
use PHPUnit\Framework\TestCase;
use SimpleXMLElement;

class ConfigurationTest extends TestCase
{
    private static function moduleDir(): string
    {
        return dirname(__DIR__, 3);
    }

    private static function xml(string $relativePath): SimpleXMLElement
    {
        $path = self::moduleDir() . '/' . $relativePath;
        self::assertFileExists($path);
        $previous = libxml_use_internal_errors(true);
        $xml = simplexml_load_string((string)file_get_contents($path));
        libxml_use_internal_errors($previous);
        self::assertInstanceOf(SimpleXMLElement::class, $xml, $relativePath . ' is not valid XML');

        return $xml;
    }

    private static function systemFields(): array
    {
        $fields = [];
        $system = self::xml('etc/adminhtml/system.xml');
        foreach ($system->xpath('//section') as $section) {
            foreach ($section->group as $group) {
                foreach ($group->field as $field) {
                    $key = (string)$section['id'] . '/' . (string)$group['id'] . '/' . (string)$field['id'];
                    $fields[$key] = $field;
                }
            }
        }

        return $fields;
    }

    public function testEverySystemFieldHasADefaultValue(): void
    {
        $config = self::xml('etc/config.xml');
        $fields = self::systemFields();

        $this->assertCount(15, $fields);
        foreach (array_keys($fields) as $path) {
            $this->assertCount(1, $config->xpath('/config/default/' . $path), 'Missing default for ' . $path);
        }
    }

    public function testEveryDefaultValueBelongsToASystemField(): void
    {
        $config = self::xml('etc/config.xml');
        $fields = self::systemFields();

        foreach ($config->default->panth_imageoptimizer->children() as $group) {
            foreach ($group->children() as $field) {
                $path = 'panth_imageoptimizer/' . $group->getName() . '/' . $field->getName();
                $this->assertArrayHasKey($path, $fields, 'Default without admin field: ' . $path);
            }
        }
    }

    public function testModuleIsDisabledByDefault(): void
    {
        $config = self::xml('etc/config.xml');

        $this->assertSame('0', (string)$config->default->panth_imageoptimizer->general->enabled);
    }

    public function testSelectDefaultsAreValidOptionsOfTheirSourceModel(): void
    {
        $config = self::xml('etc/config.xml');
        $checked = 0;

        foreach (self::systemFields() as $path => $field) {
            $sourceModel = trim((string)$field->source_model);
            if ($sourceModel === '' || strpos($sourceModel, 'Panth\\ImageOptimizer\\') !== 0) {
                continue;
            }
            $this->assertTrue(class_exists($sourceModel), $sourceModel . ' does not exist');
            $values = array_map('strval', array_column((new $sourceModel())->toOptionArray(), 'value'));
            $default = (string)$config->xpath('/config/default/' . $path)[0];
            $this->assertContains($default, $values, 'Default of ' . $path . ' is not an option');
            $checked++;
        }
        $this->assertSame(2, $checked);
    }

    public function testNumericFieldsAreValidatedAsZeroOrGreater(): void
    {
        $fields = self::systemFields();
        foreach (['lazy_loading/threshold', 'lazy_loading/exclude_count', 'performance/preload_count'] as $id) {
            $path = 'panth_imageoptimizer/' . $id;
            $this->assertArrayHasKey($path, $fields);
            $validate = (string)$fields[$path]->validate;
            $this->assertStringContainsString('validate-number', $validate);
            $this->assertStringContainsString('validate-zero-or-greater', $validate);
        }
    }

    public function testBackendModelClassesExist(): void
    {
        $found = 0;
        foreach (self::systemFields() as $path => $field) {
            $backend = trim((string)$field->backend_model);
            if ($backend !== '') {
                $this->assertTrue(class_exists($backend), $path . ' backend ' . $backend);
                $found++;
            }
        }
        $this->assertGreaterThan(0, $found);
    }

    public function testSectionMenuAndAclShareOneResource(): void
    {
        $system = self::xml('etc/adminhtml/system.xml');
        $acl = self::xml('etc/acl.xml');
        $menu = self::xml('etc/adminhtml/menu.xml');

        $resource = (string)$system->xpath('//section')[0]->resource;
        $this->assertSame('Panth_ImageOptimizer::config', $resource);
        $this->assertCount(1, $acl->xpath('//resource[@id="' . $resource . '"]'));
        foreach ($menu->xpath('//add') as $item) {
            $this->assertSame($resource, (string)$item['resource']);
        }
        $settings = $menu->xpath('//add[@id="Panth_ImageOptimizer::settings"]');
        $this->assertCount(1, $settings);
        $this->assertStringEndsWith('/section/panth_imageoptimizer', (string)$settings[0]['action']);
    }

    public function testPluginsAreWiredToExistingClassesAndMethods(): void
    {
        $checks = [
            'etc/di.xml' => ['Magento\Catalog\Model\Product\Image', 'afterToHtml'],
            'etc/frontend/di.xml' => ['Magento\Framework\View\Layout', 'afterGetOutput'],
        ];
        foreach ($checks as $file => [$type, $method]) {
            $plugins = self::xml($file)->xpath('//type[@name="' . $type . '"]/plugin');
            $this->assertCount(1, $plugins, $file);
            $class = (string)$plugins[0]['type'];
            $this->assertTrue(method_exists($class, $method), $class . '::' . $method);
        }
    }

    public function testLayoutBlockAndTemplateExist(): void
    {
        $layout = self::xml('view/frontend/layout/default.xml');
        $blocks = $layout->xpath('//block[@name="panth.imageoptimizer.init"]');

        $this->assertCount(1, $blocks);
        $this->assertTrue(class_exists((string)$blocks[0]['class']));
        [, $template] = explode('::', (string)$blocks[0]['template']);
        $this->assertFileExists(self::moduleDir() . '/view/frontend/templates/' . $template);
    }

    public function testFrontendJsonExposesEverySettingGroup(): void
    {
        $helper = new class extends Data {
            public function __construct()
            {
            }

            protected function getConfigValue(string $group, string $field, $storeId = null)
            {
                return '1';
            }
        };

        $json = json_decode($helper->getConfigJson(), true);

        $this->assertSame(['enabled', 'debug', 'webp', 'lazyLoading', 'performance'], array_keys($json));
        $this->assertSame(['enabled', 'fallback'], array_keys($json['webp']));
        $this->assertSame(
            ['enabled', 'strategy', 'threshold', 'placeholder', 'fadeIn', 'excludeAboveFold', 'excludeCount'],
            array_keys($json['lazyLoading'])
        );
        $this->assertSame(
            ['preload', 'preloadCount', 'decodeAsync', 'fetchpriority'],
            array_keys($json['performance'])
        );
    }

    public function testEveryFieldOutsideGeneralIsHiddenWhenTheModuleIsDisabled(): void
    {
        foreach (self::systemFields() as $path => $field) {
            if (str_starts_with($path, 'panth_imageoptimizer/general/')) {
                continue;
            }
            $ids = array_map(
                static fn (SimpleXMLElement $node): string => (string)$node['id'],
                $field->xpath('depends/field')
            );
            $this->assertContains('panth_imageoptimizer/general/enabled', $ids, $path);
        }
    }

    public function testFieldsInsideLazyLoadingAndWebpDependOnTheirGroupSwitch(): void
    {
        foreach (self::systemFields() as $path => $field) {
            $parts = explode('/', $path);
            if (!in_array($parts[1], ['webp', 'lazy_loading'], true) || $parts[2] === 'enabled') {
                continue;
            }
            $ids = array_map(
                static fn (SimpleXMLElement $node): string => (string)$node['id'],
                $field->xpath('depends/field')
            );
            $this->assertContains('enabled', $ids, $path);
        }
    }
}
