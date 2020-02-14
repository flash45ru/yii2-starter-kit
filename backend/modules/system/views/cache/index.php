<?php
/**
 * Eugine Terentev <eugine@terentev.net>
 *
 * @var \yii\data\ArrayDataProvider $dataProvider
 */

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Cache';

$this->params['breadcrumbs'][] = $this->title;

?>

<?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'name',
        'class',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{flush-cache}',
            'buttons' => [
                'flush-cache' => function ($url, $model) {
                    return \yii\helpers\Html::a('<i class="fa fa-refresh"></i>', $url, [
                        'title' => 'Flush',
                        'data-confirm' => 'Are you sure you want to flush this cache?',
                    ]);
                },
            ],
        ],
    ],
]); ?>

<div class="row">
    <div class="col-xs-6">
        <h4><?php echo 'Delete a value with the specified key from cache' ?></h4>
        <?php \yii\bootstrap\ActiveForm::begin([
            'action' => \yii\helpers\Url::to('flush-cache-key'),
            'method' => 'get',
            'layout' => 'inline',
        ]) ?>
        <?php echo Html::dropDownList(
            'id', null, \yii\helpers\ArrayHelper::map($dataProvider->allModels, 'name', 'name'),
            ['class' => 'form-control', 'prompt' => 'Select cache'])
        ?>
        <?php echo Html::input('string', 'key', null, ['class' => 'form-control', 'placeholder' => 'Key']) ?>
        <?php echo Html::submitButton('Flush', ['class' => 'btn btn-danger']) ?>
        <?php \yii\bootstrap\ActiveForm::end() ?>
    </div>
    <div class="col-xs-6">
        <h4><?php echo 'Invalidate tag' ?></h4>
        <?php \yii\bootstrap\ActiveForm::begin([
            'action' => \yii\helpers\Url::to('flush-cache-tag'),
            'method' => 'get',
            'layout' => 'inline',
        ]) ?>
        <?php echo Html::dropDownList(
            'id', null, \yii\helpers\ArrayHelper::map($dataProvider->allModels, 'name', 'name'),
            ['class' => 'form-control', 'prompt' => 'Select cache']) ?>
        <?php echo Html::input('string', 'tag', null, ['class' => 'form-control', 'placeholder' => 'Tag']) ?>
        <?php echo Html::submitButton('Flush', ['class' => 'btn btn-danger']) ?>
        <?php \yii\bootstrap\ActiveForm::end() ?>
    </div>
</div>
