<?php
/**
 * @link http://www.wayhood.com/
 */

namespace wh\setting;

use Yii;

class Module extends \yii\base\Module
{
    /**
     * @var string The controller namespace to use
     */
    public $controllerNamespace = 'wh\setting\controllers';

    public $componentId = 'setting';
    /**
     * Init module
     */
    public function init()
    {
        parent::init();
    }

    public function getComponent()
    {
        if (Yii::$app->has($this->componentId)) {
            return Yii::$app->get($this->componentId);
        } else {
            return null;
        }
    }
}
