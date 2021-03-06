<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Advents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advent-index">

    <h1><?= Html::encode($this->title) ?></h1>
<!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Advent', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description:ntext',
            'price',
            'contacts',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
