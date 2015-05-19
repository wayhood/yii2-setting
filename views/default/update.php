<?php
/**
 * @link http://www.wayhood.com/
 */

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 */

$this->title = Yii::t(
        'setting',
        'Update {modelClass}: ',
        [
            'modelClass' => Yii::t('setting', 'Setting'),
        ]
    ) . ' ' . $model->section. '.' . $model->key;

$this->params['breadcrumbs'][] = ['label' => Yii::t('setting', 'Setting'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('setting', 'Update');

?>
<div class="setting-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render(
        '_form',
        [
            'model' => $model,
        ]
    ) ?>

</div>
