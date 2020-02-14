<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $advent app\models\Advent */
/* @var $characteristic app\models\Characteristic */
/* @var $options app\models\Options */

$this->title = 'Update: ' . $advent->title;
$this->params['breadcrumbs'][] = ['label' => 'Обьявления', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $advent->title, 'url' => ['view', 'id' => $id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="advent-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'advent' => $advent,
        'characteristic' => $characteristic,
        'options' => $options,
    ]) ?>

</div>