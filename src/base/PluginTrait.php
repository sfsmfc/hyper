<?php
namespace verbb\hyper\base;

use verbb\hyper\Hyper;
use verbb\hyper\services\Content;
use verbb\hyper\services\ElementCache;
use verbb\hyper\services\FieldCache;
use verbb\hyper\services\Links;
use verbb\hyper\services\Service;
use verbb\hyper\web\assets\field\HyperAsset;

use verbb\base\LogTrait;
use verbb\base\helpers\Plugin;

use nystudio107\pluginvite\services\VitePluginService;

trait PluginTrait
{
    // Properties
    // =========================================================================

    public static ?Hyper $plugin = null;


    // Traits
    // =========================================================================

    use LogTrait;
    

    // Static Methods
    // =========================================================================

    public static function config(): array
    {
        Plugin::bootstrapPlugin('hyper');

        return [
            'components' => [
                'content' => Content::class,
                'elementCache' => ElementCache::class,
                'fieldCache' => FieldCache::class,
                'links' => Links::class,
                'service' => Service::class,
                'vite' => [
                    'class' => VitePluginService::class,
                    'assetClass' => HyperAsset::class,
                    'useDevServer' => true,
                    'devServerPublic' => 'http://localhost:4010/',
                    'errorEntry' => 'js/main.js',
                    'cacheKeySuffix' => '',
                    'devServerInternal' => 'http://localhost:4010/',
                    'checkDevServer' => true,
                    'includeReactRefreshShim' => false,
                ],
            ],
        ];
    }


    // Public Methods
    // =========================================================================

    public function getContent(): Content
    {
        return $this->get('content');
    }

    public function getElementCache(): ElementCache
    {
        return $this->get('elementCache');
    }

    public function getFieldCache(): FieldCache
    {
        return $this->get('fieldCache');
    }

    public function getLinks(): Links
    {
        return $this->get('links');
    }

    public function getService(): Service
    {
        return $this->get('service');
    }

    public function getVite(): VitePluginService
    {
        return $this->get('vite');
    }

}