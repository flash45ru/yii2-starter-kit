<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\OptionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Обьявления';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="options-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'title',
            //'contacts',
            [
                'attribute' => 'model',
                'value' => function ($model) {
                    return $model->car->characteristic->model;
                }
            ],
            [
                'attribute' => 'year',
                'value' => function ($model) {
                    return $model->car->characteristic->year;
                }
            ],
            [
                'attribute' => 'carcase',
                'value' => function ($model) {
                    return $model->car->characteristic->carcase;
                }
            ],
            [
                'attribute' => 'mileage',
                'value' => function ($model) {
                   return $model->car->characteristic->mileage;
                }
            ],
            [
                'attribute' => 'conditioner',
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'conditioner',
                    ['0' => 'Нет', '1' => 'Есть'],
                    ['class' => 'form-control', 'prompt' => 'Статус']
                ),
                'format' => 'raw',
                'value' => function ($model) {
                    $translate = ['0' => 'Нет', '1' => 'Есть'];
                    if (!empty($model->car->option->conditioner)) {
                        return $translate[$model->car->option->conditioner];
                    } else {
                        return '- - -';
                    }
                }
            ],
            [
                'attribute' => 'airbags',
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'airbags',
                    ['0' => 'Нет', '1' => 'Есть'],
                    ['class' => 'form-control', 'prompt' => 'Статус']
                ),
                'format' => 'raw',
                'value' => function ($model) {
                    $translate = ['0' => 'Нет', '1' => 'Есть'];
                    if (!empty($model->car->option->airbags)) {
                        return $translate[$model->car->option->airbags];
                    } else {
                        return '- - -';
                    }
                }
            ],
            [
                'attribute' => 'multimedia',
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'multimedia',
                    ['0' => 'Нет', '1' => 'Есть'],
                    ['class' => 'form-control', 'prompt' => 'Статус']
                ),
                'format' => 'raw',
                'value' => function ($model) {
                    $translate = ['0' => 'Нет', '1' => 'Есть'];
                    if (!empty($model->car->option->multimedia)) {
                        return $translate[$model->car->option->multimedia];
                    } else {
                        return '- - -';
                    }
                }
            ],
            [
                'attribute' => 'cruise_control',
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'cruise_control',
                    ['0' => 'Нет', '1' => 'Есть'],
                    ['class' => 'form-control', 'prompt' => 'Статус']
                ),
                'format' => 'raw',
                'value' => function ($model) {
                    $translate = ['0' => 'Нет', '1' => 'Есть'];
                    if (!empty($model->car->option->cruise_control)) {
                        return $translate[$model->car->option->cruise_control];
                    } else {
                        return '- - -';
                    }
                }
            ],
            'price',
            ['label' => 'Изображение', 'content' => function ($model) {
                if(!empty($model->images[0]['path'])){
                $url = $model->images[0]['base_url'].$model->images[0]['path'];
                    return "<img src='$url' style='height: 50px'/>";
                }
            }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>