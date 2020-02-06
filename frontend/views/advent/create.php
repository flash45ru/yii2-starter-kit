<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Advent */

$this->title = 'Create Advent';
$this->params['breadcrumbs'][] = ['label' => 'Advents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
