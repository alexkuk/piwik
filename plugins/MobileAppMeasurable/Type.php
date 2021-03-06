<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\MobileAppMeasurable;

use Piwik\Measurable\MeasurableSetting;
use Piwik\Measurable\MeasurableSettings;

class Type extends \Piwik\Measurable\Type
{
    const ID = 'mobileapp';
    protected $name = 'MobileAppMeasurable_MobileApp';
    protected $namePlural = 'MobileAppMeasurable_MobileApps';
    protected $description = 'MobileAppMeasurable_MobileAppDescription';
    protected $howToSetupUrl = 'http://developer.piwik.org/guides/tracking-api-clients#mobile-sdks';

    public function configureMeasurableSettings(MeasurableSettings $settings)
    {
        $appId = new MeasurableSetting('app_id', 'App-ID');
        $appId->validate = function ($value) {
            if (strlen($value) > 100) {
                throw new \Exception('Only 100 characters are allowed');
            }
        };

        $settings->addSetting($appId);
    }

}

