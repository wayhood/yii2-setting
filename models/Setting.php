<?php
/**
 * @link http://www.wayhood.com/
 */

namespace wh\setting\models;

use wh\setting\Module;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use Yii;
use wh\setting\Moduel;

/**
 * This is the model class for table "setting".
 *
 * @property integer $id
 * @property string $type
 * @property string $section
 * @property string $key
 * @property string $value
 * @property boolean $active
 * @property string $created
 * @property string $modified
 */
class Setting extends ActiveRecord implements SettingInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%setting}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value'], 'string'],
            [['section', 'key'], 'string', 'max' => 255],
            [['type', 'created_at', 'updated_at'], 'safe'],
            [['active'], 'boolean'],
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        Yii::$app->setting->clearCache();
    }

    public function afterDelete()
    {
        parent::afterDelete();
        Yii::$app->setting->clearCache();
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('setting', 'ID'),
            'type' => Yii::t('setting', 'Type'),
            'section' => Yii::t('setting', 'Section'),
            'key' => Yii::t('setting', 'Key'),
            'value' => Yii::t('setting', 'Value'),
            'active' => Yii::t('setting', 'Active'),
            'created_at' => Yii::t('setting', 'CreatedAt'),
            'updated_at' => Yii::t('setting', 'UpdatedAt'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getSetting()
    {
        $settings = static::find()->where(['active' => 1])->asArray()->all();
        return array_merge_recursive(
            ArrayHelper::map($settings, 'key', 'value', 'section'),
            ArrayHelper::map($settings, 'key', 'type', 'section')
        );
    }

    /**
     * @inheritdoc
     */
    public function setSetting($section, $key, $value, $type = null)
    {
        $model = static::findOne(['section' => $section, 'key' => $key]);

        if ($model === null) {
            $model = new static();
            $model->active = 1;
        }
        $model->section = $section;
        $model->key = $key;
        $model->value = strval($value);

        if ($type !== null) {
            $model->type = $type;
        } else {
            $model->type = gettype($value);
        }

        return $model->save();
    }

    /**
     * @inheritdoc
     */
    public function activateSetting($section, $key)
    {
        $model = static::findOne(['section' => $section, 'key' => $key]);

        if ($model && $model->active == 0) {
            $model->active = 1;
            return $model->save();
        }
        return false;
    }

    /**
     * @inheritdoc
     */
    public function deactivateSetting($section, $key)
    {
        $model = static::findOne(['section' => $section, 'key' => $key]);

        if ($model && $model->active == 1) {
            $model->active = 0;
            return $model->save();
        }
        return false;
    }

    /**
     * @inheritdoc
     */
    public function deleteSetting($section, $key)
    {
        $model = static::findOne(['section' => $section, 'key' => $key]);

        if ($model) {
            return $model->delete();
        }
        return true;
    }

    /**
     * @inheritdoc
     */
    public function deleteAllSetting()
    {
        return static::deleteAll();
    }
}
