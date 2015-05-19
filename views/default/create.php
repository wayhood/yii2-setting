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
    'Create {modelClass}',
    [
        'modelClass' => Yii::t('setting', 'Setting'),
    ]
);
$this->params['breadcrumbs'][] = ['label' => Yii::t('setting', 'Setting'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render(
        '_form',
        [
            'model' => $model,
        ]
    ) ?>

</div>
