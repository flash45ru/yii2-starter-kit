<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advent-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-lg-3"><?= $form->field($model, 'model') ?></div>
        <div class="col-lg-2"><?= $form->field($model, 'year') ?></div>
        <div class="col-lg-2"><?= $form->field($model, 'mileage') ?></div>
        <div class="col-lg-3"><?= $form->field($model, 'carcase') ?></div>
        <div class="col-lg-2"><?= $form->field($model, 'price') ?></div>
    </div>
    <div class="row">
        <div class="col-lg-2"><?= $form->field($model, 'conditioner') ?></div>
        <div class="col-lg-2"><?= $form->field($model, 'airbags') ?></div>
        <div class="col-lg-2"><?= $form->field($model, 'multimedia') ?></div>
        <div class="col-lg-2"><?= $form->field($model, 'cruise_control') ?></div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
