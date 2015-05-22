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

    public $admins = [];

    public function getComponent()
    {
        if (Yii::$app->has($this->componentId)) {
            return Yii::$app->get($this->componentId);
        } else {
            return null;
        }
    }

    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return in_array(Yii::$app->user->identity->username, $this->admins);
                        },
                    ]
                ],
            ],
        ];
    }
}
