<?php
/**
 * @link http://www.wayhood.com/
 */

namespace wh\setting;

use yii\base\BootstrapInterface;
use yii\i18n\PhpMessageSource;

class Bootstrap implements BootstrapInterface
{
	/** @inheritdoc */
    public function bootstrap($app)
    {
		if (!isset($app->get('i18n')->translations['setting*'])) {
            $app->get('i18n')->translations['setting*'] = [
                'class'    => PhpMessageSource::className(),
                'basePath' => __DIR__.'/messages',
            ];
        }

    }
}