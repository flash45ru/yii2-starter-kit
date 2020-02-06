<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $advent app\models\Advent */
/* @var $characteristic app\models\Characteristic */
/* @var $options app\models\Options */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Обьявление', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'advent' => $advent,
        'characteristic' => $characteristic,
        'options' => $options,
    ]) ?>

</div>
