<?php
/**
 * @link http://www.wayhood.com/
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 */

$this->title = $model->section. '.' . $model->key;
$this->params['breadcrumbs'][] = ['label' => Yii::t('setting', 'Setting'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('setting', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(
            Yii::t('setting', 'Delete'),
            ['delete', 'id' => $model->id],
            [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('setting', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]
        ) ?>
    </p>

    <?=
    DetailView::widget(
        [
            'model' => $model,
            'attributes' => [
                'id',
                'type',
                'section',
                'active:boolean',
                'key',
                'value:ntext',
                'created_at:datetime',
                'updated_at:datetime',
            ],
        ]
    ) ?>

</div>
