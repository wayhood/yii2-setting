<?php
/**
 * @link http://www.wayhood.com/
 */

namespace wh\setting;

use Yii;
use yii\filters\AccessControl;

class Module extends \yii\base\Module
{
    
    public $admins = [];

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
